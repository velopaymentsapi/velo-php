<?php
/**
 * PaymentAuditServiceApi
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

namespace VeloPayments\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use VeloPayments\Client\ApiException;
use VeloPayments\Client\Configuration;
use VeloPayments\Client\HeaderSelector;
use VeloPayments\Client\ObjectSerializer;

/**
 * PaymentAuditServiceApi Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class PaymentAuditServiceApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /** @var string[] $contentTypes **/
    public const contentTypes = [
        'exportTransactionsCSVV4' => [
            'application/json',
        ],
        'getFundingsV4' => [
            'application/json',
        ],
        'getPaymentDetailsV4' => [
            'application/json',
        ],
        'getPaymentsForPayoutV4' => [
            'application/json',
        ],
        'getPayoutStatsV4' => [
            'application/json',
        ],
        'getPayoutsForPayorV4' => [
            'application/json',
        ],
        'listPaymentChangesV4' => [
            'application/json',
        ],
        'listPaymentsAuditV4' => [
            'application/json',
        ],
    ];

/**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation exportTransactionsCSVV4
     *
     * Export Transactions
     *
     * @param  string $payor_id &lt;p&gt;The Payor ID for whom you wish to run the report.&lt;/p&gt; &lt;p&gt;For a Payor requesting the report, this could be their exact Payor, or it could be a child/descendant Payor.&lt;/p&gt; (optional)
     * @param  \DateTime $start_date Start date, inclusive. Format is YYYY-MM-DD (optional)
     * @param  \DateTime $end_date End date, inclusive. Format is YYYY-MM-DD (optional)
     * @param  string $include &lt;p&gt;Mode to determine whether to include other Payor&#39;s data in the results.&lt;/p&gt; &lt;p&gt;May only be used if payorId is specified.&lt;/p&gt; &lt;p&gt;Can be omitted or set to &#39;payorOnly&#39; or &#39;payorAndDescendants&#39;.&lt;/p&gt; &lt;p&gt;payorOnly: Only include results for the specified Payor. This is the default if &#39;include&#39; is omitted.&lt;/p&gt; &lt;p&gt;payorAndDescendants: Aggregate results for all descendant Payors of the specified Payor. Should only be used if the Payor with the specified payorId has at least one child Payor.&lt;/p&gt; &lt;p&gt;Note when a Payor requests the report and include&#x3D;payorAndDescendants is used, the following additional columns are included in the CSV: Payor Name, Payor Id&lt;/p&gt; (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['exportTransactionsCSVV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\PayorAmlTransaction|\VeloPayments\Client\Model\InlineResponse400
     */
    public function exportTransactionsCSVV4($payor_id = null, $start_date = null, $end_date = null, $include = null, string $contentType = self::contentTypes['exportTransactionsCSVV4'][0])
    {
        list($response) = $this->exportTransactionsCSVV4WithHttpInfo($payor_id, $start_date, $end_date, $include, $contentType);
        return $response;
    }

    /**
     * Operation exportTransactionsCSVV4WithHttpInfo
     *
     * Export Transactions
     *
     * @param  string $payor_id &lt;p&gt;The Payor ID for whom you wish to run the report.&lt;/p&gt; &lt;p&gt;For a Payor requesting the report, this could be their exact Payor, or it could be a child/descendant Payor.&lt;/p&gt; (optional)
     * @param  \DateTime $start_date Start date, inclusive. Format is YYYY-MM-DD (optional)
     * @param  \DateTime $end_date End date, inclusive. Format is YYYY-MM-DD (optional)
     * @param  string $include &lt;p&gt;Mode to determine whether to include other Payor&#39;s data in the results.&lt;/p&gt; &lt;p&gt;May only be used if payorId is specified.&lt;/p&gt; &lt;p&gt;Can be omitted or set to &#39;payorOnly&#39; or &#39;payorAndDescendants&#39;.&lt;/p&gt; &lt;p&gt;payorOnly: Only include results for the specified Payor. This is the default if &#39;include&#39; is omitted.&lt;/p&gt; &lt;p&gt;payorAndDescendants: Aggregate results for all descendant Payors of the specified Payor. Should only be used if the Payor with the specified payorId has at least one child Payor.&lt;/p&gt; &lt;p&gt;Note when a Payor requests the report and include&#x3D;payorAndDescendants is used, the following additional columns are included in the CSV: Payor Name, Payor Id&lt;/p&gt; (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['exportTransactionsCSVV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\PayorAmlTransaction|\VeloPayments\Client\Model\InlineResponse400, HTTP status code, HTTP response headers (array of strings)
     */
    public function exportTransactionsCSVV4WithHttpInfo($payor_id = null, $start_date = null, $end_date = null, $include = null, string $contentType = self::contentTypes['exportTransactionsCSVV4'][0])
    {
        $request = $this->exportTransactionsCSVV4Request($payor_id, $start_date, $end_date, $include, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\VeloPayments\Client\Model\PayorAmlTransaction' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\PayorAmlTransaction' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\PayorAmlTransaction', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\VeloPayments\Client\Model\InlineResponse400' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse400' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse400', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\VeloPayments\Client\Model\PayorAmlTransaction';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\PayorAmlTransaction',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse400',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation exportTransactionsCSVV4Async
     *
     * Export Transactions
     *
     * @param  string $payor_id &lt;p&gt;The Payor ID for whom you wish to run the report.&lt;/p&gt; &lt;p&gt;For a Payor requesting the report, this could be their exact Payor, or it could be a child/descendant Payor.&lt;/p&gt; (optional)
     * @param  \DateTime $start_date Start date, inclusive. Format is YYYY-MM-DD (optional)
     * @param  \DateTime $end_date End date, inclusive. Format is YYYY-MM-DD (optional)
     * @param  string $include &lt;p&gt;Mode to determine whether to include other Payor&#39;s data in the results.&lt;/p&gt; &lt;p&gt;May only be used if payorId is specified.&lt;/p&gt; &lt;p&gt;Can be omitted or set to &#39;payorOnly&#39; or &#39;payorAndDescendants&#39;.&lt;/p&gt; &lt;p&gt;payorOnly: Only include results for the specified Payor. This is the default if &#39;include&#39; is omitted.&lt;/p&gt; &lt;p&gt;payorAndDescendants: Aggregate results for all descendant Payors of the specified Payor. Should only be used if the Payor with the specified payorId has at least one child Payor.&lt;/p&gt; &lt;p&gt;Note when a Payor requests the report and include&#x3D;payorAndDescendants is used, the following additional columns are included in the CSV: Payor Name, Payor Id&lt;/p&gt; (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['exportTransactionsCSVV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function exportTransactionsCSVV4Async($payor_id = null, $start_date = null, $end_date = null, $include = null, string $contentType = self::contentTypes['exportTransactionsCSVV4'][0])
    {
        return $this->exportTransactionsCSVV4AsyncWithHttpInfo($payor_id, $start_date, $end_date, $include, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation exportTransactionsCSVV4AsyncWithHttpInfo
     *
     * Export Transactions
     *
     * @param  string $payor_id &lt;p&gt;The Payor ID for whom you wish to run the report.&lt;/p&gt; &lt;p&gt;For a Payor requesting the report, this could be their exact Payor, or it could be a child/descendant Payor.&lt;/p&gt; (optional)
     * @param  \DateTime $start_date Start date, inclusive. Format is YYYY-MM-DD (optional)
     * @param  \DateTime $end_date End date, inclusive. Format is YYYY-MM-DD (optional)
     * @param  string $include &lt;p&gt;Mode to determine whether to include other Payor&#39;s data in the results.&lt;/p&gt; &lt;p&gt;May only be used if payorId is specified.&lt;/p&gt; &lt;p&gt;Can be omitted or set to &#39;payorOnly&#39; or &#39;payorAndDescendants&#39;.&lt;/p&gt; &lt;p&gt;payorOnly: Only include results for the specified Payor. This is the default if &#39;include&#39; is omitted.&lt;/p&gt; &lt;p&gt;payorAndDescendants: Aggregate results for all descendant Payors of the specified Payor. Should only be used if the Payor with the specified payorId has at least one child Payor.&lt;/p&gt; &lt;p&gt;Note when a Payor requests the report and include&#x3D;payorAndDescendants is used, the following additional columns are included in the CSV: Payor Name, Payor Id&lt;/p&gt; (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['exportTransactionsCSVV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function exportTransactionsCSVV4AsyncWithHttpInfo($payor_id = null, $start_date = null, $end_date = null, $include = null, string $contentType = self::contentTypes['exportTransactionsCSVV4'][0])
    {
        $returnType = '\VeloPayments\Client\Model\PayorAmlTransaction';
        $request = $this->exportTransactionsCSVV4Request($payor_id, $start_date, $end_date, $include, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'exportTransactionsCSVV4'
     *
     * @param  string $payor_id &lt;p&gt;The Payor ID for whom you wish to run the report.&lt;/p&gt; &lt;p&gt;For a Payor requesting the report, this could be their exact Payor, or it could be a child/descendant Payor.&lt;/p&gt; (optional)
     * @param  \DateTime $start_date Start date, inclusive. Format is YYYY-MM-DD (optional)
     * @param  \DateTime $end_date End date, inclusive. Format is YYYY-MM-DD (optional)
     * @param  string $include &lt;p&gt;Mode to determine whether to include other Payor&#39;s data in the results.&lt;/p&gt; &lt;p&gt;May only be used if payorId is specified.&lt;/p&gt; &lt;p&gt;Can be omitted or set to &#39;payorOnly&#39; or &#39;payorAndDescendants&#39;.&lt;/p&gt; &lt;p&gt;payorOnly: Only include results for the specified Payor. This is the default if &#39;include&#39; is omitted.&lt;/p&gt; &lt;p&gt;payorAndDescendants: Aggregate results for all descendant Payors of the specified Payor. Should only be used if the Payor with the specified payorId has at least one child Payor.&lt;/p&gt; &lt;p&gt;Note when a Payor requests the report and include&#x3D;payorAndDescendants is used, the following additional columns are included in the CSV: Payor Name, Payor Id&lt;/p&gt; (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['exportTransactionsCSVV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function exportTransactionsCSVV4Request($payor_id = null, $start_date = null, $end_date = null, $include = null, string $contentType = self::contentTypes['exportTransactionsCSVV4'][0])
    {






        $resourcePath = '/v4/paymentaudit/transactions';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $payor_id,
            'payorId', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $start_date,
            'startDate', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $end_date,
            'endDate', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $include,
            'include', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);




        $headers = $this->headerSelector->selectHeaders(
            ['application/csv', 'application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getFundingsV4
     *
     * Get Fundings for Payor
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $source_account_name The source account name (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields. Example: &#x60;&#x60;&#x60;?sort&#x3D;destinationCurrency:asc,destinationAmount:asc&#x60;&#x60;&#x60; Default is no sort. The supported sort fields are: dateTime and amount. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getFundingsV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\GetFundingsResponse|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404
     */
    public function getFundingsV4($payor_id, $source_account_name = null, $page = 1, $page_size = 25, $sort = null, string $contentType = self::contentTypes['getFundingsV4'][0])
    {
        list($response) = $this->getFundingsV4WithHttpInfo($payor_id, $source_account_name, $page, $page_size, $sort, $contentType);
        return $response;
    }

    /**
     * Operation getFundingsV4WithHttpInfo
     *
     * Get Fundings for Payor
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $source_account_name The source account name (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields. Example: &#x60;&#x60;&#x60;?sort&#x3D;destinationCurrency:asc,destinationAmount:asc&#x60;&#x60;&#x60; Default is no sort. The supported sort fields are: dateTime and amount. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getFundingsV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\GetFundingsResponse|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404, HTTP status code, HTTP response headers (array of strings)
     */
    public function getFundingsV4WithHttpInfo($payor_id, $source_account_name = null, $page = 1, $page_size = 25, $sort = null, string $contentType = self::contentTypes['getFundingsV4'][0])
    {
        $request = $this->getFundingsV4Request($payor_id, $source_account_name, $page, $page_size, $sort, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\VeloPayments\Client\Model\GetFundingsResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\GetFundingsResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\GetFundingsResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\VeloPayments\Client\Model\InlineResponse400' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse400' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse400', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\VeloPayments\Client\Model\InlineResponse401' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse401' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse401', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\VeloPayments\Client\Model\InlineResponse403' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse403' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse403', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\VeloPayments\Client\Model\InlineResponse404' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse404' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse404', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\VeloPayments\Client\Model\GetFundingsResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\GetFundingsResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse400',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getFundingsV4Async
     *
     * Get Fundings for Payor
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $source_account_name The source account name (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields. Example: &#x60;&#x60;&#x60;?sort&#x3D;destinationCurrency:asc,destinationAmount:asc&#x60;&#x60;&#x60; Default is no sort. The supported sort fields are: dateTime and amount. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getFundingsV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getFundingsV4Async($payor_id, $source_account_name = null, $page = 1, $page_size = 25, $sort = null, string $contentType = self::contentTypes['getFundingsV4'][0])
    {
        return $this->getFundingsV4AsyncWithHttpInfo($payor_id, $source_account_name, $page, $page_size, $sort, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getFundingsV4AsyncWithHttpInfo
     *
     * Get Fundings for Payor
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $source_account_name The source account name (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields. Example: &#x60;&#x60;&#x60;?sort&#x3D;destinationCurrency:asc,destinationAmount:asc&#x60;&#x60;&#x60; Default is no sort. The supported sort fields are: dateTime and amount. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getFundingsV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getFundingsV4AsyncWithHttpInfo($payor_id, $source_account_name = null, $page = 1, $page_size = 25, $sort = null, string $contentType = self::contentTypes['getFundingsV4'][0])
    {
        $returnType = '\VeloPayments\Client\Model\GetFundingsResponse';
        $request = $this->getFundingsV4Request($payor_id, $source_account_name, $page, $page_size, $sort, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getFundingsV4'
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $source_account_name The source account name (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields. Example: &#x60;&#x60;&#x60;?sort&#x3D;destinationCurrency:asc,destinationAmount:asc&#x60;&#x60;&#x60; Default is no sort. The supported sort fields are: dateTime and amount. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getFundingsV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getFundingsV4Request($payor_id, $source_account_name = null, $page = 1, $page_size = 25, $sort = null, string $contentType = self::contentTypes['getFundingsV4'][0])
    {

        // verify the required parameter 'payor_id' is set
        if ($payor_id === null || (is_array($payor_id) && count($payor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payor_id when calling getFundingsV4'
            );
        }



        if ($page_size !== null && $page_size > 100) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling PaymentAuditServiceApi.getFundingsV4, must be smaller than or equal to 100.');
        }
        if ($page_size !== null && $page_size < 1) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling PaymentAuditServiceApi.getFundingsV4, must be bigger than or equal to 1.');
        }
        


        $resourcePath = '/v4/paymentaudit/fundings';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $payor_id,
            'payorId', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            true // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $source_account_name,
            'sourceAccountName', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $page,
            'page', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $page_size,
            'pageSize', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $sort,
            'sort', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);




        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getPaymentDetailsV4
     *
     * Get Payment
     *
     * @param  string $payment_id Payment Id (required)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentDetailsV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\PaymentResponseV4|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404
     */
    public function getPaymentDetailsV4($payment_id, $sensitive = null, string $contentType = self::contentTypes['getPaymentDetailsV4'][0])
    {
        list($response) = $this->getPaymentDetailsV4WithHttpInfo($payment_id, $sensitive, $contentType);
        return $response;
    }

    /**
     * Operation getPaymentDetailsV4WithHttpInfo
     *
     * Get Payment
     *
     * @param  string $payment_id Payment Id (required)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentDetailsV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\PaymentResponseV4|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPaymentDetailsV4WithHttpInfo($payment_id, $sensitive = null, string $contentType = self::contentTypes['getPaymentDetailsV4'][0])
    {
        $request = $this->getPaymentDetailsV4Request($payment_id, $sensitive, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\VeloPayments\Client\Model\PaymentResponseV4' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\PaymentResponseV4' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\PaymentResponseV4', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\VeloPayments\Client\Model\InlineResponse400' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse400' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse400', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\VeloPayments\Client\Model\InlineResponse401' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse401' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse401', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\VeloPayments\Client\Model\InlineResponse403' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse403' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse403', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\VeloPayments\Client\Model\InlineResponse404' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse404' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse404', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\VeloPayments\Client\Model\PaymentResponseV4';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\PaymentResponseV4',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse400',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPaymentDetailsV4Async
     *
     * Get Payment
     *
     * @param  string $payment_id Payment Id (required)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentDetailsV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPaymentDetailsV4Async($payment_id, $sensitive = null, string $contentType = self::contentTypes['getPaymentDetailsV4'][0])
    {
        return $this->getPaymentDetailsV4AsyncWithHttpInfo($payment_id, $sensitive, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPaymentDetailsV4AsyncWithHttpInfo
     *
     * Get Payment
     *
     * @param  string $payment_id Payment Id (required)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentDetailsV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPaymentDetailsV4AsyncWithHttpInfo($payment_id, $sensitive = null, string $contentType = self::contentTypes['getPaymentDetailsV4'][0])
    {
        $returnType = '\VeloPayments\Client\Model\PaymentResponseV4';
        $request = $this->getPaymentDetailsV4Request($payment_id, $sensitive, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getPaymentDetailsV4'
     *
     * @param  string $payment_id Payment Id (required)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentDetailsV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getPaymentDetailsV4Request($payment_id, $sensitive = null, string $contentType = self::contentTypes['getPaymentDetailsV4'][0])
    {

        // verify the required parameter 'payment_id' is set
        if ($payment_id === null || (is_array($payment_id) && count($payment_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payment_id when calling getPaymentDetailsV4'
            );
        }



        $resourcePath = '/v4/paymentaudit/payments/{paymentId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $sensitive,
            'sensitive', // param base name
            'boolean', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($payment_id !== null) {
            $resourcePath = str_replace(
                '{' . 'paymentId' . '}',
                ObjectSerializer::toPathValue($payment_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getPaymentsForPayoutV4
     *
     * Get Payments for Payout
     *
     * @param  string $payout_id The id (UUID) of the payout. (required)
     * @param  string $rails_id Payout Rails ID filter - case insensitive match. Any value is allowed, but you should use one of the supported railsId values. To get this list of values, you should call the &#39;Get Supported Rails&#39; endpoint. (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $remote_system_id The id of the remote system that is orchestrating payments (optional)
     * @param  string $status Payment Status (optional)
     * @param  int $source_amount_from The source amount from range filter. Filters for sourceAmount &gt;&#x3D; sourceAmountFrom (optional)
     * @param  int $source_amount_to The source amount to range filter. Filters for sourceAmount ⇐ sourceAmountTo (optional)
     * @param  int $payment_amount_from The payment amount from range filter. Filters for paymentAmount &gt;&#x3D; paymentAmountFrom (optional)
     * @param  int $payment_amount_to The payment amount to range filter. Filters for paymentAmount ⇐ paymentAmountTo (optional)
     * @param  \DateTime $submitted_date_from The submitted date from range filter. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $submitted_date_to The submitted date to range filter. Format is yyyy-MM-dd. (optional)
     * @param  string $transmission_type Transmission Type * ACH * SAME_DAY_ACH * WIRE * GACHO (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status (optional)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentsForPayoutV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\GetPaymentsForPayoutResponseV4|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404
     */
    public function getPaymentsForPayoutV4($payout_id, $rails_id = null, $remote_id = null, $remote_system_id = null, $status = null, $source_amount_from = null, $source_amount_to = null, $payment_amount_from = null, $payment_amount_to = null, $submitted_date_from = null, $submitted_date_to = null, $transmission_type = null, $page = 1, $page_size = 25, $sort = null, $sensitive = null, string $contentType = self::contentTypes['getPaymentsForPayoutV4'][0])
    {
        list($response) = $this->getPaymentsForPayoutV4WithHttpInfo($payout_id, $rails_id, $remote_id, $remote_system_id, $status, $source_amount_from, $source_amount_to, $payment_amount_from, $payment_amount_to, $submitted_date_from, $submitted_date_to, $transmission_type, $page, $page_size, $sort, $sensitive, $contentType);
        return $response;
    }

    /**
     * Operation getPaymentsForPayoutV4WithHttpInfo
     *
     * Get Payments for Payout
     *
     * @param  string $payout_id The id (UUID) of the payout. (required)
     * @param  string $rails_id Payout Rails ID filter - case insensitive match. Any value is allowed, but you should use one of the supported railsId values. To get this list of values, you should call the &#39;Get Supported Rails&#39; endpoint. (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $remote_system_id The id of the remote system that is orchestrating payments (optional)
     * @param  string $status Payment Status (optional)
     * @param  int $source_amount_from The source amount from range filter. Filters for sourceAmount &gt;&#x3D; sourceAmountFrom (optional)
     * @param  int $source_amount_to The source amount to range filter. Filters for sourceAmount ⇐ sourceAmountTo (optional)
     * @param  int $payment_amount_from The payment amount from range filter. Filters for paymentAmount &gt;&#x3D; paymentAmountFrom (optional)
     * @param  int $payment_amount_to The payment amount to range filter. Filters for paymentAmount ⇐ paymentAmountTo (optional)
     * @param  \DateTime $submitted_date_from The submitted date from range filter. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $submitted_date_to The submitted date to range filter. Format is yyyy-MM-dd. (optional)
     * @param  string $transmission_type Transmission Type * ACH * SAME_DAY_ACH * WIRE * GACHO (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status (optional)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentsForPayoutV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\GetPaymentsForPayoutResponseV4|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPaymentsForPayoutV4WithHttpInfo($payout_id, $rails_id = null, $remote_id = null, $remote_system_id = null, $status = null, $source_amount_from = null, $source_amount_to = null, $payment_amount_from = null, $payment_amount_to = null, $submitted_date_from = null, $submitted_date_to = null, $transmission_type = null, $page = 1, $page_size = 25, $sort = null, $sensitive = null, string $contentType = self::contentTypes['getPaymentsForPayoutV4'][0])
    {
        $request = $this->getPaymentsForPayoutV4Request($payout_id, $rails_id, $remote_id, $remote_system_id, $status, $source_amount_from, $source_amount_to, $payment_amount_from, $payment_amount_to, $submitted_date_from, $submitted_date_to, $transmission_type, $page, $page_size, $sort, $sensitive, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\VeloPayments\Client\Model\GetPaymentsForPayoutResponseV4' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\GetPaymentsForPayoutResponseV4' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\GetPaymentsForPayoutResponseV4', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\VeloPayments\Client\Model\InlineResponse400' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse400' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse400', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\VeloPayments\Client\Model\InlineResponse401' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse401' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse401', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\VeloPayments\Client\Model\InlineResponse403' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse403' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse403', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\VeloPayments\Client\Model\InlineResponse404' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse404' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse404', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\VeloPayments\Client\Model\GetPaymentsForPayoutResponseV4';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\GetPaymentsForPayoutResponseV4',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse400',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPaymentsForPayoutV4Async
     *
     * Get Payments for Payout
     *
     * @param  string $payout_id The id (UUID) of the payout. (required)
     * @param  string $rails_id Payout Rails ID filter - case insensitive match. Any value is allowed, but you should use one of the supported railsId values. To get this list of values, you should call the &#39;Get Supported Rails&#39; endpoint. (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $remote_system_id The id of the remote system that is orchestrating payments (optional)
     * @param  string $status Payment Status (optional)
     * @param  int $source_amount_from The source amount from range filter. Filters for sourceAmount &gt;&#x3D; sourceAmountFrom (optional)
     * @param  int $source_amount_to The source amount to range filter. Filters for sourceAmount ⇐ sourceAmountTo (optional)
     * @param  int $payment_amount_from The payment amount from range filter. Filters for paymentAmount &gt;&#x3D; paymentAmountFrom (optional)
     * @param  int $payment_amount_to The payment amount to range filter. Filters for paymentAmount ⇐ paymentAmountTo (optional)
     * @param  \DateTime $submitted_date_from The submitted date from range filter. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $submitted_date_to The submitted date to range filter. Format is yyyy-MM-dd. (optional)
     * @param  string $transmission_type Transmission Type * ACH * SAME_DAY_ACH * WIRE * GACHO (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status (optional)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentsForPayoutV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPaymentsForPayoutV4Async($payout_id, $rails_id = null, $remote_id = null, $remote_system_id = null, $status = null, $source_amount_from = null, $source_amount_to = null, $payment_amount_from = null, $payment_amount_to = null, $submitted_date_from = null, $submitted_date_to = null, $transmission_type = null, $page = 1, $page_size = 25, $sort = null, $sensitive = null, string $contentType = self::contentTypes['getPaymentsForPayoutV4'][0])
    {
        return $this->getPaymentsForPayoutV4AsyncWithHttpInfo($payout_id, $rails_id, $remote_id, $remote_system_id, $status, $source_amount_from, $source_amount_to, $payment_amount_from, $payment_amount_to, $submitted_date_from, $submitted_date_to, $transmission_type, $page, $page_size, $sort, $sensitive, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPaymentsForPayoutV4AsyncWithHttpInfo
     *
     * Get Payments for Payout
     *
     * @param  string $payout_id The id (UUID) of the payout. (required)
     * @param  string $rails_id Payout Rails ID filter - case insensitive match. Any value is allowed, but you should use one of the supported railsId values. To get this list of values, you should call the &#39;Get Supported Rails&#39; endpoint. (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $remote_system_id The id of the remote system that is orchestrating payments (optional)
     * @param  string $status Payment Status (optional)
     * @param  int $source_amount_from The source amount from range filter. Filters for sourceAmount &gt;&#x3D; sourceAmountFrom (optional)
     * @param  int $source_amount_to The source amount to range filter. Filters for sourceAmount ⇐ sourceAmountTo (optional)
     * @param  int $payment_amount_from The payment amount from range filter. Filters for paymentAmount &gt;&#x3D; paymentAmountFrom (optional)
     * @param  int $payment_amount_to The payment amount to range filter. Filters for paymentAmount ⇐ paymentAmountTo (optional)
     * @param  \DateTime $submitted_date_from The submitted date from range filter. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $submitted_date_to The submitted date to range filter. Format is yyyy-MM-dd. (optional)
     * @param  string $transmission_type Transmission Type * ACH * SAME_DAY_ACH * WIRE * GACHO (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status (optional)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentsForPayoutV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPaymentsForPayoutV4AsyncWithHttpInfo($payout_id, $rails_id = null, $remote_id = null, $remote_system_id = null, $status = null, $source_amount_from = null, $source_amount_to = null, $payment_amount_from = null, $payment_amount_to = null, $submitted_date_from = null, $submitted_date_to = null, $transmission_type = null, $page = 1, $page_size = 25, $sort = null, $sensitive = null, string $contentType = self::contentTypes['getPaymentsForPayoutV4'][0])
    {
        $returnType = '\VeloPayments\Client\Model\GetPaymentsForPayoutResponseV4';
        $request = $this->getPaymentsForPayoutV4Request($payout_id, $rails_id, $remote_id, $remote_system_id, $status, $source_amount_from, $source_amount_to, $payment_amount_from, $payment_amount_to, $submitted_date_from, $submitted_date_to, $transmission_type, $page, $page_size, $sort, $sensitive, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getPaymentsForPayoutV4'
     *
     * @param  string $payout_id The id (UUID) of the payout. (required)
     * @param  string $rails_id Payout Rails ID filter - case insensitive match. Any value is allowed, but you should use one of the supported railsId values. To get this list of values, you should call the &#39;Get Supported Rails&#39; endpoint. (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $remote_system_id The id of the remote system that is orchestrating payments (optional)
     * @param  string $status Payment Status (optional)
     * @param  int $source_amount_from The source amount from range filter. Filters for sourceAmount &gt;&#x3D; sourceAmountFrom (optional)
     * @param  int $source_amount_to The source amount to range filter. Filters for sourceAmount ⇐ sourceAmountTo (optional)
     * @param  int $payment_amount_from The payment amount from range filter. Filters for paymentAmount &gt;&#x3D; paymentAmountFrom (optional)
     * @param  int $payment_amount_to The payment amount to range filter. Filters for paymentAmount ⇐ paymentAmountTo (optional)
     * @param  \DateTime $submitted_date_from The submitted date from range filter. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $submitted_date_to The submitted date to range filter. Format is yyyy-MM-dd. (optional)
     * @param  string $transmission_type Transmission Type * ACH * SAME_DAY_ACH * WIRE * GACHO (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status (optional)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentsForPayoutV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getPaymentsForPayoutV4Request($payout_id, $rails_id = null, $remote_id = null, $remote_system_id = null, $status = null, $source_amount_from = null, $source_amount_to = null, $payment_amount_from = null, $payment_amount_to = null, $submitted_date_from = null, $submitted_date_to = null, $transmission_type = null, $page = 1, $page_size = 25, $sort = null, $sensitive = null, string $contentType = self::contentTypes['getPaymentsForPayoutV4'][0])
    {

        // verify the required parameter 'payout_id' is set
        if ($payout_id === null || (is_array($payout_id) && count($payout_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payout_id when calling getPaymentsForPayoutV4'
            );
        }













        if ($page_size !== null && $page_size > 100) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling PaymentAuditServiceApi.getPaymentsForPayoutV4, must be smaller than or equal to 100.');
        }
        if ($page_size !== null && $page_size < 1) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling PaymentAuditServiceApi.getPaymentsForPayoutV4, must be bigger than or equal to 1.');
        }
        



        $resourcePath = '/v4/paymentaudit/payouts/{payoutId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $rails_id,
            'railsId', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $remote_id,
            'remoteId', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $remote_system_id,
            'remoteSystemId', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $status,
            'status', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $source_amount_from,
            'sourceAmountFrom', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $source_amount_to,
            'sourceAmountTo', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $payment_amount_from,
            'paymentAmountFrom', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $payment_amount_to,
            'paymentAmountTo', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $submitted_date_from,
            'submittedDateFrom', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $submitted_date_to,
            'submittedDateTo', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $transmission_type,
            'transmissionType', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $page,
            'page', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $page_size,
            'pageSize', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $sort,
            'sort', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $sensitive,
            'sensitive', // param base name
            'boolean', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($payout_id !== null) {
            $resourcePath = str_replace(
                '{' . 'payoutId' . '}',
                ObjectSerializer::toPathValue($payout_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getPayoutStatsV4
     *
     * Get Payout Statistics
     *
     * @param  string $payor_id The account owner Payor ID. Required for external users. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayoutStatsV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\GetPayoutStatistics|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404
     */
    public function getPayoutStatsV4($payor_id = null, string $contentType = self::contentTypes['getPayoutStatsV4'][0])
    {
        list($response) = $this->getPayoutStatsV4WithHttpInfo($payor_id, $contentType);
        return $response;
    }

    /**
     * Operation getPayoutStatsV4WithHttpInfo
     *
     * Get Payout Statistics
     *
     * @param  string $payor_id The account owner Payor ID. Required for external users. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayoutStatsV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\GetPayoutStatistics|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPayoutStatsV4WithHttpInfo($payor_id = null, string $contentType = self::contentTypes['getPayoutStatsV4'][0])
    {
        $request = $this->getPayoutStatsV4Request($payor_id, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\VeloPayments\Client\Model\GetPayoutStatistics' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\GetPayoutStatistics' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\GetPayoutStatistics', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\VeloPayments\Client\Model\InlineResponse400' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse400' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse400', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\VeloPayments\Client\Model\InlineResponse401' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse401' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse401', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\VeloPayments\Client\Model\InlineResponse403' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse403' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse403', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\VeloPayments\Client\Model\InlineResponse404' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse404' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse404', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\VeloPayments\Client\Model\GetPayoutStatistics';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\GetPayoutStatistics',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse400',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPayoutStatsV4Async
     *
     * Get Payout Statistics
     *
     * @param  string $payor_id The account owner Payor ID. Required for external users. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayoutStatsV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPayoutStatsV4Async($payor_id = null, string $contentType = self::contentTypes['getPayoutStatsV4'][0])
    {
        return $this->getPayoutStatsV4AsyncWithHttpInfo($payor_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPayoutStatsV4AsyncWithHttpInfo
     *
     * Get Payout Statistics
     *
     * @param  string $payor_id The account owner Payor ID. Required for external users. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayoutStatsV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPayoutStatsV4AsyncWithHttpInfo($payor_id = null, string $contentType = self::contentTypes['getPayoutStatsV4'][0])
    {
        $returnType = '\VeloPayments\Client\Model\GetPayoutStatistics';
        $request = $this->getPayoutStatsV4Request($payor_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getPayoutStatsV4'
     *
     * @param  string $payor_id The account owner Payor ID. Required for external users. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayoutStatsV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getPayoutStatsV4Request($payor_id = null, string $contentType = self::contentTypes['getPayoutStatsV4'][0])
    {



        $resourcePath = '/v4/paymentaudit/payoutStatistics';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $payor_id,
            'payorId', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);




        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getPayoutsForPayorV4
     *
     * Get Payouts for Payor
     *
     * @param  string $payor_id The id (UUID) of the payor funding the payout or the payor whose payees are being paid. (optional)
     * @param  string $payout_memo Payout Memo filter - case insensitive sub-string match (optional)
     * @param  string $status Payout Status (optional)
     * @param  \DateTime $submitted_date_from The submitted date from range filter. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $submitted_date_to The submitted date to range filter. Format is yyyy-MM-dd. (optional)
     * @param  string $from_payor_name The name of the payor whose payees are being paid. This filters via a case insensitive substring match. (optional)
     * @param  \DateTime $scheduled_for_date_from Filter payouts scheduled to run on or after the given date. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $scheduled_for_date_to Filter payouts scheduled to run on or before the given date. Format is yyyy-MM-dd. (optional)
     * @param  string $schedule_status Payout Schedule Status (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,instructedDateTime:asc,status:asc) Default is submittedDateTime:asc The supported sort fields are: submittedDateTime, instructedDateTime, status, totalPayments, payoutId, scheduledFor (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayoutsForPayorV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\GetPayoutsResponse|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404
     */
    public function getPayoutsForPayorV4($payor_id = null, $payout_memo = null, $status = null, $submitted_date_from = null, $submitted_date_to = null, $from_payor_name = null, $scheduled_for_date_from = null, $scheduled_for_date_to = null, $schedule_status = null, $page = 1, $page_size = 25, $sort = null, string $contentType = self::contentTypes['getPayoutsForPayorV4'][0])
    {
        list($response) = $this->getPayoutsForPayorV4WithHttpInfo($payor_id, $payout_memo, $status, $submitted_date_from, $submitted_date_to, $from_payor_name, $scheduled_for_date_from, $scheduled_for_date_to, $schedule_status, $page, $page_size, $sort, $contentType);
        return $response;
    }

    /**
     * Operation getPayoutsForPayorV4WithHttpInfo
     *
     * Get Payouts for Payor
     *
     * @param  string $payor_id The id (UUID) of the payor funding the payout or the payor whose payees are being paid. (optional)
     * @param  string $payout_memo Payout Memo filter - case insensitive sub-string match (optional)
     * @param  string $status Payout Status (optional)
     * @param  \DateTime $submitted_date_from The submitted date from range filter. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $submitted_date_to The submitted date to range filter. Format is yyyy-MM-dd. (optional)
     * @param  string $from_payor_name The name of the payor whose payees are being paid. This filters via a case insensitive substring match. (optional)
     * @param  \DateTime $scheduled_for_date_from Filter payouts scheduled to run on or after the given date. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $scheduled_for_date_to Filter payouts scheduled to run on or before the given date. Format is yyyy-MM-dd. (optional)
     * @param  string $schedule_status Payout Schedule Status (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,instructedDateTime:asc,status:asc) Default is submittedDateTime:asc The supported sort fields are: submittedDateTime, instructedDateTime, status, totalPayments, payoutId, scheduledFor (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayoutsForPayorV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\GetPayoutsResponse|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPayoutsForPayorV4WithHttpInfo($payor_id = null, $payout_memo = null, $status = null, $submitted_date_from = null, $submitted_date_to = null, $from_payor_name = null, $scheduled_for_date_from = null, $scheduled_for_date_to = null, $schedule_status = null, $page = 1, $page_size = 25, $sort = null, string $contentType = self::contentTypes['getPayoutsForPayorV4'][0])
    {
        $request = $this->getPayoutsForPayorV4Request($payor_id, $payout_memo, $status, $submitted_date_from, $submitted_date_to, $from_payor_name, $scheduled_for_date_from, $scheduled_for_date_to, $schedule_status, $page, $page_size, $sort, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\VeloPayments\Client\Model\GetPayoutsResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\GetPayoutsResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\GetPayoutsResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\VeloPayments\Client\Model\InlineResponse400' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse400' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse400', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\VeloPayments\Client\Model\InlineResponse401' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse401' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse401', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\VeloPayments\Client\Model\InlineResponse403' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse403' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse403', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\VeloPayments\Client\Model\InlineResponse404' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse404' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse404', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\VeloPayments\Client\Model\GetPayoutsResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\GetPayoutsResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse400',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPayoutsForPayorV4Async
     *
     * Get Payouts for Payor
     *
     * @param  string $payor_id The id (UUID) of the payor funding the payout or the payor whose payees are being paid. (optional)
     * @param  string $payout_memo Payout Memo filter - case insensitive sub-string match (optional)
     * @param  string $status Payout Status (optional)
     * @param  \DateTime $submitted_date_from The submitted date from range filter. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $submitted_date_to The submitted date to range filter. Format is yyyy-MM-dd. (optional)
     * @param  string $from_payor_name The name of the payor whose payees are being paid. This filters via a case insensitive substring match. (optional)
     * @param  \DateTime $scheduled_for_date_from Filter payouts scheduled to run on or after the given date. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $scheduled_for_date_to Filter payouts scheduled to run on or before the given date. Format is yyyy-MM-dd. (optional)
     * @param  string $schedule_status Payout Schedule Status (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,instructedDateTime:asc,status:asc) Default is submittedDateTime:asc The supported sort fields are: submittedDateTime, instructedDateTime, status, totalPayments, payoutId, scheduledFor (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayoutsForPayorV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPayoutsForPayorV4Async($payor_id = null, $payout_memo = null, $status = null, $submitted_date_from = null, $submitted_date_to = null, $from_payor_name = null, $scheduled_for_date_from = null, $scheduled_for_date_to = null, $schedule_status = null, $page = 1, $page_size = 25, $sort = null, string $contentType = self::contentTypes['getPayoutsForPayorV4'][0])
    {
        return $this->getPayoutsForPayorV4AsyncWithHttpInfo($payor_id, $payout_memo, $status, $submitted_date_from, $submitted_date_to, $from_payor_name, $scheduled_for_date_from, $scheduled_for_date_to, $schedule_status, $page, $page_size, $sort, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPayoutsForPayorV4AsyncWithHttpInfo
     *
     * Get Payouts for Payor
     *
     * @param  string $payor_id The id (UUID) of the payor funding the payout or the payor whose payees are being paid. (optional)
     * @param  string $payout_memo Payout Memo filter - case insensitive sub-string match (optional)
     * @param  string $status Payout Status (optional)
     * @param  \DateTime $submitted_date_from The submitted date from range filter. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $submitted_date_to The submitted date to range filter. Format is yyyy-MM-dd. (optional)
     * @param  string $from_payor_name The name of the payor whose payees are being paid. This filters via a case insensitive substring match. (optional)
     * @param  \DateTime $scheduled_for_date_from Filter payouts scheduled to run on or after the given date. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $scheduled_for_date_to Filter payouts scheduled to run on or before the given date. Format is yyyy-MM-dd. (optional)
     * @param  string $schedule_status Payout Schedule Status (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,instructedDateTime:asc,status:asc) Default is submittedDateTime:asc The supported sort fields are: submittedDateTime, instructedDateTime, status, totalPayments, payoutId, scheduledFor (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayoutsForPayorV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPayoutsForPayorV4AsyncWithHttpInfo($payor_id = null, $payout_memo = null, $status = null, $submitted_date_from = null, $submitted_date_to = null, $from_payor_name = null, $scheduled_for_date_from = null, $scheduled_for_date_to = null, $schedule_status = null, $page = 1, $page_size = 25, $sort = null, string $contentType = self::contentTypes['getPayoutsForPayorV4'][0])
    {
        $returnType = '\VeloPayments\Client\Model\GetPayoutsResponse';
        $request = $this->getPayoutsForPayorV4Request($payor_id, $payout_memo, $status, $submitted_date_from, $submitted_date_to, $from_payor_name, $scheduled_for_date_from, $scheduled_for_date_to, $schedule_status, $page, $page_size, $sort, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getPayoutsForPayorV4'
     *
     * @param  string $payor_id The id (UUID) of the payor funding the payout or the payor whose payees are being paid. (optional)
     * @param  string $payout_memo Payout Memo filter - case insensitive sub-string match (optional)
     * @param  string $status Payout Status (optional)
     * @param  \DateTime $submitted_date_from The submitted date from range filter. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $submitted_date_to The submitted date to range filter. Format is yyyy-MM-dd. (optional)
     * @param  string $from_payor_name The name of the payor whose payees are being paid. This filters via a case insensitive substring match. (optional)
     * @param  \DateTime $scheduled_for_date_from Filter payouts scheduled to run on or after the given date. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $scheduled_for_date_to Filter payouts scheduled to run on or before the given date. Format is yyyy-MM-dd. (optional)
     * @param  string $schedule_status Payout Schedule Status (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,instructedDateTime:asc,status:asc) Default is submittedDateTime:asc The supported sort fields are: submittedDateTime, instructedDateTime, status, totalPayments, payoutId, scheduledFor (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayoutsForPayorV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getPayoutsForPayorV4Request($payor_id = null, $payout_memo = null, $status = null, $submitted_date_from = null, $submitted_date_to = null, $from_payor_name = null, $scheduled_for_date_from = null, $scheduled_for_date_to = null, $schedule_status = null, $page = 1, $page_size = 25, $sort = null, string $contentType = self::contentTypes['getPayoutsForPayorV4'][0])
    {











        if ($page_size !== null && $page_size > 100) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling PaymentAuditServiceApi.getPayoutsForPayorV4, must be smaller than or equal to 100.');
        }
        if ($page_size !== null && $page_size < 1) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling PaymentAuditServiceApi.getPayoutsForPayorV4, must be bigger than or equal to 1.');
        }
        


        $resourcePath = '/v4/paymentaudit/payouts';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $payor_id,
            'payorId', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $payout_memo,
            'payoutMemo', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $status,
            'status', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $submitted_date_from,
            'submittedDateFrom', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $submitted_date_to,
            'submittedDateTo', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $from_payor_name,
            'fromPayorName', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $scheduled_for_date_from,
            'scheduledForDateFrom', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $scheduled_for_date_to,
            'scheduledForDateTo', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $schedule_status,
            'scheduleStatus', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $page,
            'page', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $page_size,
            'pageSize', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $sort,
            'sort', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);




        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation listPaymentChangesV4
     *
     * List Payment Changes
     *
     * @param  string $payor_id The Payor ID to find associated Payments (required)
     * @param  \DateTime $updated_since The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm (required)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 100)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPaymentChangesV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\PaymentDeltaResponse|\VeloPayments\Client\Model\InlineResponse400
     */
    public function listPaymentChangesV4($payor_id, $updated_since, $page = 1, $page_size = 100, string $contentType = self::contentTypes['listPaymentChangesV4'][0])
    {
        list($response) = $this->listPaymentChangesV4WithHttpInfo($payor_id, $updated_since, $page, $page_size, $contentType);
        return $response;
    }

    /**
     * Operation listPaymentChangesV4WithHttpInfo
     *
     * List Payment Changes
     *
     * @param  string $payor_id The Payor ID to find associated Payments (required)
     * @param  \DateTime $updated_since The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm (required)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 100)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPaymentChangesV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\PaymentDeltaResponse|\VeloPayments\Client\Model\InlineResponse400, HTTP status code, HTTP response headers (array of strings)
     */
    public function listPaymentChangesV4WithHttpInfo($payor_id, $updated_since, $page = 1, $page_size = 100, string $contentType = self::contentTypes['listPaymentChangesV4'][0])
    {
        $request = $this->listPaymentChangesV4Request($payor_id, $updated_since, $page, $page_size, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\VeloPayments\Client\Model\PaymentDeltaResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\PaymentDeltaResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\PaymentDeltaResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\VeloPayments\Client\Model\InlineResponse400' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse400' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse400', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\VeloPayments\Client\Model\PaymentDeltaResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\PaymentDeltaResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse400',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listPaymentChangesV4Async
     *
     * List Payment Changes
     *
     * @param  string $payor_id The Payor ID to find associated Payments (required)
     * @param  \DateTime $updated_since The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm (required)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 100)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPaymentChangesV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listPaymentChangesV4Async($payor_id, $updated_since, $page = 1, $page_size = 100, string $contentType = self::contentTypes['listPaymentChangesV4'][0])
    {
        return $this->listPaymentChangesV4AsyncWithHttpInfo($payor_id, $updated_since, $page, $page_size, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listPaymentChangesV4AsyncWithHttpInfo
     *
     * List Payment Changes
     *
     * @param  string $payor_id The Payor ID to find associated Payments (required)
     * @param  \DateTime $updated_since The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm (required)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 100)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPaymentChangesV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listPaymentChangesV4AsyncWithHttpInfo($payor_id, $updated_since, $page = 1, $page_size = 100, string $contentType = self::contentTypes['listPaymentChangesV4'][0])
    {
        $returnType = '\VeloPayments\Client\Model\PaymentDeltaResponse';
        $request = $this->listPaymentChangesV4Request($payor_id, $updated_since, $page, $page_size, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'listPaymentChangesV4'
     *
     * @param  string $payor_id The Payor ID to find associated Payments (required)
     * @param  \DateTime $updated_since The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm (required)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 100)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPaymentChangesV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function listPaymentChangesV4Request($payor_id, $updated_since, $page = 1, $page_size = 100, string $contentType = self::contentTypes['listPaymentChangesV4'][0])
    {

        // verify the required parameter 'payor_id' is set
        if ($payor_id === null || (is_array($payor_id) && count($payor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payor_id when calling listPaymentChangesV4'
            );
        }

        // verify the required parameter 'updated_since' is set
        if ($updated_since === null || (is_array($updated_since) && count($updated_since) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $updated_since when calling listPaymentChangesV4'
            );
        }


        if ($page_size !== null && $page_size > 1000) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling PaymentAuditServiceApi.listPaymentChangesV4, must be smaller than or equal to 1000.');
        }
        if ($page_size !== null && $page_size < 1) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling PaymentAuditServiceApi.listPaymentChangesV4, must be bigger than or equal to 1.');
        }
        

        $resourcePath = '/v4/payments/deltas';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $payor_id,
            'payorId', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            true // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $updated_since,
            'updatedSince', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            true // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $page,
            'page', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $page_size,
            'pageSize', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);




        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation listPaymentsAuditV4
     *
     * Get List of Payments
     *
     * @param  string $payee_id The UUID of the payee. (optional)
     * @param  string $payor_id The account owner Payor Id. Required for external users. (optional)
     * @param  string $payor_name The payor’s name. This filters via a case insensitive substring match. (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $remote_system_id The id of the remote system that is orchestrating payments (optional)
     * @param  string $status Payment Status (optional)
     * @param  string $transmission_type Transmission Type * ACH * SAME_DAY_ACH * WIRE * GACHO (optional)
     * @param  string $source_account_name The source account name filter. This filters via a case insensitive substring match. (optional)
     * @param  int $source_amount_from The source amount from range filter. Filters for sourceAmount &gt;&#x3D; sourceAmountFrom (optional)
     * @param  int $source_amount_to The source amount to range filter. Filters for sourceAmount ⇐ sourceAmountTo (optional)
     * @param  string $source_currency The source currency filter. Filters based on an exact match on the currency. (optional)
     * @param  int $payment_amount_from The payment amount from range filter. Filters for paymentAmount &gt;&#x3D; paymentAmountFrom (optional)
     * @param  int $payment_amount_to The payment amount to range filter. Filters for paymentAmount ⇐ paymentAmountTo (optional)
     * @param  string $payment_currency The payment currency filter. Filters based on an exact match on the currency. (optional)
     * @param  \DateTime $submitted_date_from The submitted date from range filter. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $submitted_date_to The submitted date to range filter. Format is yyyy-MM-dd. (optional)
     * @param  string $payment_memo The payment memo filter. This filters via a case insensitive substring match. (optional)
     * @param  string $payor_payment_id Payor&#39;s Id of the Payment (optional)
     * @param  string $rails_id Payout Rails ID filter - case insensitive match. Any value is allowed, but you should use one of the supported railsId values. To get this list of values, you should call the &#39;Get Supported Rails&#39; endpoint. (optional)
     * @param  \DateTime $scheduled_for_date_from Filter payouts scheduled to run on or after the given date. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $scheduled_for_date_to Filter payouts scheduled to run on or before the given date. Format is yyyy-MM-dd. (optional)
     * @param  string $schedule_status Payout Schedule Status (optional)
     * @param  string $post_instruct_fx_status The status of the post instruct FX step if one was required for the payment (optional)
     * @param  string $transaction_reference Query for all payments associated with a specific transaction reference (optional)
     * @param  string $transaction_id Query for all payments associated with a specific transaction id (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by submittedDateTime:desc,paymentId:asc The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime, status and paymentId (optional)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPaymentsAuditV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\ListPaymentsResponseV4|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403
     */
    public function listPaymentsAuditV4($payee_id = null, $payor_id = null, $payor_name = null, $remote_id = null, $remote_system_id = null, $status = null, $transmission_type = null, $source_account_name = null, $source_amount_from = null, $source_amount_to = null, $source_currency = null, $payment_amount_from = null, $payment_amount_to = null, $payment_currency = null, $submitted_date_from = null, $submitted_date_to = null, $payment_memo = null, $payor_payment_id = null, $rails_id = null, $scheduled_for_date_from = null, $scheduled_for_date_to = null, $schedule_status = null, $post_instruct_fx_status = null, $transaction_reference = null, $transaction_id = null, $page = 1, $page_size = 25, $sort = null, $sensitive = null, string $contentType = self::contentTypes['listPaymentsAuditV4'][0])
    {
        list($response) = $this->listPaymentsAuditV4WithHttpInfo($payee_id, $payor_id, $payor_name, $remote_id, $remote_system_id, $status, $transmission_type, $source_account_name, $source_amount_from, $source_amount_to, $source_currency, $payment_amount_from, $payment_amount_to, $payment_currency, $submitted_date_from, $submitted_date_to, $payment_memo, $payor_payment_id, $rails_id, $scheduled_for_date_from, $scheduled_for_date_to, $schedule_status, $post_instruct_fx_status, $transaction_reference, $transaction_id, $page, $page_size, $sort, $sensitive, $contentType);
        return $response;
    }

    /**
     * Operation listPaymentsAuditV4WithHttpInfo
     *
     * Get List of Payments
     *
     * @param  string $payee_id The UUID of the payee. (optional)
     * @param  string $payor_id The account owner Payor Id. Required for external users. (optional)
     * @param  string $payor_name The payor’s name. This filters via a case insensitive substring match. (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $remote_system_id The id of the remote system that is orchestrating payments (optional)
     * @param  string $status Payment Status (optional)
     * @param  string $transmission_type Transmission Type * ACH * SAME_DAY_ACH * WIRE * GACHO (optional)
     * @param  string $source_account_name The source account name filter. This filters via a case insensitive substring match. (optional)
     * @param  int $source_amount_from The source amount from range filter. Filters for sourceAmount &gt;&#x3D; sourceAmountFrom (optional)
     * @param  int $source_amount_to The source amount to range filter. Filters for sourceAmount ⇐ sourceAmountTo (optional)
     * @param  string $source_currency The source currency filter. Filters based on an exact match on the currency. (optional)
     * @param  int $payment_amount_from The payment amount from range filter. Filters for paymentAmount &gt;&#x3D; paymentAmountFrom (optional)
     * @param  int $payment_amount_to The payment amount to range filter. Filters for paymentAmount ⇐ paymentAmountTo (optional)
     * @param  string $payment_currency The payment currency filter. Filters based on an exact match on the currency. (optional)
     * @param  \DateTime $submitted_date_from The submitted date from range filter. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $submitted_date_to The submitted date to range filter. Format is yyyy-MM-dd. (optional)
     * @param  string $payment_memo The payment memo filter. This filters via a case insensitive substring match. (optional)
     * @param  string $payor_payment_id Payor&#39;s Id of the Payment (optional)
     * @param  string $rails_id Payout Rails ID filter - case insensitive match. Any value is allowed, but you should use one of the supported railsId values. To get this list of values, you should call the &#39;Get Supported Rails&#39; endpoint. (optional)
     * @param  \DateTime $scheduled_for_date_from Filter payouts scheduled to run on or after the given date. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $scheduled_for_date_to Filter payouts scheduled to run on or before the given date. Format is yyyy-MM-dd. (optional)
     * @param  string $schedule_status Payout Schedule Status (optional)
     * @param  string $post_instruct_fx_status The status of the post instruct FX step if one was required for the payment (optional)
     * @param  string $transaction_reference Query for all payments associated with a specific transaction reference (optional)
     * @param  string $transaction_id Query for all payments associated with a specific transaction id (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by submittedDateTime:desc,paymentId:asc The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime, status and paymentId (optional)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPaymentsAuditV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\ListPaymentsResponseV4|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403, HTTP status code, HTTP response headers (array of strings)
     */
    public function listPaymentsAuditV4WithHttpInfo($payee_id = null, $payor_id = null, $payor_name = null, $remote_id = null, $remote_system_id = null, $status = null, $transmission_type = null, $source_account_name = null, $source_amount_from = null, $source_amount_to = null, $source_currency = null, $payment_amount_from = null, $payment_amount_to = null, $payment_currency = null, $submitted_date_from = null, $submitted_date_to = null, $payment_memo = null, $payor_payment_id = null, $rails_id = null, $scheduled_for_date_from = null, $scheduled_for_date_to = null, $schedule_status = null, $post_instruct_fx_status = null, $transaction_reference = null, $transaction_id = null, $page = 1, $page_size = 25, $sort = null, $sensitive = null, string $contentType = self::contentTypes['listPaymentsAuditV4'][0])
    {
        $request = $this->listPaymentsAuditV4Request($payee_id, $payor_id, $payor_name, $remote_id, $remote_system_id, $status, $transmission_type, $source_account_name, $source_amount_from, $source_amount_to, $source_currency, $payment_amount_from, $payment_amount_to, $payment_currency, $submitted_date_from, $submitted_date_to, $payment_memo, $payor_payment_id, $rails_id, $scheduled_for_date_from, $scheduled_for_date_to, $schedule_status, $post_instruct_fx_status, $transaction_reference, $transaction_id, $page, $page_size, $sort, $sensitive, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\VeloPayments\Client\Model\ListPaymentsResponseV4' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\ListPaymentsResponseV4' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\ListPaymentsResponseV4', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\VeloPayments\Client\Model\InlineResponse400' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse400' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse400', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\VeloPayments\Client\Model\InlineResponse401' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse401' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse401', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\VeloPayments\Client\Model\InlineResponse403' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse403' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse403', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\VeloPayments\Client\Model\ListPaymentsResponseV4';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\ListPaymentsResponseV4',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse400',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse401',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse403',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listPaymentsAuditV4Async
     *
     * Get List of Payments
     *
     * @param  string $payee_id The UUID of the payee. (optional)
     * @param  string $payor_id The account owner Payor Id. Required for external users. (optional)
     * @param  string $payor_name The payor’s name. This filters via a case insensitive substring match. (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $remote_system_id The id of the remote system that is orchestrating payments (optional)
     * @param  string $status Payment Status (optional)
     * @param  string $transmission_type Transmission Type * ACH * SAME_DAY_ACH * WIRE * GACHO (optional)
     * @param  string $source_account_name The source account name filter. This filters via a case insensitive substring match. (optional)
     * @param  int $source_amount_from The source amount from range filter. Filters for sourceAmount &gt;&#x3D; sourceAmountFrom (optional)
     * @param  int $source_amount_to The source amount to range filter. Filters for sourceAmount ⇐ sourceAmountTo (optional)
     * @param  string $source_currency The source currency filter. Filters based on an exact match on the currency. (optional)
     * @param  int $payment_amount_from The payment amount from range filter. Filters for paymentAmount &gt;&#x3D; paymentAmountFrom (optional)
     * @param  int $payment_amount_to The payment amount to range filter. Filters for paymentAmount ⇐ paymentAmountTo (optional)
     * @param  string $payment_currency The payment currency filter. Filters based on an exact match on the currency. (optional)
     * @param  \DateTime $submitted_date_from The submitted date from range filter. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $submitted_date_to The submitted date to range filter. Format is yyyy-MM-dd. (optional)
     * @param  string $payment_memo The payment memo filter. This filters via a case insensitive substring match. (optional)
     * @param  string $payor_payment_id Payor&#39;s Id of the Payment (optional)
     * @param  string $rails_id Payout Rails ID filter - case insensitive match. Any value is allowed, but you should use one of the supported railsId values. To get this list of values, you should call the &#39;Get Supported Rails&#39; endpoint. (optional)
     * @param  \DateTime $scheduled_for_date_from Filter payouts scheduled to run on or after the given date. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $scheduled_for_date_to Filter payouts scheduled to run on or before the given date. Format is yyyy-MM-dd. (optional)
     * @param  string $schedule_status Payout Schedule Status (optional)
     * @param  string $post_instruct_fx_status The status of the post instruct FX step if one was required for the payment (optional)
     * @param  string $transaction_reference Query for all payments associated with a specific transaction reference (optional)
     * @param  string $transaction_id Query for all payments associated with a specific transaction id (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by submittedDateTime:desc,paymentId:asc The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime, status and paymentId (optional)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPaymentsAuditV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listPaymentsAuditV4Async($payee_id = null, $payor_id = null, $payor_name = null, $remote_id = null, $remote_system_id = null, $status = null, $transmission_type = null, $source_account_name = null, $source_amount_from = null, $source_amount_to = null, $source_currency = null, $payment_amount_from = null, $payment_amount_to = null, $payment_currency = null, $submitted_date_from = null, $submitted_date_to = null, $payment_memo = null, $payor_payment_id = null, $rails_id = null, $scheduled_for_date_from = null, $scheduled_for_date_to = null, $schedule_status = null, $post_instruct_fx_status = null, $transaction_reference = null, $transaction_id = null, $page = 1, $page_size = 25, $sort = null, $sensitive = null, string $contentType = self::contentTypes['listPaymentsAuditV4'][0])
    {
        return $this->listPaymentsAuditV4AsyncWithHttpInfo($payee_id, $payor_id, $payor_name, $remote_id, $remote_system_id, $status, $transmission_type, $source_account_name, $source_amount_from, $source_amount_to, $source_currency, $payment_amount_from, $payment_amount_to, $payment_currency, $submitted_date_from, $submitted_date_to, $payment_memo, $payor_payment_id, $rails_id, $scheduled_for_date_from, $scheduled_for_date_to, $schedule_status, $post_instruct_fx_status, $transaction_reference, $transaction_id, $page, $page_size, $sort, $sensitive, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listPaymentsAuditV4AsyncWithHttpInfo
     *
     * Get List of Payments
     *
     * @param  string $payee_id The UUID of the payee. (optional)
     * @param  string $payor_id The account owner Payor Id. Required for external users. (optional)
     * @param  string $payor_name The payor’s name. This filters via a case insensitive substring match. (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $remote_system_id The id of the remote system that is orchestrating payments (optional)
     * @param  string $status Payment Status (optional)
     * @param  string $transmission_type Transmission Type * ACH * SAME_DAY_ACH * WIRE * GACHO (optional)
     * @param  string $source_account_name The source account name filter. This filters via a case insensitive substring match. (optional)
     * @param  int $source_amount_from The source amount from range filter. Filters for sourceAmount &gt;&#x3D; sourceAmountFrom (optional)
     * @param  int $source_amount_to The source amount to range filter. Filters for sourceAmount ⇐ sourceAmountTo (optional)
     * @param  string $source_currency The source currency filter. Filters based on an exact match on the currency. (optional)
     * @param  int $payment_amount_from The payment amount from range filter. Filters for paymentAmount &gt;&#x3D; paymentAmountFrom (optional)
     * @param  int $payment_amount_to The payment amount to range filter. Filters for paymentAmount ⇐ paymentAmountTo (optional)
     * @param  string $payment_currency The payment currency filter. Filters based on an exact match on the currency. (optional)
     * @param  \DateTime $submitted_date_from The submitted date from range filter. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $submitted_date_to The submitted date to range filter. Format is yyyy-MM-dd. (optional)
     * @param  string $payment_memo The payment memo filter. This filters via a case insensitive substring match. (optional)
     * @param  string $payor_payment_id Payor&#39;s Id of the Payment (optional)
     * @param  string $rails_id Payout Rails ID filter - case insensitive match. Any value is allowed, but you should use one of the supported railsId values. To get this list of values, you should call the &#39;Get Supported Rails&#39; endpoint. (optional)
     * @param  \DateTime $scheduled_for_date_from Filter payouts scheduled to run on or after the given date. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $scheduled_for_date_to Filter payouts scheduled to run on or before the given date. Format is yyyy-MM-dd. (optional)
     * @param  string $schedule_status Payout Schedule Status (optional)
     * @param  string $post_instruct_fx_status The status of the post instruct FX step if one was required for the payment (optional)
     * @param  string $transaction_reference Query for all payments associated with a specific transaction reference (optional)
     * @param  string $transaction_id Query for all payments associated with a specific transaction id (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by submittedDateTime:desc,paymentId:asc The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime, status and paymentId (optional)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPaymentsAuditV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listPaymentsAuditV4AsyncWithHttpInfo($payee_id = null, $payor_id = null, $payor_name = null, $remote_id = null, $remote_system_id = null, $status = null, $transmission_type = null, $source_account_name = null, $source_amount_from = null, $source_amount_to = null, $source_currency = null, $payment_amount_from = null, $payment_amount_to = null, $payment_currency = null, $submitted_date_from = null, $submitted_date_to = null, $payment_memo = null, $payor_payment_id = null, $rails_id = null, $scheduled_for_date_from = null, $scheduled_for_date_to = null, $schedule_status = null, $post_instruct_fx_status = null, $transaction_reference = null, $transaction_id = null, $page = 1, $page_size = 25, $sort = null, $sensitive = null, string $contentType = self::contentTypes['listPaymentsAuditV4'][0])
    {
        $returnType = '\VeloPayments\Client\Model\ListPaymentsResponseV4';
        $request = $this->listPaymentsAuditV4Request($payee_id, $payor_id, $payor_name, $remote_id, $remote_system_id, $status, $transmission_type, $source_account_name, $source_amount_from, $source_amount_to, $source_currency, $payment_amount_from, $payment_amount_to, $payment_currency, $submitted_date_from, $submitted_date_to, $payment_memo, $payor_payment_id, $rails_id, $scheduled_for_date_from, $scheduled_for_date_to, $schedule_status, $post_instruct_fx_status, $transaction_reference, $transaction_id, $page, $page_size, $sort, $sensitive, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'listPaymentsAuditV4'
     *
     * @param  string $payee_id The UUID of the payee. (optional)
     * @param  string $payor_id The account owner Payor Id. Required for external users. (optional)
     * @param  string $payor_name The payor’s name. This filters via a case insensitive substring match. (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $remote_system_id The id of the remote system that is orchestrating payments (optional)
     * @param  string $status Payment Status (optional)
     * @param  string $transmission_type Transmission Type * ACH * SAME_DAY_ACH * WIRE * GACHO (optional)
     * @param  string $source_account_name The source account name filter. This filters via a case insensitive substring match. (optional)
     * @param  int $source_amount_from The source amount from range filter. Filters for sourceAmount &gt;&#x3D; sourceAmountFrom (optional)
     * @param  int $source_amount_to The source amount to range filter. Filters for sourceAmount ⇐ sourceAmountTo (optional)
     * @param  string $source_currency The source currency filter. Filters based on an exact match on the currency. (optional)
     * @param  int $payment_amount_from The payment amount from range filter. Filters for paymentAmount &gt;&#x3D; paymentAmountFrom (optional)
     * @param  int $payment_amount_to The payment amount to range filter. Filters for paymentAmount ⇐ paymentAmountTo (optional)
     * @param  string $payment_currency The payment currency filter. Filters based on an exact match on the currency. (optional)
     * @param  \DateTime $submitted_date_from The submitted date from range filter. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $submitted_date_to The submitted date to range filter. Format is yyyy-MM-dd. (optional)
     * @param  string $payment_memo The payment memo filter. This filters via a case insensitive substring match. (optional)
     * @param  string $payor_payment_id Payor&#39;s Id of the Payment (optional)
     * @param  string $rails_id Payout Rails ID filter - case insensitive match. Any value is allowed, but you should use one of the supported railsId values. To get this list of values, you should call the &#39;Get Supported Rails&#39; endpoint. (optional)
     * @param  \DateTime $scheduled_for_date_from Filter payouts scheduled to run on or after the given date. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $scheduled_for_date_to Filter payouts scheduled to run on or before the given date. Format is yyyy-MM-dd. (optional)
     * @param  string $schedule_status Payout Schedule Status (optional)
     * @param  string $post_instruct_fx_status The status of the post instruct FX step if one was required for the payment (optional)
     * @param  string $transaction_reference Query for all payments associated with a specific transaction reference (optional)
     * @param  string $transaction_id Query for all payments associated with a specific transaction id (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by submittedDateTime:desc,paymentId:asc The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime, status and paymentId (optional)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPaymentsAuditV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function listPaymentsAuditV4Request($payee_id = null, $payor_id = null, $payor_name = null, $remote_id = null, $remote_system_id = null, $status = null, $transmission_type = null, $source_account_name = null, $source_amount_from = null, $source_amount_to = null, $source_currency = null, $payment_amount_from = null, $payment_amount_to = null, $payment_currency = null, $submitted_date_from = null, $submitted_date_to = null, $payment_memo = null, $payor_payment_id = null, $rails_id = null, $scheduled_for_date_from = null, $scheduled_for_date_to = null, $schedule_status = null, $post_instruct_fx_status = null, $transaction_reference = null, $transaction_id = null, $page = 1, $page_size = 25, $sort = null, $sensitive = null, string $contentType = self::contentTypes['listPaymentsAuditV4'][0])
    {



























        if ($page_size !== null && $page_size > 100) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling PaymentAuditServiceApi.listPaymentsAuditV4, must be smaller than or equal to 100.');
        }
        if ($page_size !== null && $page_size < 1) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling PaymentAuditServiceApi.listPaymentsAuditV4, must be bigger than or equal to 1.');
        }
        



        $resourcePath = '/v4/paymentaudit/payments';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $payee_id,
            'payeeId', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $payor_id,
            'payorId', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $payor_name,
            'payorName', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $remote_id,
            'remoteId', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $remote_system_id,
            'remoteSystemId', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $status,
            'status', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $transmission_type,
            'transmissionType', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $source_account_name,
            'sourceAccountName', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $source_amount_from,
            'sourceAmountFrom', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $source_amount_to,
            'sourceAmountTo', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $source_currency,
            'sourceCurrency', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $payment_amount_from,
            'paymentAmountFrom', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $payment_amount_to,
            'paymentAmountTo', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $payment_currency,
            'paymentCurrency', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $submitted_date_from,
            'submittedDateFrom', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $submitted_date_to,
            'submittedDateTo', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $payment_memo,
            'paymentMemo', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $payor_payment_id,
            'payorPaymentId', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $rails_id,
            'railsId', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $scheduled_for_date_from,
            'scheduledForDateFrom', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $scheduled_for_date_to,
            'scheduledForDateTo', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $schedule_status,
            'scheduleStatus', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $post_instruct_fx_status,
            'postInstructFxStatus', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $transaction_reference,
            'transactionReference', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $transaction_id,
            'transactionId', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $page,
            'page', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $page_size,
            'pageSize', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $sort,
            'sort', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $sensitive,
            'sensitive', // param base name
            'boolean', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);




        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
