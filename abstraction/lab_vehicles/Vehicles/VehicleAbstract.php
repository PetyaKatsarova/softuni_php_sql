<?php
namespace Vehicles;

abstract class VehicleAbstract implements VehicleInterface{
    public $fuelQuantity; //liters
    public  $fuelConsumption; //liters per km
    public  $modifier;   
    private $tankCapacity;

    public function __construct(float $fuelQuantity, float $fuelConsumption, float $modifier, float $tankCapacity)
    {
       $this->$fuelQuantity = $fuelQuantity;   
       $this->modifier = $modifier;
       $this->$fuelConsumption = $fuelConsumption * $this->modifier;
       $this->tankCapacity;
    }

    public function drive($distance): string{
        if($this->fuelQuantity >= $this->fuelConsumption * $distance){
            $this->fuelQuantity -= $this->fuelConsumption * $distance;
            return basename(get_class($this)) . " travelled " . $distance . "km<br/>";
        }
        echo 'why isnt working!!!!!!!!!!!!!';
        return basename(get_class($this)) . " needs refueling<br/>";
    }
// litres is float
    public function refuel($litres): void{
       $this->fuelQuantity += $litres;
    }

    public function __toString()
    {
        return basename(get_class($this)) . ": " . number_format($this->fuelQuantity, decimals: 2);
    }
}