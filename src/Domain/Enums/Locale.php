<?php

namespace KostasChasiotis\OctoTravel\Domain\Enums;

/**
 * RFC 5646 Language Tags
 * 
 * Based on https://github.com/AlexeyPlodenko/rfc5646-language-tags-php/tree/main
 */

enum Locale: string
{
    /**
     * Afrikaans
     */
    case af = 'af';

    /**
     * Afrikaans (South Africa)
     */
    case af_ZA = 'af-ZA';

    /**
     * Arabic
     */
    case ar = 'ar';

    /**
     * Arabic (U.A.E.)
     */
    case ar_AE = 'ar-AE';

    /**
     * Arabic (Bahrain)
     */
    case ar_BH = 'ar-BH';

    /**
     * Arabic (Algeria)
     */
    case ar_DZ = 'ar-DZ';

    /**
     * Arabic (Egypt)
     */
    case ar_EG = 'ar-EG';

    /**
     * Arabic (Iraq)
     */
    case ar_IQ = 'ar-IQ';

    /**
     * Arabic (Jordan)
     */
    case ar_JO = 'ar-JO';

    /**
     * Arabic (Kuwait)
     */
    case ar_KW = 'ar-KW';

    /**
     * Arabic (Lebanon)
     */
    case ar_LB = 'ar-LB';

    /**
     * Arabic (Libya)
     */
    case ar_LY = 'ar-LY';

    /**
     * Arabic (Morocco)
     */
    case ar_MA = 'ar-MA';

    /**
     * Arabic (Oman)
     */
    case ar_OM = 'ar-OM';

    /**
     * Arabic (Qatar)
     */
    case ar_QA = 'ar-QA';

    /**
     * Arabic (Saudi Arabia)
     */
    case ar_SA = 'ar-SA';

    /**
     * Arabic (Syria)
     */
    case ar_SY = 'ar-SY';

    /**
     * Arabic (Tunisia)
     */
    case ar_TN = 'ar-TN';

    /**
     * Arabic (Yemen)
     */
    case ar_YE = 'ar-YE';

    /**
     * Azeri (Latin)
     */
    case az = 'az';

    /**
     * Azeri (Latin) (Azerbaijan)
     */
    case az_AZ = 'az-AZ';

    /**
     * Azeri (Cyrillic) (Azerbaijan)
     */
    case az_Cyrl_AZ = 'az-Cyrl-AZ';

    /**
     * Belarusian
     */
    case be = 'be';

    /**
     * Belarusian (Belarus)
     */
    case be_BY = 'be-BY';

    /**
     * Bulgarian
     */
    case bg = 'bg';

    /**
     * Bulgarian (Bulgaria)
     */
    case bg_BG = 'bg-BG';

    /**
     * Bosnian (Bosnia and Herzegovina)
     */
    case bs_BA = 'bs-BA';

    /**
     * Catalan
     */
    case ca = 'ca';

    /**
     * Catalan (Spain)
     */
    case ca_ES = 'ca-ES';

    /**
     * Czech
     */
    case cs = 'cs';

    /**
     * Czech (Czech Republic)
     */
    case cs_CZ = 'cs-CZ';

    /**
     * Welsh
     */
    case cy = 'cy';

    /**
     * Welsh (United Kingdom)
     */
    case cy_GB = 'cy-GB';

    /**
     * Danish
     */
    case da = 'da';

    /**
     * Danish (Denmark)
     */
    case da_DK = 'da-DK';

    /**
     * German
     */
    case de = 'de';

    /**
     * German (Austria)
     */
    case de_AT = 'de-AT';

    /**
     * German (Switzerland)
     */
    case de_CH = 'de-CH';

    /**
     * German (Germany)
     */
    case de_DE = 'de-DE';

    /**
     * German (Liechtenstein)
     */
    case de_LI = 'de-LI';

    /**
     * German (Luxembourg)
     */
    case de_LU = 'de-LU';

    /**
     * Divehi
     */
    case dv = 'dv';

