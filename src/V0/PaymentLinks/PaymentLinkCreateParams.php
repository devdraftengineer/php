<?php

declare(strict_types=1);

namespace Devdraft\V0\PaymentLinks;

use Devdraft\Core\Attributes\Api;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;
use Devdraft\V0\PaymentLinks\PaymentLinkCreateParams\Currency;
use Devdraft\V0\PaymentLinks\PaymentLinkCreateParams\LinkType;
use Devdraft\V0\PaymentLinks\PaymentLinkCreateParams\PaymentLinkProduct;

/**
 * Creates a new payment link with the provided details. Supports both simple one-time payments and complex product bundles.
 *
 * @see Devdraft\Services\V0\PaymentLinksService::create()
 *
 * @phpstan-type PaymentLinkCreateParamsShape = array{
 *   allowMobilePayment: bool,
 *   allowQuantityAdjustment: bool,
 *   collectAddress: bool,
 *   collectTax: bool,
 *   currency: Currency|value-of<Currency>,
 *   linkType: LinkType|value-of<LinkType>,
 *   title: string,
 *   url: string,
 *   amount?: float,
 *   coverImage?: string,
 *   customerId?: string,
 *   customFields?: mixed,
 *   description?: string,
 *   expiration_date?: \DateTimeInterface,
 *   isForAllProduct?: bool,
 *   limitPayments?: bool,
 *   maxPayments?: float,
 *   paymentForId?: string,
 *   paymentLinkProducts?: list<PaymentLinkProduct>,
 *   taxId?: string,
 * }
 */
final class PaymentLinkCreateParams implements BaseModel
{
    /** @use SdkModel<PaymentLinkCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether to allow mobile payment.
     */
    #[Api]
    public bool $allowMobilePayment;

    /**
     * Whether to allow quantity adjustment.
     */
    #[Api]
    public bool $allowQuantityAdjustment;

    /**
     * Whether to collect address.
     */
    #[Api]
    public bool $collectAddress;

    /**
     * Whether to collect tax.
     */
    #[Api]
    public bool $collectTax;

    /**
     * Currency.
     *
     * @var value-of<Currency> $currency
     */
    #[Api(enum: Currency::class)]
    public string $currency;

    /**
     * Type of the payment link.
     *
     * @var value-of<LinkType> $linkType
     */
    #[Api(enum: LinkType::class)]
    public string $linkType;

    /**
     * Display title for the payment link. This appears on the checkout page and in customer communications.
     */
    #[Api]
    public string $title;

    /**
     * Unique URL slug for the payment link. Can be a full URL or just the path segment. Must be unique within your account.
     */
    #[Api]
    public string $url;

    /**
     * Amount for the payment link.
     */
    #[Api(optional: true)]
    public ?float $amount;

    /**
     * Cover image URL.
     */
    #[Api(optional: true)]
    public ?string $coverImage;

    /**
     * Customer ID.
     */
    #[Api(optional: true)]
    public ?string $customerId;

    /**
     * Custom fields.
     */
    #[Api(optional: true)]
    public mixed $customFields;

    /**
     * Detailed description of what the customer is purchasing. Supports markdown formatting.
     */
    #[Api(optional: true)]
    public ?string $description;

    /**
     * Expiration date.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $expiration_date;

    /**
     * Whether the payment link is for all products.
     */
    #[Api(optional: true)]
    public ?bool $isForAllProduct;

    /**
     * Whether to limit payments.
     */
    #[Api(optional: true)]
    public ?bool $limitPayments;

    /**
     * Maximum number of payments.
     */
    #[Api(optional: true)]
    public ?float $maxPayments;

    /**
     * Payment for ID.
     */
    #[Api(optional: true)]
    public ?string $paymentForId;

    /**
     * Array of products in the payment link.
     *
     * @var list<PaymentLinkProduct>|null $paymentLinkProducts
     */
    #[Api(list: PaymentLinkProduct::class, optional: true)]
    public ?array $paymentLinkProducts;

    /**
     * Tax ID.
     */
    #[Api(optional: true)]
    public ?string $taxId;

