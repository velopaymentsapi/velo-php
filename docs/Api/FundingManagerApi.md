# VeloPayments\Client\FundingManagerApi

All URIs are relative to https://api.sandbox.velopayments.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createAchFundingRequest()**](FundingManagerApi.md#createAchFundingRequest) | **POST** /v1/sourceAccounts/{sourceAccountId}/achFundingRequest | Create Funding Request
[**createFundingRequest()**](FundingManagerApi.md#createFundingRequest) | **POST** /v2/sourceAccounts/{sourceAccountId}/fundingRequest | Create Funding Request
[**createFundingRequestV3()**](FundingManagerApi.md#createFundingRequestV3) | **POST** /v3/sourceAccounts/{sourceAccountId}/fundingRequest | Create Funding Request
[**getFundingAccount()**](FundingManagerApi.md#getFundingAccount) | **GET** /v1/fundingAccounts/{fundingAccountId} | Get Funding Account
[**getFundingAccountV2()**](FundingManagerApi.md#getFundingAccountV2) | **GET** /v2/fundingAccounts/{fundingAccountId} | Get Funding Account
[**getFundingAccounts()**](FundingManagerApi.md#getFundingAccounts) | **GET** /v1/fundingAccounts | Get Funding Accounts
[**getFundingAccountsV2()**](FundingManagerApi.md#getFundingAccountsV2) | **GET** /v2/fundingAccounts | Get Funding Accounts
[**getSourceAccount()**](FundingManagerApi.md#getSourceAccount) | **GET** /v1/sourceAccounts/{sourceAccountId} | Get details about given source account.
[**getSourceAccountV2()**](FundingManagerApi.md#getSourceAccountV2) | **GET** /v2/sourceAccounts/{sourceAccountId} | Get details about given source account.
[**getSourceAccountV3()**](FundingManagerApi.md#getSourceAccountV3) | **GET** /v3/sourceAccounts/{sourceAccountId} | Get details about given source account.
[**getSourceAccounts()**](FundingManagerApi.md#getSourceAccounts) | **GET** /v1/sourceAccounts | Get list of source accounts
[**getSourceAccountsV2()**](FundingManagerApi.md#getSourceAccountsV2) | **GET** /v2/sourceAccounts | Get list of source accounts
[**getSourceAccountsV3()**](FundingManagerApi.md#getSourceAccountsV3) | **GET** /v3/sourceAccounts | Get list of source accounts
[**listFundingAuditDeltas()**](FundingManagerApi.md#listFundingAuditDeltas) | **GET** /v1/deltas/fundings | Get Funding Audit Delta
[**setNotificationsRequest()**](FundingManagerApi.md#setNotificationsRequest) | **POST** /v1/sourceAccounts/{sourceAccountId}/notifications | Set notifications
[**transferFunds()**](FundingManagerApi.md#transferFunds) | **POST** /v2/sourceAccounts/{sourceAccountId}/transfers | Transfer Funds between source accounts
[**transferFundsV3()**](FundingManagerApi.md#transferFundsV3) | **POST** /v3/sourceAccounts/{sourceAccountId}/transfers | Transfer Funds between source accounts


## `createAchFundingRequest()`

```php
createAchFundingRequest($source_account_id, $funding_request_v1)
```

Create Funding Request

Instruct a funding request to transfer funds from the payor’s funding bank to the payor’s balance held within Velo.

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
$funding_request_v1 = new \VeloPayments\Client\Model\FundingRequestV1(); // \VeloPayments\Client\Model\FundingRequestV1 | Body to included amount to be funded

try {
    $apiInstance->createAchFundingRequest($source_account_id, $funding_request_v1);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerApi->createAchFundingRequest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_account_id** | [**string**](../Model/.md)| Source account id |
 **funding_request_v1** | [**\VeloPayments\Client\Model\FundingRequestV1**](../Model/FundingRequestV1.md)| Body to included amount to be funded |

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

## `createFundingRequest()`

```php
createFundingRequest($source_account_id, $funding_request_v2)
```

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
$funding_request_v2 = new \VeloPayments\Client\Model\FundingRequestV2(); // \VeloPayments\Client\Model\FundingRequestV2 | Body to included amount to be funded

try {
    $apiInstance->createFundingRequest($source_account_id, $funding_request_v2);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerApi->createFundingRequest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_account_id** | [**string**](../Model/.md)| Source account id |
 **funding_request_v2** | [**\VeloPayments\Client\Model\FundingRequestV2**](../Model/FundingRequestV2.md)| Body to included amount to be funded |

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

## `createFundingRequestV3()`

```php
createFundingRequestV3($source_account_id, $funding_request_v3)
```

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
$funding_request_v3 = new \VeloPayments\Client\Model\FundingRequestV3(); // \VeloPayments\Client\Model\FundingRequestV3 | Body to included amount to be funded

try {
    $apiInstance->createFundingRequestV3($source_account_id, $funding_request_v3);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerApi->createFundingRequestV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_account_id** | [**string**](../Model/.md)| Source account id |
 **funding_request_v3** | [**\VeloPayments\Client\Model\FundingRequestV3**](../Model/FundingRequestV3.md)| Body to included amount to be funded |

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

## `getFundingAccount()`

```php
getFundingAccount($funding_account_id, $sensitive): \VeloPayments\Client\Model\FundingAccountResponse
```

Get Funding Account

Get Funding Account by ID

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
$funding_account_id = 'funding_account_id_example'; // string
$sensitive = false; // bool

try {
    $result = $apiInstance->getFundingAccount($funding_account_id, $sensitive);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerApi->getFundingAccount: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **funding_account_id** | [**string**](../Model/.md)|  |
 **sensitive** | **bool**|  | [optional] [default to false]

### Return type

[**\VeloPayments\Client\Model\FundingAccountResponse**](../Model/FundingAccountResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFundingAccountV2()`

```php
getFundingAccountV2($funding_account_id, $sensitive): \VeloPayments\Client\Model\FundingAccountResponse2
```

Get Funding Account

Get Funding Account by ID

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
$funding_account_id = 'funding_account_id_example'; // string
$sensitive = false; // bool

try {
    $result = $apiInstance->getFundingAccountV2($funding_account_id, $sensitive);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerApi->getFundingAccountV2: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **funding_account_id** | [**string**](../Model/.md)|  |
 **sensitive** | **bool**|  | [optional] [default to false]

### Return type

[**\VeloPayments\Client\Model\FundingAccountResponse2**](../Model/FundingAccountResponse2.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFundingAccounts()`

```php
getFundingAccounts($payor_id, $source_account_id, $page, $page_size, $sort, $sensitive): \VeloPayments\Client\Model\ListFundingAccountsResponse
```

Get Funding Accounts

Get the funding accounts.

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
$payor_id = 'payor_id_example'; // string
$source_account_id = 'source_account_id_example'; // string
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | The number of results to return in a page
$sort = 'accountName:asc'; // string | List of sort fields (e.g. ?sort=accountName:asc,name:asc) Default is accountName:asc The supported sort fields are - accountName, name and currency.
$sensitive = false; // bool

try {
    $result = $apiInstance->getFundingAccounts($payor_id, $source_account_id, $page, $page_size, $sort, $sensitive);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerApi->getFundingAccounts: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)|  | [optional]
 **source_account_id** | [**string**](../Model/.md)|  | [optional]
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| The number of results to return in a page | [optional] [default to 25]
 **sort** | **string**| List of sort fields (e.g. ?sort&#x3D;accountName:asc,name:asc) Default is accountName:asc The supported sort fields are - accountName, name and currency. | [optional] [default to &#39;accountName:asc&#39;]
 **sensitive** | **bool**|  | [optional] [default to false]

### Return type

[**\VeloPayments\Client\Model\ListFundingAccountsResponse**](../Model/ListFundingAccountsResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFundingAccountsV2()`

```php
getFundingAccountsV2($payor_id, $name, $country, $currency, $type, $page, $page_size, $sort, $sensitive): \VeloPayments\Client\Model\ListFundingAccountsResponse2
```

Get Funding Accounts

Get the funding accounts.

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
$payor_id = 'payor_id_example'; // string
$name = 'name_example'; // string | The descriptive funding account name
$country = US; // string | The 2 letter ISO 3166-1 country code (upper case)
$currency = USD; // string | The ISO 4217 currency code
$type = new \VeloPayments\Client\Model\\VeloPayments\Client\Model\FundingAccountType(); // \VeloPayments\Client\Model\FundingAccountType | The type of funding account.
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | The number of results to return in a page
$sort = 'accountName:asc'; // string | List of sort fields (e.g. ?sort=accountName:asc,name:asc) Default is accountName:asc The supported sort fields are - accountName, name.
$sensitive = false; // bool

try {
    $result = $apiInstance->getFundingAccountsV2($payor_id, $name, $country, $currency, $type, $page, $page_size, $sort, $sensitive);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerApi->getFundingAccountsV2: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)|  | [optional]
 **name** | **string**| The descriptive funding account name | [optional]
 **country** | **string**| The 2 letter ISO 3166-1 country code (upper case) | [optional]
 **currency** | **string**| The ISO 4217 currency code | [optional]
 **type** | [**\VeloPayments\Client\Model\FundingAccountType**](../Model/.md)| The type of funding account. | [optional]
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| The number of results to return in a page | [optional] [default to 25]
 **sort** | **string**| List of sort fields (e.g. ?sort&#x3D;accountName:asc,name:asc) Default is accountName:asc The supported sort fields are - accountName, name. | [optional] [default to &#39;accountName:asc&#39;]
 **sensitive** | **bool**|  | [optional] [default to false]

### Return type

[**\VeloPayments\Client\Model\ListFundingAccountsResponse2**](../Model/ListFundingAccountsResponse2.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSourceAccount()`

```php
getSourceAccount($source_account_id): \VeloPayments\Client\Model\SourceAccountResponse
```

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
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSourceAccountV2()`

```php
getSourceAccountV2($source_account_id): \VeloPayments\Client\Model\SourceAccountResponseV2
```

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
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSourceAccountV3()`

```php
getSourceAccountV3($source_account_id): \VeloPayments\Client\Model\SourceAccountResponseV3
```

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
    $result = $apiInstance->getSourceAccountV3($source_account_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerApi->getSourceAccountV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_account_id** | [**string**](../Model/.md)| Source account id |

### Return type

[**\VeloPayments\Client\Model\SourceAccountResponseV3**](../Model/SourceAccountResponseV3.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSourceAccounts()`

```php
getSourceAccounts($physical_account_name, $payor_id, $page, $page_size, $sort): \VeloPayments\Client\Model\ListSourceAccountResponse
```

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
$page_size = 25; // int | The number of results to return in a page
$sort = 'fundingRef:asc'; // string | List of sort fields e.g. ?sort=name:asc Default is name:asc The supported sort fields are - fundingRef

try {
    $result = $apiInstance->getSourceAccounts($physical_account_name, $payor_id, $page, $page_size, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerApi->getSourceAccounts: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **physical_account_name** | **string**| Physical Account Name | [optional]
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID | [optional]
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| The number of results to return in a page | [optional] [default to 25]
 **sort** | **string**| List of sort fields e.g. ?sort&#x3D;name:asc Default is name:asc The supported sort fields are - fundingRef | [optional] [default to &#39;fundingRef:asc&#39;]

### Return type

[**\VeloPayments\Client\Model\ListSourceAccountResponse**](../Model/ListSourceAccountResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSourceAccountsV2()`

```php
getSourceAccountsV2($physical_account_name, $physical_account_id, $payor_id, $funding_account_id, $page, $page_size, $sort): \VeloPayments\Client\Model\ListSourceAccountResponseV2
```

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
$physical_account_id = 'physical_account_id_example'; // string | The physical account ID
$payor_id = 'payor_id_example'; // string | The account owner Payor ID
$funding_account_id = 'funding_account_id_example'; // string | The funding account ID
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | The number of results to return in a page
$sort = 'fundingRef:asc'; // string | List of sort fields e.g. ?sort=name:asc Default is name:asc The supported sort fields are - fundingRef, name, balance

try {
    $result = $apiInstance->getSourceAccountsV2($physical_account_name, $physical_account_id, $payor_id, $funding_account_id, $page, $page_size, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerApi->getSourceAccountsV2: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **physical_account_name** | **string**| Physical Account Name | [optional]
 **physical_account_id** | [**string**](../Model/.md)| The physical account ID | [optional]
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID | [optional]
 **funding_account_id** | [**string**](../Model/.md)| The funding account ID | [optional]
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| The number of results to return in a page | [optional] [default to 25]
 **sort** | **string**| List of sort fields e.g. ?sort&#x3D;name:asc Default is name:asc The supported sort fields are - fundingRef, name, balance | [optional] [default to &#39;fundingRef:asc&#39;]

### Return type

[**\VeloPayments\Client\Model\ListSourceAccountResponseV2**](../Model/ListSourceAccountResponseV2.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSourceAccountsV3()`

```php
getSourceAccountsV3($physical_account_name, $physical_account_id, $payor_id, $funding_account_id, $include_user_deleted, $type, $page, $page_size, $sort): \VeloPayments\Client\Model\ListSourceAccountResponseV3
```

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
$physical_account_id = 'physical_account_id_example'; // string | The physical account ID
$payor_id = 'payor_id_example'; // string | The account owner Payor ID
$funding_account_id = 'funding_account_id_example'; // string | The funding account ID
$include_user_deleted = 'include_user_deleted_example'; // bool | A filter for retrieving both active accounts and user deleted ones
$type = new \VeloPayments\Client\Model\\VeloPayments\Client\Model\SourceAccountType(); // \VeloPayments\Client\Model\SourceAccountType | The type of source account.
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | The number of results to return in a page
$sort = 'fundingRef:asc'; // string | List of sort fields e.g. ?sort=name:asc Default is name:asc The supported sort fields are - fundingRef, name, balance

try {
    $result = $apiInstance->getSourceAccountsV3($physical_account_name, $physical_account_id, $payor_id, $funding_account_id, $include_user_deleted, $type, $page, $page_size, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerApi->getSourceAccountsV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **physical_account_name** | **string**| Physical Account Name | [optional]
 **physical_account_id** | [**string**](../Model/.md)| The physical account ID | [optional]
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID | [optional]
 **funding_account_id** | [**string**](../Model/.md)| The funding account ID | [optional]
 **include_user_deleted** | **bool**| A filter for retrieving both active accounts and user deleted ones | [optional]
 **type** | [**\VeloPayments\Client\Model\SourceAccountType**](../Model/.md)| The type of source account. | [optional]
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| The number of results to return in a page | [optional] [default to 25]
 **sort** | **string**| List of sort fields e.g. ?sort&#x3D;name:asc Default is name:asc The supported sort fields are - fundingRef, name, balance | [optional] [default to &#39;fundingRef:asc&#39;]

### Return type

[**\VeloPayments\Client\Model\ListSourceAccountResponseV3**](../Model/ListSourceAccountResponseV3.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listFundingAuditDeltas()`

```php
listFundingAuditDeltas($payor_id, $updated_since, $page, $page_size): \VeloPayments\Client\Model\PageResourceFundingPayorStatusAuditResponseFundingPayorStatusAuditResponse
```

Get Funding Audit Delta

Get funding audit deltas for a payor

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
$payor_id = 'payor_id_example'; // string
$updated_since = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | The number of results to return in a page

try {
    $result = $apiInstance->listFundingAuditDeltas($payor_id, $updated_since, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerApi->listFundingAuditDeltas: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)|  |
 **updated_since** | **\DateTime**|  |
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| The number of results to return in a page | [optional] [default to 25]

### Return type

[**\VeloPayments\Client\Model\PageResourceFundingPayorStatusAuditResponseFundingPayorStatusAuditResponse**](../Model/PageResourceFundingPayorStatusAuditResponseFundingPayorStatusAuditResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `setNotificationsRequest()`

```php
setNotificationsRequest($source_account_id, $set_notifications_request)
```

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

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `transferFunds()`

```php
transferFunds($source_account_id, $transfer_request)
```

Transfer Funds between source accounts

Transfer funds between source accounts for a Payor. The 'from' source account is identified in the URL, and is the account which will be debited. The 'to' (destination) source account is in the body, and is the account which will be credited. Both source accounts must belong to the same Payor. There must be sufficient balance in the 'from' source account, otherwise the transfer attempt will fail.

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
$source_account_id = 'source_account_id_example'; // string | The 'from' source account id, which will be debited
$transfer_request = new \VeloPayments\Client\Model\TransferRequest(); // \VeloPayments\Client\Model\TransferRequest | Body

try {
    $apiInstance->transferFunds($source_account_id, $transfer_request);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerApi->transferFunds: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_account_id** | [**string**](../Model/.md)| The &#39;from&#39; source account id, which will be debited |
 **transfer_request** | [**\VeloPayments\Client\Model\TransferRequest**](../Model/TransferRequest.md)| Body |

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

## `transferFundsV3()`

```php
transferFundsV3($source_account_id, $transfer_request2)
```

Transfer Funds between source accounts

Transfer funds between source accounts for a Payor. The 'from' source account is identified in the URL, and is the account which will be debited. The 'to' (destination) source account is in the body, and is the account which will be credited. Both source accounts must belong to the same Payor. There must be sufficient balance in the 'from' source account, otherwise the transfer attempt will fail.

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
$source_account_id = 'source_account_id_example'; // string | The 'from' source account id, which will be debited
$transfer_request2 = new \VeloPayments\Client\Model\TransferRequest2(); // \VeloPayments\Client\Model\TransferRequest2 | Body

try {
    $apiInstance->transferFundsV3($source_account_id, $transfer_request2);
} catch (Exception $e) {
    echo 'Exception when calling FundingManagerApi->transferFundsV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_account_id** | [**string**](../Model/.md)| The &#39;from&#39; source account id, which will be debited |
 **transfer_request2** | [**\VeloPayments\Client\Model\TransferRequest2**](../Model/TransferRequest2.md)| Body |

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
