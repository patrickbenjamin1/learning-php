<?php

// define router functions

$paramTemplateRegex = '/^\[(\w+)\]$/';

// check if part of a route matches part of the current path
function matchesPart(string $templatePart, string $currentPathPart)
{
    global $paramTemplateRegex;

    if (preg_match($paramTemplateRegex, $templatePart) === 1 || $templatePart === $currentPathPart) {
        return true;
    }

    return false;
}

// check if a route matches the current path - route and path must start /
function matches(string $template, string $currentPath, bool $exact = true)
{
    // split    
    $templateParts = explode('/', $template);
    $currentPathParts = explode('/', $currentPath);

    if ($exact && count($templateParts) !== count($currentPathParts)) {
        return false;
    }

    $doesntSatisfy = false;

    foreach ($templateParts as $index => $templatePart) {
        $doesMatch = matchesPart($templatePart, $currentPathParts[$index]);

        if ($doesMatch === false) {
            $doesntSatisfy = true;
        }
    }

    return !$doesntSatisfy;
}

// get an object containing the params from the current path matched against a route
function getParamsFromRoute(string $template, string $currentPath)
{
    global $paramTemplateRegex;

    $params = [];

    // split    
    $templateParts = explode('/', $template);
    $currentPathParts = explode('/', $currentPath);

    foreach ($templateParts as $index => $templatePart) {
        if (preg_match($paramTemplateRegex, $templatePart) === 1) {
            $matches;
            preg_match($paramTemplateRegex, $templatePart, $matches);
            $key = $matches[1];
            $params += [$key => urldecode($currentPathParts[$index])];
        } else if ($templatePart !== $currentPathParts[$index]) {
            return null;
        }
    }

    return $params;
}