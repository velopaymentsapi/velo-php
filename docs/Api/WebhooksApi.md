# VeloPayments\Client\WebhooksApi

All URIs are relative to https://api.sandbox.velopayments.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createWebhookV1()**](WebhooksApi.md#createWebhookV1) | **POST** /v1/webhooks | Create Webhook |
| [**getWebhookV1()**](WebhooksApi.md#getWebhookV1) | **GET** /v1/webhooks/{webhookId} | Get details about the given webhook. |
| [**listWebhooksV1()**](WebhooksApi.md#listWebhooksV1) | **GET** /v1/webhooks | List the details about the webhooks for the given payor. |
| [**pingWebhookV1()**](WebhooksApi.md#pingWebhookV1) | **POST** /v1/webhooks/{webhookId}/ping |  |
| [**updateWebhookV1()**](WebhooksApi.md#updateWebhookV1) | **POST** /v1/webhooks/{webhookId} | Update Webhook |


## `createWebhookV1()`

```php
createWebhookV1($create_webhook_request)
```

Create Webhook

Create Webhook

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_webhook_request = new \VeloPayments\Client\Model\CreateWebhookRequest(); // \VeloPayments\Client\Model\CreateWebhookRequest

try {
    $apiInstance->createWebhookV1($create_webhook_request);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->createWebhookV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_webhook_request** | [**\VeloPayments\Client\Model\CreateWebhookRequest**](../Model/CreateWebhookRequest.md)|  | [optional] |

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

## `getWebhookV1()`

```php
getWebhookV1($webhook_id): \VeloPayments\Client\Model\WebhookResponse
```

Get details about the given webhook.

Get details about the given webhook.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_id = 'webhook_id_example'; // string | Webhook id

try {
    $result = $apiInstance->getWebhookV1($webhook_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->getWebhookV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_id** | **string**| Webhook id | |

### Return type

[**\VeloPayments\Client\Model\WebhookResponse**](../Model/WebhookResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listWebhooksV1()`

```php
listWebhooksV1($payor_id, $page, $page_size): \VeloPayments\Client\Model\WebhooksResponse
```

List the details about the webhooks for the given payor.

List the details about the webhooks for the given payor.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The Payor ID
$page = 1; // int | Page number. Default is 1.
$page_size = 25; // int | The number of results to return in a page

try {
    $result = $apiInstance->listWebhooksV1($payor_id, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->listWebhooksV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payor_id** | **string**| The Payor ID | |
| **page** | **int**| Page number. Default is 1. | [optional] [default to 1] |
| **page_size** | **int**| The number of results to return in a page | [optional] [default to 25] |

### Return type

[**\VeloPayments\Client\Model\WebhooksResponse**](../Model/WebhooksResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `pingWebhookV1()`

```php
pingWebhookV1($webhook_id): \VeloPayments\Client\Model\PingResponse
```



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_id = 'webhook_id_example'; // string | Webhook id

try {
    $result = $apiInstance->pingWebhookV1($webhook_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->pingWebhookV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_id** | **string**| Webhook id | |

### Return type

[**\VeloPayments\Client\Model\PingResponse**](../Model/PingResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateWebhookV1()`

```php
updateWebhookV1($webhook_id, $update_webhook_request)
```

Update Webhook

Update Webhook

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_id = 'webhook_id_example'; // string | Webhook id
$update_webhook_request = new \VeloPayments\Client\Model\UpdateWebhookRequest(); // \VeloPayments\Client\Model\UpdateWebhookRequest

try {
    $apiInstance->updateWebhookV1($webhook_id, $update_webhook_request);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->updateWebhookV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_id** | **string**| Webhook id | |
| **update_webhook_request** | [**\VeloPayments\Client\Model\UpdateWebhookRequest**](../Model/UpdateWebhookRequest.md)|  | [optional] |

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
