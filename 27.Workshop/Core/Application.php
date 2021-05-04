<?php
namespace Core;

use Routing\RouterInterface;

class Application
{
    private $controllerName;
    private $actionName;
    private $params = [];
    private $uri;
    private $serverInfo;
    private $router;

    public function __construct(string $controllerName, string $actionName, array $params, $uri, $serverInfo, RouterInterface $router)
    {
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;
        $this->params = $params;
        $this->uri = $uri;
        $this->serverInfo = $serverInfo;
        $this->router = $router;
    }

    public function start()
    {
        $fullControllerName = 'Controller\\'.ucfirst($this->controllerName). 'Controller';
        if(!class_exists($fullControllerName) || !method_exists($fullControllerName, $this->actionName)){
            if(!$this->router->invoke($this->uri, $this->serverInfo['REQUEST_METHOD'])){
                http_response_code(404);
                echo "<h1>404 Not Found</h1>";
            }
            exit;
        }
        $controllerInstance = new $fullControllerName();
        call_user_func_array([$controllerInstance, $this->actionName], $this->params);
    }
}