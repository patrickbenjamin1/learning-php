<?php

declare(strict_types=1);

namespace Utils;

class Regex
{
    public static function getMatches(string $pattern, string $subject): array
    {
        $matches = [];
        preg_match_all($pattern, $subject, $matches);
        return $matches[1];
    }

    public static function match(string $pattern, string $subject): bool
    {
        return preg_match($pattern, $subject) === 1;
    }
}
