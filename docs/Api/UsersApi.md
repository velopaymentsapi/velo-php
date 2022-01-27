# VeloPayments\Client\UsersApi

All URIs are relative to https://api.sandbox.velopayments.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteUserByIdV2()**](UsersApi.md#deleteUserByIdV2) | **DELETE** /v2/users/{userId} | Delete a User
[**disableUserV2()**](UsersApi.md#disableUserV2) | **POST** /v2/users/{userId}/disable | Disable a User
[**enableUserV2()**](UsersApi.md#enableUserV2) | **POST** /v2/users/{userId}/enable | Enable a User
[**getSelf()**](UsersApi.md#getSelf) | **GET** /v2/users/self | Get Self
[**getUserByIdV2()**](UsersApi.md#getUserByIdV2) | **GET** /v2/users/{userId} | Get User
[**inviteUser()**](UsersApi.md#inviteUser) | **POST** /v2/users/invite | Invite a User
[**listUsers()**](UsersApi.md#listUsers) | **GET** /v2/users | List Users
[**registerSms()**](UsersApi.md#registerSms) | **POST** /v2/users/registration/sms | Register SMS Number
[**resendToken()**](UsersApi.md#resendToken) | **POST** /v2/users/{userId}/tokens | Resend a token
[**roleUpdate()**](UsersApi.md#roleUpdate) | **POST** /v2/users/{userId}/roleUpdate | Update User Role
[**unlockUserV2()**](UsersApi.md#unlockUserV2) | **POST** /v2/users/{userId}/unlock | Unlock a User
[**unregisterMFA()**](UsersApi.md#unregisterMFA) | **POST** /v2/users/{userId}/mfa/unregister | Unregister MFA for the user
[**unregisterMFAForSelf()**](UsersApi.md#unregisterMFAForSelf) | **POST** /v2/users/self/mfa/unregister | Unregister MFA for Self
[**updatePasswordSelf()**](UsersApi.md#updatePasswordSelf) | **POST** /v2/users/self/password | Update Password for self
[**userDetailsUpdate()**](UsersApi.md#userDetailsUpdate) | **POST** /v2/users/{userId}/userDetailsUpdate | Update User Details
[**userDetailsUpdateForSelf()**](UsersApi.md#userDetailsUpdateForSelf) | **POST** /v2/users/self/userDetailsUpdate | Update User Details for self
[**validatePasswordSelf()**](UsersApi.md#validatePasswordSelf) | **POST** /v2/users/self/password/validate | Validate the proposed password


## `deleteUserByIdV2()`

```php
deleteUserByIdV2($user_id)
```

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
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_id** | **string**| The UUID of the User. |

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

## `disableUserV2()`

```php
disableUserV2($user_id)
```

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
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_id** | **string**| The UUID of the User. |

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

## `enableUserV2()`

```php
enableUserV2($user_id)
```

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
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_id** | **string**| The UUID of the User. |

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

## `getSelf()`

```php
getSelf(): \VeloPayments\Client\Model\UserResponse
```

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
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\VeloPayments\Client\Model\UserResponse**](../Model/UserResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getUserByIdV2()`

```php
getUserByIdV2($user_id): \VeloPayments\Client\Model\UserResponse
```

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
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_id** | **string**| The UUID of the User. |

### Return type

[**\VeloPayments\Client\Model\UserResponse**](../Model/UserResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `inviteUser()`

```php
inviteUser($invite_user_request)
```

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

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listUsers()`

```php
listUsers($type, $status, $entity_id, $payee_type, $page, $page_size, $sort): \VeloPayments\Client\Model\PagedUserResponse
```

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
$payee_type = new \VeloPayments\Client\Model\\VeloPayments\Client\Model\PayeeType(); // \VeloPayments\Client\Model\PayeeType | The Type of the Payee entity. Either COMPANY or INDIVIDUAL.
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | The number of results to return in a page
$sort = 'email:asc'; // string | List of sort fields (e.g. ?sort=email:asc,lastName:asc) Default is email:asc 'name' The supported sort fields are - email, lastNmae.

try {
    $result = $apiInstance->listUsers($type, $status, $entity_id, $payee_type, $page, $page_size, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->listUsers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **type** | [**\VeloPayments\Client\Model\UserType**](../Model/.md)| The Type of the User. | [optional]
 **status** | [**\VeloPayments\Client\Model\UserStatus**](../Model/.md)| The status of the User. | [optional]
 **entity_id** | **string**| The entityId of the User. | [optional]
 **payee_type** | [**\VeloPayments\Client\Model\PayeeType**](../Model/.md)| The Type of the Payee entity. Either COMPANY or INDIVIDUAL. | [optional]
 **page** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| The number of results to return in a page | [optional] [default to 25]
 **sort** | **string**| List of sort fields (e.g. ?sort&#x3D;email:asc,lastName:asc) Default is email:asc &#39;name&#39; The supported sort fields are - email, lastNmae. | [optional] [default to &#39;email:asc&#39;]

### Return type

[**\VeloPayments\Client\Model\PagedUserResponse**](../Model/PagedUserResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `registerSms()`

```php
registerSms($register_sms_request)
```

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

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

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

## `roleUpdate()`

```php
roleUpdate($user_id, $role_update_request)
```

Update User Role

<p>Update the user's Role</p>

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
$role_update_request = new \VeloPayments\Client\Model\RoleUpdateRequest(); // \VeloPayments\Client\Model\RoleUpdateRequest | The Role to change to

try {
    $apiInstance->roleUpdate($user_id, $role_update_request);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->roleUpdate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_id** | **string**| The UUID of the User. |
 **role_update_request** | [**\VeloPayments\Client\Model\RoleUpdateRequest**](../Model/RoleUpdateRequest.md)| The Role to change to |

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

## `unlockUserV2()`

```php
unlockUserV2($user_id)
```

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
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_id** | **string**| The UUID of the User. |

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

## `unregisterMFA()`

```php
unregisterMFA($user_id, $unregister_mfa_request)
```

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
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_id** | **string**| The UUID of the User. |
 **unregister_mfa_request** | [**\VeloPayments\Client\Model\UnregisterMFARequest**](../Model/UnregisterMFARequest.md)| The MFA Type to unregister |

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

## `unregisterMFAForSelf()`

```php
unregisterMFAForSelf($self_mfa_type_unregister_request, $authorization)
```

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
$authorization = 'authorization_example'; // string | Bearer token authorization leg of validate

try {
    $apiInstance->unregisterMFAForSelf($self_mfa_type_unregister_request, $authorization);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->unregisterMFAForSelf: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **self_mfa_type_unregister_request** | [**\VeloPayments\Client\Model\SelfMFATypeUnregisterRequest**](../Model/SelfMFATypeUnregisterRequest.md)| The MFA Type to unregister |
 **authorization** | **string**| Bearer token authorization leg of validate | [optional]

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

## `updatePasswordSelf()`

```php
updatePasswordSelf($self_update_password_request)
```

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

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `userDetailsUpdate()`

```php
userDetailsUpdate($user_id, $user_details_update_request)
```

Update User Details

<p>Update the profile details for the given user</p> <p>When updating Payor users with the role of payor.master_admin a verificationCode is required</p>

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
$user_details_update_request = new \VeloPayments\Client\Model\UserDetailsUpdateRequest(); // \VeloPayments\Client\Model\UserDetailsUpdateRequest | The details of the user to update

try {
    $apiInstance->userDetailsUpdate($user_id, $user_details_update_request);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->userDetailsUpdate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_id** | **string**| The UUID of the User. |
 **user_details_update_request** | [**\VeloPayments\Client\Model\UserDetailsUpdateRequest**](../Model/UserDetailsUpdateRequest.md)| The details of the user to update |

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

## `userDetailsUpdateForSelf()`

```php
userDetailsUpdateForSelf($payee_user_self_update_request)
```

Update User Details for self

<p>Update the profile details for the given user</p> <p>Only Payee user types are supported</p>

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
$payee_user_self_update_request = new \VeloPayments\Client\Model\PayeeUserSelfUpdateRequest(); // \VeloPayments\Client\Model\PayeeUserSelfUpdateRequest | The details of the user to update

try {
    $apiInstance->userDetailsUpdateForSelf($payee_user_self_update_request);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->userDetailsUpdateForSelf: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payee_user_self_update_request** | [**\VeloPayments\Client\Model\PayeeUserSelfUpdateRequest**](../Model/PayeeUserSelfUpdateRequest.md)| The details of the user to update |

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

## `validatePasswordSelf()`

```php
validatePasswordSelf($password_request): \VeloPayments\Client\Model\ValidatePasswordResponse
```

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

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
