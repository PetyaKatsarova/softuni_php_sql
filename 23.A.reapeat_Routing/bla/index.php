<?php

spl_autoload_register(function ($class){
   $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
   if(file_exists($file)){
      require_once $file;
   }
 });

$router = new \Routing\Router();

require_once 'routes.php';

$self = $_SERVER['PHP_SELF'];
$junk = str_replace('/index.php', '', $self);//softuni_php/23.A.../bla

// want to receive only the url code i wrote without the file path part
$uri = str_replace($junk, '', $_SERVER['REQUEST_URI']);

$uriInfo = explode('/', $uri);
$uriInfo = trim(implode(' ', $uriInfo));
$uriInfo = explode(' ', $uriInfo);

$controllerName = array_shift($uriInfo);
$fullControllerName = "Controller\\" . ucfirst($controllerName) . "Controller";

$methodName = array_shift($uriInfo);

// false s 2nd param is for the autoloader not to work and show this error
if(!class_exists($fullControllerName) || !method_exists($fullControllerName, $methodName)){
   if(!$router->invoke($uri, $_SERVER['REQUEST_METHOD'])){
      http_response_code(response_code:404);
      echo "<h2 style='color:lime;'>kuku lala 404 Class Not Found or no server req method</h2>";
   }
   exit;
}

// instead of writing all the long if else code bellow: 
$controllerInstance = new $fullControllerName();

call_user_func_array([$controllerInstance, $methodName], $uriInfo);


// use Controller\UsersController;
// use Controller\QuestionsController;

// if(strstr($_SERVER['REQUEST_URI'], 'users/register'))
// {
//    (new UsersController())->register();   
// }else if(strstr($_SERVER['REQUEST_URI'], 'users/login'))
// {
//    (new UsersController())->login();   
// }else if(strstr($_SERVER['REQUEST_URI'], 'questions/ask'))
// {
//    (new QuestionsController())->ask();   
// }else if(strstr($_SERVER['REQUEST_URI'], "questions/answer/$param"))
// {
//    (new QuestionsController())->answer($param);   
// }else{
//     echo "No event handler found :)";
// }
?>
<script src="Scripting/js/kuku.js">console.log('why')</script>