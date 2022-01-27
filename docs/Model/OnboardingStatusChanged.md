# # OnboardingStatusChanged

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**source_type** | **string** | OA3 Schema type name for the source info which is used as the discriminator value to ensure that data binding works correctly |
**event_id** | **string** | UUID id of the source event in the Velo platform |
**created_at** | **\DateTime** | ISO8601 timestamp indicating when the source event was created |
**payee_id** | **string** | ID of this payee within the Velo platform |
**reasons** | [**\VeloPayments\Client\Model\PayeeEventAllOfReasons[]**](PayeeEventAllOfReasons.md) | The reasons for the event notification. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
