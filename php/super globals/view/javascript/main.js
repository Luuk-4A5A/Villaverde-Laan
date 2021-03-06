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


var submitButton = document.querySelector('#submitButton');

submitButton.addEventListener('click', (e) => {
	var values = document.querySelectorAll('input');
	var string = '';
	for(var i = 0; i < values.length; i++) {
		string += values[i].name + '=' + values[i].value + '&';
	}

	string = string.slice(0, -1);

	ajax_post('/ajax', string, responseText => {
		var resultBox = document.querySelector('#result');
		var json = JSON.parse(responseText);
		resultBox.innerHTML = json.result;
	});
});