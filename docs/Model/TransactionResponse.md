# # TransactionResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**transaction_id** | **string** | The Id of the transaction |
**transaction_short_code** | **string** | The short code for the transaction that can be used when sending funds into the platform |
**payor_id** | **string** | Indicates the Payor of the Transaction and which matches the payorId on the provided source account | [optional]
**source_account_name** | **string** | The name of the source account associated with the Transaction | [optional]
**source_account_id** | **string** | The Id of the source account associated with the Transaction | [optional]
**transaction_reference** | **string** | The payors own reference for the transaction | [optional]
**transaction_metadata** | **array<string,string>** | Optional metadata attached to the transaction at creation time. | [optional]
**balance** | **int** | The total amount of transaction in minor units | [optional]
**currency** | **string** | Valid ISO 4217 3 letter currency code. See the &lt;a href&#x3D;\&quot;https://www.iso.org/iso-4217-currency-codes.html\&quot; target&#x3D;\&quot;_blank\&quot; a&gt;ISO specification&lt;/a&gt; for details. | [optional]
**created_at** | **\DateTime** | A timestamp when the transaction has been created. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
