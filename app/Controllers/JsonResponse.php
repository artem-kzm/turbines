<?php

namespace App\Controllers;

class JsonResponse
{
    private function __construct(
        private ?array $data = null
    ) {}

    public static function success(array $data = null): static
    {
        return new static($data);
    }

    /**
     * @throws \JsonException
     */
    public function __toString(): string
    {
        return $this->data ? json_encode($this->data, JSON_THROW_ON_ERROR): '';
    }
}
