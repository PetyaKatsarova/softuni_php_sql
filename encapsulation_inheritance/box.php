<?php 
class Box{
    private $length; 
    private $width; 
    private $height;

    public function __construct($l, $w, $h)
    {
        $this->length = $l;
        $this->width = $w;
        $this->height = $h;
    }
    public function printSurfaceArea(){
        //  formula surfaceArea = 2lw + 2lh + 2wh
        $surfaceArea = 2*($this->length)*($this->width) + 2*($this->length)*($this->height) + 2*($this->height)*($this->width);
       echo 'Surface Area - ' . round($surfaceArea, 2);
    }
    // = 2lh + 2wh
    public function printLateralSurface(){

    }
    // = lwh
    public function printVolume(){
        $volume = $this->length * $this->width * $this->height;
       echo 'Volume - ' . round($volume, 2);
    }
}
$box1 = new Box(2,3,4);
echo $box1->printSurfaceArea() . "<br>";// surfacearea - 52.00
echo $box1->printVolume();//volum - 24.00
echo '<br>-------------------<br>';
$box2 = new Box(1.3, 1, 6);
echo $box2->printSurfaceArea() . "<br>";// surfacearea - 30.20
echo $box2->printVolume();// volume - 7.80



// You are given a geometric figure box with parameters length, width and height. Model a class Box that that can be instantiated by the same three parameters. Expose to the outside world only methods for its surface area, lateral surface area and its volume (formulas: http://www.mathwords.com/r/rectangular_parallelepiped.htm).The lateral surface area of a three-dimensional object is the surface area of the object minus the area of its bases.On the first three lines you will get the length, width and height. Print three lines with the surface area, lateral
// surface area and the volume of the box:
// input            output
// 15           Surface Area - 1298.00
// 23           Lateral Surface Area - 608.00
// 8            Volume - 2760.00 



