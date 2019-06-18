<?php

class Conexion {
	private $host;
	private $user;
	private $pass;
	private $db;
	
	public function __construct(){
		
	}

	public static function conectar(){
		try{
			$host = "localhost";
			$user = "root";
			$pass = "";
			$db  = "phpapi";
			
			$dsn = "mysql:host=". $host.";dbname=". $db.';charset=utf8';
			
			$conn = new PDO($dsn,$user,$pass);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			return $conn;
		} catch(PDOException $ex){
			echo $ex->getMessage();
		}
	}	
}