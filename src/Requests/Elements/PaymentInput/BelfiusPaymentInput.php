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
    /**
     * @var string $PAYMENT_METHOD Authorization status.
     */
    const PAYMENT_METHOD = 'BELFIUS_PAY_BUTTON';

    /**
     * @return string Belfius payment method identifier.
     */
    public function getPaymentMethod()
    {
        return self::PAYMENT_METHOD;
    }
}
