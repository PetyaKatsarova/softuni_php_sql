<?php
session_start();
require_once 'autoloader.php';
$dbInfo = parse_ini_file("Config/db.ini");
$template = new \Core\Template();
$db = new \Database\PDODatabase(new \PDO($dbInfo['dsn'], $dbInfo['user'], $dbInfo['pass']));