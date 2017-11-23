<?php

function printr($array) {
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}

abstract Class Dice {
  protected $images;

  public function __construct() {

  }

  public function roll($number = 3) {
    $numberArray = [];
    $string = '';

    for($i = 0; $i < $number; $i++) {
      array_push($numberArray, $this->getNumber());
    }

    foreach($numberArray as $row) {
      $string .= '<img src="images/' . $this->images[$row] . '.svg" style="width:100px;height:100px;">';
    }

    return $string;
  }


  protected function getNumber() {
    return rand(1, 6);
  }
}


class DiceNormal extends Dice {
  protected $images = [
    1 => 'dice-six-faces-one',
    2 => 'dice-six-faces-two',
    3 => 'dice-six-faces-three',
    4 => 'dice-six-faces-four',
    5 => 'dice-six-faces-five',
    6 => 'dice-six-faces-six'
  ];
}

class DicePerspective extends Dice {
  protected $images = [
    1 => 'perspective-dice-six-faces-one',
    2 => 'perspective-dice-six-faces-two',
    3 => 'perspective-dice-six-faces-three',
    4 => 'perspective-dice-six-faces-four',
    5 => 'perspective-dice-six-faces-five',
    6 => 'perspective-dice-six-faces-six'
  ];
}

class DicePerspectiveNormal extends Dice {
  protected $images = [
    1 => 'perspective-dice-one',
    2 => 'perspective-dice-two',
    3 => 'perspective-dice-three',
    4 => 'perspective-dice-four',
    5 => 'perspective-dice-five',
    6 => 'perspective-dice-six'
  ];
}

class Inverted extends Dice {
  protected $images = [
    1 => 'inverted-dice-1',
    2 => 'inverted-dice-2',
    3 => 'inverted-dice-3',
    4 => 'inverted-dice-4',
    5 => 'inverted-dice-5',
    6 => 'inverted-dice-6'
  ];
}


$diceNormal = new DiceNormal();
echo $diceNormal->roll();

echo '<br>';

$dicePerspective = new DicePerspective();
echo $dicePerspective->roll();

echo '<br>';

$dicePerspectiveNormal = new DicePerspectiveNormal();
echo $dicePerspectiveNormal->roll();

echo '<br>';

$inverted = new Inverted();
echo $inverted->roll();
