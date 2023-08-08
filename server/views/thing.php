<?php
    // get thing name from path

    $matches;

    preg_match('/^\/thing\/(\w+)$/', $path, $matches);

    $name = $matches[1];
?>

<main>
    <h1>thing <?php echo $name ?></h1>
</main>