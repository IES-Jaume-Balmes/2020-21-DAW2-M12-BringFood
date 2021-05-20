<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static AV()
 * @method static static CL()
 * @method static static PS()
 */
final class Via extends Enum
{
    const AV =	'Avenida';
    const CL =	'Calle';
    const PS =	'Paseo';
    const PZ =	'Plaza';
    const CR =	'Carretera';
}
