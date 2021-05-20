<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static NIF()
 * @method static static NIE()
 * @method static static CIF()
 */
final class DocumentType extends Enum
{
    const NIF =	'NIF';
    const NIE = 'NIE';
    const CIF = 'CIF';
}
