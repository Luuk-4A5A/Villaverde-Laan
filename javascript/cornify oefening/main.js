var array = [];


document.addEventListener('keypress', (e) => {
	array.push(e.key);
	var string = '';
	
	for(var i = array.length - 7; i < array.length; i++) {
		string += array[i];
	}

	if(string === 'cornify') {
		cornify_add();
	}


	console.log(array);
});