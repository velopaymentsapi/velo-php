# # PayeeDetailResponseV3

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payee_id** | **string** |  | [optional] [readonly]
**payor_refs** | [**\VeloPayments\Client\Model\PayeePayorRefV3[]**](PayeePayorRefV3.md) |  | [optional] [readonly]
**email** | **string** |  | [optional]
**onboarded_status** | **string** | Onboarded status. One of the following values: CREATED, INVITED, REGISTERED, ONBOARDED | [optional]
**watchlist_status** | **string** | Current watchlist status. One of the following values: NONE, PENDING, REVIEW, PASSED, FAILED | [optional]
**watchlist_override_expires_at_timestamp** | **\DateTime** |  | [optional]
**watchlist_override_comment** | **string** |  | [optional]
**language** | **string** | An IETF BCP 47 language code which has been configured for use within this Velo environment.&lt;BR&gt; See the /v1/supportedLanguages endpoint to list the available codes for an environment. | [optional]
**created** | **\DateTime** |  | [optional]
**country** | **string** | Valid ISO 3166 2 character country code. See the &lt;a href&#x3D;\&quot;https://www.iso.org/iso-3166-country-codes.html\&quot; target&#x3D;\&quot;_blank\&quot; a&gt;ISO specification&lt;/a&gt; for details. | [optional]
**display_name** | **string** |  | [optional]
**payee_type** | **string** | Type of Payee. One of the following values: Individual, Company | [optional]
**disabled** | **bool** |  | [optional]
**disabled_comment** | **string** |  | [optional]
**disabled_updated_timestamp** | **\DateTime** |  | [optional]
**address** | [**\VeloPayments\Client\Model\PayeeAddressV3**](PayeeAddressV3.md) |  | [optional]
**individual** | [**\VeloPayments\Client\Model\IndividualV3**](IndividualV3.md) |  | [optional]
**company** | [**\VeloPayments\Client\Model\CompanyV3**](CompanyV3.md) |  | [optional]
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
**challenge** | [**\VeloPayments\Client\Model\ChallengeV3**](ChallengeV3.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
