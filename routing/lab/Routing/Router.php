<?php
namespace Routing;

use Routing\RouterInterface;

class Router implements RouterInterface
{
    private $routes = [];

    public function __construct()
    {
        $this->routes['GET'] = [];
        $this->routes['POST'] = [];
    }

    // profile/(.*)/edit
    public function registerRoute(string $route, string $requestMethod, callable $handler):RouterInterface
    {
        
        $this->routes[$requestMethod][$route] = $handler;
        // var_dump($this->routes);
        return $this;
        // preg_match_all(pattern:'/^' . $route . '$/');
    }
    public function invoke(string $uri, string $requestMethod):bool
    {
        foreach($this->routes[$requestMethod] as $route => $handler){
            // regexp
            $res = preg_match_all("/^" .$route . "$/", $uri, $matches);
            // var_dump($route);
            // var_dump($uri);
            if(!$res){
                continue;
            }

            $handler($matches);
            return true;
        }
        return false;
    }
}