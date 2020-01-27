# # InviteUserRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**email** | **string** | the email address of the invited user | 
**mfa_type** | **string** | &lt;p&gt;The MFA type that the user will use&lt;/p&gt; &lt;p&gt;The type may be conditional on the role(s) the user has&lt;/p&gt; | 
**sms_number** | **string** | The phone number of a device that the user can receive sms messages on | 
**primary_contact_number** | **string** | The main contact number for the user | 
**secondary_contact_number** | **string** | The secondary contact number for the user | [optional] 
**roles** | **string[]** | The role(s) for the user The role must exist The role can be a custom role or a system role but the invoker must have the permissions to assign the role System roles are: backoffice.admin, payor.master_admin, payor.admin, payor.support | 
**first_name** | **string** |  | [optional] 
**last_name** | **string** |  | [optional] 
**entity_id** | **string** | The payorId or null if the user is not a payor user | [optional] 
**verification_code** | **string** | Optional property that MUST be suppied when manually verifying a user The user&#39;s smsNumber is registered via a separate endpoint and an OTP sent to them | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


