<?php

namespace Factories;

use Vehicles\VehicleInterface;

class VehicleFactory implements VehicleFactoryInterface
{
    public function create(string $type, float $qty, float $consumption):VehicleInterface
    {
        $className = 'Vehicles\\' . $type;
        if(!class_exists($className)){
            throw new \Exception("Invalid vehicle type."); 
        }
        $vehicle = new $className($qty, $consumption);
        return $vehicle;
    }
}