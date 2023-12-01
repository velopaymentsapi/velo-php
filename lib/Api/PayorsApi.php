<?php
/**
 * PayorsApi
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
 * PayorsApi Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class PayorsApi
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
        'getPayorByIdV2' => [
            'application/json',
        ],
        'payorAddPayorLogoV1' => [
            'multipart/form-data',
        ],
        'payorCreateApiKeyV1' => [
            'application/json',
        ],
        'payorCreateApplicationV1' => [
            'application/json',
        ],
        'payorEmailOptOut' => [
            'application/json',
        ],
        'payorGetBranding' => [
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
     * Operation getPayorByIdV2
     *
     * Get Payor
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayorByIdV2'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\PayorV2|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\ErrorResponse
     */
    public function getPayorByIdV2($payor_id, string $contentType = self::contentTypes['getPayorByIdV2'][0])
    {
        list($response) = $this->getPayorByIdV2WithHttpInfo($payor_id, $contentType);
        return $response;
    }

    /**
     * Operation getPayorByIdV2WithHttpInfo
     *
     * Get Payor
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayorByIdV2'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\PayorV2|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPayorByIdV2WithHttpInfo($payor_id, string $contentType = self::contentTypes['getPayorByIdV2'][0])
    {
        $request = $this->getPayorByIdV2Request($payor_id, $contentType);

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
                    if ('\VeloPayments\Client\Model\PayorV2' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\PayorV2' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\PayorV2', []),
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
                    if ('\VeloPayments\Client\Model\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\ErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\VeloPayments\Client\Model\PayorV2';
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
                        '\VeloPayments\Client\Model\PayorV2',
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
                        '\VeloPayments\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPayorByIdV2Async
     *
     * Get Payor
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayorByIdV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPayorByIdV2Async($payor_id, string $contentType = self::contentTypes['getPayorByIdV2'][0])
    {
        return $this->getPayorByIdV2AsyncWithHttpInfo($payor_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPayorByIdV2AsyncWithHttpInfo
     *
     * Get Payor
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayorByIdV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPayorByIdV2AsyncWithHttpInfo($payor_id, string $contentType = self::contentTypes['getPayorByIdV2'][0])
    {
        $returnType = '\VeloPayments\Client\Model\PayorV2';
        $request = $this->getPayorByIdV2Request($payor_id, $contentType);

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
     * Create request for operation 'getPayorByIdV2'
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayorByIdV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getPayorByIdV2Request($payor_id, string $contentType = self::contentTypes['getPayorByIdV2'][0])
    {

        // verify the required parameter 'payor_id' is set
        if ($payor_id === null || (is_array($payor_id) && count($payor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payor_id when calling getPayorByIdV2'
            );
        }


        $resourcePath = '/v2/payors/{payorId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($payor_id !== null) {
            $resourcePath = str_replace(
                '{' . 'payorId' . '}',
                ObjectSerializer::toPathValue($payor_id),
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
     * Operation payorAddPayorLogoV1
     *
     * Add Logo
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  \SplFileObject $logo logo (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payorAddPayorLogoV1'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function payorAddPayorLogoV1($payor_id, $logo = null, string $contentType = self::contentTypes['payorAddPayorLogoV1'][0])
    {
        $this->payorAddPayorLogoV1WithHttpInfo($payor_id, $logo, $contentType);
    }

    /**
     * Operation payorAddPayorLogoV1WithHttpInfo
     *
     * Add Logo
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  \SplFileObject $logo (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payorAddPayorLogoV1'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function payorAddPayorLogoV1WithHttpInfo($payor_id, $logo = null, string $contentType = self::contentTypes['payorAddPayorLogoV1'][0])
    {
        $request = $this->payorAddPayorLogoV1Request($payor_id, $logo, $contentType);

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
     * Operation payorAddPayorLogoV1Async
     *
     * Add Logo
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  \SplFileObject $logo (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payorAddPayorLogoV1'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function payorAddPayorLogoV1Async($payor_id, $logo = null, string $contentType = self::contentTypes['payorAddPayorLogoV1'][0])
    {
        return $this->payorAddPayorLogoV1AsyncWithHttpInfo($payor_id, $logo, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation payorAddPayorLogoV1AsyncWithHttpInfo
     *
     * Add Logo
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  \SplFileObject $logo (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payorAddPayorLogoV1'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function payorAddPayorLogoV1AsyncWithHttpInfo($payor_id, $logo = null, string $contentType = self::contentTypes['payorAddPayorLogoV1'][0])
    {
        $returnType = '';
        $request = $this->payorAddPayorLogoV1Request($payor_id, $logo, $contentType);

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
     * Create request for operation 'payorAddPayorLogoV1'
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  \SplFileObject $logo (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payorAddPayorLogoV1'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function payorAddPayorLogoV1Request($payor_id, $logo = null, string $contentType = self::contentTypes['payorAddPayorLogoV1'][0])
    {

        // verify the required parameter 'payor_id' is set
        if ($payor_id === null || (is_array($payor_id) && count($payor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payor_id when calling payorAddPayorLogoV1'
            );
        }



        $resourcePath = '/v1/payors/{payorId}/branding/logos';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($payor_id !== null) {
            $resourcePath = str_replace(
                '{' . 'payorId' . '}',
                ObjectSerializer::toPathValue($payor_id),
                $resourcePath
            );
        }

        // form params
        if ($logo !== null) {
            $multipart = true;
            $formParams['logo'] = [];
            $paramFiles = is_array($logo) ? $logo : [$logo];
            foreach ($paramFiles as $paramFile) {
                $formParams['logo'][] = \GuzzleHttp\Psr7\Utils::tryFopen(
                    ObjectSerializer::toFormValue($paramFile),
                    'rb'
                );
            }
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
     * Operation payorCreateApiKeyV1
     *
     * Create API Key
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $application_id Application ID (required)
     * @param  \VeloPayments\Client\Model\PayorCreateApiKeyRequest $payor_create_api_key_request Details of application API key to create (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payorCreateApiKeyV1'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\PayorCreateApiKeyResponse|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404
     */
    public function payorCreateApiKeyV1($payor_id, $application_id, $payor_create_api_key_request, string $contentType = self::contentTypes['payorCreateApiKeyV1'][0])
    {
        list($response) = $this->payorCreateApiKeyV1WithHttpInfo($payor_id, $application_id, $payor_create_api_key_request, $contentType);
        return $response;
    }

    /**
     * Operation payorCreateApiKeyV1WithHttpInfo
     *
     * Create API Key
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $application_id Application ID (required)
     * @param  \VeloPayments\Client\Model\PayorCreateApiKeyRequest $payor_create_api_key_request Details of application API key to create (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payorCreateApiKeyV1'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\PayorCreateApiKeyResponse|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404, HTTP status code, HTTP response headers (array of strings)
     */
    public function payorCreateApiKeyV1WithHttpInfo($payor_id, $application_id, $payor_create_api_key_request, string $contentType = self::contentTypes['payorCreateApiKeyV1'][0])
    {
        $request = $this->payorCreateApiKeyV1Request($payor_id, $application_id, $payor_create_api_key_request, $contentType);

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
                    if ('\VeloPayments\Client\Model\PayorCreateApiKeyResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\PayorCreateApiKeyResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\PayorCreateApiKeyResponse', []),
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

            $returnType = '\VeloPayments\Client\Model\PayorCreateApiKeyResponse';
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
                        '\VeloPayments\Client\Model\PayorCreateApiKeyResponse',
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
     * Operation payorCreateApiKeyV1Async
     *
     * Create API Key
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $application_id Application ID (required)
     * @param  \VeloPayments\Client\Model\PayorCreateApiKeyRequest $payor_create_api_key_request Details of application API key to create (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payorCreateApiKeyV1'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function payorCreateApiKeyV1Async($payor_id, $application_id, $payor_create_api_key_request, string $contentType = self::contentTypes['payorCreateApiKeyV1'][0])
    {
        return $this->payorCreateApiKeyV1AsyncWithHttpInfo($payor_id, $application_id, $payor_create_api_key_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation payorCreateApiKeyV1AsyncWithHttpInfo
     *
     * Create API Key
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $application_id Application ID (required)
     * @param  \VeloPayments\Client\Model\PayorCreateApiKeyRequest $payor_create_api_key_request Details of application API key to create (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payorCreateApiKeyV1'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function payorCreateApiKeyV1AsyncWithHttpInfo($payor_id, $application_id, $payor_create_api_key_request, string $contentType = self::contentTypes['payorCreateApiKeyV1'][0])
    {
        $returnType = '\VeloPayments\Client\Model\PayorCreateApiKeyResponse';
        $request = $this->payorCreateApiKeyV1Request($payor_id, $application_id, $payor_create_api_key_request, $contentType);

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
     * Create request for operation 'payorCreateApiKeyV1'
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $application_id Application ID (required)
     * @param  \VeloPayments\Client\Model\PayorCreateApiKeyRequest $payor_create_api_key_request Details of application API key to create (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payorCreateApiKeyV1'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function payorCreateApiKeyV1Request($payor_id, $application_id, $payor_create_api_key_request, string $contentType = self::contentTypes['payorCreateApiKeyV1'][0])
    {

        // verify the required parameter 'payor_id' is set
        if ($payor_id === null || (is_array($payor_id) && count($payor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payor_id when calling payorCreateApiKeyV1'
            );
        }

        // verify the required parameter 'application_id' is set
        if ($application_id === null || (is_array($application_id) && count($application_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $application_id when calling payorCreateApiKeyV1'
            );
        }

        // verify the required parameter 'payor_create_api_key_request' is set
        if ($payor_create_api_key_request === null || (is_array($payor_create_api_key_request) && count($payor_create_api_key_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payor_create_api_key_request when calling payorCreateApiKeyV1'
            );
        }


        $resourcePath = '/v1/payors/{payorId}/applications/{applicationId}/keys';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($payor_id !== null) {
            $resourcePath = str_replace(
                '{' . 'payorId' . '}',
                ObjectSerializer::toPathValue($payor_id),
                $resourcePath
            );
        }
        // path params
        if ($application_id !== null) {
            $resourcePath = str_replace(
                '{' . 'applicationId' . '}',
                ObjectSerializer::toPathValue($application_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($payor_create_api_key_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($payor_create_api_key_request));
            } else {
                $httpBody = $payor_create_api_key_request;
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
     * Operation payorCreateApplicationV1
     *
     * Create Application
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  \VeloPayments\Client\Model\PayorCreateApplicationRequest $payor_create_application_request Details of application to create (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payorCreateApplicationV1'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function payorCreateApplicationV1($payor_id, $payor_create_application_request, string $contentType = self::contentTypes['payorCreateApplicationV1'][0])
    {
        $this->payorCreateApplicationV1WithHttpInfo($payor_id, $payor_create_application_request, $contentType);
    }

    /**
     * Operation payorCreateApplicationV1WithHttpInfo
     *
     * Create Application
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  \VeloPayments\Client\Model\PayorCreateApplicationRequest $payor_create_application_request Details of application to create (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payorCreateApplicationV1'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function payorCreateApplicationV1WithHttpInfo($payor_id, $payor_create_application_request, string $contentType = self::contentTypes['payorCreateApplicationV1'][0])
    {
        $request = $this->payorCreateApplicationV1Request($payor_id, $payor_create_application_request, $contentType);

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
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse404',
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
     * Operation payorCreateApplicationV1Async
     *
     * Create Application
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  \VeloPayments\Client\Model\PayorCreateApplicationRequest $payor_create_application_request Details of application to create (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payorCreateApplicationV1'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function payorCreateApplicationV1Async($payor_id, $payor_create_application_request, string $contentType = self::contentTypes['payorCreateApplicationV1'][0])
    {
        return $this->payorCreateApplicationV1AsyncWithHttpInfo($payor_id, $payor_create_application_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation payorCreateApplicationV1AsyncWithHttpInfo
     *
     * Create Application
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  \VeloPayments\Client\Model\PayorCreateApplicationRequest $payor_create_application_request Details of application to create (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payorCreateApplicationV1'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function payorCreateApplicationV1AsyncWithHttpInfo($payor_id, $payor_create_application_request, string $contentType = self::contentTypes['payorCreateApplicationV1'][0])
    {
        $returnType = '';
        $request = $this->payorCreateApplicationV1Request($payor_id, $payor_create_application_request, $contentType);

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
     * Create request for operation 'payorCreateApplicationV1'
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  \VeloPayments\Client\Model\PayorCreateApplicationRequest $payor_create_application_request Details of application to create (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payorCreateApplicationV1'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function payorCreateApplicationV1Request($payor_id, $payor_create_application_request, string $contentType = self::contentTypes['payorCreateApplicationV1'][0])
    {

        // verify the required parameter 'payor_id' is set
        if ($payor_id === null || (is_array($payor_id) && count($payor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payor_id when calling payorCreateApplicationV1'
            );
        }

        // verify the required parameter 'payor_create_application_request' is set
        if ($payor_create_application_request === null || (is_array($payor_create_application_request) && count($payor_create_application_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payor_create_application_request when calling payorCreateApplicationV1'
            );
        }


        $resourcePath = '/v1/payors/{payorId}/applications';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($payor_id !== null) {
            $resourcePath = str_replace(
                '{' . 'payorId' . '}',
                ObjectSerializer::toPathValue($payor_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($payor_create_application_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($payor_create_application_request));
            } else {
                $httpBody = $payor_create_application_request;
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
     * Operation payorEmailOptOut
     *
     * Reminder Email Opt-Out
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  \VeloPayments\Client\Model\PayorEmailOptOutRequest $payor_email_opt_out_request Reminder Emails Opt-Out Request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payorEmailOptOut'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function payorEmailOptOut($payor_id, $payor_email_opt_out_request, string $contentType = self::contentTypes['payorEmailOptOut'][0])
    {
        $this->payorEmailOptOutWithHttpInfo($payor_id, $payor_email_opt_out_request, $contentType);
    }

    /**
     * Operation payorEmailOptOutWithHttpInfo
     *
     * Reminder Email Opt-Out
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  \VeloPayments\Client\Model\PayorEmailOptOutRequest $payor_email_opt_out_request Reminder Emails Opt-Out Request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payorEmailOptOut'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function payorEmailOptOutWithHttpInfo($payor_id, $payor_email_opt_out_request, string $contentType = self::contentTypes['payorEmailOptOut'][0])
    {
        $request = $this->payorEmailOptOutRequest($payor_id, $payor_email_opt_out_request, $contentType);

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
                        '\VeloPayments\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation payorEmailOptOutAsync
     *
     * Reminder Email Opt-Out
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  \VeloPayments\Client\Model\PayorEmailOptOutRequest $payor_email_opt_out_request Reminder Emails Opt-Out Request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payorEmailOptOut'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function payorEmailOptOutAsync($payor_id, $payor_email_opt_out_request, string $contentType = self::contentTypes['payorEmailOptOut'][0])
    {
        return $this->payorEmailOptOutAsyncWithHttpInfo($payor_id, $payor_email_opt_out_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation payorEmailOptOutAsyncWithHttpInfo
     *
     * Reminder Email Opt-Out
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  \VeloPayments\Client\Model\PayorEmailOptOutRequest $payor_email_opt_out_request Reminder Emails Opt-Out Request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payorEmailOptOut'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function payorEmailOptOutAsyncWithHttpInfo($payor_id, $payor_email_opt_out_request, string $contentType = self::contentTypes['payorEmailOptOut'][0])
    {
        $returnType = '';
        $request = $this->payorEmailOptOutRequest($payor_id, $payor_email_opt_out_request, $contentType);

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
     * Create request for operation 'payorEmailOptOut'
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  \VeloPayments\Client\Model\PayorEmailOptOutRequest $payor_email_opt_out_request Reminder Emails Opt-Out Request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payorEmailOptOut'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function payorEmailOptOutRequest($payor_id, $payor_email_opt_out_request, string $contentType = self::contentTypes['payorEmailOptOut'][0])
    {

        // verify the required parameter 'payor_id' is set
        if ($payor_id === null || (is_array($payor_id) && count($payor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payor_id when calling payorEmailOptOut'
            );
        }

        // verify the required parameter 'payor_email_opt_out_request' is set
        if ($payor_email_opt_out_request === null || (is_array($payor_email_opt_out_request) && count($payor_email_opt_out_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payor_email_opt_out_request when calling payorEmailOptOut'
            );
        }


        $resourcePath = '/v1/payors/{payorId}/reminderEmailsUpdate';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($payor_id !== null) {
            $resourcePath = str_replace(
                '{' . 'payorId' . '}',
                ObjectSerializer::toPathValue($payor_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($payor_email_opt_out_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($payor_email_opt_out_request));
            } else {
                $httpBody = $payor_email_opt_out_request;
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
     * Operation payorGetBranding
     *
     * Get Branding
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payorGetBranding'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\PayorBrandingResponse|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\ErrorResponse
     */
    public function payorGetBranding($payor_id, string $contentType = self::contentTypes['payorGetBranding'][0])
    {
        list($response) = $this->payorGetBrandingWithHttpInfo($payor_id, $contentType);
        return $response;
    }

    /**
     * Operation payorGetBrandingWithHttpInfo
     *
     * Get Branding
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payorGetBranding'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\PayorBrandingResponse|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function payorGetBrandingWithHttpInfo($payor_id, string $contentType = self::contentTypes['payorGetBranding'][0])
    {
        $request = $this->payorGetBrandingRequest($payor_id, $contentType);

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
                    if ('\VeloPayments\Client\Model\PayorBrandingResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\PayorBrandingResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\PayorBrandingResponse', []),
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
                    if ('\VeloPayments\Client\Model\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\ErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\VeloPayments\Client\Model\PayorBrandingResponse';
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
                        '\VeloPayments\Client\Model\PayorBrandingResponse',
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
                        '\VeloPayments\Client\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation payorGetBrandingAsync
     *
     * Get Branding
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payorGetBranding'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function payorGetBrandingAsync($payor_id, string $contentType = self::contentTypes['payorGetBranding'][0])
    {
        return $this->payorGetBrandingAsyncWithHttpInfo($payor_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation payorGetBrandingAsyncWithHttpInfo
     *
     * Get Branding
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payorGetBranding'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function payorGetBrandingAsyncWithHttpInfo($payor_id, string $contentType = self::contentTypes['payorGetBranding'][0])
    {
        $returnType = '\VeloPayments\Client\Model\PayorBrandingResponse';
        $request = $this->payorGetBrandingRequest($payor_id, $contentType);

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
     * Create request for operation 'payorGetBranding'
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payorGetBranding'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function payorGetBrandingRequest($payor_id, string $contentType = self::contentTypes['payorGetBranding'][0])
    {

        // verify the required parameter 'payor_id' is set
        if ($payor_id === null || (is_array($payor_id) && count($payor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payor_id when calling payorGetBranding'
            );
        }


        $resourcePath = '/v1/payors/{payorId}/branding';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($payor_id !== null) {
            $resourcePath = str_replace(
                '{' . 'payorId' . '}',
                ObjectSerializer::toPathValue($payor_id),
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
