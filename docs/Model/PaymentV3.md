# # PaymentV3

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payment_id** | **string** | The id of the payment |
**remote_id** | **string** | The remoteId supplied by the payor that identifies the payee | [optional]
**currency** | **string** | The currency that the payment was made in | [optional]
**amount** | **int** | The amount of the payment in minor units | [optional]
**source_account_name** | **string** | The identifier of the source account to debit the payment from | [optional]
**payor_payment_id** | **string** | A reference identifier for the payor for the given payee payment | [optional]
**payment_memo** | **string** | &lt;p&gt;Any value here will override the memo value in the parent payout&lt;/p&gt; &lt;p&gt;This should be the reference field on the statement seen by the payee (but not via ACH)&lt;/p&gt; | [optional]
**payee** | [**\VeloPayments\Client\Model\PayoutPayeeV3**](PayoutPayeeV3.md) |  | [optional]
**withdrawable** | **bool** | Can this paynent be withdrawn | [optional]
**status** | **string** | Current status of payment. One of the following values: SUBMITTED, ACCEPTED, REJECTED, WITHDRAWN, RETURNED, AWAITING_FUNDS, FUNDED, UNFUNDED, CANCELLED, BANK_PAYMENT_REQUESTED | [optional]
**transmission_type** | **string** | &lt;p&gt;The transmission method of the payment.&lt;/p&gt; &lt;p&gt;Valid values for transmissionType can be found attached to the Source Account&lt;/p&gt; | [optional]
**remote_system_id** | **string** | &lt;p&gt;The identifier for the remote payments system if not Velo&lt;/p&gt; | [optional]
**payment_metadata** | **string** | &lt;p&gt;Metadata about the payment that may be relevant to the specific rails or remote system making the payout&lt;/p&gt; &lt;p&gt;The structure of the data will be dictated by the requirements of the payment rails&lt;/p&gt; | [optional]
**auto_withdrawn_reason_code** | **string** | Populated only if the payment was automatically withdrawn during instruction for being invalid | [optional]
**rails_id** | **string** | Indicates the 3rd party system involved in making this payment | [optional]
**transaction_id** | **string** | The id of the transaction associated with this payment if there was one | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
