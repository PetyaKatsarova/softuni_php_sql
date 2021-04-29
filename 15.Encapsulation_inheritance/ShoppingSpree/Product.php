<?php
class Product{
    public $name;
    /** @var float*/
    public $cost;
    
    public function __construct($name,$cost)
    { 
        $this->setName($name);
        $this->setCost($cost);
    }
    public function getName():string{
        return $this->name;
    }
    private function setName($name):void{
        $this->validatePositiveNum(strlen($name), 'Name');
        $this->name = $name;
    }
    public function getCost():float{
        return $this->cost;
    }
    private function setCost($c){
        $this->validatePositiveNum($c, 'Cost');
        $this->cost = $c;
    }
    private function validatePositiveNum($val, $param):void{
        if($val <= 0){
            throw new Exception("$param can't be negative or empty.");
        }
    }
}