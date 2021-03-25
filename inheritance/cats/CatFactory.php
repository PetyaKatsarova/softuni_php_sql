<?php
class CatFactory implements CatFactoryInterface{
    
    public static function create(string $name, string $breed, int $param): Cat
    {
        // if(!class_exists($breed)){
        //      throw new Exception("No such class.");
        // }
        return new $breed($name, $breed, $param);
    }
}