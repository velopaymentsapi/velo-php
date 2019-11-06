# VeloPayments\Client\PayorsApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getPayorById**](PayorsApi.md#getPayorById) | **GET** /v1/payors/{payorId} | Get Payor
[**getPayorByIdV2**](PayorsApi.md#getPayorByIdV2) | **GET** /v2/payors/{payorId} | Get Payor
[**payorAddPayorLogo**](PayorsApi.md#payorAddPayorLogo) | **POST** /v1/payors/{payorId}/branding/logos | Add Logo
[**payorEmailOptOut**](PayorsApi.md#payorEmailOptOut) | **POST** /v1/payors/{payorId}/reminderEmailsUpdate | Reminder Email Opt-Out
[**payorGetBranding**](PayorsApi.md#payorGetBranding) | **GET** /v1/payors/{payorId}/branding | Get Branding
[**payorLinks**](PayorsApi.md#payorLinks) | **GET** /v1/payorLinks | List Payor Links



## getPayorById

> \VeloPayments\Client\Model\PayorV1 getPayorById($payor_id)

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
    $result = $apiInstance->getPayorById($payor_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayorsApi->getPayorById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID |

### Return type

[**\VeloPayments\Client\Model\PayorV1**](../Model/PayorV1.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getPayorByIdV2

> \VeloPayments\Client\Model\PayorV2 getPayorByIdV2($payor_id)

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
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID |

### Return type

[**\VeloPayments\Client\Model\PayorV2**](../Model/PayorV2.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## payorAddPayorLogo

> payorAddPayorLogo($payor_id, $logo)

Add Logo

Add Payor Logo. Logo file is used in your branding, and emails sent to payees.

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
$logo = "/path/to/file.txt"; // \SplFileObject | 

try {
    $apiInstance->payorAddPayorLogo($payor_id, $logo);
} catch (Exception $e) {
    echo 'Exception when calling PayorsApi->payorAddPayorLogo: ', $e->getMessage(), PHP_EOL;
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

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## payorEmailOptOut

> payorEmailOptOut($payor_id, $payor_email_opt_out_request)

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
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID |
 **payor_email_opt_out_request** | [**\VeloPayments\Client\Model\PayorEmailOptOutRequest**](../Model/PayorEmailOptOutRequest.md)| Reminder Emails Opt-Out Request |

### Return type

void (empty response body)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## payorGetBranding

> \VeloPayments\Client\Model\PayorBrandingResponse payorGetBranding($payor_id)

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
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID |

### Return type

[**\VeloPayments\Client\Model\PayorBrandingResponse**](../Model/PayorBrandingResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## payorLinks

> \VeloPayments\Client\Model\PayorLinksResponse payorLinks($descendants_of_payor, $parent_of_payor, $fields)

List Payor Links

This endpoint allows you to list payor links

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
$descendants_of_payor = 'descendants_of_payor_example'; // string | The Payor ID from which to start the query to show all descendants
$parent_of_payor = 'parent_of_payor_example'; // string | Look for the parent payor details for this payor id
$fields = 'fields_example'; // string | List of additional Payor fields to include in the response for each Payor. The values of payorId and payorName and always included for each Payor - 'fields' allows you to add to this. Example: ```fields=primaryContactEmail,kycState``` - will include payorId+payorName+primaryContactEmail+kycState for each Payor Default if not specified is to include only payorId and payorName. The supported fields are any combination of: primaryContactEmail,kycState

try {
    $result = $apiInstance->payorLinks($descendants_of_payor, $parent_of_payor, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayorsApi->payorLinks: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **descendants_of_payor** | [**string**](../Model/.md)| The Payor ID from which to start the query to show all descendants | [optional]
 **parent_of_payor** | [**string**](../Model/.md)| Look for the parent payor details for this payor id | [optional]
 **fields** | **string**| List of additional Payor fields to include in the response for each Payor. The values of payorId and payorName and always included for each Payor - &#39;fields&#39; allows you to add to this. Example: &#x60;&#x60;&#x60;fields&#x3D;primaryContactEmail,kycState&#x60;&#x60;&#x60; - will include payorId+payorName+primaryContactEmail+kycState for each Payor Default if not specified is to include only payorId and payorName. The supported fields are any combination of: primaryContactEmail,kycState | [optional]

### Return type

[**\VeloPayments\Client\Model\PayorLinksResponse**](../Model/PayorLinksResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)

