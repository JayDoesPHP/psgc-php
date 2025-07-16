<?php

namespace Jaydoesphp\PSGCphp\helper;

use Jaydoesphp\PSGCphp\enums\AddressType;

class GetAllAddressByCode
{
    public static function search(array $addresses, int|string $code, AddressType $type): ?array
    {
        $key = $type->codeKey();

        return array_filter($addresses, fn($address) => ($address[$key] ?? null) == $code);
    }
}
