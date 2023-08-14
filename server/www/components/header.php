<header class='header'>
    <a class='header-logo' href="<?php echo $routes['index']['route'] ?>">
        patrick's cool php website
    </a>
    <nav class='header-navigation'>
        <a 
            class='header-navigation-link' 
            <?php echo ($requestPath === $routes['things']['route']) ? "data-current" : "" ?> 
            href="<?php echo $routes['things']['route'] ?>"
        >
            things
        </a>
    </nav>
</header>