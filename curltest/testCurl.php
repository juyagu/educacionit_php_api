<?php
	$url = "https://jsonplaceholder.typicode.com/users";
	$headers = array (
		'Accept: application/json',
		'Content-Type: application/json'
	);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($curl, CURLOPT_VERBOSE, 1);
	curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);

	$issue_list = (curl_exec($curl));
	if(curl_errno($curl)){
		echo 'Request Error:' . curl_error($curl);
	}
	$rest = json_decode($issue_list);
	print_r($rest);
	exit;