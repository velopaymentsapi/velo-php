# # SourceAccountResponseV3

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Source Account Id | 
**balance** | **int** | Decimal implied | [optional] 
**currency** | **string** |  | [optional] 
**funding_ref** | **string** | The funding reference (will not be set for DECOUPLED accounts). | [optional] 
**physical_account_name** | **string** | The physical account name (will not be set for DECOUPLED accounts). | [optional] 
**rails_id** | **string** |  | 
**payor_id** | **string** |  | [optional] 
**name** | **string** |  | [optional] 
**pooled** | **bool** | The pooled account flag (will not be set for DECOUPLED accounts). | [optional] 
**customer_id** | **string** |  | [optional] 
**physical_account_id** | **string** | The physical account id (will not be set for DECOUPLED accounts). | [optional] 
**notifications** | [**\VeloPayments\Client\Model\Notifications2**](Notifications2.md) |  | [optional] 
**auto_top_up_config** | [**\VeloPayments\Client\Model\AutoTopUpConfig2**](AutoTopUpConfig2.md) |  | [optional] 
**type** | **string** |  | 
**country** | **string** | The two character ISO country code for the associated account | [optional] 
**archived** | **bool** | A flag for whether the source account has been archived.  Only present in the response if true. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

