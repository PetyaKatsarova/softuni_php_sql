<?php
// require_once 'Cat.php';

class Streetcat extends Cat{
    private $deciblesOfMeows;

    public function __construct(string $name, string $breed, int $deciblesOfMeows)
    {
        parent::__construct($name,$breed);
        $this->setDeciblesOfMeows($deciblesOfMeows);
    }

    private function setDeciblesOfMeows($deciblesOfMeows):void
    {
        $this->deciblesOfMeows = $deciblesOfMeows;
    }

    public function getDeciblesOfMeows():int
    {
        return $this->deciblesOfMeows;
    }

    public function __toString()
    {
        return parent::__toString() . " " . $this->getDeciblesOfMeows(); 
    }
}

