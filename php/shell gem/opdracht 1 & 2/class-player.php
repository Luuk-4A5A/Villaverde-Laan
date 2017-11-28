<?php

class Player {
  public $player;
  public $amount;

  public function __construct($name, $amount) {
    $this->player = $name;
    $this->amount = $amount;
  }

    public function show() {
    return '<div class="player"><strong>' . $this->player . ':' . $this->amount . '</strong></div>';
  }

}
