<?php
// to return JSON
header("Content-Type: application/json");
// // connect to db, ur table, display selected fields for all users
$db = new PDO("mysql:dbname=test;host=localhost", "root");

$fullUri = $_SERVER['REQUEST_URI'];
$uri = str_replace("softuni_php/25.A.RepeatRestServicesAndAjax/", "",$fullUri );

if(preg_match("/^\/users$/", $uri, $matches)){
    if($_SERVER["REQUEST_METHOD"] === 'GET'){
        echo json_encode($db->query("SELECT * FROM users2")->fetchAll(PDO::FETCH_ASSOC));
        exit;
    }else if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $requestPayload = file_get_contents('php://input', 'r');
        $user = json_decode($requestPayload, true);
        $stmt = $db->prepare("INSERT INTO users2 (username, PASSWORD) VALUES(?,?)");
        $res = $stmt->execute([$user['username'], $user['PASSWORD']]);
        if($res){
            http_response_code(201);
            echo json_encode(array_merge(['id'=>$db->lastInsertId()], $user));
            exit;
        }else{
            http_response_code(400);
            exit;
        }
    }
}else if(preg_match("/^\/users\/(\\d+)$/", $uri, $matches)){
    if($_SERVER["REQUEST_METHOD"] === 'GET'){
        $stmt = $db->prepare("SELECT * FROM users2 WHERE id = ?");
        $stmt->execute([$matches[1]]);
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        exit;
    }else if($_SERVER['REQUEST_METHOD'] === 'PATCH'){
        // $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
        // $stmt->execute([$matches[1]]);
        
        // if(empty($stmt->fetch(PDO::FETCH_ASSOC))){
        //     http_response_code(404);
        //     exit;
        // }

        $requestPayload = file_get_contents("php://input", 'r');
        $user = json_decode($requestPayload, true);
        $id = $matches[1];

        $query = "UPDATE users2 SET ";
        foreach(array_keys($user) as $column){
            $query .= $column . '=?, ';
        }
        $query = rtrim($query, ', ');
        $query .= " WHERE id = ?";
        $stmt = $db->prepare($query);
        $res = $stmt->execute(array_merge(array_values($user), [$id]));
        if($res){
            http_response_code(200);
            exit;
        }else{
            http_response_code(400);
            echo json_encode(['error'=>'Something went wrong!']);
            exit;
        }
    }else if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
        $stmt = $db->prepare("DELETE FROM users2 WHERE id = ?");
        $stmt->execute([$matches[1]]);
        http_response_code(204);
        exit;
    }
}else{
    var_dump('else');
}
