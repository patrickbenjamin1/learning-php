<?php

namespace Utils;

class Paths {
    private static string $serverRootPath = __DIR__ . '/../';

    public static function getPathFromRoot (string $path) {
        return Paths::$serverRootPath . $path;
    }
}
