<?php
session_start();
$_SESSION['name'] = 'Pesho';
echo $_SESSION['name'];