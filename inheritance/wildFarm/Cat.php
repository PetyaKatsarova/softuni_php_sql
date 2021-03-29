<?php
class Cat extends MammalAbstract{
    private $breed;

    public function __construct(string $name, string $type, float $weight, string $livingRegion, string $breed)
    {
        parent::__construct($name, $type, $weight, $livingRegion);
        $this->breed = $breed;
    }

    public function makeSound(): void{
        echo "Meoow<br/>";
    }
    public function eat(FoodAbstract $food): void{
         $this->setFoodEaten($food->getQuantity());
    }

    public function __toString()
    {
        return sprintf( "%s [ %s, %s, %d, %d, %s ]", 
                      $this->getType(), $this->getNam(), $this->breed, $this->getWeight(),$this->getFoodEaten(), $this->getLivingRegion());
    }
}