<?php
require_once 'db/db_connection.php';
$response = '';
$username = '';
$password = '';

if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    //to get the verifyCredentials() func
    require_once 'db/user_queries.php';
    // returns user_id,provided the passw matches
    $userId = verifyCredentials($db,$username,$password);
    //var_dump($userId);
    if($userId != -1){
        $authString = issueAuthenticationString($db,$userId);
        header("Location: categories.php?authId=$authString");
        //var_dump($authString);
        exit;
    }else{
        $response = "Invalid username or password";
    }
}

require_once 'templates/login_form.php';