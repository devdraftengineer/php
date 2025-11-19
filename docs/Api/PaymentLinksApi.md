# Devdraft\PaymentLinksApi



All URIs are relative to https://api.devdraft.ai, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**paymentLinksControllerCreate()**](PaymentLinksApi.md#paymentLinksControllerCreate) | **POST** /api/v0/payment-links | Create a new payment link |
| [**paymentLinksControllerFindAll()**](PaymentLinksApi.md#paymentLinksControllerFindAll) | **GET** /api/v0/payment-links | Get all payment links |
| [**paymentLinksControllerFindOne()**](PaymentLinksApi.md#paymentLinksControllerFindOne) | **GET** /api/v0/payment-links/{id} | Get a payment link by ID |
| [**paymentLinksControllerUpdate()**](PaymentLinksApi.md#paymentLinksControllerUpdate) | **PUT** /api/v0/payment-links/{id} | Update a payment link |


## `paymentLinksControllerCreate()`

```php
paymentLinksControllerCreate($create_payment_link_dto)
```

Create a new payment link

Creates a new payment link with the provided details. Supports both simple one-time payments and complex product bundles.

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


$apiInstance = new Devdraft\Api\PaymentLinksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_payment_link_dto = new \Devdraft\Model\CreatePaymentLinkDto(); // \Devdraft\Model\CreatePaymentLinkDto | Payment link creation data

try {
    $apiInstance->paymentLinksControllerCreate($create_payment_link_dto);
} catch (Exception $e) {
    echo 'Exception when calling PaymentLinksApi->paymentLinksControllerCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_payment_link_dto** | [**\Devdraft\Model\CreatePaymentLinkDto**](../Model/CreatePaymentLinkDto.md)| Payment link creation data | |

### Return type

void (empty response body)

### Authorization

[x-client-secret](../../README.md#x-client-secret), [x-client-key](../../README.md#x-client-key)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `paymentLinksControllerFindAll()`

```php
paymentLinksControllerFindAll($skip, $take)
```

Get all payment links

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


$apiInstance = new Devdraft\Api\PaymentLinksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$skip = 'skip_example'; // string | Number of records to skip (must be non-negative)
$take = 'take_example'; // string | Number of records to take (must be positive)

try {
    $apiInstance->paymentLinksControllerFindAll($skip, $take);
} catch (Exception $e) {
    echo 'Exception when calling PaymentLinksApi->paymentLinksControllerFindAll: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **skip** | **string**| Number of records to skip (must be non-negative) | [optional] |
| **take** | **string**| Number of records to take (must be positive) | [optional] |

### Return type

void (empty response body)

### Authorization

[x-client-secret](../../README.md#x-client-secret), [x-client-key](../../README.md#x-client-key)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `paymentLinksControllerFindOne()`

```php
paymentLinksControllerFindOne($id)
```

Get a payment link by ID

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


$apiInstance = new Devdraft\Api\PaymentLinksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Payment Link ID

try {
    $apiInstance->paymentLinksControllerFindOne($id);
} catch (Exception $e) {
    echo 'Exception when calling PaymentLinksApi->paymentLinksControllerFindOne: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Payment Link ID | |

### Return type

void (empty response body)

### Authorization

[x-client-secret](../../README.md#x-client-secret), [x-client-key](../../README.md#x-client-key)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `paymentLinksControllerUpdate()`

```php
paymentLinksControllerUpdate($id, $body)
```

Update a payment link

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


$apiInstance = new Devdraft\Api\PaymentLinksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Payment Link ID
$body = array('key' => new \stdClass); // object

try {
    $apiInstance->paymentLinksControllerUpdate($id, $body);
} catch (Exception $e) {
    echo 'Exception when calling PaymentLinksApi->paymentLinksControllerUpdate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Payment Link ID | |
| **body** | **object**|  | |

### Return type

void (empty response body)

### Authorization

[x-client-secret](../../README.md#x-client-secret), [x-client-key](../../README.md#x-client-key)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
