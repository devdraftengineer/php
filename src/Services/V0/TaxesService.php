<?php

declare(strict_types=1);

namespace Devdraft\Services\V0;

use Devdraft\Client;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\Core\Util;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\TaxesContract;
use Devdraft\V0\Taxes\TaxNewResponse;

final class TaxesService implements TaxesContract
{
    /**
     * @api
     */
    public TaxesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TaxesRawService($client);
    }

    /**
     * @api
     *
     * Creates a new tax rate that can be applied to products, invoices, and payment links.
     *
     * ## Use Cases
     * - Set up sales tax for different regions
     * - Create VAT rates for international customers
     * - Configure state and local tax rates
     * - Manage tax compliance requirements
     *
     * ## Example: Create Basic Sales Tax
     * ```json
     * {
     *   "name": "Sales Tax",
     *   "description": "Standard sales tax for retail transactions",
     *   "percentage": 8.5,
     *   "active": true
     * }
     * ```
     *
     * ## Required Fields
     * - `name`: Tax name for identification (1-100 characters)
     * - `percentage`: Tax rate percentage (0-100)
     *
     * ## Optional Fields
     * - `description`: Explanation of what this tax covers (max 255 characters)
     * - `active`: Whether this tax is currently active (default: true)
     * - `appIds`: Array of app IDs where this tax should be available
     *
     * @param string $name Tax name. Used to identify and reference this tax rate.
     * @param float $percentage Tax percentage rate. Must be between 0 and 100.
     * @param bool $active whether this tax is currently active and can be applied
     * @param list<string> $appIDs Array of app IDs where this tax should be available. If not provided, tax will be available for the current app.
     * @param string $description optional description explaining what this tax covers
     *
     * @throws APIException
     */
    public function create(
        string $name,
        float $percentage,
        bool $active = true,
        ?array $appIDs = null,
        ?string $description = null,
        ?RequestOptions $requestOptions = null,
    ): TaxNewResponse {
        $params = Util::removeNulls(
            [
                'name' => $name,
                'percentage' => $percentage,
                'active' => $active,
                'appIDs' => $appIDs,
                'description' => $description,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves detailed information about a specific tax.
     *
     * ## Use Cases
     * - View tax details
     * - Verify tax configuration
     * - Check tax status before applying to products
     *
     * ## Path Parameters
     * - `id`: Tax UUID (required) - Must be a valid UUID format
     *
     * ## Example Request
     * `GET /api/v0/taxes/123e4567-e89b-12d3-a456-426614174000`
     *
     * ## Example Response
     * ```json
     * {
     *   "id": "tax_123456",
     *   "name": "Sales Tax",
     *   "description": "Standard sales tax for retail transactions",
     *   "percentage": 8.5,
     *   "active": true,
     *   "created_at": "2024-03-20T10:00:00Z",
     *   "updated_at": "2024-03-20T10:00:00Z"
     * }
     * ```
     *
     * @param string $id Tax unique identifier (UUID)
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
     * Updates an existing tax's information.
     *
     * ## Use Cases
     * - Modify tax percentage rates
     * - Update tax descriptions
     * - Activate/deactivate taxes
     * - Change tax names
     *
     * ## Path Parameters
     * - `id`: Tax UUID (required) - Must be a valid UUID format
     *
     * ## Example Request
     * `PUT /api/v0/taxes/123e4567-e89b-12d3-a456-426614174000`
     *
     * ## Example Request Body
     * ```json
     * {
     *   "name": "Updated Sales Tax",
     *   "description": "Updated sales tax rate",
     *   "percentage": 9.0,
     *   "active": true
     * }
     * ```
     *
     * ## Notes
     * - Only include fields that need to be updated
     * - All fields are optional in updates
     * - Percentage changes affect future calculations only
     *
     * @param string $id Tax unique identifier (UUID)
     * @param bool $active Whether this tax is currently active and can be applied
     * @param list<string> $appIDs Array of app IDs where this tax should be available
     * @param string $description Detailed description of what this tax covers
     * @param string $name Tax name for identification and display purposes
     * @param float $percentage Tax rate as a percentage (0-100)
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?bool $active = null,
        ?array $appIDs = null,
        ?string $description = null,
        ?string $name = null,
        ?float $percentage = null,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'active' => $active,
                'appIDs' => $appIDs,
                'description' => $description,
                'name' => $name,
                'percentage' => $percentage,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves a list of taxes with optional filtering and pagination.
     *
     * ## Use Cases
     * - List all available tax rates
     * - Search taxes by name
     * - Filter active/inactive taxes
     * - Export tax configuration
     *
     * ## Query Parameters
     * - `skip`: Number of records to skip (default: 0, min: 0)
     * - `take`: Number of records to return (default: 10, min: 1, max: 100)
     * - `name`: Filter taxes by name (partial match, case-insensitive)
     * - `active`: Filter by active status (true/false)
     *
     * ## Example Request
     * `GET /api/v0/taxes?skip=0&take=20&active=true&name=Sales`
     *
     * ## Example Response
     * ```json
     * [
     *   {
     *     "id": "tax_123456",
     *     "name": "Sales Tax",
     *     "description": "Standard sales tax for retail transactions",
     *     "percentage": 8.5,
     *     "active": true,
     *     "created_at": "2024-03-20T10:00:00Z",
     *     "updated_at": "2024-03-20T10:00:00Z"
     *   }
     * ]
     * ```
     *
     * @param bool $active Filter by active status
     * @param string $name Filter taxes by name (partial match, case-insensitive)
     * @param float $skip Number of records to skip for pagination
     * @param float $take Number of records to return (max 100)
     *
     * @throws APIException
     */
    public function list(
        ?bool $active = null,
        ?string $name = null,
        float $skip = 0,
        float $take = 10,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['active' => $active, 'name' => $name, 'skip' => $skip, 'take' => $take]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes an existing tax.
     *
     * ## Use Cases
     * - Remove obsolete tax rates
     * - Clean up unused taxes
     * - Comply with regulatory changes
     *
     * ## Path Parameters
     * - `id`: Tax UUID (required) - Must be a valid UUID format
     *
     * ## Example Request
     * `DELETE /api/v0/taxes/123e4567-e89b-12d3-a456-426614174000`
     *
     * ## Warning
     * This action cannot be undone. Consider deactivating the tax instead of deleting it if it has been used in transactions.
     *
     * @param string $id Tax unique identifier (UUID)
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint requires a tax ID in the URL path. Use DELETE /api/v0/taxes/{id} instead.
     *
     * @throws APIException
     */
    public function deleteAll(?RequestOptions $requestOptions = null): mixed
    {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteAll(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint requires a tax ID in the URL path. Use PUT /api/v0/taxes/{id} instead.
     *
     * @throws APIException
     */
    public function updateAll(?RequestOptions $requestOptions = null): mixed
    {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateAll(requestOptions: $requestOptions);

        return $response->parse();
    }
}