    /**
     * Divehi (Maldives)
     */
    case dv_MV = 'dv-MV';

    /**
     * Greek
     */
    case el = 'el';

    /**
     * Greek (Greece)
     */
    case el_GR = 'el-GR';

    /**
     * English
     */
    case en = 'en';

    /**
     * English (Australia)
     */
    case en_AU = 'en-AU';

    /**
     * English (Belize)
     */
    case en_BZ = 'en-BZ';

    /**
     * English (Canada)
     */
    case en_CA = 'en-CA';

    /**
     * English (Caribbean)
     */
    case en_CB = 'en-CB';

    /**
     * English (United Kingdom)
     */
    case en_GB = 'en-GB';

    /**
     * English (Ireland)
     */
    case en_IE = 'en-IE';

    /**
     * English (Jamaica)
     */
    case en_JM = 'en-JM';

    /**
     * English (New Zealand)
     */
    case en_NZ = 'en-NZ';

    /**
     * English (Republic of the Philippines)
     */
    case en_PH = 'en-PH';

    /**
     * English (Trinidad and Tobago)
     */
    case en_TT = 'en-TT';

    /**
     * English (United States)
     */
    case en_US = 'en-US';

    /**
     * English (South Africa)
     */
    case en_ZA = 'en-ZA';

    /**
     * English (Zimbabwe)
     */
    case en_ZW = 'en-ZW';

    /**
     * Esperanto
     */
    case eo = 'eo';

    /**
     * Spanish
     */
    case es = 'es';

    /**
     * Spanish (Argentina)
     */
    case es_AR = 'es-AR';

    /**
     * Spanish (Bolivia)
     */
    case es_BO = 'es-BO';

    /**
     * Spanish (Chile)
     */
    case es_CL = 'es-CL';

    /**
     * Spanish (Colombia)
     */
    case es_CO = 'es-CO';

    /**
     * Spanish (Costa Rica)
     */
    case es_CR = 'es-CR';

    /**
     * Spanish (Dominican Republic)
     */
    case es_DO = 'es-DO';

    /**
     * Spanish (Ecuador)
     */
    case es_EC = 'es-EC';

    /**
     * Spanish (Spain)
     */
    case es_ES = 'es-ES';

    /**
     * Spanish (Guatemala)
     */
    case es_GT = 'es-GT';

    /**
     * Spanish (Honduras)
     */
    case es_HN = 'es-HN';

    /**
     * Spanish (Mexico)
     */
    case es_MX = 'es-MX';

    /**
     * Spanish (Nicaragua)
     */
    case es_NI = 'es-NI';

    /**
     * Spanish (Panama)
     */
    case es_PA = 'es-PA';

    /**
     * Spanish (Peru)
     */
    case es_PE = 'es-PE';

    /**
     * Spanish (Puerto Rico)
     */
    case es_PR = 'es-PR';

    /**
     * Spanish (Paraguay)
     */
    case es_PY = 'es-PY';

    /**
     * Spanish (El Salvador)
     */
    case es_SV = 'es-SV';

    /**
     * Spanish (Uruguay)
     */
    case es_UY = 'es-UY';

    /**
     * Spanish (Venezuela)
     */
    case es_VE = 'es-VE';

    /**
     * Estonian
     */
    case et = 'et';

    /**
     * Estonian (Estonia)
     */
    case et_EE = 'et-EE';

    /**
     * Basque
     */
    case eu = 'eu';

    /**
     * Basque (Spain)
     */
    case eu_ES = 'eu-ES';

    /**
     * Farsi
     */
    case fa = 'fa';

    /**
     * Farsi (Iran)
     */
    case fa_IR = 'fa-IR';

    /**
     * Finnish
     */
    case fi = 'fi';

    /**
     * Finnish (Finland)
     */
    case fi_FI = 'fi-FI';

    /**
     * Faroese
     */
    case fo = 'fo';

    /**
     * Faroese (Faroe Islands)
     */
    case fo_FO = 'fo-FO';

