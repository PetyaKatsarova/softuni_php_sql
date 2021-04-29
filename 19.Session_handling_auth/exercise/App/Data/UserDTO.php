<?php
namespace App\Data;

class UserDTO{
    private $id;
    private $username;
    private $PASSWORD;
    private $profile_picture_url;
    private $born_on;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getUsername(){
        return $this->username;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function getPassword(){
        return $this->PASSWORD;
    }
    public function setPasssword($PASSWORD){
        $this->PASSWORD = $PASSWORD;
    }
}