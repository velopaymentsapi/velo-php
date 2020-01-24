<?php
/**
 * PaymentEventResponseV3
 *
 * PHP version 5
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Velo Payments APIs
 *
 * ## Terms and Definitions  Throughout this document and the Velo platform the following terms are used:  * **Payor.** An entity (typically a corporation) which wishes to pay funds to one or more payees via a payout. * **Payee.** The recipient of funds paid out by a payor. * **Payment.** A single transfer of funds from a payor to a payee. * **Payout.** A batch of Payments, typically used by a payor to logically group payments (e.g. by business day). Technically there need be no relationship between the payments in a payout - a single payout can contain payments to multiple payees and/or multiple payments to a single payee. * **Sandbox.** An integration environment provided by Velo Payments which offers a similar API experience to the production environment, but all funding and payment events are simulated, along with many other services such as OFAC sanctions list checking.  ## Overview  The Velo Payments API allows a payor to perform a number of operations. The following is a list of the main capabilities in a natural order of execution:  * Authenticate with the Velo platform * Maintain a collection of payees * Query the payor’s current balance of funds within the platform and perform additional funding * Issue payments to payees * Query the platform for a history of those payments  This document describes the main concepts and APIs required to get up and running with the Velo Payments platform. It is not an exhaustive API reference. For that, please see the separate Velo Payments API Reference.  ## API Considerations  The Velo Payments API is REST based and uses the JSON format for requests and responses.  Most calls are secured using OAuth 2 security and require a valid authentication access token for successful operation. See the Authentication section for details.  Where a dynamic value is required in the examples below, the {token} format is used, suggesting that the caller needs to supply the appropriate value of the token in question (without including the { or } characters).  Where curl examples are given, the –d @filename.json approach is used, indicating that the request body should be placed into a file named filename.json in the current directory. Each of the curl examples in this document should be considered a single line on the command-line, regardless of how they appear in print.  ## Authenticating with the Velo Platform  Once Velo backoffice staff have added your organization as a payor within the Velo platform sandbox, they will create you a payor Id, an API key and an API secret and share these with you in a secure manner.  You will need to use these values to authenticate with the Velo platform in order to gain access to the APIs. The steps to take are explained in the following:  create a string comprising the API key (e.g. 44a9537d-d55d-4b47-8082-14061c2bcdd8) and API secret (e.g. c396b26b-137a-44fd-87f5-34631f8fd529) with a colon between them. E.g. 44a9537d-d55d-4b47-8082-14061c2bcdd8:c396b26b-137a-44fd-87f5-34631f8fd529  base64 encode this string. E.g.: NDRhOTUzN2QtZDU1ZC00YjQ3LTgwODItMTQwNjFjMmJjZGQ4OmMzOTZiMjZiLTEzN2EtNDRmZC04N2Y1LTM0NjMxZjhmZDUyOQ==  create an HTTP **Authorization** header with the value set to e.g. Basic NDRhOTUzN2QtZDU1ZC00YjQ3LTgwODItMTQwNjFjMmJjZGQ4OmMzOTZiMjZiLTEzN2EtNDRmZC04N2Y1LTM0NjMxZjhmZDUyOQ==  perform the Velo authentication REST call using the HTTP header created above e.g. via curl:  ```   curl -X POST \\   -H \"Content-Type: application/json\" \\   -H \"Authorization: Basic NDRhOTUzN2QtZDU1ZC00YjQ3LTgwODItMTQwNjFjMmJjZGQ4OmMzOTZiMjZiLTEzN2EtNDRmZC04N2Y1LTM0NjMxZjhmZDUyOQ==\" \\   'https://api.sandbox.velopayments.com/v1/authenticate?grant_type=client_credentials' ```  If successful, this call will result in a **200** HTTP status code and a response body such as:  ```   {     \"access_token\":\"19f6bafd-93fd-4747-b229-00507bbc991f\",     \"token_type\":\"bearer\",     \"expires_in\":1799,     \"scope\":\"...\"   } ``` ## API access following authentication Following successful authentication, the value of the access_token field in the response (indicated in green above) should then be presented with all subsequent API calls to allow the Velo platform to validate that the caller is authenticated.  This is achieved by setting the HTTP Authorization header with the value set to e.g. Bearer 19f6bafd-93fd-4747-b229-00507bbc991f such as the curl example below:  ```   -H \"Authorization: Bearer 19f6bafd-93fd-4747-b229-00507bbc991f \" ```  If you make other Velo API calls which require authorization but the Authorization header is missing or invalid then you will get a **401** HTTP status response.
 *
 * The version of the OpenAPI document: 2.18.113
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 4.2.1-SNAPSHOT
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
 * PaymentEventResponseV3 Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class PaymentEventResponseV3 implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PaymentEventResponseV3';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'event_id' => 'string',
        'event_date_time' => '\DateTime',
        'event_type' => 'string',
        'source_currency' => '\VeloPayments\Client\Model\PaymentAuditCurrencyV3',
        'source_amount' => 'int',
        'payment_currency' => '\VeloPayments\Client\Model\PaymentAuditCurrencyV3',
        'payment_amount' => 'int',
        'account_number' => 'string',
        'routing_number' => 'string',
        'iban' => 'string',
        'account_name' => 'string',
        'principal' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'event_id' => 'uuid',
        'event_date_time' => 'date-time',
        'event_type' => null,
        'source_currency' => null,
        'source_amount' => 'int64',
        'payment_currency' => null,
        'payment_amount' => 'int64',
        'account_number' => null,
        'routing_number' => null,
        'iban' => null,
        'account_name' => null,
        'principal' => null
    ];

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
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'event_id' => 'eventId',
        'event_date_time' => 'eventDateTime',
        'event_type' => 'eventType',
        'source_currency' => 'sourceCurrency',
        'source_amount' => 'sourceAmount',
        'payment_currency' => 'paymentCurrency',
        'payment_amount' => 'paymentAmount',
        'account_number' => 'accountNumber',
        'routing_number' => 'routingNumber',
        'iban' => 'iban',
        'account_name' => 'accountName',
        'principal' => 'principal'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'event_id' => 'setEventId',
        'event_date_time' => 'setEventDateTime',
        'event_type' => 'setEventType',
        'source_currency' => 'setSourceCurrency',
        'source_amount' => 'setSourceAmount',
        'payment_currency' => 'setPaymentCurrency',
        'payment_amount' => 'setPaymentAmount',
        'account_number' => 'setAccountNumber',
        'routing_number' => 'setRoutingNumber',
        'iban' => 'setIban',
        'account_name' => 'setAccountName',
        'principal' => 'setPrincipal'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'event_id' => 'getEventId',
        'event_date_time' => 'getEventDateTime',
        'event_type' => 'getEventType',
        'source_currency' => 'getSourceCurrency',
        'source_amount' => 'getSourceAmount',
        'payment_currency' => 'getPaymentCurrency',
        'payment_amount' => 'getPaymentAmount',
        'account_number' => 'getAccountNumber',
        'routing_number' => 'getRoutingNumber',
        'iban' => 'getIban',
        'account_name' => 'getAccountName',
        'principal' => 'getPrincipal'
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

    const EVENT_TYPE_PAYOUT_SUBMITTED = 'PAYOUT_SUBMITTED';
    const EVENT_TYPE_PAYOUT_COMPLETED = 'PAYOUT_COMPLETED';
    const EVENT_TYPE_PAYOUT_INSTRUCTED_V3 = 'PAYOUT_INSTRUCTED_V3';
    const EVENT_TYPE_BANK_PAYMENT_REQUESTED = 'BANK_PAYMENT_REQUESTED';
    const EVENT_TYPE_SOURCE_AMOUNT_CONFIRMED = 'SOURCE_AMOUNT_CONFIRMED';
    const EVENT_TYPE_PAYMENT_SUBMITTED = 'PAYMENT_SUBMITTED';
    const EVENT_TYPE_PAYMENT_SUBMITTED_ACCEPTED = 'PAYMENT_SUBMITTED_ACCEPTED';
    const EVENT_TYPE_PAYMENT_SUBMITTED_REJECTED = 'PAYMENT_SUBMITTED_REJECTED';
    const EVENT_TYPE_PAYMENT_CONFIRMED = 'PAYMENT_CONFIRMED';
    const EVENT_TYPE_PAYMENT_AWAITING_FUNDS = 'PAYMENT_AWAITING_FUNDS';
    const EVENT_TYPE_PAYMENT_FUNDED = 'PAYMENT_FUNDED';
    const EVENT_TYPE_PAYMENT_UNFUNDED = 'PAYMENT_UNFUNDED';
    const EVENT_TYPE_PAYMENT_FAILED = 'PAYMENT_FAILED';
    const EVENT_TYPE_ACH_SUBMITTED_TO_ODFI = 'ACH_SUBMITTED_TO_ODFI';
    const EVENT_TYPE_PAYMENT_ACCEPTED_BY_RAILS = 'PAYMENT_ACCEPTED_BY_RAILS';
    const EVENT_TYPE_ACH_RETURN_RECEIVED = 'ACH_RETURN_RECEIVED';
    const EVENT_TYPE_RETURN_PAYMENT_FUNDING_REQUESTED = 'RETURN_PAYMENT_FUNDING_REQUESTED';
    const EVENT_TYPE_PAYOUT_BATCH_EXECUTED = 'PAYOUT_BATCH_EXECUTED';
    const EVENT_TYPE_PAYOUT_BATCH_QUOTE_EXPIRED = 'PAYOUT_BATCH_QUOTE_EXPIRED';
    const EVENT_TYPE_PAYOUT_BATCH_FUNDED = 'PAYOUT_BATCH_FUNDED';
    const EVENT_TYPE_PAYOUT_BATCH_FUNDS_RETURN_REQUEST = 'PAYOUT_BATCH_FUNDS_RETURN_REQUEST';
    const EVENT_TYPE_PAYOUT_BATCH_FUNDS_RETURNED = 'PAYOUT_BATCH_FUNDS_RETURNED';
    const EVENT_TYPE_PAYOUT_FUNDS_REQUEST = 'PAYOUT_FUNDS_REQUEST';
    const EVENT_TYPE_PAYOUT_FUNDS_GRANTED = 'PAYOUT_FUNDS_GRANTED';
    const EVENT_TYPE_PAYOUT_FUNDS_DENIED = 'PAYOUT_FUNDS_DENIED';
    const EVENT_TYPE_PAYOUT_BATCH_QUOTED = 'PAYOUT_BATCH_QUOTED';
    const EVENT_TYPE_PAYOUT_QUOTED = 'PAYOUT_QUOTED';
    const EVENT_TYPE_ACH_PAYMENT_RETURN_CANCELLED = 'ACH_PAYMENT_RETURN_CANCELLED';
    const EVENT_TYPE_RETURN_PAYMENT_CANCELLATION_REQUESTED = 'RETURN_PAYMENT_CANCELLATION_REQUESTED';
    const EVENT_TYPE_PAYOUT_WITHDRAWN = 'PAYOUT_WITHDRAWN';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getEventTypeAllowableValues()
    {
        return [
            self::EVENT_TYPE_PAYOUT_SUBMITTED,
            self::EVENT_TYPE_PAYOUT_COMPLETED,
            self::EVENT_TYPE_PAYOUT_INSTRUCTED_V3,
            self::EVENT_TYPE_BANK_PAYMENT_REQUESTED,
            self::EVENT_TYPE_SOURCE_AMOUNT_CONFIRMED,
            self::EVENT_TYPE_PAYMENT_SUBMITTED,
            self::EVENT_TYPE_PAYMENT_SUBMITTED_ACCEPTED,
            self::EVENT_TYPE_PAYMENT_SUBMITTED_REJECTED,
            self::EVENT_TYPE_PAYMENT_CONFIRMED,
            self::EVENT_TYPE_PAYMENT_AWAITING_FUNDS,
            self::EVENT_TYPE_PAYMENT_FUNDED,
            self::EVENT_TYPE_PAYMENT_UNFUNDED,
            self::EVENT_TYPE_PAYMENT_FAILED,
            self::EVENT_TYPE_ACH_SUBMITTED_TO_ODFI,
            self::EVENT_TYPE_PAYMENT_ACCEPTED_BY_RAILS,
            self::EVENT_TYPE_ACH_RETURN_RECEIVED,
            self::EVENT_TYPE_RETURN_PAYMENT_FUNDING_REQUESTED,
            self::EVENT_TYPE_PAYOUT_BATCH_EXECUTED,
            self::EVENT_TYPE_PAYOUT_BATCH_QUOTE_EXPIRED,
            self::EVENT_TYPE_PAYOUT_BATCH_FUNDED,
            self::EVENT_TYPE_PAYOUT_BATCH_FUNDS_RETURN_REQUEST,
            self::EVENT_TYPE_PAYOUT_BATCH_FUNDS_RETURNED,
            self::EVENT_TYPE_PAYOUT_FUNDS_REQUEST,
            self::EVENT_TYPE_PAYOUT_FUNDS_GRANTED,
            self::EVENT_TYPE_PAYOUT_FUNDS_DENIED,
            self::EVENT_TYPE_PAYOUT_BATCH_QUOTED,
            self::EVENT_TYPE_PAYOUT_QUOTED,
            self::EVENT_TYPE_ACH_PAYMENT_RETURN_CANCELLED,
            self::EVENT_TYPE_RETURN_PAYMENT_CANCELLATION_REQUESTED,
            self::EVENT_TYPE_PAYOUT_WITHDRAWN,
        ];
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
        $this->container['event_id'] = isset($data['event_id']) ? $data['event_id'] : null;
        $this->container['event_date_time'] = isset($data['event_date_time']) ? $data['event_date_time'] : null;
        $this->container['event_type'] = isset($data['event_type']) ? $data['event_type'] : null;
        $this->container['source_currency'] = isset($data['source_currency']) ? $data['source_currency'] : null;
        $this->container['source_amount'] = isset($data['source_amount']) ? $data['source_amount'] : null;
        $this->container['payment_currency'] = isset($data['payment_currency']) ? $data['payment_currency'] : null;
        $this->container['payment_amount'] = isset($data['payment_amount']) ? $data['payment_amount'] : null;
        $this->container['account_number'] = isset($data['account_number']) ? $data['account_number'] : null;
        $this->container['routing_number'] = isset($data['routing_number']) ? $data['routing_number'] : null;
        $this->container['iban'] = isset($data['iban']) ? $data['iban'] : null;
        $this->container['account_name'] = isset($data['account_name']) ? $data['account_name'] : null;
        $this->container['principal'] = isset($data['principal']) ? $data['principal'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['event_id'] === null) {
            $invalidProperties[] = "'event_id' can't be null";
        }
        if ($this->container['event_date_time'] === null) {
            $invalidProperties[] = "'event_date_time' can't be null";
        }
        if ($this->container['event_type'] === null) {
            $invalidProperties[] = "'event_type' can't be null";
        }
        $allowedValues = $this->getEventTypeAllowableValues();
        if (!is_null($this->container['event_type']) && !in_array($this->container['event_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'event_type', must be one of '%s'",
                implode("', '", $allowedValues)
            );
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
     * @param string $event_id The id of the event.
     *
     * @return $this
     */
    public function setEventId($event_id)
    {
        $this->container['event_id'] = $event_id;

        return $this;
    }

    /**
     * Gets event_date_time
     *
     * @return \DateTime
     */
    public function getEventDateTime()
    {
        return $this->container['event_date_time'];
    }

    /**
     * Sets event_date_time
     *
     * @param \DateTime $event_date_time The date/time at which the event occurred.
     *
     * @return $this
     */
    public function setEventDateTime($event_date_time)
    {
        $this->container['event_date_time'] = $event_date_time;

        return $this;
    }

    /**
     * Gets event_type
     *
     * @return string
     */
    public function getEventType()
    {
        return $this->container['event_type'];
    }

    /**
     * Sets event_type
     *
     * @param string $event_type The type of the event.
     *
     * @return $this
     */
    public function setEventType($event_type)
    {
        $allowedValues = $this->getEventTypeAllowableValues();
        if (!in_array($event_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'event_type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['event_type'] = $event_type;

        return $this;
    }

    /**
     * Gets source_currency
     *
     * @return \VeloPayments\Client\Model\PaymentAuditCurrencyV3|null
     */
    public function getSourceCurrency()
    {
        return $this->container['source_currency'];
    }

    /**
     * Sets source_currency
     *
     * @param \VeloPayments\Client\Model\PaymentAuditCurrencyV3|null $source_currency source_currency
     *
     * @return $this
     */
    public function setSourceCurrency($source_currency)
    {
        $this->container['source_currency'] = $source_currency;

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
     * @param int|null $source_amount The source amount exposed by the event.
     *
     * @return $this
     */
    public function setSourceAmount($source_amount)
    {
        $this->container['source_amount'] = $source_amount;

        return $this;
    }

    /**
     * Gets payment_currency
     *
     * @return \VeloPayments\Client\Model\PaymentAuditCurrencyV3|null
     */
    public function getPaymentCurrency()
    {
        return $this->container['payment_currency'];
    }

    /**
     * Sets payment_currency
     *
     * @param \VeloPayments\Client\Model\PaymentAuditCurrencyV3|null $payment_currency payment_currency
     *
     * @return $this
     */
    public function setPaymentCurrency($payment_currency)
    {
        $this->container['payment_currency'] = $payment_currency;

        return $this;
    }

    /**
     * Gets payment_amount
     *
     * @return int|null
     */
    public function getPaymentAmount()
    {
        return $this->container['payment_amount'];
    }

    /**
     * Sets payment_amount
     *
     * @param int|null $payment_amount The destination amount exposed by the event.
     *
     * @return $this
     */
    public function setPaymentAmount($payment_amount)
    {
        $this->container['payment_amount'] = $payment_amount;

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
     * @param string|null $account_number The account number attached to the event.
     *
     * @return $this
     */
    public function setAccountNumber($account_number)
    {
        $this->container['account_number'] = $account_number;

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
     * @param string|null $routing_number The routing number attached to the event.
     *
     * @return $this
     */
    public function setRoutingNumber($routing_number)
    {
        $this->container['routing_number'] = $routing_number;

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
     * @param string|null $iban iban
     *
     * @return $this
     */
    public function setIban($iban)
    {
        $this->container['iban'] = $iban;

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
     * @return $this
     */
    public function setAccountName($account_name)
    {
        $this->container['account_name'] = $account_name;

        return $this;
    }

    /**
     * Gets principal
     *
     * @return string|null
     */
    public function getPrincipal()
    {
        return $this->container['principal'];
    }

    /**
     * Sets principal
     *
     * @param string|null $principal principal
     *
     * @return $this
     */
    public function setPrincipal($principal)
    {
        $this->container['principal'] = $principal;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
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
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
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


