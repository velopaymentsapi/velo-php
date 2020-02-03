<?php
/**
 * CreatePayeeAddress2
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
 * The version of the OpenAPI document: 2.19.116
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 4.2.1-SNAPSHOT
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
 * CreatePayeeAddress2 Class Doc Comment
 *
 * @category Class
 * @package  VeloPayments\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class CreatePayeeAddress2 implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CreatePayeeAddress_2';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'line1' => 'string',
        'line2' => 'string',
        'line3' => 'string',
        'line4' => 'string',
        'city' => 'string',
        'county_or_province' => 'string',
        'zip_or_postcode' => 'string',
        'country' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'line1' => null,
        'line2' => null,
        'line3' => null,
        'line4' => null,
        'city' => null,
        'county_or_province' => null,
        'zip_or_postcode' => null,
        'country' => null
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
        'line1' => 'line1',
        'line2' => 'line2',
        'line3' => 'line3',
        'line4' => 'line4',
        'city' => 'city',
        'county_or_province' => 'countyOrProvince',
        'zip_or_postcode' => 'zipOrPostcode',
        'country' => 'country'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'line1' => 'setLine1',
        'line2' => 'setLine2',
        'line3' => 'setLine3',
        'line4' => 'setLine4',
        'city' => 'setCity',
        'county_or_province' => 'setCountyOrProvince',
        'zip_or_postcode' => 'setZipOrPostcode',
        'country' => 'setCountry'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'line1' => 'getLine1',
        'line2' => 'getLine2',
        'line3' => 'getLine3',
        'line4' => 'getLine4',
        'city' => 'getCity',
        'county_or_province' => 'getCountyOrProvince',
        'zip_or_postcode' => 'getZipOrPostcode',
        'country' => 'getCountry'
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

    const COUNTRY_AF = 'AF';
    const COUNTRY_AX = 'AX';
    const COUNTRY_AL = 'AL';
    const COUNTRY_DZ = 'DZ';
    const COUNTRY__AS = 'AS';
    const COUNTRY_AD = 'AD';
    const COUNTRY_AO = 'AO';
    const COUNTRY_AI = 'AI';
    const COUNTRY_AQ = 'AQ';
    const COUNTRY_AG = 'AG';
    const COUNTRY_AR = 'AR';
    const COUNTRY_AM = 'AM';
    const COUNTRY_AW = 'AW';
    const COUNTRY_AU = 'AU';
    const COUNTRY_AT = 'AT';
    const COUNTRY_AZ = 'AZ';
    const COUNTRY_BS = 'BS';
    const COUNTRY_BH = 'BH';
    const COUNTRY_BD = 'BD';
    const COUNTRY_BB = 'BB';
    const COUNTRY_BY = 'BY';
    const COUNTRY_BE = 'BE';
    const COUNTRY_BZ = 'BZ';
    const COUNTRY_BJ = 'BJ';
    const COUNTRY_BM = 'BM';
    const COUNTRY_BT = 'BT';
    const COUNTRY_BO = 'BO';
    const COUNTRY_BQ = 'BQ';
    const COUNTRY_BA = 'BA';
    const COUNTRY_BW = 'BW';
    const COUNTRY_BV = 'BV';
    const COUNTRY_BR = 'BR';
    const COUNTRY_IO = 'IO';
    const COUNTRY_BN = 'BN';
    const COUNTRY_BG = 'BG';
    const COUNTRY_BF = 'BF';
    const COUNTRY_BI = 'BI';
    const COUNTRY_KH = 'KH';
    const COUNTRY_CM = 'CM';
    const COUNTRY_CA = 'CA';
    const COUNTRY_CV = 'CV';
    const COUNTRY_KY = 'KY';
    const COUNTRY_CF = 'CF';
    const COUNTRY_TD = 'TD';
    const COUNTRY_CL = 'CL';
    const COUNTRY_CN = 'CN';
    const COUNTRY_CX = 'CX';
    const COUNTRY_CC = 'CC';
    const COUNTRY_CO = 'CO';
    const COUNTRY_KM = 'KM';
    const COUNTRY_CG = 'CG';
    const COUNTRY_CD = 'CD';
    const COUNTRY_CK = 'CK';
    const COUNTRY_CR = 'CR';
    const COUNTRY_CI = 'CI';
    const COUNTRY_HR = 'HR';
    const COUNTRY_CU = 'CU';
    const COUNTRY_CW = 'CW';
    const COUNTRY_CY = 'CY';
    const COUNTRY_CZ = 'CZ';
    const COUNTRY_DK = 'DK';
    const COUNTRY_DJ = 'DJ';
    const COUNTRY_DM = 'DM';
    const COUNTRY__DO = 'DO';
    const COUNTRY_EC = 'EC';
    const COUNTRY_EG = 'EG';
    const COUNTRY_SV = 'SV';
    const COUNTRY_GQ = 'GQ';
    const COUNTRY_ER = 'ER';
    const COUNTRY_EE = 'EE';
    const COUNTRY_ET = 'ET';
    const COUNTRY_FK = 'FK';
    const COUNTRY_FO = 'FO';
    const COUNTRY_FJ = 'FJ';
    const COUNTRY_FI = 'FI';
    const COUNTRY_FR = 'FR';
    const COUNTRY_GF = 'GF';
    const COUNTRY_PF = 'PF';
    const COUNTRY_TF = 'TF';
    const COUNTRY_GA = 'GA';
    const COUNTRY_GM = 'GM';
    const COUNTRY_GE = 'GE';
    const COUNTRY_DE = 'DE';
    const COUNTRY_GH = 'GH';
    const COUNTRY_GI = 'GI';
    const COUNTRY_GR = 'GR';
    const COUNTRY_GL = 'GL';
    const COUNTRY_GD = 'GD';
    const COUNTRY_GP = 'GP';
    const COUNTRY_GU = 'GU';
    const COUNTRY_GT = 'GT';
    const COUNTRY_GG = 'GG';
    const COUNTRY_GN = 'GN';
    const COUNTRY_GW = 'GW';
    const COUNTRY_GY = 'GY';
    const COUNTRY_HT = 'HT';
    const COUNTRY_HM = 'HM';
    const COUNTRY_VA = 'VA';
    const COUNTRY_HN = 'HN';
    const COUNTRY_HK = 'HK';
    const COUNTRY_HU = 'HU';
    const COUNTRY_IS = 'IS';
    const COUNTRY_IN = 'IN';
    const COUNTRY_ID = 'ID';
    const COUNTRY_IR = 'IR';
    const COUNTRY_IQ = 'IQ';
    const COUNTRY_IE = 'IE';
    const COUNTRY_IM = 'IM';
    const COUNTRY_IL = 'IL';
    const COUNTRY_IT = 'IT';
    const COUNTRY_JM = 'JM';
    const COUNTRY_JP = 'JP';
    const COUNTRY_JE = 'JE';
    const COUNTRY_JO = 'JO';
    const COUNTRY_KZ = 'KZ';
    const COUNTRY_KE = 'KE';
    const COUNTRY_KI = 'KI';
    const COUNTRY_KP = 'KP';
    const COUNTRY_KR = 'KR';
    const COUNTRY_KW = 'KW';
    const COUNTRY_KG = 'KG';
    const COUNTRY_LA = 'LA';
    const COUNTRY_LV = 'LV';
    const COUNTRY_LB = 'LB';
    const COUNTRY_LS = 'LS';
    const COUNTRY_LR = 'LR';
    const COUNTRY_LY = 'LY';
    const COUNTRY_LI = 'LI';
    const COUNTRY_LT = 'LT';
    const COUNTRY_LU = 'LU';
    const COUNTRY_MO = 'MO';
    const COUNTRY_MK = 'MK';
    const COUNTRY_MG = 'MG';
    const COUNTRY_MW = 'MW';
    const COUNTRY_MY = 'MY';
    const COUNTRY_MV = 'MV';
    const COUNTRY_ML = 'ML';
    const COUNTRY_MT = 'MT';
    const COUNTRY_MH = 'MH';
    const COUNTRY_MQ = 'MQ';
    const COUNTRY_MR = 'MR';
    const COUNTRY_MU = 'MU';
    const COUNTRY_YT = 'YT';
    const COUNTRY_MX = 'MX';
    const COUNTRY_FM = 'FM';
    const COUNTRY_MD = 'MD';
    const COUNTRY_MC = 'MC';
    const COUNTRY_MN = 'MN';
    const COUNTRY_ME = 'ME';
    const COUNTRY_MS = 'MS';
    const COUNTRY_MA = 'MA';
    const COUNTRY_MZ = 'MZ';
    const COUNTRY_MM = 'MM';
    const COUNTRY_NA = 'NA';
    const COUNTRY_NR = 'NR';
    const COUNTRY_NP = 'NP';
    const COUNTRY_NL = 'NL';
    const COUNTRY_NC = 'NC';
    const COUNTRY_NZ = 'NZ';
    const COUNTRY_NI = 'NI';
    const COUNTRY_NE = 'NE';
    const COUNTRY_NG = 'NG';
    const COUNTRY_NU = 'NU';
    const COUNTRY_NF = 'NF';
    const COUNTRY_MP = 'MP';
    const COUNTRY_FALSE = 'false';
    const COUNTRY_OM = 'OM';
    const COUNTRY_PK = 'PK';
    const COUNTRY_PW = 'PW';
    const COUNTRY_PS = 'PS';
    const COUNTRY_PA = 'PA';
    const COUNTRY_PG = 'PG';
    const COUNTRY_PY = 'PY';
    const COUNTRY_PE = 'PE';
    const COUNTRY_PH = 'PH';
    const COUNTRY_PN = 'PN';
    const COUNTRY_PL = 'PL';
    const COUNTRY_PT = 'PT';
    const COUNTRY_PR = 'PR';
    const COUNTRY_QA = 'QA';
    const COUNTRY_RE = 'RE';
    const COUNTRY_RO = 'RO';
    const COUNTRY_RU = 'RU';
    const COUNTRY_RW = 'RW';
    const COUNTRY_BL = 'BL';
    const COUNTRY_SH = 'SH';
    const COUNTRY_KN = 'KN';
    const COUNTRY_LC = 'LC';
    const COUNTRY_MF = 'MF';
    const COUNTRY_PM = 'PM';
    const COUNTRY_VC = 'VC';
    const COUNTRY_WS = 'WS';
    const COUNTRY_SM = 'SM';
    const COUNTRY_ST = 'ST';
    const COUNTRY_SA = 'SA';
    const COUNTRY_SN = 'SN';
    const COUNTRY_RS = 'RS';
    const COUNTRY_SC = 'SC';
    const COUNTRY_SL = 'SL';
    const COUNTRY_SG = 'SG';
    const COUNTRY_SX = 'SX';
    const COUNTRY_SK = 'SK';
    const COUNTRY_SI = 'SI';
    const COUNTRY_SB = 'SB';
    const COUNTRY_SO = 'SO';
    const COUNTRY_ZA = 'ZA';
    const COUNTRY_GS = 'GS';
    const COUNTRY_SS = 'SS';
    const COUNTRY_ES = 'ES';
    const COUNTRY_LK = 'LK';
    const COUNTRY_SD = 'SD';
    const COUNTRY_SR = 'SR';
    const COUNTRY_SJ = 'SJ';
    const COUNTRY_SZ = 'SZ';
    const COUNTRY_SE = 'SE';
    const COUNTRY_CH = 'CH';
    const COUNTRY_SY = 'SY';
    const COUNTRY_TW = 'TW';
    const COUNTRY_TJ = 'TJ';
    const COUNTRY_TZ = 'TZ';
    const COUNTRY_TH = 'TH';
    const COUNTRY_TL = 'TL';
    const COUNTRY_TG = 'TG';
    const COUNTRY_TK = 'TK';
    const COUNTRY_TO = 'TO';
    const COUNTRY_TT = 'TT';
    const COUNTRY_TN = 'TN';
    const COUNTRY_TR = 'TR';
    const COUNTRY_TM = 'TM';
    const COUNTRY_TC = 'TC';
    const COUNTRY_TV = 'TV';
    const COUNTRY_UG = 'UG';
    const COUNTRY_UA = 'UA';
    const COUNTRY_AE = 'AE';
    const COUNTRY_GB = 'GB';
    const COUNTRY_US = 'US';
    const COUNTRY_UM = 'UM';
    const COUNTRY_UY = 'UY';
    const COUNTRY_UZ = 'UZ';
    const COUNTRY_VU = 'VU';
    const COUNTRY_VE = 'VE';
    const COUNTRY_VN = 'VN';
    const COUNTRY_VG = 'VG';
    const COUNTRY_VI = 'VI';
    const COUNTRY_WF = 'WF';
    const COUNTRY_EH = 'EH';
    const COUNTRY_YE = 'YE';
    const COUNTRY_ZM = 'ZM';
    const COUNTRY_ZW = 'ZW';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCountryAllowableValues()
    {
        return [
            self::COUNTRY_AF,
            self::COUNTRY_AX,
            self::COUNTRY_AL,
            self::COUNTRY_DZ,
            self::COUNTRY__AS,
            self::COUNTRY_AD,
            self::COUNTRY_AO,
            self::COUNTRY_AI,
            self::COUNTRY_AQ,
            self::COUNTRY_AG,
            self::COUNTRY_AR,
            self::COUNTRY_AM,
            self::COUNTRY_AW,
            self::COUNTRY_AU,
            self::COUNTRY_AT,
            self::COUNTRY_AZ,
            self::COUNTRY_BS,
            self::COUNTRY_BH,
            self::COUNTRY_BD,
            self::COUNTRY_BB,
            self::COUNTRY_BY,
            self::COUNTRY_BE,
            self::COUNTRY_BZ,
            self::COUNTRY_BJ,
            self::COUNTRY_BM,
            self::COUNTRY_BT,
            self::COUNTRY_BO,
            self::COUNTRY_BQ,
            self::COUNTRY_BA,
            self::COUNTRY_BW,
            self::COUNTRY_BV,
            self::COUNTRY_BR,
            self::COUNTRY_IO,
            self::COUNTRY_BN,
            self::COUNTRY_BG,
            self::COUNTRY_BF,
            self::COUNTRY_BI,
            self::COUNTRY_KH,
            self::COUNTRY_CM,
            self::COUNTRY_CA,
            self::COUNTRY_CV,
            self::COUNTRY_KY,
            self::COUNTRY_CF,
            self::COUNTRY_TD,
            self::COUNTRY_CL,
            self::COUNTRY_CN,
            self::COUNTRY_CX,
            self::COUNTRY_CC,
            self::COUNTRY_CO,
            self::COUNTRY_KM,
            self::COUNTRY_CG,
            self::COUNTRY_CD,
            self::COUNTRY_CK,
            self::COUNTRY_CR,
            self::COUNTRY_CI,
            self::COUNTRY_HR,
            self::COUNTRY_CU,
            self::COUNTRY_CW,
            self::COUNTRY_CY,
            self::COUNTRY_CZ,
            self::COUNTRY_DK,
            self::COUNTRY_DJ,
            self::COUNTRY_DM,
            self::COUNTRY__DO,
            self::COUNTRY_EC,
            self::COUNTRY_EG,
            self::COUNTRY_SV,
            self::COUNTRY_GQ,
            self::COUNTRY_ER,
            self::COUNTRY_EE,
            self::COUNTRY_ET,
            self::COUNTRY_FK,
            self::COUNTRY_FO,
            self::COUNTRY_FJ,
            self::COUNTRY_FI,
            self::COUNTRY_FR,
            self::COUNTRY_GF,
            self::COUNTRY_PF,
            self::COUNTRY_TF,
            self::COUNTRY_GA,
            self::COUNTRY_GM,
            self::COUNTRY_GE,
            self::COUNTRY_DE,
            self::COUNTRY_GH,
            self::COUNTRY_GI,
            self::COUNTRY_GR,
            self::COUNTRY_GL,
            self::COUNTRY_GD,
            self::COUNTRY_GP,
            self::COUNTRY_GU,
            self::COUNTRY_GT,
            self::COUNTRY_GG,
            self::COUNTRY_GN,
            self::COUNTRY_GW,
            self::COUNTRY_GY,
            self::COUNTRY_HT,
            self::COUNTRY_HM,
            self::COUNTRY_VA,
            self::COUNTRY_HN,
            self::COUNTRY_HK,
            self::COUNTRY_HU,
            self::COUNTRY_IS,
            self::COUNTRY_IN,
            self::COUNTRY_ID,
            self::COUNTRY_IR,
            self::COUNTRY_IQ,
            self::COUNTRY_IE,
            self::COUNTRY_IM,
            self::COUNTRY_IL,
            self::COUNTRY_IT,
            self::COUNTRY_JM,
            self::COUNTRY_JP,
            self::COUNTRY_JE,
            self::COUNTRY_JO,
            self::COUNTRY_KZ,
            self::COUNTRY_KE,
            self::COUNTRY_KI,
            self::COUNTRY_KP,
            self::COUNTRY_KR,
            self::COUNTRY_KW,
            self::COUNTRY_KG,
            self::COUNTRY_LA,
            self::COUNTRY_LV,
            self::COUNTRY_LB,
            self::COUNTRY_LS,
            self::COUNTRY_LR,
            self::COUNTRY_LY,
            self::COUNTRY_LI,
            self::COUNTRY_LT,
            self::COUNTRY_LU,
            self::COUNTRY_MO,
            self::COUNTRY_MK,
            self::COUNTRY_MG,
            self::COUNTRY_MW,
            self::COUNTRY_MY,
            self::COUNTRY_MV,
            self::COUNTRY_ML,
            self::COUNTRY_MT,
            self::COUNTRY_MH,
            self::COUNTRY_MQ,
            self::COUNTRY_MR,
            self::COUNTRY_MU,
            self::COUNTRY_YT,
            self::COUNTRY_MX,
            self::COUNTRY_FM,
            self::COUNTRY_MD,
            self::COUNTRY_MC,
            self::COUNTRY_MN,
            self::COUNTRY_ME,
            self::COUNTRY_MS,
            self::COUNTRY_MA,
            self::COUNTRY_MZ,
            self::COUNTRY_MM,
            self::COUNTRY_NA,
            self::COUNTRY_NR,
            self::COUNTRY_NP,
            self::COUNTRY_NL,
            self::COUNTRY_NC,
            self::COUNTRY_NZ,
            self::COUNTRY_NI,
            self::COUNTRY_NE,
            self::COUNTRY_NG,
            self::COUNTRY_NU,
            self::COUNTRY_NF,
            self::COUNTRY_MP,
            self::COUNTRY_FALSE,
            self::COUNTRY_OM,
            self::COUNTRY_PK,
            self::COUNTRY_PW,
            self::COUNTRY_PS,
            self::COUNTRY_PA,
            self::COUNTRY_PG,
            self::COUNTRY_PY,
            self::COUNTRY_PE,
            self::COUNTRY_PH,
            self::COUNTRY_PN,
            self::COUNTRY_PL,
            self::COUNTRY_PT,
            self::COUNTRY_PR,
            self::COUNTRY_QA,
            self::COUNTRY_RE,
            self::COUNTRY_RO,
            self::COUNTRY_RU,
            self::COUNTRY_RW,
            self::COUNTRY_BL,
            self::COUNTRY_SH,
            self::COUNTRY_KN,
            self::COUNTRY_LC,
            self::COUNTRY_MF,
            self::COUNTRY_PM,
            self::COUNTRY_VC,
            self::COUNTRY_WS,
            self::COUNTRY_SM,
            self::COUNTRY_ST,
            self::COUNTRY_SA,
            self::COUNTRY_SN,
            self::COUNTRY_RS,
            self::COUNTRY_SC,
            self::COUNTRY_SL,
            self::COUNTRY_SG,
            self::COUNTRY_SX,
            self::COUNTRY_SK,
            self::COUNTRY_SI,
            self::COUNTRY_SB,
            self::COUNTRY_SO,
            self::COUNTRY_ZA,
            self::COUNTRY_GS,
            self::COUNTRY_SS,
            self::COUNTRY_ES,
            self::COUNTRY_LK,
            self::COUNTRY_SD,
            self::COUNTRY_SR,
            self::COUNTRY_SJ,
            self::COUNTRY_SZ,
            self::COUNTRY_SE,
            self::COUNTRY_CH,
            self::COUNTRY_SY,
            self::COUNTRY_TW,
            self::COUNTRY_TJ,
            self::COUNTRY_TZ,
            self::COUNTRY_TH,
            self::COUNTRY_TL,
            self::COUNTRY_TG,
            self::COUNTRY_TK,
            self::COUNTRY_TO,
            self::COUNTRY_TT,
            self::COUNTRY_TN,
            self::COUNTRY_TR,
            self::COUNTRY_TM,
            self::COUNTRY_TC,
            self::COUNTRY_TV,
            self::COUNTRY_UG,
            self::COUNTRY_UA,
            self::COUNTRY_AE,
            self::COUNTRY_GB,
            self::COUNTRY_US,
            self::COUNTRY_UM,
            self::COUNTRY_UY,
            self::COUNTRY_UZ,
            self::COUNTRY_VU,
            self::COUNTRY_VE,
            self::COUNTRY_VN,
            self::COUNTRY_VG,
            self::COUNTRY_VI,
            self::COUNTRY_WF,
            self::COUNTRY_EH,
            self::COUNTRY_YE,
            self::COUNTRY_ZM,
            self::COUNTRY_ZW,
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
        $this->container['line1'] = isset($data['line1']) ? $data['line1'] : null;
        $this->container['line2'] = isset($data['line2']) ? $data['line2'] : null;
        $this->container['line3'] = isset($data['line3']) ? $data['line3'] : null;
        $this->container['line4'] = isset($data['line4']) ? $data['line4'] : null;
        $this->container['city'] = isset($data['city']) ? $data['city'] : null;
        $this->container['county_or_province'] = isset($data['county_or_province']) ? $data['county_or_province'] : null;
        $this->container['zip_or_postcode'] = isset($data['zip_or_postcode']) ? $data['zip_or_postcode'] : null;
        $this->container['country'] = isset($data['country']) ? $data['country'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['line1'] === null) {
            $invalidProperties[] = "'line1' can't be null";
        }
        if ((mb_strlen($this->container['line1']) > 100)) {
            $invalidProperties[] = "invalid value for 'line1', the character length must be smaller than or equal to 100.";
        }

        if ((mb_strlen($this->container['line1']) < 1)) {
            $invalidProperties[] = "invalid value for 'line1', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['line2']) && (mb_strlen($this->container['line2']) > 100)) {
            $invalidProperties[] = "invalid value for 'line2', the character length must be smaller than or equal to 100.";
        }

        if (!is_null($this->container['line2']) && (mb_strlen($this->container['line2']) < 0)) {
            $invalidProperties[] = "invalid value for 'line2', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['line3']) && (mb_strlen($this->container['line3']) > 100)) {
            $invalidProperties[] = "invalid value for 'line3', the character length must be smaller than or equal to 100.";
        }

        if (!is_null($this->container['line3']) && (mb_strlen($this->container['line3']) < 0)) {
            $invalidProperties[] = "invalid value for 'line3', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['line4']) && (mb_strlen($this->container['line4']) > 100)) {
            $invalidProperties[] = "invalid value for 'line4', the character length must be smaller than or equal to 100.";
        }

        if (!is_null($this->container['line4']) && (mb_strlen($this->container['line4']) < 0)) {
            $invalidProperties[] = "invalid value for 'line4', the character length must be bigger than or equal to 0.";
        }

        if ($this->container['city'] === null) {
            $invalidProperties[] = "'city' can't be null";
        }
        if ((mb_strlen($this->container['city']) > 50)) {
            $invalidProperties[] = "invalid value for 'city', the character length must be smaller than or equal to 50.";
        }

        if ((mb_strlen($this->container['city']) < 2)) {
            $invalidProperties[] = "invalid value for 'city', the character length must be bigger than or equal to 2.";
        }

        if (!is_null($this->container['county_or_province']) && (mb_strlen($this->container['county_or_province']) > 50)) {
            $invalidProperties[] = "invalid value for 'county_or_province', the character length must be smaller than or equal to 50.";
        }

        if (!is_null($this->container['county_or_province']) && (mb_strlen($this->container['county_or_province']) < 2)) {
            $invalidProperties[] = "invalid value for 'county_or_province', the character length must be bigger than or equal to 2.";
        }

        if (!is_null($this->container['zip_or_postcode']) && (mb_strlen($this->container['zip_or_postcode']) > 60)) {
            $invalidProperties[] = "invalid value for 'zip_or_postcode', the character length must be smaller than or equal to 60.";
        }

        if (!is_null($this->container['zip_or_postcode']) && (mb_strlen($this->container['zip_or_postcode']) < 2)) {
            $invalidProperties[] = "invalid value for 'zip_or_postcode', the character length must be bigger than or equal to 2.";
        }

        if ($this->container['country'] === null) {
            $invalidProperties[] = "'country' can't be null";
        }
        $allowedValues = $this->getCountryAllowableValues();
        if (!is_null($this->container['country']) && !in_array($this->container['country'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'country', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if ((mb_strlen($this->container['country']) > 2)) {
            $invalidProperties[] = "invalid value for 'country', the character length must be smaller than or equal to 2.";
        }

        if ((mb_strlen($this->container['country']) < 2)) {
            $invalidProperties[] = "invalid value for 'country', the character length must be bigger than or equal to 2.";
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
     * Gets line1
     *
     * @return string
     */
    public function getLine1()
    {
        return $this->container['line1'];
    }

    /**
     * Sets line1
     *
     * @param string $line1 line1
     *
     * @return $this
     */
    public function setLine1($line1)
    {
        if ((mb_strlen($line1) > 100)) {
            throw new \InvalidArgumentException('invalid length for $line1 when calling CreatePayeeAddress2., must be smaller than or equal to 100.');
        }
        if ((mb_strlen($line1) < 1)) {
            throw new \InvalidArgumentException('invalid length for $line1 when calling CreatePayeeAddress2., must be bigger than or equal to 1.');
        }

        $this->container['line1'] = $line1;

        return $this;
    }

    /**
     * Gets line2
     *
     * @return string|null
     */
    public function getLine2()
    {
        return $this->container['line2'];
    }

    /**
     * Sets line2
     *
     * @param string|null $line2 line2
     *
     * @return $this
     */
    public function setLine2($line2)
    {
        if (!is_null($line2) && (mb_strlen($line2) > 100)) {
            throw new \InvalidArgumentException('invalid length for $line2 when calling CreatePayeeAddress2., must be smaller than or equal to 100.');
        }
        if (!is_null($line2) && (mb_strlen($line2) < 0)) {
            throw new \InvalidArgumentException('invalid length for $line2 when calling CreatePayeeAddress2., must be bigger than or equal to 0.');
        }

        $this->container['line2'] = $line2;

        return $this;
    }

    /**
     * Gets line3
     *
     * @return string|null
     */
    public function getLine3()
    {
        return $this->container['line3'];
    }

    /**
     * Sets line3
     *
     * @param string|null $line3 line3
     *
     * @return $this
     */
    public function setLine3($line3)
    {
        if (!is_null($line3) && (mb_strlen($line3) > 100)) {
            throw new \InvalidArgumentException('invalid length for $line3 when calling CreatePayeeAddress2., must be smaller than or equal to 100.');
        }
        if (!is_null($line3) && (mb_strlen($line3) < 0)) {
            throw new \InvalidArgumentException('invalid length for $line3 when calling CreatePayeeAddress2., must be bigger than or equal to 0.');
        }

        $this->container['line3'] = $line3;

        return $this;
    }

    /**
     * Gets line4
     *
     * @return string|null
     */
    public function getLine4()
    {
        return $this->container['line4'];
    }

    /**
     * Sets line4
     *
     * @param string|null $line4 line4
     *
     * @return $this
     */
    public function setLine4($line4)
    {
        if (!is_null($line4) && (mb_strlen($line4) > 100)) {
            throw new \InvalidArgumentException('invalid length for $line4 when calling CreatePayeeAddress2., must be smaller than or equal to 100.');
        }
        if (!is_null($line4) && (mb_strlen($line4) < 0)) {
            throw new \InvalidArgumentException('invalid length for $line4 when calling CreatePayeeAddress2., must be bigger than or equal to 0.');
        }

        $this->container['line4'] = $line4;

        return $this;
    }

    /**
     * Gets city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->container['city'];
    }

    /**
     * Sets city
     *
     * @param string $city city
     *
     * @return $this
     */
    public function setCity($city)
    {
        if ((mb_strlen($city) > 50)) {
            throw new \InvalidArgumentException('invalid length for $city when calling CreatePayeeAddress2., must be smaller than or equal to 50.');
        }
        if ((mb_strlen($city) < 2)) {
            throw new \InvalidArgumentException('invalid length for $city when calling CreatePayeeAddress2., must be bigger than or equal to 2.');
        }

        $this->container['city'] = $city;

        return $this;
    }

    /**
     * Gets county_or_province
     *
     * @return string|null
     */
    public function getCountyOrProvince()
    {
        return $this->container['county_or_province'];
    }

    /**
     * Sets county_or_province
     *
     * @param string|null $county_or_province county_or_province
     *
     * @return $this
     */
    public function setCountyOrProvince($county_or_province)
    {
        if (!is_null($county_or_province) && (mb_strlen($county_or_province) > 50)) {
            throw new \InvalidArgumentException('invalid length for $county_or_province when calling CreatePayeeAddress2., must be smaller than or equal to 50.');
        }
        if (!is_null($county_or_province) && (mb_strlen($county_or_province) < 2)) {
            throw new \InvalidArgumentException('invalid length for $county_or_province when calling CreatePayeeAddress2., must be bigger than or equal to 2.');
        }

        $this->container['county_or_province'] = $county_or_province;

        return $this;
    }

    /**
     * Gets zip_or_postcode
     *
     * @return string|null
     */
    public function getZipOrPostcode()
    {
        return $this->container['zip_or_postcode'];
    }

    /**
     * Sets zip_or_postcode
     *
     * @param string|null $zip_or_postcode zip_or_postcode
     *
     * @return $this
     */
    public function setZipOrPostcode($zip_or_postcode)
    {
        if (!is_null($zip_or_postcode) && (mb_strlen($zip_or_postcode) > 60)) {
            throw new \InvalidArgumentException('invalid length for $zip_or_postcode when calling CreatePayeeAddress2., must be smaller than or equal to 60.');
        }
        if (!is_null($zip_or_postcode) && (mb_strlen($zip_or_postcode) < 2)) {
            throw new \InvalidArgumentException('invalid length for $zip_or_postcode when calling CreatePayeeAddress2., must be bigger than or equal to 2.');
        }

        $this->container['zip_or_postcode'] = $zip_or_postcode;

        return $this;
    }

    /**
     * Gets country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->container['country'];
    }

    /**
     * Sets country
     *
     * @param string $country 2 letter ISO 3166-1 country code
     *
     * @return $this
     */
    public function setCountry($country)
    {
        $allowedValues = $this->getCountryAllowableValues();
        if (!in_array($country, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'country', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        if ((mb_strlen($country) > 2)) {
            throw new \InvalidArgumentException('invalid length for $country when calling CreatePayeeAddress2., must be smaller than or equal to 2.');
        }
        if ((mb_strlen($country) < 2)) {
            throw new \InvalidArgumentException('invalid length for $country when calling CreatePayeeAddress2., must be bigger than or equal to 2.');
        }

        $this->container['country'] = $country;

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


