<?php

namespace KostasChasiotis\OctoTravel\Domain\Enums;

/**
 * IANA TimeZone List
 * 
 * Based on https://nodatime.org/TimeZones
 * 
 * https://nodatime.org/TimeZones?version=2024b&format=json
 */

enum TimeZone: string
{
    /**
     * Côte d'Ivoire
     * 
     * +00 (GMT)
     */
    case Africa_Abidjan = 'Africa/Abidjan';

    /**
     * Algeria
     * 
     * +01 (CET)
     */
    case Africa_Algiers = 'Africa/Algiers';

    /**
     * Guinea-Bissau
     * 
     * +00 (GMT)
     */
    case Africa_Bissau = 'Africa/Bissau';

    /**
     * Egypt
     * 
     * +02 (EET)
     */
    case Africa_Cairo = 'Africa/Cairo';

    /**
     * Morocco
     * 
     * +01 (+01)
     */
    case Africa_Casablanca = 'Africa/Casablanca';

    /**
     * Spain
     * 
     * +01 (CET)
     */
    case Africa_Ceuta = 'Africa/Ceuta';

    /**
     * Western Sahara
     * 
     * +01 (+01)
     */
    case Africa_El_Aaiun = 'Africa/El_Aaiun';

    /**
     * South Africa
     * 
     * +02 (SAST)
     */
    case Africa_Johannesburg = 'Africa/Johannesburg';

    /**
     * South Sudan
     * 
     * +02 (CAT)
     */
    case Africa_Juba = 'Africa/Juba';

    /**
     * Sudan
     * 
     * +02 (CAT)
     */
    case Africa_Khartoum = 'Africa/Khartoum';

    /**
     * Nigeria
     * 
     * +01 (WAT)
     */
    case Africa_Lagos = 'Africa/Lagos';

    /**
     * Mozambique
     * 
     * +02 (CAT)
     */
    case Africa_Maputo = 'Africa/Maputo';

    /**
     * Liberia
     * 
     * +00 (GMT)
     */
    case Africa_Monrovia = 'Africa/Monrovia';

    /**
     * Kenya
     * 
     * +03 (EAT)
     */
    case Africa_Nairobi = 'Africa/Nairobi';

    /**
     * Chad
     * 
     * +01 (WAT)
     */
    case Africa_Ndjamena = 'Africa/Ndjamena';

    /**
     * Sao Tome & Principe
     * 
     * +00 (GMT)
     */
    case Africa_Sao_Tome = 'Africa/Sao_Tome';

    /**
     * Libya
     * 
     * +02 (EET)
     */
    case Africa_Tripoli = 'Africa/Tripoli';

    /**
     * Tunisia
     * 
     * +01 (CET)
     */
    case Africa_Tunis = 'Africa/Tunis';

    /**
     * Namibia
     * 
     * +02 (CAT)
     */
    case Africa_Windhoek = 'Africa/Windhoek';

    /**
     * United States
     * 
     * -10 (HST)
     */
    case America_Adak = 'America/Adak';

    /**
     * United States
     * 
     * -09 (AKST)
     */
    case America_Anchorage = 'America/Anchorage';

    /**
     * Brazil
     * 
     * -03 (-03)
     */
    case America_Araguaina = 'America/Araguaina';

    /**
     * Argentina
     * 
     * -03 (-03)
     */
    case America_Argentina_Buenos_Aires = 'America/Argentina/Buenos_Aires';

    /**
     * Argentina
     * 
     * -03 (-03)
     */
    case America_Argentina_Catamarca = 'America/Argentina/Catamarca';

    /**
     * Argentina
     * 
     * -03 (-03)
     */
    case America_Argentina_Cordoba = 'America/Argentina/Cordoba';

    /**
     * Argentina
     * 
     * -03 (-03)
     */
    case America_Argentina_Jujuy = 'America/Argentina/Jujuy';

    /**
     * Argentina
     * 
     * -03 (-03)
     */
    case America_Argentina_La_Rioja = 'America/Argentina/La_Rioja';

    /**
     * Argentina
     * 
     * -03 (-03)
     */
    case America_Argentina_Mendoza = 'America/Argentina/Mendoza';

    /**
     * Argentina
     * 
     * -03 (-03)
     */
    case America_Argentina_Rio_Gallegos = 'America/Argentina/Rio_Gallegos';

    /**
     * Argentina
     * 
     * -03 (-03)
     */
    case America_Argentina_Salta = 'America/Argentina/Salta';

    /**
     * Argentina
     * 
     * -03 (-03)
     */
    case America_Argentina_San_Juan = 'America/Argentina/San_Juan';

    /**
     * Argentina
     * 
     * -03 (-03)
     */
    case America_Argentina_San_Luis = 'America/Argentina/San_Luis';

    /**
     * Argentina
     * 
     * -03 (-03)
     */
    case America_Argentina_Tucuman = 'America/Argentina/Tucuman';

    /**
     * Argentina
     * 
     * -03 (-03)
     */
    case America_Argentina_Ushuaia = 'America/Argentina/Ushuaia';

    /**
     * Paraguay
     * 
     * -03 (-03)
     */
    case America_Asuncion = 'America/Asuncion';

    /**
     * Brazil
     * 
     * -03 (-03)
     */
    case America_Bahia = 'America/Bahia';

    /**
     * Mexico
     * 
     * -06 (CST)
     */
    case America_Bahia_Banderas = 'America/Bahia_Banderas';

    /**
     * Barbados
     * 
     * -04 (AST)
     */
    case America_Barbados = 'America/Barbados';

    /**
     * Brazil
     * 
     * -03 (-03)
     */
    case America_Belem = 'America/Belem';

    /**
     * Belize
     * 
     * -06 (CST)
     */
    case America_Belize = 'America/Belize';

