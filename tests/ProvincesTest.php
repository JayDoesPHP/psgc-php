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

    public function testGetAllProvincesById()
    {
        $region_id = '1';
        $result = PSGC::getAllProvincesById($region_id);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function testGetProvinceById()
    {
        $province_id = '1';
        $result = PSGC::getProvinceById($province_id);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
