<!DOCTYPE html>
<html lang="en">
<head>

<!-- Se declaran las configuraciones del programa -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Agregar Ventas</title>
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
                    <div class="col-sm-8"><h2>Agregar <b>Venta</b></h2></div>
                    <div class="col-sm-4">
						<!-- Boton de regresar al index -->
                        <a href="index.php?action=ventas" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				// Se incluye el archivo de base de datos
				include ("database.php");
                // Se instancia la clase de la Base de datos
				$ventas = new Database();
				// Se obtienen todos las cadenas de los campos
				if(isset($_POST) && !empty($_POST)){
                    // Se pasan las entradas a las variables correspondientes
                    $producto_id = $_POST['producto_id'];
                    $cantidad = $_POST['cantidad'];
                    $fecha = $_POST['fecha'];
					//Se crea el registro en la base de datos
					$res = $ventas->createVenta($producto_id, $cantidad, $fecha);
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
		
				<!-- Campo Producto_id -->
				<div class="col-md-6">
					<label>Producto_id:</label>
					<input type="number" name="producto_id" id="producto_id" class='form-control' maxlength="11" required >
				</div>

				<!-- Campo Cantidad -->
				<div class="col-md-6">
					<label>Cantidad:</label>
					<input type="number" name="cantidad" id="cantidad" class='form-control' maxlength="11" required >
				</div>

                <!-- Campo Fecha -->
				<div class="col-md-6">
					<label>Fecha:</label>
					<input type="date" name="fecha" id="fecha" class='form-control' required >
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