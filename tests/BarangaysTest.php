<?php

use PHPUnit\Framework\TestCase;
use Jaydoesphp\PSGCphp\PSGC;

final class BarangaysTest extends TestCase
{
    public function testGetBarangays()
    {
        $result = PSGC::getBarangays();

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function testGetAllBarangaysById()
    {
        $city_municipality_id = '1';
        $result = PSGC::getAllBarangaysById($city_municipality_id);
        
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function testGetBarangayById()
    {
        $barangay_id = '1';
        $result = PSGC::getBarangayById($barangay_id);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
