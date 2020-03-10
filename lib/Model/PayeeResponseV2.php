<?php
/**
 * PayeeResponseV2
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
 * PayeeResponseV2 Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class PayeeResponseV2 implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PayeeResponseV2';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'payee_id' => 'string',
        'payor_refs' => '\VeloPayments\Client\Model\PayeePayorRefV2[]',
        'email' => 'string',
        'onboarded_status' => '\VeloPayments\Client\Model\OnboardedStatus2',
        'ofac_status' => '\VeloPayments\Client\Model\OfacStatus2',
        'language' => '\VeloPayments\Client\Model\Language2',
        'created' => '\DateTime',
        'country' => 'string',
        'display_name' => 'string',
        'payee_type' => '\VeloPayments\Client\Model\PayeeType',
        'disabled' => 'bool',
        'disabled_comment' => 'string',
        'disabled_updated_timestamp' => '\DateTime',
        'address' => '\VeloPayments\Client\Model\PayeeAddress2',
        'individual' => '\VeloPayments\Client\Model\Individual',
        'company' => '\VeloPayments\Client\Model\Company',
        'cellphone_number' => 'string',
        'last_ofac_check_timestamp' => 'string',
        'ofac_override' => 'bool',
        'ofac_override_reason' => 'string',
        'ofac_override_timestamp' => 'string',
        'grace_period_end_date' => '\DateTime',
        'enhanced_kyc_completed' => 'bool',
        'kyc_completed_timestamp' => 'string',
        'pause_payment' => 'bool',
        'pause_payment_timestamp' => 'string',
        'marketing_opt_in_decision' => 'bool',
        'marketing_opt_in_timestamp' => 'string',
        'accept_terms_and_conditions_timestamp' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'payee_id' => 'uuid',
        'payor_refs' => null,
        'email' => 'email',
        'onboarded_status' => null,
        'ofac_status' => null,
        'language' => null,
        'created' => 'date-time',
        'country' => null,
        'display_name' => null,
        'payee_type' => null,
        'disabled' => null,
        'disabled_comment' => null,
        'disabled_updated_timestamp' => 'date-time',
        'address' => null,
        'individual' => null,
        'company' => null,
        'cellphone_number' => null,
        'last_ofac_check_timestamp' => 'date_time',
        'ofac_override' => null,
        'ofac_override_reason' => null,
        'ofac_override_timestamp' => 'date_time',
        'grace_period_end_date' => 'date',
        'enhanced_kyc_completed' => null,
        'kyc_completed_timestamp' => 'date_time',
        'pause_payment' => null,
        'pause_payment_timestamp' => 'date_time',
        'marketing_opt_in_decision' => null,
        'marketing_opt_in_timestamp' => 'date_time',
        'accept_terms_and_conditions_timestamp' => 'date-time'
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
        'payee_id' => 'payeeId',
        'payor_refs' => 'payorRefs',
        'email' => 'email',
        'onboarded_status' => 'onboardedStatus',
        'ofac_status' => 'ofacStatus',
        'language' => 'language',
        'created' => 'created',
        'country' => 'country',
        'display_name' => 'displayName',
        'payee_type' => 'payeeType',
        'disabled' => 'disabled',
        'disabled_comment' => 'disabledComment',
        'disabled_updated_timestamp' => 'disabledUpdatedTimestamp',
        'address' => 'address',
        'individual' => 'individual',
        'company' => 'company',
        'cellphone_number' => 'cellphoneNumber',
        'last_ofac_check_timestamp' => 'lastOfacCheckTimestamp',
        'ofac_override' => 'ofacOverride',
        'ofac_override_reason' => 'ofacOverrideReason',
        'ofac_override_timestamp' => 'ofacOverrideTimestamp',
        'grace_period_end_date' => 'gracePeriodEndDate',
        'enhanced_kyc_completed' => 'enhancedKycCompleted',
        'kyc_completed_timestamp' => 'kycCompletedTimestamp',
        'pause_payment' => 'pausePayment',
        'pause_payment_timestamp' => 'pausePaymentTimestamp',
        'marketing_opt_in_decision' => 'marketingOptInDecision',
        'marketing_opt_in_timestamp' => 'marketingOptInTimestamp',
        'accept_terms_and_conditions_timestamp' => 'acceptTermsAndConditionsTimestamp'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'payee_id' => 'setPayeeId',
        'payor_refs' => 'setPayorRefs',
        'email' => 'setEmail',
        'onboarded_status' => 'setOnboardedStatus',
        'ofac_status' => 'setOfacStatus',
        'language' => 'setLanguage',
        'created' => 'setCreated',
        'country' => 'setCountry',
        'display_name' => 'setDisplayName',
        'payee_type' => 'setPayeeType',
        'disabled' => 'setDisabled',
        'disabled_comment' => 'setDisabledComment',
        'disabled_updated_timestamp' => 'setDisabledUpdatedTimestamp',
        'address' => 'setAddress',
        'individual' => 'setIndividual',
        'company' => 'setCompany',
        'cellphone_number' => 'setCellphoneNumber',
        'last_ofac_check_timestamp' => 'setLastOfacCheckTimestamp',
        'ofac_override' => 'setOfacOverride',
        'ofac_override_reason' => 'setOfacOverrideReason',
        'ofac_override_timestamp' => 'setOfacOverrideTimestamp',
        'grace_period_end_date' => 'setGracePeriodEndDate',
        'enhanced_kyc_completed' => 'setEnhancedKycCompleted',
        'kyc_completed_timestamp' => 'setKycCompletedTimestamp',
        'pause_payment' => 'setPausePayment',
        'pause_payment_timestamp' => 'setPausePaymentTimestamp',
        'marketing_opt_in_decision' => 'setMarketingOptInDecision',
        'marketing_opt_in_timestamp' => 'setMarketingOptInTimestamp',
        'accept_terms_and_conditions_timestamp' => 'setAcceptTermsAndConditionsTimestamp'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'payee_id' => 'getPayeeId',
        'payor_refs' => 'getPayorRefs',
        'email' => 'getEmail',
        'onboarded_status' => 'getOnboardedStatus',
        'ofac_status' => 'getOfacStatus',
        'language' => 'getLanguage',
        'created' => 'getCreated',
        'country' => 'getCountry',
        'display_name' => 'getDisplayName',
        'payee_type' => 'getPayeeType',
        'disabled' => 'getDisabled',
        'disabled_comment' => 'getDisabledComment',
        'disabled_updated_timestamp' => 'getDisabledUpdatedTimestamp',
        'address' => 'getAddress',
        'individual' => 'getIndividual',
        'company' => 'getCompany',
        'cellphone_number' => 'getCellphoneNumber',
        'last_ofac_check_timestamp' => 'getLastOfacCheckTimestamp',
        'ofac_override' => 'getOfacOverride',
        'ofac_override_reason' => 'getOfacOverrideReason',
        'ofac_override_timestamp' => 'getOfacOverrideTimestamp',
        'grace_period_end_date' => 'getGracePeriodEndDate',
        'enhanced_kyc_completed' => 'getEnhancedKycCompleted',
        'kyc_completed_timestamp' => 'getKycCompletedTimestamp',
        'pause_payment' => 'getPausePayment',
        'pause_payment_timestamp' => 'getPausePaymentTimestamp',
        'marketing_opt_in_decision' => 'getMarketingOptInDecision',
        'marketing_opt_in_timestamp' => 'getMarketingOptInTimestamp',
        'accept_terms_and_conditions_timestamp' => 'getAcceptTermsAndConditionsTimestamp'
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
        $this->container['payee_id'] = isset($data['payee_id']) ? $data['payee_id'] : null;
        $this->container['payor_refs'] = isset($data['payor_refs']) ? $data['payor_refs'] : null;
        $this->container['email'] = isset($data['email']) ? $data['email'] : null;
        $this->container['onboarded_status'] = isset($data['onboarded_status']) ? $data['onboarded_status'] : null;
        $this->container['ofac_status'] = isset($data['ofac_status']) ? $data['ofac_status'] : null;
        $this->container['language'] = isset($data['language']) ? $data['language'] : null;
        $this->container['created'] = isset($data['created']) ? $data['created'] : null;
        $this->container['country'] = isset($data['country']) ? $data['country'] : null;
        $this->container['display_name'] = isset($data['display_name']) ? $data['display_name'] : null;
        $this->container['payee_type'] = isset($data['payee_type']) ? $data['payee_type'] : null;
        $this->container['disabled'] = isset($data['disabled']) ? $data['disabled'] : null;
        $this->container['disabled_comment'] = isset($data['disabled_comment']) ? $data['disabled_comment'] : null;
        $this->container['disabled_updated_timestamp'] = isset($data['disabled_updated_timestamp']) ? $data['disabled_updated_timestamp'] : null;
        $this->container['address'] = isset($data['address']) ? $data['address'] : null;
        $this->container['individual'] = isset($data['individual']) ? $data['individual'] : null;
        $this->container['company'] = isset($data['company']) ? $data['company'] : null;
        $this->container['cellphone_number'] = isset($data['cellphone_number']) ? $data['cellphone_number'] : null;
        $this->container['last_ofac_check_timestamp'] = isset($data['last_ofac_check_timestamp']) ? $data['last_ofac_check_timestamp'] : null;
        $this->container['ofac_override'] = isset($data['ofac_override']) ? $data['ofac_override'] : null;
        $this->container['ofac_override_reason'] = isset($data['ofac_override_reason']) ? $data['ofac_override_reason'] : null;
        $this->container['ofac_override_timestamp'] = isset($data['ofac_override_timestamp']) ? $data['ofac_override_timestamp'] : null;
        $this->container['grace_period_end_date'] = isset($data['grace_period_end_date']) ? $data['grace_period_end_date'] : null;
        $this->container['enhanced_kyc_completed'] = isset($data['enhanced_kyc_completed']) ? $data['enhanced_kyc_completed'] : null;
        $this->container['kyc_completed_timestamp'] = isset($data['kyc_completed_timestamp']) ? $data['kyc_completed_timestamp'] : null;
        $this->container['pause_payment'] = isset($data['pause_payment']) ? $data['pause_payment'] : null;
        $this->container['pause_payment_timestamp'] = isset($data['pause_payment_timestamp']) ? $data['pause_payment_timestamp'] : null;
        $this->container['marketing_opt_in_decision'] = isset($data['marketing_opt_in_decision']) ? $data['marketing_opt_in_decision'] : null;
        $this->container['marketing_opt_in_timestamp'] = isset($data['marketing_opt_in_timestamp']) ? $data['marketing_opt_in_timestamp'] : null;
        $this->container['accept_terms_and_conditions_timestamp'] = isset($data['accept_terms_and_conditions_timestamp']) ? $data['accept_terms_and_conditions_timestamp'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

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
     * @return $this
     */
    public function setPayeeId($payee_id)
    {
        $this->container['payee_id'] = $payee_id;

        return $this;
    }

    /**
     * Gets payor_refs
     *
     * @return \VeloPayments\Client\Model\PayeePayorRefV2[]|null
     */
    public function getPayorRefs()
    {
        return $this->container['payor_refs'];
    }

    /**
     * Sets payor_refs
     *
     * @param \VeloPayments\Client\Model\PayeePayorRefV2[]|null $payor_refs payor_refs
     *
     * @return $this
     */
    public function setPayorRefs($payor_refs)
    {
        $this->container['payor_refs'] = $payor_refs;

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
     * @param string|null $email email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets onboarded_status
     *
     * @return \VeloPayments\Client\Model\OnboardedStatus2|null
     */
    public function getOnboardedStatus()
    {
        return $this->container['onboarded_status'];
    }

    /**
     * Sets onboarded_status
     *
     * @param \VeloPayments\Client\Model\OnboardedStatus2|null $onboarded_status onboarded_status
     *
     * @return $this
     */
    public function setOnboardedStatus($onboarded_status)
    {
        $this->container['onboarded_status'] = $onboarded_status;

        return $this;
    }

    /**
     * Gets ofac_status
     *
     * @return \VeloPayments\Client\Model\OfacStatus2|null
     */
    public function getOfacStatus()
    {
        return $this->container['ofac_status'];
    }

    /**
     * Sets ofac_status
     *
     * @param \VeloPayments\Client\Model\OfacStatus2|null $ofac_status ofac_status
     *
     * @return $this
     */
    public function setOfacStatus($ofac_status)
    {
        $this->container['ofac_status'] = $ofac_status;

        return $this;
    }

    /**
     * Gets language
     *
     * @return \VeloPayments\Client\Model\Language2|null
     */
    public function getLanguage()
    {
        return $this->container['language'];
    }

    /**
     * Sets language
     *
     * @param \VeloPayments\Client\Model\Language2|null $language language
     *
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->container['language'] = $language;

        return $this;
    }

    /**
     * Gets created
     *
     * @return \DateTime|null
     */
    public function getCreated()
    {
        return $this->container['created'];
    }

    /**
     * Sets created
     *
     * @param \DateTime|null $created created
     *
     * @return $this
     */
    public function setCreated($created)
    {
        $this->container['created'] = $created;

        return $this;
    }

    /**
     * Gets country
     *
     * @return string|null
     */
    public function getCountry()
    {
        return $this->container['country'];
    }

    /**
     * Sets country
     *
     * @param string|null $country country
     *
     * @return $this
     */
    public function setCountry($country)
    {
        $this->container['country'] = $country;

        return $this;
    }

    /**
     * Gets display_name
     *
     * @return string|null
     */
    public function getDisplayName()
    {
        return $this->container['display_name'];
    }

    /**
     * Sets display_name
     *
     * @param string|null $display_name display_name
     *
     * @return $this
     */
    public function setDisplayName($display_name)
    {
        $this->container['display_name'] = $display_name;

        return $this;
    }

    /**
     * Gets payee_type
     *
     * @return \VeloPayments\Client\Model\PayeeType|null
     */
    public function getPayeeType()
    {
        return $this->container['payee_type'];
    }

    /**
     * Sets payee_type
     *
     * @param \VeloPayments\Client\Model\PayeeType|null $payee_type payee_type
     *
     * @return $this
     */
    public function setPayeeType($payee_type)
    {
        $this->container['payee_type'] = $payee_type;

        return $this;
    }

    /**
     * Gets disabled
     *
     * @return bool|null
     */
    public function getDisabled()
    {
        return $this->container['disabled'];
    }

    /**
     * Sets disabled
     *
     * @param bool|null $disabled disabled
     *
     * @return $this
     */
    public function setDisabled($disabled)
    {
        $this->container['disabled'] = $disabled;

        return $this;
    }

    /**
     * Gets disabled_comment
     *
     * @return string|null
     */
    public function getDisabledComment()
    {
        return $this->container['disabled_comment'];
    }

    /**
     * Sets disabled_comment
     *
     * @param string|null $disabled_comment disabled_comment
     *
     * @return $this
     */
    public function setDisabledComment($disabled_comment)
    {
        $this->container['disabled_comment'] = $disabled_comment;

        return $this;
    }

    /**
     * Gets disabled_updated_timestamp
     *
     * @return \DateTime|null
     */
    public function getDisabledUpdatedTimestamp()
    {
        return $this->container['disabled_updated_timestamp'];
    }

    /**
     * Sets disabled_updated_timestamp
     *
     * @param \DateTime|null $disabled_updated_timestamp disabled_updated_timestamp
     *
     * @return $this
     */
    public function setDisabledUpdatedTimestamp($disabled_updated_timestamp)
    {
        $this->container['disabled_updated_timestamp'] = $disabled_updated_timestamp;

        return $this;
    }

    /**
     * Gets address
     *
     * @return \VeloPayments\Client\Model\PayeeAddress2|null
     */
    public function getAddress()
    {
        return $this->container['address'];
    }

    /**
     * Sets address
     *
     * @param \VeloPayments\Client\Model\PayeeAddress2|null $address address
     *
     * @return $this
     */
    public function setAddress($address)
    {
        $this->container['address'] = $address;

        return $this;
    }

    /**
     * Gets individual
     *
     * @return \VeloPayments\Client\Model\Individual|null
     */
    public function getIndividual()
    {
        return $this->container['individual'];
    }

    /**
     * Sets individual
     *
     * @param \VeloPayments\Client\Model\Individual|null $individual individual
     *
     * @return $this
     */
    public function setIndividual($individual)
    {
        $this->container['individual'] = $individual;

        return $this;
    }

    /**
     * Gets company
     *
     * @return \VeloPayments\Client\Model\Company|null
     */
    public function getCompany()
    {
        return $this->container['company'];
    }

    /**
     * Sets company
     *
     * @param \VeloPayments\Client\Model\Company|null $company company
     *
     * @return $this
     */
    public function setCompany($company)
    {
        $this->container['company'] = $company;

        return $this;
    }

    /**
     * Gets cellphone_number
     *
     * @return string|null
     */
    public function getCellphoneNumber()
    {
        return $this->container['cellphone_number'];
    }

    /**
     * Sets cellphone_number
     *
     * @param string|null $cellphone_number cellphone_number
     *
     * @return $this
     */
    public function setCellphoneNumber($cellphone_number)
    {
        $this->container['cellphone_number'] = $cellphone_number;

        return $this;
    }

    /**
     * Gets last_ofac_check_timestamp
     *
     * @return string|null
     */
    public function getLastOfacCheckTimestamp()
    {
        return $this->container['last_ofac_check_timestamp'];
    }

    /**
     * Sets last_ofac_check_timestamp
     *
     * @param string|null $last_ofac_check_timestamp last_ofac_check_timestamp
     *
     * @return $this
     */
    public function setLastOfacCheckTimestamp($last_ofac_check_timestamp)
    {
        $this->container['last_ofac_check_timestamp'] = $last_ofac_check_timestamp;

        return $this;
    }

    /**
     * Gets ofac_override
     *
     * @return bool|null
     */
    public function getOfacOverride()
    {
        return $this->container['ofac_override'];
    }

    /**
     * Sets ofac_override
     *
     * @param bool|null $ofac_override ofac_override
     *
     * @return $this
     */
    public function setOfacOverride($ofac_override)
    {
        $this->container['ofac_override'] = $ofac_override;

        return $this;
    }

    /**
     * Gets ofac_override_reason
     *
     * @return string|null
     */
    public function getOfacOverrideReason()
    {
        return $this->container['ofac_override_reason'];
    }

    /**
     * Sets ofac_override_reason
     *
     * @param string|null $ofac_override_reason ofac_override_reason
     *
     * @return $this
     */
    public function setOfacOverrideReason($ofac_override_reason)
    {
        $this->container['ofac_override_reason'] = $ofac_override_reason;

        return $this;
    }

    /**
     * Gets ofac_override_timestamp
     *
     * @return string|null
     */
    public function getOfacOverrideTimestamp()
    {
        return $this->container['ofac_override_timestamp'];
    }

    /**
     * Sets ofac_override_timestamp
     *
     * @param string|null $ofac_override_timestamp ofac_override_timestamp
     *
     * @return $this
     */
    public function setOfacOverrideTimestamp($ofac_override_timestamp)
    {
        $this->container['ofac_override_timestamp'] = $ofac_override_timestamp;

        return $this;
    }

    /**
     * Gets grace_period_end_date
     *
     * @return \DateTime|null
     */
    public function getGracePeriodEndDate()
    {
        return $this->container['grace_period_end_date'];
    }

    /**
     * Sets grace_period_end_date
     *
     * @param \DateTime|null $grace_period_end_date grace_period_end_date
     *
     * @return $this
     */
    public function setGracePeriodEndDate($grace_period_end_date)
    {
        $this->container['grace_period_end_date'] = $grace_period_end_date;

        return $this;
    }

    /**
     * Gets enhanced_kyc_completed
     *
     * @return bool|null
     */
    public function getEnhancedKycCompleted()
    {
        return $this->container['enhanced_kyc_completed'];
    }

    /**
     * Sets enhanced_kyc_completed
     *
     * @param bool|null $enhanced_kyc_completed enhanced_kyc_completed
     *
     * @return $this
     */
    public function setEnhancedKycCompleted($enhanced_kyc_completed)
    {
        $this->container['enhanced_kyc_completed'] = $enhanced_kyc_completed;

        return $this;
    }

    /**
     * Gets kyc_completed_timestamp
     *
     * @return string|null
     */
    public function getKycCompletedTimestamp()
    {
        return $this->container['kyc_completed_timestamp'];
    }

    /**
     * Sets kyc_completed_timestamp
     *
     * @param string|null $kyc_completed_timestamp kyc_completed_timestamp
     *
     * @return $this
     */
    public function setKycCompletedTimestamp($kyc_completed_timestamp)
    {
        $this->container['kyc_completed_timestamp'] = $kyc_completed_timestamp;

        return $this;
    }

    /**
     * Gets pause_payment
     *
     * @return bool|null
     */
    public function getPausePayment()
    {
        return $this->container['pause_payment'];
    }

    /**
     * Sets pause_payment
     *
     * @param bool|null $pause_payment pause_payment
     *
     * @return $this
     */
    public function setPausePayment($pause_payment)
    {
        $this->container['pause_payment'] = $pause_payment;

        return $this;
    }

    /**
     * Gets pause_payment_timestamp
     *
     * @return string|null
     */
    public function getPausePaymentTimestamp()
    {
        return $this->container['pause_payment_timestamp'];
    }

    /**
     * Sets pause_payment_timestamp
     *
     * @param string|null $pause_payment_timestamp pause_payment_timestamp
     *
     * @return $this
     */
    public function setPausePaymentTimestamp($pause_payment_timestamp)
    {
        $this->container['pause_payment_timestamp'] = $pause_payment_timestamp;

        return $this;
    }

    /**
     * Gets marketing_opt_in_decision
     *
     * @return bool|null
     */
    public function getMarketingOptInDecision()
    {
        return $this->container['marketing_opt_in_decision'];
    }

    /**
     * Sets marketing_opt_in_decision
     *
     * @param bool|null $marketing_opt_in_decision marketing_opt_in_decision
     *
     * @return $this
     */
    public function setMarketingOptInDecision($marketing_opt_in_decision)
    {
        $this->container['marketing_opt_in_decision'] = $marketing_opt_in_decision;

        return $this;
    }

    /**
     * Gets marketing_opt_in_timestamp
     *
     * @return string|null
     */
    public function getMarketingOptInTimestamp()
    {
        return $this->container['marketing_opt_in_timestamp'];
    }

    /**
     * Sets marketing_opt_in_timestamp
     *
     * @param string|null $marketing_opt_in_timestamp marketing_opt_in_timestamp
     *
     * @return $this
     */
    public function setMarketingOptInTimestamp($marketing_opt_in_timestamp)
    {
        $this->container['marketing_opt_in_timestamp'] = $marketing_opt_in_timestamp;

        return $this;
    }

    /**
     * Gets accept_terms_and_conditions_timestamp
     *
     * @return \DateTime|null
     */
    public function getAcceptTermsAndConditionsTimestamp()
    {
        return $this->container['accept_terms_and_conditions_timestamp'];
    }

    /**
     * Sets accept_terms_and_conditions_timestamp
     *
     * @param \DateTime|null $accept_terms_and_conditions_timestamp The timestamp when the payee last accepted T&Cs
     *
     * @return $this
     */
    public function setAcceptTermsAndConditionsTimestamp($accept_terms_and_conditions_timestamp)
    {
        $this->container['accept_terms_and_conditions_timestamp'] = $accept_terms_and_conditions_timestamp;

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


