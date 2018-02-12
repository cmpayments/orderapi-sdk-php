<?php

namespace CMPayments\OrderApi\Requests\Elements\PaymentInput;

/**
 * Class PaypalPaymentInput
 *
 * @package CMPayments\OrderApi\Requests\Elements\PaymentInput
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class PaypalPaymentInput implements PaymentMethodInterface
{
    const PAYMENT_METHOD = 'PAYPAL_EXPRESS_CHECKOUT';

    /** @var  string */
    private $mobileUser = false;

    /**
     * @inheritdoc
     */
    public function getPaymentMethod()
    {
        return self::PAYMENT_METHOD;
    }

    /**
     * @return string
     */
    public function getMobileUser()
    {
        return $this->mobileUser;
    }

    /**
     * @param string $mobileUser
     *
     * @return $this
     */
    public function setMobileUser($mobileUser)
    {
        $this->mobileUser = $mobileUser;

        return $this;
    }


}