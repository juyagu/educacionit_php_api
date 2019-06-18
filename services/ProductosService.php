<?php 

require_once 'conexion/conexion.php';

class ProductosService {
	private $conexion;

	public function __construct(){
		$this->conexion = Conexion::conectar();
	}

	public function getProductos(){
		try{
			$query = "select * from productos";
			$stmt = $this->conexion->prepare($query);
			$stmt->execute();
			$response = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $response;
		}catch(Exception $ex){
			throw $ex;
		}
	}

	public function guardarProducto($producto){
		try{
			/*$nombre = $producto['nombre'];
			$descripcion = $producto['descripcion'];
			$precio = $producto['precio'];
			$categoria = $producto['categoria'];
			$alta = $producto['alta'];*/
			$query="insert into productos(prd_nombre,prd_descripcion,prd_precio,cat_id,prd_alta) values (?,?,?,?,?)";
			$stmt = $this->conexion->prepare($query);
			$stmt->bindParam(1,$producto->nombre);
			$stmt->bindParam(2,$producto->descripcion);
			$stmt->bindParam(3,$producto->precio);
			$stmt->bindParam(4,$producto->categoria);
			$stmt->bindParam(5,$producto->alta);

			$stmt->execute();

			return true;
		}catch(Exception $ex){
			throw $ex;
		}
	}

	public function getProductoXId($idProducto){
		try{
			$query = "select * from productos where prd_id = ?";
			$stmt = $this->conexion->prepare($query);
			$stmt->bindParam(1,$idProducto);
			$stmt->execute();
			$response = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $response;
		}catch(Exception $ex){
			throw $ex;
		}
	}

	public function modificarProducto($producto){
		try {
			$idProducto = $producto->id;
			$nombre = $producto->nombre;
			$descripcion = $producto->descripcion;
			$precio = $producto->precio;
			$categoria = $producto->categoria;
			$alta = $producto->alta;
			$query="update productos set prd_nombre=:nombre,prd_descripcion=:descripcion,prd_precio=:precio,cat_id=:categoria,prd_alta=:alta where prd_id=:id";
			$stmt = $this->conexion->prepare($query);
			$stmt->bindParam(':nombre',$nombre);
			$stmt->bindParam(':descripcion',$descripcion);
			$stmt->bindParam(':precio',$precio);
			$stmt->bindParam(':categoria',$categoria);
			$stmt->bindParam(':alta',$alta);
			$stmt->bindParam(':id',$idProducto);

			$stmt->execute();
			$response = $this->getProductoXId($idProducto);
			return $response;
		}catch(Exception $ex){
			throw $ex;
		}
	}

	public function borrarProducto($id){
		try{
			$query = "delete from productos where prd_id = ?";
			$stmt = $this->conexion->prepare($query);
			$stmt->bindParam(1,$id);
			$stmt->execute();
			
			return 'Producto id: ' . $id . ' eliminado';
		}catch(Exception $ex){
			throw $ex;
		}
	}
}