# VeloPayments\Client\FundingApi

All URIs are relative to https://api.sandbox.velopayments.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createFundingRequestV2()**](FundingApi.md#createFundingRequestV2) | **POST** /v2/sourceAccounts/{sourceAccountId}/fundingRequest | Create Funding Request |
| [**createFundingRequestV3()**](FundingApi.md#createFundingRequestV3) | **POST** /v3/sourceAccounts/{sourceAccountId}/fundingRequest | Create Funding Request |
| [**getFundingAccountV2()**](FundingApi.md#getFundingAccountV2) | **GET** /v2/fundingAccounts/{fundingAccountId} | Get Funding Account |
| [**getFundingAccountsV2()**](FundingApi.md#getFundingAccountsV2) | **GET** /v2/fundingAccounts | Get Funding Accounts |
| [**getFundingByIdV1()**](FundingApi.md#getFundingByIdV1) | **GET** /v1/fundings/{fundingId} | Get Funding |
| [**listFundingAuditDeltas()**](FundingApi.md#listFundingAuditDeltas) | **GET** /v1/deltas/fundings | Get Funding Audit Delta |


## `createFundingRequestV2()`

```php
createFundingRequestV2($source_account_id, $funding_request_v2)
```

Create Funding Request

Instruct a funding request to transfer funds from the payor’s funding bank to the payor’s balance held within Velo  (202 - accepted, 400 - invalid request body, 404 - source account not found).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\FundingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$source_account_id = 'source_account_id_example'; // string | Source account id
$funding_request_v2 = new \VeloPayments\Client\Model\FundingRequestV2(); // \VeloPayments\Client\Model\FundingRequestV2 | Body to included amount to be funded

try {
    $apiInstance->createFundingRequestV2($source_account_id, $funding_request_v2);
} catch (Exception $e) {
    echo 'Exception when calling FundingApi->createFundingRequestV2: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **source_account_id** | **string**| Source account id | |
| **funding_request_v2** | [**\VeloPayments\Client\Model\FundingRequestV2**](../Model/FundingRequestV2.md)| Body to included amount to be funded | |

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

<p>Instruct a funding request to transfer funds from the payor’s funding bank to the payor’s balance held within Velo</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\FundingApi(
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
    echo 'Exception when calling FundingApi->createFundingRequestV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **source_account_id** | **string**| Source account id | |
| **funding_request_v3** | [**\VeloPayments\Client\Model\FundingRequestV3**](../Model/FundingRequestV3.md)| Body to included amount to be funded | |

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

## `getFundingAccountV2()`

```php
getFundingAccountV2($funding_account_id, $sensitive): \VeloPayments\Client\Model\FundingAccountResponseV2
```

Get Funding Account

Get Funding Account by ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\FundingApi(
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
    echo 'Exception when calling FundingApi->getFundingAccountV2: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **funding_account_id** | **string**|  | |
| **sensitive** | **bool**|  | [optional] [default to false] |

### Return type

[**\VeloPayments\Client\Model\FundingAccountResponseV2**](../Model/FundingAccountResponseV2.md)

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
getFundingAccountsV2($payor_id, $name, $country, $currency, $type, $page, $page_size, $sort, $sensitive): \VeloPayments\Client\Model\ListFundingAccountsResponseV2
```

Get Funding Accounts

Get the funding accounts.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\FundingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string
$name = 'name_example'; // string | The descriptive funding account name
$country = US; // string | The 2 letter ISO 3166-1 country code (upper case)
$currency = USD; // string | The ISO 4217 currency code
$type = 'type_example'; // string | The type of funding account.
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | The number of results to return in a page
$sort = 'accountName:asc'; // string | List of sort fields (e.g. ?sort=accountName:asc,name:asc) Default is accountName:asc The supported sort fields are - accountName, name.
$sensitive = false; // bool

try {
    $result = $apiInstance->getFundingAccountsV2($payor_id, $name, $country, $currency, $type, $page, $page_size, $sort, $sensitive);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FundingApi->getFundingAccountsV2: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payor_id** | **string**|  | [optional] |
| **name** | **string**| The descriptive funding account name | [optional] |
| **country** | **string**| The 2 letter ISO 3166-1 country code (upper case) | [optional] |
| **currency** | **string**| The ISO 4217 currency code | [optional] |
| **type** | **string**| The type of funding account. | [optional] |
| **page** | **int**| Page number. Default is 1. | [optional] [default to 1] |
| **page_size** | **int**| The number of results to return in a page | [optional] [default to 25] |
| **sort** | **string**| List of sort fields (e.g. ?sort&#x3D;accountName:asc,name:asc) Default is accountName:asc The supported sort fields are - accountName, name. | [optional] [default to &#39;accountName:asc&#39;] |
| **sensitive** | **bool**|  | [optional] [default to false] |

### Return type

[**\VeloPayments\Client\Model\ListFundingAccountsResponseV2**](../Model/ListFundingAccountsResponseV2.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFundingByIdV1()`

```php
getFundingByIdV1($funding_id): \VeloPayments\Client\Model\FundingResponse
```

Get Funding

Get Funding by Id

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\FundingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$funding_id = 'funding_id_example'; // string

try {
    $result = $apiInstance->getFundingByIdV1($funding_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FundingApi->getFundingByIdV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **funding_id** | **string**|  | |

### Return type

[**\VeloPayments\Client\Model\FundingResponse**](../Model/FundingResponse.md)

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


$apiInstance = new VeloPayments\Client\Api\FundingApi(
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
    echo 'Exception when calling FundingApi->listFundingAuditDeltas: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payor_id** | **string**|  | |
| **updated_since** | **\DateTime**|  | |
| **page** | **int**| Page number. Default is 1. | [optional] [default to 1] |
| **page_size** | **int**| The number of results to return in a page | [optional] [default to 25] |

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
