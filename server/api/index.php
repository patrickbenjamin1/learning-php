<?php

// include router utils
include __DIR__ . '/../utils/router.php';

if (matches('/api/v1/things', $request_path, false)) {
    include __DIR__ . '/things/index.php';
} else {
    http_response_code(404);
}