<?php
// get thing id from path

$params = matchParams($routes['thing']['template'], $request_path);

$id = $params['id'] ?? null;

$thing = getThingById($id);

if (!$thing) {
    include __DIR__ . '/404.php';
} else
?>

<div class="view">
    <h1><?php echo $thing->name ?></h1>
</div>  

<script src="/thing.bundle.js"></script>