    /**
     * French
     */
    case fr = 'fr';

    /**
     * French (Belgium)
     */
    case fr_BE = 'fr-BE';

    /**
     * French (Canada)
     */
    case fr_CA = 'fr-CA';

    /**
     * French (Switzerland)
     */
    case fr_CH = 'fr-CH';

    /**
     * French (France)
     */
    case fr_FR = 'fr-FR';

    /**
     * French (Luxembourg)
     */
    case fr_LU = 'fr-LU';

    /**
     * French (Principality of Monaco)
     */
    case fr_MC = 'fr-MC';

    /**
     * Galician
     */
    case gl = 'gl';

    /**
     * Galician (Spain)
     */
    case gl_ES = 'gl-ES';

    /**
     * Gujarati
     */
    case gu = 'gu';

    /**
     * Gujarati (India)
     */
    case gu_IN = 'gu-IN';

    /**
     * Hebrew
     */
    case he = 'he';

    /**
     * Hebrew (Israel)
     */
    case he_IL = 'he-IL';

    /**
     * Hindi
     */
    case hi = 'hi';

    /**
     * Hindi (India)
     */
    case hi_IN = 'hi-IN';

    /**
     * Croatian
     */
    case hr = 'hr';

    /**
     * Croatian (Bosnia and Herzegovina)
     */
    case hr_BA = 'hr-BA';

    /**
     * Croatian (Croatia)
     */
    case hr_HR = 'hr-HR';

    /**
     * Hungarian
     */
    case hu = 'hu';

    /**
     * Hungarian (Hungary)
     */
    case hu_HU = 'hu-HU';

    /**
     * Armenian
     */
    case hy = 'hy';

    /**
     * Armenian (Armenia)
     */
    case hy_AM = 'hy-AM';

    /**
     * Indonesian
     */
    case id = 'id';

    /**
     * Indonesian (Indonesia)
     */
    case id_ID = 'id-ID';

    /**
     * Icelandic
     */
    case is = 'is';

    /**
     * Icelandic (Iceland)
     */
    case is_IS = 'is-IS';

    /**
     * Italian
     */
    case it = 'it';

    /**
     * Italian (Switzerland)
     */
    case it_CH = 'it-CH';

    /**
     * Italian (Italy)
     */
    case it_IT = 'it-IT';

    /**
     * Japanese
     */
    case ja = 'ja';

    /**
     * Japanese (Japan)
     */
    case ja_JP = 'ja-JP';

    /**
     * Georgian
     */
    case ka = 'ka';

    /**
     * Georgian (Georgia)
     */
    case ka_GE = 'ka-GE';

    /**
     * Kazakh
     */
    case kk = 'kk';

    /**
     * Kazakh (Kazakhstan)
     */
    case kk_KZ = 'kk-KZ';

    /**
     * Kannada
     */
    case kn = 'kn';

    /**
     * Kannada (India)
     */
    case kn_IN = 'kn-IN';

    /**
     * Korean
     */
    case ko = 'ko';

    /**
     * Korean (Korea)
     */
    case ko_KR = 'ko-KR';

    /**
     * Konkani
     */
    case kok = 'kok';

    /**
     * Konkani (India)
     */
    case kok_IN = 'kok-IN';

    /**
     * Kyrgyz
     */
    case ky = 'ky';

    /**
     * Kyrgyz (Kyrgyzstan)
     */
    case ky_KG = 'ky-KG';

    /**
     * Lithuanian
     */
    case lt = 'lt';

    /**
     * Lithuanian (Lithuania)
     */
    case lt_LT = 'lt-LT';

    /**
     * Latvian
     */
    case lv = 'lv';

    /**
     * Latvian (Latvia)
     */
    case lv_LV = 'lv-LV';

    /**
     * Maori
     */
    case mi = 'mi';

    /**
     * Maori (New Zealand)
     */
    case mi_NZ = 'mi-NZ';

    /**
     * FYRO Macedonian
     */
    case mk = 'mk';

