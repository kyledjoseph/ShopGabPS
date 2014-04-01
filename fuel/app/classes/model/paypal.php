<?php

define("PP_CONFIG_PATH", APPPATH . DS . 'config');

use PayPal\Api\Address;
use PayPal\Api\Amount;
use PayPal\Api\CreditCard;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\FundingInstrument;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

class Model_Paypal extends \Orm\Model {

  protected static $_properties = array(
    'id',
    'first_name',
    'last_name',
    'company',
    'address',
    'email',
    'city',
    'state_province',
    'zip_postal_code',
    'country',
    'telephone',
    'card_number',
    'card_type',
    'expire_month',
    'expire_year',
    'cvv2',
    'payer_id',
    'parent_id',
  );

  protected static $_belongs_to = array(
    'user' => array(
      'key_from' => 'parent_id',
      'model_to' => 'Model_User',
      'key_to' => 'id',
      'cascade_save' => true,
      'cascade_delete' => false,
    ),
  );

  const SUBSCRIPTION_PRICE = '30.00';

  /**
   * Perform payment to paypal
   * @return bool|string
   */
  function makePayment() {
    $addr = new Address();
    $addr->setLine1($this->address);
    $addr->setCity($this->address);
    $addr->setState($this->state_province);
    $addr->setPostalCode($this->zip_postal_code);
    $addr->setCountryCode($this->country);
    $addr->setPhone($this->telephone);

    $card = new CreditCard();
    $card->setType($this->card_type);
    $card->setNumber($this->card_number);
    $card->setExpireMonth($this->expire_month);
    $card->setExpireYear($this->expire_year);
    $card->setCvv2($this->cvv2);
    $card->setFirstName($this->first_name);
    $card->setLastName($this->last_name);
    $card->setBillingAddress($addr);

    $fi = new FundingInstrument();
    $fi->setCreditCard($card);

    $payer = new Payer();
    $payer->setPaymentMethod("credit_card");
    $payer->setFundingInstruments(array($fi));

    $amount = new Amount();
    $amount->setCurrency("USD");
    $amount->setTotal(self::SUBSCRIPTION_PRICE);

    $transaction = new Transaction();
    $transaction->setAmount($amount);
    $transaction->setDescription("This is the payment description.");

    $payment = new Payment();
    $payment->setIntent("sale");
    $payment->setPayer($payer);
    $payment->setTransactions(array($transaction));



    $apiContext = new ApiContext(new OAuthTokenCredential('AVKoWhBOA3uNK9zIaU4sbMeBSGviooXXbJjjqaCZfAnI43-D7QgTPznPAGQ8', 'ELA_zxAHs-5YZWXN_Hh9-tvEMBd8YCGKeLNVlRwq9yZF2lEV0d6wyWPMUTZ6'));

    try {
      $payment->create($apiContext);

      // ### Redirect buyer to paypal
      // Retrieve buyer approval url from the `payment` object.
      foreach($payment->getLinks() as $link) {
        if($link->getRel() == 'approval_url') {
          $redirectUrl = $link->getHref();
        } // if
      } // foreach

      // It is not really a great idea to store the payment id
      // in the session. In a real world app, please store the
      // payment id in a database.
//      $_SESSION['paymentId'] = $payment->getId();

      if(isset($redirectUrl)) {
        header("Location: $redirectUrl");
        exit;
      } // if
    } catch (\PPConnectionException $ex) {
      echo "Exception: " . $ex->getMessage() . PHP_EOL;
      var_dump($ex->getData());
      exit(1);
    } // try

    return true;
  } // makePayment

  /**
   * Return by user id
   * @param $user_id
   * @return Model_Paypal|null
   */
  static function getByUserId($user_id) {
    return self::query()->where('parent_id', $user_id)->get_one();
  } // getByUserId

