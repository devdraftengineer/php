# Devdraft\APIHealthApi



All URIs are relative to https://api.devdraft.ai, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**healthControllerCheckV0()**](APIHealthApi.md#healthControllerCheckV0) | **GET** /api/v0/health | Authenticated health check endpoint |
| [**healthControllerPublicHealthCheckV0()**](APIHealthApi.md#healthControllerPublicHealthCheckV0) | **GET** /api/v0/health/public | Public health check endpoint |


## `healthControllerCheckV0()`

```php
healthControllerCheckV0(): \Devdraft\Model\HealthResponseDto
```

Authenticated health check endpoint

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

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Devdraft\Model\HealthResponseDto**](../Model/HealthResponseDto.md)

### Authorization

[x-client-secret](../../README.md#x-client-secret), [x-client-key](../../README.md#x-client-key)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `healthControllerPublicHealthCheckV0()`

```php
healthControllerPublicHealthCheckV0(): \Devdraft\Model\PublicHealthResponseDto
```

Public health check endpoint

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Devdraft\Api\APIHealthApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->healthControllerPublicHealthCheckV0();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling APIHealthApi->healthControllerPublicHealthCheckV0: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Devdraft\Model\PublicHealthResponseDto**](../Model/PublicHealthResponseDto.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
