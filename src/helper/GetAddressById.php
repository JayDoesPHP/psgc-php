<?php

namespace Jaydoesphp\PSGCphp\helper;

class GetAddressById
{
    /**
     * Search Address by id
     * 
     * @param array $addresses
     * @param int|string $id
     * @return null|array
     */
    public static function search(array $addresses, int|string $id): ?array
    {

        foreach ($addresses as $address) {
            if ($address['id'] == $id) {
                return $address;
            }
        }

        return null;
    }
}
