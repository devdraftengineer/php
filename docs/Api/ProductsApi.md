# Devdraft\ProductsApi



All URIs are relative to https://api.devdraft.ai, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**productControllerCreate()**](ProductsApi.md#productControllerCreate) | **POST** /api/v0/products | Create a new product |
| [**productControllerFindAll()**](ProductsApi.md#productControllerFindAll) | **GET** /api/v0/products | Get all products |
| [**productControllerFindOne()**](ProductsApi.md#productControllerFindOne) | **GET** /api/v0/products/{id} | Get a product by ID |
| [**productControllerRemove()**](ProductsApi.md#productControllerRemove) | **DELETE** /api/v0/products/{id} | Delete a product |
| [**productControllerUpdate()**](ProductsApi.md#productControllerUpdate) | **PUT** /api/v0/products/{id} | Update a product |
| [**productControllerUploadImage()**](ProductsApi.md#productControllerUploadImage) | **POST** /api/v0/products/{id}/images | Upload images for a product |


## `productControllerCreate()`

```php
productControllerCreate($name, $description, $price, $currency, $type, $weight, $unit, $quantity, $stock_count, $status, $product_type, $images)
```

Create a new product

Creates a new product with optional image uploads.      This endpoint allows you to create products with detailed information and multiple images.  ## Use Cases - Add new products to your catalog - Create products with multiple images - Set up product pricing and descriptions  ## Supported Image Formats - JPEG/JPG - PNG - WebP - Maximum 10 images per product - Maximum file size: 5MB per image  ## Example Request (multipart/form-data) ``` name: \"Premium Widget\" description: \"High-quality widget for all your needs\" price: \"99.99\" images: [file1.jpg, file2.jpg]  // Optional, up to 10 images ```  ## Required Fields - `name`: Product name - `price`: Product price (decimal number)  ## Optional Fields - `description`: Detailed product description - `images`: Product images (up to 10 files)

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


$apiInstance = new Devdraft\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$name = 'name_example'; // string | Product name as it will appear to customers. Should be clear and descriptive.
$description = 'description_example'; // string | Detailed description of the product. Supports markdown formatting for rich text display.
$price = 3.4; // float | Product price in the specified currency. Must be greater than 0.
$currency = 'USD'; // string | Currency code for the price. Defaults to USD if not specified.
$type = 'type_example'; // string | Product type
$weight = 3.4; // float | Weight of the product
$unit = 'unit_example'; // string | Unit of measurement
$quantity = 3.4; // float | Quantity available
$stock_count = 3.4; // float | Stock count
$status = 'status_example'; // string | Product status
$product_type = 'product_type_example'; // string | Product type
$images = array('images_example'); // string[] | Array of image URLs

try {
    $apiInstance->productControllerCreate($name, $description, $price, $currency, $type, $weight, $unit, $quantity, $stock_count, $status, $product_type, $images);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->productControllerCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **name** | **string**| Product name as it will appear to customers. Should be clear and descriptive. | |
| **description** | **string**| Detailed description of the product. Supports markdown formatting for rich text display. | |
| **price** | **float**| Product price in the specified currency. Must be greater than 0. | |
| **currency** | **string**| Currency code for the price. Defaults to USD if not specified. | [optional] [default to &#39;USD&#39;] |
| **type** | **string**| Product type | [optional] |
| **weight** | **float**| Weight of the product | [optional] |
| **unit** | **string**| Unit of measurement | [optional] |
| **quantity** | **float**| Quantity available | [optional] |
| **stock_count** | **float**| Stock count | [optional] |
| **status** | **string**| Product status | [optional] |
| **product_type** | **string**| Product type | [optional] |
| **images** | [**string[]**](../Model/string.md)| Array of image URLs | [optional] |

### Return type

void (empty response body)

### Authorization

[x-client-secret](../../README.md#x-client-secret), [x-client-key](../../README.md#x-client-key)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `productControllerFindAll()`

```php
productControllerFindAll($skip, $take)
```

Get all products

Retrieves a list of products with pagination.      This endpoint allows you to fetch products with optional pagination.  ## Use Cases - List all products - Browse product catalog - Implement product search  ## Query Parameters - `skip`: Number of records to skip (default: 0) - `take`: Number of records to take (default: 10)  ## Example Response ```json {   \"data\": [     {       \"id\": \"prod_123456\",       \"name\": \"Premium Widget\",       \"description\": \"High-quality widget for all your needs\",       \"price\": \"99.99\",       \"images\": [         \"https://storage.example.com/images/file1.jpg\",         \"https://storage.example.com/images/file2.jpg\"       ],       \"createdAt\": \"2024-03-20T10:00:00Z\"     }   ],   \"total\": 100,   \"skip\": 0,   \"take\": 10 } ```

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


$apiInstance = new Devdraft\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$skip = 3.4; // float | Number of records to skip
$take = 3.4; // float | Number of records to take

try {
    $apiInstance->productControllerFindAll($skip, $take);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->productControllerFindAll: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **skip** | **float**| Number of records to skip | [optional] |
| **take** | **float**| Number of records to take | [optional] |

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

## `productControllerFindOne()`

```php
productControllerFindOne($id)
```

Get a product by ID

Retrieves detailed information about a specific product.      This endpoint allows you to fetch complete product details including all images.  ## Use Cases - View product details - Display product information - Check product availability  ## Example Response ```json {   \"id\": \"prod_123456\",   \"name\": \"Premium Widget\",   \"description\": \"High-quality widget for all your needs\",   \"price\": \"99.99\",   \"images\": [     \"https://storage.example.com/images/file1.jpg\",     \"https://storage.example.com/images/file2.jpg\"   ],   \"createdAt\": \"2024-03-20T10:00:00Z\",   \"updatedAt\": \"2024-03-20T10:00:00Z\" } ```

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


$apiInstance = new Devdraft\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Product ID

try {
    $apiInstance->productControllerFindOne($id);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->productControllerFindOne: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Product ID | |

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

## `productControllerRemove()`

```php
productControllerRemove($id)
```

Delete a product

Deletes a product and its associated images.      This endpoint allows you to remove a product and all its associated data.  ## Use Cases - Remove discontinued products - Clean up product catalog - Delete test products  ## Notes - This action cannot be undone - All product images will be deleted - Associated data will be removed

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


$apiInstance = new Devdraft\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Product ID

try {
    $apiInstance->productControllerRemove($id);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->productControllerRemove: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Product ID | |

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

## `productControllerUpdate()`

```php
productControllerUpdate($id, $name, $description, $price, $currency, $type, $weight, $unit, $quantity, $stock_count, $status, $product_type, $images)
```

Update a product

Updates an existing product's information and optionally adds new images.      This endpoint allows you to modify product details and manage product images.  ## Use Cases - Update product information - Change product pricing - Modify product images - Update product description  ## Example Request (multipart/form-data) ``` name: \"Updated Premium Widget\" description: \"Updated description\" price: \"129.99\" images: [file1.jpg, file2.jpg]  // Optional, up to 10 images ```  ## Notes - Only include fields that need to be updated - New images will replace existing images - Maximum 10 images per product - Images are automatically optimized

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


$apiInstance = new Devdraft\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Product ID
$name = 'name_example'; // string | Product name as it will appear to customers. Should be clear and descriptive.
$description = 'description_example'; // string | Detailed description of the product. Supports markdown formatting for rich text display.
$price = 3.4; // float | Product price in the specified currency. Must be greater than 0.
$currency = 'USD'; // string | Currency code for the price. Defaults to USD if not specified.
$type = 'type_example'; // string | Product type
$weight = 3.4; // float | Weight of the product
$unit = 'unit_example'; // string | Unit of measurement
$quantity = 3.4; // float | Quantity available
$stock_count = 3.4; // float | Stock count
$status = 'status_example'; // string | Product status
$product_type = 'product_type_example'; // string | Product type
$images = array('images_example'); // string[] | Array of image URLs

try {
    $apiInstance->productControllerUpdate($id, $name, $description, $price, $currency, $type, $weight, $unit, $quantity, $stock_count, $status, $product_type, $images);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->productControllerUpdate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Product ID | |
| **name** | **string**| Product name as it will appear to customers. Should be clear and descriptive. | [optional] |
| **description** | **string**| Detailed description of the product. Supports markdown formatting for rich text display. | [optional] |
| **price** | **float**| Product price in the specified currency. Must be greater than 0. | [optional] |
| **currency** | **string**| Currency code for the price. Defaults to USD if not specified. | [optional] [default to &#39;USD&#39;] |
| **type** | **string**| Product type | [optional] |
| **weight** | **float**| Weight of the product | [optional] |
| **unit** | **string**| Unit of measurement | [optional] |
| **quantity** | **float**| Quantity available | [optional] |
| **stock_count** | **float**| Stock count | [optional] |
| **status** | **string**| Product status | [optional] |
| **product_type** | **string**| Product type | [optional] |
| **images** | [**string[]**](../Model/string.md)| Array of image URLs | [optional] |

### Return type

void (empty response body)

### Authorization

[x-client-secret](../../README.md#x-client-secret), [x-client-key](../../README.md#x-client-key)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `productControllerUploadImage()`

```php
productControllerUploadImage($id)
```

Upload images for a product

Adds new images to an existing product.      This endpoint allows you to upload additional images for a product that already exists.  ## Use Cases - Add more product images - Update product gallery - Enhance product presentation  ## Supported Image Formats - JPEG/JPG - PNG - WebP - Maximum 10 images per upload - Maximum file size: 5MB per image  ## Example Request (multipart/form-data) ``` images: [file1.jpg, file2.jpg]  // Up to 10 images ```  ## Notes - Images are appended to existing product images - Total images per product cannot exceed 10 - Images are automatically optimized and resized

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


$apiInstance = new Devdraft\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Product ID

try {
    $apiInstance->productControllerUploadImage($id);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->productControllerUploadImage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Product ID | |

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
