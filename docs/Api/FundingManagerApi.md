# OpenAPI\Client\FundingManagerApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createAchFundingRequest**](FundingManagerApi.md#createAchFundingRequest) | **POST** /v1/sourceAccounts/{sourceAccountId}/fundingRequest | Create Funding Request
[**getSourceAccount**](FundingManagerApi.md#getSourceAccount) | **GET** /v1/sourceAccounts/{sourceAccountId} | Get details about given source account.
[**listSourceAccounts**](FundingManagerApi.md#listSourceAccounts) | **GET** /v1/sourceAccounts | Get list of source accounts


# **createAchFundingRequest**
> createAchFundingRequest($source_account_id, $funding_request)

Create Funding Request

Instruct a funding request to transfer funds from the payor’s funding bank to the payor’s balance held within Velo  (202 - accepted, 400 - invalid request body, 404 - source account not found).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\FundingManagerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$source_account_id = 'source_account_id_example'; // string | Source account id
$funding_request = new \OpenAPI\Client\Model\FundingRequest(); // \OpenAPI\Client\Model\FundingRequest | Body to included ammount to be funded

try {
    $apiInstance->createAchFundingRequest($source_account_id, $funding_request);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerApi->createAchFundingRequest: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_account_id** | [**string**](../Model/.md)| Source account id |
 **funding_request** | [**\OpenAPI\Client\Model\FundingRequest**](../Model/FundingRequest.md)| Body to included ammount to be funded |

### Return type

void (empty response body)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSourceAccount**
> \OpenAPI\Client\Model\SourceAccountResponse getSourceAccount($source_account_id)

Get details about given source account.

Get details about given source account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\FundingManagerApi(
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
    echo 'Exception when calling FundingManagerApi->getSourceAccount: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_account_id** | [**string**](../Model/.md)| Source account id |

### Return type

[**\OpenAPI\Client\Model\SourceAccountResponse**](../Model/SourceAccountResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listSourceAccounts**
> \OpenAPI\Client\Model\ListSourceAccountResponse listSourceAccounts($payor_id, $physical_account_name, $page_number, $page_size, $sort)

Get list of source accounts

List source accounts.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\FundingManagerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The account owner Payor ID
$physical_account_name = 'physical_account_name_example'; // string | Physical Account Name
$page_number = 1; // int | Page number. Default is 1.
$page_size = 25; // int | Page size. Default is 25. Max allowable is 100.
$sort = 'sort_example'; // string | Sort String

try {
    $result = $apiInstance->listSourceAccounts($payor_id, $physical_account_name, $page_number, $page_size, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerApi->listSourceAccounts: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID |
 **physical_account_name** | **string**| Physical Account Name | [optional]
 **page_number** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| Page size. Default is 25. Max allowable is 100. | [optional] [default to 25]
 **sort** | **string**| Sort String | [optional]

### Return type

[**\OpenAPI\Client\Model\ListSourceAccountResponse**](../Model/ListSourceAccountResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

