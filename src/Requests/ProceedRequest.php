<?php

namespace CMPayments\OrderApi\Requests;

use CMPayments\OrderApi\Requests\Elements\IdealAuthorizationResult;
use CMPayments\OrderApi\Requests\Elements\KbcAuthorizationResult;
use CMPayments\OrderApi\Requests\Elements\PaypalAuthenticationResult;
use CMPayments\OrderApi\Requests\Elements\ThreeDomainSecureAuthenticationResult;

/**
 * Class ProceedRequest
 *
 * @package CMPayments\OrderApi\Requests
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class ProceedRequest extends Request
{

    /**
     * @param ThreeDomainSecureAuthenticationResult $threeDomainSecureAuthenticationResult
     *
     * @return $this
     */
    public function threeDomainSecureAuthenticationResult($threeDomainSecureAuthenticationResult)
    {
        $this->request[$this->requestName]['threeDomainSecureAuthenticationResult'] = [
            'MD'    => $threeDomainSecureAuthenticationResult->getMd(),
            'PARes' => $threeDomainSecureAuthenticationResult->getPares()
        ];

        return $this;
    }

    /**
     * @return $this
     */
    public function ideal()
    {
        $this->request[$this->requestName]['iDealAuthorizationResult'] = '';

        return $this;
    }

    /**
     * @param KbcAuthorizationResult $kbcAuthorizationResult
     *
     * @return $this
     */
    public function kbc(KbcAuthorizationResult $kbcAuthorizationResult)
    {
        $this->request[$this->requestName]['kbcAuthorizationResult'] = [
            'olpCtx' => $kbcAuthorizationResult->getOlpCtx()
        ];

        return $this;
    }

    /**
     * @return $this
     */
    public function paypal(PaypalAuthenticationResult $paypalAuthenticationResult)
    {
        $this->request[$this->requestName]['paypalAuthenticationResult'] = [
            'Token' => $paypalAuthenticationResult->getToken(),
            'ShopperCanceled' => $paypalAuthenticationResult->getShopperCanceled()
        ];

        if ($paypalAuthenticationResult->getPayerId() !== null) {
            $this->request[$this->requestName]['paypalAuthenticationResult']['PayerId'] =
                $paypalAuthenticationResult->getPayerId();
        }

        return $this;
    }
}
