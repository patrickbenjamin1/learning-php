<?php

$path = $_SERVER['REQUEST_URI'];

$matchedPath = false;

foreach($routes as $routeKey => $routeValue) {
    if ($routeValue->path === $path){
        $matchedPath = true;
        include $routeValue->viewPath;
    }
}

if ($matchedPath === false){
    http_response_code(404);
    include __DIR__.'/views/404.php';
}

?>