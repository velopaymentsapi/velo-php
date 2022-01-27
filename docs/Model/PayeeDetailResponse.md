# # PayeeDetailResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payee_id** | **string** |  | [optional] [readonly]
**payor_refs** | [**\VeloPayments\Client\Model\PayeePayorRefV3[]**](PayeePayorRefV3.md) |  | [optional] [readonly]
**email** | **string** |  | [optional]
**onboarded_status** | [**\VeloPayments\Client\Model\OnboardedStatus2**](OnboardedStatus2.md) |  | [optional]
**watchlist_status** | [**\VeloPayments\Client\Model\WatchlistStatus**](WatchlistStatus.md) |  | [optional]
**watchlist_override_expires_at_timestamp** | **\DateTime** |  | [optional]
**watchlist_override_comment** | **string** |  | [optional]
**language** | **string** | An IETF BCP 47 language code which has been configured for use within this Velo environment.&lt;BR&gt; See the /v1/supportedLanguages endpoint to list the available codes for an environment. | [optional]
**created** | **\DateTime** |  | [optional]
**country** | **string** |  | [optional]
**display_name** | **string** |  | [optional]
**payee_type** | [**\VeloPayments\Client\Model\PayeeType2**](PayeeType2.md) |  | [optional]
**disabled** | **bool** |  | [optional]
**disabled_comment** | **string** |  | [optional]
**disabled_updated_timestamp** | **\DateTime** |  | [optional]
**address** | [**\VeloPayments\Client\Model\PayeeAddress**](PayeeAddress.md) |  | [optional]
**individual** | [**\VeloPayments\Client\Model\Individual**](Individual.md) |  | [optional]
**company** | [**\VeloPayments\Client\Model\Company**](Company.md) |  | [optional]
**cellphone_number** | **string** |  | [optional]
**watchlist_status_updated_timestamp** | **string** |  | [optional] [readonly]
**grace_period_end_date** | **\DateTime** |  | [optional] [readonly]
**enhanced_kyc_completed** | **bool** |  | [optional]
**kyc_completed_timestamp** | **string** |  | [optional]
**pause_payment** | **bool** |  | [optional]
**pause_payment_timestamp** | **string** |  | [optional]
**marketing_opt_in_decision** | **bool** |  | [optional]
**marketing_opt_in_timestamp** | **string** |  | [optional]
**accept_terms_and_conditions_timestamp** | **\DateTime** | The timestamp when the payee last accepted T&amp;Cs | [optional] [readonly]
**challenge** | [**\VeloPayments\Client\Model\Challenge**](Challenge.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
