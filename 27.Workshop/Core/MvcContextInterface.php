<?php
namespace Core;

interface MvcContextInterface
{
    // ?string can be null or string !!!
    public function getControllerName():?string;
    public function getActionNae():?string;
    public function getParams():?array;
}