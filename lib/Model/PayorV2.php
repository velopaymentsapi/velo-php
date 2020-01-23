<?php
/**
 * PayorV2
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
 * The version of the OpenAPI document: 2.18.31
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
 * PayorV2 Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class PayorV2 implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

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
        'address' => '\VeloPayments\Client\Model\PayorAddressV2',
        'primary_contact_name' => 'string',
        'primary_contact_phone' => 'string',
        'primary_contact_email' => 'string',
        'kyc_state' => '\VeloPayments\Client\Model\KycState',
        'manual_lockout' => 'bool',
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
        'payment_rails' => '\VeloPayments\Client\Model\PaymentRails'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'payor_id' => 'uuid',
        'payor_name' => null,
        'address' => null,
        'primary_contact_name' => null,
        'primary_contact_phone' => null,
        'primary_contact_email' => 'email',
        'kyc_state' => null,
        'manual_lockout' => null,
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
        'payment_rails' => null
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
        'payor_id' => 'payorId',
        'payor_name' => 'payorName',
        'address' => 'address',
        'primary_contact_name' => 'primaryContactName',
        'primary_contact_phone' => 'primaryContactPhone',
        'primary_contact_email' => 'primaryContactEmail',
        'kyc_state' => 'kycState',
        'manual_lockout' => 'manualLockout',
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
        'payment_rails' => 'paymentRails'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'payor_id' => 'setPayorId',
        'payor_name' => 'setPayorName',
        'address' => 'setAddress',
        'primary_contact_name' => 'setPrimaryContactName',
        'primary_contact_phone' => 'setPrimaryContactPhone',
        'primary_contact_email' => 'setPrimaryContactEmail',
        'kyc_state' => 'setKycState',
        'manual_lockout' => 'setManualLockout',
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
        'payment_rails' => 'setPaymentRails'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'payor_id' => 'getPayorId',
        'payor_name' => 'getPayorName',
        'address' => 'getAddress',
        'primary_contact_name' => 'getPrimaryContactName',
        'primary_contact_phone' => 'getPrimaryContactPhone',
        'primary_contact_email' => 'getPrimaryContactEmail',
        'kyc_state' => 'getKycState',
        'manual_lockout' => 'getManualLockout',
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
        'payment_rails' => 'getPaymentRails'
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

    const LANGUAGE_EN = 'EN';
    const LANGUAGE_FR = 'FR';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getLanguageAllowableValues()
    {
        return [
            self::LANGUAGE_EN,
            self::LANGUAGE_FR,
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
        $this->container['payor_id'] = isset($data['payor_id']) ? $data['payor_id'] : null;
        $this->container['payor_name'] = isset($data['payor_name']) ? $data['payor_name'] : null;
        $this->container['address'] = isset($data['address']) ? $data['address'] : null;
        $this->container['primary_contact_name'] = isset($data['primary_contact_name']) ? $data['primary_contact_name'] : null;
        $this->container['primary_contact_phone'] = isset($data['primary_contact_phone']) ? $data['primary_contact_phone'] : null;
        $this->container['primary_contact_email'] = isset($data['primary_contact_email']) ? $data['primary_contact_email'] : null;
        $this->container['kyc_state'] = isset($data['kyc_state']) ? $data['kyc_state'] : null;
        $this->container['manual_lockout'] = isset($data['manual_lockout']) ? $data['manual_lockout'] : null;
        $this->container['payee_grace_period_processing_enabled'] = isset($data['payee_grace_period_processing_enabled']) ? $data['payee_grace_period_processing_enabled'] : null;
        $this->container['payee_grace_period_days'] = isset($data['payee_grace_period_days']) ? $data['payee_grace_period_days'] : null;
        $this->container['collective_alias'] = isset($data['collective_alias']) ? $data['collective_alias'] : null;
        $this->container['support_contact'] = isset($data['support_contact']) ? $data['support_contact'] : null;
        $this->container['dba_name'] = isset($data['dba_name']) ? $data['dba_name'] : null;
        $this->container['allows_language_choice'] = isset($data['allows_language_choice']) ? $data['allows_language_choice'] : null;
        $this->container['reminder_emails_opt_out'] = isset($data['reminder_emails_opt_out']) ? $data['reminder_emails_opt_out'] : null;
        $this->container['language'] = isset($data['language']) ? $data['language'] : null;
        $this->container['includes_reports'] = isset($data['includes_reports']) ? $data['includes_reports'] : null;
        $this->container['wu_customer_id'] = isset($data['wu_customer_id']) ? $data['wu_customer_id'] : null;
        $this->container['max_master_payor_admins'] = isset($data['max_master_payor_admins']) ? $data['max_master_payor_admins'] : null;
        $this->container['payment_rails'] = isset($data['payment_rails']) ? $data['payment_rails'] : null;
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
        $allowedValues = $this->getLanguageAllowableValues();
        if (!is_null($this->container['language']) && !in_array($this->container['language'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'language', must be one of '%s'",
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
     * @return $this
     */
    public function setPayorId($payor_id)
    {
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
     * @param string $payor_name The name of the payor.
     *
     * @return $this
     */
    public function setPayorName($payor_name)
    {
        $this->container['payor_name'] = $payor_name;

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
     * @return $this
     */
    public function setAddress($address)
    {
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
     * @return $this
     */
    public function setPrimaryContactName($primary_contact_name)
    {
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
     * @return $this
     */
    public function setPrimaryContactPhone($primary_contact_phone)
    {
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
     * @return $this
     */
    public function setPrimaryContactEmail($primary_contact_email)
    {
        $this->container['primary_contact_email'] = $primary_contact_email;

        return $this;
    }

    /**
     * Gets kyc_state
     *
     * @return \VeloPayments\Client\Model\KycState|null
     */
    public function getKycState()
    {
        return $this->container['kyc_state'];
    }

    /**
     * Sets kyc_state
     *
     * @param \VeloPayments\Client\Model\KycState|null $kyc_state kyc_state
     *
     * @return $this
     */
    public function setKycState($kyc_state)
    {
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
     * @return $this
     */
    public function setManualLockout($manual_lockout)
    {
        $this->container['manual_lockout'] = $manual_lockout;

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
     * @return $this
     */
    public function setPayeeGracePeriodProcessingEnabled($payee_grace_period_processing_enabled)
    {
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
     * @param int|null $payee_grace_period_days The grace period for paying payees in days.
     *
     * @return $this
     */
    public function setPayeeGracePeriodDays($payee_grace_period_days)
    {
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
     * @return $this
     */
    public function setCollectiveAlias($collective_alias)
    {
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
     * @return $this
     */
    public function setSupportContact($support_contact)
    {
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
     * @return $this
     */
    public function setDbaName($dba_name)
    {
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
     * @return $this
     */
    public function setAllowsLanguageChoice($allows_language_choice)
    {
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
     * @return $this
     */
    public function setReminderEmailsOptOut($reminder_emails_opt_out)
    {
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
     * @param string|null $language The payor’s language preference. Must be one of [EN, FR].
     *
     * @return $this
     */
    public function setLanguage($language)
    {
        $allowedValues = $this->getLanguageAllowableValues();
        if (!is_null($language) && !in_array($language, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'language', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['language'] = $language;

        return $this;
    }

    /**
     * Gets includes_reports
     *
     * @return bool|null
     */
    public function getIncludesReports()
    {
        return $this->container['includes_reports'];
    }

    /**
     * Sets includes_reports
     *
     * @param bool|null $includes_reports includes_reports
     *
     * @return $this
     */
    public function setIncludesReports($includes_reports)
    {
        $this->container['includes_reports'] = $includes_reports;

        return $this;
    }

    /**
     * Gets wu_customer_id
     *
     * @return string|null
     */
    public function getWuCustomerId()
    {
        return $this->container['wu_customer_id'];
    }

    /**
     * Sets wu_customer_id
     *
     * @param string|null $wu_customer_id wu_customer_id
     *
     * @return $this
     */
    public function setWuCustomerId($wu_customer_id)
    {
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
     * @param int|null $max_master_payor_admins max_master_payor_admins
     *
     * @return $this
     */
    public function setMaxMasterPayorAdmins($max_master_payor_admins)
    {
        $this->container['max_master_payor_admins'] = $max_master_payor_admins;

        return $this;
    }

    /**
     * Gets payment_rails
     *
     * @return \VeloPayments\Client\Model\PaymentRails|null
     */
    public function getPaymentRails()
    {
        return $this->container['payment_rails'];
    }

    /**
     * Sets payment_rails
     *
     * @param \VeloPayments\Client\Model\PaymentRails|null $payment_rails payment_rails
     *
     * @return $this
     */
    public function setPaymentRails($payment_rails)
    {
        $this->container['payment_rails'] = $payment_rails;

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


