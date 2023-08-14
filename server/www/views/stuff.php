<?php
include_once __DIR__ . '/../../repositories/things.php';
include_once __DIR__ . '/../../repositories/prismic/stuff.php';

// get stuff id from path

$params = getParamsFromRoute($routes['stuff']['template'], $request_path);

$uid = $params['uid'] ?? null;

$stuffItem = getStuffByUid($uid);

if (!$stuffItem) {
    include __DIR__ . '/404.php';
    return;
}
?>

<div class="view">
    <h1><?php echo $stuffItem->data->name ?></h1>
</div>  

