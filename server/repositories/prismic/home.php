<?php
use Prismic\Predicates;

include_once __DIR__ . '/api.php';

function getHome()
{
    global $prismic;

    return $prismic->queryFirst(
        Predicates::at('document.type', 'home')
    );
}