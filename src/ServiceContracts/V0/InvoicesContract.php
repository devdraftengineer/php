<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\Invoices\InvoiceCreateParams\Currency;
use Devdraft\V0\Invoices\InvoiceCreateParams\Delivery;
use Devdraft\V0\Invoices\InvoiceCreateParams\PaymentMethod;
use Devdraft\V0\Invoices\InvoiceCreateParams\Status;

interface InvoicesContract
{
    /**
     * @api
     *
     * @param 'usdc'|'eurc'|Currency $currency Currency for the invoice
     * @param string $customerID Customer ID
     * @param 'EMAIL'|'MANUALLY'|Delivery $delivery Delivery method
     * @param string|\DateTimeInterface $dueDate Due date of the invoice
     * @param string $email Email address
     * @param list<array{
     *   productID: string, quantity: float
     * }> $items Array of products in the invoice
     * @param string $name Name of the invoice
     * @param bool $partialPayment Allow partial payments
     * @param bool $paymentLink Whether to generate a payment link
     * @param list<'ACH'|'BANK_TRANSFER'|'CREDIT_CARD'|'CASH'|'MOBILE_MONEY'|'CRYPTO'|PaymentMethod> $paymentMethods Array of accepted payment methods
     * @param 'DRAFT'|'OPEN'|'PASTDUE'|'PAID'|'PARTIALLYPAID'|Status $status Invoice status
     * @param string $address Address
     * @param string $logo Logo URL
     * @param string $phoneNumber Phone number
     * @param string|\DateTimeInterface $sendDate Send date
     * @param string $taxID Tax ID
     *
     * @throws APIException
     */
    public function create(
        string|Currency $currency,
        string $customerID,
        string|Delivery $delivery,
        string|\DateTimeInterface $dueDate,
        string $email,
        array $items,
        string $name,
        bool $partialPayment,
        bool $paymentLink,
        array $paymentMethods,
        string|Status $status,
        ?string $address = null,
        ?string $logo = null,
        ?string $phoneNumber = null,
        string|\DateTimeInterface|null $sendDate = null,
        ?string $taxID = null,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $id Invoice ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $id Invoice ID
     * @param 'usdc'|'eurc'|\Devdraft\V0\Invoices\InvoiceUpdateParams\Currency $currency Currency for the invoice
     * @param string $customerID Customer ID
     * @param 'EMAIL'|'MANUALLY'|\Devdraft\V0\Invoices\InvoiceUpdateParams\Delivery $delivery Delivery method
     * @param string|\DateTimeInterface $dueDate Due date of the invoice
     * @param string $email Email address
     * @param list<array{
     *   productID: string, quantity: float
     * }> $items Array of products in the invoice
     * @param string $name Name of the invoice
     * @param bool $partialPayment Allow partial payments
     * @param bool $paymentLink Whether to generate a payment link
     * @param list<'ACH'|'BANK_TRANSFER'|'CREDIT_CARD'|'CASH'|'MOBILE_MONEY'|'CRYPTO'|\Devdraft\V0\Invoices\InvoiceUpdateParams\PaymentMethod> $paymentMethods Array of accepted payment methods
     * @param 'DRAFT'|'OPEN'|'PASTDUE'|'PAID'|'PARTIALLYPAID'|\Devdraft\V0\Invoices\InvoiceUpdateParams\Status $status Invoice status
     * @param string $address Address
     * @param string $logo Logo URL
     * @param string $phoneNumber Phone number
     * @param string|\DateTimeInterface $sendDate Send date
     * @param string $taxID Tax ID
     *
     * @throws APIException
     */
    public function update(
        string $id,
        string|\Devdraft\V0\Invoices\InvoiceUpdateParams\Currency $currency,
        string $customerID,
        string|\Devdraft\V0\Invoices\InvoiceUpdateParams\Delivery $delivery,
        string|\DateTimeInterface $dueDate,
        string $email,
        array $items,
        string $name,
        bool $partialPayment,
        bool $paymentLink,
        array $paymentMethods,
        string|\Devdraft\V0\Invoices\InvoiceUpdateParams\Status $status,
        ?string $address = null,
        ?string $logo = null,
        ?string $phoneNumber = null,
        string|\DateTimeInterface|null $sendDate = null,
        ?string $taxID = null,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param float $skip Number of records to skip
     * @param float $take Number of records to take
     *
     * @throws APIException
     */
    public function list(
        ?float $skip = null,
        ?float $take = null,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
