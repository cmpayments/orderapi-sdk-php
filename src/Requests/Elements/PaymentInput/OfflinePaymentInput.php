<?php

namespace CMPayments\OrderApi\Requests\Elements\PaymentInput;

/**
 * Class OfflinePaymentInput
 *
 * @package CMPayments\OrderApi\Requests\Elements\PaymentInput
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class OfflinePaymentInput implements PaymentMethodInterface
{
    const PAYMENT_METHOD = 'OFFLINE';

    /** @var Register */
    private $register;

    /** @var string */
    private $method;

    /**
     * @inheritdoc
     */
    public function getPaymentMethod()
    {
        return self::PAYMENT_METHOD;
    }

    /**
     * @return Register
     */
    public function getRegister()
    {
        return $this->register;
    }

    /**
     * @param Register $register
     */
    public function setRegister($register)
    {
        $this->register = $register;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }
}
