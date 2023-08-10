<?php
    // init

    session_start();

    // define globals
    
    $path = $_SERVER['REQUEST_URI'];
    include __DIR__.'/routes.php';
?>

<head>
    <?php require __DIR__.'/metadata.php' ?>

    <style>
        <?php include __DIR__.'/styles.css' ?>
    </style>
</head>

<body>    
    <?php require __DIR__.'/components/header.php' ?>
    
    <?php require __DIR__.'/router.php' ?>

    <?php require __DIR__.'/components/footer.php' ?>
</body>