# OpenAPIClient-php
## Terms and Definitions  Throughout this document and the Velo platform the following terms are used:  * **Payor.** An entity (typically a corporation) which wishes to pay funds to one or more payees via a payout. * **Payee.** The recipient of funds paid out by a payor. * **Payment.** A single transfer of funds from a payor to a payee. * **Payout.** A batch of Payments, typically used by a payor to logically group payments (e.g. by business day). Technically there need be no relationship between the payments in a payout - a single payout can contain payments to multiple payees and/or multiple payments to a single payee. * **Sandbox.** An integration environment provided by Velo Payments which offers a similar API experience to the production environment, but all funding and payment events are simulated, along with many other services such as OFAC sanctions list checking.  ## Overview  The Velo Payments API allows a payor to perform a number of operations. The following is a list of the main capabilities in a natural order of execution:  * Authenticate with the Velo platform * Maintain a collection of payees * Query the payor’s current balance of funds within the platform and perform additional funding * Issue payments to payees * Query the platform for a history of those payments  This document describes the main concepts and APIs required to get up and running with the Velo Payments platform. It is not an exhaustive API reference. For that, please see the separate Velo Payments API Reference.  ## API Considerations  The Velo Payments API is REST based and uses the JSON format for requests and responses.  Most calls are secured using OAuth 2 security and require a valid authentication access token for successful operation. See the Authentication section for details.  Where a dynamic value is required in the examples below, the {token} format is used, suggesting that the caller needs to supply the appropriate value of the token in question (without including the { or } characters).  Where curl examples are given, the –d @filename.json approach is used, indicating that the request body should be placed into a file named filename.json in the current directory. Each of the curl examples in this document should be considered a single line on the command-line, regardless of how they appear in print.  ## Authenticating with the Velo Platform  Once Velo backoffice staff have added your organization as a payor within the Velo platform sandbox, they will create you a payor Id, an API key and an API secret and share these with you in a secure manner.  You will need to use these values to authenticate with the Velo platform in order to gain access to the APIs. The steps to take are explained in the following:  create a string comprising the API key (e.g. 44a9537d-d55d-4b47-8082-14061c2bcdd8) and API secret (e.g. c396b26b-137a-44fd-87f5-34631f8fd529) with a colon between them. E.g. 44a9537d-d55d-4b47-8082-14061c2bcdd8:c396b26b-137a-44fd-87f5-34631f8fd529  base64 encode this string. E.g.: NDRhOTUzN2QtZDU1ZC00YjQ3LTgwODItMTQwNjFjMmJjZGQ4OmMzOTZiMjZiLTEzN2EtNDRmZC04N2Y1LTM0NjMxZjhmZDUyOQ==  create an HTTP **Authorization** header with the value set to e.g. Basic NDRhOTUzN2QtZDU1ZC00YjQ3LTgwODItMTQwNjFjMmJjZGQ4OmMzOTZiMjZiLTEzN2EtNDRmZC04N2Y1LTM0NjMxZjhmZDUyOQ==  perform the Velo authentication REST call using the HTTP header created above e.g. via curl:  ```   curl -X POST \\   -H \"Content-Type: application/json\" \\   -H \"Authorization: Basic NDRhOTUzN2QtZDU1ZC00YjQ3LTgwODItMTQwNjFjMmJjZGQ4OmMzOTZiMjZiLTEzN2EtNDRmZC04N2Y1LTM0NjMxZjhmZDUyOQ==\" \\   'https://api.sandbox.velopayments.com/v1/authenticate?grant_type=client_credentials' ```  If successful, this call will result in a **200** HTTP status code and a response body such as:  ```   {     \"access_token\":\"19f6bafd-93fd-4747-b229-00507bbc991f\",     \"token_type\":\"bearer\",     \"expires_in\":1799,     \"scope\":\"...\"   } ``` ## API access following authentication Following successful authentication, the value of the access_token field in the response (indicated in green above) should then be presented with all subsequent API calls to allow the Velo platform to validate that the caller is authenticated.  This is achieved by setting the HTTP Authorization header with the value set to e.g. Bearer 19f6bafd-93fd-4747-b229-00507bbc991f such as the curl example below:  ```   -H \"Authorization: Bearer 19f6bafd-93fd-4747-b229-00507bbc991f \" ```  If you make other Velo API calls which require authorization but the Authorization header is missing or invalid then you will get a **401** HTTP status response.

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: 2.10.61
- Build package: org.openapitools.codegen.languages.PhpClientCodegen

## Requirements

