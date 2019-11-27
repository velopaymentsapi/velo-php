# PHP client for Velo
[![Latest Stable Version](https://poser.pugx.org/velopaymentsapi/velo-php/v/stable.svg)](https://packagist.org/packages/velopaymentsapi/velo-php) [![License](https://poser.pugx.org/velopaymentsapi/velo-php/license.svg)](https://packagist.org/packages/velopaymentsapi/velo-php)
 
This library provides a PHP client that simplifies interactions with the Velo Payments API. For full details covering the API visit our docs at [Velo Payments APIs](https://apidocs.velopayments.com). Note: some of the Velo API calls which require authorization via an access token, see the full docs on how to configure.
This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: 2.17.8
- Package version: 2.17.8
- Build package: org.openapitools.codegen.languages.PhpClientCodegen

## Requirements

PHP 5.5 and later

## Installation & Usage

### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/velopaymentsapi/velo-php.git"
    }
  ],
  "require": {
    "velopaymentsapi/velo-php": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/VeloPayments/vendor/autoload.php');
```

## Tests

To run the unit tests:

```bash
composer install
./vendor/bin/phpunit
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



// Configure HTTP basic authorization: basicAuth
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new VeloPayments\Client\Api\AuthApi(
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
    echo 'Exception when calling AuthApi->veloAuth: ', $e->getMessage(), PHP_EOL;
}

?>
```

## Documentation for API Endpoints

All URIs are relative to *https://api.sandbox.velopayments.com*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*AuthApi* | [**veloAuth**](docs/Api/AuthApi.md#veloauth) | **POST** /v1/authenticate | Authentication endpoint
*CountriesApi* | [**listSupportedCountries**](docs/Api/CountriesApi.md#listsupportedcountries) | **GET** /v1/supportedCountries | List Supported Countries
*CountriesApi* | [**v1PaymentChannelRulesGet**](docs/Api/CountriesApi.md#v1paymentchannelrulesget) | **GET** /v1/paymentChannelRules | List Payment Channel Country Rules
*CurrenciesApi* | [**listSupportedCurrencies**](docs/Api/CurrenciesApi.md#listsupportedcurrencies) | **GET** /v2/currencies | List Supported Currencies
*FundingManagerApi* | [**createAchFundingRequest**](docs/Api/FundingManagerApi.md#createachfundingrequest) | **POST** /v1/sourceAccounts/{sourceAccountId}/achFundingRequest | Create Funding Request
*FundingManagerApi* | [**createFundingRequest**](docs/Api/FundingManagerApi.md#createfundingrequest) | **POST** /v2/sourceAccounts/{sourceAccountId}/fundingRequest | Create Funding Request
*FundingManagerApi* | [**getFundings**](docs/Api/FundingManagerApi.md#getfundings) | **GET** /v1/paymentaudit/fundings | Get Fundings for Payor
*FundingManagerApi* | [**getSourceAccount**](docs/Api/FundingManagerApi.md#getsourceaccount) | **GET** /v1/sourceAccounts/{sourceAccountId} | Get details about given source account.
*FundingManagerApi* | [**getSourceAccountV2**](docs/Api/FundingManagerApi.md#getsourceaccountv2) | **GET** /v2/sourceAccounts/{sourceAccountId} | Get details about given source account.
*FundingManagerApi* | [**getSourceAccounts**](docs/Api/FundingManagerApi.md#getsourceaccounts) | **GET** /v1/sourceAccounts | Get list of source accounts
*FundingManagerApi* | [**getSourceAccountsV2**](docs/Api/FundingManagerApi.md#getsourceaccountsv2) | **GET** /v2/sourceAccounts | Get list of source accounts
*FundingManagerApi* | [**listFundingAuditDeltas**](docs/Api/FundingManagerApi.md#listfundingauditdeltas) | **GET** /v1/deltas/fundings | List Funding changes
*FundingManagerApi* | [**setNotificationsRequest**](docs/Api/FundingManagerApi.md#setnotificationsrequest) | **POST** /v1/sourceAccounts/{sourceAccountId}/notifications | Set notifications
*GetPayoutApi* | [**v3PayoutsPayoutIdGet**](docs/Api/GetPayoutApi.md#v3payoutspayoutidget) | **GET** /v3/payouts/{payoutId} | Get Payout Summary
*InstructPayoutApi* | [**v3PayoutsPayoutIdPost**](docs/Api/InstructPayoutApi.md#v3payoutspayoutidpost) | **POST** /v3/payouts/{payoutId} | Instruct Payout
*PayeeInvitationApi* | [**getPayeesInvitationStatus**](docs/Api/PayeeInvitationApi.md#getpayeesinvitationstatus) | **GET** /v1/payees/payors/{payorId}/invitationStatus | Get Payee Invitation Status
*PayeeInvitationApi* | [**getPayeesInvitationStatusV2**](docs/Api/PayeeInvitationApi.md#getpayeesinvitationstatusv2) | **GET** /v2/payees/payors/{payorId}/invitationStatus | Get Payee Invitation Status
*PayeeInvitationApi* | [**resendPayeeInvite**](docs/Api/PayeeInvitationApi.md#resendpayeeinvite) | **POST** /v1/payees/{payeeId}/invite | Resend Payee Invite
*PayeeInvitationApi* | [**v2CreatePayee**](docs/Api/PayeeInvitationApi.md#v2createpayee) | **POST** /v2/payees | Intiate Payee Creation V2
*PayeeInvitationApi* | [**v2QueryBatchStatus**](docs/Api/PayeeInvitationApi.md#v2querybatchstatus) | **GET** /v2/payees/batch/{batchId} | Query Batch Status
*PayeeInvitationApi* | [**v3CreatePayee**](docs/Api/PayeeInvitationApi.md#v3createpayee) | **POST** /v3/payees | Intiate Payee Creation V3
*PayeeInvitationApi* | [**v3QueryBatchStatus**](docs/Api/PayeeInvitationApi.md#v3querybatchstatus) | **GET** /v3/payees/batch/{batchId} | Query Batch Status
*PayeesApi* | [**deletePayeeById**](docs/Api/PayeesApi.md#deletepayeebyid) | **DELETE** /v1/payees/{payeeId} | Delete Payee by Id
*PayeesApi* | [**getPayeeById**](docs/Api/PayeesApi.md#getpayeebyid) | **GET** /v1/payees/{payeeId} | Get Payee by Id
*PayeesApi* | [**listPayeeChanges**](docs/Api/PayeesApi.md#listpayeechanges) | **GET** /v1/deltas/payees | List Payee Changes
*PayeesApi* | [**listPayees**](docs/Api/PayeesApi.md#listpayees) | **GET** /v1/payees | List Payees
*PayeesApi* | [**listPayeesV3**](docs/Api/PayeesApi.md#listpayeesv3) | **GET** /v3/payees | List Payees
*PayeesApi* | [**v1PayeesPayeeIdRemoteIdUpdatePost**](docs/Api/PayeesApi.md#v1payeespayeeidremoteidupdatepost) | **POST** /v1/payees/{payeeId}/remoteIdUpdate | Update Payee Remote Id
*PaymentAuditServiceApi* | [**exportTransactionsCSV**](docs/Api/PaymentAuditServiceApi.md#exporttransactionscsv) | **GET** /v4/paymentaudit/transactions | Export Transactions
*PaymentAuditServiceApi* | [**getFundings**](docs/Api/PaymentAuditServiceApi.md#getfundings) | **GET** /v1/paymentaudit/fundings | Get Fundings for Payor
*PaymentAuditServiceApi* | [**getPaymentDetails**](docs/Api/PaymentAuditServiceApi.md#getpaymentdetails) | **GET** /v3/paymentaudit/payments/{paymentId} | Get Payment
*PaymentAuditServiceApi* | [**getPaymentDetailsV4**](docs/Api/PaymentAuditServiceApi.md#getpaymentdetailsv4) | **GET** /v4/paymentaudit/payments/{paymentId} | Get Payment
*PaymentAuditServiceApi* | [**getPaymentsForPayout**](docs/Api/PaymentAuditServiceApi.md#getpaymentsforpayout) | **GET** /v3/paymentaudit/payouts/{payoutId} | Get Payments for Payout
*PaymentAuditServiceApi* | [**getPaymentsForPayoutV4**](docs/Api/PaymentAuditServiceApi.md#getpaymentsforpayoutv4) | **GET** /v4/paymentaudit/payouts/{payoutId} | Get Payments for Payout
*PaymentAuditServiceApi* | [**getPayoutsForPayor**](docs/Api/PaymentAuditServiceApi.md#getpayoutsforpayor) | **GET** /v3/paymentaudit/payouts | Get Payouts for Payor
*PaymentAuditServiceApi* | [**getPayoutsForPayorV4**](docs/Api/PaymentAuditServiceApi.md#getpayoutsforpayorv4) | **GET** /v4/paymentaudit/payouts | Get Payouts for Payor
*PaymentAuditServiceApi* | [**listPaymentChanges**](docs/Api/PaymentAuditServiceApi.md#listpaymentchanges) | **GET** /v1/deltas/payments | List Payment Changes
*PaymentAuditServiceApi* | [**listPaymentsAudit**](docs/Api/PaymentAuditServiceApi.md#listpaymentsaudit) | **GET** /v3/paymentaudit/payments | Get List of Payments
*PaymentAuditServiceApi* | [**listPaymentsAuditV4**](docs/Api/PaymentAuditServiceApi.md#listpaymentsauditv4) | **GET** /v4/paymentaudit/payments | Get List of Payments
*PayorApplicationsApi* | [**payorCreateApiKeyRequest**](docs/Api/PayorApplicationsApi.md#payorcreateapikeyrequest) | **POST** /v1/payors/{payorId}/applications/{applicationId}/keys | Create API Key
*PayorApplicationsApi* | [**payorCreateApplicationRequest**](docs/Api/PayorApplicationsApi.md#payorcreateapplicationrequest) | **POST** /v1/payors/{payorId}/applications | Create Application
*PayorsApi* | [**getPayorById**](docs/Api/PayorsApi.md#getpayorbyid) | **GET** /v1/payors/{payorId} | Get Payor
*PayorsApi* | [**getPayorByIdV2**](docs/Api/PayorsApi.md#getpayorbyidv2) | **GET** /v2/payors/{payorId} | Get Payor
*PayorsApi* | [**payorAddPayorLogo**](docs/Api/PayorsApi.md#payoraddpayorlogo) | **POST** /v1/payors/{payorId}/branding/logos | Add Logo
*PayorsApi* | [**payorEmailOptOut**](docs/Api/PayorsApi.md#payoremailoptout) | **POST** /v1/payors/{payorId}/reminderEmailsUpdate | Reminder Email Opt-Out
*PayorsApi* | [**payorGetBranding**](docs/Api/PayorsApi.md#payorgetbranding) | **GET** /v1/payors/{payorId}/branding | Get Branding
*PayorsApi* | [**payorLinks**](docs/Api/PayorsApi.md#payorlinks) | **GET** /v1/payorLinks | List Payor Links
*PayoutHistoryApi* | [**getPaymentsForPayout**](docs/Api/PayoutHistoryApi.md#getpaymentsforpayout) | **GET** /v3/paymentaudit/payouts/{payoutId} | Get Payments for Payout
*PayoutHistoryApi* | [**getPaymentsForPayoutV4**](docs/Api/PayoutHistoryApi.md#getpaymentsforpayoutv4) | **GET** /v4/paymentaudit/payouts/{payoutId} | Get Payments for Payout
*PayoutHistoryApi* | [**getPayoutStats**](docs/Api/PayoutHistoryApi.md#getpayoutstats) | **GET** /v1/paymentaudit/payoutStatistics | Get Payout Statistics
*QuotePayoutApi* | [**v3PayoutsPayoutIdQuotePost**](docs/Api/QuotePayoutApi.md#v3payoutspayoutidquotepost) | **POST** /v3/payouts/{payoutId}/quote | Create a quote for the payout
*SubmitPayoutApi* | [**submitPayout**](docs/Api/SubmitPayoutApi.md#submitpayout) | **POST** /v3/payouts | Submit Payout
*WithdrawPayoutApi* | [**v3PayoutsPayoutIdDelete**](docs/Api/WithdrawPayoutApi.md#v3payoutspayoutiddelete) | **DELETE** /v3/payouts/{payoutId} | Withdraw Payout


## Documentation For Models

 - [AuthResponse](docs/Model/AuthResponse.md)
 - [AutoTopUpConfig](docs/Model/AutoTopUpConfig.md)
 - [Challenge](docs/Model/Challenge.md)
 - [CompanyResponse](docs/Model/CompanyResponse.md)
 - [CompanyV1](docs/Model/CompanyV1.md)
 - [CreateIndividual](docs/Model/CreateIndividual.md)
 - [CreateIndividual2](docs/Model/CreateIndividual2.md)
 - [CreatePayee](docs/Model/CreatePayee.md)
 - [CreatePayee2](docs/Model/CreatePayee2.md)
 - [CreatePayeeAddress](docs/Model/CreatePayeeAddress.md)
 - [CreatePayeeAddress2](docs/Model/CreatePayeeAddress2.md)
 - [CreatePayeesCSVRequest](docs/Model/CreatePayeesCSVRequest.md)
 - [CreatePayeesCSVRequest2](docs/Model/CreatePayeesCSVRequest2.md)
 - [CreatePayeesCSVResponse](docs/Model/CreatePayeesCSVResponse.md)
 - [CreatePayeesCSVResponse2](docs/Model/CreatePayeesCSVResponse2.md)
 - [CreatePayeesRequest](docs/Model/CreatePayeesRequest.md)
 - [CreatePayeesRequest2](docs/Model/CreatePayeesRequest2.md)
 - [CreatePaymentChannel](docs/Model/CreatePaymentChannel.md)
 - [CreatePaymentChannel2](docs/Model/CreatePaymentChannel2.md)
 - [CreatePayoutRequest](docs/Model/CreatePayoutRequest.md)
 - [Error](docs/Model/Error.md)
 - [ErrorResponse](docs/Model/ErrorResponse.md)
 - [FailedSubmission](docs/Model/FailedSubmission.md)
 - [FundingAudit](docs/Model/FundingAudit.md)
 - [FundingDelta](docs/Model/FundingDelta.md)
 - [FundingDeltaResponse](docs/Model/FundingDeltaResponse.md)
 - [FundingDeltaResponseLinks](docs/Model/FundingDeltaResponseLinks.md)
 - [FundingEvent](docs/Model/FundingEvent.md)
 - [FundingEventType](docs/Model/FundingEventType.md)
 - [FundingRequestV1](docs/Model/FundingRequestV1.md)
 - [FundingRequestV2](docs/Model/FundingRequestV2.md)
 - [FxSummaryV3](docs/Model/FxSummaryV3.md)
 - [FxSummaryV4](docs/Model/FxSummaryV4.md)
 - [GetFundingsResponse](docs/Model/GetFundingsResponse.md)
 - [GetFundingsResponseAllOf](docs/Model/GetFundingsResponseAllOf.md)
 - [GetPaymentsForPayoutResponseV3](docs/Model/GetPaymentsForPayoutResponseV3.md)
 - [GetPaymentsForPayoutResponseV3Page](docs/Model/GetPaymentsForPayoutResponseV3Page.md)
 - [GetPaymentsForPayoutResponseV3Summary](docs/Model/GetPaymentsForPayoutResponseV3Summary.md)
 - [GetPaymentsForPayoutResponseV4](docs/Model/GetPaymentsForPayoutResponseV4.md)
 - [GetPaymentsForPayoutResponseV4Summary](docs/Model/GetPaymentsForPayoutResponseV4Summary.md)
 - [GetPayoutStatistics](docs/Model/GetPayoutStatistics.md)
 - [GetPayoutsResponseV3](docs/Model/GetPayoutsResponseV3.md)
 - [GetPayoutsResponseV3Links](docs/Model/GetPayoutsResponseV3Links.md)
 - [GetPayoutsResponseV3Page](docs/Model/GetPayoutsResponseV3Page.md)
 - [GetPayoutsResponseV3Summary](docs/Model/GetPayoutsResponseV3Summary.md)
 - [GetPayoutsResponseV4](docs/Model/GetPayoutsResponseV4.md)
 - [IndividualResponse](docs/Model/IndividualResponse.md)
 - [IndividualV1](docs/Model/IndividualV1.md)
 - [IndividualV1Name](docs/Model/IndividualV1Name.md)
 - [InvitationStatus](docs/Model/InvitationStatus.md)
 - [InvitationStatusResponse](docs/Model/InvitationStatusResponse.md)
 - [InvitePayeeRequest](docs/Model/InvitePayeeRequest.md)
 - [Language](docs/Model/Language.md)
 - [ListPaymentsResponse](docs/Model/ListPaymentsResponse.md)
 - [ListPaymentsResponsePage](docs/Model/ListPaymentsResponsePage.md)
 - [ListPaymentsResponseSummary](docs/Model/ListPaymentsResponseSummary.md)
 - [ListSourceAccountResponse](docs/Model/ListSourceAccountResponse.md)
 - [ListSourceAccountResponseLinks](docs/Model/ListSourceAccountResponseLinks.md)
 - [ListSourceAccountResponsePage](docs/Model/ListSourceAccountResponsePage.md)
 - [ListSourceAccountResponseV2](docs/Model/ListSourceAccountResponseV2.md)
 - [ListSourceAccountResponseV2Page](docs/Model/ListSourceAccountResponseV2Page.md)
 - [MarketingOptIn](docs/Model/MarketingOptIn.md)
 - [Notifications](docs/Model/Notifications.md)
 - [OfacStatus](docs/Model/OfacStatus.md)
 - [OnboardedStatus](docs/Model/OnboardedStatus.md)
 - [PagedPayeeInvitationStatusResponse](docs/Model/PagedPayeeInvitationStatusResponse.md)
 - [PagedPayeeResponse](docs/Model/PagedPayeeResponse.md)
 - [PagedPayeeResponse2](docs/Model/PagedPayeeResponse2.md)
 - [PagedPayeeResponse2Summary](docs/Model/PagedPayeeResponse2Summary.md)
 - [PagedPayeeResponseLinks](docs/Model/PagedPayeeResponseLinks.md)
 - [PagedPayeeResponsePage](docs/Model/PagedPayeeResponsePage.md)
 - [PagedPayeeResponseSummary](docs/Model/PagedPayeeResponseSummary.md)
 - [PagedResponse](docs/Model/PagedResponse.md)
 - [PagedResponsePage](docs/Model/PagedResponsePage.md)
 - [Payee](docs/Model/Payee.md)
 - [PayeeAddress](docs/Model/PayeeAddress.md)
 - [PayeeDelta](docs/Model/PayeeDelta.md)
 - [PayeeDeltaResponse](docs/Model/PayeeDeltaResponse.md)
 - [PayeeDeltaResponseLinks](docs/Model/PayeeDeltaResponseLinks.md)
 - [PayeeDeltaResponsePage](docs/Model/PayeeDeltaResponsePage.md)
 - [PayeeInvitationStatus](docs/Model/PayeeInvitationStatus.md)
 - [PayeeInvitationStatusResponse](docs/Model/PayeeInvitationStatusResponse.md)
 - [PayeePaymentChannel](docs/Model/PayeePaymentChannel.md)
 - [PayeePayorRef](docs/Model/PayeePayorRef.md)
 - [PayeePayorRef2](docs/Model/PayeePayorRef2.md)
 - [PayeeResponse](docs/Model/PayeeResponse.md)
 - [PayeeResponse2](docs/Model/PayeeResponse2.md)
 - [PayeeType](docs/Model/PayeeType.md)
 - [PaymentAuditCurrencyV3](docs/Model/PaymentAuditCurrencyV3.md)
 - [PaymentAuditCurrencyV4](docs/Model/PaymentAuditCurrencyV4.md)
 - [PaymentChannelCountry](docs/Model/PaymentChannelCountry.md)
 - [PaymentChannelRule](docs/Model/PaymentChannelRule.md)
 - [PaymentChannelRulesResponse](docs/Model/PaymentChannelRulesResponse.md)
 - [PaymentDelta](docs/Model/PaymentDelta.md)
 - [PaymentDeltaResponse](docs/Model/PaymentDeltaResponse.md)
 - [PaymentEventResponseV3](docs/Model/PaymentEventResponseV3.md)
 - [PaymentEventResponseV4](docs/Model/PaymentEventResponseV4.md)
 - [PaymentInstruction](docs/Model/PaymentInstruction.md)
 - [PaymentResponseV3](docs/Model/PaymentResponseV3.md)
 - [PaymentResponseV4](docs/Model/PaymentResponseV4.md)
 - [PaymentResponseV4Payout](docs/Model/PaymentResponseV4Payout.md)
 - [PaymentStatus](docs/Model/PaymentStatus.md)
 - [PayorAddress](docs/Model/PayorAddress.md)
 - [PayorAddressV2](docs/Model/PayorAddressV2.md)
 - [PayorBrandingResponse](docs/Model/PayorBrandingResponse.md)
 - [PayorCreateApiKeyRequest](docs/Model/PayorCreateApiKeyRequest.md)
 - [PayorCreateApiKeyResponse](docs/Model/PayorCreateApiKeyResponse.md)
 - [PayorCreateApplicationRequest](docs/Model/PayorCreateApplicationRequest.md)
 - [PayorEmailOptOutRequest](docs/Model/PayorEmailOptOutRequest.md)
 - [PayorLinksResponse](docs/Model/PayorLinksResponse.md)
 - [PayorLinksResponseLinks](docs/Model/PayorLinksResponseLinks.md)
 - [PayorLinksResponsePayors](docs/Model/PayorLinksResponsePayors.md)
 - [PayorLogoRequest](docs/Model/PayorLogoRequest.md)
 - [PayorV1](docs/Model/PayorV1.md)
 - [PayorV2](docs/Model/PayorV2.md)
 - [PayoutPayorV4](docs/Model/PayoutPayorV4.md)
 - [PayoutPrincipalV4](docs/Model/PayoutPrincipalV4.md)
 - [PayoutStatusV3](docs/Model/PayoutStatusV3.md)
 - [PayoutStatusV4](docs/Model/PayoutStatusV4.md)
 - [PayoutSummaryAuditV3](docs/Model/PayoutSummaryAuditV3.md)
 - [PayoutSummaryAuditV4](docs/Model/PayoutSummaryAuditV4.md)
 - [PayoutSummaryResponse](docs/Model/PayoutSummaryResponse.md)
 - [PayoutTypeV4](docs/Model/PayoutTypeV4.md)
 - [QueryBatchResponse](docs/Model/QueryBatchResponse.md)
 - [QuoteFxSummary](docs/Model/QuoteFxSummary.md)
 - [QuoteResponse](docs/Model/QuoteResponse.md)
 - [RejectedPayment](docs/Model/RejectedPayment.md)
 - [SetNotificationsRequest](docs/Model/SetNotificationsRequest.md)
 - [SourceAccount](docs/Model/SourceAccount.md)
 - [SourceAccountResponse](docs/Model/SourceAccountResponse.md)
 - [SourceAccountResponseV2](docs/Model/SourceAccountResponseV2.md)
 - [SourceAccountSummaryV3](docs/Model/SourceAccountSummaryV3.md)
 - [SourceAccountSummaryV4](docs/Model/SourceAccountSummaryV4.md)
 - [SupportedCountriesResponse](docs/Model/SupportedCountriesResponse.md)
 - [SupportedCountry](docs/Model/SupportedCountry.md)
 - [SupportedCurrency](docs/Model/SupportedCurrency.md)
 - [SupportedCurrencyResponse](docs/Model/SupportedCurrencyResponse.md)
 - [UpdateRemoteIdRequest](docs/Model/UpdateRemoteIdRequest.md)
 - [WatchlistStatus](docs/Model/WatchlistStatus.md)


## Documentation For Authorization



## OAuth2


- **Type**: OAuth
- **Flow**: application
- **Authorization URL**: 
- **Scopes**: 
- ** **: Scopes not required



## basicAuth


- **Type**: HTTP basic authentication


## Author



