# # PaymentResponseV3

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payment_id** | **string** | The id of the payment |
**payee_id** | **string** | The id of the paymeee |
**payor_id** | **string** | The id of the payor |
**payor_name** | **string** | The name of the payor | [optional]
**quote_id** | **string** | The quote Id used for the FX |
**source_account_id** | **string** | The id of the source account from which the payment was taken |
**source_account_name** | **string** | The name of the source account from which the payment was taken | [optional]
**remote_id** | **string** | The remote id by which the payor refers to the payee. Only populated once payment is confirmed | [optional]
**source_amount** | **int** | The source amount for the payment (amount debited to make the payment) | [optional]
**source_currency** | [**\VeloPayments\Client\Model\PaymentAuditCurrencyV3**](PaymentAuditCurrencyV3.md) |  | [optional]
**payment_amount** | **int** | The amount which the payee will receive |
**payment_currency** | [**\VeloPayments\Client\Model\PaymentAuditCurrencyV3**](PaymentAuditCurrencyV3.md) |  | [optional]
**rate** | **float** | The FX rate for the payment, if FX was involved. **Note** that (depending on the role of the caller) this information may not be displayed | [optional]
**inverted_rate** | **float** | The inverted FX rate for the payment, if FX was involved. **Note** that (depending on the role of the caller) this information may not be displayed | [optional]
**submitted_date_time** | [**\DateTime**](\DateTime.md) |  |
**status** | **string** |  |
**funding_status** | **string** | The funding status of the payment |
**routing_number** | **string** | The routing number for the payment. | [optional]
**account_number** | **string** | The account number for the account which will receive the payment. | [optional]
**iban** | **string** | The iban for the payment. | [optional]
**payment_memo** | **string** | The payment memo set by the payor | [optional]
**filename_reference** | **string** | ACH file payment was submitted in, if applicable | [optional]
**individual_identification_number** | **string** | Individual Identification Number assigned to the payment in the ACH file, if applicable | [optional]
**trace_number** | **string** | Trace Number assigned to the payment in the ACH file, if applicable | [optional]
**payor_payment_id** | **string** |  | [optional]
**payment_channel_id** | **string** |  | [optional]
**payment_channel_name** | **string** |  | [optional]
**account_name** | **string** |  | [optional]
**rails_id** | **string** | The rails ID. Default value is RAILS ID UNAVAILABLE when not populated. | [default to 'RAILS ID UNAVAILABLE']
**country_code** | **string** | The country code of the payment channel. | [optional]
**events** | [**\VeloPayments\Client\Model\PaymentEventResponseV3[]**](PaymentEventResponseV3.md) |  |
**return_cost** | **int** | The return cost if a returned payment. | [optional]
**return_reason** | **string** |  | [optional]
**rails_payment_id** | **string** |  | [optional]
**rails_batch_id** | **string** |  | [optional]
**rejection_reason** | **string** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
