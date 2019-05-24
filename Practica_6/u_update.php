<?php
	// Si el url tiene un id se guarda en u avariable
	if (isset($_GET['id'])){
		$id=intval($_GET['id']);
	} else {
		// si no se regresa al index
		header("location:index.php?action=usuarios");
	}
?>
<!DOCTYPE html>
<!-- Se declaran las configuraciones del programa -->
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Modificar Usuarios</title>
<!--Librerías para estilos y diseño-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
					<!-- Titulo de la pagina -->
                    <div class="col-sm-8"><h2>Editar <b>Usuario</b></h2></div>
                    <div class="col-sm-4">
                        <a href="location:index.php?action=usuarios" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				// Se incluye el archivo de base de datos
				include ("database.php");
				// Se instancia la clase de la Base de datos
				$usuario = new Database();
				// Se obtienen todos las cadenas de los campos
				if(isset($_POST) && !empty($_POST)){
					// Se pasan las entradas a las variables correspondientes
					$usuario = $_POST['usuario'];
					$contrasena = $_POST['contrasena'];
					$nombre = $_POST['nombre'];
					//Se guarda el id del url
					$id_usuario= intval($_POST['id_usuario']);
					//Se crea el registro en la base de datos
					echo $usuario.' '.$contrasena.' '.$nombre.' '.$id;
					$res = $usuario->updateUsuario($id, $usuario, $contrasena, $nombre);
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
						
					}else{
						$message="No se pudieron actualizar los datos";
						$class="alert alert-danger";
					}
					
					?>
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
					<?php
				}
				$datos_usuario=$usuario->single($id,'usuarios');
			?>
			<div class="row">
				<form method="post">
				<!-- Campo ID -->
				<div class="col-md-6">
					<label>Id:</label>
				<input type="number" name="id_usuario" id="id_usuario" class='form-control' maxlength="11"   value="<?php echo $datos_usuario->id;?>" disabled>
				</div>
				<!-- Campo Usuario -->
				<div class="col-md-6">
					<label>Usuario:</label>
					<input type="text" name="usuario" id="usuario" class='form-control' maxlength="45" required  value="<?php echo $datos_usuario->usuario;?>">
				</div>
				<!-- Campo Contrasena -->
				<div class="col-md-6">
					<label>Contrasena:</label>
					<input type="password" name="contrasena" id="contrasena" class='form-control' maxlength="45" required  value="<?php echo $datos_usuario->contrasena;?>">
				</div>
				<!-- Campo Nombre -->
				<div class="col-md-6">
					<label>Nombre completo:</label>
					<input type="text" name="nombre" id="nombre" class='form-control' maxlength="45" required  value="<?php echo $datos_usuario->nombre;?>">
				</div>
				
				<div class="col-md-12 pull-right">
				<hr>
					<!-- Boton Actualizar datos -->
					<button type="submit" class="btn btn-success">Actualizar datos</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>                            