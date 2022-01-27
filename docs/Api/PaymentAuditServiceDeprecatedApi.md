# VeloPayments\Client\PaymentAuditServiceDeprecatedApi

All URIs are relative to https://api.sandbox.velopayments.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**exportTransactionsCSVV3()**](PaymentAuditServiceDeprecatedApi.md#exportTransactionsCSVV3) | **GET** /v3/paymentaudit/transactions | V3 Export Transactions
[**getFundingsV1()**](PaymentAuditServiceDeprecatedApi.md#getFundingsV1) | **GET** /v1/paymentaudit/fundings | V1 Get Fundings for Payor
[**getPaymentDetailsV3()**](PaymentAuditServiceDeprecatedApi.md#getPaymentDetailsV3) | **GET** /v3/paymentaudit/payments/{paymentId} | V3 Get Payment
[**getPaymentsForPayoutPAV3()**](PaymentAuditServiceDeprecatedApi.md#getPaymentsForPayoutPAV3) | **GET** /v3/paymentaudit/payouts/{payoutId} | V3 Get Payments for Payout
[**getPayoutStatsV1()**](PaymentAuditServiceDeprecatedApi.md#getPayoutStatsV1) | **GET** /v1/paymentaudit/payoutStatistics | V1 Get Payout Statistics
[**getPayoutsForPayorV3()**](PaymentAuditServiceDeprecatedApi.md#getPayoutsForPayorV3) | **GET** /v3/paymentaudit/payouts | V3 Get Payouts for Payor
[**listPaymentChanges()**](PaymentAuditServiceDeprecatedApi.md#listPaymentChanges) | **GET** /v1/deltas/payments | V1 List Payment Changes
[**listPaymentsAuditV3()**](PaymentAuditServiceDeprecatedApi.md#listPaymentsAuditV3) | **GET** /v3/paymentaudit/payments | V3 Get List of Payments


## `exportTransactionsCSVV3()`

```php
exportTransactionsCSVV3($payor_id, $start_date, $end_date): \VeloPayments\Client\Model\PayorAmlTransactionV3
```

V3 Export Transactions

Deprecated (use /v4/paymentaudit/transactions instead)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PaymentAuditServiceDeprecatedApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The Payor ID for whom you wish to run the report. For a Payor requesting the report, this could be their exact Payor, or it could be a child/descendant Payor.
$start_date = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | Start date, inclusive. Format is YYYY-MM-DD
$end_date = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | End date, inclusive. Format is YYYY-MM-DD

try {
    $result = $apiInstance->exportTransactionsCSVV3($payor_id, $start_date, $end_date);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentAuditServiceDeprecatedApi->exportTransactionsCSVV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | **string**| The Payor ID for whom you wish to run the report. For a Payor requesting the report, this could be their exact Payor, or it could be a child/descendant Payor. | [optional]
 **start_date** | **\DateTime**| Start date, inclusive. Format is YYYY-MM-DD | [optional]
 **end_date** | **\DateTime**| End date, inclusive. Format is YYYY-MM-DD | [optional]

### Return type

[**\VeloPayments\Client\Model\PayorAmlTransactionV3**](../Model/PayorAmlTransactionV3.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/csv`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFundingsV1()`

```php
getFundingsV1($payor_id, $page, $page_size, $sort): \VeloPayments\Client\Model\GetFundingsResponse
```

V1 Get Fundings for Payor

Deprecated (use /v4/paymentaudit/fundings)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PaymentAuditServiceDeprecatedApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The account owner Payor ID
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | The number of results to return in a page
$sort = 'sort_example'; // string | List of sort fields. Example: ```?sort=destinationCurrency:asc,destinationAmount:asc``` Default is no sort. The supported sort fields are: dateTime and amount.

try {
    $result = $apiInstance->getFundingsV1($payor_id, $page, $page_size, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentAuditServiceDeprecatedApi->getFundingsV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | **string**| The account owner Payor ID |
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| The number of results to return in a page | [optional] [default to 25]
 **sort** | **string**| List of sort fields. Example: &#x60;&#x60;&#x60;?sort&#x3D;destinationCurrency:asc,destinationAmount:asc&#x60;&#x60;&#x60; Default is no sort. The supported sort fields are: dateTime and amount. | [optional]

### Return type

[**\VeloPayments\Client\Model\GetFundingsResponse**](../Model/GetFundingsResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPaymentDetailsV3()`

```php
getPaymentDetailsV3($payment_id, $sensitive): \VeloPayments\Client\Model\PaymentResponseV3
```

V3 Get Payment

Deprecated (use /v4/paymentaudit/payments/<paymentId> instead)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PaymentAuditServiceDeprecatedApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payment_id = 'payment_id_example'; // string | Payment Id
$sensitive = True; // bool | Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values.

try {
    $result = $apiInstance->getPaymentDetailsV3($payment_id, $sensitive);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentAuditServiceDeprecatedApi->getPaymentDetailsV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payment_id** | **string**| Payment Id |
 **sensitive** | **bool**| Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. | [optional]

### Return type

[**\VeloPayments\Client\Model\PaymentResponseV3**](../Model/PaymentResponseV3.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPaymentsForPayoutPAV3()`

```php
getPaymentsForPayoutPAV3($payout_id, $remote_id, $status, $source_amount_from, $source_amount_to, $payment_amount_from, $payment_amount_to, $submitted_date_from, $submitted_date_to, $page, $page_size, $sort, $sensitive): \VeloPayments\Client\Model\GetPaymentsForPayoutResponseV3
```

V3 Get Payments for Payout

Deprecated (use /v4/paymentaudit/payouts/<payoutId> instead)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PaymentAuditServiceDeprecatedApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payout_id = 'payout_id_example'; // string | The id (UUID) of the payout.
$remote_id = 'remote_id_example'; // string | The remote id of the payees.
$status = 'status_example'; // string | Payment Status
$source_amount_from = 56; // int | The source amount from range filter. Filters for sourceAmount >= sourceAmountFrom
$source_amount_to = 56; // int | The source amount to range filter. Filters for sourceAmount ⇐ sourceAmountTo
$payment_amount_from = 56; // int | The payment amount from range filter. Filters for paymentAmount >= paymentAmountFrom
$payment_amount_to = 56; // int | The payment amount to range filter. Filters for paymentAmount ⇐ paymentAmountTo
$submitted_date_from = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | The submitted date from range filter. Format is yyyy-MM-dd.
$submitted_date_to = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | The submitted date to range filter. Format is yyyy-MM-dd.
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | The number of results to return in a page
$sort = 'sort_example'; // string | <p>List of sort fields (e.g. ?sort=submittedDateTime:asc,status:asc). Default is sort by remoteId</p> <p>The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status</p>
$sensitive = True; // bool | Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values.

try {
    $result = $apiInstance->getPaymentsForPayoutPAV3($payout_id, $remote_id, $status, $source_amount_from, $source_amount_to, $payment_amount_from, $payment_amount_to, $submitted_date_from, $submitted_date_to, $page, $page_size, $sort, $sensitive);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentAuditServiceDeprecatedApi->getPaymentsForPayoutPAV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payout_id** | **string**| The id (UUID) of the payout. |
 **remote_id** | **string**| The remote id of the payees. | [optional]
 **status** | **string**| Payment Status | [optional]
 **source_amount_from** | **int**| The source amount from range filter. Filters for sourceAmount &gt;&#x3D; sourceAmountFrom | [optional]
 **source_amount_to** | **int**| The source amount to range filter. Filters for sourceAmount ⇐ sourceAmountTo | [optional]
 **payment_amount_from** | **int**| The payment amount from range filter. Filters for paymentAmount &gt;&#x3D; paymentAmountFrom | [optional]
 **payment_amount_to** | **int**| The payment amount to range filter. Filters for paymentAmount ⇐ paymentAmountTo | [optional]
 **submitted_date_from** | **\DateTime**| The submitted date from range filter. Format is yyyy-MM-dd. | [optional]
 **submitted_date_to** | **\DateTime**| The submitted date to range filter. Format is yyyy-MM-dd. | [optional]
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| The number of results to return in a page | [optional] [default to 25]
 **sort** | **string**| &lt;p&gt;List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId&lt;/p&gt; &lt;p&gt;The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status&lt;/p&gt; | [optional]
 **sensitive** | **bool**| Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. | [optional]

### Return type

[**\VeloPayments\Client\Model\GetPaymentsForPayoutResponseV3**](../Model/GetPaymentsForPayoutResponseV3.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPayoutStatsV1()`

```php
getPayoutStatsV1($payor_id): \VeloPayments\Client\Model\GetPayoutStatistics
```

V1 Get Payout Statistics

Deprecated (Use /v4/paymentaudit/payoutStatistics)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PaymentAuditServiceDeprecatedApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The account owner Payor ID. Required for external users.

try {
    $result = $apiInstance->getPayoutStatsV1($payor_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentAuditServiceDeprecatedApi->getPayoutStatsV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | **string**| The account owner Payor ID. Required for external users. | [optional]

### Return type

[**\VeloPayments\Client\Model\GetPayoutStatistics**](../Model/GetPayoutStatistics.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPayoutsForPayorV3()`

```php
getPayoutsForPayorV3($payor_id, $payout_memo, $status, $submitted_date_from, $submitted_date_to, $page, $page_size, $sort): \VeloPayments\Client\Model\GetPayoutsResponseV3
```

V3 Get Payouts for Payor

Deprecated (use /v4/paymentaudit/payouts instead)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PaymentAuditServiceDeprecatedApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The account owner Payor ID
$payout_memo = 'payout_memo_example'; // string | Payout Memo filter - case insensitive sub-string match
$status = 'status_example'; // string | Payout Status
$submitted_date_from = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | The submitted date from range filter. Format is yyyy-MM-dd.
$submitted_date_to = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | The submitted date to range filter. Format is yyyy-MM-dd.
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | The number of results to return in a page
$sort = 'sort_example'; // string | List of sort fields (e.g. ?sort=submittedDateTime:asc,instructedDateTime:asc,status:asc) Default is submittedDateTime:asc The supported sort fields are: submittedDateTime, instructedDateTime, status.

try {
    $result = $apiInstance->getPayoutsForPayorV3($payor_id, $payout_memo, $status, $submitted_date_from, $submitted_date_to, $page, $page_size, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentAuditServiceDeprecatedApi->getPayoutsForPayorV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | **string**| The account owner Payor ID |
 **payout_memo** | **string**| Payout Memo filter - case insensitive sub-string match | [optional]
 **status** | **string**| Payout Status | [optional]
 **submitted_date_from** | **\DateTime**| The submitted date from range filter. Format is yyyy-MM-dd. | [optional]
 **submitted_date_to** | **\DateTime**| The submitted date to range filter. Format is yyyy-MM-dd. | [optional]
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| The number of results to return in a page | [optional] [default to 25]
 **sort** | **string**| List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,instructedDateTime:asc,status:asc) Default is submittedDateTime:asc The supported sort fields are: submittedDateTime, instructedDateTime, status. | [optional]

### Return type

[**\VeloPayments\Client\Model\GetPayoutsResponseV3**](../Model/GetPayoutsResponseV3.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listPaymentChanges()`

```php
listPaymentChanges($payor_id, $updated_since, $page, $page_size): \VeloPayments\Client\Model\PaymentDeltaResponseV1
```

V1 List Payment Changes

Deprecated (use /v4/payments/deltas instead)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PaymentAuditServiceDeprecatedApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The Payor ID to find associated Payments
$updated_since = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm
$page = 1; // int | Page number. Default is 1.
$page_size = 100; // int | The number of results to return in a page

try {
    $result = $apiInstance->listPaymentChanges($payor_id, $updated_since, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentAuditServiceDeprecatedApi->listPaymentChanges: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | **string**| The Payor ID to find associated Payments |
 **updated_since** | **\DateTime**| The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm |
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| The number of results to return in a page | [optional] [default to 100]

### Return type

[**\VeloPayments\Client\Model\PaymentDeltaResponseV1**](../Model/PaymentDeltaResponseV1.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listPaymentsAuditV3()`

```php
listPaymentsAuditV3($payee_id, $payor_id, $payor_name, $remote_id, $status, $source_account_name, $source_amount_from, $source_amount_to, $source_currency, $payment_amount_from, $payment_amount_to, $payment_currency, $submitted_date_from, $submitted_date_to, $payment_memo, $page, $page_size, $sort, $sensitive): \VeloPayments\Client\Model\ListPaymentsResponseV3
```

V3 Get List of Payments

Deprecated (use /v4/paymentaudit/payments instead)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PaymentAuditServiceDeprecatedApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payee_id = 'payee_id_example'; // string | The UUID of the payee.
$payor_id = 'payor_id_example'; // string | The account owner Payor Id. Required for external users.
$payor_name = 'payor_name_example'; // string | The payor’s name. This filters via a case insensitive substring match.
$remote_id = 'remote_id_example'; // string | The remote id of the payees.
$status = 'status_example'; // string | Payment Status
$source_account_name = 'source_account_name_example'; // string | The source account name filter. This filters via a case insensitive substring match.
$source_amount_from = 56; // int | The source amount from range filter. Filters for sourceAmount >= sourceAmountFrom
$source_amount_to = 56; // int | The source amount to range filter. Filters for sourceAmount ⇐ sourceAmountTo
$source_currency = 'source_currency_example'; // string | The source currency filter. Filters based on an exact match on the currency.
$payment_amount_from = 56; // int | The payment amount from range filter. Filters for paymentAmount >= paymentAmountFrom
$payment_amount_to = 56; // int | The payment amount to range filter. Filters for paymentAmount ⇐ paymentAmountTo
$payment_currency = 'payment_currency_example'; // string | The payment currency filter. Filters based on an exact match on the currency.
$submitted_date_from = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | The submitted date from range filter. Format is yyyy-MM-dd.
$submitted_date_to = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | The submitted date to range filter. Format is yyyy-MM-dd.
$payment_memo = 'payment_memo_example'; // string | The payment memo filter. This filters via a case insensitive substring match.
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | The number of results to return in a page
$sort = 'sort_example'; // string | List of sort fields (e.g. ?sort=submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status
$sensitive = True; // bool | Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values.

try {
    $result = $apiInstance->listPaymentsAuditV3($payee_id, $payor_id, $payor_name, $remote_id, $status, $source_account_name, $source_amount_from, $source_amount_to, $source_currency, $payment_amount_from, $payment_amount_to, $payment_currency, $submitted_date_from, $submitted_date_to, $payment_memo, $page, $page_size, $sort, $sensitive);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentAuditServiceDeprecatedApi->listPaymentsAuditV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payee_id** | **string**| The UUID of the payee. | [optional]
 **payor_id** | **string**| The account owner Payor Id. Required for external users. | [optional]
 **payor_name** | **string**| The payor’s name. This filters via a case insensitive substring match. | [optional]
 **remote_id** | **string**| The remote id of the payees. | [optional]
 **status** | **string**| Payment Status | [optional]
 **source_account_name** | **string**| The source account name filter. This filters via a case insensitive substring match. | [optional]
 **source_amount_from** | **int**| The source amount from range filter. Filters for sourceAmount &gt;&#x3D; sourceAmountFrom | [optional]
 **source_amount_to** | **int**| The source amount to range filter. Filters for sourceAmount ⇐ sourceAmountTo | [optional]
 **source_currency** | **string**| The source currency filter. Filters based on an exact match on the currency. | [optional]
 **payment_amount_from** | **int**| The payment amount from range filter. Filters for paymentAmount &gt;&#x3D; paymentAmountFrom | [optional]
 **payment_amount_to** | **int**| The payment amount to range filter. Filters for paymentAmount ⇐ paymentAmountTo | [optional]
 **payment_currency** | **string**| The payment currency filter. Filters based on an exact match on the currency. | [optional]
 **submitted_date_from** | **\DateTime**| The submitted date from range filter. Format is yyyy-MM-dd. | [optional]
 **submitted_date_to** | **\DateTime**| The submitted date to range filter. Format is yyyy-MM-dd. | [optional]
 **payment_memo** | **string**| The payment memo filter. This filters via a case insensitive substring match. | [optional]
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| The number of results to return in a page | [optional] [default to 25]
 **sort** | **string**| List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status | [optional]
 **sensitive** | **bool**| Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. | [optional]

### Return type

[**\VeloPayments\Client\Model\ListPaymentsResponseV3**](../Model/ListPaymentsResponseV3.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
