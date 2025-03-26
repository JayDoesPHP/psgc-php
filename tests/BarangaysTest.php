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

    public function testSearchBarangayByCode()
    {
        $barangayCode = '0102801001';
        $result = PSGC::searchBarangayByCode($barangayCode);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

}
