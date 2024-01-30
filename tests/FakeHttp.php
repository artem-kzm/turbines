<?php

class FakeHttp
{
    public function makeGetRequest(string $uri): TestHttpResponse
    {
        return $this->makeRequest($uri, 'GET');
    }

    public function makePostRequest(string $uri, array $data = []): TestHttpResponse
    {
        return $this->makeRequest($uri, 'POST', $data);
    }

    public function makePutRequest(string $uri, array $data = []): TestHttpResponse
    {
        return $this->makeRequest($uri, 'PUT', $data);
    }

    public function makeDeleteRequest(string $uri): TestHttpResponse
    {
        return $this->makeRequest($uri, 'DELETE');
    }

    private function makeRequest(string $uri, string $method, array $data = []): TestHttpResponse
    {
        $this->setDefaultHttpStatus();

        $_SERVER['REQUEST_URI'] = $uri;
        $_SERVER['REQUEST_METHOD'] = $method;
        $_POST = $data;

        require __DIR__ . '/../public/index.php';

        return new TestHttpResponse(
            ob_get_contents(),
            http_response_code()
        );
    }

    private function setDefaultHttpStatus(): void
    {
        http_response_code(200);
    }
}
