<?php
namespace App\Http;
use Core\TemplateInterface;

class HttpHandlerAbstract
{
    /**@var TemplateInterface*/
    protected $template;

    public function __construct(TemplateInterface $template)
    {
        $this->template = $template;      
    }

    public function redirect($url)
    {
        header("Location: $url");
        exit;
    }
}