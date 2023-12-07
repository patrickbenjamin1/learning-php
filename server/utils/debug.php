<?php

declare(strict_types=1);

namespace Utils;

class Debug
{
    /** dump a value */
    static function dump(mixed $value)
    {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
    }

    /** dump a value and die */
    static function dd(mixed $value)
    {
        Debug::dump($value);

        die();
    }
}
