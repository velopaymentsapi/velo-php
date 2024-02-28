<?php
/**
 * PaymentChannelResponseV4
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
 * PaymentChannelResponseV4 Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PaymentChannelResponseV4 implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PaymentChannelResponseV4';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'payee_id' => 'string',
        'payment_channel_name' => 'string',
        'account_name' => 'string',
        'channel_type' => 'string',
        'country_code' => 'string',
        'routing_number' => 'string',
        'account_number' => 'string',
        'iban' => 'string',
        'currency' => 'string',
        'payor_ids' => 'string[]',
        'payee_name' => 'string',
        'bank_name' => 'string',
        'bank_swift_bic' => 'string',
        'bank_address' => '\VeloPayments\Client\Model\AddressV4',
        'deleted' => 'bool',
        'enabled' => 'bool',
        'disabled_reason_code' => 'string',
        'disabled_reason' => 'string',
        'payable' => 'bool'
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
        'payee_id' => 'uuid',
        'payment_channel_name' => null,
        'account_name' => null,
        'channel_type' => null,
        'country_code' => null,
        'routing_number' => null,
        'account_number' => null,
        'iban' => null,
        'currency' => null,
        'payor_ids' => 'uuid',
        'payee_name' => null,
        'bank_name' => null,
        'bank_swift_bic' => null,
        'bank_address' => null,
        'deleted' => null,
        'enabled' => null,
        'disabled_reason_code' => null,
        'disabled_reason' => null,
        'payable' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
        'payee_id' => false,
        'payment_channel_name' => false,
        'account_name' => false,
        'channel_type' => false,
        'country_code' => false,
        'routing_number' => false,
        'account_number' => false,
        'iban' => false,
        'currency' => false,
        'payor_ids' => false,
        'payee_name' => false,
        'bank_name' => false,
        'bank_swift_bic' => false,
        'bank_address' => false,
        'deleted' => false,
        'enabled' => false,
        'disabled_reason_code' => false,
        'disabled_reason' => false,
        'payable' => false
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
        'id' => 'id',
        'payee_id' => 'payeeId',
        'payment_channel_name' => 'paymentChannelName',
        'account_name' => 'accountName',
        'channel_type' => 'channelType',
        'country_code' => 'countryCode',
        'routing_number' => 'routingNumber',
        'account_number' => 'accountNumber',
        'iban' => 'iban',
        'currency' => 'currency',
        'payor_ids' => 'payorIds',
        'payee_name' => 'payeeName',
        'bank_name' => 'bankName',
        'bank_swift_bic' => 'bankSwiftBic',
        'bank_address' => 'bankAddress',
        'deleted' => 'deleted',
        'enabled' => 'enabled',
        'disabled_reason_code' => 'disabledReasonCode',
        'disabled_reason' => 'disabledReason',
        'payable' => 'payable'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'payee_id' => 'setPayeeId',
        'payment_channel_name' => 'setPaymentChannelName',
        'account_name' => 'setAccountName',
        'channel_type' => 'setChannelType',
        'country_code' => 'setCountryCode',
        'routing_number' => 'setRoutingNumber',
        'account_number' => 'setAccountNumber',
        'iban' => 'setIban',
        'currency' => 'setCurrency',
        'payor_ids' => 'setPayorIds',
        'payee_name' => 'setPayeeName',
        'bank_name' => 'setBankName',
        'bank_swift_bic' => 'setBankSwiftBic',
        'bank_address' => 'setBankAddress',
        'deleted' => 'setDeleted',
        'enabled' => 'setEnabled',
        'disabled_reason_code' => 'setDisabledReasonCode',
        'disabled_reason' => 'setDisabledReason',
        'payable' => 'setPayable'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'payee_id' => 'getPayeeId',
        'payment_channel_name' => 'getPaymentChannelName',
        'account_name' => 'getAccountName',
        'channel_type' => 'getChannelType',
        'country_code' => 'getCountryCode',
        'routing_number' => 'getRoutingNumber',
        'account_number' => 'getAccountNumber',
        'iban' => 'getIban',
        'currency' => 'getCurrency',
        'payor_ids' => 'getPayorIds',
        'payee_name' => 'getPayeeName',
        'bank_name' => 'getBankName',
        'bank_swift_bic' => 'getBankSwiftBic',
        'bank_address' => 'getBankAddress',
        'deleted' => 'getDeleted',
        'enabled' => 'getEnabled',
        'disabled_reason_code' => 'getDisabledReasonCode',
        'disabled_reason' => 'getDisabledReason',
        'payable' => 'getPayable'
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
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('payee_id', $data ?? [], null);
        $this->setIfExists('payment_channel_name', $data ?? [], null);
        $this->setIfExists('account_name', $data ?? [], null);
        $this->setIfExists('channel_type', $data ?? [], null);
        $this->setIfExists('country_code', $data ?? [], null);
        $this->setIfExists('routing_number', $data ?? [], null);
        $this->setIfExists('account_number', $data ?? [], null);
        $this->setIfExists('iban', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('payor_ids', $data ?? [], null);
        $this->setIfExists('payee_name', $data ?? [], null);
        $this->setIfExists('bank_name', $data ?? [], null);
        $this->setIfExists('bank_swift_bic', $data ?? [], null);
        $this->setIfExists('bank_address', $data ?? [], null);
        $this->setIfExists('deleted', $data ?? [], null);
        $this->setIfExists('enabled', $data ?? [], null);
        $this->setIfExists('disabled_reason_code', $data ?? [], null);
        $this->setIfExists('disabled_reason', $data ?? [], null);
        $this->setIfExists('payable', $data ?? [], null);
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

        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['payment_channel_name'] === null) {
            $invalidProperties[] = "'payment_channel_name' can't be null";
        }
        if ($this->container['account_name'] === null) {
            $invalidProperties[] = "'account_name' can't be null";
        }
        if ($this->container['channel_type'] === null) {
            $invalidProperties[] = "'channel_type' can't be null";
        }
        if ($this->container['country_code'] === null) {
            $invalidProperties[] = "'country_code' can't be null";
        }
        if ((mb_strlen($this->container['country_code']) > 2)) {
            $invalidProperties[] = "invalid value for 'country_code', the character length must be smaller than or equal to 2.";
        }

        if ((mb_strlen($this->container['country_code']) < 2)) {
            $invalidProperties[] = "invalid value for 'country_code', the character length must be bigger than or equal to 2.";
        }

        if (!preg_match("/^[A-Z]{2}$/", $this->container['country_code'])) {
            $invalidProperties[] = "invalid value for 'country_code', must be conform to the pattern /^[A-Z]{2}$/.";
        }

        if (!is_null($this->container['routing_number']) && (mb_strlen($this->container['routing_number']) > 9)) {
            $invalidProperties[] = "invalid value for 'routing_number', the character length must be smaller than or equal to 9.";
        }

        if (!is_null($this->container['routing_number']) && (mb_strlen($this->container['routing_number']) < 9)) {
            $invalidProperties[] = "invalid value for 'routing_number', the character length must be bigger than or equal to 9.";
        }

        if (!is_null($this->container['account_number']) && (mb_strlen($this->container['account_number']) > 17)) {
            $invalidProperties[] = "invalid value for 'account_number', the character length must be smaller than or equal to 17.";
        }

        if (!is_null($this->container['account_number']) && (mb_strlen($this->container['account_number']) < 6)) {
            $invalidProperties[] = "invalid value for 'account_number', the character length must be bigger than or equal to 6.";
        }

        if (!is_null($this->container['iban']) && (mb_strlen($this->container['iban']) > 34)) {
            $invalidProperties[] = "invalid value for 'iban', the character length must be smaller than or equal to 34.";
        }

        if (!is_null($this->container['iban']) && (mb_strlen($this->container['iban']) < 15)) {
            $invalidProperties[] = "invalid value for 'iban', the character length must be bigger than or equal to 15.";
        }

        if (!is_null($this->container['iban']) && !preg_match("/^[A-Za-z0-9]+$/", $this->container['iban'])) {
            $invalidProperties[] = "invalid value for 'iban', must be conform to the pattern /^[A-Za-z0-9]+$/.";
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
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id id
     *
     * @return self
     */
    public function setId($id)
    {
        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets payee_id
     *
     * @return string|null
     */
    public function getPayeeId()
    {
        return $this->container['payee_id'];
    }

    /**
     * Sets payee_id
     *
     * @param string|null $payee_id payee_id
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
     * Gets payment_channel_name
     *
     * @return string
     */
    public function getPaymentChannelName()
    {
        return $this->container['payment_channel_name'];
    }

    /**
     * Sets payment_channel_name
     *
     * @param string $payment_channel_name payment_channel_name
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
     * @return string
     */
    public function getAccountName()
    {
        return $this->container['account_name'];
    }

    /**
     * Sets account_name
     *
     * @param string $account_name account_name
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
     * Gets channel_type
     *
     * @return string
     */
    public function getChannelType()
    {
        return $this->container['channel_type'];
    }

    /**
     * Sets channel_type
     *
     * @param string $channel_type Payment channel type. One of the following values: CHANNEL_BANK
     *
     * @return self
     */
    public function setChannelType($channel_type)
    {
        if (is_null($channel_type)) {
            throw new \InvalidArgumentException('non-nullable channel_type cannot be null');
        }
        $this->container['channel_type'] = $channel_type;

        return $this;
    }

    /**
     * Gets country_code
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->container['country_code'];
    }

    /**
     * Sets country_code
     *
     * @param string $country_code Valid ISO 3166 2 character country code. See the <a href=\"https://www.iso.org/iso-3166-country-codes.html\" target=\"_blank\" a>ISO specification</a> for details.
     *
     * @return self
     */
    public function setCountryCode($country_code)
    {
        if (is_null($country_code)) {
            throw new \InvalidArgumentException('non-nullable country_code cannot be null');
        }
        if ((mb_strlen($country_code) > 2)) {
            throw new \InvalidArgumentException('invalid length for $country_code when calling PaymentChannelResponseV4., must be smaller than or equal to 2.');
        }
        if ((mb_strlen($country_code) < 2)) {
            throw new \InvalidArgumentException('invalid length for $country_code when calling PaymentChannelResponseV4., must be bigger than or equal to 2.');
        }
        if ((!preg_match("/^[A-Z]{2}$/", ObjectSerializer::toString($country_code)))) {
            throw new \InvalidArgumentException("invalid value for \$country_code when calling PaymentChannelResponseV4., must conform to the pattern /^[A-Z]{2}$/.");
        }

        $this->container['country_code'] = $country_code;

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
     * @param string|null $routing_number routing_number
     *
     * @return self
     */
    public function setRoutingNumber($routing_number)
    {
        if (is_null($routing_number)) {
            throw new \InvalidArgumentException('non-nullable routing_number cannot be null');
        }
        if ((mb_strlen($routing_number) > 9)) {
            throw new \InvalidArgumentException('invalid length for $routing_number when calling PaymentChannelResponseV4., must be smaller than or equal to 9.');
        }
        if ((mb_strlen($routing_number) < 9)) {
            throw new \InvalidArgumentException('invalid length for $routing_number when calling PaymentChannelResponseV4., must be bigger than or equal to 9.');
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
     * @param string|null $account_number account_number
     *
     * @return self
     */
    public function setAccountNumber($account_number)
    {
        if (is_null($account_number)) {
            throw new \InvalidArgumentException('non-nullable account_number cannot be null');
        }
        if ((mb_strlen($account_number) > 17)) {
            throw new \InvalidArgumentException('invalid length for $account_number when calling PaymentChannelResponseV4., must be smaller than or equal to 17.');
        }
        if ((mb_strlen($account_number) < 6)) {
            throw new \InvalidArgumentException('invalid length for $account_number when calling PaymentChannelResponseV4., must be bigger than or equal to 6.');
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
     * @param string|null $iban Must match the regular expression ```^[A-Za-z0-9]+$```.
     *
     * @return self
     */
    public function setIban($iban)
    {
        if (is_null($iban)) {
            throw new \InvalidArgumentException('non-nullable iban cannot be null');
        }
        if ((mb_strlen($iban) > 34)) {
            throw new \InvalidArgumentException('invalid length for $iban when calling PaymentChannelResponseV4., must be smaller than or equal to 34.');
        }
        if ((mb_strlen($iban) < 15)) {
            throw new \InvalidArgumentException('invalid length for $iban when calling PaymentChannelResponseV4., must be bigger than or equal to 15.');
        }
        if ((!preg_match("/^[A-Za-z0-9]+$/", ObjectSerializer::toString($iban)))) {
            throw new \InvalidArgumentException("invalid value for \$iban when calling PaymentChannelResponseV4., must conform to the pattern /^[A-Za-z0-9]+$/.");
        }

        $this->container['iban'] = $iban;

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
            throw new \InvalidArgumentException('invalid length for $currency when calling PaymentChannelResponseV4., must be smaller than or equal to 3.');
        }
        if ((mb_strlen($currency) < 3)) {
            throw new \InvalidArgumentException('invalid length for $currency when calling PaymentChannelResponseV4., must be bigger than or equal to 3.');
        }
        if ((!preg_match("/^[A-Z]{3}$/", ObjectSerializer::toString($currency)))) {
            throw new \InvalidArgumentException("invalid value for \$currency when calling PaymentChannelResponseV4., must conform to the pattern /^[A-Z]{3}$/.");
        }

        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets payor_ids
     *
     * @return string[]|null
     * @deprecated
     */
    public function getPayorIds()
    {
        return $this->container['payor_ids'];
    }

    /**
     * Sets payor_ids
     *
     * @param string[]|null $payor_ids payor_ids
     *
     * @return self
     * @deprecated
     */
    public function setPayorIds($payor_ids)
    {
        if (is_null($payor_ids)) {
            throw new \InvalidArgumentException('non-nullable payor_ids cannot be null');
        }
        $this->container['payor_ids'] = $payor_ids;

        return $this;
    }

    /**
     * Gets payee_name
     *
     * @return string|null
     */
    public function getPayeeName()
    {
        return $this->container['payee_name'];
    }

    /**
     * Sets payee_name
     *
     * @param string|null $payee_name payee_name
     *
     * @return self
     */
    public function setPayeeName($payee_name)
    {
        if (is_null($payee_name)) {
            throw new \InvalidArgumentException('non-nullable payee_name cannot be null');
        }
        $this->container['payee_name'] = $payee_name;

        return $this;
    }

    /**
     * Gets bank_name
     *
     * @return string|null
     */
    public function getBankName()
    {
        return $this->container['bank_name'];
    }

    /**
     * Sets bank_name
     *
     * @param string|null $bank_name bank_name
     *
     * @return self
     */
    public function setBankName($bank_name)
    {
        if (is_null($bank_name)) {
            throw new \InvalidArgumentException('non-nullable bank_name cannot be null');
        }
        $this->container['bank_name'] = $bank_name;

        return $this;
    }

    /**
     * Gets bank_swift_bic
     *
     * @return string|null
     */
    public function getBankSwiftBic()
    {
        return $this->container['bank_swift_bic'];
    }

    /**
     * Sets bank_swift_bic
     *
     * @param string|null $bank_swift_bic bank_swift_bic
     *
     * @return self
     */
    public function setBankSwiftBic($bank_swift_bic)
    {
        if (is_null($bank_swift_bic)) {
            throw new \InvalidArgumentException('non-nullable bank_swift_bic cannot be null');
        }
        $this->container['bank_swift_bic'] = $bank_swift_bic;

        return $this;
    }

    /**
     * Gets bank_address
     *
     * @return \VeloPayments\Client\Model\AddressV4|null
     */
    public function getBankAddress()
    {
        return $this->container['bank_address'];
    }

    /**
     * Sets bank_address
     *
     * @param \VeloPayments\Client\Model\AddressV4|null $bank_address bank_address
     *
     * @return self
     */
    public function setBankAddress($bank_address)
    {
        if (is_null($bank_address)) {
            throw new \InvalidArgumentException('non-nullable bank_address cannot be null');
        }
        $this->container['bank_address'] = $bank_address;

        return $this;
    }

    /**
     * Gets deleted
     *
     * @return bool|null
     */
    public function getDeleted()
    {
        return $this->container['deleted'];
    }

    /**
     * Sets deleted
     *
     * @param bool|null $deleted deleted
     *
     * @return self
     */
    public function setDeleted($deleted)
    {
        if (is_null($deleted)) {
            throw new \InvalidArgumentException('non-nullable deleted cannot be null');
        }
        $this->container['deleted'] = $deleted;

        return $this;
    }

    /**
     * Gets enabled
     *
     * @return bool|null
     */
    public function getEnabled()
    {
        return $this->container['enabled'];
    }

    /**
     * Sets enabled
     *
     * @param bool|null $enabled enabled
     *
     * @return self
     */
    public function setEnabled($enabled)
    {
        if (is_null($enabled)) {
            throw new \InvalidArgumentException('non-nullable enabled cannot be null');
        }
        $this->container['enabled'] = $enabled;

        return $this;
    }

    /**
     * Gets disabled_reason_code
     *
     * @return string|null
     */
    public function getDisabledReasonCode()
    {
        return $this->container['disabled_reason_code'];
    }

    /**
     * Sets disabled_reason_code
     *
     * @param string|null $disabled_reason_code disabled_reason_code
     *
     * @return self
     */
    public function setDisabledReasonCode($disabled_reason_code)
    {
        if (is_null($disabled_reason_code)) {
            throw new \InvalidArgumentException('non-nullable disabled_reason_code cannot be null');
        }
        $this->container['disabled_reason_code'] = $disabled_reason_code;

        return $this;
    }

    /**
     * Gets disabled_reason
     *
     * @return string|null
     */
    public function getDisabledReason()
    {
        return $this->container['disabled_reason'];
    }

    /**
     * Sets disabled_reason
     *
     * @param string|null $disabled_reason disabled_reason
     *
     * @return self
     */
    public function setDisabledReason($disabled_reason)
    {
        if (is_null($disabled_reason)) {
            throw new \InvalidArgumentException('non-nullable disabled_reason cannot be null');
        }
        $this->container['disabled_reason'] = $disabled_reason;

        return $this;
    }

    /**
     * Gets payable
     *
     * @return bool|null
     */
    public function getPayable()
    {
        return $this->container['payable'];
    }

    /**
     * Sets payable
     *
     * @param bool|null $payable Whether this payment channel is payable
     *
     * @return self
     */
    public function setPayable($payable)
    {
        if (is_null($payable)) {
            throw new \InvalidArgumentException('non-nullable payable cannot be null');
        }
        $this->container['payable'] = $payable;

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

