<header class='header'>
    <a class='header-logo' href='/'>
        patrick's cool php website
    </a>
    <nav class='header-navigation'>
        <a 
            class='header-navigation-link' 
            data-current="<?php echo ($path==='/thing/hello') ? "true" : "false"?>" 
            href="/thing/hello"
        >
            hello
        </a>
        <a 
            class='header-navigation-link' 
            data-current="<?php echo ($path==='/thing/world') ? "true" : "false"?>" 
            href="/thing/world"
        >
            world
        </a>
    </nav>
</header>