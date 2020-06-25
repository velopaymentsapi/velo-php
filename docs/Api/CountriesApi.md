# VeloPayments\Client\CountriesApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**listPaymentChannelRulesV1**](CountriesApi.md#listPaymentChannelRulesV1) | **GET** /v1/paymentChannelRules | List Payment Channel Country Rules
[**listSupportedCountriesV1**](CountriesApi.md#listSupportedCountriesV1) | **GET** /v1/supportedCountries | List Supported Countries
[**listSupportedCountriesV2**](CountriesApi.md#listSupportedCountriesV2) | **GET** /v2/supportedCountries | List Supported Countries



## listPaymentChannelRulesV1

> \VeloPayments\Client\Model\PaymentChannelRulesResponse listPaymentChannelRulesV1()

List Payment Channel Country Rules

List the country specific payment channel rules.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\CountriesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listPaymentChannelRulesV1();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CountriesApi->listPaymentChannelRulesV1: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\VeloPayments\Client\Model\PaymentChannelRulesResponse**](../Model/PaymentChannelRulesResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## listSupportedCountriesV1

> \VeloPayments\Client\Model\SupportedCountriesResponse listSupportedCountriesV1()

List Supported Countries

<p>List the supported countries.</p> <p>This version will be retired in March 2020. Use /v2/supportedCountries</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new VeloPayments\Client\Api\CountriesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->listSupportedCountriesV1();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CountriesApi->listSupportedCountriesV1: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\VeloPayments\Client\Model\SupportedCountriesResponse**](../Model/SupportedCountriesResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## listSupportedCountriesV2

> \VeloPayments\Client\Model\SupportedCountriesResponseV2 listSupportedCountriesV2()

List Supported Countries

List the supported countries.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new VeloPayments\Client\Api\CountriesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->listSupportedCountriesV2();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CountriesApi->listSupportedCountriesV2: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\VeloPayments\Client\Model\SupportedCountriesResponseV2**](../Model/SupportedCountriesResponseV2.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)

