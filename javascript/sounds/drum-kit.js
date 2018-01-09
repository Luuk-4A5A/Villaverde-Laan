dom('[data-key]').addEvent('click', function() {
  let element = dom(this);
  let thisDataKey = element.getAttr('data-key');
  let audioSrc = dom('audio[data-key="' + thisDataKey + '"]').getAttr('src');


  element.toggleClass('playing');
  playAudio(audioSrc);
  setTimeout(function() {
    element.toggleClass('playing');
  }, 90);
});

dom(document).addEvent('keydown', function(e) {
  let keypressed = dom('[data-key="' + e.keyCode + '"]');

  if(keypressed.elements.length !== 2) {
    console.log('not a sound you can make');
    return '';
  }

  keypressed.toggleClass('playing');

//keypressed.elements[1].src
  playAudio(keypressed.elements[1].src);
});


dom(document).addEvent('keyup', function(e) {
  let keypressed = dom('[data-key="' + e.keyCode + '"]');
  if(keypressed.elements.length !== 2) {
    console.log('not a sound you can make');
    return '';
  }
  keypressed.toggleClass('playing');
});

function playAudio(src) {
  let audio = new Audio(src);
  audio.play();
}
