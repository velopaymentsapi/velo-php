# # PaymentV3

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payment_id** | **string** |  |
**remote_id** | **string** |  | [optional]
**currency** | **string** |  | [optional]
**amount** | **int** |  | [optional]
**source_account_name** | **string** |  | [optional]
**payor_payment_id** | **string** |  | [optional]
**payment_memo** | **string** |  | [optional]
**payee** | [**\VeloPayments\Client\Model\PayoutPayeeV3**](PayoutPayeeV3.md) |  | [optional]
**withdrawable** | **bool** |  | [optional]
**status** | **string** |  | [optional]
**transmission_type** | [**\VeloPayments\Client\Model\TransmissionType**](TransmissionType.md) |  | [optional]
**remote_system_id** | **string** |  | [optional]
**payment_metadata** | **string** |  | [optional]
**auto_withdrawn_reason_code** | **string** | Populated only if the payment was automatically withdrawn during instruction for being invalid | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
