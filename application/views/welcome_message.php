<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Welcome to CodeIgniter</title>

        <style type="text/css">

            ::selection{ background-color: #E13300; color: white; }
            ::moz-selection{ background-color: #E13300; color: white; }
            ::webkit-selection{ background-color: #E13300; color: white; }

            body {
                background-color: #fff;
                margin: 40px;
                font: 13px/20px normal Helvetica, Arial, sans-serif;
                color: #4F5155;
            }

            a {
                color: #003399;
                background-color: transparent;
                font-weight: normal;
            }

            h1 {
                color: #444;
                background-color: transparent;
                border-bottom: 1px solid #D0D0D0;
                font-size: 19px;
                font-weight: normal;
                margin: 0 0 14px 0;
                padding: 14px 15px 10px 15px;
            }

            code {
                font-family: Consolas, Monaco, Courier New, Courier, monospace;
                font-size: 12px;
                background-color: #f9f9f9;
                border: 1px solid #D0D0D0;
                color: #002166;
                display: block;
                margin: 14px 0 14px 0;
                padding: 12px 10px 12px 10px;
            }

            #body{
                margin: 0 15px 0 15px;
            }

            p.footer{
                text-align: right;
                font-size: 11px;
                border-top: 1px solid #D0D0D0;
                line-height: 32px;
                padding: 0 10px 0 10px;
                margin: 20px 0 0 0;
            }

            #container{
                margin: 10px;
                border: 1px solid #D0D0D0;
                -webkit-box-shadow: 0 0 8px #D0D0D0;
            }
        </style>
    </head>
    <body>

        <div id="container">
            <h1>Google Analytics</h1>

            <div id="body">
                <p>
                    <?php
                    echo $profileInfo;
                    ?>
                </p>
                <p>
                    Users: <?php echo $users; ?>
                </p>
                <p>
                    Sessions: <?php echo $sessions; ?>
                </p>
                <p>Browsers
                <table border="1">
                    <?php
                    foreach ($browsers as $key => $value) {
                        echo '<tr>';
                        echo "<td>$key</td><td>$value</td>";
                        echo '</tr>';
                    }
                    ?>
                </table>
                </p>
                <?php $countries_list = array('AF' => 'AFGHANISTAN', 'AL' => 'ALBANIA', 'DZ' => 'ALGERIA', 'AS' => 'AMERICAN SAMOA', 'AD' => 'ANDORRA', 'AO' => 'ANGOLA', 'AI' => 'ANGUILLA', 'AQ' => 'ANTARCTICA', 'AG' => 'ANTIGUA AND BARBUDA', 'AR' => 'ARGENTINA', 'AM' => 'ARMENIA', 'AW' => 'ARUBA', 'AU' => 'AUSTRALIA', 'AT' => 'AUSTRIA', 'AZ' => 'AZERBAIJAN', 'BS' => 'BAHAMAS', 'BH' => 'BAHRAIN', 'BD' => 'BANGLADESH', 'BB' => 'BARBADOS', 'BY' => 'BELARUS', 'BE' => 'BELGIUM', 'BZ' => 'BELIZE', 'BJ' => 'BENIN', 'BM' => 'BERMUDA', 'BT' => 'BHUTAN', 'BO' => 'BOLIVIA', 'BA' => 'BOSNIA AND HERZEGOVINA', 'BW' => 'BOTSWANA', 'BV' => 'BOUVET ISLAND', 'BR' => 'BRAZIL', 'IO' => 'BRITISH INDIAN OCEAN TERRITORY', 'BN' => 'BRUNEI DARUSSALAM', 'BG' => 'BULGARIA', 'BF' => 'BURKINA FASO', 'BI' => 'BURUNDI', 'KH' => 'CAMBODIA', 'CM' => 'CAMEROON', 'CA' => 'CANADA', 'CV' => 'CAPE VERDE', 'KY' => 'CAYMAN ISLANDS', 'CF' => 'CENTRAL AFRICAN REPUBLIC', 'TD' => 'CHAD', 'CL' => 'CHILE', 'CN' => 'CHINA', 'CX' => 'CHRISTMAS ISLAND', 'CC' => 'COCOS (KEELING) ISLANDS', 'CO' => 'COLOMBIA', 'KM' => 'COMOROS', 'CG' => 'CONGO', 'CD' => 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'CK' => 'COOK ISLANDS', 'CR' => 'COSTA RICA', 'CI' => 'COTE D IVOIRE', 'HR' => 'CROATIA', 'CU' => 'CUBA', 'CY' => 'CYPRUS', 'CZ' => 'CZECH REPUBLIC', 'DK' => 'DENMARK', 'DJ' => 'DJIBOUTI', 'DM' => 'DOMINICA', 'DO' => 'DOMINICAN REPUBLIC', 'TP' => 'EAST TIMOR', 'EC' => 'ECUADOR', 'EG' => 'EGYPT', 'SV' => 'EL SALVADOR', 'GQ' => 'EQUATORIAL GUINEA', 'ER' => 'ERITREA', 'EE' => 'ESTONIA', 'ET' => 'ETHIOPIA', 'FK' => 'FALKLAND ISLANDS (MALVINAS)', 'FO' => 'FAROE ISLANDS', 'FJ' => 'FIJI', 'FI' => 'FINLAND', 'FR' => 'FRANCE', 'GF' => 'FRENCH GUIANA', 'PF' => 'FRENCH POLYNESIA', 'TF' => 'FRENCH SOUTHERN TERRITORIES', 'GA' => 'GABON', 'GM' => 'GAMBIA', 'GE' => 'GEORGIA', 'DE' => 'GERMANY', 'GH' => 'GHANA', 'GI' => 'GIBRALTAR', 'GR' => 'GREECE', 'GL' => 'GREENLAND', 'GD' => 'GRENADA', 'GP' => 'GUADELOUPE', 'GU' => 'GUAM', 'GT' => 'GUATEMALA', 'GN' => 'GUINEA', 'GW' => 'GUINEA-BISSAU', 'GY' => 'GUYANA', 'HT' => 'HAITI', 'HM' => 'HEARD ISLAND AND MCDONALD ISLANDS', 'VA' => 'HOLY SEE (VATICAN CITY STATE)', 'HN' => 'HONDURAS', 'HK' => 'HONG KONG', 'HU' => 'HUNGARY', 'IS' => 'ICELAND', 'IN' => 'INDIA', 'ID' => 'INDONESIA', 'IR' => 'IRAN', 'IQ' => 'IRAQ', 'IE' => 'IRELAND', 'IL' => 'ISRAEL', 'IT' => 'ITALY', 'JM' => 'JAMAICA', 'JP' => 'JAPAN', 'JO' => 'JORDAN', 'KZ' => 'KAZAKSTAN', 'KE' => 'KENYA', 'KI' => 'KIRIBATI', 'KP' => 'NORTH KOREA', 'KR' => 'SOUTH KOREA', 'KW' => 'KUWAIT', 'KG' => 'KYRGYZSTAN', 'LA' => 'LAO PEOPLES DEMOCRATIC REPUBLIC', 'LV' => 'LATVIA', 'LB' => 'LEBANON', 'LS' => 'LESOTHO', 'LR' => 'LIBERIA', 'LY' => 'LIBYAN ARAB JAMAHIRIYA', 'LI' => 'LIECHTENSTEIN', 'LT' => 'LITHUANIA', 'LU' => 'LUXEMBOURG', 'MO' => 'MACAU', 'MK' => 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'MG' => 'MADAGASCAR', 'MW' => 'MALAWI', 'MY' => 'MALAYSIA', 'MV' => 'MALDIVES', 'ML' => 'MALI', 'MT' => 'MALTA', 'MH' => 'MARSHALL ISLANDS', 'MQ' => 'MARTINIQUE', 'MR' => 'MAURITANIA', 'MU' => 'MAURITIUS', 'YT' => 'MAYOTTE', 'MX' => 'MEXICO', 'FM' => 'MICRONESIA, FEDERATED STATES OF', 'MD' => 'MOLDOVA, REPUBLIC OF', 'MC' => 'MONACO', 'MN' => 'MONGOLIA', 'MS' => 'MONTSERRAT', 'MA' => 'MOROCCO', 'MZ' => 'MOZAMBIQUE', 'MM' => 'MYANMAR', 'NA' => 'NAMIBIA', 'NR' => 'NAURU', 'NP' => 'NEPAL', 'NL' => 'NETHERLANDS', 'AN' => 'NETHERLANDS ANTILLES', 'NC' => 'NEW CALEDONIA', 'NZ' => 'NEW ZEALAND', 'NI' => 'NICARAGUA', 'NE' => 'NIGER', 'NG' => 'NIGERIA', 'NU' => 'NIUE', 'NF' => 'NORFOLK ISLAND', 'MP' => 'NORTHERN MARIANA ISLANDS', 'NO' => 'NORWAY', 'OM' => 'OMAN', 'PK' => 'PAKISTAN', 'PW' => 'PALAU', 'PS' => 'PALESTINIAN TERRITORY, OCCUPIED', 'PA' => 'PANAMA', 'PG' => 'PAPUA NEW GUINEA', 'PY' => 'PARAGUAY', 'PE' => 'PERU', 'PH' => 'PHILIPPINES', 'PN' => 'PITCAIRN', 'PL' => 'POLAND', 'PT' => 'PORTUGAL', 'PR' => 'PUERTO RICO', 'QA' => 'QATAR', 'RE' => 'REUNION', 'RO' => 'ROMANIA', 'RU' => 'RUSSIA', 'RW' => 'RWANDA', 'SH' => 'SAINT HELENA', 'KN' => 'SAINT KITTS AND NEVIS', 'LC' => 'SAINT LUCIA', 'PM' => 'SAINT PIERRE AND MIQUELON', 'VC' => 'SAINT VINCENT AND THE GRENADINES', 'WS' => 'SAMOA', 'SM' => 'SAN MARINO', 'ST' => 'SAO TOME AND PRINCIPE', 'SA' => 'SAUDI ARABIA', 'SN' => 'SENEGAL', 'SC' => 'SEYCHELLES', 'SL' => 'SIERRA LEONE', 'SG' => 'SINGAPORE', 'SK' => 'SLOVAKIA', 'SI' => 'SLOVENIA', 'SB' => 'SOLOMON ISLANDS', 'SO' => 'SOMALIA', 'ZA' => 'SOUTH AFRICA', 'GS' => 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'ES' => 'SPAIN', 'LK' => 'SRI LANKA', 'SD' => 'SUDAN', 'SR' => 'SURINAME', 'SJ' => 'SVALBARD AND JAN MAYEN', 'SZ' => 'SWAZILAND', 'SE' => 'SWEDEN', 'CH' => 'SWITZERLAND', 'SY' => 'SYRIAN ARAB REPUBLIC', 'TW' => 'TAIWAN', 'TJ' => 'TAJIKISTAN', 'TZ' => 'TANZANIA, UNITED REPUBLIC OF', 'TH' => 'THAILAND', 'TG' => 'TOGO', 'TK' => 'TOKELAU', 'TO' => 'TONGA', 'TT' => 'TRINIDAD AND TOBAGO', 'TN' => 'TUNISIA', 'TR' => 'TURKEY', 'TM' => 'TURKMENISTAN', 'TC' => 'TURKS AND CAICOS ISLANDS', 'TV' => 'TUVALU', 'UG' => 'UGANDA', 'UA' => 'UKRAINE', 'AE' => 'UNITED ARAB EMIRATES', 'GB' => 'UNITED KINGDOM', 'US' => 'UNITED STATES', 'UM' => 'UNITED STATES MINOR OUTLYING ISLANDS', 'UY' => 'URUGUAY', 'UZ' => 'UZBEKISTAN', 'VU' => 'VANUATU', 'VE' => 'VENEZUELA', 'VN' => 'VIET NAM', 'VG' => 'VIRGIN ISLANDS, BRITISH', 'VI' => 'VIRGIN ISLANDS, U.S.', 'WF' => 'WALLIS AND FUTUNA', 'EH' => 'WESTERN SAHARA', 'YE' => 'YEMEN', 'YU' => 'YUGOSLAVIA', 'ZM' => 'ZAMBIA', 'ZW' => 'ZIMBABWE'); ?>
                <p>Countries
                <table border="1">
                    <?php
                    foreach ($countries as $key => $value) {
                        echo '<tr>';
                        echo "<td>$key</td>";
                        $country_ShortCode = array_keys($countries_list, strtoupper($key));
                        echo "<td>" . $country_ShortCode[0] . "</td>";
                        echo "<td>$value</td>";
                        echo '</tr>';
                    }
                    ?>
                </table>
                </p>
                <p>Operating Systems
                <table border="1">
                    <?php
                    foreach ($operatingSystems as $key => $value) {
                        echo '<tr>';
                        echo "<td>$key</td><td>$value</td>";
                        echo '</tr>';
                    }
                    ?>
                </table>
                </p>


            </div>

            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
        </div>

    </body>
</html>