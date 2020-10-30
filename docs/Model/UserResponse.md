# # UserResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The id of the user | [optional]
**status** | **string** | The status of the user when the user has been invited but not yet enrolled they will have a PENDING status | [optional]
**email** | **string** | the email address of the user | [optional]
**sms_number** | **string** | The phone number of a device that the user can receive sms messages on | [optional]
**primary_contact_number** | **string** | The main contact number for the user | [optional]
**secondary_contact_number** | **string** | The secondary contact number for the user | [optional]
**first_name** | **string** |  | [optional]
**last_name** | **string** |  | [optional]
**entity_id** | **string** | The payorId or payeeId or null if the user is not a payor or payee user | [optional]
**roles** | [**\VeloPayments\Client\Model\Role[]**](Role.md) | The role(s) for the user | [optional]
**mfa_type** | **string** | The type of the MFA device | [optional]
**mfa_status** | **string** | The status of the MFA device | [optional]
**locked_out** | **bool** | If true the user is currently locked out and unable to log in | [optional]
**locked_out_timestamp** | [**\DateTime**](\DateTime.md) | A timestamp showing when the user was locked out If null then the user is not currently locked out | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
