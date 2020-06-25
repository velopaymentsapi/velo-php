# # AutoTopUpConfig2

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**enabled** | **bool** | Is auto top-up enabled? automatically trigger funding to top-up the source account balance when the balance falls below the configured minimum level. | 
**min_balance** | **int** | When the payor balance falls below this level then auto top-up will be triggered. Note - This is in minor units. | [optional] 
**target_balance** | **int** | When the payor balance falls below the min balance then auto top-up will request funds bring the balance to this level. Note - this is in minor units. | [optional] 
**funding_account_id** | **string** | Id of funding account from which to pull funds when auto top-up is triggered.  Note - if this is not set then auto top-up is effectively disabled. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


