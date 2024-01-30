<?php

namespace unit;

use App\Exceptions\Http\NotFoundException;
use App\Routing\Router;
use App\Routing\RoutesCollector;
use TestCase;

class RouterTest extends TestCase
{
    public function testRouterThrowsNotFound(): void
    {
        $this->expectException(NotFoundException::class);

        RoutesCollector::get('test', ['test', 'test']);
        $router = new Router('/non-existent-path', 'GET');
        $router->start();
    }
}
