<?php

declare(strict_types=1);

namespace Devdraft\Services\V0;

use Devdraft\Client;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\ProductsContract;
use Devdraft\V0\Products\ProductCreateParams\Currency;

final class ProductsService implements ProductsContract
{
    /**
     * @api
     */
    public ProductsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ProductsRawService($client);
    }

    /**
     * @api
     *
     * Creates a new product with optional image uploads.
     *
     * This endpoint allows you to create products with detailed information and multiple images.
     *
     * ## Use Cases
     * - Add new products to your catalog
     * - Create products with multiple images
     * - Set up product pricing and descriptions
     *
     * ## Supported Image Formats
     * - JPEG/JPG
     * - PNG
     * - WebP
     * - Maximum 10 images per product
     * - Maximum file size: 5MB per image
     *
     * ## Example Request (multipart/form-data)
     * ```
     * name: "Premium Widget"
     * description: "High-quality widget for all your needs"
     * price: "99.99"
     * images: [file1.jpg, file2.jpg]  // Optional, up to 10 images
     * ```
     *
     * ## Required Fields
     * - `name`: Product name
     * - `price`: Product price (decimal number)
     *
     * ## Optional Fields
     * - `description`: Detailed product description
     * - `images`: Product images (up to 10 files)
     *
     * @param string $description Detailed description of the product. Supports markdown formatting for rich text display.
     * @param string $name Product name as it will appear to customers. Should be clear and descriptive.
     * @param float $price Product price in the specified currency. Must be greater than 0.
     * @param 'USD'|'EUR'|'GBP'|'CAD'|'AUD'|'JPY'|Currency $currency Currency code for the price. Defaults to USD if not specified.
     * @param list<string> $images Array of image URLs
     * @param string $productType Product type
     * @param float $quantity Quantity available
     * @param string $status Product status
     * @param float $stockCount Stock count
     * @param string $type Product type
     * @param string $unit Unit of measurement
     * @param float $weight Weight of the product
     *
     * @throws APIException
     */
    public function create(
        string $description,
        string $name,
        float $price,
        string|Currency $currency = 'USD',
        ?array $images = null,
        ?string $productType = null,
        ?float $quantity = null,
        ?string $status = null,
        ?float $stockCount = null,
        ?string $type = null,
        ?string $unit = null,
        ?float $weight = null,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'description' => $description,
            'name' => $name,
            'price' => $price,
            'currency' => $currency,
            'images' => $images,
            'productType' => $productType,
            'quantity' => $quantity,
            'status' => $status,
            'stockCount' => $stockCount,
            'type' => $type,
            'unit' => $unit,
            'weight' => $weight,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves detailed information about a specific product.
     *
     * This endpoint allows you to fetch complete product details including all images.
     *
     * ## Use Cases
     * - View product details
     * - Display product information
     * - Check product availability
     *
     * ## Example Response
     * ```json
     * {
     *   "id": "prod_123456",
     *   "name": "Premium Widget",
     *   "description": "High-quality widget for all your needs",
     *   "price": "99.99",
     *   "images": [
     *     "https://storage.example.com/images/file1.jpg",
     *     "https://storage.example.com/images/file2.jpg"
     *   ],
     *   "createdAt": "2024-03-20T10:00:00Z",
     *   "updatedAt": "2024-03-20T10:00:00Z"
     * }
     * ```
     *
     * @param string $id Product ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates an existing product's information and optionally adds new images.
     *
     * This endpoint allows you to modify product details and manage product images.
     *
     * ## Use Cases
     * - Update product information
     * - Change product pricing
     * - Modify product images
     * - Update product description
     *
     * ## Example Request (multipart/form-data)
     * ```
     * name: "Updated Premium Widget"
     * description: "Updated description"
     * price: "129.99"
     * images: [file1.jpg, file2.jpg]  // Optional, up to 10 images
     * ```
     *
     * ## Notes
     * - Only include fields that need to be updated
     * - New images will replace existing images
     * - Maximum 10 images per product
     * - Images are automatically optimized
     *
     * @param string $id Product ID
     * @param 'USD'|'EUR'|'GBP'|'CAD'|'AUD'|'JPY'|\Devdraft\V0\Products\ProductUpdateParams\Currency $currency Currency code for the price. Defaults to USD if not specified.
     * @param string $description Detailed description of the product. Supports markdown formatting for rich text display.
     * @param list<string> $images Array of image URLs
     * @param string $name Product name as it will appear to customers. Should be clear and descriptive.
     * @param float $price Product price in the specified currency. Must be greater than 0.
     * @param string $productType Product type
     * @param float $quantity Quantity available
     * @param string $status Product status
     * @param float $stockCount Stock count
     * @param string $type Product type
     * @param string $unit Unit of measurement
     * @param float $weight Weight of the product
     *
     * @throws APIException
     */
    public function update(
        string $id,
        string|\Devdraft\V0\Products\ProductUpdateParams\Currency $currency = 'USD',
        ?string $description = null,
        ?array $images = null,
        ?string $name = null,
        ?float $price = null,
        ?string $productType = null,
        ?float $quantity = null,
        ?string $status = null,
        ?float $stockCount = null,
        ?string $type = null,
        ?string $unit = null,
        ?float $weight = null,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'currency' => $currency,
            'description' => $description,
            'images' => $images,
            'name' => $name,
            'price' => $price,
            'productType' => $productType,
            'quantity' => $quantity,
            'status' => $status,
            'stockCount' => $stockCount,
            'type' => $type,
            'unit' => $unit,
            'weight' => $weight,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves a list of products with pagination.
     *
     * This endpoint allows you to fetch products with optional pagination.
     *
     * ## Use Cases
     * - List all products
     * - Browse product catalog
     * - Implement product search
     *
     * ## Query Parameters
     * - `skip`: Number of records to skip (default: 0)
     * - `take`: Number of records to take (default: 10)
     *
     * ## Example Response
     * ```json
     * {
     *   "data": [
     *     {
     *       "id": "prod_123456",
     *       "name": "Premium Widget",
     *       "description": "High-quality widget for all your needs",
     *       "price": "99.99",
     *       "images": [
     *         "https://storage.example.com/images/file1.jpg",
     *         "https://storage.example.com/images/file2.jpg"
     *       ],
     *       "createdAt": "2024-03-20T10:00:00Z"
     *     }
     *   ],
     *   "total": 100,
     *   "skip": 0,
     *   "take": 10
     * }
     * ```
     *
     * @param float $skip Number of records to skip
     * @param float $take Number of records to take
     *
     * @throws APIException
     */
    public function list(
        ?float $skip = null,
        ?float $take = null,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = ['skip' => $skip, 'take' => $take];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes a product and its associated images.
     *
     * This endpoint allows you to remove a product and all its associated data.
     *
     * ## Use Cases
     * - Remove discontinued products
     * - Clean up product catalog
     * - Delete test products
     *
     * ## Notes
     * - This action cannot be undone
     * - All product images will be deleted
     * - Associated data will be removed
     *
     * @param string $id Product ID
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Adds new images to an existing product.
     *
     * This endpoint allows you to upload additional images for a product that already exists.
     *
     * ## Use Cases
     * - Add more product images
     * - Update product gallery
     * - Enhance product presentation
     *
     * ## Supported Image Formats
     * - JPEG/JPG
     * - PNG
     * - WebP
     * - Maximum 10 images per upload
     * - Maximum file size: 5MB per image
     *
     * ## Example Request (multipart/form-data)
     * ```
     * images: [file1.jpg, file2.jpg]  // Up to 10 images
     * ```
     *
     * ## Notes
     * - Images are appended to existing product images
     * - Total images per product cannot exceed 10
     * - Images are automatically optimized and resized
     *
     * @param string $id Product ID
     *
     * @throws APIException
     */
    public function uploadImages(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->uploadImages($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
