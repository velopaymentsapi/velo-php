# # GetPaymentsForPayoutResponseV4Summary

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payout_status** | **string** | The current status of the payout. | [optional] 
**submitted_date_time** | [**\DateTime**](\DateTime.md) | The date/time at which the payout was submitted. | [optional] 
**instructed_date_time** | [**\DateTime**](\DateTime.md) | The date/time at which the payout was instructed. | [optional] 
**payout_memo** | **string** | The memo attached to the payout. | [optional] 
**payout_type** | [**\VeloPayments\Client\Model\PayoutTypeV4**](PayoutTypeV4.md) |  | [optional] 
**quoted_date_time** | [**\DateTime**](\DateTime.md) | The date/time at which the payout was quoted. | [optional] 
**submitting** | [**\VeloPayments\Client\Model\PayoutPayorV4**](PayoutPayorV4.md) |  | [optional] 
**payout_from** | [**\VeloPayments\Client\Model\PayoutPayorV4**](PayoutPayorV4.md) |  | [optional] 
**payout_to** | [**\VeloPayments\Client\Model\PayoutPayorV4**](PayoutPayorV4.md) |  | [optional] 
**quoted** | [**\VeloPayments\Client\Model\PayoutPrincipalV4**](PayoutPrincipalV4.md) |  | [optional] 
**instructed** | [**\VeloPayments\Client\Model\PayoutPrincipalV4**](PayoutPrincipalV4.md) |  | [optional] 
**withdrawn** | [**\VeloPayments\Client\Model\PayoutPrincipalV4**](PayoutPrincipalV4.md) |  | [optional] 
**total_payments** | **int** | The count of payments within the payout. | [optional] 
**confirmed_payments** | **int** | The count of payments within the payout which have been confirmed. | [optional] 
**released_payments** | **int** | The count of payments within the payout which have been released. | [optional] 
**incomplete_payments** | **int** | The count of payments within the payout which are incomplete. | [optional] 
**returned_payments** | **int** | The count of payments within the payout which have been returned. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


