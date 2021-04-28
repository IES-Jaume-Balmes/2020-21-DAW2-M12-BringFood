<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
/**
 * @method static static ADMIN()
 * @method static static RESTAURANT()
 * @method static static CLIENT()
 */
final class RoleType extends Enum
    const ADMIN =   'admin';
    const RESTAURANT =   'restaurant';
    const CLIENT = 'client';
    /*
    public static function parseDatabase($value)
    {
        return (int) $value;
    }*/


}
