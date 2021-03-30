<?php
session_start();
if(!isset($_SESSION['logged_in_user'])){
    echo "<h1 style=color:red>Dude, log in</h1>";
}else{
    echo "<h1 style=color:green>Welcome, " . $_SESSION['logged_in_user'] ."</h1>";
    echo "<a href=third.php>Third Page</a>";
}
// NB!!!
// if $_SESSION is not set, automatically u r allocated random string PHPSESSID
// EVERY REQ WILL SEND THIS COOKIE