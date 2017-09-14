var video = document.querySelector('#video');
var playButton = document.querySelector('.player__button');

playButton.addEventListener('click', (e) => {
	if(video.paused === true) {
		var interVal = setInterval((e) => {
			setTimeBar();
		}, 10);
		video.play();
	} else {
		clearInterval(interVal);
		video.pause();
	}
});

function setTimeBar() {
	var percentage = video.currentTime / video.duration * 100;
	document.querySelector('.progress__filled').style.width = percentage + '%';
}

var bar = document.querySelector('.progress');

bar.addEventListener('click', e => {
	var percentage = e.offsetX / bar.offsetWidth * 100;
	var videoTime = (percentage / 100) * video.duration;
	document.querySelector('.progress__filled').style.width = percentage + '%';
	video.currentTime = videoTime;
});


var audio = document.querySelector('input[name="volume"]');

audio.addEventListener('change', (e) => {
	video.audio = audio.value;
	console.log(audio.value);
});

var playback = document.querySelector('input[name="playbackRate"]');

playback.addEventListener('change', (e) => {
	video.playbackRate = playback.value;
});

var buttons = document.querySelectorAll('button[data-skip]');

buttons[0].addEventListener('click', (e) => {
	video.currentTime -= parseInt(buttons[0].attributes[0].nodeValue);
	console.log(buttons[0].attributes[0].nodeValue);
});

buttons[1].addEventListener('click', (e) => {
	video.currentTime += parseInt(buttons[1].attributes[0].nodeValue);
	console.log(buttons[1].attributes[0].nodeValue);
});

var videoPlayer = document.querySelector('#video');
var player = document.querySelector('.player__controls');

videoPlayer.addEventListener('dblclick', e => {
	if(video.requestFullScreen){
		video.requestFullScreen();
	} else if(video.webkitRequestFullScreen){
		video.webkitRequestFullScreen();
	} else if(video.mozRequestFullScreen){
		video.mozRequestFullScreen();;
	}
});