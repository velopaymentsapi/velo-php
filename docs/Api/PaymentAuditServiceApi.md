# VeloPayments\Client\PaymentAuditServiceApi

All URIs are relative to https://api.sandbox.velopayments.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**exportTransactionsCSVV4()**](PaymentAuditServiceApi.md#exportTransactionsCSVV4) | **GET** /v4/paymentaudit/transactions | Export Transactions
[**getFundingsV4()**](PaymentAuditServiceApi.md#getFundingsV4) | **GET** /v4/paymentaudit/fundings | Get Fundings for Payor
[**getPaymentDetailsV4()**](PaymentAuditServiceApi.md#getPaymentDetailsV4) | **GET** /v4/paymentaudit/payments/{paymentId} | Get Payment
[**getPaymentsForPayoutV4()**](PaymentAuditServiceApi.md#getPaymentsForPayoutV4) | **GET** /v4/paymentaudit/payouts/{payoutId} | Get Payments for Payout
[**getPayoutStatsV4()**](PaymentAuditServiceApi.md#getPayoutStatsV4) | **GET** /v4/paymentaudit/payoutStatistics | Get Payout Statistics
[**getPayoutsForPayorV4()**](PaymentAuditServiceApi.md#getPayoutsForPayorV4) | **GET** /v4/paymentaudit/payouts | Get Payouts for Payor
[**listPaymentChangesV4()**](PaymentAuditServiceApi.md#listPaymentChangesV4) | **GET** /v4/payments/deltas | List Payment Changes
[**listPaymentsAuditV4()**](PaymentAuditServiceApi.md#listPaymentsAuditV4) | **GET** /v4/paymentaudit/payments | Get List of Payments


## `exportTransactionsCSVV4()`

```php
exportTransactionsCSVV4($payor_id, $start_date, $end_date, $include): \VeloPayments\Client\Model\PayorAmlTransaction
```

Export Transactions

Download a CSV file containing payments in a date range. Uses Transfer-Encoding - chunked to stream to the client. Date range is inclusive of both the start and end dates.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PaymentAuditServiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | <p>The Payor ID for whom you wish to run the report.</p> <p>For a Payor requesting the report, this could be their exact Payor, or it could be a child/descendant Payor.</p>
$start_date = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | Start date, inclusive. Format is YYYY-MM-DD
$end_date = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | End date, inclusive. Format is YYYY-MM-DD
$include = 'include_example'; // string | <p>Mode to determine whether to include other Payor's data in the results.</p> <p>May only be used if payorId is specified.</p> <p>Can be omitted or set to 'payorOnly' or 'payorAndDescendants'.</p> <p>payorOnly: Only include results for the specified Payor. This is the default if 'include' is omitted.</p> <p>payorAndDescendants: Aggregate results for all descendant Payors of the specified Payor. Should only be used if the Payor with the specified payorId has at least one child Payor.</p> <p>Note when a Payor requests the report and include=payorAndDescendants is used, the following additional columns are included in the CSV: Payor Name, Payor Id</p>

try {
    $result = $apiInstance->exportTransactionsCSVV4($payor_id, $start_date, $end_date, $include);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentAuditServiceApi->exportTransactionsCSVV4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| &lt;p&gt;The Payor ID for whom you wish to run the report.&lt;/p&gt; &lt;p&gt;For a Payor requesting the report, this could be their exact Payor, or it could be a child/descendant Payor.&lt;/p&gt; | [optional]
 **start_date** | **\DateTime**| Start date, inclusive. Format is YYYY-MM-DD | [optional]
 **end_date** | **\DateTime**| End date, inclusive. Format is YYYY-MM-DD | [optional]
 **include** | **string**| &lt;p&gt;Mode to determine whether to include other Payor&#39;s data in the results.&lt;/p&gt; &lt;p&gt;May only be used if payorId is specified.&lt;/p&gt; &lt;p&gt;Can be omitted or set to &#39;payorOnly&#39; or &#39;payorAndDescendants&#39;.&lt;/p&gt; &lt;p&gt;payorOnly: Only include results for the specified Payor. This is the default if &#39;include&#39; is omitted.&lt;/p&gt; &lt;p&gt;payorAndDescendants: Aggregate results for all descendant Payors of the specified Payor. Should only be used if the Payor with the specified payorId has at least one child Payor.&lt;/p&gt; &lt;p&gt;Note when a Payor requests the report and include&#x3D;payorAndDescendants is used, the following additional columns are included in the CSV: Payor Name, Payor Id&lt;/p&gt; | [optional]

### Return type

[**\VeloPayments\Client\Model\PayorAmlTransaction**](../Model/PayorAmlTransaction.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/csv`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFundingsV4()`

```php
getFundingsV4($payor_id, $page, $page_size, $sort): \VeloPayments\Client\Model\GetFundingsResponse
```

Get Fundings for Payor

<p>Get a list of Fundings for a payor.</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PaymentAuditServiceApi(
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
    $result = $apiInstance->getFundingsV4($payor_id, $page, $page_size, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentAuditServiceApi->getFundingsV4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID |
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

## `getPaymentDetailsV4()`

```php
getPaymentDetailsV4($payment_id, $sensitive): \VeloPayments\Client\Model\PaymentResponseV4
```

Get Payment

Get the payment with the given id. This contains the payment history.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PaymentAuditServiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payment_id = 'payment_id_example'; // string | Payment Id
$sensitive = True; // bool | Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values.

try {
    $result = $apiInstance->getPaymentDetailsV4($payment_id, $sensitive);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentAuditServiceApi->getPaymentDetailsV4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payment_id** | [**string**](../Model/.md)| Payment Id |
 **sensitive** | **bool**| Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. | [optional]

### Return type

[**\VeloPayments\Client\Model\PaymentResponseV4**](../Model/PaymentResponseV4.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPaymentsForPayoutV4()`

```php
getPaymentsForPayoutV4($payout_id, $remote_id, $remote_system_id, $status, $source_amount_from, $source_amount_to, $payment_amount_from, $payment_amount_to, $submitted_date_from, $submitted_date_to, $transmission_type, $page, $page_size, $sort, $sensitive): \VeloPayments\Client\Model\GetPaymentsForPayoutResponseV4
```

Get Payments for Payout

Get List of payments for Payout, allowing for RETURNED status

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PaymentAuditServiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payout_id = 'payout_id_example'; // string | The id (UUID) of the payout.
$remote_id = 'remote_id_example'; // string | The remote id of the payees.
$remote_system_id = 'remote_system_id_example'; // string | The id of the remote system that is orchestrating payments
$status = 'status_example'; // string | Payment Status
$source_amount_from = 56; // int | The source amount from range filter. Filters for sourceAmount >= sourceAmountFrom
$source_amount_to = 56; // int | The source amount to range filter. Filters for sourceAmount ⇐ sourceAmountTo
$payment_amount_from = 56; // int | The payment amount from range filter. Filters for paymentAmount >= paymentAmountFrom
$payment_amount_to = 56; // int | The payment amount to range filter. Filters for paymentAmount ⇐ paymentAmountTo
$submitted_date_from = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | The submitted date from range filter. Format is yyyy-MM-dd.
$submitted_date_to = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | The submitted date to range filter. Format is yyyy-MM-dd.
$transmission_type = 'transmission_type_example'; // string | Transmission Type * ACH * SAME_DAY_ACH * WIRE
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | The number of results to return in a page
$sort = 'sort_example'; // string | List of sort fields (e.g. ?sort=submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status
$sensitive = True; // bool | Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values.

try {
    $result = $apiInstance->getPaymentsForPayoutV4($payout_id, $remote_id, $remote_system_id, $status, $source_amount_from, $source_amount_to, $payment_amount_from, $payment_amount_to, $submitted_date_from, $submitted_date_to, $transmission_type, $page, $page_size, $sort, $sensitive);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentAuditServiceApi->getPaymentsForPayoutV4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payout_id** | [**string**](../Model/.md)| The id (UUID) of the payout. |
 **remote_id** | **string**| The remote id of the payees. | [optional]
 **remote_system_id** | **string**| The id of the remote system that is orchestrating payments | [optional]
 **status** | **string**| Payment Status | [optional]
 **source_amount_from** | **int**| The source amount from range filter. Filters for sourceAmount &gt;&#x3D; sourceAmountFrom | [optional]
 **source_amount_to** | **int**| The source amount to range filter. Filters for sourceAmount ⇐ sourceAmountTo | [optional]
 **payment_amount_from** | **int**| The payment amount from range filter. Filters for paymentAmount &gt;&#x3D; paymentAmountFrom | [optional]
 **payment_amount_to** | **int**| The payment amount to range filter. Filters for paymentAmount ⇐ paymentAmountTo | [optional]
 **submitted_date_from** | **\DateTime**| The submitted date from range filter. Format is yyyy-MM-dd. | [optional]
 **submitted_date_to** | **\DateTime**| The submitted date to range filter. Format is yyyy-MM-dd. | [optional]
 **transmission_type** | **string**| Transmission Type * ACH * SAME_DAY_ACH * WIRE | [optional]
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| The number of results to return in a page | [optional] [default to 25]
 **sort** | **string**| List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status | [optional]
 **sensitive** | **bool**| Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. | [optional]

### Return type

[**\VeloPayments\Client\Model\GetPaymentsForPayoutResponseV4**](../Model/GetPaymentsForPayoutResponseV4.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPayoutStatsV4()`

```php
getPayoutStatsV4($payor_id): \VeloPayments\Client\Model\GetPayoutStatistics
```

Get Payout Statistics

<p>Get payout statistics for a payor.</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PaymentAuditServiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The account owner Payor ID. Required for external users.

try {
    $result = $apiInstance->getPayoutStatsV4($payor_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentAuditServiceApi->getPayoutStatsV4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID. Required for external users. | [optional]

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

## `getPayoutsForPayorV4()`

```php
getPayoutsForPayorV4($payor_id, $payout_memo, $status, $submitted_date_from, $submitted_date_to, $from_payor_name, $page, $page_size, $sort): \VeloPayments\Client\Model\GetPayoutsResponse
```

Get Payouts for Payor

Get List of payouts for payor

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PaymentAuditServiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The id (UUID) of the payor funding the payout or the payor whose payees are being paid.
$payout_memo = 'payout_memo_example'; // string | Payout Memo filter - case insensitive sub-string match
$status = 'status_example'; // string | Payout Status
$submitted_date_from = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | The submitted date from range filter. Format is yyyy-MM-dd.
$submitted_date_to = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | The submitted date to range filter. Format is yyyy-MM-dd.
$from_payor_name = 'from_payor_name_example'; // string | The name of the payor whose payees are being paid. This filters via a case insensitive substring match.
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | The number of results to return in a page
$sort = 'sort_example'; // string | List of sort fields (e.g. ?sort=submittedDateTime:asc,instructedDateTime:asc,status:asc) Default is submittedDateTime:asc The supported sort fields are: submittedDateTime, instructedDateTime, status, totalPayments, payoutId

try {
    $result = $apiInstance->getPayoutsForPayorV4($payor_id, $payout_memo, $status, $submitted_date_from, $submitted_date_to, $from_payor_name, $page, $page_size, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentAuditServiceApi->getPayoutsForPayorV4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The id (UUID) of the payor funding the payout or the payor whose payees are being paid. | [optional]
 **payout_memo** | **string**| Payout Memo filter - case insensitive sub-string match | [optional]
 **status** | **string**| Payout Status | [optional]
 **submitted_date_from** | **\DateTime**| The submitted date from range filter. Format is yyyy-MM-dd. | [optional]
 **submitted_date_to** | **\DateTime**| The submitted date to range filter. Format is yyyy-MM-dd. | [optional]
 **from_payor_name** | **string**| The name of the payor whose payees are being paid. This filters via a case insensitive substring match. | [optional]
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| The number of results to return in a page | [optional] [default to 25]
 **sort** | **string**| List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,instructedDateTime:asc,status:asc) Default is submittedDateTime:asc The supported sort fields are: submittedDateTime, instructedDateTime, status, totalPayments, payoutId | [optional]

### Return type

[**\VeloPayments\Client\Model\GetPayoutsResponse**](../Model/GetPayoutsResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listPaymentChangesV4()`

```php
listPaymentChangesV4($payor_id, $updated_since, $page, $page_size): \VeloPayments\Client\Model\PaymentDeltaResponse
```

List Payment Changes

Get a paginated response listing payment changes.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PaymentAuditServiceApi(
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
    $result = $apiInstance->listPaymentChangesV4($payor_id, $updated_since, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentAuditServiceApi->listPaymentChangesV4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The Payor ID to find associated Payments |
 **updated_since** | **\DateTime**| The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm |
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| The number of results to return in a page | [optional] [default to 100]

### Return type

[**\VeloPayments\Client\Model\PaymentDeltaResponse**](../Model/PaymentDeltaResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listPaymentsAuditV4()`

```php
listPaymentsAuditV4($payee_id, $payor_id, $payor_name, $remote_id, $remote_system_id, $status, $transmission_type, $source_account_name, $source_amount_from, $source_amount_to, $source_currency, $payment_amount_from, $payment_amount_to, $payment_currency, $submitted_date_from, $submitted_date_to, $payment_memo, $page, $page_size, $sort, $sensitive): \VeloPayments\Client\Model\ListPaymentsResponseV4
```

Get List of Payments

Get payments for the given payor Id

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PaymentAuditServiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payee_id = 'payee_id_example'; // string | The UUID of the payee.
$payor_id = 'payor_id_example'; // string | The account owner Payor Id. Required for external users.
$payor_name = 'payor_name_example'; // string | The payor’s name. This filters via a case insensitive substring match.
$remote_id = 'remote_id_example'; // string | The remote id of the payees.
$remote_system_id = 'remote_system_id_example'; // string | The id of the remote system that is orchestrating payments
$status = 'status_example'; // string | Payment Status
$transmission_type = 'transmission_type_example'; // string | Transmission Type * ACH * SAME_DAY_ACH * WIRE
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
$sort = 'sort_example'; // string | List of sort fields (e.g. ?sort=submittedDateTime:asc,status:asc). Default is sort by submittedDateTime:desc,paymentId:asc The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime, status and paymentId
$sensitive = True; // bool | Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values.

try {
    $result = $apiInstance->listPaymentsAuditV4($payee_id, $payor_id, $payor_name, $remote_id, $remote_system_id, $status, $transmission_type, $source_account_name, $source_amount_from, $source_amount_to, $source_currency, $payment_amount_from, $payment_amount_to, $payment_currency, $submitted_date_from, $submitted_date_to, $payment_memo, $page, $page_size, $sort, $sensitive);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentAuditServiceApi->listPaymentsAuditV4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payee_id** | [**string**](../Model/.md)| The UUID of the payee. | [optional]
 **payor_id** | [**string**](../Model/.md)| The account owner Payor Id. Required for external users. | [optional]
 **payor_name** | **string**| The payor’s name. This filters via a case insensitive substring match. | [optional]
 **remote_id** | **string**| The remote id of the payees. | [optional]
 **remote_system_id** | **string**| The id of the remote system that is orchestrating payments | [optional]
 **status** | **string**| Payment Status | [optional]
 **transmission_type** | **string**| Transmission Type * ACH * SAME_DAY_ACH * WIRE | [optional]
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
 **sort** | **string**| List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by submittedDateTime:desc,paymentId:asc The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime, status and paymentId | [optional]
 **sensitive** | **bool**| Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. | [optional]

### Return type

[**\VeloPayments\Client\Model\ListPaymentsResponseV4**](../Model/ListPaymentsResponseV4.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
