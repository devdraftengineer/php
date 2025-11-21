<?php
/**
 * Invoice Examples
 * 
 * These examples demonstrate how to create, list, and retrieve invoices.
 */

require_once(__DIR__ . '/../vendor/autoload.php');

use Devdraft\Configuration;
use Devdraft\Api\InvoicesApi;
use Devdraft\Model\CreateInvoiceDto;
use Devdraft\Model\InvoiceProductDto;
use Devdraft\ApiException;

// ============================================================================
// Simple Example: Create an Invoice
// ============================================================================

function simpleCreateInvoice() {
    $config = Configuration::getDefaultConfiguration();
    
    $clientKey = getenv('CLIENT_KEY') ?: 'your-client-key';
    $clientSecret = getenv('CLIENT_SECRET') ?: 'your-client-secret';
    
    $config->setApiKey('x-client-key', $clientKey);
    $config->setApiKey('x-client-secret', $clientSecret);
    
    $apiInstance = new InvoicesApi(null, $config);
    
    $customerId = 'cus_12345';
    $dueDate = date('c', strtotime('+30 days'));
    
    $invoiceData = new CreateInvoiceDto([
        'customer_id' => $customerId,
        'due_date' => $dueDate
    ]);
    
    // Add products
    $product = new InvoiceProductDto([
        'product_id' => 'prod_123',
        'quantity' => 2,
        'price' => 99.99
    ]);
    $invoiceData->setProducts([$product]);
    
    try {
        $invoice = $apiInstance->invoiceControllerCreate($invoiceData);
        echo "Invoice created: " . $invoice->getId() . "\n";
        return $invoice;
    } catch (ApiException $e) {
        echo "Invoice creation failed: " . $e->getMessage() . "\n";
        throw $e;
    }
}

// ============================================================================
// Advanced Example: Invoice Management Workflow
// ============================================================================

function advancedInvoiceWorkflow() {
    $config = Configuration::getDefaultConfiguration();
    
    $clientKey = getenv('CLIENT_KEY') ?: 'your-client-key';
    $clientSecret = getenv('CLIENT_SECRET') ?: 'your-client-secret';
    
    $config->setApiKey('x-client-key', $clientKey);
    $config->setApiKey('x-client-secret', $clientSecret);
    
    $apiInstance = new InvoicesApi(null, $config);
    
    // Step 1: Create invoice with multiple products
    $customerId = 'cus_premium_001';
    $dueDate = date('c', strtotime('+30 days'));
    
    $invoiceData = new CreateInvoiceDto([
        'customer_id' => $customerId,
        'due_date' => $dueDate
    ]);
    
    $products = [
        new InvoiceProductDto(['product_id' => 'prod_premium', 'quantity' => 1, 'price' => 299.99]),
        new InvoiceProductDto(['product_id' => 'prod_addon', 'quantity' => 2, 'price' => 49.99])
    ];
    $invoiceData->setProducts($products);
    
    $invoice = $apiInstance->invoiceControllerCreate($invoiceData);
    echo "✅ Invoice created: " . $invoice->getId() . "\n";
    echo "Total amount: " . $invoice->getTotalAmount() . "\n";
    
    // Step 2: List invoices with pagination
    $invoices = $apiInstance->invoiceControllerFindAll(0, 10);
    echo "Found " . $invoices->getTotal() . " invoices\n";
    
    // Step 3: Get invoice details
    $invoiceDetails = $apiInstance->invoiceControllerFindOne($invoice->getId());
    echo "Invoice details: {\n";
    echo "  'id': " . $invoiceDetails->getId() . ",\n";
    echo "  'customer_id': " . $invoiceDetails->getCustomerId() . ",\n";
    echo "  'status': " . $invoiceDetails->getStatus() . ",\n";
    echo "  'total_amount': " . $invoiceDetails->getTotalAmount() . "\n";
    echo "}\n";
    
    return $invoice;
}

// ============================================================================
// Error Scenario: Handling Invoice Errors
// ============================================================================

function errorScenarioInvoices() {
    $config = Configuration::getDefaultConfiguration();
    
    $clientKey = getenv('CLIENT_KEY') ?: 'your-client-key';
    $clientSecret = getenv('CLIENT_SECRET') ?: 'your-client-secret';
    
    $config->setApiKey('x-client-key', $clientKey);
    $config->setApiKey('x-client-secret', $clientSecret);
    
    $apiInstance = new InvoicesApi(null, $config);
    
    // Scenario 1: Invalid customer ID
    try {
        $invalidInvoice = new CreateInvoiceDto([
            'customer_id' => 'invalid-customer-id',
            'due_date' => date('c', strtotime('+30 days'))
        ]);
        $invalidInvoice->setProducts([]);
        $apiInstance->invoiceControllerCreate($invalidInvoice);
    } catch (ApiException $e) {
        if ($e->getCode() == 400) {
            echo "❌ Bad Request: Invalid customer ID\n";
        } elseif ($e->getCode() == 404) {
            echo "❌ Customer not found\n";
        }
    }
    
    // Scenario 2: Empty products array
    try {
        $emptyProductsInvoice = new CreateInvoiceDto([
            'customer_id' => 'cus_123',
            'due_date' => date('c', strtotime('+30 days'))
        ]);
        $emptyProductsInvoice->setProducts([]); // Empty products
        $apiInstance->invoiceControllerCreate($emptyProductsInvoice);
    } catch (ApiException $e) {
        if ($e->getCode() == 400) {
            echo "❌ Bad Request: Invoice must have at least one product\n";
        }
    }
    
    // Scenario 3: Invoice not found
    try {
        $apiInstance->invoiceControllerFindOne('non-existent-invoice-id');
    } catch (ApiException $e) {
        if ($e->getCode() == 404) {
            echo "❌ Invoice not found\n";
        }
    }
}

// Run examples
if (php_sapi_name() === 'cli') {
    simpleCreateInvoice();
}
