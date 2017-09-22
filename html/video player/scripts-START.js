var documentElements = document.querySelectorAll('.timer__button');
var settingInterval = '';

if(Boolean(location.search)) {
  var minutesSet = location.search.split('=');
  var initialTime = minutesSet[1] * 60;
  settingInterval = setInterval(() => {
    document.querySelector('.display__time-left').innerHTML = showTime(initialTime);
    if(initialTime === 0) {
      clearInterval(settingInterval);
    }

    initialTime -= 1;
  }, 1000);
}

for(var i = 0; i < documentElements.length; i++) {
  documentElements[i].addEventListener('click', (e) => {
    clearInterval(settingInterval);
    document.querySelector('.display__time-left').innerHTML = showTime(e.srcElement.dataset.time);
    var initialTime = parseInt(e.srcElement.dataset.time - 1);

    settingInterval = setInterval((intervalEvent) => {
      document.querySelector('.display__time-left').innerHTML = showTime(initialTime);
      if(initialTime === 0) {
        clearInterval(settingInterval);
      }

      initialTime -= 1;
    }, 1000);
  });
}



function showTime(time) {
  let showTime = (time % 60 < 10) ? '0' + time % 60 : time % 60;
  let currentMinutes = (Math.floor(time / 60) < 10) ? '0' + Math.floor(time / 60) : Math.floor(time / 60);
  return currentMinutes + ':' + showTime;
}
