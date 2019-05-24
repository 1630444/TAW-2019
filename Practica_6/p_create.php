<!DOCTYPE html>
<html lang="en">
<head>

<!-- Se declaran las configuraciones del programa -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Agregar Productos</title>
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
                    <div class="col-sm-8"><h2>Agregar <b>Productos</b></h2></div>
                    <div class="col-sm-4">
						<!-- Boton de regresar al index -->
                        <a href="index.php?action=productos" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				// Se incluye el archivo de base de datos
				include ("database.php");
                // Se instancia la clase de la Base de datos
				$productos = new Database();
				// Se obtienen todos las cadenas de los campos
				if(isset($_POST) && !empty($_POST)){
                    // Se pasan las entradas a las variables correspondientes
                    $descripcion = $_POST['descripcion'];
                    $precio = $_POST['precio'];
					//Se crea el registro en la base de datos
					$res = $productos->createProducto($descripcion, $precio);
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
		
				<!-- Campo Descripcion -->
				<div class="col-md-6">
					<label>Descripcion:</label>
					<input type="text" name="descripcion" id="descripcion" class='form-control' maxlength="45" required >
				</div>

				<!-- Campo Precio -->
				<div class="col-md-6">
					<label>Precio:</label>
					<input type="number" name="precio" id="precio" class='form-control' maxlength="45" required >
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