    /**
     * `new PaymentLinkCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PaymentLinkCreateParams::with(
     *   allowMobilePayment: ...,
     *   allowQuantityAdjustment: ...,
     *   collectAddress: ...,
     *   collectTax: ...,
     *   currency: ...,
     *   linkType: ...,
     *   title: ...,
     *   url: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PaymentLinkCreateParams)
     *   ->withAllowMobilePayment(...)
     *   ->withAllowQuantityAdjustment(...)
     *   ->withCollectAddress(...)
     *   ->withCollectTax(...)
     *   ->withCurrency(...)
     *   ->withLinkType(...)
     *   ->withTitle(...)
     *   ->withURL(...)
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
     * @param LinkType|value-of<LinkType> $linkType
     * @param Currency|value-of<Currency> $currency
     * @param list<PaymentLinkProduct> $paymentLinkProducts
     */
    public static function with(
        LinkType|string $linkType,
        string $title,
        string $url,
        bool $allowMobilePayment = false,
        bool $allowQuantityAdjustment = true,
        bool $collectAddress = false,
        bool $collectTax = false,
        Currency|string $currency = 'usdc',
        ?float $amount = null,
        ?string $coverImage = null,
        ?string $customerId = null,
        mixed $customFields = null,
        ?string $description = null,
        ?\DateTimeInterface $expiration_date = null,
        ?bool $isForAllProduct = null,
        ?bool $limitPayments = null,
        ?float $maxPayments = null,
        ?string $paymentForId = null,
        ?array $paymentLinkProducts = null,
        ?string $taxId = null,
    ): self {
        $obj = new self;

        $obj->allowMobilePayment = $allowMobilePayment;
        $obj->allowQuantityAdjustment = $allowQuantityAdjustment;
        $obj->collectAddress = $collectAddress;
        $obj->collectTax = $collectTax;
        $obj['currency'] = $currency;
        $obj['linkType'] = $linkType;
        $obj->title = $title;
        $obj->url = $url;

        null !== $amount && $obj->amount = $amount;
        null !== $coverImage && $obj->coverImage = $coverImage;
        null !== $customerId && $obj->customerId = $customerId;
        null !== $customFields && $obj->customFields = $customFields;
        null !== $description && $obj->description = $description;
        null !== $expiration_date && $obj->expiration_date = $expiration_date;
        null !== $isForAllProduct && $obj->isForAllProduct = $isForAllProduct;
        null !== $limitPayments && $obj->limitPayments = $limitPayments;
        null !== $maxPayments && $obj->maxPayments = $maxPayments;
        null !== $paymentForId && $obj->paymentForId = $paymentForId;
        null !== $paymentLinkProducts && $obj->paymentLinkProducts = $paymentLinkProducts;
        null !== $taxId && $obj->taxId = $taxId;

        return $obj;
    }

    /**
     * Whether to allow mobile payment.
     */
    public function withAllowMobilePayment(bool $allowMobilePayment): self
    {
        $obj = clone $this;
        $obj->allowMobilePayment = $allowMobilePayment;

        return $obj;
    }

    /**
     * Whether to allow quantity adjustment.
     */
    public function withAllowQuantityAdjustment(
        bool $allowQuantityAdjustment
    ): self {
        $obj = clone $this;
        $obj->allowQuantityAdjustment = $allowQuantityAdjustment;

        return $obj;
    }

    /**
     * Whether to collect address.
     */
    public function withCollectAddress(bool $collectAddress): self
    {
        $obj = clone $this;
        $obj->collectAddress = $collectAddress;

        return $obj;
    }

    /**
     * Whether to collect tax.
     */
    public function withCollectTax(bool $collectTax): self
    {
        $obj = clone $this;
        $obj->collectTax = $collectTax;

        return $obj;
    }

    /**
     * Currency.
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
     * Type of the payment link.
     *
     * @param LinkType|value-of<LinkType> $linkType
     */
    public function withLinkType(LinkType|string $linkType): self
    {
        $obj = clone $this;
        $obj['linkType'] = $linkType;

        return $obj;
    }

    /**
     * Display title for the payment link. This appears on the checkout page and in customer communications.
     */
    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj->title = $title;

        return $obj;
    }

    /**
     * Unique URL slug for the payment link. Can be a full URL or just the path segment. Must be unique within your account.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }

    /**
     * Amount for the payment link.
     */
    public function withAmount(float $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    /**
     * Cover image URL.
     */
    public function withCoverImage(string $coverImage): self
    {
        $obj = clone $this;
        $obj->coverImage = $coverImage;

        return $obj;
    }

    /**
     * Customer ID.
     */
    public function withCustomerID(string $customerID): self
    {
        $obj = clone $this;
        $obj->customerId = $customerID;

        return $obj;
    }

    /**
     * Custom fields.
     */
    public function withCustomFields(mixed $customFields): self
    {
        $obj = clone $this;
        $obj->customFields = $customFields;

        return $obj;
    }

    /**
     * Detailed description of what the customer is purchasing. Supports markdown formatting.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * Expiration date.
     */
    public function withExpirationDate(\DateTimeInterface $expirationDate): self
    {
        $obj = clone $this;
        $obj->expiration_date = $expirationDate;

        return $obj;
    }

    /**
     * Whether the payment link is for all products.
     */
    public function withIsForAllProduct(bool $isForAllProduct): self
    {
        $obj = clone $this;
        $obj->isForAllProduct = $isForAllProduct;

        return $obj;
    }

    /**
     * Whether to limit payments.
     */
    public function withLimitPayments(bool $limitPayments): self
    {
        $obj = clone $this;
        $obj->limitPayments = $limitPayments;

        return $obj;
    }

    /**
     * Maximum number of payments.
     */
    public function withMaxPayments(float $maxPayments): self
    {
        $obj = clone $this;
        $obj->maxPayments = $maxPayments;

        return $obj;
    }

    /**
     * Payment for ID.
     */
    public function withPaymentForID(string $paymentForID): self
    {
        $obj = clone $this;
        $obj->paymentForId = $paymentForID;

        return $obj;
    }

    /**
     * Array of products in the payment link.
     *
     * @param list<PaymentLinkProduct> $paymentLinkProducts
     */
    public function withPaymentLinkProducts(array $paymentLinkProducts): self
    {
        $obj = clone $this;
        $obj->paymentLinkProducts = $paymentLinkProducts;

        return $obj;
    }

    /**
     * Tax ID.
     */
    public function withTaxID(string $taxID): self
    {
        $obj = clone $this;
        $obj->taxId = $taxID;

        return $obj;
    }
}
