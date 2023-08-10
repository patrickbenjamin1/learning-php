<div class="view">
    <h1>home</h1>

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

    <a 
        class='header-navigation-link' 
        <?php echo ($path === $routes['things']['route']) ? "data-current" : "" ?> 
        href="<?php echo $routes['things']['route'] ?>"
    >
        all things
    </a>
        </div>