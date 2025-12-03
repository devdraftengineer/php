<?php

declare(strict_types=1);

namespace Devdraft\V0\Invoices\InvoiceUpdateParams;

use Devdraft\Core\Attributes\Api;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Contracts\BaseModel;

/**
 * @phpstan-type ItemShape = array{product_id: string, quantity: float}
 */
final class Item implements BaseModel
{
    /** @use SdkModel<ItemShape> */
    use SdkModel;

    /**
     * Product ID.
     */
    #[Api]
    public string $product_id;

    /**
     * Quantity of the product.
     */
    #[Api]
    public float $quantity;

    /**
     * `new Item()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Item::with(product_id: ..., quantity: ...)
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
    public static function with(string $product_id, float $quantity): self
    {
        $obj = new self;

        $obj->product_id = $product_id;
        $obj->quantity = $quantity;

        return $obj;
    }

    /**
     * Product ID.
     */
    public function withProductID(string $productID): self
    {
        $obj = clone $this;
        $obj->product_id = $productID;

        return $obj;
    }

    /**
     * Quantity of the product.
     */
    public function withQuantity(float $quantity): self
    {
        $obj = clone $this;
        $obj->quantity = $quantity;

        return $obj;
    }
}
