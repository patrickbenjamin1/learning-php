<?php
include_once __DIR__ . '/../../repositories/things.php';

// get thing id from path

$params = getParamsFromRoute($routes['thing']['template']);

$id = $params['id'] ?? null;

$thing = getThingById($id);

if (!$thing) {
    include __DIR__ . '/404.php';
    return;
}
?>

<main class="view">
    <h1><?php echo $thing->name ?></h1>
</main>  

<?php include __DIR__ . '/../components/footer.php' ?>
<script src="/thing.bundle.js" defer></script>
