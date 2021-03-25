<?php

interface CatFactoryInterface{
    public static function create(string $name,string $breed,int $param) :Cat;
}