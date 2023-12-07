<?php declare(strict_types=1); ?>

<?php Utils\Template::partial('head', ['title' => 'Home']) ?>
    <?php Utils\Template::partial('header') ?>

    <main id="root">
        <p>Hello</p>

        <a href="/things">Things</a>
    </main>
<?php Utils\Template::partial('foot') ?>
