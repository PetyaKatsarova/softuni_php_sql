<?php
// require_once 'Cat.php';

class Siamese extends Cat{
    private $earSize;

    public function __construct(string $name, string $breed, int $earSize)
    {
        parent::__construct($name,$breed);
        $this->setEarsize($earSize);
    }

    private function setEarsize($earSize):void
    {
        $this->earSize = $earSize;
    }

    public function getEarsize():int
    {
        return $this->earSize;
    }

    public function __toString()
    {
        return parent::__toString() . " " . $this->getEarsize(); 
    }
}
