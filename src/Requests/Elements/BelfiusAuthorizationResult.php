<?php

namespace CMPayments\OrderApi\Requests\Elements;

/**
 * Class BelfiusAuthorizationResult.
 *
 * @package CMPayments\OrderApi\Requests\Elements
 * @author  Michel Megens <michel.megens@cmtelecom.com>
 */
class BelfiusAuthorizationResult
{
    /**
     * @var string $status Authorization status.
     */
    private $status;

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
}
