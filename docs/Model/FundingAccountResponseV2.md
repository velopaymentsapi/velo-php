# # FundingAccountResponseV2

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Funding Account Id | [optional]
**payor_id** | **string** |  | [optional]
**account_name** | **string** | name on the bank account | [optional]
**account_number** | **string** | bank account number | [optional]
**routing_number** | **string** | bank account routing number | [optional]
**name** | **string** | name of funding account | [optional]
**currency** | **string** | Valid ISO 4217 3 letter currency code. See the &lt;a href&#x3D;\&quot;https://www.iso.org/iso-4217-currency-codes.html\&quot; target&#x3D;\&quot;_blank\&quot; a&gt;ISO specification&lt;/a&gt; for details. | [optional]
**country** | **string** | ISO 3166-1 2 letter country code (upper case) | [optional]
**type** | **string** | Funding account type. One of the following values: FBO, WUBS_DECOUPLED, PRIVATE | [optional]
**archived** | **bool** | A flag for whether the funding account has been archived.  Only present in the response if true. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
