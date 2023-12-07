<?php

namespace Utils;

class File {
    public static function serve (string $path) {
        $fullPath = __DIR__.'/../'.$path;

        if (file_exists($fullPath)) {
            header('Content-Type: ' . File::getMimeType($fullPath));
            header('Content-Length: ' . filesize($fullPath));

            readfile($fullPath);
            exit();
        } else {
            http_response_code(404);
            exit();
        }
    }

    private static $mimeTypes = [
        'css' => 'text/css',
        'js' => 'application/javascript',

        // images
        'png' => 'image/png',
        'jpe' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'jpg' => 'image/jpeg',
        'gif' => 'image/gif',
        'bmp' => 'image/bmp',
        'ico' => 'image/vnd.microsoft.icon',
        'tiff' => 'image/tiff',
        'tif' => 'image/tiff',
        'svg' => 'image/svg+xml',
        'svgz' => 'image/svg+xml',
    ];

    public static function getFileRegex () {
        $mimeTypesKeys = array_keys(File::$mimeTypes);
        $regexPattern = implode('|', $mimeTypesKeys);
        return '/\.(' . $regexPattern . ')$/i';
    }

    public static function getExtension($path) {
        return pathinfo($path, PATHINFO_EXTENSION);
    }

    public static function getMimeType($path) {
        $extension = File::getExtension($path);
        return File::$mimeTypes[$extension] ?? mime_content_type($path);
    }
}