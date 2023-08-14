<?php
include_once __DIR__ . '/../../repositories/things.php';
include_once __DIR__ . '/../../repositories/prismic/home.php';
include_once __DIR__ . '/../../repositories/prismic/stuff.php';

$things = getAllThings();
$stuff = getAllStuff();
$data = getHome();

?>

<div class="view">
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
    
    <div class='things'>
        <?php

        if (count($stuff->results)) {
            foreach ($stuff->results as $stuffItem) {
                include __DIR__ . '/../components/stuffCard.php';
            }
        }

        ?>
    </div>

    <a 
        class='header-navigation-link' 
        <?php echo ($request_path === $routes['things']['route']) ? "data-current" : "" ?> 
        href="<?php echo $routes['things']['route'] ?>"
    >
        all things
    </a>
        </div>