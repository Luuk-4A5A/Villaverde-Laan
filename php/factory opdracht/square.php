<?php

class Square extends Shape {
  public function getArea() {
    return $this->number * $this->number;
  }
}
