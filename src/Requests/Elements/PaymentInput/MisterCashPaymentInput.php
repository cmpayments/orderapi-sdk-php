<?php

namespace CMPayments\OrderApi\Requests\Elements\PaymentInput;

use CMPayments\OrderApi\Requests\Elements\PaymentInput\Types\CardPaymentInput;

/**
 * Class MisterCashPaymentInput
 *
 * @package CMPayments\OrderApi\Requests\Elements\PaymentInput
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class MisterCashPaymentInput extends CardPaymentInput implements PaymentMethodInterface
{
    const PAYMENT_METHOD = 'MISTERCASH';

    /**
     * @inheritdoc
     */
    public function getPaymentMethod()
    {
        return self::PAYMENT_METHOD;
    }
}