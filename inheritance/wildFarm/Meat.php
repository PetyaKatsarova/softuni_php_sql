<?php
// require_once 'FoodAbstract.php';

class Meat extends FoodAbstract{
    public function __construct(int $quantity)
    {
        parent::__construct($quantity);
        $this->quantity = parent::getQuantity();
    }
}