<?php declare(strict_types=1);

// autoload classes
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/utils/autoload.php';

// parse request
$request = Utils\Request::parse();

require __DIR__ . '/router.php';
