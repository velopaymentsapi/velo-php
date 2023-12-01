<?php
/**
 * CreatePayeesCSVRequestV3
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
 * CreatePayeesCSVRequestV3 Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CreatePayeesCSVRequestV3 implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CreatePayeesCSVRequestV3';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'type' => '\VeloPayments\Client\Model\PayeeTypeEnum',
        'remote_id' => 'string',
        'email' => 'string',
        'address_line1' => 'string',
        'address_line2' => 'string',
        'address_line3' => 'string',
        'address_line4' => 'string',
        'address_city' => 'string',
        'address_county_or_province' => 'string',
        'address_zip_or_postcode' => 'string',
        'address_country' => 'string',
        'individual_national_identification' => 'string',
        'individual_date_of_birth' => '\DateTime',
        'individual_title' => 'string',
        'individual_first_name' => 'string',
        'individual_other_names' => 'string',
        'individual_last_name' => 'string',
        'company_name' => 'string',
        'company_ein' => 'string',
        'company_operating_name' => 'string',
        'payment_channel_account_number' => 'string',
        'payment_channel_routing_number' => 'string',
        'payment_channel_account_name' => 'string',
        'payment_channel_iban' => 'string',
        'payment_channel_country_code' => 'string',
        'payment_channel_currency' => 'string',
        'challenge_description' => 'string',
        'challenge_value' => 'string',
        'payee_language' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'type' => null,
        'remote_id' => null,
        'email' => 'email',
        'address_line1' => null,
        'address_line2' => null,
        'address_line3' => null,
        'address_line4' => null,
        'address_city' => null,
        'address_county_or_province' => null,
        'address_zip_or_postcode' => null,
        'address_country' => null,
        'individual_national_identification' => null,
        'individual_date_of_birth' => 'date',
        'individual_title' => null,
        'individual_first_name' => null,
        'individual_other_names' => null,
        'individual_last_name' => null,
        'company_name' => null,
        'company_ein' => null,
        'company_operating_name' => null,
        'payment_channel_account_number' => null,
        'payment_channel_routing_number' => null,
        'payment_channel_account_name' => null,
        'payment_channel_iban' => null,
        'payment_channel_country_code' => null,
        'payment_channel_currency' => null,
        'challenge_description' => null,
        'challenge_value' => null,
        'payee_language' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'type' => false,
		'remote_id' => false,
		'email' => false,
		'address_line1' => false,
		'address_line2' => false,
		'address_line3' => false,
		'address_line4' => false,
		'address_city' => false,
		'address_county_or_province' => false,
		'address_zip_or_postcode' => false,
		'address_country' => false,
		'individual_national_identification' => false,
		'individual_date_of_birth' => false,
		'individual_title' => false,
		'individual_first_name' => false,
		'individual_other_names' => false,
		'individual_last_name' => false,
		'company_name' => false,
		'company_ein' => false,
		'company_operating_name' => false,
		'payment_channel_account_number' => false,
		'payment_channel_routing_number' => false,
		'payment_channel_account_name' => false,
		'payment_channel_iban' => false,
		'payment_channel_country_code' => false,
		'payment_channel_currency' => false,
		'challenge_description' => false,
		'challenge_value' => false,
		'payee_language' => false
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
        'type' => 'type',
        'remote_id' => 'remoteId',
        'email' => 'email',
        'address_line1' => 'addressLine1',
        'address_line2' => 'addressLine2',
        'address_line3' => 'addressLine3',
        'address_line4' => 'addressLine4',
        'address_city' => 'addressCity',
        'address_county_or_province' => 'addressCountyOrProvince',
        'address_zip_or_postcode' => 'addressZipOrPostcode',
        'address_country' => 'addressCountry',
        'individual_national_identification' => 'individualNationalIdentification',
        'individual_date_of_birth' => 'individualDateOfBirth',
        'individual_title' => 'individualTitle',
        'individual_first_name' => 'individualFirstName',
        'individual_other_names' => 'individualOtherNames',
        'individual_last_name' => 'individualLastName',
        'company_name' => 'companyName',
        'company_ein' => 'companyEIN',
        'company_operating_name' => 'companyOperatingName',
        'payment_channel_account_number' => 'paymentChannelAccountNumber',
        'payment_channel_routing_number' => 'paymentChannelRoutingNumber',
        'payment_channel_account_name' => 'paymentChannelAccountName',
        'payment_channel_iban' => 'paymentChannelIban',
        'payment_channel_country_code' => 'paymentChannelCountryCode',
        'payment_channel_currency' => 'paymentChannelCurrency',
        'challenge_description' => 'challengeDescription',
        'challenge_value' => 'challengeValue',
        'payee_language' => 'payeeLanguage'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'type' => 'setType',
        'remote_id' => 'setRemoteId',
        'email' => 'setEmail',
        'address_line1' => 'setAddressLine1',
        'address_line2' => 'setAddressLine2',
        'address_line3' => 'setAddressLine3',
        'address_line4' => 'setAddressLine4',
        'address_city' => 'setAddressCity',
        'address_county_or_province' => 'setAddressCountyOrProvince',
        'address_zip_or_postcode' => 'setAddressZipOrPostcode',
        'address_country' => 'setAddressCountry',
        'individual_national_identification' => 'setIndividualNationalIdentification',
        'individual_date_of_birth' => 'setIndividualDateOfBirth',
        'individual_title' => 'setIndividualTitle',
        'individual_first_name' => 'setIndividualFirstName',
        'individual_other_names' => 'setIndividualOtherNames',
        'individual_last_name' => 'setIndividualLastName',
        'company_name' => 'setCompanyName',
        'company_ein' => 'setCompanyEin',
        'company_operating_name' => 'setCompanyOperatingName',
        'payment_channel_account_number' => 'setPaymentChannelAccountNumber',
        'payment_channel_routing_number' => 'setPaymentChannelRoutingNumber',
        'payment_channel_account_name' => 'setPaymentChannelAccountName',
        'payment_channel_iban' => 'setPaymentChannelIban',
        'payment_channel_country_code' => 'setPaymentChannelCountryCode',
        'payment_channel_currency' => 'setPaymentChannelCurrency',
        'challenge_description' => 'setChallengeDescription',
        'challenge_value' => 'setChallengeValue',
        'payee_language' => 'setPayeeLanguage'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'type' => 'getType',
        'remote_id' => 'getRemoteId',
        'email' => 'getEmail',
        'address_line1' => 'getAddressLine1',
        'address_line2' => 'getAddressLine2',
        'address_line3' => 'getAddressLine3',
        'address_line4' => 'getAddressLine4',
        'address_city' => 'getAddressCity',
        'address_county_or_province' => 'getAddressCountyOrProvince',
        'address_zip_or_postcode' => 'getAddressZipOrPostcode',
        'address_country' => 'getAddressCountry',
        'individual_national_identification' => 'getIndividualNationalIdentification',
        'individual_date_of_birth' => 'getIndividualDateOfBirth',
        'individual_title' => 'getIndividualTitle',
        'individual_first_name' => 'getIndividualFirstName',
        'individual_other_names' => 'getIndividualOtherNames',
        'individual_last_name' => 'getIndividualLastName',
        'company_name' => 'getCompanyName',
        'company_ein' => 'getCompanyEin',
        'company_operating_name' => 'getCompanyOperatingName',
        'payment_channel_account_number' => 'getPaymentChannelAccountNumber',
        'payment_channel_routing_number' => 'getPaymentChannelRoutingNumber',
        'payment_channel_account_name' => 'getPaymentChannelAccountName',
        'payment_channel_iban' => 'getPaymentChannelIban',
        'payment_channel_country_code' => 'getPaymentChannelCountryCode',
        'payment_channel_currency' => 'getPaymentChannelCurrency',
        'challenge_description' => 'getChallengeDescription',
        'challenge_value' => 'getChallengeValue',
        'payee_language' => 'getPayeeLanguage'
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
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('remote_id', $data ?? [], null);
        $this->setIfExists('email', $data ?? [], null);
        $this->setIfExists('address_line1', $data ?? [], null);
        $this->setIfExists('address_line2', $data ?? [], null);
        $this->setIfExists('address_line3', $data ?? [], null);
        $this->setIfExists('address_line4', $data ?? [], null);
        $this->setIfExists('address_city', $data ?? [], null);
        $this->setIfExists('address_county_or_province', $data ?? [], null);
        $this->setIfExists('address_zip_or_postcode', $data ?? [], null);
        $this->setIfExists('address_country', $data ?? [], null);
        $this->setIfExists('individual_national_identification', $data ?? [], null);
        $this->setIfExists('individual_date_of_birth', $data ?? [], null);
        $this->setIfExists('individual_title', $data ?? [], null);
        $this->setIfExists('individual_first_name', $data ?? [], null);
        $this->setIfExists('individual_other_names', $data ?? [], null);
        $this->setIfExists('individual_last_name', $data ?? [], null);
        $this->setIfExists('company_name', $data ?? [], null);
        $this->setIfExists('company_ein', $data ?? [], null);
        $this->setIfExists('company_operating_name', $data ?? [], null);
        $this->setIfExists('payment_channel_account_number', $data ?? [], null);
        $this->setIfExists('payment_channel_routing_number', $data ?? [], null);
        $this->setIfExists('payment_channel_account_name', $data ?? [], null);
        $this->setIfExists('payment_channel_iban', $data ?? [], null);
        $this->setIfExists('payment_channel_country_code', $data ?? [], null);
        $this->setIfExists('payment_channel_currency', $data ?? [], null);
        $this->setIfExists('challenge_description', $data ?? [], null);
        $this->setIfExists('challenge_value', $data ?? [], null);
        $this->setIfExists('payee_language', $data ?? [], null);
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

        if ($this->container['type'] === null) {
            $invalidProperties[] = "'type' can't be null";
        }
        if ($this->container['remote_id'] === null) {
            $invalidProperties[] = "'remote_id' can't be null";
        }
        if ((mb_strlen($this->container['remote_id']) > 100)) {
            $invalidProperties[] = "invalid value for 'remote_id', the character length must be smaller than or equal to 100.";
        }

        if ((mb_strlen($this->container['remote_id']) < 1)) {
            $invalidProperties[] = "invalid value for 'remote_id', the character length must be bigger than or equal to 1.";
        }

        if ($this->container['email'] === null) {
            $invalidProperties[] = "'email' can't be null";
        }
        if ((mb_strlen($this->container['email']) > 255)) {
            $invalidProperties[] = "invalid value for 'email', the character length must be smaller than or equal to 255.";
        }

        if ((mb_strlen($this->container['email']) < 3)) {
            $invalidProperties[] = "invalid value for 'email', the character length must be bigger than or equal to 3.";
        }

        if ($this->container['address_line1'] === null) {
            $invalidProperties[] = "'address_line1' can't be null";
        }
        if ((mb_strlen($this->container['address_line1']) > 100)) {
            $invalidProperties[] = "invalid value for 'address_line1', the character length must be smaller than or equal to 100.";
        }

        if ((mb_strlen($this->container['address_line1']) < 2)) {
            $invalidProperties[] = "invalid value for 'address_line1', the character length must be bigger than or equal to 2.";
        }

        if (!is_null($this->container['address_line2']) && (mb_strlen($this->container['address_line2']) > 100)) {
            $invalidProperties[] = "invalid value for 'address_line2', the character length must be smaller than or equal to 100.";
        }

        if (!is_null($this->container['address_line2']) && (mb_strlen($this->container['address_line2']) < 0)) {
            $invalidProperties[] = "invalid value for 'address_line2', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['address_line3']) && (mb_strlen($this->container['address_line3']) > 100)) {
            $invalidProperties[] = "invalid value for 'address_line3', the character length must be smaller than or equal to 100.";
        }

        if (!is_null($this->container['address_line3']) && (mb_strlen($this->container['address_line3']) < 0)) {
            $invalidProperties[] = "invalid value for 'address_line3', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['address_line4']) && (mb_strlen($this->container['address_line4']) > 100)) {
            $invalidProperties[] = "invalid value for 'address_line4', the character length must be smaller than or equal to 100.";
        }

        if (!is_null($this->container['address_line4']) && (mb_strlen($this->container['address_line4']) < 0)) {
            $invalidProperties[] = "invalid value for 'address_line4', the character length must be bigger than or equal to 0.";
        }

        if ($this->container['address_city'] === null) {
            $invalidProperties[] = "'address_city' can't be null";
        }
        if ((mb_strlen($this->container['address_city']) > 50)) {
            $invalidProperties[] = "invalid value for 'address_city', the character length must be smaller than or equal to 50.";
        }

        if ((mb_strlen($this->container['address_city']) < 2)) {
            $invalidProperties[] = "invalid value for 'address_city', the character length must be bigger than or equal to 2.";
        }

        if (!is_null($this->container['address_county_or_province']) && (mb_strlen($this->container['address_county_or_province']) > 50)) {
            $invalidProperties[] = "invalid value for 'address_county_or_province', the character length must be smaller than or equal to 50.";
        }

        if (!is_null($this->container['address_county_or_province']) && (mb_strlen($this->container['address_county_or_province']) < 1)) {
            $invalidProperties[] = "invalid value for 'address_county_or_province', the character length must be bigger than or equal to 1.";
        }

        if ($this->container['address_zip_or_postcode'] === null) {
            $invalidProperties[] = "'address_zip_or_postcode' can't be null";
        }
        if ((mb_strlen($this->container['address_zip_or_postcode']) > 60)) {
            $invalidProperties[] = "invalid value for 'address_zip_or_postcode', the character length must be smaller than or equal to 60.";
        }

        if ((mb_strlen($this->container['address_zip_or_postcode']) < 1)) {
            $invalidProperties[] = "invalid value for 'address_zip_or_postcode', the character length must be bigger than or equal to 1.";
        }

        if ($this->container['address_country'] === null) {
            $invalidProperties[] = "'address_country' can't be null";
        }
        if ((mb_strlen($this->container['address_country']) > 2)) {
            $invalidProperties[] = "invalid value for 'address_country', the character length must be smaller than or equal to 2.";
        }

        if ((mb_strlen($this->container['address_country']) < 2)) {
            $invalidProperties[] = "invalid value for 'address_country', the character length must be bigger than or equal to 2.";
        }

        if (!preg_match("/^[A-Z]{2}$/", $this->container['address_country'])) {
            $invalidProperties[] = "invalid value for 'address_country', must be conform to the pattern /^[A-Z]{2}$/.";
        }

        if (!is_null($this->container['individual_national_identification']) && (mb_strlen($this->container['individual_national_identification']) > 30)) {
            $invalidProperties[] = "invalid value for 'individual_national_identification', the character length must be smaller than or equal to 30.";
        }

        if (!is_null($this->container['individual_national_identification']) && (mb_strlen($this->container['individual_national_identification']) < 6)) {
            $invalidProperties[] = "invalid value for 'individual_national_identification', the character length must be bigger than or equal to 6.";
        }

        if (!is_null($this->container['individual_title']) && (mb_strlen($this->container['individual_title']) > 40)) {
            $invalidProperties[] = "invalid value for 'individual_title', the character length must be smaller than or equal to 40.";
        }

        if (!is_null($this->container['individual_title']) && (mb_strlen($this->container['individual_title']) < 1)) {
            $invalidProperties[] = "invalid value for 'individual_title', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['individual_first_name']) && (mb_strlen($this->container['individual_first_name']) > 40)) {
            $invalidProperties[] = "invalid value for 'individual_first_name', the character length must be smaller than or equal to 40.";
        }

        if (!is_null($this->container['individual_first_name']) && (mb_strlen($this->container['individual_first_name']) < 1)) {
            $invalidProperties[] = "invalid value for 'individual_first_name', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['individual_other_names']) && (mb_strlen($this->container['individual_other_names']) > 40)) {
            $invalidProperties[] = "invalid value for 'individual_other_names', the character length must be smaller than or equal to 40.";
        }

        if (!is_null($this->container['individual_other_names']) && (mb_strlen($this->container['individual_other_names']) < 1)) {
            $invalidProperties[] = "invalid value for 'individual_other_names', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['individual_last_name']) && (mb_strlen($this->container['individual_last_name']) > 40)) {
            $invalidProperties[] = "invalid value for 'individual_last_name', the character length must be smaller than or equal to 40.";
        }

        if (!is_null($this->container['individual_last_name']) && (mb_strlen($this->container['individual_last_name']) < 1)) {
            $invalidProperties[] = "invalid value for 'individual_last_name', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['company_name']) && (mb_strlen($this->container['company_name']) > 40)) {
            $invalidProperties[] = "invalid value for 'company_name', the character length must be smaller than or equal to 40.";
        }

        if (!is_null($this->container['company_name']) && (mb_strlen($this->container['company_name']) < 1)) {
            $invalidProperties[] = "invalid value for 'company_name', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['company_ein']) && (mb_strlen($this->container['company_ein']) > 30)) {
            $invalidProperties[] = "invalid value for 'company_ein', the character length must be smaller than or equal to 30.";
        }

        if (!is_null($this->container['company_ein']) && (mb_strlen($this->container['company_ein']) < 6)) {
            $invalidProperties[] = "invalid value for 'company_ein', the character length must be bigger than or equal to 6.";
        }

        if (!is_null($this->container['company_operating_name']) && (mb_strlen($this->container['company_operating_name']) > 100)) {
            $invalidProperties[] = "invalid value for 'company_operating_name', the character length must be smaller than or equal to 100.";
        }

        if (!is_null($this->container['company_operating_name']) && (mb_strlen($this->container['company_operating_name']) < 1)) {
            $invalidProperties[] = "invalid value for 'company_operating_name', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['payment_channel_account_number']) && (mb_strlen($this->container['payment_channel_account_number']) > 17)) {
            $invalidProperties[] = "invalid value for 'payment_channel_account_number', the character length must be smaller than or equal to 17.";
        }

        if (!is_null($this->container['payment_channel_account_number']) && (mb_strlen($this->container['payment_channel_account_number']) < 6)) {
            $invalidProperties[] = "invalid value for 'payment_channel_account_number', the character length must be bigger than or equal to 6.";
        }

        if (!is_null($this->container['payment_channel_routing_number']) && (mb_strlen($this->container['payment_channel_routing_number']) > 9)) {
            $invalidProperties[] = "invalid value for 'payment_channel_routing_number', the character length must be smaller than or equal to 9.";
        }

        if (!is_null($this->container['payment_channel_routing_number']) && (mb_strlen($this->container['payment_channel_routing_number']) < 9)) {
            $invalidProperties[] = "invalid value for 'payment_channel_routing_number', the character length must be bigger than or equal to 9.";
        }

        if (!is_null($this->container['payment_channel_iban']) && (mb_strlen($this->container['payment_channel_iban']) > 34)) {
            $invalidProperties[] = "invalid value for 'payment_channel_iban', the character length must be smaller than or equal to 34.";
        }

        if (!is_null($this->container['payment_channel_iban']) && (mb_strlen($this->container['payment_channel_iban']) < 15)) {
            $invalidProperties[] = "invalid value for 'payment_channel_iban', the character length must be bigger than or equal to 15.";
        }

        if (!is_null($this->container['payment_channel_iban']) && !preg_match("/^[A-Za-z0-9]+$/", $this->container['payment_channel_iban'])) {
            $invalidProperties[] = "invalid value for 'payment_channel_iban', must be conform to the pattern /^[A-Za-z0-9]+$/.";
        }

        if (!is_null($this->container['payment_channel_country_code']) && (mb_strlen($this->container['payment_channel_country_code']) > 2)) {
            $invalidProperties[] = "invalid value for 'payment_channel_country_code', the character length must be smaller than or equal to 2.";
        }

        if (!is_null($this->container['payment_channel_country_code']) && (mb_strlen($this->container['payment_channel_country_code']) < 2)) {
            $invalidProperties[] = "invalid value for 'payment_channel_country_code', the character length must be bigger than or equal to 2.";
        }

        if (!is_null($this->container['payment_channel_country_code']) && !preg_match("/^[A-Z]{2}$/", $this->container['payment_channel_country_code'])) {
            $invalidProperties[] = "invalid value for 'payment_channel_country_code', must be conform to the pattern /^[A-Z]{2}$/.";
        }

        if (!is_null($this->container['payment_channel_currency']) && (mb_strlen($this->container['payment_channel_currency']) > 3)) {
            $invalidProperties[] = "invalid value for 'payment_channel_currency', the character length must be smaller than or equal to 3.";
        }

        if (!is_null($this->container['payment_channel_currency']) && (mb_strlen($this->container['payment_channel_currency']) < 3)) {
            $invalidProperties[] = "invalid value for 'payment_channel_currency', the character length must be bigger than or equal to 3.";
        }

        if (!is_null($this->container['challenge_description']) && (mb_strlen($this->container['challenge_description']) > 255)) {
            $invalidProperties[] = "invalid value for 'challenge_description', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['challenge_description']) && (mb_strlen($this->container['challenge_description']) < 1)) {
            $invalidProperties[] = "invalid value for 'challenge_description', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['challenge_value']) && (mb_strlen($this->container['challenge_value']) > 20)) {
            $invalidProperties[] = "invalid value for 'challenge_value', the character length must be smaller than or equal to 20.";
        }

        if (!is_null($this->container['challenge_value']) && (mb_strlen($this->container['challenge_value']) < 3)) {
            $invalidProperties[] = "invalid value for 'challenge_value', the character length must be bigger than or equal to 3.";
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
     * Gets type
     *
     * @return \VeloPayments\Client\Model\PayeeTypeEnum
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param \VeloPayments\Client\Model\PayeeTypeEnum $type type
     *
     * @return self
     */
    public function setType($type)
    {
        if (is_null($type)) {
            throw new \InvalidArgumentException('non-nullable type cannot be null');
        }
        $this->container['type'] = $type;

        return $this;
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
     * @param string $remote_id remote_id
     *
     * @return self
     */
    public function setRemoteId($remote_id)
    {
        if (is_null($remote_id)) {
            throw new \InvalidArgumentException('non-nullable remote_id cannot be null');
        }
        if ((mb_strlen($remote_id) > 100)) {
            throw new \InvalidArgumentException('invalid length for $remote_id when calling CreatePayeesCSVRequestV3., must be smaller than or equal to 100.');
        }
        if ((mb_strlen($remote_id) < 1)) {
            throw new \InvalidArgumentException('invalid length for $remote_id when calling CreatePayeesCSVRequestV3., must be bigger than or equal to 1.');
        }

        $this->container['remote_id'] = $remote_id;

        return $this;
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
     * @param string $email email
     *
     * @return self
     */
    public function setEmail($email)
    {
        if (is_null($email)) {
            throw new \InvalidArgumentException('non-nullable email cannot be null');
        }
        if ((mb_strlen($email) > 255)) {
            throw new \InvalidArgumentException('invalid length for $email when calling CreatePayeesCSVRequestV3., must be smaller than or equal to 255.');
        }
        if ((mb_strlen($email) < 3)) {
            throw new \InvalidArgumentException('invalid length for $email when calling CreatePayeesCSVRequestV3., must be bigger than or equal to 3.');
        }

        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets address_line1
     *
     * @return string
     */
    public function getAddressLine1()
    {
        return $this->container['address_line1'];
    }

    /**
     * Sets address_line1
     *
     * @param string $address_line1 address_line1
     *
     * @return self
     */
    public function setAddressLine1($address_line1)
    {
        if (is_null($address_line1)) {
            throw new \InvalidArgumentException('non-nullable address_line1 cannot be null');
        }
        if ((mb_strlen($address_line1) > 100)) {
            throw new \InvalidArgumentException('invalid length for $address_line1 when calling CreatePayeesCSVRequestV3., must be smaller than or equal to 100.');
        }
        if ((mb_strlen($address_line1) < 2)) {
            throw new \InvalidArgumentException('invalid length for $address_line1 when calling CreatePayeesCSVRequestV3., must be bigger than or equal to 2.');
        }

        $this->container['address_line1'] = $address_line1;

        return $this;
    }

    /**
     * Gets address_line2
     *
     * @return string|null
     */
    public function getAddressLine2()
    {
        return $this->container['address_line2'];
    }

    /**
     * Sets address_line2
     *
     * @param string|null $address_line2 address_line2
     *
     * @return self
     */
    public function setAddressLine2($address_line2)
    {
        if (is_null($address_line2)) {
            throw new \InvalidArgumentException('non-nullable address_line2 cannot be null');
        }
        if ((mb_strlen($address_line2) > 100)) {
            throw new \InvalidArgumentException('invalid length for $address_line2 when calling CreatePayeesCSVRequestV3., must be smaller than or equal to 100.');
        }
        if ((mb_strlen($address_line2) < 0)) {
            throw new \InvalidArgumentException('invalid length for $address_line2 when calling CreatePayeesCSVRequestV3., must be bigger than or equal to 0.');
        }

        $this->container['address_line2'] = $address_line2;

        return $this;
    }

    /**
     * Gets address_line3
     *
     * @return string|null
     */
    public function getAddressLine3()
    {
        return $this->container['address_line3'];
    }

    /**
     * Sets address_line3
     *
     * @param string|null $address_line3 address_line3
     *
     * @return self
     */
    public function setAddressLine3($address_line3)
    {
        if (is_null($address_line3)) {
            throw new \InvalidArgumentException('non-nullable address_line3 cannot be null');
        }
        if ((mb_strlen($address_line3) > 100)) {
            throw new \InvalidArgumentException('invalid length for $address_line3 when calling CreatePayeesCSVRequestV3., must be smaller than or equal to 100.');
        }
        if ((mb_strlen($address_line3) < 0)) {
            throw new \InvalidArgumentException('invalid length for $address_line3 when calling CreatePayeesCSVRequestV3., must be bigger than or equal to 0.');
        }

        $this->container['address_line3'] = $address_line3;

        return $this;
    }

    /**
     * Gets address_line4
     *
     * @return string|null
     */
    public function getAddressLine4()
    {
        return $this->container['address_line4'];
    }

    /**
     * Sets address_line4
     *
     * @param string|null $address_line4 address_line4
     *
     * @return self
     */
    public function setAddressLine4($address_line4)
    {
        if (is_null($address_line4)) {
            throw new \InvalidArgumentException('non-nullable address_line4 cannot be null');
        }
        if ((mb_strlen($address_line4) > 100)) {
            throw new \InvalidArgumentException('invalid length for $address_line4 when calling CreatePayeesCSVRequestV3., must be smaller than or equal to 100.');
        }
        if ((mb_strlen($address_line4) < 0)) {
            throw new \InvalidArgumentException('invalid length for $address_line4 when calling CreatePayeesCSVRequestV3., must be bigger than or equal to 0.');
        }

        $this->container['address_line4'] = $address_line4;

        return $this;
    }

    /**
     * Gets address_city
     *
     * @return string
     */
    public function getAddressCity()
    {
        return $this->container['address_city'];
    }

    /**
     * Sets address_city
     *
     * @param string $address_city address_city
     *
     * @return self
     */
    public function setAddressCity($address_city)
    {
        if (is_null($address_city)) {
            throw new \InvalidArgumentException('non-nullable address_city cannot be null');
        }
        if ((mb_strlen($address_city) > 50)) {
            throw new \InvalidArgumentException('invalid length for $address_city when calling CreatePayeesCSVRequestV3., must be smaller than or equal to 50.');
        }
        if ((mb_strlen($address_city) < 2)) {
            throw new \InvalidArgumentException('invalid length for $address_city when calling CreatePayeesCSVRequestV3., must be bigger than or equal to 2.');
        }

        $this->container['address_city'] = $address_city;

        return $this;
    }

    /**
     * Gets address_county_or_province
     *
     * @return string|null
     */
    public function getAddressCountyOrProvince()
    {
        return $this->container['address_county_or_province'];
    }

    /**
     * Sets address_county_or_province
     *
     * @param string|null $address_county_or_province address_county_or_province
     *
     * @return self
     */
    public function setAddressCountyOrProvince($address_county_or_province)
    {
        if (is_null($address_county_or_province)) {
            throw new \InvalidArgumentException('non-nullable address_county_or_province cannot be null');
        }
        if ((mb_strlen($address_county_or_province) > 50)) {
            throw new \InvalidArgumentException('invalid length for $address_county_or_province when calling CreatePayeesCSVRequestV3., must be smaller than or equal to 50.');
        }
        if ((mb_strlen($address_county_or_province) < 1)) {
            throw new \InvalidArgumentException('invalid length for $address_county_or_province when calling CreatePayeesCSVRequestV3., must be bigger than or equal to 1.');
        }

        $this->container['address_county_or_province'] = $address_county_or_province;

        return $this;
    }

    /**
     * Gets address_zip_or_postcode
     *
     * @return string
     */
    public function getAddressZipOrPostcode()
    {
        return $this->container['address_zip_or_postcode'];
    }

    /**
     * Sets address_zip_or_postcode
     *
     * @param string $address_zip_or_postcode address_zip_or_postcode
     *
     * @return self
     */
    public function setAddressZipOrPostcode($address_zip_or_postcode)
    {
        if (is_null($address_zip_or_postcode)) {
            throw new \InvalidArgumentException('non-nullable address_zip_or_postcode cannot be null');
        }
        if ((mb_strlen($address_zip_or_postcode) > 60)) {
            throw new \InvalidArgumentException('invalid length for $address_zip_or_postcode when calling CreatePayeesCSVRequestV3., must be smaller than or equal to 60.');
        }
        if ((mb_strlen($address_zip_or_postcode) < 1)) {
            throw new \InvalidArgumentException('invalid length for $address_zip_or_postcode when calling CreatePayeesCSVRequestV3., must be bigger than or equal to 1.');
        }

        $this->container['address_zip_or_postcode'] = $address_zip_or_postcode;

        return $this;
    }

    /**
     * Gets address_country
     *
     * @return string
     */
    public function getAddressCountry()
    {
        return $this->container['address_country'];
    }

    /**
     * Sets address_country
     *
     * @param string $address_country Valid ISO 3166 2 character country code. See the <a href=\"https://www.iso.org/iso-3166-country-codes.html\" target=\"_blank\" a>ISO specification</a> for details.
     *
     * @return self
     */
    public function setAddressCountry($address_country)
    {
        if (is_null($address_country)) {
            throw new \InvalidArgumentException('non-nullable address_country cannot be null');
        }
        if ((mb_strlen($address_country) > 2)) {
            throw new \InvalidArgumentException('invalid length for $address_country when calling CreatePayeesCSVRequestV3., must be smaller than or equal to 2.');
        }
        if ((mb_strlen($address_country) < 2)) {
            throw new \InvalidArgumentException('invalid length for $address_country when calling CreatePayeesCSVRequestV3., must be bigger than or equal to 2.');
        }
        if ((!preg_match("/^[A-Z]{2}$/", ObjectSerializer::toString($address_country)))) {
            throw new \InvalidArgumentException("invalid value for \$address_country when calling CreatePayeesCSVRequestV3., must conform to the pattern /^[A-Z]{2}$/.");
        }

        $this->container['address_country'] = $address_country;

        return $this;
    }

    /**
     * Gets individual_national_identification
     *
     * @return string|null
     */
    public function getIndividualNationalIdentification()
    {
        return $this->container['individual_national_identification'];
    }

    /**
     * Sets individual_national_identification
     *
     * @param string|null $individual_national_identification individual_national_identification
     *
     * @return self
     */
    public function setIndividualNationalIdentification($individual_national_identification)
    {
        if (is_null($individual_national_identification)) {
            throw new \InvalidArgumentException('non-nullable individual_national_identification cannot be null');
        }
        if ((mb_strlen($individual_national_identification) > 30)) {
            throw new \InvalidArgumentException('invalid length for $individual_national_identification when calling CreatePayeesCSVRequestV3., must be smaller than or equal to 30.');
        }
        if ((mb_strlen($individual_national_identification) < 6)) {
            throw new \InvalidArgumentException('invalid length for $individual_national_identification when calling CreatePayeesCSVRequestV3., must be bigger than or equal to 6.');
        }

        $this->container['individual_national_identification'] = $individual_national_identification;

        return $this;
    }

    /**
     * Gets individual_date_of_birth
     *
     * @return \DateTime|null
     */
    public function getIndividualDateOfBirth()
    {
        return $this->container['individual_date_of_birth'];
    }

    /**
     * Sets individual_date_of_birth
     *
     * @param \DateTime|null $individual_date_of_birth Must not be date in future. Example - 1970-05-20
     *
     * @return self
     */
    public function setIndividualDateOfBirth($individual_date_of_birth)
    {
        if (is_null($individual_date_of_birth)) {
            throw new \InvalidArgumentException('non-nullable individual_date_of_birth cannot be null');
        }
        $this->container['individual_date_of_birth'] = $individual_date_of_birth;

        return $this;
    }

    /**
     * Gets individual_title
     *
     * @return string|null
     */
    public function getIndividualTitle()
    {
        return $this->container['individual_title'];
    }

    /**
     * Sets individual_title
     *
     * @param string|null $individual_title individual_title
     *
     * @return self
     */
    public function setIndividualTitle($individual_title)
    {
        if (is_null($individual_title)) {
            throw new \InvalidArgumentException('non-nullable individual_title cannot be null');
        }
        if ((mb_strlen($individual_title) > 40)) {
            throw new \InvalidArgumentException('invalid length for $individual_title when calling CreatePayeesCSVRequestV3., must be smaller than or equal to 40.');
        }
        if ((mb_strlen($individual_title) < 1)) {
            throw new \InvalidArgumentException('invalid length for $individual_title when calling CreatePayeesCSVRequestV3., must be bigger than or equal to 1.');
        }

        $this->container['individual_title'] = $individual_title;

        return $this;
    }

    /**
     * Gets individual_first_name
     *
     * @return string|null
     */
    public function getIndividualFirstName()
    {
        return $this->container['individual_first_name'];
    }

    /**
     * Sets individual_first_name
     *
     * @param string|null $individual_first_name individual_first_name
     *
     * @return self
     */
    public function setIndividualFirstName($individual_first_name)
    {
        if (is_null($individual_first_name)) {
            throw new \InvalidArgumentException('non-nullable individual_first_name cannot be null');
        }
        if ((mb_strlen($individual_first_name) > 40)) {
            throw new \InvalidArgumentException('invalid length for $individual_first_name when calling CreatePayeesCSVRequestV3., must be smaller than or equal to 40.');
        }
        if ((mb_strlen($individual_first_name) < 1)) {
            throw new \InvalidArgumentException('invalid length for $individual_first_name when calling CreatePayeesCSVRequestV3., must be bigger than or equal to 1.');
        }

        $this->container['individual_first_name'] = $individual_first_name;

        return $this;
    }

    /**
     * Gets individual_other_names
     *
     * @return string|null
     */
    public function getIndividualOtherNames()
    {
        return $this->container['individual_other_names'];
    }

    /**
     * Sets individual_other_names
     *
     * @param string|null $individual_other_names individual_other_names
     *
     * @return self
     */
    public function setIndividualOtherNames($individual_other_names)
    {
        if (is_null($individual_other_names)) {
            throw new \InvalidArgumentException('non-nullable individual_other_names cannot be null');
        }
        if ((mb_strlen($individual_other_names) > 40)) {
            throw new \InvalidArgumentException('invalid length for $individual_other_names when calling CreatePayeesCSVRequestV3., must be smaller than or equal to 40.');
        }
        if ((mb_strlen($individual_other_names) < 1)) {
            throw new \InvalidArgumentException('invalid length for $individual_other_names when calling CreatePayeesCSVRequestV3., must be bigger than or equal to 1.');
        }

        $this->container['individual_other_names'] = $individual_other_names;

        return $this;
    }

    /**
     * Gets individual_last_name
     *
     * @return string|null
     */
    public function getIndividualLastName()
    {
        return $this->container['individual_last_name'];
    }

    /**
     * Sets individual_last_name
     *
     * @param string|null $individual_last_name individual_last_name
     *
     * @return self
     */
    public function setIndividualLastName($individual_last_name)
    {
        if (is_null($individual_last_name)) {
            throw new \InvalidArgumentException('non-nullable individual_last_name cannot be null');
        }
        if ((mb_strlen($individual_last_name) > 40)) {
            throw new \InvalidArgumentException('invalid length for $individual_last_name when calling CreatePayeesCSVRequestV3., must be smaller than or equal to 40.');
        }
        if ((mb_strlen($individual_last_name) < 1)) {
            throw new \InvalidArgumentException('invalid length for $individual_last_name when calling CreatePayeesCSVRequestV3., must be bigger than or equal to 1.');
        }

        $this->container['individual_last_name'] = $individual_last_name;

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
     * @param string|null $company_name company_name
     *
     * @return self
     */
    public function setCompanyName($company_name)
    {
        if (is_null($company_name)) {
            throw new \InvalidArgumentException('non-nullable company_name cannot be null');
        }
        if ((mb_strlen($company_name) > 40)) {
            throw new \InvalidArgumentException('invalid length for $company_name when calling CreatePayeesCSVRequestV3., must be smaller than or equal to 40.');
        }
        if ((mb_strlen($company_name) < 1)) {
            throw new \InvalidArgumentException('invalid length for $company_name when calling CreatePayeesCSVRequestV3., must be bigger than or equal to 1.');
        }

        $this->container['company_name'] = $company_name;

        return $this;
    }

    /**
     * Gets company_ein
     *
     * @return string|null
     */
    public function getCompanyEin()
    {
        return $this->container['company_ein'];
    }

    /**
     * Sets company_ein
     *
     * @param string|null $company_ein company_ein
     *
     * @return self
     */
    public function setCompanyEin($company_ein)
    {
        if (is_null($company_ein)) {
            throw new \InvalidArgumentException('non-nullable company_ein cannot be null');
        }
        if ((mb_strlen($company_ein) > 30)) {
            throw new \InvalidArgumentException('invalid length for $company_ein when calling CreatePayeesCSVRequestV3., must be smaller than or equal to 30.');
        }
        if ((mb_strlen($company_ein) < 6)) {
            throw new \InvalidArgumentException('invalid length for $company_ein when calling CreatePayeesCSVRequestV3., must be bigger than or equal to 6.');
        }

        $this->container['company_ein'] = $company_ein;

        return $this;
    }

    /**
     * Gets company_operating_name
     *
     * @return string|null
     */
    public function getCompanyOperatingName()
    {
        return $this->container['company_operating_name'];
    }

    /**
     * Sets company_operating_name
     *
     * @param string|null $company_operating_name company_operating_name
     *
     * @return self
     */
    public function setCompanyOperatingName($company_operating_name)
    {
        if (is_null($company_operating_name)) {
            throw new \InvalidArgumentException('non-nullable company_operating_name cannot be null');
        }
        if ((mb_strlen($company_operating_name) > 100)) {
            throw new \InvalidArgumentException('invalid length for $company_operating_name when calling CreatePayeesCSVRequestV3., must be smaller than or equal to 100.');
        }
        if ((mb_strlen($company_operating_name) < 1)) {
            throw new \InvalidArgumentException('invalid length for $company_operating_name when calling CreatePayeesCSVRequestV3., must be bigger than or equal to 1.');
        }

        $this->container['company_operating_name'] = $company_operating_name;

        return $this;
    }

    /**
     * Gets payment_channel_account_number
     *
     * @return string|null
     */
    public function getPaymentChannelAccountNumber()
    {
        return $this->container['payment_channel_account_number'];
    }

    /**
     * Sets payment_channel_account_number
     *
     * @param string|null $payment_channel_account_number Either routing number and account number or only iban must be set
     *
     * @return self
     */
    public function setPaymentChannelAccountNumber($payment_channel_account_number)
    {
        if (is_null($payment_channel_account_number)) {
            throw new \InvalidArgumentException('non-nullable payment_channel_account_number cannot be null');
        }
        if ((mb_strlen($payment_channel_account_number) > 17)) {
            throw new \InvalidArgumentException('invalid length for $payment_channel_account_number when calling CreatePayeesCSVRequestV3., must be smaller than or equal to 17.');
        }
        if ((mb_strlen($payment_channel_account_number) < 6)) {
            throw new \InvalidArgumentException('invalid length for $payment_channel_account_number when calling CreatePayeesCSVRequestV3., must be bigger than or equal to 6.');
        }

        $this->container['payment_channel_account_number'] = $payment_channel_account_number;

        return $this;
    }

    /**
     * Gets payment_channel_routing_number
     *
     * @return string|null
     */
    public function getPaymentChannelRoutingNumber()
    {
        return $this->container['payment_channel_routing_number'];
    }

    /**
     * Sets payment_channel_routing_number
     *
     * @param string|null $payment_channel_routing_number Either routing number and account number or only iban must be set
     *
     * @return self
     */
    public function setPaymentChannelRoutingNumber($payment_channel_routing_number)
    {
        if (is_null($payment_channel_routing_number)) {
            throw new \InvalidArgumentException('non-nullable payment_channel_routing_number cannot be null');
        }
        if ((mb_strlen($payment_channel_routing_number) > 9)) {
            throw new \InvalidArgumentException('invalid length for $payment_channel_routing_number when calling CreatePayeesCSVRequestV3., must be smaller than or equal to 9.');
        }
        if ((mb_strlen($payment_channel_routing_number) < 9)) {
            throw new \InvalidArgumentException('invalid length for $payment_channel_routing_number when calling CreatePayeesCSVRequestV3., must be bigger than or equal to 9.');
        }

        $this->container['payment_channel_routing_number'] = $payment_channel_routing_number;

        return $this;
    }

    /**
     * Gets payment_channel_account_name
     *
     * @return string|null
     */
    public function getPaymentChannelAccountName()
    {
        return $this->container['payment_channel_account_name'];
    }

    /**
     * Sets payment_channel_account_name
     *
     * @param string|null $payment_channel_account_name payment_channel_account_name
     *
     * @return self
     */
    public function setPaymentChannelAccountName($payment_channel_account_name)
    {
        if (is_null($payment_channel_account_name)) {
            throw new \InvalidArgumentException('non-nullable payment_channel_account_name cannot be null');
        }
        $this->container['payment_channel_account_name'] = $payment_channel_account_name;

        return $this;
    }

    /**
     * Gets payment_channel_iban
     *
     * @return string|null
     */
    public function getPaymentChannelIban()
    {
        return $this->container['payment_channel_iban'];
    }

    /**
     * Sets payment_channel_iban
     *
     * @param string|null $payment_channel_iban Must match the regular expression ```^[A-Za-z0-9]+$```.
     *
     * @return self
     */
    public function setPaymentChannelIban($payment_channel_iban)
    {
        if (is_null($payment_channel_iban)) {
            throw new \InvalidArgumentException('non-nullable payment_channel_iban cannot be null');
        }
        if ((mb_strlen($payment_channel_iban) > 34)) {
            throw new \InvalidArgumentException('invalid length for $payment_channel_iban when calling CreatePayeesCSVRequestV3., must be smaller than or equal to 34.');
        }
        if ((mb_strlen($payment_channel_iban) < 15)) {
            throw new \InvalidArgumentException('invalid length for $payment_channel_iban when calling CreatePayeesCSVRequestV3., must be bigger than or equal to 15.');
        }
        if ((!preg_match("/^[A-Za-z0-9]+$/", ObjectSerializer::toString($payment_channel_iban)))) {
            throw new \InvalidArgumentException("invalid value for \$payment_channel_iban when calling CreatePayeesCSVRequestV3., must conform to the pattern /^[A-Za-z0-9]+$/.");
        }

        $this->container['payment_channel_iban'] = $payment_channel_iban;

        return $this;
    }

    /**
     * Gets payment_channel_country_code
     *
     * @return string|null
     */
    public function getPaymentChannelCountryCode()
    {
        return $this->container['payment_channel_country_code'];
    }

    /**
     * Sets payment_channel_country_code
     *
     * @param string|null $payment_channel_country_code Valid ISO 3166 2 character country code. See the <a href=\"https://www.iso.org/iso-3166-country-codes.html\" target=\"_blank\" a>ISO specification</a> for details.
     *
     * @return self
     */
    public function setPaymentChannelCountryCode($payment_channel_country_code)
    {
        if (is_null($payment_channel_country_code)) {
            throw new \InvalidArgumentException('non-nullable payment_channel_country_code cannot be null');
        }
        if ((mb_strlen($payment_channel_country_code) > 2)) {
            throw new \InvalidArgumentException('invalid length for $payment_channel_country_code when calling CreatePayeesCSVRequestV3., must be smaller than or equal to 2.');
        }
        if ((mb_strlen($payment_channel_country_code) < 2)) {
            throw new \InvalidArgumentException('invalid length for $payment_channel_country_code when calling CreatePayeesCSVRequestV3., must be bigger than or equal to 2.');
        }
        if ((!preg_match("/^[A-Z]{2}$/", ObjectSerializer::toString($payment_channel_country_code)))) {
            throw new \InvalidArgumentException("invalid value for \$payment_channel_country_code when calling CreatePayeesCSVRequestV3., must conform to the pattern /^[A-Z]{2}$/.");
        }

        $this->container['payment_channel_country_code'] = $payment_channel_country_code;

        return $this;
    }

    /**
     * Gets payment_channel_currency
     *
     * @return string|null
     */
    public function getPaymentChannelCurrency()
    {
        return $this->container['payment_channel_currency'];
    }

    /**
     * Sets payment_channel_currency
     *
     * @param string|null $payment_channel_currency payment_channel_currency
     *
     * @return self
     */
    public function setPaymentChannelCurrency($payment_channel_currency)
    {
        if (is_null($payment_channel_currency)) {
            throw new \InvalidArgumentException('non-nullable payment_channel_currency cannot be null');
        }
        if ((mb_strlen($payment_channel_currency) > 3)) {
            throw new \InvalidArgumentException('invalid length for $payment_channel_currency when calling CreatePayeesCSVRequestV3., must be smaller than or equal to 3.');
        }
        if ((mb_strlen($payment_channel_currency) < 3)) {
            throw new \InvalidArgumentException('invalid length for $payment_channel_currency when calling CreatePayeesCSVRequestV3., must be bigger than or equal to 3.');
        }

        $this->container['payment_channel_currency'] = $payment_channel_currency;

        return $this;
    }

    /**
     * Gets challenge_description
     *
     * @return string|null
     */
    public function getChallengeDescription()
    {
        return $this->container['challenge_description'];
    }

    /**
     * Sets challenge_description
     *
     * @param string|null $challenge_description challenge_description
     *
     * @return self
     */
    public function setChallengeDescription($challenge_description)
    {
        if (is_null($challenge_description)) {
            throw new \InvalidArgumentException('non-nullable challenge_description cannot be null');
        }
        if ((mb_strlen($challenge_description) > 255)) {
            throw new \InvalidArgumentException('invalid length for $challenge_description when calling CreatePayeesCSVRequestV3., must be smaller than or equal to 255.');
        }
        if ((mb_strlen($challenge_description) < 1)) {
            throw new \InvalidArgumentException('invalid length for $challenge_description when calling CreatePayeesCSVRequestV3., must be bigger than or equal to 1.');
        }

        $this->container['challenge_description'] = $challenge_description;

        return $this;
    }

    /**
     * Gets challenge_value
     *
     * @return string|null
     */
    public function getChallengeValue()
    {
        return $this->container['challenge_value'];
    }

    /**
     * Sets challenge_value
     *
     * @param string|null $challenge_value challenge_value
     *
     * @return self
     */
    public function setChallengeValue($challenge_value)
    {
        if (is_null($challenge_value)) {
            throw new \InvalidArgumentException('non-nullable challenge_value cannot be null');
        }
        if ((mb_strlen($challenge_value) > 20)) {
            throw new \InvalidArgumentException('invalid length for $challenge_value when calling CreatePayeesCSVRequestV3., must be smaller than or equal to 20.');
        }
        if ((mb_strlen($challenge_value) < 3)) {
            throw new \InvalidArgumentException('invalid length for $challenge_value when calling CreatePayeesCSVRequestV3., must be bigger than or equal to 3.');
        }

        $this->container['challenge_value'] = $challenge_value;

        return $this;
    }

    /**
     * Gets payee_language
     *
     * @return string|null
     */
    public function getPayeeLanguage()
    {
        return $this->container['payee_language'];
    }

    /**
     * Sets payee_language
     *
     * @param string|null $payee_language An IETF BCP 47 language code which has been configured for use within this Velo environment.<BR> See the /v1/supportedLanguages endpoint to list the available codes for an environment.
     *
     * @return self
     */
    public function setPayeeLanguage($payee_language)
    {
        if (is_null($payee_language)) {
            throw new \InvalidArgumentException('non-nullable payee_language cannot be null');
        }
        $this->container['payee_language'] = $payee_language;

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


