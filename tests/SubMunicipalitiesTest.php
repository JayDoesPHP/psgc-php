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

    public function testSearchSubMunicipalityByCode()
    {
        $subMunicipalityCode = '1380601000';
        $result = PSGC::searchSubMunicipalityByCode($subMunicipalityCode);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
