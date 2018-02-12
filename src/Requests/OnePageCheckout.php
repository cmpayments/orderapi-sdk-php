<?php

namespace CMPayments\OrderApi\Requests;

use App\User;
use CMPayments\OrderApi\Requests\Elements\Merchant;

/**
 * Class OnePageCheckout
 *
 * @package CMPayments\OrderApi\Requests
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class OnePageCheckout extends Request
{
    /** @var String */
    private $paymentOrderKey;

    /** @var String */
    private $paymentId;

    /**
     * The URL that your client will be redirected to after a successful payment.
     *
     * @var string
     */
    private $returnUrlSuccess;
    /**
     * The URL that your client will be redirected to after the payment menu was accessed for a pending payment.
     *
     * @var string
     */
    private $returnUrlPending;
    /**
     * The URL that your client will be redirected to after a payment has been canceled.
     *
     * @var string
     */
    private $returnUrlCancelled;
    /**
     * The URL that your client will be redirected to after an error has occurred.
     *
     * @var string
     */
    private $returnUrlError;
    /**
     * The language in which the menu should be shown initially. This is the 2-letter language code.
     *
     * @var string
     */
    private $clientLanguage = 'nl';

    /**
     * If the default payment method should be selected and executed. This can be used to, for example,
     * directly let the shopper select Ideal.
     * Extra note: the documentation is telling me that this parameter is deprecated...
     *
     * @var string
     */
    private $defaultAct;

    /**
     * The payment method to use for default_act, for example IDEAL or SEPA.
     * Extra note: the documentation is telling me that this parameter is deprecated...
     *
     * @var string
     */
    private $defaultPm;

    /**
     * Base url for the OPC
     *
     * @var string
     */
    private $baseUrl = Request::ONE_PAGE_CHECKOUT_LIVE_URL;

    /**
     * @return string
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * @param String $paymentId
     *
     * @return $this
     */
    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;

        return $this;
    }

    /**
     * @return String
     */
    public function getPaymentOrderKey()
    {
        return $this->paymentOrderKey;
    }

    /**
     * @param String $paymentOrderKey
     *
     * @return $this
     */
    public function setPaymentOrderKey($paymentOrderKey)
    {
        $this->paymentOrderKey = $paymentOrderKey;
        return $this;
    }

    /**
     * @param Merchant $merchant
     *
     * @return $this
     */
    public function setMerchant($merchant)
    {
        $this->merchant = $merchant;

        return $this;
    }

    /**
     * @return string
     */
    public function getReturnUrlSuccess()
    {
        return $this->returnUrlSuccess;
    }

    /**
     * @param string $returnUrlSuccess
     *
     * @return $this
     */
    public function setReturnUrlSuccess($returnUrlSuccess)
    {
        $this->returnUrlSuccess = $returnUrlSuccess;

        return $this;
    }

    /**
     * @return string
     */
    public function getReturnUrlPending()
    {
        return $this->returnUrlPending;
    }

    /**
     * @param string $returnUrlPending
     *
     * @return $this
     */
    public function setReturnUrlPending($returnUrlPending)
    {
        $this->returnUrlPending = $returnUrlPending;

        return $this;
    }

    /**
     * @return string
     */
    public function getReturnUrlCancelled()
    {
        return $this->returnUrlCancelled;
    }

    /**
     * @param string $returnUrlCancelled
     *
     * @return $this
     */
    public function setReturnUrlCancelled($returnUrlCancelled)
    {
        $this->returnUrlCancelled = $returnUrlCancelled;

        return $this;
    }

    /**
     * @return string
     */
    public function getReturnUrlError()
    {
        return $this->returnUrlError;
    }

    /**
     * @param string $returnUrlError
     *
     * @return $this
     */
    public function setReturnUrlError($returnUrlError)
    {
        $this->returnUrlError = $returnUrlError;

        return $this;
    }

    /**
     * @return string
     */
    public function getClientLanguage()
    {
        return $this->clientLanguage;
    }

    /**
     * @param string $clientLanguage
     *
     * @return $this
     */
    public function setClientLanguage($clientLanguage)
    {

        if (!in_array(
            strtolower($clientLanguage),
            [
                'nl',
                'en',
                'de',
                'cs',
                'da',
                'es',
                'fi',
                'fr',
                'hu',
                'it',
                'no',
                'pl',
                'pt',
                'sv',
                'tr'
            ],
            true
        )) {
            $clientLanguage = 'en';
        }

        $this->clientLanguage = strtolower($clientLanguage);

        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultAct()
    {
        return $this->defaultAct;
    }

    /**
     * @param string $defaultAct
     *
     * @return $this
     */
    public function setDefaultAct($defaultAct)
    {
        $this->defaultAct = $defaultAct;

        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultPm()
    {
        return $this->defaultPm;
    }

    /**
     * @param string $defaultPm
     *
     * @return $this
     */
    public function setDefaultPm($defaultPm)
    {
        $this->defaultPm = $defaultPm;

        return $this;
    }

    public function useTestUrl()
    {
        $this->baseUrl = Request::ONE_PAGE_CHECKOUT_DEV_URL;
    }


    /**
     * Create an one-page-payment-url
     */
    public function getPaymentUrl()
    {
        $params = [
            'merchant_name'       => $this->merchant->getUsername(),
            'payment_cluster_key' => $this->getPaymentOrderKey(),
        ];

        $urlAddition = '?paymentId=' . $this->getPaymentId();

        if (!empty($this->getReturnUrlSuccess())) {
            $params['return_url_success'] = $this->getReturnUrlSuccess() . $urlAddition;
        }

        if (!empty($this->getReturnUrlPending())) {
            $params['return_url_pending'] = $this->getReturnUrlPending() . $urlAddition;
        }

        if (!empty($this->getReturnUrlCancelled())) {
            $params['return_url_canceled'] = $this->getReturnUrlCancelled() . $urlAddition;
        }

        if (!empty($this->getReturnUrlError())) {
            $params['return_url_error'] = $this->getReturnUrlError() . $urlAddition;
        }

        if (!empty($this->getClientLanguage())) {
            $params['client_language'] = $this->getClientLanguage();
        }

        if (!empty($this->getDefaultAct())) {
            $params['default_act'] = $this->getDefaultAct();
        }

        if (!empty($this->getDefaultPm())) {
            $params['default_pm'] = $this->getDefaultPm();
        }

        return $this->baseUrl . '?' . http_build_query($params);

    }

}
