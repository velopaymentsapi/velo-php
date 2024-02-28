<?php
/**
 * InviteUserRequest
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
 * InviteUserRequest Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class InviteUserRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'InviteUserRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'email' => 'string',
        'mfa_type' => 'string',
        'sms_number' => 'string',
        'primary_contact_number' => 'string',
        'secondary_contact_number' => 'string',
        'roles' => 'string[]',
        'first_name' => 'string',
        'last_name' => 'string',
        'entity_id' => 'string',
        'user_type' => 'string',
        'verification_code' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'email' => 'email',
        'mfa_type' => null,
        'sms_number' => null,
        'primary_contact_number' => null,
        'secondary_contact_number' => null,
        'roles' => null,
        'first_name' => null,
        'last_name' => null,
        'entity_id' => 'uuid',
        'user_type' => null,
        'verification_code' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'email' => false,
        'mfa_type' => false,
        'sms_number' => false,
        'primary_contact_number' => false,
        'secondary_contact_number' => true,
        'roles' => false,
        'first_name' => false,
        'last_name' => false,
        'entity_id' => true,
        'user_type' => false,
        'verification_code' => true
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
        'email' => 'email',
        'mfa_type' => 'mfaType',
        'sms_number' => 'smsNumber',
        'primary_contact_number' => 'primaryContactNumber',
        'secondary_contact_number' => 'secondaryContactNumber',
        'roles' => 'roles',
        'first_name' => 'firstName',
        'last_name' => 'lastName',
        'entity_id' => 'entityId',
        'user_type' => 'userType',
        'verification_code' => 'verificationCode'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'email' => 'setEmail',
        'mfa_type' => 'setMfaType',
        'sms_number' => 'setSmsNumber',
        'primary_contact_number' => 'setPrimaryContactNumber',
        'secondary_contact_number' => 'setSecondaryContactNumber',
        'roles' => 'setRoles',
        'first_name' => 'setFirstName',
        'last_name' => 'setLastName',
        'entity_id' => 'setEntityId',
        'user_type' => 'setUserType',
        'verification_code' => 'setVerificationCode'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'email' => 'getEmail',
        'mfa_type' => 'getMfaType',
        'sms_number' => 'getSmsNumber',
        'primary_contact_number' => 'getPrimaryContactNumber',
        'secondary_contact_number' => 'getSecondaryContactNumber',
        'roles' => 'getRoles',
        'first_name' => 'getFirstName',
        'last_name' => 'getLastName',
        'entity_id' => 'getEntityId',
        'user_type' => 'getUserType',
        'verification_code' => 'getVerificationCode'
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

    public const MFA_TYPE_SMS = 'SMS';
    public const MFA_TYPE_YUBIKEY = 'YUBIKEY';
    public const MFA_TYPE_TOTP = 'TOTP';
    public const USER_TYPE_BACKOFFICE = 'BACKOFFICE';
    public const USER_TYPE_PAYOR = 'PAYOR';
    public const USER_TYPE_PAYEE = 'PAYEE';

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
    public function getUserTypeAllowableValues()
    {
        return [
            self::USER_TYPE_BACKOFFICE,
            self::USER_TYPE_PAYOR,
            self::USER_TYPE_PAYEE,
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
        $this->setIfExists('email', $data ?? [], null);
        $this->setIfExists('mfa_type', $data ?? [], null);
        $this->setIfExists('sms_number', $data ?? [], null);
        $this->setIfExists('primary_contact_number', $data ?? [], null);
        $this->setIfExists('secondary_contact_number', $data ?? [], null);
        $this->setIfExists('roles', $data ?? [], null);
        $this->setIfExists('first_name', $data ?? [], null);
        $this->setIfExists('last_name', $data ?? [], null);
        $this->setIfExists('entity_id', $data ?? [], null);
        $this->setIfExists('user_type', $data ?? [], null);
        $this->setIfExists('verification_code', $data ?? [], null);
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

        if ($this->container['email'] === null) {
            $invalidProperties[] = "'email' can't be null";
        }
        if ($this->container['mfa_type'] === null) {
            $invalidProperties[] = "'mfa_type' can't be null";
        }
        $allowedValues = $this->getMfaTypeAllowableValues();
        if (!is_null($this->container['mfa_type']) && !in_array($this->container['mfa_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'mfa_type', must be one of '%s'",
                $this->container['mfa_type'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['sms_number'] === null) {
            $invalidProperties[] = "'sms_number' can't be null";
        }
        if (!preg_match("/^\\+[1-9]\\d{1,14}$/", $this->container['sms_number'])) {
            $invalidProperties[] = "invalid value for 'sms_number', must be conform to the pattern /^\\+[1-9]\\d{1,14}$/.";
        }

        if ($this->container['primary_contact_number'] === null) {
            $invalidProperties[] = "'primary_contact_number' can't be null";
        }
        if (!preg_match("/^\\+[1-9]\\d{1,14}$/", $this->container['primary_contact_number'])) {
            $invalidProperties[] = "invalid value for 'primary_contact_number', must be conform to the pattern /^\\+[1-9]\\d{1,14}$/.";
        }

        if (!is_null($this->container['secondary_contact_number']) && !preg_match("/^\\+[1-9]\\d{1,14}$/", $this->container['secondary_contact_number'])) {
            $invalidProperties[] = "invalid value for 'secondary_contact_number', must be conform to the pattern /^\\+[1-9]\\d{1,14}$/.";
        }

        if ($this->container['roles'] === null) {
            $invalidProperties[] = "'roles' can't be null";
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

        $allowedValues = $this->getUserTypeAllowableValues();
        if (!is_null($this->container['user_type']) && !in_array($this->container['user_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'user_type', must be one of '%s'",
                $this->container['user_type'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['verification_code']) && (mb_strlen($this->container['verification_code']) > 6)) {
            $invalidProperties[] = "invalid value for 'verification_code', the character length must be smaller than or equal to 6.";
        }

        if (!is_null($this->container['verification_code']) && (mb_strlen($this->container['verification_code']) < 6)) {
            $invalidProperties[] = "invalid value for 'verification_code', the character length must be bigger than or equal to 6.";
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
     * Gets email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string $email the email address of the invited user
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
     * Gets mfa_type
     *
     * @return string
     */
    public function getMfaType()
    {
        return $this->container['mfa_type'];
    }

    /**
     * Sets mfa_type
     *
     * @param string $mfa_type <p>The MFA type that the user will use</p> <p>The type may be conditional on the role(s) the user has</p>
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
     * Gets sms_number
     *
     * @return string
     */
    public function getSmsNumber()
    {
        return $this->container['sms_number'];
    }

    /**
     * Sets sms_number
     *
     * @param string $sms_number The phone number of a device that the user can receive sms messages on
     *
     * @return self
     */
    public function setSmsNumber($sms_number)
    {
        if (is_null($sms_number)) {
            throw new \InvalidArgumentException('non-nullable sms_number cannot be null');
        }

        if ((!preg_match("/^\\+[1-9]\\d{1,14}$/", ObjectSerializer::toString($sms_number)))) {
            throw new \InvalidArgumentException("invalid value for \$sms_number when calling InviteUserRequest., must conform to the pattern /^\\+[1-9]\\d{1,14}$/.");
        }

        $this->container['sms_number'] = $sms_number;

        return $this;
    }

    /**
     * Gets primary_contact_number
     *
     * @return string
     */
    public function getPrimaryContactNumber()
    {
        return $this->container['primary_contact_number'];
    }

    /**
     * Sets primary_contact_number
     *
     * @param string $primary_contact_number The main contact number for the user
     *
     * @return self
     */
    public function setPrimaryContactNumber($primary_contact_number)
    {
        if (is_null($primary_contact_number)) {
            throw new \InvalidArgumentException('non-nullable primary_contact_number cannot be null');
        }

        if ((!preg_match("/^\\+[1-9]\\d{1,14}$/", ObjectSerializer::toString($primary_contact_number)))) {
            throw new \InvalidArgumentException("invalid value for \$primary_contact_number when calling InviteUserRequest., must conform to the pattern /^\\+[1-9]\\d{1,14}$/.");
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
            array_push($this->openAPINullablesSetToNull, 'secondary_contact_number');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('secondary_contact_number', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        if (!is_null($secondary_contact_number) && (!preg_match("/^\\+[1-9]\\d{1,14}$/", ObjectSerializer::toString($secondary_contact_number)))) {
            throw new \InvalidArgumentException("invalid value for \$secondary_contact_number when calling InviteUserRequest., must conform to the pattern /^\\+[1-9]\\d{1,14}$/.");
        }

        $this->container['secondary_contact_number'] = $secondary_contact_number;

        return $this;
    }

    /**
     * Gets roles
     *
     * @return string[]
     */
    public function getRoles()
    {
        return $this->container['roles'];
    }

    /**
     * Sets roles
     *
     * @param string[] $roles The role(s) for the user The role must exist The role can be a custom role or a system role but the invoker must have the permissions to assign the role System roles are: velo.backoffice.admin, velo.payor.master_admin, velo.payor.admin, velo.payor.support, velo.payee.admin, velo.payee.support
     *
     * @return self
     */
    public function setRoles($roles)
    {
        if (is_null($roles)) {
            throw new \InvalidArgumentException('non-nullable roles cannot be null');
        }
        $this->container['roles'] = $roles;

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
            throw new \InvalidArgumentException('invalid length for $first_name when calling InviteUserRequest., must be smaller than or equal to 128.');
        }
        if ((mb_strlen($first_name) < 1)) {
            throw new \InvalidArgumentException('invalid length for $first_name when calling InviteUserRequest., must be bigger than or equal to 1.');
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
            throw new \InvalidArgumentException('invalid length for $last_name when calling InviteUserRequest., must be smaller than or equal to 128.');
        }
        if ((mb_strlen($last_name) < 1)) {
            throw new \InvalidArgumentException('invalid length for $last_name when calling InviteUserRequest., must be bigger than or equal to 1.');
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
     * @param string|null $entity_id The payorId or payeeId or null if the user is a backoffice admin
     *
     * @return self
     */
    public function setEntityId($entity_id)
    {
        if (is_null($entity_id)) {
            array_push($this->openAPINullablesSetToNull, 'entity_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('entity_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['entity_id'] = $entity_id;

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
     * @param string|null $user_type Will default to PAYOR if not provided but entityId is provided
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
     * Gets verification_code
     *
     * @return string|null
     */
    public function getVerificationCode()
    {
        return $this->container['verification_code'];
    }

    /**
     * Sets verification_code
     *
     * @param string|null $verification_code Optional property that MUST be suppied when manually verifying a user The user's smsNumber is registered via a separate endpoint and an OTP sent to them
     *
     * @return self
     */
    public function setVerificationCode($verification_code)
    {
        if (is_null($verification_code)) {
            array_push($this->openAPINullablesSetToNull, 'verification_code');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('verification_code', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        if (!is_null($verification_code) && (mb_strlen($verification_code) > 6)) {
            throw new \InvalidArgumentException('invalid length for $verification_code when calling InviteUserRequest., must be smaller than or equal to 6.');
        }
        if (!is_null($verification_code) && (mb_strlen($verification_code) < 6)) {
            throw new \InvalidArgumentException('invalid length for $verification_code when calling InviteUserRequest., must be bigger than or equal to 6.');
        }

        $this->container['verification_code'] = $verification_code;

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


