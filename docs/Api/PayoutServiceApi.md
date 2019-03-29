# OpenAPI\Client\PayoutServiceApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**submitPayout**](PayoutServiceApi.md#submitPayout) | **POST** /v3/payouts | Submit Payout
[**v3PayoutsPayoutIdDelete**](PayoutServiceApi.md#v3PayoutsPayoutIdDelete) | **DELETE** /v3/payouts/{payoutId} | Withdraw Payout
[**v3PayoutsPayoutIdGet**](PayoutServiceApi.md#v3PayoutsPayoutIdGet) | **GET** /v3/payouts/{payoutId} | Get Payout Summary
[**v3PayoutsPayoutIdPost**](PayoutServiceApi.md#v3PayoutsPayoutIdPost) | **POST** /v3/payouts/{payoutId} | Instruct Payout
[**v3PayoutsPayoutIdQuotePost**](PayoutServiceApi.md#v3PayoutsPayoutIdQuotePost) | **POST** /v3/payouts/{payoutId}/quote | Create a quote for the payout


# **submitPayout**
> submitPayout($create_payout_request)

Submit Payout

Create a new payout and return a location header with a link to get the payout. Basic validation of the payout is performed before returning but more comprehensive validation is done asynchronously, the results of which can be obtained by issuing a HTTP GET to the URL returned in the location header. **NOTE:** amount values in payments must be in 'minor units' format. E.g. cents for USD, pence for GBP etc.  with no decimal places.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\PayoutServiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_payout_request = new \OpenAPI\Client\Model\CreatePayoutRequest(); // \OpenAPI\Client\Model\CreatePayoutRequest | Post ammount to transfer via ACH using stored funding account details.

try {
    $apiInstance->submitPayout($create_payout_request);
} catch (Exception $e) {
    echo 'Exception when calling PayoutServiceApi->submitPayout: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **create_payout_request** | [**\OpenAPI\Client\Model\CreatePayoutRequest**](../Model/CreatePayoutRequest.md)| Post ammount to transfer via ACH using stored funding account details. |

### Return type

void (empty response body)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

 - **Content-Type**: application/json, multipart/formdata
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **v3PayoutsPayoutIdDelete**
> v3PayoutsPayoutIdDelete($payout_id)

Withdraw Payout

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\PayoutServiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payout_id = 'payout_id_example'; // string | Id of the payout

try {
    $apiInstance->v3PayoutsPayoutIdDelete($payout_id);
} catch (Exception $e) {
    echo 'Exception when calling PayoutServiceApi->v3PayoutsPayoutIdDelete: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payout_id** | [**string**](../Model/.md)| Id of the payout |

### Return type

void (empty response body)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **v3PayoutsPayoutIdGet**
> \OpenAPI\Client\Model\PayoutSummaryResponse v3PayoutsPayoutIdGet($payout_id)

Get Payout Summary

Get payout summary - returns the current state of the payout.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\PayoutServiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payout_id = 'payout_id_example'; // string | Id of the payout

try {
    $result = $apiInstance->v3PayoutsPayoutIdGet($payout_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayoutServiceApi->v3PayoutsPayoutIdGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payout_id** | [**string**](../Model/.md)| Id of the payout |

### Return type

[**\OpenAPI\Client\Model\PayoutSummaryResponse**](../Model/PayoutSummaryResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **v3PayoutsPayoutIdPost**
> v3PayoutsPayoutIdPost($payout_id)

Instruct Payout

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\PayoutServiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payout_id = 'payout_id_example'; // string | Id of the payout

try {
    $apiInstance->v3PayoutsPayoutIdPost($payout_id);
} catch (Exception $e) {
    echo 'Exception when calling PayoutServiceApi->v3PayoutsPayoutIdPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payout_id** | [**string**](../Model/.md)| Id of the payout |

### Return type

void (empty response body)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **v3PayoutsPayoutIdQuotePost**
> \OpenAPI\Client\Model\QuoteResponse v3PayoutsPayoutIdQuotePost($payout_id)

Create a quote for the payout

Create quote for a payout

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\PayoutServiceApi(
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
    echo 'Exception when calling PayoutServiceApi->v3PayoutsPayoutIdQuotePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payout_id** | [**string**](../Model/.md)| Id of the payout |

### Return type

[**\OpenAPI\Client\Model\QuoteResponse**](../Model/QuoteResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

