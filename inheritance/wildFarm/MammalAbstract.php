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
    // public function __toString()
    // {
    //     return sprintf( "%s[%s, %s, %s, %d]", 
    //                   parent::getType(), parent::getNam(), $this->getWeight(), $this->getLivingRegion(), $this->getFoodEaten());
    // }
    public function __toString()
    {
        return sprintf( "%s [%s, %s, %d, %s] ", 
                      $this->getType(), $this->getNam(), $this->getWeight(), $this->getFoodEaten(), $this->getLivingRegion()) . "<br/>";
    }
}