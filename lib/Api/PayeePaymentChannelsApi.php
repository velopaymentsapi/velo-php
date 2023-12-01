<?php
/**
 * PayeePaymentChannelsApi
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
 * PayeePaymentChannelsApi Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class PayeePaymentChannelsApi
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
        'createPaymentChannelV4' => [
            'application/json',
        ],
        'deletePaymentChannelV4' => [
            'application/json',
        ],
        'enablePaymentChannelV4' => [
            'application/json',
        ],
        'getPaymentChannelV4' => [
            'application/json',
        ],
        'getPaymentChannelsV4' => [
            'application/json',
        ],
        'updatePaymentChannelOrderV4' => [
            'application/json',
        ],
        'updatePaymentChannelV4' => [
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
     * Operation createPaymentChannelV4
     *
     * Create Payment Channel
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\CreatePaymentChannelRequestV4 $create_payment_channel_request_v4 Post payment channel to update (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createPaymentChannelV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function createPaymentChannelV4($payee_id, $create_payment_channel_request_v4, string $contentType = self::contentTypes['createPaymentChannelV4'][0])
    {
        $this->createPaymentChannelV4WithHttpInfo($payee_id, $create_payment_channel_request_v4, $contentType);
    }

    /**
     * Operation createPaymentChannelV4WithHttpInfo
     *
     * Create Payment Channel
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\CreatePaymentChannelRequestV4 $create_payment_channel_request_v4 Post payment channel to update (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createPaymentChannelV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function createPaymentChannelV4WithHttpInfo($payee_id, $create_payment_channel_request_v4, string $contentType = self::contentTypes['createPaymentChannelV4'][0])
    {
        $request = $this->createPaymentChannelV4Request($payee_id, $create_payment_channel_request_v4, $contentType);

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
     * Operation createPaymentChannelV4Async
     *
     * Create Payment Channel
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\CreatePaymentChannelRequestV4 $create_payment_channel_request_v4 Post payment channel to update (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createPaymentChannelV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createPaymentChannelV4Async($payee_id, $create_payment_channel_request_v4, string $contentType = self::contentTypes['createPaymentChannelV4'][0])
    {
        return $this->createPaymentChannelV4AsyncWithHttpInfo($payee_id, $create_payment_channel_request_v4, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createPaymentChannelV4AsyncWithHttpInfo
     *
     * Create Payment Channel
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\CreatePaymentChannelRequestV4 $create_payment_channel_request_v4 Post payment channel to update (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createPaymentChannelV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createPaymentChannelV4AsyncWithHttpInfo($payee_id, $create_payment_channel_request_v4, string $contentType = self::contentTypes['createPaymentChannelV4'][0])
    {
        $returnType = '';
        $request = $this->createPaymentChannelV4Request($payee_id, $create_payment_channel_request_v4, $contentType);

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
     * Create request for operation 'createPaymentChannelV4'
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\CreatePaymentChannelRequestV4 $create_payment_channel_request_v4 Post payment channel to update (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createPaymentChannelV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createPaymentChannelV4Request($payee_id, $create_payment_channel_request_v4, string $contentType = self::contentTypes['createPaymentChannelV4'][0])
    {

        // verify the required parameter 'payee_id' is set
        if ($payee_id === null || (is_array($payee_id) && count($payee_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payee_id when calling createPaymentChannelV4'
            );
        }

        // verify the required parameter 'create_payment_channel_request_v4' is set
        if ($create_payment_channel_request_v4 === null || (is_array($create_payment_channel_request_v4) && count($create_payment_channel_request_v4) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $create_payment_channel_request_v4 when calling createPaymentChannelV4'
            );
        }


        $resourcePath = '/v4/payees/{payeeId}/paymentChannels/';
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
        if (isset($create_payment_channel_request_v4)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($create_payment_channel_request_v4));
            } else {
                $httpBody = $create_payment_channel_request_v4;
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
     * Operation deletePaymentChannelV4
     *
     * Delete Payment Channel
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $payment_channel_id The UUID of the payment channel. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deletePaymentChannelV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deletePaymentChannelV4($payee_id, $payment_channel_id, string $contentType = self::contentTypes['deletePaymentChannelV4'][0])
    {
        $this->deletePaymentChannelV4WithHttpInfo($payee_id, $payment_channel_id, $contentType);
    }

    /**
     * Operation deletePaymentChannelV4WithHttpInfo
     *
     * Delete Payment Channel
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $payment_channel_id The UUID of the payment channel. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deletePaymentChannelV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deletePaymentChannelV4WithHttpInfo($payee_id, $payment_channel_id, string $contentType = self::contentTypes['deletePaymentChannelV4'][0])
    {
        $request = $this->deletePaymentChannelV4Request($payee_id, $payment_channel_id, $contentType);

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
     * Operation deletePaymentChannelV4Async
     *
     * Delete Payment Channel
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $payment_channel_id The UUID of the payment channel. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deletePaymentChannelV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deletePaymentChannelV4Async($payee_id, $payment_channel_id, string $contentType = self::contentTypes['deletePaymentChannelV4'][0])
    {
        return $this->deletePaymentChannelV4AsyncWithHttpInfo($payee_id, $payment_channel_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deletePaymentChannelV4AsyncWithHttpInfo
     *
     * Delete Payment Channel
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $payment_channel_id The UUID of the payment channel. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deletePaymentChannelV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deletePaymentChannelV4AsyncWithHttpInfo($payee_id, $payment_channel_id, string $contentType = self::contentTypes['deletePaymentChannelV4'][0])
    {
        $returnType = '';
        $request = $this->deletePaymentChannelV4Request($payee_id, $payment_channel_id, $contentType);

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
     * Create request for operation 'deletePaymentChannelV4'
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $payment_channel_id The UUID of the payment channel. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deletePaymentChannelV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deletePaymentChannelV4Request($payee_id, $payment_channel_id, string $contentType = self::contentTypes['deletePaymentChannelV4'][0])
    {

        // verify the required parameter 'payee_id' is set
        if ($payee_id === null || (is_array($payee_id) && count($payee_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payee_id when calling deletePaymentChannelV4'
            );
        }

        // verify the required parameter 'payment_channel_id' is set
        if ($payment_channel_id === null || (is_array($payment_channel_id) && count($payment_channel_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payment_channel_id when calling deletePaymentChannelV4'
            );
        }


        $resourcePath = '/v4/payees/{payeeId}/paymentChannels/{paymentChannelId}';
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
        // path params
        if ($payment_channel_id !== null) {
            $resourcePath = str_replace(
                '{' . 'paymentChannelId' . '}',
                ObjectSerializer::toPathValue($payment_channel_id),
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
     * Operation enablePaymentChannelV4
     *
     * Enable Payment Channel
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $payment_channel_id The UUID of the payment channel. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['enablePaymentChannelV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function enablePaymentChannelV4($payee_id, $payment_channel_id, string $contentType = self::contentTypes['enablePaymentChannelV4'][0])
    {
        $this->enablePaymentChannelV4WithHttpInfo($payee_id, $payment_channel_id, $contentType);
    }

    /**
     * Operation enablePaymentChannelV4WithHttpInfo
     *
     * Enable Payment Channel
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $payment_channel_id The UUID of the payment channel. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['enablePaymentChannelV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function enablePaymentChannelV4WithHttpInfo($payee_id, $payment_channel_id, string $contentType = self::contentTypes['enablePaymentChannelV4'][0])
    {
        $request = $this->enablePaymentChannelV4Request($payee_id, $payment_channel_id, $contentType);

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
     * Operation enablePaymentChannelV4Async
     *
     * Enable Payment Channel
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $payment_channel_id The UUID of the payment channel. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['enablePaymentChannelV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function enablePaymentChannelV4Async($payee_id, $payment_channel_id, string $contentType = self::contentTypes['enablePaymentChannelV4'][0])
    {
        return $this->enablePaymentChannelV4AsyncWithHttpInfo($payee_id, $payment_channel_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation enablePaymentChannelV4AsyncWithHttpInfo
     *
     * Enable Payment Channel
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $payment_channel_id The UUID of the payment channel. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['enablePaymentChannelV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function enablePaymentChannelV4AsyncWithHttpInfo($payee_id, $payment_channel_id, string $contentType = self::contentTypes['enablePaymentChannelV4'][0])
    {
        $returnType = '';
        $request = $this->enablePaymentChannelV4Request($payee_id, $payment_channel_id, $contentType);

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
     * Create request for operation 'enablePaymentChannelV4'
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $payment_channel_id The UUID of the payment channel. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['enablePaymentChannelV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function enablePaymentChannelV4Request($payee_id, $payment_channel_id, string $contentType = self::contentTypes['enablePaymentChannelV4'][0])
    {

        // verify the required parameter 'payee_id' is set
        if ($payee_id === null || (is_array($payee_id) && count($payee_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payee_id when calling enablePaymentChannelV4'
            );
        }

        // verify the required parameter 'payment_channel_id' is set
        if ($payment_channel_id === null || (is_array($payment_channel_id) && count($payment_channel_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payment_channel_id when calling enablePaymentChannelV4'
            );
        }


        $resourcePath = '/v4/payees/{payeeId}/paymentChannels/{paymentChannelId}/enable';
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
        // path params
        if ($payment_channel_id !== null) {
            $resourcePath = str_replace(
                '{' . 'paymentChannelId' . '}',
                ObjectSerializer::toPathValue($payment_channel_id),
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
     * Operation getPaymentChannelV4
     *
     * Get Payment Channel Details
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $payment_channel_id The UUID of the payment channel. (required)
     * @param  bool $payable payable if true only return the payment channel if the payee is payable (optional)
     * @param  bool $sensitive &lt;p&gt;Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked.&lt;/p&gt; &lt;p&gt;If set to true, and you have permission, the PII values will be returned as their original unmasked values.&lt;/p&gt; (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentChannelV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\PaymentChannelResponseV4|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404
     */
    public function getPaymentChannelV4($payee_id, $payment_channel_id, $payable = null, $sensitive = null, string $contentType = self::contentTypes['getPaymentChannelV4'][0])
    {
        list($response) = $this->getPaymentChannelV4WithHttpInfo($payee_id, $payment_channel_id, $payable, $sensitive, $contentType);
        return $response;
    }

    /**
     * Operation getPaymentChannelV4WithHttpInfo
     *
     * Get Payment Channel Details
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $payment_channel_id The UUID of the payment channel. (required)
     * @param  bool $payable payable if true only return the payment channel if the payee is payable (optional)
     * @param  bool $sensitive &lt;p&gt;Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked.&lt;/p&gt; &lt;p&gt;If set to true, and you have permission, the PII values will be returned as their original unmasked values.&lt;/p&gt; (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentChannelV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\PaymentChannelResponseV4|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPaymentChannelV4WithHttpInfo($payee_id, $payment_channel_id, $payable = null, $sensitive = null, string $contentType = self::contentTypes['getPaymentChannelV4'][0])
    {
        $request = $this->getPaymentChannelV4Request($payee_id, $payment_channel_id, $payable, $sensitive, $contentType);

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
                    if ('\VeloPayments\Client\Model\PaymentChannelResponseV4' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\PaymentChannelResponseV4' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\PaymentChannelResponseV4', []),
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

            $returnType = '\VeloPayments\Client\Model\PaymentChannelResponseV4';
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
                        '\VeloPayments\Client\Model\PaymentChannelResponseV4',
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
     * Operation getPaymentChannelV4Async
     *
     * Get Payment Channel Details
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $payment_channel_id The UUID of the payment channel. (required)
     * @param  bool $payable payable if true only return the payment channel if the payee is payable (optional)
     * @param  bool $sensitive &lt;p&gt;Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked.&lt;/p&gt; &lt;p&gt;If set to true, and you have permission, the PII values will be returned as their original unmasked values.&lt;/p&gt; (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentChannelV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPaymentChannelV4Async($payee_id, $payment_channel_id, $payable = null, $sensitive = null, string $contentType = self::contentTypes['getPaymentChannelV4'][0])
    {
        return $this->getPaymentChannelV4AsyncWithHttpInfo($payee_id, $payment_channel_id, $payable, $sensitive, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPaymentChannelV4AsyncWithHttpInfo
     *
     * Get Payment Channel Details
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $payment_channel_id The UUID of the payment channel. (required)
     * @param  bool $payable payable if true only return the payment channel if the payee is payable (optional)
     * @param  bool $sensitive &lt;p&gt;Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked.&lt;/p&gt; &lt;p&gt;If set to true, and you have permission, the PII values will be returned as their original unmasked values.&lt;/p&gt; (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentChannelV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPaymentChannelV4AsyncWithHttpInfo($payee_id, $payment_channel_id, $payable = null, $sensitive = null, string $contentType = self::contentTypes['getPaymentChannelV4'][0])
    {
        $returnType = '\VeloPayments\Client\Model\PaymentChannelResponseV4';
        $request = $this->getPaymentChannelV4Request($payee_id, $payment_channel_id, $payable, $sensitive, $contentType);

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
     * Create request for operation 'getPaymentChannelV4'
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $payment_channel_id The UUID of the payment channel. (required)
     * @param  bool $payable payable if true only return the payment channel if the payee is payable (optional)
     * @param  bool $sensitive &lt;p&gt;Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked.&lt;/p&gt; &lt;p&gt;If set to true, and you have permission, the PII values will be returned as their original unmasked values.&lt;/p&gt; (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentChannelV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getPaymentChannelV4Request($payee_id, $payment_channel_id, $payable = null, $sensitive = null, string $contentType = self::contentTypes['getPaymentChannelV4'][0])
    {

        // verify the required parameter 'payee_id' is set
        if ($payee_id === null || (is_array($payee_id) && count($payee_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payee_id when calling getPaymentChannelV4'
            );
        }

        // verify the required parameter 'payment_channel_id' is set
        if ($payment_channel_id === null || (is_array($payment_channel_id) && count($payment_channel_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payment_channel_id when calling getPaymentChannelV4'
            );
        }




        $resourcePath = '/v4/payees/{payeeId}/paymentChannels/{paymentChannelId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $payable,
            'payable', // param base name
            'boolean', // openApiType
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
        if ($payee_id !== null) {
            $resourcePath = str_replace(
                '{' . 'payeeId' . '}',
                ObjectSerializer::toPathValue($payee_id),
                $resourcePath
            );
        }
        // path params
        if ($payment_channel_id !== null) {
            $resourcePath = str_replace(
                '{' . 'paymentChannelId' . '}',
                ObjectSerializer::toPathValue($payment_channel_id),
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
     * Operation getPaymentChannelsV4
     *
     * Get All Payment Channels Details
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $payor_id &lt;p&gt;(UUID) the id of the Payor.&lt;/p&gt; &lt;p&gt;If specified the payment channels are filtered to those mapped to this payor.&lt;/p&gt; (optional)
     * @param  bool $payable payable if true only return the payment channel if the payee is payable (optional)
     * @param  bool $sensitive &lt;p&gt;Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked.&lt;/p&gt; &lt;p&gt;If set to true, and you have permission, the PII values will be returned as their original unmasked values.&lt;/p&gt; (optional)
     * @param  bool $ignore_payor_invite_status payable if true only return the payment channel if the payee is payable (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentChannelsV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\PaymentChannelsResponseV4|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404
     */
    public function getPaymentChannelsV4($payee_id, $payor_id = null, $payable = null, $sensitive = null, $ignore_payor_invite_status = null, string $contentType = self::contentTypes['getPaymentChannelsV4'][0])
    {
        list($response) = $this->getPaymentChannelsV4WithHttpInfo($payee_id, $payor_id, $payable, $sensitive, $ignore_payor_invite_status, $contentType);
        return $response;
    }

    /**
     * Operation getPaymentChannelsV4WithHttpInfo
     *
     * Get All Payment Channels Details
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $payor_id &lt;p&gt;(UUID) the id of the Payor.&lt;/p&gt; &lt;p&gt;If specified the payment channels are filtered to those mapped to this payor.&lt;/p&gt; (optional)
     * @param  bool $payable payable if true only return the payment channel if the payee is payable (optional)
     * @param  bool $sensitive &lt;p&gt;Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked.&lt;/p&gt; &lt;p&gt;If set to true, and you have permission, the PII values will be returned as their original unmasked values.&lt;/p&gt; (optional)
     * @param  bool $ignore_payor_invite_status payable if true only return the payment channel if the payee is payable (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentChannelsV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\PaymentChannelsResponseV4|\VeloPayments\Client\Model\InlineResponse400|\VeloPayments\Client\Model\InlineResponse401|\VeloPayments\Client\Model\InlineResponse403|\VeloPayments\Client\Model\InlineResponse404, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPaymentChannelsV4WithHttpInfo($payee_id, $payor_id = null, $payable = null, $sensitive = null, $ignore_payor_invite_status = null, string $contentType = self::contentTypes['getPaymentChannelsV4'][0])
    {
        $request = $this->getPaymentChannelsV4Request($payee_id, $payor_id, $payable, $sensitive, $ignore_payor_invite_status, $contentType);

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
                    if ('\VeloPayments\Client\Model\PaymentChannelsResponseV4' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\VeloPayments\Client\Model\PaymentChannelsResponseV4' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\PaymentChannelsResponseV4', []),
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

            $returnType = '\VeloPayments\Client\Model\PaymentChannelsResponseV4';
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
                        '\VeloPayments\Client\Model\PaymentChannelsResponseV4',
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
     * Operation getPaymentChannelsV4Async
     *
     * Get All Payment Channels Details
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $payor_id &lt;p&gt;(UUID) the id of the Payor.&lt;/p&gt; &lt;p&gt;If specified the payment channels are filtered to those mapped to this payor.&lt;/p&gt; (optional)
     * @param  bool $payable payable if true only return the payment channel if the payee is payable (optional)
     * @param  bool $sensitive &lt;p&gt;Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked.&lt;/p&gt; &lt;p&gt;If set to true, and you have permission, the PII values will be returned as their original unmasked values.&lt;/p&gt; (optional)
     * @param  bool $ignore_payor_invite_status payable if true only return the payment channel if the payee is payable (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentChannelsV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPaymentChannelsV4Async($payee_id, $payor_id = null, $payable = null, $sensitive = null, $ignore_payor_invite_status = null, string $contentType = self::contentTypes['getPaymentChannelsV4'][0])
    {
        return $this->getPaymentChannelsV4AsyncWithHttpInfo($payee_id, $payor_id, $payable, $sensitive, $ignore_payor_invite_status, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPaymentChannelsV4AsyncWithHttpInfo
     *
     * Get All Payment Channels Details
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $payor_id &lt;p&gt;(UUID) the id of the Payor.&lt;/p&gt; &lt;p&gt;If specified the payment channels are filtered to those mapped to this payor.&lt;/p&gt; (optional)
     * @param  bool $payable payable if true only return the payment channel if the payee is payable (optional)
     * @param  bool $sensitive &lt;p&gt;Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked.&lt;/p&gt; &lt;p&gt;If set to true, and you have permission, the PII values will be returned as their original unmasked values.&lt;/p&gt; (optional)
     * @param  bool $ignore_payor_invite_status payable if true only return the payment channel if the payee is payable (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentChannelsV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPaymentChannelsV4AsyncWithHttpInfo($payee_id, $payor_id = null, $payable = null, $sensitive = null, $ignore_payor_invite_status = null, string $contentType = self::contentTypes['getPaymentChannelsV4'][0])
    {
        $returnType = '\VeloPayments\Client\Model\PaymentChannelsResponseV4';
        $request = $this->getPaymentChannelsV4Request($payee_id, $payor_id, $payable, $sensitive, $ignore_payor_invite_status, $contentType);

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
     * Create request for operation 'getPaymentChannelsV4'
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $payor_id &lt;p&gt;(UUID) the id of the Payor.&lt;/p&gt; &lt;p&gt;If specified the payment channels are filtered to those mapped to this payor.&lt;/p&gt; (optional)
     * @param  bool $payable payable if true only return the payment channel if the payee is payable (optional)
     * @param  bool $sensitive &lt;p&gt;Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked.&lt;/p&gt; &lt;p&gt;If set to true, and you have permission, the PII values will be returned as their original unmasked values.&lt;/p&gt; (optional)
     * @param  bool $ignore_payor_invite_status payable if true only return the payment channel if the payee is payable (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentChannelsV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getPaymentChannelsV4Request($payee_id, $payor_id = null, $payable = null, $sensitive = null, $ignore_payor_invite_status = null, string $contentType = self::contentTypes['getPaymentChannelsV4'][0])
    {

        // verify the required parameter 'payee_id' is set
        if ($payee_id === null || (is_array($payee_id) && count($payee_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payee_id when calling getPaymentChannelsV4'
            );
        }






        $resourcePath = '/v4/payees/{payeeId}/paymentChannels/';
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
            $payable,
            'payable', // param base name
            'boolean', // openApiType
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
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $ignore_payor_invite_status,
            'ignorePayorInviteStatus', // param base name
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
     * Operation updatePaymentChannelOrderV4
     *
     * Update Payees preferred Payment Channel order
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\PaymentChannelOrderRequestV4 $payment_channel_order_request_v4 Put the payment channel ids in the preferred order (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updatePaymentChannelOrderV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function updatePaymentChannelOrderV4($payee_id, $payment_channel_order_request_v4, string $contentType = self::contentTypes['updatePaymentChannelOrderV4'][0])
    {
        $this->updatePaymentChannelOrderV4WithHttpInfo($payee_id, $payment_channel_order_request_v4, $contentType);
    }

    /**
     * Operation updatePaymentChannelOrderV4WithHttpInfo
     *
     * Update Payees preferred Payment Channel order
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\PaymentChannelOrderRequestV4 $payment_channel_order_request_v4 Put the payment channel ids in the preferred order (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updatePaymentChannelOrderV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function updatePaymentChannelOrderV4WithHttpInfo($payee_id, $payment_channel_order_request_v4, string $contentType = self::contentTypes['updatePaymentChannelOrderV4'][0])
    {
        $request = $this->updatePaymentChannelOrderV4Request($payee_id, $payment_channel_order_request_v4, $contentType);

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
     * Operation updatePaymentChannelOrderV4Async
     *
     * Update Payees preferred Payment Channel order
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\PaymentChannelOrderRequestV4 $payment_channel_order_request_v4 Put the payment channel ids in the preferred order (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updatePaymentChannelOrderV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updatePaymentChannelOrderV4Async($payee_id, $payment_channel_order_request_v4, string $contentType = self::contentTypes['updatePaymentChannelOrderV4'][0])
    {
        return $this->updatePaymentChannelOrderV4AsyncWithHttpInfo($payee_id, $payment_channel_order_request_v4, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updatePaymentChannelOrderV4AsyncWithHttpInfo
     *
     * Update Payees preferred Payment Channel order
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\PaymentChannelOrderRequestV4 $payment_channel_order_request_v4 Put the payment channel ids in the preferred order (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updatePaymentChannelOrderV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updatePaymentChannelOrderV4AsyncWithHttpInfo($payee_id, $payment_channel_order_request_v4, string $contentType = self::contentTypes['updatePaymentChannelOrderV4'][0])
    {
        $returnType = '';
        $request = $this->updatePaymentChannelOrderV4Request($payee_id, $payment_channel_order_request_v4, $contentType);

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
     * Create request for operation 'updatePaymentChannelOrderV4'
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  \VeloPayments\Client\Model\PaymentChannelOrderRequestV4 $payment_channel_order_request_v4 Put the payment channel ids in the preferred order (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updatePaymentChannelOrderV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function updatePaymentChannelOrderV4Request($payee_id, $payment_channel_order_request_v4, string $contentType = self::contentTypes['updatePaymentChannelOrderV4'][0])
    {

        // verify the required parameter 'payee_id' is set
        if ($payee_id === null || (is_array($payee_id) && count($payee_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payee_id when calling updatePaymentChannelOrderV4'
            );
        }

        // verify the required parameter 'payment_channel_order_request_v4' is set
        if ($payment_channel_order_request_v4 === null || (is_array($payment_channel_order_request_v4) && count($payment_channel_order_request_v4) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payment_channel_order_request_v4 when calling updatePaymentChannelOrderV4'
            );
        }


        $resourcePath = '/v4/payees/{payeeId}/paymentChannels/order';
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
        if (isset($payment_channel_order_request_v4)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($payment_channel_order_request_v4));
            } else {
                $httpBody = $payment_channel_order_request_v4;
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
            'PUT',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updatePaymentChannelV4
     *
     * Update Payment Channel
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $payment_channel_id The UUID of the payment channel. (required)
     * @param  \VeloPayments\Client\Model\UpdatePaymentChannelRequestV4 $update_payment_channel_request_v4 Post payment channel to update (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updatePaymentChannelV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function updatePaymentChannelV4($payee_id, $payment_channel_id, $update_payment_channel_request_v4, string $contentType = self::contentTypes['updatePaymentChannelV4'][0])
    {
        $this->updatePaymentChannelV4WithHttpInfo($payee_id, $payment_channel_id, $update_payment_channel_request_v4, $contentType);
    }

    /**
     * Operation updatePaymentChannelV4WithHttpInfo
     *
     * Update Payment Channel
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $payment_channel_id The UUID of the payment channel. (required)
     * @param  \VeloPayments\Client\Model\UpdatePaymentChannelRequestV4 $update_payment_channel_request_v4 Post payment channel to update (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updatePaymentChannelV4'] to see the possible values for this operation
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function updatePaymentChannelV4WithHttpInfo($payee_id, $payment_channel_id, $update_payment_channel_request_v4, string $contentType = self::contentTypes['updatePaymentChannelV4'][0])
    {
        $request = $this->updatePaymentChannelV4Request($payee_id, $payment_channel_id, $update_payment_channel_request_v4, $contentType);

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
     * Operation updatePaymentChannelV4Async
     *
     * Update Payment Channel
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $payment_channel_id The UUID of the payment channel. (required)
     * @param  \VeloPayments\Client\Model\UpdatePaymentChannelRequestV4 $update_payment_channel_request_v4 Post payment channel to update (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updatePaymentChannelV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updatePaymentChannelV4Async($payee_id, $payment_channel_id, $update_payment_channel_request_v4, string $contentType = self::contentTypes['updatePaymentChannelV4'][0])
    {
        return $this->updatePaymentChannelV4AsyncWithHttpInfo($payee_id, $payment_channel_id, $update_payment_channel_request_v4, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updatePaymentChannelV4AsyncWithHttpInfo
     *
     * Update Payment Channel
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $payment_channel_id The UUID of the payment channel. (required)
     * @param  \VeloPayments\Client\Model\UpdatePaymentChannelRequestV4 $update_payment_channel_request_v4 Post payment channel to update (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updatePaymentChannelV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updatePaymentChannelV4AsyncWithHttpInfo($payee_id, $payment_channel_id, $update_payment_channel_request_v4, string $contentType = self::contentTypes['updatePaymentChannelV4'][0])
    {
        $returnType = '';
        $request = $this->updatePaymentChannelV4Request($payee_id, $payment_channel_id, $update_payment_channel_request_v4, $contentType);

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
     * Create request for operation 'updatePaymentChannelV4'
     *
     * @param  string $payee_id The UUID of the payee. (required)
     * @param  string $payment_channel_id The UUID of the payment channel. (required)
     * @param  \VeloPayments\Client\Model\UpdatePaymentChannelRequestV4 $update_payment_channel_request_v4 Post payment channel to update (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updatePaymentChannelV4'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function updatePaymentChannelV4Request($payee_id, $payment_channel_id, $update_payment_channel_request_v4, string $contentType = self::contentTypes['updatePaymentChannelV4'][0])
    {

        // verify the required parameter 'payee_id' is set
        if ($payee_id === null || (is_array($payee_id) && count($payee_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payee_id when calling updatePaymentChannelV4'
            );
        }

        // verify the required parameter 'payment_channel_id' is set
        if ($payment_channel_id === null || (is_array($payment_channel_id) && count($payment_channel_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payment_channel_id when calling updatePaymentChannelV4'
            );
        }

        // verify the required parameter 'update_payment_channel_request_v4' is set
        if ($update_payment_channel_request_v4 === null || (is_array($update_payment_channel_request_v4) && count($update_payment_channel_request_v4) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $update_payment_channel_request_v4 when calling updatePaymentChannelV4'
            );
        }


        $resourcePath = '/v4/payees/{payeeId}/paymentChannels/{paymentChannelId}';
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
        // path params
        if ($payment_channel_id !== null) {
            $resourcePath = str_replace(
                '{' . 'paymentChannelId' . '}',
                ObjectSerializer::toPathValue($payment_channel_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($update_payment_channel_request_v4)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($update_payment_channel_request_v4));
            } else {
                $httpBody = $update_payment_channel_request_v4;
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
