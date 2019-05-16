<!DOCTYPE html>
<html lang="en">
<head>

<!-- Se declaran las configuraciones del programa -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Futbolistas</title>
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
                    <div class="col-sm-8"><h2>Agregar <b>Futbolista</b></h2></div>
                    <div class="col-sm-4">
						<!-- Boton de regresar al index -->
                        <a href="f_index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				// Se incluye el archivo de base de datos
				include ("f_database.php");
                // Se instancia la clase de la Base de datos
				$futbolistas= new Database();
				// Se obtienen todos las cadenas de los campos
				if(isset($_POST) && !empty($_POST)){
					// Se pasan las entradas a las variables correspondientes
					$id = $_POST['id'];
					$nombre = $_POST['nombre'];
					$posicion = $_POST['posicion'];
					$carrera = $_POST['carrera'];
					$email = $_POST['email'];
					//Se crea el registro en la base de datos
					$res = $futbolistas->create($id, $nombre, $posicion, $carrera, $email);
					if($res){
						$message= "Datos insertados con éxito";
						$class="alert alert-success";
					}else{
						$message="No se pudieron insertar los datos";
						$class="alert alert-danger";
					}
					
					?>
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
					<?php
				}
	
			?>
			<div class="row">
				<form method="post">
				<!-- Campo ID -->
				<div class="col-md-6">
					<label>Id:</label>
					<input type="number" name="id" id="id" class='form-control' maxlength="3" required >
				</div>
				<!-- Campo Nombre -->
				<div class="col-md-6">
					<label>Nombre completo:</label>
					<input type="text" name="nombre" id="nombre" class='form-control' maxlength="45" required >
				</div>
				<!-- Campo Posicion -->
				<div class="col-md-6">
					<label>Posicion:</label>
					<input type="text" name="posicion" id="posicion" class='form-control' maxlength="45" required >
				</div>
				<!-- Campo Carrera -->
				<div class="col-md-6">
					<label>Carrera:</label>
					<input type="text" name="carrera" id="carrera" class='form-control' maxlength="45" required >
				</div>
				<!-- Campo E-mail -->
				<div class="col-md-6">
					<label>E-mail:</label>
					<input type="email" name="email" id="email" class='form-control' maxlength="45" required>
				</div>
				
				<div class="col-md-12 pull-right">
				<hr>
				<!-- Boton de guardar datos -->
					<button type="submit" class="btn btn-success">Guardar datos</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>                            