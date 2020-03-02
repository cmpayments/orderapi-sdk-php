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
    /**
     * @var string PAYMENT_METHOD ING home pay identifier.
     */
    const PAYMENT_METHOD = 'ING_HOME_PAY';

    /**
     * @return string Identifier for ING Home'Pay.
     */
    public function getPaymentMethod()
    {
        return self::PAYMENT_METHOD;
    }
}
