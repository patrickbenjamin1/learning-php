<?php
// define globals
include __DIR__ . '/../repositories/things.php';
include __DIR__ . '/routes.php';

// render HTML for page
?>

<head>
    <?php require __DIR__ . '/metadata.php' ?>

    <link rel='stylesheet' href='/styles.css' />
    <script type="text/javascript" src="/app.bundle.js"></script>
</head>

<body>
    <?php require __DIR__ . '/components/header.php' ?>
    
    <main id='entry'>
        <?php require __DIR__ . '/router.php' ?>
    </main>

    <?php require __DIR__ . '/components/footer.php' ?>
</body>