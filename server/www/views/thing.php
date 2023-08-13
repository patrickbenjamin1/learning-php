<?php
include_once __DIR__ . '/../../repositories/things.php';

// get thing id from path

$params = getParamsFromRoute($routes['thing']['template'], $requestPath);

$id = $params['id'] ?? null;

$thing = getThingById($id);

if (!$thing) {
    include __DIR__ . '/404.php';
    return;
}
?>

<div class="view">
    <h1><?php echo $thing->name ?></h1>
</div>  

<script src="/thing.bundle.js" defer></script>
