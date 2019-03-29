# OpenAPI\Client\PayorFundingApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**setPayorFundingBankDetails**](PayorFundingApi.md#setPayorFundingBankDetails) | **POST** /v1/payors/{payorId}/payorFundingBankDetailsUpdate | Set Funding Bank Details


# **setPayorFundingBankDetails**
> setPayorFundingBankDetails($payor_id, $payor_funding_bank_details_update)

Set Funding Bank Details

This API allows you to set or update the funding deteils for the given Payor ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\PayorFundingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The account owner Payor ID
$payor_funding_bank_details_update = new \OpenAPI\Client\Model\PayorFundingBankDetailsUpdate(); // \OpenAPI\Client\Model\PayorFundingBankDetailsUpdate | Update Funding bank details of given Payor Id

try {
    $apiInstance->setPayorFundingBankDetails($payor_id, $payor_funding_bank_details_update);
} catch (Exception $e) {
    echo 'Exception when calling PayorFundingApi->setPayorFundingBankDetails: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID |
 **payor_funding_bank_details_update** | [**\OpenAPI\Client\Model\PayorFundingBankDetailsUpdate**](../Model/PayorFundingBankDetailsUpdate.md)| Update Funding bank details of given Payor Id |

### Return type

void (empty response body)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

