<?php

namespace Jaydoesphp\PSGCphp;

use Jaydoesphp\PSGCphp\helper\GetFileContentHelper;
use Jaydoesphp\PSGCphp\helper\GetAddressById;
use Cake\Utility\Inflector;
use Jaydoesphp\PSGCphp\helper\GetAllAddressById;

/**
 * PHP Standard Geographic Code (PSGC) PHP
 *
 * [Get All Regions]
 * @method static array getRegions() Get all regions
 * @method static array getProvinces() Get all provinces
 * @method static array getSubMunicipalities() Get all sub-municipalities
 * @method static array getCitiesMunicipalities() Get all cities and municipalities
 * @method static array getCities() Get all cities
 * @method static array getMunicipalities() Get all municipalities
 * @method static array getBarangays() Get all barangays
 * 
 * [Get All Address By ID]
 * @method static array getAllProvincesById(string $region_id) Get All provinces by region_id
 * @method static array getAllCitiesMunicipalitiesById(string $province_id) Get All cities and municipalities by province_id
 * @method static array getAllMunicipalitiesById(string $province_id) Get All municipalities by province_id
 * @method static array getAllCitiesById(string $province_id) Get All cities by province_id
 * @method static array getAllSubMunicipalitiesById(string $province_id) Get All sub-municipalities by province_id
 * @method static array getAllBarangaysById(string $city_municipality_id) Get All barangays by city/municipality_id
 *
 * [Get Address By ID]
 * @method static array getRegionById(string $region_id) Get region by id
 * @method static array getProvinceById(string $province_id) Get province by id
 * @method static array getCitiesMunicipalityById(string $city_municipality_id) Get city/municipality by id
 * @method static array getMunicipalityById(string $municipality_id) Get municipality by id
 * @method static array getCityById(string $city_id) Get city by id
 * @method static array getSubMunicipalityById(string $sub_municipality_id) Get sub-municipality by id
 * @method static array getBarangayById(string $barangay_id) Get barangay by id
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
            $type = str_replace(['get'], '', $name);

            $type = Inflector::dasherize($type);

            return GetFileContentHelper::content("{$type}.json");
        }

        // Check if the method name matches the pattern for getting all addresses by ID
        if (str_starts_with($name, 'getAll') && str_ends_with($name, 'ById')) {
            $type = str_replace(['getAll', 'ById'], '', $name);

            $type = Inflector::dasherize($type);

            $addresses = GetFileContentHelper::content("{$type}.json");

            if (!$addresses) {
                return throw new \BadMethodCallException("Method {$name} does not exist.");
            }

            return GetAllAddressById::search($addresses, $arguments[0], $type);
        }

        // Check if the method name matches the pattern for getting address by ID
        if (str_starts_with($name, 'get') && str_ends_with($name, 'ById')) {

            $type = str_replace(['get', 'ById'], '', $name);

            $type = Inflector::pluralize($type);

            $type = Inflector::dasherize($type);

            $addresses = GetFileContentHelper::content("{$type}.json");

            if (!$addresses) {
                return throw new \BadMethodCallException("Method {$name} does not exist.");
            }

            return GetAddressById::search($addresses, $arguments[0]);
        }

        return throw new \BadMethodCallException("Method {$name} does not exist.");
    }
}
