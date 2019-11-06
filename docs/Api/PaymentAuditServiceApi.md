# VeloPayments\Client\PaymentAuditServiceApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**exportTransactionsCSV**](PaymentAuditServiceApi.md#exportTransactionsCSV) | **GET** /v4/paymentaudit/transactions | Export Transactions
[**getFundings**](PaymentAuditServiceApi.md#getFundings) | **GET** /v1/paymentaudit/fundings | Get Fundings for Payor
[**getPaymentDetails**](PaymentAuditServiceApi.md#getPaymentDetails) | **GET** /v3/paymentaudit/payments/{paymentId} | Get Payment
[**getPaymentDetailsV4**](PaymentAuditServiceApi.md#getPaymentDetailsV4) | **GET** /v4/paymentaudit/payments/{paymentId} | Get Payment
[**getPaymentsForPayout**](PaymentAuditServiceApi.md#getPaymentsForPayout) | **GET** /v3/paymentaudit/payouts/{payoutId} | Get Payments for Payout
[**getPaymentsForPayoutV4**](PaymentAuditServiceApi.md#getPaymentsForPayoutV4) | **GET** /v4/paymentaudit/payouts/{payoutId} | Get Payments for Payout
[**getPayoutsForPayor**](PaymentAuditServiceApi.md#getPayoutsForPayor) | **GET** /v3/paymentaudit/payouts | Get Payouts for Payor
[**getPayoutsForPayorV4**](PaymentAuditServiceApi.md#getPayoutsForPayorV4) | **GET** /v4/paymentaudit/payouts | Get Payouts for Payor
[**listPaymentChanges**](PaymentAuditServiceApi.md#listPaymentChanges) | **GET** /v1/deltas/payments | List Payment Changes
[**listPaymentsAudit**](PaymentAuditServiceApi.md#listPaymentsAudit) | **GET** /v3/paymentaudit/payments | Get List of Payments
[**listPaymentsAuditV4**](PaymentAuditServiceApi.md#listPaymentsAuditV4) | **GET** /v4/paymentaudit/payments | Get List of Payments



## exportTransactionsCSV

> string exportTransactionsCSV($payor_id, $start_date, $submitted_date_from, $include)

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
$payor_id = 'payor_id_example'; // string | The Payor ID for whom you wish to run the report. For a Payor requesting the report, this could be their exact Payor, or it could be a child/descendant Payor.
$start_date = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | Start date, inclusive. Format is YYYY-MM-DD
$submitted_date_from = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | Start date, inclusive. Format is YYYY-MM-DD
$include = 'include_example'; // string | Mode to determine whether to include other Payor's data in the results. May only be used if payorId is specified. Can be omitted or set to 'payorOnly' or 'payorAndDescendants'. payorOnly: Only include results for the specified Payor. This is the default if 'include' is omitted. payorAndDescendants: Aggregate results for all descendant Payors of the specified Payor. Should only be used if the Payor with the specified payorId has at least one child Payor.                      Note when a Payor requests the report and include=payorAndDescendants is used, the following additional columns are included in the CSV: Payor Name, Payor Id

try {
    $result = $apiInstance->exportTransactionsCSV($payor_id, $start_date, $submitted_date_from, $include);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentAuditServiceApi->exportTransactionsCSV: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The Payor ID for whom you wish to run the report. For a Payor requesting the report, this could be their exact Payor, or it could be a child/descendant Payor. | [optional]
 **start_date** | **\DateTime**| Start date, inclusive. Format is YYYY-MM-DD | [optional]
 **submitted_date_from** | **\DateTime**| Start date, inclusive. Format is YYYY-MM-DD | [optional]
 **include** | **string**| Mode to determine whether to include other Payor&#39;s data in the results. May only be used if payorId is specified. Can be omitted or set to &#39;payorOnly&#39; or &#39;payorAndDescendants&#39;. payorOnly: Only include results for the specified Payor. This is the default if &#39;include&#39; is omitted. payorAndDescendants: Aggregate results for all descendant Payors of the specified Payor. Should only be used if the Payor with the specified payorId has at least one child Payor.                      Note when a Payor requests the report and include&#x3D;payorAndDescendants is used, the following additional columns are included in the CSV: Payor Name, Payor Id | [optional]

### Return type

**string**

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/csv

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


$apiInstance = new VeloPayments\Client\Api\PaymentAuditServiceApi(
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
    echo 'Exception when calling PaymentAuditServiceApi->getFundings: ', $e->getMessage(), PHP_EOL;
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


## getPaymentDetails

> \VeloPayments\Client\Model\PaymentResponseV3 getPaymentDetails($payment_id, $sensitive)

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
    $result = $apiInstance->getPaymentDetails($payment_id, $sensitive);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentAuditServiceApi->getPaymentDetails: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payment_id** | [**string**](../Model/.md)| Payment Id |
 **sensitive** | **bool**| Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. | [optional]

### Return type

[**\VeloPayments\Client\Model\PaymentResponseV3**](../Model/PaymentResponseV3.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getPaymentDetailsV4

> \VeloPayments\Client\Model\PaymentResponseV4 getPaymentDetailsV4($payment_id, $sensitive)

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
?>
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
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getPaymentsForPayout

> \VeloPayments\Client\Model\GetPaymentsForPayoutResponseV3 getPaymentsForPayout($payout_id, $remote_id, $status, $source_amount_from, $source_amount_to, $payment_amount_from, $payment_amount_to, $submitted_date_from, $submitted_date_to, $page, $page_size, $sort, $sensitive)

Get Payments for Payout

Get List of payments for Payout

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
$status = 'status_example'; // string | Payment Status
$source_amount_from = 56; // int | The source amount from range filter. Filters for sourceAmount >= sourceAmountFrom
$source_amount_to = 56; // int | The source amount to range filter. Filters for sourceAmount ⇐ sourceAmountTo
$payment_amount_from = 56; // int | The payment amount from range filter. Filters for paymentAmount >= paymentAmountFrom
$payment_amount_to = 56; // int | The payment amount to range filter. Filters for paymentAmount ⇐ paymentAmountTo
$submitted_date_from = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | The submitted date from range filter. Format is yyyy-MM-dd.
$submitted_date_to = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | The submitted date to range filter. Format is yyyy-MM-dd.
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | Page size. Default is 25. Max allowable is 100.
$sort = 'sort_example'; // string | List of sort fields (e.g. ?sort=submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status
$sensitive = True; // bool | Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values.

try {
    $result = $apiInstance->getPaymentsForPayout($payout_id, $remote_id, $status, $source_amount_from, $source_amount_to, $payment_amount_from, $payment_amount_to, $submitted_date_from, $submitted_date_to, $page, $page_size, $sort, $sensitive);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentAuditServiceApi->getPaymentsForPayout: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payout_id** | [**string**](../Model/.md)| The id (UUID) of the payout. |
 **remote_id** | **string**| The remote id of the payees. | [optional]
 **status** | **string**| Payment Status | [optional]
 **source_amount_from** | **int**| The source amount from range filter. Filters for sourceAmount &gt;&#x3D; sourceAmountFrom | [optional]
 **source_amount_to** | **int**| The source amount to range filter. Filters for sourceAmount ⇐ sourceAmountTo | [optional]
 **payment_amount_from** | **int**| The payment amount from range filter. Filters for paymentAmount &gt;&#x3D; paymentAmountFrom | [optional]
 **payment_amount_to** | **int**| The payment amount to range filter. Filters for paymentAmount ⇐ paymentAmountTo | [optional]
 **submitted_date_from** | **\DateTime**| The submitted date from range filter. Format is yyyy-MM-dd. | [optional]
 **submitted_date_to** | **\DateTime**| The submitted date to range filter. Format is yyyy-MM-dd. | [optional]
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| Page size. Default is 25. Max allowable is 100. | [optional] [default to 25]
 **sort** | **string**| List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status | [optional]
 **sensitive** | **bool**| Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. | [optional]

### Return type

[**\VeloPayments\Client\Model\GetPaymentsForPayoutResponseV3**](../Model/GetPaymentsForPayoutResponseV3.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getPaymentsForPayoutV4

> \VeloPayments\Client\Model\GetPaymentsForPayoutResponseV4 getPaymentsForPayoutV4($payout_id, $remote_id, $status, $source_amount_from, $source_amount_to, $payment_amount_from, $payment_amount_to, $submitted_date_from, $submitted_date_to, $page, $page_size, $sort, $sensitive)

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
$status = 'status_example'; // string | Payment Status
$source_amount_from = 56; // int | The source amount from range filter. Filters for sourceAmount >= sourceAmountFrom
$source_amount_to = 56; // int | The source amount to range filter. Filters for sourceAmount ⇐ sourceAmountTo
$payment_amount_from = 56; // int | The payment amount from range filter. Filters for paymentAmount >= paymentAmountFrom
$payment_amount_to = 56; // int | The payment amount to range filter. Filters for paymentAmount ⇐ paymentAmountTo
$submitted_date_from = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | The submitted date from range filter. Format is yyyy-MM-dd.
$submitted_date_to = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | The submitted date to range filter. Format is yyyy-MM-dd.
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | Page size. Default is 25. Max allowable is 100.
$sort = 'sort_example'; // string | List of sort fields (e.g. ?sort=submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status
$sensitive = True; // bool | Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values.

try {
    $result = $apiInstance->getPaymentsForPayoutV4($payout_id, $remote_id, $status, $source_amount_from, $source_amount_to, $payment_amount_from, $payment_amount_to, $submitted_date_from, $submitted_date_to, $page, $page_size, $sort, $sensitive);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentAuditServiceApi->getPaymentsForPayoutV4: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payout_id** | [**string**](../Model/.md)| The id (UUID) of the payout. |
 **remote_id** | **string**| The remote id of the payees. | [optional]
 **status** | **string**| Payment Status | [optional]
 **source_amount_from** | **int**| The source amount from range filter. Filters for sourceAmount &gt;&#x3D; sourceAmountFrom | [optional]
 **source_amount_to** | **int**| The source amount to range filter. Filters for sourceAmount ⇐ sourceAmountTo | [optional]
 **payment_amount_from** | **int**| The payment amount from range filter. Filters for paymentAmount &gt;&#x3D; paymentAmountFrom | [optional]
 **payment_amount_to** | **int**| The payment amount to range filter. Filters for paymentAmount ⇐ paymentAmountTo | [optional]
 **submitted_date_from** | **\DateTime**| The submitted date from range filter. Format is yyyy-MM-dd. | [optional]
 **submitted_date_to** | **\DateTime**| The submitted date to range filter. Format is yyyy-MM-dd. | [optional]
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| Page size. Default is 25. Max allowable is 100. | [optional] [default to 25]
 **sort** | **string**| List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status | [optional]
 **sensitive** | **bool**| Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. | [optional]

### Return type

[**\VeloPayments\Client\Model\GetPaymentsForPayoutResponseV4**](../Model/GetPaymentsForPayoutResponseV4.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getPayoutsForPayor

> \VeloPayments\Client\Model\GetPayoutsResponseV3 getPayoutsForPayor($payor_id, $payout_memo, $status, $submitted_date_from, $submitted_date_to, $page, $page_size, $sort)

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
$payor_id = 'payor_id_example'; // string | The account owner Payor ID
$payout_memo = 'payout_memo_example'; // string | Payout Memo filter - case insensitive sub-string match
$status = 'status_example'; // string | Payout Status
$submitted_date_from = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | The submitted date from range filter. Format is yyyy-MM-dd.
$submitted_date_to = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | The submitted date to range filter. Format is yyyy-MM-dd.
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | Page size. Default is 25. Max allowable is 100.
$sort = 'sort_example'; // string | List of sort fields (e.g. ?sort=submittedDateTime:asc,instructedDateTime:asc,status:asc) Default is submittedDateTime:asc The supported sort fields are: submittedDateTime, instructedDateTime, status.

try {
    $result = $apiInstance->getPayoutsForPayor($payor_id, $payout_memo, $status, $submitted_date_from, $submitted_date_to, $page, $page_size, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentAuditServiceApi->getPayoutsForPayor: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID |
 **payout_memo** | **string**| Payout Memo filter - case insensitive sub-string match | [optional]
 **status** | **string**| Payout Status | [optional]
 **submitted_date_from** | **\DateTime**| The submitted date from range filter. Format is yyyy-MM-dd. | [optional]
 **submitted_date_to** | **\DateTime**| The submitted date to range filter. Format is yyyy-MM-dd. | [optional]
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| Page size. Default is 25. Max allowable is 100. | [optional] [default to 25]
 **sort** | **string**| List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,instructedDateTime:asc,status:asc) Default is submittedDateTime:asc The supported sort fields are: submittedDateTime, instructedDateTime, status. | [optional]

### Return type

[**\VeloPayments\Client\Model\GetPayoutsResponseV3**](../Model/GetPayoutsResponseV3.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getPayoutsForPayorV4

> \VeloPayments\Client\Model\GetPayoutsResponseV4 getPayoutsForPayorV4($payor_id, $payout_memo, $status, $submitted_date_from, $submitted_date_to, $page, $page_size, $sort)

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
$payor_id = 'payor_id_example'; // string | The account owner Payor ID
$payout_memo = 'payout_memo_example'; // string | Payout Memo filter - case insensitive sub-string match
$status = 'status_example'; // string | Payout Status
$submitted_date_from = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | The submitted date from range filter. Format is yyyy-MM-dd.
$submitted_date_to = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | The submitted date to range filter. Format is yyyy-MM-dd.
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | Page size. Default is 25. Max allowable is 100.
$sort = 'sort_example'; // string | List of sort fields (e.g. ?sort=submittedDateTime:asc,instructedDateTime:asc,status:asc) Default is submittedDateTime:asc The supported sort fields are: submittedDateTime, instructedDateTime, status.

try {
    $result = $apiInstance->getPayoutsForPayorV4($payor_id, $payout_memo, $status, $submitted_date_from, $submitted_date_to, $page, $page_size, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentAuditServiceApi->getPayoutsForPayorV4: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID |
 **payout_memo** | **string**| Payout Memo filter - case insensitive sub-string match | [optional]
 **status** | **string**| Payout Status | [optional]
 **submitted_date_from** | **\DateTime**| The submitted date from range filter. Format is yyyy-MM-dd. | [optional]
 **submitted_date_to** | **\DateTime**| The submitted date to range filter. Format is yyyy-MM-dd. | [optional]
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| Page size. Default is 25. Max allowable is 100. | [optional] [default to 25]
 **sort** | **string**| List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,instructedDateTime:asc,status:asc) Default is submittedDateTime:asc The supported sort fields are: submittedDateTime, instructedDateTime, status. | [optional]

### Return type

[**\VeloPayments\Client\Model\GetPayoutsResponseV4**](../Model/GetPayoutsResponseV4.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## listPaymentChanges

> \VeloPayments\Client\Model\PaymentDeltaResponse listPaymentChanges($payor_id, $updated_since, $page, $page_size)

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
$page_size = 100; // int | Page size. Default is 100. Max allowable is 1000.

try {
    $result = $apiInstance->listPaymentChanges($payor_id, $updated_since, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentAuditServiceApi->listPaymentChanges: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The Payor ID to find associated Payments |
 **updated_since** | **\DateTime**| The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm |
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| Page size. Default is 100. Max allowable is 1000. | [optional] [default to 100]

### Return type

[**\VeloPayments\Client\Model\PaymentDeltaResponse**](../Model/PaymentDeltaResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## listPaymentsAudit

> \VeloPayments\Client\Model\ListPaymentsResponse listPaymentsAudit($payee_id, $payor_id, $payor_name, $remote_id, $status, $source_account_name, $source_amount_from, $source_amount_to, $source_currency, $payment_amount_from, $payment_amount_to, $payment_currency, $submitted_date_from, $submitted_date_to, $payment_memo, $page, $page_size, $sort, $sensitive)

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
$page_size = 25; // int | Page size. Default is 25. Max allowable is 100.
$sort = 'sort_example'; // string | List of sort fields (e.g. ?sort=submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status
$sensitive = True; // bool | Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values.

try {
    $result = $apiInstance->listPaymentsAudit($payee_id, $payor_id, $payor_name, $remote_id, $status, $source_account_name, $source_amount_from, $source_amount_to, $source_currency, $payment_amount_from, $payment_amount_to, $payment_currency, $submitted_date_from, $submitted_date_to, $payment_memo, $page, $page_size, $sort, $sensitive);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentAuditServiceApi->listPaymentsAudit: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payee_id** | [**string**](../Model/.md)| The UUID of the payee. | [optional]
 **payor_id** | [**string**](../Model/.md)| The account owner Payor Id. Required for external users. | [optional]
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
 **page_size** | **int**| Page size. Default is 25. Max allowable is 100. | [optional] [default to 25]
 **sort** | **string**| List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status | [optional]
 **sensitive** | **bool**| Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. | [optional]

### Return type

[**\VeloPayments\Client\Model\ListPaymentsResponse**](../Model/ListPaymentsResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## listPaymentsAuditV4

> \VeloPayments\Client\Model\ListPaymentsResponse listPaymentsAuditV4($payee_id, $payor_id, $payor_name, $remote_id, $status, $source_account_name, $source_amount_from, $source_amount_to, $source_currency, $payment_amount_from, $payment_amount_to, $payment_currency, $submitted_date_from, $submitted_date_to, $payment_memo, $page, $page_size, $sort, $sensitive)

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
$page_size = 25; // int | Page size. Default is 25. Max allowable is 100.
$sort = 'sort_example'; // string | List of sort fields (e.g. ?sort=submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status
$sensitive = True; // bool | Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values.

try {
    $result = $apiInstance->listPaymentsAuditV4($payee_id, $payor_id, $payor_name, $remote_id, $status, $source_account_name, $source_amount_from, $source_amount_to, $source_currency, $payment_amount_from, $payment_amount_to, $payment_currency, $submitted_date_from, $submitted_date_to, $payment_memo, $page, $page_size, $sort, $sensitive);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentAuditServiceApi->listPaymentsAuditV4: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payee_id** | [**string**](../Model/.md)| The UUID of the payee. | [optional]
 **payor_id** | [**string**](../Model/.md)| The account owner Payor Id. Required for external users. | [optional]
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
 **page_size** | **int**| Page size. Default is 25. Max allowable is 100. | [optional] [default to 25]
 **sort** | **string**| List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status | [optional]
 **sensitive** | **bool**| Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. | [optional]

### Return type

[**\VeloPayments\Client\Model\ListPaymentsResponse**](../Model/ListPaymentsResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)

