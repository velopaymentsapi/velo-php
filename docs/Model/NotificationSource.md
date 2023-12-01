# # NotificationSource

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**source_type** | **string** | OA3 Schema type name for the source info which is used as the discriminator value to ensure that data binding works correctly |
**event_id** | **string** | UUID id of the source event in the Velo platform |
**created_at** | **\DateTime** | ISO8601 timestamp indicating when the source event was created |
**payment_id** | **string** | ID of this payment within the Velo platform |
**payout_payor_ids** | [**\VeloPayments\Client\Model\PayoutPayorIds**](PayoutPayorIds.md) |  | [optional]
**payor_payment_id** | **string** | ID of this payment in the payors system | [optional]
**status** | **string** | The new status of the debit. One of \&quot;PENDING\&quot; \&quot;PROCESSING\&quot; \&quot;REJECTED\&quot; \&quot;RELEASED\&quot; |
**reason_code** | **string** | The Velo code that indicates why the payment was rejected or returned |
**reason_message** | **string** | The description of why the payment was rejected or returned |
**payee_id** | **string** | ID of this payee within the Velo platform |
**reasons** | [**\VeloPayments\Client\Model\PayeeEventAllOfReasons[]**](PayeeEventAllOfReasons.md) | The reasons for the event notification. | [optional]
**debit_transaction_id** | **string** | ID of this debit transaction within the Velo platform |
**rails_id** | **string** | the identifier of the payment rail from which funding was received | [optional]
**payor_id** | **string** | ID of the payor within the Velo platform |
**funding_request_id** | **string** | ID of this funding transaction within the Velo platform |
**funding_ref** | **string** | the external identity reference for this funding transaction | [optional]
**currency** | **string** | the ISO-4217 code for the currency in which the funding was made | [optional]
**amount** | **int** | the received funding amount in currency minor units | [optional]
**physical_account_name** | **string** | the name of the account as registered with the payment rail | [optional]
**source_account_name** | **string** | the name of the account as registered with the Velo platform | [optional]
**source_account_id** | **string** | the ID of the account as registered with the Velo platform | [optional]
**additional_information** | **string** | any additional information received from the payment rail | [optional]
**transaction_id** | **string** | The Id of the related transaction | [optional]
**transaction_reference** | **string** | The payors own reference for the related transaction | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
