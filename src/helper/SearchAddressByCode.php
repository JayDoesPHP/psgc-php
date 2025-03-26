<?php

namespace Jaydoesphp\PSGCphp\helper;

class SearchAddressByCode
{
    /**
     * Search Address by code
     * 
     * @param array $addresses
     * @param int|string $code
     * @return null|array
     */
    public static function search(array $addresses, int|string $code): ?array
    {
        if (!self::validateCode($code)) {
            return null;
        }

        foreach ($addresses as $address) {
            if ($address['code'] == $code) {
                return $address;
            }
        }

        return null;
    }

    /**
     * Validate code
     * 
     * @param int|string $code
     * @return bool
     */
    protected static function validateCode(int|string $code): bool
    {
        return is_int($code) || is_string($code);
    }
}
