<?php
namespace Factories;

use Vehicles\VehicleInterface;

interface VehicleFactoryInterface
{
    public function create(string $type, $float $qty, float $consumption):VehicleInterface;
}