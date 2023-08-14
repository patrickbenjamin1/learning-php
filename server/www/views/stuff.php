<?php
include_once __DIR__ . '/../../repositories/things.php';
include_once __DIR__ . '/../../repositories/prismic/stuff.php';

// get stuff id from path

$params = getParamsFromRoute($routes['stuff']['template']);

$uid = $params['uid'] ?? null;

$stuffItem = getStuffByUid($uid);

if (!$stuffItem) {
    include __DIR__ . '/404.php';
    return;
}
?>

<main class="view">
    <h1><?php echo $stuffItem->data->name ?></h1>

</main>  

<?php include __DIR__ . '/../components/footer.php' ?>
