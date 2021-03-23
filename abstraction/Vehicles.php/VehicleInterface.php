<?php
namespace Vehicles;

interface VehicleInterface{
    public function drive(int $distance):bool;
    public function refuel(int $litres): void;
}