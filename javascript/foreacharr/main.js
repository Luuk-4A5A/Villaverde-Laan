var numbers = [2, 6, 11, 5, 9, 8, 3, 46, 4];

numbers.forEach((value, index, arr) => {
	var val = (typeof arr[index + 1] === 'undefined') ? arr[index] : arr[index] + arr[index + 1];
	console.log('item ' + index + ' = ' + val);
});


var oddEven = document.querySelectorAll('ul[data-show-oddeven] li');

oddEven.forEach((value, index, arr) => {
	if(calcOddEven(index + 1)) {
		value.title = 'even';
	} else {
		value.title = 'odd';
	}
});


function calcOddEven(number) {
	return number % 2;
}
