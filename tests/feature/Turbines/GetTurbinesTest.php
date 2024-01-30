<?php

namespace feature\Turbines;

use TestCase;

class GetTurbinesTest extends TestCase
{
    public function testGetTurbineWithNonexistentId(): void
    {
        $response = $this->fakeHttp->makeGetRequest('/turbines/99');
        $this->assertTrue($response->isHttpStatusNotFound());
    }

    public function testGetTurbine(): void
    {
        // Here we're using the same DB that is used for the main app, it's not correct
        // If we had configured test database we would insert expected data there in each test

        $response = $this->fakeHttp->makeGetRequest('/turbines/2');
        $this->assertTrue($response->isHttpStatusOk());

        $expectedString = '{"id":"2","name":"Amaral1-2","producer":"Gamesa","coordinateN":"39.026352641","coordinateW":"-9.046270410"}';
        self::assertEquals($expectedString, $response->getResponse());
    }

    public function testGetTurbineAddressWithNonexistentId(): void
    {
        $response = $this->fakeHttp->makeGetRequest('/turbines/99/address');
        $this->assertTrue($response->isHttpStatusNotFound());
    }

    public function testGetTurbineAddress(): void
    {
        $response = $this->fakeHttp->makeGetRequest('/turbines/1/address');
        $this->assertTrue($response->isHttpStatusOk());

        $address = ["39.026628121","-9.048632539"];
        $expectedData = json_encode($address);

        self::assertEquals($expectedData, $response->getResponse());
    }

    public function testGetAllTurbines(): void
    {
        $response = $this->fakeHttp->makeGetRequest('/turbines');
        $this->assertTrue($response->isHttpStatusOk());

        self::assertEquals($this->expectedAllTurbines(), $response->getResponse());
    }

    private function expectedAllTurbines(): string
    {
        return '[{"id":"1","name":"Amaral1-1","producer":"Gamesa","coordinateN":"39.026628121","coordinateW":"-9.048632539"},{"id":"2","name":"Amaral1-2","producer":"Gamesa","coordinateN":"39.026352641","coordinateW":"-9.046270410"},{"id":"3","name":"Amaral1-3","producer":"Gamesa","coordinateN":"39.025990218","coordinateW":"-9.044045397"},{"id":"4","name":"Amaral1-4","producer":"Gamesa","coordinateN":"39.025786934","coordinateW":"-9.041793910"},{"id":"5","name":"Amaral1-5","producer":"Gamesa","coordinateN":"39.025322113","coordinateW":"-9.036296175"}]';
    }
}
