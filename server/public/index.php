<?php

use Illuminate\Support\Facades\Route;


require_once __DIR__ . '/../vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(Utils\Paths::getPathFromRoot('../'));
$dotenv->load();

require_once __DIR__ . '/../router.php';


// $app = require_once __DIR__ . '/../app/app.php';

// $kernel = $app->make(Kernel::class);

// $response = $kernel->handle(
//     $request = Request::capture()
// )->send();

// $kernel->terminate($request, $response);
