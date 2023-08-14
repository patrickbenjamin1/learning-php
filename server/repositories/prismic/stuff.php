<?php
use Prismic\Predicates;

include_once __DIR__ . '/api.php';

function getAllStuff()
{
    global $prismic;

    return $prismic->query(
        Predicates::at('document.type', 'stuff')
    );
}

function getStuffByUid(string $uid)
{
    global $prismic;

    return $prismic->getByUID('stuff', $uid);
}