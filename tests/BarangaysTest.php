<?php

use PHPUnit\Framework\TestCase;
use Arxjei\PSGC;

final class BarangaysTest extends TestCase
{
    public function testGetBarangays()
    {
        $result = PSGC::getBarangays();

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function testGetAllBarangaysByCityCode()
    {
        $city_code = '012802';
        $result = PSGC::getAllBarangaysByCityCode($city_code);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function testGetBarangayByCode()
    {
        $barangay_code = '012801001';
        $result = PSGC::getBarangaysByCode($barangay_code);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
