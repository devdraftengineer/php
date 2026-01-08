<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\Invoices\InvoiceCreateParams\Currency;
use Devdraft\V0\Invoices\InvoiceCreateParams\Delivery;
use Devdraft\V0\Invoices\InvoiceCreateParams\Item;
use Devdraft\V0\Invoices\InvoiceCreateParams\PaymentMethod;
use Devdraft\V0\Invoices\InvoiceCreateParams\Status;

/**
 * @phpstan-import-type ItemShape from \Devdraft\V0\Invoices\InvoiceCreateParams\Item
 * @phpstan-import-type ItemShape from \Devdraft\V0\Invoices\InvoiceUpdateParams\Item as ItemShape1
 * @phpstan-import-type RequestOpts from \Devdraft\RequestOptions
 */
interface InvoicesContract
{
    /**
     * @api
     *
     * @param Currency|value-of<Currency> $currency Currency for the invoice
     * @param string $customerID Customer ID
     * @param Delivery|value-of<Delivery> $delivery Delivery method
     * @param \DateTimeInterface $dueDate Due date of the invoice
     * @param string $email Email address
     * @param list<Item|ItemShape> $items Array of products in the invoice
     * @param string $name Name of the invoice
     * @param bool $partialPayment Allow partial payments
     * @param bool $paymentLink Whether to generate a payment link
     * @param list<PaymentMethod|value-of<PaymentMethod>> $paymentMethods Array of accepted payment methods
     * @param Status|value-of<Status> $status Invoice status
     * @param string $address Address
     * @param string $logo Logo URL
     * @param string $phoneNumber Phone number
     * @param \DateTimeInterface $sendDate Send date
     * @param string $taxID Tax ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
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
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $id Invoice ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $id Invoice ID
     * @param \Devdraft\V0\Invoices\InvoiceUpdateParams\Currency|value-of<\Devdraft\V0\Invoices\InvoiceUpdateParams\Currency> $currency Currency for the invoice
     * @param string $customerID Customer ID
     * @param \Devdraft\V0\Invoices\InvoiceUpdateParams\Delivery|value-of<\Devdraft\V0\Invoices\InvoiceUpdateParams\Delivery> $delivery Delivery method
     * @param \DateTimeInterface $dueDate Due date of the invoice
     * @param string $email Email address
     * @param list<\Devdraft\V0\Invoices\InvoiceUpdateParams\Item|ItemShape1> $items Array of products in the invoice
     * @param string $name Name of the invoice
     * @param bool $partialPayment Allow partial payments
     * @param bool $paymentLink Whether to generate a payment link
     * @param list<\Devdraft\V0\Invoices\InvoiceUpdateParams\PaymentMethod|value-of<\Devdraft\V0\Invoices\InvoiceUpdateParams\PaymentMethod>> $paymentMethods Array of accepted payment methods
     * @param \Devdraft\V0\Invoices\InvoiceUpdateParams\Status|value-of<\Devdraft\V0\Invoices\InvoiceUpdateParams\Status> $status Invoice status
     * @param string $address Address
     * @param string $logo Logo URL
     * @param string $phoneNumber Phone number
     * @param \DateTimeInterface $sendDate Send date
     * @param string $taxID Tax ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        \Devdraft\V0\Invoices\InvoiceUpdateParams\Currency|string $currency,
        string $customerID,
        \Devdraft\V0\Invoices\InvoiceUpdateParams\Delivery|string $delivery,
        \DateTimeInterface $dueDate,
        string $email,
        array $items,
        string $name,
        bool $partialPayment,
        bool $paymentLink,
        array $paymentMethods,
        \Devdraft\V0\Invoices\InvoiceUpdateParams\Status|string $status,
        ?string $address = null,
        ?string $logo = null,
        ?string $phoneNumber = null,
        ?\DateTimeInterface $sendDate = null,
        ?string $taxID = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param float $skip Number of records to skip
     * @param float $take Number of records to take
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        ?float $skip = null,
        ?float $take = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
