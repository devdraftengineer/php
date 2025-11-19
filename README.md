# devdraft


A comprehensive payment processing and business management API that enables seamless integration of cryptocurrency and traditional payment methods.
    


## Installation & Usage

### Requirements

PHP 8.1 and later.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/GIT_USER_ID/GIT_REPO_ID.git"
    }
  ],
  "require": {
    "GIT_USER_ID/GIT_REPO_ID": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/devdraft/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



// Configure API key authorization: x-client-secret
$config = Devdraft\Configuration::getDefaultConfiguration()->setApiKey('x-client-secret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Devdraft\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-client-secret', 'Bearer');

// Configure API key authorization: x-client-key
$config = Devdraft\Configuration::getDefaultConfiguration()->setApiKey('x-client-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Devdraft\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-client-key', 'Bearer');


$apiInstance = new Devdraft\Api\APIHealthApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->healthControllerCheckV0();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling APIHealthApi->healthControllerCheckV0: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://api.devdraft.ai*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*APIHealthApi* | [**healthControllerCheckV0**](docs/Api/APIHealthApi.md#healthcontrollercheckv0) | **GET** /api/v0/health | Authenticated health check endpoint
*APIHealthApi* | [**healthControllerPublicHealthCheckV0**](docs/Api/APIHealthApi.md#healthcontrollerpublichealthcheckv0) | **GET** /api/v0/health/public | Public health check endpoint
*AppBalancesApi* | [**balanceControllerGetAllBalances**](docs/Api/AppBalancesApi.md#balancecontrollergetallbalances) | **GET** /api/v0/balance | Get all stablecoin balances for an app
*AppBalancesApi* | [**balanceControllerGetEURCBalance**](docs/Api/AppBalancesApi.md#balancecontrollergeteurcbalance) | **GET** /api/v0/balance/eurc | Get EURC balance for an app
*AppBalancesApi* | [**balanceControllerGetUSDCBalance**](docs/Api/AppBalancesApi.md#balancecontrollergetusdcbalance) | **GET** /api/v0/balance/usdc | Get USDC balance for an app
*CustomersApi* | [**customerControllerCreate**](docs/Api/CustomersApi.md#customercontrollercreate) | **POST** /api/v0/customers | Create a new customer
*CustomersApi* | [**customerControllerFindAll**](docs/Api/CustomersApi.md#customercontrollerfindall) | **GET** /api/v0/customers | Get all customers with filters
*CustomersApi* | [**customerControllerFindOne**](docs/Api/CustomersApi.md#customercontrollerfindone) | **GET** /api/v0/customers/{id} | Get a customer by ID
*CustomersApi* | [**customerControllerUpdate**](docs/Api/CustomersApi.md#customercontrollerupdate) | **PATCH** /api/v0/customers/{id} | Update a customer
*ExchangeRatesApi* | [**exchangeRateControllerGetEURToUSDRate**](docs/Api/ExchangeRatesApi.md#exchangeratecontrollergeteurtousdrate) | **GET** /api/v0/exchange-rate/eur-to-usd | Get EUR to USD exchange rate
*ExchangeRatesApi* | [**exchangeRateControllerGetExchangeRate**](docs/Api/ExchangeRatesApi.md#exchangeratecontrollergetexchangerate) | **GET** /api/v0/exchange-rate | Get exchange rate between specified currencies
*ExchangeRatesApi* | [**exchangeRateControllerGetUSDToEURRate**](docs/Api/ExchangeRatesApi.md#exchangeratecontrollergetusdtoeurrate) | **GET** /api/v0/exchange-rate/usd-to-eur | Get USD to EUR exchange rate
*InvoicesApi* | [**invoiceControllerCreate**](docs/Api/InvoicesApi.md#invoicecontrollercreate) | **POST** /api/v0/invoices | Create a new invoice
*InvoicesApi* | [**invoiceControllerFindAll**](docs/Api/InvoicesApi.md#invoicecontrollerfindall) | **GET** /api/v0/invoices | Get all invoices
*InvoicesApi* | [**invoiceControllerFindOne**](docs/Api/InvoicesApi.md#invoicecontrollerfindone) | **GET** /api/v0/invoices/{id} | Get an invoice by ID
*InvoicesApi* | [**invoiceControllerUpdate**](docs/Api/InvoicesApi.md#invoicecontrollerupdate) | **PUT** /api/v0/invoices/{id} | Update an invoice
*LiquidationAddressesApi* | [**liquidationAddressControllerCreateLiquidationAddress**](docs/Api/LiquidationAddressesApi.md#liquidationaddresscontrollercreateliquidationaddress) | **POST** /api/v0/customers/{customerId}/liquidation_addresses | Create a new liquidation address for a customer
*LiquidationAddressesApi* | [**liquidationAddressControllerGetLiquidationAddress**](docs/Api/LiquidationAddressesApi.md#liquidationaddresscontrollergetliquidationaddress) | **GET** /api/v0/customers/{customerId}/liquidation_addresses/{liquidationAddressId} | Get a specific liquidation address
*LiquidationAddressesApi* | [**liquidationAddressControllerGetLiquidationAddresses**](docs/Api/LiquidationAddressesApi.md#liquidationaddresscontrollergetliquidationaddresses) | **GET** /api/v0/customers/{customerId}/liquidation_addresses | Get all liquidation addresses for a customer
*PaymentIntentsApi* | [**paymentIntentControllerCreateBankPaymentIntent**](docs/Api/PaymentIntentsApi.md#paymentintentcontrollercreatebankpaymentintent) | **POST** /api/v0/payment-intents/bank | Create a bank payment intent
*PaymentIntentsApi* | [**paymentIntentControllerCreateStablePaymentIntent**](docs/Api/PaymentIntentsApi.md#paymentintentcontrollercreatestablepaymentintent) | **POST** /api/v0/payment-intents/stablecoin | Create a stable payment intent
*PaymentLinksApi* | [**paymentLinksControllerCreate**](docs/Api/PaymentLinksApi.md#paymentlinkscontrollercreate) | **POST** /api/v0/payment-links | Create a new payment link
*PaymentLinksApi* | [**paymentLinksControllerFindAll**](docs/Api/PaymentLinksApi.md#paymentlinkscontrollerfindall) | **GET** /api/v0/payment-links | Get all payment links
*PaymentLinksApi* | [**paymentLinksControllerFindOne**](docs/Api/PaymentLinksApi.md#paymentlinkscontrollerfindone) | **GET** /api/v0/payment-links/{id} | Get a payment link by ID
*PaymentLinksApi* | [**paymentLinksControllerUpdate**](docs/Api/PaymentLinksApi.md#paymentlinkscontrollerupdate) | **PUT** /api/v0/payment-links/{id} | Update a payment link
*ProductsApi* | [**productControllerCreate**](docs/Api/ProductsApi.md#productcontrollercreate) | **POST** /api/v0/products | Create a new product
*ProductsApi* | [**productControllerFindAll**](docs/Api/ProductsApi.md#productcontrollerfindall) | **GET** /api/v0/products | Get all products
*ProductsApi* | [**productControllerFindOne**](docs/Api/ProductsApi.md#productcontrollerfindone) | **GET** /api/v0/products/{id} | Get a product by ID
*ProductsApi* | [**productControllerRemove**](docs/Api/ProductsApi.md#productcontrollerremove) | **DELETE** /api/v0/products/{id} | Delete a product
*ProductsApi* | [**productControllerUpdate**](docs/Api/ProductsApi.md#productcontrollerupdate) | **PUT** /api/v0/products/{id} | Update a product
*ProductsApi* | [**productControllerUploadImage**](docs/Api/ProductsApi.md#productcontrolleruploadimage) | **POST** /api/v0/products/{id}/images | Upload images for a product
*TaxesApi* | [**taxControllerCreate**](docs/Api/TaxesApi.md#taxcontrollercreate) | **POST** /api/v0/taxes | Create a new tax
*TaxesApi* | [**taxControllerDeleteWithoutId**](docs/Api/TaxesApi.md#taxcontrollerdeletewithoutid) | **DELETE** /api/v0/taxes | Tax ID required for deletion
*TaxesApi* | [**taxControllerFindAll**](docs/Api/TaxesApi.md#taxcontrollerfindall) | **GET** /api/v0/taxes | Get all taxes with filters
*TaxesApi* | [**taxControllerFindOne**](docs/Api/TaxesApi.md#taxcontrollerfindone) | **GET** /api/v0/taxes/{id} | Get a tax by ID
*TaxesApi* | [**taxControllerRemove**](docs/Api/TaxesApi.md#taxcontrollerremove) | **DELETE** /api/v0/taxes/{id} | Delete a tax
*TaxesApi* | [**taxControllerUpdate**](docs/Api/TaxesApi.md#taxcontrollerupdate) | **PUT** /api/v0/taxes/{id} | Update a tax
*TaxesApi* | [**taxControllerUpdateWithoutId**](docs/Api/TaxesApi.md#taxcontrollerupdatewithoutid) | **PUT** /api/v0/taxes | Tax ID required for updates
*TestPaymentsApi* | [**testPaymentControllerCreatePaymentV0**](docs/Api/TestPaymentsApi.md#testpaymentcontrollercreatepaymentv0) | **POST** /api/v0/test-payment | Process a test payment
*TestPaymentsApi* | [**testPaymentControllerGetPaymentV0**](docs/Api/TestPaymentsApi.md#testpaymentcontrollergetpaymentv0) | **GET** /api/v0/test-payment/{id} | Get payment details by ID
*TestPaymentsApi* | [**testPaymentControllerRefundPaymentV0**](docs/Api/TestPaymentsApi.md#testpaymentcontrollerrefundpaymentv0) | **POST** /api/v0/test-payment/{id}/refund | Refund a payment
*TransfersApi* | [**transferControllerCreateDirectBankTransfer**](docs/Api/TransfersApi.md#transfercontrollercreatedirectbanktransfer) | **POST** /api/v0/transfers/direct-bank | Create a direct bank transfer
*TransfersApi* | [**transferControllerCreateDirectWalletTransfer**](docs/Api/TransfersApi.md#transfercontrollercreatedirectwallettransfer) | **POST** /api/v0/transfers/direct-wallet | Create a direct wallet transfer
*TransfersApi* | [**transferControllerCreateExternalBankTransfer**](docs/Api/TransfersApi.md#transfercontrollercreateexternalbanktransfer) | **POST** /api/v0/transfers/external-bank-transfer | Create an external bank transfer
*TransfersApi* | [**transferControllerCreateExternalStablecoinTransfer**](docs/Api/TransfersApi.md#transfercontrollercreateexternalstablecointransfer) | **POST** /api/v0/transfers/external-stablecoin-transfer | Create an external stablecoin transfer
*TransfersApi* | [**transferControllerCreateStablecoinConversion**](docs/Api/TransfersApi.md#transfercontrollercreatestablecoinconversion) | **POST** /api/v0/transfers/stablecoin-conversion | Create a stablecoin conversion
*WalletsApi* | [**walletControllerGetWallets**](docs/Api/WalletsApi.md#walletcontrollergetwallets) | **GET** /api/v0/wallets | Get wallets for an app
*WebhooksApi* | [**webhookControllerCreate**](docs/Api/WebhooksApi.md#webhookcontrollercreate) | **POST** /api/v0/webhooks | Create a new webhook
*WebhooksApi* | [**webhookControllerFindAll**](docs/Api/WebhooksApi.md#webhookcontrollerfindall) | **GET** /api/v0/webhooks | Get all webhooks
*WebhooksApi* | [**webhookControllerFindOne**](docs/Api/WebhooksApi.md#webhookcontrollerfindone) | **GET** /api/v0/webhooks/{id} | Get a webhook by id
*WebhooksApi* | [**webhookControllerRemove**](docs/Api/WebhooksApi.md#webhookcontrollerremove) | **DELETE** /api/v0/webhooks/{id} | Delete a webhook
*WebhooksApi* | [**webhookControllerUpdate**](docs/Api/WebhooksApi.md#webhookcontrollerupdate) | **PATCH** /api/v0/webhooks/{id} | Update a webhook

## Models

- [AggregatedBalanceResponse](docs/Model/AggregatedBalanceResponse.md)
- [AllBalancesResponse](docs/Model/AllBalancesResponse.md)
- [BridgeFiatPaymentRail](docs/Model/BridgeFiatPaymentRail.md)
- [BridgePaymentRail](docs/Model/BridgePaymentRail.md)
- [CreateBankPaymentIntentDto](docs/Model/CreateBankPaymentIntentDto.md)
- [CreateCustomerDto](docs/Model/CreateCustomerDto.md)
- [CreateDirectBankTransferDto](docs/Model/CreateDirectBankTransferDto.md)
- [CreateDirectWalletTransferDto](docs/Model/CreateDirectWalletTransferDto.md)
- [CreateExternalBankTransferDto](docs/Model/CreateExternalBankTransferDto.md)
- [CreateExternalStablecoinTransferDto](docs/Model/CreateExternalStablecoinTransferDto.md)
- [CreateInvoiceDto](docs/Model/CreateInvoiceDto.md)
- [CreateLiquidationAddressDto](docs/Model/CreateLiquidationAddressDto.md)
- [CreatePaymentLinkDto](docs/Model/CreatePaymentLinkDto.md)
- [CreateStablePaymentIntentDto](docs/Model/CreateStablePaymentIntentDto.md)
- [CreateStablecoinConversionDto](docs/Model/CreateStablecoinConversionDto.md)
- [CreateTaxDto](docs/Model/CreateTaxDto.md)
- [CreateWebhookDto](docs/Model/CreateWebhookDto.md)
- [CustomerStatus](docs/Model/CustomerStatus.md)
- [CustomerType](docs/Model/CustomerType.md)
- [DestinationCurrency](docs/Model/DestinationCurrency.md)
- [ExchangeRateResponseDto](docs/Model/ExchangeRateResponseDto.md)
- [FiatCurrency](docs/Model/FiatCurrency.md)
- [HealthResponseDto](docs/Model/HealthResponseDto.md)
- [InvoiceProductDto](docs/Model/InvoiceProductDto.md)
- [LiquidationAddressResponseDto](docs/Model/LiquidationAddressResponseDto.md)
- [PaymentLinkProductDto](docs/Model/PaymentLinkProductDto.md)
- [PaymentRequestDto](docs/Model/PaymentRequestDto.md)
- [PaymentResponseDto](docs/Model/PaymentResponseDto.md)
- [PublicHealthResponseDto](docs/Model/PublicHealthResponseDto.md)
- [RefundResponseDto](docs/Model/RefundResponseDto.md)
- [StableCoinCurrency](docs/Model/StableCoinCurrency.md)
- [TaxControllerCreate201Response](docs/Model/TaxControllerCreate201Response.md)
- [TaxControllerDeleteWithoutId400Response](docs/Model/TaxControllerDeleteWithoutId400Response.md)
- [TaxControllerUpdateWithoutId400Response](docs/Model/TaxControllerUpdateWithoutId400Response.md)
- [UpdateCustomerDto](docs/Model/UpdateCustomerDto.md)
- [UpdateTaxDto](docs/Model/UpdateTaxDto.md)
- [UpdateWebhookDto](docs/Model/UpdateWebhookDto.md)
- [WebhookResponseDto](docs/Model/WebhookResponseDto.md)

## Authorization

Authentication schemes defined for the API:
### x-client-key

- **Type**: API key
- **API key parameter name**: x-client-key
- **Location**: HTTP header


### x-client-secret

- **Type**: API key
- **API key parameter name**: x-client-secret
- **Location**: HTTP header


### idempotency-key

- **Type**: API key
- **API key parameter name**: idempotency-key
- **Location**: HTTP header


## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author



## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `1.0.0`
    - Generator version: `7.17.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
