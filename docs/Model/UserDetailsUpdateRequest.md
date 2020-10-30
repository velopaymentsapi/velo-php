# # UserDetailsUpdateRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**primary_contact_number** | **string** | The main contact number for the user | [optional]
**secondary_contact_number** | **string** | The secondary contact number for the user | [optional]
**first_name** | **string** |  | [optional]
**last_name** | **string** |  | [optional]
**email** | **string** | the email address of the user | [optional]
**sms_number** | **string** | The phone number of a device that the user can receive sms messages on | [optional]
**mfa_type** | [**\VeloPayments\Client\Model\MFAType**](MFAType.md) |  | [optional]
**verification_code** | **string** | &lt;p&gt;Optional property that MUST be suppied when manually verifying a user&lt;/p&gt; &lt;p&gt;The user&#39;s smsNumber is registered via a separate endpoint and an OTP sent to them&lt;/p&gt; | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
