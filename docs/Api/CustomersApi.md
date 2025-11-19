# Devdraft\CustomersApi



All URIs are relative to https://api.devdraft.ai, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**customerControllerCreate()**](CustomersApi.md#customerControllerCreate) | **POST** /api/v0/customers | Create a new customer |
| [**customerControllerFindAll()**](CustomersApi.md#customerControllerFindAll) | **GET** /api/v0/customers | Get all customers with filters |
| [**customerControllerFindOne()**](CustomersApi.md#customerControllerFindOne) | **GET** /api/v0/customers/{id} | Get a customer by ID |
| [**customerControllerUpdate()**](CustomersApi.md#customerControllerUpdate) | **PATCH** /api/v0/customers/{id} | Update a customer |


## `customerControllerCreate()`

```php
customerControllerCreate($create_customer_dto)
```

Create a new customer

Creates a new customer in the system with their personal and contact information.      This endpoint allows you to register new customers and store their details for future transactions.  ## Use Cases - Register new customers for payment processing - Store customer information for recurring payments - Maintain customer profiles for transaction history  ## Example: Create New Customer ```json {   \"first_name\": \"John\",   \"last_name\": \"Doe\",   \"email\": \"john.doe@example.com\",   \"phone_number\": \"+1-555-123-4567\",   \"customer_type\": \"Startup\",   \"status\": \"ACTIVE\" } ```  ## Required Fields - `first_name`: Customer's first name (1-100 characters) - `last_name`: Customer's last name (1-100 characters) - `phone_number`: Customer's phone number (max 20 characters)  ## Optional Fields - `email`: Valid email address (max 255 characters) - `customer_type`: Type of customer account (Individual, Startup, Small Business, Medium Business, Enterprise, Non-Profit, Government) - `status`: Customer status (ACTIVE, BLACKLISTED, DEACTIVATED)

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


$apiInstance = new Devdraft\Api\CustomersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_customer_dto = new \Devdraft\Model\CreateCustomerDto(); // \Devdraft\Model\CreateCustomerDto | Customer creation data

try {
    $apiInstance->customerControllerCreate($create_customer_dto);
} catch (Exception $e) {
    echo 'Exception when calling CustomersApi->customerControllerCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_customer_dto** | [**\Devdraft\Model\CreateCustomerDto**](../Model/CreateCustomerDto.md)| Customer creation data | |

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

## `customerControllerFindAll()`

```php
customerControllerFindAll($skip, $take, $status, $name, $email)
```

Get all customers with filters

Retrieves a list of customers with optional filtering and pagination.      This endpoint allows you to search and filter customers based on various criteria.  ## Use Cases - List all customers with pagination - Search customers by name or email - Filter customers by status - Export customer data  ## Query Parameters - `skip`: Number of records to skip (default: 0, min: 0) - `take`: Number of records to take (default: 10, min: 1, max: 100) - `status`: Filter by customer status (ACTIVE, BLACKLISTED, DEACTIVATED) - `name`: Filter by customer name (partial match, case-insensitive) - `email`: Filter by customer email (exact match, case-insensitive)  ## Example Request `GET /api/v0/customers?skip=0&take=20&status=ACTIVE&name=John`  ## Example Response ```json {   \"data\": [     {       \"id\": \"cust_123456\",       \"first_name\": \"John\",       \"last_name\": \"Doe\",       \"email\": \"john.doe@example.com\",       \"phone_number\": \"+1-555-123-4567\",       \"customer_type\": \"Startup\",       \"status\": \"ACTIVE\",       \"created_at\": \"2024-03-20T10:00:00Z\",       \"updated_at\": \"2024-03-20T10:00:00Z\"     }   ],   \"total\": 100,   \"skip\": 0,   \"take\": 10 } ```

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


$apiInstance = new Devdraft\Api\CustomersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$skip = 0; // float | Number of records to skip for pagination
$take = 10; // float | Number of records to return (max 100)
$status = new \Devdraft\Model\\Devdraft\Model\CustomerStatus(); // \Devdraft\Model\CustomerStatus | Filter customers by status
$name = John; // string | Filter customers by name (partial match, case-insensitive)
$email = john.doe@example.com; // string | Filter customers by email (exact match, case-insensitive)

try {
    $apiInstance->customerControllerFindAll($skip, $take, $status, $name, $email);
} catch (Exception $e) {
    echo 'Exception when calling CustomersApi->customerControllerFindAll: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **skip** | **float**| Number of records to skip for pagination | [optional] [default to 0] |
| **take** | **float**| Number of records to return (max 100) | [optional] [default to 10] |
| **status** | [**\Devdraft\Model\CustomerStatus**](../Model/.md)| Filter customers by status | [optional] |
| **name** | **string**| Filter customers by name (partial match, case-insensitive) | [optional] |
| **email** | **string**| Filter customers by email (exact match, case-insensitive) | [optional] |

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

## `customerControllerFindOne()`

```php
customerControllerFindOne($id)
```

Get a customer by ID

Retrieves detailed information about a specific customer.      This endpoint allows you to fetch complete customer details including their contact information and status.  ## Use Cases - View customer details - Verify customer information - Check customer status before processing payments  ## Path Parameters - `id`: Customer UUID (required) - Must be a valid UUID format  ## Example Request `GET /api/v0/customers/123e4567-e89b-12d3-a456-426614174000`  ## Example Response ```json {   \"id\": \"cust_123456\",   \"first_name\": \"John\",   \"last_name\": \"Doe\",   \"email\": \"john.doe@example.com\",   \"phone_number\": \"+1-555-123-4567\",   \"customer_type\": \"Enterprise\",   \"status\": \"ACTIVE\",   \"last_spent\": 1250.50,   \"last_purchase_date\": \"2024-03-15T14:30:00Z\",   \"created_at\": \"2024-03-20T10:00:00Z\",   \"updated_at\": \"2024-03-20T10:00:00Z\" } ```

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


$apiInstance = new Devdraft\Api\CustomersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Customer unique identifier (UUID)

try {
    $apiInstance->customerControllerFindOne($id);
} catch (Exception $e) {
    echo 'Exception when calling CustomersApi->customerControllerFindOne: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Customer unique identifier (UUID) | |

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

## `customerControllerUpdate()`

```php
customerControllerUpdate($id, $update_customer_dto)
```

Update a customer

Updates an existing customer's information.      This endpoint allows you to modify customer details while preserving their core information.  ## Use Cases - Update customer contact information - Change customer type - Modify customer status  ## Path Parameters - `id`: Customer UUID (required) - Must be a valid UUID format  ## Example Request `PATCH /api/v0/customers/123e4567-e89b-12d3-a456-426614174000`  ## Example Request Body ```json {   \"first_name\": \"John\",   \"last_name\": \"Smith\",   \"phone_number\": \"+1-987-654-3210\",   \"customer_type\": \"Small Business\" } ```  ## Notes - Only include fields that need to be updated - All fields are optional in updates - Status changes may require additional verification

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


$apiInstance = new Devdraft\Api\CustomersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Customer unique identifier (UUID)
$update_customer_dto = new \Devdraft\Model\UpdateCustomerDto(); // \Devdraft\Model\UpdateCustomerDto | Customer update data

try {
    $apiInstance->customerControllerUpdate($id, $update_customer_dto);
} catch (Exception $e) {
    echo 'Exception when calling CustomersApi->customerControllerUpdate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Customer unique identifier (UUID) | |
| **update_customer_dto** | [**\Devdraft\Model\UpdateCustomerDto**](../Model/UpdateCustomerDto.md)| Customer update data | |

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
