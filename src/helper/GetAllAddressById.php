<?php

namespace Jaydoesphp\PSGCphp\helper;

class GetAllAddressById
{
    /**
     * Search Address by id
     * 
     * @param array $addresses
     * @param int|string $id
     * @return null|array
     */
    public static function search(array $addresses, int|string $id, string $type): ?array
    {
        $type = strtolower($type);
        $data = [];

        switch ($type) {
            case 'provinces':
                foreach ($addresses as $address) {
                    if ($address['region_id'] == $id) {
                        $data[] = $address;
                    }
                }
                break;
            case 'sub-municipalities':
            case 'cities-municipalities':
            case 'cities':
            case 'municipalities':
                foreach ($addresses as $address) {
                    if ($address['province_id'] == $id) {
                        $data[] = $address;
                    }
                }
                break;
            case 'barangays':
                foreach ($addresses as $address) {
                    if ($address['city_municipality_id'] == $id) {
                        $data[] = $address;
                    }
                }
                break;
        }

        return $data ?: null;
    }
}
