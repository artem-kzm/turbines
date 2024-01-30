<?php

if (!function_exists('extractRequestPathVariable')) {
    function extractRequestPathVariable(string $requestPath): ?int
    {
        $matches = [];
        preg_match('/\/(\d+)(\/|\z)/', $requestPath, $matches);

        return $matches[1] ?? null;
    }
}

if (!function_exists('getRidOfQueryParams')) {
    function getRidOfQueryParams(string $requestUri): string
    {
        return strtok($requestUri, '?');
    }
}
