# # CreateTransactionRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payor_id** | **string** | Indicates the Payor creating the Transaction and which matches the payorId on the provided source account |
**source_account_name** | **string** | The name of the source account that the new Transaction will be associated with and any funding containing the transactionShortCode will credit. |
**transaction_reference** | **string** | The payors own reference for the transaction that can later be used for querying and retrieval. |
**transaction_metadata** | **array<string,string>** | Optional metadata that will be attached to the created transaction and can that can be retrieved later.| The total length of all the keys and values provided in the metadata must be no more than 4000 chars. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
