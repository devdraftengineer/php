# # CreateBankPaymentIntentDto

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**source_payment_rail** | [**\Devdraft\Model\BridgePaymentRail**](BridgePaymentRail.md) | The banking payment method to use for the transfer. Determines processing time and fees. |
**source_currency** | [**\Devdraft\Model\FiatCurrency**](FiatCurrency.md) | The fiat currency to convert FROM. Must match the currency of the source payment rail. |
**destination_currency** | [**\Devdraft\Model\StableCoinCurrency**](StableCoinCurrency.md) | The stablecoin currency to convert TO. The customer will receive this currency. |
**destination_network** | [**\Devdraft\Model\BridgePaymentRail**](BridgePaymentRail.md) | The blockchain network where the stablecoin will be delivered. Must support the destination currency. |
**destination_address** | **string** | Destination wallet address. Supports Ethereum (0x...) and Solana address formats. | [optional]
**amount** | **string** | Payment amount (optional for flexible amount) | [optional]
**customer_first_name** | **string** | Customer first name | [optional]
**customer_last_name** | **string** | Customer last name | [optional]
**customer_email** | **string** | Customer email address | [optional]
**customer_address** | **string** | Customer address | [optional]
**customer_country** | **string** | Customer country | [optional]
**customer_country_iso** | **string** | Customer country ISO code | [optional]
**customer_province** | **string** | Customer province/state | [optional]
**customer_province_iso** | **string** | Customer province/state ISO code | [optional]
**phone_number** | **string** | Customer phone number | [optional]
**wire_message** | **string** | Wire transfer message (for WIRE transfers) | [optional]
**sepa_reference** | **string** | SEPA reference (for SEPA transfers) | [optional]
**ach_reference** | **string** | ACH reference (for ACH transfers) | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
