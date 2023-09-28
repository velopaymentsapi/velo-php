# # FundingAudit

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount** | **float** | The amount funded | [optional]
**currency** | **string** | The currency of the funding | [optional]
**date_time** | **\DateTime** |  | [optional]
**status** | **string** | Status of the funding. One of the following values: PENDING, FAILED, CREDIT, DEBIT | [optional]
**source_account_name** | **string** |  | [optional]
**funding_account_name** | **string** |  | [optional]
**funding_type** | **string** | Funding type. One of the following values: ACH, WIRE, EMBEDDED, BANK_TRANSFER | [optional]
**events** | [**\VeloPayments\Client\Model\FundingEvent[]**](FundingEvent.md) |  | [optional]
**topup_type** | **string** | Type of top up. One of the following values: AUTOMATIC, MANUAL | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
