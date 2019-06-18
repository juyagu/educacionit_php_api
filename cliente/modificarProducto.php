<?php 
$campos = parse_ini_file("../config/config.ini");
$usuario = $campos['usuario'];
$pwd = $campos['pass'];

$curl = curl_init();

curl_setopt_array($curl,array(
	CURLOPT_RETURNTRANSFER => 1,
	CURLOPT_URL => 'http://localhost/clase4/productos/16',
	CURLOPT_USERPWD => 	"$usuario:$pwd",
	CURLOPT_CUSTOMREQUEST => 'PUT',
	CURLOPT_HTTPHEADER => array('Content-Type: application/x-www-form-urlencoded'),
	CURLOPT_POSTFIELDS => "nombre=Televisor LG 50 pulgadas&descripcion=Hay otras mejores&precio=32000&categoria=2&alta=2018-12-01"	
));

if(!curl_exec($curl)){
	print_r("No se pudo devolver la consulta.  Mensaje: " . curl_error($curl));
}

$response = curl_exec($curl);
curl_close($curl);
$productoModificado = json_decode($response);
print_r($productoModificado);