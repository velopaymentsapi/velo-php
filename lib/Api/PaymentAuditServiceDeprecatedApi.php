<?php
/**
 * PaymentAuditServiceDeprecatedApi
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
 * PaymentAuditServiceDeprecatedApi Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class PaymentAuditServiceDeprecatedApi
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
        'exportTransactionsCSVV3' => [
            'application/json',
        ],
        'getFundingsV1' => [
            'application/json',
        ],
        'getPaymentDetailsV3' => [
            'application/json',
        ],
        'getPaymentsForPayoutPAV3' => [
            'application/json',
        ],
        'getPayoutStatsV1' => [
            'application/json',
        ],
        'getPayoutsForPayorV3' => [
            'application/json',
        ],
        'listPaymentChanges' => [
            'application/json',
        ],
        'listPaymentsAuditV3' => [
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
     * Operation exportTransactionsCSVV3
     *
     * V3 Export Transactions
     *
     * @param  string $payor_id The Payor ID for whom you wish to run the report. For a Payor requesting the report, this could be their exact Payor, or it could be a child/descendant Payor. (optional)
     * @param  \DateTime $start_date Start date, inclusive. Format is YYYY-MM-DD (optional)
     * @param  \DateTime $end_date End date, inclusive. Format is YYYY-MM-DD (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['exportTransactionsCSVV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\PayorAmlTransactionV3|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403
     * @deprecated
     */
    public function exportTransactionsCSVV3($payor_id = null, $start_date = null, $end_date = null, string $contentType = self::contentTypes['exportTransactionsCSVV3'][0])
    {
        list($response) = $this->exportTransactionsCSVV3WithHttpInfo($payor_id, $start_date, $end_date, $contentType);
        return $response;
    }

    /**
     * Operation exportTransactionsCSVV3WithHttpInfo
     *
     * V3 Export Transactions
     *
     * @param  string $payor_id The Payor ID for whom you wish to run the report. For a Payor requesting the report, this could be their exact Payor, or it could be a child/descendant Payor. (optional)
     * @param  \DateTime $start_date Start date, inclusive. Format is YYYY-MM-DD (optional)
     * @param  \DateTime $end_date End date, inclusive. Format is YYYY-MM-DD (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['exportTransactionsCSVV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\PayorAmlTransactionV3|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function exportTransactionsCSVV3WithHttpInfo($payor_id = null, $start_date = null, $end_date = null, string $contentType = self::contentTypes['exportTransactionsCSVV3'][0])
    {
        $request = $this->exportTransactionsCSVV3Request($payor_id, $start_date, $end_date, $contentType);

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
                    if ('\VeloPayments\Client\Model\PayorAmlTransactionV3' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\PayorAmlTransactionV3' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\PayorAmlTransactionV3', []),
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

            $returnType = '\VeloPayments\Client\Model\PayorAmlTransactionV3';
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
                        '\VeloPayments\Client\Model\PayorAmlTransactionV3',
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
     * Operation exportTransactionsCSVV3Async
     *
     * V3 Export Transactions
     *
     * @param  string $payor_id The Payor ID for whom you wish to run the report. For a Payor requesting the report, this could be their exact Payor, or it could be a child/descendant Payor. (optional)
     * @param  \DateTime $start_date Start date, inclusive. Format is YYYY-MM-DD (optional)
     * @param  \DateTime $end_date End date, inclusive. Format is YYYY-MM-DD (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['exportTransactionsCSVV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function exportTransactionsCSVV3Async($payor_id = null, $start_date = null, $end_date = null, string $contentType = self::contentTypes['exportTransactionsCSVV3'][0])
    {
        return $this->exportTransactionsCSVV3AsyncWithHttpInfo($payor_id, $start_date, $end_date, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation exportTransactionsCSVV3AsyncWithHttpInfo
     *
     * V3 Export Transactions
     *
     * @param  string $payor_id The Payor ID for whom you wish to run the report. For a Payor requesting the report, this could be their exact Payor, or it could be a child/descendant Payor. (optional)
     * @param  \DateTime $start_date Start date, inclusive. Format is YYYY-MM-DD (optional)
     * @param  \DateTime $end_date End date, inclusive. Format is YYYY-MM-DD (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['exportTransactionsCSVV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function exportTransactionsCSVV3AsyncWithHttpInfo($payor_id = null, $start_date = null, $end_date = null, string $contentType = self::contentTypes['exportTransactionsCSVV3'][0])
    {
        $returnType = '\VeloPayments\Client\Model\PayorAmlTransactionV3';
        $request = $this->exportTransactionsCSVV3Request($payor_id, $start_date, $end_date, $contentType);

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
     * Create request for operation 'exportTransactionsCSVV3'
     *
     * @param  string $payor_id The Payor ID for whom you wish to run the report. For a Payor requesting the report, this could be their exact Payor, or it could be a child/descendant Payor. (optional)
     * @param  \DateTime $start_date Start date, inclusive. Format is YYYY-MM-DD (optional)
     * @param  \DateTime $end_date End date, inclusive. Format is YYYY-MM-DD (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['exportTransactionsCSVV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function exportTransactionsCSVV3Request($payor_id = null, $start_date = null, $end_date = null, string $contentType = self::contentTypes['exportTransactionsCSVV3'][0])
    {





        $resourcePath = '/v3/paymentaudit/transactions';
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
     * Operation getFundingsV1
     *
     * V1 Get Fundings for Payor
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields. Example: &#x60;&#x60;&#x60;?sort&#x3D;destinationCurrency:asc,destinationAmount:asc&#x60;&#x60;&#x60; Default is no sort. The supported sort fields are: dateTime and amount. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getFundingsV1'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\GetFundingsResponse|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404
     * @deprecated
     */
    public function getFundingsV1($payor_id, $page = 1, $page_size = 25, $sort = null, string $contentType = self::contentTypes['getFundingsV1'][0])
    {
        list($response) = $this->getFundingsV1WithHttpInfo($payor_id, $page, $page_size, $sort, $contentType);
        return $response;
    }

    /**
     * Operation getFundingsV1WithHttpInfo
     *
     * V1 Get Fundings for Payor
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields. Example: &#x60;&#x60;&#x60;?sort&#x3D;destinationCurrency:asc,destinationAmount:asc&#x60;&#x60;&#x60; Default is no sort. The supported sort fields are: dateTime and amount. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getFundingsV1'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\GetFundingsResponse|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function getFundingsV1WithHttpInfo($payor_id, $page = 1, $page_size = 25, $sort = null, string $contentType = self::contentTypes['getFundingsV1'][0])
    {
        $request = $this->getFundingsV1Request($payor_id, $page, $page_size, $sort, $contentType);

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
     * Operation getFundingsV1Async
     *
     * V1 Get Fundings for Payor
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields. Example: &#x60;&#x60;&#x60;?sort&#x3D;destinationCurrency:asc,destinationAmount:asc&#x60;&#x60;&#x60; Default is no sort. The supported sort fields are: dateTime and amount. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getFundingsV1'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function getFundingsV1Async($payor_id, $page = 1, $page_size = 25, $sort = null, string $contentType = self::contentTypes['getFundingsV1'][0])
    {
        return $this->getFundingsV1AsyncWithHttpInfo($payor_id, $page, $page_size, $sort, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getFundingsV1AsyncWithHttpInfo
     *
     * V1 Get Fundings for Payor
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields. Example: &#x60;&#x60;&#x60;?sort&#x3D;destinationCurrency:asc,destinationAmount:asc&#x60;&#x60;&#x60; Default is no sort. The supported sort fields are: dateTime and amount. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getFundingsV1'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function getFundingsV1AsyncWithHttpInfo($payor_id, $page = 1, $page_size = 25, $sort = null, string $contentType = self::contentTypes['getFundingsV1'][0])
    {
        $returnType = '\VeloPayments\Client\Model\GetFundingsResponse';
        $request = $this->getFundingsV1Request($payor_id, $page, $page_size, $sort, $contentType);

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
     * Create request for operation 'getFundingsV1'
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields. Example: &#x60;&#x60;&#x60;?sort&#x3D;destinationCurrency:asc,destinationAmount:asc&#x60;&#x60;&#x60; Default is no sort. The supported sort fields are: dateTime and amount. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getFundingsV1'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function getFundingsV1Request($payor_id, $page = 1, $page_size = 25, $sort = null, string $contentType = self::contentTypes['getFundingsV1'][0])
    {

        // verify the required parameter 'payor_id' is set
        if ($payor_id === null || (is_array($payor_id) && count($payor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payor_id when calling getFundingsV1'
            );
        }


        if ($page_size !== null && $page_size > 100) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling PaymentAuditServiceDeprecatedApi.getFundingsV1, must be smaller than or equal to 100.');
        }
        if ($page_size !== null && $page_size < 1) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling PaymentAuditServiceDeprecatedApi.getFundingsV1, must be bigger than or equal to 1.');
        }
        


        $resourcePath = '/v1/paymentaudit/fundings';
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
     * Operation getPaymentDetailsV3
     *
     * V3 Get Payment
     *
     * @param  string $payment_id Payment Id (required)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentDetailsV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\PaymentResponseV3|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404
     * @deprecated
     */
    public function getPaymentDetailsV3($payment_id, $sensitive = null, string $contentType = self::contentTypes['getPaymentDetailsV3'][0])
    {
        list($response) = $this->getPaymentDetailsV3WithHttpInfo($payment_id, $sensitive, $contentType);
        return $response;
    }

    /**
     * Operation getPaymentDetailsV3WithHttpInfo
     *
     * V3 Get Payment
     *
     * @param  string $payment_id Payment Id (required)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentDetailsV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\PaymentResponseV3|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function getPaymentDetailsV3WithHttpInfo($payment_id, $sensitive = null, string $contentType = self::contentTypes['getPaymentDetailsV3'][0])
    {
        $request = $this->getPaymentDetailsV3Request($payment_id, $sensitive, $contentType);

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
                    if ('\VeloPayments\Client\Model\PaymentResponseV3' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\PaymentResponseV3' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\PaymentResponseV3', []),
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

            $returnType = '\VeloPayments\Client\Model\PaymentResponseV3';
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
                        '\VeloPayments\Client\Model\PaymentResponseV3',
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
     * Operation getPaymentDetailsV3Async
     *
     * V3 Get Payment
     *
     * @param  string $payment_id Payment Id (required)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentDetailsV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function getPaymentDetailsV3Async($payment_id, $sensitive = null, string $contentType = self::contentTypes['getPaymentDetailsV3'][0])
    {
        return $this->getPaymentDetailsV3AsyncWithHttpInfo($payment_id, $sensitive, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPaymentDetailsV3AsyncWithHttpInfo
     *
     * V3 Get Payment
     *
     * @param  string $payment_id Payment Id (required)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentDetailsV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function getPaymentDetailsV3AsyncWithHttpInfo($payment_id, $sensitive = null, string $contentType = self::contentTypes['getPaymentDetailsV3'][0])
    {
        $returnType = '\VeloPayments\Client\Model\PaymentResponseV3';
        $request = $this->getPaymentDetailsV3Request($payment_id, $sensitive, $contentType);

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
     * Create request for operation 'getPaymentDetailsV3'
     *
     * @param  string $payment_id Payment Id (required)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentDetailsV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function getPaymentDetailsV3Request($payment_id, $sensitive = null, string $contentType = self::contentTypes['getPaymentDetailsV3'][0])
    {

        // verify the required parameter 'payment_id' is set
        if ($payment_id === null || (is_array($payment_id) && count($payment_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payment_id when calling getPaymentDetailsV3'
            );
        }



        $resourcePath = '/v3/paymentaudit/payments/{paymentId}';
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
     * Operation getPaymentsForPayoutPAV3
     *
     * V3 Get Payments for Payout
     *
     * @param  string $payout_id The id (UUID) of the payout. (required)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $status Payment Status (optional)
     * @param  int $source_amount_from The source amount from range filter. Filters for sourceAmount &gt;&#x3D; sourceAmountFrom (optional)
     * @param  int $source_amount_to The source amount to range filter. Filters for sourceAmount ⇐ sourceAmountTo (optional)
     * @param  int $payment_amount_from The payment amount from range filter. Filters for paymentAmount &gt;&#x3D; paymentAmountFrom (optional)
     * @param  int $payment_amount_to The payment amount to range filter. Filters for paymentAmount ⇐ paymentAmountTo (optional)
     * @param  \DateTime $submitted_date_from The submitted date from range filter. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $submitted_date_to The submitted date to range filter. Format is yyyy-MM-dd. (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort &lt;p&gt;List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId&lt;/p&gt; &lt;p&gt;The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status&lt;/p&gt; (optional)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentsForPayoutPAV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\GetPaymentsForPayoutResponseV3|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404
     * @deprecated
     */
    public function getPaymentsForPayoutPAV3($payout_id, $remote_id = null, $status = null, $source_amount_from = null, $source_amount_to = null, $payment_amount_from = null, $payment_amount_to = null, $submitted_date_from = null, $submitted_date_to = null, $page = 1, $page_size = 25, $sort = null, $sensitive = null, string $contentType = self::contentTypes['getPaymentsForPayoutPAV3'][0])
    {
        list($response) = $this->getPaymentsForPayoutPAV3WithHttpInfo($payout_id, $remote_id, $status, $source_amount_from, $source_amount_to, $payment_amount_from, $payment_amount_to, $submitted_date_from, $submitted_date_to, $page, $page_size, $sort, $sensitive, $contentType);
        return $response;
    }

    /**
     * Operation getPaymentsForPayoutPAV3WithHttpInfo
     *
     * V3 Get Payments for Payout
     *
     * @param  string $payout_id The id (UUID) of the payout. (required)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $status Payment Status (optional)
     * @param  int $source_amount_from The source amount from range filter. Filters for sourceAmount &gt;&#x3D; sourceAmountFrom (optional)
     * @param  int $source_amount_to The source amount to range filter. Filters for sourceAmount ⇐ sourceAmountTo (optional)
     * @param  int $payment_amount_from The payment amount from range filter. Filters for paymentAmount &gt;&#x3D; paymentAmountFrom (optional)
     * @param  int $payment_amount_to The payment amount to range filter. Filters for paymentAmount ⇐ paymentAmountTo (optional)
     * @param  \DateTime $submitted_date_from The submitted date from range filter. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $submitted_date_to The submitted date to range filter. Format is yyyy-MM-dd. (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort &lt;p&gt;List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId&lt;/p&gt; &lt;p&gt;The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status&lt;/p&gt; (optional)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentsForPayoutPAV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\GetPaymentsForPayoutResponseV3|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function getPaymentsForPayoutPAV3WithHttpInfo($payout_id, $remote_id = null, $status = null, $source_amount_from = null, $source_amount_to = null, $payment_amount_from = null, $payment_amount_to = null, $submitted_date_from = null, $submitted_date_to = null, $page = 1, $page_size = 25, $sort = null, $sensitive = null, string $contentType = self::contentTypes['getPaymentsForPayoutPAV3'][0])
    {
        $request = $this->getPaymentsForPayoutPAV3Request($payout_id, $remote_id, $status, $source_amount_from, $source_amount_to, $payment_amount_from, $payment_amount_to, $submitted_date_from, $submitted_date_to, $page, $page_size, $sort, $sensitive, $contentType);

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
                    if ('\VeloPayments\Client\Model\GetPaymentsForPayoutResponseV3' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\GetPaymentsForPayoutResponseV3' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\GetPaymentsForPayoutResponseV3', []),
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

            $returnType = '\VeloPayments\Client\Model\GetPaymentsForPayoutResponseV3';
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
                        '\VeloPayments\Client\Model\GetPaymentsForPayoutResponseV3',
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
     * Operation getPaymentsForPayoutPAV3Async
     *
     * V3 Get Payments for Payout
     *
     * @param  string $payout_id The id (UUID) of the payout. (required)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $status Payment Status (optional)
     * @param  int $source_amount_from The source amount from range filter. Filters for sourceAmount &gt;&#x3D; sourceAmountFrom (optional)
     * @param  int $source_amount_to The source amount to range filter. Filters for sourceAmount ⇐ sourceAmountTo (optional)
     * @param  int $payment_amount_from The payment amount from range filter. Filters for paymentAmount &gt;&#x3D; paymentAmountFrom (optional)
     * @param  int $payment_amount_to The payment amount to range filter. Filters for paymentAmount ⇐ paymentAmountTo (optional)
     * @param  \DateTime $submitted_date_from The submitted date from range filter. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $submitted_date_to The submitted date to range filter. Format is yyyy-MM-dd. (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort &lt;p&gt;List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId&lt;/p&gt; &lt;p&gt;The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status&lt;/p&gt; (optional)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentsForPayoutPAV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function getPaymentsForPayoutPAV3Async($payout_id, $remote_id = null, $status = null, $source_amount_from = null, $source_amount_to = null, $payment_amount_from = null, $payment_amount_to = null, $submitted_date_from = null, $submitted_date_to = null, $page = 1, $page_size = 25, $sort = null, $sensitive = null, string $contentType = self::contentTypes['getPaymentsForPayoutPAV3'][0])
    {
        return $this->getPaymentsForPayoutPAV3AsyncWithHttpInfo($payout_id, $remote_id, $status, $source_amount_from, $source_amount_to, $payment_amount_from, $payment_amount_to, $submitted_date_from, $submitted_date_to, $page, $page_size, $sort, $sensitive, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPaymentsForPayoutPAV3AsyncWithHttpInfo
     *
     * V3 Get Payments for Payout
     *
     * @param  string $payout_id The id (UUID) of the payout. (required)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $status Payment Status (optional)
     * @param  int $source_amount_from The source amount from range filter. Filters for sourceAmount &gt;&#x3D; sourceAmountFrom (optional)
     * @param  int $source_amount_to The source amount to range filter. Filters for sourceAmount ⇐ sourceAmountTo (optional)
     * @param  int $payment_amount_from The payment amount from range filter. Filters for paymentAmount &gt;&#x3D; paymentAmountFrom (optional)
     * @param  int $payment_amount_to The payment amount to range filter. Filters for paymentAmount ⇐ paymentAmountTo (optional)
     * @param  \DateTime $submitted_date_from The submitted date from range filter. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $submitted_date_to The submitted date to range filter. Format is yyyy-MM-dd. (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort &lt;p&gt;List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId&lt;/p&gt; &lt;p&gt;The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status&lt;/p&gt; (optional)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentsForPayoutPAV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function getPaymentsForPayoutPAV3AsyncWithHttpInfo($payout_id, $remote_id = null, $status = null, $source_amount_from = null, $source_amount_to = null, $payment_amount_from = null, $payment_amount_to = null, $submitted_date_from = null, $submitted_date_to = null, $page = 1, $page_size = 25, $sort = null, $sensitive = null, string $contentType = self::contentTypes['getPaymentsForPayoutPAV3'][0])
    {
        $returnType = '\VeloPayments\Client\Model\GetPaymentsForPayoutResponseV3';
        $request = $this->getPaymentsForPayoutPAV3Request($payout_id, $remote_id, $status, $source_amount_from, $source_amount_to, $payment_amount_from, $payment_amount_to, $submitted_date_from, $submitted_date_to, $page, $page_size, $sort, $sensitive, $contentType);

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
     * Create request for operation 'getPaymentsForPayoutPAV3'
     *
     * @param  string $payout_id The id (UUID) of the payout. (required)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $status Payment Status (optional)
     * @param  int $source_amount_from The source amount from range filter. Filters for sourceAmount &gt;&#x3D; sourceAmountFrom (optional)
     * @param  int $source_amount_to The source amount to range filter. Filters for sourceAmount ⇐ sourceAmountTo (optional)
     * @param  int $payment_amount_from The payment amount from range filter. Filters for paymentAmount &gt;&#x3D; paymentAmountFrom (optional)
     * @param  int $payment_amount_to The payment amount to range filter. Filters for paymentAmount ⇐ paymentAmountTo (optional)
     * @param  \DateTime $submitted_date_from The submitted date from range filter. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $submitted_date_to The submitted date to range filter. Format is yyyy-MM-dd. (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort &lt;p&gt;List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId&lt;/p&gt; &lt;p&gt;The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status&lt;/p&gt; (optional)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentsForPayoutPAV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function getPaymentsForPayoutPAV3Request($payout_id, $remote_id = null, $status = null, $source_amount_from = null, $source_amount_to = null, $payment_amount_from = null, $payment_amount_to = null, $submitted_date_from = null, $submitted_date_to = null, $page = 1, $page_size = 25, $sort = null, $sensitive = null, string $contentType = self::contentTypes['getPaymentsForPayoutPAV3'][0])
    {

        // verify the required parameter 'payout_id' is set
        if ($payout_id === null || (is_array($payout_id) && count($payout_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payout_id when calling getPaymentsForPayoutPAV3'
            );
        }










        if ($page_size !== null && $page_size > 100) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling PaymentAuditServiceDeprecatedApi.getPaymentsForPayoutPAV3, must be smaller than or equal to 100.');
        }
        if ($page_size !== null && $page_size < 1) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling PaymentAuditServiceDeprecatedApi.getPaymentsForPayoutPAV3, must be bigger than or equal to 1.');
        }
        



        $resourcePath = '/v3/paymentaudit/payouts/{payoutId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

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
     * Operation getPayoutStatsV1
     *
     * V1 Get Payout Statistics
     *
     * @param  string $payor_id The account owner Payor ID. Required for external users. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayoutStatsV1'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\GetPayoutStatistics|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404
     * @deprecated
     */
    public function getPayoutStatsV1($payor_id = null, string $contentType = self::contentTypes['getPayoutStatsV1'][0])
    {
        list($response) = $this->getPayoutStatsV1WithHttpInfo($payor_id, $contentType);
        return $response;
    }

    /**
     * Operation getPayoutStatsV1WithHttpInfo
     *
     * V1 Get Payout Statistics
     *
     * @param  string $payor_id The account owner Payor ID. Required for external users. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayoutStatsV1'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\GetPayoutStatistics|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function getPayoutStatsV1WithHttpInfo($payor_id = null, string $contentType = self::contentTypes['getPayoutStatsV1'][0])
    {
        $request = $this->getPayoutStatsV1Request($payor_id, $contentType);

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
     * Operation getPayoutStatsV1Async
     *
     * V1 Get Payout Statistics
     *
     * @param  string $payor_id The account owner Payor ID. Required for external users. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayoutStatsV1'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function getPayoutStatsV1Async($payor_id = null, string $contentType = self::contentTypes['getPayoutStatsV1'][0])
    {
        return $this->getPayoutStatsV1AsyncWithHttpInfo($payor_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPayoutStatsV1AsyncWithHttpInfo
     *
     * V1 Get Payout Statistics
     *
     * @param  string $payor_id The account owner Payor ID. Required for external users. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayoutStatsV1'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function getPayoutStatsV1AsyncWithHttpInfo($payor_id = null, string $contentType = self::contentTypes['getPayoutStatsV1'][0])
    {
        $returnType = '\VeloPayments\Client\Model\GetPayoutStatistics';
        $request = $this->getPayoutStatsV1Request($payor_id, $contentType);

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
     * Create request for operation 'getPayoutStatsV1'
     *
     * @param  string $payor_id The account owner Payor ID. Required for external users. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayoutStatsV1'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function getPayoutStatsV1Request($payor_id = null, string $contentType = self::contentTypes['getPayoutStatsV1'][0])
    {



        $resourcePath = '/v1/paymentaudit/payoutStatistics';
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
     * Operation getPayoutsForPayorV3
     *
     * V3 Get Payouts for Payor
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $payout_memo Payout Memo filter - case insensitive sub-string match (optional)
     * @param  string $status Payout Status (optional)
     * @param  \DateTime $submitted_date_from The submitted date from range filter. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $submitted_date_to The submitted date to range filter. Format is yyyy-MM-dd. (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,instructedDateTime:asc,status:asc) Default is submittedDateTime:asc The supported sort fields are: submittedDateTime, instructedDateTime, status. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayoutsForPayorV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\GetPayoutsResponseV3|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404
     * @deprecated
     */
    public function getPayoutsForPayorV3($payor_id, $payout_memo = null, $status = null, $submitted_date_from = null, $submitted_date_to = null, $page = 1, $page_size = 25, $sort = null, string $contentType = self::contentTypes['getPayoutsForPayorV3'][0])
    {
        list($response) = $this->getPayoutsForPayorV3WithHttpInfo($payor_id, $payout_memo, $status, $submitted_date_from, $submitted_date_to, $page, $page_size, $sort, $contentType);
        return $response;
    }

    /**
     * Operation getPayoutsForPayorV3WithHttpInfo
     *
     * V3 Get Payouts for Payor
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $payout_memo Payout Memo filter - case insensitive sub-string match (optional)
     * @param  string $status Payout Status (optional)
     * @param  \DateTime $submitted_date_from The submitted date from range filter. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $submitted_date_to The submitted date to range filter. Format is yyyy-MM-dd. (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,instructedDateTime:asc,status:asc) Default is submittedDateTime:asc The supported sort fields are: submittedDateTime, instructedDateTime, status. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayoutsForPayorV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\GetPayoutsResponseV3|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function getPayoutsForPayorV3WithHttpInfo($payor_id, $payout_memo = null, $status = null, $submitted_date_from = null, $submitted_date_to = null, $page = 1, $page_size = 25, $sort = null, string $contentType = self::contentTypes['getPayoutsForPayorV3'][0])
    {
        $request = $this->getPayoutsForPayorV3Request($payor_id, $payout_memo, $status, $submitted_date_from, $submitted_date_to, $page, $page_size, $sort, $contentType);

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
                    if ('\VeloPayments\Client\Model\GetPayoutsResponseV3' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\GetPayoutsResponseV3' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\GetPayoutsResponseV3', []),
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

            $returnType = '\VeloPayments\Client\Model\GetPayoutsResponseV3';
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
                        '\VeloPayments\Client\Model\GetPayoutsResponseV3',
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
     * Operation getPayoutsForPayorV3Async
     *
     * V3 Get Payouts for Payor
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $payout_memo Payout Memo filter - case insensitive sub-string match (optional)
     * @param  string $status Payout Status (optional)
     * @param  \DateTime $submitted_date_from The submitted date from range filter. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $submitted_date_to The submitted date to range filter. Format is yyyy-MM-dd. (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,instructedDateTime:asc,status:asc) Default is submittedDateTime:asc The supported sort fields are: submittedDateTime, instructedDateTime, status. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayoutsForPayorV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function getPayoutsForPayorV3Async($payor_id, $payout_memo = null, $status = null, $submitted_date_from = null, $submitted_date_to = null, $page = 1, $page_size = 25, $sort = null, string $contentType = self::contentTypes['getPayoutsForPayorV3'][0])
    {
        return $this->getPayoutsForPayorV3AsyncWithHttpInfo($payor_id, $payout_memo, $status, $submitted_date_from, $submitted_date_to, $page, $page_size, $sort, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPayoutsForPayorV3AsyncWithHttpInfo
     *
     * V3 Get Payouts for Payor
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $payout_memo Payout Memo filter - case insensitive sub-string match (optional)
     * @param  string $status Payout Status (optional)
     * @param  \DateTime $submitted_date_from The submitted date from range filter. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $submitted_date_to The submitted date to range filter. Format is yyyy-MM-dd. (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,instructedDateTime:asc,status:asc) Default is submittedDateTime:asc The supported sort fields are: submittedDateTime, instructedDateTime, status. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayoutsForPayorV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function getPayoutsForPayorV3AsyncWithHttpInfo($payor_id, $payout_memo = null, $status = null, $submitted_date_from = null, $submitted_date_to = null, $page = 1, $page_size = 25, $sort = null, string $contentType = self::contentTypes['getPayoutsForPayorV3'][0])
    {
        $returnType = '\VeloPayments\Client\Model\GetPayoutsResponseV3';
        $request = $this->getPayoutsForPayorV3Request($payor_id, $payout_memo, $status, $submitted_date_from, $submitted_date_to, $page, $page_size, $sort, $contentType);

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
     * Create request for operation 'getPayoutsForPayorV3'
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $payout_memo Payout Memo filter - case insensitive sub-string match (optional)
     * @param  string $status Payout Status (optional)
     * @param  \DateTime $submitted_date_from The submitted date from range filter. Format is yyyy-MM-dd. (optional)
     * @param  \DateTime $submitted_date_to The submitted date to range filter. Format is yyyy-MM-dd. (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,instructedDateTime:asc,status:asc) Default is submittedDateTime:asc The supported sort fields are: submittedDateTime, instructedDateTime, status. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayoutsForPayorV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function getPayoutsForPayorV3Request($payor_id, $payout_memo = null, $status = null, $submitted_date_from = null, $submitted_date_to = null, $page = 1, $page_size = 25, $sort = null, string $contentType = self::contentTypes['getPayoutsForPayorV3'][0])
    {

        // verify the required parameter 'payor_id' is set
        if ($payor_id === null || (is_array($payor_id) && count($payor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payor_id when calling getPayoutsForPayorV3'
            );
        }






        if ($page_size !== null && $page_size > 100) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling PaymentAuditServiceDeprecatedApi.getPayoutsForPayorV3, must be smaller than or equal to 100.');
        }
        if ($page_size !== null && $page_size < 1) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling PaymentAuditServiceDeprecatedApi.getPayoutsForPayorV3, must be bigger than or equal to 1.');
        }
        


        $resourcePath = '/v3/paymentaudit/payouts';
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
     * Operation listPaymentChanges
     *
     * V1 List Payment Changes
     *
     * @param  string $payor_id The Payor ID to find associated Payments (required)
     * @param  \DateTime $updated_since The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm (required)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 100)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPaymentChanges'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\PaymentDeltaResponseV1|\VeloPayments\Client\Model\InlineResponse400
     * @deprecated
     */
    public function listPaymentChanges($payor_id, $updated_since, $page = 1, $page_size = 100, string $contentType = self::contentTypes['listPaymentChanges'][0])
    {
        list($response) = $this->listPaymentChangesWithHttpInfo($payor_id, $updated_since, $page, $page_size, $contentType);
        return $response;
    }

    /**
     * Operation listPaymentChangesWithHttpInfo
     *
     * V1 List Payment Changes
     *
     * @param  string $payor_id The Payor ID to find associated Payments (required)
     * @param  \DateTime $updated_since The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm (required)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 100)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPaymentChanges'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\PaymentDeltaResponseV1|\VeloPayments\Client\Model\InlineResponse400, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function listPaymentChangesWithHttpInfo($payor_id, $updated_since, $page = 1, $page_size = 100, string $contentType = self::contentTypes['listPaymentChanges'][0])
    {
        $request = $this->listPaymentChangesRequest($payor_id, $updated_since, $page, $page_size, $contentType);

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
                    if ('\VeloPayments\Client\Model\PaymentDeltaResponseV1' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\PaymentDeltaResponseV1' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\PaymentDeltaResponseV1', []),
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

            $returnType = '\VeloPayments\Client\Model\PaymentDeltaResponseV1';
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
                        '\VeloPayments\Client\Model\PaymentDeltaResponseV1',
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
     * Operation listPaymentChangesAsync
     *
     * V1 List Payment Changes
     *
     * @param  string $payor_id The Payor ID to find associated Payments (required)
     * @param  \DateTime $updated_since The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm (required)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 100)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPaymentChanges'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function listPaymentChangesAsync($payor_id, $updated_since, $page = 1, $page_size = 100, string $contentType = self::contentTypes['listPaymentChanges'][0])
    {
        return $this->listPaymentChangesAsyncWithHttpInfo($payor_id, $updated_since, $page, $page_size, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listPaymentChangesAsyncWithHttpInfo
     *
     * V1 List Payment Changes
     *
     * @param  string $payor_id The Payor ID to find associated Payments (required)
     * @param  \DateTime $updated_since The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm (required)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 100)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPaymentChanges'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function listPaymentChangesAsyncWithHttpInfo($payor_id, $updated_since, $page = 1, $page_size = 100, string $contentType = self::contentTypes['listPaymentChanges'][0])
    {
        $returnType = '\VeloPayments\Client\Model\PaymentDeltaResponseV1';
        $request = $this->listPaymentChangesRequest($payor_id, $updated_since, $page, $page_size, $contentType);

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
     * Create request for operation 'listPaymentChanges'
     *
     * @param  string $payor_id The Payor ID to find associated Payments (required)
     * @param  \DateTime $updated_since The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm (required)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 100)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPaymentChanges'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function listPaymentChangesRequest($payor_id, $updated_since, $page = 1, $page_size = 100, string $contentType = self::contentTypes['listPaymentChanges'][0])
    {

        // verify the required parameter 'payor_id' is set
        if ($payor_id === null || (is_array($payor_id) && count($payor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payor_id when calling listPaymentChanges'
            );
        }

        // verify the required parameter 'updated_since' is set
        if ($updated_since === null || (is_array($updated_since) && count($updated_since) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $updated_since when calling listPaymentChanges'
            );
        }


        if ($page_size !== null && $page_size > 1000) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling PaymentAuditServiceDeprecatedApi.listPaymentChanges, must be smaller than or equal to 1000.');
        }
        if ($page_size !== null && $page_size < 1) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling PaymentAuditServiceDeprecatedApi.listPaymentChanges, must be bigger than or equal to 1.');
        }
        

        $resourcePath = '/v1/deltas/payments';
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
     * Operation listPaymentsAuditV3
     *
     * V3 Get List of Payments
     *
     * @param  string $payee_id The UUID of the payee. (optional)
     * @param  string $payor_id The account owner Payor Id. Required for external users. (optional)
     * @param  string $payor_name The payor’s name. This filters via a case insensitive substring match. (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $status Payment Status (optional)
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
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status (optional)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPaymentsAuditV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\ListPaymentsResponseV3|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403
     * @deprecated
     */
    public function listPaymentsAuditV3($payee_id = null, $payor_id = null, $payor_name = null, $remote_id = null, $status = null, $source_account_name = null, $source_amount_from = null, $source_amount_to = null, $source_currency = null, $payment_amount_from = null, $payment_amount_to = null, $payment_currency = null, $submitted_date_from = null, $submitted_date_to = null, $payment_memo = null, $page = 1, $page_size = 25, $sort = null, $sensitive = null, string $contentType = self::contentTypes['listPaymentsAuditV3'][0])
    {
        list($response) = $this->listPaymentsAuditV3WithHttpInfo($payee_id, $payor_id, $payor_name, $remote_id, $status, $source_account_name, $source_amount_from, $source_amount_to, $source_currency, $payment_amount_from, $payment_amount_to, $payment_currency, $submitted_date_from, $submitted_date_to, $payment_memo, $page, $page_size, $sort, $sensitive, $contentType);
        return $response;
    }

    /**
     * Operation listPaymentsAuditV3WithHttpInfo
     *
     * V3 Get List of Payments
     *
     * @param  string $payee_id The UUID of the payee. (optional)
     * @param  string $payor_id The account owner Payor Id. Required for external users. (optional)
     * @param  string $payor_name The payor’s name. This filters via a case insensitive substring match. (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $status Payment Status (optional)
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
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status (optional)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPaymentsAuditV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\ListPaymentsResponseV3|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function listPaymentsAuditV3WithHttpInfo($payee_id = null, $payor_id = null, $payor_name = null, $remote_id = null, $status = null, $source_account_name = null, $source_amount_from = null, $source_amount_to = null, $source_currency = null, $payment_amount_from = null, $payment_amount_to = null, $payment_currency = null, $submitted_date_from = null, $submitted_date_to = null, $payment_memo = null, $page = 1, $page_size = 25, $sort = null, $sensitive = null, string $contentType = self::contentTypes['listPaymentsAuditV3'][0])
    {
        $request = $this->listPaymentsAuditV3Request($payee_id, $payor_id, $payor_name, $remote_id, $status, $source_account_name, $source_amount_from, $source_amount_to, $source_currency, $payment_amount_from, $payment_amount_to, $payment_currency, $submitted_date_from, $submitted_date_to, $payment_memo, $page, $page_size, $sort, $sensitive, $contentType);

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
                    if ('\VeloPayments\Client\Model\ListPaymentsResponseV3' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\ListPaymentsResponseV3' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\ListPaymentsResponseV3', []),
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

            $returnType = '\VeloPayments\Client\Model\ListPaymentsResponseV3';
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
                        '\VeloPayments\Client\Model\ListPaymentsResponseV3',
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
     * Operation listPaymentsAuditV3Async
     *
     * V3 Get List of Payments
     *
     * @param  string $payee_id The UUID of the payee. (optional)
     * @param  string $payor_id The account owner Payor Id. Required for external users. (optional)
     * @param  string $payor_name The payor’s name. This filters via a case insensitive substring match. (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $status Payment Status (optional)
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
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status (optional)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPaymentsAuditV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function listPaymentsAuditV3Async($payee_id = null, $payor_id = null, $payor_name = null, $remote_id = null, $status = null, $source_account_name = null, $source_amount_from = null, $source_amount_to = null, $source_currency = null, $payment_amount_from = null, $payment_amount_to = null, $payment_currency = null, $submitted_date_from = null, $submitted_date_to = null, $payment_memo = null, $page = 1, $page_size = 25, $sort = null, $sensitive = null, string $contentType = self::contentTypes['listPaymentsAuditV3'][0])
    {
        return $this->listPaymentsAuditV3AsyncWithHttpInfo($payee_id, $payor_id, $payor_name, $remote_id, $status, $source_account_name, $source_amount_from, $source_amount_to, $source_currency, $payment_amount_from, $payment_amount_to, $payment_currency, $submitted_date_from, $submitted_date_to, $payment_memo, $page, $page_size, $sort, $sensitive, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listPaymentsAuditV3AsyncWithHttpInfo
     *
     * V3 Get List of Payments
     *
     * @param  string $payee_id The UUID of the payee. (optional)
     * @param  string $payor_id The account owner Payor Id. Required for external users. (optional)
     * @param  string $payor_name The payor’s name. This filters via a case insensitive substring match. (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $status Payment Status (optional)
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
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status (optional)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPaymentsAuditV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function listPaymentsAuditV3AsyncWithHttpInfo($payee_id = null, $payor_id = null, $payor_name = null, $remote_id = null, $status = null, $source_account_name = null, $source_amount_from = null, $source_amount_to = null, $source_currency = null, $payment_amount_from = null, $payment_amount_to = null, $payment_currency = null, $submitted_date_from = null, $submitted_date_to = null, $payment_memo = null, $page = 1, $page_size = 25, $sort = null, $sensitive = null, string $contentType = self::contentTypes['listPaymentsAuditV3'][0])
    {
        $returnType = '\VeloPayments\Client\Model\ListPaymentsResponseV3';
        $request = $this->listPaymentsAuditV3Request($payee_id, $payor_id, $payor_name, $remote_id, $status, $source_account_name, $source_amount_from, $source_amount_to, $source_currency, $payment_amount_from, $payment_amount_to, $payment_currency, $submitted_date_from, $submitted_date_to, $payment_memo, $page, $page_size, $sort, $sensitive, $contentType);

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
     * Create request for operation 'listPaymentsAuditV3'
     *
     * @param  string $payee_id The UUID of the payee. (optional)
     * @param  string $payor_id The account owner Payor Id. Required for external users. (optional)
     * @param  string $payor_name The payor’s name. This filters via a case insensitive substring match. (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $status Payment Status (optional)
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
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status (optional)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPaymentsAuditV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function listPaymentsAuditV3Request($payee_id = null, $payor_id = null, $payor_name = null, $remote_id = null, $status = null, $source_account_name = null, $source_amount_from = null, $source_amount_to = null, $source_currency = null, $payment_amount_from = null, $payment_amount_to = null, $payment_currency = null, $submitted_date_from = null, $submitted_date_to = null, $payment_memo = null, $page = 1, $page_size = 25, $sort = null, $sensitive = null, string $contentType = self::contentTypes['listPaymentsAuditV3'][0])
    {

















        if ($page_size !== null && $page_size > 100) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling PaymentAuditServiceDeprecatedApi.listPaymentsAuditV3, must be smaller than or equal to 100.');
        }
        if ($page_size !== null && $page_size < 1) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling PaymentAuditServiceDeprecatedApi.listPaymentsAuditV3, must be bigger than or equal to 1.');
        }
        



        $resourcePath = '/v3/paymentaudit/payments';
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
            $status,
            'status', // param base name
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
