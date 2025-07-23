<?php

namespace Arxjei;

use Arxjei\helper\SearchAddressByCode;
use Arxjei\helper\GetFileContentHelper;
use Arxjei\enums\AddressType;
use Cake\Utility\Inflector;

/**
 * PHP Standard Geographic Code (PSGC) PHP
 *
 * Dynamic PSGC API
 * @method static array getRegions()
 * @method static array getProvinces()
 * @method static array getCities()
 * @method static array getBarangays()
 * @method static array getAllProvincesByRegionCode(string $region_code)
 * @method static array getAllCitiesByProvinceCode(string $province_code)
 * @method static array getAllBarangaysByCityCode(string $city_code)
 * @method static array getRegionsByCode(string $region_code)
 * @method static array getProvincesByCode(string $province_code)
 * @method static array getCitiesByCode(string $city_code)
 * @method static array getBarangaysByCode(string $barangay_code)
 */
final class PSGC
{
    public static function __callStatic(string $name, array $arguments)
    {
        return self::handleGetAllSimple($name)
            ?? self::handleGetAllByCode($name, $arguments)
            ?? self::handleGetSingleByCode($name, $arguments)
            ?? throw new \BadMethodCallException("Method {$name} does not exist or is not accessible.");
    }

    /**
     * Handles methods like: getRegions(), getCities()
     */
    private static function handleGetAllSimple(string $name): ?array
    {
        if (!str_starts_with($name, 'get') || !str_ends_with($name, 's')) {
            return null;
        }

        $type = self::toDashed(str_replace('get', '', $name));
        return GetFileContentHelper::content("{$type}.json");
    }

    /**
     * Handles methods like: getAllProvincesByRegionCode()
     */
    private static function handleGetAllByCode(string $name, array $args): ?array
    {
        if (!str_starts_with($name, 'getAll') || !str_ends_with($name, 'Code')) {
            return null;
        }

        $core = str_replace(['getAll', 'By', 'Code'], '', $name);
        $types = array_map(fn($word) => Inflector::pluralize($word), explode('-', self::toDashed($core)));

        $addresses = GetFileContentHelper::content("{$types[0]}.json");

        return SearchAddressByCode::search($addresses, $args[0], AddressType::from($types[1]));
    }

    /**
     * Handles methods like: getProvincesByCode()
     */
    private static function handleGetSingleByCode(string $name, array $args): ?array
    {
        if (!str_starts_with($name, 'get') || !str_ends_with($name, 'ByCode')) {
            return null;
        }

        $type = self::toDashed(str_replace(['get', 'ByCode'], '', $name));
        $addresses = GetFileContentHelper::content("{$type}.json");

        return SearchAddressByCode::search($addresses, $args[0], AddressType::from($type))[0] ?? null;
    }

    /**
     * Converts "ProvincesByRegion" => "provinces-by-region"
     */
    private static function toDashed(string $value): string
    {
        return Inflector::dasherize($value);
    }
}
