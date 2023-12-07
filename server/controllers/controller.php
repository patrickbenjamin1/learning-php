<?php

declare(strict_types=1);

namespace Controllers;

abstract class Controller
{
    public static function get(\Utils\Request $request)
    {
        throw new \Exceptions\NotImplemented('GET not implemented');
    }
    public static function post(\Utils\Request $request)
    {
        throw new \Exceptions\NotImplemented('POST not implemented');
    }
    public static function put(\Utils\Request $request)
    {
        throw new \Exceptions\NotImplemented('PUT not implemented');
    }
    public static function delete(\Utils\Request $request)
    {
        throw new \Exceptions\NotImplemented('\DELETE not implemented');
    }
    public static function patch(\Utils\Request $request)
    {
        throw new \Exceptions\NotImplemented('PATCH not implemented');
    }
    public static function handleRequest(\Utils\Request $request)
    {
        switch ($request->method) {
            case 'GET':
                static::get($request);
                break;
            case 'POST':
                static::post($request);
                break;
            case 'PUT':
                static::put($request);
                break;
            case 'DELETE':
                static::delete($request);
                break;
            case 'PATCH':
                static::patch($request);
                break;
            default:
                throw new \Exceptions\NotImplemented('Method not implemented');
        }
    }
}
