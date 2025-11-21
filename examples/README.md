# PHP SDK Examples

This directory contains example code demonstrating how to use the PHP SDK.

## Available Examples

### Health Examples

- **File**: [`HealthCheckExample.php`](./HealthCheckExample.php)
- **APIs Covered**: HealthController_check_v0, HealthController_publicHealthCheck_v0
- **Examples Include**:
  - Simple usage examples
  - Advanced workflow examples
  - Error handling scenarios

### Payments Examples

- **File**: [`PaymentsExample.php`](./PaymentsExample.php)
- **APIs Covered**: TestPaymentController_createPayment_v0, TestPaymentController_getPayment_v0, TestPaymentController_refundPayment_v0
- **Examples Include**:
  - Simple usage examples
  - Advanced workflow examples
  - Error handling scenarios

### Customers Examples

- **File**: [`CustomersExample.php`](./CustomersExample.php)
- **APIs Covered**: CustomerController_create, CustomerController_findAll, CustomerController_findOne, CustomerController_update, LiquidationAddressController_createLiquidationAddress, LiquidationAddressController_getLiquidationAddresses, LiquidationAddressController_getLiquidationAddress
- **Examples Include**:
  - Simple usage examples
  - Advanced workflow examples
  - Error handling scenarios

### Invoices Examples

- **File**: [`InvoicesExample.php`](./InvoicesExample.php)
- **APIs Covered**: InvoiceController_create, InvoiceController_findAll, InvoiceController_findOne, InvoiceController_update
- **Examples Include**:
  - Simple usage examples
  - Advanced workflow examples
  - Error handling scenarios

### Webhooks Examples

- **File**: [`WebhooksExample.php`](./WebhooksExample.php)
- **APIs Covered**: WebhookController_create, WebhookController_findAll, WebhookController_findOne, WebhookController_update, WebhookController_remove
- **Examples Include**:
  - Simple usage examples
  - Advanced workflow examples
  - Error handling scenarios



## Quick Start

1. Install the SDK (see main README.md)
2. Set up your API credentials:
   ```bash
   export CLIENT_KEY=your-client-key
   export CLIENT_SECRET=your-client-secret
   ```
3. Run any example file to see it in action

## Example Structure

Each example file contains:
- **Simple Examples**: Basic usage with minimal code
- **Advanced Examples**: Complex workflows and best practices
- **Error Scenarios**: How to handle errors and edge cases

## Need Help?

For more information, see the main [README.md](../README.md) or the API documentation.
