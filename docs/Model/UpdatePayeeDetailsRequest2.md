# # UpdatePayeeDetailsRequest2

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**address** | [**\VeloPayments\Client\Model\PayeeAddress2**](PayeeAddress2.md) |  | [optional]
**individual** | [**\VeloPayments\Client\Model\Individual2**](Individual2.md) |  | [optional]
**company** | [**\VeloPayments\Client\Model\Company2**](Company2.md) |  | [optional]
**language** | **string** | An IETF BCP 47 language code which has been configured for use within this Velo environment.&lt;BR&gt; See the /v1/supportedLanguages endpoint to list the available codes for an environment. | [optional]
**payee_type** | [**\VeloPayments\Client\Model\PayeeType2**](PayeeType2.md) |  | [optional]
**challenge** | [**\VeloPayments\Client\Model\Challenge2**](Challenge2.md) |  | [optional]
**email** | **string** |  | [optional]
**contact_sms_number** | **string** | The phone number of a device that the payee wishes to receive sms messages on | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
