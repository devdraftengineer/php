# # ExchangeRateResponseDto

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**from** | **string** | Source currency code (USD for USDC) |
**to** | **string** | Target currency code (EUR for EURC) |
**midmarket_rate** | **string** | Mid-market exchange rate from source to target currency |
**buy_rate** | **string** | Rate for buying target currency (what you get when converting from source to target) |
**sell_rate** | **string** | Rate for selling target currency (what you pay when converting from target to source) |
**timestamp** | **string** | Timestamp when the exchange rate was last updated | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
