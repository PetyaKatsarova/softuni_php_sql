<?php
require_once 'AreaInterface.php';

class Circle implements AreaInterface{
   
    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }
     // area of circle = 2pi*r;
    public function getSurface():float
    {
        return 2 * 3.14 * $this->radius;
    }
    public function __toString()
    {   
        $surface =  $this->getSurface();
        return basename(get_class($this)) . ", radius = $this->radius mm, area = $surface mm";
    }
}
// input: $myCircle with radius 10 mm.
// output: Circle, radius = 10 mm, area = … mm