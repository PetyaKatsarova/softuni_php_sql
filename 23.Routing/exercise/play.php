<?php

function route($regex){
    $uri = $_SERVER['REQUEST_URI'];
    $regex = str_replace('/', '\/', $regex);
    $is_match = preg_match($regex, $uri, $matches, PREG_OFFSET_CAPTURE);
    var_dump($is_match);
}

route('/users/blog/tag');