# VeloPayments\Client\PayorsPrivateApi

All URIs are relative to https://api.sandbox.velopayments.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**createPayorLinks()**](PayorsPrivateApi.md#createPayorLinks) | **POST** /v1/payorLinks | Create a Payor Link


## `createPayorLinks()`

```php
createPayorLinks($create_payor_link_request)
```

Create a Payor Link

This endpoint allows you to create a payor link.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuthVeloBackOffice
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayorsPrivateApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_payor_link_request = new \VeloPayments\Client\Model\CreatePayorLinkRequest(); // \VeloPayments\Client\Model\CreatePayorLinkRequest | Request to create a payor link

try {
    $apiInstance->createPayorLinks($create_payor_link_request);
} catch (Exception $e) {
    echo 'Exception when calling PayorsPrivateApi->createPayorLinks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **create_payor_link_request** | [**\VeloPayments\Client\Model\CreatePayorLinkRequest**](../Model/CreatePayorLinkRequest.md)| Request to create a payor link |

### Return type

void (empty response body)

### Authorization

[oAuthVeloBackOffice](../../README.md#oAuthVeloBackOffice)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
