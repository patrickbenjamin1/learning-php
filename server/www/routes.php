<?php

// define routes
$routes = [
    "index" => [
        "route" => "/",
        "template" => "/"
    ],
    "things" => [
        "route" => "/things",
        "template" => "/things"
    ],
    "thing" => [
        "route" => function($id) { return "/things/".urlencode($id); },
        "template" => "/things/[id]"
    ]
];
