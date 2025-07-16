<?php

use PHPUnit\Framework\TestCase;
use Jaydoesphp\PSGCphp\PSGC;

final class CitiesMunicipalitiesTest extends TestCase
{
    public function testGetCitiesMunicipalities()
    {
        $result = PSGC::getCitiesMunicipalities();

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function testGetAllCitiesMunicipalitiesById()
    {
        $province_id = '1';
        $result = PSGC::getAllCitiesMunicipalitiesById($province_id);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function testGetCitiesMunicipalityById()
    {
        $city_municipality_id = '1';
        $result = PSGC::getCitiesMunicipalityById($city_municipality_id);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
