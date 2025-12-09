<?php

declare(strict_types=1);

namespace Devdraft\V0\Products;

use Devdraft\Core\Attributes\Optional;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;

/**
 * Retrieves a list of products with pagination.
 *
 * This endpoint allows you to fetch products with optional pagination.
 *
 * ## Use Cases
 * - List all products
 * - Browse product catalog
 * - Implement product search
 *
 * ## Query Parameters
 * - `skip`: Number of records to skip (default: 0)
 * - `take`: Number of records to take (default: 10)
 *
 * ## Example Response
 * ```json
 * {
 *   "data": [
 *     {
 *       "id": "prod_123456",
 *       "name": "Premium Widget",
 *       "description": "High-quality widget for all your needs",
 *       "price": "99.99",
 *       "images": [
 *         "https://storage.example.com/images/file1.jpg",
 *         "https://storage.example.com/images/file2.jpg"
 *       ],
 *       "createdAt": "2024-03-20T10:00:00Z"
 *     }
 *   ],
 *   "total": 100,
 *   "skip": 0,
 *   "take": 10
 * }
 * ```
 *
 * @see Devdraft\Services\V0\ProductsService::list()
 *
 * @phpstan-type ProductListParamsShape = array{skip?: float, take?: float}
 */
final class ProductListParams implements BaseModel
{
    /** @use SdkModel<ProductListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Number of records to skip.
     */
    #[Optional]
    public ?float $skip;

    /**
     * Number of records to take.
     */
    #[Optional]
    public ?float $take;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?float $skip = null, ?float $take = null): self
    {
        $obj = new self;

        null !== $skip && $obj['skip'] = $skip;
        null !== $take && $obj['take'] = $take;

        return $obj;
    }

    /**
     * Number of records to skip.
     */
    public function withSkip(float $skip): self
    {
        $obj = clone $this;
        $obj['skip'] = $skip;

        return $obj;
    }

    /**
     * Number of records to take.
     */
    public function withTake(float $take): self
    {
        $obj = clone $this;
        $obj['take'] = $take;

        return $obj;
    }
}
