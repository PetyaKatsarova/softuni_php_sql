<?PHP
//$db = new mysqli("127.0.0.1", 'root', "", "test");
$db = new PDO("mysql:dbname=test;host=localhost:3306", "root", "");