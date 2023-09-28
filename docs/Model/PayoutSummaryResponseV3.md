# # PayoutSummaryResponseV3

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payout_id** | **string** | The id of the payout | [optional]
**status** | **string** | The status of the payout (one of SUBMITTED, ACCEPTED, REJECTED, QUOTED, INSTRUCTED, COMPLETED, INCOMPLETE, WITHDRAWN) | [optional]
**payments_submitted** | **int** | The number of payments that were submitted in the payout | [optional]
**payments_accepted** | **int** | The number of payments that were accepted in the payout | [optional]
**payments_rejected** | **int** | The number of payments that were rejected in the payout | [optional]
**payments_withdrawn** | **int** | The number of payments that were withdrawn in the payout |
**fx_summaries** | [**\VeloPayments\Client\Model\QuoteFxSummaryV3[]**](QuoteFxSummaryV3.md) |  |
**accounts** | [**\VeloPayments\Client\Model\SourceAccountV3[]**](SourceAccountV3.md) |  |
**accepted_payments** | [**\VeloPayments\Client\Model\AcceptedPaymentV3[]**](AcceptedPaymentV3.md) |  |
**rejected_payments** | [**\VeloPayments\Client\Model\RejectedPaymentV3[]**](RejectedPaymentV3.md) |  |
**schedule** | [**\VeloPayments\Client\Model\PayoutScheduleV3**](PayoutScheduleV3.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
