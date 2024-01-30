<?php

namespace App\Routing;

class RoutesCollector
{
    /** @var Route[] */
    private static array $routes = [];

    /**
     * @return Route[]
     */
    public static function getRoutes(): array
    {
        return static::$routes;
    }

    /**
     * @param string[] $callbackData
     */
    public static function get(string $path, array $callbackData): void
    {
        static::$routes[] = new Route($path, Route::METHOD_GET, ...$callbackData);
    }

    /**
     * @param string[] $callbackData
     */
    public static function post(string $path, array $callbackData): void
    {
        static::$routes[] = new Route($path, Route::METHOD_POST, ...$callbackData);
    }

    /**
     * @param string[] $callbackData
     */
    public static function put(string $path, array $callbackData): void
    {
        static::$routes[] = new Route($path, Route::METHOD_PUT, ...$callbackData);
    }

    /**
     * @param string[] $callbackData
     */
    public static function delete(string $path, array $callbackData): void
    {
        static::$routes[] = new Route($path, Route::METHOD_DELETE, ...$callbackData);
    }
}
