<?php

use PHPUnit\Framework\TestCase;
use Arxjei\PSGC;

final class CitiesTest extends TestCase
{
    public function testGetCities()
    {
        $result = PSGC::getCities();

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function testGetAllCitiesByProvinceCode()
    {
        $province_id = '0128';
        $result = PSGC::getAllCitiesByProvinceCode($province_id);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function testGetCitiesByCode()
    {
        $city_code = '012801';
        $result = PSGC::getCitiesByCode($city_code);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
