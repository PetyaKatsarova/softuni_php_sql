<?php

$self = $_SERVER['PHP_SELF'];
$junk = str_replace('/index.php', '', $self);//softuni_php/23.A.../bla

// want to receive only the params i wrote without the file path
$uri = str_replace($junk, '', $_SERVER['REQUEST_URI']);
$uriInfo = explode('/', $uri);

var_dump($uriInfo);
echo "  // <br/>";


use Controller\UsersController;
use Controller\QuestionsController;

echo "this is bla/index</br>";

spl_autoload_register(function ($class){
   require_once str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
});

if(strstr($_SERVER['REQUEST_URI'], 'users/register'))
{
   (new UsersController())->register();   
}else if(strstr($_SERVER['REQUEST_URI'], 'users/login'))
{
   (new UsersController())->login();   
}else if(strstr($_SERVER['REQUEST_URI'], 'questions/ask'))
{
   (new QuestionsController())->ask();   
}else if(strstr($_SERVER['REQUEST_URI'], 'questons/answer'))
{
   (new QuestionsController())->answer();   
}else{
     echo "No event handler found :)";
}