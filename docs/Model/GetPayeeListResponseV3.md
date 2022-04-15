# # GetPayeeListResponseV3

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payee_id** | **string** |  | [optional] [readonly]
**payor_refs** | [**\VeloPayments\Client\Model\PayeePayorRefV3[]**](PayeePayorRefV3.md) |  | [optional] [readonly]
**email** | **string** |  | [optional]
**onboarded_status** | [**\VeloPayments\Client\Model\OnboardedStatusV3**](OnboardedStatusV3.md) |  | [optional]
**watchlist_status** | [**\VeloPayments\Client\Model\WatchlistStatusV3**](WatchlistStatusV3.md) |  | [optional]
**watchlist_status_updated_timestamp** | **string** |  | [optional] [readonly]
**watchlist_override_comment** | **string** |  | [optional]
**language** | **string** | An IETF BCP 47 language code which has been configured for use within this Velo environment.&lt;BR&gt; See the /v1/supportedLanguages endpoint to list the available codes for an environment. | [optional]
**created** | **\DateTime** |  | [optional]
**country** | **string** | Valid ISO 3166 2 character country code. See the &lt;a href&#x3D;\&quot;https://www.iso.org/iso-3166-country-codes.html\&quot; target&#x3D;\&quot;_blank\&quot; a&gt;ISO specification&lt;/a&gt; for details. | [optional]
**display_name** | **string** |  | [optional]
**payee_type** | [**\VeloPayments\Client\Model\PayeeType2**](PayeeType2.md) |  | [optional]
**disabled** | **bool** |  | [optional]
**disabled_comment** | **string** |  | [optional]
**disabled_updated_timestamp** | **\DateTime** |  | [optional]
**individual** | [**\VeloPayments\Client\Model\GetPayeeListResponseIndividualV3**](GetPayeeListResponseIndividualV3.md) |  | [optional]
**company** | [**\VeloPayments\Client\Model\GetPayeeListResponseCompanyV3**](GetPayeeListResponseCompanyV3.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
