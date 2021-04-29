<?php
require_once 'FoodAbstract.php';

class Vegetable extends FoodAbstract{
    public function __construct(int $quantity)
    {
        parent::__construct($quantity);
    }
}