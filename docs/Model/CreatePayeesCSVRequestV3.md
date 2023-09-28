# # CreatePayeesCSVRequestV3

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | [**\VeloPayments\Client\Model\PayeeTypeEnum**](PayeeTypeEnum.md) |  |
**remote_id** | **string** |  |
**email** | **string** |  |
**address_line1** | **string** |  |
**address_line2** | **string** |  | [optional]
**address_line3** | **string** |  | [optional]
**address_line4** | **string** |  | [optional]
**address_city** | **string** |  |
**address_county_or_province** | **string** |  | [optional]
**address_zip_or_postcode** | **string** |  |
**address_country** | **string** | Valid ISO 3166 2 character country code. See the &lt;a href&#x3D;\&quot;https://www.iso.org/iso-3166-country-codes.html\&quot; target&#x3D;\&quot;_blank\&quot; a&gt;ISO specification&lt;/a&gt; for details. |
**individual_national_identification** | **string** |  | [optional]
**individual_date_of_birth** | **\DateTime** | Must not be date in future. Example - 1970-05-20 | [optional]
**individual_title** | **string** |  | [optional]
**individual_first_name** | **string** |  | [optional]
**individual_other_names** | **string** |  | [optional]
**individual_last_name** | **string** |  | [optional]
**company_name** | **string** |  | [optional]
**company_ein** | **string** |  | [optional]
**company_operating_name** | **string** |  | [optional]
**payment_channel_account_number** | **string** | Either routing number and account number or only iban must be set | [optional]
**payment_channel_routing_number** | **string** | Either routing number and account number or only iban must be set | [optional]
**payment_channel_account_name** | **string** |  | [optional]
**payment_channel_iban** | **string** | Must match the regular expression &#x60;&#x60;&#x60;^[A-Za-z0-9]+$&#x60;&#x60;&#x60;. | [optional]
**payment_channel_country_code** | **string** | Valid ISO 3166 2 character country code. See the &lt;a href&#x3D;\&quot;https://www.iso.org/iso-3166-country-codes.html\&quot; target&#x3D;\&quot;_blank\&quot; a&gt;ISO specification&lt;/a&gt; for details. | [optional]
**payment_channel_currency** | **string** |  | [optional]
**challenge_description** | **string** |  | [optional]
**challenge_value** | **string** |  | [optional]
**payee_language** | **string** | An IETF BCP 47 language code which has been configured for use within this Velo environment.&lt;BR&gt; See the /v1/supportedLanguages endpoint to list the available codes for an environment. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
