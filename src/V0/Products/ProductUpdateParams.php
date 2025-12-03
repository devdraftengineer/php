<?php

declare(strict_types=1);

namespace Devdraft\V0\Products;

use Devdraft\Core\Attributes\Api;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;
use Devdraft\V0\Products\ProductUpdateParams\Currency;

/**
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
 * @see Devdraft\Services\V0\ProductsService::update()
 *
 * @phpstan-type ProductUpdateParamsShape = array{
 *   currency?: Currency|value-of<Currency>,
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
 * }
 */
final class ProductUpdateParams implements BaseModel
{
    /** @use SdkModel<ProductUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Currency code for the price. Defaults to USD if not specified.
     *
     * @var value-of<Currency>|null $currency
     */
    #[Api(enum: Currency::class, optional: true)]
    public ?string $currency;

    /**
     * Detailed description of the product. Supports markdown formatting for rich text display.
     */
    #[Api(optional: true)]
    public ?string $description;

    /**
     * Array of image URLs.
     *
     * @var list<string>|null $images
     */
    #[Api(list: 'string', optional: true)]
    public ?array $images;

    /**
     * Product name as it will appear to customers. Should be clear and descriptive.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Product price in the specified currency. Must be greater than 0.
     */
    #[Api(optional: true)]
    public ?float $price;

    /**
     * Product type.
     */
    #[Api(optional: true)]
    public ?string $productType;

    /**
     * Quantity available.
     */
    #[Api(optional: true)]
    public ?float $quantity;

    /**
     * Product status.
     */
    #[Api(optional: true)]
    public ?string $status;

    /**
     * Stock count.
     */
    #[Api(optional: true)]
    public ?float $stockCount;

    /**
     * Product type.
     */
    #[Api(optional: true)]
    public ?string $type;

    /**
     * Unit of measurement.
     */
    #[Api(optional: true)]
    public ?string $unit;

    /**
     * Weight of the product.
     */
    #[Api(optional: true)]
    public ?float $weight;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Currency|value-of<Currency> $currency
     * @param list<string> $images
     */
    public static function with(
        Currency|string|null $currency = null,
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
    ): self {
        $obj = new self;

        null !== $currency && $obj['currency'] = $currency;
        null !== $description && $obj->description = $description;
        null !== $images && $obj->images = $images;
        null !== $name && $obj->name = $name;
        null !== $price && $obj->price = $price;
        null !== $productType && $obj->productType = $productType;
        null !== $quantity && $obj->quantity = $quantity;
        null !== $status && $obj->status = $status;
        null !== $stockCount && $obj->stockCount = $stockCount;
        null !== $type && $obj->type = $type;
        null !== $unit && $obj->unit = $unit;
        null !== $weight && $obj->weight = $weight;

        return $obj;
    }

    /**
     * Currency code for the price. Defaults to USD if not specified.
     *
     * @param Currency|value-of<Currency> $currency
     */
    public function withCurrency(Currency|string $currency): self
    {
        $obj = clone $this;
        $obj['currency'] = $currency;

        return $obj;
    }

    /**
     * Detailed description of the product. Supports markdown formatting for rich text display.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * Array of image URLs.
     *
     * @param list<string> $images
     */
    public function withImages(array $images): self
    {
        $obj = clone $this;
        $obj->images = $images;

        return $obj;
    }

    /**
     * Product name as it will appear to customers. Should be clear and descriptive.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Product price in the specified currency. Must be greater than 0.
     */
    public function withPrice(float $price): self
    {
        $obj = clone $this;
        $obj->price = $price;

        return $obj;
    }

    /**
     * Product type.
     */
    public function withProductType(string $productType): self
    {
        $obj = clone $this;
        $obj->productType = $productType;

        return $obj;
    }

    /**
     * Quantity available.
     */
    public function withQuantity(float $quantity): self
    {
        $obj = clone $this;
        $obj->quantity = $quantity;

        return $obj;
    }

    /**
     * Product status.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    /**
     * Stock count.
     */
    public function withStockCount(float $stockCount): self
    {
        $obj = clone $this;
        $obj->stockCount = $stockCount;

        return $obj;
    }

    /**
     * Product type.
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    /**
     * Unit of measurement.
     */
    public function withUnit(string $unit): self
    {
        $obj = clone $this;
        $obj->unit = $unit;

        return $obj;
    }

    /**
     * Weight of the product.
     */
    public function withWeight(float $weight): self
    {
        $obj = clone $this;
        $obj->weight = $weight;

        return $obj;
    }
}
