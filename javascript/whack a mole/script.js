var holes = dom('.hole');
var scoreBoard = dom('.score');
var moles = dom('.mole');
let active = null;
let score = 0;
let clickCounter = 0;

var startButton = dom('[data-action="startGame"]');

startButton.addEvent('click', function () {
    startGame();
});


function startGame() {
  setInterval(function(){mole(400, 699)}, 700);
}

function mole(min, max) {
  var currentMole = random(1, 6);
  let hole = dom('.hole' + currentMole);


  if(active === currentMole) {
    mole(400, 700);
    return false;
  }

  let timeout = random(min, max);


  hole.toggleClass('up');
  setTimeout(function() {
    clickCounter = 0;
    hole.toggleClass('up');
  }, timeout);


  active = currentMole;
}


moles.addEvent('click', function() {
  console.log(clickCounter);
  if(clickCounter < 1) {
    score += 1;
    scoreBoard.html(score);
  } else if(clickCounter >= 1) {
    return false;
  }

  clickCounter += 1;
});


function random(min, max, except) {
  return Math.floor(Math.random()*(max-min+1)+min);
}
