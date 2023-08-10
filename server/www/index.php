<?php
// define globals
include __DIR__ . '/../repository/things.php';
include __DIR__ . '/routes.php';
?>

<head>
    <?php require __DIR__ . '/metadata.php' ?>

    <link rel='stylesheet' href='/styles.css' />
</head>

<body>    
    <?php require __DIR__ . '/components/header.php' ?>
    
    <main>
        <?php require __DIR__ . '/router.php' ?>
    </main>

    <?php require __DIR__ . '/components/footer.php' ?>
</body>