# VeloPayments\Client\SubmitPayoutApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**submitPayout**](SubmitPayoutApi.md#submitPayout) | **POST** /v3/payouts | Submit Payout



## submitPayout

> submitPayout($create_payout_request)

Submit Payout

Create a new payout and return a location header with a link to get the payout. Basic validation of the payout is performed before returning but more comprehensive validation is done asynchronously, the results of which can be obtained by issuing a HTTP GET to the URL returned in the location header. **NOTE:** amount values in payments must be in 'minor units' format. E.g. cents for USD, pence for GBP etc.  with no decimal places.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\SubmitPayoutApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_payout_request = new \VeloPayments\Client\Model\CreatePayoutRequest(); // \VeloPayments\Client\Model\CreatePayoutRequest | Post ammount to transfer via ACH using stored funding account details.

try {
    $apiInstance->submitPayout($create_payout_request);
} catch (Exception $e) {
    echo 'Exception when calling SubmitPayoutApi->submitPayout: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **create_payout_request** | [**\VeloPayments\Client\Model\CreatePayoutRequest**](../Model/CreatePayoutRequest.md)| Post ammount to transfer via ACH using stored funding account details. |

### Return type

void (empty response body)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: application/json, multipart/form-data
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)

