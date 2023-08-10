<header class='header'>
    <a class='header-logo' href="<?php $routes['index']['route'] ?>">
        patrick's cool php website
    </a>
    <nav class='header-navigation'>
        <a 
            class='header-navigation-link' 
            <?php echo ($path===$routes['thing']['route']('hello')) ? "data-current" : "" ?> 
            href="<?php echo $routes['thing']['route']('hello') ?>"
        >
            hello
        </a>
        <a 
            class='header-navigation-link' 
            <?php echo ($path===$routes['thing']['route']('world')) ? "data-current" : "" ?> 
            href="<?php echo $routes['thing']['route']('world') ?>"
        >
            world
        </a>
    </nav>
</header>