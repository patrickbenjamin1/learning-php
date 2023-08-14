<?php
// define globals
include_once __DIR__ . '/../repositories/things.php';
include_once __DIR__ . '/routes.php';

// render HTML for page

if ($isViewRequest) {
    include __DIR__ . '/router.php';
    return;
}

?>

<head>
    <?php include __DIR__ . '/metadata.php' ?>

    <link rel='stylesheet' href='/styles.css' />
    <script type="text/javascript" src="/app.bundle.js"></script>
</head>

<body>
    <?php include __DIR__ . '/components/header.php' ?>
    
    <div id='root'>
        <?php include __DIR__ . '/router.php' ?>
    </div>
</body>
