<?php

spl_autoload_register(function($class){
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    if(file_exists($file)){
        require_once $file;
    }
});

$uri = $_SERVER['REQUEST_URI'];
$self = explode('/', $_SERVER['PHP_SELF']);
array_pop($self);
$self = implode('/', $self);
$uriInfo = str_replace($self.'/', ' ', $uri);
$uriInfo = ltrim($uriInfo);
$uriInfo = explode('/',$uriInfo);
$controllerName = array_shift($uriInfo);
$methodName = array_shift($uriInfo);

//instantiate Users class from the Controllers folder with REFLECTION
$controllerFullName = "Controllers\\".ucfirst($controllerName) . '.php';
$controller = new $controllerFullName;

echo $controllerFullName;

