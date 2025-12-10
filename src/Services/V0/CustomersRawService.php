<?php

declare(strict_types=1);

namespace Devdraft\Services\V0;

use Devdraft\Client;
use Devdraft\Core\Contracts\BaseResponse;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\CustomersRawContract;
use Devdraft\V0\Customers\CustomerCreateParams;
use Devdraft\V0\Customers\CustomerListParams;
use Devdraft\V0\Customers\CustomerStatus;
use Devdraft\V0\Customers\CustomerType;
use Devdraft\V0\Customers\CustomerUpdateParams;

final class CustomersRawService implements CustomersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     * @param array{
     *   firstName: string,
     *   lastName: string,
     *   phoneNumber: string,
     *   customerType?: value-of<CustomerType>,
     *   email?: string,
     *   status?: 'ACTIVE'|'BLACKLISTED'|'DEACTIVATED'|'DELETED'|CustomerStatus,
     * }|CustomerCreateParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function create(
        array|CustomerCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = CustomerCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/v0/customers',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
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
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/v0/customers/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
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
     * @param array{
     *   customerType?: value-of<CustomerType>,
     *   email?: string,
     *   firstName?: string,
     *   lastName?: string,
     *   phoneNumber?: string,
     *   status?: 'ACTIVE'|'BLACKLISTED'|'DEACTIVATED'|'DELETED'|CustomerStatus,
     * }|CustomerUpdateParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|CustomerUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CustomerUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['api/v0/customers/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
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
     * @param array{
     *   email?: string,
     *   name?: string,
     *   skip?: float,
     *   status?: 'ACTIVE'|'BLACKLISTED'|'DEACTIVATED'|'DELETED'|CustomerStatus,
     *   take?: float,
     * }|CustomerListParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function list(
        array|CustomerListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = CustomerListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'api/v0/customers',
            query: $parsed,
            options: $options,
            convert: null,
        );
    }
}