  static function selectListOfCountries($selected_code) {
    $selected_code = $selected_code ? $selected_code : 'US';

    $countries =  array (
      'AF' => 'Afghanistan',
      'AL' => 'Albania',
      'DZ' => 'Algeria',
      'AS' => 'American Samoa',
      'AD' => 'Andorra',
      'AO' => 'Angola',
      'AI' => 'Anguilla',
      'AQ' => 'Antarctica',
      'AG' => 'Antigua and Barbuda',
      'AR' => 'Argentina',
      'AM' => 'Armenia',
      'AW' => 'Aruba',
      'AU' => 'Australia',
      'AT' => 'Austria',
      'AZ' => 'Azerbaijan',
      'BS' => 'Bahamas',
      'BH' => 'Bahrain',
      'BD' => 'Bangladesh',
      'BB' => 'Barbados',
      'BY' => 'Belarus',
      'BE' => 'Belgium',
      'BZ' => 'Belize',
      'BJ' => 'Benin',
      'BM' => 'Bermuda',
      'BT' => 'Bhutan',
      'BO' => 'Bolivia',
      'BA' => 'Bosnia and Herzegovina',
      'BW' => 'Botswana',
      'BV' => 'Bouvet Island',
      'BR' => 'Brazil',
      'BQ' => 'British Antarctic Territory',
      'IO' => 'British Indian Ocean Territory',
      'VG' => 'British Virgin Islands',
      'BN' => 'Brunei',
      'BG' => 'Bulgaria',
      'BF' => 'Burkina Faso',
      'BI' => 'Burundi',
      'KH' => 'Cambodia',
      'CM' => 'Cameroon',
      'CA' => 'Canada',
      'CT' => 'Canton and Enderbury Islands',
      'CV' => 'Cape Verde',
      'KY' => 'Cayman Islands',
      'CF' => 'Central African Republic',
      'TD' => 'Chad',
      'CL' => 'Chile',
      'CN' => 'China',
      'CX' => 'Christmas Island',
      'CC' => 'Cocos [Keeling] Islands',
      'CO' => 'Colombia',
      'KM' => 'Comoros',
      'CG' => 'Congo - Brazzaville',
      'CD' => 'Congo - Kinshasa',
      'CK' => 'Cook Islands',
      'CR' => 'Costa Rica',
      'HR' => 'Croatia',
      'CU' => 'Cuba',
      'CY' => 'Cyprus',
      'CZ' => 'Czech Republic',
      'CI' => 'Côte d’Ivoire',
      'DK' => 'Denmark',
      'DJ' => 'Djibouti',
      'DM' => 'Dominica',
      'DO' => 'Dominican Republic',
      'NQ' => 'Dronning Maud Land',
      'DD' => 'East Germany',
      'EC' => 'Ecuador',
      'EG' => 'Egypt',
      'SV' => 'El Salvador',
      'GQ' => 'Equatorial Guinea',
      'ER' => 'Eritrea',
      'EE' => 'Estonia',
      'ET' => 'Ethiopia',
      'FK' => 'Falkland Islands',
      'FO' => 'Faroe Islands',
      'FJ' => 'Fiji',
      'FI' => 'Finland',
      'FR' => 'France',
      'GF' => 'French Guiana',
      'PF' => 'French Polynesia',
      'TF' => 'French Southern Territories',
      'FQ' => 'French Southern and Antarctic Territories',
      'GA' => 'Gabon',
      'GM' => 'Gambia',
      'GE' => 'Georgia',
      'DE' => 'Germany',
      'GH' => 'Ghana',
      'GI' => 'Gibraltar',
      'GR' => 'Greece',
      'GL' => 'Greenland',
      'GD' => 'Grenada',
      'GP' => 'Guadeloupe',
      'GU' => 'Guam',
      'GT' => 'Guatemala',
      'GG' => 'Guernsey',
      'GN' => 'Guinea',
      'GW' => 'Guinea-Bissau',
      'GY' => 'Guyana',
      'HT' => 'Haiti',
      'HM' => 'Heard Island and McDonald Islands',
      'HN' => 'Honduras',
      'HK' => 'Hong Kong SAR China',
      'HU' => 'Hungary',
      'IS' => 'Iceland',
      'IN' => 'India',
      'ID' => 'Indonesia',
      'IR' => 'Iran',
      'IQ' => 'Iraq',
      'IE' => 'Ireland',
      'IM' => 'Isle of Man',
      'IL' => 'Israel',
      'IT' => 'Italy',
      'JM' => 'Jamaica',
      'JP' => 'Japan',
      'JE' => 'Jersey',
      'JT' => 'Johnston Island',
      'JO' => 'Jordan',
      'KZ' => 'Kazakhstan',
      'KE' => 'Kenya',
      'KI' => 'Kiribati',
      'KW' => 'Kuwait',
      'KG' => 'Kyrgyzstan',
      'LA' => 'Laos',
      'LV' => 'Latvia',
      'LB' => 'Lebanon',
      'LS' => 'Lesotho',
      'LR' => 'Liberia',
      'LY' => 'Libya',
      'LI' => 'Liechtenstein',
      'LT' => 'Lithuania',
      'LU' => 'Luxembourg',
      'MO' => 'Macau SAR China',
      'MK' => 'Macedonia',
      'MG' => 'Madagascar',
      'MW' => 'Malawi',
      'MY' => 'Malaysia',
      'MV' => 'Maldives',
      'ML' => 'Mali',
      'MT' => 'Malta',
      'MH' => 'Marshall Islands',
      'MQ' => 'Martinique',
      'MR' => 'Mauritania',
      'MU' => 'Mauritius',
      'YT' => 'Mayotte',
      'FX' => 'Metropolitan France',
      'MX' => 'Mexico',
      'FM' => 'Micronesia',
      'MI' => 'Midway Islands',
      'MD' => 'Moldova',
      'MC' => 'Monaco',
      'MN' => 'Mongolia',
      'ME' => 'Montenegro',
      'MS' => 'Montserrat',
      'MA' => 'Morocco',
      'MZ' => 'Mozambique',
      'MM' => 'Myanmar [Burma]',
      'NA' => 'Namibia',
      'NR' => 'Nauru',
      'NP' => 'Nepal',
      'NL' => 'Netherlands',
      'AN' => 'Netherlands Antilles',
      'NT' => 'Neutral Zone',
      'NC' => 'New Caledonia',
      'NZ' => 'New Zealand',
      'NI' => 'Nicaragua',
      'NE' => 'Niger',
      'NG' => 'Nigeria',
      'NU' => 'Niue',
      'NF' => 'Norfolk Island',
      'KP' => 'North Korea',
      'VD' => 'North Vietnam',
      'MP' => 'Northern Mariana Islands',
      'NO' => 'Norway',
      'OM' => 'Oman',
      'PC' => 'Pacific Islands Trust Territory',
      'PK' => 'Pakistan',
      'PW' => 'Palau',
      'PS' => 'Palestinian Territories',
      'PA' => 'Panama',
      'PZ' => 'Panama Canal Zone',
      'PG' => 'Papua New Guinea',
      'PY' => 'Paraguay',
      'YD' => 'People\'s Democratic Republic of Yemen',
      'PE' => 'Peru',
      'PH' => 'Philippines',
      'PN' => 'Pitcairn Islands',
      'PL' => 'Poland',
      'PT' => 'Portugal',
      'PR' => 'Puerto Rico',
      'QA' => 'Qatar',
      'RO' => 'Romania',
      'RU' => 'Russia',
      'RW' => 'Rwanda',
      'RE' => 'Réunion',
      'BL' => 'Saint Barthélemy',
      'SH' => 'Saint Helena',
      'KN' => 'Saint Kitts and Nevis',
      'LC' => 'Saint Lucia',
      'MF' => 'Saint Martin',
      'PM' => 'Saint Pierre and Miquelon',
      'VC' => 'Saint Vincent and the Grenadines',
      'WS' => 'Samoa',
      'SM' => 'San Marino',
      'SA' => 'Saudi Arabia',
      'SN' => 'Senegal',
      'RS' => 'Serbia',
      'CS' => 'Serbia and Montenegro',
      'SC' => 'Seychelles',
      'SL' => 'Sierra Leone',
      'SG' => 'Singapore',
      'SK' => 'Slovakia',
      'SI' => 'Slovenia',
      'SB' => 'Solomon Islands',
      'SO' => 'Somalia',
      'ZA' => 'South Africa',
      'GS' => 'South Georgia and the South Sandwich Islands',
      'KR' => 'South Korea',
      'ES' => 'Spain',
      'LK' => 'Sri Lanka',
      'SD' => 'Sudan',
      'SR' => 'Suriname',
      'SJ' => 'Svalbard and Jan Mayen',
      'SZ' => 'Swaziland',
      'SE' => 'Sweden',
      'CH' => 'Switzerland',
      'SY' => 'Syria',
      'ST' => 'São Tomé and Príncipe',
      'TW' => 'Taiwan',
      'TJ' => 'Tajikistan',
      'TZ' => 'Tanzania',
      'TH' => 'Thailand',
      'TL' => 'Timor-Leste',
      'TG' => 'Togo',
      'TK' => 'Tokelau',
      'TO' => 'Tonga',
      'TT' => 'Trinidad and Tobago',
      'TN' => 'Tunisia',
      'TR' => 'Turkey',
      'TM' => 'Turkmenistan',
      'TC' => 'Turks and Caicos Islands',
      'TV' => 'Tuvalu',
      'UM' => 'U.S. Minor Outlying Islands',
      'PU' => 'U.S. Miscellaneous Pacific Islands',
      'VI' => 'U.S. Virgin Islands',
      'UG' => 'Uganda',
      'UA' => 'Ukraine',
      'SU' => 'Union of Soviet Socialist Republics',
      'AE' => 'United Arab Emirates',
      'GB' => 'United Kingdom',
      'US' => 'United States',
      'ZZ' => 'Unknown or Invalid Region',
      'UY' => 'Uruguay',
      'UZ' => 'Uzbekistan',
      'VU' => 'Vanuatu',
      'VA' => 'Vatican City',
      'VE' => 'Venezuela',
      'VN' => 'Vietnam',
      'WK' => 'Wake Island',
      'WF' => 'Wallis and Futuna',
      'EH' => 'Western Sahara',
      'YE' => 'Yemen',
      'ZM' => 'Zambia',
      'ZW' => 'Zimbabwe',
      'AX' => 'Åland Islands',
    );

    $return = '';
    foreach ($countries as $code => $country) {
      $selected = $code == $selected_code ? "selected = 'selected'" : '';
      $return .= "<option value='$code' $selected >$country</option>";
    } // foreach

    return $return;
  } // selectListOfCountries

