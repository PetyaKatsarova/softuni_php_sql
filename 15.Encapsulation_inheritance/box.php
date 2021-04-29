<?php 
class Box{
    /** 
    * @var float
    */
    private $length; 
    private $width; 
    private $height;

    /*
    @param float $length
    @param float $width
    @param float $height
    */
    public function __construct(float $l, float $w, float $h)
    {
        $this->setLength($l);
        $this->setWidht($w);
        $this->setHeight($h);;
    }

    // use if you need validation
    private function setLength($l):void{
        $this->validateInput($l, "Length");
        $this->length = $l;
    }
    private function setWidht($w):void{
        $this->validateInput($w, 'Width');
        $this->width = $w;
    }
    private function setHeight($h):void{
        $this->validateInput($h, 'Height');
        $this->height = $h;
    }
    public function getHeight():float{
        return $this->height;
    }
    public function getWidth():float{
        return $this->width;
    }
    public function getLength():float{
        return $this->length;
    }
    private function getVolume():float{
        return $this->getLength()*$this->getWidth()*$this->getHeight();
    }
    private function getSurfaceArea():float{
        //  formula surfaceArea = 2lw + 2lh + 2wh
        return 2*($this->getLength() * $this->getWidth()) + 2*($this->getLength()*$this->getHeight()) + 2*($this->getHeight() * $this->getWidth());
    }
    private function validateInput(float $val, string $param):void{
        if($val <= 0){
            throw new Exception("$param can't be negative.");
        }
    }


    public function __toString()
    {
     // $volume = number_format($volume, decimals:2, dec_point:'.', thousands_sep:'');
       $volume = number_format($this->getVolume(), 2, '.', '');
       $surfaceArea = number_format($this->getSurfaceArea(), 2, '.', '');
       return "Surface Area - {$surfaceArea} <br/> Volume - {$volume}";
    }
}
$box1 = new Box(2,3,4);
echo $box1;//52.00 24.00
echo '<br>-------------------<br>';
$box2 = new Box(1.3, 1, 6);
echo $box2;// 30.20 7.80

// You are given a geometric figure box with parameters length, width and height. Model a class Box that that can be instantiated by the same three parameters. Expose to the outside world only methods for its surface area, lateral surface area and its volume (formulas: http://www.mathwords.com/r/rectangular_parallelepiped.htm).The lateral surface area of a three-dimensional object is the surface area of the object minus the area of its bases.On the first three lines you will get the length, width and height. Print three lines with the surface area, lateral
// surface area and the volume of the box:
// input            output
// 15           Surface Area - 1298.00
// 23           Lateral Surface Area - 608.00
// 8            Volume - 2760.00 



