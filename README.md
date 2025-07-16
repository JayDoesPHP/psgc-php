# PSGC-PHP

PSGC-PHP is a PHP package designed to handle Philippine Standard Geographic Code
(PSGC) data.  
It provides utilities for searching and retrieving geographic information such
as regions, provinces, cities, municipalities, sub-municipalities, and barangays
from JSON datasets.

## Features

- Retrieve Philippine geographic data from JSON files.
- Search address information by PSGC code.
- Helper classes for content and lookup handling.
- Unit tests included for each geographic level.

## Installation

Install via Composer:

```sh
composer require jaydoesphp/psgc-php
```

## Get All Methods

| Address Type      | Method                      | Description                              |
| ----------------- | --------------------------- | ---------------------------------------- |
| Region            | `getRegions()`              | Retrieves all regions.                   |
| Province          | `getProvinces()`            | Retrieves all provinces.                 |
| City/Municipality | `getCitiesMunicipalities()` | Retrieves all cities and municipalities. |
| Municipality      | `getMunicipalities()`       | Retrieves all municipalities.            |
| City              | `getCities()`               | Retrieves all cities.                    |
| Sub-Municipality  | `getSubMunicipalities()`    | Retrieves all sub-municipalities.        |
| Barangay          | `getBarangays()`            | Retrieves all barangays.                 |

## Get All By ID Methods

These methods retrieve **multiple records** based on a parent ID.

| Address Type      | Method                                         | Description                                               |
| ----------------- | ---------------------------------------------- | --------------------------------------------------------- |
| Province          | `getAllProvincesById($region_id)`              | Retrieves all provinces under a specific region.          |
| City/Municipality | `getAllCitiesMunicipalitiesById($province_id)` | Retrieves all cities and municipalities under a province. |
| Municipality      | `getAllMunicipalitiesById($province_id)`       | Retrieves all municipalities under a province.            |
| City              | `getAllCitiesById($province_id)`               | Retrieves all cities under a province.                    |
| Sub-Municipality  | `getAllSubMunicipalitiesById($province_id)`    | Retrieves all sub-municipalities under a province.        |
| Barangay          | `getAllBarangaysById($city_municipality_id)`   | Retrieves all barangays under a city/municipality.        |

## Get By ID Methods

These methods retrieve **a single record** using its PSGC ID.

| Address Type      | Method                           | Description                        |
| ----------------- | -------------------------------- | ---------------------------------- |
| Region            | `getRegionById($id)`             | Gets a region by ID.               |
| Province          | `getProvinceById($id)`           | Gets a province by ID.             |
| City/Municipality | `getCitiesMunicipalityById($id)` | Gets a city or municipality by ID. |
| Municipality      | `getMunicipalityById($id)`       | Gets a municipality by ID.         |
| City              | `getCityById($id)`               | Gets a city by ID.                 |
| Sub-Municipality  | `getSubMunicipalityById($id)`    | Gets a sub-municipality by ID.     |
| Barangay          | `getBarangayById($id)`           | Gets a barangay by ID.             |

## Usage

### Get All Addresses

```php
use Jaydoesphp\PSGCphp\PSGC;

$provinces = PSGC::getProvinces();
print_r($provinces);
```

### Get All Provinces by Region ID

```php
use Jaydoesphp\PSGCphp\PSGC;

$provinces = PSGC::getAllProvincesById('1');
print_r($provinces);
```

### Get a Specific Address by ID

```php
use Jaydoesphp\PSGCphp\PSGC;

$province = PSGC::getRegionById('1');
print_r($province);
```

## File Structure

- `src/` - Core PHP classes and helpers.
- `src/resources/json/` - JSON datasets for each geographic level.
- `tests/` - PHPUnit test cases.

## Running Tests

To run unit tests:

```sh
vendor/bin/phpunit
```

## License

This project is open-sourced under the MIT License.
