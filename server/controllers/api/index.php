<?php

namespace Controllers\Api;

$router = new \Utils\Router();

$router->path('/api', function () {
    \Utils\Response::send(
        [
            'message' => 'Hello, world!'
        ]
    );
});

$router->controller('/api/things/:thingId', new \Controllers\Api\Thing());
$router->controller('/api/things', new \Controllers\Api\Things());

$router->path('*', function () {
    \Utils\Response::sendError('API endpoint not found', 404);
});
