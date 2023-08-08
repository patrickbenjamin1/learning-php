<?php

class Route {
    public $name;
    public $path;
    public $viewPath;
}

class Routes {
    public $index;
    public $thing;
}

global $routes;
$routes = new Routes();

$routes->index = new Route();
$routes->index->name = 'Home';
$routes->index->path = '/';
$routes->index->viewPath = __DIR__.'/views/index.php';

$routes->thing = new Route();
$routes->thing->name = 'Thing';
$routes->thing->path = '/thing';
$routes->thing->viewPath = __DIR__.'/views/thing.php';