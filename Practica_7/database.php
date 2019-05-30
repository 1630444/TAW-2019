<?php
	class Database{

		// Atricutos de la base de datos
		private $con;
		private $dbhost="localhost";
		private $dbuser="alan";
		private $dbpass="ESTANQUE98ful";
		private $dbname="practica_7";

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

		// Función que regresa el resultado segun un id de la talba de ususario para validar el acceso a la sesion
		public function valida_usuario($usuario,$contrasena){
			// Se delcara la consulta
			$stmt = $this->con->prepare("SELECT * FROM usuarios where usuario='$usuario' AND contrasena='$contrasena'");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			while($row = $stmt->fetch(PDO::FETCH_OBJ)){
				return true;
			}
			return false;
		}

		// Función que regresa los datos del usuario en sesion
		public function datos_usuario($usuario){
			// Se delcara la consulta
			$stmt = $this->con->prepare("SELECT * FROM usuarios where usuario='$usuario'");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			return $stmt;
		}

		// Función que regresa el resultset de la condulta de la tabla solicitada, osea todas las filas
		public function readTable($tabla){
			// Se delcara la consulta
			$stmt = $this->con->prepare("SELECT * FROM $tabla");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			return $stmt;
		}

		// Función que regresa el resultado segun un id indicado
		public function single($id,$tabla){
			// Se delcara la consulta
			$stmt = $this->con->prepare("SELECT * FROM $tabla where id='$id'");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			while($row = $stmt->fetch(PDO::FETCH_OBJ)){
				$return = $row;
			}
			return $return;
		}

		// Funcion que agrega un registro a la tabla
		public function createCliente($tipo, $nombre, $apellido){
			// Se delcara la consulta
			$stmt = $this->con->prepare("INSERT INTO `clientes` (tipo, nombre, apellido) VALUES ('$tipo','$nombre','$apellido')");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}

		// Funcion que actualiza los datos de un registro
		public function updateCliente($id, $tipo, $nombre, $apellido){
			// Se delcara la consulta
			$stmt = $this->con->prepare("UPDATE clientes SET tipo='$tipo', nombre='$nombre', apellido='$apellido' WHERE id=$id");
			// Se ejecuta la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}

		// Funcion que agrega un registro a la tabla
		public function createHabitacion($tipo, $precio, $imagenes){
			// Se delcara la consulta
			$stmt = $this->con->prepare("INSERT INTO `habitaciones` (tipo, precio, imagenes) VALUES ('$tipo',$precio,'$imagenes')");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}

		// Funcion que actualiza los datos de un registro
		public function updateHabitacion($id, $tipo, $precio, $imagenes){
			// Se delcara la consulta
			$stmt = $this->con->prepare("UPDATE habitaciones SET tipo='$tipo', precio=$precio, imagenes='$imagenes' WHERE id=$id");
			// Se ejecuta la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}

		public function delete($id,$table){
			// Se delcara la consulta
			$stmt = $this->con->prepare("DELETE FROM $table WHERE id=$id");
			// Se ejecuta la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}

		/*

		// Función que regresa el resultset de la condulta de la tabla, osea todas las filas
		public function readVentasHoy($fecha){
			// Se delcara la consulta
			$stmt = $this->con->prepare("SELECT * FROM ventas WHERE fecha = '$fecha'");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			return $stmt;
		}

		// Función que regresa el resultset de la condulta de la tabla, osea todas las filas
		public function costoProducto($id_producto){
			// Se delcara la consulta
			$stmt = $this->con->prepare("SELECT * FROM productos WHERE id = $id_producto");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			while($row = $stmt->fetch(PDO::FETCH_OBJ)){
				return $row->precio;
			}
			
		}

		
		// Función que regresa el resultset de la condulta de la tabla, osea todas las filas
		public function descripcionProducto($id_producto){
			// Se delcara la consulta
			$stmt = $this->con->prepare("SELECT * FROM productos WHERE id = $id_producto");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			while($row = $stmt->fetch(PDO::FETCH_OBJ)){
				return $row->descripcion;
			}
			
		}
		
		// Funcion que agrega un registro a la tabla
		public function createUsuario($usuario, $contrasena, $nombre){
			// Se delcara la consulta
			$stmt = $this->con->prepare("INSERT INTO `usuarios` (usuario, contrasena, nombre) VALUES ('$usuario','$contrasena','$nombre')");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}

		// Funcion que agrega un registro a la tabla
		public function createProducto($descripcion, $precio){
			// Se delcara la consulta
			$stmt = $this->con->prepare("INSERT INTO `productos` (descripcion, precio) VALUES ('$descripcion','$precio')");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}

		// Funcion que agrega un registro a la tabla
		public function createVenta($producto_id, $cantidad, $fecha){
			// Se delcara la consulta
			$stmt = $this->con->prepare("INSERT INTO `ventas` (producto_id, cantidad, fecha) VALUES ('$producto_id','$cantidad','$fecha')");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}
		
		// Función que regresa el resultado segun un id indicado
		public function single($id,$tabla){
			// Se delcara la consulta
			$stmt = $this->con->prepare("SELECT * FROM $tabla where id='$id'");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			while($row = $stmt->fetch(PDO::FETCH_OBJ)){
				$return = $row;
			}
			return $return;
		}

		// Función que regresa la fecha actual
		public function date(){
			// Se delcara la consulta
			$stmt = $this->con->prepare('SELECT CURDATE() fecha;');
			// Se carga el resultado de la consulta 
			$stmt->execute();
			while($row = $stmt->fetch(PDO::FETCH_OBJ)){
				$return=$row->fecha;
			}
			return $return;
		}

		// Funcion que actualiza los datos de un registro
		public function updateUsuario($id, $usuario, $contrasena, $nombre){
			// Se delcara la consulta
			echo 'se prepara la consulta';
			$stmt = $this->con->prepare("UPDATE usuarios SET nombre='$nombre', usuario='$usuario', contrasena='$contrasena' WHERE id=$id");
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

		*/
	}
