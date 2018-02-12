<?php

namespace CMPayments\OrderApi\Requests\Elements\PaymentInput;

/**
 * Interface PaymentMethodInterface
 *
 * @package CMPayments\OrderApi\Requests\Elements\PaymentInput
 */
interface PaymentMethodInterface
{
    /**
     * Return the current payment method
     *
     * @return string
     */
    public function getPaymentMethod();
}