<?php

namespace Utils;


class Router
{
    /** should this router only match once then move on? */
    private bool $matchOne = true;

    /** used to ensure only one route is matched by each router at a time */
    private bool $matched = false;

    private \Utils\Request $request;

    public function __construct(array|null $params = null)
    {
        $this->request = \Utils\Request::parse();
        $this->matchOne = $params?->matchOne ?? true;
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

    private function urlMatchesRegex(string $pattern): bool
    {
        return \Utils\Regex::match($pattern, $this->request->path);
    }

    private function shouldMatch(): bool
    {
        return $this->matchOne && !$this->matched;
    }

    /**
     * Route a URL to a callback using regex
     * @param string $pattern
     * @param callable $callback
     */
    public function regex(string $pattern, callable $callback)
    {
        if ($this->urlMatchesRegex($pattern) && $this->shouldMatch()) {
            $this->matched = true;

            $callback($this->request);
        }
    }

    /**
     * Route a URL to a callback
     * @param string $url in the syntax /part/:param
     * @param callable $callback
     */
    public function path(string $url, callable $callback, $exact = true)
    {
        if ($this->urlMatchesPath($url, $exact) && $this->shouldMatch()) {
            $this->matched = true;

            $callback($this->request);
        }
    }

    /**
     * Route a URL to a controller
     * @param string $url in the syntax /part/:param
     * @param \Controllers\Controller $controller
     */
    public function controller(string $url, \Controllers\Controller $controller, $exact = true)
    {
        $this->path($url, function () use ($controller) {
            $controller::handleRequest($this->request);
        }, $exact);
    }

    /**
     * Redirect a URL to another URL
     * @param string $from_url in the syntax /part/:param
     * @param string $to_url
     */
    public function redirect(string $from_url, string $to_url, $exact = true)
    {
        $this->path($from_url, function () use ($to_url) {
            header('Location: ' . $to_url);
            exit();
        }, $exact);
    }

    /**
     * Include a file if the URL matches
     * @param string $url in the syntax /part/:param
     * @param string $file
     */
    public function include(string $url, string $file, $exact = true)
    {
        $this->path($url, function () use ($file) {
            include $file;
            exit();
        }, $exact);
    }
}
