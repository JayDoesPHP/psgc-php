<?php

use PHPUnit\Framework\TestCase;
use Jaydoesphp\PSGCphp\PSGC;

final class MunicipalitiesTest extends TestCase
{
    public function testGetMunicipalities()
    {
        $result = PSGC::getMunicipalities();

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function testGetAllMunicipalitiesById()
    {
        $province_id = '1';
        $result = PSGC::getAllMunicipalitiesById($province_id);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function testGetMunicipalityById()
    {
        $municipality_id = '1';
        $result = PSGC::getMunicipalityById($municipality_id);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
