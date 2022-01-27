# # PayoutSummaryAudit

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payout_id** | **string** |  | [optional]
**payor_id** | **string** |  | [optional]
**status** | [**\VeloPayments\Client\Model\PayoutStatus**](PayoutStatus.md) |  |
**date_time** | **\DateTime** |  | [optional]
**submitted_date_time** | **string** |  |
**instructed_date_time** | **string** |  | [optional]
**withdrawn_date_time** | **\DateTime** |  | [optional]
**total_payments** | **int** |  | [optional]
**total_incomplete_payments** | **int** |  | [optional]
**total_returned_payments** | **int** |  | [optional]
**total_withdrawn_payments** | **int** |  | [optional]
**source_account_summary** | [**\VeloPayments\Client\Model\SourceAccountSummary[]**](SourceAccountSummary.md) |  | [optional]
**fx_summaries** | [**\VeloPayments\Client\Model\FxSummary[]**](FxSummary.md) |  | [optional]
**payout_memo** | **string** |  | [optional]
**payout_type** | [**\VeloPayments\Client\Model\PayoutType**](PayoutType.md) |  |
**payor_name** | **string** |  |
**schedule** | [**\VeloPayments\Client\Model\PayoutSchedule**](PayoutSchedule.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
