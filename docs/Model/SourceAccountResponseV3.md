# # SourceAccountResponseV3

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Source Account Id |
**balance** | **int** | Decimal implied | [optional]
**currency** | **string** | Valid ISO 4217 3 letter currency code. See the &lt;a href&#x3D;\&quot;https://www.iso.org/iso-4217-currency-codes.html\&quot; target&#x3D;\&quot;_blank\&quot; a&gt;ISO specification&lt;/a&gt; for details. | [optional]
**funding_ref** | **string** | The funding reference (will not be set for DECOUPLED accounts). | [optional]
**physical_account_name** | **string** | The physical account name (will not be set for DECOUPLED accounts). | [optional]
**rails_id** | **string** |  |
**payor_id** | **string** |  | [optional]
**name** | **string** |  | [optional]
**pooled** | **bool** | The pooled account flag (will not be set for DECOUPLED accounts). | [optional]
**customer_id** | **string** |  | [optional]
**physical_account_id** | **string** | The physical account id (will not be set for DECOUPLED accounts). | [optional]
**notifications** | [**\VeloPayments\Client\Model\NotificationsV3**](NotificationsV3.md) |  | [optional]
**auto_top_up_config** | [**\VeloPayments\Client\Model\AutoTopUpConfigV3**](AutoTopUpConfigV3.md) |  | [optional]
**type** | **string** |  |
**country** | **string** | Valid ISO 3166 2 character country code. See the &lt;a href&#x3D;\&quot;https://www.iso.org/iso-3166-country-codes.html\&quot; target&#x3D;\&quot;_blank\&quot; a&gt;ISO specification&lt;/a&gt; for details. | [optional]
**deleted** | **bool** | An optional flag for whether the source account has been deleted. Only present in the response if true. | [optional]
**user_deleted** | **bool** | An optional flag for whether the source account has been deleted by a user. Only present in the response if true. | [optional]
**deleted_at** | **\DateTime** | An optional timestamp when the source account has been deleted. Only present in the response if deleted. | [optional]
**transmission_types** | **string[]** | List of supported transmission types. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
