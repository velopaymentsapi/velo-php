<?php
/**
 * UserResponse2
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
 * The version of the OpenAPI document: 2.20.29
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 4.3.0-SNAPSHOT
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
 * UserResponse2 Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class UserResponse2 implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'UserResponse_2';

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
        'roles' => '\VeloPayments\Client\Model\UserResponse2Roles[]',
        'mfa_type' => 'string',
        'mfa_verified' => 'bool',
        'mfa_status' => 'string',
        'locked_out' => 'bool',
        'locked_out_timestamp' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
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
        'roles' => null,
        'mfa_type' => null,
        'mfa_verified' => null,
        'mfa_status' => null,
        'locked_out' => null,
        'locked_out_timestamp' => 'date-time'
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
        'status' => 'status',
        'email' => 'email',
        'sms_number' => 'smsNumber',
        'primary_contact_number' => 'primaryContactNumber',
        'secondary_contact_number' => 'secondaryContactNumber',
        'first_name' => 'firstName',
        'last_name' => 'lastName',
        'entity_id' => 'entityId',
        'roles' => 'roles',
        'mfa_type' => 'mfaType',
        'mfa_verified' => 'mfaVerified',
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
        'roles' => 'setRoles',
        'mfa_type' => 'setMfaType',
        'mfa_verified' => 'setMfaVerified',
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
        'roles' => 'getRoles',
        'mfa_type' => 'getMfaType',
        'mfa_verified' => 'getMfaVerified',
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

    const STATUS_ENABLED = 'ENABLED';
    const STATUS_DISABLED = 'DISABLED';
    const STATUS_PENDING = 'PENDING';
    const MFA_TYPE_SMS = 'SMS';
    const MFA_TYPE_YUBIKEY = 'YUBIKEY';
    const MFA_TYPE_TOTP = 'TOTP';
    const MFA_STATUS_REGISTERED = 'REGISTERED';
    const MFA_STATUS_UNREGISTERED = 'UNREGISTERED';
    

    
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
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['email'] = isset($data['email']) ? $data['email'] : null;
        $this->container['sms_number'] = isset($data['sms_number']) ? $data['sms_number'] : null;
        $this->container['primary_contact_number'] = isset($data['primary_contact_number']) ? $data['primary_contact_number'] : null;
        $this->container['secondary_contact_number'] = isset($data['secondary_contact_number']) ? $data['secondary_contact_number'] : null;
        $this->container['first_name'] = isset($data['first_name']) ? $data['first_name'] : null;
        $this->container['last_name'] = isset($data['last_name']) ? $data['last_name'] : null;
        $this->container['entity_id'] = isset($data['entity_id']) ? $data['entity_id'] : null;
        $this->container['roles'] = isset($data['roles']) ? $data['roles'] : null;
        $this->container['mfa_type'] = isset($data['mfa_type']) ? $data['mfa_type'] : null;
        $this->container['mfa_verified'] = isset($data['mfa_verified']) ? $data['mfa_verified'] : null;
        $this->container['mfa_status'] = isset($data['mfa_status']) ? $data['mfa_status'] : null;
        $this->container['locked_out'] = isset($data['locked_out']) ? $data['locked_out'] : null;
        $this->container['locked_out_timestamp'] = isset($data['locked_out_timestamp']) ? $data['locked_out_timestamp'] : null;
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
                "invalid value for 'status', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['sms_number']) && !preg_match("/^\\+?[1-9]\\d{1,14}$/", $this->container['sms_number'])) {
            $invalidProperties[] = "invalid value for 'sms_number', must be conform to the pattern /^\\+?[1-9]\\d{1,14}$/.";
        }

        if (!is_null($this->container['primary_contact_number']) && !preg_match("/^\\+?[1-9]\\d{1,14}$/", $this->container['primary_contact_number'])) {
            $invalidProperties[] = "invalid value for 'primary_contact_number', must be conform to the pattern /^\\+?[1-9]\\d{1,14}$/.";
        }

        if (!is_null($this->container['secondary_contact_number']) && !preg_match("/^\\+?[1-9]\\d{1,14}$/", $this->container['secondary_contact_number'])) {
            $invalidProperties[] = "invalid value for 'secondary_contact_number', must be conform to the pattern /^\\+?[1-9]\\d{1,14}$/.";
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

        $allowedValues = $this->getMfaTypeAllowableValues();
        if (!is_null($this->container['mfa_type']) && !in_array($this->container['mfa_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'mfa_type', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getMfaStatusAllowableValues();
        if (!is_null($this->container['mfa_status']) && !in_array($this->container['mfa_status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'mfa_status', must be one of '%s'",
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
     * @return $this
     */
    public function setId($id)
    {
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
     * @return $this
     */
    public function setStatus($status)
    {
        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($status) && !in_array($status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'status', must be one of '%s'",
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
     * @return $this
     */
    public function setEmail($email)
    {
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
     * @return $this
     */
    public function setSmsNumber($sms_number)
    {

        if (!is_null($sms_number) && (!preg_match("/^\\+?[1-9]\\d{1,14}$/", $sms_number))) {
            throw new \InvalidArgumentException("invalid value for $sms_number when calling UserResponse2., must conform to the pattern /^\\+?[1-9]\\d{1,14}$/.");
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
     * @return $this
     */
    public function setPrimaryContactNumber($primary_contact_number)
    {

        if (!is_null($primary_contact_number) && (!preg_match("/^\\+?[1-9]\\d{1,14}$/", $primary_contact_number))) {
            throw new \InvalidArgumentException("invalid value for $primary_contact_number when calling UserResponse2., must conform to the pattern /^\\+?[1-9]\\d{1,14}$/.");
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
     * @return $this
     */
    public function setSecondaryContactNumber($secondary_contact_number)
    {

        if (!is_null($secondary_contact_number) && (!preg_match("/^\\+?[1-9]\\d{1,14}$/", $secondary_contact_number))) {
            throw new \InvalidArgumentException("invalid value for $secondary_contact_number when calling UserResponse2., must conform to the pattern /^\\+?[1-9]\\d{1,14}$/.");
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
     * @return $this
     */
    public function setFirstName($first_name)
    {
        if (!is_null($first_name) && (mb_strlen($first_name) > 128)) {
            throw new \InvalidArgumentException('invalid length for $first_name when calling UserResponse2., must be smaller than or equal to 128.');
        }
        if (!is_null($first_name) && (mb_strlen($first_name) < 1)) {
            throw new \InvalidArgumentException('invalid length for $first_name when calling UserResponse2., must be bigger than or equal to 1.');
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
     * @return $this
     */
    public function setLastName($last_name)
    {
        if (!is_null($last_name) && (mb_strlen($last_name) > 128)) {
            throw new \InvalidArgumentException('invalid length for $last_name when calling UserResponse2., must be smaller than or equal to 128.');
        }
        if (!is_null($last_name) && (mb_strlen($last_name) < 1)) {
            throw new \InvalidArgumentException('invalid length for $last_name when calling UserResponse2., must be bigger than or equal to 1.');
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
     * @return $this
     */
    public function setEntityId($entity_id)
    {
        $this->container['entity_id'] = $entity_id;

        return $this;
    }

    /**
     * Gets roles
     *
     * @return \VeloPayments\Client\Model\UserResponse2Roles[]|null
     */
    public function getRoles()
    {
        return $this->container['roles'];
    }

    /**
     * Sets roles
     *
     * @param \VeloPayments\Client\Model\UserResponse2Roles[]|null $roles The role(s) for the user
     *
     * @return $this
     */
    public function setRoles($roles)
    {
        $this->container['roles'] = $roles;

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
     * @return $this
     */
    public function setMfaType($mfa_type)
    {
        $allowedValues = $this->getMfaTypeAllowableValues();
        if (!is_null($mfa_type) && !in_array($mfa_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'mfa_type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['mfa_type'] = $mfa_type;

        return $this;
    }

    /**
     * Gets mfa_verified
     *
     * @return bool|null
     */
    public function getMfaVerified()
    {
        return $this->container['mfa_verified'];
    }

    /**
     * Sets mfa_verified
     *
     * @param bool|null $mfa_verified Will be true if the user has logged in successfully using the MFA Device
     *
     * @return $this
     */
    public function setMfaVerified($mfa_verified)
    {
        $this->container['mfa_verified'] = $mfa_verified;

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
     * @return $this
     */
    public function setMfaStatus($mfa_status)
    {
        $allowedValues = $this->getMfaStatusAllowableValues();
        if (!is_null($mfa_status) && !in_array($mfa_status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'mfa_status', must be one of '%s'",
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
     * @return $this
     */
    public function setLockedOut($locked_out)
    {
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
     * @return $this
     */
    public function setLockedOutTimestamp($locked_out_timestamp)
    {
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


