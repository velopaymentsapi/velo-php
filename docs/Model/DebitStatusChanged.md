# # DebitStatusChanged

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**source_type** | **string** | OA3 Schema type name for the source info which is used as the discriminator value to ensure that data binding works correctly |
**event_id** | **string** | UUID id of the source event in the Velo platform |
**created_at** | [**\DateTime**](\DateTime.md) | ISO8601 timestamp indicating when the source event was created |
**debit_transaction_id** | **string** | ID of this debit transaction within the Velo platform |
**status** | **string** | The new status of the debit. One of \&quot;PENDING\&quot; \&quot;PROCESSING\&quot; \&quot;REJECTED\&quot; \&quot;RELEASED\&quot; |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
