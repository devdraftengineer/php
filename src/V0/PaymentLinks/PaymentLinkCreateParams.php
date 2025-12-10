<?php

declare(strict_types=1);

namespace Devdraft\V0\PaymentLinks;

use Devdraft\Core\Attributes\Optional;
use Devdraft\Core\Attributes\Required;
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
 *   customerID?: string,
 *   customFields?: mixed,
 *   description?: string,
 *   expirationDate?: \DateTimeInterface,
 *   isForAllProduct?: bool,
 *   limitPayments?: bool,
 *   maxPayments?: float,
 *   paymentForID?: string,
 *   paymentLinkProducts?: list<PaymentLinkProduct|array{
 *     productID: string, quantity: int
 *   }>,
 *   taxID?: string,
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
    #[Required]
    public bool $allowMobilePayment;

    /**
     * Whether to allow quantity adjustment.
     */
    #[Required]
    public bool $allowQuantityAdjustment;

    /**
     * Whether to collect address.
     */
    #[Required]
    public bool $collectAddress;

    /**
     * Whether to collect tax.
     */
    #[Required]
    public bool $collectTax;

    /**
     * Currency.
     *
     * @var value-of<Currency> $currency
     */
    #[Required(enum: Currency::class)]
    public string $currency;

    /**
     * Type of the payment link.
     *
     * @var value-of<LinkType> $linkType
     */
    #[Required(enum: LinkType::class)]
    public string $linkType;

    /**
     * Display title for the payment link. This appears on the checkout page and in customer communications.
     */
    #[Required]
    public string $title;

    /**
     * Unique URL slug for the payment link. Can be a full URL or just the path segment. Must be unique within your account.
     */
    #[Required]
    public string $url;

    /**
     * Amount for the payment link.
     */
    #[Optional]
    public ?float $amount;

    /**
     * Cover image URL.
     */
    #[Optional]
    public ?string $coverImage;

    /**
     * Customer ID.
     */
    #[Optional('customerId')]
    public ?string $customerID;

    /**
     * Custom fields.
     */
    #[Optional]
    public mixed $customFields;

    /**
     * Detailed description of what the customer is purchasing. Supports markdown formatting.
     */
    #[Optional]
    public ?string $description;

    /**
     * Expiration date.
     */
    #[Optional('expiration_date')]
    public ?\DateTimeInterface $expirationDate;

    /**
     * Whether the payment link is for all products.
     */
    #[Optional]
    public ?bool $isForAllProduct;

    /**
     * Whether to limit payments.
     */
    #[Optional]
    public ?bool $limitPayments;

    /**
     * Maximum number of payments.
     */
    #[Optional]
    public ?float $maxPayments;

    /**
     * Payment for ID.
     */
    #[Optional('paymentForId')]
    public ?string $paymentForID;

    /**
     * Array of products in the payment link.
     *
     * @var list<PaymentLinkProduct>|null $paymentLinkProducts
     */
    #[Optional(list: PaymentLinkProduct::class)]
    public ?array $paymentLinkProducts;

    /**
     * Tax ID.
     */
    #[Optional('taxId')]
    public ?string $taxID;

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
     * @param list<PaymentLinkProduct|array{
     *   productID: string, quantity: int
     * }> $paymentLinkProducts
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
        ?string $customerID = null,
        mixed $customFields = null,
        ?string $description = null,
        ?\DateTimeInterface $expirationDate = null,
        ?bool $isForAllProduct = null,
        ?bool $limitPayments = null,
        ?float $maxPayments = null,
        ?string $paymentForID = null,
        ?array $paymentLinkProducts = null,
        ?string $taxID = null,
    ): self {
        $self = new self;

        $self['allowMobilePayment'] = $allowMobilePayment;
        $self['allowQuantityAdjustment'] = $allowQuantityAdjustment;
        $self['collectAddress'] = $collectAddress;
        $self['collectTax'] = $collectTax;
        $self['currency'] = $currency;
        $self['linkType'] = $linkType;
        $self['title'] = $title;
        $self['url'] = $url;

        null !== $amount && $self['amount'] = $amount;
        null !== $coverImage && $self['coverImage'] = $coverImage;
        null !== $customerID && $self['customerID'] = $customerID;
        null !== $customFields && $self['customFields'] = $customFields;
        null !== $description && $self['description'] = $description;
        null !== $expirationDate && $self['expirationDate'] = $expirationDate;
        null !== $isForAllProduct && $self['isForAllProduct'] = $isForAllProduct;
        null !== $limitPayments && $self['limitPayments'] = $limitPayments;
        null !== $maxPayments && $self['maxPayments'] = $maxPayments;
        null !== $paymentForID && $self['paymentForID'] = $paymentForID;
        null !== $paymentLinkProducts && $self['paymentLinkProducts'] = $paymentLinkProducts;
        null !== $taxID && $self['taxID'] = $taxID;

        return $self;
    }

    /**
     * Whether to allow mobile payment.
     */
    public function withAllowMobilePayment(bool $allowMobilePayment): self
    {
        $self = clone $this;
        $self['allowMobilePayment'] = $allowMobilePayment;

        return $self;
    }

    /**
     * Whether to allow quantity adjustment.
     */
    public function withAllowQuantityAdjustment(
        bool $allowQuantityAdjustment
    ): self {
        $self = clone $this;
        $self['allowQuantityAdjustment'] = $allowQuantityAdjustment;

        return $self;
    }

    /**
     * Whether to collect address.
     */
    public function withCollectAddress(bool $collectAddress): self
    {
        $self = clone $this;
        $self['collectAddress'] = $collectAddress;

        return $self;
    }

    /**
     * Whether to collect tax.
     */
    public function withCollectTax(bool $collectTax): self
    {
        $self = clone $this;
        $self['collectTax'] = $collectTax;

        return $self;
    }

    /**
     * Currency.
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
     * Type of the payment link.
     *
     * @param LinkType|value-of<LinkType> $linkType
     */
    public function withLinkType(LinkType|string $linkType): self
    {
        $self = clone $this;
        $self['linkType'] = $linkType;

        return $self;
    }

    /**
     * Display title for the payment link. This appears on the checkout page and in customer communications.
     */
    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }

    /**
     * Unique URL slug for the payment link. Can be a full URL or just the path segment. Must be unique within your account.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * Amount for the payment link.
     */
    public function withAmount(float $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * Cover image URL.
     */
    public function withCoverImage(string $coverImage): self
    {
        $self = clone $this;
        $self['coverImage'] = $coverImage;

        return $self;
    }

    /**
     * Customer ID.
     */
    public function withCustomerID(string $customerID): self
    {
        $self = clone $this;
        $self['customerID'] = $customerID;

        return $self;
    }

    /**
     * Custom fields.
     */
    public function withCustomFields(mixed $customFields): self
    {
        $self = clone $this;
        $self['customFields'] = $customFields;

        return $self;
    }

    /**
     * Detailed description of what the customer is purchasing. Supports markdown formatting.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Expiration date.
     */
    public function withExpirationDate(\DateTimeInterface $expirationDate): self
    {
        $self = clone $this;
        $self['expirationDate'] = $expirationDate;

        return $self;
    }

    /**
     * Whether the payment link is for all products.
     */
    public function withIsForAllProduct(bool $isForAllProduct): self
    {
        $self = clone $this;
        $self['isForAllProduct'] = $isForAllProduct;

        return $self;
    }

    /**
     * Whether to limit payments.
     */
    public function withLimitPayments(bool $limitPayments): self
    {
        $self = clone $this;
        $self['limitPayments'] = $limitPayments;

        return $self;
    }

    /**
     * Maximum number of payments.
     */
    public function withMaxPayments(float $maxPayments): self
    {
        $self = clone $this;
        $self['maxPayments'] = $maxPayments;

        return $self;
    }

    /**
     * Payment for ID.
     */
    public function withPaymentForID(string $paymentForID): self
    {
        $self = clone $this;
        $self['paymentForID'] = $paymentForID;

        return $self;
    }

    /**
     * Array of products in the payment link.
     *
     * @param list<PaymentLinkProduct|array{
     *   productID: string, quantity: int
     * }> $paymentLinkProducts
     */
    public function withPaymentLinkProducts(array $paymentLinkProducts): self
    {
        $self = clone $this;
        $self['paymentLinkProducts'] = $paymentLinkProducts;

        return $self;
    }

    /**
     * Tax ID.
     */
    public function withTaxID(string $taxID): self
    {
        $self = clone $this;
        $self['taxID'] = $taxID;

        return $self;
    }
}
