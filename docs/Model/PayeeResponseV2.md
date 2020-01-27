# # PayeeResponseV2

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payee_id** | **string** |  | [optional] [readonly] 
**payor_refs** | [**\VeloPayments\Client\Model\PayeePayorRefV2[]**](PayeePayorRefV2.md) |  | [optional] [readonly] 
**email** | **string** |  | [optional] 
**onboarded_status** | [**\VeloPayments\Client\Model\OnboardedStatus2**](OnboardedStatus2.md) |  | [optional] 
**ofac_status** | [**\VeloPayments\Client\Model\OfacStatus2**](OfacStatus2.md) |  | [optional] 
**language** | [**\VeloPayments\Client\Model\Language2**](Language2.md) |  | [optional] 
**created** | [**\DateTime**](\DateTime.md) |  | [optional] 
**country** | **string** |  | [optional] 
**display_name** | **string** |  | [optional] 
**payee_type** | [**\VeloPayments\Client\Model\PayeeType**](PayeeType.md) |  | [optional] 
**disabled** | **bool** |  | [optional] 
**disabled_comment** | **string** |  | [optional] 
**disabled_updated_timestamp** | [**\DateTime**](\DateTime.md) |  | [optional] 
**address** | [**\VeloPayments\Client\Model\PayeeAddress2**](PayeeAddress2.md) |  | [optional] 
**individual** | [**\VeloPayments\Client\Model\Individual**](Individual.md) |  | [optional] 
**company** | [**\VeloPayments\Client\Model\Company**](Company.md) |  | [optional] 
**cellphone_number** | **string** |  | [optional] 
**last_ofac_check_timestamp** | **string** |  | [optional] [readonly] 
**ofac_override** | **bool** |  | [optional] 
**ofac_override_reason** | **string** |  | [optional] 
**ofac_override_timestamp** | **string** |  | [optional] 
**grace_period_end_date** | [**\DateTime**](\DateTime.md) |  | [optional] [readonly] 
**enhanced_kyc_completed** | **bool** |  | [optional] 
**kyc_completed_timestamp** | **string** |  | [optional] 
**pause_payment** | **bool** |  | [optional] 
**pause_payment_timestamp** | **string** |  | [optional] 
**marketing_opt_in_decision** | **bool** |  | [optional] 
**marketing_opt_in_timestamp** | **string** |  | [optional] 
**accept_terms_and_conditions_timestamp** | [**\DateTime**](\DateTime.md) | The timestamp when the payee last accepted T&amp;Cs | [optional] [readonly] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


