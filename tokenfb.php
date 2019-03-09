<?php
/* 
	by strelitzia amos
  api_key from sgbtools
*/
$efbi['username'] = 'username/email';
$efbi['password'] = 'password fb';

function gettoken($data){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://api.facebook.com/restserver.php?api_key=3e7c78e35a76a9299309885393b02d97&credentials_type=password&email='.$data['username'].'&format=JSON&generate_machine_id=1&generate_session_cookies=1&locale=id_ID&method=auth.login&password='.$data['password'].'&return_ssl_resources=0&v=1.0&sig=ecb6db22218516fcd19f12c1154e2de4');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
	$headers = array();
	$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$result = curl_exec($ch);
	curl_close ($ch);
	$res = json_decode($result, true);
	return $res['access_token'] ? $res['access_token'] : "Failed get token";
}
echo "Get FB Token".PHP_EOL.PHP_EOL;
echo "Your token is :".PHP_EOL;
echo gettoken($efbi).PHP_EOL;
