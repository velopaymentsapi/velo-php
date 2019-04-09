# VeloPayments\Client\CountriesApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**listSupportedCountries**](CountriesApi.md#listSupportedCountries) | **GET** /v1/supportedCountries | List Supported Countries
[**v1PaymentChannelRulesGet**](CountriesApi.md#v1PaymentChannelRulesGet) | **GET** /v1/paymentChannelRules | List Payment Channel Country Rules



## listSupportedCountries

> \VeloPayments\Client\Model\SupportedCountriesResponse listSupportedCountries()

List Supported Countries

List the supported countries.

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
    $result = $apiInstance->listSupportedCountries();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CountriesApi->listSupportedCountries: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\VeloPayments\Client\Model\SupportedCountriesResponse**](../Model/SupportedCountriesResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## v1PaymentChannelRulesGet

> \VeloPayments\Client\Model\PaymentChannelRulesResponse v1PaymentChannelRulesGet()

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
    $result = $apiInstance->v1PaymentChannelRulesGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CountriesApi->v1PaymentChannelRulesGet: ', $e->getMessage(), PHP_EOL;
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

