# # GetPaymentsForPayoutResponseV4Summary

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payout_status** | [**\VeloPayments\Client\Model\PayoutStatus**](PayoutStatus.md) |  | [optional]
**submitted_date_time** | **\DateTime** | The date/time at which the payout was submitted. | [optional]
**instructed_date_time** | **\DateTime** | The date/time at which the payout was instructed. | [optional]
**withdrawn_date_time** | **\DateTime** |  | [optional]
**quoted_date_time** | **\DateTime** | The date/time at which the payout was quoted. | [optional]
**payout_memo** | **string** | The memo attached to the payout. | [optional]
**total_payments** | **int** | The count of payments within the payout. | [optional]
**confirmed_payments** | **int** | The count of payments within the payout which have been confirmed. | [optional]
**released_payments** | **int** | The count of payments within the payout which have been released. | [optional]
**incomplete_payments** | **int** | The count of payments within the payout which are incomplete. | [optional]
**returned_payments** | **int** | The count of payments within the payout which have been returned. | [optional]
**withdrawn_payments** | **int** | The count of payments within the payout which have been withdrawn. | [optional]
**payout_type** | [**\VeloPayments\Client\Model\PayoutType**](PayoutType.md) |  | [optional]
**submitting** | [**\VeloPayments\Client\Model\PayoutPayor**](PayoutPayor.md) |  | [optional]
**payout_from** | [**\VeloPayments\Client\Model\PayoutPayor**](PayoutPayor.md) |  | [optional]
**payout_to** | [**\VeloPayments\Client\Model\PayoutPayor**](PayoutPayor.md) |  | [optional]
**quoted** | [**\VeloPayments\Client\Model\PayoutPrincipal**](PayoutPrincipal.md) |  | [optional]
**instructed** | [**\VeloPayments\Client\Model\PayoutPrincipal**](PayoutPrincipal.md) |  | [optional]
**withdrawn** | [**\VeloPayments\Client\Model\PayoutPrincipal**](PayoutPrincipal.md) |  | [optional]
**schedule** | [**\VeloPayments\Client\Model\PayoutSchedule**](PayoutSchedule.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
