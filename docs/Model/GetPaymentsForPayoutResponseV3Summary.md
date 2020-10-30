# # GetPaymentsForPayoutResponseV3Summary

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payout_status** | **string** | The current status of the payout. | [optional]
**submitted_date_time** | [**\DateTime**](\DateTime.md) | The date/time at which the payout was submitted. | [optional]
**instructed_date_time** | [**\DateTime**](\DateTime.md) | The date/time at which the payout was instructed. | [optional]
**withdrawn_date_time** | [**\DateTime**](\DateTime.md) | The date/time at which the payout was withdrawn. | [optional]
**payout_memo** | **string** | The memo attached to the payout. | [optional]
**total_payments** | **int** | The count of payments within the payout. | [optional]
**confirmed_payments** | **int** | The count of payments within the payout which have been confirmed. | [optional]
**released_payments** | **int** | The count of payments within the payout which have been released. | [optional]
**incomplete_payments** | **int** | The count of payments within the payout which are incomplete. | [optional]
**failed_payments** | **int** | The count of payments within the payout which have failed or been returned. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
