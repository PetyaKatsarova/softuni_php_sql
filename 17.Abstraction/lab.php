<?php
interface Writable{
    public function writeText(string $text): void;
}
interface Chargeable
{
    public function useInk(int $quantity): void;
    public function getInk(): int;
}
interface WriterInterface extends Writable, Chargeable
{
    
}

interface ElectricalDeviceInterface
{
    public function getUsage(): int;
    public function isPlugged(): bool;
    public function plug(): void;
}

interface ConsumableInterface
{
    public function isAvailable():bool;
}

abstract class AbstractWriter implements WriterInterface
{
    private $ink;
    private $modifier;

    public function __construct($ink, $modifier)
    {
       $this->ink = $ink;   
       $this->modifier = $modifier;
    }
    public function useInk(int $quantity): void{
        $this->ink -= $quantity;
    }
    public function getInk(): int{
        return $this->ink;
    }
    public function writeText(string $text): void{
        if($this->getInk > 0){
            $this->useInk(strlen($text) * $this->modifier);
            echo $text;
        }
        throw new Exception("Not enough ink");
    }

}

class Printer extends AbstractWriter implements ElectricalDeviceInterface
{
    const INK_MODIFIER = 5;

    private $isPlugged;

    public function __construct($ink, $isPlugged){
        parent::__construct($ink, self::INK_MODIFIER);
        $this->isPlugged = $isPlugged;
    }        

    public function getUsage(): int{
        return 300;
    }
    public function isPlugged(): bool{
        return $this->isPlugged;
    }
    public function plug(): void{
        $this->isPlugged = true;
    }
    
}

class Pen extends AbstractWriter implements ConsumableInterface
{ 
    const INK_MODIFIER = 1;
    
    public function __construct($ink)
    {
        parent::__construct($ink, self::INK_MODIFIER);
    }
    public function isAvailable():bool{
        return true;
    }
}

function plug(ElectricalDeviceInterface $device)
{
    if(!$device->isPlugged()){
        $device->plug();
    }
}

function rechargeInk(WriterInterface $writer)
    {
        if($writer->getInk() < 5){
            // on reverse: will add 100!!
            $writer->useInk(-100);
        }

    }

rechargeInk(new Pen(50, 1));
rechargeInk(new Printer(30, true));

$printer1 = new Printer(50, true);
$printer1->writeText('lalalaa');

plug(new Printer(30, 5));


