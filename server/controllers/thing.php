<?php

declare(strict_types=1);

namespace Controllers;

class Thing extends Controller
{
    public static function get(\Utils\Request $request)
    {
        if (!isset($request->params['thingId'])) {
            \Utils\Template::view('404');
        }

        \Utils\Template::view('thing', [
            'thingId' => $request->params['thingId']
        ]);
    }
}
