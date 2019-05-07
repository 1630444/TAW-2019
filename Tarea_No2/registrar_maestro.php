<?php
	require 'conexion_bd.php';

	$errores = '';
	$valido=false;
	$salida='';

	if (isset($_POST['submit'])) {

        // Se instancia la clase maestro
        $maestro = new Maestro('','','','');
        
        // Se asignan los atributos al objeto
		if(isset($_POST['no_empleado']))
			$maestro->no_empleado=$_POST['no_empleado'];
		else 
			$maestro->no_empleado='';
		if(isset($_POST['nombre']))
			$maestro->nombre=$_POST['nombre'];
		else 
			$maestro->nombre='';
		if(isset($_POST['carrera']))
			$maestro->carrera=$_POST['carrera'];
		else 
			$maestro->carrera='';
		if(isset($_POST['telefono']))
			$maestro->telefono=$_POST['telefono'];
		else 
			$maestro->telefono='';

        
        // se cortan los espacios sobrantes
		$maestro->no_empleado = htmlspecialchars(trim($maestro->no_empleado));
		$maestro->nombre = htmlspecialchars(trim($maestro->nombre));
		$maestro->carrera = htmlspecialchars(trim($maestro->carrera));
		$maestro->telefono = htmlspecialchars(trim($maestro->telefono));

        // Se corroboran los atributos faltantes
		if(empty($maestro->no_empleado)){
			$errores .= 'Complete el campo Matricula <br/>';
		}
		if(empty($maestro->nombre)){
			$errores .= 'Complete el campo Nombre(s) <br/>';
		}
		if(empty($maestro->carrera)){
			$errores .= 'Complete el campo Carrera <br/>';
		}
		if(empty($maestro->telefono)){
			$errores .= 'Complete el campo Telefono <br/>';
		}
		if(empty($errores)){
			$valido = true;
			registrar_maestro($maestro,$conexion);
			$salida = "Maestro registrado con exito!";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registrar Maestro</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> 
</head>
<body>
	<div class="contenedor">
		<form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			<h1 align="center" class="titulo">Registrar Maestro</h1>

            <!--Campo matricula-->
			<label>Numero de Empleado:</label>
			<input type="text" name="no_empleado" placeholder="Ingresa el numero de empleado" value="<?php if(!$valido && isset($maestro)){ echo $maestro->no_emleado;} ?>">

			<!--Campo nombre-->
			<label>Nombre(s):</label>
			<input type="text" name="nombre" placeholder="Ingresa el/los nombre(s)" value="<?php if(!$valido && isset($maestro)){ echo $maestro->nombre;} ?>">

            <!--Campo carrera-->
			<label>Carrera:</label>
			<input type="text" name="carrera" placeholder="Ingresa la carrerra" value="<?php if(!$valido && isset($maestro)){ echo $maestro->carrera;} ?>">

            <!--Campo telefono-->
			<label>Telefono:</label>
			<input type="text" name="telefono" placeholder="Ingresa el telefono" value="<?php if(!$valido && isset($maestro)){ echo $maestro->telefono;} ?>">

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