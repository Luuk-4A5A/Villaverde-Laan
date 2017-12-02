<?php

class MagicBall {
  // public $size;
  // public $type;


  public function show() {
    return 'MagicBall ' . 'color: ' . $this->color;
  }

  public function __set($name, $value) {
    $this->$name = $value;
    echo '$this->' . $name . ' = ' . $value;
  }

  public function __get($name) {
    echo $this->$name;
  }

  public function __call($name, $arguments) {

  }

  public function __destruct() {
    echo '<br>DESTRUCTED';
  }
}