    /**
     * Brazil
     * 
     * -04 (-04)
     */
    case America_Boa_Vista = 'America/Boa_Vista';

    /**
     * Colombia
     * 
     * -05 (-05)
     */
    case America_Bogota = 'America/Bogota';

    /**
     * United States
     * 
     * -07 (MST)
     */
    case America_Boise = 'America/Boise';

    /**
     * Canada
     * 
     * -07 (MST)
     */
    case America_Cambridge_Bay = 'America/Cambridge_Bay';

    /**
     * Brazil
     * 
     * -04 (-04)
     */
    case America_Campo_Grande = 'America/Campo_Grande';

    /**
     * Mexico
     * 
     * -05 (EST)
     */
    case America_Cancun = 'America/Cancun';

    /**
     * Venezuela
     * 
     * -04 (-04)
     */
    case America_Caracas = 'America/Caracas';

    /**
     * French Guiana
     * 
     * -03 (-03)
     */
    case America_Cayenne = 'America/Cayenne';

    /**
     * United States
     * 
     * -06 (CST)
     */
    case America_Chicago = 'America/Chicago';

    /**
     * Mexico
     * 
     * -06 (CST)
     */
    case America_Chihuahua = 'America/Chihuahua';

    /**
     * Mexico
     * 
     * -07 (MST)
     */
    case America_Ciudad_Juarez = 'America/Ciudad_Juarez';

    /**
     * Costa Rica
     * 
     * -06 (CST)
     */
    case America_Costa_Rica = 'America/Costa_Rica';

    /**
     * Brazil
     * 
     * -04 (-04)
     */
    case America_Cuiaba = 'America/Cuiaba';

    /**
     * Greenland
     * 
     * +00 (GMT)
     */
    case America_Danmarkshavn = 'America/Danmarkshavn';

    /**
     * Canada
     * 
     * -07 (MST)
     */
    case America_Dawson = 'America/Dawson';

    /**
     * Canada
     * 
     * -07 (MST)
     */
    case America_Dawson_Creek = 'America/Dawson_Creek';

    /**
     * United States
     * 
     * -07 (MST)
     */
    case America_Denver = 'America/Denver';

    /**
     * United States
     * 
     * -05 (EST)
     */
    case America_Detroit = 'America/Detroit';

    /**
     * Canada
     * 
     * -07 (MST)
     */
    case America_Edmonton = 'America/Edmonton';

    /**
     * Brazil
     * 
     * -05 (-05)
     */
    case America_Eirunepe = 'America/Eirunepe';

    /**
     * El Salvador
     * 
     * -06 (CST)
     */
    case America_El_Salvador = 'America/El_Salvador';

    /**
     * Canada
     * 
     * -07 (MST)
     */
    case America_Fort_Nelson = 'America/Fort_Nelson';

    /**
     * Brazil
     * 
     * -03 (-03)
     */
    case America_Fortaleza = 'America/Fortaleza';

    /**
     * Canada
     * 
     * -04 (AST)
     */
    case America_Glace_Bay = 'America/Glace_Bay';

    /**
     * Canada
     * 
     * -04 (AST)
     */
    case America_Goose_Bay = 'America/Goose_Bay';

    /**
     * Turks & Caicos Is
     * 
     * -05 (EST)
     */
    case America_Grand_Turk = 'America/Grand_Turk';

    /**
     * Guatemala
     * 
     * -06 (CST)
     */
    case America_Guatemala = 'America/Guatemala';

    /**
     * Ecuador
     * 
     * -05 (-05)
     */
    case America_Guayaquil = 'America/Guayaquil';

    /**
     * Guyana
     * 
     * -04 (-04)
     */
    case America_Guyana = 'America/Guyana';

    /**
     * Canada
     * 
     * -04 (AST)
     */
    case America_Halifax = 'America/Halifax';

    /**
     * Cuba
     * 
     * -05 (CST)
     */
    case America_Havana = 'America/Havana';

    /**
     * Mexico
     * 
     * -07 (MST)
     */
    case America_Hermosillo = 'America/Hermosillo';

    /**
     * United States
     * 
     * -05 (EST)
     */
    case America_Indiana_Indianapolis = 'America/Indiana/Indianapolis';

    /**
     * United States
     * 
     * -06 (CST)
     */
    case America_Indiana_Knox = 'America/Indiana/Knox';

    /**
     * United States
     * 
     * -05 (EST)
     */
    case America_Indiana_Marengo = 'America/Indiana/Marengo';

    /**
     * United States
     * 
     * -05 (EST)
     */
    case America_Indiana_Petersburg = 'America/Indiana/Petersburg';

    /**
     * United States
     * 
     * -06 (CST)
     */
    case America_Indiana_Tell_City = 'America/Indiana/Tell_City';

    /**
     * United States
     * 
     * -05 (EST)
     */
    case America_Indiana_Vevay = 'America/Indiana/Vevay';

    /**
     * United States
     * 
     * -05 (EST)
     */
    case America_Indiana_Vincennes = 'America/Indiana/Vincennes';

    /**
     * United States
     * 
     * -05 (EST)
     */
    case America_Indiana_Winamac = 'America/Indiana/Winamac';

    /**
     * Canada
     * 
     * -07 (MST)
     */
    case America_Inuvik = 'America/Inuvik';

    /**
     * Canada
     * 
     * -05 (EST)
     */
    case America_Iqaluit = 'America/Iqaluit';

    /**
     * Jamaica
     * 
     * -05 (EST)
     */
    case America_Jamaica = 'America/Jamaica';

    /**
     * United States
     * 
     * -09 (AKST)
     */
    case America_Juneau = 'America/Juneau';

    /**
     * United States
     * 
     * -05 (EST)
     */
    case America_Kentucky_Louisville = 'America/Kentucky/Louisville';

