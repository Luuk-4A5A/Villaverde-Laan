<?php
require_once('class-game.php');
require_once('class-ball.php');
require_once('class-player.php');
require_once('class-cup.php');





function startGame() {
  $ball = new Ball('red');
  $luuk = new Player('Luuk', 100);
  $cups = [];
  $randomNumer = rand(0, 2);

  for($i = 0; $i < 3; $i++) {
    $addBall = ($randomNumer == $i) ? $ball : '';
    array_push($cups, new Cup('yellow', 'plastic', $i, $addBall));
  }


  $game = generateView($luuk, $cups);

  $_SESSION['cups'] = $cups;
  $_SESSION['player'] = $luuk;
  return $game;
}

function generateView($player, $cups) {
  $game = '<div class="cups">';

  $count = 0;
  foreach($cups as $row) {
    if(isset($_GET['guess']) && $_GET['guess'] < 3 && $count == $_GET['guess']) {
        $game .= $row->liftUp();
    } else {
        $game .= $row->putDown();
    }
    $count++;
  }

  $game .= '<div class="clear"></div></div>';

  $game .= $player->show();

  return $game;
}



include('view.php');
