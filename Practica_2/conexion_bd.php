<?php   
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

	// Funcion que hace le insert de persona en la base de datos
	function registrar($persona,$conexion) {
        echo $persona->edad;
        echo $persona->peso;
        echo $persona->altura;
		$query = "INSERT INTO personas (edad, peso, altura) VALUES ($persona->edad, $persona->peso, $persona->altura);"; 
		mysqli_query($conexion,$query) or die('Error al ejecutar la consulta');
    }

    function resultados($conexion) {
		$salida = '<table border="1">
        <caption>Registrados</caption>
        <tr>
			<th>Edad</th>
            <th>Peso</th>
            <th>Altura</th>
            <th>IMC</th>
		</tr>';

		$query = "SELECT edad, peso, altura FROM personas;";
		$result = mysqli_query($conexion,$query) or die('Error al ejecutar la consulta');

		while ($r = mysqli_fetch_assoc($result)) {
    

			$salida .= '<tr>
			<td>'.$r['edad'].'</td>
            <td>'.$r['peso'].'</td>
            <td>'.$r['altura'].'</td>
            <td>'.$r['peso']/($r['altura']*$r['altura']).'</td>
		</tr>';

        }
        
		$salida .= '</table>';

		return $salida;
    }
    
?>