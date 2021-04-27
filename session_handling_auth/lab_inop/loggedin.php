<?php
session_start();
session_regenerate_id(true); // delete old session id better for security

if(!isset($_SESSION['logged_in_user'])){
    echo "<h1 style=color:red>Dude, log in</h1>";
    // header("Location: sessions.php"); maybe this one keeps the phpsessid and that's why
    // cant go to 'try login again'
    echo "<a href=sessions.php>go to login</a>";
    exit;
}else{
    echo "<h1 style=color:green>Welcome, " . $_SESSION['logged_in_user'] ."</h1>";
    echo "<a href=third.php>Third Page</a><br/><br/>";
    echo "<a href=logout.php>logout</a>";
}
// NB!!!
// if $_SESSION is not set, automatically u r allocated random string PHPSESSID
// EVERY REQ WILL SEND THIS COOKIE
