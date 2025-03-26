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

    public function testSearchProvinceByCode()
    {
        $provinceCode = '0102800000';
        $result = PSGC::searchProvinceByCode($provinceCode);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
