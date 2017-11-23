<?php

function printr($array) {
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}

abstract Class Math {
  protected $numbers;

/**
 *
 *
 * @param array $numbers Numbers given on initialization
*/

  public function __construct(array $numbers = []) {
    $this->numbers = $numbers;
  }

  public function getNumbers() {
      return $this->numbers;
  }

  abstract protected function calc($number, $arrayNumber);

  protected function DoCalc($array) {
    $number = $this->numbers[0];
    for($i = 1; $i < count($this->numbers); $i++) {
      $number = $this->calc($number, $this->numbers[$i]);
    }
    return $number;
  }

}

Class Sum extends Math {
  protected function calc($number, $arrayNumber) {
    return $number + $arrayNumber;
  }

  public function calculate() {
    return $this->doCalc($this->numbers);
  }
}


Class Subtract extends Math {
  protected function calc($number, $arrayNumber) {
    return $number - $arrayNumber;
  }

  public function calculate() {
    return $this->doCalc($this->numbers);
  }
}




Class Multiply extends Math {
  protected function calc($number, $arrayNumber) {
    return $number * $arrayNumber;
  }

  public function calculate() {
    return $this->doCalc($this->numbers);
  }
}


$sum = new Sum([5, 10, 34]);
echo $sum->calculate() . '<br>';
printr($sum->getNumbers());

$subtract = new Subtract([5, 10, 34]);
echo $subtract->calculate() . '<br>';
printr($subtract->getNumbers());

$multiply = new Multiply([5, 10, 34]);
echo $multiply->calculate() . '<br>';
printr($multiply->getNumbers());
