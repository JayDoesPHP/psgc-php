<?php

namespace Arxjei\helper;

use Arxjei\enums\AddressType;

class SearchAddressByCode
{
    public static function search(array $addresses, int|string $code, AddressType $type): ?array
    {
        $key = $type->codeKey();

        $results = array_filter($addresses, fn($address) => $address[$key] == $code);

        return empty($results) ? null : array_values($results);
    }
}
