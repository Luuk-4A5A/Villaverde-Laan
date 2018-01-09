<?php
/**
 * ball interface implements ball
 *
 */
interface BallInterface {
  /**
   *
   * @return string returns a div element with the ball inside of it.
   */
  public function show();

  /**
   *
   * @return string same as show but you can call it differently.
   */
  public function __toString();
}


final class Ball implements BallInterface {
  public $color;

  public function __construct($color) {
    $this->color = $color;
  }

  public function show() {
    return '<div class="ball ' . $this->color . '"></div>';
  }

  public function __toString() {
    return $this->show();
  }

}
