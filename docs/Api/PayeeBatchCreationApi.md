# OpenAPI\Client\PayeeBatchCreationApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**v2CreatePayee**](PayeeBatchCreationApi.md#v2CreatePayee) | **POST** /v2/payees | Intiate Payee Creation
[**v2QueryBatchStatus**](PayeeBatchCreationApi.md#v2QueryBatchStatus) | **GET** /v2/payees/batch/{batchId} | Query Batch Status


# **v2CreatePayee**
> \OpenAPI\Client\Model\CreatePayeesCSVResponse v2CreatePayee($create_payees_request)

Intiate Payee Creation

Initiate the process of creating 1 to 2000 payees in a batch Use the response location header to query for status (201 - Created, 400 - invalid request body, 409 - if there is a duplicate remote id within the batch / if there is a duplicate email within the batch).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\PayeeBatchCreationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_payees_request = new \OpenAPI\Client\Model\CreatePayeesRequest(); // \OpenAPI\Client\Model\CreatePayeesRequest | Post payees to create.

try {
    $result = $apiInstance->v2CreatePayee($create_payees_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeeBatchCreationApi->v2CreatePayee: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **create_payees_request** | [**\OpenAPI\Client\Model\CreatePayeesRequest**](../Model/CreatePayeesRequest.md)| Post payees to create. |

### Return type

[**\OpenAPI\Client\Model\CreatePayeesCSVResponse**](../Model/CreatePayeesCSVResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

 - **Content-Type**: application/json, multipart/formdata
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **v2QueryBatchStatus**
> \OpenAPI\Client\Model\QueryBatchResponse v2QueryBatchStatus($batch_id)

Query Batch Status

Fetch the status of a specific batch of payees. The batch is fully processed when status is ACCEPTED and pendingCount is 0 ( 200 - OK, 404 - batch not found ).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\PayeeBatchCreationApi(
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
    echo 'Exception when calling PayeeBatchCreationApi->v2QueryBatchStatus: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **batch_id** | [**string**](../Model/.md)| Batch Id |

### Return type

[**\OpenAPI\Client\Model\QueryBatchResponse**](../Model/QueryBatchResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

