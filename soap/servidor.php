<?php
class Trabajo 
{
	private $nom;
	
	public function __construct()
	{
		$this->nom="Soy un texto a enviar";
	}
	
	public function getUser($n1,$n2)
	{
		return $n1+$n2;
	}
	


    public function saludo()
    {
        return "si funciona!!";
    }
}
$server=new SoapServer("service.wsdl");
$server->setClass("Trabajo");

$server->handle();

?>