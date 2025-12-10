<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\Products\ProductCreateParams\Currency;

interface ProductsContract
{
    /**
     * @api
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
    ): mixed;

    /**
     * @api
     *
     * @param string $id Product ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
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
    ): mixed;

    /**
     * @api
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
    ): mixed;

    /**
     * @api
     *
     * @param string $id Product ID
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $id Product ID
     *
     * @throws APIException
     */
    public function uploadImages(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
