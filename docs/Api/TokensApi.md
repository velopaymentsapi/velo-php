# VeloPayments\Client\TokensApi

All URIs are relative to https://api.sandbox.velopayments.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**resendToken()**](TokensApi.md#resendToken) | **POST** /v2/users/{userId}/tokens | Resend a token


## `resendToken()`

```php
resendToken($user_id, $resend_token_request)
```

Resend a token

<p>Resend the specified token </p> <p>The token to resend must already exist for the user </p> <p>It will be revoked and a new one issued</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\TokensApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_id = 'user_id_example'; // string | The UUID of the User.
$resend_token_request = new \VeloPayments\Client\Model\ResendTokenRequest(); // \VeloPayments\Client\Model\ResendTokenRequest | The type of token to resend

try {
    $apiInstance->resendToken($user_id, $resend_token_request);
} catch (Exception $e) {
    echo 'Exception when calling TokensApi->resendToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_id** | **string**| The UUID of the User. |
 **resend_token_request** | [**\VeloPayments\Client\Model\ResendTokenRequest**](../Model/ResendTokenRequest.md)| The type of token to resend |

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
