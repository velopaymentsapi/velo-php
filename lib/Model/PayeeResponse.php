<?php
/**
 * PayeeResponse
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
 * The version of the OpenAPI document: 2.17.8
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
 * PayeeResponse Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class PayeeResponse implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PayeeResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'payee_id' => 'string',
        'payor_refs' => '\VeloPayments\Client\Model\PayeePayorRef[]',
        'email' => 'string',
        'address' => '\VeloPayments\Client\Model\PayeeAddress',
        'country' => 'string',
        'display_name' => 'string',
        'payment_channel' => '\VeloPayments\Client\Model\PayeePaymentChannel',
        'challenge' => '\VeloPayments\Client\Model\Challenge',
        'language' => '\VeloPayments\Client\Model\Language',
        'accept_terms_and_conditions_timestamp' => '\DateTime',
        'cellphone_number' => 'string',
        'payee_type' => '\VeloPayments\Client\Model\PayeeType',
        'company' => '\VeloPayments\Client\Model\CompanyResponse',
        'individual' => '\VeloPayments\Client\Model\IndividualResponse',
        'created' => '\DateTime',
        'grace_period_end_date' => '\DateTime',
        'last_ofac_check_timestamp' => 'string',
        'marketing_opt_ins' => '\VeloPayments\Client\Model\MarketingOptIn[]',
        'ofac_status' => '\VeloPayments\Client\Model\OfacStatus',
        'onboarded_status' => '\VeloPayments\Client\Model\OnboardedStatus'
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
        'address' => null,
        'country' => null,
        'display_name' => null,
        'payment_channel' => null,
        'challenge' => null,
        'language' => null,
        'accept_terms_and_conditions_timestamp' => 'date-time',
        'cellphone_number' => null,
        'payee_type' => null,
        'company' => null,
        'individual' => null,
        'created' => 'date-time',
        'grace_period_end_date' => 'date',
        'last_ofac_check_timestamp' => 'date_time',
        'marketing_opt_ins' => null,
        'ofac_status' => null,
        'onboarded_status' => null
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
        'address' => 'address',
        'country' => 'country',
        'display_name' => 'displayName',
        'payment_channel' => 'paymentChannel',
        'challenge' => 'challenge',
        'language' => 'language',
        'accept_terms_and_conditions_timestamp' => 'acceptTermsAndConditionsTimestamp',
        'cellphone_number' => 'cellphoneNumber',
        'payee_type' => 'payeeType',
        'company' => 'company',
        'individual' => 'individual',
        'created' => 'created',
        'grace_period_end_date' => 'gracePeriodEndDate',
        'last_ofac_check_timestamp' => 'lastOfacCheckTimestamp',
        'marketing_opt_ins' => 'marketingOptIns',
        'ofac_status' => 'ofacStatus',
        'onboarded_status' => 'onboardedStatus'
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
        'address' => 'setAddress',
        'country' => 'setCountry',
        'display_name' => 'setDisplayName',
        'payment_channel' => 'setPaymentChannel',
        'challenge' => 'setChallenge',
        'language' => 'setLanguage',
        'accept_terms_and_conditions_timestamp' => 'setAcceptTermsAndConditionsTimestamp',
        'cellphone_number' => 'setCellphoneNumber',
        'payee_type' => 'setPayeeType',
        'company' => 'setCompany',
        'individual' => 'setIndividual',
        'created' => 'setCreated',
        'grace_period_end_date' => 'setGracePeriodEndDate',
        'last_ofac_check_timestamp' => 'setLastOfacCheckTimestamp',
        'marketing_opt_ins' => 'setMarketingOptIns',
        'ofac_status' => 'setOfacStatus',
        'onboarded_status' => 'setOnboardedStatus'
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
        'address' => 'getAddress',
        'country' => 'getCountry',
        'display_name' => 'getDisplayName',
        'payment_channel' => 'getPaymentChannel',
        'challenge' => 'getChallenge',
        'language' => 'getLanguage',
        'accept_terms_and_conditions_timestamp' => 'getAcceptTermsAndConditionsTimestamp',
        'cellphone_number' => 'getCellphoneNumber',
        'payee_type' => 'getPayeeType',
        'company' => 'getCompany',
        'individual' => 'getIndividual',
        'created' => 'getCreated',
        'grace_period_end_date' => 'getGracePeriodEndDate',
        'last_ofac_check_timestamp' => 'getLastOfacCheckTimestamp',
        'marketing_opt_ins' => 'getMarketingOptIns',
        'ofac_status' => 'getOfacStatus',
        'onboarded_status' => 'getOnboardedStatus'
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
        $this->container['address'] = isset($data['address']) ? $data['address'] : null;
        $this->container['country'] = isset($data['country']) ? $data['country'] : null;
        $this->container['display_name'] = isset($data['display_name']) ? $data['display_name'] : null;
        $this->container['payment_channel'] = isset($data['payment_channel']) ? $data['payment_channel'] : null;
        $this->container['challenge'] = isset($data['challenge']) ? $data['challenge'] : null;
        $this->container['language'] = isset($data['language']) ? $data['language'] : null;
        $this->container['accept_terms_and_conditions_timestamp'] = isset($data['accept_terms_and_conditions_timestamp']) ? $data['accept_terms_and_conditions_timestamp'] : null;
        $this->container['cellphone_number'] = isset($data['cellphone_number']) ? $data['cellphone_number'] : null;
        $this->container['payee_type'] = isset($data['payee_type']) ? $data['payee_type'] : null;
        $this->container['company'] = isset($data['company']) ? $data['company'] : null;
        $this->container['individual'] = isset($data['individual']) ? $data['individual'] : null;
        $this->container['created'] = isset($data['created']) ? $data['created'] : null;
        $this->container['grace_period_end_date'] = isset($data['grace_period_end_date']) ? $data['grace_period_end_date'] : null;
        $this->container['last_ofac_check_timestamp'] = isset($data['last_ofac_check_timestamp']) ? $data['last_ofac_check_timestamp'] : null;
        $this->container['marketing_opt_ins'] = isset($data['marketing_opt_ins']) ? $data['marketing_opt_ins'] : null;
        $this->container['ofac_status'] = isset($data['ofac_status']) ? $data['ofac_status'] : null;
        $this->container['onboarded_status'] = isset($data['onboarded_status']) ? $data['onboarded_status'] : null;
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
     * @return \VeloPayments\Client\Model\PayeePayorRef[]|null
     */
    public function getPayorRefs()
    {
        return $this->container['payor_refs'];
    }

    /**
     * Sets payor_refs
     *
     * @param \VeloPayments\Client\Model\PayeePayorRef[]|null $payor_refs payor_refs
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
     * Gets address
     *
     * @return \VeloPayments\Client\Model\PayeeAddress|null
     */
    public function getAddress()
    {
        return $this->container['address'];
    }

    /**
     * Sets address
     *
     * @param \VeloPayments\Client\Model\PayeeAddress|null $address address
     *
     * @return $this
     */
    public function setAddress($address)
    {
        $this->container['address'] = $address;

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
     * Gets payment_channel
     *
     * @return \VeloPayments\Client\Model\PayeePaymentChannel|null
     */
    public function getPaymentChannel()
    {
        return $this->container['payment_channel'];
    }

    /**
     * Sets payment_channel
     *
     * @param \VeloPayments\Client\Model\PayeePaymentChannel|null $payment_channel payment_channel
     *
     * @return $this
     */
    public function setPaymentChannel($payment_channel)
    {
        $this->container['payment_channel'] = $payment_channel;

        return $this;
    }

    /**
     * Gets challenge
     *
     * @return \VeloPayments\Client\Model\Challenge|null
     */
    public function getChallenge()
    {
        return $this->container['challenge'];
    }

    /**
     * Sets challenge
     *
     * @param \VeloPayments\Client\Model\Challenge|null $challenge challenge
     *
     * @return $this
     */
    public function setChallenge($challenge)
    {
        $this->container['challenge'] = $challenge;

        return $this;
    }

    /**
     * Gets language
     *
     * @return \VeloPayments\Client\Model\Language|null
     */
    public function getLanguage()
    {
        return $this->container['language'];
    }

    /**
     * Sets language
     *
     * @param \VeloPayments\Client\Model\Language|null $language language
     *
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->container['language'] = $language;

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
     * Gets company
     *
     * @return \VeloPayments\Client\Model\CompanyResponse|null
     */
    public function getCompany()
    {
        return $this->container['company'];
    }

    /**
     * Sets company
     *
     * @param \VeloPayments\Client\Model\CompanyResponse|null $company company
     *
     * @return $this
     */
    public function setCompany($company)
    {
        $this->container['company'] = $company;

        return $this;
    }

    /**
     * Gets individual
     *
     * @return \VeloPayments\Client\Model\IndividualResponse|null
     */
    public function getIndividual()
    {
        return $this->container['individual'];
    }

    /**
     * Sets individual
     *
     * @param \VeloPayments\Client\Model\IndividualResponse|null $individual individual
     *
     * @return $this
     */
    public function setIndividual($individual)
    {
        $this->container['individual'] = $individual;

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
     * Gets marketing_opt_ins
     *
     * @return \VeloPayments\Client\Model\MarketingOptIn[]|null
     */
    public function getMarketingOptIns()
    {
        return $this->container['marketing_opt_ins'];
    }

    /**
     * Sets marketing_opt_ins
     *
     * @param \VeloPayments\Client\Model\MarketingOptIn[]|null $marketing_opt_ins marketing_opt_ins
     *
     * @return $this
     */
    public function setMarketingOptIns($marketing_opt_ins)
    {
        $this->container['marketing_opt_ins'] = $marketing_opt_ins;

        return $this;
    }

    /**
     * Gets ofac_status
     *
     * @return \VeloPayments\Client\Model\OfacStatus|null
     */
    public function getOfacStatus()
    {
        return $this->container['ofac_status'];
    }

    /**
     * Sets ofac_status
     *
     * @param \VeloPayments\Client\Model\OfacStatus|null $ofac_status ofac_status
     *
     * @return $this
     */
    public function setOfacStatus($ofac_status)
    {
        $this->container['ofac_status'] = $ofac_status;

        return $this;
    }

    /**
     * Gets onboarded_status
     *
     * @return \VeloPayments\Client\Model\OnboardedStatus|null
     */
    public function getOnboardedStatus()
    {
        return $this->container['onboarded_status'];
    }

    /**
     * Sets onboarded_status
     *
     * @param \VeloPayments\Client\Model\OnboardedStatus|null $onboarded_status onboarded_status
     *
     * @return $this
     */
    public function setOnboardedStatus($onboarded_status)
    {
        $this->container['onboarded_status'] = $onboarded_status;

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


