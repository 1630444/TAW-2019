<?php

    //conexion a la base de datos
    require "conexion_bd.php";

    //incluir l clase
    include "Persona.php";

    if (isset($_POST['submit'])) {
        //instanciar la clase
        $persona = new Persona();

        //asignar valores a las propiedades del objeto
        $persona->setEdad($_POST['edad']);
        $persona->setAltura($_POST['altura']);
        $persona->setPeso($_POST['peso']);

        registrar($persona,$conexion);
        
    }
?>
<html>
<head>
	<meta charset="utf-8">
	<title>IMC</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> 
</head>
<body>
	<div class="contenedor">
		<form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			<h1 align="center" class="titulo">IMC</h1>

            <!--Campo edad-->
			<label>Edad:</label>
			<input type="text" name="edad" placeholder="Ingresa la edad" >

			<!--Campo peso-->
			<label>Peso:</label>
			<input type="text" name="peso" placeholder="Ingresa el peso" >

            <!--Campo altura-->
			<label>Altrua:</label>
			<input type="text" name="altura" placeholder="Ingresa la altura" >

			<div>
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

    <?php
        echo resultados($conexion);
    ?>
</body>
</html>