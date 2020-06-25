# # PayeeDetailResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payee_id** | **string** |  | [optional] [readonly] 
**payor_refs** | [**\VeloPayments\Client\Model\PayeePayorRefV3[]**](PayeePayorRefV3.md) |  | [optional] [readonly] 
**email** | **string** |  | [optional] 
**onboarded_status** | [**\VeloPayments\Client\Model\OnboardedStatus2**](OnboardedStatus2.md) |  | [optional] 
**watchlist_status** | [**\VeloPayments\Client\Model\WatchlistStatus**](WatchlistStatus.md) |  | [optional] 
**watchlist_override_expires_at_timestamp** | [**\DateTime**](\DateTime.md) |  | [optional] 
**watchlist_override_comment** | **string** |  | [optional] 
**language** | [**\VeloPayments\Client\Model\Language2**](Language2.md) |  | [optional] 
**created** | [**\DateTime**](\DateTime.md) |  | [optional] 
**country** | **string** |  | [optional] 
**display_name** | **string** |  | [optional] 
**payee_type** | [**\VeloPayments\Client\Model\PayeeType**](PayeeType.md) |  | [optional] 
**disabled** | **bool** |  | [optional] 
**disabled_comment** | **string** |  | [optional] 
**disabled_updated_timestamp** | [**\DateTime**](\DateTime.md) |  | [optional] 
**address** | [**\VeloPayments\Client\Model\PayeeAddress2**](PayeeAddress2.md) |  | [optional] 
**individual** | [**\VeloPayments\Client\Model\Individual2**](Individual2.md) |  | [optional] 
**company** | [**\VeloPayments\Client\Model\Company2**](Company2.md) |  | [optional] 
**cellphone_number** | **string** |  | [optional] 
**watchlist_status_updated_timestamp** | **string** |  | [optional] [readonly] 
**grace_period_end_date** | [**\DateTime**](\DateTime.md) |  | [optional] [readonly] 
**enhanced_kyc_completed** | **bool** |  | [optional] 
**kyc_completed_timestamp** | **string** |  | [optional] 
**pause_payment** | **bool** |  | [optional] 
**pause_payment_timestamp** | **string** |  | [optional] 
**marketing_opt_in_decision** | **bool** |  | [optional] 
**marketing_opt_in_timestamp** | **string** |  | [optional] 
**accept_terms_and_conditions_timestamp** | [**\DateTime**](\DateTime.md) | The timestamp when the payee last accepted T&amp;Cs | [optional] [readonly] 
**challenge** | [**\VeloPayments\Client\Model\Challenge2**](Challenge2.md) |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


