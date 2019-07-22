# VeloPayments\Client\FundingManagerApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createAchFundingRequest**](FundingManagerApi.md#createAchFundingRequest) | **POST** /v1/sourceAccounts/{sourceAccountId}/achFundingRequest | Create Funding Request
[**createFundingRequest**](FundingManagerApi.md#createFundingRequest) | **POST** /v2/sourceAccounts/{sourceAccountId}/fundingRequest | Create Funding Request
[**getFundings**](FundingManagerApi.md#getFundings) | **GET** /v1/paymentaudit/fundings | Get Fundings for Payor
[**getSourceAccount**](FundingManagerApi.md#getSourceAccount) | **GET** /v1/sourceAccounts/{sourceAccountId} | Get details about given source account.
[**getSourceAccountV2**](FundingManagerApi.md#getSourceAccountV2) | **GET** /v2/sourceAccounts/{sourceAccountId} | Get details about given source account.
[**getSourceAccounts**](FundingManagerApi.md#getSourceAccounts) | **GET** /v1/sourceAccounts | Get list of source accounts
[**getSourceAccountsV2**](FundingManagerApi.md#getSourceAccountsV2) | **GET** /v2/sourceAccounts | Get list of source accounts
[**setNotificationsRequest**](FundingManagerApi.md#setNotificationsRequest) | **POST** /v1/sourceAccounts/{sourceAccountId}/notifications | Set notifications
[**setPayorFundingBankDetails**](FundingManagerApi.md#setPayorFundingBankDetails) | **POST** /v1/payors/{payorId}/payorFundingBankDetailsUpdate | Set Funding Bank Details



## createAchFundingRequest

> createAchFundingRequest($source_account_id, $funding_request_v1)

Create Funding Request

Instruct a funding request to transfer funds from the payor’s funding bank to the payor’s balance held within Velo  (202 - accepted, 400 - invalid request body, 404 - source account not found).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\FundingManagerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$source_account_id = 'source_account_id_example'; // string | Source account id
$funding_request_v1 = new \VeloPayments\Client\Model\FundingRequestV1(); // \VeloPayments\Client\Model\FundingRequestV1 | Body to included ammount to be funded

try {
    $apiInstance->createAchFundingRequest($source_account_id, $funding_request_v1);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerApi->createAchFundingRequest: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_account_id** | [**string**](../Model/.md)| Source account id |
 **funding_request_v1** | [**\VeloPayments\Client\Model\FundingRequestV1**](../Model/FundingRequestV1.md)| Body to included ammount to be funded |

### Return type

void (empty response body)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## createFundingRequest

> createFundingRequest($source_account_id, $funding_request_v2)

Create Funding Request

Instruct a funding request to transfer funds from the payor’s funding bank to the payor’s balance held within Velo  (202 - accepted, 400 - invalid request body, 404 - source account not found).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\FundingManagerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$source_account_id = 'source_account_id_example'; // string | Source account id
$funding_request_v2 = new \VeloPayments\Client\Model\FundingRequestV2(); // \VeloPayments\Client\Model\FundingRequestV2 | Body to included ammount to be funded

try {
    $apiInstance->createFundingRequest($source_account_id, $funding_request_v2);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerApi->createFundingRequest: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_account_id** | [**string**](../Model/.md)| Source account id |
 **funding_request_v2** | [**\VeloPayments\Client\Model\FundingRequestV2**](../Model/FundingRequestV2.md)| Body to included ammount to be funded |

### Return type

void (empty response body)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getFundings

> \VeloPayments\Client\Model\GetFundingsResponse getFundings($payor_id, $page, $page_size, $sort)

Get Fundings for Payor

Get a list of Fundings for a payor.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\FundingManagerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The account owner Payor ID
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | Page size. Default is 25. Max allowable is 100.
$sort = 'sort_example'; // string | List of sort fields. Example: ```?sort=destinationCurrency:asc,destinationAmount:asc``` Default is no sort. The supported sort fields are: dateTime and amount.

try {
    $result = $apiInstance->getFundings($payor_id, $page, $page_size, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerApi->getFundings: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID | [optional]
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| Page size. Default is 25. Max allowable is 100. | [optional] [default to 25]
 **sort** | **string**| List of sort fields. Example: &#x60;&#x60;&#x60;?sort&#x3D;destinationCurrency:asc,destinationAmount:asc&#x60;&#x60;&#x60; Default is no sort. The supported sort fields are: dateTime and amount. | [optional]

### Return type

[**\VeloPayments\Client\Model\GetFundingsResponse**](../Model/GetFundingsResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getSourceAccount

> \VeloPayments\Client\Model\SourceAccountResponse getSourceAccount($source_account_id)

Get details about given source account.

Get details about given source account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\FundingManagerApi(
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

[**\VeloPayments\Client\Model\SourceAccountResponse**](../Model/SourceAccountResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getSourceAccountV2

> \VeloPayments\Client\Model\SourceAccountResponseV2 getSourceAccountV2($source_account_id)

Get details about given source account.

Get details about given source account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\FundingManagerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$source_account_id = 'source_account_id_example'; // string | Source account id

try {
    $result = $apiInstance->getSourceAccountV2($source_account_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerApi->getSourceAccountV2: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_account_id** | [**string**](../Model/.md)| Source account id |

### Return type

[**\VeloPayments\Client\Model\SourceAccountResponseV2**](../Model/SourceAccountResponseV2.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getSourceAccounts

> \VeloPayments\Client\Model\ListSourceAccountResponse getSourceAccounts($physical_account_name, $payor_id, $page, $page_size, $sort)

Get list of source accounts

List source accounts.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\FundingManagerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$physical_account_name = 'physical_account_name_example'; // string | Physical Account Name
$payor_id = 'payor_id_example'; // string | The account owner Payor ID
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | Page size. Default is 25. Max allowable is 100.
$sort = 'sort_example'; // string | Sort String

try {
    $result = $apiInstance->getSourceAccounts($physical_account_name, $payor_id, $page, $page_size, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerApi->getSourceAccounts: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **physical_account_name** | **string**| Physical Account Name | [optional]
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID | [optional]
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| Page size. Default is 25. Max allowable is 100. | [optional] [default to 25]
 **sort** | **string**| Sort String | [optional]

### Return type

[**\VeloPayments\Client\Model\ListSourceAccountResponse**](../Model/ListSourceAccountResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getSourceAccountsV2

> \VeloPayments\Client\Model\ListSourceAccountResponseV2 getSourceAccountsV2($physical_account_name, $payor_id, $page, $page_size, $sort)

Get list of source accounts

List source accounts.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\FundingManagerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$physical_account_name = 'physical_account_name_example'; // string | Physical Account Name
$payor_id = 'payor_id_example'; // string | The account owner Payor ID
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | Page size. Default is 25. Max allowable is 100.
$sort = 'sort_example'; // string | Sort String

try {
    $result = $apiInstance->getSourceAccountsV2($physical_account_name, $payor_id, $page, $page_size, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerApi->getSourceAccountsV2: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **physical_account_name** | **string**| Physical Account Name | [optional]
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID | [optional]
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| Page size. Default is 25. Max allowable is 100. | [optional] [default to 25]
 **sort** | **string**| Sort String | [optional]

### Return type

[**\VeloPayments\Client\Model\ListSourceAccountResponseV2**](../Model/ListSourceAccountResponseV2.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## setNotificationsRequest

> setNotificationsRequest($source_account_id, $set_notifications_request)

Set notifications

Set notifications for a given source account

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\FundingManagerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$source_account_id = 'source_account_id_example'; // string | Source account id
$set_notifications_request = new \VeloPayments\Client\Model\SetNotificationsRequest(); // \VeloPayments\Client\Model\SetNotificationsRequest | Body to included minimum balance to set

try {
    $apiInstance->setNotificationsRequest($source_account_id, $set_notifications_request);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerApi->setNotificationsRequest: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_account_id** | [**string**](../Model/.md)| Source account id |
 **set_notifications_request** | [**\VeloPayments\Client\Model\SetNotificationsRequest**](../Model/SetNotificationsRequest.md)| Body to included minimum balance to set |

### Return type

void (empty response body)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## setPayorFundingBankDetails

> setPayorFundingBankDetails($payor_id, $payor_funding_bank_details_update)

Set Funding Bank Details

This API allows you to set or update the funding details for the given Payor ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\FundingManagerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The account owner Payor ID
$payor_funding_bank_details_update = new \VeloPayments\Client\Model\PayorFundingBankDetailsUpdate(); // \VeloPayments\Client\Model\PayorFundingBankDetailsUpdate | Update Funding bank details of given Payor Id

try {
    $apiInstance->setPayorFundingBankDetails($payor_id, $payor_funding_bank_details_update);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerApi->setPayorFundingBankDetails: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID |
 **payor_funding_bank_details_update** | [**\VeloPayments\Client\Model\PayorFundingBankDetailsUpdate**](../Model/PayorFundingBankDetailsUpdate.md)| Update Funding bank details of given Payor Id |

### Return type

void (empty response body)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)

