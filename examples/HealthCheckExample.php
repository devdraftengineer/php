<?php
/**
 * Health Check Examples
 * 
 * These examples demonstrate how to use the health check endpoints.
 */

require_once(__DIR__ . '/../vendor/autoload.php');

use Devdraft\Configuration;
use Devdraft\Api\APIHealthApi;
use Devdraft\ApiException;

// ============================================================================
// Simple Example: Public Health Check
// ============================================================================

function simplePublicHealthCheck() {
    $config = Configuration::getDefaultConfiguration();
    $apiInstance = new APIHealthApi(null, $config);
    
    try {
        $response = $apiInstance->healthControllerPublicHealthCheckV0();
        echo "Service status: " . $response->getStatus() . "\n";
        echo "Service is healthy: " . ($response->getStatus() === 'ok' ? 'true' : 'false') . "\n";
    } catch (ApiException $e) {
        echo "Health check failed: " . $e->getMessage() . "\n";
    }
}

// ============================================================================
// Advanced Example: Authenticated Health Check with Error Handling
// ============================================================================

function advancedAuthenticatedHealthCheck() {
    $config = Configuration::getDefaultConfiguration();
    
    // Configure API key authorization
    $clientKey = getenv('CLIENT_KEY') ?: 'your-client-key';
    $clientSecret = getenv('CLIENT_SECRET') ?: 'your-client-secret';
    
    $config->setApiKey('x-client-key', $clientKey);
    $config->setApiKey('x-client-secret', $clientSecret);
    
    $apiInstance = new APIHealthApi(null, $config);
    
    try {
        $response = $apiInstance->healthControllerCheckV0();
        
        echo "=== Health Check Results ===\n";
        echo "Status: " . $response->getStatus() . "\n";
        echo "Version: " . $response->getVersion() . "\n";
        echo "Database: " . $response->getDatabase() . "\n";
        echo "Message: " . $response->getMessage() . "\n";
        echo "Authenticated: " . ($response->getAuthenticated() ? 'true' : 'false') . "\n";
        echo "Timestamp: " . $response->getTimestamp() . "\n";
        
        // Check if service is healthy
        if ($response->getStatus() === 'ok' && $response->getDatabase() === 'connected') {
            echo "✅ Service is fully operational\n";
        } else {
            echo "⚠️  Service may have issues\n";
        }
    } catch (ApiException $e) {
        if ($e->getCode() == 401) {
            echo "❌ Authentication failed. Please check your API keys.\n";
        } else {
            echo "❌ Request failed: " . $e->getMessage() . "\n";
        }
    }
}

// ============================================================================
// Error Scenario: Handling Authentication Errors
// ============================================================================

function errorScenarioHealthCheck() {
    $config = Configuration::getDefaultConfiguration();
    
    // Intentionally wrong API key
    $config->setApiKey('x-client-key', 'invalid-key');
    $config->setApiKey('x-client-secret', 'invalid-secret');
    
    $apiInstance = new APIHealthApi(null, $config);
    
    try {
        $apiInstance->healthControllerCheckV0();
    } catch (ApiException $e) {
        if ($e->getCode() == 401) {
            echo "❌ Unauthorized: Invalid API credentials\n";
            echo "Please verify your CLIENT_KEY and CLIENT_SECRET environment variables\n";
        } elseif ($e->getCode() == 429) {
            echo "❌ Rate limit exceeded. Please wait before retrying.\n";
        } else {
            echo "❌ Unexpected error: " . $e->getMessage() . "\n";
        }
    }
}

// Run examples
if (php_sapi_name() === 'cli') {
    simplePublicHealthCheck();
    advancedAuthenticatedHealthCheck();
}
