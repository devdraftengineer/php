<?php

declare(strict_types=1);

namespace Devdraft\V0\Health;

use Devdraft\Core\Attributes\Api;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkResponse;
use Devdraft\Core\Contracts\BaseModel;
use Devdraft\Core\Conversion\Contracts\ResponseConverter;
use Devdraft\V0\Health\HealthCheckResponse\Database;
use Devdraft\V0\Health\HealthCheckResponse\Status;

/**
 * @phpstan-type HealthCheckResponseShape = array{
 *   authenticated: bool,
 *   database: value-of<Database>,
 *   message: string,
 *   status: value-of<Status>,
 *   timestamp: \DateTimeInterface,
 *   version: string,
 * }
 */
final class HealthCheckResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<HealthCheckResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Indicates whether the request was properly authenticated. Always true for this endpoint since authentication is required.
     */
    #[Api]
    public bool $authenticated;

    /**
     * Database connectivity status. Shows "connected" when database is accessible, "error" when connection fails.
     *
     * @var value-of<Database> $database
     */
    #[Api(enum: Database::class)]
    public string $database;

    /**
     * Human-readable message describing the current health status and any issues.
     */
    #[Api]
    public string $message;

    /**
     * Overall health status of the service. Returns "ok" when healthy, "error" when issues detected.
     *
     * @var value-of<Status> $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * ISO 8601 timestamp when the health check was performed.
     */
    #[Api]
    public \DateTimeInterface $timestamp;

    /**
     * Current version of the API service. Useful for debugging and compatibility checks.
     */
    #[Api]
    public string $version;

    /**
     * `new HealthCheckResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HealthCheckResponse::with(
     *   authenticated: ...,
     *   database: ...,
     *   message: ...,
     *   status: ...,
     *   timestamp: ...,
     *   version: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HealthCheckResponse)
     *   ->withAuthenticated(...)
     *   ->withDatabase(...)
     *   ->withMessage(...)
     *   ->withStatus(...)
     *   ->withTimestamp(...)
     *   ->withVersion(...)
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
     * @param Database|value-of<Database> $database
     * @param Status|value-of<Status> $status
     */
    public static function with(
        bool $authenticated,
        Database|string $database,
        string $message,
        Status|string $status,
        \DateTimeInterface $timestamp,
        string $version,
    ): self {
        $obj = new self;

        $obj['authenticated'] = $authenticated;
        $obj['database'] = $database;
        $obj['message'] = $message;
        $obj['status'] = $status;
        $obj['timestamp'] = $timestamp;
        $obj['version'] = $version;

        return $obj;
    }

    /**
     * Indicates whether the request was properly authenticated. Always true for this endpoint since authentication is required.
     */
    public function withAuthenticated(bool $authenticated): self
    {
        $obj = clone $this;
        $obj['authenticated'] = $authenticated;

        return $obj;
    }

    /**
     * Database connectivity status. Shows "connected" when database is accessible, "error" when connection fails.
     *
     * @param Database|value-of<Database> $database
     */
    public function withDatabase(Database|string $database): self
    {
        $obj = clone $this;
        $obj['database'] = $database;

        return $obj;
    }

    /**
     * Human-readable message describing the current health status and any issues.
     */
    public function withMessage(string $message): self
    {
        $obj = clone $this;
        $obj['message'] = $message;

        return $obj;
    }

    /**
     * Overall health status of the service. Returns "ok" when healthy, "error" when issues detected.
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
     * ISO 8601 timestamp when the health check was performed.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $obj = clone $this;
        $obj['timestamp'] = $timestamp;

        return $obj;
    }

    /**
     * Current version of the API service. Useful for debugging and compatibility checks.
     */
    public function withVersion(string $version): self
    {
        $obj = clone $this;
        $obj['version'] = $version;

        return $obj;
    }
}
