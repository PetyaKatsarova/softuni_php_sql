<?php

class Zebra extends MammalAbstract{

    public function __construct($name,$type,$weight, $livingConditions)
    {
        parent::__construct($name,$type,$weight, $livingConditions);
    }

    public function makeSound(): void{
         echo "Zs<br/>";
    }
    public function eat(FoodAbstract $food): void{

    }
}