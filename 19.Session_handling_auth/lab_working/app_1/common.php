<?php
session_start();
spl_autoload_register(function($className) {
    // in different systems, files have different dir-separators
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    require_once $className . '.php';
});
$pdo = new PDO("mysql:dbname=test;host=localhost:3306", "root");
$db = new \Database\PDODatabase($pdo);
$stmt = $db->query("SELECT * FROM users2");
$stmt->execute();
$user = $stmt->fetch(Data\Users\UserDTO::class);

foreach($user as $u){
    echo $u['username'] . " // " . $u['id'] . "</br>";
}
 
$builder = new \Database\ORM\MySQLQueryBuilder($db);

// ORM IS NOT WORKING!!! for now; Object Relational Mapping
// 1.prepare, 2. execute, 3. fetch
$user2 = $builder
     ->select()
      ->from('users2')
      ->where(['username'=>'chushko'])
    //  ->orderBy(['PASSWORD'=>'ASC'])
      ->build()
      ->fetch(\Data\Users\UserDTO::class);
    //  var_dump($user2);
 
// $user2 = $builder->insert('users2', ['username'=>'chushko-2', 'PASSWORD'=>'12345']);


