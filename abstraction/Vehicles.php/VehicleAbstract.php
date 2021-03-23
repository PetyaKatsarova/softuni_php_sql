<?php
namespace Vehicles;

abstract class VehicleAbstract implements VehicleInterface{
    private $fuelQuantity; //liters per km
    private $fuelConsumption;
    private $modifier;    

    public function __construct(float $fuelQuantity, float $fuelConsumption, float $modifier)
    {
       $this->$fuelQuantity = $fuelQuantity;   
       $this->$fuelConsumption = $fuelConsumption + $this->modifier;
    }

    public function drive(int $distance): bool{
        if($this->fuelQuantity >= $this->fuelConsumption * $distance){
            $this->fuelConsumption -= $this->fuelConsumption * $distance;
            return true;
        }
        return false;
    }
    public function refuel(int $liters): void{
       $this->fuelQuantity += $liters;
    }

}