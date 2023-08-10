<?php

include __DIR__ . '/../router.php';

// render views for paths
if (matches($routes['index']['template'], $path)) {
    include __DIR__ . '/views/index.php';
} else if (matches($routes['things']['template'], $path)) {
    include __DIR__ . '/views/things.php';
} else if (matches($routes['thing']['template'], $path)) {
    include __DIR__ . '/views/thing.php';
} else {
    http_response_code(404);
    include __DIR__ . '/views/404.php';
}