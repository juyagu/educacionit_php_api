<?php 
//Tenemos que mapear el recurso que ingresa el usuario a traves de la URL y realizar la acción que defina el verbo HTTP.
/*
GET => obtener info
POST => guardar un nuevo registro
PUT => modificar un registro existente (vamos a tener que pasar el id)
DELETE => eliminar un producto determinado.
*/


/*
recurso productos
http://localhost/clase4/index.php
http://localhost/clase4/index.php?accion=productos
http://localhost/clase4/.htaccess
http://localhost/clase4/productos => GET => obtener todos lo productos
http://localhost/clase4/productos => POST => guardar un nuevo producto
http://localhost/clase4/productos => PUT => modificar un producto existente
http://localhost/clase4/productos/id => GET => obtener un determinado producto
http://localhost/clase4/productos/id => DELETE => borrar un determinado producto


URL amigables
Lo vamos a lograr mediante la utilzacion de un archivo llamada .htaccess que va ir en la raiz del sitio
*/

$usuario = "clase4Api";
$pass = "hola1234";


if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || $_SERVER['PHP_AUTH_USER'] != $usuario || $_SERVER['PHP_AUTH_PW'] != $pass){
	header("HTTP://1.0 401 Unauthorized"); 
	echo "El usuario o la contraseña son incorrectos";
	exit;
}else{
	header("Access-Control-Allow-Origin: *");
	if(!isset($_GET['action'])){
		header("HTTP://1.0 405 Method Not Allowed"); 
		echo "El usuario o la contraseña son incorrectos";
	}else {
		switch ($_GET['action']){
			case 'productos':
				require_once 'productosAPI.php';
				$productosApi = new ProductosAPI();
				$productosApi->API();
				break;
		}
	}
}

