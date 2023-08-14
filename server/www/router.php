<?php

// include router utils
include_once __DIR__ . '/../utils/router.php';
include_once __DIR__ . '/routes.php';

// render views for paths
if (matches($routes['index']['template'])) {
    include __DIR__ . '/views/index.php';
} else if (matches($routes['things']['template'])) {
    include __DIR__ . '/views/things.php';
} else if (matches($routes['thing']['template'])) {
    include __DIR__ . '/views/thing.php';
} else if (matches($routes['stuff']['template'])) {
    include __DIR__ . '/views/stuff.php';
} else {
    http_response_code(404);
    include __DIR__ . '/views/404.php';
}