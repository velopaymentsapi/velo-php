# # PaymentEventResponseV3

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**event_id** | **string** | The id of the event. |
**event_date_time** | **\DateTime** | The date/time at which the event occurred. |
**event_type** | **string** | The type of the event. |
**source_currency** | [**\VeloPayments\Client\Model\PaymentAuditCurrencyV3**](PaymentAuditCurrencyV3.md) |  | [optional]
**source_amount** | **int** | The source amount exposed by the event. | [optional]
**payment_currency** | [**\VeloPayments\Client\Model\PaymentAuditCurrencyV3**](PaymentAuditCurrencyV3.md) |  | [optional]
**payment_amount** | **int** | The destination amount exposed by the event. | [optional]
**account_number** | **string** | The account number attached to the event. | [optional]
**routing_number** | **string** | The routing number attached to the event. | [optional]
**iban** | **string** |  | [optional]
**account_name** | **string** |  | [optional]
**principal** | **string** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
