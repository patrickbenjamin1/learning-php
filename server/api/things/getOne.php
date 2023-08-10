<?php
// get thing id from path

$params = getParamsFromRoute('/api/v1/things/[id]', $request_path);

$id = $params['id'] ?? null;

$thing = getThingById($id);

if ($thing) {
    http_response_code(200);
    echo json_encode($thing);
} else {
    http_response_code(404);
}