<?php
	// Si el url tiene un id se guarda en u avariable
	if (isset($_GET['id'])){
		$id=intval($_GET['id']);
	} else {
		// si no se regresa al index
		header("location:b_index.php");
	}
?>
<!DOCTYPE html>
<!-- Se declaran las configuraciones del programa -->
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Basquetbolistas</title>
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
                    <div class="col-sm-8"><h2>Editar <b>Basquetbolistas</b></h2></div>
                    <div class="col-sm-4">
                        <a href="b_index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				// Se incluye el archivo de base de datos
				include ("b_database.php");
				// Se instancia la clase de la Base de datos
				$basquetbolistas= new Database();
				// Se obtienen todos las cadenas de los campos
				if(isset($_POST) && !empty($_POST)){
					// Se pasan las entradas a las variables correspondientes
					$nombre = $_POST['nombre'];
					$posicion = $_POST['posicion'];
					$carrera = $_POST['carrera'];
					$email = $_POST['email'];
					//Se guarda el id del url
					$id_basquetbolistas=intval($_POST['id_basquetbolistas']);
					//Se crea el registro en la base de datos
					$res = $basquetbolistas->update($id, $nombre, $posicion, $carrera, $email);
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
				$datos_basquetbolistas=$basquetbolistas->single_record($id);
			?>
			<div class="row">
				<form method="post">
				<!-- Campo ID -->
				<div class="col-md-6">
					<label>Id:</label>
				<input type="number" name="id_basquetbolistas" id="id_basquetbolistas" class='form-control' maxlength="11"   value="<?php echo $datos_basquetbolistas->id;?>" disabled>
				</div>
				<!-- Campo Nombre -->
				<div class="col-md-6">
					<label>Nombre completo:</label>
					<input type="text" name="nombre" id="nombre" class='form-control' maxlength="45" required  value="<?php echo $datos_basquetbolistas->nombre;?>">
				</div>
				<!-- Campo Posicion -->
				<div class="col-md-6">
					<label>Posicion:</label>
					<input type="text" name="posicion" id="posicion" class='form-control' maxlength="45" required value="<?php echo $datos_basquetbolistas->posicion;?>">
				</div>
				<!-- Campo Carrera -->
				<div class="col-md-6">
					<label>Carrera:</label>
					<input type="text" name="carrera" id="carrera" class='form-control' maxlength="45" required value="<?php echo $datos_basquetbolistas->carrera;?>">
				</div>
				<!-- Campo Email -->
				<div class="col-md-6">
					<label>E-mail:</label>
					<input type="email" name="email" id="email" class='form-control' maxlength="45" required value="<?php echo $datos_basquetbolistas->email;?>">
				
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