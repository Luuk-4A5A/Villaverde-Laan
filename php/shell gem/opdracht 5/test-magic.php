<?php
require_once('class-ball.php');
require_once('class-magic-ball.php');


$magicBall = new MagicBall('red');
$magicBall->size = 20;
$magicBall->type = 'soft';
echo $magicBall->show();
