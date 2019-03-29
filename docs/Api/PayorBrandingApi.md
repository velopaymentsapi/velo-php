# OpenAPI\Client\PayorBrandingApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**payorAddPayorLogo**](PayorBrandingApi.md#payorAddPayorLogo) | **POST** /v1/payors/{payorId}/branding/logos | Add Logo
[**payorGetBranding**](PayorBrandingApi.md#payorGetBranding) | **POST** /v1/payors/{payorId}/branding | Get Branding


# **payorAddPayorLogo**
> payorAddPayorLogo($payor_id, $logo)

Add Logo

Add Payor Logo

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\PayorBrandingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The account owner Payor ID
$logo = "/path/to/file.txt"; // \SplFileObject | 

try {
    $apiInstance->payorAddPayorLogo($payor_id, $logo);
} catch (Exception $e) {
    echo 'Exception when calling PayorBrandingApi->payorAddPayorLogo: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID |
 **logo** | **\SplFileObject****\SplFileObject**|  | [optional]

### Return type

void (empty response body)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **payorGetBranding**
> \OpenAPI\Client\Model\InlineResponse2001 payorGetBranding($payor_id)

Get Branding

Get the payor branding details.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\PayorBrandingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The account owner Payor ID

try {
    $result = $apiInstance->payorGetBranding($payor_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayorBrandingApi->payorGetBranding: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID |

### Return type

[**\OpenAPI\Client\Model\InlineResponse2001**](../Model/InlineResponse2001.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

