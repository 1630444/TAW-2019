<?php
	class Database{

		// Atricutos de la base de datos
		private $con;
		private $dbhost="localhost";
		private $dbuser="alan";
		private $dbpass="estanque98";
		private $dbname="tarea_3-2";

		//Constrctor de la clase
		function __construct(){
			$this->connect_db();
		}
		
		// Función para realizar la conección 
		public function connect_db(){
			try{
				$this->con = new PDO("mysql:host=$this->dbhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
			}catch( PDOException $e ){
				echo 'Error al conectarnos: ' . $e->getMessage();
			}
		}
		
		// Función que el registro en la tabla
		public function create($id, $nombre, $posicion, $carrera, $email){
			// Se delcara la consulta
			$stmt = $this->con->prepare("INSERT INTO `basquetbolistas` (id, nombre, posicion, carrera, email) VALUES ($id, '$nombre', '$posicion', '$carrera', '$email')");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}

		// Función que regresa el resultset de la condulta de la tabla, osea todas las filas
		public function read(){
			// Se delcara la consulta
			$stmt = $this->con->prepare('SELECT * FROM basquetbolistas');
			// Se carga el resultado de la consulta 
			$stmt->execute();
			return $stmt;
		}
		
		// Función que regresa el resultado segun un id indicado
		public function single_record($id){
			// Se delcara la consulta
			$stmt = $this->con->prepare("SELECT * FROM basquetbolistas where id='$id'");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			while($row = $stmt->fetch(PDO::FETCH_OBJ)){
				$return = $row;
			}
			return $return;
		}

		// Funcion que actualiza los datos de un registro
		public function update($id, $nombre, $posicion, $carrera, $email){
			// Se delcara la consulta
			$stmt = $this->con->prepare("UPDATE basquetbolistas SET nombre='$nombre', posicion='$posicion', carrera='$carrera', email='$email'  WHERE id=$id");
			// Se ejecuta la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}
		public function delete($id){
			// Se delcara la consulta
			$stmt = $this->con->prepare("DELETE FROM basquetbolistas WHERE id=$id");
			// Se ejecuta la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}
	}
	
	

?>	