    /**
     * United States
     * 
     * -05 (EST)
     */
    case America_Kentucky_Monticello = 'America/Kentucky/Monticello';

    /**
     * Bolivia
     * 
     * -04 (-04)
     */
    case America_La_Paz = 'America/La_Paz';

    /**
     * Peru
     * 
     * -05 (-05)
     */
    case America_Lima = 'America/Lima';

    /**
     * United States
     * 
     * -08 (PST)
     */
    case America_Los_Angeles = 'America/Los_Angeles';

    /**
     * Brazil
     * 
     * -03 (-03)
     */
    case America_Maceio = 'America/Maceio';

    /**
     * Nicaragua
     * 
     * -06 (CST)
     */
    case America_Managua = 'America/Managua';

    /**
     * Brazil
     * 
     * -04 (-04)
     */
    case America_Manaus = 'America/Manaus';

    /**
     * Martinique
     * 
     * -04 (AST)
     */
    case America_Martinique = 'America/Martinique';

    /**
     * Mexico
     * 
     * -06 (CST)
     */
    case America_Matamoros = 'America/Matamoros';

    /**
     * Mexico
     * 
     * -07 (MST)
     */
    case America_Mazatlan = 'America/Mazatlan';

    /**
     * United States
     * 
     * -06 (CST)
     */
    case America_Menominee = 'America/Menominee';

    /**
     * Mexico
     * 
     * -06 (CST)
     */
    case America_Merida = 'America/Merida';

    /**
     * United States
     * 
     * -09 (AKST)
     */
    case America_Metlakatla = 'America/Metlakatla';

    /**
     * Mexico
     * 
     * -06 (CST)
     */
    case America_Mexico_City = 'America/Mexico_City';

    /**
     * St Pierre & Miquelon
     * 
     * -03 (-03)
     */
    case America_Miquelon = 'America/Miquelon';

    /**
     * Canada
     * 
     * -04 (AST)
     */
    case America_Moncton = 'America/Moncton';

    /**
     * Mexico
     * 
     * -06 (CST)
     */
    case America_Monterrey = 'America/Monterrey';

    /**
     * Uruguay
     * 
     * -03 (-03)
     */
    case America_Montevideo = 'America/Montevideo';

    /**
     * United States
     * 
     * -05 (EST)
     */
    case America_New_York = 'America/New_York';

    /**
     * United States
     * 
     * -09 (AKST)
     */
    case America_Nome = 'America/Nome';

    /**
     * Brazil
     * 
     * -02 (-02)
     */
    case America_Noronha = 'America/Noronha';

    /**
     * United States
     * 
     * -06 (CST)
     */
    case America_North_Dakota_Beulah = 'America/North_Dakota/Beulah';

    /**
     * United States
     * 
     * -06 (CST)
     */
    case America_North_Dakota_Center = 'America/North_Dakota/Center';

    /**
     * United States
     * 
     * -06 (CST)
     */
    case America_North_Dakota_New_Salem = 'America/North_Dakota/New_Salem';

    /**
     * Greenland
     * 
     * -02 (-02)
     */
    case America_Nuuk = 'America/Nuuk';

    /**
     * Mexico
     * 
     * -06 (CST)
     */
    case America_Ojinaga = 'America/Ojinaga';

    /**
     * Panama
     * 
     * -05 (EST)
     */
    case America_Panama = 'America/Panama';

    /**
     * Suriname
     * 
     * -03 (-03)
     */
    case America_Paramaribo = 'America/Paramaribo';

    /**
     * United States
     * 
     * -07 (MST)
     */
    case America_Phoenix = 'America/Phoenix';

    /**
     * Haiti
     * 
     * -05 (EST)
     */
    case America_Port_au_Prince = 'America/Port-au-Prince';

    /**
     * Brazil
     * 
     * -04 (-04)
     */
    case America_Porto_Velho = 'America/Porto_Velho';

    /**
     * Puerto Rico
     * 
     * -04 (AST)
     */
    case America_Puerto_Rico = 'America/Puerto_Rico';

    /**
     * Chile
     * 
     * -03 (-03)
     */
    case America_Punta_Arenas = 'America/Punta_Arenas';

    /**
     * Canada
     * 
     * -06 (CST)
     */
    case America_Rankin_Inlet = 'America/Rankin_Inlet';

    /**
     * Brazil
     * 
     * -03 (-03)
     */
    case America_Recife = 'America/Recife';

    /**
     * Canada
     * 
     * -06 (CST)
     */
    case America_Regina = 'America/Regina';

    /**
     * Canada
     * 
     * -06 (CST)
     */
    case America_Resolute = 'America/Resolute';

    /**
     * Brazil
     * 
     * -05 (-05)
     */
    case America_Rio_Branco = 'America/Rio_Branco';

    /**
     * Brazil
     * 
     * -03 (-03)
     */
    case America_Santarem = 'America/Santarem';

    /**
     * Chile
     * 
     * -03 (-03)
     */
    case America_Santiago = 'America/Santiago';

    /**
     * Dominican Republic
     * 
     * -04 (AST)
     */
    case America_Santo_Domingo = 'America/Santo_Domingo';

    /**
     * Brazil
     * 
     * -03 (-03)
     */
    case America_Sao_Paulo = 'America/Sao_Paulo';

    /**
     * Greenland
     * 
     * -02 (-02)
     */
    case America_Scoresbysund = 'America/Scoresbysund';

    /**
     * United States
     * 
     * -09 (AKST)
     */
    case America_Sitka = 'America/Sitka';

    /**
     * Canada
     * 
     * -03:30 (NST)
     */
    case America_St_Johns = 'America/St_Johns';

    /**
     * Canada
     * 
     * -06 (CST)
     */
    case America_Swift_Current = 'America/Swift_Current';

