<?php
/**
 * Payment Examples
 * 
 * These examples demonstrate how to process payments, retrieve payment details,
 * and handle refunds.
 */

require_once(__DIR__ . '/../vendor/autoload.php');

use Devdraft\Configuration;
use Devdraft\Api\TestPaymentsApi;
use Devdraft\Model\PaymentRequestDto;
use Devdraft\ApiException;

// ============================================================================
// Simple Example: Create a Payment
// ============================================================================

function simpleCreatePayment() {
    $config = Configuration::getDefaultConfiguration();
    
    $clientKey = getenv('CLIENT_KEY') ?: 'your-client-key';
    $clientSecret = getenv('CLIENT_SECRET') ?: 'your-client-secret';
    
    $config->setApiKey('x-client-key', $clientKey);
    $config->setApiKey('x-client-secret', $clientSecret);
    
    $apiInstance = new TestPaymentsApi(null, $config);
    
    $paymentRequest = new PaymentRequestDto([
        'amount' => 100.50,
        'currency' => 'USD',
        'description' => 'Test payment for order #12345',
        'customer_id' => 'cus_12345'
    ]);
    
    $idempotencyKey = 'payment_' . uniqid();
    
    try {
        $response = $apiInstance->testPaymentControllerCreatePaymentV0($idempotencyKey, $paymentRequest);
        echo "Payment created: " . $response->getId() . "\n";
        echo "Status: " . $response->getStatus() . "\n";
        return $response;
    } catch (ApiException $e) {
        echo "Payment creation failed: " . $e->getMessage() . "\n";
        throw $e;
    }
}

// ============================================================================
// Advanced Example: Payment Workflow with Retry Logic
// ============================================================================

function advancedPaymentWorkflow() {
    $config = Configuration::getDefaultConfiguration();
    
    $clientKey = getenv('CLIENT_KEY') ?: 'your-client-key';
    $clientSecret = getenv('CLIENT_SECRET') ?: 'your-client-secret';
    
    $config->setApiKey('x-client-key', $clientKey);
    $config->setApiKey('x-client-secret', $clientSecret);
    
    $apiInstance = new TestPaymentsApi(null, $config);
    
    // Step 1: Create payment with idempotency key
    $idempotencyKey = 'payment_' . time() . '_' . uniqid();
    $paymentRequest = new PaymentRequestDto([
        'amount' => 250.00,
        'currency' => 'USD',
        'description' => 'Premium subscription payment',
        'customer_id' => 'cus_premium_001'
    ]);
    
    $payment = null;
    try {
        $payment = $apiInstance->testPaymentControllerCreatePaymentV0($idempotencyKey, $paymentRequest);
        echo "✅ Payment created: " . $payment->getId() . "\n";
    } catch (ApiException $e) {
        if ($e->getCode() == 409) {
            echo "⚠️  Payment already exists with this idempotency key\n";
            // In a real scenario, you would extract payment ID from error
        } else {
            throw $e;
        }
    }
    
    // Step 2: Retrieve payment details
    if ($payment && $payment->getId()) {
        try {
            $paymentDetails = $apiInstance->testPaymentControllerGetPaymentV0($payment->getId());
            echo "Payment details retrieved: {\n";
            echo "  'id': " . $paymentDetails->getId() . ",\n";
            echo "  'amount': " . $paymentDetails->getAmount() . ",\n";
            echo "  'status': " . $paymentDetails->getStatus() . ",\n";
            echo "  'timestamp': " . $paymentDetails->getTimestamp() . "\n";
            echo "}\n";
        } catch (ApiException $e) {
            echo "Failed to retrieve payment: " . $e->getMessage() . "\n";
        }
    }
    
    return $payment;
}

// ============================================================================
// Error Scenario: Handling Payment Errors
// ============================================================================

function errorScenarioPayments() {
    $config = Configuration::getDefaultConfiguration();
    
    $clientKey = getenv('CLIENT_KEY') ?: 'your-client-key';
    $clientSecret = getenv('CLIENT_SECRET') ?: 'your-client-secret';
    
    $config->setApiKey('x-client-key', $clientKey);
    $config->setApiKey('x-client-secret', $clientSecret);
    
    $apiInstance = new TestPaymentsApi(null, $config);
    
    // Scenario 1: Missing idempotency key
    try {
        $paymentRequest = new PaymentRequestDto([
            'amount' => 100,
            'currency' => 'USD',
            'description' => 'Test',
            'customer_id' => 'cus_123'
        ]);
        $apiInstance->testPaymentControllerCreatePaymentV0('', $paymentRequest); // Missing idempotency key
    } catch (ApiException $e) {
        if ($e->getCode() == 400) {
            echo "❌ Bad Request: Idempotency key is required\n";
        }
    }
    
    // Scenario 2: Invalid payment data
    try {
        $invalidPaymentRequest = new PaymentRequestDto([
            'amount' => -100, // Invalid amount
            'currency' => 'USD',
            'description' => '',
            'customer_id' => ''
        ]);
        $apiInstance->testPaymentControllerCreatePaymentV0('payment_' . uniqid(), $invalidPaymentRequest);
    } catch (ApiException $e) {
        if ($e->getCode() == 400) {
            echo "❌ Bad Request: Invalid payment data\n";
        }
    }
    
    // Scenario 3: Rate limiting
    for ($i = 0; $i < 10; $i++) {
        try {
            $paymentRequest = new PaymentRequestDto([
                'amount' => 100,
                'currency' => 'USD',
                'description' => 'Test',
                'customer_id' => 'cus_123'
            ]);
            $apiInstance->testPaymentControllerCreatePaymentV0('payment_' . uniqid(), $paymentRequest);
        } catch (ApiException $e) {
            if ($e->getCode() == 429) {
                echo "❌ Rate limit exceeded. Please wait before retrying.\n";
                break;
            }
        }
    }
}

// ============================================================================
// Refund Example
// ============================================================================

function refundPaymentExample($paymentId) {
    $config = Configuration::getDefaultConfiguration();
    
    $clientKey = getenv('CLIENT_KEY') ?: 'your-client-key';
    $clientSecret = getenv('CLIENT_SECRET') ?: 'your-client-secret';
    
    $config->setApiKey('x-client-key', $clientKey);
    $config->setApiKey('x-client-secret', $clientSecret);
    
    $apiInstance = new TestPaymentsApi(null, $config);
    $idempotencyKey = 'refund_' . uniqid();
    
    try {
        $refund = $apiInstance->testPaymentControllerRefundPaymentV0($paymentId, $idempotencyKey);
        echo "✅ Refund processed: " . $refund->getId() . "\n";
        echo "Refund amount: " . $refund->getAmount() . "\n";
        echo "Refund status: " . $refund->getStatus() . "\n";
        return $refund;
    } catch (ApiException $e) {
        if ($e->getCode() == 400) {
            echo "❌ Bad Request: Invalid refund request\n";
        } elseif ($e->getCode() == 404) {
            echo "❌ Payment not found\n";
        } else {
            echo "❌ Refund failed: " . $e->getMessage() . "\n";
        }
        throw $e;
    }
}

// Run examples
if (php_sapi_name() === 'cli') {
    simpleCreatePayment();
}
