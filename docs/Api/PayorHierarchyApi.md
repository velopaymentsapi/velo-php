# VeloPayments\Client\PayorHierarchyApi

All URIs are relative to https://api.sandbox.velopayments.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**payorLinksV1()**](PayorHierarchyApi.md#payorLinksV1) | **GET** /v1/payorLinks | List Payor Links |


## `payorLinksV1()`

```php
payorLinksV1($descendants_of_payor, $parent_of_payor, $fields): \VeloPayments\Client\Model\PayorLinksResponse
```

List Payor Links

<p>If the payor is set up as part of a hierarchy you can use this API to traverse the hierarchy</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayorHierarchyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$descendants_of_payor = 'descendants_of_payor_example'; // string | The Payor ID from which to start the query to show all descendants
$parent_of_payor = 'parent_of_payor_example'; // string | Query for the parent payor details for this payor id
$fields = 'fields_example'; // string | <p>List of additional Payor fields to include in the response for each Payor</p> <p>The values of payorId and payorName are always included for each Payor by default</p> <p>You can add fields to the response for each payor by including them in the fields parameter separated by commas</p> <p>The supported fields are any combination of: primaryContactEmail,kycState</p>

try {
    $result = $apiInstance->payorLinksV1($descendants_of_payor, $parent_of_payor, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayorHierarchyApi->payorLinksV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **descendants_of_payor** | **string**| The Payor ID from which to start the query to show all descendants | [optional] |
| **parent_of_payor** | **string**| Query for the parent payor details for this payor id | [optional] |
| **fields** | **string**| &lt;p&gt;List of additional Payor fields to include in the response for each Payor&lt;/p&gt; &lt;p&gt;The values of payorId and payorName are always included for each Payor by default&lt;/p&gt; &lt;p&gt;You can add fields to the response for each payor by including them in the fields parameter separated by commas&lt;/p&gt; &lt;p&gt;The supported fields are any combination of: primaryContactEmail,kycState&lt;/p&gt; | [optional] |

### Return type

[**\VeloPayments\Client\Model\PayorLinksResponse**](../Model/PayorLinksResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
