<?php if (!!$thing) { ?>

<a class='thing-card' href='<?php echo $routes['thing']['route']($thing->id) ?>'>
    <?php echo $thing->name ?>
</a>

<?php }