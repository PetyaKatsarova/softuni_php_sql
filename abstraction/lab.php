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

class Printer implements ElectricalDeviceInterface, WriterInterface
{
    private $ink;
    private $isPlugged;

    public function __construct($ink)
    {
       $this->ink = $ink;   
       $this->isPlugged = true;
    }

    public function writeText(string $text): void{
        if($this->getInk > 0){
            $this->useInk(strlen($text) * 5);
            echo $text;
        }
        throw new Exception("Not enough ink");
    }
    public function useInk(int $quantity): void{
        $this->ink -= $quantity;
    }
    public function getInk(): int{
        return $this->ink;
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

class Pen implements WriterInterface, ConsumableInterface{
    private $ink;

    public function __construct($ink)
    {
       $this->ink = $ink;   
    }

    public function writeText(string $text): void{
        if($this->getInk > 0){
            $this->useInk(strlen($text));
            echo $text;
        }
        throw new Exception("Not enough ink");
    }
    public function useInk(int $quantity): void{
        $this->ink -= $quantity;
    }
    public function getInk(): int{
        return $this->ink;
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

rechargeInk(new Pen(50));
rechargeInk(new Printer(30));
plug(new Printer(30));