    /**
     * Honduras
     * 
     * -06 (CST)
     */
    case America_Tegucigalpa = 'America/Tegucigalpa';

    /**
     * Greenland
     * 
     * -04 (AST)
     */
    case America_Thule = 'America/Thule';

    /**
     * Mexico
     * 
     * -08 (PST)
     */
    case America_Tijuana = 'America/Tijuana';

    /**
     * Canada
     * 
     * -05 (EST)
     */
    case America_Toronto = 'America/Toronto';

    /**
     * Canada
     * 
     * -08 (PST)
     */
    case America_Vancouver = 'America/Vancouver';

    /**
     * Canada
     * 
     * -07 (MST)
     */
    case America_Whitehorse = 'America/Whitehorse';

    /**
     * Canada
     * 
     * -06 (CST)
     */
    case America_Winnipeg = 'America/Winnipeg';

    /**
     * United States
     * 
     * -09 (AKST)
     */
    case America_Yakutat = 'America/Yakutat';

    /**
     * Antarctica
     * 
     * +08 (+08)
     */
    case Antarctica_Casey = 'Antarctica/Casey';

    /**
     * Antarctica
     * 
     * +07 (+07)
     */
    case Antarctica_Davis = 'Antarctica/Davis';

    /**
     * Australia
     * 
     * +11 (AEDT)
     */
    case Antarctica_Macquarie = 'Antarctica/Macquarie';

    /**
     * Antarctica
     * 
     * +05 (+05)
     */
    case Antarctica_Mawson = 'Antarctica/Mawson';

    /**
     * Antarctica
     * 
     * -03 (-03)
     */
    case Antarctica_Palmer = 'Antarctica/Palmer';

    /**
     * Antarctica
     * 
     * -03 (-03)
     */
    case Antarctica_Rothera = 'Antarctica/Rothera';

    /**
     * Antarctica
     * 
     * +00 (+00)
     */
    case Antarctica_Troll = 'Antarctica/Troll';

    /**
     * Antarctica
     * 
     * +05 (+05)
     */
    case Antarctica_Vostok = 'Antarctica/Vostok';

    /**
     * Kazakhstan
     * 
     * +05 (+05)
     */
    case Asia_Almaty = 'Asia/Almaty';

    /**
     * Jordan
     * 
     * +03 (+03)
     */
    case Asia_Amman = 'Asia/Amman';

    /**
     * Russia
     * 
     * +12 (+12)
     */
    case Asia_Anadyr = 'Asia/Anadyr';

    /**
     * Kazakhstan
     * 
     * +05 (+05)
     */
    case Asia_Aqtau = 'Asia/Aqtau';

    /**
     * Kazakhstan
     * 
     * +05 (+05)
     */
    case Asia_Aqtobe = 'Asia/Aqtobe';

    /**
     * Turkmenistan
     * 
     * +05 (+05)
     */
    case Asia_Ashgabat = 'Asia/Ashgabat';

    /**
     * Kazakhstan
     * 
     * +05 (+05)
     */
    case Asia_Atyrau = 'Asia/Atyrau';

    /**
     * Iraq
     * 
     * +03 (+03)
     */
    case Asia_Baghdad = 'Asia/Baghdad';

    /**
     * Azerbaijan
     * 
     * +04 (+04)
     */
    case Asia_Baku = 'Asia/Baku';

    /**
     * Thailand
     * 
     * +07 (+07)
     */
    case Asia_Bangkok = 'Asia/Bangkok';

    /**
     * Russia
     * 
     * +07 (+07)
     */
    case Asia_Barnaul = 'Asia/Barnaul';

    /**
     * Lebanon
     * 
     * +02 (EET)
     */
    case Asia_Beirut = 'Asia/Beirut';

    /**
     * Kyrgyzstan
     * 
     * +06 (+06)
     */
    case Asia_Bishkek = 'Asia/Bishkek';

    /**
     * Russia
     * 
     * +09 (+09)
     */
    case Asia_Chita = 'Asia/Chita';

    /**
     * Sri Lanka
     * 
     * +05:30 (+0530)
     */
    case Asia_Colombo = 'Asia/Colombo';

    /**
     * Syria
     * 
     * +03 (+03)
     */
    case Asia_Damascus = 'Asia/Damascus';

    /**
     * Bangladesh
     * 
     * +06 (+06)
     */
    case Asia_Dhaka = 'Asia/Dhaka';

    /**
     * East Timor
     * 
     * +09 (+09)
     */
    case Asia_Dili = 'Asia/Dili';

    /**
     * United Arab Emirates
     * 
     * +04 (+04)
     */
    case Asia_Dubai = 'Asia/Dubai';

    /**
     * Tajikistan
     * 
     * +05 (+05)
     */
    case Asia_Dushanbe = 'Asia/Dushanbe';

    /**
     * Cyprus
     * 
     * +02 (EET)
     */
    case Asia_Famagusta = 'Asia/Famagusta';

    /**
     * Palestine
     * 
     * +02 (EET)
     */
    case Asia_Gaza = 'Asia/Gaza';

    /**
     * Palestine
     * 
     * +02 (EET)
     */
    case Asia_Hebron = 'Asia/Hebron';

    /**
     * Vietnam
     * 
     * +07 (+07)
     */
    case Asia_Ho_Chi_Minh = 'Asia/Ho_Chi_Minh';

    /**
     * Hong Kong
     * 
     * +08 (HKT)
     */
    case Asia_Hong_Kong = 'Asia/Hong_Kong';

    /**
     * Mongolia
     * 
     * +07 (+07)
     */
    case Asia_Hovd = 'Asia/Hovd';

    /**
     * Russia
     * 
     * +08 (+08)
     */
    case Asia_Irkutsk = 'Asia/Irkutsk';

