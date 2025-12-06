<?php

declare(strict_types=1);

namespace Devdraft\V0\Invoices;

use Devdraft\Core\Attributes\Api;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Contracts\BaseModel;
use Devdraft\V0\Invoices\CreateInvoice\Currency;
use Devdraft\V0\Invoices\CreateInvoice\Delivery;
use Devdraft\V0\Invoices\CreateInvoice\Item;
use Devdraft\V0\Invoices\CreateInvoice\PaymentMethod;
use Devdraft\V0\Invoices\CreateInvoice\Status;

/**
 * @phpstan-type CreateInvoiceShape = array{
 *   currency: value-of<Currency>,
 *   customer_id: string,
 *   delivery: value-of<Delivery>,
 *   due_date: \DateTimeInterface,
 *   email: string,
 *   items: list<Item>,
 *   name: string,
 *   partial_payment: bool,
 *   payment_link: bool,
 *   payment_methods: list<value-of<PaymentMethod>>,
 *   status: value-of<Status>,
 *   address?: string|null,
 *   logo?: string|null,
 *   phone_number?: string|null,
 *   send_date?: \DateTimeInterface|null,
 *   taxId?: string|null,
 * }
 */
final class CreateInvoice implements BaseModel
{
    /** @use SdkModel<CreateInvoiceShape> */
    use SdkModel;

    /**
     * Currency for the invoice.
     *
     * @var value-of<Currency> $currency
     */
    #[Api(enum: Currency::class)]
    public string $currency;

    /**
     * Customer ID.
     */
    #[Api]
    public string $customer_id;

    /**
     * Delivery method.
     *
     * @var value-of<Delivery> $delivery
     */
    #[Api(enum: Delivery::class)]
    public string $delivery;

    /**
     * Due date of the invoice.
     */
    #[Api]
    public \DateTimeInterface $due_date;

    /**
     * Email address.
     */
    #[Api]
    public string $email;

    /**
     * Array of products in the invoice.
     *
     * @var list<Item> $items
     */
    #[Api(list: Item::class)]
    public array $items;

    /**
     * Name of the invoice.
     */
    #[Api]
    public string $name;

    /**
     * Allow partial payments.
     */
    #[Api]
    public bool $partial_payment;

    /**
     * Whether to generate a payment link.
     */
    #[Api]
    public bool $payment_link;

    /**
     * Array of accepted payment methods.
     *
     * @var list<value-of<PaymentMethod>> $payment_methods
     */
    #[Api(list: PaymentMethod::class)]
    public array $payment_methods;

    /**
     * Invoice status.
     *
     * @var value-of<Status> $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * Address.
     */
    #[Api(optional: true)]
    public ?string $address;

    /**
     * Logo URL.
     */
    #[Api(optional: true)]
    public ?string $logo;

    /**
     * Phone number.
     */
    #[Api(optional: true)]
    public ?string $phone_number;

    /**
     * Send date.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $send_date;

    /**
     * Tax ID.
     */
    #[Api(optional: true)]
    public ?string $taxId;

    /**
     * `new CreateInvoice()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CreateInvoice::with(
     *   currency: ...,
     *   customer_id: ...,
     *   delivery: ...,
     *   due_date: ...,
     *   email: ...,
     *   items: ...,
     *   name: ...,
     *   partial_payment: ...,
     *   payment_link: ...,
     *   payment_methods: ...,
     *   status: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CreateInvoice)
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
     * @param list<Item|array{product_id: string, quantity: float}> $items
     * @param list<PaymentMethod|value-of<PaymentMethod>> $payment_methods
     * @param Status|value-of<Status> $status
     */
    public static function with(
        Currency|string $currency,
        string $customer_id,
        Delivery|string $delivery,
        \DateTimeInterface $due_date,
        string $email,
        array $items,
        string $name,
        bool $partial_payment,
        bool $payment_link,
        array $payment_methods,
        Status|string $status,
        ?string $address = null,
        ?string $logo = null,
        ?string $phone_number = null,
        ?\DateTimeInterface $send_date = null,
        ?string $taxId = null,
    ): self {
        $obj = new self;

        $obj['currency'] = $currency;
        $obj['customer_id'] = $customer_id;
        $obj['delivery'] = $delivery;
        $obj['due_date'] = $due_date;
        $obj['email'] = $email;
        $obj['items'] = $items;
        $obj['name'] = $name;
        $obj['partial_payment'] = $partial_payment;
        $obj['payment_link'] = $payment_link;
        $obj['payment_methods'] = $payment_methods;
        $obj['status'] = $status;

        null !== $address && $obj['address'] = $address;
        null !== $logo && $obj['logo'] = $logo;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $send_date && $obj['send_date'] = $send_date;
        null !== $taxId && $obj['taxId'] = $taxId;

        return $obj;
    }

    /**
     * Currency for the invoice.
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
     * Customer ID.
     */
    public function withCustomerID(string $customerID): self
    {
        $obj = clone $this;
        $obj['customer_id'] = $customerID;

        return $obj;
    }

    /**
     * Delivery method.
     *
     * @param Delivery|value-of<Delivery> $delivery
     */
    public function withDelivery(Delivery|string $delivery): self
    {
        $obj = clone $this;
        $obj['delivery'] = $delivery;

        return $obj;
    }

    /**
     * Due date of the invoice.
     */
    public function withDueDate(\DateTimeInterface $dueDate): self
    {
        $obj = clone $this;
        $obj['due_date'] = $dueDate;

        return $obj;
    }

    /**
     * Email address.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    /**
     * Array of products in the invoice.
     *
     * @param list<Item|array{product_id: string, quantity: float}> $items
     */
    public function withItems(array $items): self
    {
        $obj = clone $this;
        $obj['items'] = $items;

        return $obj;
    }

    /**
     * Name of the invoice.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Allow partial payments.
     */
    public function withPartialPayment(bool $partialPayment): self
    {
        $obj = clone $this;
        $obj['partial_payment'] = $partialPayment;

        return $obj;
    }

    /**
     * Whether to generate a payment link.
     */
    public function withPaymentLink(bool $paymentLink): self
    {
        $obj = clone $this;
        $obj['payment_link'] = $paymentLink;

        return $obj;
    }

    /**
     * Array of accepted payment methods.
     *
     * @param list<PaymentMethod|value-of<PaymentMethod>> $paymentMethods
     */
    public function withPaymentMethods(array $paymentMethods): self
    {
        $obj = clone $this;
        $obj['payment_methods'] = $paymentMethods;

        return $obj;
    }

    /**
     * Invoice status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Address.
     */
    public function withAddress(string $address): self
    {
        $obj = clone $this;
        $obj['address'] = $address;

        return $obj;
    }

    /**
     * Logo URL.
     */
    public function withLogo(string $logo): self
    {
        $obj = clone $this;
        $obj['logo'] = $logo;

        return $obj;
    }

    /**
     * Phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

    /**
     * Send date.
     */
    public function withSendDate(\DateTimeInterface $sendDate): self
    {
        $obj = clone $this;
        $obj['send_date'] = $sendDate;

        return $obj;
    }

    /**
     * Tax ID.
     */
    public function withTaxID(string $taxID): self
    {
        $obj = clone $this;
        $obj['taxId'] = $taxID;

        return $obj;
    }
}
