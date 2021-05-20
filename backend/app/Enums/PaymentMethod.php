<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PaymentMethod extends Enum
{
    const CREDITCARD =   'Credit Card';
    const PAYPAL =   'PayPal';
}
