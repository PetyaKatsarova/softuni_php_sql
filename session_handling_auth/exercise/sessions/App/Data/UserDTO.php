<?php
namespace App\Data;

class UserDTO{
    private $username;
    private $PASSWORD;

    public function getUsername(){
        return $this->username;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function getPassword(){
        return $this->PASSWORD;
    }
    public function setPassword($PASSWORD){
        $this->PASSWORD = $PASSWORD;
    }
}