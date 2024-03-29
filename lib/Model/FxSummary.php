<?php
/**
 * FxSummary
 *
 * PHP version 7.3
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
 * The version of the OpenAPI document: 2.29.127
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.4.0-SNAPSHOT
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
 * FxSummary Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class FxSummary implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'FxSummary';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'quote_id' => 'string',
        'creation_date_time' => '\DateTime',
        'rate' => 'double',
        'inverted_rate' => 'double',
        'total_cost' => 'int',
        'total_payment_amount' => 'int',
        'source_currency' => '\VeloPayments\Client\Model\PaymentAuditCurrency',
        'payment_currency' => '\VeloPayments\Client\Model\PaymentAuditCurrency',
        'status' => 'string',
        'funding_status' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'quote_id' => 'uuid',
        'creation_date_time' => 'date-time',
        'rate' => 'double',
        'inverted_rate' => 'double',
        'total_cost' => null,
        'total_payment_amount' => null,
        'source_currency' => null,
        'payment_currency' => null,
        'status' => null,
        'funding_status' => null
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
        'quote_id' => 'quoteId',
        'creation_date_time' => 'creationDateTime',
        'rate' => 'rate',
        'inverted_rate' => 'invertedRate',
        'total_cost' => 'totalCost',
        'total_payment_amount' => 'totalPaymentAmount',
        'source_currency' => 'sourceCurrency',
        'payment_currency' => 'paymentCurrency',
        'status' => 'status',
        'funding_status' => 'fundingStatus'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'quote_id' => 'setQuoteId',
        'creation_date_time' => 'setCreationDateTime',
        'rate' => 'setRate',
        'inverted_rate' => 'setInvertedRate',
        'total_cost' => 'setTotalCost',
        'total_payment_amount' => 'setTotalPaymentAmount',
        'source_currency' => 'setSourceCurrency',
        'payment_currency' => 'setPaymentCurrency',
        'status' => 'setStatus',
        'funding_status' => 'setFundingStatus'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'quote_id' => 'getQuoteId',
        'creation_date_time' => 'getCreationDateTime',
        'rate' => 'getRate',
        'inverted_rate' => 'getInvertedRate',
        'total_cost' => 'getTotalCost',
        'total_payment_amount' => 'getTotalPaymentAmount',
        'source_currency' => 'getSourceCurrency',
        'payment_currency' => 'getPaymentCurrency',
        'status' => 'getStatus',
        'funding_status' => 'getFundingStatus'
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

    const STATUS_UNQUOTED = 'UNQUOTED';
    const STATUS_QUOTED = 'QUOTED';
    const STATUS_EXPIRED = 'EXPIRED';
    const STATUS_EXECUTED = 'EXECUTED';
    const FUNDING_STATUS_FUNDED = 'FUNDED';
    const FUNDING_STATUS_INSTRUCTED = 'INSTRUCTED';
    const FUNDING_STATUS_UNFUNDED = 'UNFUNDED';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_UNQUOTED,
            self::STATUS_QUOTED,
            self::STATUS_EXPIRED,
            self::STATUS_EXECUTED,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getFundingStatusAllowableValues()
    {
        return [
            self::FUNDING_STATUS_FUNDED,
            self::FUNDING_STATUS_INSTRUCTED,
            self::FUNDING_STATUS_UNFUNDED,
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
        $this->container['quote_id'] = $data['quote_id'] ?? null;
        $this->container['creation_date_time'] = $data['creation_date_time'] ?? null;
        $this->container['rate'] = $data['rate'] ?? null;
        $this->container['inverted_rate'] = $data['inverted_rate'] ?? null;
        $this->container['total_cost'] = $data['total_cost'] ?? null;
        $this->container['total_payment_amount'] = $data['total_payment_amount'] ?? null;
        $this->container['source_currency'] = $data['source_currency'] ?? null;
        $this->container['payment_currency'] = $data['payment_currency'] ?? null;
        $this->container['status'] = $data['status'] ?? null;
        $this->container['funding_status'] = $data['funding_status'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['quote_id'] === null) {
            $invalidProperties[] = "'quote_id' can't be null";
        }
        if ($this->container['creation_date_time'] === null) {
            $invalidProperties[] = "'creation_date_time' can't be null";
        }
        if ($this->container['rate'] === null) {
            $invalidProperties[] = "'rate' can't be null";
        }
        if ($this->container['inverted_rate'] === null) {
            $invalidProperties[] = "'inverted_rate' can't be null";
        }
        if ($this->container['total_cost'] === null) {
            $invalidProperties[] = "'total_cost' can't be null";
        }
        if ($this->container['total_payment_amount'] === null) {
            $invalidProperties[] = "'total_payment_amount' can't be null";
        }
        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
        }
        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($this->container['status']) && !in_array($this->container['status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'status', must be one of '%s'",
                $this->container['status'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['funding_status'] === null) {
            $invalidProperties[] = "'funding_status' can't be null";
        }
        $allowedValues = $this->getFundingStatusAllowableValues();
        if (!is_null($this->container['funding_status']) && !in_array($this->container['funding_status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'funding_status', must be one of '%s'",
                $this->container['funding_status'],
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
     * @param string $quote_id quote_id
     *
     * @return self
     */
    public function setQuoteId($quote_id)
    {
        $this->container['quote_id'] = $quote_id;

        return $this;
    }

    /**
     * Gets creation_date_time
     *
     * @return \DateTime
     */
    public function getCreationDateTime()
    {
        return $this->container['creation_date_time'];
    }

    /**
     * Sets creation_date_time
     *
     * @param \DateTime $creation_date_time creation_date_time
     *
     * @return self
     */
    public function setCreationDateTime($creation_date_time)
    {
        $this->container['creation_date_time'] = $creation_date_time;

        return $this;
    }

    /**
     * Gets rate
     *
     * @return double
     */
    public function getRate()
    {
        return $this->container['rate'];
    }

    /**
     * Sets rate
     *
     * @param double $rate rate
     *
     * @return self
     */
    public function setRate($rate)
    {
        $this->container['rate'] = $rate;

        return $this;
    }

    /**
     * Gets inverted_rate
     *
     * @return double
     */
    public function getInvertedRate()
    {
        return $this->container['inverted_rate'];
    }

    /**
     * Sets inverted_rate
     *
     * @param double $inverted_rate inverted_rate
     *
     * @return self
     */
    public function setInvertedRate($inverted_rate)
    {
        $this->container['inverted_rate'] = $inverted_rate;

        return $this;
    }

    /**
     * Gets total_cost
     *
     * @return int
     */
    public function getTotalCost()
    {
        return $this->container['total_cost'];
    }

    /**
     * Sets total_cost
     *
     * @param int $total_cost total_cost
     *
     * @return self
     */
    public function setTotalCost($total_cost)
    {
        $this->container['total_cost'] = $total_cost;

        return $this;
    }

    /**
     * Gets total_payment_amount
     *
     * @return int
     */
    public function getTotalPaymentAmount()
    {
        return $this->container['total_payment_amount'];
    }

    /**
     * Sets total_payment_amount
     *
     * @param int $total_payment_amount total_payment_amount
     *
     * @return self
     */
    public function setTotalPaymentAmount($total_payment_amount)
    {
        $this->container['total_payment_amount'] = $total_payment_amount;

        return $this;
    }

    /**
     * Gets source_currency
     *
     * @return \VeloPayments\Client\Model\PaymentAuditCurrency|null
     */
    public function getSourceCurrency()
    {
        return $this->container['source_currency'];
    }

    /**
     * Sets source_currency
     *
     * @param \VeloPayments\Client\Model\PaymentAuditCurrency|null $source_currency source_currency
     *
     * @return self
     */
    public function setSourceCurrency($source_currency)
    {
        $this->container['source_currency'] = $source_currency;

        return $this;
    }

    /**
     * Gets payment_currency
     *
     * @return \VeloPayments\Client\Model\PaymentAuditCurrency|null
     */
    public function getPaymentCurrency()
    {
        return $this->container['payment_currency'];
    }

    /**
     * Sets payment_currency
     *
     * @param \VeloPayments\Client\Model\PaymentAuditCurrency|null $payment_currency payment_currency
     *
     * @return self
     */
    public function setPaymentCurrency($payment_currency)
    {
        $this->container['payment_currency'] = $payment_currency;

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
     * @param string $status status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $allowedValues = $this->getStatusAllowableValues();
        if (!in_array($status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'status', must be one of '%s'",
                    $status,
                    implode("', '", $allowedValues)
                )
            );
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
     * @param string $funding_status funding_status
     *
     * @return self
     */
    public function setFundingStatus($funding_status)
    {
        $allowedValues = $this->getFundingStatusAllowableValues();
        if (!in_array($funding_status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'funding_status', must be one of '%s'",
                    $funding_status,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['funding_status'] = $funding_status;

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
     * @return mixed|null
     */
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
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
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


