<?php
// gets the class from the folder PrepareDb.php
use ExerciseDatabase\PrepareDb;
use App\Data\UserDTO;

spl_autoload_register();


// class UserDTO{
//     private $id;
//     private $username;
//     private $PASSWORD;
//     private $profile_picture_url;
//     private $born_on;

//     public function getId(){
//         return $this->id;
//     }
//     public function setId($id){
//         $this->id = $id;
//     }
//     public function getUsername(){
//         return $this->username;
//     }
//     public function setUsername($username){
//         $this->username = $username;
//     }
//     public function getPassword(){
//         return $this->PASSWORD;
//     }
//     public function setPasssword($PASSWORD){
//         $this->PASSWORD = $PASSWORD;
//     }
// }

$pdo = new PDO(dsn:"mysql:host=localhost:3306;dbname=test",username:"root");

// $db = new \ExerciseDatabase\prepareDb($pdo);
$db = new prepareDb($pdo);
$allUsers = $db->query("SELECT * FROM users2")->execute()->fetch(UserDTO::class);

 foreach($allUsers as $user){
//     echo $user-getU . " //<br/> "
      echo $user->getUsername() . " // " . $user->getPassword() . "<br/>";
}