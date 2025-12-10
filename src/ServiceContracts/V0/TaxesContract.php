<?php

declare(strict_types=1);

namespace Devdraft\ServiceContracts\V0;

use Devdraft\Core\Exceptions\APIException;
use Devdraft\RequestOptions;
use Devdraft\V0\Taxes\TaxNewResponse;

interface TaxesContract
{
    /**
     * @api
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
    ): TaxNewResponse;

    /**
     * @api
     *
     * @param string $id Tax unique identifier (UUID)
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
    ): mixed;

    /**
     * @api
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
    ): mixed;

    /**
     * @api
     *
     * @param string $id Tax unique identifier (UUID)
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteAll(?RequestOptions $requestOptions = null): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function updateAll(?RequestOptions $requestOptions = null): mixed;
}
