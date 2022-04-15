# VeloPayments\Client\LoginApi

All URIs are relative to https://api.sandbox.velopayments.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**logout()**](LoginApi.md#logout) | **POST** /v1/logout | Logout
[**resetPassword()**](LoginApi.md#resetPassword) | **POST** /v1/password/reset | Reset password
[**validateAccessToken()**](LoginApi.md#validateAccessToken) | **POST** /v1/validate | validate
[**veloAuth()**](LoginApi.md#veloAuth) | **POST** /v1/authenticate | Authentication endpoint


## `logout()`

```php
logout()
```

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
```

### Parameters

This endpoint does not need any parameter.

### Return type

void (empty response body)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `resetPassword()`

```php
resetPassword($reset_password_request)
```

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

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `validateAccessToken()`

```php
validateAccessToken($access_token_validation_request, $authorization): \VeloPayments\Client\Model\AccessTokenResponse
```

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
$authorization = 'authorization_example'; // string | Bearer token authorization leg of validate

try {
    $result = $apiInstance->validateAccessToken($access_token_validation_request, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LoginApi->validateAccessToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **access_token_validation_request** | [**\VeloPayments\Client\Model\AccessTokenValidationRequest**](../Model/AccessTokenValidationRequest.md)| An OTP from the user&#39;s registered MFA Device |
 **authorization** | **string**| Bearer token authorization leg of validate | [optional]

### Return type

[**\VeloPayments\Client\Model\AccessTokenResponse**](../Model/AccessTokenResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `veloAuth()`

```php
veloAuth($grant_type): \VeloPayments\Client\Model\AuthResponse
```

Authentication endpoint

<p>Use this endpoint to obtain an access token for calling Velo Payments APIs. </p> <p>You need your API key and API secret issued by Velo</p> <p>To login and get an access token the API key and API secret must be Base64 encoded by concatenating them with a colon between them</p> <p>e.g. Given an ApiKey: 44a9537d-d55d-4b47-8082-14061c2bcdd8 and ApiSecret: c396b26b-137a-44fd-87f5-34631f8fd529</p> <p>Using a Base64 encode function Base64Encoder().encode(\"44a9537d-d55d-4b47-8082-14061c2bcdd8:c396b26b-137a-44fd-87f5-34631f8fd529\")</p> <p>Included as a Basic Authorization header: -H \"Authorization: Basic NDRhOTUzN2QtZDU1ZC00YjQ3LTgwODItMTQwNjFjMmJjZGQ4OmMzOTZiMjZiLTEzN2EtNDRmZC04N2Y1LTM0NjMxZjhmZDUyOQ==\" </p>

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
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
