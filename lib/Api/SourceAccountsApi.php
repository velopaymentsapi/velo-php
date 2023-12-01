<?php
/**
 * SourceAccountsApi
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
 * SourceAccountsApi Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class SourceAccountsApi
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
        'getSourceAccountV2' => [
            'application/json',
        ],
        'getSourceAccountV3' => [
            'application/json',
        ],
        'getSourceAccountsV2' => [
            'application/json',
        ],
        'getSourceAccountsV3' => [
            'application/json',
        ],
        'setNotificationsRequest' => [
            'application/json',
        ],
        'setNotificationsRequestV3' => [
            'application/json',
        ],
        'transferFundsV2' => [
            'application/json',
        ],
        'transferFundsV3' => [
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
     * Operation getSourceAccountV2
     *
     * Get Source Account
     *
     * @param  string $source_account_id Source account id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getSourceAccountV2'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\SourceAccountResponseV2|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404
     * @deprecated
     */
    public function getSourceAccountV2($source_account_id, string $contentType = self::contentTypes['getSourceAccountV2'][0])
    {
        list($response) = $this->getSourceAccountV2WithHttpInfo($source_account_id, $contentType);
        return $response;
    }

    /**
     * Operation getSourceAccountV2WithHttpInfo
     *
     * Get Source Account
     *
     * @param  string $source_account_id Source account id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getSourceAccountV2'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\SourceAccountResponseV2|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function getSourceAccountV2WithHttpInfo($source_account_id, string $contentType = self::contentTypes['getSourceAccountV2'][0])
    {
        $request = $this->getSourceAccountV2Request($source_account_id, $contentType);

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
                    if ('\VeloPayments\Client\Model\SourceAccountResponseV2' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\SourceAccountResponseV2' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\SourceAccountResponseV2', []),
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

            $returnType = '\VeloPayments\Client\Model\SourceAccountResponseV2';
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
                        '\VeloPayments\Client\Model\SourceAccountResponseV2',
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
     * Operation getSourceAccountV2Async
     *
     * Get Source Account
     *
     * @param  string $source_account_id Source account id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getSourceAccountV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function getSourceAccountV2Async($source_account_id, string $contentType = self::contentTypes['getSourceAccountV2'][0])
    {
        return $this->getSourceAccountV2AsyncWithHttpInfo($source_account_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getSourceAccountV2AsyncWithHttpInfo
     *
     * Get Source Account
     *
     * @param  string $source_account_id Source account id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getSourceAccountV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function getSourceAccountV2AsyncWithHttpInfo($source_account_id, string $contentType = self::contentTypes['getSourceAccountV2'][0])
    {
        $returnType = '\VeloPayments\Client\Model\SourceAccountResponseV2';
        $request = $this->getSourceAccountV2Request($source_account_id, $contentType);

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
     * Create request for operation 'getSourceAccountV2'
     *
     * @param  string $source_account_id Source account id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getSourceAccountV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function getSourceAccountV2Request($source_account_id, string $contentType = self::contentTypes['getSourceAccountV2'][0])
    {

        // verify the required parameter 'source_account_id' is set
        if ($source_account_id === null || (is_array($source_account_id) && count($source_account_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $source_account_id when calling getSourceAccountV2'
            );
        }


        $resourcePath = '/v2/sourceAccounts/{sourceAccountId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($source_account_id !== null) {
            $resourcePath = str_replace(
                '{' . 'sourceAccountId' . '}',
                ObjectSerializer::toPathValue($source_account_id),
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
     * Operation getSourceAccountV3
     *
     * Get details about given source account.
     *
     * @param  string $source_account_id Source account id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getSourceAccountV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\SourceAccountResponseV3|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404
     */
    public function getSourceAccountV3($source_account_id, string $contentType = self::contentTypes['getSourceAccountV3'][0])
    {
        list($response) = $this->getSourceAccountV3WithHttpInfo($source_account_id, $contentType);
        return $response;
    }

    /**
     * Operation getSourceAccountV3WithHttpInfo
     *
     * Get details about given source account.
     *
     * @param  string $source_account_id Source account id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getSourceAccountV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\SourceAccountResponseV3|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404, HTTP status code, HTTP response headers (array of strings)
     */
    public function getSourceAccountV3WithHttpInfo($source_account_id, string $contentType = self::contentTypes['getSourceAccountV3'][0])
    {
        $request = $this->getSourceAccountV3Request($source_account_id, $contentType);

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
                    if ('\VeloPayments\Client\Model\SourceAccountResponseV3' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\SourceAccountResponseV3' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\SourceAccountResponseV3', []),
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

            $returnType = '\VeloPayments\Client\Model\SourceAccountResponseV3';
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
                        '\VeloPayments\Client\Model\SourceAccountResponseV3',
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
     * Operation getSourceAccountV3Async
     *
     * Get details about given source account.
     *
     * @param  string $source_account_id Source account id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getSourceAccountV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSourceAccountV3Async($source_account_id, string $contentType = self::contentTypes['getSourceAccountV3'][0])
    {
        return $this->getSourceAccountV3AsyncWithHttpInfo($source_account_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getSourceAccountV3AsyncWithHttpInfo
     *
     * Get details about given source account.
     *
     * @param  string $source_account_id Source account id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getSourceAccountV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSourceAccountV3AsyncWithHttpInfo($source_account_id, string $contentType = self::contentTypes['getSourceAccountV3'][0])
    {
        $returnType = '\VeloPayments\Client\Model\SourceAccountResponseV3';
        $request = $this->getSourceAccountV3Request($source_account_id, $contentType);

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
     * Create request for operation 'getSourceAccountV3'
     *
     * @param  string $source_account_id Source account id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getSourceAccountV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getSourceAccountV3Request($source_account_id, string $contentType = self::contentTypes['getSourceAccountV3'][0])
    {

        // verify the required parameter 'source_account_id' is set
        if ($source_account_id === null || (is_array($source_account_id) && count($source_account_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $source_account_id when calling getSourceAccountV3'
            );
        }


        $resourcePath = '/v3/sourceAccounts/{sourceAccountId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($source_account_id !== null) {
            $resourcePath = str_replace(
                '{' . 'sourceAccountId' . '}',
                ObjectSerializer::toPathValue($source_account_id),
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
     * Operation getSourceAccountsV2
     *
     * Get list of source accounts
     *
     * @param  string $physical_account_name Physical Account Name (optional)
     * @param  string $physical_account_id The physical account ID (optional)
     * @param  string $payor_id The account owner Payor ID (optional)
     * @param  string $funding_account_id The funding account ID (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields e.g. ?sort&#x3D;name:asc Default is name:asc The supported sort fields are - fundingRef, name, balance (optional, default to 'fundingRef:asc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getSourceAccountsV2'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\ListSourceAccountResponseV2|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404
     * @deprecated
     */
    public function getSourceAccountsV2($physical_account_name = null, $physical_account_id = null, $payor_id = null, $funding_account_id = null, $page = 1, $page_size = 25, $sort = 'fundingRef:asc', string $contentType = self::contentTypes['getSourceAccountsV2'][0])
    {
        list($response) = $this->getSourceAccountsV2WithHttpInfo($physical_account_name, $physical_account_id, $payor_id, $funding_account_id, $page, $page_size, $sort, $contentType);
        return $response;
    }

    /**
     * Operation getSourceAccountsV2WithHttpInfo
     *
     * Get list of source accounts
     *
     * @param  string $physical_account_name Physical Account Name (optional)
     * @param  string $physical_account_id The physical account ID (optional)
     * @param  string $payor_id The account owner Payor ID (optional)
     * @param  string $funding_account_id The funding account ID (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields e.g. ?sort&#x3D;name:asc Default is name:asc The supported sort fields are - fundingRef, name, balance (optional, default to 'fundingRef:asc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getSourceAccountsV2'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\ListSourceAccountResponseV2|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function getSourceAccountsV2WithHttpInfo($physical_account_name = null, $physical_account_id = null, $payor_id = null, $funding_account_id = null, $page = 1, $page_size = 25, $sort = 'fundingRef:asc', string $contentType = self::contentTypes['getSourceAccountsV2'][0])
    {
        $request = $this->getSourceAccountsV2Request($physical_account_name, $physical_account_id, $payor_id, $funding_account_id, $page, $page_size, $sort, $contentType);

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
                    if ('\VeloPayments\Client\Model\ListSourceAccountResponseV2' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\ListSourceAccountResponseV2' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\ListSourceAccountResponseV2', []),
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

            $returnType = '\VeloPayments\Client\Model\ListSourceAccountResponseV2';
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
                        '\VeloPayments\Client\Model\ListSourceAccountResponseV2',
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
     * Operation getSourceAccountsV2Async
     *
     * Get list of source accounts
     *
     * @param  string $physical_account_name Physical Account Name (optional)
     * @param  string $physical_account_id The physical account ID (optional)
     * @param  string $payor_id The account owner Payor ID (optional)
     * @param  string $funding_account_id The funding account ID (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields e.g. ?sort&#x3D;name:asc Default is name:asc The supported sort fields are - fundingRef, name, balance (optional, default to 'fundingRef:asc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getSourceAccountsV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function getSourceAccountsV2Async($physical_account_name = null, $physical_account_id = null, $payor_id = null, $funding_account_id = null, $page = 1, $page_size = 25, $sort = 'fundingRef:asc', string $contentType = self::contentTypes['getSourceAccountsV2'][0])
    {
        return $this->getSourceAccountsV2AsyncWithHttpInfo($physical_account_name, $physical_account_id, $payor_id, $funding_account_id, $page, $page_size, $sort, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getSourceAccountsV2AsyncWithHttpInfo
     *
     * Get list of source accounts
     *
     * @param  string $physical_account_name Physical Account Name (optional)
     * @param  string $physical_account_id The physical account ID (optional)
     * @param  string $payor_id The account owner Payor ID (optional)
     * @param  string $funding_account_id The funding account ID (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields e.g. ?sort&#x3D;name:asc Default is name:asc The supported sort fields are - fundingRef, name, balance (optional, default to 'fundingRef:asc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getSourceAccountsV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function getSourceAccountsV2AsyncWithHttpInfo($physical_account_name = null, $physical_account_id = null, $payor_id = null, $funding_account_id = null, $page = 1, $page_size = 25, $sort = 'fundingRef:asc', string $contentType = self::contentTypes['getSourceAccountsV2'][0])
    {
        $returnType = '\VeloPayments\Client\Model\ListSourceAccountResponseV2';
        $request = $this->getSourceAccountsV2Request($physical_account_name, $physical_account_id, $payor_id, $funding_account_id, $page, $page_size, $sort, $contentType);

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
     * Create request for operation 'getSourceAccountsV2'
     *
     * @param  string $physical_account_name Physical Account Name (optional)
     * @param  string $physical_account_id The physical account ID (optional)
     * @param  string $payor_id The account owner Payor ID (optional)
     * @param  string $funding_account_id The funding account ID (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields e.g. ?sort&#x3D;name:asc Default is name:asc The supported sort fields are - fundingRef, name, balance (optional, default to 'fundingRef:asc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getSourceAccountsV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function getSourceAccountsV2Request($physical_account_name = null, $physical_account_id = null, $payor_id = null, $funding_account_id = null, $page = 1, $page_size = 25, $sort = 'fundingRef:asc', string $contentType = self::contentTypes['getSourceAccountsV2'][0])
    {






        if ($page_size !== null && $page_size > 100) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling SourceAccountsApi.getSourceAccountsV2, must be smaller than or equal to 100.');
        }
        if ($page_size !== null && $page_size < 1) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling SourceAccountsApi.getSourceAccountsV2, must be bigger than or equal to 1.');
        }
        
        if ($sort !== null && !preg_match("/[fundingRef|name|balance]+[:desc|:asc]/", $sort)) {
            throw new \InvalidArgumentException("invalid value for \"sort\" when calling SourceAccountsApi.getSourceAccountsV2, must conform to the pattern /[fundingRef|name|balance]+[:desc|:asc]/.");
        }
        

        $resourcePath = '/v2/sourceAccounts';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $physical_account_name,
            'physicalAccountName', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $physical_account_id,
            'physicalAccountId', // param base name
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
            $funding_account_id,
            'fundingAccountId', // param base name
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
     * Operation getSourceAccountsV3
     *
     * Get list of source accounts
     *
     * @param  string $physical_account_name Physical Account Name (optional)
     * @param  string $physical_account_id The physical account ID (optional)
     * @param  string $payor_id The account owner Payor ID (optional)
     * @param  string $funding_account_id The funding account ID (optional)
     * @param  bool $include_user_deleted A filter for retrieving both active accounts and user deleted ones (optional)
     * @param  string $type The type of source account. (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields e.g. ?sort&#x3D;name:asc Default is name:asc The supported sort fields are - fundingRef, name, balance (optional, default to 'fundingRef:asc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getSourceAccountsV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\ListSourceAccountResponseV3|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404
     */
    public function getSourceAccountsV3($physical_account_name = null, $physical_account_id = null, $payor_id = null, $funding_account_id = null, $include_user_deleted = null, $type = null, $page = 1, $page_size = 25, $sort = 'fundingRef:asc', string $contentType = self::contentTypes['getSourceAccountsV3'][0])
    {
        list($response) = $this->getSourceAccountsV3WithHttpInfo($physical_account_name, $physical_account_id, $payor_id, $funding_account_id, $include_user_deleted, $type, $page, $page_size, $sort, $contentType);
        return $response;
    }

    /**
     * Operation getSourceAccountsV3WithHttpInfo
     *
     * Get list of source accounts
     *
     * @param  string $physical_account_name Physical Account Name (optional)
     * @param  string $physical_account_id The physical account ID (optional)
     * @param  string $payor_id The account owner Payor ID (optional)
     * @param  string $funding_account_id The funding account ID (optional)
     * @param  bool $include_user_deleted A filter for retrieving both active accounts and user deleted ones (optional)
     * @param  string $type The type of source account. (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields e.g. ?sort&#x3D;name:asc Default is name:asc The supported sort fields are - fundingRef, name, balance (optional, default to 'fundingRef:asc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getSourceAccountsV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\ListSourceAccountResponseV3|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404, HTTP status code, HTTP response headers (array of strings)
     */
    public function getSourceAccountsV3WithHttpInfo($physical_account_name = null, $physical_account_id = null, $payor_id = null, $funding_account_id = null, $include_user_deleted = null, $type = null, $page = 1, $page_size = 25, $sort = 'fundingRef:asc', string $contentType = self::contentTypes['getSourceAccountsV3'][0])
    {
        $request = $this->getSourceAccountsV3Request($physical_account_name, $physical_account_id, $payor_id, $funding_account_id, $include_user_deleted, $type, $page, $page_size, $sort, $contentType);

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
                    if ('\VeloPayments\Client\Model\ListSourceAccountResponseV3' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\ListSourceAccountResponseV3' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\ListSourceAccountResponseV3', []),
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

            $returnType = '\VeloPayments\Client\Model\ListSourceAccountResponseV3';
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
                        '\VeloPayments\Client\Model\ListSourceAccountResponseV3',
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
     * Operation getSourceAccountsV3Async
     *
     * Get list of source accounts
     *
     * @param  string $physical_account_name Physical Account Name (optional)
     * @param  string $physical_account_id The physical account ID (optional)
     * @param  string $payor_id The account owner Payor ID (optional)
     * @param  string $funding_account_id The funding account ID (optional)
     * @param  bool $include_user_deleted A filter for retrieving both active accounts and user deleted ones (optional)
     * @param  string $type The type of source account. (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields e.g. ?sort&#x3D;name:asc Default is name:asc The supported sort fields are - fundingRef, name, balance (optional, default to 'fundingRef:asc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getSourceAccountsV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSourceAccountsV3Async($physical_account_name = null, $physical_account_id = null, $payor_id = null, $funding_account_id = null, $include_user_deleted = null, $type = null, $page = 1, $page_size = 25, $sort = 'fundingRef:asc', string $contentType = self::contentTypes['getSourceAccountsV3'][0])
    {
        return $this->getSourceAccountsV3AsyncWithHttpInfo($physical_account_name, $physical_account_id, $payor_id, $funding_account_id, $include_user_deleted, $type, $page, $page_size, $sort, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getSourceAccountsV3AsyncWithHttpInfo
     *
     * Get list of source accounts
     *
     * @param  string $physical_account_name Physical Account Name (optional)
     * @param  string $physical_account_id The physical account ID (optional)
     * @param  string $payor_id The account owner Payor ID (optional)
     * @param  string $funding_account_id The funding account ID (optional)
     * @param  bool $include_user_deleted A filter for retrieving both active accounts and user deleted ones (optional)
     * @param  string $type The type of source account. (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields e.g. ?sort&#x3D;name:asc Default is name:asc The supported sort fields are - fundingRef, name, balance (optional, default to 'fundingRef:asc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getSourceAccountsV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSourceAccountsV3AsyncWithHttpInfo($physical_account_name = null, $physical_account_id = null, $payor_id = null, $funding_account_id = null, $include_user_deleted = null, $type = null, $page = 1, $page_size = 25, $sort = 'fundingRef:asc', string $contentType = self::contentTypes['getSourceAccountsV3'][0])
    {
        $returnType = '\VeloPayments\Client\Model\ListSourceAccountResponseV3';
        $request = $this->getSourceAccountsV3Request($physical_account_name, $physical_account_id, $payor_id, $funding_account_id, $include_user_deleted, $type, $page, $page_size, $sort, $contentType);

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
     * Create request for operation 'getSourceAccountsV3'
     *
     * @param  string $physical_account_name Physical Account Name (optional)
     * @param  string $physical_account_id The physical account ID (optional)
     * @param  string $payor_id The account owner Payor ID (optional)
     * @param  string $funding_account_id The funding account ID (optional)
     * @param  bool $include_user_deleted A filter for retrieving both active accounts and user deleted ones (optional)
     * @param  string $type The type of source account. (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size The number of results to return in a page (optional, default to 25)
     * @param  string $sort List of sort fields e.g. ?sort&#x3D;name:asc Default is name:asc The supported sort fields are - fundingRef, name, balance (optional, default to 'fundingRef:asc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getSourceAccountsV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getSourceAccountsV3Request($physical_account_name = null, $physical_account_id = null, $payor_id = null, $funding_account_id = null, $include_user_deleted = null, $type = null, $page = 1, $page_size = 25, $sort = 'fundingRef:asc', string $contentType = self::contentTypes['getSourceAccountsV3'][0])
    {








        if ($page_size !== null && $page_size > 100) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling SourceAccountsApi.getSourceAccountsV3, must be smaller than or equal to 100.');
        }
        if ($page_size !== null && $page_size < 1) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling SourceAccountsApi.getSourceAccountsV3, must be bigger than or equal to 1.');
        }
        
        if ($sort !== null && !preg_match("/[fundingRef|name|balance]+[:desc|:asc]/", $sort)) {
            throw new \InvalidArgumentException("invalid value for \"sort\" when calling SourceAccountsApi.getSourceAccountsV3, must conform to the pattern /[fundingRef|name|balance]+[:desc|:asc]/.");
        }
        

        $resourcePath = '/v3/sourceAccounts';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $physical_account_name,
            'physicalAccountName', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $physical_account_id,
            'physicalAccountId', // param base name
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
            $funding_account_id,
            'fundingAccountId', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $include_user_deleted,
            'includeUserDeleted', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $type,
            'type', // param base name
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
     * Operation setNotificationsRequest
     *
     * Set notifications
     *
     * @param  string $source_account_id Source account id (required)
     * @param  \VeloPayments\Client\Model\SetNotificationsRequest $set_notifications_request Body to included minimum balance to set (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['setNotificationsRequest'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     * @deprecated
     */
    public function setNotificationsRequest($source_account_id, $set_notifications_request, string $contentType = self::contentTypes['setNotificationsRequest'][0])
    {
        $this->setNotificationsRequestWithHttpInfo($source_account_id, $set_notifications_request, $contentType);
    }

    /**
     * Operation setNotificationsRequestWithHttpInfo
     *
     * Set notifications
     *
     * @param  string $source_account_id Source account id (required)
     * @param  \VeloPayments\Client\Model\SetNotificationsRequest $set_notifications_request Body to included minimum balance to set (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['setNotificationsRequest'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function setNotificationsRequestWithHttpInfo($source_account_id, $set_notifications_request, string $contentType = self::contentTypes['setNotificationsRequest'][0])
    {
        $request = $this->setNotificationsRequestRequest($source_account_id, $set_notifications_request, $contentType);

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
     * Operation setNotificationsRequestAsync
     *
     * Set notifications
     *
     * @param  string $source_account_id Source account id (required)
     * @param  \VeloPayments\Client\Model\SetNotificationsRequest $set_notifications_request Body to included minimum balance to set (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['setNotificationsRequest'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function setNotificationsRequestAsync($source_account_id, $set_notifications_request, string $contentType = self::contentTypes['setNotificationsRequest'][0])
    {
        return $this->setNotificationsRequestAsyncWithHttpInfo($source_account_id, $set_notifications_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation setNotificationsRequestAsyncWithHttpInfo
     *
     * Set notifications
     *
     * @param  string $source_account_id Source account id (required)
     * @param  \VeloPayments\Client\Model\SetNotificationsRequest $set_notifications_request Body to included minimum balance to set (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['setNotificationsRequest'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function setNotificationsRequestAsyncWithHttpInfo($source_account_id, $set_notifications_request, string $contentType = self::contentTypes['setNotificationsRequest'][0])
    {
        $returnType = '';
        $request = $this->setNotificationsRequestRequest($source_account_id, $set_notifications_request, $contentType);

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
     * Create request for operation 'setNotificationsRequest'
     *
     * @param  string $source_account_id Source account id (required)
     * @param  \VeloPayments\Client\Model\SetNotificationsRequest $set_notifications_request Body to included minimum balance to set (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['setNotificationsRequest'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function setNotificationsRequestRequest($source_account_id, $set_notifications_request, string $contentType = self::contentTypes['setNotificationsRequest'][0])
    {

        // verify the required parameter 'source_account_id' is set
        if ($source_account_id === null || (is_array($source_account_id) && count($source_account_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $source_account_id when calling setNotificationsRequest'
            );
        }

        // verify the required parameter 'set_notifications_request' is set
        if ($set_notifications_request === null || (is_array($set_notifications_request) && count($set_notifications_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $set_notifications_request when calling setNotificationsRequest'
            );
        }


        $resourcePath = '/v1/sourceAccounts/{sourceAccountId}/notifications';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($source_account_id !== null) {
            $resourcePath = str_replace(
                '{' . 'sourceAccountId' . '}',
                ObjectSerializer::toPathValue($source_account_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($set_notifications_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($set_notifications_request));
            } else {
                $httpBody = $set_notifications_request;
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
     * Operation setNotificationsRequestV3
     *
     * Set notifications
     *
     * @param  string $source_account_id Source account id (required)
     * @param  \VeloPayments\Client\Model\SetNotificationsRequest2 $set_notifications_request2 Body to included minimum balance to set (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['setNotificationsRequestV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function setNotificationsRequestV3($source_account_id, $set_notifications_request2, string $contentType = self::contentTypes['setNotificationsRequestV3'][0])
    {
        $this->setNotificationsRequestV3WithHttpInfo($source_account_id, $set_notifications_request2, $contentType);
    }

    /**
     * Operation setNotificationsRequestV3WithHttpInfo
     *
     * Set notifications
     *
     * @param  string $source_account_id Source account id (required)
     * @param  \VeloPayments\Client\Model\SetNotificationsRequest2 $set_notifications_request2 Body to included minimum balance to set (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['setNotificationsRequestV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function setNotificationsRequestV3WithHttpInfo($source_account_id, $set_notifications_request2, string $contentType = self::contentTypes['setNotificationsRequestV3'][0])
    {
        $request = $this->setNotificationsRequestV3Request($source_account_id, $set_notifications_request2, $contentType);

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
     * Operation setNotificationsRequestV3Async
     *
     * Set notifications
     *
     * @param  string $source_account_id Source account id (required)
     * @param  \VeloPayments\Client\Model\SetNotificationsRequest2 $set_notifications_request2 Body to included minimum balance to set (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['setNotificationsRequestV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function setNotificationsRequestV3Async($source_account_id, $set_notifications_request2, string $contentType = self::contentTypes['setNotificationsRequestV3'][0])
    {
        return $this->setNotificationsRequestV3AsyncWithHttpInfo($source_account_id, $set_notifications_request2, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation setNotificationsRequestV3AsyncWithHttpInfo
     *
     * Set notifications
     *
     * @param  string $source_account_id Source account id (required)
     * @param  \VeloPayments\Client\Model\SetNotificationsRequest2 $set_notifications_request2 Body to included minimum balance to set (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['setNotificationsRequestV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function setNotificationsRequestV3AsyncWithHttpInfo($source_account_id, $set_notifications_request2, string $contentType = self::contentTypes['setNotificationsRequestV3'][0])
    {
        $returnType = '';
        $request = $this->setNotificationsRequestV3Request($source_account_id, $set_notifications_request2, $contentType);

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
     * Create request for operation 'setNotificationsRequestV3'
     *
     * @param  string $source_account_id Source account id (required)
     * @param  \VeloPayments\Client\Model\SetNotificationsRequest2 $set_notifications_request2 Body to included minimum balance to set (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['setNotificationsRequestV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function setNotificationsRequestV3Request($source_account_id, $set_notifications_request2, string $contentType = self::contentTypes['setNotificationsRequestV3'][0])
    {

        // verify the required parameter 'source_account_id' is set
        if ($source_account_id === null || (is_array($source_account_id) && count($source_account_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $source_account_id when calling setNotificationsRequestV3'
            );
        }

        // verify the required parameter 'set_notifications_request2' is set
        if ($set_notifications_request2 === null || (is_array($set_notifications_request2) && count($set_notifications_request2) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $set_notifications_request2 when calling setNotificationsRequestV3'
            );
        }


        $resourcePath = '/v3/sourceAccounts/{sourceAccountId}/notifications';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($source_account_id !== null) {
            $resourcePath = str_replace(
                '{' . 'sourceAccountId' . '}',
                ObjectSerializer::toPathValue($source_account_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($set_notifications_request2)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($set_notifications_request2));
            } else {
                $httpBody = $set_notifications_request2;
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
     * Operation transferFundsV2
     *
     * Transfer Funds between source accounts
     *
     * @param  string $source_account_id The &#39;from&#39; source account id, which will be debited (required)
     * @param  \VeloPayments\Client\Model\TransferRequestV2 $transfer_request_v2 Body (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['transferFundsV2'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     * @deprecated
     */
    public function transferFundsV2($source_account_id, $transfer_request_v2, string $contentType = self::contentTypes['transferFundsV2'][0])
    {
        $this->transferFundsV2WithHttpInfo($source_account_id, $transfer_request_v2, $contentType);
    }

    /**
     * Operation transferFundsV2WithHttpInfo
     *
     * Transfer Funds between source accounts
     *
     * @param  string $source_account_id The &#39;from&#39; source account id, which will be debited (required)
     * @param  \VeloPayments\Client\Model\TransferRequestV2 $transfer_request_v2 Body (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['transferFundsV2'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function transferFundsV2WithHttpInfo($source_account_id, $transfer_request_v2, string $contentType = self::contentTypes['transferFundsV2'][0])
    {
        $request = $this->transferFundsV2Request($source_account_id, $transfer_request_v2, $contentType);

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
     * Operation transferFundsV2Async
     *
     * Transfer Funds between source accounts
     *
     * @param  string $source_account_id The &#39;from&#39; source account id, which will be debited (required)
     * @param  \VeloPayments\Client\Model\TransferRequestV2 $transfer_request_v2 Body (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['transferFundsV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function transferFundsV2Async($source_account_id, $transfer_request_v2, string $contentType = self::contentTypes['transferFundsV2'][0])
    {
        return $this->transferFundsV2AsyncWithHttpInfo($source_account_id, $transfer_request_v2, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation transferFundsV2AsyncWithHttpInfo
     *
     * Transfer Funds between source accounts
     *
     * @param  string $source_account_id The &#39;from&#39; source account id, which will be debited (required)
     * @param  \VeloPayments\Client\Model\TransferRequestV2 $transfer_request_v2 Body (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['transferFundsV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function transferFundsV2AsyncWithHttpInfo($source_account_id, $transfer_request_v2, string $contentType = self::contentTypes['transferFundsV2'][0])
    {
        $returnType = '';
        $request = $this->transferFundsV2Request($source_account_id, $transfer_request_v2, $contentType);

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
     * Create request for operation 'transferFundsV2'
     *
     * @param  string $source_account_id The &#39;from&#39; source account id, which will be debited (required)
     * @param  \VeloPayments\Client\Model\TransferRequestV2 $transfer_request_v2 Body (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['transferFundsV2'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function transferFundsV2Request($source_account_id, $transfer_request_v2, string $contentType = self::contentTypes['transferFundsV2'][0])
    {

        // verify the required parameter 'source_account_id' is set
        if ($source_account_id === null || (is_array($source_account_id) && count($source_account_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $source_account_id when calling transferFundsV2'
            );
        }

        // verify the required parameter 'transfer_request_v2' is set
        if ($transfer_request_v2 === null || (is_array($transfer_request_v2) && count($transfer_request_v2) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $transfer_request_v2 when calling transferFundsV2'
            );
        }


        $resourcePath = '/v2/sourceAccounts/{sourceAccountId}/transfers';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($source_account_id !== null) {
            $resourcePath = str_replace(
                '{' . 'sourceAccountId' . '}',
                ObjectSerializer::toPathValue($source_account_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($transfer_request_v2)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($transfer_request_v2));
            } else {
                $httpBody = $transfer_request_v2;
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
     * Operation transferFundsV3
     *
     * Transfer Funds between source accounts
     *
     * @param  string $source_account_id The &#39;from&#39; source account id, which will be debited (required)
     * @param  \VeloPayments\Client\Model\TransferRequestV3 $transfer_request_v3 Body (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['transferFundsV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function transferFundsV3($source_account_id, $transfer_request_v3, string $contentType = self::contentTypes['transferFundsV3'][0])
    {
        $this->transferFundsV3WithHttpInfo($source_account_id, $transfer_request_v3, $contentType);
    }

    /**
     * Operation transferFundsV3WithHttpInfo
     *
     * Transfer Funds between source accounts
     *
     * @param  string $source_account_id The &#39;from&#39; source account id, which will be debited (required)
     * @param  \VeloPayments\Client\Model\TransferRequestV3 $transfer_request_v3 Body (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['transferFundsV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function transferFundsV3WithHttpInfo($source_account_id, $transfer_request_v3, string $contentType = self::contentTypes['transferFundsV3'][0])
    {
        $request = $this->transferFundsV3Request($source_account_id, $transfer_request_v3, $contentType);

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
     * Operation transferFundsV3Async
     *
     * Transfer Funds between source accounts
     *
     * @param  string $source_account_id The &#39;from&#39; source account id, which will be debited (required)
     * @param  \VeloPayments\Client\Model\TransferRequestV3 $transfer_request_v3 Body (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['transferFundsV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function transferFundsV3Async($source_account_id, $transfer_request_v3, string $contentType = self::contentTypes['transferFundsV3'][0])
    {
        return $this->transferFundsV3AsyncWithHttpInfo($source_account_id, $transfer_request_v3, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation transferFundsV3AsyncWithHttpInfo
     *
     * Transfer Funds between source accounts
     *
     * @param  string $source_account_id The &#39;from&#39; source account id, which will be debited (required)
     * @param  \VeloPayments\Client\Model\TransferRequestV3 $transfer_request_v3 Body (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['transferFundsV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function transferFundsV3AsyncWithHttpInfo($source_account_id, $transfer_request_v3, string $contentType = self::contentTypes['transferFundsV3'][0])
    {
        $returnType = '';
        $request = $this->transferFundsV3Request($source_account_id, $transfer_request_v3, $contentType);

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
     * Create request for operation 'transferFundsV3'
     *
     * @param  string $source_account_id The &#39;from&#39; source account id, which will be debited (required)
     * @param  \VeloPayments\Client\Model\TransferRequestV3 $transfer_request_v3 Body (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['transferFundsV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function transferFundsV3Request($source_account_id, $transfer_request_v3, string $contentType = self::contentTypes['transferFundsV3'][0])
    {

        // verify the required parameter 'source_account_id' is set
        if ($source_account_id === null || (is_array($source_account_id) && count($source_account_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $source_account_id when calling transferFundsV3'
            );
        }

        // verify the required parameter 'transfer_request_v3' is set
        if ($transfer_request_v3 === null || (is_array($transfer_request_v3) && count($transfer_request_v3) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $transfer_request_v3 when calling transferFundsV3'
            );
        }


        $resourcePath = '/v3/sourceAccounts/{sourceAccountId}/transfers';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($source_account_id !== null) {
            $resourcePath = str_replace(
                '{' . 'sourceAccountId' . '}',
                ObjectSerializer::toPathValue($source_account_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($transfer_request_v3)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($transfer_request_v3));
            } else {
                $httpBody = $transfer_request_v3;
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
