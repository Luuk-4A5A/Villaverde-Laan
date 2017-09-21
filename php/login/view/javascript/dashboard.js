let hamburgerMenu = document.getElementById('hamburger_menu');
let menuToggle = false;

addEvent(hamburgerMenu, 'click', () => {
	var sidebar = document.getElementById('sidebar');
	if(menuToggle) {
		sidebar.style.left = -sidebar.clientWidth + 'px';
		menuToggle = false;
		return 0;
	} else {
		sidebar.style.left = 0 + 'px';
		menuToggle = true;
		return 0;
	}
});


let messageBool = false;

function toggleMessage() {
	var messageBoard = document.getElementById('messageBoard');
	if(messageBool) {
		messageBoard.style.display = 'none';
		messageBool = false;
		return 0;
	} else {
		messageBoard.style.display = 'block';
		messageBool = true;
		return 0;
	}
}
