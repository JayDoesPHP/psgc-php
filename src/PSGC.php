<?php

namespace Jaydoesphp\PSGCphp;

use Jaydoesphp\PSGCphp\helper\GetFileContentHelper;
use Jaydoesphp\PSGCphp\helper\GetAllAddressByCode;
use Jaydoesphp\PSGCphp\helper\GetAddressByCode;
use Jaydoesphp\PSGCphp\enums\AddressType;
use Cake\Utility\Inflector;

/**
 * PHP Standard Geographic Code (PSGC) PHP
 *
 * [Get All Regions]
 * @method static array getRegions() Get all regions
 * @method static array getProvinces() Get all provinces
 * @method static array getCities() Get all cities
 * @method static array getBarangays() Get all barangays
 * 
 * [Get All Address By Code]
 * @method static array getAllProvincesByRegionCode(string $region_code) Get All provinces by region_code
 * @method static array getAllCitiesByProvinceCode(string $province_code) Get All cities by province_code
 * @method static array getAllBarangaysByCityCode(string $city_code) Get All barangays by city_code
 *
 * [Get Address By Code]
 * @method static array getRegionsByCode(string $region_code) Get region by code
 * @method static array getProvincesByCode(string $province_code) Get province by code
 * @method static array getCitiesByCode(string $city_code) Get city by code
 * @method static array getBarangaysByCode(string $barangay_code) Get barangay by code
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
    public static function __callStatic(string $name, array $arguments)
    {
        // Check if the method name matches the pattern for getting all addresses
        if (str_starts_with($name, 'get') && str_ends_with($name, 's')) {

            $type = Inflector::dasherize(str_replace(['get'], '', $name));

            return GetFileContentHelper::content("{$type}.json") ?? [];
        }

        // Check if the method name matches the pattern for getting all addresses by Code
        if (str_starts_with($name, 'getAll') && str_ends_with($name, 'Code')) {

            $type = Inflector::dasherize(str_replace(['getAll', 'By', 'Code'], '', $name));

            $type = array_map(fn($word) => Inflector::pluralize($word), explode('-', $type));

            $addresses = GetFileContentHelper::content("{$type[0]}.json");

            return GetAllAddressByCode::search($addresses, $arguments[0], AddressType::from($type[1])) ?? null;
        }

        // Check if the method name matches the pattern for getting address by Code
        if (str_starts_with($name, 'get') && str_ends_with($name, 'ByCode')) {

            $type = Inflector::dasherize(str_replace(['get', 'ByCode'], '', $name));

            $addresses = GetFileContentHelper::content("{$type}.json");

            return GetAddressByCode::search($addresses, $arguments[0], AddressType::from($type))[0] ?? null;
        }

        return throw new \BadMethodCallException("Method {$name} does not exist.");
    }
}
