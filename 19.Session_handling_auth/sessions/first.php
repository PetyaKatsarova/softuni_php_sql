<?php
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
$pdo = new PDO(dsn:"mysql:host=localhost:3306;dbname=test",username:"root");
$stmt = $pdo->prepare("SELECT * from users2");
$stmt->execute();
// fetchObject receives a class
// $allUsers = $stmt->fetchObject( UserDTO::class);

/** @var UserDTO $row*/
while($row=$stmt->fetchObject( UserDTO::class)){
    // var_dump($row) . "<br/>";
    echo $row->getUsername() . " | ";
}


// $pdo = new PDO(dsn:"mysql:host=localhost:3306;dbname=test",username:"root");
// $stmt = $pdo->prepare("SELECT * from users2");
// $stmt->execute();
// $allUsers = $stmt->fetchAll();

// foreach ($allUsers as $user){
//     echo $user['username'] . ' => id = ' . $user['id'] . "<br/>";
// }

// session_start();
// echo "Hi {$_SESSION['name']} from first.php";
// session_destroy();