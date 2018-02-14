<?php

namespace CMPayments\OrderApi\Requests\Elements;

/**
 * Class PaymentRequest
 *
 * @package CMPayments\OrderApi\Requests\Elements
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class PaymentRequest
{
    /** @var PaymentPreferences */
    private $initialPaymentReference;

    /**
     * @return PaymentPreferences
     */
    public function getInitialPaymentReference()
    {
        return $this->initialPaymentReference;
    }

    /**
     * @param PaymentPreferences $initialPaymentReference
     *
     * @return $this
     */
    public function setInitialPaymentReference($initialPaymentReference)
    {
        $this->initialPaymentReference = $initialPaymentReference;

        return $this;
    }
}
