<?php
session_start();
spl_autoload_register(function($className) {
    // in different systems, files have different dir-separators
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    require_once $className . '.php';
});
$pdo = new PDO("mysql:dbname=test;host=localhost:3306", "root");
$user = $pdo->query("SELECT * FROM users2 WHERE id = 18")->fetchObject(Database\Data\Users\UserDTO::class);

var_dump($user);

// $pdo = new \PDO("mysql:dbname=test;host=localhost:3306", "root");
// $db = new \Database\PDODatabase($pdo);



// $builder = new \Database\ORM\MySQLQueryBuilder($db);

// $user = $builder
//     ->select()
//     ->from('users2')
//     ->where(['username'=>'user-1'])
//     ->orderBy(['PASSWORD'=>'ASC'])
//     ->build()
//     ->fetch(\Data\Users\UserDTO::class);
//     var_dump($users);
 
// $user = $builder->insert('users2', ['username'=>'chushko-2', 'PASSWORD'=>'12345']);


