# # QuoteFxSummaryV3

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**rate** | **float** | The conversion rate (from the source currency to the payment currency) |
**inverted_rate** | **float** | The inverse conversion rate (from paymnent currency to source currency) | [optional]
**creation_time** | **\DateTime** | Timestamp of when the quote was created |
**expiry_time** | **\DateTime** | The timestamp for when the quote will expire | [optional]
**quote_id** | **string** | The id of the created quote |
**total_source_amount** | **int** | The amount (in minor units) that will be paid from the source account |
**total_payment_amount** | **int** | The amount (in minor units) that the payee will receive |
**source_currency** | **string** | Valid ISO 4217 3 letter currency code. See the &lt;a href&#x3D;\&quot;https://www.iso.org/iso-4217-currency-codes.html\&quot; target&#x3D;\&quot;_blank\&quot; a&gt;ISO specification&lt;/a&gt; for details. |
**payment_currency** | **string** | Valid ISO 4217 3 letter currency code. See the &lt;a href&#x3D;\&quot;https://www.iso.org/iso-4217-currency-codes.html\&quot; target&#x3D;\&quot;_blank\&quot; a&gt;ISO specification&lt;/a&gt; for details. |
**funding_status** | **string** | Current status of the funding associated with this quote. One of the following values: UNFUNDED, INSTRUCTED, FUNDED |
**status** | **string** | Current status of the fx quote. One of the following values: UNQUOTED, QUOTED, EXPIRED, EXECUTED, REJECTED |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
