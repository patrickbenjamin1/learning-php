<?php

// define routes
$routes = [
    "index" => [
        "route" => "/",
        "template" => "/"
    ],
    "thing" => [
        "route" => function($name) { return "/thing/".$name; },
        "template" => "/thing/[name]"
    ]
];
