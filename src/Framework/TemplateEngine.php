<?php

namespace Framework;

/**
 * Class TemplateEngine
 * 
 * This class provides basic templating functionality, allowing for the rendering of templates with provided data.
 */
class TemplateEngine
{
    /**
     * @var string The base path to the template files.
     */
    private string $basePath;

    /**
     * TemplateEngine constructor.
     * 
     * Initializes the template engine with the base path for templates.
     * 
     * @param string $basePath The base path where template files are located.
     */
    public function __construct(string $basePath)
    {
        $this->basePath = $basePath;
    }

    /**
     * Renders a template with the provided data.
     * 
     * This method takes a template file, includes it, and injects the provided data into the template.
     * The output of the template is captured and returned as a string.
     * 
     * @param string $template The name of the template file to render, relative to the base path.
     * @param array $data Optional associative array of data to be extracted into the template.
     * @return string The rendered template output.
     */
    public function render(string $template, array $data = []): string
    {
        extract($data, EXTR_SKIP);
        ob_start();
        include $this->resolve($template);
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    /**
     * Resolves the full path to a template file.
     * 
     * This method combines the base path with the given template file path to generate the full file path.
     * 
     * @param string $path The relative path to the template file.
     * @return string The full path to the template file.
     */
    public function resolve(string $path): string
    {
        return "{$this->basePath}/{$path}";
    }
}
