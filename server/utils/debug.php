<?php

declare(strict_types=1);

namespace Utils;

class Debug
{
    static function dump(mixed $value)
    {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
    }
    /** dump and die a value */
    static function dd(mixed $value)
    {
        Debug::dump($value);

        die();
    }
}
