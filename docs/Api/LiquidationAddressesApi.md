# Devdraft\LiquidationAddressesApi



All URIs are relative to https://api.devdraft.ai, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**liquidationAddressControllerCreateLiquidationAddress()**](LiquidationAddressesApi.md#liquidationAddressControllerCreateLiquidationAddress) | **POST** /api/v0/customers/{customerId}/liquidation_addresses | Create a new liquidation address for a customer |
| [**liquidationAddressControllerGetLiquidationAddress()**](LiquidationAddressesApi.md#liquidationAddressControllerGetLiquidationAddress) | **GET** /api/v0/customers/{customerId}/liquidation_addresses/{liquidationAddressId} | Get a specific liquidation address |
| [**liquidationAddressControllerGetLiquidationAddresses()**](LiquidationAddressesApi.md#liquidationAddressControllerGetLiquidationAddresses) | **GET** /api/v0/customers/{customerId}/liquidation_addresses | Get all liquidation addresses for a customer |


## `liquidationAddressControllerCreateLiquidationAddress()`

```php
liquidationAddressControllerCreateLiquidationAddress($customer_id, $create_liquidation_address_dto): \Devdraft\Model\LiquidationAddressResponseDto
```

Create a new liquidation address for a customer

Create a new liquidation address for a customer. Liquidation addresses allow        customers to automatically liquidate cryptocurrency holdings to fiat or other        stablecoins based on configured parameters.        **Required fields:**       - chain: Blockchain network (ethereum, polygon, arbitrum, base)       - currency: Stablecoin currency (usdc, eurc, dai, pyusd, usdt)       - address: Valid blockchain address        **At least one destination must be specified:**       - external_account_id: External bank account       - prefunded_account_id: Developer's prefunded account       - bridge_wallet_id: Bridge wallet       - destination_address: Crypto wallet address        **Payment Rails:**       Different payment rails have different requirements:       - ACH: Requires external_account_id, supports destination_ach_reference       - SEPA: Requires external_account_id, supports destination_sepa_reference       - Wire: Requires external_account_id, supports destination_wire_message       - Crypto: Requires destination_address, supports destination_blockchain_memo

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Devdraft\Api\LiquidationAddressesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$customer_id = cust_123; // string | Unique identifier for the customer
$create_liquidation_address_dto = new \Devdraft\Model\CreateLiquidationAddressDto(); // \Devdraft\Model\CreateLiquidationAddressDto

try {
    $result = $apiInstance->liquidationAddressControllerCreateLiquidationAddress($customer_id, $create_liquidation_address_dto);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LiquidationAddressesApi->liquidationAddressControllerCreateLiquidationAddress: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**| Unique identifier for the customer | |
| **create_liquidation_address_dto** | [**\Devdraft\Model\CreateLiquidationAddressDto**](../Model/CreateLiquidationAddressDto.md)|  | |

### Return type

[**\Devdraft\Model\LiquidationAddressResponseDto**](../Model/LiquidationAddressResponseDto.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `liquidationAddressControllerGetLiquidationAddress()`

```php
liquidationAddressControllerGetLiquidationAddress($customer_id, $liquidation_address_id): \Devdraft\Model\LiquidationAddressResponseDto
```

Get a specific liquidation address

Retrieve a specific liquidation address by its ID for a given customer.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Devdraft\Api\LiquidationAddressesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$customer_id = cust_123; // string | Unique identifier for the customer
$liquidation_address_id = la_generated_id_123; // string | Unique identifier for the liquidation address

try {
    $result = $apiInstance->liquidationAddressControllerGetLiquidationAddress($customer_id, $liquidation_address_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LiquidationAddressesApi->liquidationAddressControllerGetLiquidationAddress: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**| Unique identifier for the customer | |
| **liquidation_address_id** | **string**| Unique identifier for the liquidation address | |

### Return type

[**\Devdraft\Model\LiquidationAddressResponseDto**](../Model/LiquidationAddressResponseDto.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `liquidationAddressControllerGetLiquidationAddresses()`

```php
liquidationAddressControllerGetLiquidationAddresses($customer_id): \Devdraft\Model\LiquidationAddressResponseDto[]
```

Get all liquidation addresses for a customer

Retrieve all liquidation addresses associated with a specific customer.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new Devdraft\Api\LiquidationAddressesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$customer_id = cust_123; // string | Unique identifier for the customer

try {
    $result = $apiInstance->liquidationAddressControllerGetLiquidationAddresses($customer_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LiquidationAddressesApi->liquidationAddressControllerGetLiquidationAddresses: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **customer_id** | **string**| Unique identifier for the customer | |

### Return type

[**\Devdraft\Model\LiquidationAddressResponseDto[]**](../Model/LiquidationAddressResponseDto.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
