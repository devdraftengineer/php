# # UpdateCustomerDto

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**first_name** | **string** | Customer&#39;s first name. Used for personalization and legal documentation. | [optional]
**last_name** | **string** | Customer&#39;s last name. Used for personalization and legal documentation. | [optional]
**email** | **string** | Customer&#39;s email address. Used for notifications, receipts, and account management. Must be a valid email format. | [optional]
**phone_number** | **string** | Customer&#39;s phone number. Used for SMS notifications and verification. Include country code for international numbers. | [optional]
**customer_type** | [**\Devdraft\Model\CustomerType**](CustomerType.md) | Type of customer account. Determines available features and compliance requirements. | [optional]
**status** | [**\Devdraft\Model\CustomerStatus**](CustomerStatus.md) | Current status of the customer account. Controls access to services and features. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
