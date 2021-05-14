<?php
namespace Core;

use Routing\RouterInterface;

class Application
{
    private $mvcContext;
    private $uri;
    private $serverInfo;
    /** @var RouterInterface */
    private $router;
    private $dependencies = [];
    private $resolvedDependancies = [];


    public function __construct(MvcContextInterface $mvcContext, $uri, $serverInfo, RouterInterface $router)
    {
        $this->mvcContext = $mvcContext;
        $this->uri = $uri;
        $this->serverInfo = $serverInfo;
        $this->router = $router;
        $this->dependencies[MvcContextInterface::class] = get_class($mvcContext);
        $this->resolvedDependancies[get_class($mvcContext)] = $mvcContext;
    }

    public function registerDependancy(string $abstraction, string $implementation)
    {
        $this->dependencies[$abstraction] = $implementation;
    }

    public function start()
    {
        $fullControllerName = 'Controller\\'.ucfirst($this->mvcContext->getControllerName()). 'Controller';
        if(!class_exists($fullControllerName) || !method_exists($fullControllerName, $this->mvcContext->getActionName())){
            if(!$this->router->invoke($this->uri, $this->serverInfo['REQUEST_METHOD'])){
                http_response_code(404);
                echo "<h1>404 Not Found</h1>";
            }
            exit;
        }
        $controllerInstance = new $fullControllerName();
        call_user_func_array([$controllerInstance, $this->mvcContext->getActionName()], $this->mvcContext->getParams());
    }

    public function resolve($className)
    {
        if(key_exists($className, $this->resolvedDependancies)){
            return $this->resolvedDependancies[$className];
        }
        $classInfo = new \ReflectionClass($className);
        $constructor = $classInfo->getConstructor();
        if($constructor === null){
            $obj = new $className;
            $this->resolvedDependancies[$className] = $obj;

            return $obj;
        }

        $params = $constructor->getParameters();
        $getParams = $this->mvcContext->getParams();
        for($i=count($getParams); $i<count($params); $i++){
            $dependencyInterface = $
        }
    }
}