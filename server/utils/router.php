<?php

declare(strict_types=1);

namespace Utils;

class Router
{
    /** should this router only match once then move on? */
    private bool $matchOne = true;

    /** used to ensure only one route is matched by each router at a time */
    private bool $matched = false;

    private \Utils\Request $request;

    /**
     * Create a new router
     * @param array{matchOne?: bool} $params
     */
    public function __construct(?array $params = null)
    {
        $this->request = \Utils\Request::parse();

        $this->matchOne = $params['matchOne'] ?? true;
    }

    /** 
     * Check if a URL matches the current request, and return any named parameters
     * @param string $url in the syntax /part/:param
     * @param bool $exact Whether to match the whole URL or just the start
     */
    private function urlMatchesPath(string $url, bool $exact = true): bool|array
    {
        // if url matches exactly, sweet go for it
        if ($this->request->path === $url) {
            return true;
        }

        // if url is *, match everything
        if ($url === '*') {
            return true;
        }

        // if exact set to false, check if the request uri starts with the url
        if (!$exact && str_starts_with($this->request->path, $url)) {
            return true;
        }

        $pattern = '/\/([^\/]+)/';

        // split url into parts
        $url_parts = \Utils\Regex::getMatches($pattern, $url);

        // split request url into parts
        $request_url_parts = \Utils\Regex::getMatches($pattern, $this->request->path);

        if (
            count($url_parts) > 0 && count($request_url_parts) > 0 &&
            (count($url_parts) === count($request_url_parts) || !$exact)
        ) {
            $params = [];

            for ($i = 0; $i < count($url_parts); $i++) {
                if (strpos($url_parts[$i], ':') === 0) {
                    $key = substr($url_parts[$i], 1);
                    $params[$key] = $request_url_parts[$i];
                } else if ($url_parts[$i] !== $request_url_parts[$i]) {
                    return false;
                }
            }

            $this->request->applyParams($params);

            return $params;
        }

        return false;
    }

    /** 
     * Check if the request url matches a given regex, and return any named parameters
     * @param string $pattern in the syntax /part/:param
     */
    private function pathMatchesRegex(string $pattern): bool
    {
        return \Utils\Regex::match($pattern, $this->request->path);
    }

    /** 
     * Check if a URL is allowed to match
     */
    private function shouldMatch(): bool
    {
        return $this->matchOne && !$this->matched;
    }

    /**
     * Route a URL to a callback using regex
     * @param string $pattern
     * @param callable $callback
     */
    public function regex(string $pattern, callable $callback, bool $continue = false)
    {
        if ($this->pathMatchesRegex($pattern) && $this->shouldMatch()) {
            if (!$continue) {
                $this->matched = true;
            }

            $callback($this->request);
        }
    }

    /**
     * Route a URL to a callback
     * @param string $url in the syntax /part/:param
     * @param callable $callback
     */
    public function path(string $url, callable $callback, $exact = true, bool $continue = false)
    {
        if ($this->urlMatchesPath($url, $exact) && $this->shouldMatch()) {
            if (!$continue) {
                $this->matched = true;
            }

            $callback($this->request);
        }
    }

    /**
     * Route a URL to a controller
     * @param string $url in the syntax /part/:param
     * @param \Controllers\Controller $controller
     */
    public function controller(string $url, \Controllers\Controller $controller, $exact = true, bool $continue = false)
    {
        $this->path($url, function () use ($controller) {
            $controller::handleRequest($this->request);
        }, $exact, $continue);
    }

    /**
     * Redirect a URL to another URL
     * @param string $from_url in the syntax /part/:param
     * @param string $to_url
     */
    public function redirect(string $from_url, string $to_url, $exact = true, bool $continue = false)
    {
        $this->path($from_url, function () use ($to_url) {
            header('Location: ' . $to_url);
            exit();
        }, $exact, $continue);
    }

    /**
     * Include a file if the URL matches
     * @param string $url in the syntax /part/:param
     * @param string $file
     */
    public function include(string $url, string $file, $exact = true, bool $continue = false)
    {
        $this->path($url, function () use ($file) {
            include $file;
            exit();
        }, $exact, $continue);
    }
}
