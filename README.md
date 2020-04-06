# PHP client for Velo
[![License](https://img.shields.io/badge/License-Apache%202.0-blue.svg)](https://opensource.org/licenses/Apache-2.0) [![npm version](https://badge.fury.io/ph/velopaymentsapi%2Fvelo-php.svg)](https://badge.fury.io/ph/velopaymentsapi%2Fvelo-php) [![CircleCI](https://circleci.com/gh/velopaymentsapi/velo-php.svg?style=svg)](https://circleci.com/gh/velopaymentsapi/velo-php)\
 
This library provides a PHP client that simplifies interactions with the Velo Payments API. For full details covering the API visit our docs at [Velo Payments APIs](https://apidocs.velopayments.com). Note: some of the Velo API calls which require authorization via an access token, see the full docs on how to configure.
Throughout this document and the Velo platform the following terms are used:

* **Payor.** An entity (typically a corporation) which wishes to pay funds to one or more payees via a payout.
* **Payee.** The recipient of funds paid out by a payor.
* **Payment.** A single transfer of funds from a payor to a payee.
* **Payout.** A batch of Payments, typically used by a payor to logically group payments (e.g. by business day). Technically there need be no relationship between the payments in a payout - a single payout can contain payments to multiple payees and/or multiple payments to a single payee.
* **Sandbox.** An integration environment provided by Velo Payments which offers a similar API experience to the production environment, but all funding and payment events are simulated, along with many other services such as OFAC sanctions list checking.

## Overview

The Velo Payments API allows a payor to perform a number of operations. The following is a list of the main capabilities in a natural order of execution:

* Authenticate with the Velo platform
* Maintain a collection of payees
* Query the payor’s current balance of funds within the platform and perform additional funding
* Issue payments to payees
* Query the platform for a history of those payments

This document describes the main concepts and APIs required to get up and running with the Velo Payments platform. It is not an exhaustive API reference. For that, please see the separate Velo Payments API Reference.

## API Considerations

The Velo Payments API is REST based and uses the JSON format for requests and responses.

Most calls are secured using OAuth 2 security and require a valid authentication access token for successful operation. See the Authentication section for details.

Where a dynamic value is required in the examples below, the {token} format is used, suggesting that the caller needs to supply the appropriate value of the token in question (without including the { or } characters).

Where curl examples are given, the –d @filename.json approach is used, indicating that the request body should be placed into a file named filename.json in the current directory. Each of the curl examples in this document should be considered a single line on the command-line, regardless of how they appear in print.

## Authenticating with the Velo Platform

Once Velo backoffice staff have added your organization as a payor within the Velo platform sandbox, they will create you a payor Id, an API key and an API secret and share these with you in a secure manner.

You will need to use these values to authenticate with the Velo platform in order to gain access to the APIs. The steps to take are explained in the following:

create a string comprising the API key (e.g. 44a9537d-d55d-4b47-8082-14061c2bcdd8) and API secret (e.g. c396b26b-137a-44fd-87f5-34631f8fd529) with a colon between them. E.g. 44a9537d-d55d-4b47-8082-14061c2bcdd8:c396b26b-137a-44fd-87f5-34631f8fd529

base64 encode this string. E.g.: NDRhOTUzN2QtZDU1ZC00YjQ3LTgwODItMTQwNjFjMmJjZGQ4OmMzOTZiMjZiLTEzN2EtNDRmZC04N2Y1LTM0NjMxZjhmZDUyOQ==

create an HTTP **Authorization** header with the value set to e.g. Basic NDRhOTUzN2QtZDU1ZC00YjQ3LTgwODItMTQwNjFjMmJjZGQ4OmMzOTZiMjZiLTEzN2EtNDRmZC04N2Y1LTM0NjMxZjhmZDUyOQ==

perform the Velo authentication REST call using the HTTP header created above e.g. via curl:

```
  curl -X POST \\
  -H \"Content-Type: application/json\" \\
  -H \"Authorization: Basic NDRhOTUzN2QtZDU1ZC00YjQ3LTgwODItMTQwNjFjMmJjZGQ4OmMzOTZiMjZiLTEzN2EtNDRmZC04N2Y1LTM0NjMxZjhmZDUyOQ==\" \\
  'https://api.sandbox.velopayments.com/v1/authenticate?grant_type=client_credentials'
```

If successful, this call will result in a **200** HTTP status code and a response body such as:

```
  {
    \"access_token\":\"19f6bafd-93fd-4747-b229-00507bbc991f\",
    \"token_type\":\"bearer\",
    \"expires_in\":1799,
    \"scope\":\"...\"
  }
```
## API access following authentication
Following successful authentication, the value of the access_token field in the response (indicated in green above) should then be presented with all subsequent API calls to allow the Velo platform to validate that the caller is authenticated.

This is achieved by setting the HTTP Authorization header with the value set to e.g. Bearer 19f6bafd-93fd-4747-b229-00507bbc991f such as the curl example below:

```
  -H \"Authorization: Bearer 19f6bafd-93fd-4747-b229-00507bbc991f \"
```

If you make other Velo API calls which require authorization but the Authorization header is missing or invalid then you will get a **401** HTTP status response.


This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: 2.20.118
- Package version: 2.20.118
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



$apiInstance = new VeloPayments\Client\Api\CountriesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->listSupportedCountries();
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
*CountriesApi* | [**listSupportedCountries**](docs/Api/CountriesApi.md#listsupportedcountries) | **GET** /v2/supportedCountries | List Supported Countries
*CountriesApi* | [**listSupportedCountriesV1**](docs/Api/CountriesApi.md#listsupportedcountriesv1) | **GET** /v1/supportedCountries | List Supported Countries
*CountriesApi* | [**v1PaymentChannelRulesGet**](docs/Api/CountriesApi.md#v1paymentchannelrulesget) | **GET** /v1/paymentChannelRules | List Payment Channel Country Rules
*CurrenciesApi* | [**listSupportedCurrencies**](docs/Api/CurrenciesApi.md#listsupportedcurrencies) | **GET** /v2/currencies | List Supported Currencies
*FundingManagerApi* | [**createAchFundingRequest**](docs/Api/FundingManagerApi.md#createachfundingrequest) | **POST** /v1/sourceAccounts/{sourceAccountId}/achFundingRequest | Create Funding Request
*FundingManagerApi* | [**createFundingRequest**](docs/Api/FundingManagerApi.md#createfundingrequest) | **POST** /v2/sourceAccounts/{sourceAccountId}/fundingRequest | Create Funding Request
*FundingManagerApi* | [**getFundingAccount**](docs/Api/FundingManagerApi.md#getfundingaccount) | **GET** /v1/fundingAccounts/{fundingAccountId} | Get Funding Account
*FundingManagerApi* | [**getFundingAccounts**](docs/Api/FundingManagerApi.md#getfundingaccounts) | **GET** /v1/fundingAccounts | Get Funding Accounts
*FundingManagerApi* | [**getFundingsV1**](docs/Api/FundingManagerApi.md#getfundingsv1) | **GET** /v1/paymentaudit/fundings | Get Fundings for Payor
*FundingManagerApi* | [**getSourceAccount**](docs/Api/FundingManagerApi.md#getsourceaccount) | **GET** /v1/sourceAccounts/{sourceAccountId} | Get details about given source account.
*FundingManagerApi* | [**getSourceAccountV2**](docs/Api/FundingManagerApi.md#getsourceaccountv2) | **GET** /v2/sourceAccounts/{sourceAccountId} | Get details about given source account.
*FundingManagerApi* | [**getSourceAccounts**](docs/Api/FundingManagerApi.md#getsourceaccounts) | **GET** /v1/sourceAccounts | Get list of source accounts
*FundingManagerApi* | [**getSourceAccountsV2**](docs/Api/FundingManagerApi.md#getsourceaccountsv2) | **GET** /v2/sourceAccounts | Get list of source accounts
*FundingManagerApi* | [**listFundingAuditDeltas**](docs/Api/FundingManagerApi.md#listfundingauditdeltas) | **GET** /v1/deltas/fundings | Get Funding Audit Delta
*FundingManagerApi* | [**setNotificationsRequest**](docs/Api/FundingManagerApi.md#setnotificationsrequest) | **POST** /v1/sourceAccounts/{sourceAccountId}/notifications | Set notifications
*FundingManagerApi* | [**transferFunds**](docs/Api/FundingManagerApi.md#transferfunds) | **POST** /v2/sourceAccounts/{sourceAccountId}/transfers | Transfer Funds between source accounts
*FundingManagerPrivateApi* | [**createFundingAccount**](docs/Api/FundingManagerPrivateApi.md#createfundingaccount) | **POST** /v1/fundingAccounts | Create Funding Account
*GetPayoutApi* | [**v3PayoutsPayoutIdGet**](docs/Api/GetPayoutApi.md#v3payoutspayoutidget) | **GET** /v3/payouts/{payoutId} | Get Payout Summary
*InstructPayoutApi* | [**v3PayoutsPayoutIdPost**](docs/Api/InstructPayoutApi.md#v3payoutspayoutidpost) | **POST** /v3/payouts/{payoutId} | Instruct Payout
*LoginApi* | [**logout**](docs/Api/LoginApi.md#logout) | **POST** /v1/logout | Logout
*LoginApi* | [**resetPassword**](docs/Api/LoginApi.md#resetpassword) | **POST** /v1/password/reset | Reset password
*LoginApi* | [**validateAccessToken**](docs/Api/LoginApi.md#validateaccesstoken) | **POST** /v1/validate | validate
*LoginApi* | [**veloAuth**](docs/Api/LoginApi.md#veloauth) | **POST** /v1/authenticate | Authentication endpoint
*PayeeInvitationApi* | [**getPayeesInvitationStatusV1**](docs/Api/PayeeInvitationApi.md#getpayeesinvitationstatusv1) | **GET** /v1/payees/payors/{payorId}/invitationStatus | Get Payee Invitation Status
*PayeeInvitationApi* | [**getPayeesInvitationStatusV2**](docs/Api/PayeeInvitationApi.md#getpayeesinvitationstatusv2) | **GET** /v2/payees/payors/{payorId}/invitationStatus | Get Payee Invitation Status
*PayeeInvitationApi* | [**getPayeesInvitationStatusV3**](docs/Api/PayeeInvitationApi.md#getpayeesinvitationstatusv3) | **GET** /v3/payees/payors/{payorId}/invitationStatus | Get Payee Invitation Status
*PayeeInvitationApi* | [**queryBatchStatusV2**](docs/Api/PayeeInvitationApi.md#querybatchstatusv2) | **GET** /v2/payees/batch/{batchId} | Query Batch Status
*PayeeInvitationApi* | [**queryBatchStatusV3**](docs/Api/PayeeInvitationApi.md#querybatchstatusv3) | **GET** /v3/payees/batch/{batchId} | Query Batch Status
*PayeeInvitationApi* | [**resendPayeeInviteV1**](docs/Api/PayeeInvitationApi.md#resendpayeeinvitev1) | **POST** /v1/payees/{payeeId}/invite | Resend Payee Invite
*PayeeInvitationApi* | [**resendPayeeInviteV3**](docs/Api/PayeeInvitationApi.md#resendpayeeinvitev3) | **POST** /v3/payees/{payeeId}/invite | Resend Payee Invite
*PayeeInvitationApi* | [**v2CreatePayee**](docs/Api/PayeeInvitationApi.md#v2createpayee) | **POST** /v2/payees | Initiate Payee Creation
*PayeeInvitationApi* | [**v3CreatePayee**](docs/Api/PayeeInvitationApi.md#v3createpayee) | **POST** /v3/payees | Initiate Payee Creation
*PayeesApi* | [**deletePayeeByIdV1**](docs/Api/PayeesApi.md#deletepayeebyidv1) | **DELETE** /v1/payees/{payeeId} | Delete Payee by Id
*PayeesApi* | [**deletePayeeByIdV3**](docs/Api/PayeesApi.md#deletepayeebyidv3) | **DELETE** /v3/payees/{payeeId} | Delete Payee by Id
*PayeesApi* | [**getPayeeByIdV1**](docs/Api/PayeesApi.md#getpayeebyidv1) | **GET** /v1/payees/{payeeId} | Get Payee by Id
*PayeesApi* | [**getPayeeByIdV2**](docs/Api/PayeesApi.md#getpayeebyidv2) | **GET** /v2/payees/{payeeId} | Get Payee by Id
*PayeesApi* | [**getPayeeByIdV3**](docs/Api/PayeesApi.md#getpayeebyidv3) | **GET** /v3/payees/{payeeId} | Get Payee by Id
*PayeesApi* | [**listPayeeChanges**](docs/Api/PayeesApi.md#listpayeechanges) | **GET** /v1/deltas/payees | List Payee Changes
*PayeesApi* | [**listPayeeChangesV3**](docs/Api/PayeesApi.md#listpayeechangesv3) | **GET** /v3/payees/deltas | List Payee Changes
*PayeesApi* | [**listPayeesV1**](docs/Api/PayeesApi.md#listpayeesv1) | **GET** /v1/payees | List Payees V1
*PayeesApi* | [**listPayeesV3**](docs/Api/PayeesApi.md#listpayeesv3) | **GET** /v3/payees | List Payees
*PayeesApi* | [**v1PayeesPayeeIdRemoteIdUpdatePost**](docs/Api/PayeesApi.md#v1payeespayeeidremoteidupdatepost) | **POST** /v1/payees/{payeeId}/remoteIdUpdate | Update Payee Remote Id
*PayeesApi* | [**v3PayeesPayeeIdRemoteIdUpdatePost**](docs/Api/PayeesApi.md#v3payeespayeeidremoteidupdatepost) | **POST** /v3/payees/{payeeId}/remoteIdUpdate | Update Payee Remote Id
*PaymentAuditServiceApi* | [**exportTransactionsCSVV3**](docs/Api/PaymentAuditServiceApi.md#exporttransactionscsvv3) | **GET** /v3/paymentaudit/transactions | Export Transactions
*PaymentAuditServiceApi* | [**exportTransactionsCSVV4**](docs/Api/PaymentAuditServiceApi.md#exporttransactionscsvv4) | **GET** /v4/paymentaudit/transactions | Export Transactions
*PaymentAuditServiceApi* | [**getFundingsV1**](docs/Api/PaymentAuditServiceApi.md#getfundingsv1) | **GET** /v1/paymentaudit/fundings | Get Fundings for Payor
*PaymentAuditServiceApi* | [**getPaymentDetails**](docs/Api/PaymentAuditServiceApi.md#getpaymentdetails) | **GET** /v3/paymentaudit/payments/{paymentId} | Get Payment
*PaymentAuditServiceApi* | [**getPaymentDetailsV4**](docs/Api/PaymentAuditServiceApi.md#getpaymentdetailsv4) | **GET** /v4/paymentaudit/payments/{paymentId} | Get Payment
*PaymentAuditServiceApi* | [**getPaymentsForPayout**](docs/Api/PaymentAuditServiceApi.md#getpaymentsforpayout) | **GET** /v3/paymentaudit/payouts/{payoutId} | Get Payments for Payout
*PaymentAuditServiceApi* | [**getPaymentsForPayoutV4**](docs/Api/PaymentAuditServiceApi.md#getpaymentsforpayoutv4) | **GET** /v4/paymentaudit/payouts/{payoutId} | Get Payments for Payout
*PaymentAuditServiceApi* | [**getPayoutsForPayorV3**](docs/Api/PaymentAuditServiceApi.md#getpayoutsforpayorv3) | **GET** /v3/paymentaudit/payouts | Get Payouts for Payor
*PaymentAuditServiceApi* | [**getPayoutsForPayorV4**](docs/Api/PaymentAuditServiceApi.md#getpayoutsforpayorv4) | **GET** /v4/paymentaudit/payouts | Get Payouts for Payor
*PaymentAuditServiceApi* | [**listPaymentChanges**](docs/Api/PaymentAuditServiceApi.md#listpaymentchanges) | **GET** /v1/deltas/payments | List Payment Changes
*PaymentAuditServiceApi* | [**listPaymentsAudit**](docs/Api/PaymentAuditServiceApi.md#listpaymentsaudit) | **GET** /v3/paymentaudit/payments | Get List of Payments
*PaymentAuditServiceApi* | [**listPaymentsAuditV4**](docs/Api/PaymentAuditServiceApi.md#listpaymentsauditv4) | **GET** /v4/paymentaudit/payments | Get List of Payments
*PayorsApi* | [**getPayorById**](docs/Api/PayorsApi.md#getpayorbyid) | **GET** /v1/payors/{payorId} | Get Payor
*PayorsApi* | [**getPayorByIdV2**](docs/Api/PayorsApi.md#getpayorbyidv2) | **GET** /v2/payors/{payorId} | Get Payor
*PayorsApi* | [**payorAddPayorLogo**](docs/Api/PayorsApi.md#payoraddpayorlogo) | **POST** /v1/payors/{payorId}/branding/logos | Add Logo
*PayorsApi* | [**payorCreateApiKeyRequest**](docs/Api/PayorsApi.md#payorcreateapikeyrequest) | **POST** /v1/payors/{payorId}/applications/{applicationId}/keys | Create API Key
*PayorsApi* | [**payorCreateApplicationRequest**](docs/Api/PayorsApi.md#payorcreateapplicationrequest) | **POST** /v1/payors/{payorId}/applications | Create Application
*PayorsApi* | [**payorEmailOptOut**](docs/Api/PayorsApi.md#payoremailoptout) | **POST** /v1/payors/{payorId}/reminderEmailsUpdate | Reminder Email Opt-Out
*PayorsApi* | [**payorGetBranding**](docs/Api/PayorsApi.md#payorgetbranding) | **GET** /v1/payors/{payorId}/branding | Get Branding
*PayorsApi* | [**payorLinks**](docs/Api/PayorsApi.md#payorlinks) | **GET** /v1/payorLinks | List Payor Links
*PayorsPrivateApi* | [**createPayorLinks**](docs/Api/PayorsPrivateApi.md#createpayorlinks) | **POST** /v1/payorLinks | Create a Payor Link
*PayoutHistoryApi* | [**getPaymentsForPayout**](docs/Api/PayoutHistoryApi.md#getpaymentsforpayout) | **GET** /v3/paymentaudit/payouts/{payoutId} | Get Payments for Payout
*PayoutHistoryApi* | [**getPaymentsForPayoutV4**](docs/Api/PayoutHistoryApi.md#getpaymentsforpayoutv4) | **GET** /v4/paymentaudit/payouts/{payoutId} | Get Payments for Payout
*PayoutHistoryApi* | [**getPayoutStatsV1**](docs/Api/PayoutHistoryApi.md#getpayoutstatsv1) | **GET** /v1/paymentaudit/payoutStatistics | Get Payout Statistics
*QuotePayoutApi* | [**v3PayoutsPayoutIdQuotePost**](docs/Api/QuotePayoutApi.md#v3payoutspayoutidquotepost) | **POST** /v3/payouts/{payoutId}/quote | Create a quote for the payout
*SubmitPayoutApi* | [**submitPayout**](docs/Api/SubmitPayoutApi.md#submitpayout) | **POST** /v3/payouts | Submit Payout
*TokensApi* | [**resendToken**](docs/Api/TokensApi.md#resendtoken) | **POST** /v2/users/{userId}/tokens | Resend a token
*UsersApi* | [**deleteUserByIdV2**](docs/Api/UsersApi.md#deleteuserbyidv2) | **DELETE** /v2/users/{userId} | Delete a User
*UsersApi* | [**disableUserV2**](docs/Api/UsersApi.md#disableuserv2) | **POST** /v2/users/{userId}/disable | Disable a User
*UsersApi* | [**enableUserV2**](docs/Api/UsersApi.md#enableuserv2) | **POST** /v2/users/{userId}/enable | Enable a User
*UsersApi* | [**getSelf**](docs/Api/UsersApi.md#getself) | **GET** /v2/users/self | Get Self
*UsersApi* | [**getUserByIdV2**](docs/Api/UsersApi.md#getuserbyidv2) | **GET** /v2/users/{userId} | Get User
*UsersApi* | [**inviteUser**](docs/Api/UsersApi.md#inviteuser) | **POST** /v2/users/invite | Invite a User
*UsersApi* | [**listUsers**](docs/Api/UsersApi.md#listusers) | **GET** /v2/users | List Users
*UsersApi* | [**registerSms**](docs/Api/UsersApi.md#registersms) | **POST** /v2/users/registration/sms | Register SMS Number
*UsersApi* | [**resendToken**](docs/Api/UsersApi.md#resendtoken) | **POST** /v2/users/{userId}/tokens | Resend a token
*UsersApi* | [**roleUpdate**](docs/Api/UsersApi.md#roleupdate) | **POST** /v2/users/{userId}/roleUpdate | Update User Role
*UsersApi* | [**unlockUserV2**](docs/Api/UsersApi.md#unlockuserv2) | **POST** /v2/users/{userId}/unlock | Unlock a User
*UsersApi* | [**unregisterMFA**](docs/Api/UsersApi.md#unregistermfa) | **POST** /v2/users/{userId}/mfa/unregister | Unregister MFA for the user
*UsersApi* | [**unregisterMFAForSelf**](docs/Api/UsersApi.md#unregistermfaforself) | **POST** /v2/users/self/mfa/unregister | Unregister MFA for Self
*UsersApi* | [**updatePasswordSelf**](docs/Api/UsersApi.md#updatepasswordself) | **POST** /v2/users/self/password | Update Password for self
*UsersApi* | [**userDetailsUpdate**](docs/Api/UsersApi.md#userdetailsupdate) | **POST** /v2/users/{userId}/userDetailsUpdate | Update User Details
*UsersApi* | [**validatePasswordSelf**](docs/Api/UsersApi.md#validatepasswordself) | **POST** /v2/users/self/password/validate | Validate the proposed password
*WithdrawPayoutApi* | [**v3PayoutsPayoutIdDelete**](docs/Api/WithdrawPayoutApi.md#v3payoutspayoutiddelete) | **DELETE** /v3/payouts/{payoutId} | Withdraw Payout


## Documentation For Models

 - [AcceptedPayment](docs/Model/AcceptedPayment.md)
 - [AccessTokenResponse](docs/Model/AccessTokenResponse.md)
 - [AccessTokenValidationRequest](docs/Model/AccessTokenValidationRequest.md)
 - [AuthResponse](docs/Model/AuthResponse.md)
 - [AutoTopUpConfig](docs/Model/AutoTopUpConfig.md)
 - [Challenge](docs/Model/Challenge.md)
 - [Company](docs/Model/Company.md)
 - [Company2](docs/Model/Company2.md)
 - [CompanyResponse](docs/Model/CompanyResponse.md)
 - [CompanyV1](docs/Model/CompanyV1.md)
 - [CreateFundingAccountRequest](docs/Model/CreateFundingAccountRequest.md)
 - [CreateIndividual](docs/Model/CreateIndividual.md)
 - [CreateIndividual2](docs/Model/CreateIndividual2.md)
 - [CreateIndividual2Name](docs/Model/CreateIndividual2Name.md)
 - [CreatePayee](docs/Model/CreatePayee.md)
 - [CreatePayee2](docs/Model/CreatePayee2.md)
 - [CreatePayeeAddress](docs/Model/CreatePayeeAddress.md)
 - [CreatePayeeAddress2](docs/Model/CreatePayeeAddress2.md)
 - [CreatePayeesCSVRequest](docs/Model/CreatePayeesCSVRequest.md)
 - [CreatePayeesCSVRequest2](docs/Model/CreatePayeesCSVRequest2.md)
 - [CreatePayeesCSVResponse](docs/Model/CreatePayeesCSVResponse.md)
 - [CreatePayeesCSVResponse2](docs/Model/CreatePayeesCSVResponse2.md)
 - [CreatePayeesCSVResponseRejectedCsvRows](docs/Model/CreatePayeesCSVResponseRejectedCsvRows.md)
 - [CreatePayeesRequest](docs/Model/CreatePayeesRequest.md)
 - [CreatePayeesRequest2](docs/Model/CreatePayeesRequest2.md)
 - [CreatePaymentChannel](docs/Model/CreatePaymentChannel.md)
 - [CreatePaymentChannel2](docs/Model/CreatePaymentChannel2.md)
 - [CreatePayorLinkRequest](docs/Model/CreatePayorLinkRequest.md)
 - [CreatePayoutRequest](docs/Model/CreatePayoutRequest.md)
 - [CurrencyType](docs/Model/CurrencyType.md)
 - [Error](docs/Model/Error.md)
 - [ErrorResponse](docs/Model/ErrorResponse.md)
 - [FailedSubmission](docs/Model/FailedSubmission.md)
 - [FailedSubmission2](docs/Model/FailedSubmission2.md)
 - [FundingAccountResponse](docs/Model/FundingAccountResponse.md)
 - [FundingAudit](docs/Model/FundingAudit.md)
 - [FundingEvent](docs/Model/FundingEvent.md)
 - [FundingEventType](docs/Model/FundingEventType.md)
 - [FundingPayorStatusAuditResponse](docs/Model/FundingPayorStatusAuditResponse.md)
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
 - [GetPayoutsResponseV4](docs/Model/GetPayoutsResponseV4.md)
 - [Individual](docs/Model/Individual.md)
 - [Individual2](docs/Model/Individual2.md)
 - [IndividualResponse](docs/Model/IndividualResponse.md)
 - [IndividualV1](docs/Model/IndividualV1.md)
 - [IndividualV1Name](docs/Model/IndividualV1Name.md)
 - [InlineResponse400](docs/Model/InlineResponse400.md)
 - [InlineResponse400Errors](docs/Model/InlineResponse400Errors.md)
 - [InlineResponse401](docs/Model/InlineResponse401.md)
 - [InlineResponse401Errors](docs/Model/InlineResponse401Errors.md)
 - [InlineResponse403](docs/Model/InlineResponse403.md)
 - [InlineResponse403Errors](docs/Model/InlineResponse403Errors.md)
 - [InlineResponse409](docs/Model/InlineResponse409.md)
 - [InlineResponse409Errors](docs/Model/InlineResponse409Errors.md)
 - [InvitationStatus](docs/Model/InvitationStatus.md)
 - [InvitationStatusResponse](docs/Model/InvitationStatusResponse.md)
 - [InvitePayeeRequest](docs/Model/InvitePayeeRequest.md)
 - [InvitePayeeRequest2](docs/Model/InvitePayeeRequest2.md)
 - [InviteUserRequest](docs/Model/InviteUserRequest.md)
 - [KycState](docs/Model/KycState.md)
 - [Language](docs/Model/Language.md)
 - [Language2](docs/Model/Language2.md)
 - [LinkForResponse](docs/Model/LinkForResponse.md)
 - [ListFundingAccountsResponse](docs/Model/ListFundingAccountsResponse.md)
 - [ListPaymentsResponse](docs/Model/ListPaymentsResponse.md)
 - [ListPaymentsResponsePage](docs/Model/ListPaymentsResponsePage.md)
 - [ListPaymentsResponseV4](docs/Model/ListPaymentsResponseV4.md)
 - [ListSourceAccountResponse](docs/Model/ListSourceAccountResponse.md)
 - [ListSourceAccountResponseLinks](docs/Model/ListSourceAccountResponseLinks.md)
 - [ListSourceAccountResponsePage](docs/Model/ListSourceAccountResponsePage.md)
 - [ListSourceAccountResponseV2](docs/Model/ListSourceAccountResponseV2.md)
 - [LocationType](docs/Model/LocationType.md)
 - [MFADetails](docs/Model/MFADetails.md)
 - [MFAType](docs/Model/MFAType.md)
 - [MarketingOptIn](docs/Model/MarketingOptIn.md)
 - [Notifications](docs/Model/Notifications.md)
 - [OfacStatus](docs/Model/OfacStatus.md)
 - [OfacStatus2](docs/Model/OfacStatus2.md)
 - [OnboardedStatus](docs/Model/OnboardedStatus.md)
 - [OnboardedStatus2](docs/Model/OnboardedStatus2.md)
 - [PageForResponse](docs/Model/PageForResponse.md)
 - [PageResourceFundingPayorStatusAuditResponseFundingPayorStatusAuditResponse](docs/Model/PageResourceFundingPayorStatusAuditResponseFundingPayorStatusAuditResponse.md)
 - [PagedPayeeInvitationStatusResponse](docs/Model/PagedPayeeInvitationStatusResponse.md)
 - [PagedPayeeInvitationStatusResponse2](docs/Model/PagedPayeeInvitationStatusResponse2.md)
 - [PagedPayeeInvitationStatusResponsePage](docs/Model/PagedPayeeInvitationStatusResponsePage.md)
 - [PagedPayeeResponse](docs/Model/PagedPayeeResponse.md)
 - [PagedPayeeResponse2](docs/Model/PagedPayeeResponse2.md)
 - [PagedPayeeResponse2Summary](docs/Model/PagedPayeeResponse2Summary.md)
 - [PagedPayeeResponseLinks](docs/Model/PagedPayeeResponseLinks.md)
 - [PagedPayeeResponsePage](docs/Model/PagedPayeeResponsePage.md)
 - [PagedPayeeResponseSummary](docs/Model/PagedPayeeResponseSummary.md)
 - [PagedResponse](docs/Model/PagedResponse.md)
 - [PagedResponsePage](docs/Model/PagedResponsePage.md)
 - [PagedUserResponse](docs/Model/PagedUserResponse.md)
 - [PagedUserResponseLinks](docs/Model/PagedUserResponseLinks.md)
 - [PagedUserResponsePage](docs/Model/PagedUserResponsePage.md)
 - [PasswordRequest](docs/Model/PasswordRequest.md)
 - [Payee](docs/Model/Payee.md)
 - [Payee2](docs/Model/Payee2.md)
 - [PayeeAddress](docs/Model/PayeeAddress.md)
 - [PayeeAddress2](docs/Model/PayeeAddress2.md)
 - [PayeeDelta](docs/Model/PayeeDelta.md)
 - [PayeeDelta2](docs/Model/PayeeDelta2.md)
 - [PayeeDeltaResponse](docs/Model/PayeeDeltaResponse.md)
 - [PayeeDeltaResponse2](docs/Model/PayeeDeltaResponse2.md)
 - [PayeeDeltaResponse2Links](docs/Model/PayeeDeltaResponse2Links.md)
 - [PayeeDeltaResponseLinks](docs/Model/PayeeDeltaResponseLinks.md)
 - [PayeeDeltaResponsePage](docs/Model/PayeeDeltaResponsePage.md)
 - [PayeeInvitationStatus](docs/Model/PayeeInvitationStatus.md)
 - [PayeeInvitationStatusResponse](docs/Model/PayeeInvitationStatusResponse.md)
 - [PayeeInvitationStatusResponse2](docs/Model/PayeeInvitationStatusResponse2.md)
 - [PayeePaymentChannel](docs/Model/PayeePaymentChannel.md)
 - [PayeePaymentChannel2](docs/Model/PayeePaymentChannel2.md)
 - [PayeePayorRef](docs/Model/PayeePayorRef.md)
 - [PayeePayorRefV2](docs/Model/PayeePayorRefV2.md)
 - [PayeePayorRefV3](docs/Model/PayeePayorRefV3.md)
 - [PayeeResponse](docs/Model/PayeeResponse.md)
 - [PayeeResponse2](docs/Model/PayeeResponse2.md)
 - [PayeeResponseV2](docs/Model/PayeeResponseV2.md)
 - [PayeeResponseV3](docs/Model/PayeeResponseV3.md)
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
 - [PaymentRails](docs/Model/PaymentRails.md)
 - [PaymentResponseV3](docs/Model/PaymentResponseV3.md)
 - [PaymentResponseV4](docs/Model/PaymentResponseV4.md)
 - [PaymentResponseV4Payout](docs/Model/PaymentResponseV4Payout.md)
 - [PayorAddress](docs/Model/PayorAddress.md)
 - [PayorAddressV2](docs/Model/PayorAddressV2.md)
 - [PayorAmlTransactionV3](docs/Model/PayorAmlTransactionV3.md)
 - [PayorAmlTransactionV4](docs/Model/PayorAmlTransactionV4.md)
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
 - [QueryBatchResponse2](docs/Model/QueryBatchResponse2.md)
 - [QuoteFxSummary](docs/Model/QuoteFxSummary.md)
 - [QuoteResponse](docs/Model/QuoteResponse.md)
 - [Region](docs/Model/Region.md)
 - [RegisterSmsRequest](docs/Model/RegisterSmsRequest.md)
 - [RejectedPayment](docs/Model/RejectedPayment.md)
 - [ResendTokenRequest](docs/Model/ResendTokenRequest.md)
 - [ResetPasswordRequest](docs/Model/ResetPasswordRequest.md)
 - [Role](docs/Model/Role.md)
 - [RoleUpdateRequest](docs/Model/RoleUpdateRequest.md)
 - [SelfMFATypeUnregisterRequest](docs/Model/SelfMFATypeUnregisterRequest.md)
 - [SelfUpdatePasswordRequest](docs/Model/SelfUpdatePasswordRequest.md)
 - [SetNotificationsRequest](docs/Model/SetNotificationsRequest.md)
 - [SourceAccount](docs/Model/SourceAccount.md)
 - [SourceAccountResponse](docs/Model/SourceAccountResponse.md)
 - [SourceAccountResponseV2](docs/Model/SourceAccountResponseV2.md)
 - [SourceAccountSummaryV3](docs/Model/SourceAccountSummaryV3.md)
 - [SourceAccountSummaryV4](docs/Model/SourceAccountSummaryV4.md)
 - [SupportedCountriesResponse](docs/Model/SupportedCountriesResponse.md)
 - [SupportedCountriesResponse2](docs/Model/SupportedCountriesResponse2.md)
 - [SupportedCountry](docs/Model/SupportedCountry.md)
 - [SupportedCountry2](docs/Model/SupportedCountry2.md)
 - [SupportedCurrency](docs/Model/SupportedCurrency.md)
 - [SupportedCurrencyResponse](docs/Model/SupportedCurrencyResponse.md)
 - [TransferRequest](docs/Model/TransferRequest.md)
 - [UnregisterMFARequest](docs/Model/UnregisterMFARequest.md)
 - [UpdateRemoteIdRequest](docs/Model/UpdateRemoteIdRequest.md)
 - [UserDetailsUpdateRequest](docs/Model/UserDetailsUpdateRequest.md)
 - [UserInfo](docs/Model/UserInfo.md)
 - [UserResponse](docs/Model/UserResponse.md)
 - [UserResponse2](docs/Model/UserResponse2.md)
 - [UserResponse2Roles](docs/Model/UserResponse2Roles.md)
 - [UserStatus](docs/Model/UserStatus.md)
 - [UserType](docs/Model/UserType.md)
 - [UserType2](docs/Model/UserType2.md)
 - [ValidatePasswordResponse](docs/Model/ValidatePasswordResponse.md)
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



## oAuthVeloBackOffice


- **Type**: OAuth
- **Flow**: application
- **Authorization URL**: 
- **Scopes**: 
- ** **: Scopes not required


## Author



