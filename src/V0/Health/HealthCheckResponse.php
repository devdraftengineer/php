<?php

declare(strict_types=1);

namespace Devdraft\V0\Health;

use Devdraft\Core\Attributes\Required;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Contracts\BaseModel;
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
final class HealthCheckResponse implements BaseModel
{
    /** @use SdkModel<HealthCheckResponseShape> */
    use SdkModel;

    /**
     * Indicates whether the request was properly authenticated. Always true for this endpoint since authentication is required.
     */
    #[Required]
    public bool $authenticated;

    /**
     * Database connectivity status. Shows "connected" when database is accessible, "error" when connection fails.
     *
     * @var value-of<Database> $database
     */
    #[Required(enum: Database::class)]
    public string $database;

    /**
     * Human-readable message describing the current health status and any issues.
     */
    #[Required]
    public string $message;

    /**
     * Overall health status of the service. Returns "ok" when healthy, "error" when issues detected.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * ISO 8601 timestamp when the health check was performed.
     */
    #[Required]
    public \DateTimeInterface $timestamp;

    /**
     * Current version of the API service. Useful for debugging and compatibility checks.
     */
    #[Required]
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
        $self = new self;

        $self['authenticated'] = $authenticated;
        $self['database'] = $database;
        $self['message'] = $message;
        $self['status'] = $status;
        $self['timestamp'] = $timestamp;
        $self['version'] = $version;

        return $self;
    }

    /**
     * Indicates whether the request was properly authenticated. Always true for this endpoint since authentication is required.
     */
    public function withAuthenticated(bool $authenticated): self
    {
        $self = clone $this;
        $self['authenticated'] = $authenticated;

        return $self;
    }

    /**
     * Database connectivity status. Shows "connected" when database is accessible, "error" when connection fails.
     *
     * @param Database|value-of<Database> $database
     */
    public function withDatabase(Database|string $database): self
    {
        $self = clone $this;
        $self['database'] = $database;

        return $self;
    }

    /**
     * Human-readable message describing the current health status and any issues.
     */
    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    /**
     * Overall health status of the service. Returns "ok" when healthy, "error" when issues detected.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * ISO 8601 timestamp when the health check was performed.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * Current version of the API service. Useful for debugging and compatibility checks.
     */
    public function withVersion(string $version): self
    {
        $self = clone $this;
        $self['version'] = $version;

        return $self;
    }
}
