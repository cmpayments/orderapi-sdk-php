<?php

namespace CMPayments\OrderApi\Requests\Elements\PaymentInput;

/**
 * Class DirectDebitPaymentInput
 *
 * @package CMPayments\OrderApi\Requests\Elements\PaymentInput
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class DirectDebitPaymentInput implements PaymentMethodInterface
{
    const PAYMENT_METHOD = 'SEPA_DIRECT_DEBIT';

    /** @var DirectDebitPaymentInputGroup */
    private $directDebitPaymentInputGroup;

    /** @var string */
    private $mandateNumber;

    /**
     * @inheritdoc
     */
    public function getPaymentMethod()
    {
        return self::PAYMENT_METHOD;
    }

    /**
     * @return DirectDebitPaymentInputGroup
     */
    public function getDirectDebitPaymentInputGroup()
    {
        return $this->directDebitPaymentInputGroup;
    }

    /**
     * @param DirectDebitPaymentInputGroup $directDebitPaymentInputGroup
     *
     * @return $this
     */
    public function setDirectDebitPaymentInputGroup($directDebitPaymentInputGroup)
    {
        $this->directDebitPaymentInputGroup = $directDebitPaymentInputGroup;

        return $this;
    }

    /**
     * @return string
     */
    public function getMandateNumber()
    {
        return $this->mandateNumber;
    }

    /**
     * @param string $mandateNumber
     *
     * @return $this
     */
    public function setMandateNumber($mandateNumber)
    {
        $this->mandateNumber = $mandateNumber;

        return $this;
    }


}