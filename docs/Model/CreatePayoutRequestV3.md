# # CreatePayoutRequestV3

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payout_from_payor_id** | **string** | &lt;p&gt;The id of the payor whose source account(s) will be debited&lt;/p&gt; &lt;p&gt;payoutFromPayorId and payoutToPayorId must be both supplied or both omitted&lt;/p&gt; | [optional]
**payout_to_payor_id** | **string** | &lt;p&gt;The id of the payor whose payees will be paid&lt;/p&gt; &lt;p&gt;payoutFromPayorId and payoutToPayorId must be both supplied or both omitted&lt;/p&gt; | [optional]
**payout_memo** | **string** | &lt;p&gt;Text applied to all payment memos unless specified explicitly on a payment&lt;/p&gt; &lt;p&gt;This should be the reference field on the statement seen by the payee (but not via ACH)&lt;/p&gt; | [optional]
**payments** | [**\VeloPayments\Client\Model\PaymentInstructionV3[]**](PaymentInstructionV3.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
