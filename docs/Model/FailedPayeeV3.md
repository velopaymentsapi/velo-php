# # FailedPayeeV3

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payee_id** | **string** |  | [optional] [readonly]
**payor_refs** | [**\VeloPayments\Client\Model\PayeePayorRefV3[]**](PayeePayorRefV3.md) |  | [optional] [readonly]
**email** | **string** |  | [optional]
**remote_id** | **string** |  | [optional]
**type** | **string** | Type of Payee. One of the following values: Individual, Company | [optional]
**address** | [**\VeloPayments\Client\Model\CreatePayeeAddressV3**](CreatePayeeAddressV3.md) |  | [optional]
**payment_channel** | [**\VeloPayments\Client\Model\CreatePaymentChannelV3**](CreatePaymentChannelV3.md) |  | [optional]
**challenge** | [**\VeloPayments\Client\Model\ChallengeV3**](ChallengeV3.md) |  | [optional]
**language** | **string** | An IETF BCP 47 language code which has been configured for use within this Velo environment.&lt;BR&gt; See the /v1/supportedLanguages endpoint to list the available codes for an environment. | [optional]
**company** | [**\VeloPayments\Client\Model\CompanyV3**](CompanyV3.md) |  | [optional]
**individual** | [**\VeloPayments\Client\Model\CreateIndividualV3**](CreateIndividualV3.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
