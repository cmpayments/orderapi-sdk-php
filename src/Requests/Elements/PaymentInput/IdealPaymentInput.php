<?php

namespace CMPayments\OrderApi\Requests\Elements\PaymentInput;

/**
 * Class IdealPaymentInput
 *
 * @package CMPayments\OrderApi\Requests\Elements\PaymentInput
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class IdealPaymentInput implements PaymentMethodInterface
{
    const PAYMENT_METHOD = 'IDEAL';

    /** @var  string */
    private $issuerId;

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
    public function getIssuerId()
    {
        return $this->issuerId;
    }

    /**
     * @param string $issuerId
     *
     * @return $this
     */
    public function setIssuerId($issuerId)
    {
        $this->issuerId = $issuerId;

        return $this;
    }


}