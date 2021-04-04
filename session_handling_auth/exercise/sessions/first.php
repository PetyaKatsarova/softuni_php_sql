<?php
session_start();

echo "Hi {$_SESSION['name']} from first.php";