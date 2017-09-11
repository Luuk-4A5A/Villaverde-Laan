function useBar(callback) {
	callback(1);
	callback(2);
	callback(3);
}
	
useBar((sentence) => {
	console.log('zin ' + sentence);
});