    /**
     * Indonesia
     * 
     * +07 (WIB)
     */
    case Asia_Jakarta = 'Asia/Jakarta';

    /**
     * Indonesia
     * 
     * +09 (WIT)
     */
    case Asia_Jayapura = 'Asia/Jayapura';

    /**
     * Israel
     * 
     * +02 (IST)
     */
    case Asia_Jerusalem = 'Asia/Jerusalem';

    /**
     * Afghanistan
     * 
     * +04:30 (+0430)
     */
    case Asia_Kabul = 'Asia/Kabul';

    /**
     * Russia
     * 
     * +12 (+12)
     */
    case Asia_Kamchatka = 'Asia/Kamchatka';

    /**
     * Pakistan
     * 
     * +05 (PKT)
     */
    case Asia_Karachi = 'Asia/Karachi';

    /**
     * Nepal
     * 
     * +05:45 (+0545)
     */
    case Asia_Kathmandu = 'Asia/Kathmandu';

    /**
     * Russia
     * 
     * +09 (+09)
     */
    case Asia_Khandyga = 'Asia/Khandyga';

    /**
     * India
     * 
     * +05:30 (IST)
     */
    case Asia_Kolkata = 'Asia/Kolkata';

    /**
     * Russia
     * 
     * +07 (+07)
     */
    case Asia_Krasnoyarsk = 'Asia/Krasnoyarsk';

    /**
     * Malaysia
     * 
     * +08 (+08)
     */
    case Asia_Kuching = 'Asia/Kuching';

    /**
     * Macau
     * 
     * +08 (CST)
     */
    case Asia_Macau = 'Asia/Macau';

    /**
     * Russia
     * 
     * +11 (+11)
     */
    case Asia_Magadan = 'Asia/Magadan';

    /**
     * Indonesia
     * 
     * +08 (WITA)
     */
    case Asia_Makassar = 'Asia/Makassar';

    /**
     * Philippines
     * 
     * +08 (PST)
     */
    case Asia_Manila = 'Asia/Manila';

    /**
     * Cyprus
     * 
     * +02 (EET)
     */
    case Asia_Nicosia = 'Asia/Nicosia';

    /**
     * Russia
     * 
     * +07 (+07)
     */
    case Asia_Novokuznetsk = 'Asia/Novokuznetsk';

    /**
     * Russia
     * 
     * +07 (+07)
     */
    case Asia_Novosibirsk = 'Asia/Novosibirsk';

    /**
     * Russia
     * 
     * +06 (+06)
     */
    case Asia_Omsk = 'Asia/Omsk';

    /**
     * Kazakhstan
     * 
     * +05 (+05)
     */
    case Asia_Oral = 'Asia/Oral';

    /**
     * Indonesia
     * 
     * +07 (WIB)
     */
    case Asia_Pontianak = 'Asia/Pontianak';

    /**
     * Korea (North)
     * 
     * +09 (KST)
     */
    case Asia_Pyongyang = 'Asia/Pyongyang';

    /**
     * Qatar
     * 
     * +03 (+03)
     */
    case Asia_Qatar = 'Asia/Qatar';

    /**
     * Kazakhstan
     * 
     * +05 (+05)
     */
    case Asia_Qostanay = 'Asia/Qostanay';

    /**
     * Kazakhstan
     * 
     * +05 (+05)
     */
    case Asia_Qyzylorda = 'Asia/Qyzylorda';

    /**
     * Saudi Arabia
     * 
     * +03 (+03)
     */
    case Asia_Riyadh = 'Asia/Riyadh';

    /**
     * Russia
     * 
     * +11 (+11)
     */
    case Asia_Sakhalin = 'Asia/Sakhalin';

    /**
     * Uzbekistan
     * 
     * +05 (+05)
     */
    case Asia_Samarkand = 'Asia/Samarkand';

    /**
     * Korea (South)
     * 
     * +09 (KST)
     */
    case Asia_Seoul = 'Asia/Seoul';

    /**
     * China
     * 
     * +08 (CST)
     */
    case Asia_Shanghai = 'Asia/Shanghai';

    /**
     * Singapore
     * 
     * +08 (+08)
     */
    case Asia_Singapore = 'Asia/Singapore';

    /**
     * Russia
     * 
     * +11 (+11)
     */
    case Asia_Srednekolymsk = 'Asia/Srednekolymsk';

    /**
     * Taiwan
     * 
     * +08 (CST)
     */
    case Asia_Taipei = 'Asia/Taipei';

    /**
     * Uzbekistan
     * 
     * +05 (+05)
     */
    case Asia_Tashkent = 'Asia/Tashkent';

    /**
     * Georgia
     * 
     * +04 (+04)
     */
    case Asia_Tbilisi = 'Asia/Tbilisi';

    /**
     * Iran
     * 
     * +03:30 (+0330)
     */
    case Asia_Tehran = 'Asia/Tehran';

    /**
     * Bhutan
     * 
     * +06 (+06)
     */
    case Asia_Thimphu = 'Asia/Thimphu';

    /**
     * Japan
     * 
     * +09 (JST)
     */
    case Asia_Tokyo = 'Asia/Tokyo';

    /**
     * Russia
     * 
     * +07 (+07)
     */
    case Asia_Tomsk = 'Asia/Tomsk';

    /**
     * Mongolia
     * 
     * +08 (+08)
     */
    case Asia_Ulaanbaatar = 'Asia/Ulaanbaatar';

    /**
     * China
     * 
     * +06 (+06)
     */
    case Asia_Urumqi = 'Asia/Urumqi';

    /**
     * Russia
     * 
     * +10 (+10)
     */
    case Asia_Ust_Nera = 'Asia/Ust-Nera';

