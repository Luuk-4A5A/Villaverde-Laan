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

function ajax(options) {
	let httpTypes = ["GET", "POST"];
	let ajaxObj = {};
	ajaxObj.type = (Boolean(options.type) && httpTypes.indexOf(options.type) !== -1) ? options.type : 'GET';
	ajaxObj.url = (Boolean(options.url)) ? options.url : '/';

	ajaxObj.processData = (Boolean(options.processData)) ? options.processData : true;
	ajaxObj.data = (Boolean(options.data)) ? options.data : {};
	ajaxObj.success = (Boolean(options.success)) ? options.success : function(responseText){console.log(responseText)};

	ajaxObj.serialize = function(obj) {
		let objArr = Object.entries(obj);
		var string = ''
		objArr.forEach(function(value, index, array) {
			string += value[0] + '=' + value[1] + '&';
		});

		string = string.slice(1, -1);
		return string;
	}

	if(ajaxObj.processData == true) {
		ajaxObj.httpString = ajaxObj.serialize(ajaxObj.data);
	}

	if(ajaxObj.type === 'GET') {
		ajaxObj.url = ajaxObj.url += '?' + ajaxObj.httpString;
	}

	let ajax = new XMLHttpRequest();
	ajax.open(ajaxObj.type, ajaxObj.url, true);
	ajax.onreadystatechange = function() {
		if(ajax.readyState == 4 && ajax.status == 200) {
			ajaxObj.success(ajax.responseText);
		}
	}

	ajax.send(ajaxObj.httpString);

}

function dom(selector) {
  return new domInit(selector);
}







// hey mark voor placeholder.
