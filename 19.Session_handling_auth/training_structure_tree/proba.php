<?php
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

$pdo = new PDO(dsn:"mysql:host=localhost:3306;dbname=test",username:"root");
$stmt = $pdo->prepare("SELECT * FROM users2");
$stmt->execute();
// to use USERDTO: INSTEAD OF fetchAll(..) use FETCHOBJECT(UserDTO::class)where userDTO ist the className
$users2 = $stmt->fetchObject(UserDTO::class);

// WE WORK WITH CLASS: NEED TO CALL THE METHODS!!
while($row = $stmt->fetchObject(UserDTO::class)){
    echo $row->getUsername() . " // " . $row->getId() . "</br>";
    // print_r($row);
}


