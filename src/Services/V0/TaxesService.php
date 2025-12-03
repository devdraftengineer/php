<?php

declare(strict_types=1);

namespace Devdraft\Services\V0;

use Devdraft\Client;
use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\ServiceContracts\V0\TaxesContract;
use Devdraft\V0\Taxes\TaxCreateParams;
use Devdraft\V0\Taxes\TaxListParams;
use Devdraft\V0\Taxes\TaxNewResponse;
use Devdraft\V0\Taxes\TaxUpdateParams;

final class TaxesService implements TaxesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     * @param array{
     *   name: string,
     *   percentage: float,
     *   active?: bool,
     *   appIds?: list<string>,
     *   description?: string,
     * }|TaxCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|TaxCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): TaxNewResponse {
        [$parsed, $options] = TaxCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'api/v0/taxes',
            body: (object) $parsed,
            options: $options,
            convert: TaxNewResponse::class,
        );
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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['api/v0/taxes/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
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
     * @param array{
     *   active?: bool,
     *   appIds?: list<string>,
     *   description?: string,
     *   name?: string,
     *   percentage?: float,
     * }|TaxUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|TaxUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = TaxUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['api/v0/taxes/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
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
     * @param array{
     *   active?: bool, name?: string, skip?: float, take?: float
     * }|TaxListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|TaxListParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = TaxListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'api/v0/taxes',
            query: $parsed,
            options: $options,
            convert: null,
        );
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
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['api/v0/taxes/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: 'api/v0/taxes',
            options: $requestOptions,
            convert: null,
        );
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: 'api/v0/taxes',
            options: $requestOptions,
            convert: null,
        );
    }
}
