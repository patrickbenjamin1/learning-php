<?php
include_once __DIR__ . '/../../repositories/things.php';
include_once __DIR__ . '/../../repositories/prismic/home.php';
include_once __DIR__ . '/../../repositories/prismic/stuff.php';

$things = getAllThings();
$stuff = getAllStuff();
$data = getHome();

?>

<main class="view">
    <h1><?php echo $data->data->title ?></h1>

    <div class='things'>
        <?php
        $topThings = array_slice($things, 0, 3);

        if (count($topThings)) {
            foreach ($topThings as $thing) {
                include __DIR__ . '/../components/thingCard.php';
            }
        }
        ?>
    </div>
    
    <ul class='stuff'>
        <?php

        if (count($stuff->results)) {
            foreach ($stuff->results as $stuffItem) {
                include __DIR__ . '/../components/stuffCard.php';
            }
        }

        ?>
    </ul>

    <a 
        class='header-navigation-link' 
        <?php echo ($requestPath === $routes['things']['route']) ? "data-current" : "" ?> 
        href="<?php echo $routes['things']['route'] ?>"
    >
        all things
    </a>
</main>

<?php include __DIR__ . '/../components/footer.php' ?>