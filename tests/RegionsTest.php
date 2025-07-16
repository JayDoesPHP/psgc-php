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

    public function testGetRegionById()
    {
        $region_id = '1';
        $result = PSGC::getRegionById($region_id);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
