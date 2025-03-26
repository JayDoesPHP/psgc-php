<?php

use PHPUnit\Framework\TestCase;
use Jaydoesphp\PSGCphp\PSGC;

final class RegionsTest extends TestCase
{
    public function testGetRegions()
    {
        $result = PSGC::getRegions();

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function testSearchRegionByCode()
    {
        $regionCode = '0100000000';
        $result = PSGC::searchRegionByCode($regionCode);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
