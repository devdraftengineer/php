<?php

declare(strict_types=1);

namespace Devdraft\V0\Customers;

use Devdraft\Core\Attributes\Optional;
use Devdraft\Core\Attributes\Required;
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
 *   firstName: string,
 *   lastName: string,
 *   phoneNumber: string,
 *   customerType?: CustomerType|value-of<CustomerType>,
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
    #[Required('first_name')]
    public string $firstName;

    /**
     * Customer's last name. Used for personalization and legal documentation.
     */
    #[Required('last_name')]
    public string $lastName;

    /**
     * Customer's phone number. Used for SMS notifications and verification. Include country code for international numbers.
     */
    #[Required('phone_number')]
    public string $phoneNumber;

    /**
     * Type of customer account. Determines available features and compliance requirements.
     *
     * @var value-of<CustomerType>|null $customerType
     */
    #[Optional('customer_type', enum: CustomerType::class)]
    public ?string $customerType;

    /**
     * Customer's email address. Used for notifications, receipts, and account management. Must be a valid email format.
     */
    #[Optional]
    public ?string $email;

    /**
     * Current status of the customer account. Controls access to services and features.
     *
     * @var value-of<CustomerStatus>|null $status
     */
    #[Optional(enum: CustomerStatus::class)]
    public ?string $status;

    /**
     * `new CustomerCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomerCreateParams::with(firstName: ..., lastName: ..., phoneNumber: ...)
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
     * @param CustomerType|value-of<CustomerType> $customerType
     * @param CustomerStatus|value-of<CustomerStatus> $status
     */
    public static function with(
        string $firstName,
        string $lastName,
        string $phoneNumber,
        CustomerType|string|null $customerType = null,
        ?string $email = null,
        CustomerStatus|string|null $status = null,
    ): self {
        $self = new self;

        $self['firstName'] = $firstName;
        $self['lastName'] = $lastName;
        $self['phoneNumber'] = $phoneNumber;

        null !== $customerType && $self['customerType'] = $customerType;
        null !== $email && $self['email'] = $email;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Customer's first name. Used for personalization and legal documentation.
     */
    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    /**
     * Customer's last name. Used for personalization and legal documentation.
     */
    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }

    /**
     * Customer's phone number. Used for SMS notifications and verification. Include country code for international numbers.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Type of customer account. Determines available features and compliance requirements.
     *
     * @param CustomerType|value-of<CustomerType> $customerType
     */
    public function withCustomerType(CustomerType|string $customerType): self
    {
        $self = clone $this;
        $self['customerType'] = $customerType;

        return $self;
    }

    /**
     * Customer's email address. Used for notifications, receipts, and account management. Must be a valid email format.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * Current status of the customer account. Controls access to services and features.
     *
     * @param CustomerStatus|value-of<CustomerStatus> $status
     */
    public function withStatus(CustomerStatus|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
