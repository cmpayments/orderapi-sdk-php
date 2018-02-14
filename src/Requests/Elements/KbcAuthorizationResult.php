<?php

namespace CMPayments\OrderApi\Requests\Elements;

/**
 * Class KbcAuthorizationResult
 *
 * @package CMPayments\OrderApi\Requests\Elements
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class KbcAuthorizationResult
{
    /** @var string */
    private $olpCtx;

    /**
     * @return string
     */
    public function getOlpCtx()
    {
        return $this->olpCtx;
    }

    /**
     * @param $olpCtx
     *
     * @return $this
     */
    public function setOlpCtx($olpCtx)
    {
        $this->olpCtx = $olpCtx;
        
        return $this;
    }
}
