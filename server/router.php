<?php

declare(strict_types=1);

use Utils\Router;
use Utils\Template;
use Utils\File;
use Utils\Request;

$router = new Router();

// serve controllers for web routes
$router->controller('/', new \Controllers\Index());
$router->controller('/things', new \Controllers\Things());
$router->controller('/things/:thingId', new \Controllers\Thing());

$router->include('/api', __DIR__ . '/controllers/api/index.php', false);

// serve files from public
$router->regex(File::getFileRegex(), function (Request $request) {
    File::serve('public' . $request->path);
});

// serve 404 if none of the above match
$router->path('*', function () {
    http_response_code(404);
    Template::view('404');
});
