<?php
header("Content-Type: text/plain");
$pdo = new PDO(dsn:"mysql:dbname=test;host=localhost", username:"root");
$stmt = $pdo->prepare("SELECT * FROM users2");
$stmt->execute();
$users = $stmt->fetchAll(fetch_style:PDO::FETCH_ASSOC);

// convert php in json:
echo json_encode($users);