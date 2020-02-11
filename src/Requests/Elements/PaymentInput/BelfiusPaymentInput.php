<?php

namespace CMPayments\OrderApi\Requests\Elements\PaymentInput;

use CMPayments\OrderApi\Requests\Elements\PaymentInput\PaymentMethodInterface;

/**
 * Class IngHomePaymentInput. Payment input for Belfius.
 *
 * @author Michel Megens <michel.megens@cm.com>
 */
class BelfiusPaymentInput implements PaymentMethodInterface
{
    const PAYMENT_METHOD = 'BELFIUS_PAY_BUTTON';

    public function getPaymentMethod(): string
    {
        return self::PAYMENT_METHOD;
    }
}
