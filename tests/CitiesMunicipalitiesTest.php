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

    public function testSearchCitiesMunicipalityByCode()
    {
        $cityMunicipalityCode = '0102801000';
        $result = PSGC::searchCitiesMunicipalityByCode($cityMunicipalityCode);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
