<?php

namespace App\Controllers;

abstract class BaseController
{
    public function __construct(
        private array $requestParams = []
    ) {}

    public function requestParams(): array
    {
        return $this->requestParams;
    }
}
