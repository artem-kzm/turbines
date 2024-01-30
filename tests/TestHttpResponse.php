<?php

class TestHttpResponse
{
    public function __construct(
        private string $response,
        private int $httpCode,
    ) {}

    public function getHttpCode(): int
    {
        return $this->httpCode;
    }

    public function isHttpStatusOk(): bool
    {
        return $this->httpCode === 200;
    }

    public function isHttpStatusNotFound(): bool
    {
        return $this->httpCode === 404;
    }

    public function isHttpStatusUnprocessable(): bool
    {
        return $this->httpCode === 422;
    }

    public function getResponse(): string
    {
        return $this->response;
    }

    public function getJsonResponse(): array
    {
        return json_decode($this->response, true);
    }
}
