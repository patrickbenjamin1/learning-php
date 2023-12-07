<?php

declare(strict_types=1);

namespace Controllers\Api;

class Thing extends \Controllers\Controller
{
    public static function get(\Utils\Request $request)
    {
        \Utils\Response::send(
            ['thing' => $request->params['thingId']]
        );
    }
}
