# # GetPayeeListResponse2

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payee_id** | **string** |  | [optional] [readonly]
**payor_refs** | [**\VeloPayments\Client\Model\PayeePayorRef[]**](PayeePayorRef.md) |  | [optional] [readonly]
**email** | **string** |  | [optional]
**onboarded_status** | [**\VeloPayments\Client\Model\OnboardedStatus**](OnboardedStatus.md) |  | [optional]
**watchlist_status** | [**\VeloPayments\Client\Model\WatchlistStatus2**](WatchlistStatus2.md) |  | [optional]
**watchlist_status_updated_timestamp** | **string** |  | [optional] [readonly]
**watchlist_override_comment** | **string** |  | [optional]
**language** | **string** | An IETF BCP 47 language code which has been configured for use within this Velo environment.&lt;BR&gt; See the /v1/supportedLanguages endpoint to list the available codes for an environment. | [optional]
**created** | **\DateTime** |  | [optional]
**country** | **string** |  | [optional]
**display_name** | **string** |  | [optional]
**payee_type** | [**\VeloPayments\Client\Model\PayeeType2**](PayeeType2.md) |  | [optional]
**disabled** | **bool** |  | [optional]
**disabled_comment** | **string** |  | [optional]
**disabled_updated_timestamp** | **\DateTime** |  | [optional]
**individual** | [**\VeloPayments\Client\Model\GetPayeeListResponseIndividual2**](GetPayeeListResponseIndividual2.md) |  | [optional]
**company** | [**\VeloPayments\Client\Model\GetPayeeListResponseCompany2**](GetPayeeListResponseCompany2.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
