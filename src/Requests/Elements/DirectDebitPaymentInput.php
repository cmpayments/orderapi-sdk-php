<?php

namespace CMPayments\OrderApi\Requests\Elements;

use CMPayments\OrderApi\Requests\Elements\PaymentInput\Types\DirectDebitPaymentInputGroup;

/**
 * Class DirectDebitPaymentInput
 *
 * @package CMPayments\OrderApi\Requests\Elements
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class DirectDebitPaymentInput
{
    /** @var DirectDebitPaymentInputGroup */
    private $directDebitPaymentInputGroup;

    /** @var string */
    private $mandateNumber;

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
