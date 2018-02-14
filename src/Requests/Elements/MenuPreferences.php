<?php

namespace CMPayments\OrderApi\Requests\Elements;

/**
 * Class MenuPreferences
 *
 * @package CMPayments\OrderApi\Requests\Elements
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class MenuPreferences
{
    /**
     * @var int
     */
    private $cssId;

    /**
     * @return int
     */
    public function getCssId()
    {
        return $this->cssId;
    }

    /**
     * @param int $cssId
     *
     * @return $this
     */
    public function setCssId($cssId)
    {
        $this->cssId = $cssId;

        return $this;
    }
}
