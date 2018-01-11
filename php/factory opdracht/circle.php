<?php

class Circle extends Shape {
  public function getArea() {
    return ($this->number * $this->number) * pi();
  }
}
