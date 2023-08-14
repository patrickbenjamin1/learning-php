<?php

// include router utils
include __DIR__ . '/../../repositories/things.php';

if (matches('/api/v1/things') && $requestVerb === 'GET') {
    include __DIR__ . '/getAll.php';
} else if (matches('/api/v1/things/[id]') && $requestVerb === 'GET') {
    include __DIR__ . '/getOne.php';
} else {
    http_response_code(404);
}