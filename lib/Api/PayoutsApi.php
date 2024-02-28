<?php
/**
 * PayoutsApi
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
 * PayoutsApi Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class PayoutsApi
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
        'createQuoteForPayoutV3' => [
            'application/json',
        ],
        'deschedulePayout' => [
            'application/json',
        ],
        'getPaymentsForPayoutV3' => [
            'application/json',
        ],
        'getPayoutSummaryV3' => [
            'application/json',
        ],
        'instructPayoutV3' => [
            'application/json',
        ],
        'scheduleForPayout' => [
            'application/json',
        ],
        'submitPayoutV3' => [
            'application/json',
            'multipart/form-data',
        ],
        'withdrawPayment' => [
            'application/json',
        ],
        'withdrawPayoutV3' => [
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
     * Operation createQuoteForPayoutV3
     *
     * Create a quote for the payout
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createQuoteForPayoutV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\QuoteResponseV3|\VeloPayments\Client\Model\InlineResponse404|\VeloPayments\Client\Model\InlineResponse409
     */
    public function createQuoteForPayoutV3($payout_id, string $contentType = self::contentTypes['createQuoteForPayoutV3'][0])
    {
        list($response) = $this->createQuoteForPayoutV3WithHttpInfo($payout_id, $contentType);
        return $response;
    }

    /**
     * Operation createQuoteForPayoutV3WithHttpInfo
     *
     * Create a quote for the payout
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createQuoteForPayoutV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\QuoteResponseV3|\VeloPayments\Client\Model\InlineResponse404|\VeloPayments\Client\Model\InlineResponse409, HTTP status code, HTTP response headers (array of strings)
     */
    public function createQuoteForPayoutV3WithHttpInfo($payout_id, string $contentType = self::contentTypes['createQuoteForPayoutV3'][0])
    {
        $request = $this->createQuoteForPayoutV3Request($payout_id, $contentType);

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
                    if ('\VeloPayments\Client\Model\QuoteResponseV3' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\QuoteResponseV3' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\QuoteResponseV3', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\VeloPayments\Client\Model\InlineResponse404' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse404' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse404', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 409:
                    if ('\VeloPayments\Client\Model\InlineResponse409' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse409' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse409', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\VeloPayments\Client\Model\QuoteResponseV3';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
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
                        '\VeloPayments\Client\Model\QuoteResponseV3',
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
                case 409:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse409',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createQuoteForPayoutV3Async
     *
     * Create a quote for the payout
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createQuoteForPayoutV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createQuoteForPayoutV3Async($payout_id, string $contentType = self::contentTypes['createQuoteForPayoutV3'][0])
    {
        return $this->createQuoteForPayoutV3AsyncWithHttpInfo($payout_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createQuoteForPayoutV3AsyncWithHttpInfo
     *
     * Create a quote for the payout
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createQuoteForPayoutV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createQuoteForPayoutV3AsyncWithHttpInfo($payout_id, string $contentType = self::contentTypes['createQuoteForPayoutV3'][0])
    {
        $returnType = '\VeloPayments\Client\Model\QuoteResponseV3';
        $request = $this->createQuoteForPayoutV3Request($payout_id, $contentType);

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
     * Create request for operation 'createQuoteForPayoutV3'
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createQuoteForPayoutV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createQuoteForPayoutV3Request($payout_id, string $contentType = self::contentTypes['createQuoteForPayoutV3'][0])
    {

        // verify the required parameter 'payout_id' is set
        if ($payout_id === null || (is_array($payout_id) && count($payout_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payout_id when calling createQuoteForPayoutV3'
            );
        }


        $resourcePath = '/v3/payouts/{payoutId}/quote';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



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
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation deschedulePayout
     *
     * Deschedule a payout
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deschedulePayout'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deschedulePayout($payout_id, string $contentType = self::contentTypes['deschedulePayout'][0])
    {
        $this->deschedulePayoutWithHttpInfo($payout_id, $contentType);
    }

    /**
     * Operation deschedulePayoutWithHttpInfo
     *
     * Deschedule a payout
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deschedulePayout'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deschedulePayoutWithHttpInfo($payout_id, string $contentType = self::contentTypes['deschedulePayout'][0])
    {
        $request = $this->deschedulePayoutRequest($payout_id, $contentType);

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

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
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
                case 409:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse409',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation deschedulePayoutAsync
     *
     * Deschedule a payout
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deschedulePayout'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deschedulePayoutAsync($payout_id, string $contentType = self::contentTypes['deschedulePayout'][0])
    {
        return $this->deschedulePayoutAsyncWithHttpInfo($payout_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deschedulePayoutAsyncWithHttpInfo
     *
     * Deschedule a payout
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deschedulePayout'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deschedulePayoutAsyncWithHttpInfo($payout_id, string $contentType = self::contentTypes['deschedulePayout'][0])
    {
        $returnType = '';
        $request = $this->deschedulePayoutRequest($payout_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'deschedulePayout'
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deschedulePayout'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deschedulePayoutRequest($payout_id, string $contentType = self::contentTypes['deschedulePayout'][0])
    {

        // verify the required parameter 'payout_id' is set
        if ($payout_id === null || (is_array($payout_id) && count($payout_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payout_id when calling deschedulePayout'
            );
        }


        $resourcePath = '/v3/payouts/{payoutId}/schedule';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



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
            'DELETE',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getPaymentsForPayoutV3
     *
     * Retrieve payments for a payout
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  string $status Payment Status * ACCEPTED: any payment which was accepted at submission time (status may have changed since) * REJECTED: any payment rejected by initial submission processing * WITHDRAWN: any payment which has been withdrawn * WITHDRAWABLE: any payment eligible for withdrawal (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $payor_payment_id Payor&#39;s Id of the Payment (optional)
     * @param  string $source_account_name Physical Account Name (optional)
     * @param  string $transmission_type Transmission Type * ACH * SAME_DAY_ACH * WIRE (optional)
     * @param  string $payment_memo Payment Memo of the Payment (optional)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentsForPayoutV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\PagedPaymentsResponseV3|\VeloPayments\Client\Model\InlineResponse404
     */
    public function getPaymentsForPayoutV3($payout_id, $status = null, $remote_id = null, $payor_payment_id = null, $source_account_name = null, $transmission_type = null, $payment_memo = null, $page_size = 25, $page = 1, string $contentType = self::contentTypes['getPaymentsForPayoutV3'][0])
    {
        list($response) = $this->getPaymentsForPayoutV3WithHttpInfo($payout_id, $status, $remote_id, $payor_payment_id, $source_account_name, $transmission_type, $payment_memo, $page_size, $page, $contentType);
        return $response;
    }

    /**
     * Operation getPaymentsForPayoutV3WithHttpInfo
     *
     * Retrieve payments for a payout
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  string $status Payment Status * ACCEPTED: any payment which was accepted at submission time (status may have changed since) * REJECTED: any payment rejected by initial submission processing * WITHDRAWN: any payment which has been withdrawn * WITHDRAWABLE: any payment eligible for withdrawal (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $payor_payment_id Payor&#39;s Id of the Payment (optional)
     * @param  string $source_account_name Physical Account Name (optional)
     * @param  string $transmission_type Transmission Type * ACH * SAME_DAY_ACH * WIRE (optional)
     * @param  string $payment_memo Payment Memo of the Payment (optional)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentsForPayoutV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\PagedPaymentsResponseV3|\VeloPayments\Client\Model\InlineResponse404, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPaymentsForPayoutV3WithHttpInfo($payout_id, $status = null, $remote_id = null, $payor_payment_id = null, $source_account_name = null, $transmission_type = null, $payment_memo = null, $page_size = 25, $page = 1, string $contentType = self::contentTypes['getPaymentsForPayoutV3'][0])
    {
        $request = $this->getPaymentsForPayoutV3Request($payout_id, $status, $remote_id, $payor_payment_id, $source_account_name, $transmission_type, $payment_memo, $page_size, $page, $contentType);

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
                    if ('\VeloPayments\Client\Model\PagedPaymentsResponseV3' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\PagedPaymentsResponseV3' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\PagedPaymentsResponseV3', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\VeloPayments\Client\Model\InlineResponse404' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse404' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse404', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\VeloPayments\Client\Model\PagedPaymentsResponseV3';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
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
                        '\VeloPayments\Client\Model\PagedPaymentsResponseV3',
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
     * Operation getPaymentsForPayoutV3Async
     *
     * Retrieve payments for a payout
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  string $status Payment Status * ACCEPTED: any payment which was accepted at submission time (status may have changed since) * REJECTED: any payment rejected by initial submission processing * WITHDRAWN: any payment which has been withdrawn * WITHDRAWABLE: any payment eligible for withdrawal (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $payor_payment_id Payor&#39;s Id of the Payment (optional)
     * @param  string $source_account_name Physical Account Name (optional)
     * @param  string $transmission_type Transmission Type * ACH * SAME_DAY_ACH * WIRE (optional)
     * @param  string $payment_memo Payment Memo of the Payment (optional)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentsForPayoutV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPaymentsForPayoutV3Async($payout_id, $status = null, $remote_id = null, $payor_payment_id = null, $source_account_name = null, $transmission_type = null, $payment_memo = null, $page_size = 25, $page = 1, string $contentType = self::contentTypes['getPaymentsForPayoutV3'][0])
    {
        return $this->getPaymentsForPayoutV3AsyncWithHttpInfo($payout_id, $status, $remote_id, $payor_payment_id, $source_account_name, $transmission_type, $payment_memo, $page_size, $page, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPaymentsForPayoutV3AsyncWithHttpInfo
     *
     * Retrieve payments for a payout
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  string $status Payment Status * ACCEPTED: any payment which was accepted at submission time (status may have changed since) * REJECTED: any payment rejected by initial submission processing * WITHDRAWN: any payment which has been withdrawn * WITHDRAWABLE: any payment eligible for withdrawal (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $payor_payment_id Payor&#39;s Id of the Payment (optional)
     * @param  string $source_account_name Physical Account Name (optional)
     * @param  string $transmission_type Transmission Type * ACH * SAME_DAY_ACH * WIRE (optional)
     * @param  string $payment_memo Payment Memo of the Payment (optional)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentsForPayoutV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPaymentsForPayoutV3AsyncWithHttpInfo($payout_id, $status = null, $remote_id = null, $payor_payment_id = null, $source_account_name = null, $transmission_type = null, $payment_memo = null, $page_size = 25, $page = 1, string $contentType = self::contentTypes['getPaymentsForPayoutV3'][0])
    {
        $returnType = '\VeloPayments\Client\Model\PagedPaymentsResponseV3';
        $request = $this->getPaymentsForPayoutV3Request($payout_id, $status, $remote_id, $payor_payment_id, $source_account_name, $transmission_type, $payment_memo, $page_size, $page, $contentType);

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
     * Create request for operation 'getPaymentsForPayoutV3'
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  string $status Payment Status * ACCEPTED: any payment which was accepted at submission time (status may have changed since) * REJECTED: any payment rejected by initial submission processing * WITHDRAWN: any payment which has been withdrawn * WITHDRAWABLE: any payment eligible for withdrawal (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $payor_payment_id Payor&#39;s Id of the Payment (optional)
     * @param  string $source_account_name Physical Account Name (optional)
     * @param  string $transmission_type Transmission Type * ACH * SAME_DAY_ACH * WIRE (optional)
     * @param  string $payment_memo Payment Memo of the Payment (optional)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentsForPayoutV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getPaymentsForPayoutV3Request($payout_id, $status = null, $remote_id = null, $payor_payment_id = null, $source_account_name = null, $transmission_type = null, $payment_memo = null, $page_size = 25, $page = 1, string $contentType = self::contentTypes['getPaymentsForPayoutV3'][0])
    {

        // verify the required parameter 'payout_id' is set
        if ($payout_id === null || (is_array($payout_id) && count($payout_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payout_id when calling getPaymentsForPayoutV3'
            );
        }







        if ($page_size !== null && $page_size > 100) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling PayoutsApi.getPaymentsForPayoutV3, must be smaller than or equal to 100.');
        }
        if ($page_size !== null && $page_size < 1) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling PayoutsApi.getPaymentsForPayoutV3, must be bigger than or equal to 1.');
        }
        


        $resourcePath = '/v3/payouts/{payoutId}/payments';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

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
            $remote_id,
            'remoteId', // param base name
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
            $source_account_name,
            'sourceAccountName', // param base name
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
            $payment_memo,
            'paymentMemo', // param base name
            'string', // openApiType
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
            $page,
            'page', // param base name
            'integer', // openApiType
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
     * Operation getPayoutSummaryV3
     *
     * Get Payout Summary
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayoutSummaryV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\PayoutSummaryResponseV3|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404
     */
    public function getPayoutSummaryV3($payout_id, string $contentType = self::contentTypes['getPayoutSummaryV3'][0])
    {
        list($response) = $this->getPayoutSummaryV3WithHttpInfo($payout_id, $contentType);
        return $response;
    }

    /**
     * Operation getPayoutSummaryV3WithHttpInfo
     *
     * Get Payout Summary
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayoutSummaryV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\PayoutSummaryResponseV3|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPayoutSummaryV3WithHttpInfo($payout_id, string $contentType = self::contentTypes['getPayoutSummaryV3'][0])
    {
        $request = $this->getPayoutSummaryV3Request($payout_id, $contentType);

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
                    if ('\VeloPayments\Client\Model\PayoutSummaryResponseV3' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\PayoutSummaryResponseV3' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\PayoutSummaryResponseV3', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\VeloPayments\Client\Model\InlineResponse401' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse401' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse404', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\VeloPayments\Client\Model\PayoutSummaryResponseV3';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
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
                        '\VeloPayments\Client\Model\PayoutSummaryResponseV3',
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
     * Operation getPayoutSummaryV3Async
     *
     * Get Payout Summary
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayoutSummaryV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPayoutSummaryV3Async($payout_id, string $contentType = self::contentTypes['getPayoutSummaryV3'][0])
    {
        return $this->getPayoutSummaryV3AsyncWithHttpInfo($payout_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPayoutSummaryV3AsyncWithHttpInfo
     *
     * Get Payout Summary
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayoutSummaryV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPayoutSummaryV3AsyncWithHttpInfo($payout_id, string $contentType = self::contentTypes['getPayoutSummaryV3'][0])
    {
        $returnType = '\VeloPayments\Client\Model\PayoutSummaryResponseV3';
        $request = $this->getPayoutSummaryV3Request($payout_id, $contentType);

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
     * Create request for operation 'getPayoutSummaryV3'
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayoutSummaryV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getPayoutSummaryV3Request($payout_id, string $contentType = self::contentTypes['getPayoutSummaryV3'][0])
    {

        // verify the required parameter 'payout_id' is set
        if ($payout_id === null || (is_array($payout_id) && count($payout_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payout_id when calling getPayoutSummaryV3'
            );
        }


        $resourcePath = '/v3/payouts/{payoutId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



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
     * Operation instructPayoutV3
     *
     * Instruct Payout
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  \VeloPayments\Client\Model\InstructPayoutRequestV3 $instruct_payout_request_v3 Additional instruct payout parameters (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['instructPayoutV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function instructPayoutV3($payout_id, $instruct_payout_request_v3 = null, string $contentType = self::contentTypes['instructPayoutV3'][0])
    {
        $this->instructPayoutV3WithHttpInfo($payout_id, $instruct_payout_request_v3, $contentType);
    }

    /**
     * Operation instructPayoutV3WithHttpInfo
     *
     * Instruct Payout
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  \VeloPayments\Client\Model\InstructPayoutRequestV3 $instruct_payout_request_v3 Additional instruct payout parameters (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['instructPayoutV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function instructPayoutV3WithHttpInfo($payout_id, $instruct_payout_request_v3 = null, string $contentType = self::contentTypes['instructPayoutV3'][0])
    {
        $request = $this->instructPayoutV3Request($payout_id, $instruct_payout_request_v3, $contentType);

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

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
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
                case 409:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse409',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation instructPayoutV3Async
     *
     * Instruct Payout
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  \VeloPayments\Client\Model\InstructPayoutRequestV3 $instruct_payout_request_v3 Additional instruct payout parameters (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['instructPayoutV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function instructPayoutV3Async($payout_id, $instruct_payout_request_v3 = null, string $contentType = self::contentTypes['instructPayoutV3'][0])
    {
        return $this->instructPayoutV3AsyncWithHttpInfo($payout_id, $instruct_payout_request_v3, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation instructPayoutV3AsyncWithHttpInfo
     *
     * Instruct Payout
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  \VeloPayments\Client\Model\InstructPayoutRequestV3 $instruct_payout_request_v3 Additional instruct payout parameters (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['instructPayoutV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function instructPayoutV3AsyncWithHttpInfo($payout_id, $instruct_payout_request_v3 = null, string $contentType = self::contentTypes['instructPayoutV3'][0])
    {
        $returnType = '';
        $request = $this->instructPayoutV3Request($payout_id, $instruct_payout_request_v3, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'instructPayoutV3'
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  \VeloPayments\Client\Model\InstructPayoutRequestV3 $instruct_payout_request_v3 Additional instruct payout parameters (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['instructPayoutV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function instructPayoutV3Request($payout_id, $instruct_payout_request_v3 = null, string $contentType = self::contentTypes['instructPayoutV3'][0])
    {

        // verify the required parameter 'payout_id' is set
        if ($payout_id === null || (is_array($payout_id) && count($payout_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payout_id when calling instructPayoutV3'
            );
        }



        $resourcePath = '/v3/payouts/{payoutId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



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
        if (isset($instruct_payout_request_v3)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($instruct_payout_request_v3));
            } else {
                $httpBody = $instruct_payout_request_v3;
            }
        } elseif (count($formParams) > 0) {
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
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation scheduleForPayout
     *
     * Schedule a payout
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  \VeloPayments\Client\Model\SchedulePayoutRequestV3 $schedule_payout_request_v3 schedule payout parameters (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['scheduleForPayout'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function scheduleForPayout($payout_id, $schedule_payout_request_v3 = null, string $contentType = self::contentTypes['scheduleForPayout'][0])
    {
        $this->scheduleForPayoutWithHttpInfo($payout_id, $schedule_payout_request_v3, $contentType);
    }

    /**
     * Operation scheduleForPayoutWithHttpInfo
     *
     * Schedule a payout
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  \VeloPayments\Client\Model\SchedulePayoutRequestV3 $schedule_payout_request_v3 schedule payout parameters (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['scheduleForPayout'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function scheduleForPayoutWithHttpInfo($payout_id, $schedule_payout_request_v3 = null, string $contentType = self::contentTypes['scheduleForPayout'][0])
    {
        $request = $this->scheduleForPayoutRequest($payout_id, $schedule_payout_request_v3, $contentType);

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

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
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
                case 409:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse409',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation scheduleForPayoutAsync
     *
     * Schedule a payout
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  \VeloPayments\Client\Model\SchedulePayoutRequestV3 $schedule_payout_request_v3 schedule payout parameters (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['scheduleForPayout'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function scheduleForPayoutAsync($payout_id, $schedule_payout_request_v3 = null, string $contentType = self::contentTypes['scheduleForPayout'][0])
    {
        return $this->scheduleForPayoutAsyncWithHttpInfo($payout_id, $schedule_payout_request_v3, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation scheduleForPayoutAsyncWithHttpInfo
     *
     * Schedule a payout
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  \VeloPayments\Client\Model\SchedulePayoutRequestV3 $schedule_payout_request_v3 schedule payout parameters (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['scheduleForPayout'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function scheduleForPayoutAsyncWithHttpInfo($payout_id, $schedule_payout_request_v3 = null, string $contentType = self::contentTypes['scheduleForPayout'][0])
    {
        $returnType = '';
        $request = $this->scheduleForPayoutRequest($payout_id, $schedule_payout_request_v3, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'scheduleForPayout'
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  \VeloPayments\Client\Model\SchedulePayoutRequestV3 $schedule_payout_request_v3 schedule payout parameters (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['scheduleForPayout'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function scheduleForPayoutRequest($payout_id, $schedule_payout_request_v3 = null, string $contentType = self::contentTypes['scheduleForPayout'][0])
    {

        // verify the required parameter 'payout_id' is set
        if ($payout_id === null || (is_array($payout_id) && count($payout_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payout_id when calling scheduleForPayout'
            );
        }



        $resourcePath = '/v3/payouts/{payoutId}/schedule';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



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
        if (isset($schedule_payout_request_v3)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($schedule_payout_request_v3));
            } else {
                $httpBody = $schedule_payout_request_v3;
            }
        } elseif (count($formParams) > 0) {
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
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation submitPayoutV3
     *
     * Submit Payout
     *
     * @param  \VeloPayments\Client\Model\CreatePayoutRequestV3 $create_payout_request_v3 Post amount to transfer using stored funding account details. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['submitPayoutV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function submitPayoutV3($create_payout_request_v3, string $contentType = self::contentTypes['submitPayoutV3'][0])
    {
        $this->submitPayoutV3WithHttpInfo($create_payout_request_v3, $contentType);
    }

    /**
     * Operation submitPayoutV3WithHttpInfo
     *
     * Submit Payout
     *
     * @param  \VeloPayments\Client\Model\CreatePayoutRequestV3 $create_payout_request_v3 Post amount to transfer using stored funding account details. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['submitPayoutV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function submitPayoutV3WithHttpInfo($create_payout_request_v3, string $contentType = self::contentTypes['submitPayoutV3'][0])
    {
        $request = $this->submitPayoutV3Request($create_payout_request_v3, $contentType);

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

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
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
     * Operation submitPayoutV3Async
     *
     * Submit Payout
     *
     * @param  \VeloPayments\Client\Model\CreatePayoutRequestV3 $create_payout_request_v3 Post amount to transfer using stored funding account details. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['submitPayoutV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function submitPayoutV3Async($create_payout_request_v3, string $contentType = self::contentTypes['submitPayoutV3'][0])
    {
        return $this->submitPayoutV3AsyncWithHttpInfo($create_payout_request_v3, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation submitPayoutV3AsyncWithHttpInfo
     *
     * Submit Payout
     *
     * @param  \VeloPayments\Client\Model\CreatePayoutRequestV3 $create_payout_request_v3 Post amount to transfer using stored funding account details. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['submitPayoutV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function submitPayoutV3AsyncWithHttpInfo($create_payout_request_v3, string $contentType = self::contentTypes['submitPayoutV3'][0])
    {
        $returnType = '';
        $request = $this->submitPayoutV3Request($create_payout_request_v3, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'submitPayoutV3'
     *
     * @param  \VeloPayments\Client\Model\CreatePayoutRequestV3 $create_payout_request_v3 Post amount to transfer using stored funding account details. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['submitPayoutV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function submitPayoutV3Request($create_payout_request_v3, string $contentType = self::contentTypes['submitPayoutV3'][0])
    {

        // verify the required parameter 'create_payout_request_v3' is set
        if ($create_payout_request_v3 === null || (is_array($create_payout_request_v3) && count($create_payout_request_v3) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $create_payout_request_v3 when calling submitPayoutV3'
            );
        }


        $resourcePath = '/v3/payouts';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($create_payout_request_v3)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($create_payout_request_v3));
            } else {
                $httpBody = $create_payout_request_v3;
            }
        } elseif (count($formParams) > 0) {
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
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation withdrawPayment
     *
     * Withdraw a Payment
     *
     * @param  string $payment_id Id of the Payment (required)
     * @param  \VeloPayments\Client\Model\WithdrawPaymentRequest $withdraw_payment_request details for withdrawal (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['withdrawPayment'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function withdrawPayment($payment_id, $withdraw_payment_request, string $contentType = self::contentTypes['withdrawPayment'][0])
    {
        $this->withdrawPaymentWithHttpInfo($payment_id, $withdraw_payment_request, $contentType);
    }

    /**
     * Operation withdrawPaymentWithHttpInfo
     *
     * Withdraw a Payment
     *
     * @param  string $payment_id Id of the Payment (required)
     * @param  \VeloPayments\Client\Model\WithdrawPaymentRequest $withdraw_payment_request details for withdrawal (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['withdrawPayment'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function withdrawPaymentWithHttpInfo($payment_id, $withdraw_payment_request, string $contentType = self::contentTypes['withdrawPayment'][0])
    {
        $request = $this->withdrawPaymentRequest($payment_id, $withdraw_payment_request, $contentType);

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

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
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
     * Operation withdrawPaymentAsync
     *
     * Withdraw a Payment
     *
     * @param  string $payment_id Id of the Payment (required)
     * @param  \VeloPayments\Client\Model\WithdrawPaymentRequest $withdraw_payment_request details for withdrawal (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['withdrawPayment'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function withdrawPaymentAsync($payment_id, $withdraw_payment_request, string $contentType = self::contentTypes['withdrawPayment'][0])
    {
        return $this->withdrawPaymentAsyncWithHttpInfo($payment_id, $withdraw_payment_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation withdrawPaymentAsyncWithHttpInfo
     *
     * Withdraw a Payment
     *
     * @param  string $payment_id Id of the Payment (required)
     * @param  \VeloPayments\Client\Model\WithdrawPaymentRequest $withdraw_payment_request details for withdrawal (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['withdrawPayment'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function withdrawPaymentAsyncWithHttpInfo($payment_id, $withdraw_payment_request, string $contentType = self::contentTypes['withdrawPayment'][0])
    {
        $returnType = '';
        $request = $this->withdrawPaymentRequest($payment_id, $withdraw_payment_request, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'withdrawPayment'
     *
     * @param  string $payment_id Id of the Payment (required)
     * @param  \VeloPayments\Client\Model\WithdrawPaymentRequest $withdraw_payment_request details for withdrawal (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['withdrawPayment'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function withdrawPaymentRequest($payment_id, $withdraw_payment_request, string $contentType = self::contentTypes['withdrawPayment'][0])
    {

        // verify the required parameter 'payment_id' is set
        if ($payment_id === null || (is_array($payment_id) && count($payment_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payment_id when calling withdrawPayment'
            );
        }

        // verify the required parameter 'withdraw_payment_request' is set
        if ($withdraw_payment_request === null || (is_array($withdraw_payment_request) && count($withdraw_payment_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $withdraw_payment_request when calling withdrawPayment'
            );
        }


        $resourcePath = '/v1/payments/{paymentId}/withdraw';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



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
        if (isset($withdraw_payment_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($withdraw_payment_request));
            } else {
                $httpBody = $withdraw_payment_request;
            }
        } elseif (count($formParams) > 0) {
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
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation withdrawPayoutV3
     *
     * Withdraw Payout
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['withdrawPayoutV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function withdrawPayoutV3($payout_id, string $contentType = self::contentTypes['withdrawPayoutV3'][0])
    {
        $this->withdrawPayoutV3WithHttpInfo($payout_id, $contentType);
    }

    /**
     * Operation withdrawPayoutV3WithHttpInfo
     *
     * Withdraw Payout
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['withdrawPayoutV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function withdrawPayoutV3WithHttpInfo($payout_id, string $contentType = self::contentTypes['withdrawPayoutV3'][0])
    {
        $request = $this->withdrawPayoutV3Request($payout_id, $contentType);

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

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
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
     * Operation withdrawPayoutV3Async
     *
     * Withdraw Payout
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['withdrawPayoutV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function withdrawPayoutV3Async($payout_id, string $contentType = self::contentTypes['withdrawPayoutV3'][0])
    {
        return $this->withdrawPayoutV3AsyncWithHttpInfo($payout_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation withdrawPayoutV3AsyncWithHttpInfo
     *
     * Withdraw Payout
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['withdrawPayoutV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function withdrawPayoutV3AsyncWithHttpInfo($payout_id, string $contentType = self::contentTypes['withdrawPayoutV3'][0])
    {
        $returnType = '';
        $request = $this->withdrawPayoutV3Request($payout_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'withdrawPayoutV3'
     *
     * @param  string $payout_id Id of the payout (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['withdrawPayoutV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function withdrawPayoutV3Request($payout_id, string $contentType = self::contentTypes['withdrawPayoutV3'][0])
    {

        // verify the required parameter 'payout_id' is set
        if ($payout_id === null || (is_array($payout_id) && count($payout_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payout_id when calling withdrawPayoutV3'
            );
        }


        $resourcePath = '/v3/payouts/{payoutId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



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
            'DELETE',
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
