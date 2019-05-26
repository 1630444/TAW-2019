usuario: admin
contraseña: admin
<?php
require '../database.php';

$valido = false;
if (isset($_POST['aceptar'])) {
	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];
	$con = new Database();
	if (!$con->valida_usuario($usuario, $contrasena)) {
		$valido = false;
	} else {
		session_start();
		$_SESSION['usuario'] = $usuario;

		$listado = $con->datos_usuario($usuario);
		while($row = $listado->fetch(PDO::FETCH_OBJ)){
			$_SESSION['tipo_sesion']=$row->tipo;
			$_SESSION['apellido_sesion']=$row->apellido;
			$_SESSION['nombre_sesion']=$row->nombre;
		}
		header('Location:../index.php');
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<title>Acceso</title>
	<meta charset="utf-8">

	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			background-image: linear-gradient( lightcyan 10%,white 90%);
			background-repeat: no-repeat;
		}

		form {
			width: 500px;
			margin: auto;
			background-color: lightgray;
			border-radius: 3px;
			padding: 20px;
			box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);
			overflow: auto;
		}

		form .form_ctrl {
			padding: 16px;
			font-size: 16px;
			margin-bottom: 20px;
			border-radius: 3px;
			display: block;
			width: 100%;
			color: black;
			background: lavender;
		}

		form .btn {
			padding: 16px;
			font-size: 16px;
			margin-bottom: 20px;
			border-radius: 3px;
			float: right;
		}

		nav {
			background-color: orange;
			padding: 16px;
		}

		nav ul {
			list-style: none;
		}

		nav ul li {
			display: inline;
		}

		nav ul li a {
			color: white;
		}

		nav ul li a:hover {
			color: purple;
		}
	</style>

</head>

<body>
	<br><br>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">	
			<input type="text" class="form_ctrl" name="usuario" placeholder="Nombre de usuario" required>
			<input type="password" class="form_ctrl" name="contrasena" placeholder="Contraseña" required>
			<input type="submit" class="btn" name="aceptar" value="Ingresar">
			<?php
			if (!$valido && isset($_POST['aceptar'])) {
				echo '<p>Usuario y/o contraseña no valido</p>';
			}
			?>
		</form>
</body>
</html>