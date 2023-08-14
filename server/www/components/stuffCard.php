<?php
// if stuff isn't defined in the enclosing scope, return
if (!$stuffItem) {
    return;
}
?>

<li>
    <a class='stuff-card' href='<?php echo $routes['stuff']['route']($stuffItem->uid) ?>'>
        <?php echo $stuffItem->data->name ?>
    </a>
</li>
