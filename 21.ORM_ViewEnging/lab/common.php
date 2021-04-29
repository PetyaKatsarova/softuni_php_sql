<?php
session_start();
spl_autoload_register(function($className) {
    // in different systems, files have different dir-separators
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    require_once $className . '.php';
});
$pdo = new PDO("mysql:dbname=test;host=localhost:3306", "root");
$db = new \Database\PDODatabase($pdo);

$builder = new \Database\ORM\MySQLQueryBuilder($db);
$user = $builder->select(['username', 'PASSWORD'])
      ->from('users2')
      ->where(['id'=>36])
      ->orderBy(['PASSWORD'=>'ASC'])
      ->build() // takes me forever: still can't find why it returns the wrong type..
      ->fetch(\Data\Users\UserDTO::class);
var_dump($user);
 
// $user2 = $builder->insert('users2', ['username'=>'chushko-3', 'PASSWORD'=>'123']);
// echo 'user2';


