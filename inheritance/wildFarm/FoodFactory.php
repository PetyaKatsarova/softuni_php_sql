<?php

class FoodFactory implements FoodFactoryInterface
{
    public static function create(string $type, int $quantity):FoodAbstract
    {
        if(class_exists($type)){
            return new $type($quantity);
        }
        return new Meat(37);
    }
}