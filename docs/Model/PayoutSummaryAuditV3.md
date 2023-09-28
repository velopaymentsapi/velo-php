# # PayoutSummaryAuditV3

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payout_id** | **string** |  |
**payor_id** | **string** |  | [optional]
**status** | **string** | Current status of the payout. One of the following values: ACCEPTED, REJECTED, SUBMITTED, QUOTED, INSTRUCTED, COMPLETED, INCOMPLETE, CONFIRMED, WITHDRAWN |
**submitted_date_time** | **string** |  |
**instructed_date_time** | **string** |  | [optional]
**withdrawn_date_time** | **string** |  | [optional]
**total_payments** | **int** |  | [optional]
**total_incomplete_payments** | **int** |  | [optional]
**total_failed_payments** | **int** |  | [optional]
**source_account_summary** | [**\VeloPayments\Client\Model\SourceAccountSummaryV3[]**](SourceAccountSummaryV3.md) |  | [optional]
**fx_summaries** | [**\VeloPayments\Client\Model\FxSummaryV3[]**](FxSummaryV3.md) |  | [optional]
**payout_memo** | **string** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
