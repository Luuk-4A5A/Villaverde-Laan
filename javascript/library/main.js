function addEvent(element, event, callback) {
	element['on' + event] = callback;
}

function ajax_get(url, callback) {
	var ajax = new XMLHttpRequest();
	ajax.open("GET", url, true);

	ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	ajax.onreadystatechange = function() {
		if(ajax.readyState == 4 && ajax.status == 200) {
			callback(ajax.responseText);
		}
	}
	ajax.send();
}

function ajax_post(url, data, callback) {
	var ajax = new XMLHttpRequest();
	ajax.open("POST", url, true);

	ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	ajax.onreadystatechange = function() {
		if(ajax.readyState == 4 && ajax.status == 200) {
			callback(ajax.responseText);
		}
	}
	ajax.send(data);
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

function ajax(options) {
	let httpTypes = ["GET", "POST"]
	this.type = (Boolean(options.type) && httpTypes.indexOf(options.type) !== -1) ? options.type : 'GET';
	this.url = (Boolean(options.url)) ? options.url : '/';

	this.processData = (Boolean(options.processData)) ? options.processData : true;
	this.data = (Boolean(options.data)) ? options.data : {};



	let ajax = new XMLHttpRequest();
	ajax.open(this.type, this.url, true);


}


ajax({
	type : "GET"
});

function dom(selector) {
  return new domInit(selector);
}















// hey mark voor placeholder.
