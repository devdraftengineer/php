<?php

declare(strict_types=1);

namespace Devdraft\V0\Products;

use Devdraft\Core\Attributes\Optional;
use Devdraft\Core\Attributes\Required;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;
use Devdraft\V0\Products\ProductCreateParams\Currency;

/**
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
 * @see Devdraft\Services\V0\ProductsService::create()
 *
 * @phpstan-type ProductCreateParamsShape = array{
 *   description: string,
 *   name: string,
 *   price: float,
 *   currency?: Currency|value-of<Currency>,
 *   images?: list<string>,
 *   productType?: string,
 *   quantity?: float,
 *   status?: string,
 *   stockCount?: float,
 *   type?: string,
 *   unit?: string,
 *   weight?: float,
 * }
 */
final class ProductCreateParams implements BaseModel
{
    /** @use SdkModel<ProductCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Detailed description of the product. Supports markdown formatting for rich text display.
     */
    #[Required]
    public string $description;

    /**
     * Product name as it will appear to customers. Should be clear and descriptive.
     */
    #[Required]
    public string $name;

    /**
     * Product price in the specified currency. Must be greater than 0.
     */
    #[Required]
    public float $price;

    /**
     * Currency code for the price. Defaults to USD if not specified.
     *
     * @var value-of<Currency>|null $currency
     */
    #[Optional(enum: Currency::class)]
    public ?string $currency;

    /**
     * Array of image URLs.
     *
     * @var list<string>|null $images
     */
    #[Optional(list: 'string')]
    public ?array $images;

    /**
     * Product type.
     */
    #[Optional]
    public ?string $productType;

    /**
     * Quantity available.
     */
    #[Optional]
    public ?float $quantity;

    /**
     * Product status.
     */
    #[Optional]
    public ?string $status;

    /**
     * Stock count.
     */
    #[Optional]
    public ?float $stockCount;

    /**
     * Product type.
     */
    #[Optional]
    public ?string $type;

    /**
     * Unit of measurement.
     */
    #[Optional]
    public ?string $unit;

    /**
     * Weight of the product.
     */
    #[Optional]
    public ?float $weight;

    /**
     * `new ProductCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ProductCreateParams::with(description: ..., name: ..., price: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ProductCreateParams)->withDescription(...)->withName(...)->withPrice(...)
     * ```
     */
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
        string $description,
        string $name,
        float $price,
        Currency|string|null $currency = null,
        ?array $images = null,
        ?string $productType = null,
        ?float $quantity = null,
        ?string $status = null,
        ?float $stockCount = null,
        ?string $type = null,
        ?string $unit = null,
        ?float $weight = null,
    ): self {
        $self = new self;

        $self['description'] = $description;
        $self['name'] = $name;
        $self['price'] = $price;

        null !== $currency && $self['currency'] = $currency;
        null !== $images && $self['images'] = $images;
        null !== $productType && $self['productType'] = $productType;
        null !== $quantity && $self['quantity'] = $quantity;
        null !== $status && $self['status'] = $status;
        null !== $stockCount && $self['stockCount'] = $stockCount;
        null !== $type && $self['type'] = $type;
        null !== $unit && $self['unit'] = $unit;
        null !== $weight && $self['weight'] = $weight;

        return $self;
    }

    /**
     * Detailed description of the product. Supports markdown formatting for rich text display.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Product name as it will appear to customers. Should be clear and descriptive.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Product price in the specified currency. Must be greater than 0.
     */
    public function withPrice(float $price): self
    {
        $self = clone $this;
        $self['price'] = $price;

        return $self;
    }

    /**
     * Currency code for the price. Defaults to USD if not specified.
     *
     * @param Currency|value-of<Currency> $currency
     */
    public function withCurrency(Currency|string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    /**
     * Array of image URLs.
     *
     * @param list<string> $images
     */
    public function withImages(array $images): self
    {
        $self = clone $this;
        $self['images'] = $images;

        return $self;
    }

    /**
     * Product type.
     */
    public function withProductType(string $productType): self
    {
        $self = clone $this;
        $self['productType'] = $productType;

        return $self;
    }

    /**
     * Quantity available.
     */
    public function withQuantity(float $quantity): self
    {
        $self = clone $this;
        $self['quantity'] = $quantity;

        return $self;
    }

    /**
     * Product status.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Stock count.
     */
    public function withStockCount(float $stockCount): self
    {
        $self = clone $this;
        $self['stockCount'] = $stockCount;

        return $self;
    }

    /**
     * Product type.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Unit of measurement.
     */
    public function withUnit(string $unit): self
    {
        $self = clone $this;
        $self['unit'] = $unit;

        return $self;
    }

    /**
     * Weight of the product.
     */
    public function withWeight(float $weight): self
    {
        $self = clone $this;
        $self['weight'] = $weight;

        return $self;
    }
}
