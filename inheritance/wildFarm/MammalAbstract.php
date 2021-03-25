<?php
abstract class MammalAbstract extends AnimalAbstract{
    private $livingRegion;
    public function __construct(string $name, string $type, float $weight, string $livingRegion)
    {
        parent::__construct($name, $type, $weight);
        $this->setLivingRegion($livingRegion);
    }
    private function setLivingRegion($livingRegion):void{
        $this->livingRegion = $livingRegion;
    }
    public function getLivingRegion():string{
        return $this->livingRegion;
    }
}