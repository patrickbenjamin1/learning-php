<?php

$path = $_SERVER['REQUEST_URI'];

switch ($path) {
    case '':
    case '/':
        include __DIR__.'/views/index.php';
        break;

    case '/thing':
        include __DIR__.'/views/thing.php';
        break;

    default:
        http_response_code(404);
        include __DIR__.'/views/404.php';
        break;
}
?>