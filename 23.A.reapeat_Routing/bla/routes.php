<?php
/** @var \Routing\Router $router */

use Controller\UsersController;

$router->registerRoute(
    '\/profile\/(.*?)\/edit',
    'GET',
    function($matches){
        (new \Controller\UsersController())->profileEditGet($matches[1][0]);
    }
);

$router->registerRoute(
    '\/profile\/(.*?)\/edit',
    'POST',
    function($matches){
        (new \Controller\UsersController())->profileEditPost($matches[1][0]);
    }
);