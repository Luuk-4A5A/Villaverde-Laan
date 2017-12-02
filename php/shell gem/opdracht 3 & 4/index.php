<?php
require_once('class-game.php');
require_once('class-ball.php');
// require_once('class-magic-ball.php');
require_once('class-player.php');
require_once('class-cup.php');
session_start();


$ball = new Ball('red');
$luuk = (isset($_SESSION['player']) && !empty($_SESSION['player'])) ? $_SESSION['player'] : new HumanPlayer('Luuk', 100);
$cups = createCupsArray('yellow', 'glass', $ball);

/**
 * returns array full of cup objects, with one of them a ball object in them.
 * @param  string $color
 * @param  string $type
 * @param  object $ball
 * @return array Full of cups!
 */
function createCupsArray($color, $type, $ball) {
  $cups = [];
  $randomNumer = rand(0, 2);
  for($i = 0; $i < 3; $i++) {
    $addBall = ($randomNumer == $i) ? $ball : null;
    $boolean = ($randomNumer == $i) ? true : false;
    array_push($cups, new Cup($color, $type, $i, $addBall, $boolean));
  }
  return $cups;
}

$game = new Game($ball, $luuk, $cups);


include('view.php');
