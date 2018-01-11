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

function addEvent(element, event, callback) {
	element['on' + event] = callback;
}

function processDelete(id) {
	ajax_get('/ContactController/handleRequest/delete/' + id + '/submit', responseText => {return 0;});
}

var array = document.querySelectorAll('select');

function createSelectBoxes() {
	array = document.querySelectorAll('select');
	for(var i = 0; i < array.length; i++) {
		addEvent(array[i], 'change', e => {
			ajax_get('/ContactController/handleRequest/select/' + e.srcElement.value + '/' + e.srcElement.childNodes[0].value, responseText => {
				document.getElementById('parseSelect').innerHTML = responseText;
				createSelectBoxes();
			});
		});
	}
}


createSelectBoxes();
// selectbox.addEventListener('change', e => {
// 	console.log(selectbox.value, selectbox);
// 	ajax_post('ajax/emailSelect.php', 'id=' + selectbox.value, responseText => {
// 		document.getElementById('parseSelect').innerHTML = responseText;
// 	});
// });