PHP 5.5 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/GIT_USER_ID/GIT_REPO_ID.git"
    }
  ],
  "require": {
    "GIT_USER_ID/GIT_REPO_ID": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/OpenAPIClient-php/vendor/autoload.php');
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth2
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\CountriesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payor_create_api_key_request = new \OpenAPI\Client\Model\PayorCreateApiKeyRequest(); // \OpenAPI\Client\Model\PayorCreateApiKeyRequest | Details of application API key to create

try {
    $result = $apiInstance->listSupportedCountries($payor_create_api_key_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CountriesApi->listSupportedCountries: ', $e->getMessage(), PHP_EOL;
}

?>
```

## Documentation for API Endpoints

All URIs are relative to *https://api.sandbox.velopayments.com*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*CountriesApi* | [**listSupportedCountries**](docs/Api/CountriesApi.md#listsupportedcountries) | **GET** /v1/supportedCountries | List Supported Countries
*CountriesApi* | [**v1PaymentChannelRulesGet**](docs/Api/CountriesApi.md#v1paymentchannelrulesget) | **GET** /v1/paymentChannelRules | List Payment Channel Country Rules
*CurrenciesApi* | [**listSupportedCurrencies**](docs/Api/CurrenciesApi.md#listsupportedcurrencies) | **GET** /v2/currencies | List Supported Currencies
*FundingManagerApi* | [**createAchFundingRequest**](docs/Api/FundingManagerApi.md#createachfundingrequest) | **POST** /v1/sourceAccounts/{sourceAccountId}/fundingRequest | Create Funding Request
*FundingManagerApi* | [**getSourceAccount**](docs/Api/FundingManagerApi.md#getsourceaccount) | **GET** /v1/sourceAccounts/{sourceAccountId} | Get details about given source account.
*FundingManagerApi* | [**listSourceAccounts**](docs/Api/FundingManagerApi.md#listsourceaccounts) | **GET** /v1/sourceAccounts | Get list of source accounts
*PayeeBatchCreationApi* | [**v2CreatePayee**](docs/Api/PayeeBatchCreationApi.md#v2createpayee) | **POST** /v2/payees | Intiate Payee Creation
*PayeeBatchCreationApi* | [**v2QueryBatchStatus**](docs/Api/PayeeBatchCreationApi.md#v2querybatchstatus) | **GET** /v2/payees/batch/{batchId} | Query Batch Status
*PayeeInvitationApi* | [**getPayor**](docs/Api/PayeeInvitationApi.md#getpayor) | **GET** /v1/payees/payors/{payorId}/invitationStatus | Get Payee Invitation Status
*PayeeInvitationApi* | [**sendPayeeInvite**](docs/Api/PayeeInvitationApi.md#sendpayeeinvite) | **POST** /v1/payees/{payeeId}/invite | Invite Payee
*PayeeServiceApi* | [**deletePayeeById**](docs/Api/PayeeServiceApi.md#deletepayeebyid) | **DELETE** /v1/payees/{payeeId} | Delete Payee by Id
*PayeesApi* | [**getPayeeById**](docs/Api/PayeesApi.md#getpayeebyid) | **GET** /v1/payees/{payeeId} | Get Payee by Id
*PayeesApi* | [**listPayees**](docs/Api/PayeesApi.md#listpayees) | **GET** /v1/payees | List Payees
*PaymentAuditServiceApi* | [**exportTransactionsCSV**](docs/Api/PaymentAuditServiceApi.md#exporttransactionscsv) | **GET** /v3/paymentaudit/transactions | Export Transactions
*PaymentAuditServiceApi* | [**getFundings**](docs/Api/PaymentAuditServiceApi.md#getfundings) | **GET** /v1/paymentaudit/fundings | Get Fundings for Payor
*PaymentAuditServiceApi* | [**getPaymentDetails**](docs/Api/PaymentAuditServiceApi.md#getpaymentdetails) | **GET** /v3/paymentaudit/payments/{paymentId} | Get Payment
*PaymentAuditServiceApi* | [**getPaymentsForPayout**](docs/Api/PaymentAuditServiceApi.md#getpaymentsforpayout) | **GET** /v3/paymentaudit/payouts/{payoutId} | Get Payments for Payout
*PaymentAuditServiceApi* | [**getPayoutStats**](docs/Api/PaymentAuditServiceApi.md#getpayoutstats) | **GET** /v1/paymentaudit/payoutStatistics | Get Payout Statistics
*PaymentAuditServiceApi* | [**getPayoutsForPayor**](docs/Api/PaymentAuditServiceApi.md#getpayoutsforpayor) | **GET** /v3/paymentaudit/payouts | Get Payouts for Payor
*PaymentAuditServiceApi* | [**listPaymentsAudit**](docs/Api/PaymentAuditServiceApi.md#listpaymentsaudit) | **GET** /v3/paymentaudit/payments | Get List of Payments
*PayorApplicationsApi* | [**payorCreateApiKeyRequest**](docs/Api/PayorApplicationsApi.md#payorcreateapikeyrequest) | **POST** /v1/payors/{payorId}/applications/{applicationId}/keys | Create API Key
*PayorApplicationsApi* | [**payorCreateApplicationRequest**](docs/Api/PayorApplicationsApi.md#payorcreateapplicationrequest) | **POST** /v1/payors/{payorId}/applications | Create Application
*PayorBrandingApi* | [**payorAddPayorLogo**](docs/Api/PayorBrandingApi.md#payoraddpayorlogo) | **POST** /v1/payors/{payorId}/branding/logos | Add Logo
*PayorBrandingApi* | [**payorGetBranding**](docs/Api/PayorBrandingApi.md#payorgetbranding) | **POST** /v1/payors/{payorId}/branding | Get Branding
*PayorFundingApi* | [**setPayorFundingBankDetails**](docs/Api/PayorFundingApi.md#setpayorfundingbankdetails) | **POST** /v1/payors/{payorId}/payorFundingBankDetailsUpdate | Set Funding Bank Details
*PayorInformationApi* | [**getPayorBalance**](docs/Api/PayorInformationApi.md#getpayorbalance) | **GET** /v1/payors/{payorId}/balance | Get Payor Balance
*PayorInformationApi* | [**getPayorById**](docs/Api/PayorInformationApi.md#getpayorbyid) | **GET** /v1/payors/{payorId} | Get Payor
*PayorInformationApi* | [**getSourceAccount**](docs/Api/PayorInformationApi.md#getsourceaccount) | **GET** /v1/sourceAccounts/{sourceAccountId} | Get details about given source account.
*PayorInformationApi* | [**listSourceAccounts**](docs/Api/PayorInformationApi.md#listsourceaccounts) | **GET** /v1/sourceAccounts | Get list of source accounts
*PayorServiceApi* | [**payorEmailOptOut**](docs/Api/PayorServiceApi.md#payoremailoptout) | **POST** /v1/payors/{payorId}/reminderEmailsUpdate | Reminder Email Opt-Out
*PayoutHistoryApi* | [**getPaymentsForPayout**](docs/Api/PayoutHistoryApi.md#getpaymentsforpayout) | **GET** /v3/paymentaudit/payouts/{payoutId} | Get Payments for Payout
*PayoutServiceApi* | [**submitPayout**](docs/Api/PayoutServiceApi.md#submitpayout) | **POST** /v3/payouts | Submit Payout
*PayoutServiceApi* | [**v3PayoutsPayoutIdDelete**](docs/Api/PayoutServiceApi.md#v3payoutspayoutiddelete) | **DELETE** /v3/payouts/{payoutId} | Withdraw Payout
*PayoutServiceApi* | [**v3PayoutsPayoutIdGet**](docs/Api/PayoutServiceApi.md#v3payoutspayoutidget) | **GET** /v3/payouts/{payoutId} | Get Payout Summary
*PayoutServiceApi* | [**v3PayoutsPayoutIdPost**](docs/Api/PayoutServiceApi.md#v3payoutspayoutidpost) | **POST** /v3/payouts/{payoutId} | Instruct Payout
*PayoutServiceApi* | [**v3PayoutsPayoutIdQuotePost**](docs/Api/PayoutServiceApi.md#v3payoutspayoutidquotepost) | **POST** /v3/payouts/{payoutId}/quote | Create a quote for the payout


## Documentation For Models

 - [Address](docs/Model/Address.md)
 - [Challenge](docs/Model/Challenge.md)
 - [CreatePayeesCSVRequest](docs/Model/CreatePayeesCSVRequest.md)
 - [CreatePayeesCSVResponse](docs/Model/CreatePayeesCSVResponse.md)
 - [CreatePayeesRequest](docs/Model/CreatePayeesRequest.md)
 - [CreatePayoutRequest](docs/Model/CreatePayoutRequest.md)
 - [FailedSubmission](docs/Model/FailedSubmission.md)
 - [FundingAudit](docs/Model/FundingAudit.md)
 - [FundingEvent](docs/Model/FundingEvent.md)
 - [FundingEventType](docs/Model/FundingEventType.md)
 - [FundingRequest](docs/Model/FundingRequest.md)
 - [FxSummaries](docs/Model/FxSummaries.md)
 - [FxSummary](docs/Model/FxSummary.md)
 - [GetFundingsResponse](docs/Model/GetFundingsResponse.md)
 - [GetPaymentsForPayoutResponse](docs/Model/GetPaymentsForPayoutResponse.md)
 - [GetPayoutStatistics](docs/Model/GetPayoutStatistics.md)
 - [GetPayoutsResponse](docs/Model/GetPayoutsResponse.md)
 - [InlineResponse200](docs/Model/InlineResponse200.md)
 - [InlineResponse2001](docs/Model/InlineResponse2001.md)
 - [InlineResponse2002](docs/Model/InlineResponse2002.md)
 - [InlineResponse2003](docs/Model/InlineResponse2003.md)
 - [InlineResponse2004](docs/Model/InlineResponse2004.md)
 - [InvitationStatusResponse](docs/Model/InvitationStatusResponse.md)
 - [Language](docs/Model/Language.md)
 - [ListPaymentsResponse](docs/Model/ListPaymentsResponse.md)
 - [ListSourceAccountResponse](docs/Model/ListSourceAccountResponse.md)
 - [OnboardedStatus](docs/Model/OnboardedStatus.md)
 - [PagedResponse](docs/Model/PagedResponse.md)
 - [PagedResponsePage](docs/Model/PagedResponsePage.md)
 - [Payee](docs/Model/Payee.md)
 - [PayeeInvitationStatus](docs/Model/PayeeInvitationStatus.md)
 - [PayeeInviteRequest](docs/Model/PayeeInviteRequest.md)
 - [PayeeResponse](docs/Model/PayeeResponse.md)
 - [PayeeType](docs/Model/PayeeType.md)
 - [PaymentAuditCurrency](docs/Model/PaymentAuditCurrency.md)
 - [PaymentChannel](docs/Model/PaymentChannel.md)
 - [PaymentChannelCountry](docs/Model/PaymentChannelCountry.md)
 - [PaymentChannelRule](docs/Model/PaymentChannelRule.md)
 - [PaymentChannelRulesResponse](docs/Model/PaymentChannelRulesResponse.md)
 - [PaymentEventResponse](docs/Model/PaymentEventResponse.md)
 - [PaymentInstruction](docs/Model/PaymentInstruction.md)
 - [PaymentResponse](docs/Model/PaymentResponse.md)
 - [PaymentsSummary](docs/Model/PaymentsSummary.md)
 - [Payor](docs/Model/Payor.md)
 - [PayorBalance](docs/Model/PayorBalance.md)
 - [PayorBrandingResponse](docs/Model/PayorBrandingResponse.md)
 - [PayorCreateApiKeyRequest](docs/Model/PayorCreateApiKeyRequest.md)
 - [PayorCreateApiKeyResponse](docs/Model/PayorCreateApiKeyResponse.md)
 - [PayorCreateApplicationRequest](docs/Model/PayorCreateApplicationRequest.md)
 - [PayorEmailOptOutRequest](docs/Model/PayorEmailOptOutRequest.md)
 - [PayorFundingBankDetailsUpdate](docs/Model/PayorFundingBankDetailsUpdate.md)
 - [PayorLogoRequest](docs/Model/PayorLogoRequest.md)
 - [PayorRef](docs/Model/PayorRef.md)
 - [PayoutStatus](docs/Model/PayoutStatus.md)
 - [PayoutSummaryAudit](docs/Model/PayoutSummaryAudit.md)
 - [PayoutSummaryResponse](docs/Model/PayoutSummaryResponse.md)
 - [QueryBatchResponse](docs/Model/QueryBatchResponse.md)
 - [QuoteFxSummary](docs/Model/QuoteFxSummary.md)
 - [QuoteResponse](docs/Model/QuoteResponse.md)
 - [RejectedPayment](docs/Model/RejectedPayment.md)
 - [SourceAccount](docs/Model/SourceAccount.md)
 - [SourceAccountResponse](docs/Model/SourceAccountResponse.md)
 - [SourceAccountSummary](docs/Model/SourceAccountSummary.md)
 - [SupportedCountriesResponse](docs/Model/SupportedCountriesResponse.md)
 - [SupportedCountry](docs/Model/SupportedCountry.md)
 - [SupportedCurrency](docs/Model/SupportedCurrency.md)
 - [SupportedCurrencyResponse](docs/Model/SupportedCurrencyResponse.md)


## Documentation For Authorization


## OAuth2

- **Type**: OAuth
- **Flow**: application
- **Authorization URL**: 
- **Scopes**: 
- ** **: Scopes not required


## Author




