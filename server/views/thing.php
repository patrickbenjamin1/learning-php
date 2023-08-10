<?php
    // get thing id from path

    $params = matchParams($routes['thing']['template'], $path);

    $id = $params['id'] ?? null;

    $thing = getThingById($id);

    if (!$thing){
        include __DIR__.'/404.php';
    } else {
?>

<main>
    <h1><?php echo $thing->name ?></h1>
</main>

<?php }