    /**
     * Russia
     * 
     * +10 (+10)
     */
    case Asia_Vladivostok = 'Asia/Vladivostok';

    /**
     * Russia
     * 
     * +09 (+09)
     */
    case Asia_Yakutsk = 'Asia/Yakutsk';

    /**
     * Myanmar (Burma)
     * 
     * +06:30 (+0630)
     */
    case Asia_Yangon = 'Asia/Yangon';

    /**
     * Russia
     * 
     * +05 (+05)
     */
    case Asia_Yekaterinburg = 'Asia/Yekaterinburg';

    /**
     * Armenia
     * 
     * +04 (+04)
     */
    case Asia_Yerevan = 'Asia/Yerevan';

    /**
     * Portugal
     * 
     * -01 (-01)
     */
    case Atlantic_Azores = 'Atlantic/Azores';

    /**
     * Bermuda
     * 
     * -04 (AST)
     */
    case Atlantic_Bermuda = 'Atlantic/Bermuda';

    /**
     * Spain
     * 
     * +00 (WET)
     */
    case Atlantic_Canary = 'Atlantic/Canary';

    /**
     * Cape Verde
     * 
     * -01 (-01)
     */
    case Atlantic_Cape_Verde = 'Atlantic/Cape_Verde';

    /**
     * Faroe Islands
     * 
     * +00 (WET)
     */
    case Atlantic_Faroe = 'Atlantic/Faroe';

    /**
     * Portugal
     * 
     * +00 (WET)
     */
    case Atlantic_Madeira = 'Atlantic/Madeira';

    /**
     * South Georgia & the South Sandwich Islands
     * 
     * -02 (-02)
     */
    case Atlantic_South_Georgia = 'Atlantic/South_Georgia';

    /**
     * Falkland Islands
     * 
     * -03 (-03)
     */
    case Atlantic_Stanley = 'Atlantic/Stanley';

    /**
     * Australia
     * 
     * +10:30 (ACDT)
     */
    case Australia_Adelaide = 'Australia/Adelaide';

    /**
     * Australia
     * 
     * +10 (AEST)
     */
    case Australia_Brisbane = 'Australia/Brisbane';

    /**
     * Australia
     * 
     * +10:30 (ACDT)
     */
    case Australia_Broken_Hill = 'Australia/Broken_Hill';

    /**
     * Australia
     * 
     * +09:30 (ACST)
     */
    case Australia_Darwin = 'Australia/Darwin';

    /**
     * Australia
     * 
     * +08:45 (+0845)
     */
    case Australia_Eucla = 'Australia/Eucla';

    /**
     * Australia
     * 
     * +11 (AEDT)
     */
    case Australia_Hobart = 'Australia/Hobart';

    /**
     * Australia
     * 
     * +10 (AEST)
     */
    case Australia_Lindeman = 'Australia/Lindeman';

    /**
     * Australia
     * 
     * +11 (+11)
     */
    case Australia_Lord_Howe = 'Australia/Lord_Howe';

    /**
     * Australia
     * 
     * +11 (AEDT)
     */
    case Australia_Melbourne = 'Australia/Melbourne';

    /**
     * Australia
     * 
     * +08 (AWST)
     */
    case Australia_Perth = 'Australia/Perth';

    /**
     * Australia
     * 
     * +11 (AEDT)
     */
    case Australia_Sydney = 'Australia/Sydney';

    /**
     * Etc/GMT
     * 
     * +00 (GMT)
     */
    case Etc_GMT = 'Etc/GMT';

    /**
     * Etc/GMT-1
     * 
     * +01 (+01)
     */
    case Etc_GMT_MINUS_1 = 'Etc/GMT-1';

    /**
     * Etc/GMT-10
     * 
     * +10 (+10)
     */
    case Etc_GMT_MINUS_10 = 'Etc/GMT-10';

    /**
     * Etc/GMT-11
     * 
     * +11 (+11)
     */
    case Etc_GMT_MINUS_11 = 'Etc/GMT-11';

    /**
     * Etc/GMT-12
     * 
     * +12 (+12)
     */
    case Etc_GMT_MINUS_12 = 'Etc/GMT-12';

    /**
     * Etc/GMT-13
     * 
     * +13 (+13)
     */
    case Etc_GMT_MINUS_13 = 'Etc/GMT-13';

    /**
     * Etc/GMT-14
     * 
     * +14 (+14)
     */
    case Etc_GMT_MINUS_14 = 'Etc/GMT-14';

    /**
     * Etc/GMT-2
     * 
     * +02 (+02)
     */
    case Etc_GMT_MINUS_2 = 'Etc/GMT-2';

    /**
     * Etc/GMT-3
     * 
     * +03 (+03)
     */
    case Etc_GMT_MINUS_3 = 'Etc/GMT-3';

    /**
     * Etc/GMT-4
     * 
     * +04 (+04)
     */
    case Etc_GMT_MINUS_4 = 'Etc/GMT-4';

    /**
     * Etc/GMT-5
     * 
     * +05 (+05)
     */
    case Etc_GMT_MINUS_5 = 'Etc/GMT-5';

    /**
     * Etc/GMT-6
     * 
     * +06 (+06)
     */
    case Etc_GMT_MINUS_6 = 'Etc/GMT-6';

    /**
     * Etc/GMT-7
     * 
     * +07 (+07)
     */
    case Etc_GMT_MINUS_7 = 'Etc/GMT-7';

    /**
     * Etc/GMT-8
     * 
     * +08 (+08)
     */
    case Etc_GMT_MINUS_8 = 'Etc/GMT-8';

    /**
     * Etc/GMT-9
     * 
     * +09 (+09)
     */
    case Etc_GMT_MINUS_9 = 'Etc/GMT-9';

