# VeloPayments\Client\TokensApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**generateOTP**](TokensApi.md#generateOTP) | **POST** /v1/tokens/{tokenId}/otp | Generate an OTP
[**generateOTPForSMS**](TokensApi.md#generateOTPForSMS) | **POST** /v1/tokens/{tokenId}/otp/generate | Send an OTP to SMS Users
[**getQRCodeForMFA**](TokensApi.md#getQRCodeForMFA) | **GET** /v1/tokens/{tokenId}/mfa/qrcode | Get a QR Code image
[**getVerificationTokenById**](TokensApi.md#getVerificationTokenById) | **GET** /v1/tokens/{tokenId} | Get Token
[**registerMFA**](TokensApi.md#registerMFA) | **POST** /v1/tokens/{tokenId}/mfa/register | Register an MFA Device
[**resendToken**](TokensApi.md#resendToken) | **POST** /v2/users/{userId}/tokens | Resend a token
[**submitPassword**](TokensApi.md#submitPassword) | **POST** /v1/tokens/{tokenId}/password | Submit a password
[**unlockAccountWithToken**](TokensApi.md#unlockAccountWithToken) | **POST** /v1/tokens/{tokenId}/password/lockout | Unlock the user
[**validateMFA**](TokensApi.md#validateMFA) | **POST** /v1/tokens/{tokenId}/mfa/validate | Validate an MFA Device
[**validateOTP**](TokensApi.md#validateOTP) | **POST** /v1/tokens/{tokenId}/otp/validate | Validate an OTP
[**validatePassword**](TokensApi.md#validatePassword) | **POST** /v1/tokens/{tokenId}/password/validate | Validate the proposed password



## generateOTP

> generateOTP($token_id, $generate_otp_request)

Generate an OTP

Generate an OTP and send to the MFA type specified in the request body

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new VeloPayments\Client\Api\TokensApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$token_id = 'token_id_example'; // string | The UUID of the Token
$generate_otp_request = new \VeloPayments\Client\Model\GenerateOTPRequest(); // \VeloPayments\Client\Model\GenerateOTPRequest | The MFA type to send the generated OTP to

try {
    $apiInstance->generateOTP($token_id, $generate_otp_request);
} catch (Exception $e) {
    echo 'Exception when calling TokensApi->generateOTP: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **token_id** | [**string**](../Model/.md)| The UUID of the Token |
 **generate_otp_request** | [**\VeloPayments\Client\Model\GenerateOTPRequest**](../Model/GenerateOTPRequest.md)| The MFA type to send the generated OTP to |

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


## generateOTPForSMS

> generateOTPForSMS($token_id)

Send an OTP to SMS Users

<p>Generate an OTP and send to the SMS device if the user</p> <p>Only users who have SMS as their registered MFA device will receive an OTP</p> <p>Used in conjuction with endpoints that require the Velo-OTP header</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new VeloPayments\Client\Api\TokensApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$token_id = 'token_id_example'; // string | The UUID of the Token

try {
    $apiInstance->generateOTPForSMS($token_id);
} catch (Exception $e) {
    echo 'Exception when calling TokensApi->generateOTPForSMS: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **token_id** | [**string**](../Model/.md)| The UUID of the Token |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getQRCodeForMFA

> \SplFileObject getQRCodeForMFA($token_id, $width, $height)

Get a QR Code image

<p>Get a QR Code for an MFA device that supports it </p> <p>The device must have first been registered</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new VeloPayments\Client\Api\TokensApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$token_id = 'token_id_example'; // string | The UUID of the Token
$width = 56; // int | The width of the image
$height = 56; // int | The height of the image

try {
    $result = $apiInstance->getQRCodeForMFA($token_id, $width, $height);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TokensApi->getQRCodeForMFA: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **token_id** | [**string**](../Model/.md)| The UUID of the Token |
 **width** | **int**| The width of the image | [optional]
 **height** | **int**| The height of the image | [optional]

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: image/png, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getVerificationTokenById

> \VeloPayments\Client\Model\CheckTokenResponse getVerificationTokenById($token_id)

Get Token

Get a Single Verification Token by Id.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new VeloPayments\Client\Api\TokensApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$token_id = 'token_id_example'; // string | The UUID of the Token

try {
    $result = $apiInstance->getVerificationTokenById($token_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TokensApi->getVerificationTokenById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **token_id** | [**string**](../Model/.md)| The UUID of the Token |

### Return type

[**\VeloPayments\Client\Model\CheckTokenResponse**](../Model/CheckTokenResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## registerMFA

> \VeloPayments\Client\Model\RegisterMFAResponse registerMFA($token_id, $register_mfa_request)

Register an MFA Device

<p>Some MFA Devices based on TOTP require a registration step (Authy, Authenticator) </p> <p>Registering the device will create a shared secret that the MFA device uses to generate OTPs</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new VeloPayments\Client\Api\TokensApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$token_id = 'token_id_example'; // string | The UUID of the Token
$register_mfa_request = new \VeloPayments\Client\Model\RegisterMFARequest(); // \VeloPayments\Client\Model\RegisterMFARequest | The MFA Type to register

try {
    $result = $apiInstance->registerMFA($token_id, $register_mfa_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TokensApi->registerMFA: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **token_id** | [**string**](../Model/.md)| The UUID of the Token |
 **register_mfa_request** | [**\VeloPayments\Client\Model\RegisterMFARequest**](../Model/RegisterMFARequest.md)| The MFA Type to register |

### Return type

[**\VeloPayments\Client\Model\RegisterMFAResponse**](../Model/RegisterMFAResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## resendToken

> resendToken($user_id, $resend_token_request)

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
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_id** | [**string**](../Model/.md)| The UUID of the User. |
 **resend_token_request** | [**\VeloPayments\Client\Model\ResendTokenRequest**](../Model/ResendTokenRequest.md)| The type of token to resend |

### Return type

void (empty response body)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## submitPassword

> \VeloPayments\Client\Model\AccessTokenResponse submitPassword($token_id, $password_request, $velo_otp)

Submit a password

Submit a password

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new VeloPayments\Client\Api\TokensApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$token_id = 'token_id_example'; // string | The UUID of the Token
$password_request = new \VeloPayments\Client\Model\PasswordRequest(); // \VeloPayments\Client\Model\PasswordRequest | The password
$velo_otp = 'velo_otp_example'; // string | required when updating password using reset password <P> The OTP is supplied by the users MFA device

try {
    $result = $apiInstance->submitPassword($token_id, $password_request, $velo_otp);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TokensApi->submitPassword: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **token_id** | [**string**](../Model/.md)| The UUID of the Token |
 **password_request** | [**\VeloPayments\Client\Model\PasswordRequest**](../Model/PasswordRequest.md)| The password |
 **velo_otp** | **string**| required when updating password using reset password &lt;P&gt; The OTP is supplied by the users MFA device | [optional]

### Return type

[**\VeloPayments\Client\Model\AccessTokenResponse**](../Model/AccessTokenResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## unlockAccountWithToken

> unlockAccountWithToken($token_id)

Unlock the user

<p>When a user is locked out of their account due to execeding the limit of login attempts</p> <p>They can use a token to unlock their account </p> <p>Submitting the token will unlock the account associated with the token</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new VeloPayments\Client\Api\TokensApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$token_id = 'token_id_example'; // string | The UUID of the Token

try {
    $apiInstance->unlockAccountWithToken($token_id);
} catch (Exception $e) {
    echo 'Exception when calling TokensApi->unlockAccountWithToken: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **token_id** | [**string**](../Model/.md)| The UUID of the Token |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## validateMFA

> \VeloPayments\Client\Model\AccessTokenResponse validateMFA($token_id, $validate_mfa_request)

Validate an MFA Device

<p>Validate the user's registered MFA device with an OTP </p> <p>The response will be different based on the token type against which the MFA is validated </p> <p>For INVITE_MFA_USER tokens the response will be 200 and an access token will be returned i the response </p> <p>For MFA_REGISTRATION tokens the response will be 204</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new VeloPayments\Client\Api\TokensApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$token_id = 'token_id_example'; // string | The UUID of the Token
$validate_mfa_request = new \VeloPayments\Client\Model\ValidateMFARequest(); // \VeloPayments\Client\Model\ValidateMFARequest | The OTP generated or received by the device

try {
    $result = $apiInstance->validateMFA($token_id, $validate_mfa_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TokensApi->validateMFA: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **token_id** | [**string**](../Model/.md)| The UUID of the Token |
 **validate_mfa_request** | [**\VeloPayments\Client\Model\ValidateMFARequest**](../Model/ValidateMFARequest.md)| The OTP generated or received by the device |

### Return type

[**\VeloPayments\Client\Model\AccessTokenResponse**](../Model/AccessTokenResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## validateOTP

> validateOTP($token_id, $validate_otp_request)

Validate an OTP

<p>Validate the OTP </p> <p>The token that was used in the request will be revoked and a new token issued </p> <p>The new token link will be returned in a location header</p> <p>If there are too many invalid OTP requests the token may be disabled</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new VeloPayments\Client\Api\TokensApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$token_id = 'token_id_example'; // string | The UUID of the Token
$validate_otp_request = new \VeloPayments\Client\Model\ValidateOTPRequest(); // \VeloPayments\Client\Model\ValidateOTPRequest | The OTP generated and sent to the device

try {
    $apiInstance->validateOTP($token_id, $validate_otp_request);
} catch (Exception $e) {
    echo 'Exception when calling TokensApi->validateOTP: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **token_id** | [**string**](../Model/.md)| The UUID of the Token |
 **validate_otp_request** | [**\VeloPayments\Client\Model\ValidateOTPRequest**](../Model/ValidateOTPRequest.md)| The OTP generated and sent to the device |

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


## validatePassword

> \VeloPayments\Client\Model\ValidatePasswordResponse validatePassword($token_id, $password_request)

Validate the proposed password

validate the password and return a score

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new VeloPayments\Client\Api\TokensApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$token_id = 'token_id_example'; // string | The UUID of the Token
$password_request = new \VeloPayments\Client\Model\PasswordRequest(); // \VeloPayments\Client\Model\PasswordRequest | The password

try {
    $result = $apiInstance->validatePassword($token_id, $password_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TokensApi->validatePassword: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **token_id** | [**string**](../Model/.md)| The UUID of the Token |
 **password_request** | [**\VeloPayments\Client\Model\PasswordRequest**](../Model/PasswordRequest.md)| The password |

### Return type

[**\VeloPayments\Client\Model\ValidatePasswordResponse**](../Model/ValidatePasswordResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)

