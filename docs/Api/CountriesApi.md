# OpenAPI\Client\CountriesApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**listSupportedCountries**](CountriesApi.md#listSupportedCountries) | **GET** /v1/supportedCountries | List Supported Countries
[**v1PaymentChannelRulesGet**](CountriesApi.md#v1PaymentChannelRulesGet) | **GET** /v1/paymentChannelRules | List Payment Channel Country Rules


# **listSupportedCountries**
> \OpenAPI\Client\Model\InlineResponse2003 listSupportedCountries($payor_create_api_key_request)

List Supported Countries

List the supported countries.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\CountriesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_create_api_key_request = new \OpenAPI\Client\Model\PayorCreateApiKeyRequest(); // \OpenAPI\Client\Model\PayorCreateApiKeyRequest | Details of application API key to create

try {
    $result = $apiInstance->listSupportedCountries($payor_create_api_key_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CountriesApi->listSupportedCountries: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_create_api_key_request** | [**\OpenAPI\Client\Model\PayorCreateApiKeyRequest**](../Model/PayorCreateApiKeyRequest.md)| Details of application API key to create |

### Return type

[**\OpenAPI\Client\Model\InlineResponse2003**](../Model/InlineResponse2003.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **v1PaymentChannelRulesGet**
> \OpenAPI\Client\Model\InlineResponse2002 v1PaymentChannelRulesGet()

List Payment Channel Country Rules

List the country specific payment channel rules.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\CountriesApi(
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

[**\OpenAPI\Client\Model\InlineResponse2002**](../Model/InlineResponse2002.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

