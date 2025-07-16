<?php

use PHPUnit\Framework\TestCase;
use Jaydoesphp\PSGCphp\PSGC;

final class CitiesTest extends TestCase
{
    public function testGetCities()
    {
        $result = PSGC::getCities();

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function testGetAllCitiesById()
    {
        $province_id = '1';
        $result = PSGC::getAllCitiesById($province_id);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function testGetCityById()
    {
        $city_id = '5';
        $result = PSGC::getCityById($city_id);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
