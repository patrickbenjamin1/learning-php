<?php
    // get thing name from path

    $params = matchParams($routes['thing']['template'], $path);

    $name=$params['name'] ?? null;
?>

<main>
    <h1>thing <?php echo $name ?></h1>
</main>