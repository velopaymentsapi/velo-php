<?php
/**
 * PayoutSummaryAudit
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
 * PayoutSummaryAudit Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PayoutSummaryAudit implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PayoutSummaryAudit';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'payout_id' => 'string',
        'payor_id' => 'string',
        'status' => 'string',
        'date_time' => '\DateTime',
        'submitted_date_time' => 'string',
        'instructed_date_time' => 'string',
        'withdrawn_date_time' => '\DateTime',
        'total_payments' => 'int',
        'total_incomplete_payments' => 'int',
        'total_returned_payments' => 'int',
        'total_withdrawn_payments' => 'int',
        'source_account_summary' => '\VeloPayments\Client\Model\SourceAccountSummary[]',
        'fx_summaries' => '\VeloPayments\Client\Model\FxSummary[]',
        'payout_memo' => 'string',
        'payout_type' => 'string',
        'payor_name' => 'string',
        'schedule' => '\VeloPayments\Client\Model\PayoutSchedule'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'payout_id' => 'uuid',
        'payor_id' => 'uuid',
        'status' => null,
        'date_time' => 'date-time',
        'submitted_date_time' => null,
        'instructed_date_time' => null,
        'withdrawn_date_time' => 'date-time',
        'total_payments' => null,
        'total_incomplete_payments' => null,
        'total_returned_payments' => null,
        'total_withdrawn_payments' => null,
        'source_account_summary' => null,
        'fx_summaries' => null,
        'payout_memo' => null,
        'payout_type' => null,
        'payor_name' => null,
        'schedule' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'payout_id' => false,
		'payor_id' => false,
		'status' => false,
		'date_time' => false,
		'submitted_date_time' => false,
		'instructed_date_time' => false,
		'withdrawn_date_time' => false,
		'total_payments' => false,
		'total_incomplete_payments' => false,
		'total_returned_payments' => false,
		'total_withdrawn_payments' => false,
		'source_account_summary' => false,
		'fx_summaries' => false,
		'payout_memo' => false,
		'payout_type' => false,
		'payor_name' => false,
		'schedule' => false
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
        'payout_id' => 'payoutId',
        'payor_id' => 'payorId',
        'status' => 'status',
        'date_time' => 'dateTime',
        'submitted_date_time' => 'submittedDateTime',
        'instructed_date_time' => 'instructedDateTime',
        'withdrawn_date_time' => 'withdrawnDateTime',
        'total_payments' => 'totalPayments',
        'total_incomplete_payments' => 'totalIncompletePayments',
        'total_returned_payments' => 'totalReturnedPayments',
        'total_withdrawn_payments' => 'totalWithdrawnPayments',
        'source_account_summary' => 'sourceAccountSummary',
        'fx_summaries' => 'fxSummaries',
        'payout_memo' => 'payoutMemo',
        'payout_type' => 'payoutType',
        'payor_name' => 'payorName',
        'schedule' => 'schedule'
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
        'date_time' => 'setDateTime',
        'submitted_date_time' => 'setSubmittedDateTime',
        'instructed_date_time' => 'setInstructedDateTime',
        'withdrawn_date_time' => 'setWithdrawnDateTime',
        'total_payments' => 'setTotalPayments',
        'total_incomplete_payments' => 'setTotalIncompletePayments',
        'total_returned_payments' => 'setTotalReturnedPayments',
        'total_withdrawn_payments' => 'setTotalWithdrawnPayments',
        'source_account_summary' => 'setSourceAccountSummary',
        'fx_summaries' => 'setFxSummaries',
        'payout_memo' => 'setPayoutMemo',
        'payout_type' => 'setPayoutType',
        'payor_name' => 'setPayorName',
        'schedule' => 'setSchedule'
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
        'date_time' => 'getDateTime',
        'submitted_date_time' => 'getSubmittedDateTime',
        'instructed_date_time' => 'getInstructedDateTime',
        'withdrawn_date_time' => 'getWithdrawnDateTime',
        'total_payments' => 'getTotalPayments',
        'total_incomplete_payments' => 'getTotalIncompletePayments',
        'total_returned_payments' => 'getTotalReturnedPayments',
        'total_withdrawn_payments' => 'getTotalWithdrawnPayments',
        'source_account_summary' => 'getSourceAccountSummary',
        'fx_summaries' => 'getFxSummaries',
        'payout_memo' => 'getPayoutMemo',
        'payout_type' => 'getPayoutType',
        'payor_name' => 'getPayorName',
        'schedule' => 'getSchedule'
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
        $this->setIfExists('payout_id', $data ?? [], null);
        $this->setIfExists('payor_id', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('date_time', $data ?? [], null);
        $this->setIfExists('submitted_date_time', $data ?? [], null);
        $this->setIfExists('instructed_date_time', $data ?? [], null);
        $this->setIfExists('withdrawn_date_time', $data ?? [], null);
        $this->setIfExists('total_payments', $data ?? [], null);
        $this->setIfExists('total_incomplete_payments', $data ?? [], null);
        $this->setIfExists('total_returned_payments', $data ?? [], null);
        $this->setIfExists('total_withdrawn_payments', $data ?? [], null);
        $this->setIfExists('source_account_summary', $data ?? [], null);
        $this->setIfExists('fx_summaries', $data ?? [], null);
        $this->setIfExists('payout_memo', $data ?? [], null);
        $this->setIfExists('payout_type', $data ?? [], null);
        $this->setIfExists('payor_name', $data ?? [], null);
        $this->setIfExists('schedule', $data ?? [], null);
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

        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
        }
        if ($this->container['submitted_date_time'] === null) {
            $invalidProperties[] = "'submitted_date_time' can't be null";
        }
        if ($this->container['payout_type'] === null) {
            $invalidProperties[] = "'payout_type' can't be null";
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
     * Gets payout_id
     *
     * @return string|null
     */
    public function getPayoutId()
    {
        return $this->container['payout_id'];
    }

    /**
     * Sets payout_id
     *
     * @param string|null $payout_id payout_id
     *
     * @return self
     */
    public function setPayoutId($payout_id)
    {
        if (is_null($payout_id)) {
            throw new \InvalidArgumentException('non-nullable payout_id cannot be null');
        }
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
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status Current status of the Payout. One of the following values: ACCEPTED, REJECTED, SUBMITTED, QUOTED, INSTRUCTED, COMPLETED, INCOMPLETE, CONFIRMED, WITHDRAWN
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new \InvalidArgumentException('non-nullable status cannot be null');
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets date_time
     *
     * @return \DateTime|null
     */
    public function getDateTime()
    {
        return $this->container['date_time'];
    }

    /**
     * Sets date_time
     *
     * @param \DateTime|null $date_time date_time
     *
     * @return self
     */
    public function setDateTime($date_time)
    {
        if (is_null($date_time)) {
            throw new \InvalidArgumentException('non-nullable date_time cannot be null');
        }
        $this->container['date_time'] = $date_time;

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
     * @return self
     */
    public function setSubmittedDateTime($submitted_date_time)
    {
        if (is_null($submitted_date_time)) {
            throw new \InvalidArgumentException('non-nullable submitted_date_time cannot be null');
        }
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
     * @return self
     */
    public function setInstructedDateTime($instructed_date_time)
    {
        if (is_null($instructed_date_time)) {
            throw new \InvalidArgumentException('non-nullable instructed_date_time cannot be null');
        }
        $this->container['instructed_date_time'] = $instructed_date_time;

        return $this;
    }

    /**
     * Gets withdrawn_date_time
     *
     * @return \DateTime|null
     */
    public function getWithdrawnDateTime()
    {
        return $this->container['withdrawn_date_time'];
    }

    /**
     * Sets withdrawn_date_time
     *
     * @param \DateTime|null $withdrawn_date_time withdrawn_date_time
     *
     * @return self
     */
    public function setWithdrawnDateTime($withdrawn_date_time)
    {
        if (is_null($withdrawn_date_time)) {
            throw new \InvalidArgumentException('non-nullable withdrawn_date_time cannot be null');
        }
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
     * @return self
     */
    public function setTotalPayments($total_payments)
    {
        if (is_null($total_payments)) {
            throw new \InvalidArgumentException('non-nullable total_payments cannot be null');
        }
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
     * @return self
     */
    public function setTotalIncompletePayments($total_incomplete_payments)
    {
        if (is_null($total_incomplete_payments)) {
            throw new \InvalidArgumentException('non-nullable total_incomplete_payments cannot be null');
        }
        $this->container['total_incomplete_payments'] = $total_incomplete_payments;

        return $this;
    }

    /**
     * Gets total_returned_payments
     *
     * @return int|null
     */
    public function getTotalReturnedPayments()
    {
        return $this->container['total_returned_payments'];
    }

    /**
     * Sets total_returned_payments
     *
     * @param int|null $total_returned_payments total_returned_payments
     *
     * @return self
     */
    public function setTotalReturnedPayments($total_returned_payments)
    {
        if (is_null($total_returned_payments)) {
            throw new \InvalidArgumentException('non-nullable total_returned_payments cannot be null');
        }
        $this->container['total_returned_payments'] = $total_returned_payments;

        return $this;
    }

    /**
     * Gets total_withdrawn_payments
     *
     * @return int|null
     */
    public function getTotalWithdrawnPayments()
    {
        return $this->container['total_withdrawn_payments'];
    }

    /**
     * Sets total_withdrawn_payments
     *
     * @param int|null $total_withdrawn_payments total_withdrawn_payments
     *
     * @return self
     */
    public function setTotalWithdrawnPayments($total_withdrawn_payments)
    {
        if (is_null($total_withdrawn_payments)) {
            throw new \InvalidArgumentException('non-nullable total_withdrawn_payments cannot be null');
        }
        $this->container['total_withdrawn_payments'] = $total_withdrawn_payments;

        return $this;
    }

    /**
     * Gets source_account_summary
     *
     * @return \VeloPayments\Client\Model\SourceAccountSummary[]|null
     */
    public function getSourceAccountSummary()
    {
        return $this->container['source_account_summary'];
    }

    /**
     * Sets source_account_summary
     *
     * @param \VeloPayments\Client\Model\SourceAccountSummary[]|null $source_account_summary source_account_summary
     *
     * @return self
     */
    public function setSourceAccountSummary($source_account_summary)
    {
        if (is_null($source_account_summary)) {
            throw new \InvalidArgumentException('non-nullable source_account_summary cannot be null');
        }
        $this->container['source_account_summary'] = $source_account_summary;

        return $this;
    }

    /**
     * Gets fx_summaries
     *
     * @return \VeloPayments\Client\Model\FxSummary[]|null
     */
    public function getFxSummaries()
    {
        return $this->container['fx_summaries'];
    }

    /**
     * Sets fx_summaries
     *
     * @param \VeloPayments\Client\Model\FxSummary[]|null $fx_summaries fx_summaries
     *
     * @return self
     */
    public function setFxSummaries($fx_summaries)
    {
        if (is_null($fx_summaries)) {
            throw new \InvalidArgumentException('non-nullable fx_summaries cannot be null');
        }
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
     * @return self
     */
    public function setPayoutMemo($payout_memo)
    {
        if (is_null($payout_memo)) {
            throw new \InvalidArgumentException('non-nullable payout_memo cannot be null');
        }
        $this->container['payout_memo'] = $payout_memo;

        return $this;
    }

    /**
     * Gets payout_type
     *
     * @return string
     */
    public function getPayoutType()
    {
        return $this->container['payout_type'];
    }

    /**
     * Sets payout_type
     *
     * @param string $payout_type The type of payout. One of the following values: STANDARD, AS, ON_BEHALF_OF
     *
     * @return self
     */
    public function setPayoutType($payout_type)
    {
        if (is_null($payout_type)) {
            throw new \InvalidArgumentException('non-nullable payout_type cannot be null');
        }
        $this->container['payout_type'] = $payout_type;

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
     * @param string $payor_name payor_name
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
     * Gets schedule
     *
     * @return \VeloPayments\Client\Model\PayoutSchedule|null
     */
    public function getSchedule()
    {
        return $this->container['schedule'];
    }

    /**
     * Sets schedule
     *
     * @param \VeloPayments\Client\Model\PayoutSchedule|null $schedule schedule
     *
     * @return self
     */
    public function setSchedule($schedule)
    {
        if (is_null($schedule)) {
            throw new \InvalidArgumentException('non-nullable schedule cannot be null');
        }
        $this->container['schedule'] = $schedule;

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


