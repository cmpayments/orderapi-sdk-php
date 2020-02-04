<?php

namespace CMPayments\OrderApi;

use CMPayments\OrderApi\Requests\CancelRequest;
use CMPayments\OrderApi\Requests\CaptureRequest;
use CMPayments\OrderApi\Requests\CreateRequest;
use CMPayments\OrderApi\Requests\Elements\Amount;
use CMPayments\OrderApi\Requests\Elements\Merchant;
use CMPayments\OrderApi\Requests\ExtendedStatusRequest;
use CMPayments\OrderApi\Requests\ListPaymentMethodsRequest;
use CMPayments\OrderApi\Requests\OnePageCheckout;
use CMPayments\OrderApi\Requests\ProceedRequest;
use CMPayments\OrderApi\Requests\RefundRequest;
use CMPayments\OrderApi\Requests\Request;
use CMPayments\OrderApi\Requests\StartRequest;
use CMPayments\OrderApi\Requests\StatusRequest;

/**
 * Class Client
 *
 * @package Docdata\Payments
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class Client
{

    /** @var Merchant */
    private $merchant;

    /** @var boolean */
    private $isTest;

    /** @var \SoapClient */
    private $soapClient;

    /** @var array Soap requests */
    public $soapRequest = [];

    /** @var array Soap responses */
    public $soapResponse = [];

    /**
     * @param string  $username Docdata Payments username
     * @param string  $password Docdata Payments password
     * @param boolean $isOPC    Processing via One-Page-Checkout?
     * @param boolean $isTest   Is it a test-transaction?
     */
    public function __construct($username, $password, $isTest = false)
    {
        $this->merchant = new Merchant($username, $password);
        $this->isTest = $isTest ? 1 : 0;
        $this->initSoap();
    }

    /**
     * @param string $paymentOrderKey The payment order key.
     * @return ListPaymentMethodsRequest
     */
    public function createListPaymentMethodsRequest(string $paymentOrderKey)
    {
        return (new Request($this->merchant))
            ->addMerchant()
            ->addPaymentOrderKey($paymentOrderKey);
    }

    public function executeListPaymentMethodsRequest($request)
    {
        return $this->executeSoapRequest($request, 'listPaymentMethodsRequest', 'listPaymentMethods');
    }

    /**
     * Create a new "CreateRequest"-request
     *
     * @return CreateRequest
     */
    public function createRequest()
    {
        return (new CreateRequest($this->merchant))->addMerchant();
    }

    /**
     * @param CreateRequest $createRequest
     *
     * @throws \Throwable
     */
    public function executeCreateRequest($createRequest)
    {
        return $this->executeSoapRequest($createRequest, 'CreateRequest', 'Create');
    }

    /**
     * @param string $paymentOrderKey
     *
     * @return StartRequest
     */
    public function createStartRequest($paymentOrderKey)
    {
        return (new StartRequest($this->merchant))->addMerchant()->addPaymentOrderKey($paymentOrderKey);
    }

    /**
     * @param string $paymentOrderKey
     *
     * @return OnePageCheckout
     */
    public function createOnePageCheckOut(string $paymentOrderKey)
    {
        $opc = new OnePageCheckout($this->merchant);

        if ($this->isTest) {
            $opc->useTestUrl();
        }

        return $opc->setMerchant($this->merchant)
            ->setPaymentOrderKey($paymentOrderKey);
    }

    /**
     * @param StartRequest $startRequest
     *
     * @throws \Throwable
     */
    public function executeStartRequest($startRequest)
    {
        return $this->executeSoapRequest($startRequest, 'StartRequest', 'start');
    }

    /**
     * @param string $paymentId
     *
     * @return StartRequest
     */
    public function createProceedRequest($paymentId)
    {
        return (new ProceedRequest($this->merchant))->addMerchant()->addPaymentId($paymentId);
    }

    /**
     * @param ProceedRequest $proceedRequest
     *
     * @throws \Throwable
     */
    public function executeProceedRequest($proceedRequest)
    {
        return $this->executeSoapRequest($proceedRequest, 'ProceedRequest', 'proceed');
    }

    /**
     * @param string $paymentOrderKey
     *
     * @return StartRequest
     */
    public function createCancelRequest($paymentOrderKey)
    {
        return (new CancelRequest($this->merchant))
            ->addMerchant()
            ->addPaymentOrderKey($paymentOrderKey);
    }

    /**
     * @param CancelRequest $cancelRequest
     *
     * @throws \Throwable
     */
    public function executeCancelRequest($cancelRequest)
    {
        return $this->executeSoapRequest($cancelRequest, 'cancelRequest', 'cancel');
    }

    /**
     * @param string $paymentOrderKey
     *
     * @return StartRequest
     */
    public function createExtendedStatusRequest($paymentOrderKey)
    {
        return (new ExtendedStatusRequest($this->merchant))
            ->addMerchant()
            ->addPaymentOrderKey($paymentOrderKey);
    }

    /**
     * @param ExtendedStatusRequest $extendedStatusResponseRequest
     *
     * @throws \Throwable
     */
    public function executeExtendedStatusRequest($extendedStatusResponseRequest)
    {
        return $this->executeSoapRequest($extendedStatusResponseRequest, 'StatusExtended', 'statusExtended');
    }

    /**
     * @param string $paymentOrderKey
     *
     * @return StartRequest
     */
    public function createStatusRequest($paymentOrderKey)
    {
        return (new StatusRequest($this->merchant))
            ->addMerchant()
            ->addPaymentOrderKey($paymentOrderKey);
    }

    /**
     * @param StatusRequest $statusRespuest
     *
     * @throws \Throwable
     */
    public function executeStatusRequest($statusRespuest)
    {
        return $this->executeSoapRequest($statusRespuest, 'statusRequest', 'status');
    }

    /**
     * @param string $paymentOrderKey
     *
     * @return StartRequest
     */
    public function createRefundRequest($paymentId)
    {
        return (new RefundRequest($this->merchant))->addMerchant()->addPaymentId($paymentId);
    }

    /**
     * @param RefundRequest $refundRequest
     *
     * @throws \Throwable
     */
    public function executeRefundRequest(RefundRequest $refundRequest)
    {
        return $this->executeSoapRequest($refundRequest, 'refundRequest', 'refund');
    }


    /**
     * @param        $paymentId
     * @param Amount $amount
     *
     * @return $this
     */
    public function createCaptureRequest($paymentId, Amount $amount)
    {
        return (new CaptureRequest($this->merchant))->addMerchant()->addPaymentId($paymentId)->addAmount($amount);
    }

    /**
     * @param CaptureRequest $captureRequest
     *
     * @return mixed
     * @throws \Throwable
     */
    public function executeCaptureRequest(CaptureRequest $captureRequest)
    {
        return $this->executeSoapRequest($captureRequest, 'captureRequest', 'capture');
    }

    /**
     * Execute the soap-request.
     *
     * @param        $request
     * @param string $requestName
     * @param string $action
     *
     * @return mixed
     * @throws \Throwable
     */
    private function executeSoapRequest($request, string $requestName, string $action)
    {
        try {
            $result = $this->soapClient->__soapCall($action, $request->getRequest());
            $this->soapRequest[$requestName] = $this->soapClient->__getLastRequest();
            $this->soapResponse[$requestName] = $this->soapClient->__getLastResponse();

            return $result;
        } catch (\Throwable $t) {
            throw $t;
        }
    }

    /**
     * initialize the soap-client
     */
    private function initSoap()
    {
        $wsdl = $this->isTest ? Request::WSDL_TEST : Request::WSDL_LIVE;
        $endpoint = $this->isTest ? Request::ENDPOINT_API_TEST : Request::ENDPOINT_API_LIVE;

        $options = [
            'trace' => $this->isTest ? 1 : 0,
        ];

        $this->soapClient = new \SoapClient($wsdl, $options);
        $this->soapClient->__setLocation($endpoint);
    }
}
