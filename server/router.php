<?php

// define router functions

$paramTemplateRegex = '/^\[(\w+)\]$/';

// check if part of a route matches part of the current path
function matchesPart(string $testRoutePart, string $currentPathPart) {
    global $paramTemplateRegex;

    if (preg_match($paramTemplateRegex, $testRoutePart) === 1 || $testRoutePart === $currentPathPart) {
        return true;
    }

    return false;
}

// check if a route matches the current path - route and path must start /
function matches(string $testRoute, string $currentPath) { 
    // split    
    $testRouteParts = explode('/', $testRoute);
    $currentPathParts = explode('/', $currentPath);

    if (count($testRouteParts) !== count($currentPathParts)){
        return false;
    }

    $doesntSatisfy = false;
    
    foreach ($testRouteParts as $index=>$testRoutePart){
        $matches = matchesPart($testRoutePart, $currentPathParts[$index]);

        if ($matches === false){
            $doesntSatisfy = true;
        }
    }

    return !$doesntSatisfy;
}

// get an object containing the params from the current path matched against a route
function matchParams(string $testRoute, string $currentPath) {
    global $paramTemplateRegex;

    $params = [];

    // split    
    $testRouteParts = explode('/', $testRoute);
    $currentPathParts = explode('/', $currentPath);

    foreach ($testRouteParts as $index=>$testRoutePart){
        if (preg_match($paramTemplateRegex, $testRoutePart) === 1){
            $matches;
            preg_match($paramTemplateRegex, $testRoutePart, $matches);
            $key=$matches[1];
            $params += [$key => $currentPathParts[$index]];
        }
    }

    return $params;
}

// render views for paths
if (matches($routes['index']['template'], $path)) {
    include __DIR__.'/views/index.php';
} else if (matches($routes['thing']['template'], $path)) {
    include __DIR__.'/views/thing.php';
} else {
    http_response_code(404);
    include __DIR__.'/views/404.php';
}
