# VeloPayments\Client\FundingManagerPrivateApi

All URIs are relative to https://api.sandbox.velopayments.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createFundingAccountV2()**](FundingManagerPrivateApi.md#createFundingAccountV2) | **POST** /v2/fundingAccounts | Create Funding Account
[**deleteSourceAccountV3()**](FundingManagerPrivateApi.md#deleteSourceAccountV3) | **DELETE** /v3/sourceAccounts/{sourceAccountId} | Delete a source account by ID


## `createFundingAccountV2()`

```php
createFundingAccountV2($create_funding_account_request_v2)
```

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
$create_funding_account_request_v2 = {"type":"FBO","name":"My FBO Account","payorId":"ee53e01d-c078-43fd-abd4-47e92f4a06cf","accountName":"My Account Name","accountNumber":1231231234556,"routingNumber":123456789}; // \VeloPayments\Client\Model\CreateFundingAccountRequestV2

try {
    $apiInstance->createFundingAccountV2($create_funding_account_request_v2);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerPrivateApi->createFundingAccountV2: ', $e->getMessage(), PHP_EOL;
}
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

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteSourceAccountV3()`

```php
deleteSourceAccountV3($source_account_id)
```

Delete a source account by ID

Mark a source account as deleted by ID

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
$source_account_id = 'source_account_id_example'; // string | Source account id

try {
    $apiInstance->deleteSourceAccountV3($source_account_id);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerPrivateApi->deleteSourceAccountV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_account_id** | **string**| Source account id |

### Return type

void (empty response body)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
