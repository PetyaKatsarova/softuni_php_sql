<?php
spl_autoload_register(function($class){
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    if(file_exists($file)){
        require_once $file;
    }
});

$router = new \Routing\Router();

require_once 'routes.php';

$self = $_SERVER['PHP_SELF'];
$junk = str_replace(search: 'index.php', replace:'', subject: $self);

$uri = str_replace($junk, '', $_SERVER['REQUEST_URI']);
$uriInfo = explode('/', $uri);

$controllerName = array_shift($uriInfo);
$fullControllerName = 'Controller\\' . ucfirst($controllerName) . 'Controller';
$methodName = array_shift($uriInfo);

// there was false after !class_exists: why????
if(!class_exists($fullControllerName)){
    if($router->invoke($uri, $_SERVER['REQUEST_METHOD'])){
        http_response_code(response_code: 404);
        echo "<h1>404 Class Not Found</h1>";
    }
    exit;
}

$controllerInstance = new $fullControllerName();

// call_user_func_array([$controllerInstance, $methodName], $uriInfo);


if(method_exists($controllerInstance, $methodName)){
    call_user_func_array([$controllerInstance, $methodName], $uriInfo);
}else if(!$router->invoke($uri, $_SERVER['REQUEST_METHOD'])){
    echo "<h1>404 Method Not Found</h1>";
}


// var_dump($controllerInstance);

//  echo "hi from index <br/>";

// if(strstr($_SERVER['REQUEST_URI'], "/users/register")){
//     (new \Controllers\UsersController())->register();
// }else if(strstr($_SERVER['REQUEST_URI'], "/users/login")){
//     (new \Controllers\UsersController())->login();
// }else if(strstr($_SERVER['REQUEST_URI'], "/questions/ask")){
//     (new \Controllers\QuestionsController())->ask();
// }else if(strstr($_SERVER['REQUEST_URI'], "/questions/answer")){
//     (new \Controllers\QuestionsController())->answer();
// }else{
//     echo "No event handler found.";
// }