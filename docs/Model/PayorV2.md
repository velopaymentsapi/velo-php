# # PayorV2

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payor_id** | **string** |  | [optional] 
**payor_name** | **string** | The name of the payor. | 
**address** | [**\VeloPayments\Client\Model\Address**](Address.md) |  | [optional] 
**primary_contact_name** | **string** | Name of primary contact for the payor. | [optional] 
**primary_contact_phone** | **string** | Primary contact phone number for the payor. | [optional] 
**primary_contact_email** | **string** | Primary contact email for the payor. | [optional] 
**kyc_state** | **string** | The kyc state of the payor. | [optional] 
**manual_lockout** | **bool** | Whether or not the payor has been manually locked by the backoffice. | [optional] 
**payee_grace_period_processing_enabled** | **bool** | Whether grace period processing is enabled. | [optional] 
**payee_grace_period_days** | **int** | The grace period for paying payees in days. | [optional] 
**collective_alias** | **string** | How the payor has chosen to refer to payees. | [optional] 
**support_contact** | **string** | The payor’s support contact email address. | [optional] 
**dba_name** | **string** | The payor’s &#39;Doing Business As&#39; name. | [optional] 
**allows_language_choice** | **bool** | Whether or not the payor allows language choice in the UI. | [optional] 
**reminder_emails_opt_out** | **bool** | Whether or not the payor has opted-out of reminder emails being sent. | [optional] 
**language** | **string** | The payor’s language preference. Must be one of [EN, FR]. | [optional] 
**includes_reports** | **bool** |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


