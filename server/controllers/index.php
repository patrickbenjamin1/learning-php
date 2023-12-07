<?php declare(strict_types=1);

namespace Controllers;

class Index extends Controller {
    public static function get(\Utils\Request $request) {
        return \Utils\Template::view('index');
    }
}