<?php

trait AssertMethods
{
    protected static function assertArraysAreEquals(
        array $expectedArray,
        array $actualArray
    ): void {
        static::assertEquals(json_encode($expectedArray), json_encode($actualArray));
    }
}
