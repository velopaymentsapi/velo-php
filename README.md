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


## Http Status Codes
Following is a list of Http Status codes that could be returned by the platform

    | Status Code            | Description                                                                          |
    | -----------------------| -------------------------------------------------------------------------------------|
    | 200 OK                 | The request was successfully processed and usually returns a json response           |
    | 201 Created            | A resource was created and a Location header is returned linking to the new resource |
    | 202 Accepted           | The request has been accepted for processing                                         |
    | 204 No Content         | The request has been processed and there is no response (usually deletes and updates)|
    | 400 Bad Request        | The request is invalid and should be fixed before retrying                           |
    | 401 Unauthorized       | Authentication has failed, usually means the token has expired                       |
    | 403 Forbidden          | The user does not have permissions for the request                                   |
    | 404 Not Found          | The resource was not found                                                           |
    | 409 Conflict           | The resource already exists and there is a conflict                                  |
    | 429 Too Many Requests  | The user has submitted too many requests in a given amount of time                   |
    | 5xx Server Error       | Platform internal error (should rarely happen)                                       |



## Installation & Usage

### Requirements

PHP 7.4 and later.
Should also work with PHP 8.0.

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
*FundingApi* | [**createFundingRequestV2**](docs/Api/FundingApi.md#createfundingrequestv2) | **POST** /v2/sourceAccounts/{sourceAccountId}/fundingRequest | Create Funding Request
*FundingApi* | [**createFundingRequestV3**](docs/Api/FundingApi.md#createfundingrequestv3) | **POST** /v3/sourceAccounts/{sourceAccountId}/fundingRequest | Create Funding Request
*FundingApi* | [**getFundingAccountV2**](docs/Api/FundingApi.md#getfundingaccountv2) | **GET** /v2/fundingAccounts/{fundingAccountId} | Get Funding Account
*FundingApi* | [**getFundingAccountsV2**](docs/Api/FundingApi.md#getfundingaccountsv2) | **GET** /v2/fundingAccounts | Get Funding Accounts
*FundingApi* | [**getFundingByIdV1**](docs/Api/FundingApi.md#getfundingbyidv1) | **GET** /v1/fundings/{fundingId} | Get Funding
*FundingApi* | [**listFundingAuditDeltas**](docs/Api/FundingApi.md#listfundingauditdeltas) | **GET** /v1/deltas/fundings | Get Funding Audit Delta
*FundingManagerPrivateApi* | [**createFundingAccountV2**](docs/Api/FundingManagerPrivateApi.md#createfundingaccountv2) | **POST** /v2/fundingAccounts | Create Funding Account
*FundingManagerPrivateApi* | [**deleteSourceAccountV3**](docs/Api/FundingManagerPrivateApi.md#deletesourceaccountv3) | **DELETE** /v3/sourceAccounts/{sourceAccountId} | Delete a source account by ID
*LoginApi* | [**logout**](docs/Api/LoginApi.md#logout) | **POST** /v1/logout | Logout
*LoginApi* | [**resetPassword**](docs/Api/LoginApi.md#resetpassword) | **POST** /v1/password/reset | Reset password
*LoginApi* | [**validateAccessToken**](docs/Api/LoginApi.md#validateaccesstoken) | **POST** /v1/validate | validate
*LoginApi* | [**veloAuth**](docs/Api/LoginApi.md#veloauth) | **POST** /v1/authenticate | Authentication endpoint
*PayeeInvitationApi* | [**createPayeeV3**](docs/Api/PayeeInvitationApi.md#createpayeev3) | **POST** /v3/payees | Initiate Payee Creation
*PayeeInvitationApi* | [**getPayeesInvitationStatusV3**](docs/Api/PayeeInvitationApi.md#getpayeesinvitationstatusv3) | **GET** /v3/payees/payors/{payorId}/invitationStatus | Get Payee Invitation Status
*PayeeInvitationApi* | [**getPayeesInvitationStatusV4**](docs/Api/PayeeInvitationApi.md#getpayeesinvitationstatusv4) | **GET** /v4/payees/payors/{payorId}/invitationStatus | Get Payee Invitation Status
*PayeeInvitationApi* | [**queryBatchStatusV3**](docs/Api/PayeeInvitationApi.md#querybatchstatusv3) | **GET** /v3/payees/batch/{batchId} | Query Batch Status
*PayeeInvitationApi* | [**queryBatchStatusV4**](docs/Api/PayeeInvitationApi.md#querybatchstatusv4) | **GET** /v4/payees/batch/{batchId} | Query Batch Status
*PayeeInvitationApi* | [**resendPayeeInviteV3**](docs/Api/PayeeInvitationApi.md#resendpayeeinvitev3) | **POST** /v3/payees/{payeeId}/invite | Resend Payee Invite
*PayeeInvitationApi* | [**resendPayeeInviteV4**](docs/Api/PayeeInvitationApi.md#resendpayeeinvitev4) | **POST** /v4/payees/{payeeId}/invite | Resend Payee Invite
*PayeeInvitationApi* | [**v4CreatePayee**](docs/Api/PayeeInvitationApi.md#v4createpayee) | **POST** /v4/payees | Initiate Payee Creation
*PayeePaymentChannelsApi* | [**createPaymentChannelV4**](docs/Api/PayeePaymentChannelsApi.md#createpaymentchannelv4) | **POST** /v4/payees/{payeeId}/paymentChannels/ | Create Payment Channel
*PayeePaymentChannelsApi* | [**deletePaymentChannelV4**](docs/Api/PayeePaymentChannelsApi.md#deletepaymentchannelv4) | **DELETE** /v4/payees/{payeeId}/paymentChannels/{paymentChannelId} | Delete Payment Channel
*PayeePaymentChannelsApi* | [**enablePaymentChannelV4**](docs/Api/PayeePaymentChannelsApi.md#enablepaymentchannelv4) | **POST** /v4/payees/{payeeId}/paymentChannels/{paymentChannelId}/enable | Enable Payment Channel
*PayeePaymentChannelsApi* | [**getPaymentChannelV4**](docs/Api/PayeePaymentChannelsApi.md#getpaymentchannelv4) | **GET** /v4/payees/{payeeId}/paymentChannels/{paymentChannelId} | Get Payment Channel Details
*PayeePaymentChannelsApi* | [**getPaymentChannelsV4**](docs/Api/PayeePaymentChannelsApi.md#getpaymentchannelsv4) | **GET** /v4/payees/{payeeId}/paymentChannels/ | Get All Payment Channels Details
*PayeePaymentChannelsApi* | [**updatePaymentChannelOrderV4**](docs/Api/PayeePaymentChannelsApi.md#updatepaymentchannelorderv4) | **PUT** /v4/payees/{payeeId}/paymentChannels/order | Update Payees preferred Payment Channel order
*PayeePaymentChannelsApi* | [**updatePaymentChannelV4**](docs/Api/PayeePaymentChannelsApi.md#updatepaymentchannelv4) | **POST** /v4/payees/{payeeId}/paymentChannels/{paymentChannelId} | Update Payment Channel
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
*PayorHierarchyApi* | [**payorLinksV1**](docs/Api/PayorHierarchyApi.md#payorlinksv1) | **GET** /v1/payorLinks | List Payor Links
*PayorsApi* | [**getPayorByIdV2**](docs/Api/PayorsApi.md#getpayorbyidv2) | **GET** /v2/payors/{payorId} | Get Payor
*PayorsApi* | [**payorAddPayorLogoV1**](docs/Api/PayorsApi.md#payoraddpayorlogov1) | **POST** /v1/payors/{payorId}/branding/logos | Add Logo
*PayorsApi* | [**payorCreateApiKeyV1**](docs/Api/PayorsApi.md#payorcreateapikeyv1) | **POST** /v1/payors/{payorId}/applications/{applicationId}/keys | Create API Key
*PayorsApi* | [**payorCreateApplicationV1**](docs/Api/PayorsApi.md#payorcreateapplicationv1) | **POST** /v1/payors/{payorId}/applications | Create Application
*PayorsApi* | [**payorEmailOptOut**](docs/Api/PayorsApi.md#payoremailoptout) | **POST** /v1/payors/{payorId}/reminderEmailsUpdate | Reminder Email Opt-Out
*PayorsApi* | [**payorGetBranding**](docs/Api/PayorsApi.md#payorgetbranding) | **GET** /v1/payors/{payorId}/branding | Get Branding
*PayorsPrivateApi* | [**createPayorLinks**](docs/Api/PayorsPrivateApi.md#createpayorlinks) | **POST** /v1/payorLinks | Create a Payor Link
*PayoutsApi* | [**createQuoteForPayoutV3**](docs/Api/PayoutsApi.md#createquoteforpayoutv3) | **POST** /v3/payouts/{payoutId}/quote | Create a quote for the payout
*PayoutsApi* | [**deschedulePayout**](docs/Api/PayoutsApi.md#deschedulepayout) | **DELETE** /v3/payouts/{payoutId}/schedule | Deschedule a payout
*PayoutsApi* | [**getPaymentsForPayoutV3**](docs/Api/PayoutsApi.md#getpaymentsforpayoutv3) | **GET** /v3/payouts/{payoutId}/payments | Retrieve payments for a payout
*PayoutsApi* | [**getPayoutSummaryV3**](docs/Api/PayoutsApi.md#getpayoutsummaryv3) | **GET** /v3/payouts/{payoutId} | Get Payout Summary
*PayoutsApi* | [**instructPayoutV3**](docs/Api/PayoutsApi.md#instructpayoutv3) | **POST** /v3/payouts/{payoutId} | Instruct Payout
*PayoutsApi* | [**scheduleForPayout**](docs/Api/PayoutsApi.md#scheduleforpayout) | **POST** /v3/payouts/{payoutId}/schedule | Schedule a payout
*PayoutsApi* | [**submitPayoutV3**](docs/Api/PayoutsApi.md#submitpayoutv3) | **POST** /v3/payouts | Submit Payout
*PayoutsApi* | [**withdrawPayment**](docs/Api/PayoutsApi.md#withdrawpayment) | **POST** /v1/payments/{paymentId}/withdraw | Withdraw a Payment
*PayoutsApi* | [**withdrawPayoutV3**](docs/Api/PayoutsApi.md#withdrawpayoutv3) | **DELETE** /v3/payouts/{payoutId} | Withdraw Payout
*SourceAccountsApi* | [**getSourceAccountV2**](docs/Api/SourceAccountsApi.md#getsourceaccountv2) | **GET** /v2/sourceAccounts/{sourceAccountId} | Get Source Account
*SourceAccountsApi* | [**getSourceAccountV3**](docs/Api/SourceAccountsApi.md#getsourceaccountv3) | **GET** /v3/sourceAccounts/{sourceAccountId} | Get details about given source account.
*SourceAccountsApi* | [**getSourceAccountsV2**](docs/Api/SourceAccountsApi.md#getsourceaccountsv2) | **GET** /v2/sourceAccounts | Get list of source accounts
*SourceAccountsApi* | [**getSourceAccountsV3**](docs/Api/SourceAccountsApi.md#getsourceaccountsv3) | **GET** /v3/sourceAccounts | Get list of source accounts
*SourceAccountsApi* | [**setNotificationsRequest**](docs/Api/SourceAccountsApi.md#setnotificationsrequest) | **POST** /v1/sourceAccounts/{sourceAccountId}/notifications | Set notifications
*SourceAccountsApi* | [**setNotificationsRequestV3**](docs/Api/SourceAccountsApi.md#setnotificationsrequestv3) | **POST** /v3/sourceAccounts/{sourceAccountId}/notifications | Set notifications
*SourceAccountsApi* | [**transferFundsV2**](docs/Api/SourceAccountsApi.md#transferfundsv2) | **POST** /v2/sourceAccounts/{sourceAccountId}/transfers | Transfer Funds between source accounts
*SourceAccountsApi* | [**transferFundsV3**](docs/Api/SourceAccountsApi.md#transferfundsv3) | **POST** /v3/sourceAccounts/{sourceAccountId}/transfers | Transfer Funds between source accounts
*TokensApi* | [**resendToken**](docs/Api/TokensApi.md#resendtoken) | **POST** /v2/users/{userId}/tokens | Resend a token
*TransactionsApi* | [**createTransactionV1**](docs/Api/TransactionsApi.md#createtransactionv1) | **POST** /v1/transactions | Create a Transaction
*TransactionsApi* | [**getTransactionByIdV1**](docs/Api/TransactionsApi.md#gettransactionbyidv1) | **GET** /v1/transactions/{transactionId} | Get Transaction
*TransactionsApi* | [**getTransactions**](docs/Api/TransactionsApi.md#gettransactions) | **GET** /v1/transactions | Get Transactions
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
*WebhooksApi* | [**pingWebhookV1**](docs/Api/WebhooksApi.md#pingwebhookv1) | **POST** /v1/webhooks/{webhookId}/ping | 
*WebhooksApi* | [**updateWebhookV1**](docs/Api/WebhooksApi.md#updatewebhookv1) | **POST** /v1/webhooks/{webhookId} | Update Webhook

## Models

- [AcceptedPaymentV3](docs/Model/AcceptedPaymentV3.md)
- [AccessTokenResponse](docs/Model/AccessTokenResponse.md)
- [AccessTokenValidationRequest](docs/Model/AccessTokenValidationRequest.md)
- [AddressV4](docs/Model/AddressV4.md)
- [AuthResponse](docs/Model/AuthResponse.md)
- [AutoTopUpConfigV2](docs/Model/AutoTopUpConfigV2.md)
- [AutoTopUpConfigV3](docs/Model/AutoTopUpConfigV3.md)
- [Category](docs/Model/Category.md)
- [ChallengeV3](docs/Model/ChallengeV3.md)
- [ChallengeV4](docs/Model/ChallengeV4.md)
- [CommonLinkObject](docs/Model/CommonLinkObject.md)
- [CommonPageObject](docs/Model/CommonPageObject.md)
- [CompanyV3](docs/Model/CompanyV3.md)
- [CompanyV4](docs/Model/CompanyV4.md)
- [CreateFundingAccountRequestV2](docs/Model/CreateFundingAccountRequestV2.md)
- [CreateIndividualV3](docs/Model/CreateIndividualV3.md)
- [CreateIndividualV3Name](docs/Model/CreateIndividualV3Name.md)
- [CreateIndividualV4](docs/Model/CreateIndividualV4.md)
- [CreatePayeeAddressV3](docs/Model/CreatePayeeAddressV3.md)
- [CreatePayeeAddressV4](docs/Model/CreatePayeeAddressV4.md)
- [CreatePayeeV3](docs/Model/CreatePayeeV3.md)
- [CreatePayeeV4](docs/Model/CreatePayeeV4.md)
- [CreatePayeesCSVRequestV3](docs/Model/CreatePayeesCSVRequestV3.md)
- [CreatePayeesCSVRequestV4](docs/Model/CreatePayeesCSVRequestV4.md)
- [CreatePayeesCSVResponseV3](docs/Model/CreatePayeesCSVResponseV3.md)
- [CreatePayeesCSVResponseV3RejectedCsvRows](docs/Model/CreatePayeesCSVResponseV3RejectedCsvRows.md)
- [CreatePayeesCSVResponseV4](docs/Model/CreatePayeesCSVResponseV4.md)
- [CreatePayeesRequestV3](docs/Model/CreatePayeesRequestV3.md)
- [CreatePayeesRequestV4](docs/Model/CreatePayeesRequestV4.md)
- [CreatePaymentChannelRequestV4](docs/Model/CreatePaymentChannelRequestV4.md)
- [CreatePaymentChannelV3](docs/Model/CreatePaymentChannelV3.md)
- [CreatePaymentChannelV4](docs/Model/CreatePaymentChannelV4.md)
- [CreatePayorLinkRequest](docs/Model/CreatePayorLinkRequest.md)
- [CreatePayoutRequestV3](docs/Model/CreatePayoutRequestV3.md)
- [CreateTransactionRequest](docs/Model/CreateTransactionRequest.md)
- [CreateTransactionResponse](docs/Model/CreateTransactionResponse.md)
- [CreateWebhookRequest](docs/Model/CreateWebhookRequest.md)
- [DebitEvent](docs/Model/DebitEvent.md)
- [DebitEventAllOf](docs/Model/DebitEventAllOf.md)
- [DebitStatusChanged](docs/Model/DebitStatusChanged.md)
- [DebitStatusChangedAllOf](docs/Model/DebitStatusChangedAllOf.md)
- [Error](docs/Model/Error.md)
- [ErrorData](docs/Model/ErrorData.md)
- [ErrorResponse](docs/Model/ErrorResponse.md)
- [FailedPayeeV3](docs/Model/FailedPayeeV3.md)
- [FailedPayeeV4](docs/Model/FailedPayeeV4.md)
- [FailedSubmissionV3](docs/Model/FailedSubmissionV3.md)
- [FailedSubmissionV4](docs/Model/FailedSubmissionV4.md)
- [FundingAccountResponseV2](docs/Model/FundingAccountResponseV2.md)
- [FundingAudit](docs/Model/FundingAudit.md)
- [FundingEvent](docs/Model/FundingEvent.md)
- [FundingEvent2](docs/Model/FundingEvent2.md)
- [FundingPayorStatusAuditResponse](docs/Model/FundingPayorStatusAuditResponse.md)
- [FundingRequestV2](docs/Model/FundingRequestV2.md)
- [FundingRequestV3](docs/Model/FundingRequestV3.md)
- [FundingResponse](docs/Model/FundingResponse.md)
- [FxSummary](docs/Model/FxSummary.md)
- [FxSummaryV3](docs/Model/FxSummaryV3.md)
- [GetFundingsResponse](docs/Model/GetFundingsResponse.md)
- [GetFundingsResponseLinks](docs/Model/GetFundingsResponseLinks.md)
- [GetPayeeListResponseCompanyV3](docs/Model/GetPayeeListResponseCompanyV3.md)
- [GetPayeeListResponseCompanyV4](docs/Model/GetPayeeListResponseCompanyV4.md)
- [GetPayeeListResponseIndividualV3](docs/Model/GetPayeeListResponseIndividualV3.md)
- [GetPayeeListResponseIndividualV4](docs/Model/GetPayeeListResponseIndividualV4.md)
- [GetPayeeListResponseV3](docs/Model/GetPayeeListResponseV3.md)
- [GetPayeeListResponseV4](docs/Model/GetPayeeListResponseV4.md)
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
- [IndividualV3](docs/Model/IndividualV3.md)
- [IndividualV3Name](docs/Model/IndividualV3Name.md)
- [IndividualV4](docs/Model/IndividualV4.md)
- [InlineResponse400](docs/Model/InlineResponse400.md)
- [InlineResponse401](docs/Model/InlineResponse401.md)
- [InlineResponse403](docs/Model/InlineResponse403.md)
- [InlineResponse404](docs/Model/InlineResponse404.md)
- [InlineResponse409](docs/Model/InlineResponse409.md)
- [InlineResponse412](docs/Model/InlineResponse412.md)
- [InstructPayoutRequestV3](docs/Model/InstructPayoutRequestV3.md)
- [InvitePayeeRequestV3](docs/Model/InvitePayeeRequestV3.md)
- [InvitePayeeRequestV4](docs/Model/InvitePayeeRequestV4.md)
- [InviteUserRequest](docs/Model/InviteUserRequest.md)
- [LinkForResponse](docs/Model/LinkForResponse.md)
- [ListFundingAccountsResponseV2](docs/Model/ListFundingAccountsResponseV2.md)
- [ListFundingAccountsResponseV2Page](docs/Model/ListFundingAccountsResponseV2Page.md)
- [ListPaymentsResponseV3](docs/Model/ListPaymentsResponseV3.md)
- [ListPaymentsResponseV3Page](docs/Model/ListPaymentsResponseV3Page.md)
- [ListPaymentsResponseV4](docs/Model/ListPaymentsResponseV4.md)
- [ListSourceAccountResponseV2](docs/Model/ListSourceAccountResponseV2.md)
- [ListSourceAccountResponseV2Links](docs/Model/ListSourceAccountResponseV2Links.md)
- [ListSourceAccountResponseV3](docs/Model/ListSourceAccountResponseV3.md)
- [ListSourceAccountResponseV3Links](docs/Model/ListSourceAccountResponseV3Links.md)
- [LocalisationDetails](docs/Model/LocalisationDetails.md)
- [MFADetails](docs/Model/MFADetails.md)
- [MFAType](docs/Model/MFAType.md)
- [NameV3](docs/Model/NameV3.md)
- [NameV4](docs/Model/NameV4.md)
- [Notification](docs/Model/Notification.md)
- [NotificationSource](docs/Model/NotificationSource.md)
- [NotificationsV2](docs/Model/NotificationsV2.md)
- [NotificationsV3](docs/Model/NotificationsV3.md)
- [OnboardingStatusChanged](docs/Model/OnboardingStatusChanged.md)
- [PageForResponse](docs/Model/PageForResponse.md)
- [PageResourceFundingPayorStatusAuditResponseFundingPayorStatusAuditResponse](docs/Model/PageResourceFundingPayorStatusAuditResponseFundingPayorStatusAuditResponse.md)
- [PageResourceTransactions](docs/Model/PageResourceTransactions.md)
- [PagedPayeeInvitationStatusResponseV3](docs/Model/PagedPayeeInvitationStatusResponseV3.md)
- [PagedPayeeInvitationStatusResponseV3Page](docs/Model/PagedPayeeInvitationStatusResponseV3Page.md)
- [PagedPayeeInvitationStatusResponseV4](docs/Model/PagedPayeeInvitationStatusResponseV4.md)
- [PagedPayeeResponseV3](docs/Model/PagedPayeeResponseV3.md)
- [PagedPayeeResponseV3Links](docs/Model/PagedPayeeResponseV3Links.md)
- [PagedPayeeResponseV3Page](docs/Model/PagedPayeeResponseV3Page.md)
- [PagedPayeeResponseV3Summary](docs/Model/PagedPayeeResponseV3Summary.md)
- [PagedPayeeResponseV4](docs/Model/PagedPayeeResponseV4.md)
- [PagedPaymentsResponseV3](docs/Model/PagedPaymentsResponseV3.md)
- [PagedUserResponse](docs/Model/PagedUserResponse.md)
- [PagedUserResponseLinks](docs/Model/PagedUserResponseLinks.md)
- [PagedUserResponsePage](docs/Model/PagedUserResponsePage.md)
- [PasswordRequest](docs/Model/PasswordRequest.md)
- [PayableIssueV3](docs/Model/PayableIssueV3.md)
- [PayableIssueV4](docs/Model/PayableIssueV4.md)
- [PayableStatusChanged](docs/Model/PayableStatusChanged.md)
- [PayeeAddressV3](docs/Model/PayeeAddressV3.md)
- [PayeeAddressV4](docs/Model/PayeeAddressV4.md)
- [PayeeDeltaResponseV3](docs/Model/PayeeDeltaResponseV3.md)
- [PayeeDeltaResponseV3Links](docs/Model/PayeeDeltaResponseV3Links.md)
- [PayeeDeltaResponseV3Page](docs/Model/PayeeDeltaResponseV3Page.md)
- [PayeeDeltaResponseV4](docs/Model/PayeeDeltaResponseV4.md)
- [PayeeDeltaResponseV4Links](docs/Model/PayeeDeltaResponseV4Links.md)
- [PayeeDeltaV3](docs/Model/PayeeDeltaV3.md)
- [PayeeDeltaV4](docs/Model/PayeeDeltaV4.md)
- [PayeeDetailResponseV3](docs/Model/PayeeDetailResponseV3.md)
- [PayeeDetailResponseV4](docs/Model/PayeeDetailResponseV4.md)
- [PayeeDetailsChanged](docs/Model/PayeeDetailsChanged.md)
- [PayeeEvent](docs/Model/PayeeEvent.md)
- [PayeeEventAllOf](docs/Model/PayeeEventAllOf.md)
- [PayeeEventAllOfReasons](docs/Model/PayeeEventAllOfReasons.md)
- [PayeeInvitationStatusResponseV3](docs/Model/PayeeInvitationStatusResponseV3.md)
- [PayeeInvitationStatusResponseV4](docs/Model/PayeeInvitationStatusResponseV4.md)
- [PayeePayorRefV3](docs/Model/PayeePayorRefV3.md)
- [PayeePayorRefV4](docs/Model/PayeePayorRefV4.md)
- [PayeeType](docs/Model/PayeeType.md)
- [PayeeTypeEnum](docs/Model/PayeeTypeEnum.md)
- [PayeeUserSelfUpdateRequest](docs/Model/PayeeUserSelfUpdateRequest.md)
- [PaymentChannelCountry](docs/Model/PaymentChannelCountry.md)
- [PaymentChannelOrderRequestV4](docs/Model/PaymentChannelOrderRequestV4.md)
- [PaymentChannelResponseV4](docs/Model/PaymentChannelResponseV4.md)
- [PaymentChannelRule](docs/Model/PaymentChannelRule.md)
- [PaymentChannelRulesResponse](docs/Model/PaymentChannelRulesResponse.md)
- [PaymentChannelSummaryV4](docs/Model/PaymentChannelSummaryV4.md)
- [PaymentChannelsResponseV4](docs/Model/PaymentChannelsResponseV4.md)
- [PaymentDelta](docs/Model/PaymentDelta.md)
- [PaymentDeltaResponse](docs/Model/PaymentDeltaResponse.md)
- [PaymentDeltaResponseV1](docs/Model/PaymentDeltaResponseV1.md)
- [PaymentDeltaV1](docs/Model/PaymentDeltaV1.md)
- [PaymentEvent](docs/Model/PaymentEvent.md)
- [PaymentEventAllOf](docs/Model/PaymentEventAllOf.md)
- [PaymentEventResponse](docs/Model/PaymentEventResponse.md)
- [PaymentEventResponseV3](docs/Model/PaymentEventResponseV3.md)
- [PaymentInstructionV3](docs/Model/PaymentInstructionV3.md)
- [PaymentRejectedOrReturned](docs/Model/PaymentRejectedOrReturned.md)
- [PaymentRejectedOrReturnedAllOf](docs/Model/PaymentRejectedOrReturnedAllOf.md)
- [PaymentResponseV3](docs/Model/PaymentResponseV3.md)
- [PaymentResponseV4](docs/Model/PaymentResponseV4.md)
- [PaymentResponseV4Payout](docs/Model/PaymentResponseV4Payout.md)
- [PaymentStatusChanged](docs/Model/PaymentStatusChanged.md)
- [PaymentStatusChangedAllOf](docs/Model/PaymentStatusChangedAllOf.md)
- [PaymentV3](docs/Model/PaymentV3.md)
- [PayorAddressV2](docs/Model/PayorAddressV2.md)
- [PayorAmlTransaction](docs/Model/PayorAmlTransaction.md)
- [PayorAmlTransactionV3](docs/Model/PayorAmlTransactionV3.md)
- [PayorBrandingResponse](docs/Model/PayorBrandingResponse.md)
- [PayorCreateApiKeyRequest](docs/Model/PayorCreateApiKeyRequest.md)
- [PayorCreateApiKeyResponse](docs/Model/PayorCreateApiKeyResponse.md)
- [PayorCreateApplicationRequest](docs/Model/PayorCreateApplicationRequest.md)
- [PayorEmailOptOutRequest](docs/Model/PayorEmailOptOutRequest.md)
- [PayorFundingDetected](docs/Model/PayorFundingDetected.md)
- [PayorFundingDetectedAllOf](docs/Model/PayorFundingDetectedAllOf.md)
- [PayorLinksResponse](docs/Model/PayorLinksResponse.md)
- [PayorLinksResponseLinks](docs/Model/PayorLinksResponseLinks.md)
- [PayorLinksResponsePayors](docs/Model/PayorLinksResponsePayors.md)
- [PayorToPaymentChannelMappingV4](docs/Model/PayorToPaymentChannelMappingV4.md)
- [PayorV2](docs/Model/PayorV2.md)
- [PayoutCompanyV3](docs/Model/PayoutCompanyV3.md)
- [PayoutIndividualV3](docs/Model/PayoutIndividualV3.md)
- [PayoutNameV3](docs/Model/PayoutNameV3.md)
- [PayoutPayeeV3](docs/Model/PayoutPayeeV3.md)
- [PayoutPayor](docs/Model/PayoutPayor.md)
- [PayoutPayorIds](docs/Model/PayoutPayorIds.md)
- [PayoutPrincipal](docs/Model/PayoutPrincipal.md)
- [PayoutSchedule](docs/Model/PayoutSchedule.md)
- [PayoutScheduleV3](docs/Model/PayoutScheduleV3.md)
- [PayoutSummaryAudit](docs/Model/PayoutSummaryAudit.md)
- [PayoutSummaryAuditV3](docs/Model/PayoutSummaryAuditV3.md)
- [PayoutSummaryResponseV3](docs/Model/PayoutSummaryResponseV3.md)
- [Ping](docs/Model/Ping.md)
- [PingResponse](docs/Model/PingResponse.md)
- [PostInstructFxInfo](docs/Model/PostInstructFxInfo.md)
- [QueryBatchResponseV3](docs/Model/QueryBatchResponseV3.md)
- [QueryBatchResponseV4](docs/Model/QueryBatchResponseV4.md)
- [QuoteFxSummaryV3](docs/Model/QuoteFxSummaryV3.md)
- [QuoteResponseV3](docs/Model/QuoteResponseV3.md)
- [RegionV2](docs/Model/RegionV2.md)
- [RegisterSmsRequest](docs/Model/RegisterSmsRequest.md)
- [RejectedPaymentV3](docs/Model/RejectedPaymentV3.md)
- [ResendTokenRequest](docs/Model/ResendTokenRequest.md)
- [ResetPasswordRequest](docs/Model/ResetPasswordRequest.md)
- [Role](docs/Model/Role.md)
- [RoleUpdateRequest](docs/Model/RoleUpdateRequest.md)
- [SchedulePayoutRequestV3](docs/Model/SchedulePayoutRequestV3.md)
- [SelfMFATypeUnregisterRequest](docs/Model/SelfMFATypeUnregisterRequest.md)
- [SelfUpdatePasswordRequest](docs/Model/SelfUpdatePasswordRequest.md)
- [SetNotificationsRequest](docs/Model/SetNotificationsRequest.md)
- [SetNotificationsRequest2](docs/Model/SetNotificationsRequest2.md)
- [SourceAccountResponseV2](docs/Model/SourceAccountResponseV2.md)
- [SourceAccountResponseV3](docs/Model/SourceAccountResponseV3.md)
- [SourceAccountSummary](docs/Model/SourceAccountSummary.md)
- [SourceAccountSummaryV3](docs/Model/SourceAccountSummaryV3.md)
- [SourceAccountV3](docs/Model/SourceAccountV3.md)
- [SourceEvent](docs/Model/SourceEvent.md)
- [SupportedCountriesResponse](docs/Model/SupportedCountriesResponse.md)
- [SupportedCountriesResponseV2](docs/Model/SupportedCountriesResponseV2.md)
- [SupportedCountry](docs/Model/SupportedCountry.md)
- [SupportedCountryV2](docs/Model/SupportedCountryV2.md)
- [SupportedCurrencyResponseV2](docs/Model/SupportedCurrencyResponseV2.md)
- [SupportedCurrencyV2](docs/Model/SupportedCurrencyV2.md)
- [TransactionResponse](docs/Model/TransactionResponse.md)
- [TransferRequestV2](docs/Model/TransferRequestV2.md)
- [TransferRequestV3](docs/Model/TransferRequestV3.md)
- [UnregisterMFARequest](docs/Model/UnregisterMFARequest.md)
- [UpdatePayeeDetailsRequestV3](docs/Model/UpdatePayeeDetailsRequestV3.md)
- [UpdatePayeeDetailsRequestV4](docs/Model/UpdatePayeeDetailsRequestV4.md)
- [UpdatePaymentChannelRequestV4](docs/Model/UpdatePaymentChannelRequestV4.md)
- [UpdateRemoteIdRequestV3](docs/Model/UpdateRemoteIdRequestV3.md)
- [UpdateRemoteIdRequestV4](docs/Model/UpdateRemoteIdRequestV4.md)
- [UpdateWebhookRequest](docs/Model/UpdateWebhookRequest.md)
- [UserDetailsUpdateRequest](docs/Model/UserDetailsUpdateRequest.md)
- [UserInfo](docs/Model/UserInfo.md)
- [UserResponse](docs/Model/UserResponse.md)
- [UserStatus](docs/Model/UserStatus.md)
- [UserType](docs/Model/UserType.md)
- [UserType2](docs/Model/UserType2.md)
- [ValidatePasswordResponse](docs/Model/ValidatePasswordResponse.md)
- [WebhookResponse](docs/Model/WebhookResponse.md)
- [WebhooksResponse](docs/Model/WebhooksResponse.md)
- [WithdrawPaymentRequest](docs/Model/WithdrawPaymentRequest.md)

## Authorization

Authentication schemes defined for the API:
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

- API version: `2.37.151`
    - Package version: `2.37.151-RC1`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
