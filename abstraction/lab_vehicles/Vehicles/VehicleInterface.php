<?php
namespace Vehicles;

interface VehicleInterface{
    public function drive($distance): string;
    public function refuel($litres): void;
}
// Write a program that models 2 vehicles (Car and Truck) and will be able to simulate driving and refueling them. Car and truck both have fuel quantity, fuel consumption in liters per km and can be driven given distance and refueled with given liters. But in the summer both vehicles use air conditioner and their fuel consumption per km is increased by 0.9 liters for the car and with 1.6 liters for the truck. Also the truck has a tiny hole in his tank and when it gets refueled it gets only 95% of given fuel. The car has no problems when refueling and adds all given fuel to its
// tank. If vehicle cannot travel given distance its fuel does not change. Input
//  On the first line - information about the car in format {Car {fuel quantity} {liters per km}}
//  On the second line – info about the truck in format {Truck {fuel quantity} {liters per km}}
//  On third line - number of commands N that will be given on the next N lines
//  On the next N lines – commands in format
// o Drive Car {distance}
// o Drive Truck {distance}
// o Refuel Car {liters}
// o Refuel Truck {liters}
// Output
// After each Drive command print whether the Car/Truck was able to travel given distance in format if it’s successful. Print the distance with all digits after the decimal separator except trailing zeros.Car/Truck travelled {distance} km Or if it is not: Car/Truck needs refueling
// Finally print the remaining fuel for both car and truck rounded 2 digits after floating point in format: Car: {liters} Truck: {liters}
// Example
// Input Output
// Car 15 0.3
// Truck 100 0.9
// 4
// Drive Car 9
// Drive Car 30
// Refuel Car 50
// Drive Truck 10

// Car travelled 9 km
// Car needs refueling
// Truck travelled 10 km
// Car: 54.20
// Truck: 75.00

// Car 30.4 0.4 Car needs refueling