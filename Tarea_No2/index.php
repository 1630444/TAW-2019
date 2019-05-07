<?php

	//Variables
	$salida = '';
	$errores ='';

	//Conexion a la base de datos
	require 'conexion_bd.php';

	//Se consultan los registros de la base de datos
	$salida = resultados($conexion);

	//Si no hay registros se muestra un mensaje
	if ($salida == '')
		$errores = 'No hay maestros ni alumnos agregados.';

?>

<html>
<head>
	<meta charset="utf-8">
	<title>Registros</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> 
</head>
<body>
	<div class="contenedor">

			<h1 align="center" class="titulo">Alumnos y Maestros</h1>

			<!--Se muestra el error, si hay-->
			<?php
				if(!empty($errores)) {
			?>
				<div class="errores">
					<?php echo $errores; ?>
				</div>
			<?php
				}
			?>
			
			<!--Se dan las opciones de agregado-->
			<div class="btn">
				<p><a href="registrar_alumno.php">Agregar Alumno</a></p>
				<p><a href="registrar_maestro.php">Agregar Maestro</a></p></br></br></br>
			</div>
			

			<!--Si no hay errores, se muestran los registros en la base de datos, primero los alumnos despues los maestros.-->
			<?php
				if(empty($errores)){
			?>
				<div class="exito">
					<h3><center>Agregados</center></h3>
					<div class="contenedor_resultados">
					<?php echo $salida; ?>
					</div>
				</div>
			<?php
				}
			?>
			<div>
			<h6>TECNOLOGIAS Y APLICACIONES WEB <br> TAREA 02 <br> HÉCTOR ALÁN DE LA FUENTE ANAYA</h6>
			</div>
	</div>
</body>
</html>