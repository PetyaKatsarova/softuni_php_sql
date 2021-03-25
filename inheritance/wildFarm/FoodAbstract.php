<?php

abstract class FoodAbstract{
    private $quantity;

    protected function __construct(int $quantity)
    {
        $this->setQuantity($quantity);
    }
    private function setQuantity($quantity){
        $this->quantity = $quantity;
    }
    public function getQuantity():int{
        return $this->quantity;
    }
}