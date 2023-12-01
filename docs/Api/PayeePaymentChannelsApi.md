# VeloPayments\Client\PayeePaymentChannelsApi

All URIs are relative to https://api.sandbox.velopayments.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createPaymentChannelV4()**](PayeePaymentChannelsApi.md#createPaymentChannelV4) | **POST** /v4/payees/{payeeId}/paymentChannels/ | Create Payment Channel |
| [**deletePaymentChannelV4()**](PayeePaymentChannelsApi.md#deletePaymentChannelV4) | **DELETE** /v4/payees/{payeeId}/paymentChannels/{paymentChannelId} | Delete Payment Channel |
| [**enablePaymentChannelV4()**](PayeePaymentChannelsApi.md#enablePaymentChannelV4) | **POST** /v4/payees/{payeeId}/paymentChannels/{paymentChannelId}/enable | Enable Payment Channel |
| [**getPaymentChannelV4()**](PayeePaymentChannelsApi.md#getPaymentChannelV4) | **GET** /v4/payees/{payeeId}/paymentChannels/{paymentChannelId} | Get Payment Channel Details |
| [**getPaymentChannelsV4()**](PayeePaymentChannelsApi.md#getPaymentChannelsV4) | **GET** /v4/payees/{payeeId}/paymentChannels/ | Get All Payment Channels Details |
| [**updatePaymentChannelOrderV4()**](PayeePaymentChannelsApi.md#updatePaymentChannelOrderV4) | **PUT** /v4/payees/{payeeId}/paymentChannels/order | Update Payees preferred Payment Channel order |
| [**updatePaymentChannelV4()**](PayeePaymentChannelsApi.md#updatePaymentChannelV4) | **POST** /v4/payees/{payeeId}/paymentChannels/{paymentChannelId} | Update Payment Channel |


## `createPaymentChannelV4()`

```php
createPaymentChannelV4($payee_id, $create_payment_channel_request_v4)
```

Create Payment Channel

<p>Create a payment channel</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeePaymentChannelsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payee_id = 2aa5d7e0-2ecb-403f-8494-1865ed0454e9; // string | The UUID of the payee.
$create_payment_channel_request_v4 = new \VeloPayments\Client\Model\CreatePaymentChannelRequestV4(); // \VeloPayments\Client\Model\CreatePaymentChannelRequestV4 | Post payment channel to update

try {
    $apiInstance->createPaymentChannelV4($payee_id, $create_payment_channel_request_v4);
} catch (Exception $e) {
    echo 'Exception when calling PayeePaymentChannelsApi->createPaymentChannelV4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payee_id** | **string**| The UUID of the payee. | |
| **create_payment_channel_request_v4** | [**\VeloPayments\Client\Model\CreatePaymentChannelRequestV4**](../Model/CreatePaymentChannelRequestV4.md)| Post payment channel to update | |

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

## `deletePaymentChannelV4()`

```php
deletePaymentChannelV4($payee_id, $payment_channel_id)
```

Delete Payment Channel

<p>Delete a payees payment channel</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeePaymentChannelsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payee_id = 2aa5d7e0-2ecb-403f-8494-1865ed0454e9; // string | The UUID of the payee.
$payment_channel_id = 70faaff7-2c32-4b44-b27f-f0b6c484e6f3; // string | The UUID of the payment channel.

try {
    $apiInstance->deletePaymentChannelV4($payee_id, $payment_channel_id);
} catch (Exception $e) {
    echo 'Exception when calling PayeePaymentChannelsApi->deletePaymentChannelV4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payee_id** | **string**| The UUID of the payee. | |
| **payment_channel_id** | **string**| The UUID of the payment channel. | |

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

## `enablePaymentChannelV4()`

```php
enablePaymentChannelV4($payee_id, $payment_channel_id)
```

Enable Payment Channel

<p>Enable a payment channel for a payee</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeePaymentChannelsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payee_id = 2aa5d7e0-2ecb-403f-8494-1865ed0454e9; // string | The UUID of the payee.
$payment_channel_id = 70faaff7-2c32-4b44-b27f-f0b6c484e6f3; // string | The UUID of the payment channel.

try {
    $apiInstance->enablePaymentChannelV4($payee_id, $payment_channel_id);
} catch (Exception $e) {
    echo 'Exception when calling PayeePaymentChannelsApi->enablePaymentChannelV4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payee_id** | **string**| The UUID of the payee. | |
| **payment_channel_id** | **string**| The UUID of the payment channel. | |

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

## `getPaymentChannelV4()`

```php
getPaymentChannelV4($payee_id, $payment_channel_id, $payable, $sensitive): \VeloPayments\Client\Model\PaymentChannelResponseV4
```

Get Payment Channel Details

<p>Get the payment channel details for the payee</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeePaymentChannelsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payee_id = 2aa5d7e0-2ecb-403f-8494-1865ed0454e9; // string | The UUID of the payee.
$payment_channel_id = 70faaff7-2c32-4b44-b27f-f0b6c484e6f3; // string | The UUID of the payment channel.
$payable = True; // bool | payable if true only return the payment channel if the payee is payable
$sensitive = True; // bool | <p>Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked.</p> <p>If set to true, and you have permission, the PII values will be returned as their original unmasked values.</p>

try {
    $result = $apiInstance->getPaymentChannelV4($payee_id, $payment_channel_id, $payable, $sensitive);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeePaymentChannelsApi->getPaymentChannelV4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payee_id** | **string**| The UUID of the payee. | |
| **payment_channel_id** | **string**| The UUID of the payment channel. | |
| **payable** | **bool**| payable if true only return the payment channel if the payee is payable | [optional] |
| **sensitive** | **bool**| &lt;p&gt;Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked.&lt;/p&gt; &lt;p&gt;If set to true, and you have permission, the PII values will be returned as their original unmasked values.&lt;/p&gt; | [optional] |

### Return type

[**\VeloPayments\Client\Model\PaymentChannelResponseV4**](../Model/PaymentChannelResponseV4.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPaymentChannelsV4()`

```php
getPaymentChannelsV4($payee_id, $payor_id, $payable, $sensitive, $ignore_payor_invite_status): \VeloPayments\Client\Model\PaymentChannelsResponseV4
```

Get All Payment Channels Details

<p>Get all payment channels details for a payee</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeePaymentChannelsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payee_id = 2aa5d7e0-2ecb-403f-8494-1865ed0454e9; // string | The UUID of the payee.
$payor_id = 'payor_id_example'; // string | <p>(UUID) the id of the Payor.</p> <p>If specified the payment channels are filtered to those mapped to this payor.</p>
$payable = True; // bool | payable if true only return the payment channel if the payee is payable
$sensitive = True; // bool | <p>Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked.</p> <p>If set to true, and you have permission, the PII values will be returned as their original unmasked values.</p>
$ignore_payor_invite_status = True; // bool | payable if true only return the payment channel if the payee is payable

try {
    $result = $apiInstance->getPaymentChannelsV4($payee_id, $payor_id, $payable, $sensitive, $ignore_payor_invite_status);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeePaymentChannelsApi->getPaymentChannelsV4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payee_id** | **string**| The UUID of the payee. | |
| **payor_id** | **string**| &lt;p&gt;(UUID) the id of the Payor.&lt;/p&gt; &lt;p&gt;If specified the payment channels are filtered to those mapped to this payor.&lt;/p&gt; | [optional] |
| **payable** | **bool**| payable if true only return the payment channel if the payee is payable | [optional] |
| **sensitive** | **bool**| &lt;p&gt;Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked.&lt;/p&gt; &lt;p&gt;If set to true, and you have permission, the PII values will be returned as their original unmasked values.&lt;/p&gt; | [optional] |
| **ignore_payor_invite_status** | **bool**| payable if true only return the payment channel if the payee is payable | [optional] |

### Return type

[**\VeloPayments\Client\Model\PaymentChannelsResponseV4**](../Model/PaymentChannelsResponseV4.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updatePaymentChannelOrderV4()`

```php
updatePaymentChannelOrderV4($payee_id, $payment_channel_order_request_v4)
```

Update Payees preferred Payment Channel order

<p>Update the Payee's preferred order of payment channels by passing in just the payment channel ids. When payments are made to the payee then in the absence of any other rules (e.g. matching on currency) the first payment channel in this list will be chosen. </p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeePaymentChannelsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payee_id = 2aa5d7e0-2ecb-403f-8494-1865ed0454e9; // string | The UUID of the payee.
$payment_channel_order_request_v4 = new \VeloPayments\Client\Model\PaymentChannelOrderRequestV4(); // \VeloPayments\Client\Model\PaymentChannelOrderRequestV4 | Put the payment channel ids in the preferred order

try {
    $apiInstance->updatePaymentChannelOrderV4($payee_id, $payment_channel_order_request_v4);
} catch (Exception $e) {
    echo 'Exception when calling PayeePaymentChannelsApi->updatePaymentChannelOrderV4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payee_id** | **string**| The UUID of the payee. | |
| **payment_channel_order_request_v4** | [**\VeloPayments\Client\Model\PaymentChannelOrderRequestV4**](../Model/PaymentChannelOrderRequestV4.md)| Put the payment channel ids in the preferred order | |

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

## `updatePaymentChannelV4()`

```php
updatePaymentChannelV4($payee_id, $payment_channel_id, $update_payment_channel_request_v4)
```

Update Payment Channel

<p>Update the details of the payment channel. Note payment channels are immutable. The current payment channel will be logically deleted as part of this call and replaced with new one with the correct details; this endpoint will return a Location header with a link to the new payment channel upon success. Updating a currently disabled payment channel will result in a new, fully enabled, payment channel.</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeePaymentChannelsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payee_id = 2aa5d7e0-2ecb-403f-8494-1865ed0454e9; // string | The UUID of the payee.
$payment_channel_id = 70faaff7-2c32-4b44-b27f-f0b6c484e6f3; // string | The UUID of the payment channel.
$update_payment_channel_request_v4 = new \VeloPayments\Client\Model\UpdatePaymentChannelRequestV4(); // \VeloPayments\Client\Model\UpdatePaymentChannelRequestV4 | Post payment channel to update

try {
    $apiInstance->updatePaymentChannelV4($payee_id, $payment_channel_id, $update_payment_channel_request_v4);
} catch (Exception $e) {
    echo 'Exception when calling PayeePaymentChannelsApi->updatePaymentChannelV4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payee_id** | **string**| The UUID of the payee. | |
| **payment_channel_id** | **string**| The UUID of the payment channel. | |
| **update_payment_channel_request_v4** | [**\VeloPayments\Client\Model\UpdatePaymentChannelRequestV4**](../Model/UpdatePaymentChannelRequestV4.md)| Post payment channel to update | |

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
