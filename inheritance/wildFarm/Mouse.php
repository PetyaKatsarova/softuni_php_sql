<?php

class Mouse extends MammalAbstract{

    public function __construct($name,$type,$weight, $livingConditions)
    {
        parent::__construct($name,$type,$weight, $livingConditions);
    }

    public function makeSound(): void{
         echo "SQUEEEAAAK!<br/>";
    }
    public function eat(FoodAbstract $food): void{

    }
}