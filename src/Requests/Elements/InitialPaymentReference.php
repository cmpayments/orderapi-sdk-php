<?php

namespace CMPayments\OrderApi\Requests\Elements;

/**
 * Class InitialPaymentReference
 *
 * @package CMPayments\OrderApi\Requests\Elements
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class InitialPaymentReference
{
    /** @var string */
    private $merchantReference;

    /**
     * @return string
     */
    public function getMerchantReference()
    {
        return $this->merchantReference;
    }

    /**
     * @param string $merchantReference
     *
     * @return $this
     */
    public function setMerchantReference($merchantReference)
    {
        $this->merchantReference = $merchantReference;

        return $this;
    }
}
