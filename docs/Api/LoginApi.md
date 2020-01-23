# VeloPayments\Client\LoginApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**logout**](LoginApi.md#logout) | **POST** /v1/logout | Logout
[**resetPassword**](LoginApi.md#resetPassword) | **POST** /v1/password/reset | Reset password
[**validateAccessToken**](LoginApi.md#validateAccessToken) | **POST** /v1/validate | validate
[**veloAuth**](LoginApi.md#veloAuth) | **POST** /v1/authenticate | Authentication endpoint



## logout

> logout()

Logout

<p>Given a valid access token in the header then log out the authenticated user or client </p> <p>Will revoke the token</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\LoginApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $apiInstance->logout();
} catch (Exception $e) {
    echo 'Exception when calling LoginApi->logout: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

This endpoint does not need any parameter.

### Return type

void (empty response body)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## resetPassword

> resetPassword($reset_password_request)

Reset password

<p>Reset password </p> <p>An email with an embedded link will be sent to the receipient of the email address </p> <p>The link will contain a token to be used for resetting the password </p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new VeloPayments\Client\Api\LoginApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$reset_password_request = new \VeloPayments\Client\Model\ResetPasswordRequest(); // \VeloPayments\Client\Model\ResetPasswordRequest | An Email address to send the reset password link to

try {
    $apiInstance->resetPassword($reset_password_request);
} catch (Exception $e) {
    echo 'Exception when calling LoginApi->resetPassword: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **reset_password_request** | [**\VeloPayments\Client\Model\ResetPasswordRequest**](../Model/ResetPasswordRequest.md)| An Email address to send the reset password link to |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## validateAccessToken

> \VeloPayments\Client\Model\AccessTokenResponse validateAccessToken($access_token_validation_request)

validate

<p>The second part of login involves validating using an MFA device</p> <p>An access token with PRE_AUTH authorities is required</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\LoginApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$access_token_validation_request = new \VeloPayments\Client\Model\AccessTokenValidationRequest(); // \VeloPayments\Client\Model\AccessTokenValidationRequest | An OTP from the user's registered MFA Device

try {
    $result = $apiInstance->validateAccessToken($access_token_validation_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LoginApi->validateAccessToken: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **access_token_validation_request** | [**\VeloPayments\Client\Model\AccessTokenValidationRequest**](../Model/AccessTokenValidationRequest.md)| An OTP from the user&#39;s registered MFA Device |

### Return type

[**\VeloPayments\Client\Model\AccessTokenResponse**](../Model/AccessTokenResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## veloAuth

> \VeloPayments\Client\Model\AuthResponse veloAuth($grant_type)

Authentication endpoint

Use this endpoint to obtain an access token for calling Velo Payments APIs. Use HTTP Basic Auth. String value of Basic and a Base64 endcoded string comprising the API key (e.g. 44a9537d-d55d-4b47-8082-14061c2bcdd8) and API secret  (e.g. c396b26b-137a-44fd-87f5-34631f8fd529) with a colon between them. E.g. Basic 44a9537d-d55d-4b47-8082-14061c2bcdd8:c396b26b-137a-44fd-87f5-34631f8fd529

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new VeloPayments\Client\Api\LoginApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$grant_type = 'client_credentials'; // string | OAuth grant type. Should use 'client_credentials'

try {
    $result = $apiInstance->veloAuth($grant_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LoginApi->veloAuth: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **grant_type** | **string**| OAuth grant type. Should use &#39;client_credentials&#39; | [optional] [default to &#39;client_credentials&#39;]

### Return type

[**\VeloPayments\Client\Model\AuthResponse**](../Model/AuthResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)

