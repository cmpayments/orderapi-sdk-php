<?php

namespace CMPayments\OrderApi\Requests\Elements;

/**
 * Class ShopperInfo
 *
 * @package CMPayments\OrderApi\Requests\Elements
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class ShopperInfo
{
    /** @var string */
    private $shopperIp;

    /** @var string */
    private $browserAccept;

    /** @var string */
    private $browserUserAgent;

    /**
     * @return string
     */
    public function getShopperIp()
    {
        return $this->shopperIp;
    }

    /**
     * @param string $shopperIp
     *
     * @return $this
     */
    public function setShopperIp($shopperIp)
    {
        $this->shopperIp = $shopperIp;

        return $this;
    }

    /**
     * @return string
     */
    public function getBrowserAccept()
    {
        return $this->browserAccept;
    }

    /**
     * @param string $browserAccept
     *
     * @return $this
     */
    public function setBrowserAccept($browserAccept)
    {
        $this->browserAccept = $browserAccept;

        return $this;
    }

    /**
     * @return string
     */
    public function getBrowserUserAgent()
    {
        return $this->browserUserAgent;
    }

    /**
     * @param string $browserUserAgent
     *
     * @return $this
     */
    public function setBrowserUserAgent($browserUserAgent)
    {
        $this->browserUserAgent = $browserUserAgent;

        return $this;
    }


}