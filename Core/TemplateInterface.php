<?php
namespace App\Core;

interface TemplateInterface
{
    public function render(string $templateName, $data=null);
}