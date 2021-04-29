<?php
interface Vehicle
{
    public function drive(float $distance);
    public function refuel(int $liters);
}

class Car implements Vehic{
    private $ink;
    private $modifier;

    public function __construct($ink, $modifier)
    {
       $this->ink = $ink;   
       $this->modifier = $modifier;
    }
}

// Write a program that models 2 vehicles (Car and Truck) and will be able to simulate driving and refueling them. Car and truck both have fuel quantity, fuel consumption in liters per km and can be driven given distance and refueled with given liters. But in the summer both vehicles use air conditioner and their fuel consumption per km is increased by 0.9 liters for the car and with 1.6 liters for the truck. Also the truck has a tiny hole in his tank and when it gets refueled it gets only 95% of given fuel. The car has no problems when refueling and adds all given fuel to its
// tank. If vehicle cannot travel given distance its fuel does not change. Input:
//  On the first line - information about the car in format {Car {fuel quantity} {liters per km}}
//  On the second line – info about the truck in format {Truck {fuel quantity} {liters per km}}
//  On third line - number of commands N that will be given on the next N lines
//  On the next N lines – commands in format
// o Drive Car {distance}
// o Drive Truck {distance}
// o Refuel Car {liters}
// o Refuel Truck {liters}