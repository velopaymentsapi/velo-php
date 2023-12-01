<?php
/**
 * QuoteFxSummaryV3
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
 * QuoteFxSummaryV3 Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class QuoteFxSummaryV3 implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'QuoteFxSummaryV3';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'rate' => 'float',
        'inverted_rate' => 'float',
        'creation_time' => '\DateTime',
        'expiry_time' => '\DateTime',
        'quote_id' => 'string',
        'total_source_amount' => 'int',
        'total_payment_amount' => 'int',
        'source_currency' => 'string',
        'payment_currency' => 'string',
        'funding_status' => 'string',
        'status' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'rate' => 'float',
        'inverted_rate' => 'float',
        'creation_time' => 'date-time',
        'expiry_time' => 'date-time',
        'quote_id' => 'uuid',
        'total_source_amount' => null,
        'total_payment_amount' => null,
        'source_currency' => null,
        'payment_currency' => null,
        'funding_status' => null,
        'status' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'rate' => false,
		'inverted_rate' => false,
		'creation_time' => false,
		'expiry_time' => false,
		'quote_id' => false,
		'total_source_amount' => false,
		'total_payment_amount' => false,
		'source_currency' => false,
		'payment_currency' => false,
		'funding_status' => false,
		'status' => false
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
        'rate' => 'rate',
        'inverted_rate' => 'invertedRate',
        'creation_time' => 'creationTime',
        'expiry_time' => 'expiryTime',
        'quote_id' => 'quoteId',
        'total_source_amount' => 'totalSourceAmount',
        'total_payment_amount' => 'totalPaymentAmount',
        'source_currency' => 'sourceCurrency',
        'payment_currency' => 'paymentCurrency',
        'funding_status' => 'fundingStatus',
        'status' => 'status'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'rate' => 'setRate',
        'inverted_rate' => 'setInvertedRate',
        'creation_time' => 'setCreationTime',
        'expiry_time' => 'setExpiryTime',
        'quote_id' => 'setQuoteId',
        'total_source_amount' => 'setTotalSourceAmount',
        'total_payment_amount' => 'setTotalPaymentAmount',
        'source_currency' => 'setSourceCurrency',
        'payment_currency' => 'setPaymentCurrency',
        'funding_status' => 'setFundingStatus',
        'status' => 'setStatus'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'rate' => 'getRate',
        'inverted_rate' => 'getInvertedRate',
        'creation_time' => 'getCreationTime',
        'expiry_time' => 'getExpiryTime',
        'quote_id' => 'getQuoteId',
        'total_source_amount' => 'getTotalSourceAmount',
        'total_payment_amount' => 'getTotalPaymentAmount',
        'source_currency' => 'getSourceCurrency',
        'payment_currency' => 'getPaymentCurrency',
        'funding_status' => 'getFundingStatus',
        'status' => 'getStatus'
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
        $this->setIfExists('rate', $data ?? [], null);
        $this->setIfExists('inverted_rate', $data ?? [], null);
        $this->setIfExists('creation_time', $data ?? [], null);
        $this->setIfExists('expiry_time', $data ?? [], null);
        $this->setIfExists('quote_id', $data ?? [], null);
        $this->setIfExists('total_source_amount', $data ?? [], null);
        $this->setIfExists('total_payment_amount', $data ?? [], null);
        $this->setIfExists('source_currency', $data ?? [], null);
        $this->setIfExists('payment_currency', $data ?? [], null);
        $this->setIfExists('funding_status', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
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

        if ($this->container['rate'] === null) {
            $invalidProperties[] = "'rate' can't be null";
        }
        if ($this->container['creation_time'] === null) {
            $invalidProperties[] = "'creation_time' can't be null";
        }
        if ($this->container['quote_id'] === null) {
            $invalidProperties[] = "'quote_id' can't be null";
        }
        if ($this->container['total_source_amount'] === null) {
            $invalidProperties[] = "'total_source_amount' can't be null";
        }
        if ($this->container['total_payment_amount'] === null) {
            $invalidProperties[] = "'total_payment_amount' can't be null";
        }
        if ($this->container['source_currency'] === null) {
            $invalidProperties[] = "'source_currency' can't be null";
        }
        if ((mb_strlen($this->container['source_currency']) > 3)) {
            $invalidProperties[] = "invalid value for 'source_currency', the character length must be smaller than or equal to 3.";
        }

        if ((mb_strlen($this->container['source_currency']) < 3)) {
            $invalidProperties[] = "invalid value for 'source_currency', the character length must be bigger than or equal to 3.";
        }

        if (!preg_match("/^[A-Z]{3}$/", $this->container['source_currency'])) {
            $invalidProperties[] = "invalid value for 'source_currency', must be conform to the pattern /^[A-Z]{3}$/.";
        }

        if ($this->container['payment_currency'] === null) {
            $invalidProperties[] = "'payment_currency' can't be null";
        }
        if ((mb_strlen($this->container['payment_currency']) > 3)) {
            $invalidProperties[] = "invalid value for 'payment_currency', the character length must be smaller than or equal to 3.";
        }

        if ((mb_strlen($this->container['payment_currency']) < 3)) {
            $invalidProperties[] = "invalid value for 'payment_currency', the character length must be bigger than or equal to 3.";
        }

        if (!preg_match("/^[A-Z]{3}$/", $this->container['payment_currency'])) {
            $invalidProperties[] = "invalid value for 'payment_currency', must be conform to the pattern /^[A-Z]{3}$/.";
        }

        if ($this->container['funding_status'] === null) {
            $invalidProperties[] = "'funding_status' can't be null";
        }
        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
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
     * Gets rate
     *
     * @return float
     */
    public function getRate()
    {
        return $this->container['rate'];
    }

    /**
     * Sets rate
     *
     * @param float $rate The conversion rate (from the source currency to the payment currency)
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
     * @param float|null $inverted_rate The inverse conversion rate (from paymnent currency to source currency)
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
     * Gets creation_time
     *
     * @return \DateTime
     */
    public function getCreationTime()
    {
        return $this->container['creation_time'];
    }

    /**
     * Sets creation_time
     *
     * @param \DateTime $creation_time Timestamp of when the quote was created
     *
     * @return self
     */
    public function setCreationTime($creation_time)
    {
        if (is_null($creation_time)) {
            throw new \InvalidArgumentException('non-nullable creation_time cannot be null');
        }
        $this->container['creation_time'] = $creation_time;

        return $this;
    }

    /**
     * Gets expiry_time
     *
     * @return \DateTime|null
     */
    public function getExpiryTime()
    {
        return $this->container['expiry_time'];
    }

    /**
     * Sets expiry_time
     *
     * @param \DateTime|null $expiry_time The timestamp for when the quote will expire
     *
     * @return self
     */
    public function setExpiryTime($expiry_time)
    {
        if (is_null($expiry_time)) {
            throw new \InvalidArgumentException('non-nullable expiry_time cannot be null');
        }
        $this->container['expiry_time'] = $expiry_time;

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
     * @param string $quote_id The id of the created quote
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
     * Gets total_source_amount
     *
     * @return int
     */
    public function getTotalSourceAmount()
    {
        return $this->container['total_source_amount'];
    }

    /**
     * Sets total_source_amount
     *
     * @param int $total_source_amount The amount (in minor units) that will be paid from the source account
     *
     * @return self
     */
    public function setTotalSourceAmount($total_source_amount)
    {
        if (is_null($total_source_amount)) {
            throw new \InvalidArgumentException('non-nullable total_source_amount cannot be null');
        }
        $this->container['total_source_amount'] = $total_source_amount;

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
     * @param int $total_payment_amount The amount (in minor units) that the payee will receive
     *
     * @return self
     */
    public function setTotalPaymentAmount($total_payment_amount)
    {
        if (is_null($total_payment_amount)) {
            throw new \InvalidArgumentException('non-nullable total_payment_amount cannot be null');
        }
        $this->container['total_payment_amount'] = $total_payment_amount;

        return $this;
    }

    /**
     * Gets source_currency
     *
     * @return string
     */
    public function getSourceCurrency()
    {
        return $this->container['source_currency'];
    }

    /**
     * Sets source_currency
     *
     * @param string $source_currency Valid ISO 4217 3 letter currency code. See the <a href=\"https://www.iso.org/iso-4217-currency-codes.html\" target=\"_blank\" a>ISO specification</a> for details.
     *
     * @return self
     */
    public function setSourceCurrency($source_currency)
    {
        if (is_null($source_currency)) {
            throw new \InvalidArgumentException('non-nullable source_currency cannot be null');
        }
        if ((mb_strlen($source_currency) > 3)) {
            throw new \InvalidArgumentException('invalid length for $source_currency when calling QuoteFxSummaryV3., must be smaller than or equal to 3.');
        }
        if ((mb_strlen($source_currency) < 3)) {
            throw new \InvalidArgumentException('invalid length for $source_currency when calling QuoteFxSummaryV3., must be bigger than or equal to 3.');
        }
        if ((!preg_match("/^[A-Z]{3}$/", ObjectSerializer::toString($source_currency)))) {
            throw new \InvalidArgumentException("invalid value for \$source_currency when calling QuoteFxSummaryV3., must conform to the pattern /^[A-Z]{3}$/.");
        }

        $this->container['source_currency'] = $source_currency;

        return $this;
    }

    /**
     * Gets payment_currency
     *
     * @return string
     */
    public function getPaymentCurrency()
    {
        return $this->container['payment_currency'];
    }

    /**
     * Sets payment_currency
     *
     * @param string $payment_currency Valid ISO 4217 3 letter currency code. See the <a href=\"https://www.iso.org/iso-4217-currency-codes.html\" target=\"_blank\" a>ISO specification</a> for details.
     *
     * @return self
     */
    public function setPaymentCurrency($payment_currency)
    {
        if (is_null($payment_currency)) {
            throw new \InvalidArgumentException('non-nullable payment_currency cannot be null');
        }
        if ((mb_strlen($payment_currency) > 3)) {
            throw new \InvalidArgumentException('invalid length for $payment_currency when calling QuoteFxSummaryV3., must be smaller than or equal to 3.');
        }
        if ((mb_strlen($payment_currency) < 3)) {
            throw new \InvalidArgumentException('invalid length for $payment_currency when calling QuoteFxSummaryV3., must be bigger than or equal to 3.');
        }
        if ((!preg_match("/^[A-Z]{3}$/", ObjectSerializer::toString($payment_currency)))) {
            throw new \InvalidArgumentException("invalid value for \$payment_currency when calling QuoteFxSummaryV3., must conform to the pattern /^[A-Z]{3}$/.");
        }

        $this->container['payment_currency'] = $payment_currency;

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
     * @param string $funding_status Current status of the funding associated with this quote. One of the following values: UNFUNDED, INSTRUCTED, FUNDED
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
     * @param string $status Current status of the fx quote. One of the following values: UNQUOTED, QUOTED, EXPIRED, EXECUTED, REJECTED
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


