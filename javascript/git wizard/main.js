function ajax_get(url, loadCallback, errorCallback) {
	var ajax = new XMLHttpRequest();
	ajax.open("GET", url, true);

	ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	ajax.onreadystatechange = function() {
		if(ajax.readyState == 4 && ajax.status == 200) {
			loadCallback(ajax.responseText);
    }
	}

  ajax.addEventListener("error", errorCallback);

  ajax.send();
}

function domInit(selector) {
  this.selector = selector;
  this.elements = document.querySelectorAll(selector);


  this.html = function(content) {
    this.elements.forEach((value, index, array) => {
      value.innerHTML = content;
    })
    return this;
  };


//Get the value of a attribute from elements.
  this.getAttr = function(attr) {
    let tempArr = [];
     this.elements.forEach((value, index, array) => {
       tempArr.push(value.getAttribute(attr));
     });
     return tempArr;
  };

  this.addEvent = function(tempEvent, callback) {
    this.elements.forEach((value, index, array) => {
      value.addEventListener(tempEvent, callback);
    });
    return this;
  };

  return this;
}


function dom(selector) {
  return new domInit(selector);
}

function showContent(content) {
  dom('div.steps').html(content);
}

function isSpace(value) {
  return (value.split(' ').length >= 2) ? true : false;
}

console.log(dom('.step').getAttr('data-step'));

dom('button#previousStep').addEvent('click', function(e) {
  let currentStep = parseInt(dom('div.step').getAttr('data-step')[0]) - 1;
  if(currentStep < 0) {return false;}
  ajax_get('steps/step' + currentStep + '.html', afterLoad);
});


dom('button#nextStep').addEvent('click', function(e) {
  let currentStep = parseInt(dom('div.step').getAttr('data-step')[0]) + 1;
  if(currentStep > 4) {return false;}
  ajax_get('steps/step' + currentStep + '.html', afterLoad);
});




function afterLoad(content) {
  showContent(content);

  dom('input#folder').addEvent('keyup', function(e) {
    let spaceBool = isSpace(this.value);
		if(spaceBool) {
			dom('code#zoekFolderCommando'	).html('cd "' + this.value + '"');
		} else {
			dom('code#zoekFolderCommando').html('cd ' + this.value);
		}
  });

	dom('input#cloneUrl').addEvent('keyup', function(e){
		let spaceBool = isSpace(this.value);
		if(spaceBool) {
			dom('code#cloneCommand').html('git clone "' + this.value + '"');
		} else {
			dom('code#cloneCommand').html('git clone ' + this.value);
		}
	});

	dom('input#commitComment').addEvent('keyup', function() {
		dom('code#commitCommand').html('git commit -a -m "' + this.value + '"');
	});

	dom('code[data-copy]').addEvent('click', function(e) {
		window.getSelection().selectAllChildren(this);
		if(document.execCommand('copy')) {
			alert('copy made');
		}
	});
}


























//
