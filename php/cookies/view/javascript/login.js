var loginButton = document.getElementById('loginButton');

addEvent(loginButton, 'click', login);

addEvent(document, 'keypress', login);

function login(e) {
	if(e.type == 'keypress' && e.key == 'Enter' || e.type == 'click'){
		var data = gatherData();
		ajax_post('/login/loginrequest', data, responseText => {
			handleJson(responseText);
		});
	}
}

function handleJson(jsonString) {
	var json = JSON.parse(jsonString);
	document.location.href = json.location;
}



function gatherData() {
	var string = '';
	elements = document.querySelectorAll('input[formdata]');
	for(var i = 0; i < elements.length; i++) {
		string += elements[i].name + '=' + elements[i].value + '&';
	}

	string = string.slice(0, -1);

	return string;
}


console.log(navigator.userAgent);
