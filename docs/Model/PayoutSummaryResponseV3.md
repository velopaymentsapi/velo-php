# # PayoutSummaryResponseV3

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payout_id** | **string** |  | [optional]
**status** | **string** |  | [optional]
**payments_submitted** | **int** |  | [optional]
**payments_accepted** | **int** |  | [optional]
**payments_rejected** | **int** |  | [optional]
**payments_withdrawn** | **int** |  |
**fx_summaries** | [**\VeloPayments\Client\Model\QuoteFxSummaryV3[]**](QuoteFxSummaryV3.md) |  |
**accounts** | [**\VeloPayments\Client\Model\SourceAccountV3[]**](SourceAccountV3.md) |  |
**accepted_payments** | [**\VeloPayments\Client\Model\AcceptedPaymentV3[]**](AcceptedPaymentV3.md) |  |
**rejected_payments** | [**\VeloPayments\Client\Model\RejectedPaymentV3[]**](RejectedPaymentV3.md) |  |
**schedule** | [**\VeloPayments\Client\Model\PayoutSchedule2**](PayoutSchedule2.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
