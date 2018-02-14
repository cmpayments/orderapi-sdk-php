<?php

namespace CMPayments\OrderApi\Requests\Elements\PaymentInput;

use CMPayments\OrderApi\Requests\Elements\PaymentInput\Types\CardPaymentInput;

/**
 * Class AmexPaymentInput
 *
 * @package CMPayments\OrderApi\Requests\Elements\PaymentInput
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class AmexPaymentInput extends CardPaymentInput implements PaymentMethodInterface
{
    const PAYMENT_METHOD = 'AMEX';

    /**
     * @inheritdoc
     */
    public function getPaymentMethod()
    {
        return self::PAYMENT_METHOD;
    }
}
