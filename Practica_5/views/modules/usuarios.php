
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Usuarios</title>
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
                    <div class="col-sm-8"><h2>Listado de  <b>Usuarios</b></h2></div>
                    <!-- Boton para agregar registro -->
                    <div class="col-sm-4">
                        <a href="u_create.php" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar usuario</a>
                    </div>
                </div>
            </div>
            <!-- Tabla de registros -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <?php 
                // Se incluye la clase de base de datos, en donde se realia la conexion.
                // Se instancia la clase de la Base de datos
                $usuarios = new Database();
                // Se llama a la funcion que regresa los registros de la tabla 
				$listado=$usuarios->readUsuarios();
				?>
                <tbody>
                <?php 
                    // Se recorre cada uno de los registros que halla regresado la consulta para poder consultar los datos de cada uno y guardarlos en variables individuales.
					while($row = $listado->fetch(PDO::FETCH_OBJ)){
                        $id=$row->id;
                        $usuario=$row->usuario;
						$nombre=$row->nombre;
				?>
					<tr>
                    <!-- Se agrega una fila -->
                        <td><?php echo $id;?></td>
                        <td><?php echo $usuario;?></td>
                        <td><?php echo $nombre;?></td>
                        <td>
                            <!--Botón para modificar el registro-->
                            <a class="edit" title="Editar" data-toggle="tooltip" onclick="
                            if(confirm('¿Seguro que desea modificar este registro?')){
                                document.location.href = 'u_update.php?id=<?php echo $id; ?>'
                            }"><i class="material-icons">&#xE254;</i></a>
                            <!--Botón para eliminar el registro-->
                            <a class="delete" title="Eliminar" data-toggle="tooltip" onclick="
                            if(confirm('¿Seguro que desea eliminar este registro?')){
                                document.location.href = 'u_delete.php?id=<?php echo $id; ?>'
                            }"><i class="material-icons">&#xE872;</i></a>
                        </td>
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