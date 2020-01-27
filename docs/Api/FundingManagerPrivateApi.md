# VeloPayments\Client\FundingManagerPrivateApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createFundingAccount**](FundingManagerPrivateApi.md#createFundingAccount) | **POST** /v1/fundingAccounts | Create Funding Account



## createFundingAccount

> createFundingAccount($create_funding_account_request)

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
$create_funding_account_request = new \VeloPayments\Client\Model\CreateFundingAccountRequest(); // \VeloPayments\Client\Model\CreateFundingAccountRequest | 

try {
    $apiInstance->createFundingAccount($create_funding_account_request);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerPrivateApi->createFundingAccount: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **create_funding_account_request** | [**\VeloPayments\Client\Model\CreateFundingAccountRequest**](../Model/CreateFundingAccountRequest.md)|  | [optional]

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

