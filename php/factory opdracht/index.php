<?php
require_once('shapeinterface.php');
require_once('shapefactory.php');
require_once('shape.php');


$circle = ShapeFactory::create('circle', 3);
$circleArea = $circle->getArea();

echo $circleArea . '<br>';


$square = ShapeFactory::create('square', 3);
$squareArea = $square->getArea();

echo $squareArea;
