<?php

namespace App\Requests;

abstract class BaseRequest
{
    public function __construct(
        protected array $fields
    ) {}

    abstract public function validate(): void;
}
