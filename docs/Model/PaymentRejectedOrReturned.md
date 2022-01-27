# # PaymentRejectedOrReturned

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**source_type** | **string** | OA3 Schema type name for the source info which is used as the discriminator value to ensure that data binding works correctly |
**event_id** | **string** | UUID id of the source event in the Velo platform |
**created_at** | **\DateTime** | ISO8601 timestamp indicating when the source event was created |
**payment_id** | **string** | ID of this payment within the Velo platform |
**payout_payor_ids** | [**\VeloPayments\Client\Model\PayoutPayorIds**](PayoutPayorIds.md) |  | [optional]
**payor_payment_id** | **string** | ID of this payment in the payors system | [optional]
**status** | **string** | The new status of the payment. One of \&quot;SUBMITTED\&quot; \&quot;ACCEPTED\&quot; \&quot;REJECTED\&quot; \&quot;ACCEPTED_BY_RAILS\&quot; \&quot;CONFIRMED\&quot; \&quot;RETURNED\&quot; \&quot;WITHDRAWN\&quot; |
**reason_code** | **string** | The Velo code that indicates why the payment was rejected or returned |
**reason_message** | **string** | The description of why the payment was rejected or returned |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
