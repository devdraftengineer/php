<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\Customers\CustomerStatus;
use Devdraft\V0\Customers\CustomerType;

/**
 * @phpstan-import-type RequestOpts from \Devdraft\RequestOptions
 */
interface CustomersContract
{
    /**
     * @api
     *
     * @param string $firstName Customer's first name. Used for personalization and legal documentation.
     * @param string $lastName Customer's last name. Used for personalization and legal documentation.
     * @param string $phoneNumber Customer's phone number. Used for SMS notifications and verification. Include country code for international numbers.
     * @param CustomerType|value-of<CustomerType> $customerType Type of customer account. Determines available features and compliance requirements.
     * @param string $email Customer's email address. Used for notifications, receipts, and account management. Must be a valid email format.
     * @param CustomerStatus|value-of<CustomerStatus> $status Current status of the customer account. Controls access to services and features.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $firstName,
        string $lastName,
        string $phoneNumber,
        CustomerType|string|null $customerType = null,
        ?string $email = null,
        CustomerStatus|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $id Customer unique identifier (UUID)
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
     * @param string $id Customer unique identifier (UUID)
     * @param CustomerType|value-of<CustomerType> $customerType Type of customer account. Determines available features and compliance requirements.
     * @param string $email Customer's email address. Used for notifications, receipts, and account management. Must be a valid email format.
     * @param string $firstName Customer's first name. Used for personalization and legal documentation.
     * @param string $lastName Customer's last name. Used for personalization and legal documentation.
     * @param string $phoneNumber Customer's phone number. Used for SMS notifications and verification. Include country code for international numbers.
     * @param CustomerStatus|value-of<CustomerStatus> $status Current status of the customer account. Controls access to services and features.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        CustomerType|string|null $customerType = null,
        ?string $email = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $phoneNumber = null,
        CustomerStatus|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $email Filter customers by email (exact match, case-insensitive)
     * @param string $name Filter customers by name (partial match, case-insensitive)
     * @param float $skip Number of records to skip for pagination
     * @param CustomerStatus|value-of<CustomerStatus> $status Filter customers by status
     * @param float $take Number of records to return (max 100)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        ?string $email = null,
        ?string $name = null,
        float $skip = 0,
        CustomerStatus|string|null $status = null,
        float $take = 10,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