    /**
     * Etc/GMT+1
     * 
     * -01 (-01)
     */
    case Etc_GMT_PLUS_1 = 'Etc/GMT+1';

    /**
     * Etc/GMT+10
     * 
     * -10 (-10)
     */
    case Etc_GMT_PLUS_10 = 'Etc/GMT+10';

    /**
     * Etc/GMT+11
     * 
     * -11 (-11)
     */
    case Etc_GMT_PLUS_11 = 'Etc/GMT+11';

    /**
     * Etc/GMT+12
     * 
     * -12 (-12)
     */
    case Etc_GMT_PLUS_12 = 'Etc/GMT+12';

    /**
     * Etc/GMT+2
     * 
     * -02 (-02)
     */
    case Etc_GMT_PLUS_2 = 'Etc/GMT+2';

    /**
     * Etc/GMT+3
     * 
     * -03 (-03)
     */
    case Etc_GMT_PLUS_3 = 'Etc/GMT+3';

    /**
     * Etc/GMT+4
     * 
     * -04 (-04)
     */
    case Etc_GMT_PLUS_4 = 'Etc/GMT+4';

    /**
     * Etc/GMT+5
     * 
     * -05 (-05)
     */
    case Etc_GMT_PLUS_5 = 'Etc/GMT+5';

    /**
     * Etc/GMT+6
     * 
     * -06 (-06)
     */
    case Etc_GMT_PLUS_6 = 'Etc/GMT+6';

    /**
     * Etc/GMT+7
     * 
     * -07 (-07)
     */
    case Etc_GMT_PLUS_7 = 'Etc/GMT+7';

    /**
     * Etc/GMT+8
     * 
     * -08 (-08)
     */
    case Etc_GMT_PLUS_8 = 'Etc/GMT+8';

    /**
     * Etc/GMT+9
     * 
     * -09 (-09)
     */
    case Etc_GMT_PLUS_9 = 'Etc/GMT+9';

    /**
     * Etc/UTC
     * 
     * +00 (UTC)
     */
    case Etc_UTC = 'Etc/UTC';

    /**
     * Andorra
     * 
     * +01 (CET)
     */
    case Europe_Andorra = 'Europe/Andorra';

    /**
     * Russia
     * 
     * +04 (+04)
     */
    case Europe_Astrakhan = 'Europe/Astrakhan';

    /**
     * Greece
     * 
     * +02 (EET)
     */
    case Europe_Athens = 'Europe/Athens';

    /**
     * Serbia
     * 
     * +01 (CET)
     */
    case Europe_Belgrade = 'Europe/Belgrade';

    /**
     * Germany
     * 
     * +01 (CET)
     */
    case Europe_Berlin = 'Europe/Berlin';

    /**
     * Belgium
     * 
     * +01 (CET)
     */
    case Europe_Brussels = 'Europe/Brussels';

    /**
     * Romania
     * 
     * +02 (EET)
     */
    case Europe_Bucharest = 'Europe/Bucharest';

    /**
     * Hungary
     * 
     * +01 (CET)
     */
    case Europe_Budapest = 'Europe/Budapest';

    /**
     * Moldova
     * 
     * +02 (EET)
     */
    case Europe_Chisinau = 'Europe/Chisinau';

    /**
     * Ireland
     * 
     * +00 (GMT)
     */
    case Europe_Dublin = 'Europe/Dublin';

    /**
     * Gibraltar
     * 
     * +01 (CET)
     */
    case Europe_Gibraltar = 'Europe/Gibraltar';

    /**
     * Finland
     * 
     * +02 (EET)
     */
    case Europe_Helsinki = 'Europe/Helsinki';

    /**
     * Turkey
     * 
     * +03 (+03)
     */
    case Europe_Istanbul = 'Europe/Istanbul';

    /**
     * Russia
     * 
     * +02 (EET)
     */
    case Europe_Kaliningrad = 'Europe/Kaliningrad';

    /**
     * Russia
     * 
     * +03 (MSK)
     */
    case Europe_Kirov = 'Europe/Kirov';

    /**
     * Ukraine
     * 
     * +02 (EET)
     */
    case Europe_Kyiv = 'Europe/Kyiv';

    /**
     * Portugal
     * 
     * +00 (WET)
     */
    case Europe_Lisbon = 'Europe/Lisbon';

    /**
     * Britain (UK)
     * 
     * +00 (GMT)
     */
    case Europe_London = 'Europe/London';

    /**
     * Spain
     * 
     * +01 (CET)
     */
    case Europe_Madrid = 'Europe/Madrid';

    /**
     * Malta
     * 
     * +01 (CET)
     */
    case Europe_Malta = 'Europe/Malta';

    /**
     * Belarus
     * 
     * +03 (+03)
     */
    case Europe_Minsk = 'Europe/Minsk';

    /**
     * Russia
     * 
     * +03 (MSK)
     */
    case Europe_Moscow = 'Europe/Moscow';

    /**
     * France
     * 
     * +01 (CET)
     */
    case Europe_Paris = 'Europe/Paris';

    /**
     * Czech Republic
     * 
     * +01 (CET)
     */
    case Europe_Prague = 'Europe/Prague';

    /**
     * Latvia
     * 
     * +02 (EET)
     */
    case Europe_Riga = 'Europe/Riga';

    /**
     * Italy
     * 
     * +01 (CET)
     */
    case Europe_Rome = 'Europe/Rome';

    /**
     * Russia
     * 
     * +04 (+04)
     */
    case Europe_Samara = 'Europe/Samara';

    /**
     * Russia
     * 
     * +04 (+04)
     */
    case Europe_Saratov = 'Europe/Saratov';

    /**
     * Ukraine
     * 
     * +03 (MSK)
     */
    case Europe_Simferopol = 'Europe/Simferopol';

