# Devdraft\ExchangeRatesApi



All URIs are relative to https://api.devdraft.ai, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**exchangeRateControllerGetEURToUSDRate()**](ExchangeRatesApi.md#exchangeRateControllerGetEURToUSDRate) | **GET** /api/v0/exchange-rate/eur-to-usd | Get EUR to USD exchange rate |
| [**exchangeRateControllerGetExchangeRate()**](ExchangeRatesApi.md#exchangeRateControllerGetExchangeRate) | **GET** /api/v0/exchange-rate | Get exchange rate between specified currencies |
| [**exchangeRateControllerGetUSDToEURRate()**](ExchangeRatesApi.md#exchangeRateControllerGetUSDToEURRate) | **GET** /api/v0/exchange-rate/usd-to-eur | Get USD to EUR exchange rate |


## `exchangeRateControllerGetEURToUSDRate()`

```php
exchangeRateControllerGetEURToUSDRate(): \Devdraft\Model\ExchangeRateResponseDto
```

Get EUR to USD exchange rate

Retrieves the current exchange rate for converting EUR to USD (EURC to USDC).      This endpoint provides real-time exchange rate information for stablecoin conversions: - Mid-market rate for reference pricing - Buy rate for actual conversion calculations - Sell rate for reverse conversion scenarios  ## Use Cases - Display current exchange rates in dashboards - Calculate conversion amounts for EURC to USDC transfers - Financial reporting and analytics - Real-time pricing for multi-currency operations  ## Rate Information - **Mid-market rate**: The theoretical middle rate between buy and sell - **Buy rate**: Rate used when converting FROM EUR TO USD (what you get) - **Sell rate**: Rate used when converting FROM USD TO EUR (what you pay)  The rates are updated in real-time and reflect current market conditions.

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


$apiInstance = new Devdraft\Api\ExchangeRatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->exchangeRateControllerGetEURToUSDRate();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ExchangeRatesApi->exchangeRateControllerGetEURToUSDRate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Devdraft\Model\ExchangeRateResponseDto**](../Model/ExchangeRateResponseDto.md)

### Authorization

[x-client-secret](../../README.md#x-client-secret), [x-client-key](../../README.md#x-client-key)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `exchangeRateControllerGetExchangeRate()`

```php
exchangeRateControllerGetExchangeRate($from, $to): \Devdraft\Model\ExchangeRateResponseDto
```

Get exchange rate between specified currencies

Retrieves the current exchange rate between two specified currencies.      This flexible endpoint allows you to get exchange rates for any supported currency pair: - Supports USD and EUR currency codes - Provides comprehensive rate information - Real-time market data  ## Supported Currency Pairs - USD to EUR (USDC to EURC) - EUR to USD (EURC to USDC)  ## Query Parameters - **from**: Source currency code (usd, eur) - **to**: Target currency code (usd, eur)  ## Use Cases - Flexible exchange rate queries - Multi-currency application support - Dynamic currency conversion calculations - Financial analytics and reporting  ## Rate Information All rates are provided with full market context including mid-market, buy, and sell rates.

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


$apiInstance = new Devdraft\Api\ExchangeRatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$from = usd; // string | Source currency code (e.g., usd)
$to = eur; // string | Target currency code (e.g., eur)

try {
    $result = $apiInstance->exchangeRateControllerGetExchangeRate($from, $to);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ExchangeRatesApi->exchangeRateControllerGetExchangeRate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **string**| Source currency code (e.g., usd) | |
| **to** | **string**| Target currency code (e.g., eur) | |

### Return type

[**\Devdraft\Model\ExchangeRateResponseDto**](../Model/ExchangeRateResponseDto.md)

### Authorization

[x-client-secret](../../README.md#x-client-secret), [x-client-key](../../README.md#x-client-key)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `exchangeRateControllerGetUSDToEURRate()`

```php
exchangeRateControllerGetUSDToEURRate(): \Devdraft\Model\ExchangeRateResponseDto
```

Get USD to EUR exchange rate

Retrieves the current exchange rate for converting USD to EUR (USDC to EURC).      This endpoint provides real-time exchange rate information for stablecoin conversions: - Mid-market rate for reference pricing - Buy rate for actual conversion calculations - Sell rate for reverse conversion scenarios  ## Use Cases - Display current exchange rates in dashboards - Calculate conversion amounts for USDC to EURC transfers - Financial reporting and analytics - Real-time pricing for multi-currency operations  ## Rate Information - **Mid-market rate**: The theoretical middle rate between buy and sell - **Buy rate**: Rate used when converting FROM USD TO EUR (what you get) - **Sell rate**: Rate used when converting FROM EUR TO USD (what you pay)  The rates are updated in real-time and reflect current market conditions.

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


$apiInstance = new Devdraft\Api\ExchangeRatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->exchangeRateControllerGetUSDToEURRate();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ExchangeRatesApi->exchangeRateControllerGetUSDToEURRate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Devdraft\Model\ExchangeRateResponseDto**](../Model/ExchangeRateResponseDto.md)

### Authorization

[x-client-secret](../../README.md#x-client-secret), [x-client-key](../../README.md#x-client-key)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
