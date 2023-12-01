# # PayorFundingDetected

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**source_type** | **string** | OA3 Schema type name for the source info which is used as the discriminator value to ensure that data binding works correctly |
**event_id** | **string** | UUID id of the source event in the Velo platform |
**created_at** | **\DateTime** | ISO8601 timestamp indicating when the source event was created |
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
