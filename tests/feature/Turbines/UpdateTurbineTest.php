<?php

namespace feature\Turbines;

use TestCase;

class UpdateTurbineTest extends TestCase
{
    public function testDeleteTurbineWithNonexistentId(): void
    {
        $response = $this->fakeHttp->makePutRequest('/turbines/99');
        $this->assertTrue($response->isHttpStatusNotFound());
    }

    public function testUpdateTurbineWithWrongFieldFormats(): void
    {
        // todo: For now we don't have field format rules, though for a real project there would be ones
        self::fail();
    }

    public function testUpdateTurbine(): void
    {
        $requestData = [
            'name' => 'Amaral1-6',
            'producer' => 'Gamesa',
            'coordinateN' => '39.025322114',
            'coordinateW' => '-9.036296176'
        ];

        $response = $this->fakeHttp->makePutRequest('/turbines/1', $requestData);
        $this->assertTrue($response->isHttpStatusOk());

        // todo: check if database has updated turbine record with data from the array above
        self::fail();
    }
}
