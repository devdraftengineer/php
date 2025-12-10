<?php

declare(strict_types=1);

namespace Devdraft\V0\Invoices\CreateInvoice;

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
        $self = new self;

        $self['productID'] = $productID;
        $self['quantity'] = $quantity;

        return $self;
    }

    /**
     * Product ID.
     */
    public function withProductID(string $productID): self
    {
        $self = clone $this;
        $self['productID'] = $productID;

        return $self;
    }

    /**
     * Quantity of the product.
     */
    public function withQuantity(float $quantity): self
    {
        $self = clone $this;
        $self['quantity'] = $quantity;

        return $self;
    }
}
