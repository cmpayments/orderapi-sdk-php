<?php

namespace CMPayments\OrderApi\Requests\Elements\PaymentInput\Types;

/**
 * Class DirectDebitPaymentInputGroup
 *
 * @package CMPayments\OrderApi\Requests\Elements\PaymentInput\Types
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class DirectDebitPaymentInputGroup
{
    /** @var string */
    private $holderName;

    /** @var string */
    private $bic;

    /** @var string */
    private $iban;

    /**
     * @return string
     */
    public function getHolderName()
    {
        return $this->holderName;
    }

    /**
     * @param string $holderName
     *
     * @return $this
     */
    public function setHolderName($holderName)
    {
        $this->holderName = $holderName;

        return $this;
    }

    /**
     * @return string
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * @param string $bic
     *
     * @return $this
     */
    public function setBic($bic)
    {
        $this->bic = $bic;

        return $this;
    }

    /**
     * @return string
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @param string $iban
     *
     * @return $this
     */
    public function setIban($iban)
    {
        $this->iban = $iban;

        return $this;
    }


}