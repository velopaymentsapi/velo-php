# VeloPayments\Client\TransactionsApi

All URIs are relative to https://api.sandbox.velopayments.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createTransactionV1()**](TransactionsApi.md#createTransactionV1) | **POST** /v1/transactions | Create a Transaction |
| [**getTransactionByIdV1()**](TransactionsApi.md#getTransactionByIdV1) | **GET** /v1/transactions/{transactionId} | Get Transaction |
| [**getTransactions()**](TransactionsApi.md#getTransactions) | **GET** /v1/transactions | Get Transactions |


## `createTransactionV1()`

```php
createTransactionV1($create_transaction_request): \VeloPayments\Client\Model\CreateTransactionResponse
```

Create a Transaction

Create a new Transaction that can be funded

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\TransactionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_transaction_request = new \VeloPayments\Client\Model\CreateTransactionRequest(); // \VeloPayments\Client\Model\CreateTransactionRequest

try {
    $result = $apiInstance->createTransactionV1($create_transaction_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionsApi->createTransactionV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_transaction_request** | [**\VeloPayments\Client\Model\CreateTransactionRequest**](../Model/CreateTransactionRequest.md)|  | [optional] |

### Return type

[**\VeloPayments\Client\Model\CreateTransactionResponse**](../Model/CreateTransactionResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTransactionByIdV1()`

```php
getTransactionByIdV1($transaction_id): \VeloPayments\Client\Model\TransactionResponse
```

Get Transaction

Get Transaction by Id

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\TransactionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$transaction_id = 'transaction_id_example'; // string

try {
    $result = $apiInstance->getTransactionByIdV1($transaction_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionsApi->getTransactionByIdV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **transaction_id** | **string**|  | |

### Return type

[**\VeloPayments\Client\Model\TransactionResponse**](../Model/TransactionResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTransactions()`

```php
getTransactions($payor_id, $transaction_reference, $page, $page_size, $sort): \VeloPayments\Client\Model\PageResourceTransactions
```

Get Transactions

<P>Get list of Transactions</P>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\TransactionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string
$transaction_reference = 'transaction_reference_example'; // string
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | The number of results to return in a page
$sort = 'createdAt:asc'; // string

try {
    $result = $apiInstance->getTransactions($payor_id, $transaction_reference, $page, $page_size, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionsApi->getTransactions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payor_id** | **string**|  | [optional] |
| **transaction_reference** | **string**|  | [optional] |
| **page** | **int**| Page number. Default is 1. | [optional] [default to 1] |
| **page_size** | **int**| The number of results to return in a page | [optional] [default to 25] |
| **sort** | **string**|  | [optional] [default to &#39;createdAt:asc&#39;] |

### Return type

[**\VeloPayments\Client\Model\PageResourceTransactions**](../Model/PageResourceTransactions.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
