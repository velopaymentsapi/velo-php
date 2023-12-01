# # PayorFundingDetectedAllOf

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
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
