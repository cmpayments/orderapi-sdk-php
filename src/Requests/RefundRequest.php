<?php

namespace CMPayments\OrderApi\Requests;

/**
 * Class RefundRequest
 *
 * @package CMPayments\OrderApi\Requests
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class RefundRequest extends Request
{

    public function setMerchantRefundReference($reference)
    {
        $this->request[$this->requestName]['merchantRefundReference'] = $text;

        return $this;
    }

    /**
     * @param string $itemCode
     */
    public function setItemCode($itemCode)
    {
        $this->request[$this->requestName]['itemCode'] = $itemCode;

        return $this;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->request[$this->requestName]['description'] = $description;

        return $this;
    }
}
