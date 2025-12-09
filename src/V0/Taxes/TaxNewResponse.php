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
 *   created_at?: \DateTimeInterface|null,
 *   description?: string|null,
 *   name?: string|null,
 *   percentage?: float|null,
 *   updated_at?: \DateTimeInterface|null,
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

    #[Optional]
    public ?\DateTimeInterface $created_at;

    #[Optional]
    public ?string $description;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?float $percentage;

    #[Optional]
    public ?\DateTimeInterface $updated_at;

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
        ?\DateTimeInterface $created_at = null,
        ?string $description = null,
        ?string $name = null,
        ?float $percentage = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $active && $obj['active'] = $active;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $description && $obj['description'] = $description;
        null !== $name && $obj['name'] = $name;
        null !== $percentage && $obj['percentage'] = $percentage;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj['active'] = $active;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withPercentage(float $percentage): self
    {
        $obj = clone $this;
        $obj['percentage'] = $percentage;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
