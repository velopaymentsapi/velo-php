# VeloPayments\Client\PayorInformationApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getSourceAccount**](PayorInformationApi.md#getSourceAccount) | **GET** /v1/sourceAccounts/{sourceAccountId} | Get details about given source account.
[**getSourceAccounts**](PayorInformationApi.md#getSourceAccounts) | **GET** /v1/sourceAccounts | Get list of source accounts


# **getSourceAccount**
> \VeloPayments\Client\Model\SourceAccountResponse getSourceAccount($source_account_id)

Get details about given source account.

Get details about given source account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayorInformationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$source_account_id = 'source_account_id_example'; // string | Source account id

try {
    $result = $apiInstance->getSourceAccount($source_account_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayorInformationApi->getSourceAccount: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_account_id** | [**string**](../Model/.md)| Source account id |

### Return type

[**\VeloPayments\Client\Model\SourceAccountResponse**](../Model/SourceAccountResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSourceAccounts**
> \VeloPayments\Client\Model\ListSourceAccountResponse getSourceAccounts($physical_account_name, $payor_id, $page_number, $page_size, $sort)

Get list of source accounts

List source accounts.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayorInformationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$physical_account_name = 'physical_account_name_example'; // string | Physical Account Name
$payor_id = 'payor_id_example'; // string | The account owner Payor ID
$page_number = 1; // int | Page number. Default is 1.
$page_size = 25; // int | Page size. Default is 25. Max allowable is 100.
$sort = 'sort_example'; // string | Sort String

try {
    $result = $apiInstance->getSourceAccounts($physical_account_name, $payor_id, $page_number, $page_size, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayorInformationApi->getSourceAccounts: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **physical_account_name** | **string**| Physical Account Name | [optional]
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID | [optional]
 **page_number** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| Page size. Default is 25. Max allowable is 100. | [optional] [default to 25]
 **sort** | **string**| Sort String | [optional]

### Return type

[**\VeloPayments\Client\Model\ListSourceAccountResponse**](../Model/ListSourceAccountResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

