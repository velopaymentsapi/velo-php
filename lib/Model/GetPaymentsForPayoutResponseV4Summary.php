<?php
/**
 * GetPaymentsForPayoutResponseV4Summary
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
 * The version of the OpenAPI document: 2.37.151
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 7.4.0-SNAPSHOT
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
 * GetPaymentsForPayoutResponseV4Summary Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class GetPaymentsForPayoutResponseV4Summary implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'GetPaymentsForPayoutResponseV4_summary';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'payout_status' => 'string',
        'submitted_date_time' => '\DateTime',
        'instructed_date_time' => '\DateTime',
        'withdrawn_date_time' => '\DateTime',
        'quoted_date_time' => '\DateTime',
        'payout_memo' => 'string',
        'total_payments' => 'int',
        'confirmed_payments' => 'int',
        'released_payments' => 'int',
        'incomplete_payments' => 'int',
        'returned_payments' => 'int',
        'withdrawn_payments' => 'int',
        'payout_type' => 'string',
        'submitting' => '\VeloPayments\Client\Model\PayoutPayor',
        'payout_from' => '\VeloPayments\Client\Model\PayoutPayor',
        'payout_to' => '\VeloPayments\Client\Model\PayoutPayor',
        'quoted' => '\VeloPayments\Client\Model\PayoutPrincipal',
        'instructed' => '\VeloPayments\Client\Model\PayoutPrincipal',
        'withdrawn' => '\VeloPayments\Client\Model\PayoutPrincipal',
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
        'payout_status' => null,
        'submitted_date_time' => 'date-time',
        'instructed_date_time' => 'date-time',
        'withdrawn_date_time' => 'date-time',
        'quoted_date_time' => 'date-time',
        'payout_memo' => null,
        'total_payments' => null,
        'confirmed_payments' => null,
        'released_payments' => null,
        'incomplete_payments' => null,
        'returned_payments' => null,
        'withdrawn_payments' => null,
        'payout_type' => null,
        'submitting' => null,
        'payout_from' => null,
        'payout_to' => null,
        'quoted' => null,
        'instructed' => null,
        'withdrawn' => null,
        'schedule' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'payout_status' => false,
        'submitted_date_time' => false,
        'instructed_date_time' => false,
        'withdrawn_date_time' => false,
        'quoted_date_time' => false,
        'payout_memo' => false,
        'total_payments' => false,
        'confirmed_payments' => false,
        'released_payments' => false,
        'incomplete_payments' => false,
        'returned_payments' => false,
        'withdrawn_payments' => false,
        'payout_type' => false,
        'submitting' => false,
        'payout_from' => false,
        'payout_to' => false,
        'quoted' => false,
        'instructed' => false,
        'withdrawn' => false,
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
        'payout_status' => 'payoutStatus',
        'submitted_date_time' => 'submittedDateTime',
        'instructed_date_time' => 'instructedDateTime',
        'withdrawn_date_time' => 'withdrawnDateTime',
        'quoted_date_time' => 'quotedDateTime',
        'payout_memo' => 'payoutMemo',
        'total_payments' => 'totalPayments',
        'confirmed_payments' => 'confirmedPayments',
        'released_payments' => 'releasedPayments',
        'incomplete_payments' => 'incompletePayments',
        'returned_payments' => 'returnedPayments',
        'withdrawn_payments' => 'withdrawnPayments',
        'payout_type' => 'payoutType',
        'submitting' => 'submitting',
        'payout_from' => 'payoutFrom',
        'payout_to' => 'payoutTo',
        'quoted' => 'quoted',
        'instructed' => 'instructed',
        'withdrawn' => 'withdrawn',
        'schedule' => 'schedule'
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
        'withdrawn_date_time' => 'setWithdrawnDateTime',
        'quoted_date_time' => 'setQuotedDateTime',
        'payout_memo' => 'setPayoutMemo',
        'total_payments' => 'setTotalPayments',
        'confirmed_payments' => 'setConfirmedPayments',
        'released_payments' => 'setReleasedPayments',
        'incomplete_payments' => 'setIncompletePayments',
        'returned_payments' => 'setReturnedPayments',
        'withdrawn_payments' => 'setWithdrawnPayments',
        'payout_type' => 'setPayoutType',
        'submitting' => 'setSubmitting',
        'payout_from' => 'setPayoutFrom',
        'payout_to' => 'setPayoutTo',
        'quoted' => 'setQuoted',
        'instructed' => 'setInstructed',
        'withdrawn' => 'setWithdrawn',
        'schedule' => 'setSchedule'
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
        'withdrawn_date_time' => 'getWithdrawnDateTime',
        'quoted_date_time' => 'getQuotedDateTime',
        'payout_memo' => 'getPayoutMemo',
        'total_payments' => 'getTotalPayments',
        'confirmed_payments' => 'getConfirmedPayments',
        'released_payments' => 'getReleasedPayments',
        'incomplete_payments' => 'getIncompletePayments',
        'returned_payments' => 'getReturnedPayments',
        'withdrawn_payments' => 'getWithdrawnPayments',
        'payout_type' => 'getPayoutType',
        'submitting' => 'getSubmitting',
        'payout_from' => 'getPayoutFrom',
        'payout_to' => 'getPayoutTo',
        'quoted' => 'getQuoted',
        'instructed' => 'getInstructed',
        'withdrawn' => 'getWithdrawn',
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
        $this->setIfExists('payout_status', $data ?? [], null);
        $this->setIfExists('submitted_date_time', $data ?? [], null);
        $this->setIfExists('instructed_date_time', $data ?? [], null);
        $this->setIfExists('withdrawn_date_time', $data ?? [], null);
        $this->setIfExists('quoted_date_time', $data ?? [], null);
        $this->setIfExists('payout_memo', $data ?? [], null);
        $this->setIfExists('total_payments', $data ?? [], null);
        $this->setIfExists('confirmed_payments', $data ?? [], null);
        $this->setIfExists('released_payments', $data ?? [], null);
        $this->setIfExists('incomplete_payments', $data ?? [], null);
        $this->setIfExists('returned_payments', $data ?? [], null);
        $this->setIfExists('withdrawn_payments', $data ?? [], null);
        $this->setIfExists('payout_type', $data ?? [], null);
        $this->setIfExists('submitting', $data ?? [], null);
        $this->setIfExists('payout_from', $data ?? [], null);
        $this->setIfExists('payout_to', $data ?? [], null);
        $this->setIfExists('quoted', $data ?? [], null);
        $this->setIfExists('instructed', $data ?? [], null);
        $this->setIfExists('withdrawn', $data ?? [], null);
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
     * @param string|null $payout_status Current status of the Payout. One of the following values: ACCEPTED, REJECTED, SUBMITTED, QUOTED, INSTRUCTED, COMPLETED, INCOMPLETE, CONFIRMED, WITHDRAWN
     *
     * @return self
     */
    public function setPayoutStatus($payout_status)
    {
        if (is_null($payout_status)) {
            throw new \InvalidArgumentException('non-nullable payout_status cannot be null');
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
     * Gets quoted_date_time
     *
     * @return \DateTime|null
     */
    public function getQuotedDateTime()
    {
        return $this->container['quoted_date_time'];
    }

    /**
     * Sets quoted_date_time
     *
     * @param \DateTime|null $quoted_date_time The date/time at which the payout was quoted.
     *
     * @return self
     */
    public function setQuotedDateTime($quoted_date_time)
    {
        if (is_null($quoted_date_time)) {
            throw new \InvalidArgumentException('non-nullable quoted_date_time cannot be null');
        }
        $this->container['quoted_date_time'] = $quoted_date_time;

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
     * @return self
     */
    public function setConfirmedPayments($confirmed_payments)
    {
        if (is_null($confirmed_payments)) {
            throw new \InvalidArgumentException('non-nullable confirmed_payments cannot be null');
        }
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
     * @return self
     */
    public function setReleasedPayments($released_payments)
    {
        if (is_null($released_payments)) {
            throw new \InvalidArgumentException('non-nullable released_payments cannot be null');
        }
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
     * @return self
     */
    public function setIncompletePayments($incomplete_payments)
    {
        if (is_null($incomplete_payments)) {
            throw new \InvalidArgumentException('non-nullable incomplete_payments cannot be null');
        }
        $this->container['incomplete_payments'] = $incomplete_payments;

        return $this;
    }

    /**
     * Gets returned_payments
     *
     * @return int|null
     */
    public function getReturnedPayments()
    {
        return $this->container['returned_payments'];
    }

    /**
     * Sets returned_payments
     *
     * @param int|null $returned_payments The count of payments within the payout which have been returned.
     *
     * @return self
     */
    public function setReturnedPayments($returned_payments)
    {
        if (is_null($returned_payments)) {
            throw new \InvalidArgumentException('non-nullable returned_payments cannot be null');
        }
        $this->container['returned_payments'] = $returned_payments;

        return $this;
    }

    /**
     * Gets withdrawn_payments
     *
     * @return int|null
     */
    public function getWithdrawnPayments()
    {
        return $this->container['withdrawn_payments'];
    }

    /**
     * Sets withdrawn_payments
     *
     * @param int|null $withdrawn_payments The count of payments within the payout which have been withdrawn.
     *
     * @return self
     */
    public function setWithdrawnPayments($withdrawn_payments)
    {
        if (is_null($withdrawn_payments)) {
            throw new \InvalidArgumentException('non-nullable withdrawn_payments cannot be null');
        }
        $this->container['withdrawn_payments'] = $withdrawn_payments;

        return $this;
    }

    /**
     * Gets payout_type
     *
     * @return string|null
     */
    public function getPayoutType()
    {
        return $this->container['payout_type'];
    }

    /**
     * Sets payout_type
     *
     * @param string|null $payout_type The type of payout. One of the following values: STANDARD, AS, ON_BEHALF_OF
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
     * Gets submitting
     *
     * @return \VeloPayments\Client\Model\PayoutPayor|null
     */
    public function getSubmitting()
    {
        return $this->container['submitting'];
    }

    /**
     * Sets submitting
     *
     * @param \VeloPayments\Client\Model\PayoutPayor|null $submitting submitting
     *
     * @return self
     */
    public function setSubmitting($submitting)
    {
        if (is_null($submitting)) {
            throw new \InvalidArgumentException('non-nullable submitting cannot be null');
        }
        $this->container['submitting'] = $submitting;

        return $this;
    }

    /**
     * Gets payout_from
     *
     * @return \VeloPayments\Client\Model\PayoutPayor|null
     */
    public function getPayoutFrom()
    {
        return $this->container['payout_from'];
    }

    /**
     * Sets payout_from
     *
     * @param \VeloPayments\Client\Model\PayoutPayor|null $payout_from payout_from
     *
     * @return self
     */
    public function setPayoutFrom($payout_from)
    {
        if (is_null($payout_from)) {
            throw new \InvalidArgumentException('non-nullable payout_from cannot be null');
        }
        $this->container['payout_from'] = $payout_from;

        return $this;
    }

    /**
     * Gets payout_to
     *
     * @return \VeloPayments\Client\Model\PayoutPayor|null
     */
    public function getPayoutTo()
    {
        return $this->container['payout_to'];
    }

    /**
     * Sets payout_to
     *
     * @param \VeloPayments\Client\Model\PayoutPayor|null $payout_to payout_to
     *
     * @return self
     */
    public function setPayoutTo($payout_to)
    {
        if (is_null($payout_to)) {
            throw new \InvalidArgumentException('non-nullable payout_to cannot be null');
        }
        $this->container['payout_to'] = $payout_to;

        return $this;
    }

    /**
     * Gets quoted
     *
     * @return \VeloPayments\Client\Model\PayoutPrincipal|null
     */
    public function getQuoted()
    {
        return $this->container['quoted'];
    }

    /**
     * Sets quoted
     *
     * @param \VeloPayments\Client\Model\PayoutPrincipal|null $quoted quoted
     *
     * @return self
     */
    public function setQuoted($quoted)
    {
        if (is_null($quoted)) {
            throw new \InvalidArgumentException('non-nullable quoted cannot be null');
        }
        $this->container['quoted'] = $quoted;

        return $this;
    }

    /**
     * Gets instructed
     *
     * @return \VeloPayments\Client\Model\PayoutPrincipal|null
     */
    public function getInstructed()
    {
        return $this->container['instructed'];
    }

    /**
     * Sets instructed
     *
     * @param \VeloPayments\Client\Model\PayoutPrincipal|null $instructed instructed
     *
     * @return self
     */
    public function setInstructed($instructed)
    {
        if (is_null($instructed)) {
            throw new \InvalidArgumentException('non-nullable instructed cannot be null');
        }
        $this->container['instructed'] = $instructed;

        return $this;
    }

    /**
     * Gets withdrawn
     *
     * @return \VeloPayments\Client\Model\PayoutPrincipal|null
     */
    public function getWithdrawn()
    {
        return $this->container['withdrawn'];
    }

    /**
     * Sets withdrawn
     *
     * @param \VeloPayments\Client\Model\PayoutPrincipal|null $withdrawn withdrawn
     *
     * @return self
     */
    public function setWithdrawn($withdrawn)
    {
        if (is_null($withdrawn)) {
            throw new \InvalidArgumentException('non-nullable withdrawn cannot be null');
        }
        $this->container['withdrawn'] = $withdrawn;

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


