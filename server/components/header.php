<header class='header'>
    <a class='header-logo' href='/'>
        patrick's cool php website
    </a>
    <nav class='header-navigation'>
        <a 
            class='header-navigation-link' 
            <?php echo ($path==='/thing/hello') ? "data-current" : "" ?> 
            href="/thing/hello"
        >
            hello
        </a>
        <a 
            class='header-navigation-link' 
            <?php echo ($path==='/thing/world') ? "data-current" : "" ?> 
            href="/thing/world"
        >
            world
        </a>
    </nav>
</header>