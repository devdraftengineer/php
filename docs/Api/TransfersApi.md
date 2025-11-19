# Devdraft\TransfersApi



All URIs are relative to https://api.devdraft.ai, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**transferControllerCreateDirectBankTransfer()**](TransfersApi.md#transferControllerCreateDirectBankTransfer) | **POST** /api/v0/transfers/direct-bank | Create a direct bank transfer |
| [**transferControllerCreateDirectWalletTransfer()**](TransfersApi.md#transferControllerCreateDirectWalletTransfer) | **POST** /api/v0/transfers/direct-wallet | Create a direct wallet transfer |
| [**transferControllerCreateExternalBankTransfer()**](TransfersApi.md#transferControllerCreateExternalBankTransfer) | **POST** /api/v0/transfers/external-bank-transfer | Create an external bank transfer |
| [**transferControllerCreateExternalStablecoinTransfer()**](TransfersApi.md#transferControllerCreateExternalStablecoinTransfer) | **POST** /api/v0/transfers/external-stablecoin-transfer | Create an external stablecoin transfer |
| [**transferControllerCreateStablecoinConversion()**](TransfersApi.md#transferControllerCreateStablecoinConversion) | **POST** /api/v0/transfers/stablecoin-conversion | Create a stablecoin conversion |


## `transferControllerCreateDirectBankTransfer()`

```php
transferControllerCreateDirectBankTransfer($create_direct_bank_transfer_dto)
```

Create a direct bank transfer

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


$apiInstance = new Devdraft\Api\TransfersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_direct_bank_transfer_dto = new \Devdraft\Model\CreateDirectBankTransferDto(); // \Devdraft\Model\CreateDirectBankTransferDto

try {
    $apiInstance->transferControllerCreateDirectBankTransfer($create_direct_bank_transfer_dto);
} catch (Exception $e) {
    echo 'Exception when calling TransfersApi->transferControllerCreateDirectBankTransfer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_direct_bank_transfer_dto** | [**\Devdraft\Model\CreateDirectBankTransferDto**](../Model/CreateDirectBankTransferDto.md)|  | |

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

## `transferControllerCreateDirectWalletTransfer()`

```php
transferControllerCreateDirectWalletTransfer($create_direct_wallet_transfer_dto)
```

Create a direct wallet transfer

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


$apiInstance = new Devdraft\Api\TransfersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_direct_wallet_transfer_dto = new \Devdraft\Model\CreateDirectWalletTransferDto(); // \Devdraft\Model\CreateDirectWalletTransferDto

try {
    $apiInstance->transferControllerCreateDirectWalletTransfer($create_direct_wallet_transfer_dto);
} catch (Exception $e) {
    echo 'Exception when calling TransfersApi->transferControllerCreateDirectWalletTransfer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_direct_wallet_transfer_dto** | [**\Devdraft\Model\CreateDirectWalletTransferDto**](../Model/CreateDirectWalletTransferDto.md)|  | |

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

## `transferControllerCreateExternalBankTransfer()`

```php
transferControllerCreateExternalBankTransfer($create_external_bank_transfer_dto)
```

Create an external bank transfer

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


$apiInstance = new Devdraft\Api\TransfersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_external_bank_transfer_dto = new \Devdraft\Model\CreateExternalBankTransferDto(); // \Devdraft\Model\CreateExternalBankTransferDto

try {
    $apiInstance->transferControllerCreateExternalBankTransfer($create_external_bank_transfer_dto);
} catch (Exception $e) {
    echo 'Exception when calling TransfersApi->transferControllerCreateExternalBankTransfer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_external_bank_transfer_dto** | [**\Devdraft\Model\CreateExternalBankTransferDto**](../Model/CreateExternalBankTransferDto.md)|  | |

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

## `transferControllerCreateExternalStablecoinTransfer()`

```php
transferControllerCreateExternalStablecoinTransfer($create_external_stablecoin_transfer_dto)
```

Create an external stablecoin transfer

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


$apiInstance = new Devdraft\Api\TransfersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_external_stablecoin_transfer_dto = new \Devdraft\Model\CreateExternalStablecoinTransferDto(); // \Devdraft\Model\CreateExternalStablecoinTransferDto

try {
    $apiInstance->transferControllerCreateExternalStablecoinTransfer($create_external_stablecoin_transfer_dto);
} catch (Exception $e) {
    echo 'Exception when calling TransfersApi->transferControllerCreateExternalStablecoinTransfer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_external_stablecoin_transfer_dto** | [**\Devdraft\Model\CreateExternalStablecoinTransferDto**](../Model/CreateExternalStablecoinTransferDto.md)|  | |

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

## `transferControllerCreateStablecoinConversion()`

```php
transferControllerCreateStablecoinConversion($create_stablecoin_conversion_dto)
```

Create a stablecoin conversion

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


$apiInstance = new Devdraft\Api\TransfersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_stablecoin_conversion_dto = new \Devdraft\Model\CreateStablecoinConversionDto(); // \Devdraft\Model\CreateStablecoinConversionDto

try {
    $apiInstance->transferControllerCreateStablecoinConversion($create_stablecoin_conversion_dto);
} catch (Exception $e) {
    echo 'Exception when calling TransfersApi->transferControllerCreateStablecoinConversion: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_stablecoin_conversion_dto** | [**\Devdraft\Model\CreateStablecoinConversionDto**](../Model/CreateStablecoinConversionDto.md)|  | |

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
