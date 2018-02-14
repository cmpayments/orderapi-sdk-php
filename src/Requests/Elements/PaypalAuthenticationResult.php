<?php

namespace CMPayments\OrderApi\Requests\Elements;

/**
 * Class PaypalAuthenticationResult
 *
 * @package CMPayments\OrderApi\Requests\Elements
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class PaypalAuthenticationResult
{
    /** @var string */
    private $token;

    /** @var string */
    private $payerId;

    /** @var string */
    private $ShopperCanceled;

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param $token
     *
     * @return $this
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @return string
     */
    public function getPayerId()
    {
        return $this->payerId;
    }

    /**
     * @param $payerId
     *
     * @return $this
     */
    public function setPayerId($payerId)
    {
        $this->payerId = $payerId;

        return $this;
    }

    /**
     * @return string
     */
    public function getShopperCanceled()
    {
        return $this->ShopperCanceled;
    }

    /**
     * @param $ShopperCanceled
     *
     * @return $this
     */
    public function setShopperCanceled($ShopperCanceled)
    {
        $this->ShopperCanceled = $ShopperCanceled;

        return $this;
    }
}
