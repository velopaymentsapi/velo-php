<?php
/**
 * PayorAmlTransactionV3
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
 * PayorAmlTransactionV3 Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PayorAmlTransactionV3 implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PayorAmlTransactionV3';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'transaction_date' => '\DateTime',
        'transaction_time' => 'string',
        'report_transaction_type' => 'string',
        'debit' => 'int',
        'debit_currency' => 'string',
        'credit' => 'int',
        'credit_currency' => 'string',
        'return_fee' => 'string',
        'return_fee_currency' => 'string',
        'return_fee_description' => 'string',
        'return_code' => 'string',
        'return_description' => 'string',
        'funding_type' => 'string',
        'date_funding_requested' => 'string',
        'remote_id' => 'string',
        'payee_type' => 'string',
        'source_account' => 'string',
        'payment_amount' => 'int',
        'payment_currency' => 'string',
        'payment_memo' => 'string',
        'payment_rails' => 'string',
        'payor_payment_id' => 'string',
        'payment_status' => 'string',
        'reject_reason' => 'string',
        'fx_applied' => 'float'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'transaction_date' => 'date',
        'transaction_time' => null,
        'report_transaction_type' => null,
        'debit' => 'int64',
        'debit_currency' => null,
        'credit' => 'int64',
        'credit_currency' => null,
        'return_fee' => null,
        'return_fee_currency' => null,
        'return_fee_description' => null,
        'return_code' => null,
        'return_description' => null,
        'funding_type' => null,
        'date_funding_requested' => null,
        'remote_id' => null,
        'payee_type' => null,
        'source_account' => null,
        'payment_amount' => 'int64',
        'payment_currency' => null,
        'payment_memo' => null,
        'payment_rails' => null,
        'payor_payment_id' => null,
        'payment_status' => null,
        'reject_reason' => null,
        'fx_applied' => 'double'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'transaction_date' => false,
        'transaction_time' => false,
        'report_transaction_type' => false,
        'debit' => false,
        'debit_currency' => false,
        'credit' => false,
        'credit_currency' => false,
        'return_fee' => false,
        'return_fee_currency' => false,
        'return_fee_description' => false,
        'return_code' => false,
        'return_description' => false,
        'funding_type' => false,
        'date_funding_requested' => false,
        'remote_id' => false,
        'payee_type' => false,
        'source_account' => false,
        'payment_amount' => false,
        'payment_currency' => false,
        'payment_memo' => false,
        'payment_rails' => false,
        'payor_payment_id' => false,
        'payment_status' => false,
        'reject_reason' => false,
        'fx_applied' => false
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
        'transaction_date' => 'transactionDate',
        'transaction_time' => 'transactionTime',
        'report_transaction_type' => 'reportTransactionType',
        'debit' => 'debit',
        'debit_currency' => 'debitCurrency',
        'credit' => 'credit',
        'credit_currency' => 'creditCurrency',
        'return_fee' => 'returnFee',
        'return_fee_currency' => 'returnFeeCurrency',
        'return_fee_description' => 'returnFeeDescription',
        'return_code' => 'returnCode',
        'return_description' => 'returnDescription',
        'funding_type' => 'fundingType',
        'date_funding_requested' => 'dateFundingRequested',
        'remote_id' => 'remoteId',
        'payee_type' => 'payeeType',
        'source_account' => 'sourceAccount',
        'payment_amount' => 'paymentAmount',
        'payment_currency' => 'paymentCurrency',
        'payment_memo' => 'paymentMemo',
        'payment_rails' => 'paymentRails',
        'payor_payment_id' => 'payorPaymentId',
        'payment_status' => 'paymentStatus',
        'reject_reason' => 'rejectReason',
        'fx_applied' => 'fxApplied'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'transaction_date' => 'setTransactionDate',
        'transaction_time' => 'setTransactionTime',
        'report_transaction_type' => 'setReportTransactionType',
        'debit' => 'setDebit',
        'debit_currency' => 'setDebitCurrency',
        'credit' => 'setCredit',
        'credit_currency' => 'setCreditCurrency',
        'return_fee' => 'setReturnFee',
        'return_fee_currency' => 'setReturnFeeCurrency',
        'return_fee_description' => 'setReturnFeeDescription',
        'return_code' => 'setReturnCode',
        'return_description' => 'setReturnDescription',
        'funding_type' => 'setFundingType',
        'date_funding_requested' => 'setDateFundingRequested',
        'remote_id' => 'setRemoteId',
        'payee_type' => 'setPayeeType',
        'source_account' => 'setSourceAccount',
        'payment_amount' => 'setPaymentAmount',
        'payment_currency' => 'setPaymentCurrency',
        'payment_memo' => 'setPaymentMemo',
        'payment_rails' => 'setPaymentRails',
        'payor_payment_id' => 'setPayorPaymentId',
        'payment_status' => 'setPaymentStatus',
        'reject_reason' => 'setRejectReason',
        'fx_applied' => 'setFxApplied'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'transaction_date' => 'getTransactionDate',
        'transaction_time' => 'getTransactionTime',
        'report_transaction_type' => 'getReportTransactionType',
        'debit' => 'getDebit',
        'debit_currency' => 'getDebitCurrency',
        'credit' => 'getCredit',
        'credit_currency' => 'getCreditCurrency',
        'return_fee' => 'getReturnFee',
        'return_fee_currency' => 'getReturnFeeCurrency',
        'return_fee_description' => 'getReturnFeeDescription',
        'return_code' => 'getReturnCode',
        'return_description' => 'getReturnDescription',
        'funding_type' => 'getFundingType',
        'date_funding_requested' => 'getDateFundingRequested',
        'remote_id' => 'getRemoteId',
        'payee_type' => 'getPayeeType',
        'source_account' => 'getSourceAccount',
        'payment_amount' => 'getPaymentAmount',
        'payment_currency' => 'getPaymentCurrency',
        'payment_memo' => 'getPaymentMemo',
        'payment_rails' => 'getPaymentRails',
        'payor_payment_id' => 'getPayorPaymentId',
        'payment_status' => 'getPaymentStatus',
        'reject_reason' => 'getRejectReason',
        'fx_applied' => 'getFxApplied'
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
        $this->setIfExists('transaction_date', $data ?? [], null);
        $this->setIfExists('transaction_time', $data ?? [], null);
        $this->setIfExists('report_transaction_type', $data ?? [], null);
        $this->setIfExists('debit', $data ?? [], null);
        $this->setIfExists('debit_currency', $data ?? [], null);
        $this->setIfExists('credit', $data ?? [], null);
        $this->setIfExists('credit_currency', $data ?? [], null);
        $this->setIfExists('return_fee', $data ?? [], null);
        $this->setIfExists('return_fee_currency', $data ?? [], null);
        $this->setIfExists('return_fee_description', $data ?? [], null);
        $this->setIfExists('return_code', $data ?? [], null);
        $this->setIfExists('return_description', $data ?? [], null);
        $this->setIfExists('funding_type', $data ?? [], null);
        $this->setIfExists('date_funding_requested', $data ?? [], null);
        $this->setIfExists('remote_id', $data ?? [], null);
        $this->setIfExists('payee_type', $data ?? [], null);
        $this->setIfExists('source_account', $data ?? [], null);
        $this->setIfExists('payment_amount', $data ?? [], null);
        $this->setIfExists('payment_currency', $data ?? [], null);
        $this->setIfExists('payment_memo', $data ?? [], null);
        $this->setIfExists('payment_rails', $data ?? [], null);
        $this->setIfExists('payor_payment_id', $data ?? [], null);
        $this->setIfExists('payment_status', $data ?? [], null);
        $this->setIfExists('reject_reason', $data ?? [], null);
        $this->setIfExists('fx_applied', $data ?? [], null);
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
     * Gets transaction_date
     *
     * @return \DateTime|null
     */
    public function getTransactionDate()
    {
        return $this->container['transaction_date'];
    }

    /**
     * Sets transaction_date
     *
     * @param \DateTime|null $transaction_date transaction_date
     *
     * @return self
     */
    public function setTransactionDate($transaction_date)
    {
        if (is_null($transaction_date)) {
            throw new \InvalidArgumentException('non-nullable transaction_date cannot be null');
        }
        $this->container['transaction_date'] = $transaction_date;

        return $this;
    }

    /**
     * Gets transaction_time
     *
     * @return string|null
     */
    public function getTransactionTime()
    {
        return $this->container['transaction_time'];
    }

    /**
     * Sets transaction_time
     *
     * @param string|null $transaction_time transaction_time
     *
     * @return self
     */
    public function setTransactionTime($transaction_time)
    {
        if (is_null($transaction_time)) {
            throw new \InvalidArgumentException('non-nullable transaction_time cannot be null');
        }
        $this->container['transaction_time'] = $transaction_time;

        return $this;
    }

    /**
     * Gets report_transaction_type
     *
     * @return string|null
     */
    public function getReportTransactionType()
    {
        return $this->container['report_transaction_type'];
    }

    /**
     * Sets report_transaction_type
     *
     * @param string|null $report_transaction_type report_transaction_type
     *
     * @return self
     */
    public function setReportTransactionType($report_transaction_type)
    {
        if (is_null($report_transaction_type)) {
            throw new \InvalidArgumentException('non-nullable report_transaction_type cannot be null');
        }
        $this->container['report_transaction_type'] = $report_transaction_type;

        return $this;
    }

    /**
     * Gets debit
     *
     * @return int|null
     */
    public function getDebit()
    {
        return $this->container['debit'];
    }

    /**
     * Sets debit
     *
     * @param int|null $debit debit
     *
     * @return self
     */
    public function setDebit($debit)
    {
        if (is_null($debit)) {
            throw new \InvalidArgumentException('non-nullable debit cannot be null');
        }
        $this->container['debit'] = $debit;

        return $this;
    }

    /**
     * Gets debit_currency
     *
     * @return string|null
     */
    public function getDebitCurrency()
    {
        return $this->container['debit_currency'];
    }

    /**
     * Sets debit_currency
     *
     * @param string|null $debit_currency ISO 4217 3 character currency code
     *
     * @return self
     */
    public function setDebitCurrency($debit_currency)
    {
        if (is_null($debit_currency)) {
            throw new \InvalidArgumentException('non-nullable debit_currency cannot be null');
        }
        $this->container['debit_currency'] = $debit_currency;

        return $this;
    }

    /**
     * Gets credit
     *
     * @return int|null
     */
    public function getCredit()
    {
        return $this->container['credit'];
    }

    /**
     * Sets credit
     *
     * @param int|null $credit credit
     *
     * @return self
     */
    public function setCredit($credit)
    {
        if (is_null($credit)) {
            throw new \InvalidArgumentException('non-nullable credit cannot be null');
        }
        $this->container['credit'] = $credit;

        return $this;
    }

    /**
     * Gets credit_currency
     *
     * @return string|null
     */
    public function getCreditCurrency()
    {
        return $this->container['credit_currency'];
    }

    /**
     * Sets credit_currency
     *
     * @param string|null $credit_currency ISO 4217 3 character currency code
     *
     * @return self
     */
    public function setCreditCurrency($credit_currency)
    {
        if (is_null($credit_currency)) {
            throw new \InvalidArgumentException('non-nullable credit_currency cannot be null');
        }
        $this->container['credit_currency'] = $credit_currency;

        return $this;
    }

    /**
     * Gets return_fee
     *
     * @return string|null
     */
    public function getReturnFee()
    {
        return $this->container['return_fee'];
    }

    /**
     * Sets return_fee
     *
     * @param string|null $return_fee return_fee
     *
     * @return self
     */
    public function setReturnFee($return_fee)
    {
        if (is_null($return_fee)) {
            throw new \InvalidArgumentException('non-nullable return_fee cannot be null');
        }
        $this->container['return_fee'] = $return_fee;

        return $this;
    }

    /**
     * Gets return_fee_currency
     *
     * @return string|null
     */
    public function getReturnFeeCurrency()
    {
        return $this->container['return_fee_currency'];
    }

    /**
     * Sets return_fee_currency
     *
     * @param string|null $return_fee_currency ISO 4217 3 character currency code
     *
     * @return self
     */
    public function setReturnFeeCurrency($return_fee_currency)
    {
        if (is_null($return_fee_currency)) {
            throw new \InvalidArgumentException('non-nullable return_fee_currency cannot be null');
        }
        $this->container['return_fee_currency'] = $return_fee_currency;

        return $this;
    }

    /**
     * Gets return_fee_description
     *
     * @return string|null
     */
    public function getReturnFeeDescription()
    {
        return $this->container['return_fee_description'];
    }

    /**
     * Sets return_fee_description
     *
     * @param string|null $return_fee_description return_fee_description
     *
     * @return self
     */
    public function setReturnFeeDescription($return_fee_description)
    {
        if (is_null($return_fee_description)) {
            throw new \InvalidArgumentException('non-nullable return_fee_description cannot be null');
        }
        $this->container['return_fee_description'] = $return_fee_description;

        return $this;
    }

    /**
     * Gets return_code
     *
     * @return string|null
     */
    public function getReturnCode()
    {
        return $this->container['return_code'];
    }

    /**
     * Sets return_code
     *
     * @param string|null $return_code return_code
     *
     * @return self
     */
    public function setReturnCode($return_code)
    {
        if (is_null($return_code)) {
            throw new \InvalidArgumentException('non-nullable return_code cannot be null');
        }
        $this->container['return_code'] = $return_code;

        return $this;
    }

    /**
     * Gets return_description
     *
     * @return string|null
     */
    public function getReturnDescription()
    {
        return $this->container['return_description'];
    }

    /**
     * Sets return_description
     *
     * @param string|null $return_description return_description
     *
     * @return self
     */
    public function setReturnDescription($return_description)
    {
        if (is_null($return_description)) {
            throw new \InvalidArgumentException('non-nullable return_description cannot be null');
        }
        $this->container['return_description'] = $return_description;

        return $this;
    }

    /**
     * Gets funding_type
     *
     * @return string|null
     */
    public function getFundingType()
    {
        return $this->container['funding_type'];
    }

    /**
     * Sets funding_type
     *
     * @param string|null $funding_type funding_type
     *
     * @return self
     */
    public function setFundingType($funding_type)
    {
        if (is_null($funding_type)) {
            throw new \InvalidArgumentException('non-nullable funding_type cannot be null');
        }
        $this->container['funding_type'] = $funding_type;

        return $this;
    }

    /**
     * Gets date_funding_requested
     *
     * @return string|null
     */
    public function getDateFundingRequested()
    {
        return $this->container['date_funding_requested'];
    }

    /**
     * Sets date_funding_requested
     *
     * @param string|null $date_funding_requested date_funding_requested
     *
     * @return self
     */
    public function setDateFundingRequested($date_funding_requested)
    {
        if (is_null($date_funding_requested)) {
            throw new \InvalidArgumentException('non-nullable date_funding_requested cannot be null');
        }
        $this->container['date_funding_requested'] = $date_funding_requested;

        return $this;
    }

    /**
     * Gets remote_id
     *
     * @return string|null
     */
    public function getRemoteId()
    {
        return $this->container['remote_id'];
    }

    /**
     * Sets remote_id
     *
     * @param string|null $remote_id Remote ID of the Payee, set by Payor
     *
     * @return self
     */
    public function setRemoteId($remote_id)
    {
        if (is_null($remote_id)) {
            throw new \InvalidArgumentException('non-nullable remote_id cannot be null');
        }
        $this->container['remote_id'] = $remote_id;

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
     * @param string|null $payee_type payee_type
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
     * Gets source_account
     *
     * @return string|null
     */
    public function getSourceAccount()
    {
        return $this->container['source_account'];
    }

    /**
     * Sets source_account
     *
     * @param string|null $source_account source_account
     *
     * @return self
     */
    public function setSourceAccount($source_account)
    {
        if (is_null($source_account)) {
            throw new \InvalidArgumentException('non-nullable source_account cannot be null');
        }
        $this->container['source_account'] = $source_account;

        return $this;
    }

    /**
     * Gets payment_amount
     *
     * @return int|null
     */
    public function getPaymentAmount()
    {
        return $this->container['payment_amount'];
    }

    /**
     * Sets payment_amount
     *
     * @param int|null $payment_amount payment_amount
     *
     * @return self
     */
    public function setPaymentAmount($payment_amount)
    {
        if (is_null($payment_amount)) {
            throw new \InvalidArgumentException('non-nullable payment_amount cannot be null');
        }
        $this->container['payment_amount'] = $payment_amount;

        return $this;
    }

    /**
     * Gets payment_currency
     *
     * @return string|null
     */
    public function getPaymentCurrency()
    {
        return $this->container['payment_currency'];
    }

    /**
     * Sets payment_currency
     *
     * @param string|null $payment_currency ISO 4217 3 character currency code
     *
     * @return self
     */
    public function setPaymentCurrency($payment_currency)
    {
        if (is_null($payment_currency)) {
            throw new \InvalidArgumentException('non-nullable payment_currency cannot be null');
        }
        $this->container['payment_currency'] = $payment_currency;

        return $this;
    }

    /**
     * Gets payment_memo
     *
     * @return string|null
     */
    public function getPaymentMemo()
    {
        return $this->container['payment_memo'];
    }

    /**
     * Sets payment_memo
     *
     * @param string|null $payment_memo payment_memo
     *
     * @return self
     */
    public function setPaymentMemo($payment_memo)
    {
        if (is_null($payment_memo)) {
            throw new \InvalidArgumentException('non-nullable payment_memo cannot be null');
        }
        $this->container['payment_memo'] = $payment_memo;

        return $this;
    }

    /**
     * Gets payment_rails
     *
     * @return string|null
     */
    public function getPaymentRails()
    {
        return $this->container['payment_rails'];
    }

    /**
     * Sets payment_rails
     *
     * @param string|null $payment_rails payment_rails
     *
     * @return self
     */
    public function setPaymentRails($payment_rails)
    {
        if (is_null($payment_rails)) {
            throw new \InvalidArgumentException('non-nullable payment_rails cannot be null');
        }
        $this->container['payment_rails'] = $payment_rails;

        return $this;
    }

    /**
     * Gets payor_payment_id
     *
     * @return string|null
     */
    public function getPayorPaymentId()
    {
        return $this->container['payor_payment_id'];
    }

    /**
     * Sets payor_payment_id
     *
     * @param string|null $payor_payment_id payor_payment_id
     *
     * @return self
     */
    public function setPayorPaymentId($payor_payment_id)
    {
        if (is_null($payor_payment_id)) {
            throw new \InvalidArgumentException('non-nullable payor_payment_id cannot be null');
        }
        $this->container['payor_payment_id'] = $payor_payment_id;

        return $this;
    }

    /**
     * Gets payment_status
     *
     * @return string|null
     */
    public function getPaymentStatus()
    {
        return $this->container['payment_status'];
    }

    /**
     * Sets payment_status
     *
     * @param string|null $payment_status payment_status
     *
     * @return self
     */
    public function setPaymentStatus($payment_status)
    {
        if (is_null($payment_status)) {
            throw new \InvalidArgumentException('non-nullable payment_status cannot be null');
        }
        $this->container['payment_status'] = $payment_status;

        return $this;
    }

    /**
     * Gets reject_reason
     *
     * @return string|null
     */
    public function getRejectReason()
    {
        return $this->container['reject_reason'];
    }

    /**
     * Sets reject_reason
     *
     * @param string|null $reject_reason reject_reason
     *
     * @return self
     */
    public function setRejectReason($reject_reason)
    {
        if (is_null($reject_reason)) {
            throw new \InvalidArgumentException('non-nullable reject_reason cannot be null');
        }
        $this->container['reject_reason'] = $reject_reason;

        return $this;
    }

    /**
     * Gets fx_applied
     *
     * @return float|null
     */
    public function getFxApplied()
    {
        return $this->container['fx_applied'];
    }

    /**
     * Sets fx_applied
     *
     * @param float|null $fx_applied fx_applied
     *
     * @return self
     */
    public function setFxApplied($fx_applied)
    {
        if (is_null($fx_applied)) {
            throw new \InvalidArgumentException('non-nullable fx_applied cannot be null');
        }
        $this->container['fx_applied'] = $fx_applied;

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


