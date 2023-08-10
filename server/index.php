<?php
// init

session_start();

$path = $_SERVER['REQUEST_URI'];

// filepath to attempt to load file
$filePath = __DIR__ . '/public' . $path;

// file exists in public path for request and is supported filetype, attempt to serve that file from www/ directory
if (preg_match('/\/\w+(.css|.png|.jpg|.xml|.js)$/', $path) && file_exists($filePath)) {
    include $filePath;

    // if request path begins with /api/v1, serve the api
} else if (preg_match('/ \/api\/v1\/\w+/', $path)) {
    include __DIR__ . '/api/index.php';

    // otherwise serve the web
} else {
    include __DIR__ . '/www/index.php';
}