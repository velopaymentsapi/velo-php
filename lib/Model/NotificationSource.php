<?php
/**
 * NotificationSource
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
 * The version of the OpenAPI document: 2.37.151
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 7.4.0-SNAPSHOT
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
 * NotificationSource Class Doc Comment
 *
 * @category Class
 * @description One of the available set of source event payloads
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class NotificationSource implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = 'source_type';

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Notification_source';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'source_type' => 'string',
        'event_id' => 'string',
        'created_at' => '\DateTime',
        'payment_id' => 'string',
        'payout_payor_ids' => '\VeloPayments\Client\Model\PayoutPayorIds',
        'payor_payment_id' => 'string',
        'status' => 'string',
        'reason_code' => 'string',
        'reason_message' => 'string',
        'payee_id' => 'string',
        'reasons' => '\VeloPayments\Client\Model\PayeeEventAllOfReasons[]',
        'debit_transaction_id' => 'string',
        'rails_id' => 'string',
        'payor_id' => 'string',
        'funding_request_id' => 'string',
        'funding_ref' => 'string',
        'currency' => 'string',
        'amount' => 'int',
        'physical_account_name' => 'string',
        'source_account_name' => 'string',
        'source_account_id' => 'string',
        'additional_information' => 'string',
        'transaction_id' => 'string',
        'transaction_reference' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'source_type' => null,
        'event_id' => 'uuid',
        'created_at' => 'date-time',
        'payment_id' => 'uuid',
        'payout_payor_ids' => null,
        'payor_payment_id' => null,
        'status' => null,
        'reason_code' => null,
        'reason_message' => null,
        'payee_id' => 'uuid',
        'reasons' => null,
        'debit_transaction_id' => 'uuid',
        'rails_id' => null,
        'payor_id' => 'uuid',
        'funding_request_id' => 'uuid',
        'funding_ref' => null,
        'currency' => null,
        'amount' => 'int64',
        'physical_account_name' => null,
        'source_account_name' => null,
        'source_account_id' => 'uuid',
        'additional_information' => null,
        'transaction_id' => 'uuid',
        'transaction_reference' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'source_type' => false,
        'event_id' => false,
        'created_at' => false,
        'payment_id' => false,
        'payout_payor_ids' => false,
        'payor_payment_id' => false,
        'status' => false,
        'reason_code' => false,
        'reason_message' => false,
        'payee_id' => false,
        'reasons' => false,
        'debit_transaction_id' => false,
        'rails_id' => false,
        'payor_id' => false,
        'funding_request_id' => false,
        'funding_ref' => false,
        'currency' => false,
        'amount' => false,
        'physical_account_name' => false,
        'source_account_name' => false,
        'source_account_id' => false,
        'additional_information' => false,
        'transaction_id' => false,
        'transaction_reference' => false
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
        'source_type' => 'sourceType',
        'event_id' => 'eventId',
        'created_at' => 'createdAt',
        'payment_id' => 'paymentId',
        'payout_payor_ids' => 'payoutPayorIds',
        'payor_payment_id' => 'payorPaymentId',
        'status' => 'status',
        'reason_code' => 'reasonCode',
        'reason_message' => 'reasonMessage',
        'payee_id' => 'payeeId',
        'reasons' => 'reasons',
        'debit_transaction_id' => 'debitTransactionId',
        'rails_id' => 'railsId',
        'payor_id' => 'payorId',
        'funding_request_id' => 'fundingRequestId',
        'funding_ref' => 'fundingRef',
        'currency' => 'currency',
        'amount' => 'amount',
        'physical_account_name' => 'physicalAccountName',
        'source_account_name' => 'sourceAccountName',
        'source_account_id' => 'sourceAccountId',
        'additional_information' => 'additionalInformation',
        'transaction_id' => 'transactionId',
        'transaction_reference' => 'transactionReference'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'source_type' => 'setSourceType',
        'event_id' => 'setEventId',
        'created_at' => 'setCreatedAt',
        'payment_id' => 'setPaymentId',
        'payout_payor_ids' => 'setPayoutPayorIds',
        'payor_payment_id' => 'setPayorPaymentId',
        'status' => 'setStatus',
        'reason_code' => 'setReasonCode',
        'reason_message' => 'setReasonMessage',
        'payee_id' => 'setPayeeId',
        'reasons' => 'setReasons',
        'debit_transaction_id' => 'setDebitTransactionId',
        'rails_id' => 'setRailsId',
        'payor_id' => 'setPayorId',
        'funding_request_id' => 'setFundingRequestId',
        'funding_ref' => 'setFundingRef',
        'currency' => 'setCurrency',
        'amount' => 'setAmount',
        'physical_account_name' => 'setPhysicalAccountName',
        'source_account_name' => 'setSourceAccountName',
        'source_account_id' => 'setSourceAccountId',
        'additional_information' => 'setAdditionalInformation',
        'transaction_id' => 'setTransactionId',
        'transaction_reference' => 'setTransactionReference'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'source_type' => 'getSourceType',
        'event_id' => 'getEventId',
        'created_at' => 'getCreatedAt',
        'payment_id' => 'getPaymentId',
        'payout_payor_ids' => 'getPayoutPayorIds',
        'payor_payment_id' => 'getPayorPaymentId',
        'status' => 'getStatus',
        'reason_code' => 'getReasonCode',
        'reason_message' => 'getReasonMessage',
        'payee_id' => 'getPayeeId',
        'reasons' => 'getReasons',
        'debit_transaction_id' => 'getDebitTransactionId',
        'rails_id' => 'getRailsId',
        'payor_id' => 'getPayorId',
        'funding_request_id' => 'getFundingRequestId',
        'funding_ref' => 'getFundingRef',
        'currency' => 'getCurrency',
        'amount' => 'getAmount',
        'physical_account_name' => 'getPhysicalAccountName',
        'source_account_name' => 'getSourceAccountName',
        'source_account_id' => 'getSourceAccountId',
        'additional_information' => 'getAdditionalInformation',
        'transaction_id' => 'getTransactionId',
        'transaction_reference' => 'getTransactionReference'
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
        $this->setIfExists('source_type', $data ?? [], null);
        $this->setIfExists('event_id', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('payment_id', $data ?? [], null);
        $this->setIfExists('payout_payor_ids', $data ?? [], null);
        $this->setIfExists('payor_payment_id', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('reason_code', $data ?? [], null);
        $this->setIfExists('reason_message', $data ?? [], null);
        $this->setIfExists('payee_id', $data ?? [], null);
        $this->setIfExists('reasons', $data ?? [], null);
        $this->setIfExists('debit_transaction_id', $data ?? [], null);
        $this->setIfExists('rails_id', $data ?? [], null);
        $this->setIfExists('payor_id', $data ?? [], null);
        $this->setIfExists('funding_request_id', $data ?? [], null);
        $this->setIfExists('funding_ref', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('amount', $data ?? [], null);
        $this->setIfExists('physical_account_name', $data ?? [], null);
        $this->setIfExists('source_account_name', $data ?? [], null);
        $this->setIfExists('source_account_id', $data ?? [], null);
        $this->setIfExists('additional_information', $data ?? [], null);
        $this->setIfExists('transaction_id', $data ?? [], null);
        $this->setIfExists('transaction_reference', $data ?? [], null);

        // Initialize discriminator property with the model name.
        $this->container['source_type'] = static::$openAPIModelName;
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

        if ($this->container['source_type'] === null) {
            $invalidProperties[] = "'source_type' can't be null";
        }
        if ($this->container['event_id'] === null) {
            $invalidProperties[] = "'event_id' can't be null";
        }
        if ($this->container['created_at'] === null) {
            $invalidProperties[] = "'created_at' can't be null";
        }
        if ($this->container['payment_id'] === null) {
            $invalidProperties[] = "'payment_id' can't be null";
        }
        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
        }
        if ($this->container['reason_code'] === null) {
            $invalidProperties[] = "'reason_code' can't be null";
        }
        if ($this->container['reason_message'] === null) {
            $invalidProperties[] = "'reason_message' can't be null";
        }
        if ($this->container['payee_id'] === null) {
            $invalidProperties[] = "'payee_id' can't be null";
        }
        if ($this->container['debit_transaction_id'] === null) {
            $invalidProperties[] = "'debit_transaction_id' can't be null";
        }
        if ($this->container['payor_id'] === null) {
            $invalidProperties[] = "'payor_id' can't be null";
        }
        if ($this->container['funding_request_id'] === null) {
            $invalidProperties[] = "'funding_request_id' can't be null";
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
     * Gets source_type
     *
     * @return string
     */
    public function getSourceType()
    {
        return $this->container['source_type'];
    }

    /**
     * Sets source_type
     *
     * @param string $source_type OA3 Schema type name for the source info which is used as the discriminator value to ensure that data binding works correctly
     *
     * @return self
     */
    public function setSourceType($source_type)
    {
        if (is_null($source_type)) {
            throw new \InvalidArgumentException('non-nullable source_type cannot be null');
        }
        $this->container['source_type'] = $source_type;

        return $this;
    }

    /**
     * Gets event_id
     *
     * @return string
     */
    public function getEventId()
    {
        return $this->container['event_id'];
    }

    /**
     * Sets event_id
     *
     * @param string $event_id UUID id of the source event in the Velo platform
     *
     * @return self
     */
    public function setEventId($event_id)
    {
        if (is_null($event_id)) {
            throw new \InvalidArgumentException('non-nullable event_id cannot be null');
        }
        $this->container['event_id'] = $event_id;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param \DateTime $created_at ISO8601 timestamp indicating when the source event was created
     *
     * @return self
     */
    public function setCreatedAt($created_at)
    {
        if (is_null($created_at)) {
            throw new \InvalidArgumentException('non-nullable created_at cannot be null');
        }
        $this->container['created_at'] = $created_at;

        return $this;
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
     * @param string $payment_id ID of this payment within the Velo platform
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
     * Gets payout_payor_ids
     *
     * @return \VeloPayments\Client\Model\PayoutPayorIds|null
     */
    public function getPayoutPayorIds()
    {
        return $this->container['payout_payor_ids'];
    }

    /**
     * Sets payout_payor_ids
     *
     * @param \VeloPayments\Client\Model\PayoutPayorIds|null $payout_payor_ids payout_payor_ids
     *
     * @return self
     */
    public function setPayoutPayorIds($payout_payor_ids)
    {
        if (is_null($payout_payor_ids)) {
            throw new \InvalidArgumentException('non-nullable payout_payor_ids cannot be null');
        }
        $this->container['payout_payor_ids'] = $payout_payor_ids;

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
     * @param string|null $payor_payment_id ID of this payment in the payors system
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
     * @param string $status The new status of the debit. One of \"PENDING\" \"PROCESSING\" \"REJECTED\" \"RELEASED\"
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
     * Gets reason_code
     *
     * @return string
     */
    public function getReasonCode()
    {
        return $this->container['reason_code'];
    }

    /**
     * Sets reason_code
     *
     * @param string $reason_code The Velo code that indicates why the payment was rejected or returned
     *
     * @return self
     */
    public function setReasonCode($reason_code)
    {
        if (is_null($reason_code)) {
            throw new \InvalidArgumentException('non-nullable reason_code cannot be null');
        }
        $this->container['reason_code'] = $reason_code;

        return $this;
    }

    /**
     * Gets reason_message
     *
     * @return string
     */
    public function getReasonMessage()
    {
        return $this->container['reason_message'];
    }

    /**
     * Sets reason_message
     *
     * @param string $reason_message The description of why the payment was rejected or returned
     *
     * @return self
     */
    public function setReasonMessage($reason_message)
    {
        if (is_null($reason_message)) {
            throw new \InvalidArgumentException('non-nullable reason_message cannot be null');
        }
        $this->container['reason_message'] = $reason_message;

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
     * @param string $payee_id ID of this payee within the Velo platform
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
     * Gets reasons
     *
     * @return \VeloPayments\Client\Model\PayeeEventAllOfReasons[]|null
     */
    public function getReasons()
    {
        return $this->container['reasons'];
    }

    /**
     * Sets reasons
     *
     * @param \VeloPayments\Client\Model\PayeeEventAllOfReasons[]|null $reasons The reasons for the event notification.
     *
     * @return self
     */
    public function setReasons($reasons)
    {
        if (is_null($reasons)) {
            throw new \InvalidArgumentException('non-nullable reasons cannot be null');
        }
        $this->container['reasons'] = $reasons;

        return $this;
    }

    /**
     * Gets debit_transaction_id
     *
     * @return string
     */
    public function getDebitTransactionId()
    {
        return $this->container['debit_transaction_id'];
    }

    /**
     * Sets debit_transaction_id
     *
     * @param string $debit_transaction_id ID of this debit transaction within the Velo platform
     *
     * @return self
     */
    public function setDebitTransactionId($debit_transaction_id)
    {
        if (is_null($debit_transaction_id)) {
            throw new \InvalidArgumentException('non-nullable debit_transaction_id cannot be null');
        }
        $this->container['debit_transaction_id'] = $debit_transaction_id;

        return $this;
    }

    /**
     * Gets rails_id
     *
     * @return string|null
     */
    public function getRailsId()
    {
        return $this->container['rails_id'];
    }

    /**
     * Sets rails_id
     *
     * @param string|null $rails_id the identifier of the payment rail from which funding was received
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
     * @param string $payor_id ID of the payor within the Velo platform
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
     * Gets funding_request_id
     *
     * @return string
     */
    public function getFundingRequestId()
    {
        return $this->container['funding_request_id'];
    }

    /**
     * Sets funding_request_id
     *
     * @param string $funding_request_id ID of this funding transaction within the Velo platform
     *
     * @return self
     */
    public function setFundingRequestId($funding_request_id)
    {
        if (is_null($funding_request_id)) {
            throw new \InvalidArgumentException('non-nullable funding_request_id cannot be null');
        }
        $this->container['funding_request_id'] = $funding_request_id;

        return $this;
    }

    /**
     * Gets funding_ref
     *
     * @return string|null
     */
    public function getFundingRef()
    {
        return $this->container['funding_ref'];
    }

    /**
     * Sets funding_ref
     *
     * @param string|null $funding_ref the external identity reference for this funding transaction
     *
     * @return self
     */
    public function setFundingRef($funding_ref)
    {
        if (is_null($funding_ref)) {
            throw new \InvalidArgumentException('non-nullable funding_ref cannot be null');
        }
        $this->container['funding_ref'] = $funding_ref;

        return $this;
    }

    /**
     * Gets currency
     *
     * @return string|null
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param string|null $currency the ISO-4217 code for the currency in which the funding was made
     *
     * @return self
     */
    public function setCurrency($currency)
    {
        if (is_null($currency)) {
            throw new \InvalidArgumentException('non-nullable currency cannot be null');
        }
        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets amount
     *
     * @return int|null
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param int|null $amount the received funding amount in currency minor units
     *
     * @return self
     */
    public function setAmount($amount)
    {
        if (is_null($amount)) {
            throw new \InvalidArgumentException('non-nullable amount cannot be null');
        }
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets physical_account_name
     *
     * @return string|null
     */
    public function getPhysicalAccountName()
    {
        return $this->container['physical_account_name'];
    }

    /**
     * Sets physical_account_name
     *
     * @param string|null $physical_account_name the name of the account as registered with the payment rail
     *
     * @return self
     */
    public function setPhysicalAccountName($physical_account_name)
    {
        if (is_null($physical_account_name)) {
            throw new \InvalidArgumentException('non-nullable physical_account_name cannot be null');
        }
        $this->container['physical_account_name'] = $physical_account_name;

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
     * @param string|null $source_account_name the name of the account as registered with the Velo platform
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
     * Gets source_account_id
     *
     * @return string|null
     */
    public function getSourceAccountId()
    {
        return $this->container['source_account_id'];
    }

    /**
     * Sets source_account_id
     *
     * @param string|null $source_account_id the ID of the account as registered with the Velo platform
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
     * Gets additional_information
     *
     * @return string|null
     */
    public function getAdditionalInformation()
    {
        return $this->container['additional_information'];
    }

    /**
     * Sets additional_information
     *
     * @param string|null $additional_information any additional information received from the payment rail
     *
     * @return self
     */
    public function setAdditionalInformation($additional_information)
    {
        if (is_null($additional_information)) {
            throw new \InvalidArgumentException('non-nullable additional_information cannot be null');
        }
        $this->container['additional_information'] = $additional_information;

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
     * @param string|null $transaction_id The Id of the related transaction
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
     * @param string|null $transaction_reference The payors own reference for the related transaction
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


