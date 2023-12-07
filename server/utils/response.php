<?php

declare(strict_types=1);

namespace Utils;

class Response
{
    public static function send($data, int $status = 200): void
    {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public static function sendError(string $message, int $status = 500): void
    {
        self::send([
            'error' => $message
        ], $status);
    }
}
