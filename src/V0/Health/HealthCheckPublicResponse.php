<?php

declare(strict_types=1);

namespace Devdraft\V0\Health;

use Devdraft\Core\Attributes\Api;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkResponse;
use Devdraft\Core\Contracts\BaseModel;
use Devdraft\Core\Conversion\Contracts\ResponseConverter;
use Devdraft\V0\Health\HealthCheckPublicResponse\Status;

/**
 * @phpstan-type HealthCheckPublicResponseShape = array{
 *   status: value-of<Status>, timestamp: \DateTimeInterface, version: string
 * }
 */
final class HealthCheckPublicResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<HealthCheckPublicResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Basic health status of the service. Returns "ok" when the service is responding.
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
     * Current version of the API service.
     */
    #[Api]
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
        $obj = new self;

        $obj['status'] = $status;
        $obj['timestamp'] = $timestamp;
        $obj['version'] = $version;

        return $obj;
    }

    /**
     * Basic health status of the service. Returns "ok" when the service is responding.
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
     * Current version of the API service.
     */
    public function withVersion(string $version): self
    {
        $obj = clone $this;
        $obj['version'] = $version;

        return $obj;
    }
}
