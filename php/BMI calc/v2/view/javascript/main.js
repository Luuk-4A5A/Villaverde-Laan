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


function getCookie(name) {
	var values = document.cookie.split(';');
	var arr = [];
	for(var i = 0; i < values.length; i++) {
		arr[i] = values[i].split('=');
	}
	for(var ii = 0; ii < arr.length; ii++) {
		if(arr[ii][0].replace(/ /g,'') == name) {
			return arr[ii][1];
		}
	}
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

		for (var key in json) {
    if (!json.hasOwnProperty(key)) continue;
    var obj = json[key];
		var string = '<table><tr>';

		string += '<th>height</th>';
		string += '<th>weight</th>';
		string += '<th>result</th>';
		string += '</tr>';


    for (var prop in obj) {
	        if(!obj.hasOwnProperty(prop)) continue;
					string += '<tr>';
					string += '<td>';
					string += obj[prop].height;
					string += '</td>';
					string += '<td>';
					string += obj[prop].weight;
					string += '</td>';
					string += '<td>';
					string += obj[prop].result;
					string += '</td>';
					string += '</tr>';
			}
		string += '</table>';
		}

		document.getElementById('result').innerHTML = string;

	});
});
















//wd
