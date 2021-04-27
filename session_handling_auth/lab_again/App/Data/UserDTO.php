<?php
namespace App\Data;

class UserDTO
{
    private $id;
    private $username;
    private $PASSWORD;
    private $profile_picture_url;
    private $born_on;

    public static function create($id=null, $username=null, $PASSWORD=null, $profile_picture_url=null, $born_on=null) : UserDTO
    {
        $user = new UserDTO();
        $user->id=$id;
        $user->username=$username;
        $user->PASSWORD=$PASSWORD;
        $user->profile_picture_url=$profile_picture_url;
        $user->born_on=$born_on;

        return $user;
    }
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
    public function setPassword($PASSWORD){
        $this->PASSWORD = $PASSWORD;
    }
    public function getProfile_picture_url(){
        return $this->profile_picture_url;
    }
    public function setProfile_picture_url($profile_picture_url){
        $this->profile_picture_url = $profile_picture_url;
    }
    public function getBorn_on(){
        return $this->born_on;
    }
    public function setBorn_on($born_on){
        $this->born_on = $born_on;
    }
}