<?php

namespace App\Routing;

class Route
{
    public const METHOD_GET = 'GET';
    public const METHOD_POST = 'POST';
    public const METHOD_PUT = 'PUT';
    public const METHOD_DELETE = 'DELETE';

    public function __construct(
        public string $path,
        public string $method,
        public string $controllerClass,
        public string $controllerMethod,
    ) {}

    public function matches(string $requestPath, string $requestMethod): bool
    {
        if ($this->method !== $requestMethod) {
            return false;
        }

        $routePath = $this->path;
        if ($pathVariable = extractRequestPathVariable($requestPath)) {
            $routePath = $this->getPathWithInsertedVariableValue($pathVariable);
        }

        return $routePath === $requestPath;
    }

    private function getPathWithInsertedVariableValue(int $value): string
    {
        return preg_replace('/({[a-z]+})/', $value, $this->path);
    }
}
