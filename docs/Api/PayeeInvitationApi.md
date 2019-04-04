# VeloPayments\Client\PayeeInvitationApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getPayor**](PayeeInvitationApi.md#getPayor) | **GET** /v1/payees/payors/{payorId}/invitationStatus | Get Payee Invitation Status
[**sendPayeeInvite**](PayeeInvitationApi.md#sendPayeeInvite) | **POST** /v1/payees/{payeeId}/invite | Invite Payee


# **getPayor**
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

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **sendPayeeInvite**
> \VeloPayments\Client\Model\InvitationStatusResponse sendPayeeInvite($payee_id, $payee_invite_request)

Invite Payee

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
$payee_invite_request = new \VeloPayments\Client\Model\PayeeInviteRequest(); // \VeloPayments\Client\Model\PayeeInviteRequest | 

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
 **payee_invite_request** | [**\VeloPayments\Client\Model\PayeeInviteRequest**](../Model/PayeeInviteRequest.md)|  |

### Return type

[**\VeloPayments\Client\Model\InvitationStatusResponse**](../Model/InvitationStatusResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

