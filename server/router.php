<?php declare(strict_types=1);

use Utils\Router;
use Utils\Template;
use Utils\File;
use Utils\Request;

// initialise router
Router::init();

// serve controllers for routes
Router::controller('/', new \Controllers\Index());
Router::controller('/things', new \Controllers\Things());
Router::controller('/things/:thingId', new \Controllers\Thing());

// serve files from public
Router::regex(File::getFileRegex(), function(Request $request) {
    File::serve('public' . $request->path);
});

// serve 404 if none of the above match
Router::path('*', function() {
    http_response_code(404);
    return Template::view('404');
});
