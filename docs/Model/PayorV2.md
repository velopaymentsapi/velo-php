# # PayorV2

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payor_id** | **string** | The Payor Id |
**payor_name** | **string** | The name of the payor |
**payor_xid** | **string** | A unique identifier that an external system uses to reference the payor in their system | [optional]
**provider** | **string** | The source of the payorXid, default is null which means Velo | [optional]
**address** | [**\VeloPayments\Client\Model\PayorAddressV2**](PayorAddressV2.md) |  | [optional]
**primary_contact_name** | **string** | Name of primary contact for the payor. | [optional]
**primary_contact_phone** | **string** | Primary contact phone number for the payor. | [optional]
**primary_contact_email** | **string** | Primary contact email for the payor. | [optional]
**kyc_state** | **string** | The kyc state of the payor. One of the following values: FAILED_KYC, PASSED_KYC, REQUIRES_KYC | [optional]
**manual_lockout** | **bool** | Whether or not the payor has been manually locked by the backoffice. | [optional]
**open_banking_enabled** | **bool** | Is Open Banking supported for this payor | [optional]
**payee_grace_period_processing_enabled** | **bool** | Whether grace period processing is enabled. | [optional]
**payee_grace_period_days** | **int** | The grace period for paying payees in days before the payee must be onboarded. | [optional]
**collective_alias** | **string** | How the payor has chosen to refer to payees. | [optional]
**support_contact** | **string** | The payor’s support contact email address. | [optional]
**dba_name** | **string** | The payor’s &#39;Doing Business As&#39; name. | [optional]
**allows_language_choice** | **bool** | Whether or not the payor allows language choice in the UI. | [optional]
**reminder_emails_opt_out** | **bool** | Whether or not the payor has opted-out of reminder emails being sent. | [optional]
**language** | **string** | The payor’s language preference. Must be one of [EN, FR] | [optional]
**includes_reports** | **bool** | For internal use only (will be removed in a later version) | [optional]
**wu_customer_id** | **string** | For internal use only (will be removed in a later version) | [optional]
**max_master_payor_admins** | **int** | The maximum number of payor users with the master admin role | [optional]
**payment_rails** | **string** | For internal use only (will be removed in a later version) | [optional]
**remote_system_ids** | **string[]** | For internal use only (will be removed in a later version) | [optional]
**usd_txn_value_reporting_threshold** | **int** | USD in minor units. For internal use only (will be removed in a later version) | [optional]
**managing_payees** | **bool** | Does this payor manage their own payees (payees are not invited but managed by the payor) | [optional]
**created_at** | **\DateTime** | The date of creation of the payor | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
