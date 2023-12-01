<?php
/**
 * PayeeDetailResponseV3
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
 * PayeeDetailResponseV3 Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PayeeDetailResponseV3 implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PayeeDetailResponseV3';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'payee_id' => 'string',
        'payor_refs' => '\VeloPayments\Client\Model\PayeePayorRefV3[]',
        'email' => 'string',
        'onboarded_status' => 'string',
        'watchlist_status' => 'string',
        'watchlist_override_expires_at_timestamp' => '\DateTime',
        'watchlist_override_comment' => 'string',
        'language' => 'string',
        'created' => '\DateTime',
        'country' => 'string',
        'display_name' => 'string',
        'payee_type' => 'string',
        'disabled' => 'bool',
        'disabled_comment' => 'string',
        'disabled_updated_timestamp' => '\DateTime',
        'address' => '\VeloPayments\Client\Model\PayeeAddressV3',
        'individual' => '\VeloPayments\Client\Model\IndividualV3',
        'company' => '\VeloPayments\Client\Model\CompanyV3',
        'cellphone_number' => 'string',
        'watchlist_status_updated_timestamp' => 'string',
        'grace_period_end_date' => '\DateTime',
        'enhanced_kyc_completed' => 'bool',
        'kyc_completed_timestamp' => 'string',
        'pause_payment' => 'bool',
        'pause_payment_timestamp' => 'string',
        'marketing_opt_in_decision' => 'bool',
        'marketing_opt_in_timestamp' => 'string',
        'accept_terms_and_conditions_timestamp' => '\DateTime',
        'challenge' => '\VeloPayments\Client\Model\ChallengeV3'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'payee_id' => 'uuid',
        'payor_refs' => null,
        'email' => 'email',
        'onboarded_status' => null,
        'watchlist_status' => null,
        'watchlist_override_expires_at_timestamp' => 'date-time',
        'watchlist_override_comment' => null,
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
        'watchlist_status_updated_timestamp' => 'date_time',
        'grace_period_end_date' => 'date',
        'enhanced_kyc_completed' => null,
        'kyc_completed_timestamp' => 'date_time',
        'pause_payment' => null,
        'pause_payment_timestamp' => 'date_time',
        'marketing_opt_in_decision' => null,
        'marketing_opt_in_timestamp' => 'date_time',
        'accept_terms_and_conditions_timestamp' => 'date-time',
        'challenge' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'payee_id' => false,
		'payor_refs' => true,
		'email' => true,
		'onboarded_status' => false,
		'watchlist_status' => false,
		'watchlist_override_expires_at_timestamp' => true,
		'watchlist_override_comment' => false,
		'language' => false,
		'created' => false,
		'country' => false,
		'display_name' => false,
		'payee_type' => false,
		'disabled' => false,
		'disabled_comment' => false,
		'disabled_updated_timestamp' => false,
		'address' => false,
		'individual' => false,
		'company' => true,
		'cellphone_number' => false,
		'watchlist_status_updated_timestamp' => true,
		'grace_period_end_date' => true,
		'enhanced_kyc_completed' => false,
		'kyc_completed_timestamp' => true,
		'pause_payment' => false,
		'pause_payment_timestamp' => true,
		'marketing_opt_in_decision' => false,
		'marketing_opt_in_timestamp' => true,
		'accept_terms_and_conditions_timestamp' => true,
		'challenge' => false
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
        'payee_id' => 'payeeId',
        'payor_refs' => 'payorRefs',
        'email' => 'email',
        'onboarded_status' => 'onboardedStatus',
        'watchlist_status' => 'watchlistStatus',
        'watchlist_override_expires_at_timestamp' => 'watchlistOverrideExpiresAtTimestamp',
        'watchlist_override_comment' => 'watchlistOverrideComment',
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
        'watchlist_status_updated_timestamp' => 'watchlistStatusUpdatedTimestamp',
        'grace_period_end_date' => 'gracePeriodEndDate',
        'enhanced_kyc_completed' => 'enhancedKycCompleted',
        'kyc_completed_timestamp' => 'kycCompletedTimestamp',
        'pause_payment' => 'pausePayment',
        'pause_payment_timestamp' => 'pausePaymentTimestamp',
        'marketing_opt_in_decision' => 'marketingOptInDecision',
        'marketing_opt_in_timestamp' => 'marketingOptInTimestamp',
        'accept_terms_and_conditions_timestamp' => 'acceptTermsAndConditionsTimestamp',
        'challenge' => 'challenge'
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
        'watchlist_status' => 'setWatchlistStatus',
        'watchlist_override_expires_at_timestamp' => 'setWatchlistOverrideExpiresAtTimestamp',
        'watchlist_override_comment' => 'setWatchlistOverrideComment',
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
        'watchlist_status_updated_timestamp' => 'setWatchlistStatusUpdatedTimestamp',
        'grace_period_end_date' => 'setGracePeriodEndDate',
        'enhanced_kyc_completed' => 'setEnhancedKycCompleted',
        'kyc_completed_timestamp' => 'setKycCompletedTimestamp',
        'pause_payment' => 'setPausePayment',
        'pause_payment_timestamp' => 'setPausePaymentTimestamp',
        'marketing_opt_in_decision' => 'setMarketingOptInDecision',
        'marketing_opt_in_timestamp' => 'setMarketingOptInTimestamp',
        'accept_terms_and_conditions_timestamp' => 'setAcceptTermsAndConditionsTimestamp',
        'challenge' => 'setChallenge'
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
        'watchlist_status' => 'getWatchlistStatus',
        'watchlist_override_expires_at_timestamp' => 'getWatchlistOverrideExpiresAtTimestamp',
        'watchlist_override_comment' => 'getWatchlistOverrideComment',
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
        'watchlist_status_updated_timestamp' => 'getWatchlistStatusUpdatedTimestamp',
        'grace_period_end_date' => 'getGracePeriodEndDate',
        'enhanced_kyc_completed' => 'getEnhancedKycCompleted',
        'kyc_completed_timestamp' => 'getKycCompletedTimestamp',
        'pause_payment' => 'getPausePayment',
        'pause_payment_timestamp' => 'getPausePaymentTimestamp',
        'marketing_opt_in_decision' => 'getMarketingOptInDecision',
        'marketing_opt_in_timestamp' => 'getMarketingOptInTimestamp',
        'accept_terms_and_conditions_timestamp' => 'getAcceptTermsAndConditionsTimestamp',
        'challenge' => 'getChallenge'
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
        $this->setIfExists('payee_id', $data ?? [], null);
        $this->setIfExists('payor_refs', $data ?? [], null);
        $this->setIfExists('email', $data ?? [], null);
        $this->setIfExists('onboarded_status', $data ?? [], null);
        $this->setIfExists('watchlist_status', $data ?? [], null);
        $this->setIfExists('watchlist_override_expires_at_timestamp', $data ?? [], null);
        $this->setIfExists('watchlist_override_comment', $data ?? [], null);
        $this->setIfExists('language', $data ?? [], null);
        $this->setIfExists('created', $data ?? [], null);
        $this->setIfExists('country', $data ?? [], null);
        $this->setIfExists('display_name', $data ?? [], null);
        $this->setIfExists('payee_type', $data ?? [], null);
        $this->setIfExists('disabled', $data ?? [], null);
        $this->setIfExists('disabled_comment', $data ?? [], null);
        $this->setIfExists('disabled_updated_timestamp', $data ?? [], null);
        $this->setIfExists('address', $data ?? [], null);
        $this->setIfExists('individual', $data ?? [], null);
        $this->setIfExists('company', $data ?? [], null);
        $this->setIfExists('cellphone_number', $data ?? [], null);
        $this->setIfExists('watchlist_status_updated_timestamp', $data ?? [], null);
        $this->setIfExists('grace_period_end_date', $data ?? [], null);
        $this->setIfExists('enhanced_kyc_completed', $data ?? [], null);
        $this->setIfExists('kyc_completed_timestamp', $data ?? [], null);
        $this->setIfExists('pause_payment', $data ?? [], null);
        $this->setIfExists('pause_payment_timestamp', $data ?? [], null);
        $this->setIfExists('marketing_opt_in_decision', $data ?? [], null);
        $this->setIfExists('marketing_opt_in_timestamp', $data ?? [], null);
        $this->setIfExists('accept_terms_and_conditions_timestamp', $data ?? [], null);
        $this->setIfExists('challenge', $data ?? [], null);
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

        if (!is_null($this->container['country']) && (mb_strlen($this->container['country']) > 2)) {
            $invalidProperties[] = "invalid value for 'country', the character length must be smaller than or equal to 2.";
        }

        if (!is_null($this->container['country']) && (mb_strlen($this->container['country']) < 2)) {
            $invalidProperties[] = "invalid value for 'country', the character length must be bigger than or equal to 2.";
        }

        if (!is_null($this->container['country']) && !preg_match("/^[A-Z]{2}$/", $this->container['country'])) {
            $invalidProperties[] = "invalid value for 'country', must be conform to the pattern /^[A-Z]{2}$/.";
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
     * Gets payor_refs
     *
     * @return \VeloPayments\Client\Model\PayeePayorRefV3[]|null
     */
    public function getPayorRefs()
    {
        return $this->container['payor_refs'];
    }

    /**
     * Sets payor_refs
     *
     * @param \VeloPayments\Client\Model\PayeePayorRefV3[]|null $payor_refs payor_refs
     *
     * @return self
     */
    public function setPayorRefs($payor_refs)
    {
        if (is_null($payor_refs)) {
            array_push($this->openAPINullablesSetToNull, 'payor_refs');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('payor_refs', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
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
     * @return self
     */
    public function setEmail($email)
    {
        if (is_null($email)) {
            array_push($this->openAPINullablesSetToNull, 'email');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('email', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets onboarded_status
     *
     * @return string|null
     */
    public function getOnboardedStatus()
    {
        return $this->container['onboarded_status'];
    }

    /**
     * Sets onboarded_status
     *
     * @param string|null $onboarded_status Onboarded status. One of the following values: CREATED, INVITED, REGISTERED, ONBOARDED
     *
     * @return self
     */
    public function setOnboardedStatus($onboarded_status)
    {
        if (is_null($onboarded_status)) {
            throw new \InvalidArgumentException('non-nullable onboarded_status cannot be null');
        }
        $this->container['onboarded_status'] = $onboarded_status;

        return $this;
    }

    /**
     * Gets watchlist_status
     *
     * @return string|null
     */
    public function getWatchlistStatus()
    {
        return $this->container['watchlist_status'];
    }

    /**
     * Sets watchlist_status
     *
     * @param string|null $watchlist_status Current watchlist status. One of the following values: NONE, PENDING, REVIEW, PASSED, FAILED
     *
     * @return self
     */
    public function setWatchlistStatus($watchlist_status)
    {
        if (is_null($watchlist_status)) {
            throw new \InvalidArgumentException('non-nullable watchlist_status cannot be null');
        }
        $this->container['watchlist_status'] = $watchlist_status;

        return $this;
    }

    /**
     * Gets watchlist_override_expires_at_timestamp
     *
     * @return \DateTime|null
     */
    public function getWatchlistOverrideExpiresAtTimestamp()
    {
        return $this->container['watchlist_override_expires_at_timestamp'];
    }

    /**
     * Sets watchlist_override_expires_at_timestamp
     *
     * @param \DateTime|null $watchlist_override_expires_at_timestamp watchlist_override_expires_at_timestamp
     *
     * @return self
     */
    public function setWatchlistOverrideExpiresAtTimestamp($watchlist_override_expires_at_timestamp)
    {
        if (is_null($watchlist_override_expires_at_timestamp)) {
            array_push($this->openAPINullablesSetToNull, 'watchlist_override_expires_at_timestamp');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('watchlist_override_expires_at_timestamp', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['watchlist_override_expires_at_timestamp'] = $watchlist_override_expires_at_timestamp;

        return $this;
    }

    /**
     * Gets watchlist_override_comment
     *
     * @return string|null
     */
    public function getWatchlistOverrideComment()
    {
        return $this->container['watchlist_override_comment'];
    }

    /**
     * Sets watchlist_override_comment
     *
     * @param string|null $watchlist_override_comment watchlist_override_comment
     *
     * @return self
     */
    public function setWatchlistOverrideComment($watchlist_override_comment)
    {
        if (is_null($watchlist_override_comment)) {
            throw new \InvalidArgumentException('non-nullable watchlist_override_comment cannot be null');
        }
        $this->container['watchlist_override_comment'] = $watchlist_override_comment;

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
     * @param string|null $language An IETF BCP 47 language code which has been configured for use within this Velo environment.<BR> See the /v1/supportedLanguages endpoint to list the available codes for an environment.
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
     * @return self
     */
    public function setCreated($created)
    {
        if (is_null($created)) {
            throw new \InvalidArgumentException('non-nullable created cannot be null');
        }
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
     * @param string|null $country Valid ISO 3166 2 character country code. See the <a href=\"https://www.iso.org/iso-3166-country-codes.html\" target=\"_blank\" a>ISO specification</a> for details.
     *
     * @return self
     */
    public function setCountry($country)
    {
        if (is_null($country)) {
            throw new \InvalidArgumentException('non-nullable country cannot be null');
        }
        if ((mb_strlen($country) > 2)) {
            throw new \InvalidArgumentException('invalid length for $country when calling PayeeDetailResponseV3., must be smaller than or equal to 2.');
        }
        if ((mb_strlen($country) < 2)) {
            throw new \InvalidArgumentException('invalid length for $country when calling PayeeDetailResponseV3., must be bigger than or equal to 2.');
        }
        if ((!preg_match("/^[A-Z]{2}$/", ObjectSerializer::toString($country)))) {
            throw new \InvalidArgumentException("invalid value for \$country when calling PayeeDetailResponseV3., must conform to the pattern /^[A-Z]{2}$/.");
        }

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
     * @return self
     */
    public function setDisplayName($display_name)
    {
        if (is_null($display_name)) {
            throw new \InvalidArgumentException('non-nullable display_name cannot be null');
        }
        $this->container['display_name'] = $display_name;

        return $this;
    }

    /**
     * Gets payee_type
     *
     * @return string|null
     */
    public function getPayeeType()
    {
        return $this->container['payee_type'];
    }

    /**
     * Sets payee_type
     *
     * @param string|null $payee_type Type of Payee. One of the following values: Individual, Company
     *
     * @return self
     */
    public function setPayeeType($payee_type)
    {
        if (is_null($payee_type)) {
            throw new \InvalidArgumentException('non-nullable payee_type cannot be null');
        }
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
     * @return self
     */
    public function setDisabled($disabled)
    {
        if (is_null($disabled)) {
            throw new \InvalidArgumentException('non-nullable disabled cannot be null');
        }
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
     * @return self
     */
    public function setDisabledComment($disabled_comment)
    {
        if (is_null($disabled_comment)) {
            throw new \InvalidArgumentException('non-nullable disabled_comment cannot be null');
        }
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
     * @return self
     */
    public function setDisabledUpdatedTimestamp($disabled_updated_timestamp)
    {
        if (is_null($disabled_updated_timestamp)) {
            throw new \InvalidArgumentException('non-nullable disabled_updated_timestamp cannot be null');
        }
        $this->container['disabled_updated_timestamp'] = $disabled_updated_timestamp;

        return $this;
    }

    /**
     * Gets address
     *
     * @return \VeloPayments\Client\Model\PayeeAddressV3|null
     */
    public function getAddress()
    {
        return $this->container['address'];
    }

    /**
     * Sets address
     *
     * @param \VeloPayments\Client\Model\PayeeAddressV3|null $address address
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
     * Gets individual
     *
     * @return \VeloPayments\Client\Model\IndividualV3|null
     */
    public function getIndividual()
    {
        return $this->container['individual'];
    }

    /**
     * Sets individual
     *
     * @param \VeloPayments\Client\Model\IndividualV3|null $individual individual
     *
     * @return self
     */
    public function setIndividual($individual)
    {
        if (is_null($individual)) {
            throw new \InvalidArgumentException('non-nullable individual cannot be null');
        }
        $this->container['individual'] = $individual;

        return $this;
    }

    /**
     * Gets company
     *
     * @return \VeloPayments\Client\Model\CompanyV3|null
     */
    public function getCompany()
    {
        return $this->container['company'];
    }

    /**
     * Sets company
     *
     * @param \VeloPayments\Client\Model\CompanyV3|null $company company
     *
     * @return self
     */
    public function setCompany($company)
    {
        if (is_null($company)) {
            array_push($this->openAPINullablesSetToNull, 'company');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('company', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
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
     * @return self
     */
    public function setCellphoneNumber($cellphone_number)
    {
        if (is_null($cellphone_number)) {
            throw new \InvalidArgumentException('non-nullable cellphone_number cannot be null');
        }
        $this->container['cellphone_number'] = $cellphone_number;

        return $this;
    }

    /**
     * Gets watchlist_status_updated_timestamp
     *
     * @return string|null
     */
    public function getWatchlistStatusUpdatedTimestamp()
    {
        return $this->container['watchlist_status_updated_timestamp'];
    }

    /**
     * Sets watchlist_status_updated_timestamp
     *
     * @param string|null $watchlist_status_updated_timestamp watchlist_status_updated_timestamp
     *
     * @return self
     */
    public function setWatchlistStatusUpdatedTimestamp($watchlist_status_updated_timestamp)
    {
        if (is_null($watchlist_status_updated_timestamp)) {
            array_push($this->openAPINullablesSetToNull, 'watchlist_status_updated_timestamp');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('watchlist_status_updated_timestamp', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['watchlist_status_updated_timestamp'] = $watchlist_status_updated_timestamp;

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
     * @return self
     */
    public function setGracePeriodEndDate($grace_period_end_date)
    {
        if (is_null($grace_period_end_date)) {
            array_push($this->openAPINullablesSetToNull, 'grace_period_end_date');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('grace_period_end_date', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
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
     * @return self
     */
    public function setEnhancedKycCompleted($enhanced_kyc_completed)
    {
        if (is_null($enhanced_kyc_completed)) {
            throw new \InvalidArgumentException('non-nullable enhanced_kyc_completed cannot be null');
        }
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
     * @return self
     */
    public function setKycCompletedTimestamp($kyc_completed_timestamp)
    {
        if (is_null($kyc_completed_timestamp)) {
            array_push($this->openAPINullablesSetToNull, 'kyc_completed_timestamp');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('kyc_completed_timestamp', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
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
     * @return self
     */
    public function setPausePayment($pause_payment)
    {
        if (is_null($pause_payment)) {
            throw new \InvalidArgumentException('non-nullable pause_payment cannot be null');
        }
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
     * @return self
     */
    public function setPausePaymentTimestamp($pause_payment_timestamp)
    {
        if (is_null($pause_payment_timestamp)) {
            array_push($this->openAPINullablesSetToNull, 'pause_payment_timestamp');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('pause_payment_timestamp', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
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
     * @return self
     */
    public function setMarketingOptInDecision($marketing_opt_in_decision)
    {
        if (is_null($marketing_opt_in_decision)) {
            throw new \InvalidArgumentException('non-nullable marketing_opt_in_decision cannot be null');
        }
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
     * @return self
     */
    public function setMarketingOptInTimestamp($marketing_opt_in_timestamp)
    {
        if (is_null($marketing_opt_in_timestamp)) {
            array_push($this->openAPINullablesSetToNull, 'marketing_opt_in_timestamp');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('marketing_opt_in_timestamp', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
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
     * @return self
     */
    public function setAcceptTermsAndConditionsTimestamp($accept_terms_and_conditions_timestamp)
    {
        if (is_null($accept_terms_and_conditions_timestamp)) {
            array_push($this->openAPINullablesSetToNull, 'accept_terms_and_conditions_timestamp');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('accept_terms_and_conditions_timestamp', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['accept_terms_and_conditions_timestamp'] = $accept_terms_and_conditions_timestamp;

        return $this;
    }

    /**
     * Gets challenge
     *
     * @return \VeloPayments\Client\Model\ChallengeV3|null
     */
    public function getChallenge()
    {
        return $this->container['challenge'];
    }

    /**
     * Sets challenge
     *
     * @param \VeloPayments\Client\Model\ChallengeV3|null $challenge challenge
     *
     * @return self
     */
    public function setChallenge($challenge)
    {
        if (is_null($challenge)) {
            throw new \InvalidArgumentException('non-nullable challenge cannot be null');
        }
        $this->container['challenge'] = $challenge;

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


