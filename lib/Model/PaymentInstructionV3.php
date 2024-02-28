<?php
/**
 * PaymentInstructionV3
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
 * PaymentInstructionV3 Class Doc Comment
 *
 * @category Class
 * @description Instruction for creating a payment
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PaymentInstructionV3 implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PaymentInstructionV3';

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
        'transaction_id' => 'string',
        'payor_payment_id' => 'string',
        'transmission_type' => 'string',
        'remote_system_id' => 'string',
        'payment_metadata' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'remote_id' => null,
        'currency' => null,
        'amount' => 'int64',
        'payment_memo' => null,
        'source_account_name' => null,
        'transaction_id' => 'uuid',
        'payor_payment_id' => null,
        'transmission_type' => null,
        'remote_system_id' => null,
        'payment_metadata' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'remote_id' => false,
        'currency' => false,
        'amount' => false,
        'payment_memo' => false,
        'source_account_name' => false,
        'transaction_id' => false,
        'payor_payment_id' => false,
        'transmission_type' => false,
        'remote_system_id' => false,
        'payment_metadata' => false
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
        'remote_id' => 'remoteId',
        'currency' => 'currency',
        'amount' => 'amount',
        'payment_memo' => 'paymentMemo',
        'source_account_name' => 'sourceAccountName',
        'transaction_id' => 'transactionId',
        'payor_payment_id' => 'payorPaymentId',
        'transmission_type' => 'transmissionType',
        'remote_system_id' => 'remoteSystemId',
        'payment_metadata' => 'paymentMetadata'
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
        'transaction_id' => 'setTransactionId',
        'payor_payment_id' => 'setPayorPaymentId',
        'transmission_type' => 'setTransmissionType',
        'remote_system_id' => 'setRemoteSystemId',
        'payment_metadata' => 'setPaymentMetadata'
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
        'transaction_id' => 'getTransactionId',
        'payor_payment_id' => 'getPayorPaymentId',
        'transmission_type' => 'getTransmissionType',
        'remote_system_id' => 'getRemoteSystemId',
        'payment_metadata' => 'getPaymentMetadata'
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
        $this->setIfExists('remote_id', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('amount', $data ?? [], null);
        $this->setIfExists('payment_memo', $data ?? [], null);
        $this->setIfExists('source_account_name', $data ?? [], null);
        $this->setIfExists('transaction_id', $data ?? [], null);
        $this->setIfExists('payor_payment_id', $data ?? [], null);
        $this->setIfExists('transmission_type', $data ?? [], null);
        $this->setIfExists('remote_system_id', $data ?? [], null);
        $this->setIfExists('payment_metadata', $data ?? [], null);
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
        if ((mb_strlen($this->container['currency']) > 3)) {
            $invalidProperties[] = "invalid value for 'currency', the character length must be smaller than or equal to 3.";
        }

        if ((mb_strlen($this->container['currency']) < 3)) {
            $invalidProperties[] = "invalid value for 'currency', the character length must be bigger than or equal to 3.";
        }

        if (!preg_match("/^[A-Z]{3}$/", $this->container['currency'])) {
            $invalidProperties[] = "invalid value for 'currency', must be conform to the pattern /^[A-Z]{3}$/.";
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

        if (!is_null($this->container['source_account_name']) && (mb_strlen($this->container['source_account_name']) > 64)) {
            $invalidProperties[] = "invalid value for 'source_account_name', the character length must be smaller than or equal to 64.";
        }

        if (!is_null($this->container['source_account_name']) && (mb_strlen($this->container['source_account_name']) < 1)) {
            $invalidProperties[] = "invalid value for 'source_account_name', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['payor_payment_id']) && (mb_strlen($this->container['payor_payment_id']) > 40)) {
            $invalidProperties[] = "invalid value for 'payor_payment_id', the character length must be smaller than or equal to 40.";
        }

        if (!is_null($this->container['payor_payment_id']) && (mb_strlen($this->container['payor_payment_id']) < 0)) {
            $invalidProperties[] = "invalid value for 'payor_payment_id', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['remote_system_id']) && (mb_strlen($this->container['remote_system_id']) > 100)) {
            $invalidProperties[] = "invalid value for 'remote_system_id', the character length must be smaller than or equal to 100.";
        }

        if (!is_null($this->container['remote_system_id']) && (mb_strlen($this->container['remote_system_id']) < 1)) {
            $invalidProperties[] = "invalid value for 'remote_system_id', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['payment_metadata']) && (mb_strlen($this->container['payment_metadata']) > 512)) {
            $invalidProperties[] = "invalid value for 'payment_metadata', the character length must be smaller than or equal to 512.";
        }

        if (!is_null($this->container['payment_metadata']) && (mb_strlen($this->container['payment_metadata']) < 0)) {
            $invalidProperties[] = "invalid value for 'payment_metadata', the character length must be bigger than or equal to 0.";
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
     * @param string $remote_id Your identifier for the payee
     *
     * @return self
     */
    public function setRemoteId($remote_id)
    {
        if (is_null($remote_id)) {
            throw new \InvalidArgumentException('non-nullable remote_id cannot be null');
        }
        if ((mb_strlen($remote_id) > 100)) {
            throw new \InvalidArgumentException('invalid length for $remote_id when calling PaymentInstructionV3., must be smaller than or equal to 100.');
        }
        if ((mb_strlen($remote_id) < 1)) {
            throw new \InvalidArgumentException('invalid length for $remote_id when calling PaymentInstructionV3., must be bigger than or equal to 1.');
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
            throw new \InvalidArgumentException('invalid length for $currency when calling PaymentInstructionV3., must be smaller than or equal to 3.');
        }
        if ((mb_strlen($currency) < 3)) {
            throw new \InvalidArgumentException('invalid length for $currency when calling PaymentInstructionV3., must be bigger than or equal to 3.');
        }
        if ((!preg_match("/^[A-Z]{3}$/", ObjectSerializer::toString($currency)))) {
            throw new \InvalidArgumentException("invalid value for \$currency when calling PaymentInstructionV3., must conform to the pattern /^[A-Z]{3}$/.");
        }

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
     * @return self
     */
    public function setAmount($amount)
    {
        if (is_null($amount)) {
            throw new \InvalidArgumentException('non-nullable amount cannot be null');
        }

        if (($amount < 1)) {
            throw new \InvalidArgumentException('invalid value for $amount when calling PaymentInstructionV3., must be bigger than or equal to 1.');
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
     * @param string|null $payment_memo <p>Any value here will override the memo value in the parent payout</p> <p>This should be the reference field on the statement seen by the payee (but not via ACH)</p>
     *
     * @return self
     */
    public function setPaymentMemo($payment_memo)
    {
        if (is_null($payment_memo)) {
            throw new \InvalidArgumentException('non-nullable payment_memo cannot be null');
        }
        if ((mb_strlen($payment_memo) > 40)) {
            throw new \InvalidArgumentException('invalid length for $payment_memo when calling PaymentInstructionV3., must be smaller than or equal to 40.');
        }
        if ((mb_strlen($payment_memo) < 0)) {
            throw new \InvalidArgumentException('invalid length for $payment_memo when calling PaymentInstructionV3., must be bigger than or equal to 0.');
        }

        $this->container['payment_memo'] = $payment_memo;

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
     * @param string|null $source_account_name Must match a valid source account name belonging to the payor. Exactly one of sourceAccountName or transactionId is required.
     *
     * @return self
     */
    public function setSourceAccountName($source_account_name)
    {
        if (is_null($source_account_name)) {
            throw new \InvalidArgumentException('non-nullable source_account_name cannot be null');
        }
        if ((mb_strlen($source_account_name) > 64)) {
            throw new \InvalidArgumentException('invalid length for $source_account_name when calling PaymentInstructionV3., must be smaller than or equal to 64.');
        }
        if ((mb_strlen($source_account_name) < 1)) {
            throw new \InvalidArgumentException('invalid length for $source_account_name when calling PaymentInstructionV3., must be bigger than or equal to 1.');
        }

        $this->container['source_account_name'] = $source_account_name;

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
     * @param string|null $transaction_id Must match a valid transaction id previously created by the payor. Exactly one of sourceAccountName or transactionId is required.
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
     * @param string|null $payor_payment_id A reference identifier for the payor for the given payee payment
     *
     * @return self
     */
    public function setPayorPaymentId($payor_payment_id)
    {
        if (is_null($payor_payment_id)) {
            throw new \InvalidArgumentException('non-nullable payor_payment_id cannot be null');
        }
        if ((mb_strlen($payor_payment_id) > 40)) {
            throw new \InvalidArgumentException('invalid length for $payor_payment_id when calling PaymentInstructionV3., must be smaller than or equal to 40.');
        }
        if ((mb_strlen($payor_payment_id) < 0)) {
            throw new \InvalidArgumentException('invalid length for $payor_payment_id when calling PaymentInstructionV3., must be bigger than or equal to 0.');
        }

        $this->container['payor_payment_id'] = $payor_payment_id;

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
     * @param string|null $transmission_type <p>Optionally choose a specific transmission method for the payment.</p> <p>Valid values for transmissionType can be found attached to the Source Account</p>
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
     * @param string|null $remote_system_id <p>The identifier for the remote payments system if not Velo</p> <p>Should only be used after consultation with Velo Payments</p>
     *
     * @return self
     */
    public function setRemoteSystemId($remote_system_id)
    {
        if (is_null($remote_system_id)) {
            throw new \InvalidArgumentException('non-nullable remote_system_id cannot be null');
        }
        if ((mb_strlen($remote_system_id) > 100)) {
            throw new \InvalidArgumentException('invalid length for $remote_system_id when calling PaymentInstructionV3., must be smaller than or equal to 100.');
        }
        if ((mb_strlen($remote_system_id) < 1)) {
            throw new \InvalidArgumentException('invalid length for $remote_system_id when calling PaymentInstructionV3., must be bigger than or equal to 1.');
        }

        $this->container['remote_system_id'] = $remote_system_id;

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
     * @param string|null $payment_metadata <p>Metadata about the payment that may be relevant to the specific rails or remote system making the payout</p> <p>The structure of the data will be dictated by the requirements of the payment rails</p>
     *
     * @return self
     */
    public function setPaymentMetadata($payment_metadata)
    {
        if (is_null($payment_metadata)) {
            throw new \InvalidArgumentException('non-nullable payment_metadata cannot be null');
        }
        if ((mb_strlen($payment_metadata) > 512)) {
            throw new \InvalidArgumentException('invalid length for $payment_metadata when calling PaymentInstructionV3., must be smaller than or equal to 512.');
        }
        if ((mb_strlen($payment_metadata) < 0)) {
            throw new \InvalidArgumentException('invalid length for $payment_metadata when calling PaymentInstructionV3., must be bigger than or equal to 0.');
        }

        $this->container['payment_metadata'] = $payment_metadata;

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


