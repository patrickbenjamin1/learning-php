<?php
// init

session_start();

// defined some global variables from the request
$request_path = $_SERVER['REQUEST_URI'];
$request_verb = $_SERVER['REQUEST_METHOD'];
$request_headers = getallheaders();

// publicPath to attempt to load file
$publicPath = __DIR__ . '/public' . $request_path;

// file exists in public path for request and is supported filetype, attempt to serve that file from www/ directory
if (preg_match('/\/[\.|\w]+(.css|.png|.jpg|.xml|.js)$/', $request_path) && file_exists($publicPath)) {
    include $publicPath;

    // if request path begins with /api/v1, and Content-Type is JSON serve the api
} else if (preg_match('/^\/api\/v1\/\w+/', $request_path)) {
    include __DIR__ . '/api/index.php';

    // if request path begins with /view, only serve the markup for that view (for routing without) bypassing the shell from index.php
} else if (preg_match('/^\/view/', $request_path)) {
    //remove /view from $request_path so the included router treats it as a normal route
    $request_path = substr($request_path, 5);

    include __DIR__ . '/www/router.php';

    // otherwise serve the web
} else {
    include __DIR__ . '/www/index.php';
}