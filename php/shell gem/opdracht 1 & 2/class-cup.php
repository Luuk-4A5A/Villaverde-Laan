<?php

class Cup {
  public $color;
  public $type;
  public $ball = '';
  public $id;

  public function __construct($color, $type, $id, $ball = '') {
    $this->color = $color;
    $this->type = $type;
    $this->id = $id;
    $this->ball = (isset($ball) && $ball !== '') ? $ball->show() :'';
  }

  public function show() {
    return '<a href="/?guess=' . $this->id . '" class="cup ' . $this->color . '">' . $this->ball . '</a>';
  }

  public function liftUp() {
    return '<a href="/?guess=' . $this->id . '" class="cup ' . $this->color . ' liftup">' . $this->ball . '</a>';
  }

  public function putDown() {
    return '<a href="/?guess=' . $this->id . '" class="cup ' . $this->color . ' putdown">' . $this->ball . '</a>';
  }
}
