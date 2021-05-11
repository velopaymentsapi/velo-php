# # Error

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**error_message** | **string** | English language message indicating the nature of the error | [optional]
**error_code** | **string** | Unique numeric code that can be used for switching client behavior or to drive translated or customised error messages | [optional]
**localisation_details** | [**\VeloPayments\Client\Model\LocalisationDetails**](LocalisationDetails.md) |  | [optional]
**location** | **string** | the property or object that caused the error | [optional]
**location_type** | **string** | the location type in the request that was the cause of the error | [optional]
**reason_code** | **string** | a camel-cased string that can be used by clients to localise client error messages (deprecated) | [optional]
**error_data** | [**\VeloPayments\Client\Model\ErrorData**](ErrorData.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
