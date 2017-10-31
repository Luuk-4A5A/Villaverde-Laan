function ajax_get(url, loadCallback, errorCallback) {
	var ajax = new XMLHttpRequest();
	ajax.open("GET", url, true);

	ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	ajax.onreadystatechange = function() {
		if(ajax.readyState == 4 && ajax.status == 200) {
			loadCallback(ajax.responseText);
      clearInterval(interval);
    }
	}

  ajax.addEventListener("error", errorCallback);

  ajax.send();

  var timeout = 0;
  var interval = setInterval((e) => {

    if(timeout === 10) {
      ajax.abort();
      alert('this file took too long');
      clearInterval(interval);
    }
    console.log(timeout);
    timeout++;
  }, 100);

}


var helloWorld = document.getElementById('helloWorld');

helloWorld.addEventListener('click', (e) => {
  ajax_get('helloWorld.txt', (responseText) => {
    e.path[1].innerHTML = responseText;
    alert(responseText);
  });
});

var loremIpsum = document.getElementById('loremIpsum');

loremIpsum.addEventListener('click', (e) => {
  ajax_get('loremIpsum.txt', (responseText) => {
    e.path[1].innerHTML = responseText;
  });
});

var img = document.getElementById('img');

img.addEventListener('click', (e) => {
  console.log('hi');
  ajax_get('imgurl.txt', (responseText) => {
    // e.path[1].innerHTML = responseText;
    e.path[1].innerHTML = '<img src="' + responseText + '">';
  });
});

var delay = document.getElementById('delay');

delay.addEventListener('click', (e) => {
  ajax_get('delay.php', (responseText) => {
    e.path[1].innerHTML = responseText;
  });
});






//
