<?php

namespace CMPayments\OrderApi\Requests\Elements;

/**
 * Class ThreeDomainSecureAuthenticationResult
 *
 * @package CMPayments\OrderApi\Requests\Elements
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class ThreeDomainSecureAuthenticationResult
{

    /** @var string */
    private $md;

    /** @var string */
    private $pares;

    /**
     * @return string
     */
    public function getMd()
    {
        return $this->md;
    }

    /**
     * @param string $md
     *
     * @return $this
     */
    public function setMd($md)
    {
        $this->md = $md;

        return $this;
    }

    /**
     * @return string
     */
    public function getPares()
    {
        return $this->pares;
    }

    /**
     * @param string $pares
     *
     * @return $this
     */
    public function setPares($pares)
    {
        $this->pares = $pares;

        return $this;
    }
}
