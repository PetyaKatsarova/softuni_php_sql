<?php
 spl_autoload_register();

class Main{
    const INPUT_END_COMMAND = 'End';

    public function run($arr){
        $this->readData($arr);
    }
    
    public function readData($arr){
        for($i=0; $i<count($arr); $i+=2){
            $animalData = explode(" ", $arr[$i]);
            $animal = AnimalFactory::create($animalData);
            
            $foodData = explode(" ", $arr[$i+1]);
            
            $animal->makeSound();
            // var_dump($animalData);
        }
    }
}

$arr = ['Cat Gray 1.1 Home Persian', 'Vegetable 4', 'Tiger Typcho 167.7 Asia','Vegetable 1', 'Zebra Doncho 500 Africa','Vegetable 150', 'Mouse Jerry 0.5 Anywhere','Vegetable 0'];

$main = new Main();
$main->run($arr);
