<?php

spl_autoload_register(function ($class){
    require_once str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
 });

$self = $_SERVER['PHP_SELF'];
$junk = str_replace('/index.php', '', $self);//softuni_php/23.A.../bla

// want to receive only the params i wrote without the file path
$uri = str_replace($junk, '', $_SERVER['REQUEST_URI']);
$uriInfo = explode('/', $uri);
$controllerName = array_shift($uriInfo);

$fullControllerName = "Controller\\" . ucfirst($controllerName) . "Controller";
$methodName = array_shift($uriInfo);
$param = implode('/', $uriInfo);


// echo $fullControllerName . " //rullControllerName </br>";




use Controller\UsersController;
use Controller\QuestionsController;

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
   (new QuestionsController())->answer($param);   
}else{
     echo "No event handler found :)";
}
?>
<script src="scripting/js/index.js"></script>