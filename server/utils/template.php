<?php

namespace Utils;

/**
 * Class Template
 * 
 * This class provides utility methods for rendering templates in PHP.
 */
class Template {
    /**
     * Render a template file with optional data.
     * 
     * @param string $path The path to the template file.
     * @param array $data An associative array of data to be passed to the template.
     * @throws \Exception If the template file does not exist.
     */
    static function render(string $path, ?array $data = []) {
        $path;
        if (!file_exists($path)) {
            throw new \Exception("Template not found: $path");
        }
        extract($data);
        require $path;
    }

    /**
     * Render a partial template file with optional data.
     * 
     * @param string $partialPath The path to the partial template file.
     * @param array $data An associative array of data to be passed to the partial template.
     * @return void
     */
    public static function partial (string $partialPath, ?array $data = []) {
        return Template::render(__DIR__ . "/../web/partials/$partialPath.php", $data);
    }

    /**
     * Render a view template file with optional data.
     * 
     * @param string $viewPath The path to the view template file.
     * @param array $data An associative array of data to be passed to the view template.
     * @return void
     */
    public static function view (string $viewPath, ?array $data = []) {
        return Template::render(__DIR__ . "/../web/views/$viewPath.php", $data);
    }
}