<?php
abstract class AnimalAbstract{
    private $name;
    private $type;
    private $weight;
    private $foodEaten;

    protected function __construct(string $name, string $type, float $weight)
    {
        $this->name = $name;
        $this->type = $type;
        $this->weight = $weight;
        $this->foodEaten = 0; //int
    }

    public function getType():string{
        return $this->type;
    }
    public function getNam():string{
        return $this->name;
    }
    public function getWeight():float{
        return $this->weight;
    }

    protected function setFoodEaten(float $quantity):void{
        $this->foodEaten += $quantity;
    }
    public function getFoodEaten(){
        return $this->foodEaten;
    }

      // get the name of the class instance of $food:
    public function getClassName($food){
        $name = new \ReflectionClass($food);
        return $name->getName();
    }
    public function __toString()
    {
        return sprintf( "%s [%s, %s, %d] ", 
                      $this->getType(), $this->getNam(), $this->getWeight(), $this->getFoodEaten()) . "<br/>";
    }

    public abstract function makeSound():void;
    public abstract function eat(FoodAbstract $food):void;

}