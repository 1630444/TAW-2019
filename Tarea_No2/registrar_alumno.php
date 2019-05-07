<?php
	require 'conexion_bd.php';

	$errores = '';
	$valido=false;
	$salida='';

	if (isset($_POST['submit'])) {

		// Se instancia la clase alumno
		$alumno = new Alumno('','','','','');

		// Se asignan los atributos al objeto
		if(isset($_POST['matricula']))
			$alumno->matricula=$_POST['matricula'];
		else 
			$alumno->matricula='';
		if(isset($_POST['nombre']))
			$alumno->nombre=$_POST['nombre'];
		else 
			$alumno->nombre='';
		if(isset($_POST['carrera']))
			$alumno->carrera=$_POST['carrera'];
		else 
			$alumno->carrera='';
		if(isset($_POST['email']))
			$alumno->email=$_POST['email'];
		else 
			$alumno->email='';
		if(isset($_POST['telefono']))
			$alumno->telefono=$_POST['telefono'];
		else 
			$alumno->telefono='';

			// se cortan los espacios sobrantes
		$alumno->matricula = htmlspecialchars(trim($alumno->matricula));
		$alumno->nombre = htmlspecialchars(trim($alumno->nombre));
		$alumno->carrera = htmlspecialchars(trim($alumno->carrera));
		$alumno->email = htmlspecialchars(trim($alumno->email));
		$alumno->telefono = htmlspecialchars(trim($alumno->telefono));

		// Se corroboran los atributos faltantes
		if(empty($alumno->matricula)){
			$errores .= 'Complete el campo Matricula <br/>';
		}
		if(empty($alumno->nombre)){
			$errores .= 'Complete el campo Nombre(s) <br/>';
		}
		if(empty($alumno->carrera)){
			$errores .= 'Complete el campo Carrera <br/>';
		}
		if(empty($alumno->email)){
			$errores .= 'Complete el campo E-mail <br/>';
		}
		if(empty($alumno->telefono)){
			$errores .= 'Complete el campo Telefono <br/>';
		}
		if(empty($errores)){
			$valido = true;
			registrar_alumno($alumno,$conexion);
			$salida = "Alumno registrado con exito!";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registrar Alumno</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> 
</head>
<body>
	<div class="contenedor">
		<form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			<h1 align="center" class="titulo">Registrar Alumno</h1>

            <!--Campo matricula-->
			<label>Matricula:</label>
			<input type="text" name="matricula" placeholder="Ingresa la matricula" value="<?php if(!$valido && isset($alumno)){ echo $alumno->matricula;} ?>">

			<!--Campo nombre-->
			<label>Nombre(s):</label>
			<input type="text" name="nombre" placeholder="Ingresa el/los nombre(s)" value="<?php if(!$valido && isset($alumno)){ echo $alumno->nombre;} ?>">

            <!--Campo carrera-->
			<label>Carrera:</label>
			<input type="text" name="carrera" placeholder="Ingresa la carrerra" value="<?php if(!$valido && isset($alumno)){ echo $alumno->carrera;} ?>">

            <!--Campo email-->
			<label>Email:</label>
			<input type="text" name="email" placeholder="Ingresa el e-mail" value="<?php if(!$valido && isset($alumno)){ echo $alumno->email;} ?>">

            <!--Campo telefono-->
			<label>Telefono:</label>
			<input type="text" name="telefono" placeholder="Ingresa el telefono" value="<?php if(!$valido && isset($alumno)){ echo $alumno->telefono;} ?>">

			<!--Si hay error se muestra el mensaje-->
			<?php
				if(!empty($errores)) {
					echo '<div class="errores">';
					echo $errores;
					echo '</div>';
				}
			?>
			
			<div class="btn">
			<p><a href="index.php">Regresar</a></p>
			<input type="submit" name="submit" value="Aceptar"></br></br>
			</div>
			
			<?php 
				if($valido){
				echo '<div class="exito">';
					echo $salida;
				echo '</div>';
				} 
			?>

		</form>
	</div>
</body>
</html>