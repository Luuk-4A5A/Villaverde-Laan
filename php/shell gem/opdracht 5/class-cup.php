<?php
interface CupInterface {
  /**
   * Gives an element back with a cup inside of it
   * @return string
   */
  public function show();

  /**
   * Gives element back with "liftup" class in it.
   * @return string
   */
  public function liftUp();

  /**
   * Gives element back with "putDown" class in it.
   * @return [type] [description]
   */
  public function putDown();

  /**
   * Sets the ball inside of the cup object (only with BallInterface implemented).
   * @param BallInterface $ball Ball object.
   */
  public function setBall(BallInterface $ball);

  /**
   * returns the public show() method
   * @return string
   */
  public function __toString();
}

class Cup implements CupInterface {
  public $color;
  public $type;
  public $ball = '';
  public $id;
  public $hasBall;

  /**
   * sets all the objects properties.
   * @param string  $color
   * @param string  $type
   * @param int  $id
   * @param BallInterface object $ball
   * @param boolean $hasBall
   */
  public function __construct($color, $type, $id, BallInterface $ball = null, $hasBall) {
    $this->color = $color;
    $this->type = $type;
    $this->id = $id;
    $this->hasBall = $hasBall;
    $this->ball = (isset($ball) && $ball !== null) ? $ball->show() : '';
  }

  public function setBall(BallInterface $ball) {
    $this->ball = (isset($ball) && $ball !== null) ? $ball->show() : '';
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

  public function __toString() {
    return $this->show();
  }
}
