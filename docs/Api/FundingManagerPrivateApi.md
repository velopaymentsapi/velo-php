# VeloPayments\Client\FundingManagerPrivateApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createFundingAccountV2**](FundingManagerPrivateApi.md#createFundingAccountV2) | **POST** /v2/fundingAccounts | Create Funding Account



## createFundingAccountV2

> createFundingAccountV2($create_funding_account_request_v2)

Create Funding Account

Create Funding Account

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\FundingManagerPrivateApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_funding_account_request_v2 = {"type":"FBO","name":"My FBO Account","payorId":"ee53e01d-c078-43fd-abd4-47e92f4a06cf","accountName":"My Account Name","accountNumber":1231231234556,"routingNumber":123456789}; // \VeloPayments\Client\Model\CreateFundingAccountRequestV2 | 

try {
    $apiInstance->createFundingAccountV2($create_funding_account_request_v2);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerPrivateApi->createFundingAccountV2: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **create_funding_account_request_v2** | [**\VeloPayments\Client\Model\CreateFundingAccountRequestV2**](../Model/CreateFundingAccountRequestV2.md)|  | [optional]

### Return type

void (empty response body)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)

