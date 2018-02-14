<?php

namespace CMPayments\OrderApi\Requests\Elements\PaymentInput\Types;

/**
 * Class BankTransferPaymentInput
 *
 * @package CMPayments\OrderApi\Requests\Elements\PaymentInput\Types
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class BankTransferPaymentInput
{
    /** @var string */
    private $emailAddress;

    /**
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param string $emailAddress
     *
     * @return $this
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
        return $this;
    }
}
