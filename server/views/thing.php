<?php
    // get thing name from path

    $params = matchParams('/thing/[name]', $path);

    $name=$params['name'] ?? null;
?>

<main>
    <h1>thing <?php echo $name ?></h1>
</main>