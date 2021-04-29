<?php

use Database\PDODatabase;
use App\Data\UserDTO;

spl_autoload_register();

$pdo = new PDO(dsn:"mysql:host=localhost:3306;dbname=test",username:"root");

$db = new PDODatabase($pdo);
$allUsers = $db
           ->query("Select * FROM users2")
           ->execute()
           ->fetch(UserDTO::class);


foreach($allUsers as $user){
    echo $user->getUsername() . " | " . $user->getPassword() . "<br/>";
}

// $stmt = $pdo->prepare("SELECT * from users2");
// $stmt->execute();

// session_start();
// $_SESSION['name'] = 'Pesho';
// echo $_SESSION['name'];