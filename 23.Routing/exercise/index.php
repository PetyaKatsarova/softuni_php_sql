<?php

include 'play.php';

spl_autoload_register(function($class){
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    if(file_exists($file)){
        require_once $file;
    }
});

$uri = $_SERVER['REQUEST_URI'];
$self = $_SERVER['PHP_SELF'];
$self = explode('/',$self);
array_pop($self); // remove the index.php part of the url
$self = implode('/', $self);
$uriInfo = str_replace($self, '', $uri);
$uriInfo = explode('/', $uriInfo);

$whiteSpace = array_shift($uriInfo);
$controllerName = array_shift($uriInfo);
$methodName = array_shift($uriInfo);

//reflection:
// get 'Controllers\Users' path, spl_autoload_register() gets the class name from there adding .php to Users
$controllerFullName = "Controllers\\" . ucfirst($controllerName);
$user = new $controllerFullName();
$user->hello(ucfirst($uriInfo[0]), ucfirst($uriInfo[1]));

?>
<script src="/js/index.js"></script>


