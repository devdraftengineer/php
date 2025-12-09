<?php

declare(strict_types=1);

namespace Devdraft\V0\PaymentLinks\PaymentLinkCreateParams;

use Devdraft\Core\Attributes\Required;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Contracts\BaseModel;

/**
 * @phpstan-type PaymentLinkProductShape = array{productID: string, quantity: int}
 */
final class PaymentLinkProduct implements BaseModel
{
    /** @use SdkModel<PaymentLinkProductShape> */
    use SdkModel;

    /**
     * UUID of the product to include in this payment link. Must be a valid product from your catalog.
     */
    #[Required('productId')]
    public string $productID;

    /**
     * Quantity of this product to include. Must be at least 1.
     */
    #[Required]
    public int $quantity;

    /**
     * `new PaymentLinkProduct()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PaymentLinkProduct::with(productID: ..., quantity: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PaymentLinkProduct)->withProductID(...)->withQuantity(...)
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
    public static function with(string $productID, int $quantity = 1): self
    {
        $obj = new self;

        $obj['productID'] = $productID;
        $obj['quantity'] = $quantity;

        return $obj;
    }

    /**
     * UUID of the product to include in this payment link. Must be a valid product from your catalog.
     */
    public function withProductID(string $productID): self
    {
        $obj = clone $this;
        $obj['productID'] = $productID;

        return $obj;
    }

    /**
     * Quantity of this product to include. Must be at least 1.
     */
    public function withQuantity(int $quantity): self
    {
        $obj = clone $this;
        $obj['quantity'] = $quantity;

        return $obj;
    }
}
