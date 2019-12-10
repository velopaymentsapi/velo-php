<?php
/**
 * PayorApplicationsApi
 * PHP version 5
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
 * The version of the OpenAPI document: 2.17.8
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 4.2.3-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace VeloPayments\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use VeloPayments\Client\ApiException;
use VeloPayments\Client\Configuration;
use VeloPayments\Client\HeaderSelector;
use VeloPayments\Client\ObjectSerializer;

/**
 * PayorApplicationsApi Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class PayorApplicationsApi
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

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $host_index (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $host_index = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $host_index;
    }

    /**
     * Set the host index
     *
     * @param  int Host index (required)
     */
    public function setHostIndex($host_index)
    {
        $this->hostIndex = $host_index;
    }

    /**
     * Get the host index
     *
     * @return Host index
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
     * Operation payorCreateApiKeyRequest
     *
     * Create API Key
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $application_id Application ID (required)
     * @param  \VeloPayments\Client\Model\PayorCreateApiKeyRequest $payor_create_api_key_request Details of application API key to create (required)
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\PayorCreateApiKeyResponse
     */
    public function payorCreateApiKeyRequest($payor_id, $application_id, $payor_create_api_key_request)
    {
        list($response) = $this->payorCreateApiKeyRequestWithHttpInfo($payor_id, $application_id, $payor_create_api_key_request);
        return $response;
    }

    /**
     * Operation payorCreateApiKeyRequestWithHttpInfo
     *
     * Create API Key
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $application_id Application ID (required)
     * @param  \VeloPayments\Client\Model\PayorCreateApiKeyRequest $payor_create_api_key_request Details of application API key to create (required)
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\PayorCreateApiKeyResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function payorCreateApiKeyRequestWithHttpInfo($payor_id, $application_id, $payor_create_api_key_request)
    {
        $request = $this->payorCreateApiKeyRequestRequest($payor_id, $application_id, $payor_create_api_key_request);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            switch($statusCode) {
                case 200:
                    if ('\VeloPayments\Client\Model\PayorCreateApiKeyResponse' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\PayorCreateApiKeyResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\VeloPayments\Client\Model\PayorCreateApiKeyResponse';
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
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
            }
            throw $e;
        }
    }

    /**
     * Operation payorCreateApiKeyRequestAsync
     *
     * Create API Key
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $application_id Application ID (required)
     * @param  \VeloPayments\Client\Model\PayorCreateApiKeyRequest $payor_create_api_key_request Details of application API key to create (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function payorCreateApiKeyRequestAsync($payor_id, $application_id, $payor_create_api_key_request)
    {
        return $this->payorCreateApiKeyRequestAsyncWithHttpInfo($payor_id, $application_id, $payor_create_api_key_request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation payorCreateApiKeyRequestAsyncWithHttpInfo
     *
     * Create API Key
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $application_id Application ID (required)
     * @param  \VeloPayments\Client\Model\PayorCreateApiKeyRequest $payor_create_api_key_request Details of application API key to create (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function payorCreateApiKeyRequestAsyncWithHttpInfo($payor_id, $application_id, $payor_create_api_key_request)
    {
        $returnType = '\VeloPayments\Client\Model\PayorCreateApiKeyResponse';
        $request = $this->payorCreateApiKeyRequestRequest($payor_id, $application_id, $payor_create_api_key_request);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
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
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'payorCreateApiKeyRequest'
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  string $application_id Application ID (required)
     * @param  \VeloPayments\Client\Model\PayorCreateApiKeyRequest $payor_create_api_key_request Details of application API key to create (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function payorCreateApiKeyRequestRequest($payor_id, $application_id, $payor_create_api_key_request)
    {
        // verify the required parameter 'payor_id' is set
        if ($payor_id === null || (is_array($payor_id) && count($payor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payor_id when calling payorCreateApiKeyRequest'
            );
        }
        // verify the required parameter 'application_id' is set
        if ($application_id === null || (is_array($application_id) && count($application_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $application_id when calling payorCreateApiKeyRequest'
            );
        }
        // verify the required parameter 'payor_create_api_key_request' is set
        if ($payor_create_api_key_request === null || (is_array($payor_create_api_key_request) && count($payor_create_api_key_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payor_create_api_key_request when calling payorCreateApiKeyRequest'
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

        // body params
        $_tempBody = null;
        if (isset($payor_create_api_key_request)) {
            $_tempBody = $payor_create_api_key_request;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            } else {
                $httpBody = $_tempBody;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation payorCreateApplicationRequest
     *
     * Create Application
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  \VeloPayments\Client\Model\PayorCreateApplicationRequest $payor_create_application_request Details of application to create (required)
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function payorCreateApplicationRequest($payor_id, $payor_create_application_request)
    {
        $this->payorCreateApplicationRequestWithHttpInfo($payor_id, $payor_create_application_request);
    }

    /**
     * Operation payorCreateApplicationRequestWithHttpInfo
     *
     * Create Application
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  \VeloPayments\Client\Model\PayorCreateApplicationRequest $payor_create_application_request Details of application to create (required)
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function payorCreateApplicationRequestWithHttpInfo($payor_id, $payor_create_application_request)
    {
        $request = $this->payorCreateApplicationRequestRequest($payor_id, $payor_create_application_request);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation payorCreateApplicationRequestAsync
     *
     * Create Application
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  \VeloPayments\Client\Model\PayorCreateApplicationRequest $payor_create_application_request Details of application to create (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function payorCreateApplicationRequestAsync($payor_id, $payor_create_application_request)
    {
        return $this->payorCreateApplicationRequestAsyncWithHttpInfo($payor_id, $payor_create_application_request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation payorCreateApplicationRequestAsyncWithHttpInfo
     *
     * Create Application
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  \VeloPayments\Client\Model\PayorCreateApplicationRequest $payor_create_application_request Details of application to create (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function payorCreateApplicationRequestAsyncWithHttpInfo($payor_id, $payor_create_application_request)
    {
        $returnType = '';
        $request = $this->payorCreateApplicationRequestRequest($payor_id, $payor_create_application_request);

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
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'payorCreateApplicationRequest'
     *
     * @param  string $payor_id The account owner Payor ID (required)
     * @param  \VeloPayments\Client\Model\PayorCreateApplicationRequest $payor_create_application_request Details of application to create (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function payorCreateApplicationRequestRequest($payor_id, $payor_create_application_request)
    {
        // verify the required parameter 'payor_id' is set
        if ($payor_id === null || (is_array($payor_id) && count($payor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payor_id when calling payorCreateApplicationRequest'
            );
        }
        // verify the required parameter 'payor_create_application_request' is set
        if ($payor_create_application_request === null || (is_array($payor_create_application_request) && count($payor_create_application_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payor_create_application_request when calling payorCreateApplicationRequest'
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

        // body params
        $_tempBody = null;
        if (isset($payor_create_application_request)) {
            $_tempBody = $payor_create_application_request;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            } else {
                $httpBody = $_tempBody;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
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
