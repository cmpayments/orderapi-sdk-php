<?php

namespace CMPayments\OrderApi\Requests;

use CMPayments\OrderApi\Requests\Elements\DirectDebitPaymentInput;
use CMPayments\OrderApi\Requests\Elements\PaymentInput\AmexPaymentInput;
use CMPayments\OrderApi\Requests\Elements\PaymentInput\BankTransferPaymentInput;
use CMPayments\OrderApi\Requests\Elements\PaymentInput\ElvPaymentInput;
use CMPayments\OrderApi\Requests\Elements\PaymentInput\IdealPaymentInput;
use CMPayments\OrderApi\Requests\Elements\PaymentInput\MaestroPaymentInput;
use CMPayments\OrderApi\Requests\Elements\PaymentInput\MasterCardPaymentInput;
use CMPayments\OrderApi\Requests\Elements\PaymentInput\MisterCashPaymentInput;
use CMPayments\OrderApi\Requests\Elements\PaymentInput\OfflinePaymentInput;
use CMPayments\OrderApi\Requests\Elements\PaymentInput\PaypalPaymentInput;
use CMPayments\OrderApi\Requests\Elements\PaymentInput\PointOfSalePaymentInput;
use CMPayments\OrderApi\Requests\Elements\PaymentInput\VisaPaymentInput;
use Mockery\Exception;

/**
 * Class StartRequest
 *
 * @package CMPayments\OrderApi\Requests
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class StartRequest extends Request
{
    /**
     * @codingStandardsIgnoreStart
     * @param AmexPaymentInput|BankTransferPaymentInput|DirectDebitPaymentInput|ElvPaymentInput|IdealPaymentInput|MaestroPaymentInput|MasterCardPaymentInput|MisterCashPaymentInput|OfflinePaymentInput|PointOfSalePaymentInput|VisaPaymentInput|PaypalPaymentInput $paymentInput
     * @codingStandardsIgnoreEnd
     *
     * @throws \Exception
     * @return $this
     */
    public function addPaymentMethodData($paymentInput)
    {
        $classname = get_class($paymentInput);
        $classnameElements = explode('\\', $classname);
        $paymentMethod = lcfirst(array_pop($classnameElements));


        switch ($paymentMethod) {
            case 'amexPaymentInput':
            case 'masterCardPaymentInput':
            case 'misterCashPaymentInput':
            case 'maestroPaymentInput':
            case 'visaPaymentInput':
                if (!empty($paymentInput->getEncryptedData())) {
                    $paymentMethodArr['encryptedData'] = $paymentInput->getEncryptedData();
                } else {
                    $expDate = [
                        '_'     => '',
                        'month' => str_pad($paymentInput->getExpiryDateMonth(), 2, 0, STR_PAD_LEFT),
                        'year'  => str_pad($paymentInput->getExpiryDateYear(), 2, 0, STR_PAD_LEFT)
                    ];
                    $paymentMethodArr = [
                        'cardHolderName' => $paymentInput->getCardHolderName(),
                        'cardNumber'     => $paymentInput->getCardNumber(),
                        'expiryDate'     => $expDate,
                    ];
                    if (!empty($paymentInput->getSecurityCode())) {
                        $paymentMethodArr['securityCode'] = $paymentInput->getSecurityCode();
                    }
                }
                break;
            case 'directDebitPaymentInput':
                if ($paymentInput->getMandateNumber()) {
                    $paymentMethodArr['mandateNumber'] = $paymentInput->getMandateNumber();
                } else {
                    $paymentMethodArr['directDebitPaymentInputGroup'] = [
                        'holderName' => $paymentInput->getDirectDebitPaymentInputGroup()->getHolderName(),
                        'bic'        => $paymentInput->getDirectDebitPaymentInputGroup()->getBic(),
                        'iban'       => $paymentInput->getDirectDebitPaymentInputGroup()->getIban()
                    ];
                }
                break;
            case 'bankTransferPaymentInput':
                $paymentMethodArr['emailAddress'] = $paymentInput->getEmailAddress();
                break;
            case 'pointOfSalePaymentInput':
                break;
            case 'offlinePaymentInput':
                $paymentMethodArr['register'] = [
                    'id'       => $paymentInput->getRegister()->getId,
                    'location' => $paymentInput->getRegister()->getLocation(),
                    'method'   => $paymentInput->getMethod()
                ];
                break;
            case 'elvPaymentInput':
                $paymentMethodArr = [
                    'accountNumber' => $paymentInput->getAccountNumber(),
                    'bankCode'      => $paymentInput->getBankCode(),
                    'iban'          => $paymentInput->getIban()
                ];
                break;
            case 'idealPaymentInput':
                //Required to update the paymentMethod name. This input deviates the usual way of input-names.
                $paymentMethod = 'iDealPaymentInput';
                $paymentMethodArr = [
                    'issuerId' => $paymentInput->getIssuerId()
                ];
                break;
            case 'paypalPaymentInput':
                $paymentMethodArr = [
                    'mobileUser' => $paymentInput->getMobileUser()
                ];
                break;
            default:
                throw new \Exception(sprintf('Payment method %s not found.', get_class($paymentInput)));
        }

        $this->request[$this->requestName]['payment']['paymentMethod'] = $paymentInput->getPaymentMethod();
        $this->request[$this->requestName]['payment'][$paymentMethod] = $paymentMethodArr;

        return $this;
    }

    /**
     * @param InitialPaymentReference $initialPaymentReference
     *
     * @return $this
     */
    public function addRecurringPaymentRequest($initialPaymentReference)
    {
        $this->request[$this->requestName]['recurringPaymentRequest'] = [
            'initialPaymentReference' => [
                'merchantReference' => $initialPaymentReference->getMerchantReference()
            ]
        ];

        return $this;
    }

    /**
     * @param string $returnUrl
     *
     * @return $this
     */
    public function addReturnUrl($returnUrl)
    {
        $this->request[$this->requestName]['returnUrl'] = $returnUrl;

        return $this;
    }

    /**
     * @param ShopperInfo $shopperInfo
     *
     * @return $this
     */
    public function addShopperInfo($shopperInfo)
    {
        $this->request[$this->requestName]['shopperInfo']['shopperIp'] = $shopperInfo->getShopperIp();
        $this->request[$this->requestName]['shopperInfo']['browserAccept'] = $shopperInfo->getBrowserAccept();
        $this->request[$this->requestName]['shopperInfo']['browserUserAgent'] = $shopperInfo->getBrowserUserAgent();

        return $this;
    }

    /**
     * @param string $paymentMethod
     *
     * @return array
     */
    private function createPaymentElement($paymentMethod)
    {
        return ['paymentMethod' => strtoupper($paymentMethod)];
    }
}
