<?php

abstract class Player {
  public $player;
  public $amount;

  public function __construct($name, $amount) {
    $this->player = $name;
    $this->amount = $amount;
  }

  public function show() {
    return '<div class="player"><strong>' . $this->player . ':' . $this->amount . '</strong></div>';
  }

  abstract public function __toString();


}

class HumanPlayer extends Player {
  public function __toString() {
    return $this->show();
  }

}

class ComputerPlayer extends Player {
  public function __toString() {
    return '';
  }
}
