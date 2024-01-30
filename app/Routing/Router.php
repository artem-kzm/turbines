<?php

namespace App\Routing;

use App\Exceptions\Http;

class Router
{
    private string $requestPath;
    private string $requestMethod;
    private array $requestParams = [];

    /** @var Route[] */
    private array $routes = [];

    public function __construct(string $requestPath, string $requestMethod)
    {
        $this->requestPath = $requestPath;
        $this->requestMethod = $requestMethod;
    }

    public function setRequestParams($requestParams): void
    {
        $this->requestParams = $requestParams;
    }

    /**
     * @param Route[] $routes
     */
    public function setRoutes(array $routes): void
    {
        $this->routes = $routes;
    }

    /**
     * @throws Http\NotFoundException
     */
    public function start(): string
    {
        foreach ($this->routes as $route) {
            if (!$route->matches($this->requestPath, $this->requestMethod)) {
                continue;
            }

            $controller = new $route->controllerClass($this->requestParams);
            $pathVariable = extractRequestPathVariable($this->requestPath);

            return $controller->{$route->controllerMethod}($pathVariable);
        }

        throw new Http\NotFoundException();
    }
}
