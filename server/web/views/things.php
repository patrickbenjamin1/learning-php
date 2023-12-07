<?php

declare(strict_types=1); ?>

<?php Utils\Template::partial('head', ['title' => 'Things']) ?>
<?php Utils\Template::partial('header') ?>

<main id="root">
    <h1>These are the things</h1>

    <div class="things">
        <?php for ($i = 0; $i < 10; $i++) { ?>
            <?php Utils\Template::partial('thingCard', ['thingId' => $i]) ?>
        <?php } ?>
    </div>
</main>
<?php Utils\Template::partial('foot') ?>