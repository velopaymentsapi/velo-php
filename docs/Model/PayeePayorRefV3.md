# # PayeePayorRefV3

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payor_id** | **string** |  | [optional]
**remote_id** | **string** |  | [optional]
**invitation_status** | [**\VeloPayments\Client\Model\InvitationStatus2**](InvitationStatus2.md) |  | [optional]
**invitation_status_timestamp** | [**\DateTime**](\DateTime.md) | The timestamp when the invitation status is updated | [optional]
**payment_channel_id** | **string** |  | [optional]
**payable_status** | **bool** | Indicates if the payee is payable for this payor | [optional]
**payable_issues** | [**\VeloPayments\Client\Model\PayableIssue[]**](PayableIssue.md) | Indicates any conditions which prevent the payee from being payable for this payor | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
