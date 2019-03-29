# OpenAPI\Client\PayeeServiceApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**deletePayeeById**](PayeeServiceApi.md#deletePayeeById) | **DELETE** /v1/payees/{payeeId} | Delete Payee by Id


# **deletePayeeById**
> deletePayeeById($payee_id)

Delete Payee by Id

This API will delete Payee by Id (UUID). Deletion by ID is not allowed if: * Payee ID is not found * If Payee has not been on-boarded * If Payee is in grace period * If Payee has existing payments

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\PayeeServiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payee_id = 'payee_id_example'; // string | The UUID of the payee.

try {
    $apiInstance->deletePayeeById($payee_id);
} catch (Exception $e) {
    echo 'Exception when calling PayeeServiceApi->deletePayeeById: ', $e->getMessage(), PHP_EOL;
}
?>
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

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

