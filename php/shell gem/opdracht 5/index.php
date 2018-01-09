<?php
require_once('class-game.php');
require_once('class-ball.php');
require_once('class-player.php');
require_once('class-cup.php');
session_start();


$ball = new Ball('red');
$luuk = (isset($_SESSION['player']) && !empty($_SESSION['player'])) ? $_SESSION['player'] : new HumanPlayer('Luuk', 100);
$cups = createCupsArray('yellow', 'glass', $ball, 5, 4);

/**
 * returns array full of cup objects, with one of them a ball object in them.
 * @param  string $color
 * @param  string $type
 * @param  object $ball
 * @return array Full of cups!
 */
function createCupsArray($color, $type, $ball, $amount = 3, $amountBalls = 1) {
  if($amount <= $amountBalls) {
    return [];
  }
  $cups = [];
  $randomNumber = rand(0, $amount - 1);

  for($i = 0; $i < $amount; $i++) {
    $addBall = ($randomNumber == $i) ? $ball : null;
    $boolean = ($randomNumber == $i) ? true : false;
    array_push($cups, new Cup($color, $type, $i, $addBall, $boolean));
  }
  return $cups;
}


/**
 *
 * @return array met ball of null in index 0, en true or false in
 */
function addBall($amount, $numbers, Ball $ball) {

}


$game = new Game($ball, $luuk, $cups);


include('view.php');
