<?php
class Product{
    private $name;
    /** @var float*/
    private $cost;
    
    public function __construct()
    { 
        $this->setName($this->name);
        $this->setCost($this->cost);
    }
    public function getName():string{
        return $this->name;
    }
    private function setName($n):void{
        // $this->validatePositiveNum(strlen($n), 'Name');
        $this->name = $n;
    }
    public function getCost():float{
        return $this->cost;
    }
    private function setCost($c){
        // $this->validatePositiveNum($c, 'Cost');
        $this->cost = $c;
    }
    private function validatePositiveNum($val, $param):void{
        if($val <= 0){
            throw new Exception("$param can't be negative or empty.");
        }
    }
}