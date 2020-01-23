<?php
/**
 * CreatePayee
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
 * CreatePayee Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class CreatePayee implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CreatePayee';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'payee_id' => 'string',
        'payor_refs' => '\VeloPayments\Client\Model\PayeePayorRef2[]',
        'email' => 'string',
        'remote_id' => 'string',
        'type' => '\VeloPayments\Client\Model\PayeeType',
        'address' => '\VeloPayments\Client\Model\CreatePayeeAddress',
        'payment_channel' => '\VeloPayments\Client\Model\CreatePaymentChannel',
        'challenge' => '\VeloPayments\Client\Model\Challenge',
        'language' => '\VeloPayments\Client\Model\Language',
        'company' => '\VeloPayments\Client\Model\CompanyV1',
        'individual' => '\VeloPayments\Client\Model\CreateIndividual'
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
        'remote_id' => null,
        'type' => null,
        'address' => null,
        'payment_channel' => null,
        'challenge' => null,
        'language' => null,
        'company' => null,
        'individual' => null
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
        'remote_id' => 'remoteId',
        'type' => 'type',
        'address' => 'address',
        'payment_channel' => 'paymentChannel',
        'challenge' => 'challenge',
        'language' => 'language',
        'company' => 'company',
        'individual' => 'individual'
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
        'remote_id' => 'setRemoteId',
        'type' => 'setType',
        'address' => 'setAddress',
        'payment_channel' => 'setPaymentChannel',
        'challenge' => 'setChallenge',
        'language' => 'setLanguage',
        'company' => 'setCompany',
        'individual' => 'setIndividual'
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
        'remote_id' => 'getRemoteId',
        'type' => 'getType',
        'address' => 'getAddress',
        'payment_channel' => 'getPaymentChannel',
        'challenge' => 'getChallenge',
        'language' => 'getLanguage',
        'company' => 'getCompany',
        'individual' => 'getIndividual'
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
        $this->container['remote_id'] = isset($data['remote_id']) ? $data['remote_id'] : null;
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
        $this->container['address'] = isset($data['address']) ? $data['address'] : null;
        $this->container['payment_channel'] = isset($data['payment_channel']) ? $data['payment_channel'] : null;
        $this->container['challenge'] = isset($data['challenge']) ? $data['challenge'] : null;
        $this->container['language'] = isset($data['language']) ? $data['language'] : null;
        $this->container['company'] = isset($data['company']) ? $data['company'] : null;
        $this->container['individual'] = isset($data['individual']) ? $data['individual'] : null;
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
        if ((mb_strlen($this->container['email']) > 255)) {
            $invalidProperties[] = "invalid value for 'email', the character length must be smaller than or equal to 255.";
        }

        if ((mb_strlen($this->container['email']) < 3)) {
            $invalidProperties[] = "invalid value for 'email', the character length must be bigger than or equal to 3.";
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

        if ($this->container['type'] === null) {
            $invalidProperties[] = "'type' can't be null";
        }
        if ($this->container['address'] === null) {
            $invalidProperties[] = "'address' can't be null";
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
     * @return \VeloPayments\Client\Model\PayeePayorRef2[]|null
     */
    public function getPayorRefs()
    {
        return $this->container['payor_refs'];
    }

    /**
     * Sets payor_refs
     *
     * @param \VeloPayments\Client\Model\PayeePayorRef2[]|null $payor_refs payor_refs
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
     * @return $this
     */
    public function setEmail($email)
    {
        if ((mb_strlen($email) > 255)) {
            throw new \InvalidArgumentException('invalid length for $email when calling CreatePayee., must be smaller than or equal to 255.');
        }
        if ((mb_strlen($email) < 3)) {
            throw new \InvalidArgumentException('invalid length for $email when calling CreatePayee., must be bigger than or equal to 3.');
        }

        $this->container['email'] = $email;

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
     * @return $this
     */
    public function setRemoteId($remote_id)
    {
        if ((mb_strlen($remote_id) > 100)) {
            throw new \InvalidArgumentException('invalid length for $remote_id when calling CreatePayee., must be smaller than or equal to 100.');
        }
        if ((mb_strlen($remote_id) < 1)) {
            throw new \InvalidArgumentException('invalid length for $remote_id when calling CreatePayee., must be bigger than or equal to 1.');
        }

        $this->container['remote_id'] = $remote_id;

        return $this;
    }

    /**
     * Gets type
     *
     * @return \VeloPayments\Client\Model\PayeeType
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param \VeloPayments\Client\Model\PayeeType $type type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets address
     *
     * @return \VeloPayments\Client\Model\CreatePayeeAddress
     */
    public function getAddress()
    {
        return $this->container['address'];
    }

    /**
     * Sets address
     *
     * @param \VeloPayments\Client\Model\CreatePayeeAddress $address address
     *
     * @return $this
     */
    public function setAddress($address)
    {
        $this->container['address'] = $address;

        return $this;
    }

    /**
     * Gets payment_channel
     *
     * @return \VeloPayments\Client\Model\CreatePaymentChannel|null
     */
    public function getPaymentChannel()
    {
        return $this->container['payment_channel'];
    }

    /**
     * Sets payment_channel
     *
     * @param \VeloPayments\Client\Model\CreatePaymentChannel|null $payment_channel payment_channel
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
     * Gets company
     *
     * @return \VeloPayments\Client\Model\CompanyV1|null
     */
    public function getCompany()
    {
        return $this->container['company'];
    }

    /**
     * Sets company
     *
     * @param \VeloPayments\Client\Model\CompanyV1|null $company company
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
     * @return \VeloPayments\Client\Model\CreateIndividual|null
     */
    public function getIndividual()
    {
        return $this->container['individual'];
    }

    /**
     * Sets individual
     *
     * @param \VeloPayments\Client\Model\CreateIndividual|null $individual individual
     *
     * @return $this
     */
    public function setIndividual($individual)
    {
        $this->container['individual'] = $individual;

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