    /**
     * Bulgaria
     * 
     * +02 (EET)
     */
    case Europe_Sofia = 'Europe/Sofia';

    /**
     * Estonia
     * 
     * +02 (EET)
     */
    case Europe_Tallinn = 'Europe/Tallinn';

    /**
     * Albania
     * 
     * +01 (CET)
     */
    case Europe_Tirane = 'Europe/Tirane';

    /**
     * Russia
     * 
     * +04 (+04)
     */
    case Europe_Ulyanovsk = 'Europe/Ulyanovsk';

    /**
     * Austria
     * 
     * +01 (CET)
     */
    case Europe_Vienna = 'Europe/Vienna';

    /**
     * Lithuania
     * 
     * +02 (EET)
     */
    case Europe_Vilnius = 'Europe/Vilnius';

    /**
     * Russia
     * 
     * +03 (MSK)
     */
    case Europe_Volgograd = 'Europe/Volgograd';

    /**
     * Poland
     * 
     * +01 (CET)
     */
    case Europe_Warsaw = 'Europe/Warsaw';

    /**
     * Switzerland
     * 
     * +01 (CET)
     */
    case Europe_Zurich = 'Europe/Zurich';

    /**
     * British Indian Ocean Territory
     * 
     * +06 (+06)
     */
    case Indian_Chagos = 'Indian/Chagos';

    /**
     * Maldives
     * 
     * +05 (+05)
     */
    case Indian_Maldives = 'Indian/Maldives';

    /**
     * Mauritius
     * 
     * +04 (+04)
     */
    case Indian_Mauritius = 'Indian/Mauritius';

    /**
     * Samoa (western)
     * 
     * +13 (+13)
     */
    case Pacific_Apia = 'Pacific/Apia';

    /**
     * New Zealand
     * 
     * +13 (NZDT)
     */
    case Pacific_Auckland = 'Pacific/Auckland';

    /**
     * Papua New Guinea
     * 
     * +11 (+11)
     */
    case Pacific_Bougainville = 'Pacific/Bougainville';

    /**
     * New Zealand
     * 
     * +13:45 (+1345)
     */
    case Pacific_Chatham = 'Pacific/Chatham';

    /**
     * Chile
     * 
     * -05 (-05)
     */
    case Pacific_Easter = 'Pacific/Easter';

    /**
     * Vanuatu
     * 
     * +11 (+11)
     */
    case Pacific_Efate = 'Pacific/Efate';

    /**
     * Tokelau
     * 
     * +13 (+13)
     */
    case Pacific_Fakaofo = 'Pacific/Fakaofo';

    /**
     * Fiji
     * 
     * +12 (+12)
     */
    case Pacific_Fiji = 'Pacific/Fiji';

    /**
     * Ecuador
     * 
     * -06 (-06)
     */
    case Pacific_Galapagos = 'Pacific/Galapagos';

    /**
     * French Polynesia
     * 
     * -09 (-09)
     */
    case Pacific_Gambier = 'Pacific/Gambier';

    /**
     * Solomon Islands
     * 
     * +11 (+11)
     */
    case Pacific_Guadalcanal = 'Pacific/Guadalcanal';

    /**
     * Guam
     * 
     * +10 (ChST)
     */
    case Pacific_Guam = 'Pacific/Guam';

    /**
     * United States
     * 
     * -10 (HST)
     */
    case Pacific_Honolulu = 'Pacific/Honolulu';

    /**
     * Kiribati
     * 
     * +13 (+13)
     */
    case Pacific_Kanton = 'Pacific/Kanton';

    /**
     * Kiribati
     * 
     * +14 (+14)
     */
    case Pacific_Kiritimati = 'Pacific/Kiritimati';

    /**
     * Micronesia
     * 
     * +11 (+11)
     */
    case Pacific_Kosrae = 'Pacific/Kosrae';

    /**
     * Marshall Islands
     * 
     * +12 (+12)
     */
    case Pacific_Kwajalein = 'Pacific/Kwajalein';

    /**
     * French Polynesia
     * 
     * -09:30 (-0930)
     */
    case Pacific_Marquesas = 'Pacific/Marquesas';

    /**
     * Nauru
     * 
     * +12 (+12)
     */
    case Pacific_Nauru = 'Pacific/Nauru';

    /**
     * Niue
     * 
     * -11 (-11)
     */
    case Pacific_Niue = 'Pacific/Niue';

    /**
     * Norfolk Island
     * 
     * +12 (+12)
     */
    case Pacific_Norfolk = 'Pacific/Norfolk';

    /**
     * New Caledonia
     * 
     * +11 (+11)
     */
    case Pacific_Noumea = 'Pacific/Noumea';

    /**
     * Samoa (American)
     * 
     * -11 (SST)
     */
    case Pacific_Pago_Pago = 'Pacific/Pago_Pago';

    /**
     * Palau
     * 
     * +09 (+09)
     */
    case Pacific_Palau = 'Pacific/Palau';

    /**
     * Pitcairn
     * 
     * -08 (-08)
     */
    case Pacific_Pitcairn = 'Pacific/Pitcairn';

    /**
     * Papua New Guinea
     * 
     * +10 (+10)
     */
    case Pacific_Port_Moresby = 'Pacific/Port_Moresby';

    /**
     * Cook Islands
     * 
     * -10 (-10)
     */
    case Pacific_Rarotonga = 'Pacific/Rarotonga';

    /**
     * French Polynesia
     * 
     * -10 (-10)
     */
    case Pacific_Tahiti = 'Pacific/Tahiti';

    /**
     * Kiribati
     * 
     * +12 (+12)
     */
    case Pacific_Tarawa = 'Pacific/Tarawa';

    /**
     * Tonga
     * 
     * +13 (+13)
     */
    case Pacific_Tongatapu = 'Pacific/Tongatapu';
}
