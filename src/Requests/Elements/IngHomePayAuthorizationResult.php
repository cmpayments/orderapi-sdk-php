<?php

namespace CMPayments\OrderApi\Requests\Elements;

/**
 * Class IngHomePayAuthorizationResult.
 *
 * @package CMPayments\OrderApi\Requests\Elements
 * @author  Michel Megens <michel.megens@cmtelecom.com>
 */
class IngHomePayAuthorizationResult
{
    /**
     * @var $vendorId string
     */
    private $vendorId;

    /**
     * @var $amount string Amount in cents.
     */
    private $amount;

    /**
     * @var $message string
     */
    private $message;

    /**
     * @var $returnCode string
     */
    private $returnCode;

    /**
     * @var $hash string
     */
    private $hash;

    /**
     * @var $currency string
     */
    private $currency;

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getVendorId(): string
    {
        return $this->vendorId;
    }

    /**
     * @param string $vendorId
     */
    public function setVendorId(string $vendorId): void
    {
        $this->vendorId = $vendorId;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     */
    public function setAmount(string $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getReturnCode(): string
    {
        return $this->returnCode;
    }

    /**
     * @param string $returnCode
     */
    public function setReturnCode(string $returnCode): void
    {
        $this->returnCode = $returnCode;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     */
    public function setHash(string $hash): void
    {
        $this->hash = $hash;
    }
}
