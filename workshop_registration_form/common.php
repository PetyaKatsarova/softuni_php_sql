<?php
require_once 'db/db_connection.php';
require_once 'db/user_queries.php';

if(!isset($_GET['authId'])){
    header("Location: login.php");
    exit;
}
$authId = $_GET['authId'];
$userId = getUserByAuthId($db,$authId);
if($userId == -1){
    header("Location: login.php");
    exit;
}

function url(string $url):string
{
    $symbol = strstr($url,needle:"?") ?  '&' : '?';
    //????????? what is this {$symbol}
    return $url . "{$symbol}authId=" . $_GET['authId'];

//    if(strstr($url,needle:"?")){
//        return $url .'&authId=' . $_GET['authId'];
//    }
//    return $url . '?authId=' . $_GET['authId'];
}