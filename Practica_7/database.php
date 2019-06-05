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
			$stmt = $this->con->prepare("SELECT * FROM usuarios where usuario='$usuario' AND contrasena=MD5('$contrasena')");
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
    
    // Función que regresa el resultset de la condulta personalizada
		public function readSpecial($consulta){
			// Se delcara la consulta
			$stmt = $this->con->prepare($consulta);
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
    
    // Función que regresa el resultado segun un id indicado pero solo un dato
		public function singleData($id,$tabla,$dato){
			// Se delcara la consulta
			$stmt = $this->con->prepare("SELECT $dato FROM $tabla where id=$id");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			while($row = $stmt->fetch(PDO::FETCH_OBJ)){
				$return = $row->$dato;
			}
			return $return;
		}

		// Funcion que agrega un registro a la tabla
		public function createAlumno($nombre, $apellido, $fecha_nac, $matricula, $email, $tel){
			// Se delcara la consulta
			$stmt = $this->con->prepare("INSERT INTO `alumnos` (nombre, apellido, fecha_nac, matricula, email, tel) VALUES ('$nombre', '$apellido', '$fecha_nac', '$matricula', '$email', '$tel')");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}

		// Funcion que actualiza los datos de un registro
		public function updateAlumno($id, $nombre, $apellido, $fecha_nac, $matricula, $email, $tel){
			// Se delcara la consulta
			$stmt = $this->con->prepare("UPDATE `alumnos` SET nombre='$nombre', apellido='$apellido', fecha_nac='$fecha_nac', matricula='$matricula', email='$email', tel='$tel'  WHERE id=$id");
			// Se ejecuta la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}
    
    // Funcion que agrega un registro a la tabla
		public function createMaestro($nombre, $apellido, $fecha_nac, $email, $tel, $num_empleado, $grado_academico, $tipo_contrato){
			// Se delcara la consulta
			$stmt = $this->con->prepare("INSERT INTO `maestros` (nombre, apellido, fecha_nac, email, tel, num_empleado, grado_academico, tipo_contrato) VALUES ('$nombre', '$apellido', '$fecha_nac', '$email', '$tel', $num_empleado, '$grado_academico', '$tipo_contrato')");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}

		// Funcion que actualiza los datos de un registro
		public function updateMaestro($id, $nombre, $apellido, $fecha_nac, $email, $tel, $num_empleado, $grado_academico, $tipo_contrato){
			// Se delcara la consulta
			$stmt = $this->con->prepare("UPDATE `maestros` SET nombre='$nombre', apellido='$apellido', fecha_nac='$fecha_nac', email='$email', tel='$tel', num_empleado=$num_empleado, grado_academico='$grado_academico', tipo_contrato='$tipo_contrato'  WHERE id=$id");
			// Se ejecuta la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}
    
    // Funcion que agrega un registro a la tabla
		public function createMateria($nombre,$id_maestro){
			// Se delcara la consulta
			$stmt = $this->con->prepare("INSERT INTO `materias` (nombre,id_maestro) VALUES ('$nombre',$id_maestro)");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}

		// Funcion que actualiza los datos de un registro
		public function updateMateria($id, $nombre,$id_maestro){
			// Se delcara la consulta
			$stmt = $this->con->prepare("UPDATE `materias` SET nombre='$nombre', id_maestro=$id_maestro WHERE id=$id");
			// Se ejecuta la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}
    
    // Funcion que agrega un registro a la tabla
		public function createGrupo($clave,$carrera){
			// Se delcara la consulta
			$stmt = $this->con->prepare("INSERT INTO `grupos` (clave,carrera) VALUES ('$clave','$carrera')");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}

		// Funcion que actualiza los datos de un registro
		public function updateGrupo($id, $clave,$carrera){
			// Se delcara la consulta
			$stmt = $this->con->prepare("UPDATE `grupos` SET clave='$clave', carrera='$carrera' WHERE id=$id");
			// Se ejecuta la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}
    
    // Funcion que agrega un registro a la tabla
		public function createAluMat($id_materia, $id_alumno){
			// Se delcara la consulta
			$stmt = $this->con->prepare("INSERT INTO `alumnos-materias` (id_materia,id_alumno) VALUES ($id_materia,$id_alumno)");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}
    
    // Funcion que agrega un registro a la tabla
		public function createMatGru($id_materia, $id_grupo){
			// Se delcara la consulta
			$stmt = $this->con->prepare("INSERT INTO `materias-grupos` (id_materia,id_grupo) VALUES ($id_materia,$id_grupo)");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}
    
    // Funcion que agrega un registro a la tabla
		public function createAluTut($id_alumno, $id_tutoria){
			// Se delcara la consulta
			$stmt = $this->con->prepare("INSERT INTO `alumnos-tutorias` (id_alumno,id_tutoria) VALUES ($id_alumno,$id_tutoria)");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}
    
    // Funcion que agrega un registro a la tabla
		public function createTutoria($fecha,$hora,$tipo,$tema,$id_maestro){
			// Se delcara la consulta
			$stmt = $this->con->prepare("INSERT INTO `tutorias` (fecha,hora,tipo,tema,id_maestro) VALUES ('$fecha','$hora','$tipo','$tema',$id_maestro)");
			// Se carga el resultado de la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}

		// Funcion que actualiza los datos de un registro
		public function updateTutoria($id, $fecha,$hora,$tipo,$tema,$id_maestro){
			// Se delcara la consulta
			$stmt = $this->con->prepare("UPDATE `tutorias` SET fecha='$fecha', hora='$hora', tipo='$tipo', tema='$tema', id_maestro=$id_maestro WHERE id=$id");
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
			$stmt = $this->con->prepare("DELETE FROM `$table` WHERE id=$id");
			// Se ejecuta la consulta 
			$stmt->execute();
			if($stmt){
				return true;
			}else{
				return false;
			}
		}

	}
