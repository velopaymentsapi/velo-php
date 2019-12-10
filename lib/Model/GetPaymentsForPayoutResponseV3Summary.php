<?php
/**
 * GetPaymentsForPayoutResponseV3Summary
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
 * GetPaymentsForPayoutResponseV3Summary Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class GetPaymentsForPayoutResponseV3Summary implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'GetPaymentsForPayoutResponseV3_summary';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'payout_status' => 'string',
        'submitted_date_time' => '\DateTime',
        'instructed_date_time' => '\DateTime',
        'payout_memo' => 'string',
        'total_payments' => 'int',
        'confirmed_payments' => 'int',
        'released_payments' => 'int',
        'incomplete_payments' => 'int',
        'failed_payments' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'payout_status' => null,
        'submitted_date_time' => 'date-time',
        'instructed_date_time' => 'date-time',
        'payout_memo' => null,
        'total_payments' => null,
        'confirmed_payments' => null,
        'released_payments' => null,
        'incomplete_payments' => null,
        'failed_payments' => null
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
        'payout_status' => 'payoutStatus',
        'submitted_date_time' => 'submittedDateTime',
        'instructed_date_time' => 'instructedDateTime',
        'payout_memo' => 'payoutMemo',
        'total_payments' => 'totalPayments',
        'confirmed_payments' => 'confirmedPayments',
        'released_payments' => 'releasedPayments',
        'incomplete_payments' => 'incompletePayments',
        'failed_payments' => 'failedPayments'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'payout_status' => 'setPayoutStatus',
        'submitted_date_time' => 'setSubmittedDateTime',
        'instructed_date_time' => 'setInstructedDateTime',
        'payout_memo' => 'setPayoutMemo',
        'total_payments' => 'setTotalPayments',
        'confirmed_payments' => 'setConfirmedPayments',
        'released_payments' => 'setReleasedPayments',
        'incomplete_payments' => 'setIncompletePayments',
        'failed_payments' => 'setFailedPayments'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'payout_status' => 'getPayoutStatus',
        'submitted_date_time' => 'getSubmittedDateTime',
        'instructed_date_time' => 'getInstructedDateTime',
        'payout_memo' => 'getPayoutMemo',
        'total_payments' => 'getTotalPayments',
        'confirmed_payments' => 'getConfirmedPayments',
        'released_payments' => 'getReleasedPayments',
        'incomplete_payments' => 'getIncompletePayments',
        'failed_payments' => 'getFailedPayments'
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

    const PAYOUT_STATUS_ACCEPTED = 'ACCEPTED';
    const PAYOUT_STATUS_REJECTED = 'REJECTED';
    const PAYOUT_STATUS_SUBMITTED = 'SUBMITTED';
    const PAYOUT_STATUS_QUOTED = 'QUOTED';
    const PAYOUT_STATUS_INSTRUCTED = 'INSTRUCTED';
    const PAYOUT_STATUS_COMPLETED = 'COMPLETED';
    const PAYOUT_STATUS_INCOMPLETE = 'INCOMPLETE';
    const PAYOUT_STATUS_CONFIRMED = 'CONFIRMED';
    const PAYOUT_STATUS_WITHDRAWN = 'WITHDRAWN';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPayoutStatusAllowableValues()
    {
        return [
            self::PAYOUT_STATUS_ACCEPTED,
            self::PAYOUT_STATUS_REJECTED,
            self::PAYOUT_STATUS_SUBMITTED,
            self::PAYOUT_STATUS_QUOTED,
            self::PAYOUT_STATUS_INSTRUCTED,
            self::PAYOUT_STATUS_COMPLETED,
            self::PAYOUT_STATUS_INCOMPLETE,
            self::PAYOUT_STATUS_CONFIRMED,
            self::PAYOUT_STATUS_WITHDRAWN,
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
        $this->container['payout_status'] = isset($data['payout_status']) ? $data['payout_status'] : null;
        $this->container['submitted_date_time'] = isset($data['submitted_date_time']) ? $data['submitted_date_time'] : null;
        $this->container['instructed_date_time'] = isset($data['instructed_date_time']) ? $data['instructed_date_time'] : null;
        $this->container['payout_memo'] = isset($data['payout_memo']) ? $data['payout_memo'] : null;
        $this->container['total_payments'] = isset($data['total_payments']) ? $data['total_payments'] : null;
        $this->container['confirmed_payments'] = isset($data['confirmed_payments']) ? $data['confirmed_payments'] : null;
        $this->container['released_payments'] = isset($data['released_payments']) ? $data['released_payments'] : null;
        $this->container['incomplete_payments'] = isset($data['incomplete_payments']) ? $data['incomplete_payments'] : null;
        $this->container['failed_payments'] = isset($data['failed_payments']) ? $data['failed_payments'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getPayoutStatusAllowableValues();
        if (!is_null($this->container['payout_status']) && !in_array($this->container['payout_status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'payout_status', must be one of '%s'",
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
     * Gets payout_status
     *
     * @return string|null
     */
    public function getPayoutStatus()
    {
        return $this->container['payout_status'];
    }

    /**
     * Sets payout_status
     *
     * @param string|null $payout_status The current status of the payout.
     *
     * @return $this
     */
    public function setPayoutStatus($payout_status)
    {
        $allowedValues = $this->getPayoutStatusAllowableValues();
        if (!is_null($payout_status) && !in_array($payout_status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'payout_status', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['payout_status'] = $payout_status;

        return $this;
    }

    /**
     * Gets submitted_date_time
     *
     * @return \DateTime|null
     */
    public function getSubmittedDateTime()
    {
        return $this->container['submitted_date_time'];
    }

    /**
     * Sets submitted_date_time
     *
     * @param \DateTime|null $submitted_date_time The date/time at which the payout was submitted.
     *
     * @return $this
     */
    public function setSubmittedDateTime($submitted_date_time)
    {
        $this->container['submitted_date_time'] = $submitted_date_time;

        return $this;
    }

    /**
     * Gets instructed_date_time
     *
     * @return \DateTime|null
     */
    public function getInstructedDateTime()
    {
        return $this->container['instructed_date_time'];
    }

    /**
     * Sets instructed_date_time
     *
     * @param \DateTime|null $instructed_date_time The date/time at which the payout was instructed.
     *
     * @return $this
     */
    public function setInstructedDateTime($instructed_date_time)
    {
        $this->container['instructed_date_time'] = $instructed_date_time;

        return $this;
    }

    /**
     * Gets payout_memo
     *
     * @return string|null
     */
    public function getPayoutMemo()
    {
        return $this->container['payout_memo'];
    }

    /**
     * Sets payout_memo
     *
     * @param string|null $payout_memo The memo attached to the payout.
     *
     * @return $this
     */
    public function setPayoutMemo($payout_memo)
    {
        $this->container['payout_memo'] = $payout_memo;

        return $this;
    }

    /**
     * Gets total_payments
     *
     * @return int|null
     */
    public function getTotalPayments()
    {
        return $this->container['total_payments'];
    }

    /**
     * Sets total_payments
     *
     * @param int|null $total_payments The count of payments within the payout.
     *
     * @return $this
     */
    public function setTotalPayments($total_payments)
    {
        $this->container['total_payments'] = $total_payments;

        return $this;
    }

    /**
     * Gets confirmed_payments
     *
     * @return int|null
     */
    public function getConfirmedPayments()
    {
        return $this->container['confirmed_payments'];
    }

    /**
     * Sets confirmed_payments
     *
     * @param int|null $confirmed_payments The count of payments within the payout which have been confirmed.
     *
     * @return $this
     */
    public function setConfirmedPayments($confirmed_payments)
    {
        $this->container['confirmed_payments'] = $confirmed_payments;

        return $this;
    }

    /**
     * Gets released_payments
     *
     * @return int|null
     */
    public function getReleasedPayments()
    {
        return $this->container['released_payments'];
    }

    /**
     * Sets released_payments
     *
     * @param int|null $released_payments The count of payments within the payout which have been released.
     *
     * @return $this
     */
    public function setReleasedPayments($released_payments)
    {
        $this->container['released_payments'] = $released_payments;

        return $this;
    }

    /**
     * Gets incomplete_payments
     *
     * @return int|null
     */
    public function getIncompletePayments()
    {
        return $this->container['incomplete_payments'];
    }

    /**
     * Sets incomplete_payments
     *
     * @param int|null $incomplete_payments The count of payments within the payout which are incomplete.
     *
     * @return $this
     */
    public function setIncompletePayments($incomplete_payments)
    {
        $this->container['incomplete_payments'] = $incomplete_payments;

        return $this;
    }

    /**
     * Gets failed_payments
     *
     * @return int|null
     */
    public function getFailedPayments()
    {
        return $this->container['failed_payments'];
    }

    /**
     * Sets failed_payments
     *
     * @param int|null $failed_payments The count of payments within the payout which have failed or been returned.
     *
     * @return $this
     */
    public function setFailedPayments($failed_payments)
    {
        $this->container['failed_payments'] = $failed_payments;

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


