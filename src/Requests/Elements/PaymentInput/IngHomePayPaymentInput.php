<?php

namespace CMPayments\OrderApi\Requests\Elements\PaymentInput;

use CMPayments\OrderApi\Requests\Elements\PaymentInput\PaymentMethodInterface;

/**
 * Class IngHomePaymentInput. Payment input for ING Home'n Pay.
 *
 * @author Michel Megens <michel.megens@cm.com>
 */
class IngHomePayPaymentInput implements PaymentMethodInterface
{
    const PAYMENT_METHOD = 'ING_HOME_PAY';

    public function getPaymentMethod(): string
    {
        return self::PAYMENT_METHOD;
    }
}
