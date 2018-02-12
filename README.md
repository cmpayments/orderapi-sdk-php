# CMPayments Order API SDK for PHP
For more information about this calls, see the documentation. This SDK is a toolbox, more information about the working of the Webdirect or One-Page-Checkout, see the integration manual at https://www.docdatapayments.com/developer/api/.

## Installation
To install the SDK, simply use [Composer](https://getcomposer.org/):
```composer require cmpayments/orderapi-sdk-php```

## Setting up a connection

Setting up a connection by filling in the `username` and `password`. If you want to use the sandbox environment, add `true` as third parameter.
All the requests are create from this client.

```
$client = new CMPayments\OrderApi\Client(<username>, <password>);
```


## Create request
This create request will descripe a full request with a lot of optional fields.


First create a `merchantOrderReference` which refers to the your internal unique reference for this order and is used by the system for informational purposes in the Merchant BackOffice.

```
$merchantOrderReference = time();
```

The PaymentPreference specifies the settings to use for all payments which are going to be made on this order.
Replace `<payment_profile>` with your own payment profile.

```
$paymentPreferences = new CMPayments\OrderApi\Requests\Elements\PaymentPreference();
$paymentPreferences->setProfile(<payment_profile>)
   ->setNumberOfDaysToPay(14)
   ->addPeriod(7, 'unknown')
   ->addPeriod(7);
```

If you use a special css-id, you could replace the id from below.

```
$menuPreference = new CMPayments\OrderApi\Requests\Elements\MenuPreferences();
$menuPreference->setCssId(1);
```

The system is requiring shopperinformation. The `name` element could also be provided with more information, like `middlename`, `suffix`, `prefix` etc.

```
$shopper = new CMPayments\OrderApi\Requests\Elements\Shopper();
$name = new CMPayments\OrderApi\Requests\Elements\Name();
$name->setFirstname('Testpersoon-nl')
   ->setLastname('Approved');

/* Note: date of birth must be a \DateTime */
$dateOfBirth = DateTime::createFromFormat('Y-m-d', '1970-07-10');
$shopper->setShopperId(<customer_id>)
   ->setName($name)
   ->setEmail('accepted@yourdomain.com')
   ->setLanguageCode('nl')
   ->setGender('M')
   ->setDateOfBirth($dateOfBirth)
   ->setPhoneNumber('0612345678');

```

Billing and shippinginformation of the transaction. The shipping and billingaddress are the same in this example, even the receivers name is the same.

```
$billToAddress = new CMPayments\OrderApi\Requests\Elements\Address();
$billToAddress->setStreet('street')
   ->setHouseNumber('1')
   ->setHouseNumberAddition('A')
   ->setPostalCode('1234AA')
   ->setCity('Amsterdam')
   ->setCountryCode('NL');
$billToName = $name;
$shipToAddress = $billToAddress;
$shipToName = $name;
```

We will create an invoice with 3 products. 1 x a Kingston microSD and 2 pieces of the DVD 'Lonely Planet Thailand'

```
$invoice = new CMPayments\OrderApi\Requests\Elements\Invoice();
/* The total amount to pay incl. vat */
$paymentAmount = CMPayments\OrderApi\Requests\Elements\Amount::EUR(33.30);
/* specify the vat-rules per item */
$vat1 = new CMPayments\OrderApi\Requests\Elements\Vat();
$vat1->setAmount(CMPayments\OrderApi\Requests\Elements\Amount::EUR(2.10))->setRate(21);
$vat2 = new CMPayments\OrderApi\Requests\Elements\Vat();
$vat2->setAmount(CMPayments\OrderApi\Requests\Elements\Amount::EUR(1.20))->setRate(6);

/*
 * Define product 1
 */
$item1 = new CMPayments\OrderApi\Requests\Elements\Item();
$item1VatRate = new CMPayments\OrderApi\Requests\Elements\Vat();
$item1VatRate->setAmount(CMPayments\OrderApi\Requests\Elements\Amount::EUR(2.10))->setRate(21);
$item1TotalVatRate = new CMPayments\OrderApi\Requests\Elements\Vat();
$item1TotalVatRate->setAmount(CMPayments\OrderApi\Requests\Elements\Amount::EUR(2.10))->setRate(21);
$item1->setName('Kingston microSD kaart 32GB')
   ->setCode('SDC4/4GB-2ADP')
   ->setQuantity(CMPayments\OrderApi\Requests\Elements\Quantity::pieces(1))
   ->setDescription('Kingston microSD kaart 32GB met adapter')
   ->setImage('http://www.google.nl/images/srpr/logo3w.png')
   ->setNetAmount(CMPayments\OrderApi\Requests\Elements\Amount::EUR(10.00))
   ->setGrossAmount(CMPayments\OrderApi\Requests\Elements\Amount::EUR(12.10))
   ->setVat($item1VatRate)
   ->setTotalNetAmount(CMPayments\OrderApi\Requests\Elements\Amount::EUR(10.00))
   ->setTotalGrossAmount(CMPayments\OrderApi\Requests\Elements\Amount::EUR(12.10))
   ->setTotalVat($item1VatRate);

/*
 * Define product 2 (note: setQuantity has 2 pieces)
 */
$item2 = new CMPayments\OrderApi\Requests\Elements\Item();
$item2VatRate = new CMPayments\OrderApi\Requests\Elements\Vat();
$item2VatRate->setAmount(CMPayments\OrderApi\Requests\Elements\Amount::EUR(0.60))->setRate(6);
$item2TotalVatRate = new CMPayments\OrderApi\Requests\Elements\Vat();
$item2TotalVatRate->setAmount(CMPayments\OrderApi\Requests\Elements\Amount::EUR(1.20))->setRate(6);
$item2->setName('Lonely Planet Thailand')
   ->setCode('9781741791570')
   ->setQuantity(CMPayments\OrderApi\Requests\Elements\Quantity::pieces(2))
   ->setDescription('Tourism and travel information incl. maps, history, culture and transport in Thailand')
   ->setImage('http://upload.wikimedia.org/wikipedia/en/b/bc/Wiki.png')
   ->setNetAmount(CMPayments\OrderApi\Requests\Elements\Amount::EUR(10.00))
   ->setGrossAmount(CMPayments\OrderApi\Requests\Elements\Amount::EUR(10.60))
   ->setVat($item2VatRate)
   ->setTotalNetAmount(CMPayments\OrderApi\Requests\Elements\Amount::EUR(20.00))
   ->setTotalGrossAmount(CMPayments\OrderApi\Requests\Elements\Amount::EUR(21.20))
   ->setTotalVat($item2TotalVatRate);

/*
 * Add all elements to the invoice
 */
$invoice->setTotalNetAmount(CMPayments\OrderApi\Requests\Elements\Amount::EUR(30.00))
   ->addTotalVatAmount($vat1)
   ->addTotalVatAmount($vat2)
   ->addItem($item1)
   ->addItem($item2)
   ->setShipTo($shipToName, $shipToAddress)
   ->setAdditionalDescription('Add. Description');

/*
 * Creat the acutal request
 */
$createRequest = $client->createRequest();

/*
 * Add all invoice elements
 */
$createRequest->addMerchantOrderReference($merchantOrderReference)
   ->addPaymentPreferences($paymentPreferences)
   ->addMenuPreferences($menuPreference)
   ->addShopper($shopper)
   ->addTotalGrossAmount($paymentAmount)
   ->addBillTo($billToName, $billToAddress)
   ->addDescription('default transaction')
   ->addReceiptText('Thanks for your purchase')
   ->addInvoice($invoice)
   ->addIntegrationInfo(new CMPayments\OrderApi\Requests\Elements\IntegrationInfo('My webshop name or plugin', 'v1.0.0'));
```

The final step is to send the `CreateRequest` to the API.

```
//Do the actual request to the endpoint
$createResponse = $client->executeCreateRequest($createRequest);
```

## One Page Checkout
If you don't want to create different views for every payment method, there is a default checkout page which could be used
with the code from below 
Note: Please verify with DDP if your account has access for this feature

```
$opcResponse = $client->createOnePageCheckOut($createResponse->createSuccess->key)
->setClientLanguage('nl')
->setReturnUrlCancelled('https://www.yourdomain.com/cancelled')
->setReturnUrlError('https://www.yourdomain.com/error')
->setReturnUrlPending('https://www.yourdomain.com/pending')
->setReturnUrlSuccess('https://www.yourdomain.com/succes');

header('Location: ' . $opcResponse->getPaymentUrl());
```



## startRequest
The START request is specific to the Webdirect scenario where a payment can be controlled without online interaction with the shopper.
In this example we will start an iDEAL transaction.
Note: Please verify with DDP if your account has access for this feature

List if iDEAL issuers in this API:
- RABO
- ABNAMRO
- FRIESLANDBANK
- VANLANSCHOT
- TRIODOS
- ING
- SNS
- ASN
- REGIOBANK
- KNAB
- BUNQ

```
$paymentMethodData = new CMPayments\OrderApi\Requests\Elements\PaymentInput\IdealPaymentInput();
$paymentMethodData->setIssuerId('RABO');
$shopperInfo = new CMPayments\OrderApi\Requests\Elements\ShopperInfo();
$shopperInfo->setBrowserAccept('*/*')->setBrowserUserAgent('notfound')->setShopperIp('10.0.0.1');

$startRequest = $client->createStartRequest($createResponse->createSuccess->key);
$startRequest->addPaymentAmount($paymentAmount) /* from above */
    ->addPaymentMethodData($paymentMethodData) /* from above */
    ->addReturnUrl('https://www.yourdomain.tld/return?status=redirect')
    ->addShopperInfo($shopperInfo)
    ->addIntegrationInfo(new CMPayments\OrderApi\Requests\Elements\IntegrationInfo('My webshop name or plugin', 'v1.0.0'));

$startResponse = $client->executeStartRequest($startRequest);

//  Store the payment ID somewhere, you will need it later
$_SESSION['payment_id'] = $startResponse->startSuccess->paymentResponse->paymentSuccess->id

//In the response there is an redirect url to redirect the customer to
header('Location: ' . $startResponse->startSuccess->redirect->url);
```


## proceedRequest
The PROCEED request is specific to the Webdirect scenario where the shopper is redirected to an acquirer. It
is used to finish the authorisation after the merchant returns from the acquirer. For example when the shopper is sent directly to
iDEAL or 3D Secure.

```
//Create a proceeed request
$proceedRequest = $client->createProceedRequest(<payment_id>);
//Tell the request that it has to be an iDEAL proceed
$proceedRequest->Ideal();
//Execute the request
$proceedResponse = $client->executeProceedRequest($proceedRequest);
```

## captureRequest
The purpose of the CAPTURE request is to force the Docdata system to capture a payment order which is successfully authorized
for processing by the acquirer. This operation however is not required in all scenario’s. Depending on the payment method,
Docdata offers an option to automatically capture payment orders after a predefined number of days. This option supports
payment methods like AfterPay and Klarna Invoice where products are only to be shipped when the products are collected for shipment

```
$captureRequest = $client->createCaptureRequest(payment_id>, CMPayments\OrderApi\Requests\Elements\Amount::EUR(33.30));
$captureResponse = $client->executeCaptureRequest($captureRequest);
```

## statusRequest
The STATUS request can be used to retrieve a report reflecting the actual status of an Order, its payments
and its captures or refunds. The statusRequest is used to determine whether an Order is considered “paid”.

```
$statusRequest = $client->createStatusRequest(<PaymentOrderKey>);
$statusResponse = $client->executeStatusRequest($statusRequest);
```


## statusExtendedRequest
The EXTENDED STATUS request can be used to retrieve additional information of an Order, its payments and its captures or refunds.

```
$statusExtendedRequest = $client->createExtendedStatusRequest(<PaymentOrderKey>);
$statusExtendedResponse = $client->executeExtendedStatusRequest($statusExtendedRequest);
```

## cancelRequest
The purpose of the CANCEL request is to force the Docdata system not to accept any payment actions for the given Order anymore.
In a scenario where a shopper has cancelled the order in the web shop, the CANCEL request is to be used to synchronize the
administration in both the web shop and the Docdata system to ensure no payments are processed by Docdata for the order.

```
$cancelRequest = $client->createCancelRequest(<PaymentOrderKey>);
$cancelResponse = $client->executeCancelRequest($cancelRequest);
```

## refundRequest
In cases where a Merchant wants to refund a certain amount on a Payment Order the REFUND request can be used. The refundRequest
enables the refund process to be controlled and automated end-to-end between the web shop and the Docdata system.

@Todo implement the full refund option instead of the simple version.

```
$refundRequest = $client->createRefundRequest(<payment_id>);
$refundRequest->addAmount(CMPayments\OrderApi\Requests\Elements\Amount::EUR(21.20))
->setItemCode(9781741791570)
->setDescription('Wrong dvd');
$refundResponse = $client->executeRefundRequest($refundRequest);
```
