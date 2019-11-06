# # CreatePayoutRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payor_id** | **string** | Deprecated in v2.16. Any value supplied here will be ignored. | [optional] 
**payout_from_payor_id** | **string** | The id of the payor whose source account(s) will be debited. payoutFromPayorId and payoutToPayorId must be both supplied or both omitted. | [optional] 
**payout_to_payor_id** | **string** | The id of the payor whose payees will be paid. payoutFromPayorId and payoutToPayorId must be both supplied or both omitted. | [optional] 
**payout_memo** | **string** | Text applied to all payment memos unless specified explicitly on a payment. This should be the reference field on the statement seen by the payee (but not via ACH) | [optional] 
**payments** | [**\VeloPayments\Client\Model\PaymentInstruction[]**](PaymentInstruction.md) |  | 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


