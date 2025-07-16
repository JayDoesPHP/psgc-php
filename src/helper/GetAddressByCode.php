<?php

namespace Jaydoesphp\PSGCphp\helper;

use Jaydoesphp\PSGCphp\enums\AddressType;

class GetAddressByCode
{
    public static function search(array $addresses, int|string $code, AddressType $type): ?array
    {
        $key = $type->codeKey();

        return array_filter($addresses, function ($address) use ($key, $code) {
            return ($address[$key] ?? null) == $code;
        });
    }
}
