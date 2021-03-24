<?php

interface PersonInterface{
    public function setName(string $name) : void;
    public function setAge(int $age) : void;
}

interface IdentifiableInterface{
    public function setId(string $id):void;
}

interface BirthableInterface{
    public function setBirthdate(string $birthDate):void;
}