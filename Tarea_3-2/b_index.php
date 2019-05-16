<!DOCTYPE html>
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
                    <div class="col-sm-8"><h2>Listado de  <b>Basquetbolistas</b></h2></div>
                    <!-- Boton para agregar registro -->
                    <div class="col-sm-4">
                        <a href="b_create.php" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar basquetbolistas</a>
                    </div>
                </div>
            </div>
            <!-- Tabla de registros -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombres</th>
                        <th>Posición</th>
                        <th>Carrera</th>
						<th>E-mail</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <?php 
                // Se incluye la clase de base de datos, en donde se realia la conexion.
                include ('b_database.php');
                // Se instancia la clase de la Base de datos
                $clientes = new Database();
                // Se llama a la funcion que regresa los registros de la tabla 
				$listado=$clientes->read();
				?>
                <tbody>
                <?php 
                    // Se recorre cada uno de los registros que halla regresado la consulta para poder consultar los datos de cada uno y guardarlos en variables individuales.
					while($row = $listado->fetch(PDO::FETCH_OBJ)){
						$id=$row->id;
						$nombre=$row->nombre;
						$posicion=$row->posicion;
						$carrera=$row->carrera;
						$email=$row->email;
				?>
					<tr>
                    <!-- Se agrega una fila -->
                        <td><?php echo $id;?></td>
                        <td><?php echo $nombre;?></td>
                        <td><?php echo $posicion;?></td>
                        <td><?php echo $carrera;?></td>
						<td><?php echo $email;?></td>
                        <td>
                            <!--Botón para modificar el registro-->
                            <a class="edit" title="Editar" data-toggle="tooltip" onclick="
                            if(confirm('¿Seguro que desea modificar este registro?')){
                                document.location.href = 'b_update.php?id=<?php echo $id; ?>'
                            }"><i class="material-icons">&#xE254;</i></a>
                            <!--Botón para eliminar el registro-->
                            <a class="delete" title="Eliminar" data-toggle="tooltip" onclick="
                            if(confirm('¿Seguro que desea eliminar este registro?')){
                                document.location.href = 'b_delete.php?id=<?php echo $id; ?>'
                            }"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>	
				<?php
                    }
				?>
      
                </tbody>
                </table>
                <!-- Boton de regresar -->
                <div class="col-sm-4">
                <hr>
                    <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                </div>
            
           
        </div>
    </div>     
</body>
</html>                            