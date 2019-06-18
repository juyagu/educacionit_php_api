<?php 
$campos = parse_ini_file("../config/config.ini");
$usuario = $campos['usuario'];
$pwd = $campos['pass'];

$curl = curl_init();

curl_setopt_array($curl,array(
	CURLOPT_RETURNTRANSFER => 1,
	CURLOPT_URL => 'http://localhost/clase4/productos',
	CURLOPT_USERPWD => 	"$usuario:$pwd",
	CURLOPT_POST => 1,
	CURLOPT_POSTFIELDS => array(
		'nombre' => 'Play 3',
		'descripcion' => 'Usada pero como nueva',
		'precio' => 10000,
		'categoria' => 2,
		'alta' => '2018-10-10'
	)
));

if(!curl_exec($curl)){
	print_r("No se pudo devolver la consulta.  Mensaje: " . curl_error($curl));
}

$response = curl_exec($curl);
curl_close($curl);
var_dump($response);