    /**
     * FYRO Macedonian (Former Yugoslav Republic of Macedonia)
     */
    case mk_MK = 'mk-MK';

    /**
     * Mongolian
     */
    case mn = 'mn';

    /**
     * Mongolian (Mongolia)
     */
    case mn_MN = 'mn-MN';

    /**
     * Marathi
     */
    case mr = 'mr';

    /**
     * Marathi (India)
     */
    case mr_IN = 'mr-IN';

    /**
     * Malay
     */
    case ms = 'ms';

    /**
     * Malay (Brunei Darussalam)
     */
    case ms_BN = 'ms-BN';

    /**
     * Malay (Malaysia)
     */
    case ms_MY = 'ms-MY';

    /**
     * Maltese
     */
    case mt = 'mt';

    /**
     * Maltese (Malta)
     */
    case mt_MT = 'mt-MT';

    /**
     * Norwegian (Bokm?l)
     */
    case nb = 'nb';

    /**
     * Norwegian (Bokm?l) (Norway)
     */
    case nb_NO = 'nb-NO';

    /**
     * Dutch
     */
    case nl = 'nl';

    /**
     * Dutch (Belgium)
     */
    case nl_BE = 'nl-BE';

    /**
     * Dutch (Netherlands)
     */
    case nl_NL = 'nl-NL';

    /**
     * Norwegian (Nynorsk) (Norway)
     */
    case nn_NO = 'nn-NO';

    /**
     * Northern Sotho
     */
    case ns = 'ns';

    /**
     * Northern Sotho (South Africa)
     */
    case ns_ZA = 'ns-ZA';

    /**
     * Punjabi
     */
    case pa = 'pa';

    /**
     * Punjabi (India)
     */
    case pa_IN = 'pa-IN';

    /**
     * Polish
     */
    case pl = 'pl';

    /**
     * Polish (Poland)
     */
    case pl_PL = 'pl-PL';

    /**
     * Pashto
     */
    case ps = 'ps';

    /**
     * Pashto (Afghanistan)
     */
    case ps_AR = 'ps-AR';

    /**
     * Portuguese
     */
    case pt = 'pt';

    /**
     * Portuguese (Brazil)
     */
    case pt_BR = 'pt-BR';

    /**
     * Portuguese (Portugal)
     */
    case pt_PT = 'pt-PT';

    /**
     * Quechua
     */
    case qu = 'qu';

    /**
     * Quechua (Bolivia)
     */
    case qu_BO = 'qu-BO';

    /**
     * Quechua (Ecuador)
     */
    case qu_EC = 'qu-EC';

    /**
     * Quechua (Peru)
     */
    case qu_PE = 'qu-PE';

    /**
     * Romanian
     */
    case ro = 'ro';

    /**
     * Romanian (Romania)
     */
    case ro_RO = 'ro-RO';

    /**
     * Russian
     */
    case ru = 'ru';

    /**
     * Russian (Russia)
     */
    case ru_RU = 'ru-RU';

    /**
     * Sanskrit
     */
    case sa = 'sa';

    /**
     * Sanskrit (India)
     */
    case sa_IN = 'sa-IN';

    /**
     * Sami
     */
    case se = 'se';

    /**
     * Sami (Finland)
     */
    case se_FI = 'se-FI';

    /**
     * Sami (Norway)
     */
    case se_NO = 'se-NO';

    /**
     * Sami (Sweden)
     */
    case se_SE = 'se-SE';

    /**
     * Slovak
     */
    case sk = 'sk';

    /**
     * Slovak (Slovakia)
     */
    case sk_SK = 'sk-SK';

    /**
     * Slovenian
     */
    case sl = 'sl';

    /**
     * Slovenian (Slovenia)
     */
    case sl_SI = 'sl-SI';

    /**
     * Albanian
     */
    case sq = 'sq';

    /**
     * Albanian (Albania)
     */
    case sq_AL = 'sq-AL';

