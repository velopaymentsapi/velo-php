<?php
/**
 * PaymentResponseV4
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Velo Payments APIs
 *
 * ## Terms and Definitions  Throughout this document and the Velo platform the following terms are used:  * **Payor.** An entity (typically a corporation) which wishes to pay funds to one or more payees via a payout. * **Payee.** The recipient of funds paid out by a payor. * **Payment.** A single transfer of funds from a payor to a payee. * **Payout.** A batch of Payments, typically used by a payor to logically group payments (e.g. by business day). Technically there need be no relationship between the payments in a payout - a single payout can contain payments to multiple payees and/or multiple payments to a single payee. * **Sandbox.** An integration environment provided by Velo Payments which offers a similar API experience to the production environment, but all funding and payment events are simulated, along with many other services such as OFAC sanctions list checking.  ## Overview  The Velo Payments API allows a payor to perform a number of operations. The following is a list of the main capabilities in a natural order of execution:  * Authenticate with the Velo platform * Maintain a collection of payees * Query the payor’s current balance of funds within the platform and perform additional funding * Issue payments to payees * Query the platform for a history of those payments  This document describes the main concepts and APIs required to get up and running with the Velo Payments platform. It is not an exhaustive API reference. For that, please see the separate Velo Payments API Reference.  ## API Considerations  The Velo Payments API is REST based and uses the JSON format for requests and responses.  Most calls are secured using OAuth 2 security and require a valid authentication access token for successful operation. See the Authentication section for details.  Where a dynamic value is required in the examples below, the {token} format is used, suggesting that the caller needs to supply the appropriate value of the token in question (without including the { or } characters).  Where curl examples are given, the –d @filename.json approach is used, indicating that the request body should be placed into a file named filename.json in the current directory. Each of the curl examples in this document should be considered a single line on the command-line, regardless of how they appear in print.  ## Authenticating with the Velo Platform  Once Velo backoffice staff have added your organization as a payor within the Velo platform sandbox, they will create you a payor Id, an API key and an API secret and share these with you in a secure manner.  You will need to use these values to authenticate with the Velo platform in order to gain access to the APIs. The steps to take are explained in the following:  create a string comprising the API key (e.g. 44a9537d-d55d-4b47-8082-14061c2bcdd8) and API secret (e.g. c396b26b-137a-44fd-87f5-34631f8fd529) with a colon between them. E.g. 44a9537d-d55d-4b47-8082-14061c2bcdd8:c396b26b-137a-44fd-87f5-34631f8fd529  base64 encode this string. E.g.: NDRhOTUzN2QtZDU1ZC00YjQ3LTgwODItMTQwNjFjMmJjZGQ4OmMzOTZiMjZiLTEzN2EtNDRmZC04N2Y1LTM0NjMxZjhmZDUyOQ==  create an HTTP **Authorization** header with the value set to e.g. Basic NDRhOTUzN2QtZDU1ZC00YjQ3LTgwODItMTQwNjFjMmJjZGQ4OmMzOTZiMjZiLTEzN2EtNDRmZC04N2Y1LTM0NjMxZjhmZDUyOQ==  perform the Velo authentication REST call using the HTTP header created above e.g. via curl:  ```   curl -X POST \\   -H \"Content-Type: application/json\" \\   -H \"Authorization: Basic NDRhOTUzN2QtZDU1ZC00YjQ3LTgwODItMTQwNjFjMmJjZGQ4OmMzOTZiMjZiLTEzN2EtNDRmZC04N2Y1LTM0NjMxZjhmZDUyOQ==\" \\   'https://api.sandbox.velopayments.com/v1/authenticate?grant_type=client_credentials' ```  If successful, this call will result in a **200** HTTP status code and a response body such as:  ```   {     \"access_token\":\"19f6bafd-93fd-4747-b229-00507bbc991f\",     \"token_type\":\"bearer\",     \"expires_in\":1799,     \"scope\":\"...\"   } ``` ## API access following authentication Following successful authentication, the value of the access_token field in the response (indicated in green above) should then be presented with all subsequent API calls to allow the Velo platform to validate that the caller is authenticated.  This is achieved by setting the HTTP Authorization header with the value set to e.g. Bearer 19f6bafd-93fd-4747-b229-00507bbc991f such as the curl example below:  ```   -H \"Authorization: Bearer 19f6bafd-93fd-4747-b229-00507bbc991f \" ```  If you make other Velo API calls which require authorization but the Authorization header is missing or invalid then you will get a **401** HTTP status response.   ## Http Status Codes Following is a list of Http Status codes that could be returned by the platform      | Status Code            | Description                                                                          |     | -----------------------| -------------------------------------------------------------------------------------|     | 200 OK                 | The request was successfully processed and usually returns a json response           |     | 201 Created            | A resource was created and a Location header is returned linking to the new resource |     | 202 Accepted           | The request has been accepted for processing                                         |     | 204 No Content         | The request has been processed and there is no response (usually deletes and updates)|     | 400 Bad Request        | The request is invalid and should be fixed before retrying                           |     | 401 Unauthorized       | Authentication has failed, usually means the token has expired                       |     | 403 Forbidden          | The user does not have permissions for the request                                   |     | 404 Not Found          | The resource was not found                                                           |     | 409 Conflict           | The resource already exists and there is a conflict                                  |     | 429 Too Many Requests  | The user has submitted too many requests in a given amount of time                   |     | 5xx Server Error       | Platform internal error (should rarely happen)                                       |
 *
 * The version of the OpenAPI document: 2.37.150
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 7.1.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace VeloPayments\Client\Model;

use \ArrayAccess;
use \VeloPayments\Client\ObjectSerializer;

/**
 * PaymentResponseV4 Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PaymentResponseV4 implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PaymentResponseV4';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'payment_id' => 'string',
        'payee_id' => 'string',
        'payor_id' => 'string',
        'payor_name' => 'string',
        'quote_id' => 'string',
        'source_account_id' => 'string',
        'source_account_name' => 'string',
        'remote_id' => 'string',
        'remote_system_id' => 'string',
        'remote_system_payment_id' => 'string',
        'source_amount' => 'int',
        'source_currency' => 'string',
        'payment_amount' => 'int',
        'payment_currency' => 'string',
        'rate' => 'float',
        'inverted_rate' => 'float',
        'is_payment_ccy_base_ccy' => 'bool',
        'submitted_date_time' => '\DateTime',
        'status' => 'string',
        'funding_status' => 'string',
        'routing_number' => 'string',
        'account_number' => 'string',
        'iban' => 'string',
        'payment_memo' => 'string',
        'filename_reference' => 'string',
        'individual_identification_number' => 'string',
        'trace_number' => 'string',
        'payor_payment_id' => 'string',
        'payment_channel_id' => 'string',
        'payment_channel_name' => 'string',
        'account_name' => 'string',
        'rails_id' => 'string',
        'country_code' => 'string',
        'payee_address_country_code' => 'string',
        'events' => '\VeloPayments\Client\Model\PaymentEventResponse[]',
        'return_cost' => 'int',
        'return_reason' => 'string',
        'rails_payment_id' => 'string',
        'rails_batch_id' => 'string',
        'rails_account_id' => 'string',
        'payment_scheme' => 'string',
        'rejection_reason' => 'string',
        'rails_rejection_information' => 'string',
        'withdrawn_reason' => 'string',
        'withdrawable' => 'bool',
        'auto_withdrawn_reason_code' => 'string',
        'transmission_type' => 'string',
        'transmission_type_requested' => 'string',
        'payment_tracking_reference' => 'string',
        'payment_metadata' => 'string',
        'transaction_id' => 'string',
        'transaction_reference' => 'string',
        'schedule' => '\VeloPayments\Client\Model\PayoutSchedule',
        'post_instruct_fx_info' => '\VeloPayments\Client\Model\PostInstructFxInfo',
        'payout' => '\VeloPayments\Client\Model\PaymentResponseV4Payout'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'payment_id' => 'uuid',
        'payee_id' => 'uuid',
        'payor_id' => 'uuid',
        'payor_name' => null,
        'quote_id' => 'uuid',
        'source_account_id' => 'uuid',
        'source_account_name' => null,
        'remote_id' => null,
        'remote_system_id' => null,
        'remote_system_payment_id' => null,
        'source_amount' => null,
        'source_currency' => null,
        'payment_amount' => null,
        'payment_currency' => null,
        'rate' => 'double',
        'inverted_rate' => 'double',
        'is_payment_ccy_base_ccy' => null,
        'submitted_date_time' => 'date-time',
        'status' => null,
        'funding_status' => null,
        'routing_number' => null,
        'account_number' => null,
        'iban' => null,
        'payment_memo' => null,
        'filename_reference' => null,
        'individual_identification_number' => null,
        'trace_number' => null,
        'payor_payment_id' => null,
        'payment_channel_id' => null,
        'payment_channel_name' => null,
        'account_name' => null,
        'rails_id' => null,
        'country_code' => null,
        'payee_address_country_code' => null,
        'events' => null,
        'return_cost' => null,
        'return_reason' => null,
        'rails_payment_id' => null,
        'rails_batch_id' => null,
        'rails_account_id' => null,
        'payment_scheme' => null,
        'rejection_reason' => null,
        'rails_rejection_information' => null,
        'withdrawn_reason' => null,
        'withdrawable' => null,
        'auto_withdrawn_reason_code' => null,
        'transmission_type' => null,
        'transmission_type_requested' => null,
        'payment_tracking_reference' => null,
        'payment_metadata' => null,
        'transaction_id' => 'uuid',
        'transaction_reference' => null,
        'schedule' => null,
        'post_instruct_fx_info' => null,
        'payout' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'payment_id' => false,
		'payee_id' => false,
		'payor_id' => false,
		'payor_name' => false,
		'quote_id' => false,
		'source_account_id' => false,
		'source_account_name' => false,
		'remote_id' => false,
		'remote_system_id' => false,
		'remote_system_payment_id' => false,
		'source_amount' => false,
		'source_currency' => false,
		'payment_amount' => false,
		'payment_currency' => false,
		'rate' => false,
		'inverted_rate' => false,
		'is_payment_ccy_base_ccy' => false,
		'submitted_date_time' => false,
		'status' => false,
		'funding_status' => false,
		'routing_number' => false,
		'account_number' => false,
		'iban' => false,
		'payment_memo' => false,
		'filename_reference' => false,
		'individual_identification_number' => false,
		'trace_number' => false,
		'payor_payment_id' => false,
		'payment_channel_id' => false,
		'payment_channel_name' => false,
		'account_name' => false,
		'rails_id' => false,
		'country_code' => false,
		'payee_address_country_code' => false,
		'events' => false,
		'return_cost' => false,
		'return_reason' => false,
		'rails_payment_id' => false,
		'rails_batch_id' => false,
		'rails_account_id' => false,
		'payment_scheme' => false,
		'rejection_reason' => false,
		'rails_rejection_information' => false,
		'withdrawn_reason' => false,
		'withdrawable' => false,
		'auto_withdrawn_reason_code' => false,
		'transmission_type' => false,
		'transmission_type_requested' => false,
		'payment_tracking_reference' => false,
		'payment_metadata' => false,
		'transaction_id' => false,
		'transaction_reference' => false,
		'schedule' => false,
		'post_instruct_fx_info' => false,
		'payout' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'payment_id' => 'paymentId',
        'payee_id' => 'payeeId',
        'payor_id' => 'payorId',
        'payor_name' => 'payorName',
        'quote_id' => 'quoteId',
        'source_account_id' => 'sourceAccountId',
        'source_account_name' => 'sourceAccountName',
        'remote_id' => 'remoteId',
        'remote_system_id' => 'remoteSystemId',
        'remote_system_payment_id' => 'remoteSystemPaymentId',
        'source_amount' => 'sourceAmount',
        'source_currency' => 'sourceCurrency',
        'payment_amount' => 'paymentAmount',
        'payment_currency' => 'paymentCurrency',
        'rate' => 'rate',
        'inverted_rate' => 'invertedRate',
        'is_payment_ccy_base_ccy' => 'isPaymentCcyBaseCcy',
        'submitted_date_time' => 'submittedDateTime',
        'status' => 'status',
        'funding_status' => 'fundingStatus',
        'routing_number' => 'routingNumber',
        'account_number' => 'accountNumber',
        'iban' => 'iban',
        'payment_memo' => 'paymentMemo',
        'filename_reference' => 'filenameReference',
        'individual_identification_number' => 'individualIdentificationNumber',
        'trace_number' => 'traceNumber',
        'payor_payment_id' => 'payorPaymentId',
        'payment_channel_id' => 'paymentChannelId',
        'payment_channel_name' => 'paymentChannelName',
        'account_name' => 'accountName',
        'rails_id' => 'railsId',
        'country_code' => 'countryCode',
        'payee_address_country_code' => 'payeeAddressCountryCode',
        'events' => 'events',
        'return_cost' => 'returnCost',
        'return_reason' => 'returnReason',
        'rails_payment_id' => 'railsPaymentId',
        'rails_batch_id' => 'railsBatchId',
        'rails_account_id' => 'railsAccountId',
        'payment_scheme' => 'paymentScheme',
        'rejection_reason' => 'rejectionReason',
        'rails_rejection_information' => 'railsRejectionInformation',
        'withdrawn_reason' => 'withdrawnReason',
        'withdrawable' => 'withdrawable',
        'auto_withdrawn_reason_code' => 'autoWithdrawnReasonCode',
        'transmission_type' => 'transmissionType',
        'transmission_type_requested' => 'transmissionTypeRequested',
        'payment_tracking_reference' => 'paymentTrackingReference',
        'payment_metadata' => 'paymentMetadata',
        'transaction_id' => 'transactionId',
        'transaction_reference' => 'transactionReference',
        'schedule' => 'schedule',
        'post_instruct_fx_info' => 'postInstructFxInfo',
        'payout' => 'payout'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'payment_id' => 'setPaymentId',
        'payee_id' => 'setPayeeId',
        'payor_id' => 'setPayorId',
        'payor_name' => 'setPayorName',
        'quote_id' => 'setQuoteId',
        'source_account_id' => 'setSourceAccountId',
        'source_account_name' => 'setSourceAccountName',
        'remote_id' => 'setRemoteId',
        'remote_system_id' => 'setRemoteSystemId',
        'remote_system_payment_id' => 'setRemoteSystemPaymentId',
        'source_amount' => 'setSourceAmount',
        'source_currency' => 'setSourceCurrency',
        'payment_amount' => 'setPaymentAmount',
        'payment_currency' => 'setPaymentCurrency',
        'rate' => 'setRate',
        'inverted_rate' => 'setInvertedRate',
        'is_payment_ccy_base_ccy' => 'setIsPaymentCcyBaseCcy',
        'submitted_date_time' => 'setSubmittedDateTime',
        'status' => 'setStatus',
        'funding_status' => 'setFundingStatus',
        'routing_number' => 'setRoutingNumber',
        'account_number' => 'setAccountNumber',
        'iban' => 'setIban',
        'payment_memo' => 'setPaymentMemo',
        'filename_reference' => 'setFilenameReference',
        'individual_identification_number' => 'setIndividualIdentificationNumber',
        'trace_number' => 'setTraceNumber',
        'payor_payment_id' => 'setPayorPaymentId',
        'payment_channel_id' => 'setPaymentChannelId',
        'payment_channel_name' => 'setPaymentChannelName',
        'account_name' => 'setAccountName',
        'rails_id' => 'setRailsId',
        'country_code' => 'setCountryCode',
        'payee_address_country_code' => 'setPayeeAddressCountryCode',
        'events' => 'setEvents',
        'return_cost' => 'setReturnCost',
        'return_reason' => 'setReturnReason',
        'rails_payment_id' => 'setRailsPaymentId',
        'rails_batch_id' => 'setRailsBatchId',
        'rails_account_id' => 'setRailsAccountId',
        'payment_scheme' => 'setPaymentScheme',
        'rejection_reason' => 'setRejectionReason',
        'rails_rejection_information' => 'setRailsRejectionInformation',
        'withdrawn_reason' => 'setWithdrawnReason',
        'withdrawable' => 'setWithdrawable',
        'auto_withdrawn_reason_code' => 'setAutoWithdrawnReasonCode',
        'transmission_type' => 'setTransmissionType',
        'transmission_type_requested' => 'setTransmissionTypeRequested',
        'payment_tracking_reference' => 'setPaymentTrackingReference',
        'payment_metadata' => 'setPaymentMetadata',
        'transaction_id' => 'setTransactionId',
        'transaction_reference' => 'setTransactionReference',
        'schedule' => 'setSchedule',
        'post_instruct_fx_info' => 'setPostInstructFxInfo',
        'payout' => 'setPayout'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'payment_id' => 'getPaymentId',
        'payee_id' => 'getPayeeId',
        'payor_id' => 'getPayorId',
        'payor_name' => 'getPayorName',
        'quote_id' => 'getQuoteId',
        'source_account_id' => 'getSourceAccountId',
        'source_account_name' => 'getSourceAccountName',
        'remote_id' => 'getRemoteId',
        'remote_system_id' => 'getRemoteSystemId',
        'remote_system_payment_id' => 'getRemoteSystemPaymentId',
        'source_amount' => 'getSourceAmount',
        'source_currency' => 'getSourceCurrency',
        'payment_amount' => 'getPaymentAmount',
        'payment_currency' => 'getPaymentCurrency',
        'rate' => 'getRate',
        'inverted_rate' => 'getInvertedRate',
        'is_payment_ccy_base_ccy' => 'getIsPaymentCcyBaseCcy',
        'submitted_date_time' => 'getSubmittedDateTime',
        'status' => 'getStatus',
        'funding_status' => 'getFundingStatus',
        'routing_number' => 'getRoutingNumber',
        'account_number' => 'getAccountNumber',
        'iban' => 'getIban',
        'payment_memo' => 'getPaymentMemo',
        'filename_reference' => 'getFilenameReference',
        'individual_identification_number' => 'getIndividualIdentificationNumber',
        'trace_number' => 'getTraceNumber',
        'payor_payment_id' => 'getPayorPaymentId',
        'payment_channel_id' => 'getPaymentChannelId',
        'payment_channel_name' => 'getPaymentChannelName',
        'account_name' => 'getAccountName',
        'rails_id' => 'getRailsId',
        'country_code' => 'getCountryCode',
        'payee_address_country_code' => 'getPayeeAddressCountryCode',
        'events' => 'getEvents',
        'return_cost' => 'getReturnCost',
        'return_reason' => 'getReturnReason',
        'rails_payment_id' => 'getRailsPaymentId',
        'rails_batch_id' => 'getRailsBatchId',
        'rails_account_id' => 'getRailsAccountId',
        'payment_scheme' => 'getPaymentScheme',
        'rejection_reason' => 'getRejectionReason',
        'rails_rejection_information' => 'getRailsRejectionInformation',
        'withdrawn_reason' => 'getWithdrawnReason',
        'withdrawable' => 'getWithdrawable',
        'auto_withdrawn_reason_code' => 'getAutoWithdrawnReasonCode',
        'transmission_type' => 'getTransmissionType',
        'transmission_type_requested' => 'getTransmissionTypeRequested',
        'payment_tracking_reference' => 'getPaymentTrackingReference',
        'payment_metadata' => 'getPaymentMetadata',
        'transaction_id' => 'getTransactionId',
        'transaction_reference' => 'getTransactionReference',
        'schedule' => 'getSchedule',
        'post_instruct_fx_info' => 'getPostInstructFxInfo',
        'payout' => 'getPayout'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('payment_id', $data ?? [], null);
        $this->setIfExists('payee_id', $data ?? [], null);
        $this->setIfExists('payor_id', $data ?? [], null);
        $this->setIfExists('payor_name', $data ?? [], null);
        $this->setIfExists('quote_id', $data ?? [], null);
        $this->setIfExists('source_account_id', $data ?? [], null);
        $this->setIfExists('source_account_name', $data ?? [], null);
        $this->setIfExists('remote_id', $data ?? [], null);
        $this->setIfExists('remote_system_id', $data ?? [], null);
        $this->setIfExists('remote_system_payment_id', $data ?? [], null);
        $this->setIfExists('source_amount', $data ?? [], null);
        $this->setIfExists('source_currency', $data ?? [], null);
        $this->setIfExists('payment_amount', $data ?? [], null);
        $this->setIfExists('payment_currency', $data ?? [], null);
        $this->setIfExists('rate', $data ?? [], null);
        $this->setIfExists('inverted_rate', $data ?? [], null);
        $this->setIfExists('is_payment_ccy_base_ccy', $data ?? [], null);
        $this->setIfExists('submitted_date_time', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('funding_status', $data ?? [], null);
        $this->setIfExists('routing_number', $data ?? [], null);
        $this->setIfExists('account_number', $data ?? [], null);
        $this->setIfExists('iban', $data ?? [], null);
        $this->setIfExists('payment_memo', $data ?? [], null);
        $this->setIfExists('filename_reference', $data ?? [], null);
        $this->setIfExists('individual_identification_number', $data ?? [], null);
        $this->setIfExists('trace_number', $data ?? [], null);
        $this->setIfExists('payor_payment_id', $data ?? [], null);
        $this->setIfExists('payment_channel_id', $data ?? [], null);
        $this->setIfExists('payment_channel_name', $data ?? [], null);
        $this->setIfExists('account_name', $data ?? [], null);
        $this->setIfExists('rails_id', $data ?? [], 'RAILS ID UNAVAILABLE');
        $this->setIfExists('country_code', $data ?? [], null);
        $this->setIfExists('payee_address_country_code', $data ?? [], null);
        $this->setIfExists('events', $data ?? [], null);
        $this->setIfExists('return_cost', $data ?? [], null);
        $this->setIfExists('return_reason', $data ?? [], null);
        $this->setIfExists('rails_payment_id', $data ?? [], null);
        $this->setIfExists('rails_batch_id', $data ?? [], null);
        $this->setIfExists('rails_account_id', $data ?? [], null);
        $this->setIfExists('payment_scheme', $data ?? [], null);
        $this->setIfExists('rejection_reason', $data ?? [], null);
        $this->setIfExists('rails_rejection_information', $data ?? [], null);
        $this->setIfExists('withdrawn_reason', $data ?? [], null);
        $this->setIfExists('withdrawable', $data ?? [], null);
        $this->setIfExists('auto_withdrawn_reason_code', $data ?? [], null);
        $this->setIfExists('transmission_type', $data ?? [], null);
        $this->setIfExists('transmission_type_requested', $data ?? [], null);
        $this->setIfExists('payment_tracking_reference', $data ?? [], null);
        $this->setIfExists('payment_metadata', $data ?? [], null);
        $this->setIfExists('transaction_id', $data ?? [], null);
        $this->setIfExists('transaction_reference', $data ?? [], null);
        $this->setIfExists('schedule', $data ?? [], null);
        $this->setIfExists('post_instruct_fx_info', $data ?? [], null);
        $this->setIfExists('payout', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['payment_id'] === null) {
            $invalidProperties[] = "'payment_id' can't be null";
        }
        if ($this->container['payee_id'] === null) {
            $invalidProperties[] = "'payee_id' can't be null";
        }
        if ($this->container['payor_id'] === null) {
            $invalidProperties[] = "'payor_id' can't be null";
        }
        if ($this->container['quote_id'] === null) {
            $invalidProperties[] = "'quote_id' can't be null";
        }
        if ($this->container['source_account_id'] === null) {
            $invalidProperties[] = "'source_account_id' can't be null";
        }
        if (!is_null($this->container['source_currency']) && (mb_strlen($this->container['source_currency']) > 3)) {
            $invalidProperties[] = "invalid value for 'source_currency', the character length must be smaller than or equal to 3.";
        }

        if (!is_null($this->container['source_currency']) && (mb_strlen($this->container['source_currency']) < 3)) {
            $invalidProperties[] = "invalid value for 'source_currency', the character length must be bigger than or equal to 3.";
        }

        if ($this->container['payment_amount'] === null) {
            $invalidProperties[] = "'payment_amount' can't be null";
        }
        if (!is_null($this->container['payment_currency']) && (mb_strlen($this->container['payment_currency']) > 3)) {
            $invalidProperties[] = "invalid value for 'payment_currency', the character length must be smaller than or equal to 3.";
        }

        if (!is_null($this->container['payment_currency']) && (mb_strlen($this->container['payment_currency']) < 3)) {
            $invalidProperties[] = "invalid value for 'payment_currency', the character length must be bigger than or equal to 3.";
        }

        if ($this->container['submitted_date_time'] === null) {
            $invalidProperties[] = "'submitted_date_time' can't be null";
        }
        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
        }
        if ($this->container['funding_status'] === null) {
            $invalidProperties[] = "'funding_status' can't be null";
        }
        if ($this->container['rails_id'] === null) {
            $invalidProperties[] = "'rails_id' can't be null";
        }
        if ($this->container['events'] === null) {
            $invalidProperties[] = "'events' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets payment_id
     *
     * @return string
     */
    public function getPaymentId()
    {
        return $this->container['payment_id'];
    }

    /**
     * Sets payment_id
     *
     * @param string $payment_id The id of the payment
     *
     * @return self
     */
    public function setPaymentId($payment_id)
    {
        if (is_null($payment_id)) {
            throw new \InvalidArgumentException('non-nullable payment_id cannot be null');
        }
        $this->container['payment_id'] = $payment_id;

        return $this;
    }

    /**
     * Gets payee_id
     *
     * @return string
     */
    public function getPayeeId()
    {
        return $this->container['payee_id'];
    }

    /**
     * Sets payee_id
     *
     * @param string $payee_id The id of the paymeee
     *
     * @return self
     */
    public function setPayeeId($payee_id)
    {
        if (is_null($payee_id)) {
            throw new \InvalidArgumentException('non-nullable payee_id cannot be null');
        }
        $this->container['payee_id'] = $payee_id;

        return $this;
    }

    /**
     * Gets payor_id
     *
     * @return string
     */
    public function getPayorId()
    {
        return $this->container['payor_id'];
    }

    /**
     * Sets payor_id
     *
     * @param string $payor_id The id of the payor
     *
     * @return self
     */
    public function setPayorId($payor_id)
    {
        if (is_null($payor_id)) {
            throw new \InvalidArgumentException('non-nullable payor_id cannot be null');
        }
        $this->container['payor_id'] = $payor_id;

        return $this;
    }

    /**
     * Gets payor_name
     *
     * @return string|null
     */
    public function getPayorName()
    {
        return $this->container['payor_name'];
    }

    /**
     * Sets payor_name
     *
     * @param string|null $payor_name The name of the payor
     *
     * @return self
     */
    public function setPayorName($payor_name)
    {
        if (is_null($payor_name)) {
            throw new \InvalidArgumentException('non-nullable payor_name cannot be null');
        }
        $this->container['payor_name'] = $payor_name;

        return $this;
    }

    /**
     * Gets quote_id
     *
     * @return string
     */
    public function getQuoteId()
    {
        return $this->container['quote_id'];
    }

    /**
     * Sets quote_id
     *
     * @param string $quote_id The quote Id used for the FX
     *
     * @return self
     */
    public function setQuoteId($quote_id)
    {
        if (is_null($quote_id)) {
            throw new \InvalidArgumentException('non-nullable quote_id cannot be null');
        }
        $this->container['quote_id'] = $quote_id;

        return $this;
    }

    /**
     * Gets source_account_id
     *
     * @return string
     */
    public function getSourceAccountId()
    {
        return $this->container['source_account_id'];
    }

    /**
     * Sets source_account_id
     *
     * @param string $source_account_id The id of the source account from which the payment was taken
     *
     * @return self
     */
    public function setSourceAccountId($source_account_id)
    {
        if (is_null($source_account_id)) {
            throw new \InvalidArgumentException('non-nullable source_account_id cannot be null');
        }
        $this->container['source_account_id'] = $source_account_id;

        return $this;
    }

    /**
     * Gets source_account_name
     *
     * @return string|null
     */
    public function getSourceAccountName()
    {
        return $this->container['source_account_name'];
    }

    /**
     * Sets source_account_name
     *
     * @param string|null $source_account_name The name of the source account from which the payment was taken
     *
     * @return self
     */
    public function setSourceAccountName($source_account_name)
    {
        if (is_null($source_account_name)) {
            throw new \InvalidArgumentException('non-nullable source_account_name cannot be null');
        }
        $this->container['source_account_name'] = $source_account_name;

        return $this;
    }

    /**
     * Gets remote_id
     *
     * @return string|null
     */
    public function getRemoteId()
    {
        return $this->container['remote_id'];
    }

    /**
     * Sets remote_id
     *
     * @param string|null $remote_id The remote id by which the payor refers to the payee. Only populated once payment is confirmed
     *
     * @return self
     */
    public function setRemoteId($remote_id)
    {
        if (is_null($remote_id)) {
            throw new \InvalidArgumentException('non-nullable remote_id cannot be null');
        }
        $this->container['remote_id'] = $remote_id;

        return $this;
    }

    /**
     * Gets remote_system_id
     *
     * @return string|null
     */
    public function getRemoteSystemId()
    {
        return $this->container['remote_system_id'];
    }

    /**
     * Sets remote_system_id
     *
     * @param string|null $remote_system_id The velo id of the remote system orchestrating the payment. Not populated for normal Velo payments.
     *
     * @return self
     */
    public function setRemoteSystemId($remote_system_id)
    {
        if (is_null($remote_system_id)) {
            throw new \InvalidArgumentException('non-nullable remote_system_id cannot be null');
        }
        $this->container['remote_system_id'] = $remote_system_id;

        return $this;
    }

    /**
     * Gets remote_system_payment_id
     *
     * @return string|null
     */
    public function getRemoteSystemPaymentId()
    {
        return $this->container['remote_system_payment_id'];
    }

    /**
     * Sets remote_system_payment_id
     *
     * @param string|null $remote_system_payment_id The id of the payment in the remote system. Not populated for normal Velo payments.
     *
     * @return self
     */
    public function setRemoteSystemPaymentId($remote_system_payment_id)
    {
        if (is_null($remote_system_payment_id)) {
            throw new \InvalidArgumentException('non-nullable remote_system_payment_id cannot be null');
        }
        $this->container['remote_system_payment_id'] = $remote_system_payment_id;

        return $this;
    }

    /**
     * Gets source_amount
     *
     * @return int|null
     */
    public function getSourceAmount()
    {
        return $this->container['source_amount'];
    }

    /**
     * Sets source_amount
     *
     * @param int|null $source_amount The source amount for the payment (amount debited to make the payment)
     *
     * @return self
     */
    public function setSourceAmount($source_amount)
    {
        if (is_null($source_amount)) {
            throw new \InvalidArgumentException('non-nullable source_amount cannot be null');
        }
        $this->container['source_amount'] = $source_amount;

        return $this;
    }

    /**
     * Gets source_currency
     *
     * @return string|null
     */
    public function getSourceCurrency()
    {
        return $this->container['source_currency'];
    }

    /**
     * Sets source_currency
     *
     * @param string|null $source_currency ISO-4217 3 character currency code
     *
     * @return self
     */
    public function setSourceCurrency($source_currency)
    {
        if (is_null($source_currency)) {
            throw new \InvalidArgumentException('non-nullable source_currency cannot be null');
        }
        if ((mb_strlen($source_currency) > 3)) {
            throw new \InvalidArgumentException('invalid length for $source_currency when calling PaymentResponseV4., must be smaller than or equal to 3.');
        }
        if ((mb_strlen($source_currency) < 3)) {
            throw new \InvalidArgumentException('invalid length for $source_currency when calling PaymentResponseV4., must be bigger than or equal to 3.');
        }

        $this->container['source_currency'] = $source_currency;

        return $this;
    }

    /**
     * Gets payment_amount
     *
     * @return int
     */
    public function getPaymentAmount()
    {
        return $this->container['payment_amount'];
    }

    /**
     * Sets payment_amount
     *
     * @param int $payment_amount The amount which the payee will receive
     *
     * @return self
     */
    public function setPaymentAmount($payment_amount)
    {
        if (is_null($payment_amount)) {
            throw new \InvalidArgumentException('non-nullable payment_amount cannot be null');
        }
        $this->container['payment_amount'] = $payment_amount;

        return $this;
    }

    /**
     * Gets payment_currency
     *
     * @return string|null
     */
    public function getPaymentCurrency()
    {
        return $this->container['payment_currency'];
    }

    /**
     * Sets payment_currency
     *
     * @param string|null $payment_currency ISO-4217 3 character currency code
     *
     * @return self
     */
    public function setPaymentCurrency($payment_currency)
    {
        if (is_null($payment_currency)) {
            throw new \InvalidArgumentException('non-nullable payment_currency cannot be null');
        }
        if ((mb_strlen($payment_currency) > 3)) {
            throw new \InvalidArgumentException('invalid length for $payment_currency when calling PaymentResponseV4., must be smaller than or equal to 3.');
        }
        if ((mb_strlen($payment_currency) < 3)) {
            throw new \InvalidArgumentException('invalid length for $payment_currency when calling PaymentResponseV4., must be bigger than or equal to 3.');
        }

        $this->container['payment_currency'] = $payment_currency;

        return $this;
    }

    /**
     * Gets rate
     *
     * @return float|null
     */
    public function getRate()
    {
        return $this->container['rate'];
    }

    /**
     * Sets rate
     *
     * @param float|null $rate The FX rate for the payment, if FX was involved. **Note** that (depending on the role of the caller) this information may not be displayed
     *
     * @return self
     */
    public function setRate($rate)
    {
        if (is_null($rate)) {
            throw new \InvalidArgumentException('non-nullable rate cannot be null');
        }
        $this->container['rate'] = $rate;

        return $this;
    }

    /**
     * Gets inverted_rate
     *
     * @return float|null
     */
    public function getInvertedRate()
    {
        return $this->container['inverted_rate'];
    }

    /**
     * Sets inverted_rate
     *
     * @param float|null $inverted_rate The inverted FX rate for the payment, if FX was involved. **Note** that (depending on the role of the caller) this information may not be displayed
     *
     * @return self
     */
    public function setInvertedRate($inverted_rate)
    {
        if (is_null($inverted_rate)) {
            throw new \InvalidArgumentException('non-nullable inverted_rate cannot be null');
        }
        $this->container['inverted_rate'] = $inverted_rate;

        return $this;
    }

    /**
     * Gets is_payment_ccy_base_ccy
     *
     * @return bool|null
     */
    public function getIsPaymentCcyBaseCcy()
    {
        return $this->container['is_payment_ccy_base_ccy'];
    }

    /**
     * Sets is_payment_ccy_base_ccy
     *
     * @param bool|null $is_payment_ccy_base_ccy is_payment_ccy_base_ccy
     *
     * @return self
     */
    public function setIsPaymentCcyBaseCcy($is_payment_ccy_base_ccy)
    {
        if (is_null($is_payment_ccy_base_ccy)) {
            throw new \InvalidArgumentException('non-nullable is_payment_ccy_base_ccy cannot be null');
        }
        $this->container['is_payment_ccy_base_ccy'] = $is_payment_ccy_base_ccy;

        return $this;
    }

    /**
     * Gets submitted_date_time
     *
     * @return \DateTime
     */
    public function getSubmittedDateTime()
    {
        return $this->container['submitted_date_time'];
    }

    /**
     * Sets submitted_date_time
     *
     * @param \DateTime $submitted_date_time submitted_date_time
     *
     * @return self
     */
    public function setSubmittedDateTime($submitted_date_time)
    {
        if (is_null($submitted_date_time)) {
            throw new \InvalidArgumentException('non-nullable submitted_date_time cannot be null');
        }
        $this->container['submitted_date_time'] = $submitted_date_time;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status Current status of the payment. One of the following values: ACCEPTED, AWAITING_FUNDS, FUNDED, UNFUNDED, BANK_PAYMENT_REQUESTED, REJECTED, ACCEPTED_BY_RAILS, CONFIRMED, RETURNED, WITHDRAWN
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new \InvalidArgumentException('non-nullable status cannot be null');
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets funding_status
     *
     * @return string
     */
    public function getFundingStatus()
    {
        return $this->container['funding_status'];
    }

    /**
     * Sets funding_status
     *
     * @param string $funding_status Current funding status of the payment. One of the following values: FUNDED, INSTRUCTED, UNFUNDED
     *
     * @return self
     */
    public function setFundingStatus($funding_status)
    {
        if (is_null($funding_status)) {
            throw new \InvalidArgumentException('non-nullable funding_status cannot be null');
        }
        $this->container['funding_status'] = $funding_status;

        return $this;
    }

    /**
     * Gets routing_number
     *
     * @return string|null
     */
    public function getRoutingNumber()
    {
        return $this->container['routing_number'];
    }

    /**
     * Sets routing_number
     *
     * @param string|null $routing_number The routing number for the payment.
     *
     * @return self
     */
    public function setRoutingNumber($routing_number)
    {
        if (is_null($routing_number)) {
            throw new \InvalidArgumentException('non-nullable routing_number cannot be null');
        }
        $this->container['routing_number'] = $routing_number;

        return $this;
    }

    /**
     * Gets account_number
     *
     * @return string|null
     */
    public function getAccountNumber()
    {
        return $this->container['account_number'];
    }

    /**
     * Sets account_number
     *
     * @param string|null $account_number The account number for the account which will receive the payment.
     *
     * @return self
     */
    public function setAccountNumber($account_number)
    {
        if (is_null($account_number)) {
            throw new \InvalidArgumentException('non-nullable account_number cannot be null');
        }
        $this->container['account_number'] = $account_number;

        return $this;
    }

    /**
     * Gets iban
     *
     * @return string|null
     */
    public function getIban()
    {
        return $this->container['iban'];
    }

    /**
     * Sets iban
     *
     * @param string|null $iban The iban for the payment.
     *
     * @return self
     */
    public function setIban($iban)
    {
        if (is_null($iban)) {
            throw new \InvalidArgumentException('non-nullable iban cannot be null');
        }
        $this->container['iban'] = $iban;

        return $this;
    }

    /**
     * Gets payment_memo
     *
     * @return string|null
     */
    public function getPaymentMemo()
    {
        return $this->container['payment_memo'];
    }

    /**
     * Sets payment_memo
     *
     * @param string|null $payment_memo The payment memo set by the payor
     *
     * @return self
     */
    public function setPaymentMemo($payment_memo)
    {
        if (is_null($payment_memo)) {
            throw new \InvalidArgumentException('non-nullable payment_memo cannot be null');
        }
        $this->container['payment_memo'] = $payment_memo;

        return $this;
    }

    /**
     * Gets filename_reference
     *
     * @return string|null
     */
    public function getFilenameReference()
    {
        return $this->container['filename_reference'];
    }

    /**
     * Sets filename_reference
     *
     * @param string|null $filename_reference ACH file payment was submitted in, if applicable
     *
     * @return self
     */
    public function setFilenameReference($filename_reference)
    {
        if (is_null($filename_reference)) {
            throw new \InvalidArgumentException('non-nullable filename_reference cannot be null');
        }
        $this->container['filename_reference'] = $filename_reference;

        return $this;
    }

    /**
     * Gets individual_identification_number
     *
     * @return string|null
     */
    public function getIndividualIdentificationNumber()
    {
        return $this->container['individual_identification_number'];
    }

    /**
     * Sets individual_identification_number
     *
     * @param string|null $individual_identification_number Individual Identification Number assigned to the payment in the ACH file, if applicable
     *
     * @return self
     */
    public function setIndividualIdentificationNumber($individual_identification_number)
    {
        if (is_null($individual_identification_number)) {
            throw new \InvalidArgumentException('non-nullable individual_identification_number cannot be null');
        }
        $this->container['individual_identification_number'] = $individual_identification_number;

        return $this;
    }

    /**
     * Gets trace_number
     *
     * @return string|null
     */
    public function getTraceNumber()
    {
        return $this->container['trace_number'];
    }

    /**
     * Sets trace_number
     *
     * @param string|null $trace_number Trace Number assigned to the payment in the ACH file, if applicable
     *
     * @return self
     */
    public function setTraceNumber($trace_number)
    {
        if (is_null($trace_number)) {
            throw new \InvalidArgumentException('non-nullable trace_number cannot be null');
        }
        $this->container['trace_number'] = $trace_number;

        return $this;
    }

    /**
     * Gets payor_payment_id
     *
     * @return string|null
     */
    public function getPayorPaymentId()
    {
        return $this->container['payor_payment_id'];
    }

    /**
     * Sets payor_payment_id
     *
     * @param string|null $payor_payment_id payor_payment_id
     *
     * @return self
     */
    public function setPayorPaymentId($payor_payment_id)
    {
        if (is_null($payor_payment_id)) {
            throw new \InvalidArgumentException('non-nullable payor_payment_id cannot be null');
        }
        $this->container['payor_payment_id'] = $payor_payment_id;

        return $this;
    }

    /**
     * Gets payment_channel_id
     *
     * @return string|null
     */
    public function getPaymentChannelId()
    {
        return $this->container['payment_channel_id'];
    }

    /**
     * Sets payment_channel_id
     *
     * @param string|null $payment_channel_id payment_channel_id
     *
     * @return self
     */
    public function setPaymentChannelId($payment_channel_id)
    {
        if (is_null($payment_channel_id)) {
            throw new \InvalidArgumentException('non-nullable payment_channel_id cannot be null');
        }
        $this->container['payment_channel_id'] = $payment_channel_id;

        return $this;
    }

    /**
     * Gets payment_channel_name
     *
     * @return string|null
     */
    public function getPaymentChannelName()
    {
        return $this->container['payment_channel_name'];
    }

    /**
     * Sets payment_channel_name
     *
     * @param string|null $payment_channel_name payment_channel_name
     *
     * @return self
     */
    public function setPaymentChannelName($payment_channel_name)
    {
        if (is_null($payment_channel_name)) {
            throw new \InvalidArgumentException('non-nullable payment_channel_name cannot be null');
        }
        $this->container['payment_channel_name'] = $payment_channel_name;

        return $this;
    }

    /**
     * Gets account_name
     *
     * @return string|null
     */
    public function getAccountName()
    {
        return $this->container['account_name'];
    }

    /**
     * Sets account_name
     *
     * @param string|null $account_name account_name
     *
     * @return self
     */
    public function setAccountName($account_name)
    {
        if (is_null($account_name)) {
            throw new \InvalidArgumentException('non-nullable account_name cannot be null');
        }
        $this->container['account_name'] = $account_name;

        return $this;
    }

    /**
     * Gets rails_id
     *
     * @return string
     */
    public function getRailsId()
    {
        return $this->container['rails_id'];
    }

    /**
     * Sets rails_id
     *
     * @param string $rails_id The rails ID. Default value is RAILS ID UNAVAILABLE when not populated.
     *
     * @return self
     */
    public function setRailsId($rails_id)
    {
        if (is_null($rails_id)) {
            throw new \InvalidArgumentException('non-nullable rails_id cannot be null');
        }
        $this->container['rails_id'] = $rails_id;

        return $this;
    }

    /**
     * Gets country_code
     *
     * @return string|null
     */
    public function getCountryCode()
    {
        return $this->container['country_code'];
    }

    /**
     * Sets country_code
     *
     * @param string|null $country_code The country code of the payment channel.
     *
     * @return self
     */
    public function setCountryCode($country_code)
    {
        if (is_null($country_code)) {
            throw new \InvalidArgumentException('non-nullable country_code cannot be null');
        }
        $this->container['country_code'] = $country_code;

        return $this;
    }

    /**
     * Gets payee_address_country_code
     *
     * @return string|null
     */
    public function getPayeeAddressCountryCode()
    {
        return $this->container['payee_address_country_code'];
    }

    /**
     * Sets payee_address_country_code
     *
     * @param string|null $payee_address_country_code The country code of the payee's address.
     *
     * @return self
     */
    public function setPayeeAddressCountryCode($payee_address_country_code)
    {
        if (is_null($payee_address_country_code)) {
            throw new \InvalidArgumentException('non-nullable payee_address_country_code cannot be null');
        }
        $this->container['payee_address_country_code'] = $payee_address_country_code;

        return $this;
    }

    /**
     * Gets events
     *
     * @return \VeloPayments\Client\Model\PaymentEventResponse[]
     */
    public function getEvents()
    {
        return $this->container['events'];
    }

    /**
     * Sets events
     *
     * @param \VeloPayments\Client\Model\PaymentEventResponse[] $events events
     *
     * @return self
     */
    public function setEvents($events)
    {
        if (is_null($events)) {
            throw new \InvalidArgumentException('non-nullable events cannot be null');
        }
        $this->container['events'] = $events;

        return $this;
    }

    /**
     * Gets return_cost
     *
     * @return int|null
     */
    public function getReturnCost()
    {
        return $this->container['return_cost'];
    }

    /**
     * Sets return_cost
     *
     * @param int|null $return_cost The return cost if a returned payment.
     *
     * @return self
     */
    public function setReturnCost($return_cost)
    {
        if (is_null($return_cost)) {
            throw new \InvalidArgumentException('non-nullable return_cost cannot be null');
        }
        $this->container['return_cost'] = $return_cost;

        return $this;
    }

    /**
     * Gets return_reason
     *
     * @return string|null
     */
    public function getReturnReason()
    {
        return $this->container['return_reason'];
    }

    /**
     * Sets return_reason
     *
     * @param string|null $return_reason return_reason
     *
     * @return self
     */
    public function setReturnReason($return_reason)
    {
        if (is_null($return_reason)) {
            throw new \InvalidArgumentException('non-nullable return_reason cannot be null');
        }
        $this->container['return_reason'] = $return_reason;

        return $this;
    }

    /**
     * Gets rails_payment_id
     *
     * @return string|null
     */
    public function getRailsPaymentId()
    {
        return $this->container['rails_payment_id'];
    }

    /**
     * Sets rails_payment_id
     *
     * @param string|null $rails_payment_id rails_payment_id
     *
     * @return self
     */
    public function setRailsPaymentId($rails_payment_id)
    {
        if (is_null($rails_payment_id)) {
            throw new \InvalidArgumentException('non-nullable rails_payment_id cannot be null');
        }
        $this->container['rails_payment_id'] = $rails_payment_id;

        return $this;
    }

    /**
     * Gets rails_batch_id
     *
     * @return string|null
     */
    public function getRailsBatchId()
    {
        return $this->container['rails_batch_id'];
    }

    /**
     * Sets rails_batch_id
     *
     * @param string|null $rails_batch_id rails_batch_id
     *
     * @return self
     */
    public function setRailsBatchId($rails_batch_id)
    {
        if (is_null($rails_batch_id)) {
            throw new \InvalidArgumentException('non-nullable rails_batch_id cannot be null');
        }
        $this->container['rails_batch_id'] = $rails_batch_id;

        return $this;
    }

    /**
     * Gets rails_account_id
     *
     * @return string|null
     */
    public function getRailsAccountId()
    {
        return $this->container['rails_account_id'];
    }

    /**
     * Sets rails_account_id
     *
     * @param string|null $rails_account_id rails_account_id
     *
     * @return self
     */
    public function setRailsAccountId($rails_account_id)
    {
        if (is_null($rails_account_id)) {
            throw new \InvalidArgumentException('non-nullable rails_account_id cannot be null');
        }
        $this->container['rails_account_id'] = $rails_account_id;

        return $this;
    }

    /**
     * Gets payment_scheme
     *
     * @return string|null
     */
    public function getPaymentScheme()
    {
        return $this->container['payment_scheme'];
    }

    /**
     * Sets payment_scheme
     *
     * @param string|null $payment_scheme payment_scheme
     *
     * @return self
     */
    public function setPaymentScheme($payment_scheme)
    {
        if (is_null($payment_scheme)) {
            throw new \InvalidArgumentException('non-nullable payment_scheme cannot be null');
        }
        $this->container['payment_scheme'] = $payment_scheme;

        return $this;
    }

    /**
     * Gets rejection_reason
     *
     * @return string|null
     */
    public function getRejectionReason()
    {
        return $this->container['rejection_reason'];
    }

    /**
     * Sets rejection_reason
     *
     * @param string|null $rejection_reason rejection_reason
     *
     * @return self
     */
    public function setRejectionReason($rejection_reason)
    {
        if (is_null($rejection_reason)) {
            throw new \InvalidArgumentException('non-nullable rejection_reason cannot be null');
        }
        $this->container['rejection_reason'] = $rejection_reason;

        return $this;
    }

    /**
     * Gets rails_rejection_information
     *
     * @return string|null
     */
    public function getRailsRejectionInformation()
    {
        return $this->container['rails_rejection_information'];
    }

    /**
     * Sets rails_rejection_information
     *
     * @param string|null $rails_rejection_information The original reason that the payment was rejected. This can be third party rails specific if rejected by the underlying third party rails logic.
     *
     * @return self
     */
    public function setRailsRejectionInformation($rails_rejection_information)
    {
        if (is_null($rails_rejection_information)) {
            throw new \InvalidArgumentException('non-nullable rails_rejection_information cannot be null');
        }
        $this->container['rails_rejection_information'] = $rails_rejection_information;

        return $this;
    }

    /**
     * Gets withdrawn_reason
     *
     * @return string|null
     */
    public function getWithdrawnReason()
    {
        return $this->container['withdrawn_reason'];
    }

    /**
     * Sets withdrawn_reason
     *
     * @param string|null $withdrawn_reason withdrawn_reason
     *
     * @return self
     */
    public function setWithdrawnReason($withdrawn_reason)
    {
        if (is_null($withdrawn_reason)) {
            throw new \InvalidArgumentException('non-nullable withdrawn_reason cannot be null');
        }
        $this->container['withdrawn_reason'] = $withdrawn_reason;

        return $this;
    }

    /**
     * Gets withdrawable
     *
     * @return bool|null
     */
    public function getWithdrawable()
    {
        return $this->container['withdrawable'];
    }

    /**
     * Sets withdrawable
     *
     * @param bool|null $withdrawable withdrawable
     *
     * @return self
     */
    public function setWithdrawable($withdrawable)
    {
        if (is_null($withdrawable)) {
            throw new \InvalidArgumentException('non-nullable withdrawable cannot be null');
        }
        $this->container['withdrawable'] = $withdrawable;

        return $this;
    }

    /**
     * Gets auto_withdrawn_reason_code
     *
     * @return string|null
     */
    public function getAutoWithdrawnReasonCode()
    {
        return $this->container['auto_withdrawn_reason_code'];
    }

    /**
     * Sets auto_withdrawn_reason_code
     *
     * @param string|null $auto_withdrawn_reason_code Populated with rejection reason code if the payment was withdrawn automatically at instruct time
     *
     * @return self
     */
    public function setAutoWithdrawnReasonCode($auto_withdrawn_reason_code)
    {
        if (is_null($auto_withdrawn_reason_code)) {
            throw new \InvalidArgumentException('non-nullable auto_withdrawn_reason_code cannot be null');
        }
        $this->container['auto_withdrawn_reason_code'] = $auto_withdrawn_reason_code;

        return $this;
    }

    /**
     * Gets transmission_type
     *
     * @return string|null
     */
    public function getTransmissionType()
    {
        return $this->container['transmission_type'];
    }

    /**
     * Sets transmission_type
     *
     * @param string|null $transmission_type The transmission type of the payment, e.g. ACH, SAME_DAY_ACH, WIRE, GACHO
     *
     * @return self
     */
    public function setTransmissionType($transmission_type)
    {
        if (is_null($transmission_type)) {
            throw new \InvalidArgumentException('non-nullable transmission_type cannot be null');
        }
        $this->container['transmission_type'] = $transmission_type;

        return $this;
    }

    /**
     * Gets transmission_type_requested
     *
     * @return string|null
     */
    public function getTransmissionTypeRequested()
    {
        return $this->container['transmission_type_requested'];
    }

    /**
     * Sets transmission_type_requested
     *
     * @param string|null $transmission_type_requested The transmission type of the payment requested by the payor
     *
     * @return self
     */
    public function setTransmissionTypeRequested($transmission_type_requested)
    {
        if (is_null($transmission_type_requested)) {
            throw new \InvalidArgumentException('non-nullable transmission_type_requested cannot be null');
        }
        $this->container['transmission_type_requested'] = $transmission_type_requested;

        return $this;
    }

    /**
     * Gets payment_tracking_reference
     *
     * @return string|null
     */
    public function getPaymentTrackingReference()
    {
        return $this->container['payment_tracking_reference'];
    }

    /**
     * Sets payment_tracking_reference
     *
     * @param string|null $payment_tracking_reference payment_tracking_reference
     *
     * @return self
     */
    public function setPaymentTrackingReference($payment_tracking_reference)
    {
        if (is_null($payment_tracking_reference)) {
            throw new \InvalidArgumentException('non-nullable payment_tracking_reference cannot be null');
        }
        $this->container['payment_tracking_reference'] = $payment_tracking_reference;

        return $this;
    }

    /**
     * Gets payment_metadata
     *
     * @return string|null
     */
    public function getPaymentMetadata()
    {
        return $this->container['payment_metadata'];
    }

    /**
     * Sets payment_metadata
     *
     * @param string|null $payment_metadata Metadata for the payment
     *
     * @return self
     */
    public function setPaymentMetadata($payment_metadata)
    {
        if (is_null($payment_metadata)) {
            throw new \InvalidArgumentException('non-nullable payment_metadata cannot be null');
        }
        $this->container['payment_metadata'] = $payment_metadata;

        return $this;
    }

    /**
     * Gets transaction_id
     *
     * @return string|null
     */
    public function getTransactionId()
    {
        return $this->container['transaction_id'];
    }

    /**
     * Sets transaction_id
     *
     * @param string|null $transaction_id transaction_id
     *
     * @return self
     */
    public function setTransactionId($transaction_id)
    {
        if (is_null($transaction_id)) {
            throw new \InvalidArgumentException('non-nullable transaction_id cannot be null');
        }
        $this->container['transaction_id'] = $transaction_id;

        return $this;
    }

    /**
     * Gets transaction_reference
     *
     * @return string|null
     */
    public function getTransactionReference()
    {
        return $this->container['transaction_reference'];
    }

    /**
     * Sets transaction_reference
     *
     * @param string|null $transaction_reference transaction_reference
     *
     * @return self
     */
    public function setTransactionReference($transaction_reference)
    {
        if (is_null($transaction_reference)) {
            throw new \InvalidArgumentException('non-nullable transaction_reference cannot be null');
        }
        $this->container['transaction_reference'] = $transaction_reference;

        return $this;
    }

    /**
     * Gets schedule
     *
     * @return \VeloPayments\Client\Model\PayoutSchedule|null
     */
    public function getSchedule()
    {
        return $this->container['schedule'];
    }

    /**
     * Sets schedule
     *
     * @param \VeloPayments\Client\Model\PayoutSchedule|null $schedule schedule
     *
     * @return self
     */
    public function setSchedule($schedule)
    {
        if (is_null($schedule)) {
            throw new \InvalidArgumentException('non-nullable schedule cannot be null');
        }
        $this->container['schedule'] = $schedule;

        return $this;
    }

    /**
     * Gets post_instruct_fx_info
     *
     * @return \VeloPayments\Client\Model\PostInstructFxInfo|null
     */
    public function getPostInstructFxInfo()
    {
        return $this->container['post_instruct_fx_info'];
    }

    /**
     * Sets post_instruct_fx_info
     *
     * @param \VeloPayments\Client\Model\PostInstructFxInfo|null $post_instruct_fx_info post_instruct_fx_info
     *
     * @return self
     */
    public function setPostInstructFxInfo($post_instruct_fx_info)
    {
        if (is_null($post_instruct_fx_info)) {
            throw new \InvalidArgumentException('non-nullable post_instruct_fx_info cannot be null');
        }
        $this->container['post_instruct_fx_info'] = $post_instruct_fx_info;

        return $this;
    }

    /**
     * Gets payout
     *
     * @return \VeloPayments\Client\Model\PaymentResponseV4Payout|null
     */
    public function getPayout()
    {
        return $this->container['payout'];
    }

    /**
     * Sets payout
     *
     * @param \VeloPayments\Client\Model\PaymentResponseV4Payout|null $payout payout
     *
     * @return self
     */
    public function setPayout($payout)
    {
        if (is_null($payout)) {
            throw new \InvalidArgumentException('non-nullable payout cannot be null');
        }
        $this->container['payout'] = $payout;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


