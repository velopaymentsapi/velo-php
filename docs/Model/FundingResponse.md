# # FundingResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**funding_id** | **string** |  |
**payor_id** | **string** |  |
**allocation_date** | **\DateTime** |  |
**detected_funding_ref** | **string** |  | [optional]
**amount** | **int** |  |
**currency** | **string** | Valid ISO 4217 3 letter currency code. See the &lt;a href&#x3D;\&quot;https://www.iso.org/iso-4217-currency-codes.html\&quot; target&#x3D;\&quot;_blank\&quot; a&gt;ISO specification&lt;/a&gt; for details. |
**text** | **string** |  | [optional]
**physical_account_name** | **string** |  | [optional]
**source_account_id** | **string** |  | [optional]
**allocation_type** | **string** | Funding Allocation Type. One of the following values: AUTOMATIC, MANUAL | [optional]
**reason** | **string** |  | [optional]
**hidden_date** | **\DateTime** |  | [optional]
**funding_account_type** | **string** | Funding Account Type. One of the following values: FBO, WUBS_DECOUPLED, PRIVATE |
**status** | **string** | Current status of the funding. One of the follwing values: PENDING, UNALLOCATED, ALLOCATED, HIDDEN, RETURNED, RETURNING, BULK_RETURN, OTHER |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)