<?php 

require 'Alumno.php';
require 'Maestro.php';


	$bd ='practica2';
	$servidor='localhost';
	$usuario='alan';
	$contrasena='estanque98';

	//creamos una conexión a la base de datos
	$conexion=mysqli_connect($servidor, $usuario,$contrasena,$bd);
	$conexion->set_charset("utf8");
	
	// checamos la conexion
	if(!$conexion) 
		die('Conexion a la base de datos ' . $bd . ' falló: ' . mysqli_connect_error());

	// Funcion que hace le insert del alumno en la base de datos
	function registrar_alumno($alumno,$conexion) {
		$query = "INSERT INTO alumnos (matricula, nombre, carrera, email, telefono) VALUES ('$alumno->matricula', '$alumno->nombre', '$alumno->carrera', '$alumno->email', '$alumno->telefono');"; 
		mysqli_query($conexion,$query) or die('Error al ejecutar la consulta');
	}

	// Funcion que hace le insert del maestro en la base de datos
	function registrar_maestro($maestro,$conexion) {
		$query = "INSERT INTO maestros (no_empleado, nombre, carrera, telefono) VALUES ('$maestro->no_empleado', '$maestro->nombre', '$maestro->carrera', '$maestro->telefono');"; 
		mysqli_query($conexion,$query) or die('Error al ejecutar la consulta');
	}

	//Se regresan los datos en forma de lista con formato (alumnos y maestros)
	function resultados($conexion) {
		$salida = '';

		$query = "SELECT matricula, nombre, carrera, email, telefono FROM alumnos;";
		$result = mysqli_query($conexion,$query) or die('Error al ejecutar la consulta');

		while ($r = mysqli_fetch_assoc($result)) {

			$alumno = new Alumno($r['matricula'], $r['nombre'],$r['carrera'],$r['email'],$r['telefono']);

			$salida .= $alumno->mostrar();

		}

		$query = "SELECT no_empleado, carrera, nombre, telefono FROM maestros;";
		$result = mysqli_query($conexion,$query) or die('Error al ejecutar la consulta');

		while ($r = mysqli_fetch_assoc($result)) {

			$maestro = new Maestro($r['no_empleado'], $r['carrera'],$r['nombre'],$r['telefono']);
			$salida .= $maestro->mostrar();

		}

		return $salida;
	}

 ?>
