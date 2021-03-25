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
    protected function setFoodEaten($quantity):void{
        $this->foodEaten += $quantity;
    }
    public abstract function makeSound():void;

    public abstract function eat(FoodAbstract $food):void;

}