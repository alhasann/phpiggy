<?php

declare(strict_types=1);
/**
 * Template Engine 
 * 
 * @param $basePath store the absolute path to the directory with our templates. 
 * 
 * 
 */

namespace Framework;

class TemplateEngine
{
    public function __construct(private string $basePath) //public const VIEW = __DIR__ . "/../views"; Paths class
    {
    }
    public function render(string $template)
    {
        include "{$this->basePath}/{$template}";
    }
}
