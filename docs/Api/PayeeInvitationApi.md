# VeloPayments\Client\PayeeInvitationApi

All URIs are relative to https://api.sandbox.velopayments.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createPayeeV3()**](PayeeInvitationApi.md#createPayeeV3) | **POST** /v3/payees | Initiate Payee Creation |
| [**getPayeesInvitationStatusV3()**](PayeeInvitationApi.md#getPayeesInvitationStatusV3) | **GET** /v3/payees/payors/{payorId}/invitationStatus | Get Payee Invitation Status |
| [**getPayeesInvitationStatusV4()**](PayeeInvitationApi.md#getPayeesInvitationStatusV4) | **GET** /v4/payees/payors/{payorId}/invitationStatus | Get Payee Invitation Status |
| [**queryBatchStatusV3()**](PayeeInvitationApi.md#queryBatchStatusV3) | **GET** /v3/payees/batch/{batchId} | Query Batch Status |
| [**queryBatchStatusV4()**](PayeeInvitationApi.md#queryBatchStatusV4) | **GET** /v4/payees/batch/{batchId} | Query Batch Status |
| [**resendPayeeInviteV3()**](PayeeInvitationApi.md#resendPayeeInviteV3) | **POST** /v3/payees/{payeeId}/invite | Resend Payee Invite |
| [**resendPayeeInviteV4()**](PayeeInvitationApi.md#resendPayeeInviteV4) | **POST** /v4/payees/{payeeId}/invite | Resend Payee Invite |
| [**v4CreatePayee()**](PayeeInvitationApi.md#v4CreatePayee) | **POST** /v4/payees | Initiate Payee Creation |


## `createPayeeV3()`

```php
createPayeeV3($create_payees_request_v3): \VeloPayments\Client\Model\CreatePayeesCSVResponseV3
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
$create_payees_request_v3 = new \VeloPayments\Client\Model\CreatePayeesRequestV3(); // \VeloPayments\Client\Model\CreatePayeesRequestV3 | Post payees to create.

try {
    $result = $apiInstance->createPayeeV3($create_payees_request_v3);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeeInvitationApi->createPayeeV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_payees_request_v3** | [**\VeloPayments\Client\Model\CreatePayeesRequestV3**](../Model/CreatePayeesRequestV3.md)| Post payees to create. | [optional] |

### Return type

[**\VeloPayments\Client\Model\CreatePayeesCSVResponseV3**](../Model/CreatePayeesCSVResponseV3.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: `application/json`, `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPayeesInvitationStatusV3()`

```php
getPayeesInvitationStatusV3($payor_id, $payee_id, $invitation_status, $page, $page_size): \VeloPayments\Client\Model\PagedPayeeInvitationStatusResponseV3
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
$invitation_status = 'invitation_status_example'; // string | The invitation status of the payees.
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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payor_id** | **string**| The account owner Payor ID | |
| **payee_id** | **string**| The UUID of the payee. | [optional] |
| **invitation_status** | **string**| The invitation status of the payees. | [optional] |
| **page** | **int**| Page number. Default is 1. | [optional] [default to 1] |
| **page_size** | **int**| Page size. Default is 25. Max allowable is 100. | [optional] [default to 25] |

### Return type

[**\VeloPayments\Client\Model\PagedPayeeInvitationStatusResponseV3**](../Model/PagedPayeeInvitationStatusResponseV3.md)

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
getPayeesInvitationStatusV4($payor_id, $payee_id, $invitation_status, $page, $page_size): \VeloPayments\Client\Model\PagedPayeeInvitationStatusResponseV4
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
$invitation_status = 'invitation_status_example'; // string | The invitation status of the payees.
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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payor_id** | **string**| The account owner Payor ID | |
| **payee_id** | **string**| The UUID of the payee. | [optional] |
| **invitation_status** | **string**| The invitation status of the payees. | [optional] |
| **page** | **int**| Page number. Default is 1. | [optional] [default to 1] |
| **page_size** | **int**| Page size. Default is 25. Max allowable is 100. | [optional] [default to 25] |

### Return type

[**\VeloPayments\Client\Model\PagedPayeeInvitationStatusResponseV4**](../Model/PagedPayeeInvitationStatusResponseV4.md)

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
queryBatchStatusV3($batch_id): \VeloPayments\Client\Model\QueryBatchResponseV3
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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **batch_id** | **string**| Batch Id | |

### Return type

[**\VeloPayments\Client\Model\QueryBatchResponseV3**](../Model/QueryBatchResponseV3.md)

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
queryBatchStatusV4($batch_id): \VeloPayments\Client\Model\QueryBatchResponseV4
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

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **batch_id** | **string**| Batch Id | |

### Return type

[**\VeloPayments\Client\Model\QueryBatchResponseV4**](../Model/QueryBatchResponseV4.md)

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
resendPayeeInviteV3($payee_id, $invite_payee_request_v3)
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
$invite_payee_request_v3 = new \VeloPayments\Client\Model\InvitePayeeRequestV3(); // \VeloPayments\Client\Model\InvitePayeeRequestV3 | Provide Payor Id in body of request

try {
    $apiInstance->resendPayeeInviteV3($payee_id, $invite_payee_request_v3);
} catch (Exception $e) {
    echo 'Exception when calling PayeeInvitationApi->resendPayeeInviteV3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payee_id** | **string**| The UUID of the payee. | |
| **invite_payee_request_v3** | [**\VeloPayments\Client\Model\InvitePayeeRequestV3**](../Model/InvitePayeeRequestV3.md)| Provide Payor Id in body of request | |

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
resendPayeeInviteV4($payee_id, $invite_payee_request_v4)
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
$invite_payee_request_v4 = new \VeloPayments\Client\Model\InvitePayeeRequestV4(); // \VeloPayments\Client\Model\InvitePayeeRequestV4 | Provide Payor Id in body of request

try {
    $apiInstance->resendPayeeInviteV4($payee_id, $invite_payee_request_v4);
} catch (Exception $e) {
    echo 'Exception when calling PayeeInvitationApi->resendPayeeInviteV4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payee_id** | **string**| The UUID of the payee. | |
| **invite_payee_request_v4** | [**\VeloPayments\Client\Model\InvitePayeeRequestV4**](../Model/InvitePayeeRequestV4.md)| Provide Payor Id in body of request | |

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

## `v4CreatePayee()`

```php
v4CreatePayee($create_payees_request_v4): \VeloPayments\Client\Model\CreatePayeesCSVResponseV4
```

Initiate Payee Creation

<p>Initiate the process of creating 1 to 2000 payees in a batch</p> <p>Use the batchId in the response to query for status.</p> <p>In addition to standard semantic validations, a 400 will also result if: </p> <ul> <li>there is a duplicate remote id within the batch</li> <li>there is a duplicate email within the batch, i.e. if there is a conflict between the data provided for one payee within the batch and that provided for another payee within the same batch).</li> </ul> <p>The validation at this stage is intra-batch only.</p> <p>Validation against payees who have already been invited occurs subsequently during processing of the batch.</p>

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
$create_payees_request_v4 = new \VeloPayments\Client\Model\CreatePayeesRequestV4(); // \VeloPayments\Client\Model\CreatePayeesRequestV4 | Post payees to create.

try {
    $result = $apiInstance->v4CreatePayee($create_payees_request_v4);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeeInvitationApi->v4CreatePayee: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_payees_request_v4** | [**\VeloPayments\Client\Model\CreatePayeesRequestV4**](../Model/CreatePayeesRequestV4.md)| Post payees to create. | [optional] |

### Return type

[**\VeloPayments\Client\Model\CreatePayeesCSVResponseV4**](../Model/CreatePayeesCSVResponseV4.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: `application/json`, `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
