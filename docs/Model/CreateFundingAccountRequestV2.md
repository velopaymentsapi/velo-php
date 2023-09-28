# # CreateFundingAccountRequestV2

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** |  |
**name** | **string** |  |
**payor_id** | **string** |  |
**account_name** | **string** | Required if type is either FBO or PRIVATE | [optional]
**account_number** | **string** | Required if type is either FBO or PRIVATE | [optional]
**routing_number** | **string** | Required if type is either FBO or PRIVATE | [optional]
**currency** | **string** | ISO 4217 currency code, Required if type is either WUBS_DECOUPLED or PRIVATE | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
