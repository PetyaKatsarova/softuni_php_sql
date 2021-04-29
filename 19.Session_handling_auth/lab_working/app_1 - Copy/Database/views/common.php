<?php
session_start();

spl_autoload_register( function($className) {
    // in different systems, files have different dir-separators
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    require_once $className . '.php';
});

$pdo = new \PDO("mysql:dbname=test;host=localhost:3306", "root");
$pdo->query('SET NAMES utf8');
$db = new \Database\PDODatabase($pdo);

// $builder = new \Database\ORM\MySQLQueryBuilder($db);
// $user = $builder->insert('users2', ['username'=>'chushko-2', 'PASSWORD'=>'12345']);
// $user = $builder->select()
//         ->from('users2')
//         ->where(['username'=>'user-5'])
//         ->orderBy(['password'=>'ASC'])
//         ->build()
//         ->fetch(\Data\Users\UserDTO::class);
// var_dump($user);
