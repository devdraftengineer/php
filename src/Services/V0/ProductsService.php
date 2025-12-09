<?php

declare(strict_types=1);

namespace Devdraft\Services\V0;

use Devdraft\Client;
use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\ProductsContract;
use Devdraft\V0\Products\ProductCreateParams;
use Devdraft\V0\Products\ProductCreateParams\Currency;
use Devdraft\V0\Products\ProductListParams;
use Devdraft\V0\Products\ProductUpdateParams;

final class ProductsService implements ProductsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     * @param array{
     *   description: string,
     *   name: string,
     *   price: float,
     *   currency?: 'USD'|'EUR'|'GBP'|'CAD'|'AUD'|'JPY'|Currency,
     *   images?: list<string>,
     *   productType?: string,
     *   quantity?: float,
     *   status?: string,
     *   stockCount?: float,
     *   type?: string,
     *   unit?: string,
     *   weight?: float,
     * }|ProductCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|ProductCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = ProductCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: 'api/v0/products',
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );

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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'get',
            path: ['api/v0/products/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );

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
     * @param array{
     *   currency?: 'USD'|'EUR'|'GBP'|'CAD'|'AUD'|'JPY'|ProductUpdateParams\Currency,
     *   description?: string,
     *   images?: list<string>,
     *   name?: string,
     *   price?: float,
     *   productType?: string,
     *   quantity?: float,
     *   status?: string,
     *   stockCount?: float,
     *   type?: string,
     *   unit?: string,
     *   weight?: float,
     * }|ProductUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|ProductUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = ProductUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'put',
            path: ['api/v0/products/%1$s', $id],
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );

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
     * @param array{skip?: float, take?: float}|ProductListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|ProductListParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = ProductListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'get',
            path: 'api/v0/products',
            query: $parsed,
            options: $options,
            convert: null,
        );

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
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['api/v0/products/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );

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
     * @throws APIException
     */
    public function uploadImages(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: ['api/v0/products/%1$s/images', $id],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }
}
