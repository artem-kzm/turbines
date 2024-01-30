<?php

namespace feature\Turbines;

use TestCase;

class DeleteTurbineTest extends TestCase
{
    public function testDeleteTurbineWithNonexistentId(): void
    {
        $response = $this->fakeHttp->makeDeleteRequest('/turbines/99');
        $this->assertTrue($response->isHttpStatusNotFound());
    }

    public function testDeleteTurbine(): void
    {
        $response = $this->fakeHttp->makeDeleteRequest('/turbines/1');
        $this->assertTrue($response->isHttpStatusOk());

        // todo: check that database missing the record
        self::fail();
    }
}
