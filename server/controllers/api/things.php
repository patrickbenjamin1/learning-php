<?php

declare(strict_types=1);

namespace Controllers\Api;

class Things extends \Controllers\Controller
{
    public static function get(\Utils\Request $request)
    {
        \Utils\Response::send(
            ['things' => [
                ['thingId' => '1',],
                ['thingId' => '2',],
                ['thingId' => '3',],
            ]]
        );
    }
}
