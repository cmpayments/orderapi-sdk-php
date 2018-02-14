<?php

namespace CMPayments\OrderApi\Requests\Elements;

/**
 * Class Vat
 *
 * @package CMPayments\OrderApi\Requests\Elements
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class Vat
{
    /** @var Amount */
    private $amount;

    /** @var  int */
    private $rate;

    /**
     * @return Amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param Amount $amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return int
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param int $rate
     *
     * @return $this
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }
}
