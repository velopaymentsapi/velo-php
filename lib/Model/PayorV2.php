<?php
/**
 * PayorV2
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
 * PayorV2 Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PayorV2 implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PayorV2';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'payor_id' => 'string',
        'payor_name' => 'string',
        'payor_xid' => 'string',
        'provider' => 'string',
        'address' => '\VeloPayments\Client\Model\PayorAddressV2',
        'primary_contact_name' => 'string',
        'primary_contact_phone' => 'string',
        'primary_contact_email' => 'string',
        'kyc_state' => 'string',
        'manual_lockout' => 'bool',
        'open_banking_enabled' => 'bool',
        'payee_grace_period_processing_enabled' => 'bool',
        'payee_grace_period_days' => 'int',
        'collective_alias' => 'string',
        'support_contact' => 'string',
        'dba_name' => 'string',
        'allows_language_choice' => 'bool',
        'reminder_emails_opt_out' => 'bool',
        'language' => 'string',
        'includes_reports' => 'bool',
        'wu_customer_id' => 'string',
        'max_master_payor_admins' => 'int',
        'payment_rails' => 'string',
        'remote_system_ids' => 'string[]',
        'usd_txn_value_reporting_threshold' => 'int',
        'managing_payees' => 'bool',
        'created_at' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'payor_id' => 'uuid',
        'payor_name' => null,
        'payor_xid' => null,
        'provider' => null,
        'address' => null,
        'primary_contact_name' => null,
        'primary_contact_phone' => null,
        'primary_contact_email' => 'email',
        'kyc_state' => null,
        'manual_lockout' => null,
        'open_banking_enabled' => null,
        'payee_grace_period_processing_enabled' => null,
        'payee_grace_period_days' => null,
        'collective_alias' => null,
        'support_contact' => null,
        'dba_name' => null,
        'allows_language_choice' => null,
        'reminder_emails_opt_out' => null,
        'language' => null,
        'includes_reports' => null,
        'wu_customer_id' => null,
        'max_master_payor_admins' => null,
        'payment_rails' => null,
        'remote_system_ids' => null,
        'usd_txn_value_reporting_threshold' => null,
        'managing_payees' => null,
        'created_at' => 'date-time'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'payor_id' => false,
		'payor_name' => false,
		'payor_xid' => false,
		'provider' => false,
		'address' => false,
		'primary_contact_name' => false,
		'primary_contact_phone' => false,
		'primary_contact_email' => false,
		'kyc_state' => false,
		'manual_lockout' => false,
		'open_banking_enabled' => false,
		'payee_grace_period_processing_enabled' => false,
		'payee_grace_period_days' => false,
		'collective_alias' => false,
		'support_contact' => false,
		'dba_name' => false,
		'allows_language_choice' => false,
		'reminder_emails_opt_out' => false,
		'language' => false,
		'includes_reports' => false,
		'wu_customer_id' => false,
		'max_master_payor_admins' => false,
		'payment_rails' => false,
		'remote_system_ids' => false,
		'usd_txn_value_reporting_threshold' => false,
		'managing_payees' => false,
		'created_at' => false
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
        'payor_id' => 'payorId',
        'payor_name' => 'payorName',
        'payor_xid' => 'payorXid',
        'provider' => 'provider',
        'address' => 'address',
        'primary_contact_name' => 'primaryContactName',
        'primary_contact_phone' => 'primaryContactPhone',
        'primary_contact_email' => 'primaryContactEmail',
        'kyc_state' => 'kycState',
        'manual_lockout' => 'manualLockout',
        'open_banking_enabled' => 'openBankingEnabled',
        'payee_grace_period_processing_enabled' => 'payeeGracePeriodProcessingEnabled',
        'payee_grace_period_days' => 'payeeGracePeriodDays',
        'collective_alias' => 'collectiveAlias',
        'support_contact' => 'supportContact',
        'dba_name' => 'dbaName',
        'allows_language_choice' => 'allowsLanguageChoice',
        'reminder_emails_opt_out' => 'reminderEmailsOptOut',
        'language' => 'language',
        'includes_reports' => 'includesReports',
        'wu_customer_id' => 'wuCustomerId',
        'max_master_payor_admins' => 'maxMasterPayorAdmins',
        'payment_rails' => 'paymentRails',
        'remote_system_ids' => 'remoteSystemIds',
        'usd_txn_value_reporting_threshold' => 'usdTxnValueReportingThreshold',
        'managing_payees' => 'managingPayees',
        'created_at' => 'createdAt'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'payor_id' => 'setPayorId',
        'payor_name' => 'setPayorName',
        'payor_xid' => 'setPayorXid',
        'provider' => 'setProvider',
        'address' => 'setAddress',
        'primary_contact_name' => 'setPrimaryContactName',
        'primary_contact_phone' => 'setPrimaryContactPhone',
        'primary_contact_email' => 'setPrimaryContactEmail',
        'kyc_state' => 'setKycState',
        'manual_lockout' => 'setManualLockout',
        'open_banking_enabled' => 'setOpenBankingEnabled',
        'payee_grace_period_processing_enabled' => 'setPayeeGracePeriodProcessingEnabled',
        'payee_grace_period_days' => 'setPayeeGracePeriodDays',
        'collective_alias' => 'setCollectiveAlias',
        'support_contact' => 'setSupportContact',
        'dba_name' => 'setDbaName',
        'allows_language_choice' => 'setAllowsLanguageChoice',
        'reminder_emails_opt_out' => 'setReminderEmailsOptOut',
        'language' => 'setLanguage',
        'includes_reports' => 'setIncludesReports',
        'wu_customer_id' => 'setWuCustomerId',
        'max_master_payor_admins' => 'setMaxMasterPayorAdmins',
        'payment_rails' => 'setPaymentRails',
        'remote_system_ids' => 'setRemoteSystemIds',
        'usd_txn_value_reporting_threshold' => 'setUsdTxnValueReportingThreshold',
        'managing_payees' => 'setManagingPayees',
        'created_at' => 'setCreatedAt'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'payor_id' => 'getPayorId',
        'payor_name' => 'getPayorName',
        'payor_xid' => 'getPayorXid',
        'provider' => 'getProvider',
        'address' => 'getAddress',
        'primary_contact_name' => 'getPrimaryContactName',
        'primary_contact_phone' => 'getPrimaryContactPhone',
        'primary_contact_email' => 'getPrimaryContactEmail',
        'kyc_state' => 'getKycState',
        'manual_lockout' => 'getManualLockout',
        'open_banking_enabled' => 'getOpenBankingEnabled',
        'payee_grace_period_processing_enabled' => 'getPayeeGracePeriodProcessingEnabled',
        'payee_grace_period_days' => 'getPayeeGracePeriodDays',
        'collective_alias' => 'getCollectiveAlias',
        'support_contact' => 'getSupportContact',
        'dba_name' => 'getDbaName',
        'allows_language_choice' => 'getAllowsLanguageChoice',
        'reminder_emails_opt_out' => 'getReminderEmailsOptOut',
        'language' => 'getLanguage',
        'includes_reports' => 'getIncludesReports',
        'wu_customer_id' => 'getWuCustomerId',
        'max_master_payor_admins' => 'getMaxMasterPayorAdmins',
        'payment_rails' => 'getPaymentRails',
        'remote_system_ids' => 'getRemoteSystemIds',
        'usd_txn_value_reporting_threshold' => 'getUsdTxnValueReportingThreshold',
        'managing_payees' => 'getManagingPayees',
        'created_at' => 'getCreatedAt'
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
        $this->setIfExists('payor_id', $data ?? [], null);
        $this->setIfExists('payor_name', $data ?? [], null);
        $this->setIfExists('payor_xid', $data ?? [], null);
        $this->setIfExists('provider', $data ?? [], null);
        $this->setIfExists('address', $data ?? [], null);
        $this->setIfExists('primary_contact_name', $data ?? [], null);
        $this->setIfExists('primary_contact_phone', $data ?? [], null);
        $this->setIfExists('primary_contact_email', $data ?? [], null);
        $this->setIfExists('kyc_state', $data ?? [], null);
        $this->setIfExists('manual_lockout', $data ?? [], null);
        $this->setIfExists('open_banking_enabled', $data ?? [], null);
        $this->setIfExists('payee_grace_period_processing_enabled', $data ?? [], null);
        $this->setIfExists('payee_grace_period_days', $data ?? [], null);
        $this->setIfExists('collective_alias', $data ?? [], null);
        $this->setIfExists('support_contact', $data ?? [], null);
        $this->setIfExists('dba_name', $data ?? [], null);
        $this->setIfExists('allows_language_choice', $data ?? [], null);
        $this->setIfExists('reminder_emails_opt_out', $data ?? [], null);
        $this->setIfExists('language', $data ?? [], null);
        $this->setIfExists('includes_reports', $data ?? [], null);
        $this->setIfExists('wu_customer_id', $data ?? [], null);
        $this->setIfExists('max_master_payor_admins', $data ?? [], null);
        $this->setIfExists('payment_rails', $data ?? [], null);
        $this->setIfExists('remote_system_ids', $data ?? [], null);
        $this->setIfExists('usd_txn_value_reporting_threshold', $data ?? [], null);
        $this->setIfExists('managing_payees', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
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

        if ($this->container['payor_id'] === null) {
            $invalidProperties[] = "'payor_id' can't be null";
        }
        if ($this->container['payor_name'] === null) {
            $invalidProperties[] = "'payor_name' can't be null";
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
     * @param string $payor_id The Payor Id
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
     * Gets payor_name
     *
     * @return string
     */
    public function getPayorName()
    {
        return $this->container['payor_name'];
    }

    /**
     * Sets payor_name
     *
     * @param string $payor_name The name of the payor
     *
     * @return self
     */
    public function setPayorName($payor_name)
    {
        if (is_null($payor_name)) {
            throw new \InvalidArgumentException('non-nullable payor_name cannot be null');
        }
        $this->container['payor_name'] = $payor_name;

        return $this;
    }

    /**
     * Gets payor_xid
     *
     * @return string|null
     */
    public function getPayorXid()
    {
        return $this->container['payor_xid'];
    }

    /**
     * Sets payor_xid
     *
     * @param string|null $payor_xid A unique identifier that an external system uses to reference the payor in their system
     *
     * @return self
     */
    public function setPayorXid($payor_xid)
    {
        if (is_null($payor_xid)) {
            throw new \InvalidArgumentException('non-nullable payor_xid cannot be null');
        }
        $this->container['payor_xid'] = $payor_xid;

        return $this;
    }

    /**
     * Gets provider
     *
     * @return string|null
     */
    public function getProvider()
    {
        return $this->container['provider'];
    }

    /**
     * Sets provider
     *
     * @param string|null $provider The source of the payorXid, default is null which means Velo
     *
     * @return self
     */
    public function setProvider($provider)
    {
        if (is_null($provider)) {
            throw new \InvalidArgumentException('non-nullable provider cannot be null');
        }
        $this->container['provider'] = $provider;

        return $this;
    }

    /**
     * Gets address
     *
     * @return \VeloPayments\Client\Model\PayorAddressV2|null
     */
    public function getAddress()
    {
        return $this->container['address'];
    }

    /**
     * Sets address
     *
     * @param \VeloPayments\Client\Model\PayorAddressV2|null $address address
     *
     * @return self
     */
    public function setAddress($address)
    {
        if (is_null($address)) {
            throw new \InvalidArgumentException('non-nullable address cannot be null');
        }
        $this->container['address'] = $address;

        return $this;
    }

    /**
     * Gets primary_contact_name
     *
     * @return string|null
     */
    public function getPrimaryContactName()
    {
        return $this->container['primary_contact_name'];
    }

    /**
     * Sets primary_contact_name
     *
     * @param string|null $primary_contact_name Name of primary contact for the payor.
     *
     * @return self
     */
    public function setPrimaryContactName($primary_contact_name)
    {
        if (is_null($primary_contact_name)) {
            throw new \InvalidArgumentException('non-nullable primary_contact_name cannot be null');
        }
        $this->container['primary_contact_name'] = $primary_contact_name;

        return $this;
    }

    /**
     * Gets primary_contact_phone
     *
     * @return string|null
     */
    public function getPrimaryContactPhone()
    {
        return $this->container['primary_contact_phone'];
    }

    /**
     * Sets primary_contact_phone
     *
     * @param string|null $primary_contact_phone Primary contact phone number for the payor.
     *
     * @return self
     */
    public function setPrimaryContactPhone($primary_contact_phone)
    {
        if (is_null($primary_contact_phone)) {
            throw new \InvalidArgumentException('non-nullable primary_contact_phone cannot be null');
        }
        $this->container['primary_contact_phone'] = $primary_contact_phone;

        return $this;
    }

    /**
     * Gets primary_contact_email
     *
     * @return string|null
     */
    public function getPrimaryContactEmail()
    {
        return $this->container['primary_contact_email'];
    }

    /**
     * Sets primary_contact_email
     *
     * @param string|null $primary_contact_email Primary contact email for the payor.
     *
     * @return self
     */
    public function setPrimaryContactEmail($primary_contact_email)
    {
        if (is_null($primary_contact_email)) {
            throw new \InvalidArgumentException('non-nullable primary_contact_email cannot be null');
        }
        $this->container['primary_contact_email'] = $primary_contact_email;

        return $this;
    }

    /**
     * Gets kyc_state
     *
     * @return string|null
     */
    public function getKycState()
    {
        return $this->container['kyc_state'];
    }

    /**
     * Sets kyc_state
     *
     * @param string|null $kyc_state The kyc state of the payor. One of the following values: FAILED_KYC, PASSED_KYC, REQUIRES_KYC
     *
     * @return self
     */
    public function setKycState($kyc_state)
    {
        if (is_null($kyc_state)) {
            throw new \InvalidArgumentException('non-nullable kyc_state cannot be null');
        }
        $this->container['kyc_state'] = $kyc_state;

        return $this;
    }

    /**
     * Gets manual_lockout
     *
     * @return bool|null
     */
    public function getManualLockout()
    {
        return $this->container['manual_lockout'];
    }

    /**
     * Sets manual_lockout
     *
     * @param bool|null $manual_lockout Whether or not the payor has been manually locked by the backoffice.
     *
     * @return self
     */
    public function setManualLockout($manual_lockout)
    {
        if (is_null($manual_lockout)) {
            throw new \InvalidArgumentException('non-nullable manual_lockout cannot be null');
        }
        $this->container['manual_lockout'] = $manual_lockout;

        return $this;
    }

    /**
     * Gets open_banking_enabled
     *
     * @return bool|null
     */
    public function getOpenBankingEnabled()
    {
        return $this->container['open_banking_enabled'];
    }

    /**
     * Sets open_banking_enabled
     *
     * @param bool|null $open_banking_enabled Is Open Banking supported for this payor
     *
     * @return self
     */
    public function setOpenBankingEnabled($open_banking_enabled)
    {
        if (is_null($open_banking_enabled)) {
            throw new \InvalidArgumentException('non-nullable open_banking_enabled cannot be null');
        }
        $this->container['open_banking_enabled'] = $open_banking_enabled;

        return $this;
    }

    /**
     * Gets payee_grace_period_processing_enabled
     *
     * @return bool|null
     */
    public function getPayeeGracePeriodProcessingEnabled()
    {
        return $this->container['payee_grace_period_processing_enabled'];
    }

    /**
     * Sets payee_grace_period_processing_enabled
     *
     * @param bool|null $payee_grace_period_processing_enabled Whether grace period processing is enabled.
     *
     * @return self
     */
    public function setPayeeGracePeriodProcessingEnabled($payee_grace_period_processing_enabled)
    {
        if (is_null($payee_grace_period_processing_enabled)) {
            throw new \InvalidArgumentException('non-nullable payee_grace_period_processing_enabled cannot be null');
        }
        $this->container['payee_grace_period_processing_enabled'] = $payee_grace_period_processing_enabled;

        return $this;
    }

    /**
     * Gets payee_grace_period_days
     *
     * @return int|null
     */
    public function getPayeeGracePeriodDays()
    {
        return $this->container['payee_grace_period_days'];
    }

    /**
     * Sets payee_grace_period_days
     *
     * @param int|null $payee_grace_period_days The grace period for paying payees in days before the payee must be onboarded.
     *
     * @return self
     */
    public function setPayeeGracePeriodDays($payee_grace_period_days)
    {
        if (is_null($payee_grace_period_days)) {
            throw new \InvalidArgumentException('non-nullable payee_grace_period_days cannot be null');
        }
        $this->container['payee_grace_period_days'] = $payee_grace_period_days;

        return $this;
    }

    /**
     * Gets collective_alias
     *
     * @return string|null
     */
    public function getCollectiveAlias()
    {
        return $this->container['collective_alias'];
    }

    /**
     * Sets collective_alias
     *
     * @param string|null $collective_alias How the payor has chosen to refer to payees.
     *
     * @return self
     */
    public function setCollectiveAlias($collective_alias)
    {
        if (is_null($collective_alias)) {
            throw new \InvalidArgumentException('non-nullable collective_alias cannot be null');
        }
        $this->container['collective_alias'] = $collective_alias;

        return $this;
    }

    /**
     * Gets support_contact
     *
     * @return string|null
     */
    public function getSupportContact()
    {
        return $this->container['support_contact'];
    }

    /**
     * Sets support_contact
     *
     * @param string|null $support_contact The payor’s support contact email address.
     *
     * @return self
     */
    public function setSupportContact($support_contact)
    {
        if (is_null($support_contact)) {
            throw new \InvalidArgumentException('non-nullable support_contact cannot be null');
        }
        $this->container['support_contact'] = $support_contact;

        return $this;
    }

    /**
     * Gets dba_name
     *
     * @return string|null
     */
    public function getDbaName()
    {
        return $this->container['dba_name'];
    }

    /**
     * Sets dba_name
     *
     * @param string|null $dba_name The payor’s 'Doing Business As' name.
     *
     * @return self
     */
    public function setDbaName($dba_name)
    {
        if (is_null($dba_name)) {
            throw new \InvalidArgumentException('non-nullable dba_name cannot be null');
        }
        $this->container['dba_name'] = $dba_name;

        return $this;
    }

    /**
     * Gets allows_language_choice
     *
     * @return bool|null
     */
    public function getAllowsLanguageChoice()
    {
        return $this->container['allows_language_choice'];
    }

    /**
     * Sets allows_language_choice
     *
     * @param bool|null $allows_language_choice Whether or not the payor allows language choice in the UI.
     *
     * @return self
     */
    public function setAllowsLanguageChoice($allows_language_choice)
    {
        if (is_null($allows_language_choice)) {
            throw new \InvalidArgumentException('non-nullable allows_language_choice cannot be null');
        }
        $this->container['allows_language_choice'] = $allows_language_choice;

        return $this;
    }

    /**
     * Gets reminder_emails_opt_out
     *
     * @return bool|null
     */
    public function getReminderEmailsOptOut()
    {
        return $this->container['reminder_emails_opt_out'];
    }

    /**
     * Sets reminder_emails_opt_out
     *
     * @param bool|null $reminder_emails_opt_out Whether or not the payor has opted-out of reminder emails being sent.
     *
     * @return self
     */
    public function setReminderEmailsOptOut($reminder_emails_opt_out)
    {
        if (is_null($reminder_emails_opt_out)) {
            throw new \InvalidArgumentException('non-nullable reminder_emails_opt_out cannot be null');
        }
        $this->container['reminder_emails_opt_out'] = $reminder_emails_opt_out;

        return $this;
    }

    /**
     * Gets language
     *
     * @return string|null
     */
    public function getLanguage()
    {
        return $this->container['language'];
    }

    /**
     * Sets language
     *
     * @param string|null $language The payor’s language preference. Must be one of [EN, FR]
     *
     * @return self
     */
    public function setLanguage($language)
    {
        if (is_null($language)) {
            throw new \InvalidArgumentException('non-nullable language cannot be null');
        }
        $this->container['language'] = $language;

        return $this;
    }

    /**
     * Gets includes_reports
     *
     * @return bool|null
     * @deprecated
     */
    public function getIncludesReports()
    {
        return $this->container['includes_reports'];
    }

    /**
     * Sets includes_reports
     *
     * @param bool|null $includes_reports For internal use only (will be removed in a later version)
     *
     * @return self
     * @deprecated
     */
    public function setIncludesReports($includes_reports)
    {
        if (is_null($includes_reports)) {
            throw new \InvalidArgumentException('non-nullable includes_reports cannot be null');
        }
        $this->container['includes_reports'] = $includes_reports;

        return $this;
    }

    /**
     * Gets wu_customer_id
     *
     * @return string|null
     * @deprecated
     */
    public function getWuCustomerId()
    {
        return $this->container['wu_customer_id'];
    }

    /**
     * Sets wu_customer_id
     *
     * @param string|null $wu_customer_id For internal use only (will be removed in a later version)
     *
     * @return self
     * @deprecated
     */
    public function setWuCustomerId($wu_customer_id)
    {
        if (is_null($wu_customer_id)) {
            throw new \InvalidArgumentException('non-nullable wu_customer_id cannot be null');
        }
        $this->container['wu_customer_id'] = $wu_customer_id;

        return $this;
    }

    /**
     * Gets max_master_payor_admins
     *
     * @return int|null
     */
    public function getMaxMasterPayorAdmins()
    {
        return $this->container['max_master_payor_admins'];
    }

    /**
     * Sets max_master_payor_admins
     *
     * @param int|null $max_master_payor_admins The maximum number of payor users with the master admin role
     *
     * @return self
     */
    public function setMaxMasterPayorAdmins($max_master_payor_admins)
    {
        if (is_null($max_master_payor_admins)) {
            throw new \InvalidArgumentException('non-nullable max_master_payor_admins cannot be null');
        }
        $this->container['max_master_payor_admins'] = $max_master_payor_admins;

        return $this;
    }

    /**
     * Gets payment_rails
     *
     * @return string|null
     * @deprecated
     */
    public function getPaymentRails()
    {
        return $this->container['payment_rails'];
    }

    /**
     * Sets payment_rails
     *
     * @param string|null $payment_rails For internal use only (will be removed in a later version)
     *
     * @return self
     * @deprecated
     */
    public function setPaymentRails($payment_rails)
    {
        if (is_null($payment_rails)) {
            throw new \InvalidArgumentException('non-nullable payment_rails cannot be null');
        }
        $this->container['payment_rails'] = $payment_rails;

        return $this;
    }

    /**
     * Gets remote_system_ids
     *
     * @return string[]|null
     * @deprecated
     */
    public function getRemoteSystemIds()
    {
        return $this->container['remote_system_ids'];
    }

    /**
     * Sets remote_system_ids
     *
     * @param string[]|null $remote_system_ids For internal use only (will be removed in a later version)
     *
     * @return self
     * @deprecated
     */
    public function setRemoteSystemIds($remote_system_ids)
    {
        if (is_null($remote_system_ids)) {
            throw new \InvalidArgumentException('non-nullable remote_system_ids cannot be null');
        }
        $this->container['remote_system_ids'] = $remote_system_ids;

        return $this;
    }

    /**
     * Gets usd_txn_value_reporting_threshold
     *
     * @return int|null
     * @deprecated
     */
    public function getUsdTxnValueReportingThreshold()
    {
        return $this->container['usd_txn_value_reporting_threshold'];
    }

    /**
     * Sets usd_txn_value_reporting_threshold
     *
     * @param int|null $usd_txn_value_reporting_threshold USD in minor units. For internal use only (will be removed in a later version)
     *
     * @return self
     * @deprecated
     */
    public function setUsdTxnValueReportingThreshold($usd_txn_value_reporting_threshold)
    {
        if (is_null($usd_txn_value_reporting_threshold)) {
            throw new \InvalidArgumentException('non-nullable usd_txn_value_reporting_threshold cannot be null');
        }
        $this->container['usd_txn_value_reporting_threshold'] = $usd_txn_value_reporting_threshold;

        return $this;
    }

    /**
     * Gets managing_payees
     *
     * @return bool|null
     */
    public function getManagingPayees()
    {
        return $this->container['managing_payees'];
    }

    /**
     * Sets managing_payees
     *
     * @param bool|null $managing_payees Does this payor manage their own payees (payees are not invited but managed by the payor)
     *
     * @return self
     */
    public function setManagingPayees($managing_payees)
    {
        if (is_null($managing_payees)) {
            throw new \InvalidArgumentException('non-nullable managing_payees cannot be null');
        }
        $this->container['managing_payees'] = $managing_payees;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return \DateTime|null
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param \DateTime|null $created_at The date of creation of the payor
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


