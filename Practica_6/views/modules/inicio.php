
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Reporte</title>
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
                    <div class="col-sm-8"><h2>Total ganado en el día</h2></div>
                </div>
            </div>
            <!-- Tabla de Reporte -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Hoy</th>
                        <th>Num. Ventas</th>
                        <th>Total Ganado</th>
                    </tr>
                </thead>
                <?php 
                // Se incluye la clase de base de datos, en donde se realia la conexion.
                // Se instancia la clase de la Base de datos
                $con = new Database();
                // Se llama a la funcion que regresa los registros de la tabla 
                $fecha=$con->date();
				$listado=$con->readVentasHoy($fecha);
				?>
                <tbody>
                <?php 
                    // Se recorre cada uno de los registros que halla regresado la consulta para poder consultar los datos de cada uno y guardarlos en variables individuales.
                    $contVentas = 0;
                    $contTotal = 0;
                    while($row = $listado->fetch(PDO::FETCH_OBJ)){
                        $id_producto=$row->producto_id;
                        $cantidad=$row->cantidad;
                        $costo=$con->costoProducto($id_producto);

                        $contTotal = $contTotal + $costo*$cantidad;
                        $contVentas = $contVentas + 1;
                    }
				?>
					<tr>
                    <!-- Se agrega una fila -->
                        <td><?php echo $fecha;?></td>
                        <td><?php echo $contVentas;?></td>
                        <td><?php echo $contTotal;?></td>
                    </tr>
      
                </tbody>
                </table>
        </div>
    </div>     

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Promedio de venta por prenda</h2></div>
                </div>
            </div>
            <!-- Tabla de Reporte -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Descripcion</th>
                        <th>Promedio</th>
                        <th>Total Ganado</th>
                    </tr>
                </thead>
                <?php 
                // Se incluye la clase de base de datos, en donde se realia la conexion.
                // Se instancia la clase de la Base de datos
				$listado=$con->readVentas();
				?>
                <tbody>
                <?php 
                $contPrendas=0;
                
                while($row = $listado->fetch(PDO::FETCH_OBJ)){
                        $contPrendas = $contPrendas + $row->cantidad;;
                    }

                    $listado=$con->readVentas();
                    // Se recorre cada uno de los registros que halla regresado la consulta para poder consultar los datos de cada uno y guardarlos en variables individuales.
                    while($row = $listado->fetch(PDO::FETCH_OBJ)){
                        $contTotal=0;
                        $id_producto=$row->producto_id;
                        $descripcion=$con->descripcionProducto($id_producto);
                        $cantidad=$row->cantidad;

                        $costo=$con->costoProducto($id_producto);
                        $contTotal = $contTotal + $costo*$cantidad;
                        $promedio=(100/$contPrendas)*$cantidad;
                    
				?>
					<tr>
                    <!-- Se agrega una fila -->
                        <td><?php echo $descripcion;?></td>
                        <td><?php echo round($promedio).' %';?></td>
                        <td><?php echo $contTotal;?></td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
                </table>
        </div>
    </div>  

</body>
</html>                            