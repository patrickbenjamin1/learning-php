<?php

declare(strict_types=1);

// autoload classes
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/utils/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable((__DIR__ . '/../'));
$dotenv->load();

require __DIR__ . '/database/index.php';
require __DIR__ . '/router.php';
