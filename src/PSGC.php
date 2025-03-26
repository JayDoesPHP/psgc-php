<?php

namespace Jaydoesphp\PSGCphp;

use Jaydoesphp\PSGCphp\helper\SearchAddressByCode;
use Jaydoesphp\PSGCphp\helper\GetFileContentHelper;
use Cake\Utility\Inflector;

/**
 * PHP Standard Geographic Code (PSGC) PHP
 *
 * @method static array getRegions() Get all regions
 * @method static array getSubMunicipalities() Get all sub-municipalities
 * @method static array getCitiesMunicipalities() Get all cities and municipalities
 * @method static array getCities() Get all cities
 * @method static array getMunicipalities() Get all municipalities
 * @method static array getProvinces() Get all provinces
 * @method static array getBarangays() Get all barangays
 * @method static array searchRegionByCode(string $code) Search for a region by code
 * @method static array searchSubMunicipalityByCode(string $code) Search for a sub-municipality by code
 * @method static array searchCitiesMunicipalityByCode(string $code) Search for a city/municipality by code
 * @method static array searchCityByCode(string $code) Search for a city by code
 * @method static array searchMunicipalityByCode(string $code) Search for a municipality by code
 * @method static array searchProvinceByCode(string $code) Search for a province by code
 * @method static array searchBarangayByCode(string $code) Search for a barangay by code
 */
final class PSGC
{
    /**
     * Handle dynamic static method calls for getRegions, getCities, getBarangays, etc.
     *
     * @param string $name
     * @param array $arguments
     * @return array|null
     */
    public static function __callStatic(string $name, array $arguments): ?array
    {

        if (preg_match('/^get([A-Za-z]+)$/', $name, $matches)) {

            $type = strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $matches[1]));

            return GetFileContentHelper::content("{$type}.json");
        }

        if (preg_match('/^search([A-Za-z]+)ByCode$/', $name, $matches)) {

            $type = strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $matches[1]));

            $type = Inflector::pluralize($type);

            $addresses = GetFileContentHelper::content("{$type}.json");

            return SearchAddressByCode::search($addresses, $arguments[0]);
        }

        return null;
    }
}
