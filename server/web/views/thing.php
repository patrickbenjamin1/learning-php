<?php

declare(strict_types=1); ?>

<?php Utils\Template::partial('head', ['title' => 'Thing']) ?>
<?php Utils\Template::partial('header') ?>

<main id="root">
    <p>This is a thing: <?= $thingId ?? '' ?></p>
</main>
<?php Utils\Template::partial('foot') ?>