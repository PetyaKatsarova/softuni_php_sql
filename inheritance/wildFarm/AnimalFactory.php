<?php
class AnimalFactory implements AnimalFactoryInterface{
    
    public static function create(array $data):AnimalAbstract{
        $type = $data[0];
        $name = $data[1];
        $weight = floatval($data[2]);
        $livingRegion = $data[3];

        // if(class_exists($type)){
            switch(strtolower($type)){
                case "cat":
                    $breed = $data[4];
                    return new Cat($name, $type, $weight, $livingRegion, $breed);
                case "zebra":
                case "mouse": 
                    return new $type($name, $type, $weight, $livingRegion);
                default: 
                return new Mouse('Ivancho', 'mouse', 100, "Imaginary");
            }
        // }
    }
}