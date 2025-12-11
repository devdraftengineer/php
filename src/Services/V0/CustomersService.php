<?php

declare(strict_types=1);

namespace Devdraft\Services\V0;

use Devdraft\Client;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\Core\Util;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\CustomersContract;
use Devdraft\Services\V0\Customers\LiquidationAddressesService;
use Devdraft\V0\Customers\CustomerStatus;
use Devdraft\V0\Customers\CustomerType;

final class CustomersService implements CustomersContract
{
    /**
     * @api
     */
    public CustomersRawService $raw;

    /**
     * @api
     */
    public LiquidationAddressesService $liquidationAddresses;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CustomersRawService($client);
        $this->liquidationAddresses = new LiquidationAddressesService($client);
    }

    /**
     * @api
     *
     * Creates a new customer in the system with their personal and contact information.
     *
     * This endpoint allows you to register new customers and store their details for future transactions.
     *
     * ## Use Cases
     * - Register new customers for payment processing
     * - Store customer information for recurring payments
     * - Maintain customer profiles for transaction history
     *
     * ## Example: Create New Customer
     * ```json
     * {
     *   "first_name": "John",
     *   "last_name": "Doe",
     *   "email": "john.doe@example.com",
     *   "phone_number": "+1-555-123-4567",
     *   "customer_type": "Startup",
     *   "status": "ACTIVE"
     * }
     * ```
     *
     * ## Required Fields
     * - `first_name`: Customer's first name (1-100 characters)
     * - `last_name`: Customer's last name (1-100 characters)
     * - `phone_number`: Customer's phone number (max 20 characters)
     *
     * ## Optional Fields
     * - `email`: Valid email address (max 255 characters)
     * - `customer_type`: Type of customer account (Individual, Startup, Small Business, Medium Business, Enterprise, Non-Profit, Government)
     * - `status`: Customer status (ACTIVE, BLACKLISTED, DEACTIVATED)
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
    ): mixed {
        $params = Util::removeNulls(
            [
                'firstName' => $firstName,
                'lastName' => $lastName,
                'phoneNumber' => $phoneNumber,
                'customerType' => $customerType,
                'email' => $email,
                'status' => $status,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves detailed information about a specific customer.
     *
     * This endpoint allows you to fetch complete customer details including their contact information and status.
     *
     * ## Use Cases
     * - View customer details
     * - Verify customer information
     * - Check customer status before processing payments
     *
     * ## Path Parameters
     * - `id`: Customer UUID (required) - Must be a valid UUID format
     *
     * ## Example Request
     * `GET /api/v0/customers/123e4567-e89b-12d3-a456-426614174000`
     *
     * ## Example Response
     * ```json
     * {
     *   "id": "cust_123456",
     *   "first_name": "John",
     *   "last_name": "Doe",
     *   "email": "john.doe@example.com",
     *   "phone_number": "+1-555-123-4567",
     *   "customer_type": "Enterprise",
     *   "status": "ACTIVE",
     *   "last_spent": 1250.50,
     *   "last_purchase_date": "2024-03-15T14:30:00Z",
     *   "created_at": "2024-03-20T10:00:00Z",
     *   "updated_at": "2024-03-20T10:00:00Z"
     * }
     * ```
     *
     * @param string $id Customer unique identifier (UUID)
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates an existing customer's information.
     *
     * This endpoint allows you to modify customer details while preserving their core information.
     *
     * ## Use Cases
     * - Update customer contact information
     * - Change customer type
     * - Modify customer status
     *
     * ## Path Parameters
     * - `id`: Customer UUID (required) - Must be a valid UUID format
     *
     * ## Example Request
     * `PATCH /api/v0/customers/123e4567-e89b-12d3-a456-426614174000`
     *
     * ## Example Request Body
     * ```json
     * {
     *   "first_name": "John",
     *   "last_name": "Smith",
     *   "phone_number": "+1-987-654-3210",
     *   "customer_type": "Small Business"
     * }
     * ```
     *
     * ## Notes
     * - Only include fields that need to be updated
     * - All fields are optional in updates
     * - Status changes may require additional verification
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
    ): mixed {
        $params = Util::removeNulls(
            [
                'customerType' => $customerType,
                'email' => $email,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'phoneNumber' => $phoneNumber,
                'status' => $status,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves a list of customers with optional filtering and pagination.
     *
     * This endpoint allows you to search and filter customers based on various criteria.
     *
     * ## Use Cases
     * - List all customers with pagination
     * - Search customers by name or email
     * - Filter customers by status
     * - Export customer data
     *
     * ## Query Parameters
     * - `skip`: Number of records to skip (default: 0, min: 0)
     * - `take`: Number of records to take (default: 10, min: 1, max: 100)
     * - `status`: Filter by customer status (ACTIVE, BLACKLISTED, DEACTIVATED)
     * - `name`: Filter by customer name (partial match, case-insensitive)
     * - `email`: Filter by customer email (exact match, case-insensitive)
     *
     * ## Example Request
     * `GET /api/v0/customers?skip=0&take=20&status=ACTIVE&name=John`
     *
     * ## Example Response
     * ```json
     * {
     *   "data": [
     *     {
     *       "id": "cust_123456",
     *       "first_name": "John",
     *       "last_name": "Doe",
     *       "email": "john.doe@example.com",
     *       "phone_number": "+1-555-123-4567",
     *       "customer_type": "Startup",
     *       "status": "ACTIVE",
     *       "created_at": "2024-03-20T10:00:00Z",
     *       "updated_at": "2024-03-20T10:00:00Z"
     *     }
     *   ],
     *   "total": 100,
     *   "skip": 0,
     *   "take": 10
     * }
     * ```
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
    ): mixed {
        $params = Util::removeNulls(
            [
                'email' => $email,
                'name' => $name,
                'skip' => $skip,
                'status' => $status,
                'take' => $take,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
