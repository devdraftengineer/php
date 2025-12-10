<?php

declare(strict_types=1);

namespace Devdraft\V0\Health;

use Devdraft\Core\Attributes\Required;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Contracts\BaseModel;
use Devdraft\V0\Health\HealthCheckPublicResponse\Status;

/**
 * @phpstan-type HealthCheckPublicResponseShape = array{
 *   status: value-of<Status>, timestamp: \DateTimeInterface, version: string
 * }
 */
final class HealthCheckPublicResponse implements BaseModel
{
    /** @use SdkModel<HealthCheckPublicResponseShape> */
    use SdkModel;

    /**
     * Basic health status of the service. Returns "ok" when the service is responding.
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
     * Current version of the API service.
     */
    #[Required]
    public string $version;

    /**
     * `new HealthCheckPublicResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HealthCheckPublicResponse::with(status: ..., timestamp: ..., version: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HealthCheckPublicResponse)
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
     * @param Status|value-of<Status> $status
     */
    public static function with(
        Status|string $status,
        \DateTimeInterface $timestamp,
        string $version
    ): self {
        $self = new self;

        $self['status'] = $status;
        $self['timestamp'] = $timestamp;
        $self['version'] = $version;

        return $self;
    }

    /**
     * Basic health status of the service. Returns "ok" when the service is responding.
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
     * Current version of the API service.
     */
    public function withVersion(string $version): self
    {
        $self = clone $this;
        $self['version'] = $version;

        return $self;
    }
}
