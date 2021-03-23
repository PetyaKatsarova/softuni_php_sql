<?php
require_once 'Circle.php';

$circle = new Circle(10);
echo $circle->__toString();

// input: $myCircle with radius 10 mm.
// output: Circle, radius = 10 mm, area = … mm