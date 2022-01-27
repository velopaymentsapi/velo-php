# VeloPayments\Client\PayeeInvitationApi

All URIs are relative to https://api.sandbox.velopayments.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**getPayeesInvitationStatusV3()**](PayeeInvitationApi.md#getPayeesInvitationStatusV3) | **GET** /v3/payees/payors/{payorId}/invitationStatus | Get Payee Invitation Status
[**getPayeesInvitationStatusV4()**](PayeeInvitationApi.md#getPayeesInvitationStatusV4) | **GET** /v4/payees/payors/{payorId}/invitationStatus | Get Payee Invitation Status
[**queryBatchStatusV3()**](PayeeInvitationApi.md#queryBatchStatusV3) | **GET** /v3/payees/batch/{batchId} | Query Batch Status
[**queryBatchStatusV4()**](PayeeInvitationApi.md#queryBatchStatusV4) | **GET** /v4/payees/batch/{batchId} | Query Batch Status
[**resendPayeeInviteV3()**](PayeeInvitationApi.md#resendPayeeInviteV3) | **POST** /v3/payees/{payeeId}/invite | Resend Payee Invite
[**resendPayeeInviteV4()**](PayeeInvitationApi.md#resendPayeeInviteV4) | **POST** /v4/payees/{payeeId}/invite | Resend Payee Invite
[**v3CreatePayee()**](PayeeInvitationApi.md#v3CreatePayee) | **POST** /v3/payees | Initiate Payee Creation
[**v4CreatePayee()**](PayeeInvitationApi.md#v4CreatePayee) | **POST** /v4/payees | Initiate Payee Creation


## `getPayeesInvitationStatusV3()`

```php
getPayeesInvitationStatusV3($payor_id, $payee_id, $invitation_status, $page, $page_size): \VeloPayments\Client\Model\PagedPayeeInvitationStatusResponse
```

Get Payee Invitation Status

<p>Use v4 instead</p> <p>Returns a filtered, paginated list of payees associated with a payor, along with invitation status and grace period end date.</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeeInvitationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 9ac75325-5dcd-42d5-b992-175d7e0a035e; // string | The account owner Payor ID
$payee_id = 2aa5d7e0-2ecb-403f-8494-1865ed0454e9; // string | The UUID of the payee.
$invitation_status = new \VeloPayments\Client\Model\\VeloPayments\Client\Model\InvitationStatus(); // \VeloPayments\Client\Model\InvitationStatus | The invitation status of the payees.
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | Page size. Default is 25. Max allowable is 100.

try {
    $result = $apiInstance->getPayeesInvitationStatusV3($payor_id, $payee_id, $invitation_status, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeeInvitationApi->getPayeesInvitationStatusV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | **string**| The account owner Payor ID |
 **payee_id** | **string**| The UUID of the payee. | [optional]
 **invitation_status** | [**\VeloPayments\Client\Model\InvitationStatus**](../Model/.md)| The invitation status of the payees. | [optional]
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| Page size. Default is 25. Max allowable is 100. | [optional] [default to 25]

### Return type

[**\VeloPayments\Client\Model\PagedPayeeInvitationStatusResponse**](../Model/PagedPayeeInvitationStatusResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPayeesInvitationStatusV4()`

```php
getPayeesInvitationStatusV4($payor_id, $payee_id, $invitation_status, $page, $page_size): \VeloPayments\Client\Model\PagedPayeeInvitationStatusResponse2
```

Get Payee Invitation Status

Returns a filtered, paginated list of payees associated with a payor, along with invitation status and grace period end date.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeeInvitationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 9ac75325-5dcd-42d5-b992-175d7e0a035e; // string | The account owner Payor ID
$payee_id = 2aa5d7e0-2ecb-403f-8494-1865ed0454e9; // string | The UUID of the payee.
$invitation_status = new \VeloPayments\Client\Model\\VeloPayments\Client\Model\InvitationStatus(); // \VeloPayments\Client\Model\InvitationStatus | The invitation status of the payees.
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | Page size. Default is 25. Max allowable is 100.

try {
    $result = $apiInstance->getPayeesInvitationStatusV4($payor_id, $payee_id, $invitation_status, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeeInvitationApi->getPayeesInvitationStatusV4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | **string**| The account owner Payor ID |
 **payee_id** | **string**| The UUID of the payee. | [optional]
 **invitation_status** | [**\VeloPayments\Client\Model\InvitationStatus**](../Model/.md)| The invitation status of the payees. | [optional]
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| Page size. Default is 25. Max allowable is 100. | [optional] [default to 25]

### Return type

[**\VeloPayments\Client\Model\PagedPayeeInvitationStatusResponse2**](../Model/PagedPayeeInvitationStatusResponse2.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `queryBatchStatusV3()`

```php
queryBatchStatusV3($batch_id): \VeloPayments\Client\Model\QueryBatchResponse
```

Query Batch Status

<p>Use v4 instead</p> Fetch the status of a specific batch of payees. The batch is fully processed when status is ACCEPTED and pendingCount is 0 ( 200 - OK, 404 - batch not found ).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeeInvitationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$batch_id = 'batch_id_example'; // string | Batch Id

try {
    $result = $apiInstance->queryBatchStatusV3($batch_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeeInvitationApi->queryBatchStatusV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **batch_id** | **string**| Batch Id |

### Return type

[**\VeloPayments\Client\Model\QueryBatchResponse**](../Model/QueryBatchResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `queryBatchStatusV4()`

```php
queryBatchStatusV4($batch_id): \VeloPayments\Client\Model\QueryBatchResponse2
```

Query Batch Status

Fetch the status of a specific batch of payees. The batch is fully processed when status is ACCEPTED and pendingCount is 0 ( 200 - OK, 404 - batch not found ).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeeInvitationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$batch_id = 'batch_id_example'; // string | Batch Id

try {
    $result = $apiInstance->queryBatchStatusV4($batch_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeeInvitationApi->queryBatchStatusV4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **batch_id** | **string**| Batch Id |

### Return type

[**\VeloPayments\Client\Model\QueryBatchResponse2**](../Model/QueryBatchResponse2.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `resendPayeeInviteV3()`

```php
resendPayeeInviteV3($payee_id, $invite_payee_request)
```

Resend Payee Invite

<p>Use v4 instead</p> <p>Resend an invite to the Payee The payee must have already been invited by the payor and not yet accepted or declined</p> <p>Any previous invites to the payee by this Payor will be invalidated</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeeInvitationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payee_id = 2aa5d7e0-2ecb-403f-8494-1865ed0454e9; // string | The UUID of the payee.
$invite_payee_request = new \VeloPayments\Client\Model\InvitePayeeRequest(); // \VeloPayments\Client\Model\InvitePayeeRequest | Provide Payor Id in body of request

try {
    $apiInstance->resendPayeeInviteV3($payee_id, $invite_payee_request);
} catch (Exception $e) {
    echo 'Exception when calling PayeeInvitationApi->resendPayeeInviteV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payee_id** | **string**| The UUID of the payee. |
 **invite_payee_request** | [**\VeloPayments\Client\Model\InvitePayeeRequest**](../Model/InvitePayeeRequest.md)| Provide Payor Id in body of request |

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

## `resendPayeeInviteV4()`

```php
resendPayeeInviteV4($payee_id, $invite_payee_request2)
```

Resend Payee Invite

<p>Resend an invite to the Payee The payee must have already been invited by the payor and not yet accepted or declined</p> <p>Any previous invites to the payee by this Payor will be invalidated</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeeInvitationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payee_id = 2aa5d7e0-2ecb-403f-8494-1865ed0454e9; // string | The UUID of the payee.
$invite_payee_request2 = new \VeloPayments\Client\Model\InvitePayeeRequest2(); // \VeloPayments\Client\Model\InvitePayeeRequest2 | Provide Payor Id in body of request

try {
    $apiInstance->resendPayeeInviteV4($payee_id, $invite_payee_request2);
} catch (Exception $e) {
    echo 'Exception when calling PayeeInvitationApi->resendPayeeInviteV4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payee_id** | **string**| The UUID of the payee. |
 **invite_payee_request2** | [**\VeloPayments\Client\Model\InvitePayeeRequest2**](../Model/InvitePayeeRequest2.md)| Provide Payor Id in body of request |

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

## `v3CreatePayee()`

```php
v3CreatePayee($create_payees_request): \VeloPayments\Client\Model\CreatePayeesCSVResponse
```

Initiate Payee Creation

<p>Use v4 instead</p> Initiate the process of creating 1 to 2000 payees in a batch Use the response location header to query for status (201 - Created, 400 - invalid request body. In addition to standard semantic validations, a 400 will also result if there is a duplicate remote id within the batch / if there is a duplicate email within the batch, i.e. if there is a conflict between the data provided for one payee within the batch and that provided for another payee within the same batch). The validation at this stage is intra-batch only. Validation against payees who have already been invited occurs subsequently during processing of the batch.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeeInvitationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_payees_request = new \VeloPayments\Client\Model\CreatePayeesRequest(); // \VeloPayments\Client\Model\CreatePayeesRequest | Post payees to create.

try {
    $result = $apiInstance->v3CreatePayee($create_payees_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeeInvitationApi->v3CreatePayee: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **create_payees_request** | [**\VeloPayments\Client\Model\CreatePayeesRequest**](../Model/CreatePayeesRequest.md)| Post payees to create. | [optional]

### Return type

[**\VeloPayments\Client\Model\CreatePayeesCSVResponse**](../Model/CreatePayeesCSVResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: `application/json`, `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v4CreatePayee()`

```php
v4CreatePayee($create_payees_request2): \VeloPayments\Client\Model\CreatePayeesCSVResponse2
```

Initiate Payee Creation

Initiate the process of creating 1 to 2000 payees in a batch Use the response location header to query for status (201 - Created, 400 - invalid request body. In addition to standard semantic validations, a 400 will also result if there is a duplicate remote id within the batch / if there is a duplicate email within the batch, i.e. if there is a conflict between the data provided for one payee within the batch and that provided for another payee within the same batch). The validation at this stage is intra-batch only. Validation against payees who have already been invited occurs subsequently during processing of the batch.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeeInvitationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_payees_request2 = new \VeloPayments\Client\Model\CreatePayeesRequest2(); // \VeloPayments\Client\Model\CreatePayeesRequest2 | Post payees to create.

try {
    $result = $apiInstance->v4CreatePayee($create_payees_request2);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeeInvitationApi->v4CreatePayee: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **create_payees_request2** | [**\VeloPayments\Client\Model\CreatePayeesRequest2**](../Model/CreatePayeesRequest2.md)| Post payees to create. | [optional]

### Return type

[**\VeloPayments\Client\Model\CreatePayeesCSVResponse2**](../Model/CreatePayeesCSVResponse2.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: `application/json`, `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
