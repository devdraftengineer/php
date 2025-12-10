<?php

declare(strict_types=1);

namespace Devdraft\V0\Taxes;

use Devdraft\Core\Attributes\Optional;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Contracts\BaseModel;

/**
 * @phpstan-type TaxNewResponseShape = array{
 *   id?: string|null,
 *   active?: bool|null,
 *   createdAt?: \DateTimeInterface|null,
 *   description?: string|null,
 *   name?: string|null,
 *   percentage?: float|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class TaxNewResponse implements BaseModel
{
    /** @use SdkModel<TaxNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?bool $active;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional]
    public ?string $description;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?float $percentage;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $id = null,
        ?bool $active = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $description = null,
        ?string $name = null,
        ?float $percentage = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $active && $self['active'] = $active;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $description && $self['description'] = $description;
        null !== $name && $self['name'] = $name;
        null !== $percentage && $self['percentage'] = $percentage;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withPercentage(float $percentage): self
    {
        $self = clone $this;
        $self['percentage'] = $percentage;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
