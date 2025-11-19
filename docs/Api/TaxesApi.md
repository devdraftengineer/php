# Devdraft\TaxesApi



All URIs are relative to https://api.devdraft.ai, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**taxControllerCreate()**](TaxesApi.md#taxControllerCreate) | **POST** /api/v0/taxes | Create a new tax |
| [**taxControllerDeleteWithoutId()**](TaxesApi.md#taxControllerDeleteWithoutId) | **DELETE** /api/v0/taxes | Tax ID required for deletion |
| [**taxControllerFindAll()**](TaxesApi.md#taxControllerFindAll) | **GET** /api/v0/taxes | Get all taxes with filters |
| [**taxControllerFindOne()**](TaxesApi.md#taxControllerFindOne) | **GET** /api/v0/taxes/{id} | Get a tax by ID |
| [**taxControllerRemove()**](TaxesApi.md#taxControllerRemove) | **DELETE** /api/v0/taxes/{id} | Delete a tax |
| [**taxControllerUpdate()**](TaxesApi.md#taxControllerUpdate) | **PUT** /api/v0/taxes/{id} | Update a tax |
| [**taxControllerUpdateWithoutId()**](TaxesApi.md#taxControllerUpdateWithoutId) | **PUT** /api/v0/taxes | Tax ID required for updates |


## `taxControllerCreate()`

```php
taxControllerCreate($create_tax_dto): \Devdraft\Model\TaxControllerCreate201Response
```

Create a new tax

Creates a new tax rate that can be applied to products, invoices, and payment links.  ## Use Cases - Set up sales tax for different regions - Create VAT rates for international customers - Configure state and local tax rates - Manage tax compliance requirements  ## Example: Create Basic Sales Tax ```json {   \"name\": \"Sales Tax\",   \"description\": \"Standard sales tax for retail transactions\",   \"percentage\": 8.5,   \"active\": true } ```  ## Required Fields - `name`: Tax name for identification (1-100 characters) - `percentage`: Tax rate percentage (0-100)  ## Optional Fields - `description`: Explanation of what this tax covers (max 255 characters) - `active`: Whether this tax is currently active (default: true) - `appIds`: Array of app IDs where this tax should be available

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


$apiInstance = new Devdraft\Api\TaxesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_tax_dto = new \Devdraft\Model\CreateTaxDto(); // \Devdraft\Model\CreateTaxDto | Tax creation data

try {
    $result = $apiInstance->taxControllerCreate($create_tax_dto);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TaxesApi->taxControllerCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_tax_dto** | [**\Devdraft\Model\CreateTaxDto**](../Model/CreateTaxDto.md)| Tax creation data | |

### Return type

[**\Devdraft\Model\TaxControllerCreate201Response**](../Model/TaxControllerCreate201Response.md)

### Authorization

[x-client-secret](../../README.md#x-client-secret), [x-client-key](../../README.md#x-client-key)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `taxControllerDeleteWithoutId()`

```php
taxControllerDeleteWithoutId()
```

Tax ID required for deletion

This endpoint requires a tax ID in the URL path. Use DELETE /api/v0/taxes/{id} instead.

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


$apiInstance = new Devdraft\Api\TaxesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $apiInstance->taxControllerDeleteWithoutId();
} catch (Exception $e) {
    echo 'Exception when calling TaxesApi->taxControllerDeleteWithoutId: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

void (empty response body)

### Authorization

[x-client-secret](../../README.md#x-client-secret), [x-client-key](../../README.md#x-client-key)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `taxControllerFindAll()`

```php
taxControllerFindAll($skip, $take, $name, $active)
```

Get all taxes with filters

Retrieves a list of taxes with optional filtering and pagination.  ## Use Cases - List all available tax rates - Search taxes by name - Filter active/inactive taxes - Export tax configuration  ## Query Parameters - `skip`: Number of records to skip (default: 0, min: 0) - `take`: Number of records to return (default: 10, min: 1, max: 100) - `name`: Filter taxes by name (partial match, case-insensitive) - `active`: Filter by active status (true/false)  ## Example Request `GET /api/v0/taxes?skip=0&take=20&active=true&name=Sales`  ## Example Response ```json [   {     \"id\": \"tax_123456\",     \"name\": \"Sales Tax\",     \"description\": \"Standard sales tax for retail transactions\",     \"percentage\": 8.5,     \"active\": true,     \"created_at\": \"2024-03-20T10:00:00Z\",     \"updated_at\": \"2024-03-20T10:00:00Z\"   } ] ```

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


$apiInstance = new Devdraft\Api\TaxesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$skip = 0; // float | Number of records to skip for pagination
$take = 10; // float | Number of records to return (max 100)
$name = Sales; // string | Filter taxes by name (partial match, case-insensitive)
$active = true; // bool | Filter by active status

try {
    $apiInstance->taxControllerFindAll($skip, $take, $name, $active);
} catch (Exception $e) {
    echo 'Exception when calling TaxesApi->taxControllerFindAll: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **skip** | **float**| Number of records to skip for pagination | [optional] [default to 0] |
| **take** | **float**| Number of records to return (max 100) | [optional] [default to 10] |
| **name** | **string**| Filter taxes by name (partial match, case-insensitive) | [optional] |
| **active** | **bool**| Filter by active status | [optional] |

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

## `taxControllerFindOne()`

```php
taxControllerFindOne($id)
```

Get a tax by ID

Retrieves detailed information about a specific tax.  ## Use Cases - View tax details - Verify tax configuration - Check tax status before applying to products  ## Path Parameters - `id`: Tax UUID (required) - Must be a valid UUID format  ## Example Request `GET /api/v0/taxes/123e4567-e89b-12d3-a456-426614174000`  ## Example Response ```json {   \"id\": \"tax_123456\",   \"name\": \"Sales Tax\",   \"description\": \"Standard sales tax for retail transactions\",   \"percentage\": 8.5,   \"active\": true,   \"created_at\": \"2024-03-20T10:00:00Z\",   \"updated_at\": \"2024-03-20T10:00:00Z\" } ```

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


$apiInstance = new Devdraft\Api\TaxesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Tax unique identifier (UUID)

try {
    $apiInstance->taxControllerFindOne($id);
} catch (Exception $e) {
    echo 'Exception when calling TaxesApi->taxControllerFindOne: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Tax unique identifier (UUID) | |

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

## `taxControllerRemove()`

```php
taxControllerRemove($id)
```

Delete a tax

Deletes an existing tax.  ## Use Cases - Remove obsolete tax rates - Clean up unused taxes - Comply with regulatory changes  ## Path Parameters - `id`: Tax UUID (required) - Must be a valid UUID format  ## Example Request `DELETE /api/v0/taxes/123e4567-e89b-12d3-a456-426614174000`  ## Warning This action cannot be undone. Consider deactivating the tax instead of deleting it if it has been used in transactions.

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


$apiInstance = new Devdraft\Api\TaxesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Tax unique identifier (UUID)

try {
    $apiInstance->taxControllerRemove($id);
} catch (Exception $e) {
    echo 'Exception when calling TaxesApi->taxControllerRemove: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Tax unique identifier (UUID) | |

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

## `taxControllerUpdate()`

```php
taxControllerUpdate($id, $update_tax_dto)
```

Update a tax

Updates an existing tax's information.  ## Use Cases - Modify tax percentage rates - Update tax descriptions - Activate/deactivate taxes - Change tax names  ## Path Parameters - `id`: Tax UUID (required) - Must be a valid UUID format  ## Example Request `PUT /api/v0/taxes/123e4567-e89b-12d3-a456-426614174000`  ## Example Request Body ```json {   \"name\": \"Updated Sales Tax\",   \"description\": \"Updated sales tax rate\",   \"percentage\": 9.0,   \"active\": true } ```  ## Notes - Only include fields that need to be updated - All fields are optional in updates - Percentage changes affect future calculations only

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


$apiInstance = new Devdraft\Api\TaxesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Tax unique identifier (UUID)
$update_tax_dto = new \Devdraft\Model\UpdateTaxDto(); // \Devdraft\Model\UpdateTaxDto | Tax update data - only include fields you want to update

try {
    $apiInstance->taxControllerUpdate($id, $update_tax_dto);
} catch (Exception $e) {
    echo 'Exception when calling TaxesApi->taxControllerUpdate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Tax unique identifier (UUID) | |
| **update_tax_dto** | [**\Devdraft\Model\UpdateTaxDto**](../Model/UpdateTaxDto.md)| Tax update data - only include fields you want to update | |

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

## `taxControllerUpdateWithoutId()`

```php
taxControllerUpdateWithoutId()
```

Tax ID required for updates

This endpoint requires a tax ID in the URL path. Use PUT /api/v0/taxes/{id} instead.

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


$apiInstance = new Devdraft\Api\TaxesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $apiInstance->taxControllerUpdateWithoutId();
} catch (Exception $e) {
    echo 'Exception when calling TaxesApi->taxControllerUpdateWithoutId: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

void (empty response body)

### Authorization

[x-client-secret](../../README.md#x-client-secret), [x-client-key](../../README.md#x-client-key)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
