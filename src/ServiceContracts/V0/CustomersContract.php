<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\Customers\CustomerStatus;
use Devdraft\V0\Customers\CustomerType;

interface CustomersContract
{
    /**
     * @api
     *
     * @param string $firstName Customer's first name. Used for personalization and legal documentation.
     * @param string $lastName Customer's last name. Used for personalization and legal documentation.
     * @param string $phoneNumber Customer's phone number. Used for SMS notifications and verification. Include country code for international numbers.
     * @param 'Individual'|'Startup'|'Small Business'|'Medium Business'|'Enterprise'|'Non-Profit'|'Government'|CustomerType $customerType Type of customer account. Determines available features and compliance requirements.
     * @param string $email Customer's email address. Used for notifications, receipts, and account management. Must be a valid email format.
     * @param 'ACTIVE'|'BLACKLISTED'|'DEACTIVATED'|'DELETED'|CustomerStatus $status Current status of the customer account. Controls access to services and features.
     *
     * @throws APIException
     */
    public function create(
        string $firstName,
        string $lastName,
        string $phoneNumber,
        string|CustomerType|null $customerType = null,
        ?string $email = null,
        string|CustomerStatus|null $status = null,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $id Customer unique identifier (UUID)
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
     * @param string $id Customer unique identifier (UUID)
     * @param 'Individual'|'Startup'|'Small Business'|'Medium Business'|'Enterprise'|'Non-Profit'|'Government'|CustomerType $customerType Type of customer account. Determines available features and compliance requirements.
     * @param string $email Customer's email address. Used for notifications, receipts, and account management. Must be a valid email format.
     * @param string $firstName Customer's first name. Used for personalization and legal documentation.
     * @param string $lastName Customer's last name. Used for personalization and legal documentation.
     * @param string $phoneNumber Customer's phone number. Used for SMS notifications and verification. Include country code for international numbers.
     * @param 'ACTIVE'|'BLACKLISTED'|'DEACTIVATED'|'DELETED'|CustomerStatus $status Current status of the customer account. Controls access to services and features.
     *
     * @throws APIException
     */
    public function update(
        string $id,
        string|CustomerType|null $customerType = null,
        ?string $email = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $phoneNumber = null,
        string|CustomerStatus|null $status = null,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $email Filter customers by email (exact match, case-insensitive)
     * @param string $name Filter customers by name (partial match, case-insensitive)
     * @param float $skip Number of records to skip for pagination
     * @param 'ACTIVE'|'BLACKLISTED'|'DEACTIVATED'|'DELETED'|CustomerStatus $status Filter customers by status
     * @param float $take Number of records to return (max 100)
     *
     * @throws APIException
     */
    public function list(
        ?string $email = null,
        ?string $name = null,
        float $skip = 0,
        string|CustomerStatus|null $status = null,
        float $take = 10,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
