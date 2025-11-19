# # CreateWebhookDto

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Name of the webhook for identification purposes |
**url** | **string** | URL where webhook events will be sent |
**is_active** | **bool** | Whether the webhook is active and will receive events | [default to true]
**signing_secret** | **string** | Secret key used to sign webhook payloads for verification | [optional]
**encrypted** | **bool** | Whether webhook payloads should be encrypted | [default to false]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
