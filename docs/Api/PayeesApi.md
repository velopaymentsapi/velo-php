# VeloPayments\Client\PayeesApi

All URIs are relative to *https://api.sandbox.velopayments.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getPayeeById**](PayeesApi.md#getPayeeById) | **GET** /v1/payees/{payeeId} | Get Payee by Id
[**listPayees**](PayeesApi.md#listPayees) | **GET** /v1/payees | List Payees


# **getPayeeById**
> \VeloPayments\Client\Model\Payee getPayeeById($payee_id, $sensitive)

Get Payee by Id

Get Payee by Id

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payee_id = 'payee_id_example'; // string | The UUID of the payee.
$sensitive = True; // bool | Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values.

try {
    $result = $apiInstance->getPayeeById($payee_id, $sensitive);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeesApi->getPayeeById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payee_id** | [**string**](../Model/.md)| The UUID of the payee. |
 **sensitive** | **bool**| Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. | [optional]

### Return type

[**\VeloPayments\Client\Model\Payee**](../Model/Payee.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listPayees**
> \VeloPayments\Client\Model\PayeeResponse listPayees($payor_id, $ofac_status, $onboarded_status, $email, $display_name, $remote_id, $payee_type, $payee_country, $page_number, $page_size, $sort)

List Payees

Get a paginated response listing the payees for a payor.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\PayeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_id = 'payor_id_example'; // string | The account owner Payor ID
$ofac_status = new \VeloPayments\Client\Model\\VeloPayments\Client\Model\OfacStatus(); // \VeloPayments\Client\Model\OfacStatus | The ofacStatus of the payees.
$onboarded_status = new \VeloPayments\Client\Model\\VeloPayments\Client\Model\OnboardedStatus(); // \VeloPayments\Client\Model\OnboardedStatus | The onboarded status of the payees.
$email = 'email_example'; // string | Email address
$display_name = 'display_name_example'; // string | The display name of the payees.
$remote_id = 'remote_id_example'; // string | The remote id of the payees.
$payee_type = new \VeloPayments\Client\Model\\VeloPayments\Client\Model\PayeeType(); // \VeloPayments\Client\Model\PayeeType | The onboarded status of the payees.
$payee_country = 'payee_country_example'; // string | The country of the payees.
$page_number = 1; // int | Page number. Default is 1.
$page_size = 25; // int | Page size. Default is 25. Max allowable is 100.
$sort = 'displayName:asc'; // string | List of sort fields (e.g. ?sort=onboardedStatus:asc,name:asc) Default is name:asc 'name' is treated as company name for companies - last name + ',' + firstName for individuals The supported sort fields are - payeeId, displayName, payoutStatus, onboardedStatus.

try {
    $result = $apiInstance->listPayees($payor_id, $ofac_status, $onboarded_status, $email, $display_name, $remote_id, $payee_type, $payee_country, $page_number, $page_size, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayeesApi->listPayees: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **payor_id** | [**string**](../Model/.md)| The account owner Payor ID |
 **ofac_status** | [**\VeloPayments\Client\Model\OfacStatus**](../Model/.md)| The ofacStatus of the payees. | [optional]
 **onboarded_status** | [**\VeloPayments\Client\Model\OnboardedStatus**](../Model/.md)| The onboarded status of the payees. | [optional]
 **email** | [**string**](../Model/.md)| Email address | [optional]
 **display_name** | **string**| The display name of the payees. | [optional]
 **remote_id** | **string**| The remote id of the payees. | [optional]
 **payee_type** | [**\VeloPayments\Client\Model\PayeeType**](../Model/.md)| The onboarded status of the payees. | [optional]
 **payee_country** | **string**| The country of the payees. | [optional]
 **page_number** | **int**| Page number. Default is 1. | [optional] [default to 1]
 **page_size** | **int**| Page size. Default is 25. Max allowable is 100. | [optional] [default to 25]
 **sort** | **string**| List of sort fields (e.g. ?sort&#x3D;onboardedStatus:asc,name:asc) Default is name:asc &#39;name&#39; is treated as company name for companies - last name + &#39;,&#39; + firstName for individuals The supported sort fields are - payeeId, displayName, payoutStatus, onboardedStatus. | [optional] [default to &#39;displayName:asc&#39;]

### Return type

[**\VeloPayments\Client\Model\PayeeResponse**](../Model/PayeeResponse.md)

### Authorization

[OAuth2](../../README.md#OAuth2)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

