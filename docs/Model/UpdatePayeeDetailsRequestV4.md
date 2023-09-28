# # UpdatePayeeDetailsRequestV4

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**address** | [**\VeloPayments\Client\Model\PayeeAddressV4**](PayeeAddressV4.md) |  | [optional]
**individual** | [**\VeloPayments\Client\Model\IndividualV4**](IndividualV4.md) |  | [optional]
**company** | [**\VeloPayments\Client\Model\CompanyV4**](CompanyV4.md) |  | [optional]
**language** | **string** | An IETF BCP 47 language code which has been configured for use within this Velo environment.&lt;BR&gt; See the /v1/supportedLanguages endpoint to list the available codes for an environment. | [optional]
**payee_type** | [**\VeloPayments\Client\Model\PayeeTypeEnum**](PayeeTypeEnum.md) |  | [optional]
**challenge** | [**\VeloPayments\Client\Model\ChallengeV4**](ChallengeV4.md) |  | [optional]
**email** | **string** |  | [optional]
**contact_sms_number** | **string** | The phone number of a device that the payee wishes to receive sms messages on | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
