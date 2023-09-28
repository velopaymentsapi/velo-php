# # RejectedPaymentV3

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**remote_id** | **string** | The remoteId supplied by the payor that identifies the payee |
**currency_type** | **string** | Valid ISO 4217 3 letter currency code. See the &lt;a href&#x3D;\&quot;https://www.iso.org/iso-4217-currency-codes.html\&quot; target&#x3D;\&quot;_blank\&quot; a&gt;ISO specification&lt;/a&gt; for details. |
**amount** | **int** | The amount of the payment in minor units |
**source_account_name** | **string** | The identifier of the source account to debit the payment from |
**payor_payment_id** | **string** | A reference identifier for the payor for the given payee payment |
**remote_system_id** | **string** | &lt;p&gt;The identifier for the remote payments system if not Velo&lt;/p&gt; | [optional]
**payment_metadata** | **string** | &lt;p&gt;Metadata about the payment that may be relevant to the specific rails or remote system making the payout&lt;/p&gt; &lt;p&gt;The structure of the data will be dictated by the requirements of the payment rails&lt;/p&gt; | [optional]
**reason** | **string** | The reason for the payment being rejected |
**reason_code** | **string** | The reason code as determined by Velo | [optional]
**line_number** | **int** | If the payment was submitted in a csv payout then this will be the line number of the payment in the file | [optional]
**message** | **string** | A more general rejection message than the reason property | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
