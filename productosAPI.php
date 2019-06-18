<?php 
require_once 'Base.php';
require_once 'services/ProductosService.php';


class ProductosAPI extends Base{
	
	private $svcProducto;
	public function __construct(){
		$this->svcProducto = new ProductosService();
	}

	public function API(){
		//header("Content-Type: application/JSON");

		$verbo = $_SERVER['REQUEST_METHOD'];

		switch ($verbo) {
			case 'GET':
				if(!isset($_GET['id'])){
					$this->getProductos();
				}else{
					$this->getProductoXId();
				}
				break;
			case 'POST':
				$this->guardarProducto();
				break;
			case 'OPTION':
				$this->guardarProducto();
				break;	
			case 'PUT':
				$this->modificarProducto();
				break;
			case 'DELETE':
				$this->borrarProducto();
				break;	
		}
	}

	public function crearJSON($response){
		$json = json_encode($response);
		return $json;
	}

	public function getProductos(){
		$requestContentType = 'application/JSON';
		try{
			$status = 200;
			$data = $this->svcProducto->getProductos();
			//$data = array('response' => $response);

		}catch(Exception $ex){
			$status = ($ex->getCode() != 0)?$ex->getCode() : 500;
			$data = array('error' => $ex->getMessage());
		}

		$this->setHttpHeaders($requestContentType,$status);
		echo $this->crearJSON($data);

	}

	public function guardarProducto(){
		$requestContentType = 'application/JSON';
		try{
			//print_r(json_decode(file_get_contents("php://input")));
			//exit;
			$producto = json_decode(file_get_contents("php://input"));
			$status = 200;
			$data = $this->svcProducto->guardarProducto($producto);
		}catch(Exception $ex){
			$status = ($ex->getCode() != 0)?$ex->getCode() : 500;
			$data = array('error' => $ex->getMessage());
		}

		$this->setHttpHeaders($requestContentType,$status);
		echo $this->crearJSON($data);
	}

	public function getProductoXId(){
		$requestContentType = 'application/JSON';
		try{
			$idProducto = $_GET['id'];
			$status = 201;
			$data = $this->svcProducto->getProductoXId($idProducto);
			//$data = array('response' => $response);

		}catch(Exception $ex){
			$status = ($ex->getCode() != 0)?$ex->getCode() : 500;
			$data = array('error' => $ex->getMessage());
		}

		$this->setHttpHeaders($requestContentType,$status);
		echo $this->crearJSON($data);		
	}

	public function modificarProducto(){
		$requestContentType = 'application/JSON';
		try{
			if(!isset($_GET['id'])){
				throw new Exception("Debe ingresar el ID del producto", 405);
			}
			//parse_str(file_get_contents("php://input"),$producto);
			$producto = json_decode(file_get_contents("php://input"));
			
			$producto->id = $_GET['id'];

			$data = $this->svcProducto->modificarProducto($producto);
			$status = 200;
		}catch(Exception $ex){
			$status = ($ex->getCode() != 0)?$ex->getCode() : 500;
			
			$data = array('error' => $ex->getMessage());
		}

		$this->setHttpHeaders($requestContentType,$status);
		echo $this->crearJSON($data);	
	}

	public function borrarProducto(){
		$requestContentType = 'application/JSON';
		try{
			if(!isset($_GET['id'])){
				throw new Exception("Debe ingresar el ID del producto", 405);
			}
			$status = 200;

			$data = $this->svcProducto->borrarProducto($_GET['id']);
			//$data = array('response' => $response);

		}catch(Exception $ex){
			$status = ($ex->getCode() != 0)?$ex->getCode() : 500;
			$data = array('error' => $ex->getMessage());
		}

		$this->setHttpHeaders($requestContentType,$status);
		echo $this->crearJSON($data);
	}
}
