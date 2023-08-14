<?php

include_once __DIR__ . '/../../repositories/things.php';

$things = getAllThings()

    ?>

<main class="view">
    <h1>all things</h1>

    <div class='things'>
        <?php
        if (count($things)) {
            foreach ($things as $thing) {
                include __DIR__ . '/../components/thingCard.php';
            }
        }
        ?>
    </div>
    </main>

<?php include __DIR__ . '/../components/footer.php' ?>
