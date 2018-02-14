<?php

namespace CMPayments\OrderApi\Requests\Elements\PaymentInput;

/**
 * Class BankTransferPaymentInput
 *
 * @package CMPayments\OrderApi\Requests\Elements\PaymentInput
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class BankTransferPaymentInput implements PaymentMethodInterface
{
    const PAYMENT_METHOD = 'BANK_TRANSFER';

    /** @var string */
    private $emailAddress;

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
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param string $emailAddress
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }
}
