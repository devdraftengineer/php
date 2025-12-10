<?php

declare(strict_types=1);

namespace Devdraft\V0\Invoices;

use Devdraft\Core\Attributes\Optional;
use Devdraft\Core\Attributes\Required;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;
use Devdraft\V0\Invoices\InvoiceCreateParams\Currency;
use Devdraft\V0\Invoices\InvoiceCreateParams\Delivery;
use Devdraft\V0\Invoices\InvoiceCreateParams\Item;
use Devdraft\V0\Invoices\InvoiceCreateParams\PaymentMethod;
use Devdraft\V0\Invoices\InvoiceCreateParams\Status;

/**
 * Create a new invoice.
 *
 * @see Devdraft\Services\V0\InvoicesService::create()
 *
 * @phpstan-type InvoiceCreateParamsShape = array{
 *   currency: Currency|value-of<Currency>,
 *   customerID: string,
 *   delivery: Delivery|value-of<Delivery>,
 *   dueDate: \DateTimeInterface,
 *   email: string,
 *   items: list<Item|array{productID: string, quantity: float}>,
 *   name: string,
 *   partialPayment: bool,
 *   paymentLink: bool,
 *   paymentMethods: list<PaymentMethod|value-of<PaymentMethod>>,
 *   status: Status|value-of<Status>,
 *   address?: string,
 *   logo?: string,
 *   phoneNumber?: string,
 *   sendDate?: \DateTimeInterface,
 *   taxID?: string,
 * }
 */
final class InvoiceCreateParams implements BaseModel
{
    /** @use SdkModel<InvoiceCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Currency for the invoice.
     *
     * @var value-of<Currency> $currency
     */
    #[Required(enum: Currency::class)]
    public string $currency;

    /**
     * Customer ID.
     */
    #[Required('customer_id')]
    public string $customerID;

    /**
     * Delivery method.
     *
     * @var value-of<Delivery> $delivery
     */
    #[Required(enum: Delivery::class)]
    public string $delivery;

    /**
     * Due date of the invoice.
     */
    #[Required('due_date')]
    public \DateTimeInterface $dueDate;

    /**
     * Email address.
     */
    #[Required]
    public string $email;

    /**
     * Array of products in the invoice.
     *
     * @var list<Item> $items
     */
    #[Required(list: Item::class)]
    public array $items;

    /**
     * Name of the invoice.
     */
    #[Required]
    public string $name;

    /**
     * Allow partial payments.
     */
    #[Required('partial_payment')]
    public bool $partialPayment;

    /**
     * Whether to generate a payment link.
     */
    #[Required('payment_link')]
    public bool $paymentLink;

    /**
     * Array of accepted payment methods.
     *
     * @var list<value-of<PaymentMethod>> $paymentMethods
     */
    #[Required('payment_methods', list: PaymentMethod::class)]
    public array $paymentMethods;

    /**
     * Invoice status.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * Address.
     */
    #[Optional]
    public ?string $address;

    /**
     * Logo URL.
     */
    #[Optional]
    public ?string $logo;

    /**
     * Phone number.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * Send date.
     */
    #[Optional('send_date')]
    public ?\DateTimeInterface $sendDate;

    /**
     * Tax ID.
     */
    #[Optional('taxId')]
    public ?string $taxID;

    /**
     * `new InvoiceCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InvoiceCreateParams::with(
     *   currency: ...,
     *   customerID: ...,
     *   delivery: ...,
     *   dueDate: ...,
     *   email: ...,
     *   items: ...,
     *   name: ...,
     *   partialPayment: ...,
     *   paymentLink: ...,
     *   paymentMethods: ...,
     *   status: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InvoiceCreateParams)
     *   ->withCurrency(...)
     *   ->withCustomerID(...)
     *   ->withDelivery(...)
     *   ->withDueDate(...)
     *   ->withEmail(...)
     *   ->withItems(...)
     *   ->withName(...)
     *   ->withPartialPayment(...)
     *   ->withPaymentLink(...)
     *   ->withPaymentMethods(...)
     *   ->withStatus(...)
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
     * @param Delivery|value-of<Delivery> $delivery
     * @param list<Item|array{productID: string, quantity: float}> $items
     * @param list<PaymentMethod|value-of<PaymentMethod>> $paymentMethods
     * @param Status|value-of<Status> $status
     */
    public static function with(
        Currency|string $currency,
        string $customerID,
        Delivery|string $delivery,
        \DateTimeInterface $dueDate,
        string $email,
        array $items,
        string $name,
        bool $partialPayment,
        bool $paymentLink,
        array $paymentMethods,
        Status|string $status,
        ?string $address = null,
        ?string $logo = null,
        ?string $phoneNumber = null,
        ?\DateTimeInterface $sendDate = null,
        ?string $taxID = null,
    ): self {
        $self = new self;

        $self['currency'] = $currency;
        $self['customerID'] = $customerID;
        $self['delivery'] = $delivery;
        $self['dueDate'] = $dueDate;
        $self['email'] = $email;
        $self['items'] = $items;
        $self['name'] = $name;
        $self['partialPayment'] = $partialPayment;
        $self['paymentLink'] = $paymentLink;
        $self['paymentMethods'] = $paymentMethods;
        $self['status'] = $status;

        null !== $address && $self['address'] = $address;
        null !== $logo && $self['logo'] = $logo;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $sendDate && $self['sendDate'] = $sendDate;
        null !== $taxID && $self['taxID'] = $taxID;

        return $self;
    }

    /**
     * Currency for the invoice.
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
     * Customer ID.
     */
    public function withCustomerID(string $customerID): self
    {
        $self = clone $this;
        $self['customerID'] = $customerID;

        return $self;
    }

    /**
     * Delivery method.
     *
     * @param Delivery|value-of<Delivery> $delivery
     */
    public function withDelivery(Delivery|string $delivery): self
    {
        $self = clone $this;
        $self['delivery'] = $delivery;

        return $self;
    }

    /**
     * Due date of the invoice.
     */
    public function withDueDate(\DateTimeInterface $dueDate): self
    {
        $self = clone $this;
        $self['dueDate'] = $dueDate;

        return $self;
    }

    /**
     * Email address.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * Array of products in the invoice.
     *
     * @param list<Item|array{productID: string, quantity: float}> $items
     */
    public function withItems(array $items): self
    {
        $self = clone $this;
        $self['items'] = $items;

        return $self;
    }

    /**
     * Name of the invoice.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Allow partial payments.
     */
    public function withPartialPayment(bool $partialPayment): self
    {
        $self = clone $this;
        $self['partialPayment'] = $partialPayment;

        return $self;
    }

    /**
     * Whether to generate a payment link.
     */
    public function withPaymentLink(bool $paymentLink): self
    {
        $self = clone $this;
        $self['paymentLink'] = $paymentLink;

        return $self;
    }

    /**
     * Array of accepted payment methods.
     *
     * @param list<PaymentMethod|value-of<PaymentMethod>> $paymentMethods
     */
    public function withPaymentMethods(array $paymentMethods): self
    {
        $self = clone $this;
        $self['paymentMethods'] = $paymentMethods;

        return $self;
    }

    /**
     * Invoice status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Address.
     */
    public function withAddress(string $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    /**
     * Logo URL.
     */
    public function withLogo(string $logo): self
    {
        $self = clone $this;
        $self['logo'] = $logo;

        return $self;
    }

    /**
     * Phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Send date.
     */
    public function withSendDate(\DateTimeInterface $sendDate): self
    {
        $self = clone $this;
        $self['sendDate'] = $sendDate;

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
