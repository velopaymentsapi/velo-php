<?php
/**
 * PayoutHistoryApi
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
 * OpenAPI spec version: 2.11.67
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 4.0.0-SNAPSHOT
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
 * PayoutHistoryApi Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class PayoutHistoryApi
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
     * Operation getPaymentsForPayout
     *
     * Get Payments for Payout
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
     * @param  int $page_number Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size Page size. Default is 25. Max allowable is 100. (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status (optional)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\GetPaymentsForPayoutResponse
     */
    public function getPaymentsForPayout($payout_id, $remote_id = null, $status = null, $source_amount_from = null, $source_amount_to = null, $payment_amount_from = null, $payment_amount_to = null, $submitted_date_from = null, $submitted_date_to = null, $page_number = 1, $page_size = 25, $sort = null, $sensitive = null)
    {
        list($response) = $this->getPaymentsForPayoutWithHttpInfo($payout_id, $remote_id, $status, $source_amount_from, $source_amount_to, $payment_amount_from, $payment_amount_to, $submitted_date_from, $submitted_date_to, $page_number, $page_size, $sort, $sensitive);
        return $response;
    }

    /**
     * Operation getPaymentsForPayoutWithHttpInfo
     *
     * Get Payments for Payout
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
     * @param  int $page_number Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size Page size. Default is 25. Max allowable is 100. (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status (optional)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\GetPaymentsForPayoutResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPaymentsForPayoutWithHttpInfo($payout_id, $remote_id = null, $status = null, $source_amount_from = null, $source_amount_to = null, $payment_amount_from = null, $payment_amount_to = null, $submitted_date_from = null, $submitted_date_to = null, $page_number = 1, $page_size = 25, $sort = null, $sensitive = null)
    {
        $request = $this->getPaymentsForPayoutRequest($payout_id, $remote_id, $status, $source_amount_from, $source_amount_to, $payment_amount_from, $payment_amount_to, $submitted_date_from, $submitted_date_to, $page_number, $page_size, $sort, $sensitive);

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
                    if ('\VeloPayments\Client\Model\GetPaymentsForPayoutResponse' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\GetPaymentsForPayoutResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\VeloPayments\Client\Model\GetPaymentsForPayoutResponse';
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
                        '\VeloPayments\Client\Model\GetPaymentsForPayoutResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPaymentsForPayoutAsync
     *
     * Get Payments for Payout
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
     * @param  int $page_number Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size Page size. Default is 25. Max allowable is 100. (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status (optional)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPaymentsForPayoutAsync($payout_id, $remote_id = null, $status = null, $source_amount_from = null, $source_amount_to = null, $payment_amount_from = null, $payment_amount_to = null, $submitted_date_from = null, $submitted_date_to = null, $page_number = 1, $page_size = 25, $sort = null, $sensitive = null)
    {
        return $this->getPaymentsForPayoutAsyncWithHttpInfo($payout_id, $remote_id, $status, $source_amount_from, $source_amount_to, $payment_amount_from, $payment_amount_to, $submitted_date_from, $submitted_date_to, $page_number, $page_size, $sort, $sensitive)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPaymentsForPayoutAsyncWithHttpInfo
     *
     * Get Payments for Payout
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
     * @param  int $page_number Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size Page size. Default is 25. Max allowable is 100. (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status (optional)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPaymentsForPayoutAsyncWithHttpInfo($payout_id, $remote_id = null, $status = null, $source_amount_from = null, $source_amount_to = null, $payment_amount_from = null, $payment_amount_to = null, $submitted_date_from = null, $submitted_date_to = null, $page_number = 1, $page_size = 25, $sort = null, $sensitive = null)
    {
        $returnType = '\VeloPayments\Client\Model\GetPaymentsForPayoutResponse';
        $request = $this->getPaymentsForPayoutRequest($payout_id, $remote_id, $status, $source_amount_from, $source_amount_to, $payment_amount_from, $payment_amount_to, $submitted_date_from, $submitted_date_to, $page_number, $page_size, $sort, $sensitive);

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
     * Create request for operation 'getPaymentsForPayout'
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
     * @param  int $page_number Page number. Default is 1. (optional, default to 1)
     * @param  int $page_size Page size. Default is 25. Max allowable is 100. (optional, default to 25)
     * @param  string $sort List of sort fields (e.g. ?sort&#x3D;submittedDateTime:asc,status:asc). Default is sort by remoteId The supported sort fields are: sourceAmount, sourceCurrency, paymentAmount, paymentCurrency, routingNumber, accountNumber, remoteId, submittedDateTime and status (optional)
     * @param  bool $sensitive Optional. If omitted or set to false, any Personal Identifiable Information (PII) values are returned masked. If set to true, and you have permission, the PII values will be returned as their original unmasked values. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getPaymentsForPayoutRequest($payout_id, $remote_id = null, $status = null, $source_amount_from = null, $source_amount_to = null, $payment_amount_from = null, $payment_amount_to = null, $submitted_date_from = null, $submitted_date_to = null, $page_number = 1, $page_size = 25, $sort = null, $sensitive = null)
    {
        // verify the required parameter 'payout_id' is set
        if ($payout_id === null || (is_array($payout_id) && count($payout_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payout_id when calling getPaymentsForPayout'
            );
        }

        $resourcePath = '/v3/paymentaudit/payouts/{payoutId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($remote_id !== null) {
            $queryParams['remoteId'] = ObjectSerializer::toQueryValue($remote_id);
        }
        // query params
        if ($status !== null) {
            $queryParams['status'] = ObjectSerializer::toQueryValue($status);
        }
        // query params
        if ($source_amount_from !== null) {
            $queryParams['sourceAmountFrom'] = ObjectSerializer::toQueryValue($source_amount_from);
        }
        // query params
        if ($source_amount_to !== null) {
            $queryParams['sourceAmountTo'] = ObjectSerializer::toQueryValue($source_amount_to);
        }
        // query params
        if ($payment_amount_from !== null) {
            $queryParams['paymentAmountFrom'] = ObjectSerializer::toQueryValue($payment_amount_from);
        }
        // query params
        if ($payment_amount_to !== null) {
            $queryParams['paymentAmountTo'] = ObjectSerializer::toQueryValue($payment_amount_to);
        }
        // query params
        if ($submitted_date_from !== null) {
            $queryParams['submittedDateFrom'] = ObjectSerializer::toQueryValue($submitted_date_from);
        }
        // query params
        if ($submitted_date_to !== null) {
            $queryParams['submittedDateTo'] = ObjectSerializer::toQueryValue($submitted_date_to);
        }
        // query params
        if ($page_number !== null) {
            $queryParams['pageNumber'] = ObjectSerializer::toQueryValue($page_number);
        }
        // query params
        if ($page_size !== null) {
            $queryParams['pageSize'] = ObjectSerializer::toQueryValue($page_size);
        }
        // query params
        if ($sort !== null) {
            $queryParams['sort'] = ObjectSerializer::toQueryValue($sort);
        }
        // query params
        if ($sensitive !== null) {
            $queryParams['sensitive'] = ObjectSerializer::toQueryValue($sensitive);
        }

        // path params
        if ($payout_id !== null) {
            $resourcePath = str_replace(
                '{' . 'payoutId' . '}',
                ObjectSerializer::toPathValue($payout_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
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
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getPayoutStats
     *
     * Get Payout Statistics
     *
     * @param  string $payor_id The account owner Payor ID. Required for external users. (optional)
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \VeloPayments\Client\Model\GetPayoutStatistics
     */
    public function getPayoutStats($payor_id = null)
    {
        list($response) = $this->getPayoutStatsWithHttpInfo($payor_id);
        return $response;
    }

    /**
     * Operation getPayoutStatsWithHttpInfo
     *
     * Get Payout Statistics
     *
     * @param  string $payor_id The account owner Payor ID. Required for external users. (optional)
     *
     * @throws \VeloPayments\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \VeloPayments\Client\Model\GetPayoutStatistics, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPayoutStatsWithHttpInfo($payor_id = null)
    {
        $request = $this->getPayoutStatsRequest($payor_id);

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
                    if ('\VeloPayments\Client\Model\GetPayoutStatistics' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\VeloPayments\Client\Model\GetPayoutStatistics', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\VeloPayments\Client\Model\GetPayoutStatistics';
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
                        '\VeloPayments\Client\Model\GetPayoutStatistics',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPayoutStatsAsync
     *
     * Get Payout Statistics
     *
     * @param  string $payor_id The account owner Payor ID. Required for external users. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPayoutStatsAsync($payor_id = null)
    {
        return $this->getPayoutStatsAsyncWithHttpInfo($payor_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPayoutStatsAsyncWithHttpInfo
     *
     * Get Payout Statistics
     *
     * @param  string $payor_id The account owner Payor ID. Required for external users. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPayoutStatsAsyncWithHttpInfo($payor_id = null)
    {
        $returnType = '\VeloPayments\Client\Model\GetPayoutStatistics';
        $request = $this->getPayoutStatsRequest($payor_id);

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
     * Create request for operation 'getPayoutStats'
     *
     * @param  string $payor_id The account owner Payor ID. Required for external users. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getPayoutStatsRequest($payor_id = null)
    {

        $resourcePath = '/v1/paymentaudit/payoutStatistics';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($payor_id !== null) {
            $queryParams['payorId'] = ObjectSerializer::toQueryValue($payor_id);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
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
            'GET',
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
