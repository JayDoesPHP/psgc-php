<?php

use PHPUnit\Framework\TestCase;
use Jaydoesphp\PSGCphp\PSGC;

final class SubMunicipalitiesTest extends TestCase
{
    public function testGetSubMunicipalities()
    {
        $result = PSGC::getSubMunicipalities();

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function testGetAllSubMunicipalitiesById()
    {
        $province_id = '65';
        $result = PSGC::getAllSubMunicipalitiesById($province_id);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function testGetSubMunicipalityById()
    {
        $sub_municipality_id = '1350';
        $result = PSGC::getSubMunicipalityById($sub_municipality_id);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
