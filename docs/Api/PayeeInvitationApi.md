# VeloPayments\Client\PayeeInvitationApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getPayor**](PayeeInvitationApi.md#getPayor) | **GET** /v1/payees/payors/{payorId}/invitationStatus | Get Payee Invitation Status
[**resendPayeeInvite**](PayeeInvitationApi.md#resendPayeeInvite) | **POST** /v1/payees/{payeeId}/invite | Resend Payee Invite
[**v2CreatePayee**](PayeeInvitationApi.md#v2CreatePayee) | **POST** /v2/payees | Intiate Payee Creation
[**v2QueryBatchStatus**](PayeeInvitationApi.md#v2QueryBatchStatus) | **GET** /v2/payees/batch/{batchId} | Query Batch Status



## getPayor

> \VeloPayments\Client\Model\InvitationStatusResponse getPayor($payor_id)

Get Payee Invitation Status

Returns a list of payees associated with a payor, along with invitation status and grace period end date.

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
$payor_id = 'payor_id_example'; // string | The account owner Payor ID

try {
    $result = $apiInstance->getPayor($payor_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeeInvitationApi->getPayor: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID |

### Return type

[**\VeloPayments\Client\Model\InvitationStatusResponse**](../Model/InvitationStatusResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## resendPayeeInvite

> \VeloPayments\Client\Model\InvitationStatusResponse resendPayeeInvite($payee_id, $invite_payee_request)

Resend Payee Invite

Resend an invite to the Payee The payee must have already been invited by the payor and not yet accepted or declined Any previous invites to the payee by this Payor will be invalidated

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
$payee_id = 'payee_id_example'; // string | The UUID of the payee.
$invite_payee_request = new \VeloPayments\Client\Model\InvitePayeeRequest(); // \VeloPayments\Client\Model\InvitePayeeRequest | 

try {
    $result = $apiInstance->resendPayeeInvite($payee_id, $invite_payee_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeeInvitationApi->resendPayeeInvite: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payee_id** | [**string**](../Model/.md)| The UUID of the payee. |
 **invite_payee_request** | [**\VeloPayments\Client\Model\InvitePayeeRequest**](../Model/InvitePayeeRequest.md)|  |

### Return type

[**\VeloPayments\Client\Model\InvitationStatusResponse**](../Model/InvitationStatusResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## v2CreatePayee

> \VeloPayments\Client\Model\CreatePayeesCSVResponse v2CreatePayee($create_payees_request)

Intiate Payee Creation

Initiate the process of creating 1 to 2000 payees in a batch Use the response location header to query for status (201 - Created, 400 - invalid request body, 409 - if there is a duplicate remote id within the batch / if there is a duplicate email within the batch).

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
    $result = $apiInstance->v2CreatePayee($create_payees_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeeInvitationApi->v2CreatePayee: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **create_payees_request** | [**\VeloPayments\Client\Model\CreatePayeesRequest**](../Model/CreatePayeesRequest.md)| Post payees to create. |

### Return type

[**\VeloPayments\Client\Model\CreatePayeesCSVResponse**](../Model/CreatePayeesCSVResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: application/json, multipart/form-data
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## v2QueryBatchStatus

> \VeloPayments\Client\Model\QueryBatchResponse v2QueryBatchStatus($batch_id)

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
    $result = $apiInstance->v2QueryBatchStatus($batch_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeeInvitationApi->v2QueryBatchStatus: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **batch_id** | [**string**](../Model/.md)| Batch Id |

### Return type

[**\VeloPayments\Client\Model\QueryBatchResponse**](../Model/QueryBatchResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)

