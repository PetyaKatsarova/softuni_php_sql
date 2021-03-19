<?php
interface Writer
{
    public function writeText(string $text): void;
    public function useInk(int $quantity): void;
    public function getInk(): int;
}

interface ElectricalDevice
{
    public function getUsage(): int;
    public function isPlugged(): bool;
    public function plug(): void;
}

interface Consumable
{
    public function isAvailable():bool;
}

class Printer implements ElectricalDevice, Writer
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
    public function plug(ElectricalDevice $device)
    {
        if(!$device->isPlugged()){
            $device->plug();
        }
    }
}

class Pen implements Writer, Consumable{
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
    public function isAvailable():bool{
        return true;
    }
}