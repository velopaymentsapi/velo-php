# VeloPayments\Client\PayeesApi

All URIs are relative to https://api.sandbox.velopayments.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deletePayeeByIdV1()**](PayeesApi.md#deletePayeeByIdV1) | **DELETE** /v1/payees/{payeeId} | Delete Payee by Id
[**deletePayeeByIdV3()**](PayeesApi.md#deletePayeeByIdV3) | **DELETE** /v3/payees/{payeeId} | Delete Payee by Id
[**deletePayeeByIdV4()**](PayeesApi.md#deletePayeeByIdV4) | **DELETE** /v4/payees/{payeeId} | Delete Payee by Id
[**getPayeeByIdV1()**](PayeesApi.md#getPayeeByIdV1) | **GET** /v1/payees/{payeeId} | Get Payee by Id
[**getPayeeByIdV2()**](PayeesApi.md#getPayeeByIdV2) | **GET** /v2/payees/{payeeId} | Get Payee by Id
[**getPayeeByIdV3()**](PayeesApi.md#getPayeeByIdV3) | **GET** /v3/payees/{payeeId} | Get Payee by Id
[**getPayeeByIdV4()**](PayeesApi.md#getPayeeByIdV4) | **GET** /v4/payees/{payeeId} | Get Payee by Id
[**listPayeeChanges()**](PayeesApi.md#listPayeeChanges) | **GET** /v1/deltas/payees | List Payee Changes
[**listPayeeChangesV3()**](PayeesApi.md#listPayeeChangesV3) | **GET** /v3/payees/deltas | List Payee Changes
[**listPayeeChangesV4()**](PayeesApi.md#listPayeeChangesV4) | **GET** /v4/payees/deltas | List Payee Changes
[**listPayeesV1()**](PayeesApi.md#listPayeesV1) | **GET** /v1/payees | List Payees V1
[**listPayeesV3()**](PayeesApi.md#listPayeesV3) | **GET** /v3/payees | List Payees
[**listPayeesV4()**](PayeesApi.md#listPayeesV4) | **GET** /v4/payees | List Payees
[**payeeDetailsUpdateV3()**](PayeesApi.md#payeeDetailsUpdateV3) | **POST** /v3/payees/{payeeId}/payeeDetailsUpdate | Update Payee Details
[**payeeDetailsUpdateV4()**](PayeesApi.md#payeeDetailsUpdateV4) | **POST** /v4/payees/{payeeId}/payeeDetailsUpdate | Update Payee Details
[**v1PayeesPayeeIdRemoteIdUpdatePost()**](PayeesApi.md#v1PayeesPayeeIdRemoteIdUpdatePost) | **POST** /v1/payees/{payeeId}/remoteIdUpdate | Update Payee Remote Id
[**v3PayeesPayeeIdRemoteIdUpdatePost()**](PayeesApi.md#v3PayeesPayeeIdRemoteIdUpdatePost) | **POST** /v3/payees/{payeeId}/remoteIdUpdate | Update Payee Remote Id
[**v4PayeesPayeeIdRemoteIdUpdatePost()**](PayeesApi.md#v4PayeesPayeeIdRemoteIdUpdatePost) | **POST** /v4/payees/{payeeId}/remoteIdUpdate | Update Payee Remote Id


## `deletePayeeByIdV1()`

```php
deletePayeeByIdV1($payee_id)
```

Delete Payee by Id

<p>This API will delete Payee by Id (UUID). Deletion by ID is not allowed if:</p> <p>* Payee ID is not found</p> <p>* If Payee has not been on-boarded</p> <p>* If Payee is in grace period</p> <p>* If Payee has existing payments</p> <p>Please use V3 instead.</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payee_id = 2aa5d7e0-2ecb-403f-8494-1865ed0454e9; // string | The UUID of the payee.

try {
    $apiInstance->deletePayeeByIdV1($payee_id);
} catch (Exception $e) {
    echo 'Exception when calling PayeesApi->deletePayeeByIdV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payee_id** | [**string**](../Model/.md)| The UUID of the payee. |

### Return type

void (empty response body)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deletePayeeByIdV3()`

```php
deletePayeeByIdV3($payee_id)
```

Delete Payee by Id

<p>This API will delete Payee by Id (UUID). Deletion by ID is not allowed if:</p> <p>* Payee ID is not found</p> <p>* If Payee has not been on-boarded</p> <p>* If Payee is in grace period</p> <p>* If Payee has existing payments</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payee_id = 2aa5d7e0-2ecb-403f-8494-1865ed0454e9; // string | The UUID of the payee.

try {
    $apiInstance->deletePayeeByIdV3($payee_id);
} catch (Exception $e) {
    echo 'Exception when calling PayeesApi->deletePayeeByIdV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payee_id** | [**string**](../Model/.md)| The UUID of the payee. |

### Return type

void (empty response body)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deletePayeeByIdV4()`

```php
deletePayeeByIdV4($payee_id)
```

Delete Payee by Id

<p>This API will delete Payee by Id (UUID). Deletion by ID is not allowed if:</p> <p>* Payee ID is not found</p> <p>* If Payee has not been on-boarded</p> <p>* If Payee is in grace period</p> <p>* If Payee has existing payments</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payee_id = 2aa5d7e0-2ecb-403f-8494-1865ed0454e9; // string | The UUID of the payee.

try {
    $apiInstance->deletePayeeByIdV4($payee_id);
} catch (Exception $e) {
    echo 'Exception when calling PayeesApi->deletePayeeByIdV4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payee_id** | [**string**](../Model/.md)| The UUID of the payee. |

### Return type

void (empty response body)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPayeeByIdV1()`

```php
getPayeeByIdV1($payee_id, $sensitive): \VeloPayments\Client\Model\Payee
```

Get Payee by Id

<p>Get Payee by Id</p> <p>Please use V3 instead.</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payee_id = 2aa5d7e0-2ecb-403f-8494-1865ed0454e9; // string | The UUID of the payee.
$sensitive = True; // bool | Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values.

try {
    $result = $apiInstance->getPayeeByIdV1($payee_id, $sensitive);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeesApi->getPayeeByIdV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payee_id** | [**string**](../Model/.md)| The UUID of the payee. |
 **sensitive** | **bool**| Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. | [optional]

### Return type

[**\VeloPayments\Client\Model\Payee**](../Model/Payee.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPayeeByIdV2()`

```php
getPayeeByIdV2($payee_id, $sensitive): \VeloPayments\Client\Model\PayeeResponseV2
```

Get Payee by Id

<p>Get Payee by Id</p> <p>Please use V3 instead.</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payee_id = 2aa5d7e0-2ecb-403f-8494-1865ed0454e9; // string | The UUID of the payee.
$sensitive = True; // bool | Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values.

try {
    $result = $apiInstance->getPayeeByIdV2($payee_id, $sensitive);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeesApi->getPayeeByIdV2: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payee_id** | [**string**](../Model/.md)| The UUID of the payee. |
 **sensitive** | **bool**| Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. | [optional]

### Return type

[**\VeloPayments\Client\Model\PayeeResponseV2**](../Model/PayeeResponseV2.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPayeeByIdV3()`

```php
getPayeeByIdV3($payee_id, $sensitive): \VeloPayments\Client\Model\PayeeDetailResponse
```

Get Payee by Id

Get Payee by Id

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payee_id = 2aa5d7e0-2ecb-403f-8494-1865ed0454e9; // string | The UUID of the payee.
$sensitive = True; // bool | Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values.

try {
    $result = $apiInstance->getPayeeByIdV3($payee_id, $sensitive);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeesApi->getPayeeByIdV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payee_id** | [**string**](../Model/.md)| The UUID of the payee. |
 **sensitive** | **bool**| Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. | [optional]

### Return type

[**\VeloPayments\Client\Model\PayeeDetailResponse**](../Model/PayeeDetailResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPayeeByIdV4()`

```php
getPayeeByIdV4($payee_id, $sensitive): \VeloPayments\Client\Model\PayeeDetailResponse2
```

Get Payee by Id

Get Payee by Id

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payee_id = 2aa5d7e0-2ecb-403f-8494-1865ed0454e9; // string | The UUID of the payee.
$sensitive = True; // bool | Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values.

try {
    $result = $apiInstance->getPayeeByIdV4($payee_id, $sensitive);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeesApi->getPayeeByIdV4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payee_id** | [**string**](../Model/.md)| The UUID of the payee. |
 **sensitive** | **bool**| Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. | [optional]

### Return type

[**\VeloPayments\Client\Model\PayeeDetailResponse2**](../Model/PayeeDetailResponse2.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listPayeeChanges()`

```php
listPayeeChanges($payor_id, $updated_since, $page, $page_size): \VeloPayments\Client\Model\PayeeDeltaResponse
```

List Payee Changes

<p>Get a paginated response listing payee changes.</p> <p>Please use V3 instead.</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The Payor ID to find associated Payees
$updated_since = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm
$page = 1; // int | Page number. Default is 1.
$page_size = 100; // int | Page size. Default is 100. Max allowable is 1000.

try {
    $result = $apiInstance->listPayeeChanges($payor_id, $updated_since, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeesApi->listPayeeChanges: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The Payor ID to find associated Payees |
 **updated_since** | **\DateTime**| The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm |
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| Page size. Default is 100. Max allowable is 1000. | [optional] [default to 100]

### Return type

[**\VeloPayments\Client\Model\PayeeDeltaResponse**](../Model/PayeeDeltaResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listPayeeChangesV3()`

```php
listPayeeChangesV3($payor_id, $updated_since, $page, $page_size): \VeloPayments\Client\Model\PayeeDeltaResponse2
```

List Payee Changes

Get a paginated response listing payee changes.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The Payor ID to find associated Payees
$updated_since = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm
$page = 1; // int | Page number. Default is 1.
$page_size = 100; // int | Page size. Default is 100. Max allowable is 1000.

try {
    $result = $apiInstance->listPayeeChangesV3($payor_id, $updated_since, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeesApi->listPayeeChangesV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The Payor ID to find associated Payees |
 **updated_since** | **\DateTime**| The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm |
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| Page size. Default is 100. Max allowable is 1000. | [optional] [default to 100]

### Return type

[**\VeloPayments\Client\Model\PayeeDeltaResponse2**](../Model/PayeeDeltaResponse2.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listPayeeChangesV4()`

```php
listPayeeChangesV4($payor_id, $updated_since, $page, $page_size): \VeloPayments\Client\Model\PayeeDeltaResponse2
```

List Payee Changes

Get a paginated response listing payee changes (updated since a particular time) to a limited set of fields: - dbaName - displayName - email - onboardedStatus - payeeCountry - payeeId - remoteId

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The Payor ID to find associated Payees
$updated_since = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm
$page = 1; // int | Page number. Default is 1.
$page_size = 100; // int | Page size. Default is 100. Max allowable is 1000.

try {
    $result = $apiInstance->listPayeeChangesV4($payor_id, $updated_since, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeesApi->listPayeeChangesV4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The Payor ID to find associated Payees |
 **updated_since** | **\DateTime**| The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm |
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| Page size. Default is 100. Max allowable is 1000. | [optional] [default to 100]

### Return type

[**\VeloPayments\Client\Model\PayeeDeltaResponse2**](../Model/PayeeDeltaResponse2.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listPayeesV1()`

```php
listPayeesV1($payor_id, $ofac_status, $onboarded_status, $email, $display_name, $remote_id, $payee_type, $payee_country, $page, $page_size, $sort): \VeloPayments\Client\Model\PagedPayeeResponse
```

List Payees V1

<p>Get a paginated response listing the payees for a payor.</p> <p>Please use V3 instead.</>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The account owner Payor ID
$ofac_status = new \VeloPayments\Client\Model\\VeloPayments\Client\Model\OfacStatus(); // \VeloPayments\Client\Model\OfacStatus | The ofacStatus of the payees.
$onboarded_status = new \VeloPayments\Client\Model\\VeloPayments\Client\Model\OnboardedStatus(); // \VeloPayments\Client\Model\OnboardedStatus | The onboarded status of the payees.
$email = bob@example.com; // string | Email address
$display_name = Bob Smith; // string | The display name of the payees.
$remote_id = remoteId123; // string | The remote id of the payees.
$payee_type = new \VeloPayments\Client\Model\\VeloPayments\Client\Model\PayeeType(); // \VeloPayments\Client\Model\PayeeType | The onboarded status of the payees.
$payee_country = US; // string | The country of the payee - 2 letter ISO 3166-1 country code (upper case)
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | Page size. Default is 25. Max allowable is 100.
$sort = displayName:asc; // string | List of sort fields (e.g. ?sort=onboardedStatus:asc,name:asc) Default is name:asc 'name' is treated as company name for companies - last name + ',' + firstName for individuals The supported sort fields are - payeeId, displayName, payoutStatus, onboardedStatus.

try {
    $result = $apiInstance->listPayeesV1($payor_id, $ofac_status, $onboarded_status, $email, $display_name, $remote_id, $payee_type, $payee_country, $page, $page_size, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeesApi->listPayeesV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID |
 **ofac_status** | [**\VeloPayments\Client\Model\OfacStatus**](../Model/.md)| The ofacStatus of the payees. | [optional]
 **onboarded_status** | [**\VeloPayments\Client\Model\OnboardedStatus**](../Model/.md)| The onboarded status of the payees. | [optional]
 **email** | [**string**](../Model/.md)| Email address | [optional]
 **display_name** | **string**| The display name of the payees. | [optional]
 **remote_id** | **string**| The remote id of the payees. | [optional]
 **payee_type** | [**\VeloPayments\Client\Model\PayeeType**](../Model/.md)| The onboarded status of the payees. | [optional]
 **payee_country** | **string**| The country of the payee - 2 letter ISO 3166-1 country code (upper case) | [optional]
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| Page size. Default is 25. Max allowable is 100. | [optional] [default to 25]
 **sort** | **string**| List of sort fields (e.g. ?sort&#x3D;onboardedStatus:asc,name:asc) Default is name:asc &#39;name&#39; is treated as company name for companies - last name + &#39;,&#39; + firstName for individuals The supported sort fields are - payeeId, displayName, payoutStatus, onboardedStatus. | [optional] [default to &#39;displayName:asc&#39;]

### Return type

[**\VeloPayments\Client\Model\PagedPayeeResponse**](../Model/PagedPayeeResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listPayeesV3()`

```php
listPayeesV3($payor_id, $watchlist_status, $disabled, $onboarded_status, $email, $display_name, $remote_id, $payee_type, $payee_country, $page, $page_size, $sort): \VeloPayments\Client\Model\PagedPayeeResponse2
```

List Payees

Get a paginated response listing the payees for a payor.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The account owner Payor ID
$watchlist_status = new \VeloPayments\Client\Model\\VeloPayments\Client\Model\WatchlistStatus(); // \VeloPayments\Client\Model\WatchlistStatus | The watchlistStatus of the payees.
$disabled = True; // bool | Payee disabled
$onboarded_status = new \VeloPayments\Client\Model\\VeloPayments\Client\Model\OnboardedStatus(); // \VeloPayments\Client\Model\OnboardedStatus | The onboarded status of the payees.
$email = bob@example.com; // string | Email address
$display_name = Bob Smith; // string | The display name of the payees.
$remote_id = remoteId123; // string | The remote id of the payees.
$payee_type = new \VeloPayments\Client\Model\\VeloPayments\Client\Model\PayeeType(); // \VeloPayments\Client\Model\PayeeType | The onboarded status of the payees.
$payee_country = US; // string | The country of the payee - 2 letter ISO 3166-1 country code (upper case)
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | Page size. Default is 25. Max allowable is 100.
$sort = displayName:asc; // string | List of sort fields (e.g. ?sort=onboardedStatus:asc,name:asc) Default is name:asc 'name' is treated as company name for companies - last name + ',' + firstName for individuals The supported sort fields are - payeeId, displayName, payoutStatus, onboardedStatus.

try {
    $result = $apiInstance->listPayeesV3($payor_id, $watchlist_status, $disabled, $onboarded_status, $email, $display_name, $remote_id, $payee_type, $payee_country, $page, $page_size, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeesApi->listPayeesV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID |
 **watchlist_status** | [**\VeloPayments\Client\Model\WatchlistStatus**](../Model/.md)| The watchlistStatus of the payees. | [optional]
 **disabled** | **bool**| Payee disabled | [optional]
 **onboarded_status** | [**\VeloPayments\Client\Model\OnboardedStatus**](../Model/.md)| The onboarded status of the payees. | [optional]
 **email** | [**string**](../Model/.md)| Email address | [optional]
 **display_name** | **string**| The display name of the payees. | [optional]
 **remote_id** | **string**| The remote id of the payees. | [optional]
 **payee_type** | [**\VeloPayments\Client\Model\PayeeType**](../Model/.md)| The onboarded status of the payees. | [optional]
 **payee_country** | **string**| The country of the payee - 2 letter ISO 3166-1 country code (upper case) | [optional]
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| Page size. Default is 25. Max allowable is 100. | [optional] [default to 25]
 **sort** | **string**| List of sort fields (e.g. ?sort&#x3D;onboardedStatus:asc,name:asc) Default is name:asc &#39;name&#39; is treated as company name for companies - last name + &#39;,&#39; + firstName for individuals The supported sort fields are - payeeId, displayName, payoutStatus, onboardedStatus. | [optional] [default to &#39;displayName:asc&#39;]

### Return type

[**\VeloPayments\Client\Model\PagedPayeeResponse2**](../Model/PagedPayeeResponse2.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listPayeesV4()`

```php
listPayeesV4($payor_id, $watchlist_status, $disabled, $onboarded_status, $email, $display_name, $remote_id, $payee_type, $payee_country, $ofac_status, $page, $page_size, $sort): \VeloPayments\Client\Model\PagedPayeeResponse2
```

List Payees

Get a paginated response listing the payees for a payor.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The account owner Payor ID
$watchlist_status = new \VeloPayments\Client\Model\\VeloPayments\Client\Model\WatchlistStatus(); // \VeloPayments\Client\Model\WatchlistStatus | The watchlistStatus of the payees.
$disabled = True; // bool | Payee disabled
$onboarded_status = new \VeloPayments\Client\Model\\VeloPayments\Client\Model\OnboardedStatus(); // \VeloPayments\Client\Model\OnboardedStatus | The onboarded status of the payees.
$email = bob@example.com; // string | Email address
$display_name = Bob Smith; // string | The display name of the payees.
$remote_id = remoteId123; // string | The remote id of the payees.
$payee_type = new \VeloPayments\Client\Model\\VeloPayments\Client\Model\PayeeType(); // \VeloPayments\Client\Model\PayeeType | The onboarded status of the payees.
$payee_country = US; // string | The country of the payee - 2 letter ISO 3166-1 country code (upper case)
$ofac_status = new \VeloPayments\Client\Model\\VeloPayments\Client\Model\OfacStatus(); // \VeloPayments\Client\Model\OfacStatus | The ofacStatus of the payees.
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | Page size. Default is 25. Max allowable is 100.
$sort = displayName:asc; // string | List of sort fields (e.g. ?sort=onboardedStatus:asc,name:asc) Default is name:asc 'name' is treated as company name for companies - last name + ',' + firstName for individuals The supported sort fields are - payeeId, displayName, payoutStatus, onboardedStatus.

try {
    $result = $apiInstance->listPayeesV4($payor_id, $watchlist_status, $disabled, $onboarded_status, $email, $display_name, $remote_id, $payee_type, $payee_country, $ofac_status, $page, $page_size, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeesApi->listPayeesV4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID |
 **watchlist_status** | [**\VeloPayments\Client\Model\WatchlistStatus**](../Model/.md)| The watchlistStatus of the payees. | [optional]
 **disabled** | **bool**| Payee disabled | [optional]
 **onboarded_status** | [**\VeloPayments\Client\Model\OnboardedStatus**](../Model/.md)| The onboarded status of the payees. | [optional]
 **email** | [**string**](../Model/.md)| Email address | [optional]
 **display_name** | **string**| The display name of the payees. | [optional]
 **remote_id** | **string**| The remote id of the payees. | [optional]
 **payee_type** | [**\VeloPayments\Client\Model\PayeeType**](../Model/.md)| The onboarded status of the payees. | [optional]
 **payee_country** | **string**| The country of the payee - 2 letter ISO 3166-1 country code (upper case) | [optional]
 **ofac_status** | [**\VeloPayments\Client\Model\OfacStatus**](../Model/.md)| The ofacStatus of the payees. | [optional]
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| Page size. Default is 25. Max allowable is 100. | [optional] [default to 25]
 **sort** | **string**| List of sort fields (e.g. ?sort&#x3D;onboardedStatus:asc,name:asc) Default is name:asc &#39;name&#39; is treated as company name for companies - last name + &#39;,&#39; + firstName for individuals The supported sort fields are - payeeId, displayName, payoutStatus, onboardedStatus. | [optional] [default to &#39;displayName:asc&#39;]

### Return type

[**\VeloPayments\Client\Model\PagedPayeeResponse2**](../Model/PagedPayeeResponse2.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `payeeDetailsUpdateV3()`

```php
payeeDetailsUpdateV3($payee_id, $update_payee_details_request)
```

Update Payee Details

<p>Update payee details for the given Payee Id.<p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payee_id = 2aa5d7e0-2ecb-403f-8494-1865ed0454e9; // string | The UUID of the payee.
$update_payee_details_request = new \VeloPayments\Client\Model\UpdatePayeeDetailsRequest(); // \VeloPayments\Client\Model\UpdatePayeeDetailsRequest | Request to update payee details

try {
    $apiInstance->payeeDetailsUpdateV3($payee_id, $update_payee_details_request);
} catch (Exception $e) {
    echo 'Exception when calling PayeesApi->payeeDetailsUpdateV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payee_id** | [**string**](../Model/.md)| The UUID of the payee. |
 **update_payee_details_request** | [**\VeloPayments\Client\Model\UpdatePayeeDetailsRequest**](../Model/UpdatePayeeDetailsRequest.md)| Request to update payee details |

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

## `payeeDetailsUpdateV4()`

```php
payeeDetailsUpdateV4($payee_id, $update_payee_details_request2)
```

Update Payee Details

<p>Update payee details for the given Payee Id.<p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payee_id = 2aa5d7e0-2ecb-403f-8494-1865ed0454e9; // string | The UUID of the payee.
$update_payee_details_request2 = new \VeloPayments\Client\Model\UpdatePayeeDetailsRequest2(); // \VeloPayments\Client\Model\UpdatePayeeDetailsRequest2 | Request to update payee details

try {
    $apiInstance->payeeDetailsUpdateV4($payee_id, $update_payee_details_request2);
} catch (Exception $e) {
    echo 'Exception when calling PayeesApi->payeeDetailsUpdateV4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payee_id** | [**string**](../Model/.md)| The UUID of the payee. |
 **update_payee_details_request2** | [**\VeloPayments\Client\Model\UpdatePayeeDetailsRequest2**](../Model/UpdatePayeeDetailsRequest2.md)| Request to update payee details |

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

## `v1PayeesPayeeIdRemoteIdUpdatePost()`

```php
v1PayeesPayeeIdRemoteIdUpdatePost($payee_id, $update_remote_id_request)
```

Update Payee Remote Id

<p>Update the remote Id for the given Payee Id.</p> <p>Please use V3 instead</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payee_id = 2aa5d7e0-2ecb-403f-8494-1865ed0454e9; // string | The UUID of the payee.
$update_remote_id_request = new \VeloPayments\Client\Model\UpdateRemoteIdRequest(); // \VeloPayments\Client\Model\UpdateRemoteIdRequest | Request to update payee remote id v1

try {
    $apiInstance->v1PayeesPayeeIdRemoteIdUpdatePost($payee_id, $update_remote_id_request);
} catch (Exception $e) {
    echo 'Exception when calling PayeesApi->v1PayeesPayeeIdRemoteIdUpdatePost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payee_id** | [**string**](../Model/.md)| The UUID of the payee. |
 **update_remote_id_request** | [**\VeloPayments\Client\Model\UpdateRemoteIdRequest**](../Model/UpdateRemoteIdRequest.md)| Request to update payee remote id v1 |

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

## `v3PayeesPayeeIdRemoteIdUpdatePost()`

```php
v3PayeesPayeeIdRemoteIdUpdatePost($payee_id, $update_remote_id_request)
```

Update Payee Remote Id

<p>Update the remote Id for the given Payee Id.</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payee_id = 2aa5d7e0-2ecb-403f-8494-1865ed0454e9; // string | The UUID of the payee.
$update_remote_id_request = new \VeloPayments\Client\Model\UpdateRemoteIdRequest(); // \VeloPayments\Client\Model\UpdateRemoteIdRequest | Request to update payee remote id v3

try {
    $apiInstance->v3PayeesPayeeIdRemoteIdUpdatePost($payee_id, $update_remote_id_request);
} catch (Exception $e) {
    echo 'Exception when calling PayeesApi->v3PayeesPayeeIdRemoteIdUpdatePost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payee_id** | [**string**](../Model/.md)| The UUID of the payee. |
 **update_remote_id_request** | [**\VeloPayments\Client\Model\UpdateRemoteIdRequest**](../Model/UpdateRemoteIdRequest.md)| Request to update payee remote id v3 |

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

## `v4PayeesPayeeIdRemoteIdUpdatePost()`

```php
v4PayeesPayeeIdRemoteIdUpdatePost($payee_id, $update_remote_id_request)
```

Update Payee Remote Id

<p>Update the remote Id for the given Payee Id.</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payee_id = 2aa5d7e0-2ecb-403f-8494-1865ed0454e9; // string | The UUID of the payee.
$update_remote_id_request = new \VeloPayments\Client\Model\UpdateRemoteIdRequest(); // \VeloPayments\Client\Model\UpdateRemoteIdRequest | Request to update payee remote id v4

try {
    $apiInstance->v4PayeesPayeeIdRemoteIdUpdatePost($payee_id, $update_remote_id_request);
} catch (Exception $e) {
    echo 'Exception when calling PayeesApi->v4PayeesPayeeIdRemoteIdUpdatePost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payee_id** | [**string**](../Model/.md)| The UUID of the payee. |
 **update_remote_id_request** | [**\VeloPayments\Client\Model\UpdateRemoteIdRequest**](../Model/UpdateRemoteIdRequest.md)| Request to update payee remote id v4 |

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
