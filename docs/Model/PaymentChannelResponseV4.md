# # PaymentChannelResponseV4

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  |
**payee_id** | **string** |  | [optional]
**payment_channel_name** | **string** |  |
**account_name** | **string** |  |
**channel_type** | **string** | Payment channel type. One of the following values: CHANNEL_BANK |
**country_code** | **string** | Valid ISO 3166 2 character country code. See the &lt;a href&#x3D;\&quot;https://www.iso.org/iso-3166-country-codes.html\&quot; target&#x3D;\&quot;_blank\&quot; a&gt;ISO specification&lt;/a&gt; for details. |
**routing_number** | **string** |  | [optional]
**account_number** | **string** |  | [optional]
**iban** | **string** | Must match the regular expression &#x60;&#x60;&#x60;^[A-Za-z0-9]+$&#x60;&#x60;&#x60;. | [optional]
**currency** | **string** | Valid ISO 4217 3 letter currency code. See the &lt;a href&#x3D;\&quot;https://www.iso.org/iso-4217-currency-codes.html\&quot; target&#x3D;\&quot;_blank\&quot; a&gt;ISO specification&lt;/a&gt; for details. |
**payor_ids** | **string[]** |  | [optional]
**payee_name** | **string** |  | [optional]
**bank_name** | **string** |  | [optional]
**bank_swift_bic** | **string** |  | [optional]
**bank_address** | [**\VeloPayments\Client\Model\AddressV4**](AddressV4.md) |  | [optional]
**deleted** | **bool** |  | [optional]
**enabled** | **bool** |  | [optional]
**disabled_reason_code** | **string** |  | [optional]
**disabled_reason** | **string** |  | [optional]
**payable** | **bool** | Whether this payment channel is payable | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
