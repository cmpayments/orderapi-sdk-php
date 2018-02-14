<?php

namespace CMPayments\OrderApi\Requests;

/**
 * Class CaptureRequest
 *
 * @package CMPayments\OrderApi\Requests
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class CaptureRequest extends Request
{
    /**
     * @param PaymentPreference $paymentPreferences
     *
     * @return $this
     */
    public function addPaymentPreferences($paymentPreferences)
    {
        $paymentPrefArr['profile'] = $paymentPreferences->getProfile();
        $paymentPrefArr['numberOfDaysToPay'] = $paymentPreferences->getNumberOfDaysToPay();

        $period = [];
        foreach ($paymentPreferences->getPeriods() as $id => $periodArr) {
            $attributes = ['_' => '', 'numberOfDays' => $periodArr['numberOfDays']];
            if (array_key_exists('profile', $periodArr) && $periodArr['profile'] !== null) {
                $attributes['profile'] = $periodArr['profile'];
            }
            $period['period' . ($id + 1)] = $attributes;
        }
        if (!empty($period)) {
            $paymentPrefArr['exhortation'] = $period;
        }
        if ($paymentPreferences->getTerminalId()) {
            $paymentPrefArr['terminalId'] = $paymentPreferences->getTerminalId();
        }
        $this->request[$this->requestName]['paymentPreferences'] = $paymentPrefArr;

        return $this;
    }

    /**
     * @param InitialPaymentReference $initialPaymentReference
     *
     * @return $this
     */
    public function addInitialPaymentReference($initialPaymentReference)
    {
        $this->request[$this->requestName]['paymentRequest'] = [
            'initialPaymentReference' => [
                'merchantReference' => $initialPaymentReference->getMerchantReference()
            ]
        ];

        return $this;
    }

    /**
     * @param MenuPreferences $menuPreferences
     *
     * @return $this
     */
    public function addMenuPreferences($menuPreferences)
    {
        if ($menuPreferences->getCssId() !== null) {
            $this->request[$this->requestName]['menuPreferences']['css'] = [
                '_' => '',
                'id' => $menuPreferences->getCssId()
            ];
        }

        return $this;
    }

    /**
     * @param Company $company
     *
     * @return $this
     */
    public function addCompany($company)
    {
        $this->request[$this->requestName]['company']['name'] = $company->getName();
        $this->request[$this->requestName]['company']['email'] = $company->getEmail();
        $this->request[$this->requestName]['company']['language'] = ['_' => '', 'code' => $company->getLanguageCode()];
        if ($company->getPhoneNumber() !== null) {
            $this->request[$this->requestName]['company']['phoneNumber'] = $company->getPhoneNumber();
        }
        if ($company->getMobilePhoneNumber() !== null) {
            $this->request[$this->requestName]['company']['mobilePhoneNumber'] = $company->getMobilePhoneNumber();
        }
        if ($company->getIpAddress() !== null) {
            $this->request[$this->requestName]['company']['ipAddress'] = $company->getIpAddress();
        }

        return $this;
    }

    /**
     * @param Shopper $shopper
     *
     * @return $this
     */
    public function addShopper($shopper)
    {
        $this->request[$this->requestName]['shopper'] = ['_' => '', 'id' => $shopper->getShopperId()];
        $this->request[$this->requestName]['shopper']['name'] = $this->createNameElement($shopper->getName());
        $this->request[$this->requestName]['shopper']['email'] = $shopper->getEmail();
        $this->request[$this->requestName]['shopper']['language'] = ['_' => '', 'code' => $shopper->getLanguageCode()];
        $this->request[$this->requestName]['shopper']['gender'] = strtoupper($shopper->getGender());
        if ($shopper->getDateOfBirth() instanceof \DateTime) {
            $this->request[$this->requestName]['shopper']['dateOfBirth'] = $shopper->getDateOfBirth()->format('Y-m-d');
        }

        if ($shopper->getPhoneNumber() !== null) {
            $this->request[$this->requestName]['shopper']['phoneNumber'] = $shopper->getPhoneNumber();
        }
        if ($shopper->getMobilePhoneNumber() !== null) {
            $this->request[$this->requestName]['shopper']['mobilePhoneNumber'] = $shopper->getMobilePhoneNumber();
        }
        if ($shopper->getIpAddress() !== null) {
            $this->request[$this->requestName]['shopper']['ipAddress'] = $shopper->getIpAddress();
        }


        return $this;
    }

    /**
     * @param Amount $totalGrossAmount
     *
     * @return $this
     */
    public function addTotalGrossAmount($totalGrossAmount)
    {
        $this->request[$this->requestName]['totalGrossAmount'] = [
            '_' => $totalGrossAmount->getAmount(),
            'currency' => $totalGrossAmount->getCurrency()
        ];

        return $this;
    }

    /**
     * @param Name $name
     * @param Address $address
     *
     * @return $this
     */
    public function addBillTo($name, $address)
    {
        $this->request[$this->requestName]['billTo'] = [
            'name' => $this->createNameElement($name),
            'address' => $this->createAddressElement($address)
        ];

        return $this;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function addDescription($description)
    {
        $this->request[$this->requestName]['description'] = $description;

        return $this;
    }

    /**
     * @param string $text
     *
     * @return $this
     */
    public function addReceiptText($text)
    {
        $this->request[$this->requestName]['receiptText'] = $text;

        return $this;
    }

    /**
     * @param Invoice $invoice
     * @param String|null $additionalDescription
     *
     * @return $this
     * @throws \Exception
     */
    public function addInvoice($invoice, $additionalDescription = null)
    {
        $items = [];
        foreach ($invoice->getItems() as $item) {
            $items[] = $this->createItemElement($item);
        }

        $this->request[$this->requestName]['invoice'] = [];

        if ($invoice->getTotalNetAmount() !== null) {
            $this->request[$this->requestName]['invoice']['totalNetAmount'] = [
                '_' => $invoice->getTotalNetAmount()->getAmount(),
                'currency' => $invoice->getTotalNetAmount()->getCurrency()
            ];
        }

        if ($invoice->getTotalVatAmount() !== null) {
            $this->request[$this->requestName]['invoice']['totalVatAmount'] = [
                '_' => $invoice->getTotalVatAmount()->getAmount()->getAmount(),
                'currency' => $invoice->getTotalVatAmount()->getAmount()->getCurrency(),
                'rate' => $invoice->getTotalVatAmount()->getRate()
            ];
        }

        $this->request[$this->requestName]['invoice']['item'] = $items;

        $this->request[$this->requestName]['invoice']['shipTo'] = [
            'name' => $this->createNameElement($invoice->getShipToName()),
            'address' => $this->createAddressElement($invoice->getShipToaddress())

        ];

        if ($additionalDescription !== null) {
            $this->request[$this->requestName]['invoice']['additionalDescription'] = $additionalDescription;
        }

        return $this;
    }

    /**
     * @param SalesPerson $salesperson
     */
    public function addSalesperson($salesperson)
    {
        $this->request[$this->requestName]['salesPerson']['name'] = $this->createNameElement($salesperson->getName());
    }

    /**
     * @param Item $item
     *
     * @return array
     */
    private function createItemElement($item)
    {
        $quantity = ['_' => $item->getQuantity(), 'unitOfMeasure' => $item->getUnitOfMeasure()];
        $netAmount = $this->createAmount($item->getNetAmount());
        $grossAmount = $this->createAmount($item->getGrossAmount());

        $totalNetAmount = $this->createAmount($item->getTotalNetAmount());
        $totalGrossAmount = $this->createAmount($item->getTotalGrossAmount());

        $itemElements = [
            '_' => '',
            'number' => $item->getNumber()
        ];

        $itemElements['name'] = $item->getName();
        $itemElements['code'] = $item->getcode();
        $itemElements['quantity'] = $quantity;
        $itemElements['description'] = $item->getDescription();
        if ($item->getImage() !== null) {
            $itemElements['image'] = $item->getImage();
        }
        $itemElements['netAmount'] = $netAmount;
        $itemElements['grossAmount'] = $grossAmount;
        $itemElements['vat'] = $this->createVat($item->getVat());

        $itemElements['totalNetAmount'] = $totalNetAmount;
        $itemElements['totalGrossAmount'] = $totalGrossAmount;
        $itemElements['totalVat'] = $this->createVat($item->getTotalVat());

        return $itemElements;
    }

    /**
     * @param Address $address
     *
     * @return array
     */
    private function createAddressElement($address)
    {
        $addressArr = [
            'street' => $address->getStreet(),
            'postalCode' => $address->getPostalCode(),
            'city' => $address->getCity(),
            'country' => [
                '_' => '',
                'code' => $address->getCountryCode()
            ]
        ];

        if (!empty($address->getHouseNumber())) {
            $addressArr['houseNumber'] = $address->getHouseNumber();
        }

        if (!empty($address->getState())) {
            $addressArr['state'] = $address->getState();
        }

        return $addressArr;
    }

    /**
     * @param Name $name
     *
     * @return array
     */
    private function createNameElement($name)
    {

        return [
            'prefix' => $name->getPrefix(),
            'initials' => $name->getInitials(),
            'first' => $name->getFirstname(),
            'middle' => $name->getMiddlename(),
            'last' => $name->getLastname(),
            'suffix' => $name->getSuffix()
        ];
    }
}
