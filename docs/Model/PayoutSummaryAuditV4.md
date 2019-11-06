# # PayoutSummaryAuditV4

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payout_id** | **string** |  | 
**payor_id** | **string** | Deprecated in v2.16. Will be populated with submitting payor ID until removed in a later release. | [optional] 
**status** | [**\VeloPayments\Client\Model\PayoutStatusV4**](PayoutStatusV4.md) |  | 
**date_time** | [**\DateTime**](\DateTime.md) |  | [optional] 
**submitted_date_time** | **string** |  | 
**instructed_date_time** | **string** |  | [optional] 
**withdrawn_date_time** | [**\DateTime**](\DateTime.md) |  | [optional] 
**total_payments** | **int** |  | [optional] 
**total_incomplete_payments** | **int** |  | [optional] 
**total_returned_payments** | **int** |  | [optional] 
**source_account_summary** | [**\VeloPayments\Client\Model\SourceAccountSummaryV4[]**](SourceAccountSummaryV4.md) |  | [optional] 
**fx_summaries** | [**\VeloPayments\Client\Model\FxSummaryV4[]**](FxSummaryV4.md) |  | [optional] 
**payout_memo** | **string** |  | [optional] 
**payout_type** | [**\VeloPayments\Client\Model\PayoutTypeV4**](PayoutTypeV4.md) |  | 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


