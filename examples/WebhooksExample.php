<?php
/**
 * Webhook Examples
 * 
 * These examples demonstrate how to create, list, retrieve, and update webhooks.
 */

require_once(__DIR__ . '/../vendor/autoload.php');

use Devdraft\Configuration;
use Devdraft\Api\WebhooksApi;
use Devdraft\Model\CreateWebhookDto;
use Devdraft\Model\UpdateWebhookDto;
use Devdraft\ApiException;

// ============================================================================
// Simple Example: Create a Webhook
// ============================================================================

function simpleCreateWebhook() {
    $config = Configuration::getDefaultConfiguration();
    
    $clientKey = getenv('CLIENT_KEY') ?: 'your-client-key';
    $clientSecret = getenv('CLIENT_SECRET') ?: 'your-client-secret';
    
    $config->setApiKey('x-client-key', $clientKey);
    $config->setApiKey('x-client-secret', $clientSecret);
    
    $apiInstance = new WebhooksApi(null, $config);
    
    $webhookData = new CreateWebhookDto([
        'url' => 'https://your-app.com/webhooks/payment',
        'events' => ['payment.created', 'payment.succeeded']
    ]);
    
    try {
        $webhook = $apiInstance->webhookControllerCreate($webhookData);
        echo "Webhook created: " . $webhook->getId() . "\n";
        echo "Webhook URL: " . $webhook->getUrl() . "\n";
        return $webhook;
    } catch (ApiException $e) {
        echo "Webhook creation failed: " . $e->getMessage() . "\n";
        throw $e;
    }
}

// ============================================================================
// Advanced Example: Webhook Management Workflow
// ============================================================================

function advancedWebhookWorkflow() {
    $config = Configuration::getDefaultConfiguration();
    
    $clientKey = getenv('CLIENT_KEY') ?: 'your-client-key';
    $clientSecret = getenv('CLIENT_SECRET') ?: 'your-client-secret';
    
    $config->setApiKey('x-client-key', $clientKey);
    $config->setApiKey('x-client-secret', $clientSecret);
    
    $apiInstance = new WebhooksApi(null, $config);
    
    // Step 1: Create webhook for payment events
    $webhookData = new CreateWebhookDto([
        'url' => 'https://your-app.com/webhooks/payments',
        'events' => [
            'payment.created',
            'payment.succeeded',
            'payment.failed',
            'payment.refunded'
        ]
    ]);
    
    $webhook = null;
    try {
        $webhook = $apiInstance->webhookControllerCreate($webhookData);
        echo "✅ Webhook created: " . $webhook->getId() . "\n";
    } catch (ApiException $e) {
        if ($e->getCode() == 400) {
            echo "❌ Invalid webhook configuration\n";
            return;
        }
        throw $e;
    }
    
    // Step 2: List all webhooks
    $webhooks = $apiInstance->webhookControllerFindAll();
    echo "Found " . count($webhooks) . " webhooks\n";
    
    // Step 3: Get webhook details
    if ($webhook && $webhook->getId()) {
        $webhookDetails = $apiInstance->webhookControllerFindOne($webhook->getId());
        echo "Webhook details: {\n";
        echo "  'id': " . $webhookDetails->getId() . ",\n";
        echo "  'url': " . $webhookDetails->getUrl() . ",\n";
        echo "  'events': " . json_encode($webhookDetails->getEvents()) . ",\n";
        echo "  'active': " . ($webhookDetails->getActive() ? 'true' : 'false') . "\n";
        echo "}\n";
        
        // Step 4: Update webhook
        $updateData = new UpdateWebhookDto([
            'url' => 'https://your-app.com/webhooks/payments-v2',
            'events' => [
                'payment.created',
                'payment.succeeded',
                'payment.failed',
                'payment.refunded',
                'customer.created'
            ]
        ]);
        
        $updatedWebhook = $apiInstance->webhookControllerUpdate($webhook->getId(), $updateData);
        echo "✅ Webhook updated: " . $updatedWebhook->getId() . "\n";
    }
    
    return $webhook;
}

// ============================================================================
// Error Scenario: Handling Webhook Errors
// ============================================================================

function errorScenarioWebhooks() {
    $config = Configuration::getDefaultConfiguration();
    
    $clientKey = getenv('CLIENT_KEY') ?: 'your-client-key';
    $clientSecret = getenv('CLIENT_SECRET') ?: 'your-client-secret';
    
    $config->setApiKey('x-client-key', $clientKey);
    $config->setApiKey('x-client-secret', $clientSecret);
    
    $apiInstance = new WebhooksApi(null, $config);
    
    // Scenario 1: Invalid URL
    try {
        $invalidWebhook = new CreateWebhookDto([
            'url' => 'not-a-valid-url',
            'events' => ['payment.created']
        ]);
        $apiInstance->webhookControllerCreate($invalidWebhook);
    } catch (ApiException $e) {
        if ($e->getCode() == 400) {
            echo "❌ Bad Request: Invalid webhook URL\n";
        }
    }
    
    // Scenario 2: Empty events array
    try {
        $emptyEventsWebhook = new CreateWebhookDto([
            'url' => 'https://your-app.com/webhooks',
            'events' => [] // Empty events
        ]);
        $apiInstance->webhookControllerCreate($emptyEventsWebhook);
    } catch (ApiException $e) {
        if ($e->getCode() == 400) {
            echo "❌ Bad Request: Webhook must have at least one event\n";
        }
    }
    
    // Scenario 3: Webhook not found
    try {
        $apiInstance->webhookControllerFindOne('non-existent-webhook-id');
    } catch (ApiException $e) {
        if ($e->getCode() == 404) {
            echo "❌ Webhook not found\n";
        }
    }
    
    // Scenario 4: Invalid event name
    try {
        $invalidEventWebhook = new CreateWebhookDto([
            'url' => 'https://your-app.com/webhooks',
            'events' => ['invalid.event.name']
        ]);
        $apiInstance->webhookControllerCreate($invalidEventWebhook);
    } catch (ApiException $e) {
        if ($e->getCode() == 400) {
            echo "❌ Bad Request: Invalid event name\n";
        }
    }
}

// Run examples
if (php_sapi_name() === 'cli') {
    simpleCreateWebhook();
}
