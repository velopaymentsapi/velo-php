# # FailedPayee

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payee_id** | **string** |  | [optional] [readonly]
**payor_refs** | [**\VeloPayments\Client\Model\PayeePayorRefV3[]**](PayeePayorRefV3.md) |  | [optional] [readonly]
**email** | **string** |  | [optional]
**remote_id** | **string** |  | [optional]
**type** | [**\VeloPayments\Client\Model\PayeeType**](PayeeType.md) |  | [optional]
**address** | [**\VeloPayments\Client\Model\CreatePayeeAddress**](CreatePayeeAddress.md) |  | [optional]
**payment_channel** | [**\VeloPayments\Client\Model\CreatePaymentChannel**](CreatePaymentChannel.md) |  | [optional]
**challenge** | [**\VeloPayments\Client\Model\Challenge**](Challenge.md) |  | [optional]
**language** | **string** | An IETF BCP 47 language code which has been configured for use within this Velo environment.&lt;BR&gt; See the /v1/supportedLanguages endpoint to list the available codes for an environment. | [optional]
**company** | [**\VeloPayments\Client\Model\Company**](Company.md) |  | [optional]
**individual** | [**\VeloPayments\Client\Model\CreateIndividual**](CreateIndividual.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
