<?php
session_start();


if( !isset($_GET['code']) or isset($_SESSION["access_token"]) ){
	header("location: index.php");
	exit();
}


include 'gService.php';
include 'config.php';


$header = array( "Content-Type: application/x-www-form-urlencoded" );

$data = http_build_query(
			array(
				'code' => str_replace("#", null, $_GET['code']),
				'client_id' => $client_id,
				'client_secret' => $client_secret,
				'redirect_uri' => $redirect_uri,
				'grant_type' => 'authorization_code'
			)
		);

$url = "https://www.googleapis.com/oauth2/v4/token"; 

$result = gService(1, $url, $header, $data);
$access_token = $result['access_token']; // Get access token


$info = gService(0, "https://www.googleapis.com/gmail/v1/users/me/profile", array("Authorization: Bearer $access_token"), 0); // Get email address
$_SESSION["emailAddress"] = $info['emailAddress'];


if( !empty($result['error']) ){ // if have some problems, will be logout
	header("location: logout.php");
}
else{ // if get access token, will be redirect to index.php
	$_SESSION["access_token"] = $access_token;
	header("location: index.php");
}

?>