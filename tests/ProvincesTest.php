<?php

use PHPUnit\Framework\TestCase;
use Jaydoesphp\PSGCphp\PSGC;

final class ProvincesTest extends TestCase
{
    public function testGetProvinces()
    {
        $result = PSGC::getProvinces();

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function testGetAllProvincesByRegionCode()
    {
        $region_code = '01';
        $result = PSGC::getAllProvincesByRegionCode($region_code);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function testGetProvinceByCode()
    {
        $province_code = '0128';
        $result = PSGC::getProvincesByCode($province_code);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
