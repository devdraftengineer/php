<?php

declare(strict_types=1);

namespace Devdraft\V0\Invoices\InvoiceCreateParams;

use Devdraft\Core\Attributes\Required;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Contracts\BaseModel;

/**
 * @phpstan-type ItemShape = array{productID: string, quantity: float}
 */
final class Item implements BaseModel
{
    /** @use SdkModel<ItemShape> */
    use SdkModel;

    /**
     * Product ID.
     */
    #[Required('product_id')]
    public string $productID;

    /**
     * Quantity of the product.
     */
    #[Required]
    public float $quantity;

    /**
     * `new Item()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Item::with(productID: ..., quantity: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Item)->withProductID(...)->withQuantity(...)
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
     */
    public static function with(string $productID, float $quantity): self
    {
        $obj = new self;

        $obj['productID'] = $productID;
        $obj['quantity'] = $quantity;

        return $obj;
    }

    /**
     * Product ID.
     */
    public function withProductID(string $productID): self
    {
        $obj = clone $this;
        $obj['productID'] = $productID;

        return $obj;
    }

    /**
     * Quantity of the product.
     */
    public function withQuantity(float $quantity): self
    {
        $obj = clone $this;
        $obj['quantity'] = $quantity;

        return $obj;
    }
}
