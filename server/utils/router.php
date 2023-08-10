<?php

// define router functions

$paramTemplateRegex = '/^\[(\w+)\]$/';

// check if part of a route matches part of the current path
function matchesPart(string $testRoutePart, string $currentPathPart)
{
    global $paramTemplateRegex;

    if (preg_match($paramTemplateRegex, $testRoutePart) === 1 || $testRoutePart === $currentPathPart) {
        return true;
    }

    return false;
}

// check if a route matches the current path - route and path must start /
function matches(string $testRoute, string $currentPath, bool $exact = true)
{
    // split    
    $testRouteParts = explode('/', $testRoute);
    $currentPathParts = explode('/', $currentPath);

    if ($exact && count($testRouteParts) !== count($currentPathParts)) {
        return false;
    }

    $doesntSatisfy = false;

    foreach ($testRouteParts as $index => $testRoutePart) {
        $matches = matchesPart($testRoutePart, $currentPathParts[$index]);

        if ($matches === false) {
            $doesntSatisfy = true;
        }
    }

    return !$doesntSatisfy;
}

// get an object containing the params from the current path matched against a route
function matchParams(string $testRoute, string $currentPath)
{
    global $paramTemplateRegex;

    $params = [];

    // split    
    $testRouteParts = explode('/', $testRoute);
    $currentPathParts = explode('/', $currentPath);

    foreach ($testRouteParts as $index => $testRoutePart) {
        if (preg_match($paramTemplateRegex, $testRoutePart) === 1) {
            $matches;
            preg_match($paramTemplateRegex, $testRoutePart, $matches);
            $key = $matches[1];
            $params += [$key => urldecode($currentPathParts[$index])];
        }
    }

    return $params;
}