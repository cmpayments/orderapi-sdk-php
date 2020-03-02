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
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getVendorId()
    {
        return $this->vendorId;
    }

    /**
     * @param string $vendorId
     */
    public function setVendorId(string $vendorId)
    {
        $this->vendorId = $vendorId;
    }

    /**
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     */
    public function setAmount(string $amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getReturnCode()
    {
        return $this->returnCode;
    }

    /**
     * @param string $returnCode
     */
    public function setReturnCode(string $returnCode)
    {
        $this->returnCode = $returnCode;
    }

    /**
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     */
    public function setHash(string $hash)
    {
        $this->hash = $hash;
    }
}
