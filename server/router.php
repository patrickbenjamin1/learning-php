<?php

$path = $_SERVER['REQUEST_URI'];

// /
if (preg_match('/^\/$|^$/', $path) === 1) {
    include __DIR__.'/views/index.php';
}
// /thing/[match]
elseif (preg_match('/^\/thing\/(\w+)$/', $path) === 1){
    include __DIR__.'/views/thing.php';
}
else {
    http_response_code(404);
    include __DIR__.'/views/404.php';
}

?>