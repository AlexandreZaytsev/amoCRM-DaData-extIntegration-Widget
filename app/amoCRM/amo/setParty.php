<?php
require_once 'access.php';

$custom_field_id = 454021;
$custom_field_value = 'тест';

$ip = '1.2.3.4';
$domain = 'cad.ru';

$pipeline_id = isset($_POST['pipeline']) ? $_POST['pipeline'] : '5850952';
$user_amo = isset($_POST['userid']) ? $_POST['userid'] : '';//если юзера нет  в качестве исполнителя встает робот

//разбираем post
$leadName = isset($_POST['lead']) ? $_POST['lead'] : 'Наименование Lead';
$name_short = isset($_POST['name_short']) ? $_POST['name_short'] : 'Наименование компании';
$name_full = isset($_POST['name_full']) ? $_POST['name_full'] : '';
$managerName = isset($_POST['manager']) ? $_POST['manager'] : 'Наименование контактного лица';
$inn = isset($_POST['inn']) ? $_POST['inn'] : '';
$ogrnt = isset($_POST['ogrn']) ? $_POST['ogrn'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';



$phone = '8(495)7440004';
$email = 'info@cad.ru';
$target = 'Цель';
$company = 'виджет Название компании';

$utm_source   = '';
$utm_content  = '';
$utm_medium   = '';
$utm_campaign = '';
$utm_term     = '';
$utm_referrer = '';

$price = 0;

$data = [
    [
        "name" => $leadName,
        "price" => $price,
        "responsible_user_id" => (int) $user_amo,
        "pipeline_id" => (int) $pipeline_id,
        "_embedded" => [
            "metadata" => [
                "category" => "forms",
                "form_id" => 1,
                "form_name" => "Форма на сайте",
                "form_page" => $target,
                "form_sent_at" => strtotime(date("Y-m-d H:i:s")),
                "ip" => $ip,
                "referer" => $domain
            ],
            "companies" => [
                [
                    "name" => $name_short,
                    
                    
        					"custom_fields_values" => [
                        [
                            "field_code" => "EMAIL",
                            "values" => [
                                [
                                    "enum_code" => "WORK",
                                    "value" => $email
                                ]
                            ]
                        ],
                        [
                            "field_code" => "PHONE",
                            "values" => [
                                [
                                    "enum_code" => "WORK",
                                    "value" => $phone
                                ]
                            ]
                        ],
                        [
 //                           "field_code" => "ИНН КОМПАНИИ",
                            "field_id" => 477929,
                            "values" => [
                                [
                                    "value" => $inn
                                ]
                            ]
                        ],
                        [
 //                           "field_code" => "ОГРН",
                            "field_id" => 842815,
                            "values" => [
                                [
                                    "value" => $ogrnt
                                ]
                            ]
                        ],
                        [
 //                           "field_code" => "Адрес (юридический))",
                            "field_id" => 735699,
                            "values" => [
                                [
                                    "value" => $address
                                ]
                            ]
                        ],
                        
                        
                        
                        
                    ]            
                    
                     

/*
                        [ 
  //                          "field_id" => (int)477929,//(int) $custom_field_id,
                            "field_code" => "ИНН КОМПАНИИ",
                            "values" => [
                                [
                                    "enum_code" => "WORK",
                                    "value" => $inn
                                ]
                            ]
                        ],
                        [ 
   //                         "field_id" => (int)842815,//(int) $custom_field_id,
                            "field_code" => "ОГРН",
                            "values" => [
                                [
                                    "enum_code" => "WORK",
                                    "value" => $ogrnt
                                ]
                            ]
                        ],
                        [ 
     //                       "field_id" => (int)735699,//(int) $custom_field_id,
                            "field_code" => "Адрес (юридический))",
                            "values" => [
                                [
                                    "enum_code" => "WORK",
                                    "value" => $address
                                ]
                            ]
                        ]
                    ]
*/


                ]
            ],
            "contacts" => [
                [
                    "first_name" => $managerName,



					"custom_fields_values" => [
                        [
                            "field_code" => "EMAIL",
                            "values" => [
                                [
                                    "enum_code" => "WORK",
                                    "value" => $email
                                ]
                            ]
                        ],
                        [
                            "field_code" => "PHONE",
                            "values" => [
                                [
                                    "enum_code" => "WORK",
                                    "value" => $phone
                                ]
                            ]
                        ],
                        [
 //                           "field_code" => "Должность",
                            "field_id" => 136049,
                            "values" => [
                                [
                                    "value" => "--"
                                ]
                            ]
                        ],
                    ]





                ]
            ]
        ],
        "custom_fields_values" => [
            [
                "field_code" => 'UTM_SOURCE',
                "values" => [
                    [
                        "value" => $utm_source
                    ]
                ]
            ],
            [
                "field_code" => 'UTM_CONTENT',
                "values" => [
                    [
                        "value" => $utm_content
                    ]
                ]
            ],
            [
                "field_code" => 'UTM_MEDIUM',
                "values" => [
                    [
                        "value" => $utm_medium
                    ]
                ]
            ],
            [
                "field_code" => 'UTM_CAMPAIGN',
                "values" => [
                    [
                        "value" => $utm_campaign
                    ]
                ]
            ],
            [
                "field_code" => 'UTM_TERM',
                "values" => [
                    [
                        "value" => $utm_term
                    ]
                ]
            ],
            [
                "field_code" => 'UTM_REFERRER',
                "values" => [
                    [
                        "value" => $utm_referrer
                    ]
                ]
            ],
        ],
    ]
];

//print_r($data);
//console.log($data);
//echo $data; 

$method = "/api/v4/leads/complex";
 
$headers = [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $access_token,
];

$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
curl_setopt($curl, CURLOPT_URL, "https://$subdomain.amocrm.ru".$method);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_COOKIEFILE, 'amo/cookie.txt');
curl_setopt($curl, CURLOPT_COOKIEJAR, 'amo/cookie.txt');
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
$out = curl_exec($curl);
$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$code = (int) $code;
$errors = [
    301 => 'Moved permanently.',
    400 => 'Wrong structure of the array of transmitted data, or invalid identifiers of custom fields.',
    401 => 'Not Authorized. There is no account information on the server. You need to make a request to another server on the transmitted IP.',
    403 => 'The account is blocked, for repeatedly exceeding the number of requests per second.',
    404 => 'Not found.',
    500 => 'Internal server error.',
    502 => 'Bad gateway.',
    503 => 'Service unavailable.'
];

if ($code < 200 || $code > 204) die( "Error $code. " . (isset($errors[$code]) ? $errors[$code] : 'Undefined error') );


$Response = json_decode($out, true);
$Response = $Response['_embedded']['items'];
$output = 'ID добавленных элементов списков:' . PHP_EOL;
foreach ($Response as $v)
    if (is_array($v))
        $output .= $v['id'] . PHP_EOL;
//return $output;
//echo  $output;

// https://website-create.ru/redirekt-posle-otpravki-formy/
$redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'redirect-form.html';
header("Location: $redirect");
exit();