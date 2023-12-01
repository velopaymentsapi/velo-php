<?php
/**
 * FundingResponse
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
 * FundingResponse Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class FundingResponse implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'FundingResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'funding_id' => 'string',
        'payor_id' => 'string',
        'created_at' => '\DateTime',
        'detected_funding_ref' => 'string',
        'amount' => 'int',
        'currency' => 'string',
        'text' => 'string',
        'physical_account_name' => 'string',
        'source_account_id' => 'string',
        'allocation_type' => 'string',
        'allocated_at' => '\DateTime',
        'allocation_date' => '\DateTime',
        'reason' => 'string',
        'hidden_date' => '\DateTime',
        'funding_account_type' => 'string',
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
        'funding_id' => 'uuid',
        'payor_id' => 'uuid',
        'created_at' => 'date-time',
        'detected_funding_ref' => null,
        'amount' => 'int64',
        'currency' => null,
        'text' => null,
        'physical_account_name' => null,
        'source_account_id' => 'uuid',
        'allocation_type' => null,
        'allocated_at' => 'date-time',
        'allocation_date' => 'date-time',
        'reason' => null,
        'hidden_date' => 'date-time',
        'funding_account_type' => null,
        'status' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'funding_id' => false,
		'payor_id' => false,
		'created_at' => false,
		'detected_funding_ref' => false,
		'amount' => false,
		'currency' => false,
		'text' => false,
		'physical_account_name' => false,
		'source_account_id' => false,
		'allocation_type' => false,
		'allocated_at' => false,
		'allocation_date' => false,
		'reason' => false,
		'hidden_date' => false,
		'funding_account_type' => false,
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
        'funding_id' => 'fundingId',
        'payor_id' => 'payorId',
        'created_at' => 'createdAt',
        'detected_funding_ref' => 'detectedFundingRef',
        'amount' => 'amount',
        'currency' => 'currency',
        'text' => 'text',
        'physical_account_name' => 'physicalAccountName',
        'source_account_id' => 'sourceAccountId',
        'allocation_type' => 'allocationType',
        'allocated_at' => 'allocatedAt',
        'allocation_date' => 'allocationDate',
        'reason' => 'reason',
        'hidden_date' => 'hiddenDate',
        'funding_account_type' => 'fundingAccountType',
        'status' => 'status'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'funding_id' => 'setFundingId',
        'payor_id' => 'setPayorId',
        'created_at' => 'setCreatedAt',
        'detected_funding_ref' => 'setDetectedFundingRef',
        'amount' => 'setAmount',
        'currency' => 'setCurrency',
        'text' => 'setText',
        'physical_account_name' => 'setPhysicalAccountName',
        'source_account_id' => 'setSourceAccountId',
        'allocation_type' => 'setAllocationType',
        'allocated_at' => 'setAllocatedAt',
        'allocation_date' => 'setAllocationDate',
        'reason' => 'setReason',
        'hidden_date' => 'setHiddenDate',
        'funding_account_type' => 'setFundingAccountType',
        'status' => 'setStatus'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'funding_id' => 'getFundingId',
        'payor_id' => 'getPayorId',
        'created_at' => 'getCreatedAt',
        'detected_funding_ref' => 'getDetectedFundingRef',
        'amount' => 'getAmount',
        'currency' => 'getCurrency',
        'text' => 'getText',
        'physical_account_name' => 'getPhysicalAccountName',
        'source_account_id' => 'getSourceAccountId',
        'allocation_type' => 'getAllocationType',
        'allocated_at' => 'getAllocatedAt',
        'allocation_date' => 'getAllocationDate',
        'reason' => 'getReason',
        'hidden_date' => 'getHiddenDate',
        'funding_account_type' => 'getFundingAccountType',
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
        $this->setIfExists('funding_id', $data ?? [], null);
        $this->setIfExists('payor_id', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('detected_funding_ref', $data ?? [], null);
        $this->setIfExists('amount', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('text', $data ?? [], null);
        $this->setIfExists('physical_account_name', $data ?? [], null);
        $this->setIfExists('source_account_id', $data ?? [], null);
        $this->setIfExists('allocation_type', $data ?? [], null);
        $this->setIfExists('allocated_at', $data ?? [], null);
        $this->setIfExists('allocation_date', $data ?? [], null);
        $this->setIfExists('reason', $data ?? [], null);
        $this->setIfExists('hidden_date', $data ?? [], null);
        $this->setIfExists('funding_account_type', $data ?? [], null);
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

        if ($this->container['funding_id'] === null) {
            $invalidProperties[] = "'funding_id' can't be null";
        }
        if ($this->container['payor_id'] === null) {
            $invalidProperties[] = "'payor_id' can't be null";
        }
        if ($this->container['created_at'] === null) {
            $invalidProperties[] = "'created_at' can't be null";
        }
        if ($this->container['amount'] === null) {
            $invalidProperties[] = "'amount' can't be null";
        }
        if ($this->container['currency'] === null) {
            $invalidProperties[] = "'currency' can't be null";
        }
        if ((mb_strlen($this->container['currency']) > 3)) {
            $invalidProperties[] = "invalid value for 'currency', the character length must be smaller than or equal to 3.";
        }

        if ((mb_strlen($this->container['currency']) < 3)) {
            $invalidProperties[] = "invalid value for 'currency', the character length must be bigger than or equal to 3.";
        }

        if (!preg_match("/^[A-Z]{3}$/", $this->container['currency'])) {
            $invalidProperties[] = "invalid value for 'currency', must be conform to the pattern /^[A-Z]{3}$/.";
        }

        if ($this->container['funding_account_type'] === null) {
            $invalidProperties[] = "'funding_account_type' can't be null";
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
     * Gets funding_id
     *
     * @return string
     */
    public function getFundingId()
    {
        return $this->container['funding_id'];
    }

    /**
     * Sets funding_id
     *
     * @param string $funding_id funding_id
     *
     * @return self
     */
    public function setFundingId($funding_id)
    {
        if (is_null($funding_id)) {
            throw new \InvalidArgumentException('non-nullable funding_id cannot be null');
        }
        $this->container['funding_id'] = $funding_id;

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
     * @param string $payor_id payor_id
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
     * @param \DateTime $created_at The date and time the funding was created
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
     * Gets detected_funding_ref
     *
     * @return string|null
     */
    public function getDetectedFundingRef()
    {
        return $this->container['detected_funding_ref'];
    }

    /**
     * Sets detected_funding_ref
     *
     * @param string|null $detected_funding_ref detected_funding_ref
     *
     * @return self
     */
    public function setDetectedFundingRef($detected_funding_ref)
    {
        if (is_null($detected_funding_ref)) {
            throw new \InvalidArgumentException('non-nullable detected_funding_ref cannot be null');
        }
        $this->container['detected_funding_ref'] = $detected_funding_ref;

        return $this;
    }

    /**
     * Gets amount
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param int $amount amount
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
     * Gets currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param string $currency Valid ISO 4217 3 letter currency code. See the <a href=\"https://www.iso.org/iso-4217-currency-codes.html\" target=\"_blank\" a>ISO specification</a> for details.
     *
     * @return self
     */
    public function setCurrency($currency)
    {
        if (is_null($currency)) {
            throw new \InvalidArgumentException('non-nullable currency cannot be null');
        }
        if ((mb_strlen($currency) > 3)) {
            throw new \InvalidArgumentException('invalid length for $currency when calling FundingResponse., must be smaller than or equal to 3.');
        }
        if ((mb_strlen($currency) < 3)) {
            throw new \InvalidArgumentException('invalid length for $currency when calling FundingResponse., must be bigger than or equal to 3.');
        }
        if ((!preg_match("/^[A-Z]{3}$/", ObjectSerializer::toString($currency)))) {
            throw new \InvalidArgumentException("invalid value for \$currency when calling FundingResponse., must conform to the pattern /^[A-Z]{3}$/.");
        }

        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets text
     *
     * @return string|null
     */
    public function getText()
    {
        return $this->container['text'];
    }

    /**
     * Sets text
     *
     * @param string|null $text text
     *
     * @return self
     */
    public function setText($text)
    {
        if (is_null($text)) {
            throw new \InvalidArgumentException('non-nullable text cannot be null');
        }
        $this->container['text'] = $text;

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
     * @param string|null $physical_account_name physical_account_name
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
     * @param string|null $source_account_id source_account_id
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
     * Gets allocation_type
     *
     * @return string|null
     */
    public function getAllocationType()
    {
        return $this->container['allocation_type'];
    }

    /**
     * Sets allocation_type
     *
     * @param string|null $allocation_type Funding Allocation Type. One of the following values: AUTOMATIC, MANUAL
     *
     * @return self
     */
    public function setAllocationType($allocation_type)
    {
        if (is_null($allocation_type)) {
            throw new \InvalidArgumentException('non-nullable allocation_type cannot be null');
        }
        $this->container['allocation_type'] = $allocation_type;

        return $this;
    }

    /**
     * Gets allocated_at
     *
     * @return \DateTime|null
     */
    public function getAllocatedAt()
    {
        return $this->container['allocated_at'];
    }

    /**
     * Sets allocated_at
     *
     * @param \DateTime|null $allocated_at Populated only if the funding has been allocated. The date and time the funding was allocated.
     *
     * @return self
     */
    public function setAllocatedAt($allocated_at)
    {
        if (is_null($allocated_at)) {
            throw new \InvalidArgumentException('non-nullable allocated_at cannot be null');
        }
        $this->container['allocated_at'] = $allocated_at;

        return $this;
    }

    /**
     * Gets allocation_date
     *
     * @return \DateTime|null
     * @deprecated
     */
    public function getAllocationDate()
    {
        return $this->container['allocation_date'];
    }

    /**
     * Sets allocation_date
     *
     * @param \DateTime|null $allocation_date Populated with allocatedAt if allocated otherwise createdAt. Deprecated in v2.36 - will be removed in the future.
     *
     * @return self
     * @deprecated
     */
    public function setAllocationDate($allocation_date)
    {
        if (is_null($allocation_date)) {
            throw new \InvalidArgumentException('non-nullable allocation_date cannot be null');
        }
        $this->container['allocation_date'] = $allocation_date;

        return $this;
    }

    /**
     * Gets reason
     *
     * @return string|null
     */
    public function getReason()
    {
        return $this->container['reason'];
    }

    /**
     * Sets reason
     *
     * @param string|null $reason reason
     *
     * @return self
     */
    public function setReason($reason)
    {
        if (is_null($reason)) {
            throw new \InvalidArgumentException('non-nullable reason cannot be null');
        }
        $this->container['reason'] = $reason;

        return $this;
    }

    /**
     * Gets hidden_date
     *
     * @return \DateTime|null
     */
    public function getHiddenDate()
    {
        return $this->container['hidden_date'];
    }

    /**
     * Sets hidden_date
     *
     * @param \DateTime|null $hidden_date hidden_date
     *
     * @return self
     */
    public function setHiddenDate($hidden_date)
    {
        if (is_null($hidden_date)) {
            throw new \InvalidArgumentException('non-nullable hidden_date cannot be null');
        }
        $this->container['hidden_date'] = $hidden_date;

        return $this;
    }

    /**
     * Gets funding_account_type
     *
     * @return string
     */
    public function getFundingAccountType()
    {
        return $this->container['funding_account_type'];
    }

    /**
     * Sets funding_account_type
     *
     * @param string $funding_account_type Funding Account Type. One of the following values: FBO, PRIVATE
     *
     * @return self
     */
    public function setFundingAccountType($funding_account_type)
    {
        if (is_null($funding_account_type)) {
            throw new \InvalidArgumentException('non-nullable funding_account_type cannot be null');
        }
        $this->container['funding_account_type'] = $funding_account_type;

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
     * @param string $status Current status of the funding. One of the follwing values: PENDING, UNALLOCATED, ALLOCATED, HIDDEN, RETURNED, RETURNING, BULK_RETURN, OTHER
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


