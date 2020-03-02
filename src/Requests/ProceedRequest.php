<?php

namespace CMPayments\OrderApi\Requests;

use CMPayments\OrderApi\Requests\Elements\Amount;
use CMPayments\OrderApi\Requests\Elements\BelfiusAuthorizationResult;
use CMPayments\OrderApi\Requests\Elements\IdealAuthorizationResult;
use CMPayments\OrderApi\Requests\Elements\IngHomePayAuthorizationResult;
use CMPayments\OrderApi\Requests\Elements\KbcAuthorizationResult;
use CMPayments\OrderApi\Requests\Elements\PaypalAuthenticationResult;
use CMPayments\OrderApi\Requests\Elements\ThreeDomainSecureAuthenticationResult;

/**
 * Class ProceedRequest
 *
 * @package CMPayments\OrderApi\Requests
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 * @author  Michel Megens <michel.megens@cmtelecom.com>
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
     * @param BelfiusAuthorizationResult $result Authorization result from PS.
     * @return $this Proceed request to allow chaining.
     */
    public function belfius(BelfiusAuthorizationResult $result)
    {
        $this->request[$this->requestName]['belfiusAuthorizationResult'] =  [
            'status' => $result->getStatus()
        ];

        return $this;
    }

    /**
     * @param IngHomePayAuthorizationResult $ingResult Authorization result from PS.
     * @return $this Proceed request to allow chaining.
     */
    public function ingHomePay(IngHomePayAuthorizationResult $ingResult)
    {
        $this->request[$this->requestName]['ingHomePayAuthorizationResult'] = [
            'vendorId' => $ingResult->getVendorId(),
            'message' => $ingResult->getMessage(),
            'returnCode' => $ingResult->getReturnCode(),
            'hash' => $ingResult->getHash(),
            'amount' => [
                '_' => $ingResult->getAmount(),
                'currency' => $ingResult->getCurrency()
            ]
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
