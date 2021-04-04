<?php
session_start();
spl_autoload_register(function($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    require_once $className . '.php';
});
$pdo = new \PDO("mysql:dbname=test;host=localhost:3306", "root");
$db = new \Database\PDODatabase($pdo);
