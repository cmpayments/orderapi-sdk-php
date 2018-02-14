<?php

namespace CMPayments\OrderApi\Requests\Elements\PaymentInput\Types;

/**
 * Class CardPaymentInput
 *
 * @package CMPayments\OrderApi\Requests\Elements\PaymentInput\Types
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class CardPaymentInput
{

    /** @var string */
    private $cardHolderName;

    /** @var string */
    private $cardNumber;

    /** @var int */
    private $expiryDateMonth;

    /** @var int */
    private $expiryDateYear;

    /** @var int */
    private $securityCode;

    /** @var string */
    private $encryptedData;

    /**
     * @return string
     */
    public function getCardHolderName()
    {
        return $this->cardHolderName;
    }

    /**
     * @param string $cardHolderName
     *
     * @return $this
     */
    public function setCardHolderName($cardHolderName)
    {
        $this->cardHolderName = $cardHolderName;

        return $this;
    }

    /**
     * @return string
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * @param string $cardNumber
     *
     * @return $this
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    /**
     * @return int
     */
    public function getExpiryDateMonth()
    {
        return $this->expiryDateMonth;
    }

    /**
     * @param int $expiryDateMonth
     *
     * @return $this
     */
    public function setExpiryDateMonth($expiryDateMonth)
    {
        $this->expiryDateMonth = $expiryDateMonth;

        return $this;
    }

    /**
     * @return int
     */
    public function getExpiryDateYear()
    {
        return $this->expiryDateYear;
    }

    /**
     * @param int $expiryDateYear
     *
     * return $this
     */
    public function setExpiryDateYear($expiryDateYear)
    {
        $this->expiryDateYear = $expiryDateYear;

        return $this;
    }

    /**
     * @return int
     */
    public function getSecurityCode()
    {
        return $this->securityCode;
    }

    /**
     * @param int $securityCode
     *
     * @return $this
     */
    public function setSecurityCode($securityCode)
    {
        $this->securityCode = $securityCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getEncryptedData()
    {
        return $this->encryptedData;
    }

    /**
     * @param string $encryptedData
     *
     * @return $this
     */
    public function setEncryptedData($encryptedData)
    {
        $this->encryptedData = $encryptedData;

        return $this;
    }
}
