# # CreateTaxDto

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Tax name. Used to identify and reference this tax rate. |
**description** | **string** | Optional description explaining what this tax covers. | [optional]
**percentage** | **float** | Tax percentage rate. Must be between 0 and 100. |
**active** | **bool** | Whether this tax is currently active and can be applied. | [optional] [default to true]
**app_ids** | **string[]** | Array of app IDs where this tax should be available. If not provided, tax will be available for the current app. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
