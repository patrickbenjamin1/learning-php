<?php
// init

session_start();

// defined some global variables from the request
$requestPath = $_SERVER['REQUEST_URI'];
$requestVerb = $_SERVER['REQUEST_METHOD'];
$requestHeaders = getallheaders();

$isViewRequest = false;

// publicPath to attempt to load file
$publicPath = __DIR__ . '/public' . $requestPath;

// file exists in public path for request and is supported filetype, attempt to serve that file from www/ directory
if (preg_match('/\/[\.|\w]+(.css|.png|.jpg|.xml|.js)$/', $requestPath) && file_exists($publicPath)) {
    include $publicPath;

    // if request path begins with /api/v1
} else if (preg_match('/^\/api\/v1\/\w+/', $requestPath)) {
    include __DIR__ . '/api/index.php';

    // if request path begins with /view, bypass index.php and only render the content of that view
} else {
    if (preg_match('/^\/view/', $requestPath)) {
        //remove /view from $requestPath so the included router treats it as a normal route
        $requestPath = substr($requestPath, 5);
        $isViewRequest = true;
    }
    
    // otherwise serve the web
    include __DIR__ . '/www/index.php';
}