  static function selectListOfStates($selected_code = '') {

    $states = array(
      'NULL' => "Outside US",
      'AL'=>"Alabama",
      'AK'=>"Alaska",
      'AZ'=>"Arizona",
      'AR'=>"Arkansas",
      'CA'=>"California",
      'CO'=>"Colorado",
      'CT'=>"Connecticut",
      'DE'=>"Delaware",
      'DC'=>"District Of Columbia",
      'FL'=>"Florida",
      'GA'=>"Georgia",
      'HI'=>"Hawaii",
      'ID'=>"Idaho",
      'IL'=>"Illinois",
      'IN'=>"Indiana",
      'IA'=>"Iowa",
      'KS'=>"Kansas",
      'KY'=>"Kentucky",
      'LA'=>"Louisiana",
      'ME'=>"Maine",
      'MD'=>"Maryland",
      'MA'=>"Massachusetts",
      'MI'=>"Michigan",
      'MN'=>"Minnesota",
      'MS'=>"Mississippi",
      'MO'=>"Missouri",
      'MT'=>"Montana",
      'NE'=>"Nebraska",
      'NV'=>"Nevada",
      'NH'=>"New Hampshire",
      'NJ'=>"New Jersey",
      'NM'=>"New Mexico",
      'NY'=>"New York",
      'NC'=>"North Carolina",
      'ND'=>"North Dakota",
      'OH'=>"Ohio",
      'OK'=>"Oklahoma",
      'OR'=>"Oregon",
      'PA'=>"Pennsylvania",
      'RI'=>"Rhode Island",
      'SC'=>"South Carolina",
      'SD'=>"South Dakota",
      'TN'=>"Tennessee",
      'TX'=>"Texas",
      'UT'=>"Utah",
      'VT'=>"Vermont",
      'VA'=>"Virginia",
      'WA'=>"Washington",
      'WV'=>"West Virginia",
      'WI'=>"Wisconsin",
      'WY'=>"Wyoming",
    );

    $return = '';
    foreach ($states as $code => $state) {
      $selected = $code == $selected_code ? "selected = 'selected'" : '';
      $return .= "<option value='$code' $selected >$state</option>";
    } // foreach

    return $return;
  } // selectListOfStates

