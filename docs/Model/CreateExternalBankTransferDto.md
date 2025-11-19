# # CreateExternalBankTransferDto

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**source_wallet_id** | **string** | The ID of the source bridge wallet |
**source_currency** | **string** | The source currency |
**destination_currency** | **string** | The destination currency |
**destination_payment_rail** | [**\Devdraft\Model\BridgeFiatPaymentRail**](BridgeFiatPaymentRail.md) | The destination payment rail (fiat payment method) |
**external_account_id** | **string** | The external account ID for the bank transfer |
**amount** | **float** | The amount to transfer | [optional]
**wire_message** | **string** | Wire transfer message (1-256 characters, only for wire transfers) | [optional]
**sepa_reference** | **string** | SEPA reference message (6-140 characters, only for SEPA transfers) | [optional]
**swift_reference** | **string** | SWIFT reference message (1-190 characters, only for SWIFT transfers) | [optional]
**spei_reference** | **string** | SPEI reference message (1-40 characters, only for SPEI transfers) | [optional]
**swift_charges** | **string** | SWIFT charges bearer (only for SWIFT transfers) | [optional]
**ach_reference** | **string** | ACH reference message (1-10 characters, only for ACH transfers) | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
