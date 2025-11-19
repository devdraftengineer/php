# Devdraft\WebhooksApi



All URIs are relative to https://api.devdraft.ai, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**webhookControllerCreate()**](WebhooksApi.md#webhookControllerCreate) | **POST** /api/v0/webhooks | Create a new webhook |
| [**webhookControllerFindAll()**](WebhooksApi.md#webhookControllerFindAll) | **GET** /api/v0/webhooks | Get all webhooks |
| [**webhookControllerFindOne()**](WebhooksApi.md#webhookControllerFindOne) | **GET** /api/v0/webhooks/{id} | Get a webhook by id |
| [**webhookControllerRemove()**](WebhooksApi.md#webhookControllerRemove) | **DELETE** /api/v0/webhooks/{id} | Delete a webhook |
| [**webhookControllerUpdate()**](WebhooksApi.md#webhookControllerUpdate) | **PATCH** /api/v0/webhooks/{id} | Update a webhook |


## `webhookControllerCreate()`

```php
webhookControllerCreate($create_webhook_dto): \Devdraft\Model\WebhookResponseDto
```

Create a new webhook

Creates a new webhook endpoint for receiving event notifications. Requires webhook:create scope.

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


$apiInstance = new Devdraft\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_webhook_dto = new \Devdraft\Model\CreateWebhookDto(); // \Devdraft\Model\CreateWebhookDto | Webhook configuration details

try {
    $result = $apiInstance->webhookControllerCreate($create_webhook_dto);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhookControllerCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_webhook_dto** | [**\Devdraft\Model\CreateWebhookDto**](../Model/CreateWebhookDto.md)| Webhook configuration details | |

### Return type

[**\Devdraft\Model\WebhookResponseDto**](../Model/WebhookResponseDto.md)

### Authorization

[x-client-secret](../../README.md#x-client-secret), [x-client-key](../../README.md#x-client-key)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhookControllerFindAll()`

```php
webhookControllerFindAll($skip, $take): \Devdraft\Model\WebhookResponseDto[]
```

Get all webhooks

Retrieves a list of all webhooks for your application. Requires webhook:read scope.

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


$apiInstance = new Devdraft\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$skip = 3.4; // float | Number of records to skip (default: 0)
$take = 3.4; // float | Number of records to return (default: 10)

try {
    $result = $apiInstance->webhookControllerFindAll($skip, $take);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhookControllerFindAll: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **skip** | **float**| Number of records to skip (default: 0) | [optional] |
| **take** | **float**| Number of records to return (default: 10) | [optional] |

### Return type

[**\Devdraft\Model\WebhookResponseDto[]**](../Model/WebhookResponseDto.md)

### Authorization

[x-client-secret](../../README.md#x-client-secret), [x-client-key](../../README.md#x-client-key)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhookControllerFindOne()`

```php
webhookControllerFindOne($id): \Devdraft\Model\WebhookResponseDto
```

Get a webhook by id

Retrieves details for a specific webhook. Requires webhook:read scope.

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


$apiInstance = new Devdraft\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Webhook unique identifier (UUID)

try {
    $result = $apiInstance->webhookControllerFindOne($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhookControllerFindOne: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Webhook unique identifier (UUID) | |

### Return type

[**\Devdraft\Model\WebhookResponseDto**](../Model/WebhookResponseDto.md)

### Authorization

[x-client-secret](../../README.md#x-client-secret), [x-client-key](../../README.md#x-client-key)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhookControllerRemove()`

```php
webhookControllerRemove($id): \Devdraft\Model\WebhookResponseDto
```

Delete a webhook

Deletes a webhook configuration. Requires webhook:delete scope.

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


$apiInstance = new Devdraft\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Webhook unique identifier (UUID)

try {
    $result = $apiInstance->webhookControllerRemove($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhookControllerRemove: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Webhook unique identifier (UUID) | |

### Return type

[**\Devdraft\Model\WebhookResponseDto**](../Model/WebhookResponseDto.md)

### Authorization

[x-client-secret](../../README.md#x-client-secret), [x-client-key](../../README.md#x-client-key)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhookControllerUpdate()`

```php
webhookControllerUpdate($id, $update_webhook_dto): \Devdraft\Model\WebhookResponseDto
```

Update a webhook

Updates an existing webhook configuration. Requires webhook:update scope.

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


$apiInstance = new Devdraft\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Webhook unique identifier (UUID)
$update_webhook_dto = new \Devdraft\Model\UpdateWebhookDto(); // \Devdraft\Model\UpdateWebhookDto | Webhook update details

try {
    $result = $apiInstance->webhookControllerUpdate($id, $update_webhook_dto);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhookControllerUpdate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Webhook unique identifier (UUID) | |
| **update_webhook_dto** | [**\Devdraft\Model\UpdateWebhookDto**](../Model/UpdateWebhookDto.md)| Webhook update details | |

### Return type

[**\Devdraft\Model\WebhookResponseDto**](../Model/WebhookResponseDto.md)

### Authorization

[x-client-secret](../../README.md#x-client-secret), [x-client-key](../../README.md#x-client-key)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
