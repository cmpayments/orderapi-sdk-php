<?php

namespace CMPayments\OrderApi\Requests;

use CMPayments\OrderApi\Requests\Elements\Merchant;

/**
 * Class Request
 *
 * @package CMPayments\OrderApi\Requests\Elements
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class Request
{
    const WSDL_TEST         = 'https://test.docdatapayments.com/ps/services/paymentservice/1_3?wsdl';
    const ENDPOINT_API_TEST = 'https://test.docdatapayments.com/ps/services/paymentservice/1_3';

    const WSDL_LIVE         = 'https://secure.docdatapayments.com/ps/services/paymentservice/1_3?wsdl';
    const ENDPOINT_API_LIVE = 'https://secure.docdatapayments.com/ps/services/paymentservice/1_3';


    const ONE_PAGE_CHECKOUT_LIVE_URL = 'https://secure.docdatapayments.com/ps/menu';
    const ONE_PAGE_CHECKOUT_DEV_URL  = 'https://test.docdatapayments.com/ps/menu';

    const API_SOAP_VERSION = 1.3;

    /** @var array */
    public $request;

    /** @var string */
    public $requestName;

    /** @var Merchant */
    protected $merchant;

    /**
     * Request constructor.
     *
     * @param Merchant $merchant
     */
    public function __construct($merchant)
    {
        $this->requestName = __CLASS__;
        $this->merchant = $merchant;
        $this->createNewRequest();
    }

    /**
     * @param string $merchantOrderReference
     *
     * @return $this
     */
    public function addMerchantOrderReference($merchantOrderReference)
    {
        $this->request[$this->requestName]['merchantOrderReference'] = $merchantOrderReference;

        return $this;
    }
    
    /**
     * @return string
     */
    public function getRequestName()
    {
        return $this->requestName;
    }

    /**
     * @param string $requestName
     */
    public function setRequestName($requestName)
    {
        $this->requestName = $requestName;
    }

    /**
     * @return Merchant
     */
    public function getMerchant()
    {
        return $this->merchant;
    }

    /**
     * @param Merchant $merchant
     */
    public function setMerchant($merchant)
    {
        $this->merchant = $merchant;
    }

    /**
     * @param Amount $amount
     *
     * @return $this
     */
    public function addPaymentAmount($amount)
    {
        $this->request[$this->requestName]['paymentAmount'] = [
            '_'         => $amount->getAmount(),
            'currency'  => $amount->getCurrency()
        ];

        return $this;
    }

    /**
     * @param Amount $amount
     *
     * @return $this
     */
    public function addAmount($amount)
    {
        $this->request[$this->requestName]['amount'] = [
            '_'        => $amount->getAmount(),
            'currency' => $amount->getCurrency()
        ];

        return $this;
    }


    /**
     *
     */
    private function createNewRequest()
    {
        $this->request = [];
        $this->request[$this->requestName] = ['_' => '', 'version' => self::API_SOAP_VERSION];
    }

    /**
     * @return $this
     */
    public function addMerchant()
    {
        $this->request[$this->requestName]['merchant'] = [
            '_' => '',
            'name' => $this->merchant->getUsername(),
            'password' => $this->merchant->getPassword()
        ];

        return $this;
    }

    /**
     * @param string $orderKey
     *
     * @return $this
     */
    public function addPaymentOrderKey($orderKey)
    {
        $this->request[$this->requestName]['paymentOrderKey'] = $orderKey;

        return $this;
    }

    /**
     * @param string $paymentId
     *
     * @return $this
     */
    public function addPaymentId($paymentId)
    {
        $this->request[$this->requestName]['paymentId'] = $paymentId;

        return $this;
    }

    /**
     * @param Elements\IntegrationInfo $integrationInfo
     *
     * @return $this
     */
    public function addIntegrationInfo($integrationInfo)
    {
        $this->request[$this->requestName]['integrationInfo'] = [
            'webshopPlugin'          => $integrationInfo->getWebshopPlugin(),
            'webshopPluginVersion'   => $integrationInfo->getWebshopPluginVersion(),
            'integratorName'         => $integrationInfo->getIntegratorName(),
            'programmingLanguage'    => $integrationInfo->getProgrammingLanguage(),
            'operatingSystem'        => $integrationInfo->getOperatingSystem(),
            'operatingSystemVersion' => $integrationInfo->getOperatingSystemVersion(),
            'ddpXsdVersion'          => $integrationInfo->getDdpXsdVersion()
        ];

        return $this;
    }


    /**
     * @param Elements\Amount $amount
     *
     * @return array
     */
    public function createAmount($amount)
    {
        return ['_' => $amount->getAmount(), 'currency' => $amount->getCurrency()];
    }

    /**
     * @param Elements\Vat $vat
     *
     * @return array
     */
    public function createVat($vat)
    {
        $amount = $vat->getAmount();
        $vatAmount = ['_' => $amount->getAmount(), 'currency' => $amount->getCurrency()];
        $vatElement = ['_' => '', 'rate' => $vat->getRate()];
        $vatElement['amount'] = $vatAmount;

        return $vatElement;
    }

    /**
     * @return array
     */
    public function getRequest()
    {
        return $this->request;
    }
}
