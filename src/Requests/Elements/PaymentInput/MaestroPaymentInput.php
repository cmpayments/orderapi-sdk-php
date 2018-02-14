<?php

namespace CMPayments\OrderApi\Requests\Elements\PaymentInput;

use CMPayments\OrderApi\Requests\Elements\PaymentInput\Types\CardPaymentInput;

/**
 * Class MaestroPaymentInput
 *
 * @package CMPayments\OrderApi\Requests\Elements\PaymentInput
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class MaestroPaymentInput extends CardPaymentInput implements PaymentMethodInterface
{
    const PAYMENT_METHOD = 'MAESTRO';

    /**
     * @inheritdoc
     */
    public function getPaymentMethod()
    {
        return self::PAYMENT_METHOD;
    }
}
