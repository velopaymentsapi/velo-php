# # CreatePayeeV4

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**email** | **string** |  |
**remote_id** | **string** |  |
**type** | [**\VeloPayments\Client\Model\PayeeTypeEnum**](PayeeTypeEnum.md) |  |
**address** | [**\VeloPayments\Client\Model\CreatePayeeAddressV4**](CreatePayeeAddressV4.md) |  |
**payment_channel** | [**\VeloPayments\Client\Model\CreatePaymentChannelV4**](CreatePaymentChannelV4.md) |  | [optional]
**challenge** | [**\VeloPayments\Client\Model\ChallengeV4**](ChallengeV4.md) |  | [optional]
**language** | **string** | An IETF BCP 47 language code which has been configured for use within this Velo environment.&lt;BR&gt; See the /v1/supportedLanguages endpoint to list the available codes for an environment. | [optional]
**company** | [**\VeloPayments\Client\Model\CompanyV4**](CompanyV4.md) |  | [optional]
**individual** | [**\VeloPayments\Client\Model\CreateIndividualV4**](CreateIndividualV4.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
