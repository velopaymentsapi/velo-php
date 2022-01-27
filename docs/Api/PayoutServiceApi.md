# VeloPayments\Client\PayoutServiceApi

All URIs are relative to https://api.sandbox.velopayments.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createQuoteForPayoutV3()**](PayoutServiceApi.md#createQuoteForPayoutV3) | **POST** /v3/payouts/{payoutId}/quote | Create a quote for the payout
[**deschedulePayout()**](PayoutServiceApi.md#deschedulePayout) | **DELETE** /v3/payouts/{payoutId}/schedule | Deschedule a payout
[**getPaymentsForPayoutV3()**](PayoutServiceApi.md#getPaymentsForPayoutV3) | **GET** /v3/payouts/{payoutId}/payments | Retrieve payments for a payout
[**getPayoutSummaryV3()**](PayoutServiceApi.md#getPayoutSummaryV3) | **GET** /v3/payouts/{payoutId} | Get Payout Summary
[**instructPayoutV3()**](PayoutServiceApi.md#instructPayoutV3) | **POST** /v3/payouts/{payoutId} | Instruct Payout
[**scheduleForPayout()**](PayoutServiceApi.md#scheduleForPayout) | **POST** /v3/payouts/{payoutId}/schedule | Schedule a payout
[**submitPayoutV3()**](PayoutServiceApi.md#submitPayoutV3) | **POST** /v3/payouts | Submit Payout
[**withdrawPayment()**](PayoutServiceApi.md#withdrawPayment) | **POST** /v1/payments/{paymentId}/withdraw | Withdraw a Payment
[**withdrawPayoutV3()**](PayoutServiceApi.md#withdrawPayoutV3) | **DELETE** /v3/payouts/{payoutId} | Withdraw Payout


## `createQuoteForPayoutV3()`

```php
createQuoteForPayoutV3($payout_id): \VeloPayments\Client\Model\QuoteResponseV3
```

Create a quote for the payout

Create quote for a payout

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayoutServiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payout_id = 'payout_id_example'; // string | Id of the payout

try {
    $result = $apiInstance->createQuoteForPayoutV3($payout_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayoutServiceApi->createQuoteForPayoutV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payout_id** | **string**| Id of the payout |

### Return type

[**\VeloPayments\Client\Model\QuoteResponseV3**](../Model/QuoteResponseV3.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deschedulePayout()`

```php
deschedulePayout($payout_id)
```

Deschedule a payout

Remove the schedule for a scheduled payout

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayoutServiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payout_id = 'payout_id_example'; // string | Id of the payout

try {
    $apiInstance->deschedulePayout($payout_id);
} catch (Exception $e) {
    echo 'Exception when calling PayoutServiceApi->deschedulePayout: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payout_id** | **string**| Id of the payout |

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

## `getPaymentsForPayoutV3()`

```php
getPaymentsForPayoutV3($payout_id, $status, $remote_id, $payor_payment_id, $source_account_name, $transmission_type, $payment_memo, $page_size, $page): \VeloPayments\Client\Model\PagedPaymentsResponseV3
```

Retrieve payments for a payout

Retrieve payments for a payout

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayoutServiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payout_id = 'payout_id_example'; // string | Id of the payout
$status = 'status_example'; // string | Payment Status * ACCEPTED: any payment which was accepted at submission time (status may have changed since) * REJECTED: any payment rejected by initial submission processing * WITHDRAWN: any payment which has been withdrawn * WITHDRAWABLE: any payment eligible for withdrawal
$remote_id = 'remote_id_example'; // string | The remote id of the payees.
$payor_payment_id = 'payor_payment_id_example'; // string | Payor's Id of the Payment
$source_account_name = 'source_account_name_example'; // string | Physical Account Name
$transmission_type = 'transmission_type_example'; // string | Transmission Type * ACH * SAME_DAY_ACH * WIRE
$payment_memo = 'payment_memo_example'; // string | Payment Memo of the Payment
$page_size = 25; // int | The number of results to return in a page
$page = 1; // int | Page number. Default is 1.

try {
    $result = $apiInstance->getPaymentsForPayoutV3($payout_id, $status, $remote_id, $payor_payment_id, $source_account_name, $transmission_type, $payment_memo, $page_size, $page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayoutServiceApi->getPaymentsForPayoutV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payout_id** | **string**| Id of the payout |
 **status** | **string**| Payment Status * ACCEPTED: any payment which was accepted at submission time (status may have changed since) * REJECTED: any payment rejected by initial submission processing * WITHDRAWN: any payment which has been withdrawn * WITHDRAWABLE: any payment eligible for withdrawal | [optional]
 **remote_id** | **string**| The remote id of the payees. | [optional]
 **payor_payment_id** | **string**| Payor&#39;s Id of the Payment | [optional]
 **source_account_name** | **string**| Physical Account Name | [optional]
 **transmission_type** | **string**| Transmission Type * ACH * SAME_DAY_ACH * WIRE | [optional]
 **payment_memo** | **string**| Payment Memo of the Payment | [optional]
 **page_size** | **int**| The number of results to return in a page | [optional] [default to 25]
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]

### Return type

[**\VeloPayments\Client\Model\PagedPaymentsResponseV3**](../Model/PagedPaymentsResponseV3.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPayoutSummaryV3()`

```php
getPayoutSummaryV3($payout_id): \VeloPayments\Client\Model\PayoutSummaryResponseV3
```

Get Payout Summary

Get payout summary - returns the current state of the payout.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayoutServiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payout_id = 'payout_id_example'; // string | Id of the payout

try {
    $result = $apiInstance->getPayoutSummaryV3($payout_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayoutServiceApi->getPayoutSummaryV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payout_id** | **string**| Id of the payout |

### Return type

[**\VeloPayments\Client\Model\PayoutSummaryResponseV3**](../Model/PayoutSummaryResponseV3.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `instructPayoutV3()`

```php
instructPayoutV3($payout_id, $instruct_payout_request)
```

Instruct Payout

Instruct a payout to be made for the specified payoutId.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayoutServiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payout_id = 'payout_id_example'; // string | Id of the payout
$instruct_payout_request = new \VeloPayments\Client\Model\InstructPayoutRequest(); // \VeloPayments\Client\Model\InstructPayoutRequest | Additional instruct payout parameters

try {
    $apiInstance->instructPayoutV3($payout_id, $instruct_payout_request);
} catch (Exception $e) {
    echo 'Exception when calling PayoutServiceApi->instructPayoutV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payout_id** | **string**| Id of the payout |
 **instruct_payout_request** | [**\VeloPayments\Client\Model\InstructPayoutRequest**](../Model/InstructPayoutRequest.md)| Additional instruct payout parameters | [optional]

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

## `scheduleForPayout()`

```php
scheduleForPayout($payout_id, $schedule_payout_request)
```

Schedule a payout

<p>Schedule a payout for auto-instruction in the future or update existing payout schedule if the payout has been scheduled before.</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayoutServiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payout_id = 'payout_id_example'; // string | Id of the payout
$schedule_payout_request = new \VeloPayments\Client\Model\SchedulePayoutRequest(); // \VeloPayments\Client\Model\SchedulePayoutRequest | schedule payout parameters

try {
    $apiInstance->scheduleForPayout($payout_id, $schedule_payout_request);
} catch (Exception $e) {
    echo 'Exception when calling PayoutServiceApi->scheduleForPayout: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payout_id** | **string**| Id of the payout |
 **schedule_payout_request** | [**\VeloPayments\Client\Model\SchedulePayoutRequest**](../Model/SchedulePayoutRequest.md)| schedule payout parameters | [optional]

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

## `submitPayoutV3()`

```php
submitPayoutV3($create_payout_request_v3)
```

Submit Payout

<p>Create a new payout and return a location header with a link to get the payout.</p> <p>Basic validation of the payout is performed before returning but more comprehensive validation is done asynchronously.</p> <p>The results can be obtained by issuing a HTTP GET to the URL returned in the location header.</p> <p>**NOTE:** amount values in payments must be in 'minor units' format. E.g. cents for USD, pence for GBP etc.</p>  with no decimal places.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayoutServiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_payout_request_v3 = new \VeloPayments\Client\Model\CreatePayoutRequestV3(); // \VeloPayments\Client\Model\CreatePayoutRequestV3 | Post amount to transfer using stored funding account details.

try {
    $apiInstance->submitPayoutV3($create_payout_request_v3);
} catch (Exception $e) {
    echo 'Exception when calling PayoutServiceApi->submitPayoutV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **create_payout_request_v3** | [**\VeloPayments\Client\Model\CreatePayoutRequestV3**](../Model/CreatePayoutRequestV3.md)| Post amount to transfer using stored funding account details. |

### Return type

void (empty response body)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: `application/json`, `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `withdrawPayment()`

```php
withdrawPayment($payment_id, $withdraw_payment_request)
```

Withdraw a Payment

<p>withdraw a payment </p> <p>There are a variety of reasons why this can fail</p> <ul>     <li>the payment must be in a state of 'accepted' or 'unfunded'</li>     <li>the payout must not be in a state of 'instructed'</li> </ul>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayoutServiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payment_id = 'payment_id_example'; // string | Id of the Payment
$withdraw_payment_request = new \VeloPayments\Client\Model\WithdrawPaymentRequest(); // \VeloPayments\Client\Model\WithdrawPaymentRequest | details for withdrawal

try {
    $apiInstance->withdrawPayment($payment_id, $withdraw_payment_request);
} catch (Exception $e) {
    echo 'Exception when calling PayoutServiceApi->withdrawPayment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payment_id** | **string**| Id of the Payment |
 **withdraw_payment_request** | [**\VeloPayments\Client\Model\WithdrawPaymentRequest**](../Model/WithdrawPaymentRequest.md)| details for withdrawal |

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

## `withdrawPayoutV3()`

```php
withdrawPayoutV3($payout_id)
```

Withdraw Payout

Withdraw Payout will remove the payout details from the rails but the payout will still be accessible in payout service in WITHDRAWN status.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayoutServiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payout_id = 'payout_id_example'; // string | Id of the payout

try {
    $apiInstance->withdrawPayoutV3($payout_id);
} catch (Exception $e) {
    echo 'Exception when calling PayoutServiceApi->withdrawPayoutV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payout_id** | **string**| Id of the payout |

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
