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
        exit;
    }

    public static function sendError(string $message, int $status = 500): void
    {
        Response::send([
            'message' => $message,
            'status' => $status
        ], $status);
    }

    public static function redirect(string $url): void
    {
        header('Location: ' . $url);
        Response::send(null, 302);
    }
}
