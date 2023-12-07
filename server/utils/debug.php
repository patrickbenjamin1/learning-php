<?php

namespace Utils;

class Debug {
    /** dump and die a value */
    static function dd(mixed $value) {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
        
        die();
    }
}