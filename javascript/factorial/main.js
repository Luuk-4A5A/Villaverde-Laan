const button = document.querySelector('#button');
const result = document.querySelector('#result');

button.addEventListener('click', e => {
	const calcInput = document.querySelector('#calcinput').value;
	result.innerHTML = 'result = ' + factorial(parseInt(calcInput));
});


function factorial(number) {
	if(number < 0){return 'Gamma-functie niet gedefiniëerd voor negetive getallen.'};
	if(number === 0){return 1;}
	var result = number;

	for(var i = number -1; i != 0; i--) {	
		result *= i;
	}

	return result;
}

console.log(factorial(8));