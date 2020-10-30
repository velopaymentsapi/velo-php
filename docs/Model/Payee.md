# # Payee

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payee_id** | **string** |  | [optional] [readonly]
**payor_refs** | [**\VeloPayments\Client\Model\PayeePayorRef[]**](PayeePayorRef.md) |  | [optional] [readonly]
**email** | **string** |  | [optional]
**address** | [**\VeloPayments\Client\Model\PayeeAddress**](PayeeAddress.md) |  | [optional]
**country** | **string** |  | [optional]
**display_name** | **string** |  | [optional]
**payment_channel** | [**\VeloPayments\Client\Model\PayeePaymentChannel**](PayeePaymentChannel.md) |  | [optional]
**challenge** | [**\VeloPayments\Client\Model\Challenge**](Challenge.md) |  | [optional]
**language** | [**\VeloPayments\Client\Model\Language**](Language.md) |  | [optional]
**accept_terms_and_conditions_timestamp** | [**\DateTime**](\DateTime.md) | The timestamp when the payee last accepted T&amp;Cs | [optional] [readonly]
**cellphone_number** | **string** |  | [optional]
**payee_type** | [**\VeloPayments\Client\Model\PayeeType**](PayeeType.md) |  | [optional]
**company** | [**\VeloPayments\Client\Model\CompanyV1**](CompanyV1.md) |  | [optional]
**individual** | [**\VeloPayments\Client\Model\IndividualV1**](IndividualV1.md) |  | [optional]
**created** | [**\DateTime**](\DateTime.md) |  | [optional]
**grace_period_end_date** | [**\DateTime**](\DateTime.md) |  | [optional] [readonly]
**last_ofac_check_timestamp** | **string** |  | [optional] [readonly]
**marketing_opt_ins** | [**\VeloPayments\Client\Model\MarketingOptIn[]**](MarketingOptIn.md) |  | [optional]
**ofac_status** | [**\VeloPayments\Client\Model\OfacStatus**](OfacStatus.md) |  | [optional]
**onboarded_status** | [**\VeloPayments\Client\Model\OnboardedStatus**](OnboardedStatus.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
