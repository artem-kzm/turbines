<?php

namespace feature\Turbines;

use TestCase;

class CreateTurbineTest extends TestCase
{
    public function testCreateTurbineWithMissingFields(): void
    {
        $response = $this->fakeHttp->makePostRequest('/turbines');
        $this->assertTrue($response->isHttpStatusUnprocessable());

        $response = $response->getJsonResponse();
        self::assertArrayHasKey('validation errors', $response);

        $validationErrors = $response['validation errors'];

        $expectedErrors = [
            'name' => 'Required parameter \'name\' is missing',
            'producer' => 'Required parameter \'producer\' is missing',
            'coordinateN' => 'Required parameter \'coordinateN\' is missing',
            'coordinateW' => 'Required parameter \'coordinateW\' is missing'
        ];

        self::assertArraysAreEquals($expectedErrors, $validationErrors);
    }

    public function testCreateTurbine(): void
    {
        $requestData = [
            'name' => 'Amaral1-6',
            'producer' => 'Gamesa',
            'coordinateN' => '39.025322114',
            'coordinateW' => '-9.036296176'
        ];

        $response = $this->fakeHttp->makePostRequest('/turbines', $requestData);
        $this->assertTrue($response->isHttpStatusOk());

        $responseData = $response->getJsonResponse();
        self::assertArrayHasKey('id', $responseData);

        $expectedData = $requestData;
        $expectedData = ['id' => $responseData['id']] + $expectedData;

        self::assertArraysAreEquals($expectedData, $responseData);

        // todo: check if database actually has new turbine record with data from the array above
        self::fail();
    }
}
