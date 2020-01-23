# VeloPayments\Client\UsersApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteUserByIdV2**](UsersApi.md#deleteUserByIdV2) | **DELETE** /v2/users/{userId} | Delete a User
[**disableUserV2**](UsersApi.md#disableUserV2) | **POST** /v2/users/{userId}/disable | Disable a User
[**emailUpdate**](UsersApi.md#emailUpdate) | **POST** /v2/users/{userId}/emailUpdate | Update Email Address
[**enableUserV2**](UsersApi.md#enableUserV2) | **POST** /v2/users/{userId}/enable | Enable a User
[**getSelf**](UsersApi.md#getSelf) | **GET** /v2/users/self | Get Self
[**getUserByIdV2**](UsersApi.md#getUserByIdV2) | **GET** /v2/users/{userId} | Get User
[**inviteUser**](UsersApi.md#inviteUser) | **POST** /v2/users/invite | Invite a User
[**listUsers**](UsersApi.md#listUsers) | **GET** /v2/users | List Users
[**registerSms**](UsersApi.md#registerSms) | **POST** /v2/users/registration/sms | Register SMS Number
[**resendToken**](UsersApi.md#resendToken) | **POST** /v2/users/{userId}/tokens | Resend a token
[**unlockUserV2**](UsersApi.md#unlockUserV2) | **POST** /v2/users/{userId}/unlock | Unlock a User
[**unregisterMFA**](UsersApi.md#unregisterMFA) | **POST** /v2/users/{userId}/mfa/unregister | Unregister MFA for the user
[**unregisterMFAForSelf**](UsersApi.md#unregisterMFAForSelf) | **POST** /v2/users/self/mfa/unregister | Unregister MFA for Self
[**updatePasswordSelf**](UsersApi.md#updatePasswordSelf) | **POST** /v2/users/self/password | Update Password for self
[**validatePasswordSelf**](UsersApi.md#validatePasswordSelf) | **POST** /v2/users/self/password/validate | Validate the proposed password



## deleteUserByIdV2

> deleteUserByIdV2($user_id)

Delete a User

Delete User by Id.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_id = 'user_id_example'; // string | The UUID of the User.

try {
    $apiInstance->deleteUserByIdV2($user_id);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->deleteUserByIdV2: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_id** | [**string**](../Model/.md)| The UUID of the User. |

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


## disableUserV2

> disableUserV2($user_id)

Disable a User

<p>If a user is enabled this endpoint will disable them </p> <p>The invoker must have the appropriate permission </p> <p>A user cannot disable themself </p> <p>When a user is disabled any active access tokens will be revoked and the user will not be able to log in</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_id = 'user_id_example'; // string | The UUID of the User.

try {
    $apiInstance->disableUserV2($user_id);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->disableUserV2: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_id** | [**string**](../Model/.md)| The UUID of the User. |

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


## emailUpdate

> emailUpdate($user_id, $email_update_request)

Update Email Address

<p>Update the user's email address </p> <p>If the email address is already in use a 409 will be returned</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_id = 'user_id_example'; // string | The UUID of the User.
$email_update_request = new \VeloPayments\Client\Model\EmailUpdateRequest(); // \VeloPayments\Client\Model\EmailUpdateRequest | a new email address

try {
    $apiInstance->emailUpdate($user_id, $email_update_request);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->emailUpdate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_id** | [**string**](../Model/.md)| The UUID of the User. |
 **email_update_request** | [**\VeloPayments\Client\Model\EmailUpdateRequest**](../Model/EmailUpdateRequest.md)| a new email address |

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


## enableUserV2

> enableUserV2($user_id)

Enable a User

<p>If a user has been disabled this endpoints will enable them </p> <p>The invoker must have the appropriate permission </p> <p>A user cannot enable themself </p> <p>If the user is a payor user and the payor is disabled this operation is not allowed</p> <p>If enabling a payor user would breach the limit for master admin payor users the request will be rejected </p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_id = 'user_id_example'; // string | The UUID of the User.

try {
    $apiInstance->enableUserV2($user_id);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->enableUserV2: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_id** | [**string**](../Model/.md)| The UUID of the User. |

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


## getSelf

> \VeloPayments\Client\Model\UserResponse2 getSelf()

Get Self

Get the user's details

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getSelf();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->getSelf: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\VeloPayments\Client\Model\UserResponse2**](../Model/UserResponse2.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getUserByIdV2

> \VeloPayments\Client\Model\UserResponse getUserByIdV2($user_id)

Get User

Get a Single User by Id.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_id = 'user_id_example'; // string | The UUID of the User.

try {
    $result = $apiInstance->getUserByIdV2($user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->getUserByIdV2: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_id** | [**string**](../Model/.md)| The UUID of the User. |

### Return type

[**\VeloPayments\Client\Model\UserResponse**](../Model/UserResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## inviteUser

> inviteUser($invite_user_request)

Invite a User

Create a User and invite them to the system

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$invite_user_request = new \VeloPayments\Client\Model\InviteUserRequest(); // \VeloPayments\Client\Model\InviteUserRequest | Details of User to invite

try {
    $apiInstance->inviteUser($invite_user_request);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->inviteUser: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **invite_user_request** | [**\VeloPayments\Client\Model\InviteUserRequest**](../Model/InviteUserRequest.md)| Details of User to invite |

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


## listUsers

> \VeloPayments\Client\Model\PagedUserResponse listUsers($type, $status, $entity_id, $page, $page_size, $sort)

List Users

Get a paginated response listing the Users

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$type = new \VeloPayments\Client\Model\\VeloPayments\Client\Model\UserType(); // \VeloPayments\Client\Model\UserType | The Type of the User.
$status = new \VeloPayments\Client\Model\\VeloPayments\Client\Model\UserStatus(); // \VeloPayments\Client\Model\UserStatus | The status of the User.
$entity_id = 'entity_id_example'; // string | The entityId of the User.
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | Page size. Default is 25. Max allowable is 100.
$sort = 'email:asc'; // string | List of sort fields (e.g. ?sort=email:asc,lastName:asc) Default is email:asc 'name' The supported sort fields are - email, lastNmae.

try {
    $result = $apiInstance->listUsers($type, $status, $entity_id, $page, $page_size, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->listUsers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **type** | [**\VeloPayments\Client\Model\UserType**](../Model/.md)| The Type of the User. | [optional]
 **status** | [**\VeloPayments\Client\Model\UserStatus**](../Model/.md)| The status of the User. | [optional]
 **entity_id** | [**string**](../Model/.md)| The entityId of the User. | [optional]
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| Page size. Default is 25. Max allowable is 100. | [optional] [default to 25]
 **sort** | **string**| List of sort fields (e.g. ?sort&#x3D;email:asc,lastName:asc) Default is email:asc &#39;name&#39; The supported sort fields are - email, lastNmae. | [optional] [default to &#39;email:asc&#39;]

### Return type

[**\VeloPayments\Client\Model\PagedUserResponse**](../Model/PagedUserResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## registerSms

> registerSms($register_sms_request)

Register SMS Number

<p>Register an Sms number and send an OTP to it </p> <p>Used for manual verification of a user </p> <p>The backoffice user initiates the request to send the OTP to the user's sms </p> <p>The user then reads back the OTP which the backoffice user enters in the verifactionCode property for requests that require it</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$register_sms_request = new \VeloPayments\Client\Model\RegisterSmsRequest(); // \VeloPayments\Client\Model\RegisterSmsRequest | a SMS Number to send an OTP to

try {
    $apiInstance->registerSms($register_sms_request);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->registerSms: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **register_sms_request** | [**\VeloPayments\Client\Model\RegisterSmsRequest**](../Model/RegisterSmsRequest.md)| a SMS Number to send an OTP to |

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


$apiInstance = new VeloPayments\Client\Api\UsersApi(
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
    echo 'Exception when calling UsersApi->resendToken: ', $e->getMessage(), PHP_EOL;
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


## unlockUserV2

> unlockUserV2($user_id)

Unlock a User

If a user is locked this endpoint will unlock them

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_id = 'user_id_example'; // string | The UUID of the User.

try {
    $apiInstance->unlockUserV2($user_id);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->unlockUserV2: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_id** | [**string**](../Model/.md)| The UUID of the User. |

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


## unregisterMFA

> unregisterMFA($user_id, $unregister_mfa_request)

Unregister MFA for the user

<p>Unregister the MFA device for the user </p> <p>If the user does not require further verification then a register new MFA device token will be sent to them via their email address</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_id = 'user_id_example'; // string | The UUID of the User.
$unregister_mfa_request = new \VeloPayments\Client\Model\UnregisterMFARequest(); // \VeloPayments\Client\Model\UnregisterMFARequest | The MFA Type to unregister

try {
    $apiInstance->unregisterMFA($user_id, $unregister_mfa_request);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->unregisterMFA: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_id** | [**string**](../Model/.md)| The UUID of the User. |
 **unregister_mfa_request** | [**\VeloPayments\Client\Model\UnregisterMFARequest**](../Model/UnregisterMFARequest.md)| The MFA Type to unregister |

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


## unregisterMFAForSelf

> unregisterMFAForSelf($self_mfa_type_unregister_request)

Unregister MFA for Self

<p>Unregister the MFA device for the user </p> <p>If the user does not require further verification then a register new MFA device token will be sent to them via their email address</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$self_mfa_type_unregister_request = new \VeloPayments\Client\Model\SelfMFATypeUnregisterRequest(); // \VeloPayments\Client\Model\SelfMFATypeUnregisterRequest | The MFA Type to unregister

try {
    $apiInstance->unregisterMFAForSelf($self_mfa_type_unregister_request);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->unregisterMFAForSelf: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **self_mfa_type_unregister_request** | [**\VeloPayments\Client\Model\SelfMFATypeUnregisterRequest**](../Model/SelfMFATypeUnregisterRequest.md)| The MFA Type to unregister |

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


## updatePasswordSelf

> updatePasswordSelf($self_update_password_request)

Update Password for self

Update password for self

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$self_update_password_request = new \VeloPayments\Client\Model\SelfUpdatePasswordRequest(); // \VeloPayments\Client\Model\SelfUpdatePasswordRequest | The password

try {
    $apiInstance->updatePasswordSelf($self_update_password_request);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->updatePasswordSelf: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **self_update_password_request** | [**\VeloPayments\Client\Model\SelfUpdatePasswordRequest**](../Model/SelfUpdatePasswordRequest.md)| The password |

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


## validatePasswordSelf

> \VeloPayments\Client\Model\ValidatePasswordResponse validatePasswordSelf($password_request)

Validate the proposed password

validate the password and return a score

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$password_request = new \VeloPayments\Client\Model\PasswordRequest(); // \VeloPayments\Client\Model\PasswordRequest | The password

try {
    $result = $apiInstance->validatePasswordSelf($password_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->validatePasswordSelf: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **password_request** | [**\VeloPayments\Client\Model\PasswordRequest**](../Model/PasswordRequest.md)| The password |

### Return type

[**\VeloPayments\Client\Model\ValidatePasswordResponse**](../Model/ValidatePasswordResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)

