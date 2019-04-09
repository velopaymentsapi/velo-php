# VeloPayments\Client\PayoutHistoryApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getPaymentsForPayout**](PayoutHistoryApi.md#getPaymentsForPayout) | **GET** /v3/paymentaudit/payouts/{payoutId} | Get Payments for Payout
[**getPayoutStats**](PayoutHistoryApi.md#getPayoutStats) | **GET** /v1/paymentaudit/payoutStatistics | Get Payout Statistics



## getPaymentsForPayout

> \VeloPayments\Client\Model\GetPaymentsForPayoutResponse getPaymentsForPayout($payout_id, $remote_id, $status, $source_amount_from, $source_amount_to, $payment_amount_from, $payment_amount_to, $submitted_date_from, $submitted_date_to, $page, $page_size, $sort, $sensitive)

Get Payments for Payout

Get List of payments for Payout

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayoutHistoryApi(
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
    echo 'Exception when calling PayoutHistoryApi->getPaymentsForPayout: ', $e->getMessage(), PHP_EOL;
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

[**\VeloPayments\Client\Model\GetPaymentsForPayoutResponse**](../Model/GetPaymentsForPayoutResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getPayoutStats

> \VeloPayments\Client\Model\GetPayoutStatistics getPayoutStats($payor_id)

Get Payout Statistics

Get payout statistics for a payor.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayoutHistoryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The account owner Payor ID. Required for external users.

try {
    $result = $apiInstance->getPayoutStats($payor_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayoutHistoryApi->getPayoutStats: ', $e->getMessage(), PHP_EOL;
}
?>
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
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)

