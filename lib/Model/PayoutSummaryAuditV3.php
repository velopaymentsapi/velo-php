<?php
/**
 * PayoutSummaryAuditV3
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
 * PayoutSummaryAuditV3 Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class PayoutSummaryAuditV3 implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PayoutSummaryAuditV3';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'payout_id' => 'string',
        'payor_id' => 'string',
        'status' => '\VeloPayments\Client\Model\PayoutStatusV3',
        'submitted_date_time' => 'string',
        'instructed_date_time' => 'string',
        'withdrawn_date_time' => 'string',
        'total_payments' => 'int',
        'total_incomplete_payments' => 'int',
        'total_failed_payments' => 'int',
        'source_account_summary' => '\VeloPayments\Client\Model\SourceAccountSummaryV3[]',
        'fx_summaries' => '\VeloPayments\Client\Model\FxSummaryV3[]',
        'payout_memo' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'payout_id' => 'uuid',
        'payor_id' => 'uuid',
        'status' => null,
        'submitted_date_time' => null,
        'instructed_date_time' => null,
        'withdrawn_date_time' => null,
        'total_payments' => null,
        'total_incomplete_payments' => null,
        'total_failed_payments' => null,
        'source_account_summary' => null,
        'fx_summaries' => null,
        'payout_memo' => null
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
        'payout_id' => 'payoutId',
        'payor_id' => 'payorId',
        'status' => 'status',
        'submitted_date_time' => 'submittedDateTime',
        'instructed_date_time' => 'instructedDateTime',
        'withdrawn_date_time' => 'withdrawnDateTime',
        'total_payments' => 'totalPayments',
        'total_incomplete_payments' => 'totalIncompletePayments',
        'total_failed_payments' => 'totalFailedPayments',
        'source_account_summary' => 'sourceAccountSummary',
        'fx_summaries' => 'fxSummaries',
        'payout_memo' => 'payoutMemo'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'payout_id' => 'setPayoutId',
        'payor_id' => 'setPayorId',
        'status' => 'setStatus',
        'submitted_date_time' => 'setSubmittedDateTime',
        'instructed_date_time' => 'setInstructedDateTime',
        'withdrawn_date_time' => 'setWithdrawnDateTime',
        'total_payments' => 'setTotalPayments',
        'total_incomplete_payments' => 'setTotalIncompletePayments',
        'total_failed_payments' => 'setTotalFailedPayments',
        'source_account_summary' => 'setSourceAccountSummary',
        'fx_summaries' => 'setFxSummaries',
        'payout_memo' => 'setPayoutMemo'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'payout_id' => 'getPayoutId',
        'payor_id' => 'getPayorId',
        'status' => 'getStatus',
        'submitted_date_time' => 'getSubmittedDateTime',
        'instructed_date_time' => 'getInstructedDateTime',
        'withdrawn_date_time' => 'getWithdrawnDateTime',
        'total_payments' => 'getTotalPayments',
        'total_incomplete_payments' => 'getTotalIncompletePayments',
        'total_failed_payments' => 'getTotalFailedPayments',
        'source_account_summary' => 'getSourceAccountSummary',
        'fx_summaries' => 'getFxSummaries',
        'payout_memo' => 'getPayoutMemo'
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
        $this->container['payout_id'] = isset($data['payout_id']) ? $data['payout_id'] : null;
        $this->container['payor_id'] = isset($data['payor_id']) ? $data['payor_id'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['submitted_date_time'] = isset($data['submitted_date_time']) ? $data['submitted_date_time'] : null;
        $this->container['instructed_date_time'] = isset($data['instructed_date_time']) ? $data['instructed_date_time'] : null;
        $this->container['withdrawn_date_time'] = isset($data['withdrawn_date_time']) ? $data['withdrawn_date_time'] : null;
        $this->container['total_payments'] = isset($data['total_payments']) ? $data['total_payments'] : null;
        $this->container['total_incomplete_payments'] = isset($data['total_incomplete_payments']) ? $data['total_incomplete_payments'] : null;
        $this->container['total_failed_payments'] = isset($data['total_failed_payments']) ? $data['total_failed_payments'] : null;
        $this->container['source_account_summary'] = isset($data['source_account_summary']) ? $data['source_account_summary'] : null;
        $this->container['fx_summaries'] = isset($data['fx_summaries']) ? $data['fx_summaries'] : null;
        $this->container['payout_memo'] = isset($data['payout_memo']) ? $data['payout_memo'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['payout_id'] === null) {
            $invalidProperties[] = "'payout_id' can't be null";
        }
        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
        }
        if ($this->container['submitted_date_time'] === null) {
            $invalidProperties[] = "'submitted_date_time' can't be null";
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
     * Gets payout_id
     *
     * @return string
     */
    public function getPayoutId()
    {
        return $this->container['payout_id'];
    }

    /**
     * Sets payout_id
     *
     * @param string $payout_id payout_id
     *
     * @return $this
     */
    public function setPayoutId($payout_id)
    {
        $this->container['payout_id'] = $payout_id;

        return $this;
    }

    /**
     * Gets payor_id
     *
     * @return string|null
     */
    public function getPayorId()
    {
        return $this->container['payor_id'];
    }

    /**
     * Sets payor_id
     *
     * @param string|null $payor_id payor_id
     *
     * @return $this
     */
    public function setPayorId($payor_id)
    {
        $this->container['payor_id'] = $payor_id;

        return $this;
    }

    /**
     * Gets status
     *
     * @return \VeloPayments\Client\Model\PayoutStatusV3
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param \VeloPayments\Client\Model\PayoutStatusV3 $status status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets submitted_date_time
     *
     * @return string
     */
    public function getSubmittedDateTime()
    {
        return $this->container['submitted_date_time'];
    }

    /**
     * Sets submitted_date_time
     *
     * @param string $submitted_date_time submitted_date_time
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
     * @return string|null
     */
    public function getInstructedDateTime()
    {
        return $this->container['instructed_date_time'];
    }

    /**
     * Sets instructed_date_time
     *
     * @param string|null $instructed_date_time instructed_date_time
     *
     * @return $this
     */
    public function setInstructedDateTime($instructed_date_time)
    {
        $this->container['instructed_date_time'] = $instructed_date_time;

        return $this;
    }

    /**
     * Gets withdrawn_date_time
     *
     * @return string|null
     */
    public function getWithdrawnDateTime()
    {
        return $this->container['withdrawn_date_time'];
    }

    /**
     * Sets withdrawn_date_time
     *
     * @param string|null $withdrawn_date_time withdrawn_date_time
     *
     * @return $this
     */
    public function setWithdrawnDateTime($withdrawn_date_time)
    {
        $this->container['withdrawn_date_time'] = $withdrawn_date_time;

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
     * @param int|null $total_payments total_payments
     *
     * @return $this
     */
    public function setTotalPayments($total_payments)
    {
        $this->container['total_payments'] = $total_payments;

        return $this;
    }

    /**
     * Gets total_incomplete_payments
     *
     * @return int|null
     */
    public function getTotalIncompletePayments()
    {
        return $this->container['total_incomplete_payments'];
    }

    /**
     * Sets total_incomplete_payments
     *
     * @param int|null $total_incomplete_payments total_incomplete_payments
     *
     * @return $this
     */
    public function setTotalIncompletePayments($total_incomplete_payments)
    {
        $this->container['total_incomplete_payments'] = $total_incomplete_payments;

        return $this;
    }

    /**
     * Gets total_failed_payments
     *
     * @return int|null
     */
    public function getTotalFailedPayments()
    {
        return $this->container['total_failed_payments'];
    }

    /**
     * Sets total_failed_payments
     *
     * @param int|null $total_failed_payments total_failed_payments
     *
     * @return $this
     */
    public function setTotalFailedPayments($total_failed_payments)
    {
        $this->container['total_failed_payments'] = $total_failed_payments;

        return $this;
    }

    /**
     * Gets source_account_summary
     *
     * @return \VeloPayments\Client\Model\SourceAccountSummaryV3[]|null
     */
    public function getSourceAccountSummary()
    {
        return $this->container['source_account_summary'];
    }

    /**
     * Sets source_account_summary
     *
     * @param \VeloPayments\Client\Model\SourceAccountSummaryV3[]|null $source_account_summary source_account_summary
     *
     * @return $this
     */
    public function setSourceAccountSummary($source_account_summary)
    {
        $this->container['source_account_summary'] = $source_account_summary;

        return $this;
    }

    /**
     * Gets fx_summaries
     *
     * @return \VeloPayments\Client\Model\FxSummaryV3[]|null
     */
    public function getFxSummaries()
    {
        return $this->container['fx_summaries'];
    }

    /**
     * Sets fx_summaries
     *
     * @param \VeloPayments\Client\Model\FxSummaryV3[]|null $fx_summaries fx_summaries
     *
     * @return $this
     */
    public function setFxSummaries($fx_summaries)
    {
        $this->container['fx_summaries'] = $fx_summaries;

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
     * @param string|null $payout_memo payout_memo
     *
     * @return $this
     */
    public function setPayoutMemo($payout_memo)
    {
        $this->container['payout_memo'] = $payout_memo;

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


