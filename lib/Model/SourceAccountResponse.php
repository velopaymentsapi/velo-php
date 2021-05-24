<?php
/**
 * SourceAccountResponse
 *
 * PHP version 7.2
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
 * The version of the OpenAPI document: 2.26.124
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.2.0-SNAPSHOT
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
 * SourceAccountResponse Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class SourceAccountResponse implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'SourceAccountResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'balance' => 'int',
        'currency' => 'string',
        'funding_ref' => 'string',
        'physical_account_name' => 'string',
        'rails_id' => 'string',
        'payor_id' => 'string',
        'name' => 'string',
        'pooled' => 'bool',
        'balance_visible' => 'bool',
        'customer_id' => 'string',
        'physical_account_id' => 'string',
        'funding_account_id' => 'string',
        'account_type' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'id' => 'uuid',
        'balance' => 'int64',
        'currency' => null,
        'funding_ref' => null,
        'physical_account_name' => null,
        'rails_id' => null,
        'payor_id' => 'uuid',
        'name' => null,
        'pooled' => null,
        'balance_visible' => null,
        'customer_id' => null,
        'physical_account_id' => 'uuid',
        'funding_account_id' => 'uuid',
        'account_type' => null
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
        'id' => 'id',
        'balance' => 'balance',
        'currency' => 'currency',
        'funding_ref' => 'fundingRef',
        'physical_account_name' => 'physicalAccountName',
        'rails_id' => 'railsId',
        'payor_id' => 'payorId',
        'name' => 'name',
        'pooled' => 'pooled',
        'balance_visible' => 'balanceVisible',
        'customer_id' => 'customerId',
        'physical_account_id' => 'physicalAccountId',
        'funding_account_id' => 'fundingAccountId',
        'account_type' => 'accountType'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'balance' => 'setBalance',
        'currency' => 'setCurrency',
        'funding_ref' => 'setFundingRef',
        'physical_account_name' => 'setPhysicalAccountName',
        'rails_id' => 'setRailsId',
        'payor_id' => 'setPayorId',
        'name' => 'setName',
        'pooled' => 'setPooled',
        'balance_visible' => 'setBalanceVisible',
        'customer_id' => 'setCustomerId',
        'physical_account_id' => 'setPhysicalAccountId',
        'funding_account_id' => 'setFundingAccountId',
        'account_type' => 'setAccountType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'balance' => 'getBalance',
        'currency' => 'getCurrency',
        'funding_ref' => 'getFundingRef',
        'physical_account_name' => 'getPhysicalAccountName',
        'rails_id' => 'getRailsId',
        'payor_id' => 'getPayorId',
        'name' => 'getName',
        'pooled' => 'getPooled',
        'balance_visible' => 'getBalanceVisible',
        'customer_id' => 'getCustomerId',
        'physical_account_id' => 'getPhysicalAccountId',
        'funding_account_id' => 'getFundingAccountId',
        'account_type' => 'getAccountType'
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

    const CURRENCY_USD = 'USD';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCurrencyAllowableValues()
    {
        return [
            self::CURRENCY_USD,
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
        $this->container['id'] = $data['id'] ?? null;
        $this->container['balance'] = $data['balance'] ?? null;
        $this->container['currency'] = $data['currency'] ?? null;
        $this->container['funding_ref'] = $data['funding_ref'] ?? null;
        $this->container['physical_account_name'] = $data['physical_account_name'] ?? null;
        $this->container['rails_id'] = $data['rails_id'] ?? null;
        $this->container['payor_id'] = $data['payor_id'] ?? null;
        $this->container['name'] = $data['name'] ?? null;
        $this->container['pooled'] = $data['pooled'] ?? null;
        $this->container['balance_visible'] = $data['balance_visible'] ?? null;
        $this->container['customer_id'] = $data['customer_id'] ?? null;
        $this->container['physical_account_id'] = $data['physical_account_id'] ?? null;
        $this->container['funding_account_id'] = $data['funding_account_id'] ?? null;
        $this->container['account_type'] = $data['account_type'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getCurrencyAllowableValues();
        if (!is_null($this->container['currency']) && !in_array($this->container['currency'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'currency', must be one of '%s'",
                $this->container['currency'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['currency']) && (mb_strlen($this->container['currency']) > 3)) {
            $invalidProperties[] = "invalid value for 'currency', the character length must be smaller than or equal to 3.";
        }

        if (!is_null($this->container['currency']) && (mb_strlen($this->container['currency']) < 3)) {
            $invalidProperties[] = "invalid value for 'currency', the character length must be bigger than or equal to 3.";
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
     * Gets id
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string|null $id Source Account Id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets balance
     *
     * @return int|null
     */
    public function getBalance()
    {
        return $this->container['balance'];
    }

    /**
     * Sets balance
     *
     * @param int|null $balance Decimal implied
     *
     * @return self
     */
    public function setBalance($balance)
    {
        $this->container['balance'] = $balance;

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
     * @param string|null $currency currency
     *
     * @return self
     */
    public function setCurrency($currency)
    {
        $allowedValues = $this->getCurrencyAllowableValues();
        if (!is_null($currency) && !in_array($currency, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'currency', must be one of '%s'",
                    $currency,
                    implode("', '", $allowedValues)
                )
            );
        }
        if (!is_null($currency) && (mb_strlen($currency) > 3)) {
            throw new \InvalidArgumentException('invalid length for $currency when calling SourceAccountResponse., must be smaller than or equal to 3.');
        }
        if (!is_null($currency) && (mb_strlen($currency) < 3)) {
            throw new \InvalidArgumentException('invalid length for $currency when calling SourceAccountResponse., must be bigger than or equal to 3.');
        }

        $this->container['currency'] = $currency;

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
     * @param string|null $funding_ref funding_ref
     *
     * @return self
     */
    public function setFundingRef($funding_ref)
    {
        $this->container['funding_ref'] = $funding_ref;

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
        $this->container['physical_account_name'] = $physical_account_name;

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
     * @param string|null $rails_id rails_id
     *
     * @return self
     */
    public function setRailsId($rails_id)
    {
        $this->container['rails_id'] = $rails_id;

        return $this;
    }

    /**
     * Gets payor_id
     *
     * @return string|null
     */
    public function getPayorId()
    {
        return $this->container['payor_id'];
    }

    /**
     * Sets payor_id
     *
     * @param string|null $payor_id payor_id
     *
     * @return self
     */
    public function setPayorId($payor_id)
    {
        $this->container['payor_id'] = $payor_id;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string|null $name name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets pooled
     *
     * @return bool|null
     */
    public function getPooled()
    {
        return $this->container['pooled'];
    }

    /**
     * Sets pooled
     *
     * @param bool|null $pooled pooled
     *
     * @return self
     */
    public function setPooled($pooled)
    {
        $this->container['pooled'] = $pooled;

        return $this;
    }

    /**
     * Gets balance_visible
     *
     * @return bool|null
     */
    public function getBalanceVisible()
    {
        return $this->container['balance_visible'];
    }

    /**
     * Sets balance_visible
     *
     * @param bool|null $balance_visible balance_visible
     *
     * @return self
     */
    public function setBalanceVisible($balance_visible)
    {
        $this->container['balance_visible'] = $balance_visible;

        return $this;
    }

    /**
     * Gets customer_id
     *
     * @return string|null
     */
    public function getCustomerId()
    {
        return $this->container['customer_id'];
    }

    /**
     * Sets customer_id
     *
     * @param string|null $customer_id customer_id
     *
     * @return self
     */
    public function setCustomerId($customer_id)
    {
        $this->container['customer_id'] = $customer_id;

        return $this;
    }

    /**
     * Gets physical_account_id
     *
     * @return string|null
     */
    public function getPhysicalAccountId()
    {
        return $this->container['physical_account_id'];
    }

    /**
     * Sets physical_account_id
     *
     * @param string|null $physical_account_id physical_account_id
     *
     * @return self
     */
    public function setPhysicalAccountId($physical_account_id)
    {
        $this->container['physical_account_id'] = $physical_account_id;

        return $this;
    }

    /**
     * Gets funding_account_id
     *
     * @return string|null
     */
    public function getFundingAccountId()
    {
        return $this->container['funding_account_id'];
    }

    /**
     * Sets funding_account_id
     *
     * @param string|null $funding_account_id funding_account_id
     *
     * @return self
     */
    public function setFundingAccountId($funding_account_id)
    {
        $this->container['funding_account_id'] = $funding_account_id;

        return $this;
    }

    /**
     * Gets account_type
     *
     * @return string|null
     */
    public function getAccountType()
    {
        return $this->container['account_type'];
    }

    /**
     * Sets account_type
     *
     * @param string|null $account_type account_type
     *
     * @return self
     */
    public function setAccountType($account_type)
    {
        $this->container['account_type'] = $account_type;

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


