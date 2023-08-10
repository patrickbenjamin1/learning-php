<?php

// include router utils
include __DIR__ . '/../utils/router.php';

// render views for paths
if (matches($routes['index']['template'], $request_path)) {
    include __DIR__ . '/views/index.php';
} else if (matches($routes['things']['template'], $request_path)) {
    include __DIR__ . '/views/things.php';
} else if (matches($routes['thing']['template'], $request_path)) {
    include __DIR__ . '/views/thing.php';
} else {
    http_response_code(404);
    include __DIR__ . '/views/404.php';
}