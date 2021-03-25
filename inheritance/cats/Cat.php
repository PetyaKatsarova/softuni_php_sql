<?php
abstract class Cat{
    private $name;
    private $breed;

    protected function __construct(string $name, string $breed)
    {
        $this->setName($name);
        $this->setBreed($breed);
    }
    private function setName($name):void{
        $this->name = $name;
    }
    private function setBreed($breed):void{
        $this->breed = $breed;
    }
    public function getName():string{
        return $this->name;
    }
    public function getBreed():string{
        return $this->breed;
    }
    public function __toString()
    {
        return $this->name . " " . $this->getBreed();
    }
}