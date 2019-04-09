# VeloPayments\Client\QuotePayoutApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**v3PayoutsPayoutIdQuotePost**](QuotePayoutApi.md#v3PayoutsPayoutIdQuotePost) | **POST** /v3/payouts/{payoutId}/quote | Create a quote for the payout



## v3PayoutsPayoutIdQuotePost

> \VeloPayments\Client\Model\QuoteResponse v3PayoutsPayoutIdQuotePost($payout_id)

Create a quote for the payout

Create quote for a payout

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\QuotePayoutApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payout_id = 'payout_id_example'; // string | Id of the payout

try {
    $result = $apiInstance->v3PayoutsPayoutIdQuotePost($payout_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuotePayoutApi->v3PayoutsPayoutIdQuotePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payout_id** | [**string**](../Model/.md)| Id of the payout |

### Return type

[**\VeloPayments\Client\Model\QuoteResponse**](../Model/QuoteResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)

