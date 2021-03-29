<?php

class Mouse extends MammalAbstract{

    public function __construct($name,$type,$weight, $livingConditions)
    {
        parent::__construct($name,$type,$weight, $livingConditions);
    }

    public function makeSound(): void{
         echo "<br/>SQUEEEAAAK!<br/>";
    }
  
    public function eat(FoodAbstract $food): void{
        $className = new \ReflectionClass($this);

        if("Vegetable" !== $this->getClassName($food)){
            echo $className->getName() . " can't eat " . $this->getClassName($food) . "<br/>";
        }else{
            $this->setFoodEaten($food->getQuantity());
        }
    }
}