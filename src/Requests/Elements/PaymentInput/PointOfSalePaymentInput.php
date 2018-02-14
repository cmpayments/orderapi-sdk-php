<?php

namespace CMPayments\OrderApi\Requests\Elements\PaymentInput;

/**
 * Class PointOfSalePaymentInput
 *
 * @package CMPayments\OrderApi\Requests\Elements\PaymentInput
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class PointOfSalePaymentInput implements PaymentMethodInterface
{
    const PAYMENT_METHOD = 'POINT_OF_SALE';

    /**
     * @inheritdoc
     */
    public function getPaymentMethod()
    {
        return self::PAYMENT_METHOD;
    }
}
