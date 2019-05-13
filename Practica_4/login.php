usuario: admin
contraseña: admin
<?php
	$valido=false;
	if(isset($_POST['aceptar'])) {
		$usuario=$_POST['usuario'];
		$contrasena=$_POST['contrasena'];
		/*
		if(!function_valida_usuario_bd($usuario,$contrasena)){
			$valido=false;
		}else{
		*/
		if(!($usuario == "admin" && $contrasena == "admin")){
			$valido=false;
		} else {
		session_start();
		$_SESSION['usuario']=$usuario;
		header('Location:index.php');
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<title>Acceso</title>
	<meta charset="utf-8">
</head>
<body>
	<br><br>
	<div class="contenedor">
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			<input type="text" class="form_ctrl" name="usuario" placeholder="Usuario" required>
			<input type="password" class="form_ctrl" name="contrasena" placeholder="Contraseña" required>
			<input type="submit" class="btn" name="aceptar" value="Ingresar">
			<?php
				if(!$valido && isset($_POST['aceptar'])) {
					echo '<p>Usuario y/o contraseña no valido</p>';
				}
			?>
		</form>
	</div>

</body>
</html>