  static function selectListOfCCTypes($selected_type = '') {
    $card_types = [
      'visa' => 'Visa',
      'mastercard' => 'MasterCard',
      'discover' => 'Discover',
      'amex ' => 'American Express',
    ];

    $return = '';
    foreach ($card_types as $code => $name) {
      $selected = $code == $selected_type ? "selected = 'selected'" : '';
      $return .= "<option value='$code' $selected >$name</option>";
    } // foreach

    return $return;
  } // selectListOfCCTypes

  static function selectExpireMonths($selected_month = 0) {
    $months = array(
      'January',
      'February',
      'March',
      'April',
      'May',
      'June',
      'July ',
      'August',
      'September',
      'October',
      'November',
      'December',
    );

    $return = '';
    foreach ($months as $key => $month) {
      $selected = $key == $selected_month ? "selected = 'selected'" : '';
      $return .= "<option value='$key' $selected >$month</option>";
    } // foreach

    return $return;
  } // selectExpireMonths

  static function selectExpireYears($selected_year = null) {
    $current_year = (int)date('Y');

    $return = '';
    for ($i = $current_year; $i < $current_year + 12; $i++) {
      $selected = $i == $selected_year ? "selected = 'selected'" : '';
      $return .= "<option value='$i' $selected >$i</option>";
    } // for

    return $return;
  } // selectExpireYear



} // Model_Paypal_Account