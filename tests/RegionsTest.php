<?php

use PHPUnit\Framework\TestCase;
use Arxjei\PSGC;

final class RegionsTest extends TestCase
{
    public function testGetRegions()
    {
        $result = PSGC::getRegions();

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function testGetRegionByCode()
    {
        $region_code = '01';
        $result = PSGC::getRegionsByCode($region_code);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
