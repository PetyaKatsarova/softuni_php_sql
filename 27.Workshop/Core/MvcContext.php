<?php
namespace Core;

use Core\MvcContextInterface;

class MvcContext implements MvcContextInterface
{
    private $controllerName;
    private $actionName;
    private $params = [];

    public function __construct($controllerName, $actionName, $params)
    {
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;
        $this->params = $params;
    }
    public function getControllerName():?string{
        return $this->controllerName;
    }
    public function getActionName():?string{
        return $this->actionName;
    }
    public function getParams():?array{
        return $this->params;
    }
}