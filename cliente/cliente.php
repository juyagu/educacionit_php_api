<?php 
$campos = parse_ini_file("../config/config.ini");
$usuario = $campos['usuario'];
$pwd = $campos['pass'];
$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_URL => 'http://localhost/clase4/productos',
CURLOPT_USERPWD => 	"$usuario:$pwd"
));

$response = curl_exec($curl);
curl_close($curl);

$productos = json_decode($response);

var_dump($productos);
