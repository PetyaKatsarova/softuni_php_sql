<?php
session_start();

spl_autoload_register(function($className){
    // in different systems, files have different dir-separators
   $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    require_once $className . '.php';
});
// '\' is used for namespaces?
$pdo = new \PDO("mysql:dbname=test;host=localhost:3306", "root");
$db = new \Database\PDODatabase($pdo);
echo 'yes :)';