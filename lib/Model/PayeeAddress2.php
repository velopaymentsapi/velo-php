<?php
/**
 * PayeeAddress2
 *
 * PHP version 7.2
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
 * The version of the OpenAPI document: 2.22.122
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.0.0-SNAPSHOT
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
 * PayeeAddress2 Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class PayeeAddress2 implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PayeeAddress_2';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'line1' => 'string',
        'line2' => 'string',
        'line3' => 'string',
        'line4' => 'string',
        'city' => 'string',
        'county_or_province' => 'string',
        'zip_or_postcode' => 'string',
        'country' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'line1' => null,
        'line2' => null,
        'line3' => null,
        'line4' => null,
        'city' => null,
        'county_or_province' => null,
        'zip_or_postcode' => null,
        'country' => null
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
        'line1' => 'line1',
        'line2' => 'line2',
        'line3' => 'line3',
        'line4' => 'line4',
        'city' => 'city',
        'county_or_province' => 'countyOrProvince',
        'zip_or_postcode' => 'zipOrPostcode',
        'country' => 'country'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'line1' => 'setLine1',
        'line2' => 'setLine2',
        'line3' => 'setLine3',
        'line4' => 'setLine4',
        'city' => 'setCity',
        'county_or_province' => 'setCountyOrProvince',
        'zip_or_postcode' => 'setZipOrPostcode',
        'country' => 'setCountry'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'line1' => 'getLine1',
        'line2' => 'getLine2',
        'line3' => 'getLine3',
        'line4' => 'getLine4',
        'city' => 'getCity',
        'county_or_province' => 'getCountyOrProvince',
        'zip_or_postcode' => 'getZipOrPostcode',
        'country' => 'getCountry'
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
        $this->container['line1'] = isset($data['line1']) ? $data['line1'] : null;
        $this->container['line2'] = isset($data['line2']) ? $data['line2'] : null;
        $this->container['line3'] = isset($data['line3']) ? $data['line3'] : null;
        $this->container['line4'] = isset($data['line4']) ? $data['line4'] : null;
        $this->container['city'] = isset($data['city']) ? $data['city'] : null;
        $this->container['county_or_province'] = isset($data['county_or_province']) ? $data['county_or_province'] : null;
        $this->container['zip_or_postcode'] = isset($data['zip_or_postcode']) ? $data['zip_or_postcode'] : null;
        $this->container['country'] = isset($data['country']) ? $data['country'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['line1'] === null) {
            $invalidProperties[] = "'line1' can't be null";
        }
        if ((mb_strlen($this->container['line1']) > 255)) {
            $invalidProperties[] = "invalid value for 'line1', the character length must be smaller than or equal to 255.";
        }

        if ((mb_strlen($this->container['line1']) < 2)) {
            $invalidProperties[] = "invalid value for 'line1', the character length must be bigger than or equal to 2.";
        }

        if (!is_null($this->container['line2']) && (mb_strlen($this->container['line2']) > 255)) {
            $invalidProperties[] = "invalid value for 'line2', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['line2']) && (mb_strlen($this->container['line2']) < 0)) {
            $invalidProperties[] = "invalid value for 'line2', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['line3']) && (mb_strlen($this->container['line3']) > 255)) {
            $invalidProperties[] = "invalid value for 'line3', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['line3']) && (mb_strlen($this->container['line3']) < 0)) {
            $invalidProperties[] = "invalid value for 'line3', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['line4']) && (mb_strlen($this->container['line4']) > 255)) {
            $invalidProperties[] = "invalid value for 'line4', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['line4']) && (mb_strlen($this->container['line4']) < 0)) {
            $invalidProperties[] = "invalid value for 'line4', the character length must be bigger than or equal to 0.";
        }

        if ($this->container['city'] === null) {
            $invalidProperties[] = "'city' can't be null";
        }
        if ((mb_strlen($this->container['city']) > 100)) {
            $invalidProperties[] = "invalid value for 'city', the character length must be smaller than or equal to 100.";
        }

        if ((mb_strlen($this->container['city']) < 2)) {
            $invalidProperties[] = "invalid value for 'city', the character length must be bigger than or equal to 2.";
        }

        if (!is_null($this->container['county_or_province']) && (mb_strlen($this->container['county_or_province']) > 100)) {
            $invalidProperties[] = "invalid value for 'county_or_province', the character length must be smaller than or equal to 100.";
        }

        if (!is_null($this->container['county_or_province']) && (mb_strlen($this->container['county_or_province']) < 2)) {
            $invalidProperties[] = "invalid value for 'county_or_province', the character length must be bigger than or equal to 2.";
        }

        if (!is_null($this->container['zip_or_postcode']) && (mb_strlen($this->container['zip_or_postcode']) > 30)) {
            $invalidProperties[] = "invalid value for 'zip_or_postcode', the character length must be smaller than or equal to 30.";
        }

        if (!is_null($this->container['zip_or_postcode']) && (mb_strlen($this->container['zip_or_postcode']) < 2)) {
            $invalidProperties[] = "invalid value for 'zip_or_postcode', the character length must be bigger than or equal to 2.";
        }

        if ($this->container['country'] === null) {
            $invalidProperties[] = "'country' can't be null";
        }
        if ((mb_strlen($this->container['country']) > 50)) {
            $invalidProperties[] = "invalid value for 'country', the character length must be smaller than or equal to 50.";
        }

        if ((mb_strlen($this->container['country']) < 2)) {
            $invalidProperties[] = "invalid value for 'country', the character length must be bigger than or equal to 2.";
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
     * Gets line1
     *
     * @return string
     */
    public function getLine1()
    {
        return $this->container['line1'];
    }

    /**
     * Sets line1
     *
     * @param string $line1 line1
     *
     * @return $this
     */
    public function setLine1($line1)
    {
        if ((mb_strlen($line1) > 255)) {
            throw new \InvalidArgumentException('invalid length for $line1 when calling PayeeAddress2., must be smaller than or equal to 255.');
        }
        if ((mb_strlen($line1) < 2)) {
            throw new \InvalidArgumentException('invalid length for $line1 when calling PayeeAddress2., must be bigger than or equal to 2.');
        }

        $this->container['line1'] = $line1;

        return $this;
    }

    /**
     * Gets line2
     *
     * @return string|null
     */
    public function getLine2()
    {
        return $this->container['line2'];
    }

    /**
     * Sets line2
     *
     * @param string|null $line2 line2
     *
     * @return $this
     */
    public function setLine2($line2)
    {
        if (!is_null($line2) && (mb_strlen($line2) > 255)) {
            throw new \InvalidArgumentException('invalid length for $line2 when calling PayeeAddress2., must be smaller than or equal to 255.');
        }
        if (!is_null($line2) && (mb_strlen($line2) < 0)) {
            throw new \InvalidArgumentException('invalid length for $line2 when calling PayeeAddress2., must be bigger than or equal to 0.');
        }

        $this->container['line2'] = $line2;

        return $this;
    }

    /**
     * Gets line3
     *
     * @return string|null
     */
    public function getLine3()
    {
        return $this->container['line3'];
    }

    /**
     * Sets line3
     *
     * @param string|null $line3 line3
     *
     * @return $this
     */
    public function setLine3($line3)
    {
        if (!is_null($line3) && (mb_strlen($line3) > 255)) {
            throw new \InvalidArgumentException('invalid length for $line3 when calling PayeeAddress2., must be smaller than or equal to 255.');
        }
        if (!is_null($line3) && (mb_strlen($line3) < 0)) {
            throw new \InvalidArgumentException('invalid length for $line3 when calling PayeeAddress2., must be bigger than or equal to 0.');
        }

        $this->container['line3'] = $line3;

        return $this;
    }

    /**
     * Gets line4
     *
     * @return string|null
     */
    public function getLine4()
    {
        return $this->container['line4'];
    }

    /**
     * Sets line4
     *
     * @param string|null $line4 line4
     *
     * @return $this
     */
    public function setLine4($line4)
    {
        if (!is_null($line4) && (mb_strlen($line4) > 255)) {
            throw new \InvalidArgumentException('invalid length for $line4 when calling PayeeAddress2., must be smaller than or equal to 255.');
        }
        if (!is_null($line4) && (mb_strlen($line4) < 0)) {
            throw new \InvalidArgumentException('invalid length for $line4 when calling PayeeAddress2., must be bigger than or equal to 0.');
        }

        $this->container['line4'] = $line4;

        return $this;
    }

    /**
     * Gets city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->container['city'];
    }

    /**
     * Sets city
     *
     * @param string $city city
     *
     * @return $this
     */
    public function setCity($city)
    {
        if ((mb_strlen($city) > 100)) {
            throw new \InvalidArgumentException('invalid length for $city when calling PayeeAddress2., must be smaller than or equal to 100.');
        }
        if ((mb_strlen($city) < 2)) {
            throw new \InvalidArgumentException('invalid length for $city when calling PayeeAddress2., must be bigger than or equal to 2.');
        }

        $this->container['city'] = $city;

        return $this;
    }

    /**
     * Gets county_or_province
     *
     * @return string|null
     */
    public function getCountyOrProvince()
    {
        return $this->container['county_or_province'];
    }

    /**
     * Sets county_or_province
     *
     * @param string|null $county_or_province county_or_province
     *
     * @return $this
     */
    public function setCountyOrProvince($county_or_province)
    {
        if (!is_null($county_or_province) && (mb_strlen($county_or_province) > 100)) {
            throw new \InvalidArgumentException('invalid length for $county_or_province when calling PayeeAddress2., must be smaller than or equal to 100.');
        }
        if (!is_null($county_or_province) && (mb_strlen($county_or_province) < 2)) {
            throw new \InvalidArgumentException('invalid length for $county_or_province when calling PayeeAddress2., must be bigger than or equal to 2.');
        }

        $this->container['county_or_province'] = $county_or_province;

        return $this;
    }

    /**
     * Gets zip_or_postcode
     *
     * @return string|null
     */
    public function getZipOrPostcode()
    {
        return $this->container['zip_or_postcode'];
    }

    /**
     * Sets zip_or_postcode
     *
     * @param string|null $zip_or_postcode zip_or_postcode
     *
     * @return $this
     */
    public function setZipOrPostcode($zip_or_postcode)
    {
        if (!is_null($zip_or_postcode) && (mb_strlen($zip_or_postcode) > 30)) {
            throw new \InvalidArgumentException('invalid length for $zip_or_postcode when calling PayeeAddress2., must be smaller than or equal to 30.');
        }
        if (!is_null($zip_or_postcode) && (mb_strlen($zip_or_postcode) < 2)) {
            throw new \InvalidArgumentException('invalid length for $zip_or_postcode when calling PayeeAddress2., must be bigger than or equal to 2.');
        }

        $this->container['zip_or_postcode'] = $zip_or_postcode;

        return $this;
    }

    /**
     * Gets country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->container['country'];
    }

    /**
     * Sets country
     *
     * @param string $country country
     *
     * @return $this
     */
    public function setCountry($country)
    {
        if ((mb_strlen($country) > 50)) {
            throw new \InvalidArgumentException('invalid length for $country when calling PayeeAddress2., must be smaller than or equal to 50.');
        }
        if ((mb_strlen($country) < 2)) {
            throw new \InvalidArgumentException('invalid length for $country when calling PayeeAddress2., must be bigger than or equal to 2.');
        }

        $this->container['country'] = $country;

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

