<?php
// require_once 'Cat.php';

class Cymric extends Cat{
    private $furlength;

    public function __construct(string $name, string $breed, int $furlength)
    {
        parent::__construct($name,$breed);
        $this->setFurlength($furlength);
    }

    private function setFurlength(int $furlength):void
    {
        $this->furlength = $furlength;
    }

    public function getFurlength():int
    {
        return $this->furlength;
    }

    public function __toString()
    {
        return parent::__toString() . " " . $this->getFurlength(); 
    }
}
