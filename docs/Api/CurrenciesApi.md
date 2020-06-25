# VeloPayments\Client\CurrenciesApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**listSupportedCurrenciesV2**](CurrenciesApi.md#listSupportedCurrenciesV2) | **GET** /v2/currencies | List Supported Currencies



## listSupportedCurrenciesV2

> \VeloPayments\Client\Model\SupportedCurrencyResponseV2 listSupportedCurrenciesV2()

List Supported Currencies

List the supported currencies.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new VeloPayments\Client\Api\CurrenciesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->listSupportedCurrenciesV2();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CurrenciesApi->listSupportedCurrenciesV2: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\VeloPayments\Client\Model\SupportedCurrencyResponseV2**](../Model/SupportedCurrencyResponseV2.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)

