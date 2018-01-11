<?php

abstract class Shape implements ShapeInterface {
  protected $number = 0;

  public function __construct(int $number) {
    $this->number = $number;
  }

  abstract public function getArea();
}
