<?php
// $uri = $_SERVER['REQUEST_URI'];

// $self = explode("/", $_SERVER['PHP_SELF']);
// array_pop($self);
// $replace = implode("/", $self); // into str again
// $_SERVER['REQUEST_URI'] => shows exactly what u see in the url
// $_SERVER['PHP_SELF'] => "/softuni_php/routing/lab/index.php" : here we get the full file path/url, added the extra index.php which u dont see in the url

//get the params only:
// $uri = str_replace($replace."/", "", $uri);
// $params = explode("/", $uri);
// $controllerName = array_shift($params);// getting the first param
// $actionName = array_shift($params);//getting the second param


// get the file path with server[php self], explode to arr, remove the index.php part with pop, implode to url again
$self = explode("/", $_SERVER['PHP_SELF']);
array_pop($self);
$replace = implode("/", $self);
// remove the file path and leave only params from the url
$uri = str_replace($replace . "/", "", $_SERVER['REQUEST_URI']);
$params = explode("/", $uri);
// print_r($params);
// echo ucfirst($params[0]) . ' ' . ucfirst($params[1]) . '!';
echo "<br/>";
// print_r($_SERVER['PHP_SELF']);

dispatching: 
if($params[0] == 'hello'){
    switch($params[1]):
        case "world":
            echo "Hello World!"; 
            break;
        case "softuni":
            echo 'Hello Soft Uni!';
            break;
    endswitch;
}

// echo "----------- third param left after the shifts ------------<br/>";
// var_dump($params);
// echo "---------- controlerName -----------<br/>";
// var_dump($controllerName);
// echo "-------- actionName -----------<br/>";
// var_dump($actionName);


// i am not getting it......
function route($regex, $cb){
    //  it looks the same for me?????????? replace /what with / ?????????
    $regex = str_replace('/', '\/', $regex);
    $is_match = preg_match('/^' .($regex) . '$/', $_SERVER['REQUEST_URI'], $matches, PREG_OFFSET_CAPTURE);
    if($is_match){
        $cb($matches);
    }
}

route('/blog/', function($matches){
    // my handler???;
});
route('/blog/tag/(.*)' , function($matches){
    var_dump($matches);
});


// var_dump($_SERVER['PHP_SELF']);
// echo '@@@@@@@@@@@@@@@@@';
// var_dump($_SERVER['REQUEST_URI']);



// spl_autoload_register(function($class){
//     $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
//     if(file_exists($file)){
//         require_once $file;
//     }
// });

// $router = new \Routing\Router();

// require_once 'routes.php';

// $self = $_SERVER['PHP_SELF'];
// $junk = str_replace(search: 'index.php', replace:'', subject: $self);

// $uri = str_replace($junk, '', $_SERVER['REQUEST_URI']);
// $uriInfo = explode('/', $uri);

// $controllerName = array_shift($uriInfo);
// $fullControllerName = 'Controller\\' . ucfirst($controllerName) . 'Controller';
// $methodName = array_shift($uriInfo);

// // there was false after !class_exists: why????
// if(!class_exists($fullControllerName)){
//     if($router->invoke($uri, $_SERVER['REQUEST_METHOD'])){
//         http_response_code(response_code: 404);
//         echo "<h1>404 Class Not Found</h1>";
//     }
//     exit;
// }

// $controllerInstance = new $fullControllerName();

// call_user_func_array([$controllerInstance, $methodName], $uriInfo);


// if(method_exists($controllerInstance, $methodName)){
//     call_user_func_array([$controllerInstance, $methodName], $uriInfo);
// }else if(!$router->invoke($uri, $_SERVER['REQUEST_METHOD'])){
//     echo "<h1>404 Method Not Found</h1>";
// }


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