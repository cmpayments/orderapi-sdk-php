<?php

namespace CMPayments\OrderApi\Requests\Elements\PaymentInput;

use CMPayments\OrderApi\Requests\Elements\PaymentInput\Types\CardPaymentInput;

/**
 * Class VisaPaymentInput
 *
 * @package CMPayments\OrderApi\Requests\Elements\PaymentInput
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class VisaPaymentInput extends CardPaymentInput implements PaymentMethodInterface
{
    const PAYMENT_METHOD = 'VISA';

    /**
     * @inheritdoc
     */
    public function getPaymentMethod()
    {
        return self::PAYMENT_METHOD;
    }
}
