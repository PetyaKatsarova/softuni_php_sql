<?php
header("Content-Type: application/json");
$uri = str_replace(search:'/softuni_php/restServicesAndAjax/lab', replace: '', subject: $_SERVER['REQUEST_URI']);
$db = new PDO(dsn: "mysql:dbname=test;host=localhost", username:"root");
// var_dump($uri);

if(preg_match(pattern: "/^\/users$/",subject: $uri)){
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        echo json_encode($db->query("SELECT * FROM users2")->fetchAll(PDO::FETCH_ASSOC));
        exit;
    }else if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $requestPayload = file_get_contents(filename: 'php://input', use_include_path: 'r');// gets the post content in json
        $user = json_decode($requestPayload, true);
        $stmt = $db->prepare("INSERT INTO users2 (username, PASSWORD) VALUES(?, ?);");
        $res = $stmt->execute([$user['username'], $user['password']]);
        if($res){
            http_response_code(response_code: 201); // created
            echo json_encode(array_merge(['id'=>$db->lastInsertId()], $user));
            exit;
        }else{
            http_response_code(400); // bad request
            echo json_encode(['error'=>'Sth went wrong']);
            exit;
        }
    }
} else if(preg_match( "/^\/users\/(\d+)$/", $uri, $matches)){
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $stmt = $db->prepare("SELECT * FROM users2 WHERE id=?");
        $stmt->execute([$matches[1]]);
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        exit;
    }else if($_SERVER['REQUEST_METHOD'] === 'PUT'){
        
    }else if($_SERVER['REQUEST_METHOD'] === 'PATCH'){
        $requestPayload = file_get_contents(filename: 'php://input', use_include_path: 'r');
        $user = json_decode($requestPayload, true);
        $id = $matches[1];

        $query = "UPDATE users2 SET ";
        foreach($array_keys($user) as $column){
             $query .= $column = ' ?, ';
        }
    }$query = rtrim($query, ', ');
} else {
    var_dump("so else");
}