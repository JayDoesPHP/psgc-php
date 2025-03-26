<?php

use PHPUnit\Framework\TestCase;
use Jaydoesphp\PSGCphp\PSGC;

final class CitiesTest extends TestCase
{
    public function testGetCities()
    {
        $result = PSGC::getCities();

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function testSearchCityByCode()
    {
        $cityCode = '0102805000';
        $result = PSGC::searchCityByCode($cityCode);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
