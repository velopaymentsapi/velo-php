# PaymentResponse

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payment_id** | **string** |  | 
**payee_id** | **string** |  | 
**payor_id** | **string** |  | 
**payor_name** | **string** |  | [optional] 
**quote_id** | **string** |  | 
**source_account_id** | **string** |  | 
**source_account_name** | **string** |  | [optional] 
**remote_id** | **string** |  | [optional] 
**source_amount** | **int** |  | [optional] 
**source_currency** | [**\VeloPayments\Client\Model\PaymentAuditCurrency**](PaymentAuditCurrency.md) |  | [optional] 
**payment_amount** | **int** |  | 
**payment_currency** | [**\VeloPayments\Client\Model\PaymentAuditCurrency**](PaymentAuditCurrency.md) |  | [optional] 
**rate** | **double** |  | [optional] 
**inverted_rate** | **double** |  | [optional] 
**submitted_date_time** | [**\DateTime**](\DateTime.md) |  | 
**status** | **string** |  | 
**funding_status** | **string** |  | 
**routing_number** | **string** |  | [optional] 
**account_number** | **string** |  | [optional] 
**iban** | **string** |  | [optional] 
**payment_memo** | **string** |  | [optional] 
**filename_reference** | **string** |  | [optional] 
**individual_identification_number** | **string** |  | [optional] 
**trace_number** | **string** |  | [optional] 
**payor_payment_id** | **string** |  | [optional] 
**payment_channel_id** | **string** |  | [optional] 
**payment_channel_name** | **string** |  | [optional] 
**account_name** | **string** |  | [optional] 
**rails_id** | **string** |  | 
**country_code** | **string** |  | [optional] 
**events** | [**\VeloPayments\Client\Model\PaymentEventResponse[]**](PaymentEventResponse.md) |  | 
**return_cost** | **int** |  | [optional] 
**return_reason** | **string** |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


