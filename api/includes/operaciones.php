<?php 

/**
* 
*			Clase con las operaciones realizadas en la base de datos
* 
*					Ing. Adrián Vázquez Navarrete - 2016
*
*/

class operaciones
{

	private $con;
	
	function __construct()
	{
		# Constructor
		require_once dirname(__FILE__).'/conectaDB.php';

		$db 		= new conectaDB();
		$this->con 	= $db->conecta();
	}

	// function nuevoLugar($vals){

	// 	$sql 		= 	"INSERT INTO restaurantes (nombre, ciudad, domicilio, telefono, texto, coord_lat,coord_lon) 
	// 					VALUES ('".$vals['nombre']."','".$vals['ciudad']."','".$vals['domicilio']."','".$vals['telefono']."',
	// 					'".$vals['texto']."','".$vals['lat']."', '".$vals['len']."');";
	// 	$resultado 	= 	array("respuesta"=>NULL, "status"=>500);

	// 	try{
	//     	$stmt = $this->con->query($sql);
	//     	$resultado['respuesta']	=	array('exito' => "Se ha creado un nuevo punto");
	// 		$resultado['status']	=	201;

	//     }catch(PDOException $e){
	//     	if($e->getCode()==23000){
	// 			$resultado['respuesta']	=	array( 'error' => 'Ya existe este lugar' );
	// 			$resultado['status']	=	401;
	// 		}
	// 		else
	// 			$resultado['respuesta']	=	array( 'error' => $e->getMessage() );
	//     }

	//     return $resultado;

	// }

	function verPuntosCiudad($ciudad){

		# Regresa los datos y coordenadas de las ciudad escogida

		$sql = "SELECT r.*,c.ciudad,c.estado FROM restaurantes as r, ciudades as c WHERE r.id_ciudad = '$ciudad' AND r.id_ciudad=c.id_ciudad;";

		try{
			$stmt 					= 	$this->con->query($sql); 
			$restaurantes 			= 	$stmt->fetchAll( PDO::FETCH_OBJ );

			if ( $stmt->rowCount() > 0 )
				$respuesta = $this->setRespuesta($restaurantes,200);
			else
				$respuesta = $this->setRespuesta(array('aviso' => 'No existen valores en la tabla'),204); 
		}
		catch(PDOException $e){
			$respuesta = $this->setRespuesta(array( 'error' => $e->getMessage() ),500);
		}

		$this->con = NULL; // Cierra conexión con Base de Datos
		return $respuesta;
	}

	public function verCiudades(){

		# Regresa un listado con las ciudades

		$sql = "SELECT * FROM ciudades;";

		try{
			$stmt 		= 	$this->con->query($sql); 
			$ciudades 	= 	$stmt->fetchAll( PDO::FETCH_OBJ );

			if ( $stmt->rowCount() > 0 )
				$respuesta = $this->setRespuesta($ciudades,200);
			else
				$respuesta = $this->setRespuesta(array('aviso' => 'No existen valores en la tabla'),204);
		}
		catch(PDOException $e){
			$respuesta = $this->setRespuesta(array( 'error' => $e->getMessage() ),500);
		}

		$this->con = NULL; // Cierra conexión con Base de Datos
		return $respuesta;
		
	}

	// DEFINE LA RESPUESTA QUE SE ENVIARÁ AL INDEX
	public function setRespuesta($respuesta,$status){
		return array('respuesta'=>$respuesta , 'status'=>$status);
	}
}
