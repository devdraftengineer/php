<?php

declare(strict_types=1);

namespace Devdraft\V0\Customers;

use Devdraft\Core\Attributes\Api;
use Devdraft\Core\Concerns\SdkModel;
use Devdraft\Core\Concerns\SdkParams;
use Devdraft\Core\Contracts\BaseModel;

/**
 * Creates a new customer in the system with their personal and contact information.
 *
 * This endpoint allows you to register new customers and store their details for future transactions.
 *
 * ## Use Cases
 * - Register new customers for payment processing
 * - Store customer information for recurring payments
 * - Maintain customer profiles for transaction history
 *
 * ## Example: Create New Customer
 * ```json
 * {
 *   "first_name": "John",
 *   "last_name": "Doe",
 *   "email": "john.doe@example.com",
 *   "phone_number": "+1-555-123-4567",
 *   "customer_type": "Startup",
 *   "status": "ACTIVE"
 * }
 * ```
 *
 * ## Required Fields
 * - `first_name`: Customer's first name (1-100 characters)
 * - `last_name`: Customer's last name (1-100 characters)
 * - `phone_number`: Customer's phone number (max 20 characters)
 *
 * ## Optional Fields
 * - `email`: Valid email address (max 255 characters)
 * - `customer_type`: Type of customer account (Individual, Startup, Small Business, Medium Business, Enterprise, Non-Profit, Government)
 * - `status`: Customer status (ACTIVE, BLACKLISTED, DEACTIVATED)
 *
 * @see Devdraft\Services\V0\CustomersService::create()
 *
 * @phpstan-type CustomerCreateParamsShape = array{
 *   first_name: string,
 *   last_name: string,
 *   phone_number: string,
 *   customer_type?: CustomerType|value-of<CustomerType>,
 *   email?: string,
 *   status?: CustomerStatus|value-of<CustomerStatus>,
 * }
 */
final class CustomerCreateParams implements BaseModel
{
    /** @use SdkModel<CustomerCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Customer's first name. Used for personalization and legal documentation.
     */
    #[Api]
    public string $first_name;

    /**
     * Customer's last name. Used for personalization and legal documentation.
     */
    #[Api]
    public string $last_name;

    /**
     * Customer's phone number. Used for SMS notifications and verification. Include country code for international numbers.
     */
    #[Api]
    public string $phone_number;

    /**
     * Type of customer account. Determines available features and compliance requirements.
     *
     * @var value-of<CustomerType>|null $customer_type
     */
    #[Api(enum: CustomerType::class, optional: true)]
    public ?string $customer_type;

    /**
     * Customer's email address. Used for notifications, receipts, and account management. Must be a valid email format.
     */
    #[Api(optional: true)]
    public ?string $email;

    /**
     * Current status of the customer account. Controls access to services and features.
     *
     * @var value-of<CustomerStatus>|null $status
     */
    #[Api(enum: CustomerStatus::class, optional: true)]
    public ?string $status;

    /**
     * `new CustomerCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomerCreateParams::with(first_name: ..., last_name: ..., phone_number: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomerCreateParams)
     *   ->withFirstName(...)
     *   ->withLastName(...)
     *   ->withPhoneNumber(...)
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
     * @param CustomerType|value-of<CustomerType> $customer_type
     * @param CustomerStatus|value-of<CustomerStatus> $status
     */
    public static function with(
        string $first_name,
        string $last_name,
        string $phone_number,
        CustomerType|string|null $customer_type = null,
        ?string $email = null,
        CustomerStatus|string|null $status = null,
    ): self {
        $obj = new self;

        $obj->first_name = $first_name;
        $obj->last_name = $last_name;
        $obj->phone_number = $phone_number;

        null !== $customer_type && $obj['customer_type'] = $customer_type;
        null !== $email && $obj->email = $email;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * Customer's first name. Used for personalization and legal documentation.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj->first_name = $firstName;

        return $obj;
    }

    /**
     * Customer's last name. Used for personalization and legal documentation.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj->last_name = $lastName;

        return $obj;
    }

    /**
     * Customer's phone number. Used for SMS notifications and verification. Include country code for international numbers.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phone_number = $phoneNumber;

        return $obj;
    }

    /**
     * Type of customer account. Determines available features and compliance requirements.
     *
     * @param CustomerType|value-of<CustomerType> $customerType
     */
    public function withCustomerType(CustomerType|string $customerType): self
    {
        $obj = clone $this;
        $obj['customer_type'] = $customerType;

        return $obj;
    }

    /**
     * Customer's email address. Used for notifications, receipts, and account management. Must be a valid email format.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    /**
     * Current status of the customer account. Controls access to services and features.
     *
     * @param CustomerStatus|value-of<CustomerStatus> $status
     */
    public function withStatus(CustomerStatus|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
