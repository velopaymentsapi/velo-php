<?php
/**
 * PayeesApi
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
 * PayeesApi Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class PayeesApi
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
        'deletePayeeByIdV3' => [
            'application/json',
        ],
        'deletePayeeByIdV4' => [
            'application/json',
        ],
        'getPayeeByIdV3' => [
            'application/json',
        ],
        'getPayeeByIdV4' => [
            'application/json',
        ],
        'listPayeeChangesV3' => [
            'application/json',
        ],
        'listPayeeChangesV4' => [
            'application/json',
        ],
        'listPayeesV3' => [
            'application/json',
        ],
        'listPayeesV4' => [
            'application/json',
        ],
        'payeeDetailsUpdateV3' => [
            'application/json',
        ],
        'payeeDetailsUpdateV4' => [
            'application/json',
        ],
        'v3PayeesPayeeIdRemoteIdUpdatePost' => [
            'application/json',
        ],
        'v4PayeesPayeeIdRemoteIdUpdatePost' => [
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
     * Operation deletePayeeByIdV3
     *
     * Delete Payee by Id
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deletePayeeByIdV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     * @deprecated
     */
    public function deletePayeeByIdV3($payee_id, string $contentType = self::contentTypes['deletePayeeByIdV3'][0])
    {
        $this->deletePayeeByIdV3WithHttpInfo($payee_id, $contentType);
    }

    /**
     * Operation deletePayeeByIdV3WithHttpInfo
     *
     * Delete Payee by Id
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deletePayeeByIdV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function deletePayeeByIdV3WithHttpInfo($payee_id, string $contentType = self::contentTypes['deletePayeeByIdV3'][0])
    {
        $request = $this->deletePayeeByIdV3Request($payee_id, $contentType);

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
            }
            throw $e;
        }
    }

    /**
     * Operation deletePayeeByIdV3Async
     *
     * Delete Payee by Id
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deletePayeeByIdV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function deletePayeeByIdV3Async($payee_id, string $contentType = self::contentTypes['deletePayeeByIdV3'][0])
    {
        return $this->deletePayeeByIdV3AsyncWithHttpInfo($payee_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deletePayeeByIdV3AsyncWithHttpInfo
     *
     * Delete Payee by Id
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deletePayeeByIdV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function deletePayeeByIdV3AsyncWithHttpInfo($payee_id, string $contentType = self::contentTypes['deletePayeeByIdV3'][0])
    {
        $returnType = '';
        $request = $this->deletePayeeByIdV3Request($payee_id, $contentType);

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
     * Create request for operation 'deletePayeeByIdV3'
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deletePayeeByIdV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function deletePayeeByIdV3Request($payee_id, string $contentType = self::contentTypes['deletePayeeByIdV3'][0])
    {

        // verify the required parameter 'payee_id' is set
        if ($payee_id === null || (is_array($payee_id) && count($payee_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payee_id when calling deletePayeeByIdV3'
            );
        }


        $resourcePath = '/v3/payees/{payeeId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($payee_id !== null) {
            $resourcePath = str_replace(
                '{' . 'payeeId' . '}',
                ObjectSerializer::toPathValue($payee_id),
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
     * Operation deletePayeeByIdV4
     *
     * Delete Payee by Id
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deletePayeeByIdV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deletePayeeByIdV4($payee_id, string $contentType = self::contentTypes['deletePayeeByIdV4'][0])
    {
        $this->deletePayeeByIdV4WithHttpInfo($payee_id, $contentType);
    }

    /**
     * Operation deletePayeeByIdV4WithHttpInfo
     *
     * Delete Payee by Id
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deletePayeeByIdV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deletePayeeByIdV4WithHttpInfo($payee_id, string $contentType = self::contentTypes['deletePayeeByIdV4'][0])
    {
        $request = $this->deletePayeeByIdV4Request($payee_id, $contentType);

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
            }
            throw $e;
        }
    }

    /**
     * Operation deletePayeeByIdV4Async
     *
     * Delete Payee by Id
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deletePayeeByIdV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deletePayeeByIdV4Async($payee_id, string $contentType = self::contentTypes['deletePayeeByIdV4'][0])
    {
        return $this->deletePayeeByIdV4AsyncWithHttpInfo($payee_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deletePayeeByIdV4AsyncWithHttpInfo
     *
     * Delete Payee by Id
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deletePayeeByIdV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deletePayeeByIdV4AsyncWithHttpInfo($payee_id, string $contentType = self::contentTypes['deletePayeeByIdV4'][0])
    {
        $returnType = '';
        $request = $this->deletePayeeByIdV4Request($payee_id, $contentType);

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
     * Create request for operation 'deletePayeeByIdV4'
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deletePayeeByIdV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deletePayeeByIdV4Request($payee_id, string $contentType = self::contentTypes['deletePayeeByIdV4'][0])
    {

        // verify the required parameter 'payee_id' is set
        if ($payee_id === null || (is_array($payee_id) && count($payee_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payee_id when calling deletePayeeByIdV4'
            );
        }


        $resourcePath = '/v4/payees/{payeeId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($payee_id !== null) {
            $resourcePath = str_replace(
                '{' . 'payeeId' . '}',
                ObjectSerializer::toPathValue($payee_id),
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
     * Operation getPayeeByIdV3
     *
     * Get Payee by Id
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayeeByIdV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\PayeeDetailResponseV3|\VeloPayments\Client\Model\InlineResponse404
     * @deprecated
     */
    public function getPayeeByIdV3($payee_id, $sensitive = null, string $contentType = self::contentTypes['getPayeeByIdV3'][0])
    {
        list($response) = $this->getPayeeByIdV3WithHttpInfo($payee_id, $sensitive, $contentType);
        return $response;
    }

    /**
     * Operation getPayeeByIdV3WithHttpInfo
     *
     * Get Payee by Id
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayeeByIdV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\PayeeDetailResponseV3|\VeloPayments\Client\Model\InlineResponse404, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function getPayeeByIdV3WithHttpInfo($payee_id, $sensitive = null, string $contentType = self::contentTypes['getPayeeByIdV3'][0])
    {
        $request = $this->getPayeeByIdV3Request($payee_id, $sensitive, $contentType);

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
                    if ('\VeloPayments\Client\Model\PayeeDetailResponseV3' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\PayeeDetailResponseV3' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\PayeeDetailResponseV3', []),
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

            $returnType = '\VeloPayments\Client\Model\PayeeDetailResponseV3';
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
                        '\VeloPayments\Client\Model\PayeeDetailResponseV3',
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
     * Operation getPayeeByIdV3Async
     *
     * Get Payee by Id
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayeeByIdV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function getPayeeByIdV3Async($payee_id, $sensitive = null, string $contentType = self::contentTypes['getPayeeByIdV3'][0])
    {
        return $this->getPayeeByIdV3AsyncWithHttpInfo($payee_id, $sensitive, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPayeeByIdV3AsyncWithHttpInfo
     *
     * Get Payee by Id
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayeeByIdV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function getPayeeByIdV3AsyncWithHttpInfo($payee_id, $sensitive = null, string $contentType = self::contentTypes['getPayeeByIdV3'][0])
    {
        $returnType = '\VeloPayments\Client\Model\PayeeDetailResponseV3';
        $request = $this->getPayeeByIdV3Request($payee_id, $sensitive, $contentType);

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
     * Create request for operation 'getPayeeByIdV3'
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayeeByIdV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function getPayeeByIdV3Request($payee_id, $sensitive = null, string $contentType = self::contentTypes['getPayeeByIdV3'][0])
    {

        // verify the required parameter 'payee_id' is set
        if ($payee_id === null || (is_array($payee_id) && count($payee_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payee_id when calling getPayeeByIdV3'
            );
        }



        $resourcePath = '/v3/payees/{payeeId}';
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
        if ($payee_id !== null) {
            $resourcePath = str_replace(
                '{' . 'payeeId' . '}',
                ObjectSerializer::toPathValue($payee_id),
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
     * Operation getPayeeByIdV4
     *
     * Get Payee by Id
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayeeByIdV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\PayeeDetailResponseV4|\VeloPayments\Client\Model\InlineResponse404
     */
    public function getPayeeByIdV4($payee_id, $sensitive = null, string $contentType = self::contentTypes['getPayeeByIdV4'][0])
    {
        list($response) = $this->getPayeeByIdV4WithHttpInfo($payee_id, $sensitive, $contentType);
        return $response;
    }

    /**
     * Operation getPayeeByIdV4WithHttpInfo
     *
     * Get Payee by Id
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayeeByIdV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\PayeeDetailResponseV4|\VeloPayments\Client\Model\InlineResponse404, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPayeeByIdV4WithHttpInfo($payee_id, $sensitive = null, string $contentType = self::contentTypes['getPayeeByIdV4'][0])
    {
        $request = $this->getPayeeByIdV4Request($payee_id, $sensitive, $contentType);

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
                    if ('\VeloPayments\Client\Model\PayeeDetailResponseV4' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\PayeeDetailResponseV4' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\PayeeDetailResponseV4', []),
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

            $returnType = '\VeloPayments\Client\Model\PayeeDetailResponseV4';
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
                        '\VeloPayments\Client\Model\PayeeDetailResponseV4',
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
     * Operation getPayeeByIdV4Async
     *
     * Get Payee by Id
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayeeByIdV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPayeeByIdV4Async($payee_id, $sensitive = null, string $contentType = self::contentTypes['getPayeeByIdV4'][0])
    {
        return $this->getPayeeByIdV4AsyncWithHttpInfo($payee_id, $sensitive, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPayeeByIdV4AsyncWithHttpInfo
     *
     * Get Payee by Id
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayeeByIdV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPayeeByIdV4AsyncWithHttpInfo($payee_id, $sensitive = null, string $contentType = self::contentTypes['getPayeeByIdV4'][0])
    {
        $returnType = '\VeloPayments\Client\Model\PayeeDetailResponseV4';
        $request = $this->getPayeeByIdV4Request($payee_id, $sensitive, $contentType);

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
     * Create request for operation 'getPayeeByIdV4'
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPayeeByIdV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getPayeeByIdV4Request($payee_id, $sensitive = null, string $contentType = self::contentTypes['getPayeeByIdV4'][0])
    {

        // verify the required parameter 'payee_id' is set
        if ($payee_id === null || (is_array($payee_id) && count($payee_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payee_id when calling getPayeeByIdV4'
            );
        }



        $resourcePath = '/v4/payees/{payeeId}';
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
        if ($payee_id !== null) {
            $resourcePath = str_replace(
                '{' . 'payeeId' . '}',
                ObjectSerializer::toPathValue($payee_id),
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
     * Operation listPayeeChangesV3
     *
     * List Payee Changes
     *
     * @param  string $payor_id The Payor ID to find associated Payees (required)
     * @param  \DateTime $updated_since The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm (required)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size Page size. Default is 100. Max allowable is 1000. (optional, default to 100)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPayeeChangesV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\PayeeDeltaResponseV3|\VeloPayments\Client\Model\InlineResponse400
     * @deprecated
     */
    public function listPayeeChangesV3($payor_id, $updated_since, $page = 1, $page_size = 100, string $contentType = self::contentTypes['listPayeeChangesV3'][0])
    {
        list($response) = $this->listPayeeChangesV3WithHttpInfo($payor_id, $updated_since, $page, $page_size, $contentType);
        return $response;
    }

    /**
     * Operation listPayeeChangesV3WithHttpInfo
     *
     * List Payee Changes
     *
     * @param  string $payor_id The Payor ID to find associated Payees (required)
     * @param  \DateTime $updated_since The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm (required)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size Page size. Default is 100. Max allowable is 1000. (optional, default to 100)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPayeeChangesV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\PayeeDeltaResponseV3|\VeloPayments\Client\Model\InlineResponse400, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function listPayeeChangesV3WithHttpInfo($payor_id, $updated_since, $page = 1, $page_size = 100, string $contentType = self::contentTypes['listPayeeChangesV3'][0])
    {
        $request = $this->listPayeeChangesV3Request($payor_id, $updated_since, $page, $page_size, $contentType);

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
                    if ('\VeloPayments\Client\Model\PayeeDeltaResponseV3' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\PayeeDeltaResponseV3' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\PayeeDeltaResponseV3', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\VeloPayments\Client\Model\InlineResponse400' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse400' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse400', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\VeloPayments\Client\Model\PayeeDeltaResponseV3';
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
                        '\VeloPayments\Client\Model\PayeeDeltaResponseV3',
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
     * Operation listPayeeChangesV3Async
     *
     * List Payee Changes
     *
     * @param  string $payor_id The Payor ID to find associated Payees (required)
     * @param  \DateTime $updated_since The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm (required)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size Page size. Default is 100. Max allowable is 1000. (optional, default to 100)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPayeeChangesV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function listPayeeChangesV3Async($payor_id, $updated_since, $page = 1, $page_size = 100, string $contentType = self::contentTypes['listPayeeChangesV3'][0])
    {
        return $this->listPayeeChangesV3AsyncWithHttpInfo($payor_id, $updated_since, $page, $page_size, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listPayeeChangesV3AsyncWithHttpInfo
     *
     * List Payee Changes
     *
     * @param  string $payor_id The Payor ID to find associated Payees (required)
     * @param  \DateTime $updated_since The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm (required)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size Page size. Default is 100. Max allowable is 1000. (optional, default to 100)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPayeeChangesV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function listPayeeChangesV3AsyncWithHttpInfo($payor_id, $updated_since, $page = 1, $page_size = 100, string $contentType = self::contentTypes['listPayeeChangesV3'][0])
    {
        $returnType = '\VeloPayments\Client\Model\PayeeDeltaResponseV3';
        $request = $this->listPayeeChangesV3Request($payor_id, $updated_since, $page, $page_size, $contentType);

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
     * Create request for operation 'listPayeeChangesV3'
     *
     * @param  string $payor_id The Payor ID to find associated Payees (required)
     * @param  \DateTime $updated_since The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm (required)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size Page size. Default is 100. Max allowable is 1000. (optional, default to 100)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPayeeChangesV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function listPayeeChangesV3Request($payor_id, $updated_since, $page = 1, $page_size = 100, string $contentType = self::contentTypes['listPayeeChangesV3'][0])
    {

        // verify the required parameter 'payor_id' is set
        if ($payor_id === null || (is_array($payor_id) && count($payor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payor_id when calling listPayeeChangesV3'
            );
        }

        // verify the required parameter 'updated_since' is set
        if ($updated_since === null || (is_array($updated_since) && count($updated_since) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $updated_since when calling listPayeeChangesV3'
            );
        }




        $resourcePath = '/v3/payees/deltas';
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
     * Operation listPayeeChangesV4
     *
     * List Payee Changes
     *
     * @param  string $payor_id The Payor ID to find associated Payees (required)
     * @param  \DateTime $updated_since The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm (required)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size Page size. Default is 100. Max allowable is 1000. (optional, default to 100)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPayeeChangesV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\PayeeDeltaResponseV4|\VeloPayments\Client\Model\InlineResponse400
     */
    public function listPayeeChangesV4($payor_id, $updated_since, $page = 1, $page_size = 100, string $contentType = self::contentTypes['listPayeeChangesV4'][0])
    {
        list($response) = $this->listPayeeChangesV4WithHttpInfo($payor_id, $updated_since, $page, $page_size, $contentType);
        return $response;
    }

    /**
     * Operation listPayeeChangesV4WithHttpInfo
     *
     * List Payee Changes
     *
     * @param  string $payor_id The Payor ID to find associated Payees (required)
     * @param  \DateTime $updated_since The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm (required)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size Page size. Default is 100. Max allowable is 1000. (optional, default to 100)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPayeeChangesV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\PayeeDeltaResponseV4|\VeloPayments\Client\Model\InlineResponse400, HTTP status code, HTTP response headers (array of strings)
     */
    public function listPayeeChangesV4WithHttpInfo($payor_id, $updated_since, $page = 1, $page_size = 100, string $contentType = self::contentTypes['listPayeeChangesV4'][0])
    {
        $request = $this->listPayeeChangesV4Request($payor_id, $updated_since, $page, $page_size, $contentType);

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
                    if ('\VeloPayments\Client\Model\PayeeDeltaResponseV4' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\PayeeDeltaResponseV4' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\PayeeDeltaResponseV4', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\VeloPayments\Client\Model\InlineResponse400' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse400' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\InlineResponse400', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\VeloPayments\Client\Model\PayeeDeltaResponseV4';
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
                        '\VeloPayments\Client\Model\PayeeDeltaResponseV4',
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
     * Operation listPayeeChangesV4Async
     *
     * List Payee Changes
     *
     * @param  string $payor_id The Payor ID to find associated Payees (required)
     * @param  \DateTime $updated_since The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm (required)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size Page size. Default is 100. Max allowable is 1000. (optional, default to 100)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPayeeChangesV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listPayeeChangesV4Async($payor_id, $updated_since, $page = 1, $page_size = 100, string $contentType = self::contentTypes['listPayeeChangesV4'][0])
    {
        return $this->listPayeeChangesV4AsyncWithHttpInfo($payor_id, $updated_since, $page, $page_size, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listPayeeChangesV4AsyncWithHttpInfo
     *
     * List Payee Changes
     *
     * @param  string $payor_id The Payor ID to find associated Payees (required)
     * @param  \DateTime $updated_since The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm (required)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size Page size. Default is 100. Max allowable is 1000. (optional, default to 100)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPayeeChangesV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listPayeeChangesV4AsyncWithHttpInfo($payor_id, $updated_since, $page = 1, $page_size = 100, string $contentType = self::contentTypes['listPayeeChangesV4'][0])
    {
        $returnType = '\VeloPayments\Client\Model\PayeeDeltaResponseV4';
        $request = $this->listPayeeChangesV4Request($payor_id, $updated_since, $page, $page_size, $contentType);

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
     * Create request for operation 'listPayeeChangesV4'
     *
     * @param  string $payor_id The Payor ID to find associated Payees (required)
     * @param  \DateTime $updated_since The updatedSince filter in the format YYYY-MM-DDThh:mm:ss+hh:mm (required)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size Page size. Default is 100. Max allowable is 1000. (optional, default to 100)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPayeeChangesV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function listPayeeChangesV4Request($payor_id, $updated_since, $page = 1, $page_size = 100, string $contentType = self::contentTypes['listPayeeChangesV4'][0])
    {

        // verify the required parameter 'payor_id' is set
        if ($payor_id === null || (is_array($payor_id) && count($payor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payor_id when calling listPayeeChangesV4'
            );
        }

        // verify the required parameter 'updated_since' is set
        if ($updated_since === null || (is_array($updated_since) && count($updated_since) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $updated_since when calling listPayeeChangesV4'
            );
        }




        $resourcePath = '/v4/payees/deltas';
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
     * Operation listPayeesV3
     *
     * List Payees
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $watchlist_status The watchlistStatus of the payees. (optional)
     * @param  bool $disabled Payee disabled (optional)
     * @param  string $onboarded_status The onboarded status of the payees. (optional)
     * @param  string $email Email address (optional)
     * @param  string $display_name The display name of the payees. (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $payee_type The onboarded status of the payees. (optional)
     * @param  string $payee_country The country of the payee - 2 letter ISO 3166-1 country code (upper case) (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size Page size. Default is 25. Max allowable is 100. (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;onboardedStatus:asc,name:asc) Default is name:asc &#39;name&#39; is treated as company name for companies - last name + &#39;,&#39; + firstName for individuals The supported sort fields are - payeeId, displayName, payoutStatus, onboardedStatus. (optional, default to 'displayName:asc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPayeesV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\PagedPayeeResponseV3|\VeloPayments\Client\Model\InlineResponse404|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403
     * @deprecated
     */
    public function listPayeesV3($payor_id, $watchlist_status = null, $disabled = null, $onboarded_status = null, $email = null, $display_name = null, $remote_id = null, $payee_type = null, $payee_country = null, $page = 1, $page_size = 25, $sort = 'displayName:asc', string $contentType = self::contentTypes['listPayeesV3'][0])
    {
        list($response) = $this->listPayeesV3WithHttpInfo($payor_id, $watchlist_status, $disabled, $onboarded_status, $email, $display_name, $remote_id, $payee_type, $payee_country, $page, $page_size, $sort, $contentType);
        return $response;
    }

    /**
     * Operation listPayeesV3WithHttpInfo
     *
     * List Payees
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $watchlist_status The watchlistStatus of the payees. (optional)
     * @param  bool $disabled Payee disabled (optional)
     * @param  string $onboarded_status The onboarded status of the payees. (optional)
     * @param  string $email Email address (optional)
     * @param  string $display_name The display name of the payees. (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $payee_type The onboarded status of the payees. (optional)
     * @param  string $payee_country The country of the payee - 2 letter ISO 3166-1 country code (upper case) (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size Page size. Default is 25. Max allowable is 100. (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;onboardedStatus:asc,name:asc) Default is name:asc &#39;name&#39; is treated as company name for companies - last name + &#39;,&#39; + firstName for individuals The supported sort fields are - payeeId, displayName, payoutStatus, onboardedStatus. (optional, default to 'displayName:asc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPayeesV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\PagedPayeeResponseV3|\VeloPayments\Client\Model\InlineResponse404|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function listPayeesV3WithHttpInfo($payor_id, $watchlist_status = null, $disabled = null, $onboarded_status = null, $email = null, $display_name = null, $remote_id = null, $payee_type = null, $payee_country = null, $page = 1, $page_size = 25, $sort = 'displayName:asc', string $contentType = self::contentTypes['listPayeesV3'][0])
    {
        $request = $this->listPayeesV3Request($payor_id, $watchlist_status, $disabled, $onboarded_status, $email, $display_name, $remote_id, $payee_type, $payee_country, $page, $page_size, $sort, $contentType);

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
                    if ('\VeloPayments\Client\Model\PagedPayeeResponseV3' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\PagedPayeeResponseV3' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\PagedPayeeResponseV3', []),
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
                case 400:
                    if ('\VeloPayments\Client\Model\InlineResponse400' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse400' !== 'string') {
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
            }

            $returnType = '\VeloPayments\Client\Model\PagedPayeeResponseV3';
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
                        '\VeloPayments\Client\Model\PagedPayeeResponseV3',
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
     * Operation listPayeesV3Async
     *
     * List Payees
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $watchlist_status The watchlistStatus of the payees. (optional)
     * @param  bool $disabled Payee disabled (optional)
     * @param  string $onboarded_status The onboarded status of the payees. (optional)
     * @param  string $email Email address (optional)
     * @param  string $display_name The display name of the payees. (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $payee_type The onboarded status of the payees. (optional)
     * @param  string $payee_country The country of the payee - 2 letter ISO 3166-1 country code (upper case) (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size Page size. Default is 25. Max allowable is 100. (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;onboardedStatus:asc,name:asc) Default is name:asc &#39;name&#39; is treated as company name for companies - last name + &#39;,&#39; + firstName for individuals The supported sort fields are - payeeId, displayName, payoutStatus, onboardedStatus. (optional, default to 'displayName:asc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPayeesV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function listPayeesV3Async($payor_id, $watchlist_status = null, $disabled = null, $onboarded_status = null, $email = null, $display_name = null, $remote_id = null, $payee_type = null, $payee_country = null, $page = 1, $page_size = 25, $sort = 'displayName:asc', string $contentType = self::contentTypes['listPayeesV3'][0])
    {
        return $this->listPayeesV3AsyncWithHttpInfo($payor_id, $watchlist_status, $disabled, $onboarded_status, $email, $display_name, $remote_id, $payee_type, $payee_country, $page, $page_size, $sort, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listPayeesV3AsyncWithHttpInfo
     *
     * List Payees
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $watchlist_status The watchlistStatus of the payees. (optional)
     * @param  bool $disabled Payee disabled (optional)
     * @param  string $onboarded_status The onboarded status of the payees. (optional)
     * @param  string $email Email address (optional)
     * @param  string $display_name The display name of the payees. (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $payee_type The onboarded status of the payees. (optional)
     * @param  string $payee_country The country of the payee - 2 letter ISO 3166-1 country code (upper case) (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size Page size. Default is 25. Max allowable is 100. (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;onboardedStatus:asc,name:asc) Default is name:asc &#39;name&#39; is treated as company name for companies - last name + &#39;,&#39; + firstName for individuals The supported sort fields are - payeeId, displayName, payoutStatus, onboardedStatus. (optional, default to 'displayName:asc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPayeesV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function listPayeesV3AsyncWithHttpInfo($payor_id, $watchlist_status = null, $disabled = null, $onboarded_status = null, $email = null, $display_name = null, $remote_id = null, $payee_type = null, $payee_country = null, $page = 1, $page_size = 25, $sort = 'displayName:asc', string $contentType = self::contentTypes['listPayeesV3'][0])
    {
        $returnType = '\VeloPayments\Client\Model\PagedPayeeResponseV3';
        $request = $this->listPayeesV3Request($payor_id, $watchlist_status, $disabled, $onboarded_status, $email, $display_name, $remote_id, $payee_type, $payee_country, $page, $page_size, $sort, $contentType);

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
     * Create request for operation 'listPayeesV3'
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $watchlist_status The watchlistStatus of the payees. (optional)
     * @param  bool $disabled Payee disabled (optional)
     * @param  string $onboarded_status The onboarded status of the payees. (optional)
     * @param  string $email Email address (optional)
     * @param  string $display_name The display name of the payees. (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $payee_type The onboarded status of the payees. (optional)
     * @param  string $payee_country The country of the payee - 2 letter ISO 3166-1 country code (upper case) (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size Page size. Default is 25. Max allowable is 100. (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;onboardedStatus:asc,name:asc) Default is name:asc &#39;name&#39; is treated as company name for companies - last name + &#39;,&#39; + firstName for individuals The supported sort fields are - payeeId, displayName, payoutStatus, onboardedStatus. (optional, default to 'displayName:asc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPayeesV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function listPayeesV3Request($payor_id, $watchlist_status = null, $disabled = null, $onboarded_status = null, $email = null, $display_name = null, $remote_id = null, $payee_type = null, $payee_country = null, $page = 1, $page_size = 25, $sort = 'displayName:asc', string $contentType = self::contentTypes['listPayeesV3'][0])
    {

        // verify the required parameter 'payor_id' is set
        if ($payor_id === null || (is_array($payor_id) && count($payor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payor_id when calling listPayeesV3'
            );
        }











        if ($sort !== null && !preg_match("/[a-zA-Z]+[:desc|:asc]/", $sort)) {
            throw new \InvalidArgumentException("invalid value for \"sort\" when calling PayeesApi.listPayeesV3, must conform to the pattern /[a-zA-Z]+[:desc|:asc]/.");
        }
        

        $resourcePath = '/v3/payees';
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
            $watchlist_status,
            'watchlistStatus', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $disabled,
            'disabled', // param base name
            'boolean', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $onboarded_status,
            'onboardedStatus', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $email,
            'email', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $display_name,
            'displayName', // param base name
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
            $payee_type,
            'payeeType', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $payee_country,
            'payeeCountry', // param base name
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
     * Operation listPayeesV4
     *
     * List Payees
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $watchlist_status The watchlistStatus of the payees. (optional)
     * @param  bool $disabled Payee disabled (optional)
     * @param  string $onboarded_status The onboarded status of the payees. (optional)
     * @param  string $email Email address (optional)
     * @param  string $display_name The display name of the payees. (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $payee_type The onboarded status of the payees. (optional)
     * @param  string $payee_country The country of the payee - 2 letter ISO 3166-1 country code (upper case) (optional)
     * @param  string $ofac_status The ofacStatus of the payees. (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size Page size. Default is 25. Max allowable is 100. (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;onboardedStatus:asc,name:asc) Default is name:asc &#39;name&#39; is treated as company name for companies - last name + &#39;,&#39; + firstName for individuals The supported sort fields are - payeeId, displayName, payoutStatus, onboardedStatus. (optional, default to 'displayName:asc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPayeesV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\PagedPayeeResponseV4|\VeloPayments\Client\Model\InlineResponse404|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403
     */
    public function listPayeesV4($payor_id, $watchlist_status = null, $disabled = null, $onboarded_status = null, $email = null, $display_name = null, $remote_id = null, $payee_type = null, $payee_country = null, $ofac_status = null, $page = 1, $page_size = 25, $sort = 'displayName:asc', string $contentType = self::contentTypes['listPayeesV4'][0])
    {
        list($response) = $this->listPayeesV4WithHttpInfo($payor_id, $watchlist_status, $disabled, $onboarded_status, $email, $display_name, $remote_id, $payee_type, $payee_country, $ofac_status, $page, $page_size, $sort, $contentType);
        return $response;
    }

    /**
     * Operation listPayeesV4WithHttpInfo
     *
     * List Payees
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $watchlist_status The watchlistStatus of the payees. (optional)
     * @param  bool $disabled Payee disabled (optional)
     * @param  string $onboarded_status The onboarded status of the payees. (optional)
     * @param  string $email Email address (optional)
     * @param  string $display_name The display name of the payees. (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $payee_type The onboarded status of the payees. (optional)
     * @param  string $payee_country The country of the payee - 2 letter ISO 3166-1 country code (upper case) (optional)
     * @param  string $ofac_status The ofacStatus of the payees. (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size Page size. Default is 25. Max allowable is 100. (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;onboardedStatus:asc,name:asc) Default is name:asc &#39;name&#39; is treated as company name for companies - last name + &#39;,&#39; + firstName for individuals The supported sort fields are - payeeId, displayName, payoutStatus, onboardedStatus. (optional, default to 'displayName:asc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPayeesV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\PagedPayeeResponseV4|\VeloPayments\Client\Model\InlineResponse404|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403, HTTP status code, HTTP response headers (array of strings)
     */
    public function listPayeesV4WithHttpInfo($payor_id, $watchlist_status = null, $disabled = null, $onboarded_status = null, $email = null, $display_name = null, $remote_id = null, $payee_type = null, $payee_country = null, $ofac_status = null, $page = 1, $page_size = 25, $sort = 'displayName:asc', string $contentType = self::contentTypes['listPayeesV4'][0])
    {
        $request = $this->listPayeesV4Request($payor_id, $watchlist_status, $disabled, $onboarded_status, $email, $display_name, $remote_id, $payee_type, $payee_country, $ofac_status, $page, $page_size, $sort, $contentType);

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
                    if ('\VeloPayments\Client\Model\PagedPayeeResponseV4' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\PagedPayeeResponseV4' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\PagedPayeeResponseV4', []),
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
                case 400:
                    if ('\VeloPayments\Client\Model\InlineResponse400' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\InlineResponse400' !== 'string') {
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
            }

            $returnType = '\VeloPayments\Client\Model\PagedPayeeResponseV4';
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
                        '\VeloPayments\Client\Model\PagedPayeeResponseV4',
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
     * Operation listPayeesV4Async
     *
     * List Payees
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $watchlist_status The watchlistStatus of the payees. (optional)
     * @param  bool $disabled Payee disabled (optional)
     * @param  string $onboarded_status The onboarded status of the payees. (optional)
     * @param  string $email Email address (optional)
     * @param  string $display_name The display name of the payees. (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $payee_type The onboarded status of the payees. (optional)
     * @param  string $payee_country The country of the payee - 2 letter ISO 3166-1 country code (upper case) (optional)
     * @param  string $ofac_status The ofacStatus of the payees. (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size Page size. Default is 25. Max allowable is 100. (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;onboardedStatus:asc,name:asc) Default is name:asc &#39;name&#39; is treated as company name for companies - last name + &#39;,&#39; + firstName for individuals The supported sort fields are - payeeId, displayName, payoutStatus, onboardedStatus. (optional, default to 'displayName:asc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPayeesV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listPayeesV4Async($payor_id, $watchlist_status = null, $disabled = null, $onboarded_status = null, $email = null, $display_name = null, $remote_id = null, $payee_type = null, $payee_country = null, $ofac_status = null, $page = 1, $page_size = 25, $sort = 'displayName:asc', string $contentType = self::contentTypes['listPayeesV4'][0])
    {
        return $this->listPayeesV4AsyncWithHttpInfo($payor_id, $watchlist_status, $disabled, $onboarded_status, $email, $display_name, $remote_id, $payee_type, $payee_country, $ofac_status, $page, $page_size, $sort, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listPayeesV4AsyncWithHttpInfo
     *
     * List Payees
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $watchlist_status The watchlistStatus of the payees. (optional)
     * @param  bool $disabled Payee disabled (optional)
     * @param  string $onboarded_status The onboarded status of the payees. (optional)
     * @param  string $email Email address (optional)
     * @param  string $display_name The display name of the payees. (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $payee_type The onboarded status of the payees. (optional)
     * @param  string $payee_country The country of the payee - 2 letter ISO 3166-1 country code (upper case) (optional)
     * @param  string $ofac_status The ofacStatus of the payees. (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size Page size. Default is 25. Max allowable is 100. (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;onboardedStatus:asc,name:asc) Default is name:asc &#39;name&#39; is treated as company name for companies - last name + &#39;,&#39; + firstName for individuals The supported sort fields are - payeeId, displayName, payoutStatus, onboardedStatus. (optional, default to 'displayName:asc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPayeesV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listPayeesV4AsyncWithHttpInfo($payor_id, $watchlist_status = null, $disabled = null, $onboarded_status = null, $email = null, $display_name = null, $remote_id = null, $payee_type = null, $payee_country = null, $ofac_status = null, $page = 1, $page_size = 25, $sort = 'displayName:asc', string $contentType = self::contentTypes['listPayeesV4'][0])
    {
        $returnType = '\VeloPayments\Client\Model\PagedPayeeResponseV4';
        $request = $this->listPayeesV4Request($payor_id, $watchlist_status, $disabled, $onboarded_status, $email, $display_name, $remote_id, $payee_type, $payee_country, $ofac_status, $page, $page_size, $sort, $contentType);

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
     * Create request for operation 'listPayeesV4'
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $watchlist_status The watchlistStatus of the payees. (optional)
     * @param  bool $disabled Payee disabled (optional)
     * @param  string $onboarded_status The onboarded status of the payees. (optional)
     * @param  string $email Email address (optional)
     * @param  string $display_name The display name of the payees. (optional)
     * @param  string $remote_id The remote id of the payees. (optional)
     * @param  string $payee_type The onboarded status of the payees. (optional)
     * @param  string $payee_country The country of the payee - 2 letter ISO 3166-1 country code (upper case) (optional)
     * @param  string $ofac_status The ofacStatus of the payees. (optional)
     * @param  int $page Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size Page size. Default is 25. Max allowable is 100. (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;onboardedStatus:asc,name:asc) Default is name:asc &#39;name&#39; is treated as company name for companies - last name + &#39;,&#39; + firstName for individuals The supported sort fields are - payeeId, displayName, payoutStatus, onboardedStatus. (optional, default to 'displayName:asc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPayeesV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function listPayeesV4Request($payor_id, $watchlist_status = null, $disabled = null, $onboarded_status = null, $email = null, $display_name = null, $remote_id = null, $payee_type = null, $payee_country = null, $ofac_status = null, $page = 1, $page_size = 25, $sort = 'displayName:asc', string $contentType = self::contentTypes['listPayeesV4'][0])
    {

        // verify the required parameter 'payor_id' is set
        if ($payor_id === null || (is_array($payor_id) && count($payor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payor_id when calling listPayeesV4'
            );
        }












        if ($sort !== null && !preg_match("/[a-zA-Z]+[:desc|:asc]/", $sort)) {
            throw new \InvalidArgumentException("invalid value for \"sort\" when calling PayeesApi.listPayeesV4, must conform to the pattern /[a-zA-Z]+[:desc|:asc]/.");
        }
        

        $resourcePath = '/v4/payees';
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
            $watchlist_status,
            'watchlistStatus', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $disabled,
            'disabled', // param base name
            'boolean', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $onboarded_status,
            'onboardedStatus', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $email,
            'email', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $display_name,
            'displayName', // param base name
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
            $payee_type,
            'payeeType', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $payee_country,
            'payeeCountry', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $ofac_status,
            'ofacStatus', // param base name
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
     * Operation payeeDetailsUpdateV3
     *
     * Update Payee Details
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\UpdatePayeeDetailsRequestV3 $update_payee_details_request_v3 Request to update payee details (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payeeDetailsUpdateV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     * @deprecated
     */
    public function payeeDetailsUpdateV3($payee_id, $update_payee_details_request_v3, string $contentType = self::contentTypes['payeeDetailsUpdateV3'][0])
    {
        $this->payeeDetailsUpdateV3WithHttpInfo($payee_id, $update_payee_details_request_v3, $contentType);
    }

    /**
     * Operation payeeDetailsUpdateV3WithHttpInfo
     *
     * Update Payee Details
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\UpdatePayeeDetailsRequestV3 $update_payee_details_request_v3 Request to update payee details (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payeeDetailsUpdateV3'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function payeeDetailsUpdateV3WithHttpInfo($payee_id, $update_payee_details_request_v3, string $contentType = self::contentTypes['payeeDetailsUpdateV3'][0])
    {
        $request = $this->payeeDetailsUpdateV3Request($payee_id, $update_payee_details_request_v3, $contentType);

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
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse404',
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
     * Operation payeeDetailsUpdateV3Async
     *
     * Update Payee Details
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\UpdatePayeeDetailsRequestV3 $update_payee_details_request_v3 Request to update payee details (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payeeDetailsUpdateV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function payeeDetailsUpdateV3Async($payee_id, $update_payee_details_request_v3, string $contentType = self::contentTypes['payeeDetailsUpdateV3'][0])
    {
        return $this->payeeDetailsUpdateV3AsyncWithHttpInfo($payee_id, $update_payee_details_request_v3, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation payeeDetailsUpdateV3AsyncWithHttpInfo
     *
     * Update Payee Details
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\UpdatePayeeDetailsRequestV3 $update_payee_details_request_v3 Request to update payee details (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payeeDetailsUpdateV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function payeeDetailsUpdateV3AsyncWithHttpInfo($payee_id, $update_payee_details_request_v3, string $contentType = self::contentTypes['payeeDetailsUpdateV3'][0])
    {
        $returnType = '';
        $request = $this->payeeDetailsUpdateV3Request($payee_id, $update_payee_details_request_v3, $contentType);

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
     * Create request for operation 'payeeDetailsUpdateV3'
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\UpdatePayeeDetailsRequestV3 $update_payee_details_request_v3 Request to update payee details (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payeeDetailsUpdateV3'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function payeeDetailsUpdateV3Request($payee_id, $update_payee_details_request_v3, string $contentType = self::contentTypes['payeeDetailsUpdateV3'][0])
    {

        // verify the required parameter 'payee_id' is set
        if ($payee_id === null || (is_array($payee_id) && count($payee_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payee_id when calling payeeDetailsUpdateV3'
            );
        }

        // verify the required parameter 'update_payee_details_request_v3' is set
        if ($update_payee_details_request_v3 === null || (is_array($update_payee_details_request_v3) && count($update_payee_details_request_v3) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $update_payee_details_request_v3 when calling payeeDetailsUpdateV3'
            );
        }


        $resourcePath = '/v3/payees/{payeeId}/payeeDetailsUpdate';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($payee_id !== null) {
            $resourcePath = str_replace(
                '{' . 'payeeId' . '}',
                ObjectSerializer::toPathValue($payee_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($update_payee_details_request_v3)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($update_payee_details_request_v3));
            } else {
                $httpBody = $update_payee_details_request_v3;
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
     * Operation payeeDetailsUpdateV4
     *
     * Update Payee Details
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\UpdatePayeeDetailsRequestV4 $update_payee_details_request_v4 Request to update payee details (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payeeDetailsUpdateV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function payeeDetailsUpdateV4($payee_id, $update_payee_details_request_v4, string $contentType = self::contentTypes['payeeDetailsUpdateV4'][0])
    {
        $this->payeeDetailsUpdateV4WithHttpInfo($payee_id, $update_payee_details_request_v4, $contentType);
    }

    /**
     * Operation payeeDetailsUpdateV4WithHttpInfo
     *
     * Update Payee Details
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\UpdatePayeeDetailsRequestV4 $update_payee_details_request_v4 Request to update payee details (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payeeDetailsUpdateV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function payeeDetailsUpdateV4WithHttpInfo($payee_id, $update_payee_details_request_v4, string $contentType = self::contentTypes['payeeDetailsUpdateV4'][0])
    {
        $request = $this->payeeDetailsUpdateV4Request($payee_id, $update_payee_details_request_v4, $contentType);

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
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VeloPayments\Client\Model\InlineResponse404',
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
     * Operation payeeDetailsUpdateV4Async
     *
     * Update Payee Details
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\UpdatePayeeDetailsRequestV4 $update_payee_details_request_v4 Request to update payee details (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payeeDetailsUpdateV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function payeeDetailsUpdateV4Async($payee_id, $update_payee_details_request_v4, string $contentType = self::contentTypes['payeeDetailsUpdateV4'][0])
    {
        return $this->payeeDetailsUpdateV4AsyncWithHttpInfo($payee_id, $update_payee_details_request_v4, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation payeeDetailsUpdateV4AsyncWithHttpInfo
     *
     * Update Payee Details
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\UpdatePayeeDetailsRequestV4 $update_payee_details_request_v4 Request to update payee details (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payeeDetailsUpdateV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function payeeDetailsUpdateV4AsyncWithHttpInfo($payee_id, $update_payee_details_request_v4, string $contentType = self::contentTypes['payeeDetailsUpdateV4'][0])
    {
        $returnType = '';
        $request = $this->payeeDetailsUpdateV4Request($payee_id, $update_payee_details_request_v4, $contentType);

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
     * Create request for operation 'payeeDetailsUpdateV4'
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\UpdatePayeeDetailsRequestV4 $update_payee_details_request_v4 Request to update payee details (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['payeeDetailsUpdateV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function payeeDetailsUpdateV4Request($payee_id, $update_payee_details_request_v4, string $contentType = self::contentTypes['payeeDetailsUpdateV4'][0])
    {

        // verify the required parameter 'payee_id' is set
        if ($payee_id === null || (is_array($payee_id) && count($payee_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payee_id when calling payeeDetailsUpdateV4'
            );
        }

        // verify the required parameter 'update_payee_details_request_v4' is set
        if ($update_payee_details_request_v4 === null || (is_array($update_payee_details_request_v4) && count($update_payee_details_request_v4) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $update_payee_details_request_v4 when calling payeeDetailsUpdateV4'
            );
        }


        $resourcePath = '/v4/payees/{payeeId}/payeeDetailsUpdate';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($payee_id !== null) {
            $resourcePath = str_replace(
                '{' . 'payeeId' . '}',
                ObjectSerializer::toPathValue($payee_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($update_payee_details_request_v4)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($update_payee_details_request_v4));
            } else {
                $httpBody = $update_payee_details_request_v4;
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
     * Operation v3PayeesPayeeIdRemoteIdUpdatePost
     *
     * Update Payee Remote Id
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\UpdateRemoteIdRequestV3 $update_remote_id_request_v3 Request to update payee remote id v3 (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v3PayeesPayeeIdRemoteIdUpdatePost'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     * @deprecated
     */
    public function v3PayeesPayeeIdRemoteIdUpdatePost($payee_id, $update_remote_id_request_v3, string $contentType = self::contentTypes['v3PayeesPayeeIdRemoteIdUpdatePost'][0])
    {
        $this->v3PayeesPayeeIdRemoteIdUpdatePostWithHttpInfo($payee_id, $update_remote_id_request_v3, $contentType);
    }

    /**
     * Operation v3PayeesPayeeIdRemoteIdUpdatePostWithHttpInfo
     *
     * Update Payee Remote Id
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\UpdateRemoteIdRequestV3 $update_remote_id_request_v3 Request to update payee remote id v3 (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v3PayeesPayeeIdRemoteIdUpdatePost'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     * @deprecated
     */
    public function v3PayeesPayeeIdRemoteIdUpdatePostWithHttpInfo($payee_id, $update_remote_id_request_v3, string $contentType = self::contentTypes['v3PayeesPayeeIdRemoteIdUpdatePost'][0])
    {
        $request = $this->v3PayeesPayeeIdRemoteIdUpdatePostRequest($payee_id, $update_remote_id_request_v3, $contentType);

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
     * Operation v3PayeesPayeeIdRemoteIdUpdatePostAsync
     *
     * Update Payee Remote Id
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\UpdateRemoteIdRequestV3 $update_remote_id_request_v3 Request to update payee remote id v3 (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v3PayeesPayeeIdRemoteIdUpdatePost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function v3PayeesPayeeIdRemoteIdUpdatePostAsync($payee_id, $update_remote_id_request_v3, string $contentType = self::contentTypes['v3PayeesPayeeIdRemoteIdUpdatePost'][0])
    {
        return $this->v3PayeesPayeeIdRemoteIdUpdatePostAsyncWithHttpInfo($payee_id, $update_remote_id_request_v3, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v3PayeesPayeeIdRemoteIdUpdatePostAsyncWithHttpInfo
     *
     * Update Payee Remote Id
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\UpdateRemoteIdRequestV3 $update_remote_id_request_v3 Request to update payee remote id v3 (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v3PayeesPayeeIdRemoteIdUpdatePost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @deprecated
     */
    public function v3PayeesPayeeIdRemoteIdUpdatePostAsyncWithHttpInfo($payee_id, $update_remote_id_request_v3, string $contentType = self::contentTypes['v3PayeesPayeeIdRemoteIdUpdatePost'][0])
    {
        $returnType = '';
        $request = $this->v3PayeesPayeeIdRemoteIdUpdatePostRequest($payee_id, $update_remote_id_request_v3, $contentType);

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
     * Create request for operation 'v3PayeesPayeeIdRemoteIdUpdatePost'
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\UpdateRemoteIdRequestV3 $update_remote_id_request_v3 Request to update payee remote id v3 (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v3PayeesPayeeIdRemoteIdUpdatePost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     * @deprecated
     */
    public function v3PayeesPayeeIdRemoteIdUpdatePostRequest($payee_id, $update_remote_id_request_v3, string $contentType = self::contentTypes['v3PayeesPayeeIdRemoteIdUpdatePost'][0])
    {

        // verify the required parameter 'payee_id' is set
        if ($payee_id === null || (is_array($payee_id) && count($payee_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payee_id when calling v3PayeesPayeeIdRemoteIdUpdatePost'
            );
        }

        // verify the required parameter 'update_remote_id_request_v3' is set
        if ($update_remote_id_request_v3 === null || (is_array($update_remote_id_request_v3) && count($update_remote_id_request_v3) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $update_remote_id_request_v3 when calling v3PayeesPayeeIdRemoteIdUpdatePost'
            );
        }


        $resourcePath = '/v3/payees/{payeeId}/remoteIdUpdate';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($payee_id !== null) {
            $resourcePath = str_replace(
                '{' . 'payeeId' . '}',
                ObjectSerializer::toPathValue($payee_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($update_remote_id_request_v3)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($update_remote_id_request_v3));
            } else {
                $httpBody = $update_remote_id_request_v3;
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
     * Operation v4PayeesPayeeIdRemoteIdUpdatePost
     *
     * Update Payee Remote Id
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\UpdateRemoteIdRequestV4 $update_remote_id_request_v4 Request to update payee remote id v4 (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v4PayeesPayeeIdRemoteIdUpdatePost'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function v4PayeesPayeeIdRemoteIdUpdatePost($payee_id, $update_remote_id_request_v4, string $contentType = self::contentTypes['v4PayeesPayeeIdRemoteIdUpdatePost'][0])
    {
        $this->v4PayeesPayeeIdRemoteIdUpdatePostWithHttpInfo($payee_id, $update_remote_id_request_v4, $contentType);
    }

    /**
     * Operation v4PayeesPayeeIdRemoteIdUpdatePostWithHttpInfo
     *
     * Update Payee Remote Id
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\UpdateRemoteIdRequestV4 $update_remote_id_request_v4 Request to update payee remote id v4 (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v4PayeesPayeeIdRemoteIdUpdatePost'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function v4PayeesPayeeIdRemoteIdUpdatePostWithHttpInfo($payee_id, $update_remote_id_request_v4, string $contentType = self::contentTypes['v4PayeesPayeeIdRemoteIdUpdatePost'][0])
    {
        $request = $this->v4PayeesPayeeIdRemoteIdUpdatePostRequest($payee_id, $update_remote_id_request_v4, $contentType);

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
     * Operation v4PayeesPayeeIdRemoteIdUpdatePostAsync
     *
     * Update Payee Remote Id
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\UpdateRemoteIdRequestV4 $update_remote_id_request_v4 Request to update payee remote id v4 (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v4PayeesPayeeIdRemoteIdUpdatePost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v4PayeesPayeeIdRemoteIdUpdatePostAsync($payee_id, $update_remote_id_request_v4, string $contentType = self::contentTypes['v4PayeesPayeeIdRemoteIdUpdatePost'][0])
    {
        return $this->v4PayeesPayeeIdRemoteIdUpdatePostAsyncWithHttpInfo($payee_id, $update_remote_id_request_v4, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v4PayeesPayeeIdRemoteIdUpdatePostAsyncWithHttpInfo
     *
     * Update Payee Remote Id
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\UpdateRemoteIdRequestV4 $update_remote_id_request_v4 Request to update payee remote id v4 (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v4PayeesPayeeIdRemoteIdUpdatePost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v4PayeesPayeeIdRemoteIdUpdatePostAsyncWithHttpInfo($payee_id, $update_remote_id_request_v4, string $contentType = self::contentTypes['v4PayeesPayeeIdRemoteIdUpdatePost'][0])
    {
        $returnType = '';
        $request = $this->v4PayeesPayeeIdRemoteIdUpdatePostRequest($payee_id, $update_remote_id_request_v4, $contentType);

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
     * Create request for operation 'v4PayeesPayeeIdRemoteIdUpdatePost'
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\UpdateRemoteIdRequestV4 $update_remote_id_request_v4 Request to update payee remote id v4 (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v4PayeesPayeeIdRemoteIdUpdatePost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v4PayeesPayeeIdRemoteIdUpdatePostRequest($payee_id, $update_remote_id_request_v4, string $contentType = self::contentTypes['v4PayeesPayeeIdRemoteIdUpdatePost'][0])
    {

        // verify the required parameter 'payee_id' is set
        if ($payee_id === null || (is_array($payee_id) && count($payee_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payee_id when calling v4PayeesPayeeIdRemoteIdUpdatePost'
            );
        }

        // verify the required parameter 'update_remote_id_request_v4' is set
        if ($update_remote_id_request_v4 === null || (is_array($update_remote_id_request_v4) && count($update_remote_id_request_v4) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $update_remote_id_request_v4 when calling v4PayeesPayeeIdRemoteIdUpdatePost'
            );
        }


        $resourcePath = '/v4/payees/{payeeId}/remoteIdUpdate';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($payee_id !== null) {
            $resourcePath = str_replace(
                '{' . 'payeeId' . '}',
                ObjectSerializer::toPathValue($payee_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($update_remote_id_request_v4)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($update_remote_id_request_v4));
            } else {
                $httpBody = $update_remote_id_request_v4;
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
