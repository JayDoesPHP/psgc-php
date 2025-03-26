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

    public function testSearchMunicipalityByCode()
    {
        $municipalityCode = '0102801000';
        $result = PSGC::searchMunicipalityByCode($municipalityCode);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
