<?php
/**
 * UserResponse
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
 * UserResponse Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class UserResponse implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'UserResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'status' => 'string',
        'email' => 'string',
        'sms_number' => 'string',
        'primary_contact_number' => 'string',
        'secondary_contact_number' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'entity_id' => 'string',
        'company_name' => 'string',
        'roles' => '\VeloPayments\Client\Model\Role[]',
        'user_type' => 'string',
        'mfa_type' => 'string',
        'mfa_status' => 'string',
        'locked_out' => 'bool',
        'locked_out_timestamp' => '\DateTime'
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
        'status' => null,
        'email' => 'email',
        'sms_number' => null,
        'primary_contact_number' => null,
        'secondary_contact_number' => null,
        'first_name' => null,
        'last_name' => null,
        'entity_id' => 'uuid',
        'company_name' => null,
        'roles' => null,
        'user_type' => null,
        'mfa_type' => null,
        'mfa_status' => null,
        'locked_out' => null,
        'locked_out_timestamp' => 'date-time'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
		'status' => false,
		'email' => false,
		'sms_number' => false,
		'primary_contact_number' => false,
		'secondary_contact_number' => false,
		'first_name' => false,
		'last_name' => false,
		'entity_id' => false,
		'company_name' => false,
		'roles' => false,
		'user_type' => false,
		'mfa_type' => false,
		'mfa_status' => false,
		'locked_out' => false,
		'locked_out_timestamp' => true
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
        'status' => 'status',
        'email' => 'email',
        'sms_number' => 'smsNumber',
        'primary_contact_number' => 'primaryContactNumber',
        'secondary_contact_number' => 'secondaryContactNumber',
        'first_name' => 'firstName',
        'last_name' => 'lastName',
        'entity_id' => 'entityId',
        'company_name' => 'companyName',
        'roles' => 'roles',
        'user_type' => 'userType',
        'mfa_type' => 'mfaType',
        'mfa_status' => 'mfaStatus',
        'locked_out' => 'lockedOut',
        'locked_out_timestamp' => 'lockedOutTimestamp'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'status' => 'setStatus',
        'email' => 'setEmail',
        'sms_number' => 'setSmsNumber',
        'primary_contact_number' => 'setPrimaryContactNumber',
        'secondary_contact_number' => 'setSecondaryContactNumber',
        'first_name' => 'setFirstName',
        'last_name' => 'setLastName',
        'entity_id' => 'setEntityId',
        'company_name' => 'setCompanyName',
        'roles' => 'setRoles',
        'user_type' => 'setUserType',
        'mfa_type' => 'setMfaType',
        'mfa_status' => 'setMfaStatus',
        'locked_out' => 'setLockedOut',
        'locked_out_timestamp' => 'setLockedOutTimestamp'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'status' => 'getStatus',
        'email' => 'getEmail',
        'sms_number' => 'getSmsNumber',
        'primary_contact_number' => 'getPrimaryContactNumber',
        'secondary_contact_number' => 'getSecondaryContactNumber',
        'first_name' => 'getFirstName',
        'last_name' => 'getLastName',
        'entity_id' => 'getEntityId',
        'company_name' => 'getCompanyName',
        'roles' => 'getRoles',
        'user_type' => 'getUserType',
        'mfa_type' => 'getMfaType',
        'mfa_status' => 'getMfaStatus',
        'locked_out' => 'getLockedOut',
        'locked_out_timestamp' => 'getLockedOutTimestamp'
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

    public const STATUS_ENABLED = 'ENABLED';
    public const STATUS_DISABLED = 'DISABLED';
    public const STATUS_PENDING = 'PENDING';
    public const USER_TYPE_BACKOFFICE = 'BACKOFFICE';
    public const USER_TYPE_PAYOR = 'PAYOR';
    public const USER_TYPE_PAYEE = 'PAYEE';
    public const MFA_TYPE_SMS = 'SMS';
    public const MFA_TYPE_YUBIKEY = 'YUBIKEY';
    public const MFA_TYPE_TOTP = 'TOTP';
    public const MFA_STATUS_REGISTERED = 'REGISTERED';
    public const MFA_STATUS_UNREGISTERED = 'UNREGISTERED';
    public const MFA_STATUS_VERIFIED = 'VERIFIED';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_ENABLED,
            self::STATUS_DISABLED,
            self::STATUS_PENDING,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getUserTypeAllowableValues()
    {
        return [
            self::USER_TYPE_BACKOFFICE,
            self::USER_TYPE_PAYOR,
            self::USER_TYPE_PAYEE,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getMfaTypeAllowableValues()
    {
        return [
            self::MFA_TYPE_SMS,
            self::MFA_TYPE_YUBIKEY,
            self::MFA_TYPE_TOTP,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getMfaStatusAllowableValues()
    {
        return [
            self::MFA_STATUS_REGISTERED,
            self::MFA_STATUS_UNREGISTERED,
            self::MFA_STATUS_VERIFIED,
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
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('email', $data ?? [], null);
        $this->setIfExists('sms_number', $data ?? [], null);
        $this->setIfExists('primary_contact_number', $data ?? [], null);
        $this->setIfExists('secondary_contact_number', $data ?? [], null);
        $this->setIfExists('first_name', $data ?? [], null);
        $this->setIfExists('last_name', $data ?? [], null);
        $this->setIfExists('entity_id', $data ?? [], null);
        $this->setIfExists('company_name', $data ?? [], null);
        $this->setIfExists('roles', $data ?? [], null);
        $this->setIfExists('user_type', $data ?? [], null);
        $this->setIfExists('mfa_type', $data ?? [], null);
        $this->setIfExists('mfa_status', $data ?? [], null);
        $this->setIfExists('locked_out', $data ?? [], null);
        $this->setIfExists('locked_out_timestamp', $data ?? [], null);
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

        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($this->container['status']) && !in_array($this->container['status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'status', must be one of '%s'",
                $this->container['status'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['sms_number']) && !preg_match("/^\\+[1-9]\\d{1,14}$/", $this->container['sms_number'])) {
            $invalidProperties[] = "invalid value for 'sms_number', must be conform to the pattern /^\\+[1-9]\\d{1,14}$/.";
        }

        if (!is_null($this->container['primary_contact_number']) && !preg_match("/^\\+[1-9]\\d{1,14}$/", $this->container['primary_contact_number'])) {
            $invalidProperties[] = "invalid value for 'primary_contact_number', must be conform to the pattern /^\\+[1-9]\\d{1,14}$/.";
        }

        if (!is_null($this->container['secondary_contact_number']) && !preg_match("/^\\+[1-9]\\d{1,14}$/", $this->container['secondary_contact_number'])) {
            $invalidProperties[] = "invalid value for 'secondary_contact_number', must be conform to the pattern /^\\+[1-9]\\d{1,14}$/.";
        }

        if (!is_null($this->container['first_name']) && (mb_strlen($this->container['first_name']) > 128)) {
            $invalidProperties[] = "invalid value for 'first_name', the character length must be smaller than or equal to 128.";
        }

        if (!is_null($this->container['first_name']) && (mb_strlen($this->container['first_name']) < 1)) {
            $invalidProperties[] = "invalid value for 'first_name', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['last_name']) && (mb_strlen($this->container['last_name']) > 128)) {
            $invalidProperties[] = "invalid value for 'last_name', the character length must be smaller than or equal to 128.";
        }

        if (!is_null($this->container['last_name']) && (mb_strlen($this->container['last_name']) < 1)) {
            $invalidProperties[] = "invalid value for 'last_name', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['company_name']) && (mb_strlen($this->container['company_name']) > 128)) {
            $invalidProperties[] = "invalid value for 'company_name', the character length must be smaller than or equal to 128.";
        }

        if (!is_null($this->container['company_name']) && (mb_strlen($this->container['company_name']) < 1)) {
            $invalidProperties[] = "invalid value for 'company_name', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['roles']) && (count($this->container['roles']) < 1)) {
            $invalidProperties[] = "invalid value for 'roles', number of items must be greater than or equal to 1.";
        }

        $allowedValues = $this->getUserTypeAllowableValues();
        if (!is_null($this->container['user_type']) && !in_array($this->container['user_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'user_type', must be one of '%s'",
                $this->container['user_type'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getMfaTypeAllowableValues();
        if (!is_null($this->container['mfa_type']) && !in_array($this->container['mfa_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'mfa_type', must be one of '%s'",
                $this->container['mfa_type'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getMfaStatusAllowableValues();
        if (!is_null($this->container['mfa_status']) && !in_array($this->container['mfa_status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'mfa_status', must be one of '%s'",
                $this->container['mfa_status'],
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
     * @param string|null $id The id of the user
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
     * Gets status
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string|null $status The status of the user when the user has been invited but not yet enrolled they will have a PENDING status
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new \InvalidArgumentException('non-nullable status cannot be null');
        }
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
     * Gets email
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string|null $email the email address of the user
     *
     * @return self
     */
    public function setEmail($email)
    {
        if (is_null($email)) {
            throw new \InvalidArgumentException('non-nullable email cannot be null');
        }
        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets sms_number
     *
     * @return string|null
     */
    public function getSmsNumber()
    {
        return $this->container['sms_number'];
    }

    /**
     * Sets sms_number
     *
     * @param string|null $sms_number The phone number of a device that the user can receive sms messages on
     *
     * @return self
     */
    public function setSmsNumber($sms_number)
    {
        if (is_null($sms_number)) {
            throw new \InvalidArgumentException('non-nullable sms_number cannot be null');
        }

        if ((!preg_match("/^\\+[1-9]\\d{1,14}$/", ObjectSerializer::toString($sms_number)))) {
            throw new \InvalidArgumentException("invalid value for \$sms_number when calling UserResponse., must conform to the pattern /^\\+[1-9]\\d{1,14}$/.");
        }

        $this->container['sms_number'] = $sms_number;

        return $this;
    }

    /**
     * Gets primary_contact_number
     *
     * @return string|null
     */
    public function getPrimaryContactNumber()
    {
        return $this->container['primary_contact_number'];
    }

    /**
     * Sets primary_contact_number
     *
     * @param string|null $primary_contact_number The main contact number for the user
     *
     * @return self
     */
    public function setPrimaryContactNumber($primary_contact_number)
    {
        if (is_null($primary_contact_number)) {
            throw new \InvalidArgumentException('non-nullable primary_contact_number cannot be null');
        }

        if ((!preg_match("/^\\+[1-9]\\d{1,14}$/", ObjectSerializer::toString($primary_contact_number)))) {
            throw new \InvalidArgumentException("invalid value for \$primary_contact_number when calling UserResponse., must conform to the pattern /^\\+[1-9]\\d{1,14}$/.");
        }

        $this->container['primary_contact_number'] = $primary_contact_number;

        return $this;
    }

    /**
     * Gets secondary_contact_number
     *
     * @return string|null
     */
    public function getSecondaryContactNumber()
    {
        return $this->container['secondary_contact_number'];
    }

    /**
     * Sets secondary_contact_number
     *
     * @param string|null $secondary_contact_number The secondary contact number for the user
     *
     * @return self
     */
    public function setSecondaryContactNumber($secondary_contact_number)
    {
        if (is_null($secondary_contact_number)) {
            throw new \InvalidArgumentException('non-nullable secondary_contact_number cannot be null');
        }

        if ((!preg_match("/^\\+[1-9]\\d{1,14}$/", ObjectSerializer::toString($secondary_contact_number)))) {
            throw new \InvalidArgumentException("invalid value for \$secondary_contact_number when calling UserResponse., must conform to the pattern /^\\+[1-9]\\d{1,14}$/.");
        }

        $this->container['secondary_contact_number'] = $secondary_contact_number;

        return $this;
    }

    /**
     * Gets first_name
     *
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->container['first_name'];
    }

    /**
     * Sets first_name
     *
     * @param string|null $first_name first_name
     *
     * @return self
     */
    public function setFirstName($first_name)
    {
        if (is_null($first_name)) {
            throw new \InvalidArgumentException('non-nullable first_name cannot be null');
        }
        if ((mb_strlen($first_name) > 128)) {
            throw new \InvalidArgumentException('invalid length for $first_name when calling UserResponse., must be smaller than or equal to 128.');
        }
        if ((mb_strlen($first_name) < 1)) {
            throw new \InvalidArgumentException('invalid length for $first_name when calling UserResponse., must be bigger than or equal to 1.');
        }

        $this->container['first_name'] = $first_name;

        return $this;
    }

    /**
     * Gets last_name
     *
     * @return string|null
     */
    public function getLastName()
    {
        return $this->container['last_name'];
    }

    /**
     * Sets last_name
     *
     * @param string|null $last_name last_name
     *
     * @return self
     */
    public function setLastName($last_name)
    {
        if (is_null($last_name)) {
            throw new \InvalidArgumentException('non-nullable last_name cannot be null');
        }
        if ((mb_strlen($last_name) > 128)) {
            throw new \InvalidArgumentException('invalid length for $last_name when calling UserResponse., must be smaller than or equal to 128.');
        }
        if ((mb_strlen($last_name) < 1)) {
            throw new \InvalidArgumentException('invalid length for $last_name when calling UserResponse., must be bigger than or equal to 1.');
        }

        $this->container['last_name'] = $last_name;

        return $this;
    }

    /**
     * Gets entity_id
     *
     * @return string|null
     */
    public function getEntityId()
    {
        return $this->container['entity_id'];
    }

    /**
     * Sets entity_id
     *
     * @param string|null $entity_id The payorId or payeeId or null if the user is not a payor or payee user
     *
     * @return self
     */
    public function setEntityId($entity_id)
    {
        if (is_null($entity_id)) {
            throw new \InvalidArgumentException('non-nullable entity_id cannot be null');
        }
        $this->container['entity_id'] = $entity_id;

        return $this;
    }

    /**
     * Gets company_name
     *
     * @return string|null
     */
    public function getCompanyName()
    {
        return $this->container['company_name'];
    }

    /**
     * Sets company_name
     *
     * @param string|null $company_name The payor or payee company name or null if the user is not a payor or payee user
     *
     * @return self
     */
    public function setCompanyName($company_name)
    {
        if (is_null($company_name)) {
            throw new \InvalidArgumentException('non-nullable company_name cannot be null');
        }
        if ((mb_strlen($company_name) > 128)) {
            throw new \InvalidArgumentException('invalid length for $company_name when calling UserResponse., must be smaller than or equal to 128.');
        }
        if ((mb_strlen($company_name) < 1)) {
            throw new \InvalidArgumentException('invalid length for $company_name when calling UserResponse., must be bigger than or equal to 1.');
        }

        $this->container['company_name'] = $company_name;

        return $this;
    }

    /**
     * Gets roles
     *
     * @return \VeloPayments\Client\Model\Role[]|null
     */
    public function getRoles()
    {
        return $this->container['roles'];
    }

    /**
     * Sets roles
     *
     * @param \VeloPayments\Client\Model\Role[]|null $roles The role(s) for the user
     *
     * @return self
     */
    public function setRoles($roles)
    {
        if (is_null($roles)) {
            throw new \InvalidArgumentException('non-nullable roles cannot be null');
        }


        if ((count($roles) < 1)) {
            throw new \InvalidArgumentException('invalid length for $roles when calling UserResponse., number of items must be greater than or equal to 1.');
        }
        $this->container['roles'] = $roles;

        return $this;
    }

    /**
     * Gets user_type
     *
     * @return string|null
     */
    public function getUserType()
    {
        return $this->container['user_type'];
    }

    /**
     * Sets user_type
     *
     * @param string|null $user_type Indicates the type of user. Could be BACKOFFICE, PAYOR or PAYEE.
     *
     * @return self
     */
    public function setUserType($user_type)
    {
        if (is_null($user_type)) {
            throw new \InvalidArgumentException('non-nullable user_type cannot be null');
        }
        $allowedValues = $this->getUserTypeAllowableValues();
        if (!in_array($user_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'user_type', must be one of '%s'",
                    $user_type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['user_type'] = $user_type;

        return $this;
    }

    /**
     * Gets mfa_type
     *
     * @return string|null
     */
    public function getMfaType()
    {
        return $this->container['mfa_type'];
    }

    /**
     * Sets mfa_type
     *
     * @param string|null $mfa_type The type of the MFA device
     *
     * @return self
     */
    public function setMfaType($mfa_type)
    {
        if (is_null($mfa_type)) {
            throw new \InvalidArgumentException('non-nullable mfa_type cannot be null');
        }
        $allowedValues = $this->getMfaTypeAllowableValues();
        if (!in_array($mfa_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'mfa_type', must be one of '%s'",
                    $mfa_type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['mfa_type'] = $mfa_type;

        return $this;
    }

    /**
     * Gets mfa_status
     *
     * @return string|null
     */
    public function getMfaStatus()
    {
        return $this->container['mfa_status'];
    }

    /**
     * Sets mfa_status
     *
     * @param string|null $mfa_status The status of the MFA device
     *
     * @return self
     */
    public function setMfaStatus($mfa_status)
    {
        if (is_null($mfa_status)) {
            throw new \InvalidArgumentException('non-nullable mfa_status cannot be null');
        }
        $allowedValues = $this->getMfaStatusAllowableValues();
        if (!in_array($mfa_status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'mfa_status', must be one of '%s'",
                    $mfa_status,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['mfa_status'] = $mfa_status;

        return $this;
    }

    /**
     * Gets locked_out
     *
     * @return bool|null
     */
    public function getLockedOut()
    {
        return $this->container['locked_out'];
    }

    /**
     * Sets locked_out
     *
     * @param bool|null $locked_out If true the user is currently locked out and unable to log in
     *
     * @return self
     */
    public function setLockedOut($locked_out)
    {
        if (is_null($locked_out)) {
            throw new \InvalidArgumentException('non-nullable locked_out cannot be null');
        }
        $this->container['locked_out'] = $locked_out;

        return $this;
    }

    /**
     * Gets locked_out_timestamp
     *
     * @return \DateTime|null
     */
    public function getLockedOutTimestamp()
    {
        return $this->container['locked_out_timestamp'];
    }

    /**
     * Sets locked_out_timestamp
     *
     * @param \DateTime|null $locked_out_timestamp A timestamp showing when the user was locked out If null then the user is not currently locked out
     *
     * @return self
     */
    public function setLockedOutTimestamp($locked_out_timestamp)
    {
        if (is_null($locked_out_timestamp)) {
            array_push($this->openAPINullablesSetToNull, 'locked_out_timestamp');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('locked_out_timestamp', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['locked_out_timestamp'] = $locked_out_timestamp;

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


