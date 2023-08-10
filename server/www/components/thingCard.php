<?php
// if thing isn't defined in the enclosing scope, return
if (!$thing) {
    return;
}
?>

<a class='thing-card' href='<?php echo $routes['thing']['route']($thing->id) ?>'>
    <?php echo $thing->name ?>
</a>

