# PSGC-PHP

PSGC-PHP is a PHP package designed to handle Philippine Standard Geographic Code
(PSGC) data. It provides utilities for searching and retrieving geographic
information such as regions, provinces, cities, municipalities,
sub-municipalities, and barangays from JSON datasets.

## Features

- Retrieve Philippine geographic data from JSON files.
- Search addresses by PSGC code.
- Helper functions for handling content retrieval.
- Unit tests for each geographic level.

## Installation

To install PSGC-PHP, use Composer:

```sh
composer require jaydoesphp/psgc-php
```

## Get Methods

| Address Type          | Method Name                 | Description                                                          |
| --------------------- | --------------------------- | -------------------------------------------------------------------- |
| **Region**            | `getRegions()`              | Retrieves all regions in the Philippines.                            |
| **Province**          | `getProvinces()`            | Retrieves all provinces within a specified region.                   |
| **City/Municipality** | `getCitiesMunicipalities()` | Retrieves all cities and municipalities within a specified province. |
| **Municipality**      | `getMunicipalities()`       | Retrieves all municipalities within a province.                      |
| **City**              | `getCities()`               | Retrieves all cities within a province.                              |
| **Sub-Municipality**  | `getSubMunicipalities()`    | Retrieves all sub-municipalities.                                    |
| **Barangay**          | `getBarangays()`            | Retrieves all barangays within a city or municipality.               |

## Search Methods

| Search Type           | Method Name                             | Description                                    |
| --------------------- | --------------------------------------- | ---------------------------------------------- |
| **Region**            | `searchRegionByCode($code)`             | Finds a region using its PSGC code.            |
| **Province**          | `searchProvinceByCode($code)`           | Finds a province using its PSGC code.          |
| **City/Municipality** | `searchCitiesMunicipalityByCode($code)` | Finds a city/municipality using its PSGC code. |
| **Municipality**      | `searchMunicipalityByCode($code)`       | Finds a municipality using its PSGC code.      |
| **City**              | `searchCityByCode($code)`               | Finds a city using its PSGC code.              |
| **Sub-Municipality**  | `searchSubMunicipalityByCode($code)`    | Finds a sub-municipality using its PSGC code.  |
| **Barangay**          | `searchBarangayByCode($code)`           | Finds a barangay using its PSGC code.          |

## Usage

### Loading PSGC Data

```php
use PSGC\PSGC;

$provinces = PSGC::getProvinces();
print_r($provinces);
```

### Searching by Code

```php
use PSGC\PSGC;

$province = PSGC::searchProvinceByCode('0102800000');
print_r($province);
```

## File Structure

- `src/` - Contains the core PHP classes and helpers.
- `src/resources/json/` - Stores PSGC data in JSON format.
- `tests/` - Unit tests for validation.

## Running Tests

To run unit tests, execute:

```sh
vendor/bin/phpunit
```

## License

This project is licensed under the MIT License.
