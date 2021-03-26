<?php

interface FoodFactoryInterface{
    public static function create(str $type, int $quantity):Food;
}