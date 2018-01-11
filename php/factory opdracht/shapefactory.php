<?php

class ShapeFactory {
  private $number = 0;
  static private $shapes = ['circle', 'square'];

  static public function create(string $shape, int $number) {
    if(!in_array($shape, static::$shapes)) {
      return false;
    }

    if(!file_exists($shape . '.php')) {
      return false;
    }

    require_once($shape . '.php');
    return new $shape($number);
  }
}
