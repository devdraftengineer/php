# Devdraft\PaymentIntentsApi



All URIs are relative to https://api.devdraft.ai, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**paymentIntentControllerCreateBankPaymentIntent()**](PaymentIntentsApi.md#paymentIntentControllerCreateBankPaymentIntent) | **POST** /api/v0/payment-intents/bank | Create a bank payment intent |
| [**paymentIntentControllerCreateStablePaymentIntent()**](PaymentIntentsApi.md#paymentIntentControllerCreateStablePaymentIntent) | **POST** /api/v0/payment-intents/stablecoin | Create a stable payment intent |


## `paymentIntentControllerCreateBankPaymentIntent()`

```php
paymentIntentControllerCreateBankPaymentIntent($idempotency_key, $create_bank_payment_intent_dto)
```

Create a bank payment intent

Creates a new bank payment intent for fiat-to-stablecoin transfers.      This endpoint allows you to create payment intents for bank transfers (ACH, Wire, SEPA) that convert to stablecoins. Perfect for onboarding users from traditional banking to crypto.  ## Supported Payment Rails - **ACH_PUSH**: US bank transfers (same-day or standard) - **WIRE**: International wire transfers - **SEPA**: European bank transfers  ## Use Cases - USD bank account to USDC conversion - EUR bank account to EURC conversion - MXN bank account to stablecoin conversion - Flexible amount payment intents for variable pricing  ## Supported Source Currencies - **USD**: US Dollar - **EUR**: Euro - **MXN**: Mexican Peso  ## Example: USD Bank to USDC ```json {   \"sourcePaymentRail\": \"ach_push\",   \"sourceCurrency\": \"usd\",   \"destinationCurrency\": \"usdc\",   \"destinationNetwork\": \"ethereum\",   \"destinationAddress\": \"0x742d35Cc6634C0532925a3b8D4C9db96c4b4d8e1\",   \"amount\": \"1000.00\",   \"customer_first_name\": \"John\",   \"customer_last_name\": \"Doe\",   \"customer_email\": \"john.doe@example.com\",   \"ach_reference\": \"INV12345\" } ```  ## Reference Fields Use appropriate reference fields based on the payment rail: - `ach_reference`: For ACH transfers (max 10 chars, alphanumeric + spaces) - `wire_message`: For wire transfers (max 256 chars) - `sepa_reference`: For SEPA transfers (6-140 chars, specific character set)  ## Idempotency Include an `idempotency-key` header with a unique UUID v4 to prevent duplicate payments. Subsequent requests with the same key will return the original response.

### Example

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


$apiInstance = new Devdraft\Api\PaymentIntentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$idempotency_key = 'idempotency_key_example'; // string | Unique UUID v4 for idempotent requests. Prevents duplicate payments.
$create_bank_payment_intent_dto = new \Devdraft\Model\CreateBankPaymentIntentDto(); // \Devdraft\Model\CreateBankPaymentIntentDto | Bank payment intent creation data

try {
    $apiInstance->paymentIntentControllerCreateBankPaymentIntent($idempotency_key, $create_bank_payment_intent_dto);
} catch (Exception $e) {
    echo 'Exception when calling PaymentIntentsApi->paymentIntentControllerCreateBankPaymentIntent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **idempotency_key** | **string**| Unique UUID v4 for idempotent requests. Prevents duplicate payments. | |
| **create_bank_payment_intent_dto** | [**\Devdraft\Model\CreateBankPaymentIntentDto**](../Model/CreateBankPaymentIntentDto.md)| Bank payment intent creation data | |

### Return type

void (empty response body)

### Authorization

[x-client-secret](../../README.md#x-client-secret), [x-client-key](../../README.md#x-client-key)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `paymentIntentControllerCreateStablePaymentIntent()`

```php
paymentIntentControllerCreateStablePaymentIntent($idempotency_key, $create_stable_payment_intent_dto)
```

Create a stable payment intent

Creates a new stable payment intent for stablecoin-to-stablecoin transfers.      This endpoint allows you to create payment intents for transfers between different stablecoins and networks. Perfect for cross-chain stablecoin swaps and conversions.  ## Use Cases - USDC to EURC conversions - Cross-chain stablecoin transfers (e.g., Ethereum USDC to Polygon USDC) - Flexible amount payment intents for dynamic pricing  ## Example: USDC to EURC Conversion ```json {   \"sourceCurrency\": \"usdc\",   \"sourceNetwork\": \"ethereum\",   \"destinationCurrency\": \"eurc\",   \"destinationNetwork\": \"polygon\",   \"destinationAddress\": \"0x742d35Cc6634C0532925a3b8D4C9db96c4b4d8e1\",   \"amount\": \"100.00\",   \"customer_first_name\": \"John\",   \"customer_last_name\": \"Doe\",   \"customer_email\": \"john.doe@example.com\" } ```  ## Flexible Amount Payments Omit the `amount` field to create a flexible payment intent where users can specify the amount during payment.  ## Idempotency Include an `idempotency-key` header with a unique UUID v4 to prevent duplicate payments. Subsequent requests with the same key will return the original response.

### Example

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


$apiInstance = new Devdraft\Api\PaymentIntentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$idempotency_key = 'idempotency_key_example'; // string | Unique UUID v4 for idempotent requests. Prevents duplicate payments.
$create_stable_payment_intent_dto = new \Devdraft\Model\CreateStablePaymentIntentDto(); // \Devdraft\Model\CreateStablePaymentIntentDto | Stable payment intent creation data

try {
    $apiInstance->paymentIntentControllerCreateStablePaymentIntent($idempotency_key, $create_stable_payment_intent_dto);
} catch (Exception $e) {
    echo 'Exception when calling PaymentIntentsApi->paymentIntentControllerCreateStablePaymentIntent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **idempotency_key** | **string**| Unique UUID v4 for idempotent requests. Prevents duplicate payments. | |
| **create_stable_payment_intent_dto** | [**\Devdraft\Model\CreateStablePaymentIntentDto**](../Model/CreateStablePaymentIntentDto.md)| Stable payment intent creation data | |

### Return type

void (empty response body)

### Authorization

[x-client-secret](../../README.md#x-client-secret), [x-client-key](../../README.md#x-client-key)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
