# OpenAPI\Client\PayeeInvitationApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getPayor**](PayeeInvitationApi.md#getPayor) | **GET** /v1/payees/payors/{payorId}/invitationStatus | Get Payee Invitation Status
[**sendPayeeInvite**](PayeeInvitationApi.md#sendPayeeInvite) | **POST** /v1/payees/{payeeId}/invite | Invite Payee


# **getPayor**
> \OpenAPI\Client\Model\InvitationStatusResponse getPayor($payor_id)

Get Payee Invitation Status

Returns a list of payees associated with a payor, along with invitation status and grace period end date.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\PayeeInvitationApi(
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

[**\OpenAPI\Client\Model\InvitationStatusResponse**](../Model/InvitationStatusResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **sendPayeeInvite**
> \OpenAPI\Client\Model\InvitationStatusResponse sendPayeeInvite($payee_id, $payee_invite_request)

Invite Payee

Send an invite to the Payee The payee must have already been invited by the payor and not yet accepted or declined

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\PayeeInvitationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payee_id = 'payee_id_example'; // string | The UUID of the payee.
$payee_invite_request = new \OpenAPI\Client\Model\PayeeInviteRequest(); // \OpenAPI\Client\Model\PayeeInviteRequest | 

try {
    $result = $apiInstance->sendPayeeInvite($payee_id, $payee_invite_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeeInvitationApi->sendPayeeInvite: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payee_id** | [**string**](../Model/.md)| The UUID of the payee. |
 **payee_invite_request** | [**\OpenAPI\Client\Model\PayeeInviteRequest**](../Model/PayeeInviteRequest.md)|  |

### Return type

[**\OpenAPI\Client\Model\InvitationStatusResponse**](../Model/InvitationStatusResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

