<?php
require_once 'access.php';

$linkGet="";
$input = json_decode(file_get_contents('php://input'));
if(!$input) throw new WireException("No data");
//if(!$this->wire->session->CSRF->hasValidToken()) {
//    throw new WireException("CSRF failed");
//	}

if($input){
	    $linkGet = $input->link;
	}

//	echo "<pre>link: ".$access_token."</pre>"; 

$headers = [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $access_token,
];

	$curl = curl_init(); //—охран€ем дескриптор сеанса cURL
	curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
	curl_setopt($curl,CURLOPT_URL, "https://$subdomain.amocrm.ru".$linkGet);
	curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl,CURLOPT_HEADER, false);
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
	curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);
	$out=curl_exec($curl); 
	$code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
	curl_close($curl);
// Now we can process the response received from the server.
// *  ItТs an example, you can process this data the way you want. 
$code = (int)$code;
$errors = [
	400 => 'Bad request',
	401 => 'Unauthorized',
	403 => 'Forbidden',
	404 => 'Not found',
	500 => 'Internal server error',
	502 => 'Bad gateway',
	503 => 'Service unavailable',
];

if ($code < 200 || $code > 204) die( "Error $code. " . (isset($errors[$code]) ? $errors[$code] : 'Undefined error') );

header('Content-Type: application/json');
ob_end_clean(); // ќчистка буфера
echo json_encode($out,JSON_UNESCAPED_UNICODE);



