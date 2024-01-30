<?php

use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use AssertMethods;

    private static bool $initialized = false;

    protected FakeHttp $fakeHttp;

    protected function setUp(): void
    {
        if (!static::$initialized) {
            $this->fakeHttp = new FakeHttp();
        }
    }
}
