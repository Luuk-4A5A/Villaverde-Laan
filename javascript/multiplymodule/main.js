function multiplyModule() {
	
	function multiply() {
		const value1 = document.querySelector('input[name="firstNumber"]').value;
		const value2 = document.querySelector('input[name="secondNumber"]').value;

		return value1 * value2;
	}

	document.querySelector('#multiply').addEventListener('click', e => {
		var result = multiply();
		document.getElementById('result').innerHTML = result;
	});
}