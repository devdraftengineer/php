<?php

declare(strict_types=1);

namespace Devdraft\V0\Invoices;

use Devdraft\Core\Attributes\Optional;
use Devdraft\Core\Attributes\Required;
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
 *   customerID: string,
 *   delivery: value-of<Delivery>,
 *   dueDate: \DateTimeInterface,
 *   email: string,
 *   items: list<Item>,
 *   name: string,
 *   partialPayment: bool,
 *   paymentLink: bool,
 *   paymentMethods: list<value-of<PaymentMethod>>,
 *   status: value-of<Status>,
 *   address?: string|null,
 *   logo?: string|null,
 *   phoneNumber?: string|null,
 *   sendDate?: \DateTimeInterface|null,
 *   taxID?: string|null,
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
     * `new CreateInvoice()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CreateInvoice::with(
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
        $obj = new self;

        $obj['currency'] = $currency;
        $obj['customerID'] = $customerID;
        $obj['delivery'] = $delivery;
        $obj['dueDate'] = $dueDate;
        $obj['email'] = $email;
        $obj['items'] = $items;
        $obj['name'] = $name;
        $obj['partialPayment'] = $partialPayment;
        $obj['paymentLink'] = $paymentLink;
        $obj['paymentMethods'] = $paymentMethods;
        $obj['status'] = $status;

        null !== $address && $obj['address'] = $address;
        null !== $logo && $obj['logo'] = $logo;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
        null !== $sendDate && $obj['sendDate'] = $sendDate;
        null !== $taxID && $obj['taxID'] = $taxID;

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
        $obj['customerID'] = $customerID;

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
        $obj['dueDate'] = $dueDate;

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
     * @param list<Item|array{productID: string, quantity: float}> $items
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
        $obj['partialPayment'] = $partialPayment;

        return $obj;
    }

    /**
     * Whether to generate a payment link.
     */
    public function withPaymentLink(bool $paymentLink): self
    {
        $obj = clone $this;
        $obj['paymentLink'] = $paymentLink;

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
        $obj['paymentMethods'] = $paymentMethods;

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
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * Send date.
     */
    public function withSendDate(\DateTimeInterface $sendDate): self
    {
        $obj = clone $this;
        $obj['sendDate'] = $sendDate;

        return $obj;
    }

    /**
     * Tax ID.
     */
    public function withTaxID(string $taxID): self
    {
        $obj = clone $this;
        $obj['taxID'] = $taxID;

        return $obj;
    }
}
