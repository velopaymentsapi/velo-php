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



## Installation & Usage

### Requirements

PHP 7.2 and later.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

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
<?php
require_once('/path/to/VeloPayments/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



// Configure OAuth2 access token for authorization: OAuth2
$config = VeloPayments\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new VeloPayments\Client\Api\CountriesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listPaymentChannelRulesV1();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CountriesApi->listPaymentChannelRulesV1: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://api.sandbox.velopayments.com*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*CountriesApi* | [**listPaymentChannelRulesV1**](docs/Api/CountriesApi.md#listpaymentchannelrulesv1) | **GET** /v1/paymentChannelRules | List Payment Channel Country Rules
*CountriesApi* | [**listSupportedCountriesV1**](docs/Api/CountriesApi.md#listsupportedcountriesv1) | **GET** /v1/supportedCountries | List Supported Countries
*CountriesApi* | [**listSupportedCountriesV2**](docs/Api/CountriesApi.md#listsupportedcountriesv2) | **GET** /v2/supportedCountries | List Supported Countries
*CurrenciesApi* | [**listSupportedCurrenciesV2**](docs/Api/CurrenciesApi.md#listsupportedcurrenciesv2) | **GET** /v2/currencies | List Supported Currencies
*FundingManagerApi* | [**createAchFundingRequest**](docs/Api/FundingManagerApi.md#createachfundingrequest) | **POST** /v1/sourceAccounts/{sourceAccountId}/achFundingRequest | Create Funding Request
*FundingManagerApi* | [**createFundingRequest**](docs/Api/FundingManagerApi.md#createfundingrequest) | **POST** /v2/sourceAccounts/{sourceAccountId}/fundingRequest | Create Funding Request
*FundingManagerApi* | [**createFundingRequestV3**](docs/Api/FundingManagerApi.md#createfundingrequestv3) | **POST** /v3/sourceAccounts/{sourceAccountId}/fundingRequest | Create Funding Request
*FundingManagerApi* | [**getFundingAccount**](docs/Api/FundingManagerApi.md#getfundingaccount) | **GET** /v1/fundingAccounts/{fundingAccountId} | Get Funding Account
*FundingManagerApi* | [**getFundingAccountV2**](docs/Api/FundingManagerApi.md#getfundingaccountv2) | **GET** /v2/fundingAccounts/{fundingAccountId} | Get Funding Account
*FundingManagerApi* | [**getFundingAccounts**](docs/Api/FundingManagerApi.md#getfundingaccounts) | **GET** /v1/fundingAccounts | Get Funding Accounts
*FundingManagerApi* | [**getFundingAccountsV2**](docs/Api/FundingManagerApi.md#getfundingaccountsv2) | **GET** /v2/fundingAccounts | Get Funding Accounts
*FundingManagerApi* | [**getSourceAccount**](docs/Api/FundingManagerApi.md#getsourceaccount) | **GET** /v1/sourceAccounts/{sourceAccountId} | Get details about given source account.
*FundingManagerApi* | [**getSourceAccountV2**](docs/Api/FundingManagerApi.md#getsourceaccountv2) | **GET** /v2/sourceAccounts/{sourceAccountId} | Get details about given source account.
*FundingManagerApi* | [**getSourceAccountV3**](docs/Api/FundingManagerApi.md#getsourceaccountv3) | **GET** /v3/sourceAccounts/{sourceAccountId} | Get details about given source account.
*FundingManagerApi* | [**getSourceAccounts**](docs/Api/FundingManagerApi.md#getsourceaccounts) | **GET** /v1/sourceAccounts | Get list of source accounts
*FundingManagerApi* | [**getSourceAccountsV2**](docs/Api/FundingManagerApi.md#getsourceaccountsv2) | **GET** /v2/sourceAccounts | Get list of source accounts
*FundingManagerApi* | [**getSourceAccountsV3**](docs/Api/FundingManagerApi.md#getsourceaccountsv3) | **GET** /v3/sourceAccounts | Get list of source accounts
*FundingManagerApi* | [**listFundingAuditDeltas**](docs/Api/FundingManagerApi.md#listfundingauditdeltas) | **GET** /v1/deltas/fundings | Get Funding Audit Delta
*FundingManagerApi* | [**setNotificationsRequest**](docs/Api/FundingManagerApi.md#setnotificationsrequest) | **POST** /v1/sourceAccounts/{sourceAccountId}/notifications | Set notifications
*FundingManagerApi* | [**transferFunds**](docs/Api/FundingManagerApi.md#transferfunds) | **POST** /v2/sourceAccounts/{sourceAccountId}/transfers | Transfer Funds between source accounts
*FundingManagerApi* | [**transferFundsV3**](docs/Api/FundingManagerApi.md#transferfundsv3) | **POST** /v3/sourceAccounts/{sourceAccountId}/transfers | Transfer Funds between source accounts
*FundingManagerPrivateApi* | [**createFundingAccountV2**](docs/Api/FundingManagerPrivateApi.md#createfundingaccountv2) | **POST** /v2/fundingAccounts | Create Funding Account
*FundingManagerPrivateApi* | [**deleteSourceAccountV3**](docs/Api/FundingManagerPrivateApi.md#deletesourceaccountv3) | **DELETE** /v3/sourceAccounts/{sourceAccountId} | Delete a source account by ID
*LoginApi* | [**logout**](docs/Api/LoginApi.md#logout) | **POST** /v1/logout | Logout
*LoginApi* | [**resetPassword**](docs/Api/LoginApi.md#resetpassword) | **POST** /v1/password/reset | Reset password
*LoginApi* | [**validateAccessToken**](docs/Api/LoginApi.md#validateaccesstoken) | **POST** /v1/validate | validate
*LoginApi* | [**veloAuth**](docs/Api/LoginApi.md#veloauth) | **POST** /v1/authenticate | Authentication endpoint
*PayeeInvitationApi* | [**getPayeesInvitationStatusV3**](docs/Api/PayeeInvitationApi.md#getpayeesinvitationstatusv3) | **GET** /v3/payees/payors/{payorId}/invitationStatus | Get Payee Invitation Status
*PayeeInvitationApi* | [**getPayeesInvitationStatusV4**](docs/Api/PayeeInvitationApi.md#getpayeesinvitationstatusv4) | **GET** /v4/payees/payors/{payorId}/invitationStatus | Get Payee Invitation Status
*PayeeInvitationApi* | [**queryBatchStatusV3**](docs/Api/PayeeInvitationApi.md#querybatchstatusv3) | **GET** /v3/payees/batch/{batchId} | Query Batch Status
*PayeeInvitationApi* | [**queryBatchStatusV4**](docs/Api/PayeeInvitationApi.md#querybatchstatusv4) | **GET** /v4/payees/batch/{batchId} | Query Batch Status
*PayeeInvitationApi* | [**resendPayeeInviteV3**](docs/Api/PayeeInvitationApi.md#resendpayeeinvitev3) | **POST** /v3/payees/{payeeId}/invite | Resend Payee Invite
*PayeeInvitationApi* | [**resendPayeeInviteV4**](docs/Api/PayeeInvitationApi.md#resendpayeeinvitev4) | **POST** /v4/payees/{payeeId}/invite | Resend Payee Invite
*PayeeInvitationApi* | [**v3CreatePayee**](docs/Api/PayeeInvitationApi.md#v3createpayee) | **POST** /v3/payees | Initiate Payee Creation
*PayeeInvitationApi* | [**v4CreatePayee**](docs/Api/PayeeInvitationApi.md#v4createpayee) | **POST** /v4/payees | Initiate Payee Creation
*PayeesApi* | [**deletePayeeByIdV3**](docs/Api/PayeesApi.md#deletepayeebyidv3) | **DELETE** /v3/payees/{payeeId} | Delete Payee by Id
*PayeesApi* | [**deletePayeeByIdV4**](docs/Api/PayeesApi.md#deletepayeebyidv4) | **DELETE** /v4/payees/{payeeId} | Delete Payee by Id
*PayeesApi* | [**getPayeeByIdV3**](docs/Api/PayeesApi.md#getpayeebyidv3) | **GET** /v3/payees/{payeeId} | Get Payee by Id
*PayeesApi* | [**getPayeeByIdV4**](docs/Api/PayeesApi.md#getpayeebyidv4) | **GET** /v4/payees/{payeeId} | Get Payee by Id
*PayeesApi* | [**listPayeeChangesV3**](docs/Api/PayeesApi.md#listpayeechangesv3) | **GET** /v3/payees/deltas | List Payee Changes
*PayeesApi* | [**listPayeeChangesV4**](docs/Api/PayeesApi.md#listpayeechangesv4) | **GET** /v4/payees/deltas | List Payee Changes
*PayeesApi* | [**listPayeesV3**](docs/Api/PayeesApi.md#listpayeesv3) | **GET** /v3/payees | List Payees
*PayeesApi* | [**listPayeesV4**](docs/Api/PayeesApi.md#listpayeesv4) | **GET** /v4/payees | List Payees
*PayeesApi* | [**payeeDetailsUpdateV3**](docs/Api/PayeesApi.md#payeedetailsupdatev3) | **POST** /v3/payees/{payeeId}/payeeDetailsUpdate | Update Payee Details
*PayeesApi* | [**payeeDetailsUpdateV4**](docs/Api/PayeesApi.md#payeedetailsupdatev4) | **POST** /v4/payees/{payeeId}/payeeDetailsUpdate | Update Payee Details
*PayeesApi* | [**v3PayeesPayeeIdRemoteIdUpdatePost**](docs/Api/PayeesApi.md#v3payeespayeeidremoteidupdatepost) | **POST** /v3/payees/{payeeId}/remoteIdUpdate | Update Payee Remote Id
*PayeesApi* | [**v4PayeesPayeeIdRemoteIdUpdatePost**](docs/Api/PayeesApi.md#v4payeespayeeidremoteidupdatepost) | **POST** /v4/payees/{payeeId}/remoteIdUpdate | Update Payee Remote Id
*PaymentAuditServiceApi* | [**exportTransactionsCSVV4**](docs/Api/PaymentAuditServiceApi.md#exporttransactionscsvv4) | **GET** /v4/paymentaudit/transactions | Export Transactions
*PaymentAuditServiceApi* | [**getFundingsV4**](docs/Api/PaymentAuditServiceApi.md#getfundingsv4) | **GET** /v4/paymentaudit/fundings | Get Fundings for Payor
*PaymentAuditServiceApi* | [**getPaymentDetailsV4**](docs/Api/PaymentAuditServiceApi.md#getpaymentdetailsv4) | **GET** /v4/paymentaudit/payments/{paymentId} | Get Payment
*PaymentAuditServiceApi* | [**getPaymentsForPayoutV4**](docs/Api/PaymentAuditServiceApi.md#getpaymentsforpayoutv4) | **GET** /v4/paymentaudit/payouts/{payoutId} | Get Payments for Payout
*PaymentAuditServiceApi* | [**getPayoutStatsV4**](docs/Api/PaymentAuditServiceApi.md#getpayoutstatsv4) | **GET** /v4/paymentaudit/payoutStatistics | Get Payout Statistics
*PaymentAuditServiceApi* | [**getPayoutsForPayorV4**](docs/Api/PaymentAuditServiceApi.md#getpayoutsforpayorv4) | **GET** /v4/paymentaudit/payouts | Get Payouts for Payor
*PaymentAuditServiceApi* | [**listPaymentChangesV4**](docs/Api/PaymentAuditServiceApi.md#listpaymentchangesv4) | **GET** /v4/payments/deltas | List Payment Changes
*PaymentAuditServiceApi* | [**listPaymentsAuditV4**](docs/Api/PaymentAuditServiceApi.md#listpaymentsauditv4) | **GET** /v4/paymentaudit/payments | Get List of Payments
*PaymentAuditServiceDeprecatedApi* | [**exportTransactionsCSVV3**](docs/Api/PaymentAuditServiceDeprecatedApi.md#exporttransactionscsvv3) | **GET** /v3/paymentaudit/transactions | V3 Export Transactions
*PaymentAuditServiceDeprecatedApi* | [**getFundingsV1**](docs/Api/PaymentAuditServiceDeprecatedApi.md#getfundingsv1) | **GET** /v1/paymentaudit/fundings | V1 Get Fundings for Payor
*PaymentAuditServiceDeprecatedApi* | [**getPaymentDetailsV3**](docs/Api/PaymentAuditServiceDeprecatedApi.md#getpaymentdetailsv3) | **GET** /v3/paymentaudit/payments/{paymentId} | V3 Get Payment
*PaymentAuditServiceDeprecatedApi* | [**getPaymentsForPayoutPAV3**](docs/Api/PaymentAuditServiceDeprecatedApi.md#getpaymentsforpayoutpav3) | **GET** /v3/paymentaudit/payouts/{payoutId} | V3 Get Payments for Payout
*PaymentAuditServiceDeprecatedApi* | [**getPayoutStatsV1**](docs/Api/PaymentAuditServiceDeprecatedApi.md#getpayoutstatsv1) | **GET** /v1/paymentaudit/payoutStatistics | V1 Get Payout Statistics
*PaymentAuditServiceDeprecatedApi* | [**getPayoutsForPayorV3**](docs/Api/PaymentAuditServiceDeprecatedApi.md#getpayoutsforpayorv3) | **GET** /v3/paymentaudit/payouts | V3 Get Payouts for Payor
*PaymentAuditServiceDeprecatedApi* | [**listPaymentChanges**](docs/Api/PaymentAuditServiceDeprecatedApi.md#listpaymentchanges) | **GET** /v1/deltas/payments | V1 List Payment Changes
*PaymentAuditServiceDeprecatedApi* | [**listPaymentsAuditV3**](docs/Api/PaymentAuditServiceDeprecatedApi.md#listpaymentsauditv3) | **GET** /v3/paymentaudit/payments | V3 Get List of Payments
*PayorsApi* | [**getPayorById**](docs/Api/PayorsApi.md#getpayorbyid) | **GET** /v1/payors/{payorId} | Get Payor
*PayorsApi* | [**getPayorByIdV2**](docs/Api/PayorsApi.md#getpayorbyidv2) | **GET** /v2/payors/{payorId} | Get Payor
*PayorsApi* | [**payorAddPayorLogo**](docs/Api/PayorsApi.md#payoraddpayorlogo) | **POST** /v1/payors/{payorId}/branding/logos | Add Logo
*PayorsApi* | [**payorCreateApiKeyRequest**](docs/Api/PayorsApi.md#payorcreateapikeyrequest) | **POST** /v1/payors/{payorId}/applications/{applicationId}/keys | Create API Key
*PayorsApi* | [**payorCreateApplicationRequest**](docs/Api/PayorsApi.md#payorcreateapplicationrequest) | **POST** /v1/payors/{payorId}/applications | Create Application
*PayorsApi* | [**payorEmailOptOut**](docs/Api/PayorsApi.md#payoremailoptout) | **POST** /v1/payors/{payorId}/reminderEmailsUpdate | Reminder Email Opt-Out
*PayorsApi* | [**payorGetBranding**](docs/Api/PayorsApi.md#payorgetbranding) | **GET** /v1/payors/{payorId}/branding | Get Branding
*PayorsApi* | [**payorLinks**](docs/Api/PayorsApi.md#payorlinks) | **GET** /v1/payorLinks | List Payor Links
*PayorsPrivateApi* | [**createPayorLinks**](docs/Api/PayorsPrivateApi.md#createpayorlinks) | **POST** /v1/payorLinks | Create a Payor Link
*PayoutServiceApi* | [**createQuoteForPayoutV3**](docs/Api/PayoutServiceApi.md#createquoteforpayoutv3) | **POST** /v3/payouts/{payoutId}/quote | Create a quote for the payout
*PayoutServiceApi* | [**getPaymentsForPayoutV3**](docs/Api/PayoutServiceApi.md#getpaymentsforpayoutv3) | **GET** /v3/payouts/{payoutId}/payments | Retrieve payments for a payout
*PayoutServiceApi* | [**getPayoutSummaryV3**](docs/Api/PayoutServiceApi.md#getpayoutsummaryv3) | **GET** /v3/payouts/{payoutId} | Get Payout Summary
*PayoutServiceApi* | [**instructPayoutV3**](docs/Api/PayoutServiceApi.md#instructpayoutv3) | **POST** /v3/payouts/{payoutId} | Instruct Payout
*PayoutServiceApi* | [**submitPayoutV3**](docs/Api/PayoutServiceApi.md#submitpayoutv3) | **POST** /v3/payouts | Submit Payout
*PayoutServiceApi* | [**withdrawPayment**](docs/Api/PayoutServiceApi.md#withdrawpayment) | **POST** /v1/payments/{paymentId}/withdraw | Withdraw a Payment
*PayoutServiceApi* | [**withdrawPayoutV3**](docs/Api/PayoutServiceApi.md#withdrawpayoutv3) | **DELETE** /v3/payouts/{payoutId} | Withdraw Payout
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
*UsersApi* | [**userDetailsUpdateForSelf**](docs/Api/UsersApi.md#userdetailsupdateforself) | **POST** /v2/users/self/userDetailsUpdate | Update User Details for self
*UsersApi* | [**validatePasswordSelf**](docs/Api/UsersApi.md#validatepasswordself) | **POST** /v2/users/self/password/validate | Validate the proposed password
*WebhooksApi* | [**createWebhookV1**](docs/Api/WebhooksApi.md#createwebhookv1) | **POST** /v1/webhooks | Create Webhook
*WebhooksApi* | [**getWebhookV1**](docs/Api/WebhooksApi.md#getwebhookv1) | **GET** /v1/webhooks/{webhookId} | Get details about the given webhook.
*WebhooksApi* | [**listWebhooksV1**](docs/Api/WebhooksApi.md#listwebhooksv1) | **GET** /v1/webhooks | List the details about the webhooks for the given payor.
*WebhooksApi* | [**updateWebhookV1**](docs/Api/WebhooksApi.md#updatewebhookv1) | **POST** /v1/webhooks/{webhookId} | Update Webhook

## Models

- [AcceptedPaymentV3](docs/Model/AcceptedPaymentV3.md)
- [AccessTokenResponse](docs/Model/AccessTokenResponse.md)
- [AccessTokenValidationRequest](docs/Model/AccessTokenValidationRequest.md)
- [AuthResponse](docs/Model/AuthResponse.md)
- [AutoTopUpConfig](docs/Model/AutoTopUpConfig.md)
- [AutoTopUpConfig2](docs/Model/AutoTopUpConfig2.md)
- [Category](docs/Model/Category.md)
- [Challenge](docs/Model/Challenge.md)
- [Challenge2](docs/Model/Challenge2.md)
- [Company](docs/Model/Company.md)
- [Company2](docs/Model/Company2.md)
- [CreateFundingAccountRequestV2](docs/Model/CreateFundingAccountRequestV2.md)
- [CreateIndividual](docs/Model/CreateIndividual.md)
- [CreateIndividual2](docs/Model/CreateIndividual2.md)
- [CreateIndividualName](docs/Model/CreateIndividualName.md)
- [CreatePayee](docs/Model/CreatePayee.md)
- [CreatePayee2](docs/Model/CreatePayee2.md)
- [CreatePayeeAddress](docs/Model/CreatePayeeAddress.md)
- [CreatePayeeAddress2](docs/Model/CreatePayeeAddress2.md)
- [CreatePayeesCSVResponse](docs/Model/CreatePayeesCSVResponse.md)
- [CreatePayeesCSVResponse2](docs/Model/CreatePayeesCSVResponse2.md)
- [CreatePayeesCSVResponseRejectedCsvRows](docs/Model/CreatePayeesCSVResponseRejectedCsvRows.md)
- [CreatePayeesRequest](docs/Model/CreatePayeesRequest.md)
- [CreatePayeesRequest2](docs/Model/CreatePayeesRequest2.md)
- [CreatePaymentChannel](docs/Model/CreatePaymentChannel.md)
- [CreatePaymentChannel2](docs/Model/CreatePaymentChannel2.md)
- [CreatePayorLinkRequest](docs/Model/CreatePayorLinkRequest.md)
- [CreatePayoutRequestV3](docs/Model/CreatePayoutRequestV3.md)
- [CreateWebhookRequest](docs/Model/CreateWebhookRequest.md)
- [DebitEvent](docs/Model/DebitEvent.md)
- [DebitEventAllOf](docs/Model/DebitEventAllOf.md)
- [DebitStatusChanged](docs/Model/DebitStatusChanged.md)
- [DebitStatusChangedAllOf](docs/Model/DebitStatusChangedAllOf.md)
- [Error](docs/Model/Error.md)
- [ErrorData](docs/Model/ErrorData.md)
- [ErrorResponse](docs/Model/ErrorResponse.md)
- [FailedPayee](docs/Model/FailedPayee.md)
- [FailedPayee2](docs/Model/FailedPayee2.md)
- [FailedSubmission](docs/Model/FailedSubmission.md)
- [FailedSubmission2](docs/Model/FailedSubmission2.md)
- [FundingAccountResponse](docs/Model/FundingAccountResponse.md)
- [FundingAccountResponse2](docs/Model/FundingAccountResponse2.md)
- [FundingAccountType](docs/Model/FundingAccountType.md)
- [FundingAudit](docs/Model/FundingAudit.md)
- [FundingEvent](docs/Model/FundingEvent.md)
- [FundingEventType](docs/Model/FundingEventType.md)
- [FundingPayorStatusAuditResponse](docs/Model/FundingPayorStatusAuditResponse.md)
- [FundingRequestV1](docs/Model/FundingRequestV1.md)
- [FundingRequestV2](docs/Model/FundingRequestV2.md)
- [FundingRequestV3](docs/Model/FundingRequestV3.md)
- [FxSummary](docs/Model/FxSummary.md)
- [FxSummaryV3](docs/Model/FxSummaryV3.md)
- [GetFundingsResponse](docs/Model/GetFundingsResponse.md)
- [GetFundingsResponseLinks](docs/Model/GetFundingsResponseLinks.md)
- [GetPayeeListResponse](docs/Model/GetPayeeListResponse.md)
- [GetPayeeListResponse2](docs/Model/GetPayeeListResponse2.md)
- [GetPayeeListResponseCompany](docs/Model/GetPayeeListResponseCompany.md)
- [GetPayeeListResponseCompany2](docs/Model/GetPayeeListResponseCompany2.md)
- [GetPayeeListResponseIndividual](docs/Model/GetPayeeListResponseIndividual.md)
- [GetPayeeListResponseIndividual2](docs/Model/GetPayeeListResponseIndividual2.md)
- [GetPaymentsForPayoutResponseV3](docs/Model/GetPaymentsForPayoutResponseV3.md)
- [GetPaymentsForPayoutResponseV3Page](docs/Model/GetPaymentsForPayoutResponseV3Page.md)
- [GetPaymentsForPayoutResponseV3Summary](docs/Model/GetPaymentsForPayoutResponseV3Summary.md)
- [GetPaymentsForPayoutResponseV4](docs/Model/GetPaymentsForPayoutResponseV4.md)
- [GetPaymentsForPayoutResponseV4Summary](docs/Model/GetPaymentsForPayoutResponseV4Summary.md)
- [GetPayoutStatistics](docs/Model/GetPayoutStatistics.md)
- [GetPayoutsResponse](docs/Model/GetPayoutsResponse.md)
- [GetPayoutsResponseV3](docs/Model/GetPayoutsResponseV3.md)
- [GetPayoutsResponseV3Links](docs/Model/GetPayoutsResponseV3Links.md)
- [GetPayoutsResponseV3Page](docs/Model/GetPayoutsResponseV3Page.md)
- [Individual](docs/Model/Individual.md)
- [Individual2](docs/Model/Individual2.md)
- [IndividualName](docs/Model/IndividualName.md)
- [InlineResponse400](docs/Model/InlineResponse400.md)
- [InlineResponse401](docs/Model/InlineResponse401.md)
- [InlineResponse403](docs/Model/InlineResponse403.md)
- [InlineResponse404](docs/Model/InlineResponse404.md)
- [InlineResponse409](docs/Model/InlineResponse409.md)
- [InlineResponse412](docs/Model/InlineResponse412.md)
- [InvitationStatus](docs/Model/InvitationStatus.md)
- [InvitationStatus2](docs/Model/InvitationStatus2.md)
- [InvitePayeeRequest](docs/Model/InvitePayeeRequest.md)
- [InvitePayeeRequest2](docs/Model/InvitePayeeRequest2.md)
- [InviteUserRequest](docs/Model/InviteUserRequest.md)
- [KycState](docs/Model/KycState.md)
- [LinkForResponse](docs/Model/LinkForResponse.md)
- [ListFundingAccountsResponse](docs/Model/ListFundingAccountsResponse.md)
- [ListFundingAccountsResponse2](docs/Model/ListFundingAccountsResponse2.md)
- [ListPaymentsResponseV3](docs/Model/ListPaymentsResponseV3.md)
- [ListPaymentsResponseV3Page](docs/Model/ListPaymentsResponseV3Page.md)
- [ListPaymentsResponseV4](docs/Model/ListPaymentsResponseV4.md)
- [ListSourceAccountResponse](docs/Model/ListSourceAccountResponse.md)
- [ListSourceAccountResponseLinks](docs/Model/ListSourceAccountResponseLinks.md)
- [ListSourceAccountResponsePage](docs/Model/ListSourceAccountResponsePage.md)
- [ListSourceAccountResponseV2](docs/Model/ListSourceAccountResponseV2.md)
- [ListSourceAccountResponseV2Links](docs/Model/ListSourceAccountResponseV2Links.md)
- [ListSourceAccountResponseV3](docs/Model/ListSourceAccountResponseV3.md)
- [ListSourceAccountResponseV3Links](docs/Model/ListSourceAccountResponseV3Links.md)
- [LocalisationDetails](docs/Model/LocalisationDetails.md)
- [MFADetails](docs/Model/MFADetails.md)
- [MFAType](docs/Model/MFAType.md)
- [Name](docs/Model/Name.md)
- [Name2](docs/Model/Name2.md)
- [Notification](docs/Model/Notification.md)
- [Notifications](docs/Model/Notifications.md)
- [Notifications2](docs/Model/Notifications2.md)
- [OfacStatus](docs/Model/OfacStatus.md)
- [OnboardedStatus](docs/Model/OnboardedStatus.md)
- [OnboardedStatus2](docs/Model/OnboardedStatus2.md)
- [OnboardingStatusChanged](docs/Model/OnboardingStatusChanged.md)
- [PageForResponse](docs/Model/PageForResponse.md)
- [PageResourceFundingPayorStatusAuditResponseFundingPayorStatusAuditResponse](docs/Model/PageResourceFundingPayorStatusAuditResponseFundingPayorStatusAuditResponse.md)
- [PagedPayeeInvitationStatusResponse](docs/Model/PagedPayeeInvitationStatusResponse.md)
- [PagedPayeeInvitationStatusResponse2](docs/Model/PagedPayeeInvitationStatusResponse2.md)
- [PagedPayeeInvitationStatusResponsePage](docs/Model/PagedPayeeInvitationStatusResponsePage.md)
- [PagedPayeeResponse](docs/Model/PagedPayeeResponse.md)
- [PagedPayeeResponse2](docs/Model/PagedPayeeResponse2.md)
- [PagedPayeeResponseLinks](docs/Model/PagedPayeeResponseLinks.md)
- [PagedPayeeResponsePage](docs/Model/PagedPayeeResponsePage.md)
- [PagedPayeeResponseSummary](docs/Model/PagedPayeeResponseSummary.md)
- [PagedPaymentsResponseV3](docs/Model/PagedPaymentsResponseV3.md)
- [PagedUserResponse](docs/Model/PagedUserResponse.md)
- [PagedUserResponseLinks](docs/Model/PagedUserResponseLinks.md)
- [PagedUserResponsePage](docs/Model/PagedUserResponsePage.md)
- [PasswordRequest](docs/Model/PasswordRequest.md)
- [PayableIssue](docs/Model/PayableIssue.md)
- [PayableIssue2](docs/Model/PayableIssue2.md)
- [PayableStatusChanged](docs/Model/PayableStatusChanged.md)
- [PayeeAddress](docs/Model/PayeeAddress.md)
- [PayeeAddress2](docs/Model/PayeeAddress2.md)
- [PayeeDelta](docs/Model/PayeeDelta.md)
- [PayeeDelta2](docs/Model/PayeeDelta2.md)
- [PayeeDeltaResponse](docs/Model/PayeeDeltaResponse.md)
- [PayeeDeltaResponse2](docs/Model/PayeeDeltaResponse2.md)
- [PayeeDeltaResponse2Links](docs/Model/PayeeDeltaResponse2Links.md)
- [PayeeDeltaResponseLinks](docs/Model/PayeeDeltaResponseLinks.md)
- [PayeeDeltaResponsePage](docs/Model/PayeeDeltaResponsePage.md)
- [PayeeDetailResponse](docs/Model/PayeeDetailResponse.md)
- [PayeeDetailResponse2](docs/Model/PayeeDetailResponse2.md)
- [PayeeDetailsChanged](docs/Model/PayeeDetailsChanged.md)
- [PayeeEvent](docs/Model/PayeeEvent.md)
- [PayeeEventAllOf](docs/Model/PayeeEventAllOf.md)
- [PayeeEventAllOfReasons](docs/Model/PayeeEventAllOfReasons.md)
- [PayeeInvitationStatusResponse](docs/Model/PayeeInvitationStatusResponse.md)
- [PayeeInvitationStatusResponse2](docs/Model/PayeeInvitationStatusResponse2.md)
- [PayeePayorRef](docs/Model/PayeePayorRef.md)
- [PayeePayorRefV3](docs/Model/PayeePayorRefV3.md)
- [PayeeType](docs/Model/PayeeType.md)
- [PayeeUserSelfUpdateRequest](docs/Model/PayeeUserSelfUpdateRequest.md)
- [PaymentAuditCurrency](docs/Model/PaymentAuditCurrency.md)
- [PaymentAuditCurrencyV3](docs/Model/PaymentAuditCurrencyV3.md)
- [PaymentChannelCountry](docs/Model/PaymentChannelCountry.md)
- [PaymentChannelRule](docs/Model/PaymentChannelRule.md)
- [PaymentChannelRulesResponse](docs/Model/PaymentChannelRulesResponse.md)
- [PaymentDelta](docs/Model/PaymentDelta.md)
- [PaymentDeltaResponse](docs/Model/PaymentDeltaResponse.md)
- [PaymentDeltaResponseV1](docs/Model/PaymentDeltaResponseV1.md)
- [PaymentDeltaV1](docs/Model/PaymentDeltaV1.md)
- [PaymentEvent](docs/Model/PaymentEvent.md)
- [PaymentEventAllOf](docs/Model/PaymentEventAllOf.md)
- [PaymentEventResponse](docs/Model/PaymentEventResponse.md)
- [PaymentEventResponseV3](docs/Model/PaymentEventResponseV3.md)
- [PaymentInstructionV3](docs/Model/PaymentInstructionV3.md)
- [PaymentRails](docs/Model/PaymentRails.md)
- [PaymentRejectedOrReturned](docs/Model/PaymentRejectedOrReturned.md)
- [PaymentRejectedOrReturnedAllOf](docs/Model/PaymentRejectedOrReturnedAllOf.md)
- [PaymentResponseV3](docs/Model/PaymentResponseV3.md)
- [PaymentResponseV4](docs/Model/PaymentResponseV4.md)
- [PaymentResponseV4Payout](docs/Model/PaymentResponseV4Payout.md)
- [PaymentStatusChanged](docs/Model/PaymentStatusChanged.md)
- [PaymentStatusChangedAllOf](docs/Model/PaymentStatusChangedAllOf.md)
- [PaymentV3](docs/Model/PaymentV3.md)
- [PayorAddress](docs/Model/PayorAddress.md)
- [PayorAddressV2](docs/Model/PayorAddressV2.md)
- [PayorAmlTransaction](docs/Model/PayorAmlTransaction.md)
- [PayorAmlTransactionV3](docs/Model/PayorAmlTransactionV3.md)
- [PayorBrandingResponse](docs/Model/PayorBrandingResponse.md)
- [PayorCreateApiKeyRequest](docs/Model/PayorCreateApiKeyRequest.md)
- [PayorCreateApiKeyResponse](docs/Model/PayorCreateApiKeyResponse.md)
- [PayorCreateApplicationRequest](docs/Model/PayorCreateApplicationRequest.md)
- [PayorEmailOptOutRequest](docs/Model/PayorEmailOptOutRequest.md)
- [PayorLinksResponse](docs/Model/PayorLinksResponse.md)
- [PayorLinksResponseLinks](docs/Model/PayorLinksResponseLinks.md)
- [PayorLinksResponsePayors](docs/Model/PayorLinksResponsePayors.md)
- [PayorV1](docs/Model/PayorV1.md)
- [PayorV2](docs/Model/PayorV2.md)
- [PayoutCompanyV3](docs/Model/PayoutCompanyV3.md)
- [PayoutIndividualV3](docs/Model/PayoutIndividualV3.md)
- [PayoutNameV3](docs/Model/PayoutNameV3.md)
- [PayoutPayeeV3](docs/Model/PayoutPayeeV3.md)
- [PayoutPayor](docs/Model/PayoutPayor.md)
- [PayoutPayorIds](docs/Model/PayoutPayorIds.md)
- [PayoutPrincipal](docs/Model/PayoutPrincipal.md)
- [PayoutStatus](docs/Model/PayoutStatus.md)
- [PayoutStatusV3](docs/Model/PayoutStatusV3.md)
- [PayoutSummaryAudit](docs/Model/PayoutSummaryAudit.md)
- [PayoutSummaryAuditV3](docs/Model/PayoutSummaryAuditV3.md)
- [PayoutSummaryResponseV3](docs/Model/PayoutSummaryResponseV3.md)
- [PayoutType](docs/Model/PayoutType.md)
- [Ping](docs/Model/Ping.md)
- [QueryBatchResponse](docs/Model/QueryBatchResponse.md)
- [QueryBatchResponse2](docs/Model/QueryBatchResponse2.md)
- [QuoteFxSummaryV3](docs/Model/QuoteFxSummaryV3.md)
- [QuoteResponseV3](docs/Model/QuoteResponseV3.md)
- [RegionV2](docs/Model/RegionV2.md)
- [RegisterSmsRequest](docs/Model/RegisterSmsRequest.md)
- [RejectedPaymentV3](docs/Model/RejectedPaymentV3.md)
- [ResendTokenRequest](docs/Model/ResendTokenRequest.md)
- [ResetPasswordRequest](docs/Model/ResetPasswordRequest.md)
- [Role](docs/Model/Role.md)
- [RoleUpdateRequest](docs/Model/RoleUpdateRequest.md)
- [SelfMFATypeUnregisterRequest](docs/Model/SelfMFATypeUnregisterRequest.md)
- [SelfUpdatePasswordRequest](docs/Model/SelfUpdatePasswordRequest.md)
- [SetNotificationsRequest](docs/Model/SetNotificationsRequest.md)
- [SourceAccountResponse](docs/Model/SourceAccountResponse.md)
- [SourceAccountResponseV2](docs/Model/SourceAccountResponseV2.md)
- [SourceAccountResponseV3](docs/Model/SourceAccountResponseV3.md)
- [SourceAccountSummary](docs/Model/SourceAccountSummary.md)
- [SourceAccountSummaryV3](docs/Model/SourceAccountSummaryV3.md)
- [SourceAccountType](docs/Model/SourceAccountType.md)
- [SourceAccountV3](docs/Model/SourceAccountV3.md)
- [SourceEvent](docs/Model/SourceEvent.md)
- [SupportedCountriesResponse](docs/Model/SupportedCountriesResponse.md)
- [SupportedCountriesResponseV2](docs/Model/SupportedCountriesResponseV2.md)
- [SupportedCountry](docs/Model/SupportedCountry.md)
- [SupportedCountryV2](docs/Model/SupportedCountryV2.md)
- [SupportedCurrencyResponseV2](docs/Model/SupportedCurrencyResponseV2.md)
- [SupportedCurrencyV2](docs/Model/SupportedCurrencyV2.md)
- [TransferRequest](docs/Model/TransferRequest.md)
- [TransferRequest2](docs/Model/TransferRequest2.md)
- [TransmissionType](docs/Model/TransmissionType.md)
- [TransmissionTypes](docs/Model/TransmissionTypes.md)
- [TransmissionTypes2](docs/Model/TransmissionTypes2.md)
- [UnregisterMFARequest](docs/Model/UnregisterMFARequest.md)
- [UpdatePayeeDetailsRequest](docs/Model/UpdatePayeeDetailsRequest.md)
- [UpdatePayeeDetailsRequest2](docs/Model/UpdatePayeeDetailsRequest2.md)
- [UpdateRemoteIdRequest](docs/Model/UpdateRemoteIdRequest.md)
- [UpdateRemoteIdRequest2](docs/Model/UpdateRemoteIdRequest2.md)
- [UpdateWebhookRequest](docs/Model/UpdateWebhookRequest.md)
- [UserDetailsUpdateRequest](docs/Model/UserDetailsUpdateRequest.md)
- [UserInfo](docs/Model/UserInfo.md)
- [UserResponse](docs/Model/UserResponse.md)
- [UserStatus](docs/Model/UserStatus.md)
- [UserType](docs/Model/UserType.md)
- [UserType2](docs/Model/UserType2.md)
- [ValidatePasswordResponse](docs/Model/ValidatePasswordResponse.md)
- [WatchlistStatus](docs/Model/WatchlistStatus.md)
- [WatchlistStatus2](docs/Model/WatchlistStatus2.md)
- [WebhookResponse](docs/Model/WebhookResponse.md)
- [WebhooksResponse](docs/Model/WebhooksResponse.md)
- [WithdrawPaymentRequest](docs/Model/WithdrawPaymentRequest.md)

## Authorization

### OAuth2

- **Type**: `OAuth`
- **Flow**: `application`
- **Authorization URL**: ``
- **Scopes**: 
    - ** **: Scopes not required


### basicAuth

- **Type**: HTTP basic authentication


### oAuthVeloBackOffice

- **Type**: `OAuth`
- **Flow**: `application`
- **Authorization URL**: ``
- **Scopes**: 
    - ** **: Scopes not required

## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author



## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `2.26.124`
    - Package version: `2.26.124`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