    /**
     * Serbian (Latin) (Bosnia and Herzegovina)
     */
    case sr_BA = 'sr-BA';

    /**
     * Serbian (Cyrillic) (Bosnia and Herzegovina)
     */
    case sr_Cyrl_BA = 'sr-Cyrl-BA';

    /**
     * Serbian (Latin) (Serbia and Montenegro)
     */
    case sr_SP = 'sr-SP';

    /**
     * Serbian (Cyrillic) (Serbia and Montenegro)
     */
    case sr_Cyrl_SP = 'sr-Cyrl-SP';

    /**
     * Swedish
     */
    case sv = 'sv';

    /**
     * Swedish (Finland)
     */
    case sv_FI = 'sv-FI';

    /**
     * Swedish (Sweden)
     */
    case sv_SE = 'sv-SE';

    /**
     * Swahili
     */
    case sw = 'sw';

    /**
     * Swahili (Kenya)
     */
    case sw_KE = 'sw-KE';

    /**
     * Syriac
     */
    case syr = 'syr';

    /**
     * Syriac (Syria)
     */
    case syr_SY = 'syr-SY';

    /**
     * Tamil
     */
    case ta = 'ta';

    /**
     * Tamil (India)
     */
    case ta_IN = 'ta-IN';

    /**
     * Telugu
     */
    case te = 'te';

    /**
     * Telugu (India)
     */
    case te_IN = 'te-IN';

    /**
     * Thai
     */
    case th = 'th';

    /**
     * Thai (Thailand)
     */
    case th_TH = 'th-TH';

    /**
     * Tagalog
     */
    case tl = 'tl';

    /**
     * Tagalog (Philippines)
     */
    case tl_PH = 'tl-PH';

    /**
     * Tswana
     */
    case tn = 'tn';

    /**
     * Tswana (South Africa)
     */
    case tn_ZA = 'tn-ZA';

    /**
     * Turkish
     */
    case tr = 'tr';

    /**
     * Turkish (Turkey)
     */
    case tr_TR = 'tr-TR';

    /**
     * Tatar
     */
    case tt = 'tt';

    /**
     * Tatar (Russia)
     */
    case tt_RU = 'tt-RU';

    /**
     * Tsonga
     */
    case ts = 'ts';

    /**
     * Ukrainian
     */
    case uk = 'uk';

    /**
     * Ukrainian (Ukraine)
     */
    case uk_UA = 'uk-UA';

    /**
     * Urdu
     */
    case ur = 'ur';

    /**
     * Urdu (Islamic Republic of Pakistan)
     */
    case ur_PK = 'ur-PK';

    /**
     * Uzbek (Latin)
     */
    case uz = 'uz';

    /**
     * Uzbek (Latin) (Uzbekistan)
     */
    case uz_UZ = 'uz-UZ';

    /**
     * Uzbek (Cyrillic) (Uzbekistan)
     */
    case uz_Cyrl_UZ = 'uz-Cyrl-UZ';

    /**
     * Vietnamese
     */
    case vi = 'vi';

    /**
     * Vietnamese (Viet Nam)
     */
    case vi_VN = 'vi-VN';

    /**
     * Xhosa
     */
    case xh = 'xh';

    /**
     * Xhosa (South Africa)
     */
    case xh_ZA = 'xh-ZA';

    /**
     * Chinese
     */
    case zh = 'zh';

    /**
     * Chinese (S)
     */
    case zh_CN = 'zh-CN';

    /**
     * Chinese (Hong Kong)
     */
    case zh_HK = 'zh-HK';

    /**
     * Chinese (Macau)
     */
    case zh_MO = 'zh-MO';

    /**
     * Chinese (Singapore)
     */
    case zh_SG = 'zh-SG';

    /**
     * Chinese (T)
     */
    case zh_TW = 'zh-TW';

    /**
     * Zulu
     */
    case zu = 'zu';

    /**
     * Zulu (South Africa)
     */
    case zu_ZA = 'zu-ZA';
}
