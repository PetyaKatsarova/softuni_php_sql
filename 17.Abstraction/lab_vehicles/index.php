<?php
// loop through all classes in different directories
// spl_autoload_register(function ($class){
//    require_once str_replace(search: '\\', replace: DIRECTORY_SEPARATOR, $class) . '.php';
// });
require_once 'Factories/VehicleFactoryInterface.php';
require_once 'Factories/VehicleFactory.php';
require_once 'Vehicles/VehicleInterface.php';
require_once 'Vehicles/VehicleAbstract.php';
require_once 'Vehicles/Car.php';
require_once 'Vehicles/Truck.php';

// add all the data instead of readline
// $lineVehicles = ['Car 15 0.3', 'Truck 100 0.9'];
// $numberOfCommands = 4;
// $linesCommands = ['Drive Car 9', 'Drive Car 30', 'Refuel Car 50','Drive Truck 10'];
$lineVehicles = ['Car 30.4 0.4', 'Truck 99.34 0.9'];
$numberOfCommands = 5;
$linesCommands = ['Drive Car 500','Drive Car 13.5','Refuel Truck 10.300', 'Drive Truck 56.2','Refuel Car 100.2'];
// // results:
// Car needs refueling
// Car travelled 13.5 km
// Truck needs refueling
// Car: 113.05
// Truck: 109.13
$vehicles = [];
$factory = new \Factories\VehicleFactory();

for($i=0; $i<count($lineVehicles); $i++){
    list($type, $qty, $consumption) = explode(' ', $lineVehicles[$i]);
    $qty = (float)$qty;
    $consumption = (float)$consumption;
    $vehicle = $factory->create($type, $qty, $consumption);
    $vehicles[$type] = $vehicle;
}


for($i=0; $i<$numberOfCommands; $i++){
    list($action, $type, $param) = explode(' ', $linesCommands[$i]);
    $param = (float)$param;
    $vehicle = $vehicles[$type];
    $action = strtolower($action);
    // echo $vehicle ->$action($param);
}

foreach($vehicles as $vehicle){
    echo $vehicle . "<br/>";
}
var_dump($vehicles);
// output: 
// Car travelled 9 km
// Car needs refueling
// Truck travelled 10 km
// Car: 54.20
// Truck: 75.00