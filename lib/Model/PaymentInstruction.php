<?php
/**
 * PaymentInstruction
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
 * The version of the OpenAPI document: 2.19.40
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 4.2.3-SNAPSHOT
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
 * PaymentInstruction Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class PaymentInstruction implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PaymentInstruction';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'remote_id' => 'string',
        'currency' => 'string',
        'amount' => 'int',
        'payment_memo' => 'string',
        'source_account_name' => 'string',
        'payor_payment_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'remote_id' => null,
        'currency' => null,
        'amount' => 'int64',
        'payment_memo' => null,
        'source_account_name' => null,
        'payor_payment_id' => null
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
        'remote_id' => 'remoteId',
        'currency' => 'currency',
        'amount' => 'amount',
        'payment_memo' => 'paymentMemo',
        'source_account_name' => 'sourceAccountName',
        'payor_payment_id' => 'payorPaymentId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'remote_id' => 'setRemoteId',
        'currency' => 'setCurrency',
        'amount' => 'setAmount',
        'payment_memo' => 'setPaymentMemo',
        'source_account_name' => 'setSourceAccountName',
        'payor_payment_id' => 'setPayorPaymentId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'remote_id' => 'getRemoteId',
        'currency' => 'getCurrency',
        'amount' => 'getAmount',
        'payment_memo' => 'getPaymentMemo',
        'source_account_name' => 'getSourceAccountName',
        'payor_payment_id' => 'getPayorPaymentId'
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
        $this->container['remote_id'] = isset($data['remote_id']) ? $data['remote_id'] : null;
        $this->container['currency'] = isset($data['currency']) ? $data['currency'] : null;
        $this->container['amount'] = isset($data['amount']) ? $data['amount'] : null;
        $this->container['payment_memo'] = isset($data['payment_memo']) ? $data['payment_memo'] : null;
        $this->container['source_account_name'] = isset($data['source_account_name']) ? $data['source_account_name'] : null;
        $this->container['payor_payment_id'] = isset($data['payor_payment_id']) ? $data['payor_payment_id'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['remote_id'] === null) {
            $invalidProperties[] = "'remote_id' can't be null";
        }
        if ((mb_strlen($this->container['remote_id']) > 100)) {
            $invalidProperties[] = "invalid value for 'remote_id', the character length must be smaller than or equal to 100.";
        }

        if ((mb_strlen($this->container['remote_id']) < 1)) {
            $invalidProperties[] = "invalid value for 'remote_id', the character length must be bigger than or equal to 1.";
        }

        if ($this->container['currency'] === null) {
            $invalidProperties[] = "'currency' can't be null";
        }
        if ($this->container['amount'] === null) {
            $invalidProperties[] = "'amount' can't be null";
        }
        if (($this->container['amount'] < 1)) {
            $invalidProperties[] = "invalid value for 'amount', must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['payment_memo']) && (mb_strlen($this->container['payment_memo']) > 40)) {
            $invalidProperties[] = "invalid value for 'payment_memo', the character length must be smaller than or equal to 40.";
        }

        if (!is_null($this->container['payment_memo']) && (mb_strlen($this->container['payment_memo']) < 0)) {
            $invalidProperties[] = "invalid value for 'payment_memo', the character length must be bigger than or equal to 0.";
        }

        if ($this->container['source_account_name'] === null) {
            $invalidProperties[] = "'source_account_name' can't be null";
        }
        if ((mb_strlen($this->container['source_account_name']) > 64)) {
            $invalidProperties[] = "invalid value for 'source_account_name', the character length must be smaller than or equal to 64.";
        }

        if ((mb_strlen($this->container['source_account_name']) < 1)) {
            $invalidProperties[] = "invalid value for 'source_account_name', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['payor_payment_id']) && (mb_strlen($this->container['payor_payment_id']) > 40)) {
            $invalidProperties[] = "invalid value for 'payor_payment_id', the character length must be smaller than or equal to 40.";
        }

        if (!is_null($this->container['payor_payment_id']) && (mb_strlen($this->container['payor_payment_id']) < 0)) {
            $invalidProperties[] = "invalid value for 'payor_payment_id', the character length must be bigger than or equal to 0.";
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
     * Gets remote_id
     *
     * @return string
     */
    public function getRemoteId()
    {
        return $this->container['remote_id'];
    }

    /**
     * Sets remote_id
     *
     * @param string $remote_id Your identifier for payee
     *
     * @return $this
     */
    public function setRemoteId($remote_id)
    {
        if ((mb_strlen($remote_id) > 100)) {
            throw new \InvalidArgumentException('invalid length for $remote_id when calling PaymentInstruction., must be smaller than or equal to 100.');
        }
        if ((mb_strlen($remote_id) < 1)) {
            throw new \InvalidArgumentException('invalid length for $remote_id when calling PaymentInstruction., must be bigger than or equal to 1.');
        }

        $this->container['remote_id'] = $remote_id;

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
     * @param string $currency Payee's currency
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->container['currency'] = $currency;

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
     * @param int $amount <p>Amount to send to Payee</p> <p>The maximum payment amount is dependent on the currency</p>
     *
     * @return $this
     */
    public function setAmount($amount)
    {

        if (($amount < 1)) {
            throw new \InvalidArgumentException('invalid value for $amount when calling PaymentInstruction., must be bigger than or equal to 1.');
        }

        $this->container['amount'] = $amount;

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
     * @param string|null $payment_memo payment_memo
     *
     * @return $this
     */
    public function setPaymentMemo($payment_memo)
    {
        if (!is_null($payment_memo) && (mb_strlen($payment_memo) > 40)) {
            throw new \InvalidArgumentException('invalid length for $payment_memo when calling PaymentInstruction., must be smaller than or equal to 40.');
        }
        if (!is_null($payment_memo) && (mb_strlen($payment_memo) < 0)) {
            throw new \InvalidArgumentException('invalid length for $payment_memo when calling PaymentInstruction., must be bigger than or equal to 0.');
        }

        $this->container['payment_memo'] = $payment_memo;

        return $this;
    }

    /**
     * Gets source_account_name
     *
     * @return string
     */
    public function getSourceAccountName()
    {
        return $this->container['source_account_name'];
    }

    /**
     * Sets source_account_name
     *
     * @param string $source_account_name source_account_name
     *
     * @return $this
     */
    public function setSourceAccountName($source_account_name)
    {
        if ((mb_strlen($source_account_name) > 64)) {
            throw new \InvalidArgumentException('invalid length for $source_account_name when calling PaymentInstruction., must be smaller than or equal to 64.');
        }
        if ((mb_strlen($source_account_name) < 1)) {
            throw new \InvalidArgumentException('invalid length for $source_account_name when calling PaymentInstruction., must be bigger than or equal to 1.');
        }

        $this->container['source_account_name'] = $source_account_name;

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
     * @return $this
     */
    public function setPayorPaymentId($payor_payment_id)
    {
        if (!is_null($payor_payment_id) && (mb_strlen($payor_payment_id) > 40)) {
            throw new \InvalidArgumentException('invalid length for $payor_payment_id when calling PaymentInstruction., must be smaller than or equal to 40.');
        }
        if (!is_null($payor_payment_id) && (mb_strlen($payor_payment_id) < 0)) {
            throw new \InvalidArgumentException('invalid length for $payor_payment_id when calling PaymentInstruction., must be bigger than or equal to 0.');
        }

        $this->container['payor_payment_id'] = $payor_payment_id;

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


