<?php
/**
 * Customer Examples
 * 
 * These examples demonstrate how to manage customers: creating, listing,
 * retrieving, and updating customer records.
 */

require_once(__DIR__ . '/../vendor/autoload.php');

use Devdraft\Configuration;
use Devdraft\Api\CustomersApi;
use Devdraft\Model\CreateCustomerDto;
use Devdraft\Model\UpdateCustomerDto;
use Devdraft\Model\CustomerType;
use Devdraft\Model\CustomerStatus;
use Devdraft\ApiException;

// ============================================================================
// Simple Example: Create a Customer
// ============================================================================

function simpleCreateCustomer() {
    $config = Configuration::getDefaultConfiguration();
    
    $clientKey = getenv('CLIENT_KEY') ?: 'your-client-key';
    $clientSecret = getenv('CLIENT_SECRET') ?: 'your-client-secret';
    
    $config->setApiKey('x-client-key', $clientKey);
    $config->setApiKey('x-client-secret', $clientSecret);
    
    $apiInstance = new CustomersApi(null, $config);
    
    $customerData = new CreateCustomerDto([
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john.doe@example.com',
        'phone_number' => '+1-555-123-4567',
        'customer_type' => CustomerType::STARTUP,
        'status' => CustomerStatus::ACTIVE
    ]);
    
    try {
        $customer = $apiInstance->customerControllerCreate($customerData);
        echo "Customer created: " . $customer->getId() . "\n";
        return $customer;
    } catch (ApiException $e) {
        echo "Customer creation failed: " . $e->getMessage() . "\n";
        throw $e;
    }
}

// ============================================================================
// Advanced Example: Customer Management Workflow
// ============================================================================

function advancedCustomerWorkflow() {
    $config = Configuration::getDefaultConfiguration();
    
    $clientKey = getenv('CLIENT_KEY') ?: 'your-client-key';
    $clientSecret = getenv('CLIENT_SECRET') ?: 'your-client-secret';
    
    $config->setApiKey('x-client-key', $clientKey);
    $config->setApiKey('x-client-secret', $clientSecret);
    
    $apiInstance = new CustomersApi(null, $config);
    
    // Step 1: Create a new customer
    $newCustomer = new CreateCustomerDto([
        'first_name' => 'Jane',
        'last_name' => 'Smith',
        'email' => 'jane.smith@example.com',
        'phone_number' => '+1-555-987-6543',
        'customer_type' => CustomerType::SMALL_BUSINESS,
        'status' => CustomerStatus::ACTIVE
    ]);
    
    $customer = null;
    try {
        $customer = $apiInstance->customerControllerCreate($newCustomer);
        echo "✅ Customer created: " . $customer->getId() . "\n";
    } catch (ApiException $e) {
        if ($e->getCode() == 409) {
            echo "⚠️  Customer with this email already exists\n";
            // Try to find existing customer
            $customers = $apiInstance->customerControllerFindAll(0, 10, null, null, 'jane.smith@example.com');
            if ($customers && count($customers->getData()) > 0) {
                $customer = $customers->getData()[0];
            }
        } else {
            throw $e;
        }
    }
    
    // Step 2: List customers with filters
    $activeCustomers = $apiInstance->customerControllerFindAll(0, 20, CustomerStatus::ACTIVE, null, null);
    echo "Found " . $activeCustomers->getTotal() . " active customers\n";
    
    // Step 3: Get customer details
    if ($customer && $customer->getId()) {
        $customerDetails = $apiInstance->customerControllerFindOne($customer->getId());
        echo "Customer details: {\n";
        echo "  'id': " . $customerDetails->getId() . ",\n";
        echo "  'name': " . $customerDetails->getFirstName() . " " . $customerDetails->getLastName() . ",\n";
        echo "  'email': " . $customerDetails->getEmail() . ",\n";
        echo "  'status': " . $customerDetails->getStatus() . "\n";
        echo "}\n";
        
        // Step 4: Update customer
        $updateData = new UpdateCustomerDto([
            'status' => CustomerStatus::ACTIVE,
            'phone_number' => '+1-555-999-8888'
        ]);
        
        $updatedCustomer = $apiInstance->customerControllerUpdate($customer->getId(), $updateData);
        echo "✅ Customer updated: " . $updatedCustomer->getId() . "\n";
    }
    
    return $customer;
}

// ============================================================================
// Error Scenario: Handling Customer Errors
// ============================================================================

function errorScenarioCustomers() {
    $config = Configuration::getDefaultConfiguration();
    
    $clientKey = getenv('CLIENT_KEY') ?: 'your-client-key';
    $clientSecret = getenv('CLIENT_SECRET') ?: 'your-client-secret';
    
    $config->setApiKey('x-client-key', $clientKey);
    $config->setApiKey('x-client-secret', $clientSecret);
    
    $apiInstance = new CustomersApi(null, $config);
    
    // Scenario 1: Missing required fields
    try {
        $invalidCustomer = new CreateCustomerDto([
            'first_name' => '', // Empty required field
            'last_name' => 'Doe',
            'phone_number' => '+1-555-123-4567'
        ]);
        $apiInstance->customerControllerCreate($invalidCustomer);
    } catch (ApiException $e) {
        if ($e->getCode() == 400) {
            echo "❌ Bad Request: Missing required fields\n";
        }
    }
    
    // Scenario 2: Invalid email format
    try {
        $invalidEmailCustomer = new CreateCustomerDto([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'invalid-email', // Invalid format
            'phone_number' => '+1-555-123-4567'
        ]);
        $apiInstance->customerControllerCreate($invalidEmailCustomer);
    } catch (ApiException $e) {
        if ($e->getCode() == 400) {
            echo "❌ Bad Request: Invalid email format\n";
        }
    }
    
    // Scenario 3: Customer not found
    try {
        $apiInstance->customerControllerFindOne('non-existent-id');
    } catch (ApiException $e) {
        if ($e->getCode() == 404) {
            echo "❌ Customer not found\n";
        }
    }
    
    // Scenario 4: Duplicate email
    try {
        $duplicateCustomer = new CreateCustomerDto([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'existing@example.com', // Already exists
            'phone_number' => '+1-555-123-4567'
        ]);
        $apiInstance->customerControllerCreate($duplicateCustomer);
    } catch (ApiException $e) {
        if ($e->getCode() == 409) {
            echo "❌ Conflict: Customer with this email already exists\n";
        }
    }
}

// Run examples
if (php_sapi_name() === 'cli') {
    simpleCreateCustomer();
}
