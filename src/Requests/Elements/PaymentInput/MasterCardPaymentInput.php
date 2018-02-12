<?php

namespace CMPayments\OrderApi\Requests\Elements\PaymentInput;

use CMPayments\OrderApi\Requests\Elements\PaymentInput\Types\CardPaymentInput;

/**
 * Class MasterCardPaymentInput
 *
 * @package CMPayments\OrderApi\Requests\Elements\PaymentInput
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class MasterCardPaymentInput extends CardPaymentInput implements PaymentMethodInterface
{
    const PAYMENT_METHOD = 'MASTERCARD';

    /**
     * @inheritdoc
     */
    public function getPaymentMethod()
    {
        return self::PAYMENT_METHOD;
    }
}