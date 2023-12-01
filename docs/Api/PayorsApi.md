# VeloPayments\Client\PayorsApi

All URIs are relative to https://api.sandbox.velopayments.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getPayorByIdV2()**](PayorsApi.md#getPayorByIdV2) | **GET** /v2/payors/{payorId} | Get Payor |
| [**payorAddPayorLogoV1()**](PayorsApi.md#payorAddPayorLogoV1) | **POST** /v1/payors/{payorId}/branding/logos | Add Logo |
| [**payorCreateApiKeyV1()**](PayorsApi.md#payorCreateApiKeyV1) | **POST** /v1/payors/{payorId}/applications/{applicationId}/keys | Create API Key |
| [**payorCreateApplicationV1()**](PayorsApi.md#payorCreateApplicationV1) | **POST** /v1/payors/{payorId}/applications | Create Application |
| [**payorEmailOptOut()**](PayorsApi.md#payorEmailOptOut) | **POST** /v1/payors/{payorId}/reminderEmailsUpdate | Reminder Email Opt-Out |
| [**payorGetBranding()**](PayorsApi.md#payorGetBranding) | **GET** /v1/payors/{payorId}/branding | Get Branding |


## `getPayorByIdV2()`

```php
getPayorByIdV2($payor_id): \VeloPayments\Client\Model\PayorV2
```

Get Payor

Get a Single Payor by Id.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayorsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The account owner Payor ID

try {
    $result = $apiInstance->getPayorByIdV2($payor_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayorsApi->getPayorByIdV2: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payor_id** | **string**| The account owner Payor ID | |

### Return type

[**\VeloPayments\Client\Model\PayorV2**](../Model/PayorV2.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `payorAddPayorLogoV1()`

```php
payorAddPayorLogoV1($payor_id, $logo)
```

Add Logo

<p>Add Payor Logo</p> <p>Logo file is used in your branding and emails sent to payees</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayorsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The account owner Payor ID
$logo = "/path/to/file.txt"; // \SplFileObject

try {
    $apiInstance->payorAddPayorLogoV1($payor_id, $logo);
} catch (Exception $e) {
    echo 'Exception when calling PayorsApi->payorAddPayorLogoV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payor_id** | **string**| The account owner Payor ID | |
| **logo** | **\SplFileObject****\SplFileObject**|  | [optional] |

### Return type

void (empty response body)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `payorCreateApiKeyV1()`

```php
payorCreateApiKeyV1($payor_id, $application_id, $payor_create_api_key_request): \VeloPayments\Client\Model\PayorCreateApiKeyResponse
```

Create API Key

<p>Create an an API key for the given payor Id and application Id</p> <p>You can create multiple API Keys for a given application</p> <p>API Keys are programmatic users for integrating your application with the Velo platform</p> <p>The response will return the API Key and the secret. This is the only time you will be able to see the secret</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayorsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The account owner Payor ID
$application_id = 'application_id_example'; // string | Application ID
$payor_create_api_key_request = new \VeloPayments\Client\Model\PayorCreateApiKeyRequest(); // \VeloPayments\Client\Model\PayorCreateApiKeyRequest | Details of application API key to create

try {
    $result = $apiInstance->payorCreateApiKeyV1($payor_id, $application_id, $payor_create_api_key_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayorsApi->payorCreateApiKeyV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payor_id** | **string**| The account owner Payor ID | |
| **application_id** | **string**| Application ID | |
| **payor_create_api_key_request** | [**\VeloPayments\Client\Model\PayorCreateApiKeyRequest**](../Model/PayorCreateApiKeyRequest.md)| Details of application API key to create | |

### Return type

[**\VeloPayments\Client\Model\PayorCreateApiKeyResponse**](../Model/PayorCreateApiKeyResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `payorCreateApplicationV1()`

```php
payorCreateApplicationV1($payor_id, $payor_create_application_request)
```

Create Application

<p>Create an application for the given Payor ID.</p> <p>Applications provide a means to group your API Keys</p> <p>For example you might have an SAP application that you wish to integrate with Velo</p> <p>You can create an application and then create one or more API keys for the application</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayorsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The account owner Payor ID
$payor_create_application_request = new \VeloPayments\Client\Model\PayorCreateApplicationRequest(); // \VeloPayments\Client\Model\PayorCreateApplicationRequest | Details of application to create

try {
    $apiInstance->payorCreateApplicationV1($payor_id, $payor_create_application_request);
} catch (Exception $e) {
    echo 'Exception when calling PayorsApi->payorCreateApplicationV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payor_id** | **string**| The account owner Payor ID | |
| **payor_create_application_request** | [**\VeloPayments\Client\Model\PayorCreateApplicationRequest**](../Model/PayorCreateApplicationRequest.md)| Details of application to create | |

### Return type

void (empty response body)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `payorEmailOptOut()`

```php
payorEmailOptOut($payor_id, $payor_email_opt_out_request)
```

Reminder Email Opt-Out

Update the emailRemindersOptOut field for a Payor. This API can be used to opt out or opt into Payor Reminder emails. These emails are typically around payee events such as payees registering and onboarding.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayorsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The account owner Payor ID
$payor_email_opt_out_request = new \VeloPayments\Client\Model\PayorEmailOptOutRequest(); // \VeloPayments\Client\Model\PayorEmailOptOutRequest | Reminder Emails Opt-Out Request

try {
    $apiInstance->payorEmailOptOut($payor_id, $payor_email_opt_out_request);
} catch (Exception $e) {
    echo 'Exception when calling PayorsApi->payorEmailOptOut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payor_id** | **string**| The account owner Payor ID | |
| **payor_email_opt_out_request** | [**\VeloPayments\Client\Model\PayorEmailOptOutRequest**](../Model/PayorEmailOptOutRequest.md)| Reminder Emails Opt-Out Request | |

### Return type

void (empty response body)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `payorGetBranding()`

```php
payorGetBranding($payor_id): \VeloPayments\Client\Model\PayorBrandingResponse
```

Get Branding

Get the payor branding details.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayorsApi(
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
    echo 'Exception when calling PayorsApi->payorGetBranding: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payor_id** | **string**| The account owner Payor ID | |

### Return type

[**\VeloPayments\Client\Model\PayorBrandingResponse**](../Model/PayorBrandingResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
