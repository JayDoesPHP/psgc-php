# PSGC-PHP

PSGC-PHP is a PHP package for handling Philippine Standard Geographic Code
(PSGC) data. It provides tools to retrieve and search geographic information
such as regions, provinces, cities, municipalities, and barangays from JSON
files.

## Features

- Access PSGC data from JSON files.
- Search address records using PSGC codes.
- Organized helper classes for file and lookup handling.
- Includes unit tests for each geographic level.

## Installation

```sh
composer require jaydoesphp/psgc-php
```

## Get All Methods

| Address Type | Method         | Description        |
| ------------ | -------------- | ------------------ |
| Region       | getRegions()   | Get all regions.   |
| Province     | getProvinces() | Get all provinces. |
| City         | getCities()    | Get all cities.    |
| Barangay     | getBarangays() | Get all barangays. |

## Get All By Code Methods

| Address Type | Method                                     | Description                        |
| ------------ | ------------------------------------------ | ---------------------------------- |
| Province     | getAllProvincesByRegionCode($region_code)  | Provinces under a specific region. |
| City         | getAllCitiesByProvinceCode($province_code) | Cities under a specific province.  |
| Barangay     | getAllBarangaysByCityCode($city_code)      | Barangays under a specific city.   |

## Get By Code Methods

| Address Type | Method                             | Description             |
| ------------ | ---------------------------------- | ----------------------- |
| Region       | getRegionsByCode($region_code)     | Get a region by code.   |
| Province     | getProvincesByCode($province_code) | Get a province by code. |
| City         | getCitiesByCode($city_code)        | Get a city by code.     |
| Barangay     | getBarangaysByCode($barangay_code) | Get a barangay by code. |

## Usage Examples

### Get All Provinces

```php
use Jaydoesphp\PSGCphp\PSGC;

$provinces = PSGC::getProvinces();
print_r($provinces);
```

### Get All Cities by Province Code

```php
use Jaydoesphp\PSGCphp\PSGC;

$cities = PSGC::getAllCitiesByProvinceCode('0128');
print_r($cities);
```

### Get a Specific Barangay by Code

```php
use Jaydoesphp\PSGCphp\PSGC;

$barangay = PSGC::getBarangaysByCode('012801001');
print_r($barangay);
```

## File Structure

- `src/` - Core PHP logic.
- `src/resources/json/` - PSGC JSON data.
- `tests/` - PHPUnit tests.

## Run Tests

```sh
vendor/bin/phpunit
```

## License

MIT License.
