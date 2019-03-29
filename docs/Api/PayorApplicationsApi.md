# OpenAPI\Client\PayorApplicationsApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**payorCreateApiKeyRequest**](PayorApplicationsApi.md#payorCreateApiKeyRequest) | **POST** /v1/payors/{payorId}/applications/{applicationId}/keys | Create API Key
[**payorCreateApplicationRequest**](PayorApplicationsApi.md#payorCreateApplicationRequest) | **POST** /v1/payors/{payorId}/applications | Create Application


# **payorCreateApiKeyRequest**
> \OpenAPI\Client\Model\InlineResponse200 payorCreateApiKeyRequest($payor_id, $application_id, $payor_create_api_key_request)

Create API Key

Create an an API key for the given payor Id and application Id

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\PayorApplicationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The account owner Payor ID
$application_id = 'application_id_example'; // string | Application ID
$payor_create_api_key_request = new \OpenAPI\Client\Model\PayorCreateApiKeyRequest(); // \OpenAPI\Client\Model\PayorCreateApiKeyRequest | Details of application API key to create

try {
    $result = $apiInstance->payorCreateApiKeyRequest($payor_id, $application_id, $payor_create_api_key_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayorApplicationsApi->payorCreateApiKeyRequest: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID |
 **application_id** | [**string**](../Model/.md)| Application ID |
 **payor_create_api_key_request** | [**\OpenAPI\Client\Model\PayorCreateApiKeyRequest**](../Model/PayorCreateApiKeyRequest.md)| Details of application API key to create |

### Return type

[**\OpenAPI\Client\Model\InlineResponse200**](../Model/InlineResponse200.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **payorCreateApplicationRequest**
> payorCreateApplicationRequest($payor_id, $payor_create_application_request)

Create Application

Create an application for the given Payor ID

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\PayorApplicationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The account owner Payor ID
$payor_create_application_request = new \OpenAPI\Client\Model\PayorCreateApplicationRequest(); // \OpenAPI\Client\Model\PayorCreateApplicationRequest | Details of application to create

try {
    $apiInstance->payorCreateApplicationRequest($payor_id, $payor_create_application_request);
} catch (Exception $e) {
    echo 'Exception when calling PayorApplicationsApi->payorCreateApplicationRequest: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID |
 **payor_create_application_request** | [**\OpenAPI\Client\Model\PayorCreateApplicationRequest**](../Model/PayorCreateApplicationRequest.md)| Details of application to create |

### Return type

void (empty response body)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

