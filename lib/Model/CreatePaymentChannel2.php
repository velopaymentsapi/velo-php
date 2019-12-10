<?php
/**
 * CreatePaymentChannel2
 *
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

namespace VeloPayments\Client\Model;

use \ArrayAccess;
use \VeloPayments\Client\ObjectSerializer;

/**
 * CreatePaymentChannel2 Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class CreatePaymentChannel2 implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CreatePaymentChannel_2';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'payment_channel_name' => 'string',
        'iban' => 'string',
        'account_number' => 'string',
        'routing_number' => 'string',
        'country_code' => 'string',
        'currency' => 'string',
        'account_name' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'payment_channel_name' => null,
        'iban' => null,
        'account_number' => null,
        'routing_number' => null,
        'country_code' => null,
        'currency' => null,
        'account_name' => null
    ];

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
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'payment_channel_name' => 'paymentChannelName',
        'iban' => 'iban',
        'account_number' => 'accountNumber',
        'routing_number' => 'routingNumber',
        'country_code' => 'countryCode',
        'currency' => 'currency',
        'account_name' => 'accountName'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'payment_channel_name' => 'setPaymentChannelName',
        'iban' => 'setIban',
        'account_number' => 'setAccountNumber',
        'routing_number' => 'setRoutingNumber',
        'country_code' => 'setCountryCode',
        'currency' => 'setCurrency',
        'account_name' => 'setAccountName'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'payment_channel_name' => 'getPaymentChannelName',
        'iban' => 'getIban',
        'account_number' => 'getAccountNumber',
        'routing_number' => 'getRoutingNumber',
        'country_code' => 'getCountryCode',
        'currency' => 'getCurrency',
        'account_name' => 'getAccountName'
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

    const COUNTRY_CODE_AF = 'AF';
    const COUNTRY_CODE_AX = 'AX';
    const COUNTRY_CODE_AL = 'AL';
    const COUNTRY_CODE_DZ = 'DZ';
    const COUNTRY_CODE__AS = 'AS';
    const COUNTRY_CODE_AD = 'AD';
    const COUNTRY_CODE_AO = 'AO';
    const COUNTRY_CODE_AI = 'AI';
    const COUNTRY_CODE_AQ = 'AQ';
    const COUNTRY_CODE_AG = 'AG';
    const COUNTRY_CODE_AR = 'AR';
    const COUNTRY_CODE_AM = 'AM';
    const COUNTRY_CODE_AW = 'AW';
    const COUNTRY_CODE_AU = 'AU';
    const COUNTRY_CODE_AT = 'AT';
    const COUNTRY_CODE_AZ = 'AZ';
    const COUNTRY_CODE_BS = 'BS';
    const COUNTRY_CODE_BH = 'BH';
    const COUNTRY_CODE_BD = 'BD';
    const COUNTRY_CODE_BB = 'BB';
    const COUNTRY_CODE_BY = 'BY';
    const COUNTRY_CODE_BE = 'BE';
    const COUNTRY_CODE_BZ = 'BZ';
    const COUNTRY_CODE_BJ = 'BJ';
    const COUNTRY_CODE_BM = 'BM';
    const COUNTRY_CODE_BT = 'BT';
    const COUNTRY_CODE_BO = 'BO';
    const COUNTRY_CODE_BQ = 'BQ';
    const COUNTRY_CODE_BA = 'BA';
    const COUNTRY_CODE_BW = 'BW';
    const COUNTRY_CODE_BV = 'BV';
    const COUNTRY_CODE_BR = 'BR';
    const COUNTRY_CODE_IO = 'IO';
    const COUNTRY_CODE_BN = 'BN';
    const COUNTRY_CODE_BG = 'BG';
    const COUNTRY_CODE_BF = 'BF';
    const COUNTRY_CODE_BI = 'BI';
    const COUNTRY_CODE_KH = 'KH';
    const COUNTRY_CODE_CM = 'CM';
    const COUNTRY_CODE_CA = 'CA';
    const COUNTRY_CODE_CV = 'CV';
    const COUNTRY_CODE_KY = 'KY';
    const COUNTRY_CODE_CF = 'CF';
    const COUNTRY_CODE_TD = 'TD';
    const COUNTRY_CODE_CL = 'CL';
    const COUNTRY_CODE_CN = 'CN';
    const COUNTRY_CODE_CX = 'CX';
    const COUNTRY_CODE_CC = 'CC';
    const COUNTRY_CODE_CO = 'CO';
    const COUNTRY_CODE_KM = 'KM';
    const COUNTRY_CODE_CG = 'CG';
    const COUNTRY_CODE_CD = 'CD';
    const COUNTRY_CODE_CK = 'CK';
    const COUNTRY_CODE_CR = 'CR';
    const COUNTRY_CODE_CI = 'CI';
    const COUNTRY_CODE_HR = 'HR';
    const COUNTRY_CODE_CU = 'CU';
    const COUNTRY_CODE_CW = 'CW';
    const COUNTRY_CODE_CY = 'CY';
    const COUNTRY_CODE_CZ = 'CZ';
    const COUNTRY_CODE_DK = 'DK';
    const COUNTRY_CODE_DJ = 'DJ';
    const COUNTRY_CODE_DM = 'DM';
    const COUNTRY_CODE__DO = 'DO';
    const COUNTRY_CODE_EC = 'EC';
    const COUNTRY_CODE_EG = 'EG';
    const COUNTRY_CODE_SV = 'SV';
    const COUNTRY_CODE_GQ = 'GQ';
    const COUNTRY_CODE_ER = 'ER';
    const COUNTRY_CODE_EE = 'EE';
    const COUNTRY_CODE_ET = 'ET';
    const COUNTRY_CODE_FK = 'FK';
    const COUNTRY_CODE_FO = 'FO';
    const COUNTRY_CODE_FJ = 'FJ';
    const COUNTRY_CODE_FI = 'FI';
    const COUNTRY_CODE_FR = 'FR';
    const COUNTRY_CODE_GF = 'GF';
    const COUNTRY_CODE_PF = 'PF';
    const COUNTRY_CODE_TF = 'TF';
    const COUNTRY_CODE_GA = 'GA';
    const COUNTRY_CODE_GM = 'GM';
    const COUNTRY_CODE_GE = 'GE';
    const COUNTRY_CODE_DE = 'DE';
    const COUNTRY_CODE_GH = 'GH';
    const COUNTRY_CODE_GI = 'GI';
    const COUNTRY_CODE_GR = 'GR';
    const COUNTRY_CODE_GL = 'GL';
    const COUNTRY_CODE_GD = 'GD';
    const COUNTRY_CODE_GP = 'GP';
    const COUNTRY_CODE_GU = 'GU';
    const COUNTRY_CODE_GT = 'GT';
    const COUNTRY_CODE_GG = 'GG';
    const COUNTRY_CODE_GN = 'GN';
    const COUNTRY_CODE_GW = 'GW';
    const COUNTRY_CODE_GY = 'GY';
    const COUNTRY_CODE_HT = 'HT';
    const COUNTRY_CODE_HM = 'HM';
    const COUNTRY_CODE_VA = 'VA';
    const COUNTRY_CODE_HN = 'HN';
    const COUNTRY_CODE_HK = 'HK';
    const COUNTRY_CODE_HU = 'HU';
    const COUNTRY_CODE_IS = 'IS';
    const COUNTRY_CODE_IN = 'IN';
    const COUNTRY_CODE_ID = 'ID';
    const COUNTRY_CODE_IR = 'IR';
    const COUNTRY_CODE_IQ = 'IQ';
    const COUNTRY_CODE_IE = 'IE';
    const COUNTRY_CODE_IM = 'IM';
    const COUNTRY_CODE_IL = 'IL';
    const COUNTRY_CODE_IT = 'IT';
    const COUNTRY_CODE_JM = 'JM';
    const COUNTRY_CODE_JP = 'JP';
    const COUNTRY_CODE_JE = 'JE';
    const COUNTRY_CODE_JO = 'JO';
    const COUNTRY_CODE_KZ = 'KZ';
    const COUNTRY_CODE_KE = 'KE';
    const COUNTRY_CODE_KI = 'KI';
    const COUNTRY_CODE_KP = 'KP';
    const COUNTRY_CODE_KR = 'KR';
    const COUNTRY_CODE_KW = 'KW';
    const COUNTRY_CODE_KG = 'KG';
    const COUNTRY_CODE_LA = 'LA';
    const COUNTRY_CODE_LV = 'LV';
    const COUNTRY_CODE_LB = 'LB';
    const COUNTRY_CODE_LS = 'LS';
    const COUNTRY_CODE_LR = 'LR';
    const COUNTRY_CODE_LY = 'LY';
    const COUNTRY_CODE_LI = 'LI';
    const COUNTRY_CODE_LT = 'LT';
    const COUNTRY_CODE_LU = 'LU';
    const COUNTRY_CODE_MO = 'MO';
    const COUNTRY_CODE_MK = 'MK';
    const COUNTRY_CODE_MG = 'MG';
    const COUNTRY_CODE_MW = 'MW';
    const COUNTRY_CODE_MY = 'MY';
    const COUNTRY_CODE_MV = 'MV';
    const COUNTRY_CODE_ML = 'ML';
    const COUNTRY_CODE_MT = 'MT';
    const COUNTRY_CODE_MH = 'MH';
    const COUNTRY_CODE_MQ = 'MQ';
    const COUNTRY_CODE_MR = 'MR';
    const COUNTRY_CODE_MU = 'MU';
    const COUNTRY_CODE_YT = 'YT';
    const COUNTRY_CODE_MX = 'MX';
    const COUNTRY_CODE_FM = 'FM';
    const COUNTRY_CODE_MD = 'MD';
    const COUNTRY_CODE_MC = 'MC';
    const COUNTRY_CODE_MN = 'MN';
    const COUNTRY_CODE_ME = 'ME';
    const COUNTRY_CODE_MS = 'MS';
    const COUNTRY_CODE_MA = 'MA';
    const COUNTRY_CODE_MZ = 'MZ';
    const COUNTRY_CODE_MM = 'MM';
    const COUNTRY_CODE_NA = 'NA';
    const COUNTRY_CODE_NR = 'NR';
    const COUNTRY_CODE_NP = 'NP';
    const COUNTRY_CODE_NL = 'NL';
    const COUNTRY_CODE_NC = 'NC';
    const COUNTRY_CODE_NZ = 'NZ';
    const COUNTRY_CODE_NI = 'NI';
    const COUNTRY_CODE_NE = 'NE';
    const COUNTRY_CODE_NG = 'NG';
    const COUNTRY_CODE_NU = 'NU';
    const COUNTRY_CODE_NF = 'NF';
    const COUNTRY_CODE_MP = 'MP';
    const COUNTRY_CODE_FALSE = 'false';
    const COUNTRY_CODE_OM = 'OM';
    const COUNTRY_CODE_PK = 'PK';
    const COUNTRY_CODE_PW = 'PW';
    const COUNTRY_CODE_PS = 'PS';
    const COUNTRY_CODE_PA = 'PA';
    const COUNTRY_CODE_PG = 'PG';
    const COUNTRY_CODE_PY = 'PY';
    const COUNTRY_CODE_PE = 'PE';
    const COUNTRY_CODE_PH = 'PH';
    const COUNTRY_CODE_PN = 'PN';
    const COUNTRY_CODE_PL = 'PL';
    const COUNTRY_CODE_PT = 'PT';
    const COUNTRY_CODE_PR = 'PR';
    const COUNTRY_CODE_QA = 'QA';
    const COUNTRY_CODE_RE = 'RE';
    const COUNTRY_CODE_RO = 'RO';
    const COUNTRY_CODE_RU = 'RU';
    const COUNTRY_CODE_RW = 'RW';
    const COUNTRY_CODE_BL = 'BL';
    const COUNTRY_CODE_SH = 'SH';
    const COUNTRY_CODE_KN = 'KN';
    const COUNTRY_CODE_LC = 'LC';
    const COUNTRY_CODE_MF = 'MF';
    const COUNTRY_CODE_PM = 'PM';
    const COUNTRY_CODE_VC = 'VC';
    const COUNTRY_CODE_WS = 'WS';
    const COUNTRY_CODE_SM = 'SM';
    const COUNTRY_CODE_ST = 'ST';
    const COUNTRY_CODE_SA = 'SA';
    const COUNTRY_CODE_SN = 'SN';
    const COUNTRY_CODE_RS = 'RS';
    const COUNTRY_CODE_SC = 'SC';
    const COUNTRY_CODE_SL = 'SL';
    const COUNTRY_CODE_SG = 'SG';
    const COUNTRY_CODE_SX = 'SX';
    const COUNTRY_CODE_SK = 'SK';
    const COUNTRY_CODE_SI = 'SI';
    const COUNTRY_CODE_SB = 'SB';
    const COUNTRY_CODE_SO = 'SO';
    const COUNTRY_CODE_ZA = 'ZA';
    const COUNTRY_CODE_GS = 'GS';
    const COUNTRY_CODE_SS = 'SS';
    const COUNTRY_CODE_ES = 'ES';
    const COUNTRY_CODE_LK = 'LK';
    const COUNTRY_CODE_SD = 'SD';
    const COUNTRY_CODE_SR = 'SR';
    const COUNTRY_CODE_SJ = 'SJ';
    const COUNTRY_CODE_SZ = 'SZ';
    const COUNTRY_CODE_SE = 'SE';
    const COUNTRY_CODE_CH = 'CH';
    const COUNTRY_CODE_SY = 'SY';
    const COUNTRY_CODE_TW = 'TW';
    const COUNTRY_CODE_TJ = 'TJ';
    const COUNTRY_CODE_TZ = 'TZ';
    const COUNTRY_CODE_TH = 'TH';
    const COUNTRY_CODE_TL = 'TL';
    const COUNTRY_CODE_TG = 'TG';
    const COUNTRY_CODE_TK = 'TK';
    const COUNTRY_CODE_TO = 'TO';
    const COUNTRY_CODE_TT = 'TT';
    const COUNTRY_CODE_TN = 'TN';
    const COUNTRY_CODE_TR = 'TR';
    const COUNTRY_CODE_TM = 'TM';
    const COUNTRY_CODE_TC = 'TC';
    const COUNTRY_CODE_TV = 'TV';
    const COUNTRY_CODE_UG = 'UG';
    const COUNTRY_CODE_UA = 'UA';
    const COUNTRY_CODE_AE = 'AE';
    const COUNTRY_CODE_GB = 'GB';
    const COUNTRY_CODE_US = 'US';
    const COUNTRY_CODE_UM = 'UM';
    const COUNTRY_CODE_UY = 'UY';
    const COUNTRY_CODE_UZ = 'UZ';
    const COUNTRY_CODE_VU = 'VU';
    const COUNTRY_CODE_VE = 'VE';
    const COUNTRY_CODE_VN = 'VN';
    const COUNTRY_CODE_VG = 'VG';
    const COUNTRY_CODE_VI = 'VI';
    const COUNTRY_CODE_WF = 'WF';
    const COUNTRY_CODE_EH = 'EH';
    const COUNTRY_CODE_YE = 'YE';
    const COUNTRY_CODE_ZM = 'ZM';
    const COUNTRY_CODE_ZW = 'ZW';
    const CURRENCY_USD = 'USD';
    const CURRENCY_GBP = 'GBP';
    const CURRENCY_EUR = 'EUR';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCountryCodeAllowableValues()
    {
        return [
            self::COUNTRY_CODE_AF,
            self::COUNTRY_CODE_AX,
            self::COUNTRY_CODE_AL,
            self::COUNTRY_CODE_DZ,
            self::COUNTRY_CODE__AS,
            self::COUNTRY_CODE_AD,
            self::COUNTRY_CODE_AO,
            self::COUNTRY_CODE_AI,
            self::COUNTRY_CODE_AQ,
            self::COUNTRY_CODE_AG,
            self::COUNTRY_CODE_AR,
            self::COUNTRY_CODE_AM,
            self::COUNTRY_CODE_AW,
            self::COUNTRY_CODE_AU,
            self::COUNTRY_CODE_AT,
            self::COUNTRY_CODE_AZ,
            self::COUNTRY_CODE_BS,
            self::COUNTRY_CODE_BH,
            self::COUNTRY_CODE_BD,
            self::COUNTRY_CODE_BB,
            self::COUNTRY_CODE_BY,
            self::COUNTRY_CODE_BE,
            self::COUNTRY_CODE_BZ,
            self::COUNTRY_CODE_BJ,
            self::COUNTRY_CODE_BM,
            self::COUNTRY_CODE_BT,
            self::COUNTRY_CODE_BO,
            self::COUNTRY_CODE_BQ,
            self::COUNTRY_CODE_BA,
            self::COUNTRY_CODE_BW,
            self::COUNTRY_CODE_BV,
            self::COUNTRY_CODE_BR,
            self::COUNTRY_CODE_IO,
            self::COUNTRY_CODE_BN,
            self::COUNTRY_CODE_BG,
            self::COUNTRY_CODE_BF,
            self::COUNTRY_CODE_BI,
            self::COUNTRY_CODE_KH,
            self::COUNTRY_CODE_CM,
            self::COUNTRY_CODE_CA,
            self::COUNTRY_CODE_CV,
            self::COUNTRY_CODE_KY,
            self::COUNTRY_CODE_CF,
            self::COUNTRY_CODE_TD,
            self::COUNTRY_CODE_CL,
            self::COUNTRY_CODE_CN,
            self::COUNTRY_CODE_CX,
            self::COUNTRY_CODE_CC,
            self::COUNTRY_CODE_CO,
            self::COUNTRY_CODE_KM,
            self::COUNTRY_CODE_CG,
            self::COUNTRY_CODE_CD,
            self::COUNTRY_CODE_CK,
            self::COUNTRY_CODE_CR,
            self::COUNTRY_CODE_CI,
            self::COUNTRY_CODE_HR,
            self::COUNTRY_CODE_CU,
            self::COUNTRY_CODE_CW,
            self::COUNTRY_CODE_CY,
            self::COUNTRY_CODE_CZ,
            self::COUNTRY_CODE_DK,
            self::COUNTRY_CODE_DJ,
            self::COUNTRY_CODE_DM,
            self::COUNTRY_CODE__DO,
            self::COUNTRY_CODE_EC,
            self::COUNTRY_CODE_EG,
            self::COUNTRY_CODE_SV,
            self::COUNTRY_CODE_GQ,
            self::COUNTRY_CODE_ER,
            self::COUNTRY_CODE_EE,
            self::COUNTRY_CODE_ET,
            self::COUNTRY_CODE_FK,
            self::COUNTRY_CODE_FO,
            self::COUNTRY_CODE_FJ,
            self::COUNTRY_CODE_FI,
            self::COUNTRY_CODE_FR,
            self::COUNTRY_CODE_GF,
            self::COUNTRY_CODE_PF,
            self::COUNTRY_CODE_TF,
            self::COUNTRY_CODE_GA,
            self::COUNTRY_CODE_GM,
            self::COUNTRY_CODE_GE,
            self::COUNTRY_CODE_DE,
            self::COUNTRY_CODE_GH,
            self::COUNTRY_CODE_GI,
            self::COUNTRY_CODE_GR,
            self::COUNTRY_CODE_GL,
            self::COUNTRY_CODE_GD,
            self::COUNTRY_CODE_GP,
            self::COUNTRY_CODE_GU,
            self::COUNTRY_CODE_GT,
            self::COUNTRY_CODE_GG,
            self::COUNTRY_CODE_GN,
            self::COUNTRY_CODE_GW,
            self::COUNTRY_CODE_GY,
            self::COUNTRY_CODE_HT,
            self::COUNTRY_CODE_HM,
            self::COUNTRY_CODE_VA,
            self::COUNTRY_CODE_HN,
            self::COUNTRY_CODE_HK,
            self::COUNTRY_CODE_HU,
            self::COUNTRY_CODE_IS,
            self::COUNTRY_CODE_IN,
            self::COUNTRY_CODE_ID,
            self::COUNTRY_CODE_IR,
            self::COUNTRY_CODE_IQ,
            self::COUNTRY_CODE_IE,
            self::COUNTRY_CODE_IM,
            self::COUNTRY_CODE_IL,
            self::COUNTRY_CODE_IT,
            self::COUNTRY_CODE_JM,
            self::COUNTRY_CODE_JP,
            self::COUNTRY_CODE_JE,
            self::COUNTRY_CODE_JO,
            self::COUNTRY_CODE_KZ,
            self::COUNTRY_CODE_KE,
            self::COUNTRY_CODE_KI,
            self::COUNTRY_CODE_KP,
            self::COUNTRY_CODE_KR,
            self::COUNTRY_CODE_KW,
            self::COUNTRY_CODE_KG,
            self::COUNTRY_CODE_LA,
            self::COUNTRY_CODE_LV,
            self::COUNTRY_CODE_LB,
            self::COUNTRY_CODE_LS,
            self::COUNTRY_CODE_LR,
            self::COUNTRY_CODE_LY,
            self::COUNTRY_CODE_LI,
            self::COUNTRY_CODE_LT,
            self::COUNTRY_CODE_LU,
            self::COUNTRY_CODE_MO,
            self::COUNTRY_CODE_MK,
            self::COUNTRY_CODE_MG,
            self::COUNTRY_CODE_MW,
            self::COUNTRY_CODE_MY,
            self::COUNTRY_CODE_MV,
            self::COUNTRY_CODE_ML,
            self::COUNTRY_CODE_MT,
            self::COUNTRY_CODE_MH,
            self::COUNTRY_CODE_MQ,
            self::COUNTRY_CODE_MR,
            self::COUNTRY_CODE_MU,
            self::COUNTRY_CODE_YT,
            self::COUNTRY_CODE_MX,
            self::COUNTRY_CODE_FM,
            self::COUNTRY_CODE_MD,
            self::COUNTRY_CODE_MC,
            self::COUNTRY_CODE_MN,
            self::COUNTRY_CODE_ME,
            self::COUNTRY_CODE_MS,
            self::COUNTRY_CODE_MA,
            self::COUNTRY_CODE_MZ,
            self::COUNTRY_CODE_MM,
            self::COUNTRY_CODE_NA,
            self::COUNTRY_CODE_NR,
            self::COUNTRY_CODE_NP,
            self::COUNTRY_CODE_NL,
            self::COUNTRY_CODE_NC,
            self::COUNTRY_CODE_NZ,
            self::COUNTRY_CODE_NI,
            self::COUNTRY_CODE_NE,
            self::COUNTRY_CODE_NG,
            self::COUNTRY_CODE_NU,
            self::COUNTRY_CODE_NF,
            self::COUNTRY_CODE_MP,
            self::COUNTRY_CODE_FALSE,
            self::COUNTRY_CODE_OM,
            self::COUNTRY_CODE_PK,
            self::COUNTRY_CODE_PW,
            self::COUNTRY_CODE_PS,
            self::COUNTRY_CODE_PA,
            self::COUNTRY_CODE_PG,
            self::COUNTRY_CODE_PY,
            self::COUNTRY_CODE_PE,
            self::COUNTRY_CODE_PH,
            self::COUNTRY_CODE_PN,
            self::COUNTRY_CODE_PL,
            self::COUNTRY_CODE_PT,
            self::COUNTRY_CODE_PR,
            self::COUNTRY_CODE_QA,
            self::COUNTRY_CODE_RE,
            self::COUNTRY_CODE_RO,
            self::COUNTRY_CODE_RU,
            self::COUNTRY_CODE_RW,
            self::COUNTRY_CODE_BL,
            self::COUNTRY_CODE_SH,
            self::COUNTRY_CODE_KN,
            self::COUNTRY_CODE_LC,
            self::COUNTRY_CODE_MF,
            self::COUNTRY_CODE_PM,
            self::COUNTRY_CODE_VC,
            self::COUNTRY_CODE_WS,
            self::COUNTRY_CODE_SM,
            self::COUNTRY_CODE_ST,
            self::COUNTRY_CODE_SA,
            self::COUNTRY_CODE_SN,
            self::COUNTRY_CODE_RS,
            self::COUNTRY_CODE_SC,
            self::COUNTRY_CODE_SL,
            self::COUNTRY_CODE_SG,
            self::COUNTRY_CODE_SX,
            self::COUNTRY_CODE_SK,
            self::COUNTRY_CODE_SI,
            self::COUNTRY_CODE_SB,
            self::COUNTRY_CODE_SO,
            self::COUNTRY_CODE_ZA,
            self::COUNTRY_CODE_GS,
            self::COUNTRY_CODE_SS,
            self::COUNTRY_CODE_ES,
            self::COUNTRY_CODE_LK,
            self::COUNTRY_CODE_SD,
            self::COUNTRY_CODE_SR,
            self::COUNTRY_CODE_SJ,
            self::COUNTRY_CODE_SZ,
            self::COUNTRY_CODE_SE,
            self::COUNTRY_CODE_CH,
            self::COUNTRY_CODE_SY,
            self::COUNTRY_CODE_TW,
            self::COUNTRY_CODE_TJ,
            self::COUNTRY_CODE_TZ,
            self::COUNTRY_CODE_TH,
            self::COUNTRY_CODE_TL,
            self::COUNTRY_CODE_TG,
            self::COUNTRY_CODE_TK,
            self::COUNTRY_CODE_TO,
            self::COUNTRY_CODE_TT,
            self::COUNTRY_CODE_TN,
            self::COUNTRY_CODE_TR,
            self::COUNTRY_CODE_TM,
            self::COUNTRY_CODE_TC,
            self::COUNTRY_CODE_TV,
            self::COUNTRY_CODE_UG,
            self::COUNTRY_CODE_UA,
            self::COUNTRY_CODE_AE,
            self::COUNTRY_CODE_GB,
            self::COUNTRY_CODE_US,
            self::COUNTRY_CODE_UM,
            self::COUNTRY_CODE_UY,
            self::COUNTRY_CODE_UZ,
            self::COUNTRY_CODE_VU,
            self::COUNTRY_CODE_VE,
            self::COUNTRY_CODE_VN,
            self::COUNTRY_CODE_VG,
            self::COUNTRY_CODE_VI,
            self::COUNTRY_CODE_WF,
            self::COUNTRY_CODE_EH,
            self::COUNTRY_CODE_YE,
            self::COUNTRY_CODE_ZM,
            self::COUNTRY_CODE_ZW,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCurrencyAllowableValues()
    {
        return [
            self::CURRENCY_USD,
            self::CURRENCY_GBP,
            self::CURRENCY_EUR,
        ];
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
        $this->container['payment_channel_name'] = isset($data['payment_channel_name']) ? $data['payment_channel_name'] : null;
        $this->container['iban'] = isset($data['iban']) ? $data['iban'] : null;
        $this->container['account_number'] = isset($data['account_number']) ? $data['account_number'] : null;
        $this->container['routing_number'] = isset($data['routing_number']) ? $data['routing_number'] : null;
        $this->container['country_code'] = isset($data['country_code']) ? $data['country_code'] : null;
        $this->container['currency'] = isset($data['currency']) ? $data['currency'] : null;
        $this->container['account_name'] = isset($data['account_name']) ? $data['account_name'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['iban']) && (mb_strlen($this->container['iban']) > 34)) {
            $invalidProperties[] = "invalid value for 'iban', the character length must be smaller than or equal to 34.";
        }

        if (!is_null($this->container['iban']) && (mb_strlen($this->container['iban']) < 15)) {
            $invalidProperties[] = "invalid value for 'iban', the character length must be bigger than or equal to 15.";
        }

        if (!is_null($this->container['iban']) && !preg_match("/^[A-Za-z0-9]+$/", $this->container['iban'])) {
            $invalidProperties[] = "invalid value for 'iban', must be conform to the pattern /^[A-Za-z0-9]+$/.";
        }

        if (!is_null($this->container['account_number']) && (mb_strlen($this->container['account_number']) > 17)) {
            $invalidProperties[] = "invalid value for 'account_number', the character length must be smaller than or equal to 17.";
        }

        if (!is_null($this->container['account_number']) && (mb_strlen($this->container['account_number']) < 6)) {
            $invalidProperties[] = "invalid value for 'account_number', the character length must be bigger than or equal to 6.";
        }

        if (!is_null($this->container['routing_number']) && (mb_strlen($this->container['routing_number']) > 9)) {
            $invalidProperties[] = "invalid value for 'routing_number', the character length must be smaller than or equal to 9.";
        }

        if (!is_null($this->container['routing_number']) && (mb_strlen($this->container['routing_number']) < 9)) {
            $invalidProperties[] = "invalid value for 'routing_number', the character length must be bigger than or equal to 9.";
        }

        if ($this->container['country_code'] === null) {
            $invalidProperties[] = "'country_code' can't be null";
        }
        $allowedValues = $this->getCountryCodeAllowableValues();
        if (!is_null($this->container['country_code']) && !in_array($this->container['country_code'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'country_code', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if ((mb_strlen($this->container['country_code']) > 2)) {
            $invalidProperties[] = "invalid value for 'country_code', the character length must be smaller than or equal to 2.";
        }

        if ((mb_strlen($this->container['country_code']) < 2)) {
            $invalidProperties[] = "invalid value for 'country_code', the character length must be bigger than or equal to 2.";
        }

        if ($this->container['currency'] === null) {
            $invalidProperties[] = "'currency' can't be null";
        }
        $allowedValues = $this->getCurrencyAllowableValues();
        if (!is_null($this->container['currency']) && !in_array($this->container['currency'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'currency', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['account_name'] === null) {
            $invalidProperties[] = "'account_name' can't be null";
        }
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
     * Gets payment_channel_name
     *
     * @return string|null
     */
    public function getPaymentChannelName()
    {
        return $this->container['payment_channel_name'];
    }

    /**
     * Sets payment_channel_name
     *
     * @param string|null $payment_channel_name payment_channel_name
     *
     * @return $this
     */
    public function setPaymentChannelName($payment_channel_name)
    {
        $this->container['payment_channel_name'] = $payment_channel_name;

        return $this;
    }

    /**
     * Gets iban
     *
     * @return string|null
     */
    public function getIban()
    {
        return $this->container['iban'];
    }

    /**
     * Sets iban
     *
     * @param string|null $iban Must match the regular expression ```^[A-Za-z0-9]+$```. Either routing number and account number or only iban must be set
     *
     * @return $this
     */
    public function setIban($iban)
    {
        if (!is_null($iban) && (mb_strlen($iban) > 34)) {
            throw new \InvalidArgumentException('invalid length for $iban when calling CreatePaymentChannel2., must be smaller than or equal to 34.');
        }
        if (!is_null($iban) && (mb_strlen($iban) < 15)) {
            throw new \InvalidArgumentException('invalid length for $iban when calling CreatePaymentChannel2., must be bigger than or equal to 15.');
        }
        if (!is_null($iban) && (!preg_match("/^[A-Za-z0-9]+$/", $iban))) {
            throw new \InvalidArgumentException("invalid value for $iban when calling CreatePaymentChannel2., must conform to the pattern /^[A-Za-z0-9]+$/.");
        }

        $this->container['iban'] = $iban;

        return $this;
    }

    /**
     * Gets account_number
     *
     * @return string|null
     */
    public function getAccountNumber()
    {
        return $this->container['account_number'];
    }

    /**
     * Sets account_number
     *
     * @param string|null $account_number Either routing number and account number or only iban must be set
     *
     * @return $this
     */
    public function setAccountNumber($account_number)
    {
        if (!is_null($account_number) && (mb_strlen($account_number) > 17)) {
            throw new \InvalidArgumentException('invalid length for $account_number when calling CreatePaymentChannel2., must be smaller than or equal to 17.');
        }
        if (!is_null($account_number) && (mb_strlen($account_number) < 6)) {
            throw new \InvalidArgumentException('invalid length for $account_number when calling CreatePaymentChannel2., must be bigger than or equal to 6.');
        }

        $this->container['account_number'] = $account_number;

        return $this;
    }

    /**
     * Gets routing_number
     *
     * @return string|null
     */
    public function getRoutingNumber()
    {
        return $this->container['routing_number'];
    }

    /**
     * Sets routing_number
     *
     * @param string|null $routing_number Either routing number and account number or only iban must be set
     *
     * @return $this
     */
    public function setRoutingNumber($routing_number)
    {
        if (!is_null($routing_number) && (mb_strlen($routing_number) > 9)) {
            throw new \InvalidArgumentException('invalid length for $routing_number when calling CreatePaymentChannel2., must be smaller than or equal to 9.');
        }
        if (!is_null($routing_number) && (mb_strlen($routing_number) < 9)) {
            throw new \InvalidArgumentException('invalid length for $routing_number when calling CreatePaymentChannel2., must be bigger than or equal to 9.');
        }

        $this->container['routing_number'] = $routing_number;

        return $this;
    }

    /**
     * Gets country_code
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->container['country_code'];
    }

    /**
     * Sets country_code
     *
     * @param string $country_code Two character country code
     *
     * @return $this
     */
    public function setCountryCode($country_code)
    {
        $allowedValues = $this->getCountryCodeAllowableValues();
        if (!in_array($country_code, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'country_code', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        if ((mb_strlen($country_code) > 2)) {
            throw new \InvalidArgumentException('invalid length for $country_code when calling CreatePaymentChannel2., must be smaller than or equal to 2.');
        }
        if ((mb_strlen($country_code) < 2)) {
            throw new \InvalidArgumentException('invalid length for $country_code when calling CreatePaymentChannel2., must be bigger than or equal to 2.');
        }

        $this->container['country_code'] = $country_code;

        return $this;
    }

    /**
     * Gets currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param string $currency currency
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $allowedValues = $this->getCurrencyAllowableValues();
        if (!in_array($currency, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'currency', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets account_name
     *
     * @return string
     */
    public function getAccountName()
    {
        return $this->container['account_name'];
    }

    /**
     * Sets account_name
     *
     * @param string $account_name account_name
     *
     * @return $this
     */
    public function setAccountName($account_name)
    {
        $this->container['account_name'] = $account_name;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
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
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
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


