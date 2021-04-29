<?php
class Tiger extends MammalAbstract{
    const CLASS_NAME = "Tiger";

    public function __construct(string $name, string $type, float $weight, string $livingRegion)
    {
        parent::__construct($name, $type, $weight, $livingRegion);
    }

    public function makeSound(): void{
        echo "<br/>ROAAR!!!<br/>";
    }
    public function eat(FoodAbstract $food): void{
        // get the current class name 
        // $foodClassName = new \ReflectionClass($food);
        $className = new \ReflectionClass($this);
 
        if("Vegetable" === $this->getClassName($food)){
            // echo self::CLASS_NAME ."s are not eating vegetables!";
            // option 2:
            echo $className->getName() ."s are not eating vegetables!<br/>";
            // throw new Exception(self::CLASS_NAME . "s are not eating vegetables!");
        }else{
           $this->setFoodEaten($food->getQuantity());
        }
    }
    // public function setFoodEaten($quantity):void{
    //     $this->foodEaten += $quantity;
    // }

}