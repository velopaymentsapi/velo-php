# VeloPayments\Client\SourceAccountsApi

All URIs are relative to https://api.sandbox.velopayments.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getSourceAccountV2()**](SourceAccountsApi.md#getSourceAccountV2) | **GET** /v2/sourceAccounts/{sourceAccountId} | Get Source Account |
| [**getSourceAccountV3()**](SourceAccountsApi.md#getSourceAccountV3) | **GET** /v3/sourceAccounts/{sourceAccountId} | Get details about given source account. |
| [**getSourceAccountsV2()**](SourceAccountsApi.md#getSourceAccountsV2) | **GET** /v2/sourceAccounts | Get list of source accounts |
| [**getSourceAccountsV3()**](SourceAccountsApi.md#getSourceAccountsV3) | **GET** /v3/sourceAccounts | Get list of source accounts |
| [**setNotificationsRequest()**](SourceAccountsApi.md#setNotificationsRequest) | **POST** /v1/sourceAccounts/{sourceAccountId}/notifications | Set notifications |
| [**setNotificationsRequestV3()**](SourceAccountsApi.md#setNotificationsRequestV3) | **POST** /v3/sourceAccounts/{sourceAccountId}/notifications | Set notifications |
| [**transferFundsV2()**](SourceAccountsApi.md#transferFundsV2) | **POST** /v2/sourceAccounts/{sourceAccountId}/transfers | Transfer Funds between source accounts |
| [**transferFundsV3()**](SourceAccountsApi.md#transferFundsV3) | **POST** /v3/sourceAccounts/{sourceAccountId}/transfers | Transfer Funds between source accounts |


## `getSourceAccountV2()`

```php
getSourceAccountV2($source_account_id): \VeloPayments\Client\Model\SourceAccountResponseV2
```

Get Source Account

Get details about given source account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\SourceAccountsApi(
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
    echo 'Exception when calling SourceAccountsApi->getSourceAccountV2: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **source_account_id** | **string**| Source account id | |

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


$apiInstance = new VeloPayments\Client\Api\SourceAccountsApi(
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
    echo 'Exception when calling SourceAccountsApi->getSourceAccountV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **source_account_id** | **string**| Source account id | |

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


$apiInstance = new VeloPayments\Client\Api\SourceAccountsApi(
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
    echo 'Exception when calling SourceAccountsApi->getSourceAccountsV2: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **physical_account_name** | **string**| Physical Account Name | [optional] |
| **physical_account_id** | **string**| The physical account ID | [optional] |
| **payor_id** | **string**| The account owner Payor ID | [optional] |
| **funding_account_id** | **string**| The funding account ID | [optional] |
| **page** | **int**| Page number. Default is 1. | [optional] [default to 1] |
| **page_size** | **int**| The number of results to return in a page | [optional] [default to 25] |
| **sort** | **string**| List of sort fields e.g. ?sort&#x3D;name:asc Default is name:asc The supported sort fields are - fundingRef, name, balance | [optional] [default to &#39;fundingRef:asc&#39;] |

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


$apiInstance = new VeloPayments\Client\Api\SourceAccountsApi(
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
$type = 'type_example'; // string | The type of source account.
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | The number of results to return in a page
$sort = 'fundingRef:asc'; // string | List of sort fields e.g. ?sort=name:asc Default is name:asc The supported sort fields are - fundingRef, name, balance

try {
    $result = $apiInstance->getSourceAccountsV3($physical_account_name, $physical_account_id, $payor_id, $funding_account_id, $include_user_deleted, $type, $page, $page_size, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SourceAccountsApi->getSourceAccountsV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **physical_account_name** | **string**| Physical Account Name | [optional] |
| **physical_account_id** | **string**| The physical account ID | [optional] |
| **payor_id** | **string**| The account owner Payor ID | [optional] |
| **funding_account_id** | **string**| The funding account ID | [optional] |
| **include_user_deleted** | **bool**| A filter for retrieving both active accounts and user deleted ones | [optional] |
| **type** | **string**| The type of source account. | [optional] |
| **page** | **int**| Page number. Default is 1. | [optional] [default to 1] |
| **page_size** | **int**| The number of results to return in a page | [optional] [default to 25] |
| **sort** | **string**| List of sort fields e.g. ?sort&#x3D;name:asc Default is name:asc The supported sort fields are - fundingRef, name, balance | [optional] [default to &#39;fundingRef:asc&#39;] |

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

## `setNotificationsRequest()`

```php
setNotificationsRequest($source_account_id, $set_notifications_request)
```

Set notifications

<p>Set notifications for a given source account</p> <p>deprecated since 2.34 (use v3 version)</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\SourceAccountsApi(
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
    echo 'Exception when calling SourceAccountsApi->setNotificationsRequest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **source_account_id** | **string**| Source account id | |
| **set_notifications_request** | [**\VeloPayments\Client\Model\SetNotificationsRequest**](../Model/SetNotificationsRequest.md)| Body to included minimum balance to set | |

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

## `setNotificationsRequestV3()`

```php
setNotificationsRequestV3($source_account_id, $set_notifications_request2)
```

Set notifications

<p>Set notifications for a given source account</p> <p>If the balance falls below the amount set in the request an email notification will be sent to the email address registered in the payor profile</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\SourceAccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$source_account_id = 'source_account_id_example'; // string | Source account id
$set_notifications_request2 = new \VeloPayments\Client\Model\SetNotificationsRequest2(); // \VeloPayments\Client\Model\SetNotificationsRequest2 | Body to included minimum balance to set

try {
    $apiInstance->setNotificationsRequestV3($source_account_id, $set_notifications_request2);
} catch (Exception $e) {
    echo 'Exception when calling SourceAccountsApi->setNotificationsRequestV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **source_account_id** | **string**| Source account id | |
| **set_notifications_request2** | [**\VeloPayments\Client\Model\SetNotificationsRequest2**](../Model/SetNotificationsRequest2.md)| Body to included minimum balance to set | |

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

## `transferFundsV2()`

```php
transferFundsV2($source_account_id, $transfer_request_v2)
```

Transfer Funds between source accounts

Transfer funds between source accounts for a Payor. The 'from' source account is identified in the URL, and is the account which will be debited. The 'to' (destination) source account is in the body, and is the account which will be credited. Both source accounts must belong to the same Payor. There must be sufficient balance in the 'from' source account, otherwise the transfer attempt will fail.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\SourceAccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$source_account_id = 'source_account_id_example'; // string | The 'from' source account id, which will be debited
$transfer_request_v2 = new \VeloPayments\Client\Model\TransferRequestV2(); // \VeloPayments\Client\Model\TransferRequestV2 | Body

try {
    $apiInstance->transferFundsV2($source_account_id, $transfer_request_v2);
} catch (Exception $e) {
    echo 'Exception when calling SourceAccountsApi->transferFundsV2: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **source_account_id** | **string**| The &#39;from&#39; source account id, which will be debited | |
| **transfer_request_v2** | [**\VeloPayments\Client\Model\TransferRequestV2**](../Model/TransferRequestV2.md)| Body | |

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
transferFundsV3($source_account_id, $transfer_request_v3)
```

Transfer Funds between source accounts

Transfer funds between source accounts for a Payor. The 'from' source account is identified in the URL, and is the account which will be debited. The 'to' (destination) source account is in the body, and is the account which will be credited. Both source accounts must belong to the same Payor. There must be sufficient balance in the 'from' source account, otherwise the transfer attempt will fail.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\SourceAccountsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$source_account_id = 'source_account_id_example'; // string | The 'from' source account id, which will be debited
$transfer_request_v3 = new \VeloPayments\Client\Model\TransferRequestV3(); // \VeloPayments\Client\Model\TransferRequestV3 | Body

try {
    $apiInstance->transferFundsV3($source_account_id, $transfer_request_v3);
} catch (Exception $e) {
    echo 'Exception when calling SourceAccountsApi->transferFundsV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **source_account_id** | **string**| The &#39;from&#39; source account id, which will be debited | |
| **transfer_request_v3** | [**\VeloPayments\Client\Model\TransferRequestV3**](../Model/TransferRequestV3.md)| Body | |

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
