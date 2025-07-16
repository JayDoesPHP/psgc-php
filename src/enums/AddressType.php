<?php

namespace Jaydoesphp\PSGCphp\enums;

enum AddressType: string
{
    case Region = 'regions';
    case Province = 'provinces';
    case City = 'cities';
    case Barangay = 'barangays';

    public function codeKey(): string
    {
        return match ($this) {
            self::Region   => 'region_code',
            self::Province => 'province_code',
            self::City     => 'city_code',
            self::Barangay => 'barangay_code',
        };
    }
}
