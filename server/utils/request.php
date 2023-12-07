<?php

declare(strict_types=1);

namespace Utils;

/**
 * Represents an HTTP request.
 */
class Request
{
    /**
     * The HTTP method of the request.
     *
     * @var string
     */
    public string $method;

    /**
     * The URI (Uniform Resource Identifier) of the request.
     *
     * @var string
     */
    public string $path;

    /**
     * The headers of the request.
     *
     * @var array
     */
    public array $headers;

    /**
     * The body of the request.
     *
     * @var array
     */
    public array $body;

    /**
     * The time the request was made.
     *
     * @var int
     */
    public int $request_time;

    public array $params;

    /**
     * Constructs a new Request object.
     *
     * @param string $method The HTTP method of the request.
     * @param string $path The URI of the request.
     * @param array $headers The headers of the request.
     * @param array $body The body of the request.
     * @param int $request_time The time the request was made.
     */
    public function __construct(string $method, string $path, array $headers, array $body, int $request_time = 0)
    {
        $this->method = $method;
        $this->path = $path;
        $this->headers = $headers;
        $this->body = $body;
        $this->request_time = $request_time;
    }

    /**
     * Get parameters from the URL
     */
    public function applyParams(array $params)
    {
        if ($params) {
            $this->params = $params;
        }
    }

    /**
     * Parses the body of the current HTTP request and returns an array.
     */
    public static function parseBody()
    {
        $body = file_get_contents('php://input');
        $parsedBody = [];
        parse_str($body, $parsedBody);
        return $parsedBody;
    }

    /**
     * Parses the current HTTP request and returns a new Request object.
     *
     * @return Request The parsed Request object.
     */
    public static function parse()
    {
        $method = strtoupper($_SERVER['REQUEST_METHOD']);
        $path = strtolower($_SERVER['REQUEST_URI']);
        $headers = getallheaders();
        $body = Request::parseBody();
        $request_time = $_SERVER['REQUEST_TIME'];

        return new Request($method, $path, $headers, $body, $request_time);
    }
}
